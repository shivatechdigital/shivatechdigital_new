@extends('adminDashboard.index')
@section('adminDashboard.content')
<div class="dashboard-main-body about-glass-page" data-server-tab="{{ old('active_tab', session('active_tab', '')) }}">
  <!-- Breadcrumb -->
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">About Page Management</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="{{ route('index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">About Page</li>
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

  <!-- Tabs Navigation -->
<div class="tabs-wrapper mb-24">
  <ul class="nav nav-pills-modern" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-header-tab" data-bs-toggle="pill" data-bs-target="#pills-header" type="button" role="tab" aria-controls="pills-header" aria-selected="true">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:home-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Page Header</span>
          <span class="nav-link-desc">Title & Statistics</span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-content-tab" data-bs-toggle="pill" data-bs-target="#pills-content" type="button" role="tab" aria-controls="pills-content">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:document-text-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">About Content</span>
          <span class="nav-link-desc">Main Section</span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-founder-tab" data-bs-toggle="pill" data-bs-target="#pills-founder" type="button" role="tab" aria-controls="pills-founder">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:user-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Founder</span>
          <span class="nav-link-desc">Message & Bio</span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-mission-tab" data-bs-toggle="pill" data-bs-target="#pills-mission" type="button" role="tab" aria-controls="pills-mission">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:target-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Mission & Vision</span>
          <span class="nav-link-desc">Our Purpose</span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-values-tab" data-bs-toggle="pill" data-bs-target="#pills-values" type="button" role="tab" aria-controls="pills-values">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:star-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Core Values</span>
          <span class="nav-link-desc">
            <span class="badge bg-primary-600 text-white px-2 py-1 text-xs radius-4">{{ $coreValues->count() }}</span>
          </span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-team-tab" data-bs-toggle="pill" data-bs-target="#pills-team" type="button" role="tab" aria-controls="pills-team">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Team Members</span>
          <span class="nav-link-desc">
            <span class="badge bg-success-600 text-white px-2 py-1 text-xs radius-4">{{ $teamMembers->count() }}</span>
          </span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>

    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-timeline-tab" data-bs-toggle="pill" data-bs-target="#pills-timeline" type="button" role="tab" aria-controls="pills-timeline">
        <div class="nav-link-icon">
          <iconify-icon icon="solar:calendar-bold-duotone" class="icon"></iconify-icon>
        </div>
        <div class="nav-link-content">
          <span class="nav-link-title">Timeline</span>
          <span class="nav-link-desc">
            <span class="badge bg-warning-600 text-white px-2 py-1 text-xs radius-4">{{ $timelineItems->count() }}</span>
          </span>
        </div>
        <div class="nav-link-indicator"></div>
      </button>
    </li>
  </ul>
</div>
  <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="active_tab" id="activeTabInput" value="pills-header">
    
    <div class="tab-content" id="pills-tabContent">
      <!-- Page Header Tab -->
      <div class="tab-pane fade show active" id="pills-header" role="tabpanel">
        <div class="card">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Page Header Section</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Page Badge <span class="text-danger-600">*</span>
                </label>
                <input type="text" name="page_badge" class="form-control radius-8" value="{{ old('page_badge', $about->page_badge) }}" required>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Page Title <span class="text-danger-600">*</span>
                </label>
                <input type="text" name="page_title" class="form-control radius-8" value="{{ old('page_title', $about->page_title) }}" required>
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Page Subtitle</label>
                <textarea name="page_subtitle" class="form-control radius-8" rows="3">{{ old('page_subtitle', $about->page_subtitle) }}</textarea>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Years of Experience <span class="text-danger-600">*</span>
                </label>
                <input type="number" name="years_experience" class="form-control radius-8" value="{{ old('years_experience', $about->years_experience) }}" required>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Projects Delivered <span class="text-danger-600">*</span>
                </label>
                <input type="number" name="projects_delivered" class="form-control radius-8" value="{{ old('projects_delivered', $about->projects_delivered) }}" required>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                  Team Members Count <span class="text-danger-600">*</span>
                </label>
                <input type="number" name="team_members_count" class="form-control radius-8" value="{{ old('team_members_count', $about->team_members_count) }}" required>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- About Content Tab -->
      <div class="tab-pane fade" id="pills-content" role="tabpanel">
        <div class="card">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">About Content Section</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Section Label</label>
                <input type="text" name="section_label" class="form-control radius-8" value="{{ old('section_label', $about->section_label) }}">
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Section Title</label>
                <input type="text" name="section_title" class="form-control radius-8" value="{{ old('section_title', $about->section_title) }}">
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lead Text</label>
                <textarea name="lead_text" class="form-control radius-8" rows="3">{{ old('lead_text', $about->lead_text) }}</textarea>
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Description</label>
                <textarea name="description" class="form-control radius-8" rows="6">{{ old('description', $about->description) }}</textarea>
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">About Image</label>
                <input type="file" name="about_image" class="form-control radius-8" accept="image/*" onchange="previewImage(event, 'aboutImagePreview')">
                @if($about->about_image)
                <div class="mt-3">
                  <p class="mb-2 fw-medium">Current Image:</p>
                  <img src="{{ asset('storage/' . $about->about_image) }}" alt="About Image" class="border rounded p-2" style="max-width: 300px;">
                </div>
                @endif
                <div id="aboutImagePreview" class="mt-3" style="display: none;">
                  <p class="mb-2 fw-medium text-success-600">New Image Preview:</p>
                  <img src="" alt="Preview" class="border rounded p-2" style="max-width: 300px;">
                </div>
              </div>

              <!-- Highlights -->
              <div class="col-md-12">
                <h6 class="fw-semibold mb-3 mt-3">Highlights</h6>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 1 Icon</label>
                <input type="text" name="highlight_1_icon" class="form-control radius-8" value="{{ old('highlight_1_icon', $about->highlight_1_icon) }}" placeholder="fas fa-award">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 1 Title</label>
                <input type="text" name="highlight_1_title" class="form-control radius-8" value="{{ old('highlight_1_title', $about->highlight_1_title) }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 1 Text</label>
                <input type="text" name="highlight_1_text" class="form-control radius-8" value="{{ old('highlight_1_text', $about->highlight_1_text) }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 2 Icon</label>
                <input type="text" name="highlight_2_icon" class="form-control radius-8" value="{{ old('highlight_2_icon', $about->highlight_2_icon) }}" placeholder="fas fa-users">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 2 Title</label>
                <input type="text" name="highlight_2_title" class="form-control radius-8" value="{{ old('highlight_2_title', $about->highlight_2_title) }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 2 Text</label>
                <input type="text" name="highlight_2_text" class="form-control radius-8" value="{{ old('highlight_2_text', $about->highlight_2_text) }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 3 Icon</label>
                <input type="text" name="highlight_3_icon" class="form-control radius-8" value="{{ old('highlight_3_icon', $about->highlight_3_icon) }}" placeholder="fas fa-globe">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 3 Title</label>
                <input type="text" name="highlight_3_title" class="form-control radius-8" value="{{ old('highlight_3_title', $about->highlight_3_title) }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Highlight 3 Text</label>
                <input type="text" name="highlight_3_text" class="form-control radius-8" value="{{ old('highlight_3_text', $about->highlight_3_text) }}">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Founder Section Tab -->
      <div class="tab-pane fade" id="pills-founder" role="tabpanel">
        <div class="card">
          <div class="card-header border-bottom bg-base py-16 px-24">
            <h6 class="text-lg fw-semibold mb-0">Founder Section</h6>
          </div>
          <div class="card-body p-24">
            <div class="row gy-3">
              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Founder Label</label>
                <input type="text" name="founder_label" class="form-control radius-8" value="{{ old('founder_label', $about->founder_label) }}">
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Founder Name</label>
                <input type="text" name="founder_name" class="form-control radius-8" value="{{ old('founder_name', $about->founder_name) }}">
              </div>

              <div class="col-md-6">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Founder Title</label>
                <input type="text" name="founder_title" class="form-control radius-8" value="{{ old('founder_title', $about->founder_title) }}">
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Founder Image</label>
                <input type="file" name="founder_image" class="form-control radius-8" accept="image/*" onchange="previewImage(event, 'founderImagePreview')">
                @if($about->founder_image)
                <div class="mt-3">
                  <p class="mb-2 fw-medium">Current Image:</p>
                  <img src="{{ asset('storage/' . $about->founder_image) }}" alt="Founder Image" class="border rounded p-2" style="max-width: 200px;">
                </div>
                @endif
                <div id="founderImagePreview" class="mt-3" style="display: none;">
                  <p class="mb-2 fw-medium text-success-600">New Image Preview:</p>
                  <img src="" alt="Preview" class="border rounded p-2" style="max-width: 200px;">
                </div>
              </div>

              <div class="col-md-12">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Founder Message</label>
                <textarea name="founder_message" class="form-control radius-8" rows="15" id="founderMessageEditor">{{ old('founder_message', $about->founder_message) }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mission & Vision Tab -->
      <div class="tab-pane fade" id="pills-mission" role="tabpanel">
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-header border-bottom bg-base py-16 px-24">
                <h6 class="text-lg fw-semibold mb-0">Mission</h6>
              </div>
              <div class="card-body p-24">
                <textarea name="mission_text" class="form-control radius-8" rows="8">{{ old('mission_text', $about->mission_text) }}</textarea>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-header border-bottom bg-base py-16 px-24">
                <h6 class="text-lg fw-semibold mb-0">Vision</h6>
              </div>
              <div class="card-body p-24">
                <textarea name="vision_text" class="form-control radius-8" rows="8">{{ old('vision_text', $about->vision_text) }}</textarea>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header border-bottom bg-base py-16 px-24">
                <h6 class="text-lg fw-semibold mb-0">CTA Section</h6>
              </div>
              <div class="card-body p-24">
                <div class="row gy-3">
                  <div class="col-md-6">
                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">CTA Title</label>
                    <input type="text" name="cta_title" class="form-control radius-8" value="{{ old('cta_title', $about->cta_title) }}">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">CTA Subtitle</label>
                    <input type="text" name="cta_subtitle" class="form-control radius-8" value="{{ old('cta_subtitle', $about->cta_subtitle) }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Core Values Tab -->
      <div class="tab-pane fade" id="pills-values" role="tabpanel">
        <div class="card mb-3">
          <div class="card-header border-bottom bg-base py-16 px-24 d-flex justify-content-between align-items-center">
            <h6 class="text-lg fw-semibold mb-0">Core Values</h6>
            <button type="button" class="btn btn-primary-600 radius-8" data-bs-toggle="modal" data-bs-target="#addValueModal">
              <iconify-icon icon="solar:add-circle-bold" class="icon"></iconify-icon>
              Add Value
            </button>
          </div>
          <div class="card-body p-24">
            <div class="table-responsive">
              <table class="table bordered-table mb-0">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($coreValues as $value)
                  <tr>
                    <td>{{ $value->order }}</td>
                    <td><i class="{{ $value->icon }} text-primary-600 text-xl"></i></td>
                    <td>{{ $value->title }}</td>
                    <td>{{ Str::limit($value->description, 50) }}</td>
                    <td>
                      <span class="badge bg-{{ $value->is_active ? 'success' : 'danger' }}-100 text-{{ $value->is_active ? 'success' : 'danger' }}-600">
                        {{ $value->is_active ? 'Active' : 'Inactive' }}
                      </span>
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-primary-600" onclick="editValue({{ $value }})">
                        <iconify-icon icon="solar:pen-bold"></iconify-icon>
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-danger-600" onclick="deleteValue({{ $value->id }})">
                        <iconify-icon icon="solar:trash-bin-trash-bold"></iconify-icon>
                      </button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">No core values added yet</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Team Members Tab -->
      <div class="tab-pane fade" id="pills-team" role="tabpanel">
        <div class="card mb-3">
          <div class="card-header border-bottom bg-base py-16 px-24 d-flex justify-content-between align-items-center">
            <h6 class="text-lg fw-semibold mb-0">Team Members</h6>
            <button type="button" class="btn btn-primary-600 radius-8" data-bs-toggle="modal" data-bs-target="#addTeamModal">
              <iconify-icon icon="solar:add-circle-bold" class="icon"></iconify-icon>
              Add Member
            </button>
          </div>
          <div class="card-body p-24">
            <div class="row g-4">
              @forelse($teamMembers as $member)
              <div class="col-md-3">
                <div class="card h-100">
                  <div class="card-body text-center">
                    @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                    @else
                    <div class="bg-primary-100 text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                      <iconify-icon icon="solar:user-bold" class="icon text-xxl"></iconify-icon>
                    </div>
                    @endif
                    <h6 class="mb-1">{{ $member->name }}</h6>
                    <p class="text-sm text-secondary-light mb-3">{{ $member->role }}</p>
                    <span class="badge bg-{{ $member->is_active ? 'success' : 'danger' }}-100 text-{{ $member->is_active ? 'success' : 'danger' }}-600 mb-3">
                      {{ $member->is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <div class="d-flex gap-2 justify-content-center">
                      <button type="button" class="btn btn-sm btn-outline-primary-600" onclick='editTeamMember(@json($member))'>
                        <iconify-icon icon="solar:pen-bold"></iconify-icon>
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-danger-600" onclick="deleteTeamMember({{ $member->id }})">
                        <iconify-icon icon="solar:trash-bin-trash-bold"></iconify-icon>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="col-12">
                <p class="text-center text-secondary-light">No team members added yet</p>
              </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>

      <!-- Timeline Tab -->
      <div class="tab-pane fade" id="pills-timeline" role="tabpanel">
        <div class="card mb-3">
          <div class="card-header border-bottom bg-base py-16 px-24 d-flex justify-content-between align-items-center">
            <h6 class="text-lg fw-semibold mb-0">Timeline Items</h6>
            <button type="button" class="btn btn-primary-600 radius-8" data-bs-toggle="modal" data-bs-target="#addTimelineModal">
              <iconify-icon icon="solar:add-circle-bold" class="icon"></iconify-icon>
              Add Timeline
            </button>
          </div>
          <div class="card-body p-24">
            <div class="table-responsive">
              <table class="table bordered-table mb-0">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Year</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($timelineItems as $timeline)
                  <tr>
                    <td>{{ $timeline->order }}</td>
                    <td><i class="{{ $timeline->icon }} text-primary-600 text-xl"></i></td>
                    <td>{{ $timeline->year }}</td>
                    <td>{{ $timeline->title }}</td>
                    <td>{{ Str::limit($timeline->description, 50) }}</td>
                    <td>
                      <span class="badge bg-{{ $timeline->is_active ? 'success' : 'danger' }}-100 text-{{ $timeline->is_active ? 'success' : 'danger' }}-600">
                        {{ $timeline->is_active ? 'Active' : 'Inactive' }}
                      </span>
                    </td>
                    <td>
                      <button type="button" class="btn btn-sm btn-outline-primary-600" onclick="editTimeline({{ $timeline }})">
                        <iconify-icon icon="solar:pen-bold"></iconify-icon>
                      </button>
                      <button type="button" class="btn btn-sm btn-outline-danger-600" onclick="deleteTimeline({{ $timeline->id }})">
                        <iconify-icon icon="solar:trash-bin-trash-bold"></iconify-icon>
                      </button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">No timeline items added yet</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="d-flex align-items-center justify-content-end gap-3 mt-24">
      <button type="submit" class="btn btn-primary-600 radius-8 px-32 py-11">
        <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
        Save About Page
      </button>
    </div>
  </form>
</div>

<!-- Add Team Member Modal -->
<div class="modal fade" id="addTeamModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('about.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add Team Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Role <span class="text-danger">*</span></label>
            <input type="text" name="role" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
          </div>
          <div class="mb-3">
            <label class="form-label">LinkedIn URL</label>
            <input type="url" name="linkedin_url" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Twitter URL</label>
            <input type="url" name="twitter_url" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Order <span class="text-danger">*</span></label>
            <input type="number" name="order" class="form-control" value="0" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Member</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Team Member Modal -->
<div class="modal fade" id="editTeamModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form id="editTeamForm" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-header edit-team-modal-header">
            <h5 class="modal-title mb-0 d-flex align-items-center gap-2">
              <iconify-icon icon="solar:user-rounded-bold-duotone" class="text-xl"></iconify-icon>
              Edit Team Member
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-7">
                <div class="mb-3">
                  <label class="form-label">Name <span class="text-danger">*</span></label>
                  <input type="text" name="name" id="edit_team_name" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Role <span class="text-danger">*</span></label>
                  <input type="text" name="role" id="edit_team_role" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" id="edit_team_email" class="form-control" placeholder="email@example.com">
                </div>
                <div class="mb-3">
                  <label class="form-label">LinkedIn URL</label>
                  <input type="url" name="linkedin_url" id="edit_team_linkedin" class="form-control" placeholder="https://linkedin.com/in/username">
                </div>
                <div class="mb-3">
                  <label class="form-label">Twitter URL</label>
                  <input type="url" name="twitter_url" id="edit_team_twitter" class="form-control" placeholder="https://twitter.com/username">
                </div>
              </div>

              <div class="col-md-5">
                <div class="edit-team-preview-card">
                  <div id="edit_team_current_image" class="mb-3"></div>
                  <div class="mb-3">
                    <label class="form-label">Change Image</label>
                    <input type="file" name="image" id="edit_team_image" class="form-control" accept="image/*" onchange="previewImage(event, 'edit_team_preview')">
                    <div id="edit_team_preview" class="mt-2" style="display: none;">
                      <label class="form-label text-sm">New Image Preview:</label>
                      <div>
                        <img src="" alt="Preview" style="max-width: 150px; max-height: 150px;" class="rounded">
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Display Order <span class="text-danger">*</span></label>
                    <input type="number" name="order" id="edit_team_order" class="form-control" min="0" required>
                    <small class="text-muted">Lower numbers appear first</small>
                  </div>

                  <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="edit_team_active" value="1">
                    <label class="form-check-label" for="edit_team_active">
                      Active Status
                      <small class="d-block text-muted">Toggle to show/hide this member on the website</small>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary-600" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary-600">
              <iconify-icon icon="solar:check-circle-bold" class="icon"></iconify-icon>
              Update Member
            </button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Add Timeline Modal -->
<div class="modal fade" id="addTimelineModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('about.timeline.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add Timeline Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Year <span class="text-danger">*</span></label>
            <input type="text" name="year" class="form-control" placeholder="e.g., 2009" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Icon <span class="text-danger">*</span></label>
            <input type="text" name="icon" class="form-control" placeholder="fas fa-flag" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Order <span class="text-danger">*</span></label>
            <input type="number" name="order" class="form-control" value="0" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Timeline</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Timeline Modal -->
<div class="modal fade" id="editTimelineModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editTimelineForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Timeline Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Year <span class="text-danger">*</span></label>
            <input type="text" name="year" id="edit_timeline_year" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="edit_timeline_title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="edit_timeline_description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Icon <span class="text-danger">*</span></label>
            <input type="text" name="icon" id="edit_timeline_icon" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Order <span class="text-danger">*</span></label>
            <input type="number" name="order" id="edit_timeline_order" class="form-control" required>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="edit_timeline_active">
            <label class="form-check-label" for="edit_timeline_active">Active</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Timeline</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add Core Value Modal -->
<div class="modal fade" id="addValueModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('about.value.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add Core Value</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Icon <span class="text-danger">*</span></label>
            <input type="text" name="icon" class="form-control" placeholder="fas fa-lightbulb" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Order <span class="text-danger">*</span></label>
            <input type="number" name="order" class="form-control" value="0" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Value</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Core Value Modal -->
<div class="modal fade" id="editValueModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editValueForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Core Value</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="edit_value_title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="edit_value_description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Icon <span class="text-danger">*</span></label>
            <input type="text" name="icon" id="edit_value_icon" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Order <span class="text-danger">*</span></label>
            <input type="number" name="order" id="edit_value_order" class="form-control" required>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="edit_value_active">
            <label class="form-check-label" for="edit_value_active">Active</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Value</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .about-glass-page {
    --about-surface: #ffffff;
    --about-surface-2: #f8fbff;
    --about-border: #dbe5f2;
    --about-text: #0f172a;
    --about-muted: #64748b;
    --about-tab-bg: linear-gradient(135deg, #8aa4ff 0%, #6f7cff 45%, #8a56f7 100%);
    --about-tab-glass: rgba(255, 255, 255, 0.92);
    --about-tab-hover-border: rgba(99, 102, 241, 0.28);
    --about-tab-indicator: linear-gradient(90deg, #4f46e5 0%, #7c3aed 100%);
    --about-tab-active: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    --about-card-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
  }

  html[data-theme=dark] .about-glass-page {
    --about-surface: #111827;
    --about-surface-2: #1f2937;
    --about-border: #334155;
    --about-text: #e2e8f0;
    --about-muted: #94a3b8;
    --about-tab-bg: linear-gradient(135deg, #2d3a7a 0%, #463f8f 45%, #5a3495 100%);
    --about-tab-glass: rgba(17, 24, 39, 0.82);
    --about-tab-hover-border: rgba(129, 140, 248, 0.35);
    --about-tab-indicator: linear-gradient(90deg, #7c3aed 0%, #a855f7 100%);
    --about-tab-active: linear-gradient(135deg, #5b4dd8 0%, #7c3aed 100%);
    --about-card-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  }

  .about-glass-page .card {
    background: var(--about-surface);
    border: 1px solid var(--about-border);
    box-shadow: var(--about-card-shadow);
    border-radius: 14px;
  }

  .about-glass-page .card-header {
    background: linear-gradient(90deg, var(--about-surface-2), var(--about-surface));
    border-bottom: 1px solid var(--about-border);
    color: var(--about-text);
  }

  .about-glass-page .form-label,
  .about-glass-page .text-primary-light {
    color: var(--about-text) !important;
  }

  .about-glass-page .text-muted,
  .about-glass-page .text-secondary-light {
    color: var(--about-muted) !important;
  }

  .about-glass-page .form-control,
  .about-glass-page .form-select,
  .about-glass-page textarea {
    background: var(--about-surface);
    color: var(--about-text);
    border-color: var(--about-border);
  }

  .about-glass-page .form-control::placeholder,
  .about-glass-page textarea::placeholder {
    color: var(--about-muted);
  }

  .edit-team-modal-header {
    background: linear-gradient(135deg, rgba(79, 70, 229, 0.12), rgba(124, 58, 237, 0.12));
    border-bottom: 1px solid var(--about-border);
  }

  .edit-team-preview-card {
    background: linear-gradient(180deg, rgba(99, 102, 241, 0.08), rgba(148, 163, 184, 0.08));
    border: 1px solid var(--about-border);
    border-radius: 12px;
    padding: 12px;
  }

  /* Tabs Wrapper */
  .tabs-wrapper {
    background: var(--about-tab-bg);
    padding: 8px;
    border-radius: 16px;
    box-shadow: var(--about-card-shadow);
    position: relative;
    overflow: hidden;
  }

  .tabs-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
    pointer-events: none;
  }

  /* Modern Nav Pills */
  .nav-pills-modern {
    display: flex;
    flex-wrap: nowrap;
    gap: 8px;
    padding: 0;
    margin: 0;
    list-style: none;
    position: relative;
    overflow-x: auto;
    overflow-y: hidden;
    scrollbar-width: thin;
  }

  .nav-pills-modern::-webkit-scrollbar {
    height: 8px;
  }

  .nav-pills-modern::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.35);
    border-radius: 999px;
  }

  .nav-pills-modern .nav-item {
    flex: 0 0 180px;
    min-width: 180px;
  }

  /* Nav Link Base Styles */
  .nav-pills-modern .nav-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 16px 12px;
    border: 2px solid transparent;
    border-radius: 12px;
    background: var(--about-tab-glass);
    color: var(--about-muted);
    font-weight: 500;
    text-align: center;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    width: 100%;
    backdrop-filter: blur(10px);
  }

  /* Icon Wrapper */
  .nav-link-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--about-surface-2) 0%, var(--about-surface) 100%);
    transition: all 0.4s ease;
    position: relative;
    z-index: 1;
  }

  .nav-link-icon .icon {
    font-size: 24px;
    transition: all 0.4s ease;
  }

  /* Content Wrapper */
  .nav-link-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
    position: relative;
    z-index: 1;
  }

  .nav-link-title {
    font-size: 13px;
    font-weight: 600;
    line-height: 1.2;
    transition: all 0.3s ease;
  }

  .nav-link-desc {
    font-size: 11px;
    color: var(--about-muted);
    font-weight: 400;
    transition: all 0.3s ease;
  }

  /* Indicator Line */
  .nav-link-indicator {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 80%;
    height: 3px;
    background: var(--about-tab-indicator);
    border-radius: 3px 3px 0 0;
    transition: transform 0.3s ease;
  }

  /* Hover State */
  .nav-pills-modern .nav-link:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
    border-color: var(--about-tab-hover-border);
  }

  .nav-pills-modern .nav-link:hover .nav-link-icon {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    transform: scale(1.1) rotate(-5deg);
  }

  .nav-pills-modern .nav-link:hover .nav-link-icon .icon {
    color: white;
    transform: scale(1.1);
  }

  .nav-pills-modern .nav-link:hover .nav-link-title {
    color: var(--about-text);
  }

  .nav-pills-modern .nav-link:hover .nav-link-indicator {
    transform: translateX(-50%) scaleX(1);
  }

  /* Active State */
  .nav-pills-modern .nav-link.active {
    background: var(--about-tab-active);
    color: white;
    border-color: transparent;
    box-shadow: 0 12px 28px rgba(79, 70, 229, 0.35);
    transform: translateY(-4px);
  }

  .nav-pills-modern .nav-link.active::after {
    content: '';
    position: absolute;
    inset: -2px;
    border-radius: 14px;
    border: 1px solid rgba(255, 255, 255, 0.35);
    box-shadow: 0 0 0 0 rgba(167, 139, 250, 0.45);
    animation: tabGlowPulse 1.8s ease-out infinite;
    pointer-events: none;
  }

  .nav-pills-modern .nav-link.has-unsaved .nav-link-title::after {
    content: '•';
    color: #f97316;
    margin-left: 6px;
    font-size: 18px;
    line-height: 0;
    vertical-align: middle;
  }

  .nav-pills-modern .nav-link.active .nav-link-icon {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  }

  .nav-pills-modern .nav-link.active .nav-link-icon .icon {
    color: white;
    animation: iconPulse 2s ease-in-out infinite;
  }

  .nav-pills-modern .nav-link.active .nav-link-title {
    color: white;
    font-weight: 700;
  }

  .nav-pills-modern .nav-link.active .nav-link-desc {
    color: rgba(255, 255, 255, 0.8);
  }

  .nav-pills-modern .nav-link.active .nav-link-indicator {
    background: white;
    transform: translateX(-50%) scaleX(1);
  }

  /* Badge Styling */
  .nav-link-desc .badge {
    font-size: 10px;
    padding: 3px 8px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  }

  .nav-pills-modern .nav-link.active .nav-link-desc .badge {
    background: white !important;
    color: #667eea !important;
  }

  /* Animations */
  @keyframes iconPulse {
    0%, 100% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.15);
    }
  }

  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .nav-pills-modern .nav-item {
    animation: slideIn 0.4s ease backwards;
  }

  .nav-pills-modern .nav-item:nth-child(1) { animation-delay: 0.05s; }
  .nav-pills-modern .nav-item:nth-child(2) { animation-delay: 0.1s; }
  .nav-pills-modern .nav-item:nth-child(3) { animation-delay: 0.15s; }
  .nav-pills-modern .nav-item:nth-child(4) { animation-delay: 0.2s; }
  .nav-pills-modern .nav-item:nth-child(5) { animation-delay: 0.25s; }
  .nav-pills-modern .nav-item:nth-child(6) { animation-delay: 0.3s; }
  .nav-pills-modern .nav-item:nth-child(7) { animation-delay: 0.35s; }

  /* Focus State for Accessibility */
  .nav-pills-modern .nav-link:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.3);
  }

  /* Responsive Design */
  @media (max-width: 1200px) {
    .nav-pills-modern .nav-item {
      min-width: 120px;
    }

    .nav-link-icon {
      width: 42px;
      height: 42px;
    }

    .nav-link-icon .icon {
      font-size: 20px;
    }

    .nav-link-title {
      font-size: 12px;
    }

    .nav-link-desc {
      font-size: 10px;
    }
  }

  @media (max-width: 768px) {
    .nav-pills-modern {
      flex-direction: column;
    }

    .nav-pills-modern .nav-item {
      width: 100%;
      min-width: unset;
    }

    .nav-pills-modern .nav-link {
      flex-direction: row;
      justify-content: flex-start;
      text-align: left;
      padding: 14px 16px;
    }

    .nav-link-content {
      align-items: flex-start;
      flex: 1;
    }

    .nav-link-indicator {
      left: 0;
      transform: translateX(0) scaleX(0);
      width: 4px;
      height: 100%;
      top: 0;
      border-radius: 0 3px 3px 0;
    }

    .nav-pills-modern .nav-link:hover .nav-link-indicator,
    .nav-pills-modern .nav-link.active .nav-link-indicator {
      transform: translateX(0) scaleY(1);
    }
  }

  /* Loading State (Optional Enhancement) */
  .nav-link.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, #667eea, transparent);
    animation: loading 1.5s ease-in-out infinite;
  }

  @keyframes loading {
    0% {
      transform: translateX(-100%);
    }
    100% {
      transform: translateX(100%);
    }
  }

  @keyframes tabGlowPulse {
    0% {
      box-shadow: 0 0 0 0 rgba(167, 139, 250, 0.42);
    }
    70% {
      box-shadow: 0 0 0 12px rgba(167, 139, 250, 0);
    }
    100% {
      box-shadow: 0 0 0 0 rgba(167, 139, 250, 0);
    }
  }

  /* Completion Indicator (Optional) */
  .nav-link.completed .nav-link-icon::after {
    content: '✓';
    position: absolute;
    top: -4px;
    right: -4px;
    width: 20px;
    height: 20px;
    background: #10b981;
    color: white;
    border-radius: 50%;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid white;
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.4);
  }
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabButtons = Array.from(document.querySelectorAll('#pills-tab button[data-bs-toggle="pill"]'));
  const tabInput = document.getElementById('activeTabInput');
  const pageRoot = document.querySelector('.about-glass-page');
  const serverTab = pageRoot?.dataset.serverTab;
  const storageKey = 'about_active_tab';
  const dirtyTabs = new Set();
  let hasUnsavedChanges = false;
  let allowTabSwitch = false;
  let confirmedTabButton = null;

  function sanitizeTabId(value) {
    if (!value) {
      return null;
    }
    const clean = String(value).replace(/^#/, '');
    return document.getElementById(clean) ? clean : null;
  }

  function activateTab(tabId) {
    const paneId = sanitizeTabId(tabId);
    if (!paneId) {
      return;
    }

    const trigger = document.querySelector(`#pills-tab button[data-bs-target="#${paneId}"]`);
    if (!trigger) {
      return;
    }

    const tab = new bootstrap.Tab(trigger);
    tab.show();
  }

  const urlHashTab = sanitizeTabId(window.location.hash);
  const rememberedTab = sanitizeTabId(localStorage.getItem(storageKey));
  const initialTab = sanitizeTabId(serverTab) || urlHashTab || rememberedTab || 'pills-header';
  activateTab(initialTab);

  tabButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
      if (allowTabSwitch) {
        return;
      }

      const currentActiveButton = document.querySelector('#pills-tab .nav-link.active');
      const currentTarget = currentActiveButton?.getAttribute('data-bs-target') || '#pills-header';
      const currentPaneId = sanitizeTabId(currentTarget);
      const nextPaneId = sanitizeTabId(button.getAttribute('data-bs-target'));

      if (!currentPaneId || !nextPaneId || currentPaneId === nextPaneId) {
        return;
      }

      if (!dirtyTabs.has(currentPaneId)) {
        return;
      }

      event.preventDefault();
      confirmedTabButton = button;

      Swal.fire({
        title: 'Unsaved changes',
        text: 'You have unsaved changes in this section. Switch tab without saving?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f59e0b',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Switch anyway',
        cancelButtonText: 'Stay here'
      }).then((result) => {
        if (result.isConfirmed && confirmedTabButton) {
          allowTabSwitch = true;
          new bootstrap.Tab(confirmedTabButton).show();
          allowTabSwitch = false;
          confirmedTabButton = null;
        }
      });
    });

    button.addEventListener('shown.bs.tab', function (event) {
      const target = event.target.getAttribute('data-bs-target') || '';
      const paneId = sanitizeTabId(target);
      if (!paneId) {
        return;
      }

      localStorage.setItem(storageKey, paneId);
      if (tabInput) {
        tabInput.value = paneId;
      }
      history.replaceState(null, '', '#' + paneId);
    });
  });

  function refreshDirtyIndicators() {
    hasUnsavedChanges = dirtyTabs.size > 0;
    tabButtons.forEach(function (button) {
      const paneId = sanitizeTabId(button.getAttribute('data-bs-target'));
      button.classList.toggle('has-unsaved', !!paneId && dirtyTabs.has(paneId));
    });
  }

  document.querySelectorAll('.tab-pane input, .tab-pane textarea, .tab-pane select').forEach(function (field) {
    field.addEventListener('input', function () {
      const pane = field.closest('.tab-pane');
      if (!pane?.id) {
        return;
      }
      dirtyTabs.add(pane.id);
      refreshDirtyIndicators();
    });

    field.addEventListener('change', function () {
      const pane = field.closest('.tab-pane');
      if (!pane?.id) {
        return;
      }
      dirtyTabs.add(pane.id);
      refreshDirtyIndicators();
    });
  });

  window.addEventListener('beforeunload', function (event) {
    if (!hasUnsavedChanges) {
      return;
    }

    event.preventDefault();
    event.returnValue = '';
  });

  document.querySelectorAll('form').forEach(function (form) {
    form.addEventListener('submit', function () {
      const activeButton = document.querySelector('#pills-tab .nav-link.active');
      const activeTarget = activeButton?.getAttribute('data-bs-target') || '#pills-header';
      const activePaneId = sanitizeTabId(activeTarget) || 'pills-header';
      localStorage.setItem(storageKey, activePaneId);

      let hidden = form.querySelector('input[name="active_tab"]');
      if (!hidden) {
        hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'active_tab';
        form.appendChild(hidden);
      }
      hidden.value = activePaneId;

      if (activePaneId) {
        dirtyTabs.delete(activePaneId);
      }
      refreshDirtyIndicators();
    });
  });

  refreshDirtyIndicators();
});

// Image Preview
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
  }
}

// Team Member Functions
// Team Member Functions
function editTeamMember(member) {
  document.getElementById('editTeamForm').action = `/admin/about/team/${member.id}`;
  document.getElementById('edit_team_name').value = member.name;
  document.getElementById('edit_team_role').value = member.role;
  document.getElementById('edit_team_linkedin').value = member.linkedin_url || '';
  document.getElementById('edit_team_twitter').value = member.twitter_url || '';
  document.getElementById('edit_team_email').value = member.email || '';
  document.getElementById('edit_team_order').value = member.order;
  document.getElementById('edit_team_active').checked = member.is_active == 1;
  
  // Clear previous image preview
  document.getElementById('edit_team_current_image').innerHTML = '';
  
  if (member.image) {
    document.getElementById('edit_team_current_image').innerHTML = `
      <div class="mb-3">
        <label class="form-label">Current Image</label>
        <div>
          <img src="/storage/${member.image}" alt="${member.name}" style="max-width: 150px; max-height: 150px;" class="rounded">
        </div>
      </div>
    `;
  }
  
  new bootstrap.Modal(document.getElementById('editTeamModal')).show();
}

function deleteTeamMember(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/about/team/${id}`;
      
      // Create CSRF token input
      const csrfInput = document.createElement('input');
      csrfInput.type = 'hidden';
      csrfInput.name = '_token';
      csrfInput.value = '{{ csrf_token() }}';
      
      // Create method input
      const methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      methodInput.value = 'DELETE';

      const activeTabInput = document.createElement('input');
      activeTabInput.type = 'hidden';
      activeTabInput.name = 'active_tab';
      activeTabInput.value = 'pills-team';
      
      form.appendChild(csrfInput);
      form.appendChild(methodInput);
      form.appendChild(activeTabInput);
      document.body.appendChild(form);
      form.submit();
    }
  });
}

// Timeline Functions
function editTimeline(timeline) {
  document.getElementById('editTimelineForm').action = `/admin/about/timeline/${timeline.id}`;
  document.getElementById('edit_timeline_year').value = timeline.year;
  document.getElementById('edit_timeline_title').value = timeline.title;
  document.getElementById('edit_timeline_description').value = timeline.description;
  document.getElementById('edit_timeline_icon').value = timeline.icon;
  document.getElementById('edit_timeline_order').value = timeline.order;
  document.getElementById('edit_timeline_active').checked = timeline.is_active;
  
  new bootstrap.Modal(document.getElementById('editTimelineModal')).show();
}

function deleteTimeline(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/about/timeline/${id}`;
      form.innerHTML = `
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="active_tab" value="pills-timeline">
      `;
      document.body.appendChild(form);
      form.submit();
    }
  });
}

// Core Value Functions
function editValue(value) {
  document.getElementById('editValueForm').action = `/admin/about/value/${value.id}`;
  document.getElementById('edit_value_title').value = value.title;
  document.getElementById('edit_value_description').value = value.description;
  document.getElementById('edit_value_icon').value = value.icon;
  document.getElementById('edit_value_order').value = value.order;
  document.getElementById('edit_value_active').checked = value.is_active;
  
  new bootstrap.Modal(document.getElementById('editValueModal')).show();
}

function deleteValue(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/about/value/${id}`;
      form.innerHTML = `
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="active_tab" value="pills-values">
      `;
      document.body.appendChild(form);
      form.submit();
    }
  });
}
</script>
@endpush
@endsection