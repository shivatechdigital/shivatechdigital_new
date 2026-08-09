@extends('adminDashboard.index')

@section('title', 'Edit Tags')

@section('adminDashboard.content')
<style>
    .tag-form-page {
        --tf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --tf-surface: rgba(255, 255, 255, 0.86);
        --tf-text: #0f172a;
        --tf-muted: #64748b;
        --tf-border: rgba(148, 163, 184, 0.28);
        --tf-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }

    html[data-theme=dark] .tag-form-page {
        --tf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --tf-surface: rgba(15, 23, 42, 0.88);
        --tf-text: #e2e8f0;
        --tf-muted: #94a3b8;
        --tf-border: rgba(148, 163, 184, 0.24);
        --tf-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }

    .tag-form-page {
        background: var(--tf-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .tag-form-page .tag-form-card {
        background: var(--tf-surface);
        border: 1px solid var(--tf-border);
        box-shadow: var(--tf-shadow);
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .tag-form-page .tag-form-card h3,
    .tag-form-page .form-label,
    .tag-form-page .form-control,
    .tag-form-page .slug-preview {
        color: var(--tf-text);
    }

    .tag-form-page .form-control {
        border-color: var(--tf-border);
        background: rgba(255, 255, 255, 0.88);
        min-height: 44px;
    }

    html[data-theme=dark] .tag-form-page .form-control {
        background: rgba(30, 41, 59, 0.8);
        border-color: #475569;
        color: #f8fafc;
    }

    .tag-form-page .text-muted {
        color: var(--tf-muted) !important;
    }
</style>

<div class="container-fluid tag-form-page">
    <div class="row">
        <div class="col-lg-7 col-md-8 mx-auto">
            <div class="card tag-form-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Edit Tag</h3>
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Tag Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tag->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control slug-preview" value="{{ $tag->slug }}" disabled>
                            <small class="text-muted">Slug is auto-generated from name</small>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Tag
                            </button>
                            <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
