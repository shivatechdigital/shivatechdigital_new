@extends('adminDashboard.index')

@section('title', 'Client Projects')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Client Projects</h2>
        @can('clientprojects.create')<a href="{{ route('admin.client-projects.create') }}" class="btn btn-primary btn-sm">Add Project</a>@endcan
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4"><input name="search" value="{{ $search }}" class="form-control" placeholder="Search title/project/client"></div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                @foreach($statusLabels as $key => $label)<option value="{{ $key }}" {{ $status === $key ? 'selected' : '' }}>{{ $label }}</option>@endforeach
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Project</th><th>Client</th><th>Status</th><th>Progress</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $project->title }}</div>
                            <small class="text-muted">{{ $project->project_type ?: 'General' }}</small>
                        </td>
                        <td>{{ $project->user?->name ?: '-' }}</td>
                        <td>{{ $project->status_label }}</td>
                        <td>{{ $project->progress }}%</td>
                        <td class="d-flex gap-1">
                            @can('clientprojects.update')<a href="{{ route('admin.client-projects.edit', $project) }}" class="btn btn-outline-primary btn-sm">Edit</a>@endcan
                            @can('clientprojects.delete')
                            <form method="POST" action="{{ route('admin.client-projects.destroy', $project) }}" onsubmit="return confirm('Delete this client project?')">@csrf @method('DELETE')<button class="btn btn-outline-danger btn-sm">Delete</button></form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No client projects found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $projects->links() }}</div>
</div>
@endsection
