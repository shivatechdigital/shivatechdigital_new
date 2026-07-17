@extends('adminDashboard.index')

@section('title', 'Tags')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tags</h2>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Tag
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Posts Count</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><strong>{{ $tag->name }}</strong></td>
                            <td><code>{{ $tag->slug }}</code></td>
                            <td><span class="badge bg-primary">{{ $tag->posts_count }} posts</span></td>
                            <td>{{ $tag->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Delete this tag?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No tags found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $tags->links() }}
            </div>
        </div>
    </div>
</div>
@endsection