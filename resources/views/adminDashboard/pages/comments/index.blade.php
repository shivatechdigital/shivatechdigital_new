@extends('adminDashboard.index')

@section('title', 'Comments')

@section('adminDashboard.content')
<style>
    .comments-page {
        --cm-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --cm-surface: rgba(255, 255, 255, 0.82);
        --cm-text: #0f172a;
        --cm-muted: #64748b;
        --cm-border: rgba(148, 163, 184, 0.28);
        --cm-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .comments-page {
        --cm-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --cm-surface: rgba(15, 23, 42, 0.86);
        --cm-text: #e2e8f0;
        --cm-muted: #94a3b8;
        --cm-border: rgba(148, 163, 184, 0.24);
        --cm-shadow: 0 20px 46px rgba(2, 6, 23, 0.55);
    }

    .comments-page {
        background: var(--cm-bg);
        border-radius: 18px;
        padding: 18px;
    }

    .comments-page .cm-card {
        background: var(--cm-surface);
        border: 1px solid var(--cm-border);
        border-radius: 16px;
        box-shadow: var(--cm-shadow);
        backdrop-filter: blur(10px);
    }

    .comments-page h1,
    .comments-page th,
    .comments-page td,
    .comments-page label {
        color: var(--cm-text);
    }

    .comments-page .text-soft {
        color: var(--cm-muted) !important;
    }

    .comments-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 120px;
        gap: 10px;
        margin-bottom: 14px;
    }

    .comments-filter-grid .form-control,
    .comments-filter-grid .form-select {
        min-height: 42px;
        border-color: var(--cm-border);
        color: var(--cm-text);
        background: rgba(255, 255, 255, 0.85);
    }

    html[data-theme=dark] .comments-filter-grid .form-control,
    html[data-theme=dark] .comments-filter-grid .form-select {
        background: rgba(30, 41, 59, 0.78);
        border-color: #475569;
        color: #f8fafc;
    }

    .cm-bulk-row {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .cm-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--cm-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.18);
        margin-bottom: 0;
    }

    .cm-table thead th {
        border-bottom: 1px solid var(--cm-border);
        font-size: 13px;
        color: var(--cm-muted);
        background: transparent;
        white-space: nowrap;
    }

    .cm-table td,
    .cm-table th {
        color: var(--cm-text) !important;
        vertical-align: top;
    }

    .cm-table tbody tr {
        background: rgba(255, 255, 255, 0.72);
    }

    .cm-table tbody tr:hover {
        background: rgba(241, 245, 249, 0.92);
    }

    html[data-theme=dark] .cm-table tbody tr {
        background: rgba(30, 41, 59, 0.82);
    }

    html[data-theme=dark] .cm-table tbody tr:hover {
        background: rgba(51, 65, 85, 0.9);
    }

    .cm-table tbody tr.row-selected {
        background: rgba(37, 99, 235, 0.14) !important;
    }

    html[data-theme=dark] .cm-table tbody tr.row-selected {
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

    .comment-select-checkbox {
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

    html[data-theme=dark] .comment-select-checkbox {
        border-color: #94a3b8;
        background: #1f2937;
    }

    .select-col { width: 44px; text-align: center; }
    .id-col { width: 70px; text-align: center; }
    .action-col { min-width: 160px; }

    .comment-text {
        max-width: 340px;
        white-space: pre-wrap;
        line-height: 1.45;
    }

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

    .action-icon-btn.reply-btn {
        color: #16a34a;
        border-color: rgba(22, 163, 74, 0.38);
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
        .comments-filter-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .comments-filter-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container-fluid comments-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="mb-0" style="font-size: 30px !important; font-weight: 700;">Comments</h1>
            <p class="text-soft mb-0">Manage user comments and reply directly from admin</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card cm-card">
        <div class="card-body">
            <form id="commentsFiltersForm" method="GET" action="{{ route('admin.comments.index') }}">
                <input type="hidden" name="sort_by" value="{{ $sortBy }}">
                <input type="hidden" name="sort_order" value="{{ $sortOrder }}">

                <div class="comments-filter-grid">
                    <input type="text" name="search" class="form-control" placeholder="Search user name, email, comment..." value="{{ $search }}">

                    <select name="status" class="form-select auto-submit-filter">
                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="new" {{ $status === 'new' ? 'selected' : '' }}>New</option>
                        <option value="replied" {{ $status === 'replied' ? 'selected' : '' }}>Replied</option>
                    </select>

                    <select name="per_page" class="form-select auto-submit-filter">
                        <option value="10" {{ (int) $perPage === 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ (int) $perPage === 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ (int) $perPage === 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ (int) $perPage === 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.comments.bulk-delete') }}" id="bulkDeleteCommentsForm">
                @csrf
                @method('DELETE')

                <div class="cm-bulk-row">
                    <button type="submit" class="btn btn-danger-600" id="bulkDeleteCommentsBtn">
                        <i class="fas fa-trash"></i> Delete Selected
                    </button>
                    <span class="badge bg-primary-600 align-self-center" id="selectedCommentsCount">0 selected</span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover cm-table mb-0">
                        <thead>
                            <tr>
                                <th class="select-col"><input type="checkbox" id="selectAllComments" class="comment-select-checkbox" aria-label="Select all comments"></th>
                                <th class="id-col"><button type="button" class="sortable-header-btn" data-sort-key="id">ID</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="created">Post Title</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="user_name">User Name</button></th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="email">User Email</button></th>
                                <th>Comment</th>
                                <th><button type="button" class="sortable-header-btn" data-sort-key="status">Status</button></th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comments as $comment)
                                @php
                                    $latestReply = $comment->replies->first();
                                    $postTitle = optional($comment->post)->title ?? optional($comment->legacyPost)->title ?? ('Post #' . $comment->post_id);
                                @endphp
                            <tr class="comment-row-selectable">
                                <td class="select-col">
                                    <input type="checkbox" class="comment-row-checkbox comment-select-checkbox" name="comment_ids[]" value="{{ $comment->id }}" aria-label="Select comment {{ $comment->id }}">
                                </td>
                                <td class="id-col">{{ $comment->id }}</td>
                                <td>
                                    <strong>{{ $postTitle }}</strong>
                                    <div class="text-soft small">{{ $comment->created_at->format('M d, Y h:i A') }}</div>
                                </td>
                                <td>{{ $comment->user->name ?? 'Unknown User' }}</td>
                                <td>{{ $comment->user->email ?? '-' }}</td>
                                <td>
                                    <div class="comment-text">{{ $comment->comment }}</div>
                                </td>
                                <td>
                                    @if($comment->replies_count > 0)
                                        <span class="badge bg-success">Replied ({{ $comment->replies_count }})</span>
                                    @else
                                        <span class="badge bg-warning text-dark">New</span>
                                    @endif
                                </td>
                                <td>
                                    @if($latestReply)
                                        <a href="{{ route('admin.comments.reply.edit', ['comment' => $comment->id, 'reply' => $latestReply->id]) }}" class="action-icon-btn edit-btn" title="Edit Reply">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.comments.reply.create', $comment) }}" class="action-icon-btn reply-btn" title="Reply">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    @endif

                                    <button type="button" class="action-icon-btn delete-btn delete-single-comment" data-action="{{ route('admin.comments.destroy', $comment) }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-soft py-4">No comments found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-soft">
                    Showing {{ $comments->firstItem() ?? 0 }} to {{ $comments->lastItem() ?? 0 }} of {{ $comments->total() }} comments
                </small>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>

<form id="singleCommentDeleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const commentsSelectionStorageKey = 'admin.comments.selectedIds';

    const filtersForm = document.getElementById('commentsFiltersForm');
    const searchInput = filtersForm?.querySelector('input[name="search"]');
    const autoSubmitFilters = document.querySelectorAll('.auto-submit-filter');
    const sortByField = filtersForm?.querySelector('input[name="sort_by"]');
    const sortOrderField = filtersForm?.querySelector('input[name="sort_order"]');
    const sortButtons = document.querySelectorAll('.sortable-header-btn[data-sort-key]');

    const selectAll = document.getElementById('selectAllComments');
    const rowCheckboxes = Array.from(document.querySelectorAll('.comment-row-checkbox'));
    const selectableRows = Array.from(document.querySelectorAll('.comment-row-selectable'));
    const selectedCountBadge = document.getElementById('selectedCommentsCount');

    const bulkDeleteForm = document.getElementById('bulkDeleteCommentsForm');
    const singleDeleteForm = document.getElementById('singleCommentDeleteForm');
    const deleteSingleButtons = document.querySelectorAll('.delete-single-comment');

    function readStoredSelection() {
        try {
            const raw = localStorage.getItem(commentsSelectionStorageKey);
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
            localStorage.setItem(commentsSelectionStorageKey, JSON.stringify(selectedIds));
        } catch (error) {
            // Ignore storage errors.
        }
    }

    function clearStoredSelection() {
        try {
            localStorage.removeItem(commentsSelectionStorageKey);
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
            const rowCheckbox = row.querySelector('.comment-row-checkbox');
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
            const rowCheckbox = row.querySelector('.comment-row-checkbox');
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
                    await Swal.fire({ icon: 'warning', title: 'No Selection', text: 'Please select at least one comment.' });
                }
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete selected comments?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete selected comments?') };

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
                    title: 'Delete this comment?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete this comment?') };

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
