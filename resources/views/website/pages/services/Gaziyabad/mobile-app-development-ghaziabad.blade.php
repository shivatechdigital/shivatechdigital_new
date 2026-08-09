@extends('website.index')

@section('title', 'Mobile App Development Company in Ghaziabad | Android & iOS App Development')
@section('meta_title', 'Mobile App Development Company in Ghaziabad | Shiva Tech Digital')
@section('meta_description', 'Looking for app developers in Ghaziabad? We build Android, iOS, Flutter and React Native apps with full-cycle delivery, testing, and support for local businesses.')
@section('meta_keywords', 'mobile app development ghaziabad, app development company ghaziabad, android app ghaziabad, ios app ghaziabad, flutter app ghaziabad')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-ghaziabad">
@endsection

@push('additional-meta')
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="https://shivatechdigital.com/services/mobile-app-development-ghaziabad">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Shiva Tech Digital",
  "url": "https://shivatechdigital.com/services/mobile-app-development-ghaziabad",
  "telephone": "+91-7007294764",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Ghaziabad",
    "addressRegion": "Uttar Pradesh",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 28.6692,
    "longitude": 77.4538
  },
  "areaServed": ["Ghaziabad","Indirapuram","Vaishali","Delhi NCR"]
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
    {"@type": "ListItem", "position": 4, "name": "Mobile App Development Ghaziabad", "item": "https://shivatechdigital.com/services/mobile-app-development-ghaziabad"}
  ]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type": "Question", "name": "Do you build apps for local service businesses?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we build apps for clinics, coaching centers, retailers, logistics, and service providers in Ghaziabad."}},
    {"@type": "Question", "name": "Can you integrate payment gateways?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we integrate major payment gateways with secure checkout and transaction tracking."}},
    {"@type": "Question", "name": "Will my app be scalable for future growth?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we design scalable architecture to support new features, growth, and integrations."}},
    {"@type": "Question", "name": "Do you provide AMC or support packages?", "acceptedAnswer": {"@type": "Answer", "text": "Yes, we provide support packages for updates, monitoring, bug fixes, and optimization."}}
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
  "description": "Mobile app development services in Ghaziabad for Android, iOS, and cross-platform apps.",
  "url": "https://shivatechdigital.com/services/mobile-app-development-ghaziabad",
  "telephone": "+91-7007294764",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Ghaziabad",
    "addressRegion": "Uttar Pradesh",
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
        <li class="breadcrumb-item active" aria-current="page">Ghaziabad</li>
      </ol>
    </nav>
  </div>
</section>

