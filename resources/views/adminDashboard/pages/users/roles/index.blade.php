@extends('adminDashboard.index')

@section('title', 'Roles')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Roles</h2>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-info">Give Permission</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Create Role</h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Display Name *</label>
                            <input type="text" name="display_name" class="form-control" value="{{ old('display_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role Key (optional)</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. content_writer">
                            <small class="text-muted">Auto generated if empty</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Role</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.roles.index') }}" class="mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search roles...">
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Key</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{ $role->display_name }}</td>
                                        <td><code>{{ $role->name }}</code></td>
                                        <td>{{ $role->permissions_count }}</td>
                                        <td>
                                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center">No roles found</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
