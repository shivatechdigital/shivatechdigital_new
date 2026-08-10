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

    /* Indexing request button */
    .gi-idx-btn { font-size: 11px; padding: 3px 10px; border-radius: 6px; white-space: nowrap; cursor: pointer; border: 1px solid #6366f1; color: #6366f1; background: transparent; transition: all .2s; }
    .gi-idx-btn:hover:not(:disabled) { background: #6366f1; color: #fff; }
    .gi-idx-btn.sent  { border-color: #22c55e; color: #22c55e; cursor: default; }
    .gi-idx-btn.error { border-color: #ef4444; color: #ef4444; cursor: default; }
    .gi-idx-btn:disabled { opacity: .5; cursor: default; }
    html[data-theme=dark] .gi-idx-btn { border-color: #818cf8; color: #818cf8; }
    html[data-theme=dark] .gi-idx-btn:hover:not(:disabled) { background: #818cf8; color: #1e1b4b; }
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
            <button id="btn-resume" class="btn btn-warning d-flex align-items-center gap-2" style="display:none!important;">
                <iconify-icon icon="solar:play-bold"></iconify-icon>
                Resume
            </button>
            <button id="btn-request-all" class="btn btn-outline-primary d-flex align-items-center gap-2" disabled>
                <iconify-icon icon="solar:refresh-bold"></iconify-icon>
                Request All Indexing
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
                    <th>Request Index</th>
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
    const CSRF      = document.querySelector('meta[name="csrf-token"]')?.content;
    const URLS      = @json($urls);
    const ENDPOINT  = '{{ route("admin.gsc.inspect.single") }}';
    const STORE_KEY = 'gsc_inspect_progress';

    const runBtn    = document.getElementById('btn-run');
    const resumeBtn = document.getElementById('btn-resume');
    const expBtn    = document.getElementById('btn-export');

    let allResults   = [];
    let activeFilter = 'all';
    let running      = false;
    let stopFlag     = false;

    // ── Load saved progress from localStorage
    function loadSaved() {
        try {
            const saved = JSON.parse(localStorage.getItem(STORE_KEY) || 'null');
            if (saved && Array.isArray(saved.results) && saved.results.length > 0 && saved.results.length < URLS.length) {
                return saved;
            }
        } catch {}
        return null;
    }

    function saveProgress(results) {
        try { localStorage.setItem(STORE_KEY, JSON.stringify({ results, savedAt: Date.now() })); } catch {}
    }

    function clearSaved() {
        try { localStorage.removeItem(STORE_KEY); } catch {}
    }

    // ── Check on page load if there's saved progress
    function checkResumable() {
        const saved = loadSaved();
        if (saved) {
            const done = saved.results.length;
            const remaining = URLS.length - done;
            resumeBtn.style.display = '';
            resumeBtn.innerHTML = `<iconify-icon icon="solar:play-bold"></iconify-icon> Resume (${done}/${URLS.length} done, ${remaining} remaining)`;
        } else {
            resumeBtn.style.display = 'none';
        }
    }

    // ── Badges
    function verdictBadge(v) {
        const map = { PASS:['pass',v], NEUTRAL:['neutral',v], FAIL:['fail','NOT INDEXED'], UNKNOWN:['unknown','UNKNOWN'], ERROR:['error','ERROR'] };
        const [cls, label] = map[v] ?? ['unknown', v||'—'];
        return `<span class="gi-badge gi-badge-${cls}">${label}</span>`;
    }
    function richBadge(v) {
        if (!v||v==='N/A') return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='PASS')    return `<span class="gi-badge gi-badge-pass">PASS</span>`;
        if (v==='FAIL')    return `<span class="gi-badge gi-badge-fail">FAIL</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function mobileBadge(v) {
        if (!v||v==='N/A')       return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='MOBILE_USABLE') return `<span class="gi-badge gi-badge-pass">OK</span>`;
        if (v==='MOBILE_UNUSABLE') return `<span class="gi-badge gi-badge-fail">ISSUES</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function shortUrl(url) { try { return new URL(url).pathname||'/'; } catch { return url; } }

    // ── Render all existing results into table (used on resume)
    function renderAllRows(results) {
        const tbody = document.getElementById('gi-tbody');
        tbody.innerHTML = '';
        results.forEach((r, i) => appendRow(r, i + 1, false));
    }

    // ── Append single row
    function appendRow(r, index, scroll = true) {
        const tbody = document.getElementById('gi-tbody');
        const ph = tbody.querySelector('.gi-placeholder');
        if (ph) ph.remove();

        const row = document.createElement('tr');
        row.dataset.verdict = r.verdict;
        row.dataset.rich    = r.rich_verdict;
        if (!rowMatchesFilter(r)) row.style.display = 'none';

        row.innerHTML = `
            <td>${index}</td>
            <td class="url-cell" title="${r.url}">
                <a href="${r.url}" target="_blank" rel="noopener" style="color:inherit;text-decoration:none;">${shortUrl(r.url)}</a>
            </td>
            <td>${verdictBadge(r.verdict)}</td>
            <td style="font-size:12px;">${r.coverage||'—'}</td>
            <td style="font-size:12px;">${r.last_crawl ? r.last_crawl.replace('T',' ').substring(0,16) : 'Never'}</td>
            <td style="font-size:12px;">${r.crawled_as||'—'}</td>
            <td>${richBadge(r.rich_verdict)}</td>
            <td>${mobileBadge(r.mobile_verdict)}</td>
            <td style="font-size:11px;max-width:200px;color:#ef4444;">
                ${[r.rich_issues,r.mobile_issues].filter(Boolean).join('<br>')||'—'}
            </td>`;
        tbody.appendChild(row);
        if (scroll) row.scrollIntoView({ behavior:'smooth', block:'nearest' });
    }

    function rowMatchesFilter(r) {
        if (activeFilter==='all')         return true;
        if (activeFilter==='rich-issues') return r.rich_verdict==='FAIL'||!!r.rich_issues;
        return r.verdict===activeFilter;
    }

    function updateStats() {
        const c = {PASS:0,NEUTRAL:0,FAIL:0,UNKNOWN:0,ERROR:0};
        let rf = 0;
        allResults.forEach(r => { c[r.verdict]=(c[r.verdict]||0)+1; if(r.rich_verdict==='FAIL') rf++; });
        document.getElementById('stat-total').textContent     = allResults.length;
        document.getElementById('stat-pass').textContent      = c.PASS;
        document.getElementById('stat-neutral').textContent   = c.NEUTRAL;
        document.getElementById('stat-fail').textContent      = c.FAIL;
        document.getElementById('stat-unknown').textContent   = (c.UNKNOWN||0)+(c.ERROR||0);
        document.getElementById('stat-rich-fail').textContent = rf;
    }

    function applyFilter() {
        const search = document.getElementById('gi-search').value.toLowerCase();
        document.querySelectorAll('#gi-tbody tr:not(.gi-placeholder)').forEach(row => {
            const v = row.dataset.verdict, r = row.dataset.rich;
            const url = row.querySelector('a')?.href?.toLowerCase()||'';
            let show = activeFilter==='all' ? true
                : activeFilter==='rich-issues' ? (r==='FAIL'||row.querySelector('td:last-child')?.textContent?.trim()!=='—')
                : v===activeFilter;
            if (show && search) show = url.includes(search);
            row.style.display = show?'':'none';
        });
    }

    document.querySelectorAll('.gi-filter').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.gi-filter').forEach(b=>b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.dataset.filter;
            applyFilter();
        });
    });
    document.getElementById('gi-search').addEventListener('input', applyFilter);

    async function inspectOne(url) {
        const resp = await fetch(ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
            body: JSON.stringify({ url }),
        });
        if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
        return resp.json();
    }

    // ── Core loop — startFrom lets resume work
    async function runLoop(startFrom = 0) {
        running  = true;
        stopFlag = false;

        runBtn.innerHTML    = '<span class="spinner-border spinner-border-sm"></span> Running... <small>(click to stop)</small>';
        resumeBtn.style.display = 'none';
        expBtn.disabled     = true;

        document.getElementById('gi-start-hint').style.display    = 'none';
        document.getElementById('gi-progress-wrap').style.display  = '';
        document.getElementById('gi-stats').style.removeProperty('display');
        document.getElementById('gi-filter-bar').style.removeProperty('display');
        document.getElementById('gi-table-wrap').style.display     = '';

        for (let i = startFrom; i < URLS.length; i++) {
            if (stopFlag) {
                saveProgress(allResults);
                document.getElementById('gi-progress-msg').textContent =
                    `⏸ Paused at ${i}/${URLS.length}. Click Resume to continue.`;
                resumeBtn.style.display = '';
                resumeBtn.innerHTML = `<iconify-icon icon="solar:play-bold"></iconify-icon> Resume (${i}/${URLS.length} done, ${URLS.length - i} remaining)`;
                break;
            }

            const url = URLS[i];
            const pct = Math.round((i / URLS.length) * 100);
            document.getElementById('gi-progress-bar').style.width   = pct + '%';
            document.getElementById('gi-progress-label').textContent = `${i} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent   =
                `[${i+1}/${URLS.length}] Checking: ${shortUrl(url)}`;

            try {
                const result = await inspectOne(url);
                allResults.push(result);
                appendRow(result, i + 1);
                updateStats();
                document.getElementById('gi-progress-bar').style.width   = Math.round(((i+1)/URLS.length)*100) + '%';
                document.getElementById('gi-progress-label').textContent = `${i+1} / ${URLS.length}`;
                document.getElementById('gi-progress-msg').textContent   =
                    `[${i+1}/${URLS.length}] ${shortUrl(url)} → ${result.verdict}`;
            } catch(e) {
                const errRow = { url, verdict:'ERROR', coverage:e.message, indexing:'', last_crawl:'', crawled_as:'', robots:'', canonical:'', rich_verdict:'N/A', rich_issues:'', mobile_verdict:'N/A', mobile_issues:'' };
                allResults.push(errRow);
                appendRow(errRow, i + 1);
                updateStats();
            }
        }

        if (!stopFlag) {
            // Fully complete
            clearSaved();
            document.getElementById('gi-progress-bar').style.width   = '100%';
            document.getElementById('gi-progress-label').textContent = `${URLS.length} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent   = `✓ Complete! ${allResults.length} URLs inspected.`;
            resumeBtn.style.display = 'none';
        }

        running = false;
        runBtn.innerHTML = '<iconify-icon icon="solar:refresh-bold"></iconify-icon> Start Fresh';
        if (allResults.length) expBtn.disabled = false;
    }

    // ── Start Fresh button
    runBtn.addEventListener('click', () => {
        if (running) { stopFlag = true; return; }
        clearSaved();
        allResults   = [];
        activeFilter = 'all';
        document.querySelectorAll('.gi-filter').forEach(b=>b.classList.remove('active'));
        document.querySelector('.gi-filter[data-filter="all"]').classList.add('active');
        document.getElementById('gi-progress-bar').style.width   = '0%';
        document.getElementById('gi-progress-label').textContent = `0 / ${URLS.length}`;
        document.getElementById('gi-progress-msg').textContent   = 'Starting...';
        document.getElementById('gi-tbody').innerHTML =
            `<tr class="gi-placeholder"><td colspan="9" class="text-center py-3" style="color:var(--gi-muted);">
                <span class="spinner-border spinner-border-sm me-2"></span>Waiting for first result...
            </td></tr>`;
        updateStats();
        runLoop(0);
    });

    // ── Resume button
    resumeBtn.addEventListener('click', () => {
        if (running) return;
        const saved = loadSaved();
        if (!saved) { checkResumable(); return; }

        allResults   = saved.results;
        activeFilter = 'all';
        document.querySelectorAll('.gi-filter').forEach(b=>b.classList.remove('active'));
        document.querySelector('.gi-filter[data-filter="all"]').classList.add('active');

        document.getElementById('gi-progress-bar').style.width   = Math.round((allResults.length/URLS.length)*100) + '%';
        document.getElementById('gi-progress-label').textContent = `${allResults.length} / ${URLS.length}`;
        document.getElementById('gi-progress-msg').textContent   = `Resuming from URL ${allResults.length + 1}...`;

        // Re-render existing results
        document.getElementById('gi-start-hint').style.display    = 'none';
        document.getElementById('gi-progress-wrap').style.display  = '';
        document.getElementById('gi-stats').style.removeProperty('display');
        document.getElementById('gi-filter-bar').style.removeProperty('display');
        document.getElementById('gi-table-wrap').style.display     = '';
        renderAllRows(allResults);
        updateStats();

        runLoop(allResults.length);
    });

    // CSV export
    expBtn.addEventListener('click', () => {
        if (!allResults.length) return;
        const headers = ['URL','Verdict','Coverage','Indexing State','Last Crawl','Crawled As','Robots.txt','Canonical','Rich Verdict','Rich Issues','Mobile Verdict','Mobile Issues'];
        const rows    = allResults.map(r=>[r.url,r.verdict,r.coverage,r.indexing,r.last_crawl,r.crawled_as,r.robots,r.canonical,r.rich_verdict,r.rich_issues,r.mobile_verdict,r.mobile_issues]);
        const csv     = [headers,...rows].map(r=>r.map(v=>`"${String(v??'').replace(/"/g,'""')}"`).join(',')).join('\n');
        const a       = Object.assign(document.createElement('a'),{href:URL.createObjectURL(new Blob([csv],{type:'text/csv'})),download:`gsc-${new Date().toISOString().slice(0,10)}.csv`});
        a.click();
    });

    // On load, check if previous session exists
    checkResumable();
})();
</script>
@endpush

    // ── Badges
    function verdictBadge(v) {
        const map = { PASS:['pass',v], NEUTRAL:['neutral',v], FAIL:['fail','NOT INDEXED'], UNKNOWN:['unknown','UNKNOWN'], ERROR:['error','ERROR'] };
        const [cls, label] = map[v] ?? ['unknown', v || '—'];
        return `<span class="gi-badge gi-badge-${cls}">${label}</span>`;
    }
    function richBadge(v) {
        if (!v || v==='N/A') return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='PASS')      return `<span class="gi-badge gi-badge-pass">PASS</span>`;
        if (v==='FAIL')      return `<span class="gi-badge gi-badge-fail">FAIL</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function mobileBadge(v) {
        if (!v || v==='N/A')         return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='MOBILE_USABLE')     return `<span class="gi-badge gi-badge-pass">OK</span>`;
        if (v==='MOBILE_UNUSABLE')   return `<span class="gi-badge gi-badge-fail">ISSUES</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function shortUrl(url) { try { return new URL(url).pathname||'/'; } catch { return url; } }

    // ── Append single row
    function appendRow(r, index) {
        const tbody = document.getElementById('gi-tbody');
        const ph = tbody.querySelector('.gi-placeholder');
        if (ph) ph.remove();

        const row = document.createElement('tr');
        row.dataset.verdict = r.verdict;
        row.dataset.rich    = r.rich_verdict;
        if (!rowMatchesFilter(r)) row.style.display = 'none';

        row.innerHTML = `
            <td>${index}</td>
            <td class="url-cell" title="${r.url}">
                <a href="${r.url}" target="_blank" rel="noopener" style="color:inherit;text-decoration:none;">${shortUrl(r.url)}</a>
            </td>
            <td>${verdictBadge(r.verdict)}</td>
            <td style="font-size:12px;">${r.coverage||'—'}</td>
            <td style="font-size:12px;">${r.last_crawl ? r.last_crawl.replace('T',' ').substring(0,16) : 'Never'}</td>
            <td style="font-size:12px;">${r.crawled_as||'—'}</td>
            <td>${richBadge(r.rich_verdict)}</td>
            <td>${mobileBadge(r.mobile_verdict)}</td>
            <td style="font-size:11px;max-width:200px;color:#ef4444;">
                ${[r.rich_issues,r.mobile_issues].filter(Boolean).join('<br>')||'—'}
            </td>`;
        tbody.appendChild(row);
    }

    function rowMatchesFilter(r) {
        if (activeFilter==='all')         return true;
        if (activeFilter==='rich-issues') return r.rich_verdict==='FAIL'||!!r.rich_issues;
        return r.verdict===activeFilter;
    }

    function updateStats() {
        const c = {PASS:0,NEUTRAL:0,FAIL:0,UNKNOWN:0,ERROR:0};
        let rf = 0;
        allResults.forEach(r => { c[r.verdict]=(c[r.verdict]||0)+1; if(r.rich_verdict==='FAIL') rf++; });
        document.getElementById('stat-total').textContent    = allResults.length;
        document.getElementById('stat-pass').textContent     = c.PASS;
        document.getElementById('stat-neutral').textContent  = c.NEUTRAL;
        document.getElementById('stat-fail').textContent     = c.FAIL;
        document.getElementById('stat-unknown').textContent  = (c.UNKNOWN||0)+(c.ERROR||0);
        document.getElementById('stat-rich-fail').textContent= rf;
    }

    function applyFilter() {
        const search = document.getElementById('gi-search').value.toLowerCase();
        document.querySelectorAll('#gi-tbody tr:not(.gi-placeholder)').forEach(row => {
            const v = row.dataset.verdict, r = row.dataset.rich;
            const url = row.querySelector('a')?.href?.toLowerCase()||'';
            let show = activeFilter==='all' ? true
                : activeFilter==='rich-issues' ? (r==='FAIL'||row.querySelector('td:last-child')?.textContent?.trim()!=='—')
                : v===activeFilter;
            if (show && search) show = url.includes(search);
            row.style.display = show?'':'none';
        });
    }

    document.querySelectorAll('.gi-filter').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.gi-filter').forEach(b=>b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.dataset.filter;
            applyFilter();
        });
    });
    document.getElementById('gi-search').addEventListener('input', applyFilter);

    // ── Inspect single URL via POST (2-3s per request, no server timeout)
    async function inspectOne(url) {
        const resp = await fetch(ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
            body: JSON.stringify({ url }),
        });
        if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
        return resp.json();
    }

    // ── Main loop
    async function runInspection() {
        if (running) return;
        running   = true;
        stopFlag  = false;
        allResults = [];

        activeFilter = 'all';
        document.querySelectorAll('.gi-filter').forEach(b=>b.classList.remove('active'));
        document.querySelector('.gi-filter[data-filter="all"]').classList.add('active');

        runBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Running... <small>(click to stop)</small>';
        expBtn.disabled  = true;

        document.getElementById('gi-start-hint').style.display   = 'none';
        document.getElementById('gi-progress-wrap').style.display = '';
        document.getElementById('gi-stats').style.removeProperty('display');
        document.getElementById('gi-filter-bar').style.removeProperty('display');
        document.getElementById('gi-table-wrap').style.display    = '';

        document.getElementById('gi-progress-bar').style.width    = '0%';
        document.getElementById('gi-progress-label').textContent  = `0 / ${URLS.length}`;
        document.getElementById('gi-progress-msg').textContent    = 'Starting...';
        document.getElementById('gi-tbody').innerHTML =
            `<tr class="gi-placeholder"><td colspan="9" class="text-center py-3" style="color:var(--gi-muted);">
                <span class="spinner-border spinner-border-sm me-2"></span>Waiting for first result...
            </td></tr>`;
        updateStats();

        for (let i = 0; i < URLS.length; i++) {
            if (stopFlag) {
                document.getElementById('gi-progress-msg').textContent = `Stopped at ${i} URLs.`;
                break;
            }

            const url = URLS[i];
            const pct = Math.round(((i) / URLS.length) * 100);
            document.getElementById('gi-progress-bar').style.width  = pct + '%';
            document.getElementById('gi-progress-label').textContent = `${i} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent  =
                `[${i+1}/${URLS.length}] Checking: ${shortUrl(url)}`;

            try {
                const result = await inspectOne(url);
                allResults.push(result);
                appendRow(result, i + 1);
                updateStats();

                document.getElementById('gi-progress-bar').style.width  = Math.round(((i+1)/URLS.length)*100) + '%';
                document.getElementById('gi-progress-label').textContent = `${i+1} / ${URLS.length}`;
                document.getElementById('gi-progress-msg').textContent  =
                    `[${i+1}/${URLS.length}] ${shortUrl(url)} → ${result.verdict}`;
            } catch(e) {
                allResults.push({ url, verdict:'ERROR', coverage:e.message,
                    indexing:'', last_crawl:'', crawled_as:'', robots:'', canonical:'',
                    rich_verdict:'N/A', rich_issues:'', mobile_verdict:'N/A', mobile_issues:'' });
                appendRow(allResults[allResults.length-1], i+1);
                updateStats();
            }
        }

        if (!stopFlag) {
            document.getElementById('gi-progress-bar').style.width  = '100%';
            document.getElementById('gi-progress-label').textContent = `${URLS.length} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent  = `✓ Complete! ${allResults.length} URLs inspected.`;
        }

        running = false;
        runBtn.innerHTML = '<iconify-icon icon="solar:refresh-bold"></iconify-icon> Re-run Inspection';
        if (allResults.length) expBtn.disabled = false;
    }

    // Click: start or stop
    runBtn.addEventListener('click', () => {
        if (running) { stopFlag = true; return; }
        runInspection();
    });

    // CSV export
    expBtn.addEventListener('click', () => {
        if (!allResults.length) return;
        const headers = ['URL','Verdict','Coverage','Indexing State','Last Crawl','Crawled As','Robots.txt','Canonical','Rich Verdict','Rich Issues','Mobile Verdict','Mobile Issues'];
        const rows    = allResults.map(r=>[r.url,r.verdict,r.coverage,r.indexing,r.last_crawl,r.crawled_as,r.robots,r.canonical,r.rich_verdict,r.rich_issues,r.mobile_verdict,r.mobile_issues]);
        const csv     = [headers,...rows].map(r=>r.map(v=>`"${String(v??'').replace(/"/g,'""')}"`).join(',')).join('\n');
        const a       = Object.assign(document.createElement('a'),{href:URL.createObjectURL(new Blob([csv],{type:'text/csv'})),download:`gsc-${new Date().toISOString().slice(0,10)}.csv`});
        a.click();
    });
})();
</script>
@endpush
