@extends('adminDashboard.index')

@section('title', 'Partners')

@section('adminDashboard.content')
<style>
    .partners-page {
        --pt-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --pt-surface: rgba(255, 255, 255, 0.82);
        --pt-text: #0f172a;
        --pt-muted: #64748b;
        --pt-border: rgba(148, 163, 184, 0.28);
        --pt-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .partners-page {
        --pt-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --pt-surface: rgba(15, 23, 42, 0.86);
        --pt-text: #e2e8f0;
        --pt-muted: #94a3b8;
        --pt-border: rgba(148, 163, 184, 0.24);
        --pt-shadow: 0 20px 46px rgba(2, 6, 23, 0.55);
    }

    .partners-page {
        background: var(--pt-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .partners-page .pt-card {
        background: var(--pt-surface);
        border: 1px solid var(--pt-border);
        border-radius: 16px;
        box-shadow: var(--pt-shadow);
        backdrop-filter: blur(10px);
    }

    .partners-page h1,
    .partners-page th,
    .partners-page td,
    .partners-page label {
        color: var(--pt-text);
    }

    .partners-page .text-soft {
        color: var(--pt-muted) !important;
    }

    .partners-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 120px;
        gap: 10px;
        margin-bottom: 14px;
    }

    .partners-filter-grid .form-control,
    .partners-filter-grid .form-select {
        min-height: 42px;
        border-color: var(--pt-border);
        color: var(--pt-text);
        background: rgba(255, 255, 255, 0.85);
    }

    html[data-theme=dark] .partners-filter-grid .form-control,
    html[data-theme=dark] .partners-filter-grid .form-select {
        background: rgba(30, 41, 59, 0.78);
        border-color: #475569;
        color: #f8fafc;
    }

    .pt-bulk-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .pt-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--pt-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.18);
        margin-bottom: 0;
    }

    .pt-table thead th {
        border-bottom: 1px solid var(--pt-border);
        font-size: 13px;
        color: var(--pt-muted);
        background: transparent;
    }

    .pt-table td,
    .pt-table th {
        color: var(--pt-text) !important;
        vertical-align: middle;
    }

    .pt-table tbody tr {
        background: rgba(255, 255, 255, 0.72);
    }

    .pt-table tbody tr:hover {
        background: rgba(241, 245, 249, 0.92);
    }

    html[data-theme=dark] .pt-table tbody tr {
        background: rgba(30, 41, 59, 0.82);
    }

    html[data-theme=dark] .pt-table tbody tr:hover {
        background: rgba(51, 65, 85, 0.9);
    }

    .pt-table tbody tr.row-selected {
        background: rgba(37, 99, 235, 0.14) !important;
    }

    html[data-theme=dark] .pt-table tbody tr.row-selected {
        background: rgba(59, 130, 246, 0.22) !important;
    }

    .sortable-header-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 0;
        background: transparent;
        color: inherit;
        font-weight: 600;
        padding: 0;
    }

    .partner-select-checkbox {
        appearance: auto !important;
        -webkit-appearance: checkbox !important;
        display: inline-block !important;
        width: 18px;
        height: 18px;
        min-width: 18px;
        min-height: 18px;
        margin: 0;
        cursor: pointer;
        accent-color: #2563eb;
        border: 1px solid #94a3b8;
        background: #ffffff;
        vertical-align: middle;
    }

    html[data-theme=dark] .partner-select-checkbox {
        border-color: #94a3b8;
        background: #1f2937;
    }

    .select-col { width: 44px; text-align: center; }
    .num-col { width: 70px; text-align: center; }
    .action-col { min-width: 110px; }
    .logo-img { width: 50px; height: 50px; object-fit: contain; border-radius: 8px; }

    .action-icon-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid transparent;
        background: transparent;
    }

    .action-icon-btn.edit-btn {
        color: #2563eb;
        border-color: rgba(37, 99, 235, 0.38);
    }

    .action-icon-btn.delete-btn {
        color: #dc2626;
        border-color: rgba(220, 38, 38, 0.38);
    }

    @media (max-width: 992px) {
        .partners-filter-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .partners-filter-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid partners-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="mb-0" style="font-size: 30px !important; font-weight: 700;">All Partners</h1>
            <p class="text-soft mb-0">Manage partners with filters, sorting, and bulk actions</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('partners.create') }}" class="btn btn-primary-600 radius-8 px-16 py-10">
                <i class="fas fa-plus"></i> Add New Partner
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card pt-card">
        <div class="card-body">
            <form id="partnerFiltersForm" method="GET" action="{{ route('partners.index') }}">
                <input type="hidden" name="sort_by" value="{{ $sortBy }}">
                <input type="hidden" name="sort_order" value="{{ $sortOrder }}">

                <div class="partners-filter-grid">
                    <input type="text" name="search" class="form-control" placeholder="Search name, slug, type, location..." value="{{ $search }}">

                    <select name="status" class="form-select auto-submit-filter">
                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>

                    <select name="logo_filter" class="form-select auto-submit-filter">
                        <option value="all" {{ $logoFilter === 'all' ? 'selected' : '' }}>All Logos</option>
                        <option value="with_logo" {{ $logoFilter === 'with_logo' ? 'selected' : '' }}>With Logo</option>
                        <option value="without_logo" {{ $logoFilter === 'without_logo' ? 'selected' : '' }}>Without Logo</option>
                    </select>

                    <select name="per_page" class="form-select auto-submit-filter">
                        <option value="10" {{ (int) $perPage === 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ (int) $perPage === 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ (int) $perPage === 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ (int) $perPage === 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </form>

            <form method="POST" action="{{ route('partners.bulk-delete') }}" id="bulkDeletePartnersForm">
                @csrf
                @method('DELETE')

                <div class="pt-bulk-row">
                    <button type="submit" class="btn btn-danger-600" id="bulkDeletePartnersBtn">
                        <i class="fas fa-trash"></i> Delete Selected
                    </button>
                    <span class="badge bg-primary-600 align-self-center" id="selectedPartnersCount">0 selected</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover pt-table mb-0">
                        <thead>
                            <tr>
                                <th class="select-col"><input type="checkbox" id="selectAllPartners" class="partner-select-checkbox" aria-label="Select all partners"></th>
                                <th class="num-col"><button type="button" class="sortable-header-btn" data-sort-key="number">#</button></th>
                                <th>Logo</th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="name">Name</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="type">Type</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="location">Location</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="status">Status</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="created">Created</button></th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($partners as $partner)
                            <tr class="partner-row-selectable">
                                <td class="select-col">
                                    <input type="checkbox" class="partner-row-checkbox partner-select-checkbox" name="partner_ids[]" value="{{ $partner->id }}" aria-label="Select partner {{ $partner->id }}">
                                </td>
                                <td class="num-col">{{ ($partners->firstItem() ?? 1) + $loop->index }}</td>
                                <td>
                                    @if($partner->logo)
                                        <img src="{{ asset('storage/' . $partner->logo) }}" class="logo-img bg-light p-1" alt="Partner logo">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                                            <i class="fas fa-building text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $partner->name }}</strong><br>
                                    <small class="text-soft">{{ $partner->slug }}</small>
                                </td>
                                <td><span class="badge bg-info">{{ $partner->type ?: 'N/A' }}</span></td>
                                <td>{{ $partner->location ?: '-' }}</td>
                                <td>
                                    @if($partner->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $partner->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('partners.edit', $partner) }}" class="action-icon-btn edit-btn" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="action-icon-btn delete-btn delete-single-partner" data-action="{{ route('partners.destroy', $partner) }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-soft py-4">No partners found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-soft">
                    Showing {{ $partners->firstItem() ?? 0 }} to {{ $partners->lastItem() ?? 0 }} of {{ $partners->total() }} partners
                </small>
                {{ $partners->links() }}
            </div>
        </div>
    </div>
</div>

<form id="singlePartnerDeleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const partnerSelectionStorageKey = 'admin.partners.selectedIds';

    const filtersForm = document.getElementById('partnerFiltersForm');
    const searchInput = filtersForm?.querySelector('input[name="search"]');
    const autoSubmitFilters = document.querySelectorAll('.auto-submit-filter');
    const sortByField = filtersForm?.querySelector('input[name="sort_by"]');
    const sortOrderField = filtersForm?.querySelector('input[name="sort_order"]');
    const sortButtons = document.querySelectorAll('.sortable-header-btn[data-sort-key]');

    const selectAll = document.getElementById('selectAllPartners');
    const rowCheckboxes = Array.from(document.querySelectorAll('.partner-row-checkbox'));
    const selectableRows = Array.from(document.querySelectorAll('.partner-row-selectable'));
    const selectedCountBadge = document.getElementById('selectedPartnersCount');

    const bulkDeleteForm = document.getElementById('bulkDeletePartnersForm');
    const singleDeleteForm = document.getElementById('singlePartnerDeleteForm');
    const deleteSingleButtons = document.querySelectorAll('.delete-single-partner');

    function readStoredSelection() {
        try {
            const raw = localStorage.getItem(partnerSelectionStorageKey);
            if (!raw) {
                return [];
            }
            const parsed = JSON.parse(raw);
            return Array.isArray(parsed) ? parsed.map(String) : [];
        } catch (error) {
            return [];
        }
    }

    function writeStoredSelection(selectedIds) {
        try {
            localStorage.setItem(partnerSelectionStorageKey, JSON.stringify(selectedIds));
        } catch (error) {
            // Ignore storage errors and continue.
        }
    }

    function clearStoredSelection() {
        try {
            localStorage.removeItem(partnerSelectionStorageKey);
        } catch (error) {
            // Ignore storage errors.
        }
    }

    function collectSelectedIds() {
        return rowCheckboxes
            .filter(function (item) { return item.checked; })
            .map(function (item) { return String(item.value); });
    }

    function restoreSelectionFromStorage() {
        const storedIds = new Set(readStoredSelection());
        if (storedIds.size === 0) {
            return;
        }

        rowCheckboxes.forEach(function (checkbox) {
            checkbox.checked = storedIds.has(String(checkbox.value));
        });
    }

    let searchDebounce = null;
    if (searchInput && filtersForm) {
        searchInput.addEventListener('input', function () {
            clearTimeout(searchDebounce);
            searchDebounce = setTimeout(function () {
                filtersForm.submit();
            }, 450);
        });
    }

    autoSubmitFilters.forEach(function (field) {
        field.addEventListener('change', function () {
            filtersForm.submit();
        });
    });

    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            if (!filtersForm || !sortByField || !sortOrderField) {
                return;
            }

            const nextSortBy = button.getAttribute('data-sort-key');
            const currentSortBy = sortByField.value;
            const currentSortOrder = sortOrderField.value;

            if (currentSortBy === nextSortBy) {
                sortOrderField.value = currentSortOrder === 'asc' ? 'desc' : 'asc';
            } else {
                sortByField.value = nextSortBy;
                sortOrderField.value = 'asc';
            }

            filtersForm.submit();
        });
    });

    function syncSelectionUI() {
        const selectedCount = rowCheckboxes.filter(function (item) { return item.checked; }).length;
        if (selectedCountBadge) {
            selectedCountBadge.textContent = selectedCount + ' selected';
        }

        selectableRows.forEach(function (row) {
            const rowCheckbox = row.querySelector('.partner-row-checkbox');
            row.classList.toggle('row-selected', !!rowCheckbox && rowCheckbox.checked);
        });

        if (selectAll) {
            selectAll.checked = rowCheckboxes.length > 0 && rowCheckboxes.every(function (item) { return item.checked; });
        }

        writeStoredSelection(collectSelectedIds());
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(function (checkbox) {
                checkbox.checked = selectAll.checked;
            });
            syncSelectionUI();
        });
    }

    rowCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', syncSelectionUI);
    });

    selectableRows.forEach(function (row) {
        row.addEventListener('click', function (event) {
            if (event.target.closest('a, button, input, .action-icon-btn')) {
                return;
            }
            const rowCheckbox = row.querySelector('.partner-row-checkbox');
            if (!rowCheckbox) {
                return;
            }
            rowCheckbox.checked = !rowCheckbox.checked;
            syncSelectionUI();
        });
    });

    restoreSelectionFromStorage();
    syncSelectionUI();

    if (bulkDeleteForm) {
        bulkDeleteForm.addEventListener('submit', async function (event) {
            event.preventDefault();
            const selected = rowCheckboxes.filter(function (item) { return item.checked; });
            if (selected.length === 0) {
                if (window.Swal) {
                    await Swal.fire({ icon: 'warning', title: 'No Selection', text: 'Please select at least one partner.' });
                }
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete selected partners?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete selected partners?') };

            if (result.isConfirmed) {
                clearStoredSelection();
                bulkDeleteForm.submit();
            }
        });
    }

    deleteSingleButtons.forEach(function (button) {
        button.addEventListener('click', async function () {
            const action = button.getAttribute('data-action');
            if (!action || !singleDeleteForm) {
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete this partner?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete this partner?') };

            if (result.isConfirmed) {
                clearStoredSelection();
                singleDeleteForm.setAttribute('action', action);
                singleDeleteForm.submit();
            }
        });
    });
});
</script>
@endsection
