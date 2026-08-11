@extends('adminDashboard.index')

@section('title', 'Testimonials')

@section('adminDashboard.content')
<style>
    .testi-page {
        --tp-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --tp-surface: rgba(255, 255, 255, 0.82);
        --tp-text: #0f172a;
        --tp-muted: #64748b;
        --tp-border: rgba(148, 163, 184, 0.28);
        --tp-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
    }
    html[data-theme=dark] .testi-page {
        --tp-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --tp-surface: rgba(15, 23, 42, 0.86);
        --tp-text: #e2e8f0;
        --tp-muted: #94a3b8;
        --tp-border: rgba(148, 163, 184, 0.24);
        --tp-shadow: 0 20px 46px rgba(2, 6, 23, 0.55);
    }
    .testi-page { background: var(--tp-bg); border-radius: 18px; padding: 18px; }
    .testi-page .tp-card {
        background: var(--tp-surface);
        border: 1px solid var(--tp-border);
        border-radius: 16px;
        box-shadow: var(--tp-shadow);
        backdrop-filter: blur(10px);
    }
    .testi-page h1, .testi-page th, .testi-page td, .testi-page label { color: var(--tp-text); }
    .testi-page .text-soft { color: var(--tp-muted) !important; }
    .tp-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--tp-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.18);
        margin-bottom: 0;
    }
    .tp-table thead th { border-bottom: 1px solid var(--tp-border); font-size: 13px; color: var(--tp-muted); background: transparent; }
    .tp-table td, .tp-table th { color: var(--tp-text) !important; vertical-align: middle; }
    .tp-table tbody tr { background: rgba(255,255,255,0.72); }
    .tp-table tbody tr:hover { background: rgba(241,245,249,0.92); }
    html[data-theme=dark] .tp-table tbody tr { background: rgba(30,41,59,0.82); }
    html[data-theme=dark] .tp-table tbody tr:hover { background: rgba(51,65,85,0.9); }
    .star-filled { color: #f59e0b; }
    .star-empty { color: #cbd5e1; }
    .client-avatar { width: 42px; height: 42px; border-radius: 50%; object-fit: cover; }
    .avatar-placeholder {
        width: 42px; height: 42px; border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: inline-flex; align-items: center; justify-content: center;
        color: #fff; font-weight: 700; font-size: 14px;
    }
    .filter-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 120px; gap: 10px; margin-bottom: 14px; }
    .filter-grid .form-control, .filter-grid .form-select {
        min-height: 42px; border-color: var(--tp-border); color: var(--tp-text); background: rgba(255,255,255,0.85);
    }
    html[data-theme=dark] .filter-grid .form-control,
    html[data-theme=dark] .filter-grid .form-select {
        background: rgba(30,41,59,0.78); border-color: #475569; color: #f8fafc;
    }
</style>

<div class="container-fluid testi-page">
    <div class="tp-card p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h4 fw-bold mb-1">Testimonials</h1>
                <p class="text-soft mb-0 small">Manage client reviews shown on the website.</p>
            </div>
            @can('testimonials.create')
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Add Testimonial
            </a>
            @endcan
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.testimonials.index') }}">
            <div class="filter-grid">
                <input type="text" name="search" class="form-control" placeholder="Search by name, company, review…" value="{{ $search }}">
                <select name="status" class="form-select">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <select name="featured" class="form-select">
                    <option value="all" {{ $featured === 'all' ? 'selected' : '' }}>All</option>
                    <option value="yes" {{ $featured === 'yes' ? 'selected' : '' }}>Featured</option>
                    <option value="no" {{ $featured === 'no' ? 'selected' : '' }}>Not Featured</option>
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table tp-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Service</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $item)
                    <tr>
                        <td class="text-soft small">{{ $testimonials->firstItem() + $loop->index }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($item->client_photo)
                                    <img src="{{ asset('storage/' . $item->client_photo) }}" alt="{{ $item->client_name }}" class="client-avatar">
                                @else
                                    <span class="avatar-placeholder">{{ strtoupper(substr($item->client_name, 0, 1)) }}</span>
                                @endif
                                <div>
                                    <div class="fw-semibold" style="font-size:13px;">{{ $item->client_name }}</div>
                                    @if($item->client_role || $item->client_company)
                                        <div class="text-soft" style="font-size:11px;">{{ $item->client_role }}{{ $item->client_role && $item->client_company ? ', ' : '' }}{{ $item->client_company }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $item->rating ? 'star-filled' : 'star-empty' }}" style="font-size:12px;"></i>
                            @endfor
                        </td>
                        <td style="max-width:260px;">
                            <span style="font-size:12px;color:var(--tp-muted);">{{ Str::limit($item->review, 80) }}</span>
                        </td>
                        <td>
                            @if($item->service_type)
                                <span class="badge bg-info-subtle text-info-emphasis" style="font-size:11px;">{{ $item->service_type }}</span>
                            @else
                                <span class="text-soft small">—</span>
                            @endif
                        </td>
                        <td>
                            @if($item->is_featured)
                                <span class="badge bg-warning-subtle text-warning-emphasis">Featured</span>
                            @else
                                <span class="text-soft small">—</span>
                            @endif
                        </td>
                        <td>
                            @if($item->is_active)
                                <span class="badge bg-success-subtle text-success-emphasis">Active</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary-emphasis">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                @can('testimonials.update')
                                <a href="{{ route('admin.testimonials.edit', $item) }}" class="btn btn-sm btn-outline-primary py-1 px-2">
                                    <i class="fas fa-edit" style="font-size:12px;"></i>
                                </a>
                                @endcan
                                @can('testimonials.delete')
                                <form action="{{ route('admin.testimonials.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger py-1 px-2" type="submit">
                                        <i class="fas fa-trash" style="font-size:12px;"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-soft">
                            <i class="fas fa-comment-slash mb-2" style="font-size:2rem;display:block;opacity:.4;"></i>
                            No testimonials found.
                            <a href="{{ route('admin.testimonials.create') }}" class="d-block mt-2">Add your first testimonial</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($testimonials->hasPages())
        <div class="d-flex justify-content-center mt-3">
            {{ $testimonials->links() }}
        </div>
        @endif

    </div>
</div>
@endsection
