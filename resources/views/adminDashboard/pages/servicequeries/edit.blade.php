@extends('adminDashboard.index')

@section('title', 'Edit Query')

@section('adminDashboard.content')
<style>
    .query-form-page {
        --qf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --qf-surface: rgba(255, 255, 255, 0.86);
        --qf-text: #0f172a;
        --qf-muted: #64748b;
        --qf-border: rgba(148, 163, 184, 0.28);
        --qf-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }

    html[data-theme=dark] .query-form-page {
        --qf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --qf-surface: rgba(15, 23, 42, 0.88);
        --qf-text: #e2e8f0;
        --qf-muted: #94a3b8;
        --qf-border: rgba(148, 163, 184, 0.24);
        --qf-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }

    .query-form-page {
        background: var(--qf-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .query-form-page .query-form-card {
        background: var(--qf-surface);
        border: 1px solid var(--qf-border);
        box-shadow: var(--qf-shadow);
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .query-form-page .query-form-card h3,
    .query-form-page .form-label,
    .query-form-page .form-control {
        color: var(--qf-text);
    }

    .query-form-page .form-control {
        border-color: var(--qf-border);
        background: rgba(255, 255, 255, 0.88);
        min-height: 44px;
    }

    html[data-theme=dark] .query-form-page .form-control {
        background: rgba(30, 41, 59, 0.8);
        border-color: #475569;
        color: #f8fafc;
    }

    .query-form-page .text-muted {
        color: var(--qf-muted) !important;
    }
</style>

<div class="container-fluid query-form-page">
    <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="card query-form-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Edit Query</h3>
                    <a href="{{ route('admin.servicecontact.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.servicecontact.update', $query) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name *</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $query->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $query->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact *</label>
                                <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact', $query->contact) }}" required>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Service *</label>
                                <input type="text" name="service" class="form-control @error('service') is-invalid @enderror" value="{{ old('service', $query->service) }}" required>
                                @error('service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2 flex-wrap mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Query
                            </button>
                            <a href="{{ route('admin.servicecontact.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
