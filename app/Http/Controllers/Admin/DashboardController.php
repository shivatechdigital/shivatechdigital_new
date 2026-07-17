<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $draftPosts = Post::where('is_published', false)->count();
        $totalCategories = Category::count();
        $totalTags = Tag::count();
        $totalComments = Comment::count();
        $totalViews = Post::sum('views');
        $totalUsers = User::count();

        // Recent Posts
        $recentPosts = Post::with(['category', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        // Popular Posts
        $popularPosts = Post::orderBy('views', 'desc')
            ->limit(5)
            ->get();

        // Recent Comments
        $recentComments = Comment::with(['post', 'user'])
            ->latest()
            ->limit(5)
            ->get();

        // Monthly Posts Chart Data
        $monthlyPosts = Post::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Fill missing months with 0
        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyPosts[$i] ?? 0;
        }

        // Category wise posts
        $categoryPosts = Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->limit(5)
            ->get();

        return view('adminDashboard.pages.posts.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalCategories',
            'totalTags',
            'totalComments',
            'totalViews',
            'totalUsers',
            'recentPosts',
            'popularPosts',
            'recentComments',
            'chartData',
            'categoryPosts'
        ));
    }
}