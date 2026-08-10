@extends('adminDashboard.index')

@section('title', 'Edit Role')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Role</h5>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Display Name *</label>
                    <input type="text" name="display_name" class="form-control" value="{{ old('display_name', $role->display_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Role Key *</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" {{ $role->name === 'admin' ? 'readonly' : '' }} required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ old('description', $role->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Role</button>
            </form>
        </div>
    </div>
</div>
@endsection
