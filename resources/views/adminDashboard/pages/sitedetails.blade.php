@extends('adminDashboard.index')

@section('adminDashboard.content')
<style>
    .settings-hero {
        background: linear-gradient(135deg, #0f172a, #1e293b 45%, #155e75);
        border-radius: 16px;
        padding: 18px;
        color: #e2e8f0;
        margin-bottom: 20px;
    }

    .settings-card {
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.06);
        background: #ffffff;
    }

    .settings-card .card-header {
        border-bottom: 1px solid #eef2f7;
        background: linear-gradient(90deg, #f8fafc, #f1f5f9);
        border-radius: 14px 14px 0 0;
        padding: 14px 20px;
    }

    .field-tip {
        font-size: 12px;
        color: #64748b;
        margin-top: 6px;
        display: block;
    }

    .preview-box {
        border: 1px dashed #cbd5e1;
        border-radius: 10px;
        padding: 12px;
        background: #f8fafc;
    }

    .section-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 11px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: rgba(148, 163, 184, 0.18);
        color: #e2e8f0;
    }

    .meta-note {
        border-left: 4px solid #0ea5e9;
        background: #f0f9ff;
        color: #0f172a;
        padding: 10px 12px;
        border-radius: 8px;
        font-size: 13px;
    }
</style>

