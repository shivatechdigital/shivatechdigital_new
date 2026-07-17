@extends('adminDashboard.index')

@section('adminDashboard.content')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Partner</h2>
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

            <form action="{{ route('partners.update', $partner) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Partner Name <span class="text-danger">*</span></label>
                        <input type="text" name="name"
                               class="form-control"
                               value="{{ old('name', $partner->name) }}"
                               required>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location"
                               class="form-control"
                               value="{{ old('location', $partner->location) }}">
                    </div>

                    <!-- Type -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Partner Type</label>
                        <input type="text" name="type"
                               class="form-control"
                               value="{{ old('type', $partner->type) }}">
                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $partner->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$partner->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Current Logo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Current Logo</label><br>
                        @if($partner->logo)
                            <img src="{{ asset('storage/'.$partner->logo) }}"
                                 width="80"
                                 class="rounded bg-light p-2">
                        @else
                            <span class="text-muted">No logo uploaded</span>
                        @endif
                    </div>

                    <!-- New Logo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Change Logo</label>
                        <input type="file" name="logo" class="form-control"
                               accept="image/png,image/jpeg,image/svg+xml,image/webp">
                        <small class="text-muted">
                            Leave empty to keep existing logo
                        </small>
                    </div>
                </div>

                <!-- Submit -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Partner
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
