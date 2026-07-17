@extends('adminDashboard.index')
@section('adminDashboard.content')

<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Dashboard</h6>
    <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium"><a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon> Dashboard</a>
        </li>
        <li>-</li><li class="fw-medium">AI</li>
    </ul>
</div>

{{-- ============ 🔥 GOOGLE ANALYTICS LIVE CARDS ============= --}}
<div class="row row-cols-xxxl-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 gy-4">

    <div class="col">
        <div class="card shadow-none border bg-warning-subtle h-100 p-3">
            <p class="fw-bold text-dark mb-1">Real-Time Users</p>
            <h2 id="realtimeUsers" class="fw-bold text-warning">0</h2>
        </div>
    </div>

    <div class="col">
        <div class="card shadow-none border bg-info-subtle h-100 p-3">
            <p class="fw-bold mb-1">Visitors (Last 30 Days)</p>
            <h2 id="totalUsers" class="fw-bold">...</h2>
        </div>
    </div>

    <div class="col">
        <div class="card border shadow-none bg-success-subtle p-3 h-100">
            <p class="fw-bold mb-1">Device Category</p>
            <div id="deviceChart" style="height:150px;"></div>
        </div>
    </div>

    <div class="col">
        <div class="card shadow-none border bg-purple-subtle p-3 h-100">
            <p class="fw-bold mb-1">Traffic Source</p>
            <div id="sourceChart" style="height:150px;"></div>
        </div>
    </div>

</div>


{{-- =========== 📊 ADVANCED ANALYTICS BLOCK ============ --}}
<div class="row gy-4 mt-3">

    <div class="col-xl-4">
        <div class="card shadow-none border h-100 p-3">
            <h6 class="mb-2 fw-bold">Top Pages</h6>
            <ul id="topPages" class="list-group small"></ul>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card shadow-none border h-100 p-3">
            <h6 class="mb-2 fw-bold">Top Countries</h6>
            <ul id="countryList" class="list-group small"></ul>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card shadow-none border h-100 p-3">
            <h6 class="mb-2 fw-bold">Monthly Visitors</h6>
            <div id="monthChart" style="height:220px;"></div>
        </div>
    </div>

</div>

@endsection


{{-- ===========  🚀 JAVASCRIPT DATA FETCHING  ============= --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    loadAnalytics();
    setInterval(loadAnalytics, 10000);
});

function loadAnalytics() {
    // Real-time users
    fetch("/ga/realtime")
        .then(r => r.json())
        .then(d => {
            const el = document.getElementById("realtimeUsers");
            if(el) el.innerHTML = d.activeUsers || 0;
        })
        .catch(err => console.error('Realtime error:', err));

    // Total users last 30 days
    fetch("/ga/users")
        .then(r => r.json())
        .then(d => {
            const el = document.getElementById("totalUsers");
            if(el) el.innerHTML = d.users_30_days || '...';
        })
        .catch(err => console.error('Users error:', err));

    // Top Pages
    fetch("/ga/pages")
        .then(r => r.json())
        .then(data => {
            const el = document.getElementById("topPages");
            if(el && data && data.length > 0) {
                let h = ""; 
                data.forEach(p => h += `<li class='list-group-item d-flex justify-content-between'>${p.label}<b>${p.value}</b></li>`);
                el.innerHTML = h;
            }
        })
        .catch(err => console.error('Pages error:', err));

    // Top Countries
    fetch("/ga/country")
        .then(r => r.json())
        .then(data => {
            const el = document.getElementById("countryList");
            if(el && data && data.length > 0) {
                let h = ""; 
                data.forEach(c => h += `<li class='list-group-item d-flex justify-content-between'>${c.label}<b>${c.value}</b></li>`);
                el.innerHTML = h;
            }
        })
        .catch(err => console.error('Country error:', err));

    // Device Chart
    fetch("/ga/device")
        .then(r => r.json())
        .then(result => {
            const el = document.getElementById("deviceChart");
            if(el && result && result.length > 0) {
                const labels = result.map(i => i.label);
                const values = result.map(i => parseInt(i.value));
                
                // Clear existing chart if any
                el.innerHTML = '';
                
                const options = {
                    chart: { 
                        type: 'donut',
                        height: 150
                    },
                    series: values,
                    labels: labels,
                    legend: {
                        show: false
                    }
                };
                new ApexCharts(el, options).render();
            }
        })
        .catch(err => console.error('Device error:', err));

    // Source Chart
    fetch("/ga/source")
        .then(r => r.json())
        .then(result => {
            const el = document.getElementById("sourceChart");
            if(el && result && result.length > 0) {
                const labels = result.map(i => i.label);
                const values = result.map(i => parseInt(i.value));
                
                // Clear existing chart if any
                el.innerHTML = '';
                
                const options = {
                    chart: { 
                        type: 'pie',
                        height: 150
                    },
                    series: values,
                    labels: labels,
                    legend: {
                        show: false
                    }
                };
                new ApexCharts(el, options).render();
            }
        })
        .catch(err => console.error('Source error:', err));

    // Monthly Chart
    fetch("/ga/monthly")
        .then(r => r.json())
        .then(result => {
            const el = document.getElementById("monthChart");
            if(el && result && result.length > 0) {
                const months = result.map(i => i.label);
                const counts = result.map(i => parseInt(i.value));
                
                // Clear existing chart if any
                el.innerHTML = '';
                
                const options = {
                    chart: { 
                        type: 'line',
                        height: 220
                    },
                    series: [{
                        name: "Visitors",
                        data: counts
                    }],
                    xaxis: {
                        categories: months
                    },
                    stroke: {
                        curve: 'smooth'
                    }
                };
                new ApexCharts(el, options).render();
            }
        })
        .catch(err => console.error('Monthly error:', err));
}
</script>
@endpush