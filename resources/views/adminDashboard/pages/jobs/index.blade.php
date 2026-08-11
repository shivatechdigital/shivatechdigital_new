@extends('adminDashboard.index')

@section('title', 'Job Openings')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Job Openings</h2>
        @can('jobs.create')
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">Add Job</a>
        @endcan
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-5"><input name="search" value="{{ $search }}" class="form-control" placeholder="Search title, department, location"></div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
        <div class="col-md-2"><a href="{{ route('admin.job-applications.index') }}" class="btn btn-outline-secondary w-100">Applications</a></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Title</th><th>Department</th><th>Type</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($jobs as $job)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $job->title }}</div>
                            <small class="text-muted">{{ $job->location }}</small>
                        </td>
                        <td>{{ $job->department ?: '-' }}</td>
                        <td>{{ $job->employment_type_label }}</td>
                        <td>{!! $job->is_active ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>' !!}</td>
                        <td class="d-flex gap-1">
                            @can('jobs.update')<a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-outline-primary btn-sm">Edit</a>@endcan
                            @can('jobs.delete')
                                <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job opening?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No job openings found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $jobs->links() }}</div>
</div>
@endsection
