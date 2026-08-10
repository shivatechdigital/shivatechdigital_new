@extends('adminDashboard.index')

@section('adminDashboard.content')
<style>
    .gsc-shell {
        --gsc-bg-1: #0f172a;
        --gsc-bg-2: #1e293b;
        --gsc-glass: rgba(255, 255, 255, 0.12);
        --gsc-glass-border: rgba(255, 255, 255, 0.25);
        --gsc-text: #ecf5ff;
        --gsc-muted: #c6d5e6;
        --gsc-accent: #5eead4;
        --gsc-accent-2: #38bdf8;
        color: var(--gsc-text);
        border-radius: 18px;
        padding: 18px;
        background: radial-gradient(1200px 600px at 10% -10%, #164e63 0%, transparent 60%),
                    radial-gradient(1200px 600px at 110% 10%, #1e3a8a 0%, transparent 50%),
                    linear-gradient(145deg, var(--gsc-bg-1), var(--gsc-bg-2));
        position: relative;
        overflow: hidden;
    }

    .gsc-shell::before {
        content: '';
        position: absolute;
        inset: -20% 10% auto auto;
        width: 340px;
        height: 340px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(56, 189, 248, 0.3), transparent 70%);
        pointer-events: none;
    }

    .gsc-glass {
        background: var(--gsc-glass);
        border: 1px solid var(--gsc-glass-border);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: 16px;
        box-shadow: 0 12px 32px rgba(2, 8, 23, 0.35);
    }

    .gsc-kpi-card {
        padding: 16px;
        min-height: 136px;
    }

    .gsc-kpi-value {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 0.4px;
    }

    .gsc-kpi-label {
        color: var(--gsc-muted);
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .gsc-growth {
        font-size: 0.82rem;
        color: #d9e6f4;
    }

    .gsc-positive {
        color: #86efac;
    }

    .gsc-negative {
        color: #fca5a5;
    }

    .gsc-toolbar {
        gap: 12px;
    }

    .gsc-chip-group {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .gsc-chip {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.22);
        color: var(--gsc-text);
        border-radius: 999px;
        font-size: 0.82rem;
        padding: 8px 14px;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .gsc-chip.active {
        background: linear-gradient(120deg, rgba(94, 234, 212, 0.35), rgba(56, 189, 248, 0.35));
        border-color: rgba(255, 255, 255, 0.35);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.25);
    }

    .gsc-chip:hover {
        transform: translateY(-1px);
    }

    .gsc-form-input {
        background: rgba(255, 255, 255, 0.08);
        color: var(--gsc-text);
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 10px;
        padding: 8px 10px;
    }

    .gsc-form-input:focus {
        outline: none;
        border-color: rgba(56, 189, 248, 0.8);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
    }

    .gsc-toggle {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--gsc-muted);
        font-size: 0.85rem;
    }

    .gsc-table-wrap table,
    .gsc-table-wrap th,
    .gsc-table-wrap td {
        color: var(--gsc-text);
        border-color: rgba(255, 255, 255, 0.12) !important;
        background: transparent !important;
    }

    .gsc-table-wrap th {
        color: #d4e3f4;
        font-size: 0.78rem;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .gsc-panel {
        padding: 14px;
    }

    .gsc-title {
        font-size: 0.96rem;
        font-weight: 600;
        color: #dce9f7;
    }

    .gsc-subtitle {
        color: var(--gsc-muted);
        font-size: 0.82rem;
    }

    .gsc-refresh {
        border-radius: 999px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: var(--gsc-text);
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 14px;
    }

    .gsc-refresh:hover {
        background: rgba(255, 255, 255, 0.18);
    }

    .gsc-compare-tag {
        font-size: 0.76rem;
        color: #bfdbfe;
    }

    @media (max-width: 991px) {
        .gsc-shell {
            padding: 14px;
        }

        .gsc-kpi-value {
            font-size: 1.7rem;
        }
    }
</style>

<div class="gsc-shell">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3 position-relative">
        <div>
            <h5 class="fw-semibold mb-1 text-white">Search Console Intelligence</h5>
            <p class="mb-0 gsc-subtitle" id="rangeLabel">Performance range will appear here</p>
        </div>

        <div class="d-flex align-items-center gsc-toolbar">
            <label class="gsc-toggle mb-0">
                <input type="checkbox" id="compareToggle" checked>
                Compare with previous period
            </label>
            <button type="button" class="gsc-refresh" id="refreshDashboard">
                <i class="fas fa-rotate-right me-1"></i> Refresh
            </button>
        </div>
    </div>

    <div class="gsc-glass p-3 mb-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div class="gsc-chip-group" id="rangeChips">
                <button class="gsc-chip active" data-range="7d" type="button">7D</button>
                <button class="gsc-chip" data-range="28d" type="button">28D</button>
                <button class="gsc-chip" data-range="3m" type="button">3M</button>
                <button class="gsc-chip" data-range="custom" type="button">Custom</button>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2" id="customDateControls" style="display:none;">
                <input type="date" class="gsc-form-input" id="customStartDate">
                <span class="gsc-subtitle">to</span>
                <input type="date" class="gsc-form-input" id="customEndDate">
                <button type="button" class="gsc-refresh" id="applyCustomRange">Apply</button>
            </div>
        </div>
    </div>

    <div class="row row-cols-xxxl-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 gy-3">
        <div class="col">
            <div class="gsc-glass gsc-kpi-card">
                <p class="gsc-kpi-label">Total Clicks</p>
                <div class="gsc-kpi-value" id="kpiClicks">0</div>
                <div id="growthClicks" class="gsc-growth">Comparison data loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="gsc-glass gsc-kpi-card">
                <p class="gsc-kpi-label">Total Impressions</p>
                <div class="gsc-kpi-value" id="kpiImpressions">0</div>
                <div id="growthImpressions" class="gsc-growth">Comparison data loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="gsc-glass gsc-kpi-card">
                <p class="gsc-kpi-label">Average CTR</p>
                <div class="gsc-kpi-value" id="kpiCtr">0%</div>
                <div id="growthCtr" class="gsc-growth">Comparison data loading...</div>
            </div>
        </div>
        <div class="col">
            <div class="gsc-glass gsc-kpi-card">
                <p class="gsc-kpi-label">Average Position</p>
                <div class="gsc-kpi-value" id="kpiPosition">0</div>
                <div id="growthPosition" class="gsc-growth">Comparison data loading...</div>
            </div>
        </div>
    </div>

    <div class="row gy-3 mt-1">
        <div class="col-12">
            <div class="gsc-glass gsc-panel">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div>
                        <div class="gsc-title">Clicks vs Impressions Trend</div>
                        <div class="gsc-subtitle">Organic search performance timeline</div>
                    </div>
                    <span class="gsc-compare-tag" id="seriesCount">0 points</span>
                </div>
                <div id="clickImpressionChart" style="height: 320px;"></div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="gsc-glass gsc-panel h-100">
                <h6 class="mb-2 gsc-title">Top Queries</h6>
                <div class="gsc-table-wrap table-responsive mb-3">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Query</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                                <th class="text-end">CTR</th>
                                <th class="text-end">Position</th>
                            </tr>
                        </thead>
                        <tbody id="topQueriesTable">
                            <tr><td colspan="5" class="text-center py-3">Loading...</td></tr>
                        </tbody>
                    </table>
                </div>
                <h6 class="mb-2 gsc-title">Top Query Click Distribution</h6>
                <div id="topQueryChart" style="height: 280px;"></div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="gsc-glass gsc-panel mb-3">
                <h6 class="mb-2 gsc-title">Device Breakdown</h6>
                <div id="deviceChart" style="height: 240px;"></div>
            </div>
            <div class="gsc-glass gsc-panel">
                <h6 class="mb-2 gsc-title">Country Distribution</h6>
                <div id="countryChart" style="height: 240px;"></div>
            </div>
        </div>

        <div class="col-12">
            <div class="gsc-glass gsc-panel">
                <h6 class="mb-2 gsc-title">Top Pages</h6>
                <div class="gsc-table-wrap table-responsive">
                    <table class="table table-sm align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Page</th>
                                <th class="text-end">Clicks</th>
                                <th class="text-end">Impressions</th>
                                <th class="text-end">CTR</th>
                                <th class="text-end">Position</th>
                            </tr>
                        </thead>
                        <tbody id="topPagesTable">
                            <tr><td colspan="5" class="text-center py-3">Loading...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-warning d-none mt-3" id="dashboardError" role="alert"></div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const state = {
        charts: {
            clickImpression: null,
            topQuery: null,
            device: null,
            country: null
        },
        range: '7d',
        compare: true
    };

    const compareToggle = document.getElementById('compareToggle');
    const refreshButton = document.getElementById('refreshDashboard');
    const customControls = document.getElementById('customDateControls');
    const customStartDate = document.getElementById('customStartDate');
    const customEndDate = document.getElementById('customEndDate');
    const applyCustomRangeButton = document.getElementById('applyCustomRange');

    bindRangeChips();

    if (compareToggle) {
        compareToggle.addEventListener('change', function () {
            state.compare = compareToggle.checked;
            loadDashboard();
        });
    }

    if (refreshButton) {
        refreshButton.addEventListener('click', function () {
            loadDashboard();
        });
    }

    if (applyCustomRangeButton) {
        applyCustomRangeButton.addEventListener('click', function () {
            if (state.range !== 'custom') {
                return;
            }

            loadDashboard();
        });
    }

    loadDashboard();
    setInterval(loadDashboard, 120000);

    function bindRangeChips() {
        const chips = document.querySelectorAll('.gsc-chip[data-range]');
        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                state.range = chip.getAttribute('data-range') || '28d';
                chips.forEach(function (innerChip) {
                    innerChip.classList.remove('active');
                });
                chip.classList.add('active');
                toggleCustomControls();

                if (state.range === 'custom') {
                    ensureCustomDefaults();
                }

                loadDashboard();
            });
        });

        toggleCustomControls();
        ensureCustomDefaults();
    }

    function toggleCustomControls() {
        if (!customControls) {
            return;
        }

        customControls.style.display = state.range === 'custom' ? 'flex' : 'none';
    }

    function buildQuery() {
        const params = new URLSearchParams();
        params.set('range', state.range);
        params.set('compare', state.compare ? '1' : '0');

        if (state.range === 'custom') {
            ensureCustomDefaults();
            if (customStartDate && customStartDate.value) {
                params.set('start_date', customStartDate.value);
            }
            if (customEndDate && customEndDate.value) {
                params.set('end_date', customEndDate.value);
            }
        }

        return params.toString();
    }

    function ensureCustomDefaults() {
        if (!customStartDate || !customEndDate) {
            return;
        }

        if (!customEndDate.value) {
            const today = new Date();
            customEndDate.value = toDateInput(today);
        }

        if (!customStartDate.value) {
            const start = new Date(customEndDate.value);
            start.setDate(start.getDate() - 27);
            customStartDate.value = toDateInput(start);
        }
    }

    function toDateInput(dateValue) {
        const date = new Date(dateValue);
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return date.getFullYear() + '-' + month + '-' + day;
    }

    function loadDashboard() {
        const query = buildQuery();

        fetch('/ga/dashboard?format_json=1&' + query, {
            headers: {
                'Accept': 'application/json'
            }
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Dashboard data could not be loaded.');
                }

                const contentType = response.headers.get('content-type') || '';
                if (!contentType.includes('application/json')) {
                    throw new Error('Dashboard endpoint returned HTML instead of JSON. Route cache clear required on server.');
                }

                return response.json();
            })
            .then(function (payload) {
                applyKpis(payload.kpis || {}, payload.growth || {}, payload.range || {});
                applyRange(payload.date_range || {}, payload.range || {});
                applyTopQueries(payload.top_queries || []);
                applyTopPages(payload.top_pages || []);
                renderCharts(payload);

                if (payload.ok === false) {
                    showError(payload.message || 'Search Console API returned no usable data.');
                } else {
                    showError('');
                }
            })
            .catch(function (error) {
                showError(error.message || 'Something went wrong while loading Search Console data.');
            });
    }

    function applyRange(range, rangeMeta) {
        const label = document.getElementById('rangeLabel');
        if (!label) {
            return;
        }

        if (!range.start || !range.end) {
            label.textContent = 'Range data unavailable';
            return;
        }

        let text = 'Range: ' + range.start + ' to ' + range.end;
        if (rangeMeta.compare_enabled && range.previous_start && range.previous_end) {
            text += ' | Compare: ' + range.previous_start + ' to ' + range.previous_end;
        }

        label.textContent = text;
    }

    function applyKpis(kpis, growth, rangeMeta) {
        setText('kpiClicks', number(kpis.clicks));
        setText('kpiImpressions', number(kpis.impressions));
        setText('kpiCtr', fixed(kpis.ctr) + '%');
        setText('kpiPosition', fixed(kpis.position));

        setGrowth('growthClicks', growth.clicks, false, rangeMeta.compare_enabled);
        setGrowth('growthImpressions', growth.impressions, false, rangeMeta.compare_enabled);
        setGrowth('growthCtr', growth.ctr, false, rangeMeta.compare_enabled);
        setGrowth('growthPosition', growth.position, true, rangeMeta.compare_enabled);
    }

    function setGrowth(id, value, isPosition, compareEnabled) {
        const el = document.getElementById(id);
        if (!el) {
            return;
        }

        el.classList.remove('gsc-positive', 'gsc-negative');

        if (!compareEnabled) {
            el.textContent = 'Comparison disabled';
            return;
        }

        const numeric = Number(value || 0);
        el.textContent = fixed(numeric) + '% vs previous period';

        if (numeric === 0) {
            return;
        }

        if (isPosition) {
            el.classList.add(numeric < 0 ? 'gsc-positive' : 'gsc-negative');
            return;
        }

        el.classList.add(numeric > 0 ? 'gsc-positive' : 'gsc-negative');
    }

    function applyTopQueries(items) {
        const rows = items.map(function (item) {
            return '<tr>' +
                '<td>' + escapeHtml(item.query) + '</td>' +
                '<td class="text-end fw-semibold">' + number(item.clicks) + '</td>' +
                '<td class="text-end">' + number(item.impressions) + '</td>' +
                '<td class="text-end">' + fixed(item.ctr) + '%</td>' +
                '<td class="text-end">' + fixed(item.position) + '</td>' +
                '</tr>';
        }).join('');

        setTable('topQueriesTable', rows, 5);
    }

    function applyTopPages(items) {
        const rows = items.map(function (item) {
            return '<tr>' +
                '<td class="text-break">' + escapeHtml(formatPagePath(item.page)) + '</td>' +
                '<td class="text-end fw-semibold">' + number(item.clicks) + '</td>' +
                '<td class="text-end">' + number(item.impressions) + '</td>' +
                '<td class="text-end">' + fixed(item.ctr) + '%</td>' +
                '<td class="text-end">' + fixed(item.position) + '</td>' +
                '</tr>';
        }).join('');

        setTable('topPagesTable', rows, 5);
    }

    function renderCharts(payload) {
        const series = payload.series || [];
        const topQueries = payload.top_queries || [];
        const countries = payload.countries || [];
        const devices = payload.devices || [];

        setText('seriesCount', series.length + ' points');

        drawClickImpressionChart(series);
        drawTopQueryChart(topQueries);
        drawDonut('deviceChart', 'device', devices);
        drawDonut('countryChart', 'country', countries);
    }

    function drawClickImpressionChart(series) {
        const el = document.getElementById('clickImpressionChart');
        if (!el) {
            return;
        }

        const categories = series.map(function (item) { return item.date || ''; });
        const clicks = series.map(function (item) { return Number(item.clicks || 0); });
        const impressions = series.map(function (item) { return Number(item.impressions || 0); });

        const options = {
            chart: {
                type: 'line',
                height: 320,
                toolbar: { show: false },
                background: 'transparent'
            },
            stroke: {
                width: [3, 2],
                curve: 'smooth'
            },
            series: [
                { name: 'Clicks', data: clicks },
                { name: 'Impressions', data: impressions }
            ],
            colors: ['#5eead4', '#38bdf8'],
            grid: { borderColor: 'rgba(255,255,255,0.1)' },
            xaxis: {
                categories: categories,
                labels: { style: { colors: '#d7e5f2' }, show: false }
            },
            yaxis: {
                labels: {
                    style: { colors: '#d7e5f2' },
                    formatter: function (value) { return number(value); }
                }
            },
            legend: {
                labels: { colors: '#d7e5f2' }
            },
            noData: { text: 'No trend data available' }
        };

        remountChart('clickImpression', el, options);
    }

    function drawTopQueryChart(items) {
        const el = document.getElementById('topQueryChart');
        if (!el) {
            return;
        }

        const labels = items.slice(0, 7).map(function (item) { return item.query || '(unknown)'; });
        const values = items.slice(0, 7).map(function (item) {
            const clicks = Number(item.clicks || 0);
            const impressions = Number(item.impressions || 0);
            return clicks > 0 ? clicks : impressions;
        });

        const usingImpressionsFallback = items.slice(0, 7).every(function (item) {
            return Number(item.clicks || 0) === 0;
        });

        const options = {
            chart: {
                type: 'bar',
                height: 280,
                toolbar: { show: false },
                background: 'transparent'
            },
            plotOptions: {
                bar: { borderRadius: 4, horizontal: true }
            },
            series: [{ name: usingImpressionsFallback ? 'Impressions' : 'Clicks', data: values }],
            xaxis: {
                categories: labels,
                labels: { style: { colors: '#d7e5f2' } }
            },
            yaxis: {
                labels: { style: { colors: '#d7e5f2' } }
            },
            colors: ['#5eead4'],
            grid: { borderColor: 'rgba(255,255,255,0.1)' },
            noData: { text: 'No query data available' }
        };

        remountChart('topQuery', el, options);
    }

    function drawDonut(containerId, chartKey, items) {
        const el = document.getElementById(containerId);
        if (!el) {
            return;
        }

        const labels = items.map(function (item) { return item.label || 'Unknown'; });
        const values = items.map(function (item) {
            const clicks = Number(item.clicks || 0);
            const impressions = Number(item.impressions || 0);
            return clicks > 0 ? clicks : impressions;
        });

        const options = {
            chart: {
                type: 'donut',
                height: 240,
                background: 'transparent'
            },
            labels: labels,
            series: values,
            legend: {
                position: 'bottom',
                labels: { colors: '#d7e5f2' }
            },
            dataLabels: { enabled: true },
            stroke: { colors: ['transparent'] },
            noData: { text: 'No data available' }
        };

        remountChart(chartKey, el, options);
    }

    function remountChart(chartKey, element, options) {
        if (state.charts[chartKey]) {
            state.charts[chartKey].destroy();
        }

        state.charts[chartKey] = new ApexCharts(element, options);
        state.charts[chartKey].render();
    }

    function setTable(id, htmlRows, colspan) {
        const table = document.getElementById(id);
        if (!table) {
            return;
        }

        if (htmlRows.length === 0) {
            table.innerHTML = '<tr><td colspan="' + colspan + '" class="text-center py-3">No data available</td></tr>';
            return;
        }

        table.innerHTML = htmlRows;
    }

    function showError(message) {
        const errorBox = document.getElementById('dashboardError');
        if (!errorBox) {
            return;
        }

        if (!message) {
            errorBox.classList.add('d-none');
            errorBox.textContent = '';
            return;
        }

        errorBox.classList.remove('d-none');
        errorBox.textContent = message;
    }

    function setText(id, value) {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = String(value);
        }
    }

    function number(value) {
        return Number(value || 0).toLocaleString();
    }

    function fixed(value) {
        return Number(value || 0).toFixed(2);
    }

    function formatPagePath(url) {
        if (!url) {
            return '(unknown)';
        }

        try {
            const parsed = new URL(url);
            return parsed.pathname || '/';
        } catch (error) {
            return url;
        }
    }

    function escapeHtml(text) {
        const span = document.createElement('span');
        span.textContent = text || '';
        return span.innerHTML;
    }
});
</script>
@endpush
