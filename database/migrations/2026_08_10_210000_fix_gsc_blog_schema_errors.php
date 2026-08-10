<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\ServiceMeta;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Log;

/**
 * Fix GSC-detected errors:
 * 1. Malformed faq_schema JSON in blog/cloud-migration-costs-2026
 * 2. Unpublish broken blog post: exact-topic-from-research (500 error)
 * 3. Validate & sanitize all service_meta JSON fields
 */
return new class extends Migration
{
    public function up(): void
    {
        // ── 1. Fix malformed schemas in service_meta table (blog slugs)
        $this->fixMalformedServiceMetaSchemas();

        // ── 2. Fix malformed faq_schema in blog_posts table
        $this->fixMalformedBlogPostSchemas();

        // ── 3. Unpublish the broken 'exact-topic-from-research' post
        $this->unpublishBrokenPost('exact-topic-from-research');

        // ── 4. Sanitize ALL service_meta JSON columns
        $this->sanitizeAllServiceMetaJson();
    }

    public function down(): void
    {
        // Restore: republish the post (if it was published before)
        BlogPost::where('slug', 'exact-topic-from-research')
            ->where('status', 'draft')
            ->update(['status' => 'published', 'is_published' => true]);
    }

    // ────────────────────────────────────────────────────────────────────────
    private function fixMalformedServiceMetaSchemas(): void
    {
        // Known problem slugs from GSC inspection
        $problematicSlugs = [
            'blog/cloud-migration-costs-2026',
            'blog/ecommerce-solutions-online-2026',
        ];

        foreach ($problematicSlugs as $slug) {
            $meta = ServiceMeta::where('page_slug', $slug)->first();
            if (! $meta) continue;

            foreach (['faq_schema', 'schema_markup', 'breadcrumb_schema'] as $column) {
                if (empty($meta->$column)) continue;

                $decoded = json_decode($meta->$column, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    // JSON is malformed — clear it to remove the Google error
                    $meta->$column = null;
                    Log::info("GSC Fix: Cleared malformed {$column} for {$slug}");
                }
            }
            $meta->save();
        }
    }

    // ────────────────────────────────────────────────────────────────────────
    private function fixMalformedBlogPostSchemas(): void
    {
        // Fix known problematic blog post slugs
        $slugs = ['cloud-migration-costs-2026', 'ecommerce-solutions-online-2026'];

        foreach ($slugs as $slug) {
            $post = BlogPost::where('slug', $slug)->first();
            if (! $post || empty($post->faq_schema)) continue;

            $raw = is_array($post->faq_schema) ? json_encode($post->faq_schema) : $post->faq_schema;
            if (json_decode($raw) === null && json_last_error() !== JSON_ERROR_NONE) {
                $post->faq_schema = null;
                $post->save();
                Log::info("GSC Fix: Cleared malformed faq_schema in blog_post '{$slug}'");
            }
        }

        // Sanitize ALL blog posts faq_schema to prevent future issues
        BlogPost::whereNotNull('faq_schema')->each(function (BlogPost $post) {
            $raw = is_array($post->faq_schema) ? json_encode($post->faq_schema) : $post->faq_schema;
            if ($raw && json_decode($raw) === null && json_last_error() !== JSON_ERROR_NONE) {
                $post->faq_schema = null;
                $post->save();
                Log::warning("GSC Fix: Cleared malformed faq_schema in blog_post '{$post->slug}'");
            }
        });
    }

    // ────────────────────────────────────────────────────────────────────────
    private function unpublishBrokenPost(string $slug): void
    {
        $post = BlogPost::where('slug', $slug)->first();
        if (! $post) return;

        $post->status       = 'draft';
        $post->is_published = false;
        $post->save();

        Log::info("GSC Fix: Unpublished broken post '{$slug}' (was returning 500 error)");
    }

    // ────────────────────────────────────────────────────────────────────────
    private function sanitizeAllServiceMetaJson(): void
    {
        ServiceMeta::all()->each(function (ServiceMeta $meta) {
            $dirty = false;

            foreach (['faq_schema', 'schema_markup', 'breadcrumb_schema'] as $column) {
                if (empty($meta->$column)) continue;

                $decoded = json_decode($meta->$column, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $meta->$column = null;
                    $dirty = true;
                    Log::warning("GSC Fix: Cleared malformed {$column} for {$meta->page_slug}");
                }
            }

            if ($dirty) $meta->save();
        });
    }
};
