@extends('adminDashboard.index')

@section('adminDashboard.content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add New Partner</h2>
        <a href="{{ route('partners.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card -->
    <div class="card">
        <div class="card-body">

            <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Partner Name <span class="text-danger">*</span></label>
                        <input type="text" name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="e.g. Google"
                               required>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location"
                               class="form-control"
                               value="{{ old('location') }}"
                               placeholder="e.g. Global / India">
                    </div>

                    <!-- Type -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Partner Type</label>
                        <input type="text" name="type"
                               class="form-control"
                               value="{{ old('type') }}"
                               placeholder="e.g. Technology Partner">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Logo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Partner Logo</label>
                        <input type="file" name="logo" class="form-control"
                               accept="image/png,image/jpeg,image/svg+xml,image/webp">
                        <small class="text-muted">
                            PNG, JPG, SVG, WEBP allowed
                        </small>
                    </div>
                </div>

                <!-- Submit -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Partner
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
