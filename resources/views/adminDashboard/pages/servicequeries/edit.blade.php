@extends('adminDashboard.index')

@section('title', 'Edit Query')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Query</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.servicecontact.update', $query) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $query->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Name *</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                               value="{{ old('name', $query->name) }}" required>
                                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                               value="{{ old('email', $query->email) }}" required>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Contact *</label>
                                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" 
                                               value="{{ old('contact', $query->contact) }}" required>
                                        @error('contact')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Services *</label>
                                        <input type="text" name="service" class="form-control @error('service') is-invalid @enderror" 
                                               value="{{ old('service', $query->service) }}" required>
                                        @error('service')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Query
                            </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection