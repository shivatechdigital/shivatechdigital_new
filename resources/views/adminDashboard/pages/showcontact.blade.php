@extends('adminDashboard.index')
@section('adminDashboard.content')
<div class="dashboard-main-body">
  <!-- Breadcrumb -->
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Contact Query Details</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="{{ route('index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">
        <a href="{{ route('contacts.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
          Contact Queries
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Details</li>
    </ul>
  </div>

  @if(session('success'))
  <div class="alert alert-success bg-success-100 text-success-600 border-success-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-3 fw-semibold text-lg radius-4 d-flex align-items-center justify-content-between" role="alert">
    <div class="d-flex align-items-center gap-2">
      <iconify-icon icon="solar:check-circle-bold" class="icon text-xl"></iconify-icon>
      {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="row gy-4">
    <!-- Main Contact Details -->
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
          <h6 class="text-lg fw-semibold mb-0">Contact Information</h6>
          <span class="badge text-sm fw-semibold {{ $contact->status == 'new' ? 'text-warning-600 bg-warning-100 px-20 py-9 radius-4 text-sm' : 'text-success-600 bg-success-100 px-20 py-9 radius-4 text-sm' }}">
            <iconify-icon icon="solar:star-bold" class="icon"></iconify-icon>
            {{ ucfirst($contact->status) }}
          </span>
        </div>
        <div class="card-body p-24">
          <!-- Customer Info Card -->
          <div class="mb-24 pb-24 border-bottom">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="d-flex align-items-start gap-3">
                  <div class="w-48-px h-48-px d-flex justify-content-center align-items-center radius-8 bg-primary-50">
                    <iconify-icon icon="solar:user-bold" class="text-primary-600 text-2xl"></iconify-icon>
                  </div>
                  <div class="flex-grow-1">
                    <span class="text-sm text-secondary-light fw-medium d-block mb-4">Full Name</span>
                    <h6 class="text-md mb-0 fw-semibold">{{ $contact->name }}</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-flex align-items-start gap-3">
                  <div class="w-48-px h-48-px d-flex justify-content-center align-items-center radius-8 bg-success-50">
                    <iconify-icon icon="solar:letter-bold" class="text-success-600 text-2xl"></iconify-icon>
                  </div>
                  <div class="flex-grow-1">
                    <span class="text-sm text-secondary-light fw-medium d-block mb-4">Email Address</span>
                    <a href="mailto:{{ $contact->email }}" class="text-md mb-0 fw-semibold text-primary-600 text-decoration-none hover-text-decoration-underline">
                      {{ $contact->email }}
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Additional Info -->
          <div class="row g-4 mb-24">
            <div class="col-md-4">
              <div class="p-16 radius-8 bg-neutral-50 border border-neutral-200">
                <div class="d-flex align-items-center gap-2 mb-12">
                  <iconify-icon icon="solar:phone-calling-bold" class="text-primary-600 text-xl"></iconify-icon>
                  <span class="text-sm text-secondary-light fw-medium">Phone Number</span>
                </div>
                <h6 class="text-md mb-0 fw-semibold">{{ $contact->phone ?? 'Not provided' }}</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-16 radius-8 bg-info-50 border border-info-200">
                <div class="d-flex align-items-center gap-2 mb-12">
                  <iconify-icon icon="solar:case-minimalistic-bold" class="text-info-600 text-xl"></iconify-icon>
                  <span class="text-sm text-secondary-light fw-medium">Service Type</span>
                </div>
                <h6 class="text-md mb-0 fw-semibold">{{ $contact->service_name }}</h6>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-16 radius-8 bg-warning-50 border border-warning-200">
                <div class="d-flex align-items-center gap-2 mb-12">
                  <iconify-icon icon="solar:calendar-bold" class="text-warning-600 text-xl"></iconify-icon>
                  <span class="text-sm text-secondary-light fw-medium">Submitted On</span>
                </div>
                <h6 class="text-sm mb-0 fw-semibold">{{ $contact->created_at->format('M d, Y') }} {{ $contact->created_at->format('h:i A') }}</h6>
              </div>
            </div>
          </div>

          <!-- Subject Section -->
          <div class="mb-24">
            <div class="d-flex align-items-center gap-2 mb-12">
              <iconify-icon icon="solar:document-text-bold" class="text-primary-600 text-xl"></iconify-icon>
              <h6 class="text-md mb-0 fw-semibold">Subject</h6>
            </div>
            <div class="p-16 radius-8 bg-base border border-neutral-200">
              <p class="text-secondary-light mb-0 fw-medium">{{ $contact->subject }}</p>
            </div>
          </div>

          <!-- Message Section -->
          <div class="mb-24">
            <div class="d-flex align-items-center gap-2 mb-12">
              <iconify-icon icon="solar:chat-round-line-bold" class="text-primary-600 text-xl"></iconify-icon>
              <h6 class="text-md mb-0 fw-semibold">Message</h6>
            </div>
            <div class="p-20 radius-8 bg-neutral-50 border border-neutral-200">
              <p class="text-secondary-light mb-0 lh-lg" style="white-space: pre-wrap;">{{ $contact->message }}</p>
            </div>
          </div>

          <!-- Technical Details -->
          <div class="row g-3">
            <div class="col-md-6">
              <div class="d-flex align-items-center gap-2 p-12 radius-8 bg-purple-50 border border-purple-200">
                <iconify-icon icon="solar:shield-network-bold" class="text-purple-600 text-xl"></iconify-icon>
                <div>
                  <span class="text-xs text-secondary-light d-block">IP Address</span>
                  <span class="text-sm fw-semibold">{{ $contact->ip_address }}</span>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex align-items-center gap-2 p-12 radius-8 bs-green border border-cyan-200">
                <iconify-icon icon="solar:clock-circle-bold" class="text-cyan-600 text-xl"></iconify-icon>
                <div>
                  <span class="text-xs text-secondary-light d-block">Time Since Submission</span>
                  <span class="text-sm fw-semibold">{{ $contact->created_at->diffForHumans() }}</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="mt-24 pt-24 border-top d-flex flex-wrap gap-3">
            <a href="{{ route('contacts.index') }}" class="btn btn-outline-neutral-600 radius-8 px-20 py-11">
              <iconify-icon icon="solar:arrow-left-linear" class="icon"></iconify-icon>
              Back to List
            </a>
            <a href="mailto:{{ $contact->email }}" class="btn btn-primary-600 radius-8 px-20 py-11">
              <iconify-icon icon="solar:letter-opened-bold" class="icon"></iconify-icon>
              Reply via Email
            </a>
            <a href="tel:{{ $contact->phone }}" class="btn btn-success-600 radius-8 px-20 py-11 {{ !$contact->phone ? 'disabled' : '' }}">
              <iconify-icon icon="solar:phone-calling-bold" class="icon"></iconify-icon>
              Call Customer
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
      <!-- Quick Actions -->
      <div class="card mb-24">
        <div class="card-header border-bottom bg-base py-16 px-24">
          <h6 class="text-lg fw-semibold mb-0">Quick Actions</h6>
        </div>
        <div class="card-body p-16">
          <div class="d-flex flex-column gap-2">
            <button type="button" class="btn btn-outline-primary-600 w-100 radius-8 d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#statusModal">
              <iconify-icon icon="solar:refresh-circle-bold" class="icon text-xl"></iconify-icon>
              <span>Update Status</span>
            </button>
            <button type="button" class="btn btn-outline-info-600 w-100 radius-8 d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#notesModal">
              <iconify-icon icon="solar:notes-bold" class="icon text-xl"></iconify-icon>
              <span>Manage Notes</span>
            </button>
            <button type="button" class="btn btn-outline-danger-600 w-100 radius-8 d-flex align-items-center justify-content-center gap-2" onclick="confirmDelete()">
              <iconify-icon icon="solar:trash-bin-minimalistic-bold" class="icon text-xl"></iconify-icon>
              <span>Delete Contact</span>
            </button>
          </div>
        </div>
      </div>

      <!-- Current Status Card -->
      <div class="card mb-24">
        <div class="card-header border-bottom bg-base py-16 px-24">
          <h6 class="text-lg fw-semibold mb-0">Current Status</h6>
        </div>
        <div class="card-body p-24">
          <div class="text-center">
            @php
            $statusConfig = [
              'new' => ['icon' => 'solar:star-bold', 'color' => 'warning', 'label' => 'New Query'],
              'read' => ['icon' => 'solar:eye-bold', 'color' => 'info', 'label' => 'Read'],
              'replied' => ['icon' => 'solar:check-circle-bold', 'color' => 'success', 'label' => 'Replied'],
              'archived' => ['icon' => 'solar:archive-bold', 'color' => 'neutral', 'label' => 'Archived'],
            ];
            $config = $statusConfig[$contact->status] ?? $statusConfig['new'];
            @endphp
            
            <div class="w-80-px h-80-px d-flex justify-content-center align-items-center radius-circle bg-{{ $config['color'] }}-100 mx-auto mb-16">
              <iconify-icon icon="{{ $config['icon'] }}" class="text-{{ $config['color'] }}-600" style="font-size: 40px;"></iconify-icon>
            </div>
            <h6 class="text-lg fw-semibold mb-8">{{ $config['label'] }}</h6>
            <p class="text-sm text-secondary-light mb-0">
              @if($contact->read_at)
                Read on {{ $contact->read_at->format('M d, Y') }}
              @else
                Not yet read
              @endif
            </p>
          </div>
        </div>
      </div>

      <!-- Admin Notes Preview -->
      @if($contact->admin_notes)
      <div class="card mb-24">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
          <h6 class="text-lg fw-semibold mb-0">Admin Notes</h6>
          <button type="button" class="btn btn-sm btn-outline-primary-600 radius-8" data-bs-toggle="modal" data-bs-target="#notesModal">
            <iconify-icon icon="solar:pen-bold" class="icon"></iconify-icon>
          </button>
        </div>
        <div class="card-body p-20">
          <div class="p-16 radius-8 bg-neutral-50 border border-neutral-200">
            <p class="text-sm text-secondary-light mb-0" style="white-space: pre-wrap;">{{ Str::limit($contact->admin_notes, 150) }}</p>
          </div>
        </div>
      </div>
      @endif

      <!-- Activity Timeline -->
      <div class="card">
        <div class="card-header border-bottom bg-base py-16 px-24">
          <h6 class="text-lg fw-semibold mb-0">Activity Timeline</h6>
        </div>
        <div class="card-body p-20">
          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-icon bg-primary-100">
                <iconify-icon icon="solar:letter-bold" class="text-primary-600"></iconify-icon>
              </div>
              <div class="timeline-content">
                <h6 class="text-sm fw-semibold mb-4">Query Submitted</h6>
                <p class="text-xs text-secondary-light mb-0">{{ $contact->created_at->format('M d, Y h:i A') }}</p>
              </div>
            </div>
            
            @if($contact->read_at)
            <div class="timeline-item">
              <div class="timeline-icon bg-info-100">
                <iconify-icon icon="solar:eye-bold" class="text-info-600"></iconify-icon>
              </div>
              <div class="timeline-content">
                <h6 class="text-sm fw-semibold mb-4">Marked as Read</h6>
                <p class="text-xs text-secondary-light mb-0">{{ $contact->read_at->format('M d, Y h:i A') }}</p>
              </div>
            </div>
            @endif

            @if($contact->status == 'replied')
            <div class="timeline-item">
              <div class="timeline-icon bg-success-100">
                <iconify-icon icon="solar:check-circle-bold" class="text-success-600"></iconify-icon>
              </div>
              <div class="timeline-content">
                <h6 class="text-sm fw-semibold mb-4">Reply Sent</h6>
                <p class="text-xs text-secondary-light mb-0">{{ $contact->updated_at->format('M d, Y h:i A') }}</p>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content radius-16 bg-base">
      <div class="modal-header py-16 px-24 border-bottom">
        <h6 class="modal-title" id="statusModalLabel">Update Contact Status</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('contacts.status', $contact) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body p-24">
          <div class="mb-20">
            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Select Status</label>
            <select name="status" class="form-select form-select-lg radius-8" required>
              <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>
                🌟 New
              </option>
              <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>
                👁️ Read
              </option>
              <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>
                ✅ Replied
              </option>
              <option value="archived" {{ $contact->status == 'archived' ? 'selected' : '' }}>
                📁 Archived
              </option>
            </select>
          </div>
          <div class="alert alert-info-100 border-info-600 text-info-600 border-start-width-4-px border-top-0 border-end-0 border-bottom-0 px-24 py-13 mb-0 fw-semibold text-sm radius-4 d-flex align-items-start gap-2" role="alert">
            <iconify-icon icon="solar:info-circle-bold" class="icon text-xl flex-shrink-0"></iconify-icon>
            <div>
              Changing the status will update the contact's current state in the system.
            </div>
          </div>
        </div>
        <div class="modal-footer p-16 px-24 border-top">
          <button type="button" class="btn btn-outline-neutral-600 radius-8 px-20 py-11" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary-600 radius-8 px-20 py-11" style="display:flex; align-items:center; gap:4px;">
            <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
            Update Status
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Admin Notes Modal -->
<div class="modal fade" id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content radius-16 bg-base">
      <div class="modal-header py-16 px-24 border-bottom">
        <h6 class="modal-title" id="notesModalLabel">Admin Notes</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('contacts.notes', $contact) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body p-24">
          <div class="mb-20">
            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
              Notes <span class="text-secondary-light fw-normal">(Internal use only)</span>
            </label>
            <textarea name="admin_notes" class="form-control radius-8" rows="8" placeholder="Add your internal notes about this contact...">{{ $contact->admin_notes }}</textarea>
            <small class="text-xs text-secondary-light">These notes are only visible to administrators</small>
          </div>
        </div>
        <div class="modal-footer p-16 px-24 border-top">
          <button type="button" class="btn btn-outline-neutral-600 radius-8 px-20 py-11" data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary-600 radius-8 px-20 py-11">
            <iconify-icon icon="solar:diskette-bold" class="icon"></iconify-icon>
            Save Notes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Hidden Delete Form -->
<form id="deleteForm" action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmDelete() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this! All contact information will be permanently deleted.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('deleteForm').submit();
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

<style>
  /* Timeline Styles */
  .timeline {
    position: relative;
    padding-left: 40px;
  }

  .timeline::before {
    content: '';
    position: absolute;
    left: 23px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #e5e7eb, transparent);
  }

  .timeline-item {
    position: relative;
    padding-bottom: 24px;
  }

  .timeline-item:last-child {
    padding-bottom: 0;
  }

  .timeline-icon {
    position: absolute;
    left: -40px;
    top: 0;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .timeline-icon iconify-icon {
    font-size: 20px;
  }

  .timeline-content {
    padding-left: 0;
  }

  /* Hover Effects */
  .card {
    transition: all 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  }

  .btn {
    transition: all 0.3s ease;
  }

  .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }

  /* Responsive adjustments */
  @media (max-width: 991px) {
    .timeline {
      padding-left: 30px;
    }
    
    .timeline-icon {
      left: -30px;
      width: 40px;
      height: 40px;
    }
    
    .timeline::before {
      left: 19px;
    }
  }

  @media (max-width: 575px) {
    .d-flex.gap-3 {
      flex-direction: column;
    }
    
    .btn {
      width: 100%;
    }
  }

  /* Pulse animation for new status */
  @keyframes pulse {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.7;
    }
  }

  .bg-warning-100 {
    animation: pulse 2s infinite;
  }
</style>
@endpush
@endsection