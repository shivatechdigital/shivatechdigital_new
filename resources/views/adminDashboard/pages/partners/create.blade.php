@extends('adminDashboard.index')

@section('title', 'Add Partner')

@section('adminDashboard.content')
<style>
    .partner-form-page {
        --pf-bg: linear-gradient(130deg, #eff6ff 0%, #f8fafc 45%, #eef2ff 100%);
        --pf-surface: rgba(255, 255, 255, 0.86);
        --pf-text: #0f172a;
        --pf-muted: #64748b;
        --pf-border: rgba(148, 163, 184, 0.28);
        --pf-shadow: 0 20px 42px rgba(15, 23, 42, 0.12);
    }

    html[data-theme=dark] .partner-form-page {
        --pf-bg: radial-gradient(circle at top, #1e293b 0%, #0f172a 48%, #111827 100%);
        --pf-surface: rgba(15, 23, 42, 0.88);
        --pf-text: #e2e8f0;
        --pf-muted: #94a3b8;
        --pf-border: rgba(148, 163, 184, 0.24);
        --pf-shadow: 0 24px 48px rgba(2, 6, 23, 0.55);
    }

    .partner-form-page {
        background: var(--pf-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .partner-form-page .partner-form-card {
        background: var(--pf-surface);
        border: 1px solid var(--pf-border);
        box-shadow: var(--pf-shadow);
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .partner-form-page .partner-form-card h3,
    .partner-form-page .form-label,
    .partner-form-page .form-control,
    .partner-form-page .form-select,
    .partner-form-page .form-check-label {
        color: var(--pf-text);
    }

    .partner-form-page .form-control,
    .partner-form-page .form-select {
        border-color: var(--pf-border);
        background: rgba(255, 255, 255, 0.88);
        min-height: 44px;
    }

    html[data-theme=dark] .partner-form-page .form-control,
    html[data-theme=dark] .partner-form-page .form-select {
        background: rgba(30, 41, 59, 0.8);
        border-color: #475569;
        color: #f8fafc;
    }

    .partner-form-page .text-muted {
        color: var(--pf-muted) !important;
    }

    .selected-logo-box {
        display: none;
        margin-top: 12px;
        border: 1px dashed var(--pf-border);
        border-radius: 12px;
        padding: 10px;
    }

    .selected-logo-box img {
        width: 100%;
        max-height: 220px;
        object-fit: contain;
        border-radius: 10px;
        background: rgba(248, 250, 252, 0.5);
    }

    .selected-logo-actions {
        margin-top: 10px;
        display: flex;
        justify-content: flex-end;
    }
</style>

<div class="container-fluid partner-form-page">
    <div class="row">
        <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="card partner-form-card">
                <div class="card-header bg-transparent border-0 pb-0 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Add New Partner</h3>
                    <a href="{{ route('partners.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body pt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data" id="createPartnerForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Partner Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Google" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Global / India">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Partner Type</label>
                                <input type="text" name="type" class="form-control" value="{{ old('type') }}" placeholder="e.g. Technology Partner">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', '1') === '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label">Partner Logo</label>
                                <input type="file" id="partnerLogoInput" name="logo" class="form-control" accept="image/png,image/jpeg,image/svg+xml,image/webp">
                                <small class="text-muted">PNG, JPG, SVG, WEBP allowed</small>

                                <div class="selected-logo-box" id="selectedLogoBox">
                                    <img id="selectedLogoPreview" alt="Selected partner logo preview">
                                    <div class="selected-logo-actions">
                                        <button type="button" class="btn btn-outline-danger btn-sm" id="clearSelectedLogoBtn">
                                            <i class="fas fa-trash"></i> Remove Selected Logo
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 flex-wrap mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Partner
                            </button>
                            <a href="{{ route('partners.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const logoInput = document.getElementById('partnerLogoInput');
    const previewBox = document.getElementById('selectedLogoBox');
    const previewImage = document.getElementById('selectedLogoPreview');
    const clearButton = document.getElementById('clearSelectedLogoBtn');

    function resetPreview() {
        previewImage.removeAttribute('src');
        previewBox.style.display = 'none';
    }

    logoInput?.addEventListener('change', function (event) {
        const file = event.target.files && event.target.files[0];
        if (!file) {
            resetPreview();
            return;
        }

        const reader = new FileReader();
        reader.onload = function (loadEvent) {
            previewImage.src = loadEvent.target.result;
            previewBox.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });

    clearButton?.addEventListener('click', function () {
        logoInput.value = '';
        resetPreview();
    });
});
</script>
@endsection
