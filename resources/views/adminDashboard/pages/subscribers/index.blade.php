@extends('adminDashboard.index')

@section('title', 'Newsletter Subscribers')

@section('adminDashboard.content')
<style>
    .sub-page {
        --sp-bg: linear-gradient(135deg, #eef4ff 0%, #f8fbff 45%, #eef2ff 100%);
        --sp-surface: rgba(255,255,255,0.82); --sp-text: #0f172a; --sp-muted: #64748b;
        --sp-border: rgba(148,163,184,0.28); --sp-shadow: 0 18px 40px rgba(30,41,59,0.12);
    }
    html[data-theme=dark] .sub-page {
        --sp-bg: radial-gradient(circle at top left, #1e293b 0%, #0f172a 45%, #111827 100%);
        --sp-surface: rgba(15,23,42,0.86); --sp-text: #e2e8f0; --sp-muted: #94a3b8;
        --sp-border: rgba(148,163,184,0.24); --sp-shadow: 0 20px 46px rgba(2,6,23,0.55);
    }
    .sub-page { background: var(--sp-bg); border-radius: 18px; padding: 18px; }
    .sub-page .sp-card { background: var(--sp-surface); border: 1px solid var(--sp-border); border-radius: 16px; box-shadow: var(--sp-shadow); backdrop-filter: blur(10px); }
    .sub-page h1, .sub-page th, .sub-page td { color: var(--sp-text); }
    .sub-page .text-soft { color: var(--sp-muted) !important; }
    .sp-stat { text-align:center; padding: 16px 20px; background: var(--sp-surface); border: 1px solid var(--sp-border); border-radius: 12px; }
    .sp-stat .num { font-size: 1.8rem; font-weight: 800; color: var(--sp-text); display: block; }
    .sp-stat .lbl { font-size: .75rem; color: var(--sp-muted); font-weight: 600; text-transform: uppercase; letter-spacing: .5px; }
    .filter-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 110px; gap: 10px; margin-bottom: 14px; }
    .filter-grid .form-control, .filter-grid .form-select {
        min-height: 42px; border-color: var(--sp-border); color: var(--sp-text); background: rgba(255,255,255,0.85);
    }
    html[data-theme=dark] .filter-grid .form-control,
    html[data-theme=dark] .filter-grid .form-select { background: rgba(30,41,59,0.78); border-color: #475569; color: #f8fafc; }
    .sp-table { --bs-table-bg: transparent; --bs-table-color: var(--sp-text); --bs-table-border-color: rgba(148,163,184,0.18); margin-bottom: 0; }
    .sp-table thead th { border-bottom: 1px solid var(--sp-border); font-size: 13px; color: var(--sp-muted); background: transparent; }
    .sp-table td, .sp-table th { color: var(--sp-text) !important; vertical-align: middle; }
    .sp-table tbody tr { background: rgba(255,255,255,0.72); }
    .sp-table tbody tr:hover { background: rgba(241,245,249,0.92); }
    html[data-theme=dark] .sp-table tbody tr { background: rgba(30,41,59,0.82); }
    html[data-theme=dark] .sp-table tbody tr:hover { background: rgba(51,65,85,0.9); }
</style>

<div class="container-fluid sub-page">
    <div class="sp-card p-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h1 class="h4 fw-bold mb-1">Newsletter Subscribers</h1>
                <p class="text-soft mb-0 small">Manage email subscribers and export CSV for campaigns.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.subscribers.export', ['status' => 'active']) }}"
                   class="btn btn-success btn-sm">
                    <i class="fas fa-download me-1"></i> Export Active CSV
                </a>
                <a href="{{ route('admin.subscribers.export', ['status' => 'all']) }}"
                   class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-download me-1"></i> Export All
                </a>
            </div>
        </div>

        {{-- Stats --}}
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-6">
                <div class="sp-stat">
                    <span class="num text-success">{{ $totalActive }}</span>
                    <span class="lbl">Active</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="sp-stat">
                    <span class="num text-secondary">{{ $totalUnsubscribed }}</span>
                    <span class="lbl">Unsubscribed</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="sp-stat">
                    <span class="num">{{ $totalActive + $totalUnsubscribed }}</span>
                    <span class="lbl">Total</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="sp-stat">
                    <span class="num">{{ $totalActive + $totalUnsubscribed > 0 ? round($totalActive / ($totalActive + $totalUnsubscribed) * 100) : 0 }}%</span>
                    <span class="lbl">Active Rate</span>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.subscribers.index') }}">
            <div class="filter-grid">
                <input type="text" name="search" class="form-control" placeholder="Search by email or name…" value="{{ $search }}">
                <select name="status" class="form-select">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                    <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="unsubscribed" {{ $status === 'unsubscribed' ? 'selected' : '' }}>Unsubscribed</option>
                </select>
                <select name="source" class="form-select">
                    <option value="all" {{ $source === 'all' ? 'selected' : '' }}>All Sources</option>
                    @foreach($sources as $src)
                        <option value="{{ $src }}" {{ $source === $src ? 'selected' : '' }}>{{ ucfirst($src) }}</option>
                    @endforeach
                </select>
                <select name="per_page" class="form-select">
                    @foreach([20,50,100] as $n)
                        <option value="{{ $n }}" {{ $perPage == $n ? 'selected' : '' }}>{{ $n }} / page</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table sp-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>Subscribed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $sub)
                    <tr>
                        <td class="text-soft small">{{ $subscribers->firstItem() + $loop->index }}</td>
                        <td style="font-size:13px;">{{ $sub->email }}</td>
                        <td class="text-soft small">{{ $sub->name ?? '—' }}</td>
                        <td>
                            <span style="font-size:11px;background:#f1f5f9;color:#475569;border-radius:6px;padding:2px 8px;font-weight:600;">
                                {{ ucfirst($sub->source) }}
                            </span>
                        </td>
                        <td>
                            @if($sub->status === 'active')
                                <span class="badge bg-success-subtle text-success-emphasis">Active</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary-emphasis">Unsubscribed</span>
                            @endif
                        </td>
                        <td class="text-soft small">
                            {{ $sub->subscribed_at?->format('M d, Y') ?? '—' }}
                        </td>
                        <td>
                            <form action="{{ route('admin.subscribers.destroy', $sub) }}" method="POST"
                                  onsubmit="return confirm('Delete this subscriber permanently?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger py-1 px-2" type="submit">
                                    <i class="fas fa-trash" style="font-size:12px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-soft">
                            <i class="fas fa-envelope-open mb-2" style="font-size:2rem;display:block;opacity:.4;"></i>
                            No subscribers yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($subscribers->hasPages())
        <div class="d-flex justify-content-center mt-3">{{ $subscribers->links() }}</div>
        @endif

    </div>
</div>
@endsection
