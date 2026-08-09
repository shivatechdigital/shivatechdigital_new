@extends('adminDashboard.index')

@section('title', 'Categories')

@section('adminDashboard.content')
<style>
    .categories-page {
        --cat-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --cat-surface: rgba(255, 255, 255, 0.82);
        --cat-text: #0f172a;
        --cat-muted: #64748b;
        --cat-border: rgba(148, 163, 184, 0.28);
        --cat-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .categories-page {
        --cat-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --cat-surface: rgba(15, 23, 42, 0.86);
        --cat-text: #e2e8f0;
        --cat-muted: #94a3b8;
        --cat-border: rgba(148, 163, 184, 0.24);
        --cat-shadow: 0 20px 46px rgba(2, 6, 23, 0.55);
    }

    .categories-page {
        background: var(--cat-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .categories-page .cat-card {
        background: var(--cat-surface);
        border: 1px solid var(--cat-border);
        border-radius: 16px;
        box-shadow: var(--cat-shadow);
        backdrop-filter: blur(10px);
    }

    .categories-page h1,
    .categories-page th,
    .categories-page td,
    .categories-page label {
        color: var(--cat-text);
    }

    .categories-page .text-soft {
        color: var(--cat-muted) !important;
    }

    .categories-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 120px;
        gap: 10px;
        margin-bottom: 14px;
    }

    .categories-filter-grid .form-control,
    .categories-filter-grid .form-select {
        min-height: 42px;
        border-color: var(--cat-border);
        color: var(--cat-text);
        background: rgba(255, 255, 255, 0.85);
    }

    html[data-theme=dark] .categories-filter-grid .form-control,
    html[data-theme=dark] .categories-filter-grid .form-select {
        background: rgba(30, 41, 59, 0.78);
        border-color: #475569;
        color: #f8fafc;
    }

    .cat-bulk-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .cat-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--cat-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.18);
        margin-bottom: 0;
    }

    .cat-table thead th {
        border-bottom: 1px solid var(--cat-border);
        font-size: 13px;
        color: var(--cat-muted);
        background: transparent;
    }

    .cat-table td,
    .cat-table th {
        color: var(--cat-text) !important;
        vertical-align: middle;
    }

    .cat-table tbody tr {
        background: rgba(255, 255, 255, 0.72);
    }

    .cat-table tbody tr:hover {
        background: rgba(241, 245, 249, 0.92);
    }

    html[data-theme=dark] .cat-table tbody tr {
        background: rgba(30, 41, 59, 0.82);
    }

    html[data-theme=dark] .cat-table tbody tr:hover {
        background: rgba(51, 65, 85, 0.9);
    }

    .cat-table tbody tr.row-selected {
        background: rgba(37, 99, 235, 0.14) !important;
    }

    html[data-theme=dark] .cat-table tbody tr.row-selected {
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

    .sortable-header-btn .sort-indicator {
        font-size: 11px;
        color: var(--cat-muted);
        min-width: 12px;
    }

    .category-select-checkbox {
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

    html[data-theme=dark] .category-select-checkbox {
        border-color: #94a3b8;
        background: #1f2937;
    }

    .select-col { width: 44px; text-align: center; }
    .num-col { width: 70px; text-align: center; }
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

    .import-modal .modal-content {
        border-radius: 14px;
    }

    @media (max-width: 992px) {
        .categories-filter-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .categories-filter-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid categories-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="mb-0" style="font-size: 30px; font-weight: 700;">Categories</h1>
            <p class="text-soft mb-0">Manage categories with filters, sorting, import/export, and bulk actions</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.categories.export', request()->query()) }}" class="btn btn-success-600 radius-8 px-16 py-10">
                <i class="fas fa-file-export"></i> Export CSV
            </a>
            <button type="button" class="btn btn-info-600 radius-8 px-16 py-10" data-bs-toggle="modal" data-bs-target="#importCategoriesModal">
                <i class="fas fa-file-import"></i> Import CSV
            </button>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary-600 radius-8 px-16 py-10">
                <i class="fas fa-plus"></i> Add New Category
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card cat-card">
        <div class="card-body">
            <form id="categoryFiltersForm" method="GET" action="{{ route('admin.categories.index') }}">
                <input type="hidden" name="sort_by" value="{{ $sortBy }}">
                <input type="hidden" name="sort_order" value="{{ $sortOrder }}">

                <div class="categories-filter-grid">
                    <input type="text" name="search" class="form-control" placeholder="Search name, slug, description..." value="{{ $search }}">

                    <select name="image_filter" class="form-select auto-submit-filter">
                        <option value="all" {{ $imageFilter === 'all' ? 'selected' : '' }}>All Images</option>
                        <option value="with_image" {{ $imageFilter === 'with_image' ? 'selected' : '' }}>With Image</option>
                        <option value="without_image" {{ $imageFilter === 'without_image' ? 'selected' : '' }}>Without Image</option>
                    </select>

                    <select name="per_page" class="form-select auto-submit-filter">
                        <option value="10" {{ (int) $perPage === 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ (int) $perPage === 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ (int) $perPage === 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ (int) $perPage === 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.categories.bulk-delete') }}" id="bulkDeleteCategoriesForm">
                @csrf
                @method('DELETE')

                <div class="cat-bulk-row">
                    <button type="submit" class="btn btn-danger-600" id="bulkDeleteBtn">
                        <i class="fas fa-trash"></i> Delete Selected
                    </button>
                    <span class="badge bg-primary-600 align-self-center" id="selectedCategoriesCount">0 selected</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover cat-table mb-0">
                        <thead>
                            <tr>
                                <th class="select-col"><input type="checkbox" id="selectAllCategories" class="category-select-checkbox" aria-label="Select all categories"></th>
                                <th class="num-col">
                                    <button type="button" class="sortable-header-btn" data-sort-key="number">
                                        #
                                        <span class="sort-indicator">{{ $sortBy === 'number' ? ($sortOrder === 'asc' ? '^' : 'v') : '<>' }}</span>
                                    </button>
                                </th>
                                <th>Image</th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="name">
                                        Name
                                        <span class="sort-indicator">{{ $sortBy === 'name' ? ($sortOrder === 'asc' ? '^' : 'v') : '<>' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="slug">
                                        Slug
                                        <span class="sort-indicator">{{ $sortBy === 'slug' ? ($sortOrder === 'asc' ? '^' : 'v') : '<>' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="posts_count">
                                        Posts Count
                                        <span class="sort-indicator">{{ $sortBy === 'posts_count' ? ($sortOrder === 'asc' ? '^' : 'v') : '<>' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="created">
                                        Created
                                        <span class="sort-indicator">{{ $sortBy === 'created' ? ($sortOrder === 'asc' ? '^' : 'v') : '<>' }}</span>
                                    </button>
                                </th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr class="category-row-selectable">
                                <td class="select-col">
                                    <input type="checkbox" class="category-row-checkbox category-select-checkbox" name="category_ids[]" value="{{ $category->id }}" aria-label="Select category {{ $category->id }}">
                                </td>
                                <td class="num-col">{{ ($categories->firstItem() ?? 1) + $loop->index }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" width="50" height="50" class="rounded" alt="Category image">
                                    @else
                                        <div class="bg-secondary rounded" style="width:50px;height:50px;"></div>
                                    @endif
                                </td>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td><span class="badge bg-primary">{{ $category->posts_count }} posts</span></td>
                                <td>{{ $category->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="action-icon-btn edit-btn" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="action-icon-btn delete-btn delete-single-category" data-action="{{ route('admin.categories.destroy', $category) }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-soft py-4">No categories found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-soft">
                    Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} categories
                </small>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

<form id="singleCategoryDeleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<div class="modal fade import-modal" id="importCategoriesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.categories.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Import Categories (CSV)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">CSV File</label>
                    <input type="file" name="import_file" class="form-control" accept=".csv,.txt" required>
                    <small class="text-muted d-block mt-2">Expected columns: name, description</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filtersForm = document.getElementById('categoryFiltersForm');
    const searchInput = filtersForm?.querySelector('input[name="search"]');
    const autoSubmitFilters = document.querySelectorAll('.auto-submit-filter');
    const sortByField = filtersForm?.querySelector('input[name="sort_by"]');
    const sortOrderField = filtersForm?.querySelector('input[name="sort_order"]');
    const sortButtons = document.querySelectorAll('.sortable-header-btn[data-sort-key]');

    const selectAll = document.getElementById('selectAllCategories');
    const rowCheckboxes = Array.from(document.querySelectorAll('.category-row-checkbox'));
    const selectableRows = Array.from(document.querySelectorAll('.category-row-selectable'));
    const selectedCountBadge = document.getElementById('selectedCategoriesCount');

    const bulkDeleteForm = document.getElementById('bulkDeleteCategoriesForm');
    const singleDeleteForm = document.getElementById('singleCategoryDeleteForm');
    const deleteSingleButtons = document.querySelectorAll('.delete-single-category');

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
            const rowCheckbox = row.querySelector('.category-row-checkbox');
            row.classList.toggle('row-selected', !!rowCheckbox && rowCheckbox.checked);
        });

        if (selectAll) {
            selectAll.checked = rowCheckboxes.length > 0 && rowCheckboxes.every(function (item) { return item.checked; });
        }
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
            const rowCheckbox = row.querySelector('.category-row-checkbox');
            if (!rowCheckbox) {
                return;
            }
            rowCheckbox.checked = !rowCheckbox.checked;
            syncSelectionUI();
        });
    });

    syncSelectionUI();

    if (bulkDeleteForm) {
        bulkDeleteForm.addEventListener('submit', async function (event) {
            event.preventDefault();
            const selected = rowCheckboxes.filter(function (item) { return item.checked; });
            if (selected.length === 0) {
                if (window.Swal) {
                    await Swal.fire({ icon: 'warning', title: 'No Selection', text: 'Please select at least one category.' });
                }
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete selected categories?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete selected categories?') };

            if (result.isConfirmed) {
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
                    title: 'Delete this category?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete this category?') };

            if (result.isConfirmed) {
                singleDeleteForm.setAttribute('action', action);
                singleDeleteForm.submit();
            }
        });
    });
});
</script>
@endsection
