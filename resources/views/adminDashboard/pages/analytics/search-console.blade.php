@extends('adminDashboard.index')

@section('title', 'Search Console Details')

@section('adminDashboard.content')
<style>
    .gsc-details {
        --details-bg: linear-gradient(145deg, #e8f1ff 0%, #f5f8ff 55%, #eef5ff 100%);
        --details-panel: rgba(255, 255, 255, 0.82);
        --details-text: #0f172a;
        --details-muted: #475569;
        --details-border: rgba(148, 163, 184, 0.3);
        --details-shadow: 0 18px 40px rgba(30, 41, 59, 0.12);
        border-radius: 18px;
        background: var(--details-bg);
        padding: 18px;
    }

    html[data-theme=dark] .gsc-details {
        --details-bg: radial-gradient(circle at 20% -10%, #0b2948 0%, #0f172a 40%, #020617 100%);
        --details-panel: rgba(15, 23, 42, 0.82);
        --details-text: #e2e8f0;
        --details-muted: #94a3b8;
        --details-border: rgba(148, 163, 184, 0.22);
        --details-shadow: 0 20px 44px rgba(2, 8, 23, 0.55);
    }

    .gsc-details .panel {
        background: var(--details-panel);
        border: 1px solid var(--details-border);
        border-radius: 14px;
        box-shadow: var(--details-shadow);
        backdrop-filter: blur(8px);
    }

    .gsc-details h3,
    .gsc-details h6,
    .gsc-details p,
    .gsc-details th,
    .gsc-details td,
    .gsc-details label,
    .gsc-details span {
        color: var(--details-text);
    }

    .gsc-details .soft {
        color: var(--details-muted) !important;
    }

    .gsc-chip-wrap {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .gsc-chip {
        border: 1px solid var(--details-border);
        background: rgba(255, 255, 255, 0.72);
        color: var(--details-text);
        border-radius: 999px;
        padding: 8px 14px;
        font-weight: 600;
        font-size: 13px;
    }

    .gsc-chip.active {
        background: linear-gradient(120deg, rgba(2, 132, 199, 0.2), rgba(14, 165, 233, 0.26));
        border-color: rgba(2, 132, 199, 0.38);
    }

    html[data-theme=dark] .gsc-chip {
        background: rgba(30, 41, 59, 0.78);
        color: #e2e8f0;
    }

    .gsc-kpi {
        padding: 14px;
        min-height: 120px;
    }

    .gsc-kpi .value {
        font-size: 28px;
        font-weight: 700;
        margin-top: 4px;
    }

    .gsc-kpi .meta {
        font-size: 12px;
        margin-top: 8px;
    }

    .gsc-meta-up {
        color: #16a34a !important;
    }

    .gsc-meta-down {
        color: #dc2626 !important;
    }

    .gsc-table {
        --bs-table-bg: transparent;
        --bs-table-color: var(--details-text);
        --bs-table-border-color: rgba(148, 163, 184, 0.2);
    }

    .gsc-table thead th {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: var(--details-muted);
    }

    .gsc-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
    }

    .gsc-date {
        min-height: 40px;
        border-radius: 10px;
        border: 1px solid var(--details-border);
        padding: 0 10px;
        background: rgba(255, 255, 255, 0.8);
        color: var(--details-text);
    }

    html[data-theme=dark] .gsc-date {
        background: rgba(30, 41, 59, 0.84);
    }

    .gsc-btn {
        border: 1px solid var(--details-border);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.78);
        color: var(--details-text);
        padding: 8px 12px;
        font-weight: 600;
    }

    html[data-theme=dark] .gsc-btn {
        background: rgba(30, 41, 59, 0.86);
    }

    .gsc-loading {
        display: none;
        font-size: 13px;
        color: var(--details-muted);
    }

    .gsc-error {
        display: none;
    }

    .gsc-empty {
        color: var(--details-muted);
        font-size: 13px;
        padding: 12px;
        text-align: center;
    }
</style>

<div class="container-fluid gsc-details">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <h3 class="mb-1">Search Console Details</h3>
            <p class="soft mb-0" id="gscRangeLabel">Detailed report for selected range</p>
        </div>
        <div class="gsc-toolbar">
            <label class="d-inline-flex align-items-center gap-2 soft mb-0" for="gscCompare">
                <input type="checkbox" id="gscCompare" checked>
                Compare previous period
            </label>
            <button type="button" class="gsc-btn" id="gscRefreshBtn">Refresh</button>
        </div>
    </div>

    <div class="panel p-3 mb-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="gsc-chip-wrap" id="gscRangeChips">
                <button type="button" class="gsc-chip active" data-range="7d">7D</button>
                <button type="button" class="gsc-chip" data-range="28d">28D</button>
                <button type="button" class="gsc-chip" data-range="3m">3M</button>
                <button type="button" class="gsc-chip" data-range="custom">Custom</button>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2" id="gscCustomRange" style="display: none;">
                <input type="date" id="gscStartDate" class="gsc-date">
                <span class="soft">to</span>
                <input type="date" id="gscEndDate" class="gsc-date">
                <button type="button" class="gsc-btn" id="gscApplyCustom">Apply</button>
            </div>
        </div>
    </div>

    <div class="row row-cols-xxxl-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 gy-3 mb-3">
        <div class="col">
            <div class="panel gsc-kpi">
                <p class="soft mb-0">Clicks</p>
                <div class="value" id="gscKpiClicks">0</div>
                <div class="meta soft" id="gscGrowthClicks">Loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="panel gsc-kpi">
                <p class="soft mb-0">Impressions</p>
                <div class="value" id="gscKpiImpressions">0</div>
                <div class="meta soft" id="gscGrowthImpressions">Loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="panel gsc-kpi">
                <p class="soft mb-0">CTR</p>
                <div class="value" id="gscKpiCtr">0%</div>
                <div class="meta soft" id="gscGrowthCtr">Loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="panel gsc-kpi">
                <p class="soft mb-0">Position</p>
                <div class="value" id="gscKpiPosition">0</div>
                <div class="meta soft" id="gscGrowthPosition">Loading...</div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="gsc-loading" id="gscLoading">Loading Search Console report...</div>
        <div class="soft" id="gscSiteUsed">Site: -</div>
    </div>

    <div class="alert alert-danger gsc-error" id="gscErrorBox"></div>

    <div class="row gy-3">
        <div class="col-12 col-xl-6">
            <div class="panel p-3">
                <h6 class="mb-2">Top Queries</h6>
                <div class="table-responsive">
                    <table class="table gsc-table mb-0">
                        <thead>
                            <tr>
                                <th>Query</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                                <th class="text-end">CTR</th>
                                <th class="text-end">Position</th>
                            </tr>
                        </thead>
                        <tbody id="gscTopQueriesBody">
                            <tr><td colspan="5" class="gsc-empty">Data will appear here.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="panel p-3">
                <h6 class="mb-2">Top Pages</h6>
                <div class="table-responsive">
                    <table class="table gsc-table mb-0">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                                <th class="text-end">CTR</th>
                                <th class="text-end">Position</th>
                            </tr>
                        </thead>
                        <tbody id="gscTopPagesBody">
                            <tr><td colspan="5" class="gsc-empty">Data will appear here.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="panel p-3">
                <h6 class="mb-2">Countries</h6>
                <div class="table-responsive">
                    <table class="table gsc-table mb-0">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                            </tr>
                        </thead>
                        <tbody id="gscCountriesBody">
                            <tr><td colspan="3" class="gsc-empty">Data will appear here.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="panel p-3">
                <h6 class="mb-2">Devices</h6>
                <div class="table-responsive">
                    <table class="table gsc-table mb-0">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                            </tr>
                        </thead>
                        <tbody id="gscDevicesBody">
                            <tr><td colspan="3" class="gsc-empty">Data will appear here.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    const endpoint = "{{ route('gsc.dashboard') }}";

    const state = {
        range: '7d',
        compare: true,
        startDate: null,
        endDate: null,
    };

    const rangeLabelEl = document.getElementById('gscRangeLabel');
    const loadingEl = document.getElementById('gscLoading');
    const errorEl = document.getElementById('gscErrorBox');
    const siteUsedEl = document.getElementById('gscSiteUsed');

    function formatNumber(value) {
        return Number(value || 0).toLocaleString();
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/\"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function formatGrowth(value) {
        if (value === null || value === undefined) {
            return { text: 'Comparison disabled', className: 'soft' };
        }

        const n = Number(value || 0);
        const sign = n > 0 ? '+' : '';
        const className = n >= 0 ? 'gsc-meta-up' : 'gsc-meta-down';
        return { text: sign + n.toFixed(2) + '% vs previous period', className: className };
    }

    function applyGrowth(targetId, value) {
        const meta = formatGrowth(value);
        const el = document.getElementById(targetId);
        if (!el) return;
        el.textContent = meta.text;
        el.classList.remove('gsc-meta-up', 'gsc-meta-down', 'soft');
        el.classList.add(meta.className);
    }

    function applyKpis(payload) {
        const k = payload.kpis || {};
        document.getElementById('gscKpiClicks').textContent = formatNumber(k.clicks);
        document.getElementById('gscKpiImpressions').textContent = formatNumber(k.impressions);
        document.getElementById('gscKpiCtr').textContent = Number(k.ctr || 0).toFixed(2) + '%';
        document.getElementById('gscKpiPosition').textContent = Number(k.position || 0).toFixed(2);

        const growth = payload.growth || {};
        applyGrowth('gscGrowthClicks', growth.clicks);
        applyGrowth('gscGrowthImpressions', growth.impressions);
        applyGrowth('gscGrowthCtr', growth.ctr);
        applyGrowth('gscGrowthPosition', growth.position);
    }

    function renderRows(targetId, items, mapper, emptyColumns) {
        const tbody = document.getElementById(targetId);
        if (!tbody) return;

        if (!Array.isArray(items) || items.length === 0) {
            tbody.innerHTML = '<tr><td colspan="' + emptyColumns + '" class="gsc-empty">No data for selected range.</td></tr>';
            return;
        }

        tbody.innerHTML = items.map(mapper).join('');
    }

    function shortPage(url) {
        if (!url) return '(unknown)';
        if (url.length <= 56) return url;
        return url.slice(0, 56) + '...';
    }

    function applyTables(payload) {
        renderRows('gscTopQueriesBody', payload.top_queries || [], function (item) {
            return '<tr>' +
                '<td>' + escapeHtml(item.query || '(unknown)') + '</td>' +
                '<td class="text-end">' + formatNumber(item.clicks) + '</td>' +
                '<td class="text-end">' + formatNumber(item.impressions) + '</td>' +
                '<td class="text-end">' + Number(item.ctr || 0).toFixed(2) + '%</td>' +
                '<td class="text-end">' + Number(item.position || 0).toFixed(2) + '</td>' +
                '</tr>';
        }, 5);

        renderRows('gscTopPagesBody', payload.top_pages || [], function (item) {
            const page = item.page || '(unknown)';
            return '<tr>' +
                '<td title="' + escapeHtml(page) + '">' + escapeHtml(shortPage(page)) + '</td>' +
                '<td class="text-end">' + formatNumber(item.clicks) + '</td>' +
                '<td class="text-end">' + formatNumber(item.impressions) + '</td>' +
                '<td class="text-end">' + Number(item.ctr || 0).toFixed(2) + '%</td>' +
                '<td class="text-end">' + Number(item.position || 0).toFixed(2) + '</td>' +
                '</tr>';
        }, 5);

        renderRows('gscCountriesBody', payload.countries || [], function (item) {
            return '<tr>' +
                '<td>' + escapeHtml(item.label || 'Unknown') + '</td>' +
                '<td class="text-end">' + formatNumber(item.clicks) + '</td>' +
                '<td class="text-end">' + formatNumber(item.impressions) + '</td>' +
                '</tr>';
        }, 3);

        renderRows('gscDevicesBody', payload.devices || [], function (item) {
            return '<tr>' +
                '<td>' + escapeHtml(item.label || 'Unknown') + '</td>' +
                '<td class="text-end">' + formatNumber(item.clicks) + '</td>' +
                '<td class="text-end">' + formatNumber(item.impressions) + '</td>' +
                '</tr>';
        }, 3);
    }

    function applyRangeLabel(payload) {
        const d = payload.date_range || {};
        rangeLabelEl.textContent = 'Range: ' + (d.start || '-') + ' to ' + (d.end || '-') + (state.compare && d.previous_start ? ' | Previous: ' + d.previous_start + ' to ' + d.previous_end : '');
    }

    function setLoading(active) {
        loadingEl.style.display = active ? 'block' : 'none';
    }

    function setError(message) {
        if (!message) {
            errorEl.style.display = 'none';
            errorEl.textContent = '';
            return;
        }
        errorEl.style.display = 'block';
        errorEl.textContent = message;
    }

    function buildUrl() {
        const params = new URLSearchParams();
        params.set('range', state.range);
        params.set('compare', state.compare ? '1' : '0');
        if (state.range === 'custom') {
            if (state.startDate) params.set('start_date', state.startDate);
            if (state.endDate) params.set('end_date', state.endDate);
        }
        return endpoint + '?' + params.toString();
    }

    async function loadReport() {
        setLoading(true);
        setError(null);

        try {
            const response = await fetch(buildUrl(), {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
            });

            if (!response.ok) {
                throw new Error('Request failed with status ' + response.status);
            }

            const payload = await response.json();

            if (!payload.ok && payload.message) {
                setError(payload.message);
            }

            siteUsedEl.textContent = 'Site: ' + (payload.site_used || '-');
            applyRangeLabel(payload);
            applyKpis(payload);
            applyTables(payload);
        } catch (error) {
            setError(error.message || 'Unable to load Search Console report.');
        } finally {
            setLoading(false);
        }
    }

    document.querySelectorAll('#gscRangeChips .gsc-chip').forEach(function (chip) {
        chip.addEventListener('click', function () {
            document.querySelectorAll('#gscRangeChips .gsc-chip').forEach(function (x) {
                x.classList.remove('active');
            });

            chip.classList.add('active');
            state.range = chip.getAttribute('data-range') || '7d';

            const customBox = document.getElementById('gscCustomRange');
            customBox.style.display = state.range === 'custom' ? 'flex' : 'none';

            if (state.range !== 'custom') {
                loadReport();
            }
        });
    });

    document.getElementById('gscCompare').addEventListener('change', function (event) {
        state.compare = !!event.target.checked;
        loadReport();
    });

    document.getElementById('gscRefreshBtn').addEventListener('click', function () {
        loadReport();
    });

    document.getElementById('gscApplyCustom').addEventListener('click', function () {
        const start = document.getElementById('gscStartDate').value;
        const end = document.getElementById('gscEndDate').value;

        if (!start || !end) {
            setError('Please choose both start and end dates.');
            return;
        }

        if (start > end) {
            setError('Start date must be before end date.');
            return;
        }

        state.startDate = start;
        state.endDate = end;
        setError(null);
        loadReport();
    });

    loadReport();
})();
</script>
@endsection
