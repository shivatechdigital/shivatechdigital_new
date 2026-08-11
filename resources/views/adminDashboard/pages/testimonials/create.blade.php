@extends('adminDashboard.index')

@section('title', 'Add Testimonial')

@section('adminDashboard.content')
<style>
    .testi-form-page {
        --tf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --tf-surface: rgba(255, 255, 255, 0.86);
        --tf-text: #0f172a;
        --tf-muted: #64748b;
        --tf-border: rgba(148, 163, 184, 0.28);
        --tf-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }
    html[data-theme=dark] .testi-form-page {
        --tf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --tf-surface: rgba(15, 23, 42, 0.88);
        --tf-text: #e2e8f0;
        --tf-muted: #94a3b8;
        --tf-border: rgba(148, 163, 184, 0.24);
        --tf-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }
    .testi-form-page { background: var(--tf-bg); border-radius: 18px; padding: 18px; }
    .testi-form-page .tf-card {
        background: var(--tf-surface); border: 1px solid var(--tf-border);
        box-shadow: var(--tf-shadow); border-radius: 16px; backdrop-filter: blur(10px);
    }
    .testi-form-page .form-label, .testi-form-page h3 { color: var(--tf-text); }
    .testi-form-page .form-control, .testi-form-page .form-select {
        border-color: var(--tf-border); background: rgba(255,255,255,0.88); min-height: 44px; color: var(--tf-text);
    }
    html[data-theme=dark] .testi-form-page .form-control,
    html[data-theme=dark] .testi-form-page .form-select {
        background: rgba(30,41,59,0.8); border-color: #475569; color: #f8fafc;
    }
    .testi-form-page .text-muted { color: var(--tf-muted) !important; }
    .star-rating-input { display: flex; gap: 6px; }
    .star-rating-input input[type=radio] { display: none; }
    .star-rating-input label { font-size: 1.6rem; cursor: pointer; color: #cbd5e1; transition: color .15s; }
    .star-rating-input input[type=radio]:checked ~ label { color: #cbd5e1; }
    .star-rating-input label:hover,
    .star-rating-input label:hover ~ label { color: #cbd5e1; }
    .star-rating-input input[type=radio]:checked + label,
    .star-rating-input input[type=radio]:checked + label ~ label { color: #f59e0b !important; }
    /* reverse trick for RTL star select */
    .star-rating-input { flex-direction: row-reverse; justify-content: flex-end; }
    .star-rating-input label:hover,
    .star-rating-input label:hover ~ label { color: #f59e0b; }
    .preview-photo-box { display: none; margin-top: 12px; }
    .preview-photo-box img { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--tf-border); }
</style>

<div class="container-fluid testi-form-page">
    <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="card tf-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Add Testimonial</h3>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            {{-- Client Name --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Client Name <span class="text-danger">*</span></label>
                                <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror"
                                    value="{{ old('client_name') }}" placeholder="e.g. Rahul Sharma" required>
                                @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Client Role --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Role / Designation</label>
                                <input type="text" name="client_role" class="form-control @error('client_role') is-invalid @enderror"
                                    value="{{ old('client_role') }}" placeholder="e.g. CEO">
                                @error('client_role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Company --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Company</label>
                                <input type="text" name="client_company" class="form-control @error('client_company') is-invalid @enderror"
                                    value="{{ old('client_company') }}" placeholder="e.g. ABC Pvt Ltd">
                                @error('client_company')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Service Type --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Service Type</label>
                                <select name="service_type" class="form-select @error('service_type') is-invalid @enderror">
                                    <option value="">— Select Service —</option>
                                    @foreach(['Web Development','Mobile App Development','UI/UX Design','E-commerce Development','Digital Marketing','SEO Services','Social Media Marketing','Content Marketing','Cloud Solutions','Branding','Graphic Design','Video Production','Maintenance & Support'] as $svc)
                                        <option value="{{ $svc }}" {{ old('service_type') === $svc ? 'selected' : '' }}>{{ $svc }}</option>
                                    @endforeach
                                </select>
                                @error('service_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Rating --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold">Rating <span class="text-danger">*</span></label>
                                <div class="star-rating-input">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                        <label for="star{{ $i }}" title="{{ $i }} star"><i class="fas fa-star"></i></label>
                                    @endfor
                                </div>
                                @error('rating')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            {{-- Review --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold">Review <span class="text-danger">*</span></label>
                                <textarea name="review" rows="4" class="form-control @error('review') is-invalid @enderror"
                                    placeholder="Write the client's review here…" required>{{ old('review') }}</textarea>
                                @error('review')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Photo --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Client Photo</label>
                                <input type="file" name="client_photo" id="clientPhotoInput" class="form-control @error('client_photo') is-invalid @enderror" accept="image/*">
                                <div class="form-text text-muted">PNG, JPG, WebP – max 2MB. Optional.</div>
                                @error('client_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="preview-photo-box" id="photoPreview">
                                    <img src="" id="photoPreviewImg" alt="Preview">
                                </div>
                            </div>

                            {{-- Order --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Display Order</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                                <div class="form-text text-muted">Lower number = shown first.</div>
                            </div>

                            {{-- Featured --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Featured on Home Page <span class="text-danger">*</span></label>
                                <select name="is_featured" class="form-select @error('is_featured') is-invalid @enderror" required>
                                    <option value="1" {{ old('is_featured', '0') == '1' ? 'selected' : '' }}>Yes – Show on Home</option>
                                    <option value="0" {{ old('is_featured', '0') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('is_featured')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                <select name="is_active" class="form-select @error('is_active') is-invalid @enderror" required>
                                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', '1') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-primary px-4">Save Testimonial</button>
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
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
document.getElementById('clientPhotoInput').addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('photoPreviewImg').src = e.target.result;
        document.getElementById('photoPreview').style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
