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
@php
    $fallbackPlans = [
        'website' => [
            ['title' => 'Starter Website', 'price_label' => 'Rs 5,000 - Rs 10,000', 'description' => 'Landing page, responsive design, contact form.', 'features' => []],
            ['title' => 'Business Website', 'price_label' => 'Rs 10,000 - Rs 20,000', 'description' => 'CMS, blog, speed optimization and analytics setup.', 'features' => []],
            ['title' => 'Custom Platform', 'price_label' => 'Rs 20,000+', 'description' => 'Advanced custom web apps and portal solutions.', 'features' => []],
        ],
        'mobile' => [
            ['title' => 'Basic App', 'price_label' => 'Rs 30,000 - Rs 60,000', 'description' => 'Cross-platform app with core user flows.', 'features' => []],
            ['title' => 'Business App', 'price_label' => 'Rs 60,000 - Rs 150,000', 'description' => 'Payments, chat, notifications and dashboards.', 'features' => []],
            ['title' => 'Enterprise App', 'price_label' => 'Rs 150,000+', 'description' => 'Custom backend APIs and scalable architecture.', 'features' => []],
        ],
        'seo' => [
            ['title' => 'Basic SEO', 'price_label' => 'Rs 5,000 / month', 'description' => 'On-page SEO and local optimization for growth.', 'features' => []],
            ['title' => 'Growth SEO', 'price_label' => 'Rs 12,000 / month', 'description' => 'Technical SEO plus ads and content strategy.', 'features' => []],
            ['title' => 'Full Marketing', 'price_label' => 'Rs 25,000 / month', 'description' => 'SEO, paid campaigns and full-funnel analytics.', 'features' => []],
        ],
        'maintenance' => [
            ['title' => 'Basic Care', 'price_label' => 'Rs 2,000 / month', 'description' => 'Backups, updates and monthly health checks.', 'features' => []],
            ['title' => 'Pro Care', 'price_label' => 'Rs 5,000 / month', 'description' => 'Daily backup, speed optimization and support.', 'features' => []],
            ['title' => 'Premium Support', 'price_label' => 'Rs 12,000 / month', 'description' => 'Priority support for mission-critical platforms.', 'features' => []],
        ],
    ];

    $tabLabels = [
        'website' => 'Website',
        'mobile' => 'Mobile App',
        'seo' => 'SEO',
        'maintenance' => 'Maintenance',
    ];
@endphp

<section class="pricing-hero">
    <div class="container text-center text-white">
        <h1 style="font-weight:900;">Pricing Plans</h1>
        <p style="opacity:.85;max-width:680px;margin:0 auto;">Clear pricing for website, mobile app, SEO and maintenance services.</p>
    </div>
</section>

<section style="background:#f8fafc;padding:50px 0 70px;">
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
            @foreach($tabLabels as $tabKey => $tabLabel)
                <button class="price-tab-btn {{ $loop->first ? 'active' : '' }}" onclick="switchTab(this,'{{ $tabKey }}')">{{ $tabLabel }}</button>
            @endforeach
        </div>

        @foreach($tabLabels as $tabKey => $tabLabel)
            @php
                $items = ($plansByCategory[$tabKey] ?? collect())->isNotEmpty() ? $plansByCategory[$tabKey] : collect($fallbackPlans[$tabKey]);
            @endphp
            <div id="tab-{{ $tabKey }}" class="price-section {{ $loop->first ? 'active' : '' }}">
                <div class="row g-4">
                    @foreach($items as $plan)
                        <div class="col-lg-4">
                            <div class="pricing-card">
                                <h3>{{ is_array($plan) ? $plan['title'] : $plan->title }}</h3>
                                <p class="price">{{ is_array($plan) ? $plan['price_label'] : $plan->price_label }}</p>
                                <p>{{ is_array($plan) ? ($plan['description'] ?? '') : $plan->description }}</p>
                                @php
                                    $features = is_array($plan) ? ($plan['features'] ?? []) : ($plan->features ?? []);
                                @endphp
                                @if(!empty($features))
                                    <ul class="mb-0 mt-2" style="font-size:.85rem;color:#475569;line-height:1.65;">
                                        @foreach($features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

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
