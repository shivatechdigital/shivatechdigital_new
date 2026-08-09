@extends('website.index')

@section('title', 'Mobile App Development Company in Noida | Android & iOS App Developers')
@section('meta_title', 'Mobile App Development Company in Noida | Shiva Tech Digital')
@section('meta_description', 'Top mobile app development company in Noida for Android, iOS, Flutter and React Native apps. Build scalable business apps with local support in Noida and NCR.')
@section('meta_keywords', 'mobile app development noida, app developer noida, android app development noida, ios app development noida, flutter app development noida, react native noida')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-noida">
@endsection

@push('additional-meta')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-noida">
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "url": "https://shivatechdigital.com/services/mobile-app-development-noida",
  "telephone": "+91-7007294764",
  "email": "info@shivatechdigital.com",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Sector 62",
    "addressLocality": "Noida",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "201301",
    "addressCountry": "IN"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": 28.6139,
    "longitude": 77.3910
  },
  "areaServed": ["Noida","Greater Noida","Delhi NCR"],
  "priceRange": "$$"
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type": "ListItem", "position": 1, "name": "Home", "item": "https://shivatechdigital.com/"},
    {"@@type": "ListItem", "position": 2, "name": "Services", "item": "https://shivatechdigital.com/services"},
    {"@@type": "ListItem", "position": 3, "name": "Mobile App Development", "item": "https://shivatechdigital.com/services/mobile-app-development"},
    {"@@type": "ListItem", "position": 4, "name": "Mobile App Development Noida", "item": "https://shivatechdigital.com/services/mobile-app-development-noida"}
  ]
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {"@@type": "Question", "name": "How much does app development cost in Noida?", "acceptedAnswer": {"@@type": "Answer", "text": "Simple apps usually start around INR 80,000 to 2,50,000. Final cost depends on features, platforms, integrations, and timeline."}},
    {"@@type": "Question", "name": "Do you build both Android and iOS apps?", "acceptedAnswer": {"@@type": "Answer", "text": "Yes. We build native Android, native iOS, and cross-platform Flutter or React Native apps."}},
    {"@@type": "Question", "name": "Can you help with app launch?", "acceptedAnswer": {"@@type": "Answer", "text": "Yes, we handle Play Store and App Store submissions including compliance checks and release planning."}},
    {"@@type": "Question", "name": "Do you provide support after delivery?", "acceptedAnswer": {"@@type": "Answer", "text": "Yes, we offer maintenance retainers for bug fixes, updates, optimization, and feature enhancements."}}
  ]
}
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
<style>
.city-hero { min-height: 86vh; display:flex; align-items:center; position:relative; overflow:hidden; background: linear-gradient(135deg, rgba(15,23,42,0.9) 0%, rgba(29,78,216,0.78) 100%), url('https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1600&q=85') center/cover no-repeat; padding: 110px 0 70px; }
.city-badge { display:inline-flex; align-items:center; gap:8px; padding:8px 18px; border-radius:999px; background:rgba(59,130,246,0.2); color:#bfdbfe; border:1px solid rgba(147,197,253,0.35); font-size:.76rem; font-weight:700; text-transform:uppercase; letter-spacing:.6px; margin-bottom:18px; }
.city-hero h1 { color:#fff; font-size:clamp(2rem,4.8vw,3.4rem); font-weight:800; line-height:1.15; margin-bottom:16px; }
.city-hero h1 span { background:linear-gradient(90deg,#60a5fa,#22d3ee); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
.city-hero .lead { color:rgba(255,255,255,.85); line-height:1.7; max-width:580px; }
.hero-cta { display:flex; flex-wrap:wrap; gap:12px; margin-top:26px; }
.btn-primary-city { display:inline-flex; align-items:center; gap:8px; padding:13px 24px; border-radius:11px; background:linear-gradient(135deg,#2563eb,#1d4ed8); color:#fff; text-decoration:none; font-weight:700; }
.btn-primary-city:hover { color:#fff; transform:translateY(-2px); }
.btn-outline-city { display:inline-flex; align-items:center; gap:8px; padding:12px 22px; border-radius:11px; border:1px solid rgba(255,255,255,.4); color:#fff; text-decoration:none; }
.sec-label { display:inline-block; padding:6px 15px; border-radius:999px; background:#eff6ff; color:#1d4ed8; font-size:.76rem; font-weight:700; text-transform:uppercase; letter-spacing:.5px; margin-bottom:10px; }
.sec-title { font-size:clamp(1.7rem,3.8vw,2.5rem); font-weight:800; color:#0f172a; margin-bottom:12px; }
.sec-subtitle { color:#64748b; line-height:1.7; max-width:680px; }
.service-card { background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:26px; height:100%; box-shadow:0 4px 18px rgba(2,6,23,.05); }
.service-card h4 { font-size:1.02rem; font-weight:700; color:#0f172a; margin:12px 0 8px; }
.service-card p { color:#64748b; font-size:.9rem; margin:0; }
.icon-wrap { width:54px; height:54px; border-radius:12px; background:#dbeafe; color:#1d4ed8; display:flex; align-items:center; justify-content:center; font-size:1.35rem; }
.area-chip { display:inline-flex; align-items:center; gap:6px; margin:5px; padding:8px 14px; border-radius:999px; border:1px solid #bfdbfe; background:#eff6ff; color:#1d4ed8; font-size:.82rem; font-weight:600; }
.faq-item { background:#fff; border:1px solid #e2e8f0; border-radius:11px; margin-bottom:12px; overflow:hidden; }
.faq-item summary { cursor:pointer; padding:16px 20px; font-weight:600; color:#0f172a; list-style:none; }
.faq-item summary::-webkit-details-marker { display:none; }
.faq-item .ans { padding:0 20px 16px; color:#64748b; line-height:1.7; }
</style>
@endpush

@section('schema-markup')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "description": "Mobile app development company in Noida for Android, iOS and cross-platform apps.",
  "url": "https://shivatechdigital.com/services/mobile-app-development-noida",
  "telephone": "+91-7007294764",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Noida",
    "addressRegion": "Uttar Pradesh",
    "addressCountry": "IN"
  },
  "areaServed": [
    {"@@type": "City", "name": "Noida"},
    {"@@type": "City", "name": "Greater Noida"},
    {"@@type": "City", "name": "Delhi NCR"}
  ]
}
</script>
@endsection

@section('website.content')
<section class="py-2" style="background:#f8fafc;">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0" style="font-size:.88rem;">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('services') }}">Services</a></li>
        <li class="breadcrumb-item"><a href="{{ route('services.mobile-app') }}">Mobile App Development</a></li>
        <li class="breadcrumb-item active" aria-current="page">Noida</li>
      </ol>
    </nav>
  </div>
</section>

<section class="city-hero">
  <div class="container position-relative" style="z-index:1;">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <span class="city-badge"><i class="fas fa-map-marker-alt"></i> Noida, Uttar Pradesh</span>
        <h1><span>Mobile App Development</span> Company in Noida</h1>
        <p class="lead">We build high-performance Android, iOS, Flutter and React Native apps for startups and enterprises in Noida. From idea validation to Play Store and App Store launch, our team handles end-to-end delivery.</p>
        <div class="hero-cta">
          <a href="{{ route('contact') }}" class="btn-primary-city"><i class="fas fa-rocket"></i> Get Free App Consultation</a>
          <a href="tel:+917007294764" class="btn-outline-city"><i class="fas fa-phone"></i> +91-7007294764</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:#ffffff;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label">Our Process</span>
      <h2 class="sec-title">How We Build Mobile Apps for Noida Businesses</h2>
      <p class="sec-subtitle mx-auto">Structured delivery model designed to reduce risk, speed up launch, and improve product quality.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['title'=>'Discovery & Product Strategy','desc'=>'Requirement workshops, competitor analysis, feature priority matrix, and release planning for your Noida market goals.'],
        ['title'=>'UI/UX & Prototype','desc'=>'Wireframes, clickable prototype, and conversion-oriented mobile journeys before development begins.'],
        ['title'=>'Agile App Development','desc'=>'Sprint-based coding with weekly demos, transparent progress, and quality-first engineering practices.'],
        ['title'=>'QA, Launch & Growth','desc'=>'End-to-end testing, store submission, analytics setup, and post-launch optimization support.']
      ] as $step)
      <div class="col-lg-3 col-md-6">
        <div class="service-card">
          <h4>{{ $step['title'] }}</h4>
          <p>{{ $step['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label">What We Offer</span>
      <h2 class="sec-title">App Development Services in Noida</h2>
      <p class="sec-subtitle mx-auto">Location-focused app strategy, modern engineering, and business-ready delivery for Noida companies.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['icon'=>'fab fa-android','title'=>'Android App Development','desc'=>'Native Android apps with Kotlin/Java for speed, reliability, and long-term scalability.'],
        ['icon'=>'fab fa-apple','title'=>'iOS App Development','desc'=>'Premium iPhone apps with modern UI, secure architecture, and smooth App Store publishing.'],
        ['icon'=>'fas fa-mobile-alt','title'=>'Flutter & React Native','desc'=>'Cross-platform apps with single codebase and near-native performance for faster go-to-market.'],
        ['icon'=>'fas fa-palette','title'=>'UI/UX for Mobile','desc'=>'User journeys, wireframes, prototypes, and conversion-focused app interfaces.'],
        ['icon'=>'fas fa-cloud','title'=>'Backend & API Development','desc'=>'Secure backend, admin dashboards, APIs, notifications, and analytics integration.'],
        ['icon'=>'fas fa-tools','title'=>'Maintenance & Upgrades','desc'=>'App monitoring, bug fixes, version upgrades, and continuous improvements post launch.']
      ] as $card)
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="icon-wrap"><i class="{{ $card['icon'] }}"></i></div>
          <h4>{{ $card['title'] }}</h4>
          <p>{{ $card['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:#fff;">
  <div class="container">
    <div class="text-center mb-4">
      <span class="sec-label">Related Pages</span>
      <h2 class="sec-title">Explore More App Development Locations</h2>
      <p class="sec-subtitle mx-auto">Strong internal linking for users and search crawlers across related service pages.</p>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
      <a href="{{ route('services.mobile-app-delhi') }}" class="area-chip"><i class="fas fa-location-arrow"></i> Mobile App Development Delhi</a>
      <a href="{{ route('services.mobile-app-gurgaon') }}" class="area-chip"><i class="fas fa-location-arrow"></i> Mobile App Development Gurgaon</a>
      <a href="{{ route('services.mobile-app-ghaziabad') }}" class="area-chip"><i class="fas fa-location-arrow"></i> Mobile App Development Ghaziabad</a>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('services.web-development-noida') }}" class="area-chip"><i class="fas fa-link"></i> Web Development Noida</a>
      <a href="{{ route('services.ui-ux') }}" class="area-chip"><i class="fas fa-link"></i> UI/UX Design</a>
      <a href="{{ route('services.cloud') }}" class="area-chip"><i class="fas fa-link"></i> Cloud Solutions</a>
      <a href="{{ route('services.digital-marketing') }}" class="area-chip"><i class="fas fa-link"></i> Digital Marketing</a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#fff;">
  <div class="container text-center">
    <span class="sec-label">Service Areas</span>
    <h2 class="sec-title">Areas We Cover in Noida</h2>
    <p class="sec-subtitle mx-auto mb-4">Serving product teams, founders, and businesses across Noida and nearby hubs.</p>
    @foreach(['Sector 18','Sector 62','Sector 63','Sector 75','Sector 126','Sector 132','Noida Extension','Greater Noida','Knowledge Park','Indirapuram','Vaishali','Delhi NCR'] as $area)
    <span class="area-chip"><i class="fas fa-map-pin"></i> {{ $area }}</span>
    @endforeach
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="text-center mb-4">
          <span class="sec-label">FAQs</span>
          <h2 class="sec-title">Noida App Development Questions</h2>
        </div>
        <details class="faq-item">
          <summary>How much does app development cost in Noida?</summary>
          <div class="ans">Simple apps usually start around INR 80,000 to 2,50,000. Final cost depends on features, platforms, integrations, and timeline.</div>
        </details>
        <details class="faq-item">
          <summary>Do you build both Android and iOS apps?</summary>
          <div class="ans">Yes. We provide native Android, native iOS, and cross-platform Flutter or React Native solutions based on business goals.</div>
        </details>
        <details class="faq-item">
          <summary>Can you help with app launch?</summary>
          <div class="ans">Yes, we handle Play Store and App Store submission, compliance checks, release notes, and launch assets.</div>
        </details>
        <details class="faq-item">
          <summary>Do you provide support after delivery?</summary>
          <div class="ans">Yes, we offer maintenance retainers including bug fixes, updates, performance optimization, and feature rollouts.</div>
        </details>
      </div>
    </div>
  </div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#1d4ed8 100%);">
  <div class="container text-center">
    <h2 class="text-white mb-3" style="font-weight:800;">Need a Mobile App in Noida?</h2>
    <p class="text-white-50 mb-4">Discuss your app idea with our team and get a practical roadmap with budget and timeline.</p>
    <a href="{{ route('contact') }}" class="btn-primary-city"><i class="fas fa-paper-plane"></i> Start Your Project</a>
  </div>
</section>
@endsection
