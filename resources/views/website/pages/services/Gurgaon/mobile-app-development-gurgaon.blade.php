@extends('website.index')

@section('title', 'Mobile App Development Company in Gurgaon | Custom App Solutions')
@section('meta_title', 'Mobile App Development Company in Gurgaon | Shiva Tech Digital')
@section('meta_description', 'Custom mobile app development in Gurgaon for startups and enterprises. Android, iOS, Flutter and React Native app development with scalable architecture.')
@section('meta_keywords', 'mobile app development gurgaon, app developers gurgaon, android app company gurgaon, ios app development gurgaon, flutter development gurgaon')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-gurgaon">
@endsection

@push('additional-meta')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-gurgaon">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "url": "https://shivatechdigital.com/services/mobile-app-development-gurgaon",
  "telephone": "+91-7007294764",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Gurgaon",
    "addressRegion": "Haryana",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 28.4595,
    "longitude": 77.0266
  },
  "areaServed": ["Gurgaon","DLF Cyber City","Manesar","Delhi NCR"]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type": "ListItem", "position": 1, "name": "Home", "item": "https://shivatechdigital.com/"},
    {"@type": "ListItem", "position": 2, "name": "Services", "item": "https://shivatechdigital.com/services"},
    {"@type": "ListItem", "position": 3, "name": "Mobile App Development", "item": "https://shivatechdigital.com/services/mobile-app-development"},
    {"@type": "ListItem", "position": 4, "name": "Mobile App Development Gurgaon", "item": "https://shivatechdigital.com/services/mobile-app-development-gurgaon"}
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type": "Question", "name": "Can you build enterprise apps for Gurgaon companies?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we build secure enterprise applications with role permissions, integrations, and scalable architecture."}},
    {"@type": "Question", "name": "What tech stack do you recommend?", "acceptedAnswer": {"@type": "Answer", "text": "We choose Kotlin or Swift for native apps and Flutter or React Native for cross-platform goals."}},
    {"@type": "Question", "name": "Do you sign NDAs?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, NDA signing is a standard step before project discovery for confidential product ideas."}},
    {"@type": "Question", "name": "Can you integrate with existing ERP or CRM?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we create API connectors and middleware for ERP, CRM, payment, and analytics systems."}}
  ]
}
</script>
@endpush

@section('schema-markup')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "description": "Gurgaon mobile app development services for Android, iOS and cross-platform products.",
  "url": "https://shivatechdigital.com/services/mobile-app-development-gurgaon",
  "telephone": "+91-7007294764",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Gurgaon",
    "addressRegion": "Haryana",
    "addressCountry": "IN"
  }
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
        <li class="breadcrumb-item active" aria-current="page">Gurgaon</li>
      </ol>
    </nav>
  </div>
</section>

