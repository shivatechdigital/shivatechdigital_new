@extends('adminDashboard.index')

@section('title', 'Case Studies')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Case Studies</h2>
        @can('casestudies.create')
            <a href="{{ route('admin.case-studies.create') }}" class="btn btn-primary btn-sm">Add Case Study</a>
        @endcan
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-5"><input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search title, industry, client"></div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Industry</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($caseStudies as $caseStudy)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $caseStudy->title }}</div>
                            <small class="text-muted">{{ $caseStudy->project_type ?: 'General' }}</small>
                        </td>
                        <td>{{ $caseStudy->industry ?: '-' }}</td>
                        <td>{!! $caseStudy->is_featured ? '<span class="badge text-bg-warning">Featured</span>' : '-' !!}</td>
                        <td>{!! $caseStudy->is_active ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>' !!}</td>
                        <td class="d-flex gap-1">
                            @can('casestudies.update')
                            <a href="{{ route('admin.case-studies.edit', $caseStudy) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                            @endcan
                            @can('casestudies.delete')
                            <form method="POST" action="{{ route('admin.case-studies.destroy', $caseStudy) }}" onsubmit="return confirm('Delete this case study?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No case studies found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $caseStudies->links() }}</div>
</div>
@endsection
