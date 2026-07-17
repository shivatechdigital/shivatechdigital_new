@extends('adminDashboard.index')

@section('adminDashboard.content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Partners</h2>
        <a href="{{ route('partners.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Partner
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Card -->
    <div class="card">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($partners as $partner)
                        <tr>
                            <!-- Logo -->
                            <td>
                                @if($partner->logo)
                                    <img src="{{ asset('storage/'.$partner->logo) }}"
                                         width="50" height="50"
                                         class="rounded bg-light p-1">
                                @else
                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                         style="width:50px;height:50px;">
                                        <i class="fas fa-building text-white"></i>
                                    </div>
                                @endif
                            </td>

                            <!-- Name -->
                            <td>
                                <strong>{{ $partner->name }}</strong><br>
                                <small class="text-muted">{{ $partner->slug }}</small>
                            </td>

                            <!-- Type -->
                            <td>
                                <span class="badge bg-info">
                                    {{ $partner->type ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Location -->
                            <td>{{ $partner->location ?? '—' }}</td>

                            <!-- Status -->
                            <td>
                                @if($partner->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <!-- Date -->
                            <td>{{ $partner->created_at->format('M d, Y') }}</td>

                            <!-- Actions -->
                            <td>
                                <a href="{{ route('partners.edit', $partner) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('partners.destroy', $partner) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No partners found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $partners->links() }}

        </div>
    </div>
</div>
@endsection