<section class="service-hero-modern py-5" style="background:linear-gradient(135deg,#111827 0%,#1e40af 100%);margin-top:80px;">
  <div class="container py-4">
    <span class="badge mb-3" style="background:#3b82f6;">Ghaziabad Mobile App Solutions</span>
    <h1 class="text-white" style="font-weight:800;">Mobile App Development in Ghaziabad</h1>
    <p class="text-white-50" style="max-width:760px;">We help Ghaziabad businesses launch reliable, user-friendly mobile apps for customer engagement, operations, and revenue growth. End-to-end app development from idea to scale.</p>
    <div class="d-flex gap-3 flex-wrap mt-3">
      <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Get Project Estimate</a>
      <a href="tel:+917007294764" class="btn btn-outline-light btn-lg">Call Now</a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 style="font-weight:800;">Our App Development Process in Ghaziabad</h2>
      <p class="text-secondary">Detailed planning and execution model to ship stable mobile products faster.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['title'=>'Business Discovery','desc'=>'Audience mapping, feature prioritization, and practical roadmap creation.'],
        ['title'=>'Design and Prototype','desc'=>'App screens, interaction design, and user flow validation before coding.'],
        ['title'=>'Engineering and QA','desc'=>'Agile development with code review, testing cycles, and deployment-ready builds.'],
        ['title'=>'Launch and Support','desc'=>'Store launch management, analytics setup, and continuous updates.']
      ] as $step)
      <div class="col-lg-3 col-md-6">
        <div class="p-4 h-100" style="border:1px solid #e2e8f0;border-radius:14px;background:#fff;">
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
      <h2 style="font-weight:800;">Our Ghaziabad App Development Services</h2>
      <p class="text-secondary">Custom app development tailored for local business growth and operational efficiency.</p>
    </div>
    <div class="row g-4">
      @foreach([
        ['icon'=>'fas fa-shopping-cart','title'=>'Retail & Commerce Apps','desc'=>'Apps for product catalogs, ordering, payment, offers, and customer loyalty.'],
        ['icon'=>'fas fa-user-cog','title'=>'Business Process Apps','desc'=>'Internal apps for attendance, approvals, task management, and service workflows.'],
        ['icon'=>'fab fa-android','title'=>'Android App Engineering','desc'=>'Scalable Android apps optimized for performance and device compatibility.'],
        ['icon'=>'fab fa-apple','title'=>'iOS Development','desc'=>'High-quality iOS app development with secure architecture and smooth UX.'],
        ['icon'=>'fas fa-mobile-alt','title'=>'Flutter/React Native','desc'=>'Cross-platform delivery for faster launch and reduced maintenance overhead.'],
        ['icon'=>'fas fa-wrench','title'=>'Support & Lifecycle','desc'=>'Testing, release support, analytics setup, and long-term maintenance plans.']
      ] as $service)
      <div class="col-lg-4 col-md-6">
        <div class="p-4 h-100" style="border:1px solid #e2e8f0;border-radius:14px;background:#fff;">
          <i class="{{ $service['icon'] }}" style="font-size:1.4rem;color:#1d4ed8;"></i>
          <h4 class="mt-3" style="font-size:1.03rem;font-weight:700;">{{ $service['title'] }}</h4>
          <p class="mb-0 text-secondary">{{ $service['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <h2 style="font-weight:800;">Related App Development Pages</h2>
    <p class="text-secondary mb-4">Internal links to improve user exploration and indexation pathways.</p>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
      <a href="{{ route('services.mobile-app-noida') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Noida</a>
      <a href="{{ route('services.mobile-app-delhi') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Delhi</a>
      <a href="{{ route('services.mobile-app-gurgaon') }}" class="badge rounded-pill text-bg-light border p-2">Mobile App Development Gurgaon</a>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2">
      <a href="{{ route('services.web-development-ghaziabad') }}" class="badge rounded-pill text-bg-light border p-2">Web Development Ghaziabad</a>
      <a href="{{ route('services.ui-ux') }}" class="badge rounded-pill text-bg-light border p-2">UI/UX Design</a>
      <a href="{{ route('services.cloud') }}" class="badge rounded-pill text-bg-light border p-2">Cloud Solutions</a>
      <a href="{{ route('services.digital-marketing') }}" class="badge rounded-pill text-bg-light border p-2">Digital Marketing</a>
    </div>
  </div>
</section>

<section class="py-5" style="background:#f8fafc;">
  <div class="container text-center">
    <h2 style="font-weight:800;">Areas We Serve in Ghaziabad</h2>
    <p class="text-secondary mb-4">Supporting startups and established businesses across major Ghaziabad zones.</p>
    @foreach(['Indirapuram','Vaishali','Kaushambi','Raj Nagar Extension','Crossing Republik','Sahibabad','Vasundhara','Wave City','Mohan Nagar','Loni','Kavi Nagar','Nehru Nagar'] as $area)
      <span class="badge rounded-pill text-bg-light border me-2 mb-2 p-2">{{ $area }}</span>
    @endforeach
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4" style="font-weight:800;">Ghaziabad App Development FAQs</h2>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        @foreach([
          ['q'=>'Do you build apps for local service businesses?','a'=>'Yes, we build apps for clinics, coaching centers, retailers, logistics, and service providers in Ghaziabad.'],
          ['q'=>'Can you integrate payment gateways?','a'=>'Yes, we integrate major payment gateways and secure checkout systems in mobile apps.'],
          ['q'=>'Will my app be scalable for future growth?','a'=>'Yes, we design app architecture to support traffic growth, feature expansion, and integrations.'],
          ['q'=>'Do you provide AMC or support packages?','a'=>'Yes, we offer monthly and quarterly support packages for updates, issue resolution, and monitoring.']
        ] as $faq)
        <details class="mb-3" style="border:1px solid #e2e8f0;border-radius:10px;background:#fff;">
          <summary style="padding:14px 16px;font-weight:600;cursor:pointer;">{{ $faq['q'] }}</summary>
          <div style="padding:0 16px 14px;color:#64748b;">{{ $faq['a'] }}</div>
        </details>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
