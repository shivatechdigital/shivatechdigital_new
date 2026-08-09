@extends('adminDashboard.index')

@section('title', 'Admin Dashboard')

@section('adminDashboard.content')
<style>
    .blog-glass-dashboard {
        --bg-grad: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --surface: rgba(255, 255, 255, 0.75);
        --surface-strong: rgba(255, 255, 255, 0.92);
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border-soft: rgba(148, 163, 184, 0.25);
        --glow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }

    html[data-theme=dark] .blog-glass-dashboard {
        --bg-grad: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --surface: rgba(30, 41, 59, 0.62);
        --surface-strong: rgba(15, 23, 42, 0.82);
        --text-main: #e2e8f0;
        --text-muted: #94a3b8;
        --border-soft: rgba(148, 163, 184, 0.22);
        --glow: 0 20px 46px rgba(2, 6, 23, 0.52);
    }

    .blog-glass-dashboard {
        background: var(--bg-grad);
        border-radius: 18px;
        padding: 18px;
    }

    .blog-glass-dashboard .glass-card {
        background: var(--surface);
        border: 1px solid var(--border-soft);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        box-shadow: var(--glow);
    }

    .blog-glass-dashboard .glass-card .card-header {
        background: transparent;
        border-bottom: 1px solid var(--border-soft);
        color: var(--text-main);
    }

    .blog-glass-dashboard .card,
    .blog-glass-dashboard .table,
    .blog-glass-dashboard .table th,
    .blog-glass-dashboard .table td,
    .blog-glass-dashboard .text-muted {
        color: var(--text-main) !important;
    }

    .blog-glass-dashboard .text-soft {
        color: var(--text-muted) !important;
    }

    .glass-stat {
        padding: 14px;
        border-radius: 14px;
        color: #fff;
        box-shadow: 0 12px 22px rgba(59, 130, 246, 0.22);
    }

    .glass-stat h3,
    .glass-stat h6 {
        color: #fff;
        margin: 0;
    }

    .glass-stat h3 {
        font-size: 2.1rem;
        line-height: 1.1;
    }

    .glass-stat-icon {
        width: 62px;
        height: 62px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.2);
        font-size: 1.8rem;
    }

    .glass-table thead th {
        border-bottom: 1px solid var(--border-soft);
        font-size: 13px;
        letter-spacing: 0.02em;
        color: var(--text-muted) !important;
    }

    .glass-table tbody td {
        border-color: rgba(148, 163, 184, 0.16);
        vertical-align: middle;
    }

    .glass-table .select-col {
        width: 44px;
        text-align: center;
    }

    .glass-table .id-col {
        width: 70px;
        text-align: center;
    }

    .category-track {
        height: 10px;
        border-radius: 999px;
        background: rgba(148, 163, 184, 0.18);
        overflow: hidden;
    }

    .category-fill {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(90deg, #3b82f6 0%, #6366f1 55%, #8b5cf6 100%);
    }

    .recent-post-tools {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .recent-post-tools .tool-form {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        width: 100%;
    }

    .recent-post-tools .bulk-form {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: center;
        width: 100%;
    }

    .recent-post-tools .form-control,
    .recent-post-tools .form-select {
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid var(--border-soft);
        color: var(--text-main);
        min-height: 40px;
    }

    html[data-theme=dark] .recent-post-tools .form-control,
    html[data-theme=dark] .recent-post-tools .form-select {
        background: rgba(15, 23, 42, 0.62);
    }

    .recent-post-tools .search-input {
        flex: 1 1 240px;
    }

    .recent-post-tools .status-select {
        width: 170px;
    }

    .recent-post-tools .per-page-select {
        width: 120px;
    }

    .recent-post-tools .bulk-action-select {
        width: 190px;
    }

    .glass-pagination .pagination {
        margin: 0;
    }

    .glass-pagination .page-link {
        background: rgba(255, 255, 255, 0.75);
        border-color: var(--border-soft);
        color: var(--text-main);
    }

    html[data-theme=dark] .glass-pagination .page-link {
        background: rgba(15, 23, 42, 0.7);
    }

    @media (max-width: 991px) {
        .blog-glass-dashboard {
            padding: 12px;
        }
    }
</style>
<div class="container-fluid blog-glass-dashboard">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h2 style="font-size: 30px; font-weight: 700; margin: 0; color: var(--text-main);">Blog Dashboard</h2>
            <p class="text-soft mb-0">Performance snapshot and complete blog listing</p>
        </div>
        <div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary-600 radius-8 px-20 py-10">
                <i class="fas fa-plus"></i> New Post
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-3" style="margin-bottom: 20px;">
        <div class="col-md-3">
            <div class="glass-stat" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Posts</h6>
                        <h3>{{ $totalPosts }}</h3>
                    </div>
                    <div class="glass-stat-icon">
                        <i class="fas fa-file-alt opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="glass-stat" style="background: linear-gradient(135deg, #ec4899 0%, #f43f5e 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Published</h6>
                        <h3>{{ $publishedPosts }}</h3>
                    </div>
                    <div class="glass-stat-icon">
                        <i class="fas fa-check-circle opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="glass-stat" style="background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Views</h6>
                        <h3>{{ number_format($totalViews) }}</h3>
                    </div>
                    <div class="glass-stat-icon">
                        <i class="fas fa-eye opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="glass-stat" style="background: linear-gradient(135deg, #22c55e 0%, #2dd4bf 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Comments</h6>
                        <h3>{{ $totalComments }}</h3>
                    </div>
                    <div class="glass-stat-icon">
                        <i class="fas fa-comments opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Lists -->
    <div class="row g-3 mt-1">
        <!-- Recent Posts -->
        <div class="col-12">
            <div class="card glass-card">
                <div class="card-header">
                    <h5 class="mb-0">Recent Posts</h5>
                </div>
                <div class="card-body">
                    <div class="recent-post-tools">
                        <form method="GET" action="{{ route('admin.dashboard') }}" class="tool-form">
                            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control search-input" placeholder="Search title, excerpt, author...">
                            <select name="status" class="form-select status-select">
                                <option value="all" {{ ($status ?? 'all') === 'all' ? 'selected' : '' }}>All Status</option>
                                <option value="published" {{ ($status ?? 'all') === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ ($status ?? 'all') === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="scheduled" {{ ($status ?? 'all') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            </select>
                            <select name="per_page" class="form-select per-page-select">
                                <option value="10" {{ (int) ($perPage ?? 10) === 10 ? 'selected' : '' }}>10 / page</option>
                                <option value="20" {{ (int) ($perPage ?? 10) === 20 ? 'selected' : '' }}>20 / page</option>
                                <option value="50" {{ (int) ($perPage ?? 10) === 50 ? 'selected' : '' }}>50 / page</option>
                            </select>
                            <button type="submit" class="btn btn-primary-600">Apply</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Reset</a>
                        </form>

                        <form method="POST" action="{{ route('admin.posts.bulk-action') }}" class="bulk-form" id="bulkPostsForm">
                            @csrf
                            <select name="action" class="form-select bulk-action-select" id="bulkActionSelect">
                                <option value="">Bulk Action</option>
                                <option value="publish">Publish Selected</option>
                                <option value="unpublish">Unpublish Selected</option>
                                <option value="featured">Mark Featured</option>
                                <option value="delete">Delete Selected</option>
                            </select>
                            <button type="submit" class="btn btn-danger-600" id="applyBulkBtn">Apply Selected</button>

                            <input type="hidden" name="search" value="{{ $search ?? '' }}">
                            <input type="hidden" name="status" value="{{ $status ?? 'all' }}">
                            <input type="hidden" name="per_page" value="{{ (int) ($perPage ?? 10) }}">
                        </form>
                    </div>

                    <form method="POST" action="{{ route('admin.posts.bulk-action') }}" id="bulkPostsTableForm">
                        @csrf
                        <input type="hidden" name="action" id="bulkActionMirror">
                        <div class="table-responsive">
                        <table class="table table-hover glass-table">
                            <thead>
                                <tr>
                                    <th class="select-col">
                                        <input type="checkbox" id="selectAllPosts">
                                    </th>
                                    <th class="id-col">ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentPosts as $post)
                                <tr>
                                    <td class="select-col">
                                        <input type="checkbox" class="post-row-checkbox" name="posts[]" value="{{ $post->id }}">
                                    </td>
                                    <td class="id-col">{{ ($recentPosts->firstItem() ?? 1) + $loop->index }}</td>
                                    <td>{{ Str::limit($post->title, 40) }}</td>
                                    <td><span class="badge bg-info">{{ $post->category->name ?? 'Uncategorized' }}</span></td>
                                    <td>
                                        @if($post->is_published || $post->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-warning">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->views }}</td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary-600">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-soft py-4">No blog posts available.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        </div>
                    </form>

                    @if(method_exists($recentPosts, 'links'))
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3 glass-pagination">
                        <small class="text-soft">
                            Showing {{ $recentPosts->firstItem() ?? 0 }} to {{ $recentPosts->lastItem() ?? 0 }} of {{ $recentPosts->total() }} posts
                        </small>
                        {{ $recentPosts->links() }}
                    </div>
                    @endif
                </div>
            </div>

            <!-- Category Statistics -->
            <div class="card glass-card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Posts by Category</h5>
                </div>
                <div class="card-body">
                    @forelse($categoryPosts as $category)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>{{ $category->name }}</span>
                            <span class="badge bg-primary">{{ $category->posts_count }} posts</span>
                        </div>
                        <div class="category-track">
                            <div class="category-fill" style="width: {{ $totalPosts > 0 ? ($category->posts_count / $totalPosts) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                    @empty
                    <p class="text-soft mb-0">No categories found.</p>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('selectAllPosts');
    const rowCheckboxes = Array.from(document.querySelectorAll('.post-row-checkbox'));
    const bulkForm = document.getElementById('bulkPostsForm');
    const tableForm = document.getElementById('bulkPostsTableForm');
    const bulkActionSelect = document.getElementById('bulkActionSelect');
    const bulkActionMirror = document.getElementById('bulkActionMirror');

    if (!selectAll || rowCheckboxes.length === 0) {
        return;
    }

    selectAll.addEventListener('change', function () {
        rowCheckboxes.forEach(function (checkbox) {
            checkbox.checked = selectAll.checked;
        });
    });

    rowCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const allChecked = rowCheckboxes.every(function (item) {
                return item.checked;
            });
            selectAll.checked = allChecked;
        });
    });

    if (bulkForm && tableForm && bulkActionSelect && bulkActionMirror) {
        bulkForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const selected = rowCheckboxes.filter(function (item) {
                return item.checked;
            });

            const action = bulkActionSelect.value;

            const showMessage = async function (title, text, icon) {
                if (window.Swal) {
                    await Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                        confirmButtonColor: '#4f46e5'
                    });
                    return;
                }

                alert(text);
            };

            if (!action) {
                await showMessage('Action Required', 'Please select a bulk action first.', 'warning');
                return;
            }

            if (selected.length === 0) {
                await showMessage('No Posts Selected', 'Please select at least one post.', 'warning');
                return;
            }

            bulkActionMirror.value = action;

            if (action === 'delete') {
                if (window.Swal) {
                    const result = await Swal.fire({
                        title: 'Delete selected posts?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Yes, delete',
                        cancelButtonText: 'Cancel'
                    });

                    if (!result.isConfirmed) {
                        return;
                    }
                } else {
                    const ok = confirm('Are you sure you want to delete selected posts?');
                    if (!ok) {
                        return;
                    }
                }
            } else if (window.Swal) {
                const result = await Swal.fire({
                    title: 'Apply bulk action?',
                    text: `Action: ${action} on ${selected.length} selected post(s).`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Apply',
                    cancelButtonText: 'Cancel'
                });

                if (!result.isConfirmed) {
                    return;
                }
            }

            tableForm.submit();
        });
    }

    @if(session('success'))
    if (window.Swal) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: @json(session('success')),
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true
        });
    }
    @endif
});
</script>
@endsection