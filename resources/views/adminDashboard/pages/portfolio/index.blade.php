@extends('adminDashboard.index')

@section('title', 'Portfolio Projects')

@section('adminDashboard.content')
<style>
    .portfolio-page {
        --pp-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --pp-surface: rgba(255,255,255,0.82);
        --pp-text: #0f172a; --pp-muted: #64748b;
        --pp-border: rgba(148,163,184,0.28);
        --pp-shadow: 0 18px 40px rgba(30,41,59,0.12);
    }
    html[data-theme=dark] .portfolio-page {
        --pp-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --pp-surface: rgba(15,23,42,0.86);
        --pp-text: #e2e8f0; --pp-muted: #94a3b8;
        --pp-border: rgba(148,163,184,0.24);
        --pp-shadow: 0 20px 46px rgba(2,6,23,0.55);
    }
    .portfolio-page { background: var(--pp-bg); border-radius: 18px; padding: 18px; }
    .portfolio-page .pp-card {
        background: var(--pp-surface); border: 1px solid var(--pp-border);
        border-radius: 16px; box-shadow: var(--pp-shadow); backdrop-filter: blur(10px);
    }
    .portfolio-page h1, .portfolio-page th, .portfolio-page td { color: var(--pp-text); }
    .portfolio-page .text-soft { color: var(--pp-muted) !important; }
    .pp-table { --bs-table-bg: transparent; --bs-table-color: var(--pp-text); --bs-table-border-color: rgba(148,163,184,0.18); margin-bottom: 0; }
    .pp-table thead th { border-bottom: 1px solid var(--pp-border); font-size: 13px; color: var(--pp-muted); background: transparent; }
    .pp-table td, .pp-table th { color: var(--pp-text) !important; vertical-align: middle; }
    .pp-table tbody tr { background: rgba(255,255,255,0.72); }
    .pp-table tbody tr:hover { background: rgba(241,245,249,0.92); }
    html[data-theme=dark] .pp-table tbody tr { background: rgba(30,41,59,0.82); }
    html[data-theme=dark] .pp-table tbody tr:hover { background: rgba(51,65,85,0.9); }
    .filter-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 110px; gap: 10px; margin-bottom: 14px; }
    .filter-grid .form-control, .filter-grid .form-select {
        min-height: 42px; border-color: var(--pp-border); color: var(--pp-text); background: rgba(255,255,255,0.85);
    }
    html[data-theme=dark] .filter-grid .form-control,
    html[data-theme=dark] .filter-grid .form-select { background: rgba(30,41,59,0.78); border-color: #475569; color: #f8fafc; }
    .project-thumb { width: 56px; height: 42px; object-fit: cover; border-radius: 8px; }
    .thumb-placeholder {
        width: 56px; height: 42px; border-radius: 8px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: inline-flex; align-items: center; justify-content: center;
        color: #fff; font-size: 1.1rem;
    }
    .cat-badge { font-size: 11px; padding: 3px 10px; border-radius: 30px; font-weight: 600; }
    .cat-web { background: rgba(59,130,246,.12); color: #3b82f6; }
    .cat-mobile { background: rgba(16,185,129,.12); color: #10b981; }
    .cat-marketing { background: rgba(245,158,11,.12); color: #d97706; }
    .cat-design { background: rgba(236,72,153,.12); color: #db2777; }
    .cat-ecommerce { background: rgba(139,92,246,.12); color: #7c3aed; }
</style>

<div class="container-fluid portfolio-page">
    <div class="pp-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h4 fw-bold mb-1">Portfolio Projects</h1>
                <p class="text-soft mb-0 small">Manage projects displayed on the website portfolio page.</p>
            </div>
            @can('portfolio.create')
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i> Add Project
            </a>
            @endcan
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="GET" action="{{ route('admin.portfolio.index') }}">
            <div class="filter-grid">
                <input type="text" name="search" class="form-control" placeholder="Search by title, client…" value="{{ $search }}">
                <select name="category" class="form-select">
                    <option value="all" {{ $category === 'all' ? 'selected' : '' }}>All Categories</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ $category === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <select name="status" class="form-select">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <select name="per_page" class="form-select">
                    @foreach([10,20,50] as $n)
                        <option value="{{ $n }}" {{ $perPage == $n ? 'selected' : '' }}>{{ $n }} / page</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table pp-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Technologies</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="text-soft small">{{ $projects->firstItem() + $loop->index }}</td>
                        <td>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-thumb">
                            @else
                                <span class="thumb-placeholder"><i class="fas fa-image"></i></span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold" style="font-size:13px;">{{ $project->title }}</div>
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="text-soft" style="font-size:11px;">
                                    <i class="fas fa-external-link-alt"></i> Live URL
                                </a>
                            @endif
                        </td>
                        <td>
                            <span class="cat-badge cat-{{ $project->category }}">{{ $project->category_label }}</span>
                        </td>
                        <td class="text-soft small">{{ $project->client_name ?? '—' }}</td>
                        <td>
                            @if($project->technologies)
                                <div style="display:flex;flex-wrap:wrap;gap:4px;">
                                    @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                        <span style="font-size:10px;background:#f1f5f9;color:#475569;border-radius:4px;padding:2px 6px;">{{ $tech }}</span>
                                    @endforeach
                                    @if(count($project->technologies) > 3)
                                        <span style="font-size:10px;color:#94a3b8;">+{{ count($project->technologies) - 3 }}</span>
                                    @endif
                                </div>
                            @else
                                <span class="text-soft small">—</span>
                            @endif
                        </td>
                        <td>
                            @if($project->is_featured)
                                <span class="badge bg-warning-subtle text-warning-emphasis">Featured</span>
                            @else
                                <span class="text-soft small">—</span>
                            @endif
                        </td>
                        <td>
                            @if($project->is_active)
                                <span class="badge bg-success-subtle text-success-emphasis">Active</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary-emphasis">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                @can('portfolio.update')
                                <a href="{{ route('admin.portfolio.edit', $project) }}" class="btn btn-sm btn-outline-primary py-1 px-2">
                                    <i class="fas fa-edit" style="font-size:12px;"></i>
                                </a>
                                @endcan
                                @can('portfolio.delete')
                                <form action="{{ route('admin.portfolio.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
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
                        <td colspan="9" class="text-center py-5 text-soft">
                            <i class="fas fa-briefcase mb-2" style="font-size:2rem;display:block;opacity:.4;"></i>
                            No projects found.
                            <a href="{{ route('admin.portfolio.create') }}" class="d-block mt-2">Add your first project</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
        <div class="d-flex justify-content-center mt-3">{{ $projects->links() }}</div>
        @endif
    </div>
</div>
@endsection
