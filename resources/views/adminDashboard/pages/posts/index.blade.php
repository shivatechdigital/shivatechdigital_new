@extends('adminDashboard.index')
@section('adminDashboard.content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Posts</h2>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Post
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>
                            @if($post->featured_image)
                                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" width="50" height="50" class="rounded">
                            @else
                                <div class="bg-secondary rounded" style="width:50px;height:50px;"></div>
                            @endif
                        </td>
                        <td>{{ Str::limit($post->title, 40) }}</td>
                        <td><span class="badge bg-info">{{ $post->category->name }}</span></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->views }}</td>
                        <td>
                            @if($post->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-warning">Draft</span>
                            @endif
                        </td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No posts found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection