<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost as Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');
        $categoryId = (string) $request->input('category_id', '');
        $authorId = (string) $request->input('author_id', '');
        $sortBy = (string) $request->input('sort_by', 'date');
        $sortOrder = strtolower((string) $request->input('sort_order', 'desc'));
        $allowedPerPage = [10, 20, 50, 100];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'desc';
        }

        $sortMap = [
            'id' => 'id',
            'title' => 'title',
            'category' => 'category_id',
            'status' => 'is_published',
            'views' => 'views',
            'date' => 'created_at',
            'action' => 'id',
        ];

        if (!array_key_exists($sortBy, $sortMap)) {
            $sortBy = 'date';
        }

        $postsQuery = Post::with(['category', 'user', 'tags']);

        if ($search !== '') {
            $postsQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhere('author_name', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'published') {
            $postsQuery->where(function ($query) {
                $query->where('is_published', true)
                    ->orWhere('status', 'published');
            });
        } elseif ($status === 'draft') {
            $postsQuery->where(function ($query) {
                $query->where('is_published', false)
                    ->orWhere('status', 'draft')
                    ->orWhereNull('status');
            });
        } elseif ($status === 'scheduled') {
            $postsQuery->where('status', 'scheduled');
        }

        if ($categoryId !== '') {
            $postsQuery->where('category_id', $categoryId);
        }

        if ($authorId !== '') {
            $postsQuery->where('user_id', $authorId);
        }

        $posts = $postsQuery
            ->orderBy($sortMap[$sortBy], $sortOrder)
            ->paginate($perPage)
            ->appends($request->query());

        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $totalViews = Post::sum('views');
        $totalComments = \App\Models\Comment::count();
        $categories = Category::orderBy('name')->get();
        $authors = \App\Models\User::orderBy('name')->get(['id', 'name']);

        return view('adminDashboard.pages.posts.index', compact(
            'posts',
            'totalPosts',
            'publishedPosts',
            'totalViews',
            'totalComments',
            'categories',
            'authors',
            'search',
            'status',
            'categoryId',
            'authorId',
            'sortBy',
            'sortOrder',
            'perPage'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('adminDashboard.pages.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        $validated['user_id'] = auth()->id();
        
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }

        if ($request->is_published) {
            $validated['published_at'] = now();
        }

        $post = Post::create($validated);

        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully');
    }
    
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
    
            $file = $request->file('upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('storage/uploads'), $filename);

            return response()->json([
                'url' => asset('storage/uploads/'.$filename)
            ]);
        }
    }


    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('adminDashboard.pages.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|array',
            'is_published' => 'boolean',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }

        if ($request->is_published && !$post->is_published) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully');
    }
    
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/editor-images', $filename, 'public');
            
            return response()->json([
                'url' => asset('storage/post' . $path)
            ]);
        }
        
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}