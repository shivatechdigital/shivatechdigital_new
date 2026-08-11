@extends('adminDashboard.index')

@section('title', 'Edit Portfolio Project')

@section('adminDashboard.content')
<style>
    .pf-form-page {
        --tf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --tf-surface: rgba(255,255,255,0.86);
        --tf-text: #0f172a; --tf-muted: #64748b;
        --tf-border: rgba(148,163,184,0.28);
        --tf-shadow: 0 20px 42px rgba(15,23,42,0.12);
    }
    html[data-theme=dark] .pf-form-page {
        --tf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --tf-surface: rgba(15,23,42,0.88);
        --tf-text: #e2e8f0; --tf-muted: #94a3b8;
        --tf-border: rgba(148,163,184,0.24);
        --tf-shadow: 0 24px 48px rgba(2,6,23,0.55);
    }
    .pf-form-page { background: var(--tf-bg); border-radius: 18px; padding: 18px; }
    .pf-form-page .tf-card { background: var(--tf-surface); border: 1px solid var(--tf-border); box-shadow: var(--tf-shadow); border-radius: 16px; backdrop-filter: blur(10px); }
    .pf-form-page .form-label, .pf-form-page h3 { color: var(--tf-text); }
    .pf-form-page .form-control, .pf-form-page .form-select {
        border-color: var(--tf-border); background: rgba(255,255,255,0.88); min-height: 44px; color: var(--tf-text);
    }
    html[data-theme=dark] .pf-form-page .form-control,
    html[data-theme=dark] .pf-form-page .form-select { background: rgba(30,41,59,0.8); border-color: #475569; color: #f8fafc; }
    .pf-form-page .text-muted { color: var(--tf-muted) !important; }
    .current-img img { width: 100%; max-height: 160px; object-fit: cover; border-radius: 10px; border: 2px solid var(--tf-border); }
    .img-preview-box { display: none; margin-top: 12px; }
    .img-preview-box img { width: 100%; max-height: 160px; object-fit: cover; border-radius: 10px; border: 2px solid var(--tf-border); }
</style>

<div class="container-fluid pf-form-page">
    <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="card tf-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Edit Portfolio Project</h3>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Project Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $portfolio->title) }}" required>
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                    @foreach($categories as $key => $label)
                                        <option value="{{ $key }}" {{ old('category', $portfolio->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror">{{ old('description', $portfolio->description) }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Project Image</label>
                                @if($portfolio->image)
                                    <div class="current-img mb-2">
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                                        <div class="form-text text-muted mt-1">Current image. Upload new to replace.</div>
                                    </div>
                                @endif
                                <input type="file" name="image" id="projImageInput" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                <div class="form-text text-muted">PNG, JPG, WebP – max 3MB.</div>
                                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="img-preview-box" id="imgPreview">
                                    <img src="" id="imgPreviewImg" alt="Preview">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Client Name</label>
                                <input type="text" name="client_name" class="form-control"
                                    value="{{ old('client_name', $portfolio->client_name) }}" placeholder="e.g. Rahul Sharma">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Live Project URL</label>
                                <input type="url" name="project_url" class="form-control @error('project_url') is-invalid @enderror"
                                    value="{{ old('project_url', $portfolio->project_url) }}" placeholder="https://example.com">
                                @error('project_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Technologies Used</label>
                                <input type="text" name="technologies" class="form-control"
                                    value="{{ old('technologies', $portfolio->technologies ? implode(', ', $portfolio->technologies) : '') }}"
                                    placeholder="React, Laravel, MySQL (comma-separated)">
                                <div class="form-text text-muted">Comma-separated list.</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Display Order</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', $portfolio->order) }}" min="0">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Featured <span class="text-danger">*</span></label>
                                <select name="is_featured" class="form-select" required>
                                    <option value="1" {{ old('is_featured', $portfolio->is_featured ? '1' : '0') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_featured', $portfolio->is_featured ? '1' : '0') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select name="is_active" class="form-select" required>
                                    <option value="1" {{ old('is_active', $portfolio->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $portfolio->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-primary px-4">Update Project</button>
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('projImageInput').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('imgPreviewImg').src = e.target.result;
        document.getElementById('imgPreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
