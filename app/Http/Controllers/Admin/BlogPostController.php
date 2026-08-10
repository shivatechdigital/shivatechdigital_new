<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:posts.view')->only(['index']);
        $this->middleware('permission:posts.create')->only(['create', 'store']);
        $this->middleware('permission:posts.update')->only(['edit', 'update', 'togglePublish', 'toggleFeatured', 'uploadImage', 'bulkAction']);
        $this->middleware('permission:posts.delete')->only(['destroy', 'duplicate']);
    }

    /**
     * Display a listing of the blog posts
     */
    public function index(Request $request)
    {
        $query = BlogPost::with(['category', 'tags', 'user'])
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search')) {
            $query->search($request->search);
        }

        $posts = $query->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new blog post
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created blog post
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'author_name' => 'nullable|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'reading_time' => 'nullable|integer|min:1',
            'published_at' => 'nullable|date',
            
            // SEO Fields
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|url|max:500',
            'focus_keyword' => 'nullable|string|max:100',
            
            // Schema
            'article_type' => 'nullable|string|max:50',
            'article_section' => 'nullable|string|max:100',
            
            // Open Graph
            'og_title' => 'nullable|string|max:200',
            'og_description' => 'nullable|string|max:500',
            'twitter_card' => 'nullable|string|max:50',
            
            // Publishing
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
            'status' => 'nullable|in:draft,published,scheduled',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('blog/images', $filename, 'public');
            $validated['featured_image'] = 'storage/' . $path;
        }

        // Set user_id
        $validated['user_id'] = Auth::id();

        // Set author name if not provided
        if (empty($validated['author_name'])) {
            $validated['author_name'] = Auth::user()->name;
        }

        // Handle published_at
        if ($request->has('is_published') && $request->is_published) {
            $validated['published_at'] = $validated['published_at'] ?? now();
            $validated['status'] = 'published';
        } else if ($request->has('save_draft')) {
            $validated['status'] = 'draft';
            $validated['is_published'] = false;
        }

        // Set defaults
        $validated['article_type'] = $validated['article_type'] ?? 'BlogPosting';
        $validated['twitter_card'] = $validated['twitter_card'] ?? 'summary_large_image';

        // Create post
        $post = BlogPost::create($validated);

        // Attach tags
        if (!empty($validated['tags'])) {
            $post->tags()->attach($validated['tags']);
        }

        // Auto-generate SEO fields if needed
        $post->autoGenerateSeoFields();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified blog post
     */
    public function show(BlogPost $post)
    {
        $post->load(['category', 'tags', 'user']);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified blog post
     */
    public function edit(BlogPost $post)
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified blog post
     */
    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'author_name' => 'nullable|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'reading_time' => 'nullable|integer|min:1',
            'published_at' => 'nullable|date',
            
            // SEO Fields
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|url|max:500',
            'focus_keyword' => 'nullable|string|max:100',
            
            // Schema
            'article_type' => 'nullable|string|max:50',
            'article_section' => 'nullable|string|max:100',
            
            // Open Graph
            'og_title' => 'nullable|string|max:200',
            'og_description' => 'nullable|string|max:500',
            'twitter_card' => 'nullable|string|max:50',
            
            // Publishing
            'is_published' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'allow_comments' => 'nullable|boolean',
            'status' => 'nullable|in:draft,published,scheduled',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($post->featured_image && Storage::disk('public')->exists(str_replace('storage/', '', $post->featured_image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $post->featured_image));
            }

            $image = $request->file('featured_image');
            $filename = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('blog/images', $filename, 'public');
            $validated['featured_image'] = 'storage/' . $path;
        }

        // Handle published_at
        if ($request->has('is_published') && $request->is_published) {
            $validated['published_at'] = $validated['published_at'] ?? $post->published_at ?? now();
            $validated['status'] = 'published';
        } else if ($request->has('save_draft')) {
            $validated['status'] = 'draft';
            $validated['is_published'] = false;
        }

        // Update post
        $post->update($validated);

        // Sync tags
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        } else {
            $post->tags()->detach();
        }

        // Auto-generate SEO fields if needed
        $post->autoGenerateSeoFields();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified blog post
     */
    public function destroy(BlogPost $post)
    {
        // Delete featured image
        if ($post->featured_image && Storage::disk('public')->exists(str_replace('storage/', '', $post->featured_image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $post->featured_image));
        }

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Blog post deleted successfully!');
    }

    /**
     * Toggle publish status
     */
    public function togglePublish(BlogPost $post)
    {
        if ($post->isPublished()) {
            $post->unpublish();
            $message = 'Post unpublished successfully!';
        } else {
            $post->publish();
            $message = 'Post published successfully!';
        }

        return back()->with('success', $message);
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(BlogPost $post)
    {
        $post->update(['is_featured' => !$post->is_featured]);
        
        return back()->with('success', 'Featured status updated!');
    }

    /**
     * Handle image upload for CKEditor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('blog/content-images', $filename, 'public');
                
                $url = asset('storage/' . $path);

                return response()->json([
                    'url' => $url,
                    'uploaded' => 1,
                    'fileName' => $filename,
                ]);
            }

            return response()->json([
                'uploaded' => 0,
                'error' => ['message' => 'No file uploaded'],
            ], 400);

        } catch (\Exception $e) {
            return response()->json([
                'uploaded' => 0,
                'error' => ['message' => $e->getMessage()],
            ], 500);
        }
    }

    /**
     * Duplicate a post
     */
    public function duplicate(BlogPost $post)
    {
        $newPost = $post->replicate();
        $newPost->title = $post->title . ' (Copy)';
        $newPost->slug = Str::slug($newPost->title) . '-' . time();
        $newPost->is_published = false;
        $newPost->status = 'draft';
        $newPost->published_at = null;
        $newPost->views = 0;
        $newPost->save();

        // Copy tags
        $newPost->tags()->attach($post->tags->pluck('id'));

        return redirect()
            ->route('admin.posts.edit', $newPost)
            ->with('success', 'Post duplicated successfully!');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:publish,unpublish,delete,featured',
            'posts' => 'required|array',
            'posts.*' => 'exists:blog_posts,id',
        ]);

        $posts = BlogPost::whereIn('id', $request->posts)->get();

        foreach ($posts as $post) {
            switch ($request->action) {
                case 'publish':
                    $post->publish();
                    break;
                case 'unpublish':
                    $post->unpublish();
                    break;
                case 'delete':
                    $post->delete();
                    break;
                case 'featured':
                    $post->update(['is_featured' => true]);
                    break;
            }
        }

        return back()->with('success', 'Bulk action completed successfully!');
    }
}