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
    public function index()
    {
        $posts = Post::with(['category', 'user', 'tags'])
            ->latest()
            ->paginate(10);
        
        return view('adminDashboard.pages.posts.index', compact('posts'));
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