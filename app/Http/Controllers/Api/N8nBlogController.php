<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class N8nBlogController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'content'           => 'required|string',
            'excerpt'           => 'nullable|string|max:500',
            'slug'              => 'nullable|string|max:255',

            // Category
            'category_id'       => 'nullable|exists:categories,id',
            'category_name'     => 'nullable|string|max:255',

            // Tags
            'tags'              => 'nullable|array',
            'tags.*'            => 'string|max:100',

            // Author & Media
            'author_name'       => 'nullable|string|max:100',
            'featured_image'    => 'nullable|string|max:500',
            'image_alt'         => 'nullable|string|max:255',

            // Counts
            'reading_time'      => 'nullable|integer|min:1',
            'word_count'        => 'nullable|integer|min:0',

            // SEO
            'meta_title'        => 'nullable|string|max:200',
            'meta_description'  => 'nullable|string|max:500',
            'meta_keywords'     => 'nullable|string|max:500',
            'canonical_url'     => 'nullable|string|max:500',
            'focus_keyword'     => 'nullable|string|max:100',

            // Schema
            'article_type'      => 'nullable|string|max:50',
            'article_section'   => 'nullable|string|max:100',
            'faq_schema'        => 'nullable|string',   // JSON string

            // Open Graph
            'og_title'          => 'nullable|string|max:200',
            'og_description'    => 'nullable|string|max:500',
            'og_image'          => 'nullable|string|max:500',

            // Twitter
            'twitter_card'      => 'nullable|string|max:50',

            // Breadcrumbs
            'breadcrumbs'       => 'nullable|string',   // JSON string

            // Flags
            'is_published'      => 'nullable|boolean',
            'is_featured'       => 'nullable|boolean',
            'allow_comments'    => 'nullable|boolean',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */
        $slug         = $validated['slug'] ?? Str::slug($validated['title']);
        $originalSlug = $slug;
        $count        = 1;

        if (BlogPost::where('slug', $slug)->exists()) {
            return response()->json(['error' => 'Post with this slug already exists'], 409);
        }

        /*
        |--------------------------------------------------------------------------
        | Category Handling
        |--------------------------------------------------------------------------
        */
        $categoryId = $validated['category_id'] ?? null;

        if (!$categoryId && !empty($validated['category_name'])) {
            $category   = Category::firstOrCreate(
                ['slug' => Str::slug($validated['category_name'])],
                ['name' => $validated['category_name']]
            );
            $categoryId = $category->id;
        }

        if (!$categoryId) {
            $categoryId = Category::first()?->id;
        }

        /*
        |--------------------------------------------------------------------------
        | Auto-Calculate Reading Time & Word Count
        |--------------------------------------------------------------------------
        */
        $plainText   = strip_tags($validated['content']);
        $wordCount   = $validated['word_count']
                        ?? str_word_count($plainText);
        $readingTime = $validated['reading_time']
                        ?? max(1, (int) ceil($wordCount / 200));

        /*
        |--------------------------------------------------------------------------
        | Publish Logic
        |--------------------------------------------------------------------------
        */
        $isPublished = $validated['is_published'] ?? true;

        /*
        |--------------------------------------------------------------------------
        | Auto-generate OG fields if not provided
        |--------------------------------------------------------------------------
        */
        $ogTitle       = $validated['og_title']
                          ?? $validated['meta_title']
                          ?? $validated['title'];

        $ogDescription = $validated['og_description']
                          ?? $validated['meta_description']
                          ?? null;

        $canonicalUrl  = $validated['canonical_url']
                          ?? url('/blog/' . $slug);

        /*
        |--------------------------------------------------------------------------
        | Create Blog Post
        |--------------------------------------------------------------------------
        */
        $post = BlogPost::create([

            // Core
            'title'            => $validated['title'],
            'slug'             => $slug,
            'content'          => $validated['content'],
            'excerpt'          => $validated['excerpt']
                                    ?? Str::limit($plainText, 160),
            'category_id'      => $categoryId,
            'user_id'          => 1,
            'author_name'      => $validated['author_name'] ?? 'Shiva Tech Digital',

            // Media
            'featured_image'   => $validated['featured_image'] ?? null,
            'image_alt'        => $validated['image_alt'] ?? $validated['title'],

            // Counts
            'word_count'       => $wordCount,
            'reading_time'     => $readingTime,

            // SEO
            'meta_title'       => $validated['meta_title'] ?? $validated['title'],
            'meta_description' => $validated['meta_description'] ?? null,
            'meta_keywords'    => $validated['meta_keywords'] ?? null,
            'canonical_url'    => $canonicalUrl,
            'focus_keyword'    => $validated['focus_keyword'] ?? null,

            // Schema
            'article_type'     => $validated['article_type'] ?? 'BlogPosting',
            'article_section'  => $validated['article_section'] ?? null,
            'faq_schema'       => isset($validated['faq_schema'])
                                    ? $validated['faq_schema']
                                    : null,

            // Open Graph
            'og_title'         => $ogTitle,
            'og_description'   => $ogDescription,
            'og_image'         => $validated['og_image'] ?? null,

            // Twitter
            'twitter_card'     => $validated['twitter_card'] ?? 'summary_large_image',

            // Breadcrumbs
            'breadcrumbs'      => $validated['breadcrumbs'] ?? null,

            // Flags
            'allow_comments'   => $validated['allow_comments'] ?? true,
            'is_featured'      => $validated['is_featured'] ?? false,

            // Publish
            'is_published'     => $isPublished,
            'status'           => $isPublished ? 'published' : 'draft',
            'published_at'     => $isPublished ? now() : null,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Tags Handling
        |--------------------------------------------------------------------------
        */
        if (!empty($validated['tags'])) {

            $tagIds = [];

            foreach ($validated['tags'] as $tagName) {
                $tag      = Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }

            $post->tags()->sync($tagIds);
        }

        /*
        |--------------------------------------------------------------------------
        | Auto Generate SEO Fields (model method)
        |--------------------------------------------------------------------------
        */
        $post->autoGenerateSeoFields();

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */
        return response()->json([
            'success' => true,
            'message' => 'Blog post created successfully',
            'data'    => [
                'post_id'      => $post->id,
                'title'        => $post->title,
                'slug'         => $post->slug,
                'url'          => url('/blog/' . $post->slug),  // getUrl() nahi
                'status'       => $post->status,
                'word_count'   => (int) $post->word_count,
                'reading_time' => (int) $post->reading_time,
                'published_at' => $post->published_at,
            ],
        ], 201);
    }
    
    public function uploadBase64Image(Request $request)
    {
        try {
            $request->validate([
                'image_data' => 'required|string',
                'filename' => 'nullable|string'
            ]);
            
            $imageData = $request->input('image_data');
            $filename = $request->input('filename', 'blog-' . time() . '-' . \Str::random(8) . '.jpg');
            
            // Clean filename
            $filename = preg_replace('/[^a-zA-Z0-9.\-_]/', '-', $filename);
            
            // Decode base64
            $decoded = base64_decode($imageData);
            
            if (!$decoded) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid base64 data'
                ], 400);
            }
            
            // Save to storage/app/public/blog-images
            $path = 'blog-images/' . $filename;
            \Storage::disk('public')->put($path, $decoded);
            
            return response()->json([
                'success' => true,
                'url' => asset('storage/' . $path),
                'path' => $path,
                'filename' => $filename
            ], 200);
            
        } catch (\Exception $e) {
            \Log::error('Base64 upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}