<section class="service-hero-modern py-5" style="background:linear-gradient(135deg,#111827 0%,#0f766e 100%);margin-top:80px;">
  <div class="container py-4">
    <span class="badge mb-3" style="background:#14b8a6;">Gurgaon Product Teams</span>
    <h1 class="text-white" style="font-weight:800;">Mobile App Development in Gurgaon</h1>
    <p class="text-white-50" style="max-width:760px;">From DLF Cyber City startups to enterprise teams, we build production-grade mobile apps with strong UX, clean architecture, and measurable business outcomes.</p>
    <div class="d-flex gap-3 flex-wrap mt-3">
      <a href="{{ route('contact') }}" class="btn btn-info btn-lg text-white">Book Consultation</a>
      <a href="tel:+917007294764" class="btn btn-outline-light btn-lg">Talk to App Team</a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-weight:800;">Our Gurgaon App Delivery Workflow</h2>
      <p class="text-secondary">From strategy to scale, each sprint is planned for measurable product outcomes.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['title'=>'Requirement Discovery','desc'=>'Business goals, audience profiling, feature mapping, and technical feasibility checks.'],
        ['title'=>'App UX Architecture','desc'=>'Navigation, user flow, and interaction models designed for higher retention.'],
        ['title'=>'Agile Engineering','desc'=>'Sprint-based development with code reviews, CI pipeline, and weekly demos.'],
        ['title'=>'Release and Optimization','desc'=>'Store deployment, analytics setup, and performance optimization after launch.']
      ] as $step)
      <div class="col-lg-3 col-md-6">
        <div class="p-4 h-100" style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;">
          <h4 style="font-size:1rem;font-weight:700;">{{ $step['title'] }}</h4>
          <p class="mb-0 text-secondary">{{ $step['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-weight:800;">What We Build for Gurgaon Businesses</h2>
      <p class="text-secondary">High-quality app engineering for retail, logistics, fintech, healthcare, and enterprise operations.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['icon'=>'fas fa-store','title'=>'D2C & Commerce Apps','desc'=>'Smooth shopping flows, payment integrations, inventory sync, and retention tools.'],
        ['icon'=>'fas fa-route','title'=>'Logistics & Field Apps','desc'=>'Tracking, dispatch, route planning, and field force management applications.'],
        ['icon'=>'fas fa-building','title'=>'Enterprise Internal Apps','desc'=>'Workflow automation, approvals, reporting dashboards, and role-based access.'],
        ['icon'=>'fas fa-credit-card','title'=>'Fintech App Modules','desc'=>'KYC flows, wallet integrations, alerts, and secure transaction experiences.'],
        ['icon'=>'fab fa-android','title'=>'Android + iOS Delivery','desc'=>'Native and hybrid app development with robust QA and release processes.'],
        ['icon'=>'fas fa-sync','title'=>'App Modernization','desc'=>'Legacy app redesign and migration to scalable, modern frameworks.']
      ] as $item)
      <div class="col-lg-4 col-md-6">
        <div class="p-4 h-100" style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;">
          <i class="{{ $item['icon'] }}" style="font-size:1.35rem;color:#0f766e;"></i>
          <h4 class="mt-3" style="font-size:1.03rem;font-weight:700;">{{ $item['title'] }}</h4>
          <p class="mb-0 text-secondary">{{ $item['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <h2 style="font-weight:800;">Related Mobile App and Service Pages</h2>
    <p class="text-secondary mb-4">Better internal links for crawl depth and user navigation.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
      <a href="{{ route('services.mobile-app-noida') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Noida</a>
      <a href="{{ route('services.mobile-app-delhi') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Delhi</a>
      <a href="{{ route('services.mobile-app-ghaziabad') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Ghaziabad</a>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('services.web-development-gurgaon') }}" class="badge rounded-pill text-bg-light border p-2">Web Development Gurgaon</a>
      <a href="{{ route('services.ui-ux') }}" class="badge rounded-pill text-bg-light border p-2">UI/UX Design</a>
      <a href="{{ route('services.cloud') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Solutions</a>
      <a href="{{ route('services.digital-marketing') }}" class="badge rounded-pill text-bg-light border p-2">Digital Marketing</a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <h2 style="font-weight:800;">Coverage in Gurgaon</h2>
    <p class="text-secondary mb-4">We work with teams across Gurgaon business hubs.</p>
    @foreach(['DLF Cyber City','Golf Course Road','Sohna Road','Udyog Vihar','Sector 29','Sector 44','Sector 48','Sector 56','MG Road','Palam Vihar','New Gurgaon','Manesar'] as $area)
      <span class="badge rounded-pill text-bg-light border me-2 mb-2 p-2">{{ $area }}</span>
    @endforeach
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4" style="font-weight:800;">Gurgaon Mobile App FAQs</h2>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <details class="mb-3" style="border:1px solid #e2e8f0;border-radius:10px;background:#fff;">
          <summary style="padding:14px 16px;font-weight:600;cursor:pointer;">Can you build enterprise apps for Gurgaon companies?</summary>
          <div style="padding:0 16px 14px;color:#64748b;">Yes, we build secure enterprise apps with workflow automation, role permissions, and integrations.</div>
        </details>
        <details class="mb-3" style="border:1px solid #e2e8f0;border-radius:10px;background:#fff;">
          <summary style="padding:14px 16px;font-weight:600;cursor:pointer;">What tech stack do you recommend?</summary>
          <div style="padding:0 16px 14px;color:#64748b;">Depends on your use case. We use Kotlin and Swift for native apps, and Flutter or React Native for fast cross-platform delivery.</div>
        </details>
        <details class="mb-3" style="border:1px solid #e2e8f0;border-radius:10px;background:#fff;">
          <summary style="padding:14px 16px;font-weight:600;cursor:pointer;">Do you sign NDAs?</summary>
          <div style="padding:0 16px 14px;color:#64748b;">Yes, NDA signing is a standard step before project discovery for confidential product ideas.</div>
        </details>
        <details class="mb-3" style="border:1px solid #e2e8f0;border-radius:10px;background:#fff;">
          <summary style="padding:14px 16px;font-weight:600;cursor:pointer;">Can you integrate with existing ERP or CRM?</summary>
          <div style="padding:0 16px 14px;color:#64748b;">Yes, we build API connectors and middleware for smooth integration with ERP, CRM, payment, and analytics systems.</div>
        </details>
      </div>
    </div>
  </div>
</section>
@endsection
