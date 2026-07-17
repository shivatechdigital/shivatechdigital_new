@extends('adminDashboard.index')

@section('title', 'Admin Dashboard')

@section('adminDashboard.content')
<style>
    .stat-card
    {
        padding:10px;
        border-radius: 10px;
    }
</style>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="font-size:25px !important">Dashboard</h2>
        <div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Post
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row" style="margin-bottom:25px !important">
        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Posts</h6>
                        <h3>{{ $totalPosts }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-file-alt fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Published</h6>
                        <h3>{{ $publishedPosts }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Views</h6>
                        <h3>{{ number_format($totalViews) }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-eye fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Comments</h6>
                        <h3>{{ $totalComments }}</h3>
                    </div>
                    <div>
                        <i class="fas fa-comments fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Lists -->
    <div class="row mt-4">
        <!-- Recent Posts -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Posts</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPosts as $post)
                                <tr>
                                    <td>{{ Str::limit($post->title, 40) }}</td>
                                    <td><span class="badge bg-info">{{ $post->category->name }}</span></td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->views }}</td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Category Statistics -->
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Posts by Category</h5>
                </div>
                <div class="card-body">
                    @foreach($categoryPosts as $category)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>{{ $category->name }}</span>
                            <span class="badge bg-primary">{{ $category->posts_count }} posts</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" 
                                 style="width: {{ ($category->posts_count / $totalPosts) * 100 }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <!-- Quick Stats -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Quick Stats</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Categories
                            <span class="badge bg-primary rounded-pill">{{ $totalCategories }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tags
                            <span class="badge bg-primary rounded-pill">{{ $totalTags }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Draft Posts
                            <span class="badge bg-warning rounded-pill">{{ $draftPosts }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Users
                            <span class="badge bg-success rounded-pill">{{ $totalUsers }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Popular Posts -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Popular Posts</h5>
                </div>
                <div class="card-body">
                    @foreach($popularPosts as $popular)
                    <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <h6 class="mb-1">{{ Str::limit($popular->title, 50) }}</h6>
                        <small class="text-muted">
                            <i class="fas fa-eye"></i> {{ $popular->views }} views
                        </small>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Comments -->
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Recent Comments</h5>
                </div>
                <div class="card-body">
                    @foreach($recentComments as $comment)
                    <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <p class="mb-1 small">{{ Str::limit($comment->comment, 60) }}</p>
                        <small class="text-muted">
                            <strong>{{ $comment->user->name }}</strong> on 
                            <a href="{{ route('blog.show', $comment->post->slug) }}">{{ Str::limit($comment->post->title, 30) }}</a>
                        </small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection