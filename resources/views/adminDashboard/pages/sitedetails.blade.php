@extends('adminDashboard.index')
@section('adminDashboard.content')
<div class="dashboard-main-body">
  <!-- Breadcrumb -->
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Website Settings</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="{{ route('index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Settings</li>
    </ul>
  </div>

  <!-- Success/Error Messages -->
  @if(session('success'))
  <div class="alert alert-success bg-success-100 text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-3 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between" role="alert">
    <div class="d-flex align-items-center gap-2">
      <iconify-icon icon="solar:check-circle-bold" class="icon text-xl"></iconify-icon>
      {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-3 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between" role="alert">
    <div class="d-flex align-items-center gap-2">
      <iconify-icon icon="solar:danger-circle-bold" class="icon text-xl"></iconify-icon>
      {{ session('error') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @if($errors->any())
  <div class="alert alert-danger bg-danger-100 text-danger-600 border-danger-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-3 radius-4" role="alert">
    <h6 class="fw-semibold mb-2">Please fix the following errors:</h6>
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- Settings Form -->
  <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row gy-4">
      <!-- Basic Settings -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Basic Website Information</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <!-- Site Name -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Site Name <span class="text-danger-600">*</span>
                </label>
                <input type="text" name="site_name" 
                       class="form-control radius-8 @error('site_name') is-invalid @enderror" 
                       value="{{ old('site_name', $settings->site_name?? '') }}" 
                       placeholder="Enter site name" required>
                @error('site_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Site Tagline -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Site Tagline</label>
                <input type="text" name="site_tagline" 
                       class="form-control radius-8 @error('site_tagline') is-invalid @enderror" 
                       value="{{ old('site_tagline', $settings->site_tagline?? '') }}" 
                       placeholder="Enter site tagline">
                @error('site_tagline')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Site Logo -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Site Logo <span class="text-danger-600">*</span>
                </label>
                <input class="form-control radius-8 @error('site_logo') is-invalid @enderror" 
                       type="file" name="site_logo" id="siteLogoInput" accept="image/*" 
                       onchange="previewImage(event, 'logoPreview')">
                <small class="text-secondary-light">Recommended size: 200x60px (PNG, JPG, SVG)</small>
                @error('site_logo')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                <!-- Current Logo -->
                @if($settings->site_logo ?? '')
                <div class="mt-3">
                  <p class="mb-2 fw-medium">Current Logo:</p>
                  <img src="{{ asset('storage/' . $settings->site_logo?? '') }}" alt="Current Logo" 
                       class="border rounded p-2 bg-neutral-50" style="max-width: 200px; max-height: 100px;">
                </div>
                @endif
                
                <!-- Preview -->
                <div id="logoPreview" class="mt-3" style="display: none;">
                  <p class="mb-2 fw-medium text-success-600">New Logo Preview:</p>
                  <img src="" alt="Logo Preview" class="border rounded p-2" style="max-width: 200px; max-height: 100px;">
                </div>
              </div>

              <!-- Site Icon/Favicon -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Site Icon (Favicon)
                </label>
                <input class="form-control radius-8 @error('site_icon') is-invalid @enderror" 
                       type="file" name="site_icon" id="siteIconInput" accept="image/*" 
                       onchange="previewImage(event, 'iconPreview')">
                <small class="text-secondary-light">Recommended size: 32x32px or 64x64px (PNG, ICO)</small>
                @error('site_icon')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                <!-- Current Icon -->
                @if($settings->site_icon ?? '')
                <div class="mt-3">
                  <p class="mb-2 fw-medium">Current Icon:</p>
                  <img src="{{ asset('storage/' . $settings->site_icon?? '') }}" alt="Current Icon" 
                       class="border rounded p-2 bg-neutral-50" style="max-width: 64px; max-height: 64px;">
                </div>
                @endif
                
                <!-- Preview -->
                <div id="iconPreview" class="mt-3" style="display: none;">
                  <p class="mb-2 fw-medium text-success-600">New Icon Preview:</p>
                  <img src="" alt="Icon Preview" class="border rounded p-2" style="max-width: 64px; max-height: 64px;">
                </div>
              </div>

              <!-- Site Email -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Site Email <span class="text-danger-600">*</span>
                </label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="mynaui:envelope"></iconify-icon>
                  </span>
                  <input type="email" name="site_email" 
                         class="form-control flex-grow-1 @error('site_email') is-invalid @enderror" 
                         value="{{ old('site_email', $settings->site_email?? '') }}" 
                         placeholder="info@yoursite.com" required>
                  @error('site_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Site Phone -->
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Site Phone</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="ph:phone-fill"></iconify-icon>
                  </span>
                  <input type="text" name="site_phone" 
                         class="form-control flex-grow-1 @error('site_phone') is-invalid @enderror" 
                         value="{{ old('site_phone', $settings->site_phone?? '') }}" 
                         placeholder="+1 (555) 000-0000">
                  @error('site_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Site Address -->
              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Site Address</label>
                <input type="text" name="site_address" 
                       class="form-control radius-8 @error('site_address') is-invalid @enderror" 
                       value="{{ old('site_address', $settings->site_address?? '') }}" 
                       placeholder="Enter full address">
                @error('site_address')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Site URL -->
              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Site URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">https://</span>
                  <input type="text" name="site_url" 
                         class="form-control @error('site_url') is-invalid @enderror" 
                         value="{{ old('site_url', str_replace(['https://', 'http://'], '', $settings->site_url?? '')) }}" 
                         placeholder="www.yoursite.com">
                  @error('site_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Site Description -->
              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Site Description</label>
                <textarea name="site_description" 
                          class="form-control radius-8 @error('site_description') is-invalid @enderror" 
                          rows="4" placeholder="Enter a brief description about your website...">{{ old('site_description', $settings->site_description?? '') }}</textarea>
                <small class="text-secondary-light">This description will be used for SEO meta tags.</small>
                @error('site_description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Social Media Links -->
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Social Media Links</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <!-- Facebook -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Facebook URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="ic:baseline-facebook"></iconify-icon>
                  </span>
                  <input type="url" name="facebook_url" 
                         class="form-control flex-grow-1 @error('facebook_url') is-invalid @enderror" 
                         value="{{ old('facebook_url', $settings->facebook_url ?? '') }}" 
                         placeholder="https://facebook.com/yourpage">
                  @error('facebook_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Twitter -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Twitter URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="prime:twitter"></iconify-icon>
                  </span>
                  <input type="url" name="twitter_url" 
                         class="form-control flex-grow-1 @error('twitter_url') is-invalid @enderror" 
                         value="{{ old('twitter_url', $settings->twitter_url ?? '') }}" 
                         placeholder="https://twitter.com/yourprofile">
                  @error('twitter_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- LinkedIn -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">LinkedIn URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="mdi:linkedin"></iconify-icon>
                  </span>
                  <input type="url" name="linkedin_url" 
                         class="form-control flex-grow-1 @error('linkedin_url') is-invalid @enderror" 
                         value="{{ old('linkedin_url', $settings->linkedin_url ?? '') }}" 
                         placeholder="https://linkedin.com/company/yourcompany">
                  @error('linkedin_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Instagram -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Instagram URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="mdi:instagram"></iconify-icon>
                  </span>
                  <input type="url" name="instagram_url" 
                         class="form-control flex-grow-1 @error('instagram_url') is-invalid @enderror" 
                         value="{{ old('instagram_url', $settings->instagram_url ?? '') }}" 
                         placeholder="https://instagram.com/yourprofile">
                  @error('instagram_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- YouTube -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">YouTube URL</label>
                <div class="input-group">
                  <span class="input-group-text bg-base">
                    <iconify-icon icon="mdi:youtube"></iconify-icon>
                  </span>
                  <input type="url" name="youtube_url" 
                         class="form-control flex-grow-1 @error('youtube_url') is-invalid @enderror" 
                         value="{{ old('youtube_url', $settings->youtube_url ?? '') }}" 
                         placeholder="https://youtube.com/c/yourchannel">
                  @error('youtube_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Additional Settings -->
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Additional Settings</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <!-- OG Image -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">OG Image (Social Share Image)</label>
                <input class="form-control radius-8 @error('og_image') is-invalid @enderror" 
                       type="file" name="og_image" id="ogImageInput" accept="image/*" 
                       onchange="previewImage(event, 'ogPreview')">
                <small class="text-secondary-light">Recommended size: 1200x630px (Used when sharing on social media)</small>
                @error('og_image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                @if($settings->og_image ?? '')
                <div class="mt-3">
                  <p class="mb-2 fw-medium">Current OG Image:</p>
                  <img src="{{ asset('storage/' . $settings->og_image ?? '') }}" alt="Current OG Image" 
                       class="border rounded p-2 bg-neutral-50" style="max-width: 100%; max-height: 200px;">
                </div>
                @endif
                
                <div id="ogPreview" class="mt-3" style="display: none;">
                  <p class="mb-2 fw-medium text-success-600">New OG Image Preview:</p>
                  <img src="" alt="OG Image Preview" class="border rounded p-2" style="max-width: 100%; max-height: 200px;">
                </div>
              </div>

              <!-- Footer Text -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Footer Copyright Text</label>
                <input type="text" name="footer_text" 
                       class="form-control radius-8 @error('footer_text') is-invalid @enderror" 
                       value="{{ old('footer_text', $settings->footer_text ?? '') }}" 
                       placeholder="© 2024 Your Company. All rights reserved.">
                @error('footer_text')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Timezone -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Timezone</label>
                <select name="timezone" class="form-select radius-8 @error('timezone') is-invalid @enderror">
                  <option value="">Select Timezone</option>
                  <option value="UTC" {{ old('timezone', $settings->timezone ?? '') == 'UTC' ? 'selected' : '' }}>UTC</option>
                  <option value="America/New_York" {{ old('timezone', $settings->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>Eastern Time (ET)</option>
                  <option value="America/Chicago" {{ old('timezone', $settings->timezone ?? '') == 'America/Chicago' ? 'selected' : '' }}>Central Time (CT)</option>
                  <option value="America/Denver" {{ old('timezone', $settings->timezone ?? '') == 'America/Denver' ? 'selected' : '' }}>Mountain Time (MT)</option>
                  <option value="America/Los_Angeles" {{ old('timezone', $settings->timezone ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time (PT)</option>
                  <option value="Europe/London" {{ old('timezone', $settings->timezone ?? '') == 'Europe/London' ? 'selected' : '' }}>London (GMT)</option>
                  <option value="Asia/Kolkata" {{ old('timezone', $settings->timezone ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>India (IST)</option>
                </select>
                @error('timezone')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Site Status -->
              <div class="col-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Site Status <span class="text-danger-600">*</span>
                </label>
                <select name="site_status" class="form-select radius-8 @error('site_status') is-invalid @enderror" required>
                  <option value="active" {{ old('site_status', $settings->site_status ?? '') == 'active' ? 'selected' : '' }}>
                    ✅ Active
                  </option>
                  <option value="maintenance" {{ old('site_status', $settings->site_status ?? '') == 'maintenance' ? 'selected' : '' }}>
                    🔧 Maintenance Mode
                  </option>
                  <option value="offline" {{ old('site_status', $settings->site_status ?? '') == 'offline' ? 'selected' : '' }}>
                    ❌ Offline
                  </option>
                </select>
                @error('site_status')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
    
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-base">
                    <h6 class="fw-semibold">Additional Settings</h6>
                </div>
                <div class="card-body p-24">
                    <label class="mt-1">Meta Title</label>
                    <textarea name="meta_title" class="form-control" rows="2">{{ $settings->meta_title }}</textarea>
                    <!-- Meta Keywords -->
                    <label class="mt-3">Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="2">{{ $settings->meta_keywords }}</textarea>
        
                    <!-- Meta Description -->
                    <label class="mt-3">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ $settings->meta_description }}</textarea>
        
                    <!-- Google Analytics -->
                    <label class="mt-3">Google Analytics Script</label>
                    <textarea name="google_analytics" class="form-control" rows="3">{{ $settings->google_analytics }}</textarea>
        
                    <!-- Google Verification -->
                    <label class="mt-3">Google Verification Code</label>
                    <textarea name="google_verification" class="form-control" rows="2">{{ $settings->google_verification }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header bg-base">
                    <h6 class="fw-semibold">Additional Settings</h6>
                </div>
                <div class="card-body p-24">
                     <!-- WhatsApp -->
                    <label class="mt-1">WhatsApp Number</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="{{ $settings->whatsapp_number }}">
        
                    <!-- Support Email -->
                    <label class="mt-3">Support Email</label>
                    <input type="email" name="support_email" class="form-control" value="{{ $settings->support_email }}">
        
                    <!-- Business Hours -->
                    <label class="mt-3">Business Hours</label>
                    <textarea name="business_hours" class="form-control" rows="2">{{ $settings->business_hours }}</textarea>
        
                    <!-- Google Map -->
                    <label class="mt-3">Google Map Embed Code</label>
                    <textarea name="google_map_embed" class="form-control" rows="2">{{ $settings->google_map_embed }}</textarea>
                </div>
            </div>
        </div>
      <!-- Submit Button -->
      <div class="col-lg-12">
        <div class="d-flex align-items-center justify-content-end gap-3">
          <button type="button" class="btn btn-outline-danger-600 radius-8 px-20 py-11" onclick="confirmReset()">
            <iconify-icon icon="solar:restart-bold" class="icon"></iconify-icon>
            Reset to Default
          </button>
          <button type="submit" class="btn btn-primary-600 radius-8 px-32 py-11">
            <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
            Save Settings
          </button>
        </div>
      </div>
    </div>
  </form>

  <!-- Hidden Reset Form -->
  <form id="resetForm" action="{{ route('settings.reset') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Image Preview Function
  function previewImage(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);
    const img = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
        img.src = e.target.result;
        preview.style.display = 'block';
      }
      
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.style.display = 'none';
      img.src = '';
    }
  }

  // Confirm Reset
  function confirmReset() {
    Swal.fire({
      title: 'Reset Settings?',
      text: "This will reset all settings to default values and delete uploaded images. This action cannot be undone!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, reset it!',
      cancelButtonText: 'Cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('resetForm').submit();
      }
    });
  }

  // Auto-dismiss alerts
  document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
      setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }, 5000);
    });
  });
</script>
@endpush
@endsection