@extends('adminDashboard.index')
@section('adminDashboard.content')
<style>
  .contact-theme {
    --contact-hero-bg: linear-gradient(135deg, #1e293b, #334155 45%, #0891b2);
    --contact-hero-border: rgba(148, 163, 184, 0.22);
    --contact-card-bg: #ffffff;
    --contact-card-border: #dbe4f0;
    --contact-card-text: #0f172a;
    --contact-card-muted: #475569;
    --contact-card-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
    --contact-table-hover: rgba(59, 130, 246, 0.08);
  }

  html[data-theme=dark] .contact-theme {
    --contact-hero-bg: linear-gradient(135deg, rgba(17, 24, 39, 0.92), rgba(30, 41, 59, 0.88), rgba(14, 116, 144, 0.75));
    --contact-hero-border: rgba(148, 163, 184, 0.22);
    --contact-card-bg: rgba(255, 255, 255, 0.08);
    --contact-card-border: rgba(148, 163, 184, 0.26);
    --contact-card-text: #f8fafc;
    --contact-card-muted: #cbd5e1;
    --contact-card-shadow: 0 12px 24px rgba(15, 23, 42, 0.18);
    --contact-table-hover: rgba(99, 102, 241, 0.08);
  }

  .contact-glass-hero {
    background: var(--contact-hero-bg);
    border: 1px solid var(--contact-hero-border);
    border-radius: 16px;
    padding: 16px;
    backdrop-filter: blur(10px);
  }

  .contact-glass-card {
    background: var(--contact-card-bg);
    border: 1px solid var(--contact-card-border);
    border-radius: 14px;
    backdrop-filter: blur(10px);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    text-decoration: none;
    display: block;
    box-shadow: var(--contact-card-shadow);
  }

  .contact-glass-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(15, 23, 42, 0.16);
  }

  .contact-stat-title {
    color: var(--contact-card-muted);
  }

  .contact-stat-value {
    color: var(--contact-card-text);
    font-size: 2rem;
    line-height: 1.1;
  }

  .contact-stat-note {
    color: var(--contact-card-muted);
  }

  .contact-main-card {
    border-radius: 16px;
    border: 1px solid rgba(148, 163, 184, 0.2);
    overflow: hidden;
  }

  .contact-glass-table .table tbody tr:hover {
    background-color: var(--contact-table-hover);
    transition: background-color 0.2s ease;
  }

  .status-chip {
    border-radius: 999px;
  }

  .rotate-animation {
    animation: rotate 0.5s linear;
  }

  .bulk-controls {
    min-width: 180px;
  }

  @keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }

  .form-check-input {
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .form-check-input:checked {
    background-color: #6366f1;
    border-color: #6366f1;
  }

  .w-32-px {
    transition: all 0.2s ease;
  }

  .w-32-px:hover {
    transform: scale(1.1);
  }

  @keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
  }

  .bg-danger-focus {
    animation: pulse 2s infinite;
  }
</style>

