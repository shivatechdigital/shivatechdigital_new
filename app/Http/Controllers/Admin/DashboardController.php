<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost as Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $status = (string) $request->input('status', 'all');
        $allowedPerPage = [10, 20, 50];
        $perPage = (int) $request->input('per_page', 10);
        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        // Statistics
        $totalPosts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $totalComments = Comment::count();
        $totalViews = Post::sum('views');

        // Recent Posts with filters and pagination
        $recentPostsQuery = Post::with(['category', 'user'])->latest();

        if ($search !== '') {
            $recentPostsQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhere('author_name', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'published') {
            $recentPostsQuery->where(function ($query) {
                $query->where('is_published', true)
                    ->orWhere('status', 'published');
            });
        } elseif ($status === 'draft') {
            $recentPostsQuery->where(function ($query) {
                $query->where('is_published', false)
                    ->orWhere('status', 'draft')
                    ->orWhereNull('status');
            });
        } elseif ($status === 'scheduled') {
            $recentPostsQuery->where('status', 'scheduled');
        }

        $recentPosts = $recentPostsQuery
            ->paginate($perPage)
            ->appends($request->query());

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
            ->has('posts')
            ->orderBy('posts_count', 'desc')
            ->get();

        return view('adminDashboard.pages.posts.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'totalComments',
            'totalViews',
            'recentPosts',
            'recentComments',
            'chartData',
            'categoryPosts',
            'search',
            'status',
            'perPage'
        ));
    }
}