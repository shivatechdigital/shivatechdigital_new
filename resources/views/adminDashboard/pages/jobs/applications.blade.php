@extends('adminDashboard.index')

@section('title', 'Job Applications')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Job Applications</h2>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary btn-sm">Job Openings</a>
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-5"><input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search name/email/phone"></div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                @foreach($statusLabels as $key => $label)
                    <option value="{{ $key }}" {{ $status === $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Applicant</th><th>Job</th><th>Status</th><th>Resume</th><th>Action</th></tr></thead>
            <tbody>
                @forelse($applications as $application)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $application->name }}</div>
                            <small class="text-muted">{{ $application->email }} | {{ $application->phone }}</small>
                        </td>
                        <td>{{ $application->job?->title ?: '-' }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.job-applications.update', $application) }}" class="d-flex gap-2 align-items-center">
                                @csrf @method('PUT')
                                <select name="status" class="form-select form-select-sm" style="min-width:150px;">
                                    @foreach($statusLabels as $key => $label)
                                        <option value="{{ $key }}" {{ $application->status === $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="admin_note" class="form-control form-control-sm" value="{{ $application->admin_note }}" placeholder="Note">
                                @can('jobapplications.update')<button class="btn btn-sm btn-primary">Save</button>@endcan
                            </form>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="btn btn-sm btn-outline-secondary">View Resume</a>
                        </td>
                        <td>
                            @can('jobapplications.delete')
                            <form method="POST" action="{{ route('admin.job-applications.destroy', $application) }}" onsubmit="return confirm('Delete this application?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No applications found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $applications->links() }}</div>
</div>
@endsection
