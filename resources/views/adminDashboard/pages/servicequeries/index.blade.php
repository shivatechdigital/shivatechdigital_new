@extends('adminDashboard.index')

@section('title', 'All Query')

@section('adminDashboard.content')
<style>
    .queries-page {
        --sq-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --sq-surface: rgba(255, 255, 255, 0.82);
        --sq-text: #0f172a;
        --sq-muted: #64748b;
        --sq-border: rgba(148, 163, 184, 0.28);
        --sq-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .queries-page {
        --sq-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --sq-surface: rgba(15, 23, 42, 0.86);
        --sq-text: #e2e8f0;
        --sq-muted: #94a3b8;
        --sq-border: rgba(148, 163, 184, 0.24);
        --sq-shadow: 0 20px 46px rgba(2, 6, 23, 0.55);
    }

    .queries-page {
        background: var(--sq-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .queries-page .sq-card {
        background: var(--sq-surface);
        border: 1px solid var(--sq-border);
        border-radius: 16px;
        box-shadow: var(--sq-shadow);
        backdrop-filter: blur(10px);
    }

    .queries-page h1,
    .queries-page th,
    .queries-page td,
    .queries-page label {
        color: var(--sq-text);
    }

    .queries-page .text-soft {
        color: var(--sq-muted) !important;
    }

    .queries-filter-grid {
        display: grid;
        grid-template-columns: 2fr 120px;
        gap: 10px;
        margin-bottom: 14px;
    }

    .queries-filter-grid .form-control,
    .queries-filter-grid .form-select {
        min-height: 42px;
        border-color: var(--sq-border);
        color: var(--sq-text);
        background: rgba(255, 255, 255, 0.85);
    }

    html[data-theme=dark] .queries-filter-grid .form-control,
    html[data-theme=dark] .queries-filter-grid .form-select {
        background: rgba(30, 41, 59, 0.78);
        border-color: #475569;
        color: #f8fafc;
    }

    .sq-bulk-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .sq-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--sq-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.18);
        margin-bottom: 0;
    }

    .sq-table thead th {
        border-bottom: 1px solid var(--sq-border);
        font-size: 13px;
        color: var(--sq-muted);
        background: transparent;
        white-space: nowrap;
    }

    .sq-table td,
    .sq-table th {
        color: var(--sq-text) !important;
        vertical-align: middle;
    }

    .sq-table tbody tr {
        background: rgba(255, 255, 255, 0.72);
    }

    .sq-table tbody tr:hover {
        background: rgba(241, 245, 249, 0.92);
    }

    html[data-theme=dark] .sq-table tbody tr {
        background: rgba(30, 41, 59, 0.82);
    }

    html[data-theme=dark] .sq-table tbody tr:hover {
        background: rgba(51, 65, 85, 0.9);
    }

    .sq-table tbody tr.row-selected {
        background: rgba(37, 99, 235, 0.14) !important;
    }

    html[data-theme=dark] .sq-table tbody tr.row-selected {
        background: rgba(59, 130, 246, 0.22) !important;
    }

    .sortable-header-btn {
        display: inline-flex;
        align-items: center;
        border: 0;
        background: transparent;
        color: inherit;
        font-weight: 600;
        padding: 0;
    }

    .query-select-checkbox {
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

    html[data-theme=dark] .query-select-checkbox {
        border-color: #94a3b8;
        background: #1f2937;
    }

    .select-col { width: 44px; text-align: center; }
    .id-col { width: 70px; text-align: center; }
    .action-col { min-width: 110px; }

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
        .queries-filter-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .queries-filter-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid queries-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="mb-0" style="font-size: 30px !important; font-weight: 700;">All Queries</h1>
            <p class="text-soft mb-0">Manage service contact queries with filters, sorting, and bulk actions</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card sq-card">
        <div class="card-body">
            <form id="queryFiltersForm" method="GET" action="{{ route('admin.servicecontact.index') }}">
                <input type="hidden" name="sort_by" value="{{ $sortBy }}">
                <input type="hidden" name="sort_order" value="{{ $sortOrder }}">

                <div class="queries-filter-grid">
                    <input type="text" name="search" class="form-control" placeholder="Search name, email, contact, service..." value="{{ $search }}">

                    <select name="per_page" class="form-select auto-submit-filter">
                        <option value="10" {{ (int) $perPage === 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ (int) $perPage === 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ (int) $perPage === 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ (int) $perPage === 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.servicecontact.bulk-delete') }}" id="bulkDeleteQueriesForm">
                @csrf
                @method('DELETE')

                <div class="sq-bulk-row">
                    <button type="submit" class="btn btn-danger-600" id="bulkDeleteQueriesBtn">
                        <i class="fas fa-trash"></i> Delete Selected
                    </button>
                    <span class="badge bg-primary-600 align-self-center" id="selectedQueriesCount">0 selected</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover sq-table mb-0">
                        <thead>
                            <tr>
                                <th class="select-col"><input type="checkbox" id="selectAllQueries" class="query-select-checkbox" aria-label="Select all queries"></th>
                                <th class="id-col"><button type="button" class="sortable-header-btn" data-sort-key="id">ID</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="name">Name</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="email">Email</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="contact">Phone Number</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="service">Services</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="created">Created Date</button></th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($queries as $query)
                            <tr class="query-row-selectable">
                                <td class="select-col">
                                    <input type="checkbox" class="query-row-checkbox query-select-checkbox" name="query_ids[]" value="{{ $query->id }}" aria-label="Select query {{ $query->id }}">
                                </td>
                                <td class="id-col">{{ $query->id }}</td>
                                <td><strong>{{ $query->name }}</strong></td>
                                <td>{{ $query->email }}</td>
                                <td>{{ $query->contact ?? '-' }}</td>
                                <td>{{ $query->service }}</td>
                                <td>{{ optional($query->created_at)->format('M d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.servicecontact.edit', $query) }}" class="action-icon-btn edit-btn" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="action-icon-btn delete-btn delete-single-query" data-action="{{ route('admin.servicecontact.destroy', $query) }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-soft py-4">No query found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-soft">
                    Showing {{ $queries->firstItem() ?? 0 }} to {{ $queries->lastItem() ?? 0 }} of {{ $queries->total() }} queries
                </small>
                {{ $queries->links() }}
            </div>
        </div>
    </div>
</div>

<form id="singleQueryDeleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const querySelectionStorageKey = 'admin.servicequeries.selectedIds';

    const filtersForm = document.getElementById('queryFiltersForm');
    const searchInput = filtersForm?.querySelector('input[name="search"]');
    const autoSubmitFilters = document.querySelectorAll('.auto-submit-filter');
    const sortByField = filtersForm?.querySelector('input[name="sort_by"]');
    const sortOrderField = filtersForm?.querySelector('input[name="sort_order"]');
    const sortButtons = document.querySelectorAll('.sortable-header-btn[data-sort-key]');

    const selectAll = document.getElementById('selectAllQueries');
    const rowCheckboxes = Array.from(document.querySelectorAll('.query-row-checkbox'));
    const selectableRows = Array.from(document.querySelectorAll('.query-row-selectable'));
    const selectedCountBadge = document.getElementById('selectedQueriesCount');

    const bulkDeleteForm = document.getElementById('bulkDeleteQueriesForm');
    const singleDeleteForm = document.getElementById('singleQueryDeleteForm');
    const deleteSingleButtons = document.querySelectorAll('.delete-single-query');

    function readStoredSelection() {
        try {
            const raw = localStorage.getItem(querySelectionStorageKey);
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
            localStorage.setItem(querySelectionStorageKey, JSON.stringify(selectedIds));
        } catch (error) {
            // Ignore storage errors.
        }
    }

    function clearStoredSelection() {
        try {
            localStorage.removeItem(querySelectionStorageKey);
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
            const rowCheckbox = row.querySelector('.query-row-checkbox');
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
            const rowCheckbox = row.querySelector('.query-row-checkbox');
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
                    await Swal.fire({ icon: 'warning', title: 'No Selection', text: 'Please select at least one query.' });
                }
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete selected queries?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete selected queries?') };

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
                    title: 'Delete this query?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete this query?') };

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
