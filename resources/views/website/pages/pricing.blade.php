@extends('website.index')
@section('seo_slug', 'pricing')

@push('additional-meta')
<link rel="canonical" href="https://shivatechdigital.com/pricing">
<meta property="og:type" content="website">
<meta property="og:url" content="https://shivatechdigital.com/pricing">
<meta property="og:title" content="Affordable Pricing | Shiva Tech Digital">
<meta property="og:description" content="Transparent and startup-friendly pricing for web, app and marketing services.">
@endpush

@push('styles')
<style>
.pricing-hero { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); padding: 110px 0 60px; }
.price-tab-btn { border: 1px solid #cbd5e1; background: #fff; border-radius: 10px; padding: 8px 16px; font-size: .85rem; font-weight: 600; color: #334155; }
.price-tab-btn.active { background: #2563eb; border-color: #2563eb; color: #fff; }
.price-section { display: none; }
.price-section.active { display: block; }
.pricing-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; height: 100%; }
.pricing-card h3 { font-size: 1.05rem; font-weight: 800; color: #0f172a; }
.pricing-card .price { font-size: 1.8rem; font-weight: 900; color: #0f172a; }
</style>
@endpush

@section('website.content')
<section class="pricing-hero">
    <div class="container text-center text-white">
        <h1 style="font-weight:900;">Pricing Plans</h1>
        <p style="opacity:.85;max-width:680px;margin:0 auto;">Clear pricing for website, mobile app, SEO and maintenance services.</p>
    </div>
</section>

<section style="background:#f8fafc;padding:50px 0 70px;">
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
            <button class="price-tab-btn active" onclick="switchTab(this,'website')">Website</button>
            <button class="price-tab-btn" onclick="switchTab(this,'mobile')">Mobile App</button>
            <button class="price-tab-btn" onclick="switchTab(this,'seo')">SEO</button>
            <button class="price-tab-btn" onclick="switchTab(this,'maintenance')">Maintenance</button>
        </div>

        <div id="tab-website" class="price-section active">
            <div class="row g-4">
                <div class="col-lg-4"><div class="pricing-card"><h3>Starter Website</h3><p class="price">Rs 5,000 - Rs 10,000</p><p>Landing page, responsive design, contact form.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Business Website</h3><p class="price">Rs 10,000 - Rs 20,000</p><p>CMS, blog, speed optimization and analytics setup.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Custom Platform</h3><p class="price">Rs 20,000+</p><p>Advanced custom web apps and portal solutions.</p></div></div>
            </div>
        </div>

        <div id="tab-mobile" class="price-section">
            <div class="row g-4">
                <div class="col-lg-4"><div class="pricing-card"><h3>Basic App</h3><p class="price">Rs 30,000 - Rs 60,000</p><p>Cross-platform app with core user flows.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Business App</h3><p class="price">Rs 60,000 - Rs 150,000</p><p>Payments, chat, notifications and dashboards.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Enterprise App</h3><p class="price">Rs 150,000+</p><p>Custom backend APIs and scalable architecture.</p></div></div>
            </div>
        </div>

        <div id="tab-seo" class="price-section">
            <div class="row g-4">
                <div class="col-lg-4"><div class="pricing-card"><h3>Basic SEO</h3><p class="price">Rs 5,000 / month</p><p>On-page SEO and local optimization for growth.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Growth SEO</h3><p class="price">Rs 12,000 / month</p><p>Technical SEO plus ads and content strategy.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Full Marketing</h3><p class="price">Rs 25,000 / month</p><p>SEO, paid campaigns and full-funnel analytics.</p></div></div>
            </div>
        </div>

        <div id="tab-maintenance" class="price-section">
            <div class="row g-4">
                <div class="col-lg-4"><div class="pricing-card"><h3>Basic Care</h3><p class="price">Rs 2,000 / month</p><p>Backups, updates and monthly health checks.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Pro Care</h3><p class="price">Rs 5,000 / month</p><p>Daily backup, speed optimization and support.</p></div></div>
                <div class="col-lg-4"><div class="pricing-card"><h3>Premium Support</h3><p class="price">Rs 12,000 / month</p><p>Priority support for mission-critical platforms.</p></div></div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('quote-calculator') }}" class="btn btn-primary me-2">Open Quote Calculator</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-primary">Get Custom Quote</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function switchTab(btn, tab) {
    document.querySelectorAll('.price-tab-btn').forEach(function (b) { b.classList.remove('active'); });
    document.querySelectorAll('.price-section').forEach(function (s) { s.classList.remove('active'); });
    btn.classList.add('active');
    var target = document.getElementById('tab-' + tab);
    if (target) {
        target.classList.add('active');
    }
}
</script>
@endpush
