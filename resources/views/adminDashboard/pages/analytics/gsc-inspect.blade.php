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
    .gi-panel h5, .gi-panel p, .gi-panel th, .gi-panel td, .gi-panel label, .gi-panel span { color: var(--gi-text); }
    .gi-badge { display:inline-block; padding:2px 10px; border-radius:999px; font-size:11px; font-weight:600; letter-spacing:.4px; text-transform:uppercase; }
    .gi-badge-pass    { background:#dcfce7; color:#166534; }
    .gi-badge-neutral { background:#fef9c3; color:#854d0e; }
    .gi-badge-fail    { background:#fee2e2; color:#991b1b; }
    .gi-badge-unknown { background:#f1f5f9; color:#475569; }
    .gi-badge-error   { background:#fef2f2; color:#b91c1c; }
    .gi-badge-na      { background:#f8fafc; color:#94a3b8; }
    html[data-theme=dark] .gi-badge-pass    { background:#14532d; color:#86efac; }
    html[data-theme=dark] .gi-badge-neutral { background:#713f12; color:#fde68a; }
    html[data-theme=dark] .gi-badge-fail    { background:#7f1d1d; color:#fca5a5; }
    html[data-theme=dark] .gi-badge-unknown { background:#1e293b; color:#94a3b8; }
    html[data-theme=dark] .gi-badge-error   { background:#450a0a; color:#fca5a5; }
    html[data-theme=dark] .gi-badge-na      { background:#1e293b; color:#64748b; }
    #gsc-results-table th { font-size:12px; white-space:nowrap; }
    #gsc-results-table td { font-size:13px; vertical-align:middle; }
    #gsc-results-table td.url-cell { max-width:260px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
    .gi-progress-bar-wrap { height:8px; background:var(--gi-border); border-radius:999px; overflow:hidden; }
    .gi-progress-bar { height:100%; background:linear-gradient(90deg,#6366f1,#8b5cf6); transition:width .3s ease; border-radius:999px; }
    .gi-stat-box { border:1px solid var(--gi-border); border-radius:12px; padding:14px 18px; text-align:center; }
    .gi-stat-num { font-size:26px; font-weight:700; color:var(--gi-text); }
    .gi-stat-lbl { font-size:12px; color:var(--gi-muted); margin-top:2px; }
    .gi-idx-btn { font-size:11px; padding:3px 10px; border-radius:6px; white-space:nowrap; cursor:pointer; border:1px solid #6366f1; color:#6366f1; background:transparent; transition:all .2s; }
    .gi-idx-btn:hover:not(:disabled) { background:#6366f1; color:#fff; }
    .gi-idx-btn.sent  { border-color:#22c55e; color:#22c55e; cursor:default; }
    .gi-idx-btn.error { border-color:#ef4444; color:#ef4444; cursor:default; }
    .gi-idx-btn:disabled { opacity:.5; cursor:default; }
    html[data-theme=dark] .gi-idx-btn { border-color:#818cf8; color:#818cf8; }
    html[data-theme=dark] .gi-idx-btn:hover:not(:disabled) { background:#818cf8; color:#1e1b4b; }

    .gi-live-btn { font-size:11px; padding:3px 10px; border-radius:6px; white-space:nowrap; cursor:pointer; border:1px solid #0ea5e9; color:#0ea5e9; background:transparent; transition:all .2s; }
    .gi-live-btn:hover:not(:disabled) { background:#0ea5e9; color:#fff; }
    .gi-live-btn.pass  { border-color:#22c55e; color:#22c55e; cursor:default; }
    .gi-live-btn.fail  { border-color:#ef4444; color:#ef4444; cursor:pointer; }
    .gi-live-btn:disabled { opacity:.5; cursor:default; }
    html[data-theme=dark] .gi-live-btn { border-color:#38bdf8; color:#38bdf8; }
    .gi-cell-actions { display:flex; gap:6px; align-items:center; flex-wrap:nowrap; }
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
            <button id="btn-test-issues" class="btn btn-outline-info d-flex align-items-center gap-2" disabled
                    title="Sirf Rich Result FAIL pages ka live test karo">
                <iconify-icon icon="solar:bug-bold"></iconify-icon>
                Test All Issues
            </button>
            <button id="btn-request-all" class="btn btn-outline-primary d-flex align-items-center gap-2" disabled
                    title="Saare pages ka indexing request Google ko bhejo">
                <iconify-icon icon="solar:refresh-bold"></iconify-icon>
                Request All
            </button>
            <button id="btn-request-not-indexed" class="btn btn-outline-warning d-flex align-items-center gap-2" disabled
                    title="Sirf jo PASS nahi hain unhe request karo (NEUTRAL + FAIL + UNKNOWN)">
                <iconify-icon icon="solar:danger-bold"></iconify-icon>
                Request Not-Indexed
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

    {{-- Stats --}}
    <div id="gi-stats" class="row g-3 mb-4" style="display:none!important;">
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num" id="stat-total">0</div><div class="gi-stat-lbl">Total URLs</div></div></div>
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num text-success" id="stat-pass">0</div><div class="gi-stat-lbl">Indexed</div></div></div>
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num text-warning" id="stat-neutral">0</div><div class="gi-stat-lbl">Neutral</div></div></div>
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num text-danger" id="stat-fail">0</div><div class="gi-stat-lbl">Not Indexed</div></div></div>
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num text-secondary" id="stat-unknown">0</div><div class="gi-stat-lbl">Unknown</div></div></div>
        <div class="col-6 col-md-2"><div class="gi-stat-box"><div class="gi-stat-num text-danger" id="stat-rich-fail">0</div><div class="gi-stat-lbl">Rich Issues</div></div></div>
    </div>

    {{-- Filter bar --}}
    <div id="gi-filter-bar" class="gi-panel mb-3 d-flex align-items-center gap-3 flex-wrap" style="display:none!important; padding:14px 20px;">
        <span style="font-size:13px;color:var(--gi-muted);font-weight:600;">Index:</span>
        <div class="d-flex gap-2 flex-wrap">
            <button class="btn btn-sm btn-outline-secondary gi-filter active" data-filter="all">All</button>
            <button class="btn btn-sm btn-outline-success gi-filter"   data-filter="PASS">Indexed</button>
            <button class="btn btn-sm btn-outline-warning gi-filter"   data-filter="NEUTRAL">Neutral</button>
            <button class="btn btn-sm btn-outline-danger gi-filter"    data-filter="FAIL">Not Indexed</button>
            <button class="btn btn-sm btn-outline-secondary gi-filter" data-filter="UNKNOWN">Unknown</button>
        </div>
        <span style="font-size:13px;color:var(--gi-muted);font-weight:600;margin-left:8px;">Rich:</span>
        <div class="d-flex gap-2 flex-wrap">
            <button class="btn btn-sm btn-outline-success gi-filter"  data-filter="rich-pass">Rich PASS</button>
            <button class="btn btn-sm btn-outline-danger gi-filter"   data-filter="rich-fail">Rich FAIL</button>
            <button class="btn btn-sm btn-outline-secondary gi-filter" data-filter="rich-na">Rich N/A</button>
        </div>
        <input type="text" id="gi-search" class="form-control form-control-sm ms-auto" style="max-width:220px;" placeholder="Search URL...">
    </div>

    {{-- Table --}}
    <div id="gi-table-wrap" class="gi-panel" style="display:none; overflow-x:auto;">
        <table class="table table-sm mb-0" id="gsc-results-table">
            <thead>
                <tr>
                    <th>#</th><th>URL</th><th>Index Verdict</th><th>Coverage State</th>
                    <th>Last Crawled</th><th>Crawled As</th><th>Rich Results</th>
                    <th>Mobile</th><th>Issues</th><th>Live Test</th><th>Request Index</th>
                </tr>
            </thead>
            <tbody id="gi-tbody"></tbody>
        </table>
    </div>

    {{-- Start hint --}}
    <div id="gi-start-hint" class="gi-panel text-center py-5">
        <iconify-icon icon="solar:radar-2-linear" style="font-size:52px;opacity:.35;"></iconify-icon>
        <p class="mt-3 mb-1 fw-semibold" style="color:var(--gi-text);">Ready to inspect {{ count($urls) }} URLs</p>
        <p style="color:var(--gi-muted);font-size:13px;">Sitemap se automatically saare pages load ho rahe hain</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
    const CSRF       = document.querySelector('meta[name="csrf-token"]')?.content;
    const URLS       = @json($urls);
    const INSPECT_EP  = '{{ route("admin.gsc.inspect.single") }}';
    const INDEX_EP    = '{{ route("admin.gsc.inspect.request-indexing") }}';
    const LIVE_EP     = '{{ route("admin.gsc.inspect.live-test") }}';
    const STORE_KEY      = 'gsc_inspect_progress';   // localStorage: partial progress only
    const SAVE_EP        = '{{ route("admin.gsc.inspect.save") }}';
    const LOAD_EP        = '{{ route("admin.gsc.inspect.load") }}';
    const CLEAR_EP       = '{{ route("admin.gsc.inspect.clear") }}';

    const runBtn           = document.getElementById('btn-run');
    const resumeBtn        = document.getElementById('btn-resume');
    const testIssuesBtn    = document.getElementById('btn-test-issues');
    const reqAllBtn        = document.getElementById('btn-request-all');
    const reqNotIndexedBtn = document.getElementById('btn-request-not-indexed');
    const expBtn           = document.getElementById('btn-export');

    let allResults   = [];
    let activeFilter = 'all';
    let running      = false;
    let stopFlag     = false;

    // ── Server storage helpers (persists across logout/login/devices)
    async function serverSave(results, status) {
        try {
            await fetch(SAVE_EP, {
                method: 'POST',
                headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
                body: JSON.stringify({ results, urlCount: URLS.length, status }),
            });
        } catch {}
    }
    function serverSaveBeacon(results, status) {
        // Used on page unload — sendBeacon works even when page is closing
        try {
            const blob = new Blob([JSON.stringify({ results, urlCount: URLS.length, status, _token: CSRF })], { type: 'application/json' });
            navigator.sendBeacon(SAVE_EP, blob);
        } catch {}
    }
    async function serverLoad() {
        try {
            const resp = await fetch(LOAD_EP, { headers: { 'Accept':'application/json' } });
            return await resp.json();
        } catch { return { found: false }; }
    }
    async function serverClear() {
        try {
            await fetch(CLEAR_EP, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
            });
        } catch {}
        localStorage.removeItem(STORE_KEY);
    }

    // ── localStorage: fast save on every URL (survives refresh instantly)
    function saveProgress(r, status = 'partial') {
        try {
            localStorage.setItem(STORE_KEY, JSON.stringify({
                results: r,
                urlCount: URLS.length,
                status,
                savedAt: Date.now(),
            }));
        } catch {}
    }
    function clearLocalProgress() { try { localStorage.removeItem(STORE_KEY); } catch {} }
    function loadLocalProgress() {
        try {
            const s = JSON.parse(localStorage.getItem(STORE_KEY) || 'null');
            if (s && Array.isArray(s.results) && s.results.length > 0 && s.urlCount === URLS.length) return s;
        } catch {}
        return null;
    }

    // ── Page unload: save whatever we have via sendBeacon
    window.addEventListener('beforeunload', () => {
        if (allResults.length > 0) {
            const status = running ? 'partial' : 'complete';
            saveProgress(allResults, status);          // localStorage (instant)
            serverSaveBeacon(allResults, status);       // server (survives refresh)
        }
    });

    // ── On page load: localStorage first (instant), then server (authoritative)
    async function checkResumable() {
        // Step 1: Check localStorage immediately (no network wait)
        const local = loadLocalProgress();
        if (local && local.results.length > 0) {
            restoreState(local.results, local.status, 'Restoring...', false);
        }

        // Step 2: Server load (may have more recent/complete data)
        const server = await serverLoad();
        if (server.found && server.results.length >= (local ? local.results.length : 0)) {
            const ago  = Math.round((Date.now() - new Date(server.savedAt).getTime()) / 60000);
            const when = ago < 60 ? `${ago} min ago` : new Date(server.savedAt).toLocaleString();
            restoreState(server.results, server.status, `Saved ${when} by ${server.savedBy}`, true);
        } else if (!local) {
            resumeBtn.style.display = 'none';
        }
    }

    function restoreState(results, status, label, fromServer) {
        allResults = results;
        const isComplete = status === 'complete';

        showPanels();
        renderAllRows(allResults);
        updateStats();

        const pct = isComplete ? 100 : Math.round((allResults.length / URLS.length) * 100);
        document.getElementById('gi-progress-bar').style.width   = pct + '%';
        document.getElementById('gi-progress-label').textContent = `${allResults.length} / ${URLS.length}`;
        document.getElementById('gi-progress-msg').textContent   = isComplete
            ? `✓ Complete (${allResults.length} URLs) — ${label}. Click "Start Fresh" to re-run.`
            : `⏸ Paused at ${allResults.length}/${URLS.length} — ${label}. Click Resume to continue.`;

        runBtn.innerHTML        = '<iconify-icon icon="solar:refresh-bold"></iconify-icon> Start Fresh';
        testIssuesBtn.disabled  = false;
        reqAllBtn.disabled      = false;
        reqNotIndexedBtn.disabled = false;
        expBtn.disabled         = false;

        if (!isComplete) {
            resumeBtn.style.display = '';
            resumeBtn.innerHTML = `<iconify-icon icon="solar:play-bold"></iconify-icon> Resume (${allResults.length}/${URLS.length} done)`;
        } else {
            resumeBtn.style.display = 'none';
        }
    }

    function verdictBadge(v) {
        const m = { PASS:['pass',v], NEUTRAL:['neutral',v], FAIL:['fail','NOT INDEXED'], UNKNOWN:['unknown','UNKNOWN'], ERROR:['error','ERROR'] };
        const [c, l] = m[v] ?? ['unknown', v||'—'];
        return `<span class="gi-badge gi-badge-${c}">${l}</span>`;
    }
    function richBadge(v) {
        if (!v||v==='N/A') return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='PASS')    return `<span class="gi-badge gi-badge-pass">PASS</span>`;
        if (v==='FAIL')    return `<span class="gi-badge gi-badge-fail">FAIL</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function mobileBadge(v) {
        if (!v||v==='N/A')         return `<span class="gi-badge gi-badge-na">N/A</span>`;
        if (v==='MOBILE_USABLE')   return `<span class="gi-badge gi-badge-pass">OK</span>`;
        if (v==='MOBILE_UNUSABLE') return `<span class="gi-badge gi-badge-fail">ISSUES</span>`;
        return `<span class="gi-badge gi-badge-neutral">${v}</span>`;
    }
    function shortUrl(u) { try { return new URL(u).pathname||'/'; } catch { return u; } }

    function isSeoImportant(url) {
        try {
            const p = new URL(url).pathname.toLowerCase();
            const skip = ['/privacy-policy', '/terms-of-service', '/tag/', '/sitemap'];
            if (skip.some(s => p.startsWith(s))) return false;
            const keep = ['/', '/about', '/contact', '/portfolio', '/services', '/blog/', '/blog', '/category/', '/services/'];
            return keep.some(k => p === k || p.startsWith(k));
        } catch { return false; }
    }

    async function requestIndexing(url, btn) {
        btn.disabled = true;
        btn.textContent = '⏳';
        try {
            const resp = await fetch(INDEX_EP, {
                method: 'POST',
                headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
                body: JSON.stringify({ url }),
            });
            const data = await resp.json();
            if (data.success) {
                btn.textContent = '✓ Sent';
                btn.classList.add('sent');
                btn.title = `Accepted by Google at ${data.notifyTime || 'now'}\n${data.note || ''}`;
            } else {
                btn.textContent = '✗ Failed';
                btn.classList.add('error');
                btn.title = data.hint
                    ? `${data.error}\n\n💡 ${data.hint}`
                    : (data.error || 'Unknown error');
                btn.disabled = false;
                // Show alert for 403 (permission issue)
                if (data.httpStatus === 403) {
                    console.warn('GSC Indexing API 403:', data.hint);
                }
            }
        } catch(e) {
            btn.textContent = '✗ Error';
            btn.classList.add('error');
            btn.title = e.message;
            btn.disabled = false;
        }
    }

    // ── Live test: fetch page + validate JSON-LD (independent of request indexing)
    async function runLiveTest(url, liveBtn) {
        liveBtn.disabled = true;
        liveBtn.textContent = '⏳ Testing...';

        try {
            const resp = await fetch(LIVE_EP, {
                method: 'POST',
                headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
                body: JSON.stringify({ url }),
            });
            const data = await resp.json();

            if (data.status === 'pass') {
                liveBtn.textContent = '✓ Pass';
                liveBtn.classList.add('pass');
                liveBtn.title = `${data.schemas_found} schema(s) — no issues detected`;
            } else if (data.status === 'fail') {
                liveBtn.textContent = '✗ Issues';
                liveBtn.classList.add('fail');
                liveBtn.title = data.issues.join('\n');
                liveBtn.disabled = false;
                window.open(data.test_url, '_blank');
            } else {
                liveBtn.textContent = '? Error';
                liveBtn.title = data.message || 'Fetch failed';
                liveBtn.disabled = false;
            }
        } catch(e) {
            liveBtn.textContent = '? Error';
            liveBtn.title = e.message;
            liveBtn.disabled = false;
        }
    }

    function appendRow(r, idx, scroll = true) {
        const tbody = document.getElementById('gi-tbody');
        const ph = tbody.querySelector('.gi-placeholder');
        if (ph) ph.remove();

        const row = document.createElement('tr');
        row.dataset.verdict = r.verdict;
        row.dataset.rich    = r.rich_verdict;
        if (!rowMatchesFilter(r)) row.style.display = 'none';

        const hasIssues  = r.rich_verdict === 'FAIL' || !!r.rich_issues;
        const liveBtnId  = 'live-' + idx;
        const idxBtnId   = 'idx-'  + idx;

        row.innerHTML = `
            <td>${idx}</td>
            <td class="url-cell" title="${r.url}">
                <a href="${r.url}" target="_blank" rel="noopener" style="color:inherit;text-decoration:none;">${shortUrl(r.url)}</a>
            </td>
            <td>${verdictBadge(r.verdict)}</td>
            <td style="font-size:12px;">${r.coverage||'—'}</td>
            <td style="font-size:12px;">${r.last_crawl ? r.last_crawl.replace('T',' ').substring(0,16) : 'Never'}</td>
            <td style="font-size:12px;">${r.crawled_as||'—'}</td>
            <td>${richBadge(r.rich_verdict)}</td>
            <td>${mobileBadge(r.mobile_verdict)}</td>
            <td style="font-size:11px;max-width:200px;color:#ef4444;">${[r.rich_issues,r.mobile_issues].filter(Boolean).join('<br>')||'—'}</td>
            <td>${hasIssues
                ? `<button id="${liveBtnId}" class="gi-live-btn" data-url="${r.url}" title="Live page fetch + JSON-LD validation">Live Test</button>`
                : `<span style="font-size:11px;color:#22c55e;">✓ Clean</span>`}</td>
            <td><button id="${idxBtnId}" class="gi-idx-btn" data-url="${r.url}">Request</button></td>`;

        tbody.appendChild(row);
        if (scroll) row.scrollIntoView({ behavior:'smooth', block:'nearest' });

        // Wire live test button
        if (hasIssues) {
            document.getElementById(liveBtnId)?.addEventListener('click', function() {
                runLiveTest(this.dataset.url, this);
            });
        }
        // Wire request index button (always available for all pages)
        document.getElementById(idxBtnId)?.addEventListener('click', function() {
            requestIndexing(this.dataset.url, this);
        });
    }

    function renderAllRows(results) {
        document.getElementById('gi-tbody').innerHTML = '';
        results.forEach((r, i) => appendRow(r, i + 1, false));
    }

    function rowMatchesFilter(r) {
        switch (activeFilter) {
            case 'all':         return true;
            case 'PASS':        return r.verdict === 'PASS';
            case 'NEUTRAL':     return r.verdict === 'NEUTRAL';
            case 'FAIL':        return r.verdict === 'FAIL';
            case 'UNKNOWN':     return r.verdict === 'UNKNOWN' || r.verdict === 'ERROR';
            case 'rich-pass':   return r.rich_verdict === 'PASS';
            case 'rich-fail':   return r.rich_verdict === 'FAIL' || !!r.rich_issues;
            case 'rich-na':     return !r.rich_verdict || r.rich_verdict === 'N/A';
            case 'rich-issues': return r.rich_verdict === 'FAIL' || !!r.rich_issues;
            default:            return true;
        }
    }

    function applyFilter() {
        const search = document.getElementById('gi-search').value.toLowerCase();
        document.querySelectorAll('#gi-tbody tr:not(.gi-placeholder)').forEach(row => {
            const mockR = {
                verdict:      row.dataset.verdict,
                rich_verdict: row.dataset.rich,
                rich_issues:  row.querySelector('td:nth-child(9)')?.textContent?.trim() !== '—' ? 'yes' : '',
            };
            let show = rowMatchesFilter(mockR);
            if (show && search) show = (row.querySelector('a')?.href || '').toLowerCase().includes(search);
            row.style.display = show ? '' : 'none';
        });
    }

    function updateStats() {
        const c = { PASS:0, NEUTRAL:0, FAIL:0, UNKNOWN:0, ERROR:0 };
        let rf = 0;
        allResults.forEach(r => { c[r.verdict] = (c[r.verdict]||0) + 1; if (r.rich_verdict==='FAIL') rf++; });
        document.getElementById('stat-total').textContent     = allResults.length;
        document.getElementById('stat-pass').textContent      = c.PASS;
        document.getElementById('stat-neutral').textContent   = c.NEUTRAL;
        document.getElementById('stat-fail').textContent      = c.FAIL;
        document.getElementById('stat-unknown').textContent   = (c.UNKNOWN||0) + (c.ERROR||0);
        document.getElementById('stat-rich-fail').textContent = rf;
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

    async function inspectOne(url) {
        const resp = await fetch(INSPECT_EP, {
            method: 'POST',
            headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN':CSRF, 'Accept':'application/json' },
            body: JSON.stringify({ url }),
        });
        if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
        return resp.json();
    }

    function showPanels() {
        document.getElementById('gi-start-hint').style.display    = 'none';
        document.getElementById('gi-progress-wrap').style.display  = '';
        document.getElementById('gi-stats').style.removeProperty('display');
        document.getElementById('gi-filter-bar').style.removeProperty('display');
        document.getElementById('gi-table-wrap').style.display     = '';
    }

    async function runLoop(startFrom = 0) {
        running  = true;
        stopFlag = false;

        runBtn.innerHTML        = '<span class="spinner-border spinner-border-sm"></span> Running... <small>(click to stop)</small>';
        resumeBtn.style.display = 'none';
        reqAllBtn.disabled      = true;
        reqNotIndexedBtn.disabled = true;
        testIssuesBtn.disabled  = true;
        expBtn.disabled         = true;
        showPanels();

        for (let i = startFrom; i < URLS.length; i++) {
            if (stopFlag) {
                saveProgress(allResults, 'partial');    // localStorage
                serverSave(allResults, 'partial');      // server
                document.getElementById('gi-progress-msg').textContent = `⏸ Paused at ${i}/${URLS.length}. Click Resume to continue.`;
                resumeBtn.style.display = '';
                resumeBtn.innerHTML = `<iconify-icon icon="solar:play-bold"></iconify-icon> Resume (${i}/${URLS.length} done, ${URLS.length - i} left)`;
                break;
            }

            const url = URLS[i];
            document.getElementById('gi-progress-bar').style.width   = Math.round((i / URLS.length) * 100) + '%';
            document.getElementById('gi-progress-label').textContent = `${i} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent   = `[${i+1}/${URLS.length}] Checking: ${shortUrl(url)}`;

            try {
                const result = await inspectOne(url);
                allResults.push(result);
                appendRow(result, i + 1);
                updateStats();
                document.getElementById('gi-progress-bar').style.width   = Math.round(((i+1) / URLS.length) * 100) + '%';
                document.getElementById('gi-progress-label').textContent = `${i+1} / ${URLS.length}`;
                document.getElementById('gi-progress-msg').textContent   = `[${i+1}/${URLS.length}] ${shortUrl(url)} → ${result.verdict}`;
                // Every URL → localStorage (instant, no network)
                saveProgress(allResults, 'partial');
                // Every 5 URLs → server save
                if ((i + 1) % 5 === 0) serverSave(allResults, 'partial');
            } catch(e) {
                const err = { url, verdict:'ERROR', coverage:e.message, indexing:'', last_crawl:'', crawled_as:'', robots:'', canonical:'', rich_verdict:'N/A', rich_issues:'', mobile_verdict:'N/A', mobile_issues:'' };
                allResults.push(err);
                appendRow(err, i + 1);
                updateStats();
            }
        }

        if (!stopFlag) {
            clearLocalProgress();
            saveProgress(allResults, 'complete');   // localStorage
            serverSave(allResults, 'complete');     // server (final)
            document.getElementById('gi-progress-bar').style.width   = '100%';
            document.getElementById('gi-progress-label').textContent = `${URLS.length} / ${URLS.length}`;
            document.getElementById('gi-progress-msg').textContent   = `✓ Complete! ${allResults.length} URLs. Data saved — available after logout/login.`;
            resumeBtn.style.display = 'none';
        }

        running = false;
        runBtn.innerHTML          = '<iconify-icon icon="solar:refresh-bold"></iconify-icon> Start Fresh';
        testIssuesBtn.disabled    = allResults.length === 0;
        reqAllBtn.disabled        = allResults.length === 0;
        reqNotIndexedBtn.disabled = allResults.length === 0;
        expBtn.disabled           = allResults.length === 0;
    }

    runBtn.addEventListener('click', () => {
        if (running) { stopFlag = true; return; }
        serverClear(); // clear server + localStorage
        allResults   = [];
        activeFilter = 'all';
        document.querySelectorAll('.gi-filter').forEach(b => b.classList.remove('active'));
        document.querySelector('.gi-filter[data-filter="all"]').classList.add('active');
        document.getElementById('gi-progress-bar').style.width   = '0%';
        document.getElementById('gi-progress-label').textContent = `0 / ${URLS.length}`;
        document.getElementById('gi-progress-msg').textContent   = 'Starting...';
        document.getElementById('gi-tbody').innerHTML =
            `<tr class="gi-placeholder"><td colspan="11" class="text-center py-3" style="color:var(--gi-muted);">
                <span class="spinner-border spinner-border-sm me-2"></span>Waiting for first result...
            </td></tr>`;
        reqAllBtn.disabled = true;
        expBtn.disabled    = true;
        updateStats();
        showPanels();
        runLoop(0);
    });

    resumeBtn.addEventListener('click', () => {
        if (running) return;
        // Try server state first, then localStorage
        const local = loadLocalProgress();
        const resumeFrom = allResults.length > 0 ? allResults : (local ? local.results : []);
        if (!resumeFrom.length) { checkResumable(); return; }
        allResults = resumeFrom;
        document.getElementById('gi-progress-bar').style.width   = Math.round((allResults.length / URLS.length) * 100) + '%';
        document.getElementById('gi-progress-label').textContent = `${allResults.length} / ${URLS.length}`;
        showPanels();
        renderAllRows(allResults);
        updateStats();
        runLoop(allResults.length);
    });

    // ── Request All Indexing — ALL pages, no filter
    reqAllBtn.addEventListener('click', async () => {
        if (!allResults.length) return;
        const eligible = [...document.querySelectorAll('.gi-idx-btn:not(.sent):not(.error)')];
        if (!eligible.length) { reqAllBtn.innerHTML = '✓ All requested!'; return; }
        reqAllBtn.disabled = true;
        let done = 0;
        for (const btn of eligible) {
            await requestIndexing(btn.dataset.url, btn);
            done++;
            reqAllBtn.innerHTML = `<span class="spinner-border spinner-border-sm"></span> ${done}/${eligible.length}...`;
            await new Promise(r => setTimeout(r, 500));
        }
        reqAllBtn.innerHTML = `✓ ${done} requested!`;
    });

    // ── Request Not-Indexed only (NEUTRAL + FAIL + UNKNOWN)
    reqNotIndexedBtn.addEventListener('click', async () => {
        if (!allResults.length) return;
        const notPassed = ['NEUTRAL', 'FAIL', 'UNKNOWN', 'ERROR'];
        const eligible = [...document.querySelectorAll('.gi-idx-btn:not(.sent):not(.error)')].filter(btn => {
            const r = allResults.find(x => x.url === btn.dataset.url);
            return r && notPassed.includes(r.verdict);
        });
        if (!eligible.length) { reqNotIndexedBtn.innerHTML = '✓ All non-indexed requested!'; return; }
        reqNotIndexedBtn.disabled = true;
        let done = 0;
        for (const btn of eligible) {
            await requestIndexing(btn.dataset.url, btn);
            done++;
            reqNotIndexedBtn.innerHTML = `<span class="spinner-border spinner-border-sm"></span> ${done}/${eligible.length}...`;
            await new Promise(r => setTimeout(r, 500));
        }
        reqNotIndexedBtn.innerHTML = `✓ ${done} not-indexed requested!`;
    });

    expBtn.addEventListener('click', () => {
        if (!allResults.length) return;
        const headers = ['URL','Verdict','Coverage','Indexing State','Last Crawl','Crawled As','Robots.txt','Canonical','Rich Verdict','Rich Issues','Mobile Verdict','Mobile Issues'];
        const rows    = allResults.map(r => [r.url, r.verdict, r.coverage, r.indexing, r.last_crawl, r.crawled_as, r.robots, r.canonical, r.rich_verdict, r.rich_issues, r.mobile_verdict, r.mobile_issues]);
        const csv     = [headers, ...rows].map(r => r.map(v => `"${String(v??'').replace(/"/g,'""')}"`).join(',')).join('\n');
        const a = Object.assign(document.createElement('a'), {
            href: URL.createObjectURL(new Blob([csv], { type:'text/csv' })),
            download: `gsc-${new Date().toISOString().slice(0,10)}.csv`,
        });
        a.click();
    });

    checkResumable();
})();
</script>
@endpush
