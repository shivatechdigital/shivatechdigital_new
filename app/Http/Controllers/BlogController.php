<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Blog Listing Page
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()
            ->with([
                'category',
                'user',
                'tags'
            ])
            ->withCount('comments')
            ->latest('published_at');

        /*
        |--------------------------------------------------------------------------
        | Search Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->search($request->search);
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $category = Category::where(
                'slug',
                $request->category
            )->firstOrFail();

            $query->byCategory($category->id);
        }

        /*
        |--------------------------------------------------------------------------
        | Tag Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tag')) {

            $tag = Tag::where(
                'slug',
                $request->tag
            )->firstOrFail();

            $query->byTag($tag->id);
        }

        /*
        |--------------------------------------------------------------------------
        | Month / Year Filter
        |--------------------------------------------------------------------------
        */

        if (
            $request->filled('month') &&
            $request->filled('year')
        ) {

            $query->whereYear(
                'published_at',
                $request->year
            )->whereMonth(
                'published_at',
                $request->month
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Author Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('author')) {

            User::where(
                'id',
                $request->author
            )->firstOrFail();

            $query->where(
                'user_id',
                $request->author
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Posts Pagination
        |--------------------------------------------------------------------------
        */

        $posts = $query->paginate(12)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Sidebar Data
        |--------------------------------------------------------------------------
        */

        $categories = Category::withCount([
            'posts as published_posts_count' => function ($query) {
                $query->published();
            }
        ])->get();

        $popularPosts = BlogPost::published()
            ->popular()
            ->limit(5)
            ->get();

        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->limit(20)
            ->get();

        $archives = BlogPost::published()
            ->select(
                DB::raw('YEAR(published_at) as year'),
                DB::raw('MONTH(published_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->limit(12)
            ->get();

        $topAuthors = User::withCount([
            'posts as published_posts_count' => function ($query) {
                $query->published();
            }
        ])
        ->having('published_posts_count', '>', 0)
        ->orderBy('published_posts_count', 'desc')
        ->limit(5)
        ->get();

        $recentPosts = BlogPost::published()
            ->latest('published_at')
            ->limit(5)
            ->get();

        return view(
            'website.pages.blog.index',
            compact(
                'posts',
                'categories',
                'popularPosts',
                'tags',
                'archives',
                'topAuthors',
                'recentPosts'
            )
        );
    }

    /**
     * Single Blog Page
     */
    public function show($slug)
    {
        $post = BlogPost::published()
            ->with([
                'category',
                'user',
                'tags',
                'comments.user',
                'comments.replies.user'
            ])
            ->withCount('comments')
            ->where('slug', $slug)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Increment Views
        |--------------------------------------------------------------------------
        */

        $post->incrementViews();

        /*
        |--------------------------------------------------------------------------
        | Related Posts
        |--------------------------------------------------------------------------
        */

        $relatedPosts = $post->getRelatedPosts();

        /*
        |--------------------------------------------------------------------------
        | Sidebar Data
        |--------------------------------------------------------------------------
        */

        $popularPosts = BlogPost::published()
            ->popular()
            ->limit(5)
            ->get();

        $categories = Category::withCount([
            'posts as published_posts_count' => function ($query) {
                $query->published();
            }
        ])->get();

        $tags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->limit(15)
            ->get();

        $archives = BlogPost::published()
            ->select(
                DB::raw('YEAR(published_at) as year'),
                DB::raw('MONTH(published_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->limit(12)
            ->get();

        $recentPosts = BlogPost::published()
            ->latest('published_at')
            ->limit(5)
            ->get();

        return view(
            'website.pages.blog.show',
            compact(
                'post',
                'relatedPosts',
                'popularPosts',
                'categories',
                'tags',
                'archives',
                'recentPosts'
            )
        );
    }

    /**
     * Category Page
     */
    public function category($slug)
    {
        $category = Category::where(
            'slug',
            $slug
        )->firstOrFail();

        $posts = BlogPost::published()
            ->where('category_id', $category->id)
            ->with([
                'user',
                'tags'
            ])
            ->withCount('comments')
            ->latest('published_at')
            ->paginate(9);

        return view(
            'website.pages.blog.category',
            compact('category', 'posts')
        );
    }

    /**
     * Tag Page
     */
    public function tag($slug)
    {
        $tag = Tag::where(
            'slug',
            $slug
        )->firstOrFail();

        $posts = $tag->posts()
            ->published()
            ->with([
                'category',
                'user'
            ])
            ->withCount('comments')
            ->latest('published_at')
            ->paginate(9);

        return view(
            'website.pages.blog.tag',
            compact('tag', 'posts')
        );
    }
}