<div class="dashboard-main-body">
    <div class="settings-hero d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
            <div class="section-chip mb-2">
                <iconify-icon icon="solar:settings-bold"></iconify-icon>
                Site Control Center
            </div>
            <h4 class="mb-1 text-white">Website Settings</h4>
            <p class="mb-0" style="color:#cbd5e1;">Brand, SEO, social and support details in one place.</p>
        </div>
        <a href="{{ route('index') }}" class="btn btn-light btn-sm radius-8">
            <iconify-icon icon="solar:home-smile-angle-outline" class="icon"></iconify-icon>
            Back to Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center gap-2 mb-3" role="alert">
            <iconify-icon icon="solar:check-circle-bold" class="icon text-xl"></iconify-icon>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger d-flex align-items-center gap-2 mb-3" role="alert">
            <iconify-icon icon="solar:danger-circle-bold" class="icon text-xl"></iconify-icon>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-3" role="alert">
            <h6 class="fw-semibold mb-2">Please fix the following errors:</h6>
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <div class="col-12">
                <div class="settings-card card">
                    <div class="card-header">
                        <h6 class="mb-0 fw-semibold">Basic Website Information</h6>
                    </div>
                    <div class="card-body p-20">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Site Name <span class="text-danger">*</span></label>
                                <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" value="{{ old('site_name', $settings->site_name ?? '') }}" placeholder="Enter site name" required>
                                @error('site_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Site Tagline</label>
                                <input type="text" name="site_tagline" class="form-control @error('site_tagline') is-invalid @enderror" value="{{ old('site_tagline', $settings->site_tagline ?? '') }}" placeholder="Enter site tagline">
                                @error('site_tagline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Site Email <span class="text-danger">*</span></label>
                                <input type="email" name="site_email" class="form-control @error('site_email') is-invalid @enderror" value="{{ old('site_email', $settings->site_email ?? '') }}" placeholder="info@example.com" required>
                                @error('site_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Support Email</label>
                                <input type="email" name="support_email" class="form-control @error('support_email') is-invalid @enderror" value="{{ old('support_email', $settings->support_email ?? '') }}" placeholder="support@example.com">
                                @error('support_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Site Phone</label>
                                <input type="text" name="site_phone" class="form-control @error('site_phone') is-invalid @enderror" value="{{ old('site_phone', $settings->site_phone ?? '') }}" placeholder="+91 9876543210">
                                @error('site_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">WhatsApp Number</label>
                                <input type="text" name="whatsapp_number" class="form-control @error('whatsapp_number') is-invalid @enderror" value="{{ old('whatsapp_number', $settings->whatsapp_number ?? '') }}" placeholder="+91 9876543210">
                                @error('whatsapp_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Site Address</label>
                                <input type="text" name="site_address" class="form-control @error('site_address') is-invalid @enderror" value="{{ old('site_address', $settings->site_address ?? '') }}" placeholder="Enter business address">
                                @error('site_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Site URL</label>
                                <input type="url" name="site_url" class="form-control @error('site_url') is-invalid @enderror" value="{{ old('site_url', $settings->site_url ?? '') }}" placeholder="https://example.com">
                                <span class="field-tip">Use complete URL with https://</span>
                                @error('site_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Timezone</label>
                                <select name="timezone" class="form-select @error('timezone') is-invalid @enderror">
                                    <option value="">Select Timezone</option>
                                    <option value="UTC" {{ old('timezone', $settings->timezone ?? '') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                    <option value="America/New_York" {{ old('timezone', $settings->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>Eastern Time (ET)</option>
                                    <option value="America/Chicago" {{ old('timezone', $settings->timezone ?? '') == 'America/Chicago' ? 'selected' : '' }}>Central Time (CT)</option>
                                    <option value="America/Denver" {{ old('timezone', $settings->timezone ?? '') == 'America/Denver' ? 'selected' : '' }}>Mountain Time (MT)</option>
                                    <option value="America/Los_Angeles" {{ old('timezone', $settings->timezone ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time (PT)</option>
                                    <option value="Europe/London" {{ old('timezone', $settings->timezone ?? '') == 'Europe/London' ? 'selected' : '' }}>London (GMT)</option>
                                    <option value="Asia/Kolkata" {{ old('timezone', $settings->timezone ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>India (IST)</option>
                                </select>
                                @error('timezone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Site Description</label>
                                <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" rows="4" placeholder="Brief site description for homepage and SEO">{{ old('site_description', $settings->site_description ?? '') }}</textarea>
                                @error('site_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="settings-card card h-100">
                    <div class="card-header">
                        <h6 class="mb-0 fw-semibold">Brand Assets</h6>
                    </div>
                    <div class="card-body p-20">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Site Logo</label>
                                <input class="form-control @error('site_logo') is-invalid @enderror" type="file" name="site_logo" accept="image/*" onchange="previewImage(event, 'logoPreview')">
                                <span class="field-tip">Recommended: 200x60, png/jpg/svg</span>
                                @error('site_logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="preview-box mt-2">
                                    <p class="mb-1 fw-medium">Current</p>
                                    @if($settings->site_logo ?? false)
                                        <img src="{{ asset('storage/' . ($settings->site_logo ?? '')) }}" alt="Site Logo" style="max-width: 220px; max-height: 90px;">
                                    @else
                                        <span class="text-secondary-light">No logo uploaded</span>
                                    @endif
                                </div>
                                <div id="logoPreview" class="preview-box mt-2" style="display:none;">
                                    <p class="mb-1 fw-medium text-success">New preview</p>
                                    <img src="" alt="Logo Preview" style="max-width: 220px; max-height: 90px;">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">Site Icon (Favicon)</label>
                                <input class="form-control @error('site_icon') is-invalid @enderror" type="file" name="site_icon" accept="image/*" onchange="previewImage(event, 'iconPreview')">
                                <span class="field-tip">Recommended: 32x32 or 64x64, png/ico/jpg</span>
                                @error('site_icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="preview-box mt-2">
                                    <p class="mb-1 fw-medium">Current</p>
                                    @if($settings->site_icon ?? false)
                                        <img src="{{ asset('storage/' . ($settings->site_icon ?? '')) }}" alt="Site Icon" style="max-width: 64px; max-height: 64px;">
                                    @else
                                        <span class="text-secondary-light">No favicon uploaded</span>
                                    @endif
                                </div>
                                <div id="iconPreview" class="preview-box mt-2" style="display:none;">
                                    <p class="mb-1 fw-medium text-success">New preview</p>
                                    <img src="" alt="Icon Preview" style="max-width: 64px; max-height: 64px;">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">OG Image</label>
                                <input class="form-control @error('og_image') is-invalid @enderror" type="file" name="og_image" accept="image/*" onchange="previewImage(event, 'ogPreview')">
                                <span class="field-tip">Recommended: 1200x630 for social sharing</span>
                                @error('og_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <div class="preview-box mt-2">
                                    <p class="mb-1 fw-medium">Current</p>
                                    @if($settings->og_image ?? false)
                                        <img src="{{ asset('storage/' . ($settings->og_image ?? '')) }}" alt="OG Image" style="max-width: 100%; max-height: 180px;">
                                    @else
                                        <span class="text-secondary-light">No OG image uploaded</span>
                                    @endif
                                </div>
                                <div id="ogPreview" class="preview-box mt-2" style="display:none;">
                                    <p class="mb-1 fw-medium text-success">New preview</p>
                                    <img src="" alt="OG Preview" style="max-width: 100%; max-height: 180px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="settings-card card h-100 mb-4">
                    <div class="card-header">
                        <h6 class="mb-0 fw-semibold">Social Media Links</h6>
                    </div>
                    <div class="card-body p-20">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Facebook URL</label>
                                <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $settings->facebook_url ?? '') }}" placeholder="https://facebook.com/yourpage">
                                @error('facebook_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Twitter URL</label>
                                <input type="url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" value="{{ old('twitter_url', $settings->twitter_url ?? '') }}" placeholder="https://x.com/yourprofile">
                                @error('twitter_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url', $settings->linkedin_url ?? '') }}" placeholder="https://linkedin.com/company/yourcompany">
                                @error('linkedin_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Instagram URL</label>
                                <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $settings->instagram_url ?? '') }}" placeholder="https://instagram.com/yourprofile">
                                @error('instagram_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">YouTube URL</label>
                                <input type="url" name="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror" value="{{ old('youtube_url', $settings->youtube_url ?? '') }}" placeholder="https://youtube.com/@yourchannel">
                                @error('youtube_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="settings-card card h-100">
                    <div class="card-header">
                        <h6 class="mb-0 fw-semibold">SEO and Tracking</h6>
                    </div>
                    <div class="card-body p-20">
                        <div class="meta-note mb-3">Meta fields help search engines and social networks show better snippets for your website.</div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $settings->meta_title ?? '') }}" placeholder="Default title for pages">
                                @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" rows="2" placeholder="keyword1, keyword2, keyword3">{{ old('meta_keywords', $settings->meta_keywords ?? '') }}</textarea>
                                @error('meta_keywords')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Meta Description</label>
                                <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="3" placeholder="Short description for search results">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>
                                @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Google Analytics Script</label>
                                <textarea name="google_analytics" class="form-control @error('google_analytics') is-invalid @enderror" rows="4" placeholder="Paste analytics script or GTM snippet">{{ old('google_analytics', $settings->google_analytics ?? '') }}</textarea>
                                @error('google_analytics')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Google Verification Code</label>
                                <textarea name="google_verification" class="form-control @error('google_verification') is-invalid @enderror" rows="2" placeholder="google-site-verification=...">{{ old('google_verification', $settings->google_verification ?? '') }}</textarea>
                                @error('google_verification')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="settings-card card">
                    <div class="card-header">
                        <h6 class="mb-0 fw-semibold">Operations and Footer</h6>
                    </div>
                    <div class="card-body p-20">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Site Status <span class="text-danger">*</span></label>
                                <select name="site_status" class="form-select @error('site_status') is-invalid @enderror" required>
                                    <option value="active" {{ old('site_status', $settings->site_status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="maintenance" {{ old('site_status', $settings->site_status ?? '') == 'maintenance' ? 'selected' : '' }}>Maintenance Mode</option>
                                    <option value="offline" {{ old('site_status', $settings->site_status ?? '') == 'offline' ? 'selected' : '' }}>Offline</option>
                                </select>
                                @error('site_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Footer Copyright Text</label>
                                <input type="text" name="footer_text" class="form-control @error('footer_text') is-invalid @enderror" value="{{ old('footer_text', $settings->footer_text ?? '') }}" placeholder="Copyright text for footer">
                                @error('footer_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Business Hours</label>
                                <textarea name="business_hours" class="form-control @error('business_hours') is-invalid @enderror" rows="2" placeholder="Mon-Sat: 10:00 AM - 7:00 PM">{{ old('business_hours', $settings->business_hours ?? '') }}</textarea>
                                @error('business_hours')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Google Map Embed Code</label>
                                <textarea name="google_map_embed" class="form-control @error('google_map_embed') is-invalid @enderror" rows="2" placeholder="Paste iframe embed code">{{ old('google_map_embed', $settings->google_map_embed ?? '') }}</textarea>
                                @error('google_map_embed')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end gap-3 mb-2">
                    <button type="button" class="btn btn-outline-danger radius-8 px-20 py-11" onclick="confirmReset()">
                        <iconify-icon icon="solar:restart-bold" class="icon"></iconify-icon>
                        Reset to Default
                    </button>
                    <button type="submit" class="btn btn-primary radius-8 px-28 py-11">
                        <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
                        Save Settings
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form id="resetForm" action="{{ route('settings.reset') }}" method="POST" style="display:none;">
        @csrf
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function previewImage(event, previewId) {
        const input = event.target;
        const preview = document.getElementById(previewId);
        if (!preview) {
            return;
        }

        const img = preview.querySelector('img');
        if (!img) {
            return;
        }

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
            img.src = '';
        }
    }

    function confirmReset() {
        Swal.fire({
            title: 'Reset settings?',
            text: 'This will remove uploaded files and restore default values. This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#0ea5e9',
            confirmButtonText: 'Yes, reset',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetForm').submit();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    });
</script>
@endpush
@endsection
