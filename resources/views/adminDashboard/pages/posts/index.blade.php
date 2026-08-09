@extends('adminDashboard.index')
@section('adminDashboard.content')
<style>
    .posts-glass-page {
        --bg-grad: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --surface: rgba(255, 255, 255, 0.78);
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-soft: rgba(148, 163, 184, 0.28);
        --shadow-soft: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .posts-glass-page {
        --bg-grad: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --surface: rgba(30, 41, 59, 0.7);
        --text-main: #e2e8f0;
        --text-muted: #94a3b8;
        --border-soft: rgba(148, 163, 184, 0.24);
        --shadow-soft: 0 20px 46px rgba(2, 6, 23, 0.55);
    }

    .posts-glass-page {
        background: var(--bg-grad);
        border-radius: 18px;
        padding: 18px;
    }

    .posts-glass-card {
        background: var(--surface);
        border: 1px solid var(--border-soft);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        box-shadow: var(--shadow-soft);
    }

    .posts-glass-page h1,
    .posts-glass-page h2,
    .posts-glass-page h5,
    .posts-glass-page th,
    .posts-glass-page td,
    .posts-glass-page label {
        color: var(--text-main);
    }

    .posts-glass-page .text-soft {
        color: var(--text-muted);
    }

    .posts-stat {
        padding: 14px;
        border-radius: 14px;
        color: #fff;
        box-shadow: 0 12px 22px rgba(59, 130, 246, 0.22);
    }

    .posts-stat h3,
    .posts-stat h6 {
        color: #fff;
        margin: 0;
    }

    .posts-stat h3 {
        font-size: 2rem !important;
        line-height: 1.1;
    }

    .posts-stat h6{
        font-size: 15px !important;
    }

    .posts-stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        font-size: 1.7rem;
    }

    .posts-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 1fr 1fr 1fr;
        gap: 10px;
        margin-bottom: 14px;
    }

    .posts-filter-grid .form-control,
    .posts-filter-grid .form-select {
        min-height: 42px;
        border-color: var(--border-soft);
        color: var(--text-main);
        background: rgba(255, 255, 255, 0.86);
    }

    html[data-theme=dark] .posts-filter-grid .form-control,
    html[data-theme=dark] .posts-filter-grid .form-select {
        background: rgba(15, 23, 42, 0.62);
    }

    .posts-table thead th {
        border-bottom: 1px solid var(--border-soft);
        font-size: 13px;
        color: var(--text-muted);
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
        color: var(--text-muted);
        min-width: 12px;
    }

    .posts-table tbody td {
        border-color: rgba(148, 163, 184, 0.18);
        vertical-align: middle;
    }

    .select-col { width: 44px; text-align: center; }
    .id-col { width: 70px; text-align: center; }
    .action-col { min-width: 100px; }

    .post-select-checkbox {
        appearance: auto !important;
        -webkit-appearance: checkbox !important;
        display: inline-block !important;
        width: 16px;
        height: 16px;
        min-width: 16px;
        min-height: 16px;
        margin: 0;
        cursor: pointer;
        accent-color: #2563eb;
        border: 1px solid #94a3b8;
        background: #ffffff;
        vertical-align: middle;
    }

    html[data-theme=dark] .post-select-checkbox {
        border-color: #94a3b8;
        background: #1f2937;
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

    .action-icon-btn.edit-btn {
        color: #2563eb;
        border-color: rgba(37, 99, 235, 0.38);
    }

    .action-icon-btn.delete-btn {
        color: #dc2626;
        border-color: rgba(220, 38, 38, 0.38);
    }

    @media (max-width: 1200px) {
        .posts-filter-grid {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .posts-filter-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

<div class="container-fluid posts-glass-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h1 class="mb-0" style="font-size: 30px !important; font-weight: 700;">All Posts</h1>
            <p class="text-soft mb-0">Blog dashboard merged with complete post management</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary-600 radius-8 px-20 py-10">
            <i class="fas fa-plus"></i> Add New Post
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-3 mb-3">
        <div class="col-md-3">
            <div class="posts-stat" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Posts</h6>
                        <h3>{{ $totalPosts }}</h3>
                    </div>
                    <div class="posts-stat-icon"><i class="fas fa-file-alt"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="posts-stat" style="background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Published</h6>
                        <h3>{{ $publishedPosts }}</h3>
                    </div>
                    <div class="posts-stat-icon"><i class="fas fa-check-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="posts-stat" style="background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Views</h6>
                        <h3>{{ number_format($totalViews) }}</h3>
                    </div>
                    <div class="posts-stat-icon"><i class="fas fa-eye"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="posts-stat" style="background: linear-gradient(135deg, #22c55e 0%, #2dd4bf 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Comments</h6>
                        <h3>{{ $totalComments }}</h3>
                    </div>
                    <div class="posts-stat-icon"><i class="fas fa-comments"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card posts-glass-card">
        <div class="card-body">
            <form id="postsFiltersForm" method="GET" action="{{ route('admin.posts.index') }}">
                <div class="posts-filter-grid">
                    <input type="text" name="search" class="form-control" placeholder="Search title, excerpt, author..." value="{{ $search }}">

                    <select name="status" class="form-select auto-submit-filter">
                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="published" {{ $status === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ $status === 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="scheduled" {{ $status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    </select>

                    <select name="category_id" class="form-select auto-submit-filter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (string)$categoryId === (string)$category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <select name="author_id" class="form-select auto-submit-filter">
                        <option value="">All Authors</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ (string)$authorId === (string)$author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>

                    <select name="sort_by" class="form-select auto-submit-filter">
                        <option value="id" {{ $sortBy === 'id' ? 'selected' : '' }}>Sort by ID</option>
                        <option value="title" {{ $sortBy === 'title' ? 'selected' : '' }}>Sort by Title</option>
                        <option value="category" {{ $sortBy === 'category' ? 'selected' : '' }}>Sort by Category</option>
                        <option value="status" {{ $sortBy === 'status' ? 'selected' : '' }}>Sort by Status</option>
                        <option value="views" {{ $sortBy === 'views' ? 'selected' : '' }}>Sort by Views</option>
                        <option value="date" {{ $sortBy === 'date' ? 'selected' : '' }}>Sort by Date</option>
                        <option value="action" {{ $sortBy === 'action' ? 'selected' : '' }}>Sort by Action</option>
                    </select>

                    <select name="sort_order" class="form-select auto-submit-filter">
                        <option value="asc" {{ $sortOrder === 'asc' ? 'selected' : '' }}>Ascending</option>
                        <option value="desc" {{ $sortOrder === 'desc' ? 'selected' : '' }}>Descending</option>
                    </select>

                    <select name="per_page" class="form-select auto-submit-filter">
                        <option value="10" {{ (int)$perPage === 10 ? 'selected' : '' }}>10 / page</option>
                        <option value="20" {{ (int)$perPage === 20 ? 'selected' : '' }}>20 / page</option>
                        <option value="50" {{ (int)$perPage === 50 ? 'selected' : '' }}>50 / page</option>
                        <option value="100" {{ (int)$perPage === 100 ? 'selected' : '' }}>100 / page</option>
                    </select>
                </div>
            </form>

            <form method="POST" action="{{ route('admin.posts.bulk-action') }}" id="bulkPostsForm">
                @csrf
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <select name="action" class="form-select" style="max-width: 220px;">
                        <option value="">Select Bulk Action</option>
                        <option value="publish">Publish Selected</option>
                        <option value="unpublish">Unpublish Selected</option>
                        <option value="featured">Mark Featured</option>
                        <option value="delete">Delete Selected</option>
                    </select>
                    <button type="submit" class="btn btn-danger-600">Apply Selected</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover posts-table mb-0">
                        <thead>
                            <tr>
                                <th class="select-col"><input type="checkbox" id="selectAllPosts" class="post-select-checkbox" aria-label="Select all posts"></th>
                                <th class="id-col">
                                    <button type="button" class="sortable-header-btn" data-sort-key="id">
                                        ID
                                        <span class="sort-indicator">{{ $sortBy === 'id' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th>Image</th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="title">
                                        Title
                                        <span class="sort-indicator">{{ $sortBy === 'title' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="category">
                                        Category
                                        <span class="sort-indicator">{{ $sortBy === 'category' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th>Author</th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="views">
                                        Views
                                        <span class="sort-indicator">{{ $sortBy === 'views' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="status">
                                        Status
                                        <span class="sort-indicator">{{ $sortBy === 'status' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="sortable-header-btn" data-sort-key="date">
                                        Date
                                        <span class="sort-indicator">{{ $sortBy === 'date' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                                <th class="action-col">
                                    <button type="button" class="sortable-header-btn" data-sort-key="action">
                                        Actions
                                        <span class="sort-indicator">{{ $sortBy === 'action' ? ($sortOrder === 'asc' ? '↑' : '↓') : '↕' }}</span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td class="select-col"><input type="checkbox" class="post-row-checkbox post-select-checkbox" name="posts[]" value="{{ $post->id }}" aria-label="Select post {{ $post->id }}"></td>
                                <td class="id-col">{{ ($posts->firstItem() ?? 1) + $loop->index }}</td>
                                <td>
                                    @if($post->featured_image)
                                        <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/'.$post->featured_image) }}" width="50" height="50" class="rounded" alt="Post image">
                                    @else
                                        <div class="bg-secondary rounded" style="width:50px;height:50px;"></div>
                                    @endif
                                </td>
                                <td>{{ Str::limit($post->title, 40) }}</td>
                                <td><span class="badge bg-info">{{ $post->category->name ?? 'Uncategorized' }}</span></td>
                                <td>{{ $post->user->name ?? 'Unknown' }}</td>
                                <td>{{ $post->views }}</td>
                                <td>
                                    @if($post->is_published || $post->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $post->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="action-icon-btn edit-btn" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="action-icon-btn delete-btn delete-single-post" data-action="{{ route('admin.posts.destroy', $post) }}" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-soft py-4">No posts found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">
                <small class="text-soft">
                    Showing {{ $posts->firstItem() ?? 0 }} to {{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} posts
                </small>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

<form id="singleDeleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filtersForm = document.getElementById('postsFiltersForm');
    const searchInput = filtersForm?.querySelector('input[name="search"]');
    const autoSubmitFilters = document.querySelectorAll('.auto-submit-filter');
    const sortByField = filtersForm?.querySelector('select[name="sort_by"]');
    const sortOrderField = filtersForm?.querySelector('select[name="sort_order"]');
    const sortButtons = document.querySelectorAll('.sortable-header-btn[data-sort-key]');
    const selectAll = document.getElementById('selectAllPosts');
    const rowCheckboxes = Array.from(document.querySelectorAll('.post-row-checkbox'));
    const bulkPostsForm = document.getElementById('bulkPostsForm');
    const deleteButtons = document.querySelectorAll('.delete-single-post');
    const singleDeleteForm = document.getElementById('singleDeleteForm');

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

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            rowCheckboxes.forEach(function (checkbox) {
                checkbox.checked = selectAll.checked;
            });
        });
    }

    rowCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            if (!selectAll) {
                return;
            }
            selectAll.checked = rowCheckboxes.length > 0 && rowCheckboxes.every(function (item) {
                return item.checked;
            });
        });
    });

    if (bulkPostsForm) {
        bulkPostsForm.addEventListener('submit', async function (event) {
            const action = bulkPostsForm.querySelector('select[name="action"]')?.value || '';
            const selectedRows = rowCheckboxes.filter(function (checkbox) { return checkbox.checked; });

            if (!action) {
                event.preventDefault();
                if (window.Swal) {
                    await Swal.fire({ icon: 'warning', title: 'Action Required', text: 'Please select a bulk action first.' });
                }
                return;
            }

            if (selectedRows.length === 0) {
                event.preventDefault();
                if (window.Swal) {
                    await Swal.fire({ icon: 'warning', title: 'No Selection', text: 'Please select at least one post.' });
                }
                return;
            }

            if (action === 'delete') {
                event.preventDefault();
                const result = window.Swal
                    ? await Swal.fire({
                        title: 'Delete selected posts?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Yes, delete'
                    })
                    : { isConfirmed: confirm('Delete selected posts?') };

                if (result.isConfirmed) {
                    bulkPostsForm.submit();
                }
            }
        });
    }

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', async function () {
            const action = button.getAttribute('data-action');
            if (!action || !singleDeleteForm) {
                return;
            }

            const result = window.Swal
                ? await Swal.fire({
                    title: 'Delete this post?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete'
                })
                : { isConfirmed: confirm('Delete this post?') };

            if (result.isConfirmed) {
                singleDeleteForm.setAttribute('action', action);
                singleDeleteForm.submit();
            }
        });
    });
});
</script>
@endsection