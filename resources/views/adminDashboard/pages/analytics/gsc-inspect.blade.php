@extends('adminDashboard.index')

@section('title', 'GSC URL Inspection')

@push('styles')
<style>
    .gsc-inspect-wrap {
        --gi-bg: linear-gradient(145deg, #e8f1ff 0%, #f5f8ff 55%, #eef5ff 100%);
        --gi-panel: rgba(255,255,255,0.9);
        --gi-border: rgba(148,163,184,0.3);
        --gi-text: #0f172a;
        --gi-muted: #475569;
        --gi-shadow: 0 8px 32px rgba(30,41,59,0.10);
    }
    html[data-theme=dark] .gsc-inspect-wrap {
        --gi-bg: radial-gradient(circle at 20% -10%, #0b2948 0%, #0f172a 40%, #020617 100%);
        --gi-panel: rgba(15,23,42,0.85);
        --gi-border: rgba(148,163,184,0.18);
        --gi-text: #e2e8f0;
        --gi-muted: #94a3b8;
        --gi-shadow: 0 8px 32px rgba(2,8,23,0.45);
    }
    .gsc-inspect-wrap { background: var(--gi-bg); border-radius: 18px; padding: 20px; }
    .gi-panel {
        background: var(--gi-panel);
        border: 1px solid var(--gi-border);
        border-radius: 14px;
        box-shadow: var(--gi-shadow);
        backdrop-filter: blur(8px);
        padding: 24px;
    }
    .gi-panel h5, .gi-panel p, .gi-panel th, .gi-panel td, .gi-panel label, .gi-panel span {
        color: var(--gi-text);
    }
    .gi-badge {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .4px;
        text-transform: uppercase;
    }
    .gi-badge-pass    { background: #dcfce7; color: #166534; }
    .gi-badge-neutral { background: #fef9c3; color: #854d0e; }
    .gi-badge-fail    { background: #fee2e2; color: #991b1b; }
    .gi-badge-unknown { background: #f1f5f9; color: #475569; }
    .gi-badge-error   { background: #fef2f2; color: #b91c1c; }
    .gi-badge-na      { background: #f8fafc; color: #94a3b8; }
    html[data-theme=dark] .gi-badge-pass    { background: #14532d; color: #86efac; }
    html[data-theme=dark] .gi-badge-neutral { background: #713f12; color: #fde68a; }
    html[data-theme=dark] .gi-badge-fail    { background: #7f1d1d; color: #fca5a5; }
    html[data-theme=dark] .gi-badge-unknown { background: #1e293b; color: #94a3b8; }
    html[data-theme=dark] .gi-badge-error   { background: #450a0a; color: #fca5a5; }
    html[data-theme=dark] .gi-badge-na      { background: #1e293b; color: #64748b; }

    #gsc-results-table th { font-size: 12px; white-space: nowrap; }
    #gsc-results-table td { font-size: 13px; vertical-align: middle; }
    #gsc-results-table td.url-cell { max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

    .gi-progress-bar-wrap { height: 8px; background: var(--gi-border); border-radius: 999px; overflow: hidden; }
    .gi-progress-bar      { height: 100%; background: linear-gradient(90deg,#6366f1,#8b5cf6); transition: width .3s ease; border-radius: 999px; }

    .gi-stat-box { border: 1px solid var(--gi-border); border-radius: 12px; padding: 14px 18px; text-align: center; }
    .gi-stat-num { font-size: 26px; font-weight: 700; color: var(--gi-text); }
    .gi-stat-lbl { font-size: 12px; color: var(--gi-muted); margin-top: 2px; }
</style>
@endpush

@section('adminDashboard.content')
<div class="gsc-inspect-wrap">

    {{-- Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h4 class="fw-bold mb-1" style="color:var(--gi-text)">
                <iconify-icon icon="solar:radar-2-bold-duotone" class="me-2 text-indigo-600"></iconify-icon>
                GSC URL Inspection
            </h4>
            <p class="mb-0" style="color:var(--gi-muted); font-size:13px;">
                Google Search Console ke through saare pages ka indexing status check karo
            </p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <button id="btn-run" class="btn btn-primary d-flex align-items-center gap-2">
                <iconify-icon icon="solar:play-bold"></iconify-icon>
                Start Inspection
            </button>
            <button id="btn-export" class="btn btn-outline-success d-flex align-items-center gap-2" disabled>
                <iconify-icon icon="solar:download-bold"></iconify-icon>
                Download CSV
            </button>
        </div>
    </div>

    {{-- Progress --}}
    <div id="gi-progress-wrap" class="gi-panel mb-4" style="display:none;">
        <div class="d-flex justify-content-between mb-2">
            <span style="font-size:13px;color:var(--gi-muted)">Inspecting URLs...</span>
            <span id="gi-progress-label" style="font-size:13px;font-weight:600;color:var(--gi-text)">0 / 0</span>
        </div>
        <div class="gi-progress-bar-wrap">
            <div class="gi-progress-bar" id="gi-progress-bar" style="width:0%"></div>
        </div>
        <p id="gi-progress-msg" class="mb-0 mt-2" style="font-size:12px;color:var(--gi-muted);">Initializing...</p>
    </div>

    {{-- Stats Row --}}
    <div id="gi-stats" class="row g-3 mb-4" style="display:none!important;">
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num" id="stat-total">0</div>
                <div class="gi-stat-lbl">Total URLs</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num text-success" id="stat-pass">0</div>
                <div class="gi-stat-lbl">Indexed</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num text-warning" id="stat-neutral">0</div>
                <div class="gi-stat-lbl">Neutral</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num text-danger" id="stat-fail">0</div>
                <div class="gi-stat-lbl">Not Indexed</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num text-secondary" id="stat-unknown">0</div>
                <div class="gi-stat-lbl">Unknown</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="gi-stat-box">
                <div class="gi-stat-num text-danger" id="stat-rich-fail">0</div>
                <div class="gi-stat-lbl">Rich Result Issues</div>
            </div>
        </div>
    </div>

    {{-- Filter bar --}}
    <div id="gi-filter-bar" class="gi-panel mb-3 d-flex align-items-center gap-3 flex-wrap" style="display:none!important; padding:14px 20px;">
        <span style="font-size:13px;color:var(--gi-muted);font-weight:600;">Filter:</span>
        <div class="d-flex gap-2 flex-wrap" id="gi-filter-btns">
            <button class="btn btn-sm btn-outline-secondary gi-filter active" data-filter="all">All</button>
            <button class="btn btn-sm btn-outline-success gi-filter"  data-filter="PASS">Indexed</button>
            <button class="btn btn-sm btn-outline-warning gi-filter"  data-filter="NEUTRAL">Neutral</button>
            <button class="btn btn-sm btn-outline-danger gi-filter"   data-filter="FAIL">Not Indexed</button>
            <button class="btn btn-sm btn-outline-secondary gi-filter" data-filter="UNKNOWN">Unknown</button>
            <button class="btn btn-sm btn-outline-danger gi-filter"   data-filter="rich-issues">Rich Issues</button>
        </div>
        <input type="text" id="gi-search" class="form-control form-control-sm ms-auto" style="max-width:220px;" placeholder="Search URL...">
    </div>

    {{-- Results Table --}}
    <div id="gi-table-wrap" class="gi-panel" style="display:none; overflow-x:auto;">
        <table class="table table-sm mb-0" id="gsc-results-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>URL</th>
                    <th>Index Verdict</th>
                    <th>Coverage State</th>
                    <th>Last Crawled</th>
                    <th>Crawled As</th>
                    <th>Rich Results</th>
                    <th>Mobile</th>
                    <th>Issues</th>
                </tr>
            </thead>
            <tbody id="gi-tbody"></tbody>
        </table>
    </div>

    {{-- Empty state --}}
    <div id="gi-empty" class="gi-panel text-center py-5" style="display:none;">
        <iconify-icon icon="solar:radar-2-linear" style="font-size:48px;opacity:.4;"></iconify-icon>
        <p class="mt-3 mb-0" style="color:var(--gi-muted);">Click "Start Inspection" to begin</p>
    </div>

    {{-- Default empty state shown on load --}}
    <div id="gi-start-hint" class="gi-panel text-center py-5">
        <iconify-icon icon="solar:radar-2-linear" style="font-size:52px;opacity:.35;"></iconify-icon>
        <p class="mt-3 mb-1 fw-semibold" style="color:var(--gi-text);">Ready to inspect {{ count([]) }} URLs</p>
        <p style="color:var(--gi-muted);font-size:13px;">Google Search Console se har page ka live indexing, rich results aur mobile status milega</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    const CSRF   = document.querySelector('meta[name="csrf-token"]')?.content;
    const runBtn = document.getElementById('btn-run');
    const expBtn = document.getElementById('btn-export');

    let allResults = [];
    let activeFilter = 'all';

    // ── verdict badge
    function verdictBadge(v) {
        const map = {
            PASS:    ['pass',    v || 'PASS'],
            NEUTRAL: ['neutral', v || 'NEUTRAL'],
            FAIL:    ['fail',    'NOT INDEXED'],
            UNKNOWN: ['unknown', 'UNKNOWN'],
            ERROR:   ['error',   'ERROR'],
        };
        const [cls, label] = map[v] ?? ['unknown', v || '—'];
        return `<span class="gi-badge gi-badge-${cls}">${label}</span>`;
    }

    function richBadge(v) {
        if (!v || v === 'N/A') return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v === 'PASS')      return `<span class="gi-badge gi-badge-pass">PASS</span>`;
        if (v === 'FAIL')      return `<span class="gi-badge gi-badge-fail">FAIL</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }

    function mobileBadge(v) {
        if (!v || v === 'N/A')    return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v === 'MOBILE_USABLE') return `<span class="gi-badge gi-badge-pass">OK</span>`;
        if (v === 'MOBILE_UNUSABLE') return `<span class="gi-badge gi-badge-fail">ISSUES</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }

    function shortUrl(url) {
        try { return new URL(url).pathname || '/'; } catch { return url; }
    }

    // ── render table
    function renderTable(data) {
        const tbody = document.getElementById('gi-tbody');
        tbody.innerHTML = '';

        if (!data.length) {
            tbody.innerHTML = '<tr><td colspan="9" class="text-center py-4" style="color:var(--gi-muted)">No results match filter</td></tr>';
            return;
        }

        data.forEach((r, i) => {
            const row = document.createElement('tr');
            row.dataset.verdict = r.verdict;
            row.dataset.rich    = r.rich_verdict;
            row.innerHTML = `
                <td>${i + 1}</td>
                <td class="url-cell" title="${r.url}">
                    <a href="${r.url}" target="_blank" rel="noopener" style="color:inherit;text-decoration:none;"
                       title="${r.url}">${shortUrl(r.url)}</a>
                </td>
                <td>${verdictBadge(r.verdict)}</td>
                <td style="font-size:12px;">${r.coverage || '—'}</td>
                <td style="font-size:12px;">${r.last_crawl ? r.last_crawl.replace('T',' ').substring(0,16) : 'Never'}</td>
                <td style="font-size:12px;">${r.crawled_as || '—'}</td>
                <td>${richBadge(r.rich_verdict)}</td>
                <td>${mobileBadge(r.mobile_verdict)}</td>
                <td style="font-size:11px;max-width:200px;color:#ef4444;">
                    ${[r.rich_issues, r.mobile_issues].filter(Boolean).join('<br>') || '—'}
                </td>`;
            tbody.appendChild(row);
        });
    }

    // ── update stats
    function updateStats(results) {
        const counts = { PASS:0, NEUTRAL:0, FAIL:0, UNKNOWN:0 };
        let richFail = 0;
        results.forEach(r => {
            if (r.verdict in counts) counts[r.verdict]++;
            else counts.UNKNOWN++;
            if (r.rich_verdict === 'FAIL') richFail++;
        });
        document.getElementById('stat-total').textContent   = results.length;
        document.getElementById('stat-pass').textContent    = counts.PASS;
        document.getElementById('stat-neutral').textContent = counts.NEUTRAL;
        document.getElementById('stat-fail').textContent    = counts.FAIL;
        document.getElementById('stat-unknown').textContent = counts.UNKNOWN;
        document.getElementById('stat-rich-fail').textContent = richFail;
    }

    // ── filter
    function applyFilter() {
        const search = document.getElementById('gi-search').value.toLowerCase();
        let data = allResults;

        if (activeFilter === 'rich-issues') {
            data = data.filter(r => r.rich_verdict === 'FAIL' || r.rich_issues);
        } else if (activeFilter !== 'all') {
            data = data.filter(r => r.verdict === activeFilter);
        }

        if (search) {
            data = data.filter(r => r.url.toLowerCase().includes(search));
        }

        renderTable(data);
    }

    document.querySelectorAll('.gi-filter').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.gi-filter').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.dataset.filter;
            applyFilter();
        });
    });

    document.getElementById('gi-search').addEventListener('input', applyFilter);

    // ── run inspection
    runBtn.addEventListener('click', async () => {
        runBtn.disabled = true;
        runBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Running...';
        expBtn.disabled = true;

        document.getElementById('gi-start-hint').style.display = 'none';
        document.getElementById('gi-stats').style.removeProperty('display');
        document.getElementById('gi-filter-bar').style.removeProperty('display');
        document.getElementById('gi-progress-wrap').style.display = '';
        document.getElementById('gi-table-wrap').style.display = '';
        document.getElementById('gi-tbody').innerHTML =
            '<tr><td colspan="9" class="text-center py-4"><span class="spinner-border spinner-border-sm me-2"></span>Inspecting all URLs, please wait (~15-20 seconds)...</td></tr>';

        document.getElementById('gi-progress-bar').style.width = '10%';
        document.getElementById('gi-progress-msg').textContent = 'Sending requests to Google Search Console API...';

        try {
            const resp = await fetch('{{ route("admin.gsc.inspect.run") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF,
                    'Accept': 'application/json',
                },
            });

            if (!resp.ok) {
                const err = await resp.json().catch(() => ({}));
                throw new Error(err.message || `HTTP ${resp.status}`);
            }

            const data = await resp.json();
            allResults = data.results || [];

            document.getElementById('gi-progress-bar').style.width = '100%';
            document.getElementById('gi-progress-label').textContent = `${allResults.length} / ${allResults.length}`;
            document.getElementById('gi-progress-msg').textContent   = 'Complete!';

            updateStats(allResults);
            applyFilter();

            expBtn.disabled = false;
        } catch (e) {
            document.getElementById('gi-tbody').innerHTML =
                `<tr><td colspan="9" class="text-center text-danger py-4">
                    <iconify-icon icon="solar:danger-circle-bold" class="me-1"></iconify-icon>
                    Error: ${e.message}
                </td></tr>`;
        } finally {
            runBtn.disabled = false;
            runBtn.innerHTML = '<iconify-icon icon="solar:refresh-bold"></iconify-icon> Re-run Inspection';
        }
    });

    // ── CSV export
    expBtn.addEventListener('click', () => {
        if (!allResults.length) return;

        const headers = ['URL','Verdict','Coverage','Indexing State','Last Crawl','Crawled As','Robots.txt','Canonical','Rich Verdict','Rich Issues','Mobile Verdict','Mobile Issues'];
        const rows    = allResults.map(r => [
            r.url, r.verdict, r.coverage, r.indexing, r.last_crawl,
            r.crawled_as, r.robots, r.canonical,
            r.rich_verdict, r.rich_issues, r.mobile_verdict, r.mobile_issues,
        ]);

        const csv = [headers, ...rows]
            .map(row => row.map(v => `"${String(v ?? '').replace(/"/g, '""')}"`).join(','))
            .join('\n');

        const blob = new Blob([csv], { type: 'text/csv' });
        const url  = URL.createObjectURL(blob);
        const a    = document.createElement('a');
        a.href     = url;
        a.download = `gsc-inspection-${new Date().toISOString().slice(0,10)}.csv`;
        a.click();
        URL.revokeObjectURL(url);
    });
})();
</script>
@endpush