<div class="dashboard-main-body contact-theme" id="contactsPageRoot">
  <div class="contact-glass-hero d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h4 class="fw-semibold mb-0 text-white">Contact Queries Management</h4>
    <ul class="d-flex align-items-center gap-2 mb-0">
      <li class="fw-medium">
        <a href="{{ route('index') }}" class="d-flex align-items-center gap-1 text-white">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium text-white">Contact Queries</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="row g-3 mb-16" id="contactsStatsCards">
        <div class="col-xxl-3 col-sm-6">
          <a href="{{ route('contacts.index', ['status' => 'all']) }}" class="contact-glass-card h-100">
            <div class="card-body p-20">
              <div class="d-flex align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium mb-1 contact-stat-title">Total Queries</p>
                  <h6 class="mb-0 contact-stat-value" id="statTotalCount">{{ $stats['total'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="fluent:mail-inbox-24-filled" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xxl-3 col-sm-6">
          <a href="{{ route('contacts.index', ['status' => 'new']) }}" class="contact-glass-card h-100">
            <div class="card-body p-20">
              <div class="d-flex align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium mb-1 contact-stat-title">New Queries</p>
                  <h6 class="mb-0 contact-stat-value" id="statNewCount">{{ $stats['new'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-warning-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:star-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm mt-12 mb-0 contact-stat-note">Requires attention</p>
            </div>
          </a>
        </div>

        <div class="col-xxl-3 col-sm-6">
          <a href="{{ route('contacts.index', ['status' => 'read']) }}" class="contact-glass-card h-100">
            <div class="card-body p-20">
              <div class="d-flex align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium mb-1 contact-stat-title">Read Queries</p>
                  <h6 class="mb-0 contact-stat-value" id="statReadCount">{{ $stats['read'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-info-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:eye-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm mt-12 mb-0 contact-stat-note">Viewed messages</p>
            </div>
          </a>
        </div>

        <div class="col-xxl-3 col-sm-6">
          <a href="{{ route('contacts.index', ['status' => 'replied']) }}" class="contact-glass-card h-100">
            <div class="card-body p-20">
              <div class="d-flex align-items-center justify-content-between gap-3">
                <div>
                  <p class="fw-medium mb-1 contact-stat-title">Replied Queries</p>
                  <h6 class="mb-0 contact-stat-value" id="statRepliedCount">{{ $stats['replied'] }}</h6>
                </div>
                <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                  <iconify-icon icon="solar:check-circle-bold" class="text-white text-2xl mb-0"></iconify-icon>
                </div>
              </div>
              <p class="fw-medium text-sm mt-12 mb-0 contact-stat-note">Successfully handled</p>
            </div>
          </a>
        </div>
      </div>

      <div class="d-flex flex-wrap gap-2 mb-24" id="statusChipBar">
        <button type="button" class="btn btn-sm status-chip {{ request('status', 'all') === 'all' ? 'btn-primary-600' : 'btn-outline-primary' }}" data-status="all">All ({{ $stats['total'] }})</button>
        <button type="button" class="btn btn-sm status-chip {{ request('status') === 'new' ? 'btn-primary-600' : 'btn-outline-primary' }}" data-status="new">New ({{ $stats['new'] }})</button>
        <button type="button" class="btn btn-sm status-chip {{ request('status') === 'read' ? 'btn-primary-600' : 'btn-outline-primary' }}" data-status="read">Read ({{ $stats['read'] }})</button>
        <button type="button" class="btn btn-sm status-chip {{ request('status') === 'replied' ? 'btn-primary-600' : 'btn-outline-primary' }}" data-status="replied">Replied ({{ $stats['replied'] }})</button>
        <button type="button" class="btn btn-sm status-chip {{ request('status') === 'archived' ? 'btn-primary-600' : 'btn-outline-primary' }}" data-status="archived">Archived ({{ $stats['archived'] }})</button>
      </div>

      <div class="card contact-main-card contact-glass-table">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
          <h6 class="fw-semibold mb-0">All Contact Queries</h6>
          <div class="d-flex flex-wrap align-items-center gap-2">
            <select class="form-select form-select-sm bulk-controls" id="bulkStatusSelect">
              <option value="">Set status...</option>
              <option value="new">Mark as New</option>
              <option value="read">Mark as Read</option>
              <option value="replied">Mark as Replied</option>
              <option value="archived">Archive</option>
            </select>
            <button type="button" class="btn btn-sm btn-warning" onclick="bulkAction('status')" id="bulkStatusBtn" style="display: none;">
              <iconify-icon icon="solar:checklist-minimalistic-bold" class="icon"></iconify-icon>
              Update Status
            </button>
            <button type="button" class="btn btn-sm btn-danger-600" onclick="bulkAction('delete')" id="bulkDeleteBtn" style="display: none;">
              <iconify-icon icon="solar:trash-bin-minimalistic-bold" class="icon"></iconify-icon>
              Delete Selected
            </button>
            <button type="button" class="btn btn-sm btn-primary-600" id="refreshBtn" style="display:flex; align-items:center; gap:4px;">
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

          <form method="GET" action="{{ route('contacts.index') }}" class="mb-24" id="contactFilterForm">
            <div class="row gy-3">
              <div class="col-md-3">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Filter by Status</label>
                <select name="status" class="form-select form-select-sm" id="statusFilterSelect">
                  <option value="all" {{ request('status', 'all') == 'all' ? 'selected' : '' }}>All Status</option>
                  <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                  <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                  <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                  <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Sort By</label>
                <select name="sort_by" class="form-select form-select-sm" id="sortBySelect">
                  <option value="created_at" {{ request('sort_by', 'created_at') == 'created_at' ? 'selected' : '' }}>Date</option>
                  <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                  <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>Status</option>
                </select>
              </div>

              <input type="hidden" name="sort_order" id="sortOrderInput" value="{{ request('sort_order', 'desc') }}">

              <div class="col-md-4">
                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Search</label>
                <div class="input-group">
                  <input type="text" name="search" id="contactSearchInput" class="form-control form-control-sm" placeholder="Search by name, email, subject..." value="{{ request('search') }}">
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

          <form id="bulkActionForm" method="POST">
            @csrf
            <input type="hidden" name="status" id="bulkStatusInput" value="">
          </form>

          <div class="table-responsive">
              <table class="table bordered-table mb-0" id="contactsTable" data-datatable="false">
                <thead>
                  <tr>
                    <th scope="col" style="width: 80px;">
                      <div class="form-check style-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll">S.L</label>
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
                <tbody id="contactsTableBody">
                  @forelse($contacts as $contact)
                  <tr class="{{ $contact->status == 'new' ? 'bg-warning-focus' : '' }}">
                    <td>
                      <div class="form-check style-check d-flex align-items-center">
                        <input class="form-check-input contact-checkbox" type="checkbox" name="contact_ids[]" value="{{ $contact->id }}" form="bulkActionForm">
                        <label class="form-check-label">{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</label>
                      </div>
                    </td>

                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <div class="flex-grow-1">
                          <h6 class="text-md mb-0 fw-semibold">{{ $contact->name }}</h6>
                          @if($contact->status == 'new')
                          <span class="bg-danger-focus text-danger-600 border border-danger-main px-8 py-4 radius-4 fw-medium text-sm mt-1 d-inline-block">NEW</span>
                          @endif
                        </div>
                      </div>
                    </td>

                    <td><span class="text-secondary-light">{{ $contact->email }}</span></td>
                    <td><span class="text-secondary-light">{{ $contact->phone ?? 'N/A' }}</span></td>

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
                      <span class="{{ $colorClass }} px-12 py-6 radius-4 fw-medium text-sm">{{ $contact->service_name }}</span>
                    </td>

                    <td>
                      <span class="text-secondary-light" data-bs-toggle="tooltip" title="{{ $contact->subject }}">{{ Str::limit($contact->subject, 30) }}</span>
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
                        <a href="{{ route('contacts.show', $contact) }}" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                          <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>

                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center border-0" onclick="return confirm('Are you sure you want to delete this contact? This action cannot be undone.')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
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

          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-24" id="contactsPaginationWrap">
            <p class="text-sm text-secondary-light mb-0" id="contactsSummaryLine">
              @if($contacts->count() > 0)
                Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} entries
              @else
                Showing 0 entries
              @endif
            </p>
            <div id="contactsPaginationLinks">
              @if($contacts->hasPages())
                {{ $contacts->links('pagination::bootstrap-5') }}
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('contactFilterForm');
    const searchInput = document.getElementById('contactSearchInput');
    const statusSelect = document.getElementById('statusFilterSelect');
    const sortBySelect = document.getElementById('sortBySelect');
    const statusChipBar = document.getElementById('statusChipBar');
    const selectAllCheckbox = document.getElementById('selectAll');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const bulkStatusBtn = document.getElementById('bulkStatusBtn');
    const bulkStatusSelect = document.getElementById('bulkStatusSelect');

    let searchDebounceTimer = null;

    function initTooltips() {
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
      });
    }

    function getContactCheckboxes() {
      return Array.from(document.querySelectorAll('.contact-checkbox'));
    }

    function setStatusChipActive(status) {
      document.querySelectorAll('.status-chip').forEach(function(chip) {
        const isActive = chip.getAttribute('data-status') === status;
        chip.classList.toggle('btn-primary-600', isActive);
        chip.classList.toggle('btn-outline-primary', !isActive);
      });
    }

    function toggleBulkActions() {
      const checkedCount = document.querySelectorAll('.contact-checkbox:checked').length;

      if (bulkDeleteBtn) {
        if (checkedCount > 0) {
          bulkDeleteBtn.style.display = 'inline-flex';
          bulkDeleteBtn.innerHTML = '<iconify-icon icon="solar:trash-bin-minimalistic-bold" class="icon"></iconify-icon>Delete Selected (' + checkedCount + ')';
        } else {
          bulkDeleteBtn.style.display = 'none';
        }
      }

      if (bulkStatusBtn) {
        bulkStatusBtn.style.display = checkedCount > 0 ? 'inline-flex' : 'none';
      }
    }

    function fetchContacts(explicitUrl) {
      if (!filterForm) {
        return;
      }

      const params = new URLSearchParams(new FormData(filterForm));
      const url = explicitUrl || (filterForm.action + '?' + params.toString());

      fetch(url, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(function(response) {
        if (!response.ok) {
          throw new Error('Unable to load contacts');
        }
        return response.text();
      })
      .then(function(html) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const newStats = doc.getElementById('contactsStatsCards');
        const curStats = document.getElementById('contactsStatsCards');
        if (newStats && curStats) {
          curStats.innerHTML = newStats.innerHTML;
        }

        const newChips = doc.getElementById('statusChipBar');
        const curChips = document.getElementById('statusChipBar');
        if (newChips && curChips) {
          curChips.innerHTML = newChips.innerHTML;
        }

        const newTableBody = doc.getElementById('contactsTableBody');
        const currentTableBody = document.getElementById('contactsTableBody');
        if (newTableBody && currentTableBody) {
          currentTableBody.innerHTML = newTableBody.innerHTML;
        }

        const newPaginationWrap = doc.getElementById('contactsPaginationWrap');
        const currentPaginationWrap = document.getElementById('contactsPaginationWrap');
        if (newPaginationWrap && currentPaginationWrap) {
          currentPaginationWrap.innerHTML = newPaginationWrap.innerHTML;
        }

        if (selectAllCheckbox) {
          selectAllCheckbox.checked = false;
          selectAllCheckbox.indeterminate = false;
        }

        const selectedStatus = statusSelect ? statusSelect.value : 'all';
        setStatusChipActive(selectedStatus || 'all');

        toggleBulkActions();
        initTooltips();

        window.history.replaceState({}, '', url);
      })
      .catch(function() {
        location.href = url;
      });
    }

    initTooltips();
    toggleBulkActions();

    if (filterForm) {
      filterForm.addEventListener('submit', function(event) {
        event.preventDefault();
        fetchContacts();
      });
    }

    if (searchInput) {
      searchInput.addEventListener('input', function() {
        clearTimeout(searchDebounceTimer);
        searchDebounceTimer = setTimeout(fetchContacts, 350);
      });
    }

    if (statusSelect) {
      statusSelect.addEventListener('change', function() {
        setStatusChipActive(statusSelect.value || 'all');
        fetchContacts();
      });
    }

    if (sortBySelect) {
      sortBySelect.addEventListener('change', fetchContacts);
    }

    if (statusChipBar) {
      statusChipBar.addEventListener('click', function(event) {
        const chip = event.target.closest('.status-chip');
        if (!chip) {
          return;
        }

        const status = chip.getAttribute('data-status') || 'all';
        if (statusSelect) {
          statusSelect.value = status;
        }

        setStatusChipActive(status);
        fetchContacts();
      });
    }

    document.addEventListener('click', function(event) {
      const paginationLink = event.target.closest('#contactsPaginationLinks a');
      if (!paginationLink) {
        return;
      }

      event.preventDefault();
      fetchContacts(paginationLink.getAttribute('href'));
    });

    if (selectAllCheckbox) {
      selectAllCheckbox.addEventListener('change', function() {
        getContactCheckboxes().forEach(function(checkbox) {
          checkbox.checked = selectAllCheckbox.checked;
        });
        toggleBulkActions();
      });
    }

    document.addEventListener('change', function(event) {
      if (!event.target.classList.contains('contact-checkbox')) {
        return;
      }

      const contactCheckboxes = getContactCheckboxes();
      const allChecked = contactCheckboxes.length > 0 && contactCheckboxes.every(function(cb) { return cb.checked; });
      const someChecked = contactCheckboxes.some(function(cb) { return cb.checked; });

      if (selectAllCheckbox) {
        selectAllCheckbox.checked = allChecked;
        selectAllCheckbox.indeterminate = someChecked && !allChecked;
      }

      toggleBulkActions();
    });

    document.getElementById('refreshBtn')?.addEventListener('click', function(event) {
      event.preventDefault();
      const icon = this.querySelector('iconify-icon');
      icon?.classList.add('rotate-animation');
      setTimeout(function() {
        location.reload();
      }, 300);
    });

    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
      setTimeout(function() {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
      }, 5000);
    });
  });

  function bulkAction(action) {
    const form = document.getElementById('bulkActionForm');
    const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');
    const bulkStatusSelect = document.getElementById('bulkStatusSelect');
    const bulkStatusInput = document.getElementById('bulkStatusInput');

    if (checkedBoxes.length === 0) {
      Swal.fire({
        icon: 'warning',
        title: 'No Selection',
        text: 'Please select at least one contact first.',
        confirmButtonColor: '#3085d6',
      });
      return;
    }

    if (action === 'delete') {
      Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete ' + checkedBoxes.length + ' contact(s). This action cannot be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete them!',
        cancelButtonText: 'Cancel'
      }).then(function(result) {
        if (result.isConfirmed) {
          form.action = '{{ route("contacts.bulk-delete") }}';
          form.submit();
        }
      });
      return;
    }

    if (action === 'status') {
      const status = bulkStatusSelect ? bulkStatusSelect.value : '';
      if (!status) {
        Swal.fire({
          icon: 'info',
          title: 'Select Status',
          text: 'Please choose a status before updating.',
          confirmButtonColor: '#3085d6',
        });
        return;
      }

      Swal.fire({
        title: 'Update status?',
        text: 'You are about to update ' + checkedBoxes.length + ' contact(s) to "' + status + '".',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, update',
        cancelButtonText: 'Cancel'
      }).then(function(result) {
        if (result.isConfirmed) {
          if (bulkStatusInput) {
            bulkStatusInput.value = status;
          }
          form.action = '{{ route("contacts.bulk-status") }}';
          form.submit();
        }
      });
    }
  }
</script>
@endpush
@endsection
