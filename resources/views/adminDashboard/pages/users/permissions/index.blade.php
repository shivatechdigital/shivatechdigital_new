@extends('adminDashboard.index')

@section('title', 'Give Permission')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Give Permission</h2>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Manage Roles</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.permissions.index') }}">
                <label class="form-label">Select Role</label>
                <div class="d-flex gap-2">
                    <select name="role_id" class="form-select" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $selectedRoleId === $role->id ? 'selected' : '' }}>{{ $role->display_name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Load</button>
                </div>
            </form>
        </div>
    </div>

    @if($selectedRole)
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Permissions for {{ $selectedRole->display_name }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.permissions.update', $selectedRole) }}">
                    @csrf
                    @foreach($permissions as $group => $groupPermissions)
                        <div class="mb-3 border rounded p-3">
                            <h6 class="mb-2">{{ $group }}</h6>
                            <div class="row">
                                @foreach($groupPermissions as $permission)
                                    <div class="col-md-4 mb-2">
                                        <label class="form-check-label d-flex align-items-center gap-2">
                                            <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, $assignedPermissionIds, true) ? 'checked' : '' }}>
                                            <span>{{ $permission->label }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Save / Update Permissions</button>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
