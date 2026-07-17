@extends('adminDashboard.index')
@section('adminDashboard.content')
<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Contact Queries Management</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="{{ route('index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Contact Queries</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <!-- Statistics Cards -->
      <div class="row g-3 mb-24">
        <!-- Total Queries -->
        <div class="col-xxl-3 col-sm-3">
          <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium text-primary-light mb-1">Total Queries</p>
                  <h6 class="mb-0">{{ $stats['total'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="fluent:mail-inbox-24-filled" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- New Query -->
        <div class="col-xxl-3 col-sm-3">
          <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium text-primary-light mb-1">New Queries</p>
                  <h6 class="mb-0">{{ $stats['new'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-warning-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:star-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                Requires attention
              </p>
            </div>
          </div>
        </div>

        <!-- Read Enquiry -->
        <div class="col-xxl-3 col-sm-3">
          <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium text-primary-light mb-1">Read Queries</p>
                  <h6 class="mb-0">{{ $stats['read'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-info-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:eye-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                Viewed messages
              </p>
            </div>
          </div>
        </div>

        <!-- Replied Enquiries -->
        <div class="col-xxl-3 col-sm-3">
          <div class="card shadow-none border bg-gradient-start-4 h-100">
            <div class="card-body p-20">
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium text-primary-light mb-1">Replied Queries</p>
                  <h6 class="mb-0">{{ $stats['replied'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:check-circle-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm text-primary-light mt-12 mb-0">
                Successfully handled
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Card -->
      <div class="card">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
          <h6 class="fw-semibold mb-0">All Contact Queries</h6>
          <div class="d-flex flex-wrap align-items-center gap-2">
            <button type="button" class="btn btn-sm btn-danger-600" onclick="bulkAction('delete')" id="bulkDeleteBtn" style="display: none;">
              <iconify-icon icon="solar:trash-bin-minimalistic-bold" class="icon"></iconify-icon>
              Delete Selected
            </button>
            <button type="button" class="btn btn-sm btn-primary-600" id="refreshBtn" onclick="location.reload()" style="display:flex; align-items:center; gap:4px;">
              <iconify-icon icon="solar:refresh-bold" class="icon"></iconify-icon>
              Refresh
            </button>
          </div>
        </div>

        <div class="card-body">
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

          <!-- Filters -->
          <form method="GET" action="{{ route('contacts.index') }}" class="mb-24">
            <div class="row gy-3">
              <div class="col-md-3">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Filter by Status</label>
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="all" {{ request('status', 'all') == 'all' ? 'selected' : '' }}>All Status</option>
                  <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                  <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                  <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                  <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Sort By</label>
                <select name="sort_by" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="created_at" {{ request('sort_by', 'created_at') == 'created_at' ? 'selected' : '' }}>Date</option>
                  <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                  <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Search</label>
                <div class="input-group">
                  <input type="text" name="search" class="form-control form-control-sm" 
                         placeholder="Search by name, email, subject..." 
                         value="{{ request('search') }}">
                  <button class="btn btn-sm btn-primary-600" type="submit">
                    <iconify-icon icon="solar:magnifer-linear" class="icon"></iconify-icon>
                  </button>
                </div>
              </div>

              <div class="col-md-2">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">&nbsp;</label>
                <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-outline-secondary w-100" style="display:flex; align-items:center; gap:4px;">
                  <iconify-icon icon="solar:refresh-linear" class="icon"></iconify-icon>
                  Reset
                </a>
              </div>
            </div>
          </form>

          <!-- Table -->
          <form id="bulkActionForm" method="POST">
            @csrf
            <div class="table-responsive">
              <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                <thead>
                  <tr>
                    <th scope="col" style="width: 80px;">
                      <div class="form-check style-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label">S.L</label>
                      </div>
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Service</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="width: 120px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($contacts as $contact)
                  <tr class="{{ $contact->status == 'new' ? 'bg-warning-focus' : '' }}">
                    <td>
                      <div class="form-check style-check d-flex align-items-center">
                        <input class="form-check-input contact-checkbox" type="checkbox" 
                               name="contact_ids[]" value="{{ $contact->id }}">
                        <label class="form-check-label">{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</label>
                      </div>
                    </td>

                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-grow-1">
                          <h6 class="text-md mb-0 fw-semibold">{{ $contact->name }}</h6>
                          @if($contact->status == 'new')
                          <span class="bg-danger-focus text-danger-600 border border-danger-main px-8 py-4 radius-4 fw-medium text-sm mt-1 d-inline-block">
                            NEW
                          </span>
                          @endif
                        </div>
                      </div>
                    </td>

                    <td>
                      <span class="text-secondary-light">{{ $contact->email }}</span>
                    </td>

                    <td>
                      <span class="text-secondary-light">{{ $contact->phone ?? 'N/A' }}</span>
                    </td>

                    <td>
                      @php
                      $serviceColors = [
                        'web' => 'bg-info-focus text-info-600',
                        'mobile' => 'bg-primary-focus text-primary-600',
                        'marketing' => 'bg-success-focus text-success-600',
                        'seo' => 'bg-warning-focus text-warning-600',
                        'ui' => 'bg-purple-focus text-purple-600',
                        'other' => 'bg-neutral-focus text-neutral-600',
                      ];
                      $colorClass = $serviceColors[$contact->service] ?? 'bg-neutral-focus text-neutral-600';
                      @endphp
                      <span class="{{ $colorClass }} px-12 py-6 radius-4 fw-medium text-sm">
                        {{ $contact->service_name }}
                      </span>
                    </td>

                    <td>
                      <span class="text-secondary-light" data-bs-toggle="tooltip" title="{{ $contact->subject }}">
                        {{ Str::limit($contact->subject, 30) }}
                      </span>
                    </td>

                    <td>
                      <span class="text-secondary-light">{{ $contact->created_at->format('M d, Y') }}</span>
                      <br>
                      <small class="text-xs text-secondary-light">{{ $contact->created_at->format('h:i A') }}</small>
                    </td>

                    <td>
                      @php
                      $statusConfig = [
                        'new' => ['class' => 'bg-warning-focus text-warning-600 border-warning-main', 'icon' => 'solar:star-bold'],
                        'read' => ['class' => 'bg-info-focus text-info-600 border-info-main', 'icon' => 'solar:eye-bold'],
                        'replied' => ['class' => 'bg-success-focus text-success-600 border-success-main', 'icon' => 'solar:check-circle-bold'],
                        'archived' => ['class' => 'bg-neutral-focus text-neutral-600 border-neutral-main', 'icon' => 'solar:archive-bold'],
                      ];
                      $config = $statusConfig[$contact->status] ?? $statusConfig['new'];
                      @endphp
                      <span class="{{ $config['class'] }} border px-16 py-6 radius-4 fw-medium text-sm d-inline-flex align-items-center gap-1">
                        <iconify-icon icon="{{ $config['icon'] }}" class="text-sm"></iconify-icon>
                        {{ ucfirst($contact->status) }}
                      </span>
                    </td>

                    <td class="text-center">
                      <div class="d-flex align-items-center gap-2 justify-content-center">
                        <a href="{{ route('contacts.show', $contact) }}"
                           class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center"
                           data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                          <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>

                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                                  class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0"
                                  onclick="return confirm('Are you sure you want to delete this contact? This action cannot be undone.')"
                                  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center py-5">
                      <div class="d-flex flex-column align-items-center gap-2">
                        <iconify-icon icon="solar:inbox-line-bold" class="text-6xl text-secondary-light"></iconify-icon>
                        <h6 class="text-secondary-light mb-0">No contacts found</h6>
                        <p class="text-sm text-secondary-light mb-0">Try adjusting your filters or search query</p>
                      </div>
                    </td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </form>

          <!-- Pagination -->
          @if($contacts->hasPages())
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-24">
            <p class="text-sm text-secondary-light mb-0">
              Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries
            </p>
            <div>
              {{ $contacts->links('pagination::bootstrap-5') }}
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Select all checkboxes functionality
    const selectAllCheckbox = document.getElementById('selectAll');
    const contactCheckboxes = document.querySelectorAll('.contact-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

    if (selectAllCheckbox) {
      selectAllCheckbox.addEventListener('change', function() {
        contactCheckboxes.forEach(checkbox => {
          checkbox.checked = this.checked;
        });
        toggleBulkActions();
      });
    }

    // Individual checkbox change
    contactCheckboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        // Update select all checkbox state
        const allChecked = Array.from(contactCheckboxes).every(cb => cb.checked);
        const someChecked = Array.from(contactCheckboxes).some(cb => cb.checked);
        
        if (selectAllCheckbox) {
          selectAllCheckbox.checked = allChecked;
          selectAllCheckbox.indeterminate = someChecked && !allChecked;
        }
        
        toggleBulkActions();
      });
    });

    // Show/hide bulk action buttons
    function toggleBulkActions() {
      const checkedCount = document.querySelectorAll('.contact-checkbox:checked').length;
      
      if (bulkDeleteBtn) {
        if (checkedCount > 0) {
          bulkDeleteBtn.style.display = 'inline-flex';
          bulkDeleteBtn.innerHTML = `
            <iconify-icon icon="solar:trash-bin-minimalistic-bold" class="icon"></iconify-icon>
            Delete Selected (${checkedCount})
          `;
        } else {
          bulkDeleteBtn.style.display = 'none';
        }
      }
    }

    // Initialize on page load
    toggleBulkActions();

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
      setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }, 5000);
    });
  });

  // Bulk delete action
  function bulkAction(action) {
    const form = document.getElementById('bulkActionForm');
    const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');

    if (checkedBoxes.length === 0) {
      Swal.fire({
        icon: 'warning',
        title: 'No Selection',
        text: 'Please select at least one contact to delete',
        confirmButtonColor: '#3085d6',
      });
      return;
    }

    if (action === 'delete') {
      Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete ${checkedBoxes.length} contact(s). This action cannot be undone!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete them!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          form.action = '{{ route("contacts.bulk-delete") }}';
          form.submit();
        }
      });
    }
  }

  // Refresh button animation
  document.getElementById('refreshBtn')?.addEventListener('click', function() {
    const icon = this.querySelector('iconify-icon');
    icon.classList.add('rotate-animation');
    
    setTimeout(() => {
      location.reload();
    }, 300);
  });
</script>

<style>
  @keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }

  .rotate-animation {
    animation: rotate 0.5s linear;
  }

  /* Hover effects for table rows */
  .table tbody tr:hover {
    background-color: rgba(99, 102, 241, 0.05);
    transition: background-color 0.3s ease;
  }

  /* Smooth checkbox transitions */
  .form-check-input {
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .form-check-input:checked {
    background-color: #6366f1;
    border-color: #6366f1;
  }

  /* Badge hover effects */
  .badge, [class*="bg-"][class*="-focus"] {
    transition: all 0.2s ease;
  }

  /* Action button hover effects */
  .w-32-px {
    transition: all 0.2s ease;
  }

  .w-32-px:hover {
    transform: scale(1.1);
  }

  /* New badge pulse animation */
  @keyframes pulse {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.7;
    }
  }

  .bg-danger-focus {
    animation: pulse 2s infinite;
  }
</style>
@endpush
@endsection