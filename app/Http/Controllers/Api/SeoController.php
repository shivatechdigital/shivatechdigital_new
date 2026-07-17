<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceMeta;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SeoController extends Controller
{
    // ============================================
    // SERVICE PAGES META MANAGEMENT
    // ============================================

    /**
     * GET /api/seo/pages
     * List all service pages
     */
    public function getAllPages(): JsonResponse
    {
        $pages = ServiceMeta::orderBy('page_type')
            ->orderBy('page_slug')
            ->get()
            ->map(function ($page) {
                return [
                    'id' => $page->id,
                    'slug' => $page->page_slug,
                    'type' => $page->page_type,
                    'url' => $page->page_url,
                    'meta_title' => $page->meta_title,
                    'meta_description' => $page->meta_description,
                    'focus_keyword' => $page->focus_keyword,
                    'seo_score' => $page->seo_score,
                    'last_updated_by' => $page->last_updated_by,
                    'last_optimized_at' => $page->last_optimized_at,
                    'current_clicks' => $page->current_clicks,
                    'current_impressions' => $page->current_impressions,
                    'current_position' => $page->current_position,
                    'updated_at' => $page->updated_at,
                ];
            });

        return response()->json([
            'success' => true,
            'count' => $pages->count(),
            'data' => $pages,
        ]);
    }

    /**
     * GET /api/seo/page/{slug}
     * Get single page meta details
     */
    public function getPage(string $slug): JsonResponse
    {
        $page = ServiceMeta::where('page_slug', $slug)->first();

        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $page,
        ]);
    }

    /**
     * POST /api/seo/page
     * Create new page meta
     */
    public function createPage(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'page_slug' => 'required|string|unique:service_meta,page_slug',
            'page_type' => 'required|in:service,static,landing',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'focus_keyword' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();
        $data['page_url'] = $request->page_url ?? url($request->page_slug);
        $data['last_updated_by'] = $request->last_updated_by ?? 'manual';

        $page = ServiceMeta::create($data);
        
        // Calculate SEO score
        $page->seo_score = $page->calculateSeoScore();
        $page->save();
        
        // 🔥 Clear cache (in case slug was cached as null)
        \Illuminate\Support\Facades\Cache::forget("seo_meta_{$page->page_slug}");
    
        return response()->json([
            'success' => true,
            'message' => 'Page meta created successfully',
            'data' => $page,
        ], 201);
    }

    /**
     * PUT /api/seo/page/{slug}
     * Update page meta
     */
    /**
 * PUT /api/adminseo/page/{slug}
 * Update page meta
 */
    public function updatePage(Request $request, string $slug): JsonResponse
    {
        $page = ServiceMeta::where('page_slug', $slug)->first();
    
        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found',
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'focus_keyword' => 'nullable|string|max:100',
            'og_title' => 'nullable|string|max:200',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|string|max:500',
            'schema_markup' => 'nullable|string',
            'h1_tag' => 'nullable|string|max:200',
            'target_keywords' => 'nullable|array',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
    
        $page->update($request->all());
        
        // Update tracking
        $page->last_updated_by = $request->last_updated_by ?? 'manual';
        $page->last_optimized_at = now();
        $page->seo_score = $page->calculateSeoScore();
        $page->save();
    
        // 🔥 IMPORTANT: Clear cache so changes appear immediately
        \Illuminate\Support\Facades\Cache::forget("seo_meta_{$slug}");
    
        return response()->json([
            'success' => true,
            'message' => 'Page meta updated successfully',
            'cache_cleared' => true,
            'data' => $page->fresh(),
        ]);
    }

    /**
     * POST /api/seo/page/{slug}/schema
     * Update only schema markup
     */
    public function updateSchema(Request $request, string $slug): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'schema_markup' => 'required|string',
            'schema_type' => 'nullable|in:main,breadcrumb,faq',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $page = ServiceMeta::where('page_slug', $slug)->first();

        if (!$page) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found',
            ], 404);
        }

        $type = $request->schema_type ?? 'main';
        
        if ($type === 'breadcrumb') {
            $page->breadcrumb_schema = $request->schema_markup;
        } elseif ($type === 'faq') {
            $page->faq_schema = $request->schema_markup;
        } else {
            $page->schema_markup = $request->schema_markup;
        }
        
        $page->last_updated_by = $request->last_updated_by ?? 'manual';
        $page->save();

        // 🔥 Clear cache
        \Illuminate\Support\Facades\Cache::forget("seo_meta_{$slug}");
    
        return response()->json([
            'success' => true,
            'message' => 'Schema updated successfully',
        ]);
    }

    // ============================================
    // BLOG MANAGEMENT
    // ============================================

    /**
     * POST /api/seo/blog/draft
     * Create blog as draft (not published)
     */
    public function createBlogDraft(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = 'draft'; // IMPORTANT: Always draft initially
        $data['is_published'] = false;
        $data['user_id'] = $data['user_id'] ?? 1; // Default AI bot user
        $data['author_name'] = $data['author_name'] ?? 'Shiva Tech Digital';
        
        // Calculate reading time and word count
        $wordCount = str_word_count(strip_tags($data['content']));
        $data['word_count'] = $wordCount;
        $data['reading_time'] = max(1, ceil($wordCount / 200)); // 200 words/minute
        
        // Default meta if not provided
        $data['meta_title'] = $data['meta_title'] ?? $data['title'];
        $data['meta_description'] = $data['meta_description'] ?? Str::limit(strip_tags($data['content']), 155);
        
        $blog = BlogPost::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Blog draft created successfully',
            'data' => [
                'id' => $blog->id,
                'slug' => $blog->slug,
                'title' => $blog->title,
                'status' => $blog->status,
                'preview_url' => url("/blog/preview/{$blog->slug}?token=" . md5($blog->id . env('APP_KEY'))),
            ],
        ], 201);
    }

    /**
     * PUT /api/seo/blog/{id}
     * Update blog draft
     */
    public function updateBlog(Request $request, int $id): JsonResponse
    {
        $blog = BlogPost::find($id);

        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        $allowedFields = [
            'title', 'slug', 'excerpt', 'content', 'featured_image', 
            'image_alt', 'meta_title', 'meta_description', 'meta_keywords',
            'focus_keyword', 'og_title', 'og_description', 'og_image',
            'faq_schema', 'breadcrumbs', 'canonical_url', 'category_id'
        ];

        $blog->update($request->only($allowedFields));
        
        // Recalculate if content changed
        if ($request->has('content')) {
            $wordCount = str_word_count(strip_tags($request->content));
            $blog->word_count = $wordCount;
            $blog->reading_time = max(1, ceil($wordCount / 200));
            $blog->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Blog updated successfully',
            'data' => $blog->fresh(),
        ]);
    }

    /**
     * POST /api/seo/blog/{id}/publish
     * Publish approved blog
     */
    public function publishBlog(int $id): JsonResponse
    {
        $blog = BlogPost::find($id);

        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        $blog->update([
            'status' => 'published',
            'is_published' => true,
            'published_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Blog published successfully',
            'data' => [
                'id' => $blog->id,
                'url' => url("/blog/{$blog->slug}"),
                'published_at' => $blog->published_at,
            ],
        ]);
    }

    /**
     * DELETE /api/seo/blog/{id}
     * Delete/reject blog draft
     */
    public function deleteBlog(int $id): JsonResponse
    {
        $blog = BlogPost::find($id);

        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found',
            ], 404);
        }

        $blog->delete(); // Soft delete

        return response()->json([
            'success' => true,
            'message' => 'Blog deleted successfully',
        ]);
    }

    /**
     * GET /api/seo/blog/drafts
     * Get all pending/draft blogs
     */
    public function getDrafts(): JsonResponse
    {
        $blogs = BlogPost::where('status', 'draft')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'count' => $blogs->count(),
            'data' => $blogs,
        ]);
    }

    // ============================================
    // STATS & ANALYTICS
    // ============================================

    /**
     * GET /api/seo/stats
     * Overall SEO statistics
     */
    public function getStats(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'pages' => [
                    'total' => ServiceMeta::count(),
                    'optimized' => ServiceMeta::whereNotNull('focus_keyword')->count(),
                    'with_schema' => ServiceMeta::whereNotNull('schema_markup')->count(),
                    'avg_seo_score' => round(ServiceMeta::avg('seo_score') ?? 0, 1),
                ],
                'blogs' => [
                    'total' => BlogPost::count(),
                    'published' => BlogPost::where('status', 'published')->count(),
                    'drafts' => BlogPost::where('status', 'draft')->count(),
                    'this_month' => BlogPost::whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->count(),
                ],
                'last_updated' => now()->toIso8601String(),
            ],
        ]);
    }

    /**
     * GET /api/seo/health
     * API health check
     */
    public function health(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'SEO API is healthy',
            'timestamp' => now()->toIso8601String(),
            'version' => '1.0.0',
        ]);
    }
    
    /**
 * POST /api/adminseo/cache/clear
 * Clear SEO meta cache
 */
    public function clearCache(Request $request): JsonResponse
    {
        $slug = $request->input('slug');
    
        if ($slug) {
            // Clear specific page cache
            \Illuminate\Support\Facades\Cache::forget("seo_meta_{$slug}");
            $message = "Cache cleared for: {$slug}";
        } else {
            // Clear all SEO meta caches
            $pages = ServiceMeta::pluck('page_slug');
            foreach ($pages as $pageSlug) {
                \Illuminate\Support\Facades\Cache::forget("seo_meta_{$pageSlug}");
            }
            $message = "Cleared cache for all " . count($pages) . " pages";
        }
    
        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
}