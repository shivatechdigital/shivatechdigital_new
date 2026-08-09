@extends('website.index')

@section('title', 'Web Development Company in Delhi | Best Website Developers | Shiva Tech Digital')
@section('meta_title', 'Web Development Company in Delhi | Shiva Tech Digital')
@section('meta_description', 'Best, affordable, and attractive web development services in Delhi. SEO-ready custom websites, ecommerce builds, UI UX, and long-term maintenance for business growth.')
@section('meta_keywords', 'best web development company delhi, affordable website development delhi, custom website development delhi, ecommerce website development delhi, responsive web design delhi, laravel development delhi, react web developer delhi, seo friendly website company delhi, business website design delhi, web application development delhi')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/web-development-delhi">
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
<style>
.city-hero { min-height: 90vh; display: flex; align-items: center; position: relative; overflow: hidden; background: linear-gradient(135deg, rgba(15,23,42,0.88) 0%, rgba(6,78,59,0.75) 100%), url('https://images.unsplash.com/photo-1555421689-d68471e189f2?w=1600&q=85') center/cover no-repeat; padding: 110px 0 60px; }
.city-hero::after { content: ''; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); pointer-events: none; }
.city-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(5,150,105,0.2); border: 1px solid rgba(5,150,105,0.4); border-radius: 50px; color: #6ee7b7; font-size: 0.78rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; }
.city-hero h1 { font-size: clamp(2.2rem, 5vw, 3.6rem); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 20px; }
.city-hero h1 span { background: linear-gradient(90deg, #34d399, #6ee7b7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.city-hero p.lead { color: rgba(255,255,255,0.8); font-size: 1.1rem; line-height: 1.75; margin-bottom: 32px; max-width: 560px; }
.hero-cta-group { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 48px; }
.btn-hero-primary { background: linear-gradient(135deg,#059669,#047857); color: #fff; padding: 14px 30px; border-radius: 12px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(5,150,105,0.4); transition: all 0.3s ease; }
.btn-hero-primary:hover { transform: translateY(-3px); color: #fff; box-shadow: 0 14px 35px rgba(5,150,105,0.5); }
.btn-hero-outline { background: transparent; color: #fff; padding: 13px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s ease; }
.btn-hero-outline:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); color: #fff; }
.hero-stats-row { display: flex; gap: 30px; flex-wrap: wrap; }
.hero-stat .num { font-size: 2rem; font-weight: 800; color: #fff; display: block; line-height: 1; }
.hero-stat .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.6); margin-top: 4px; display: block; text-transform: uppercase; letter-spacing: 0.5px; }
.hero-visual-right { position: relative; }
.hero-main-img { border-radius: 20px; box-shadow: 0 30px 80px rgba(0,0,0,0.4); width: 100%; object-fit: cover; height: 420px; }
.hero-floating-card { position: absolute; background: rgba(255,255,255,0.95); border-radius: 14px; padding: 14px 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); display: flex; align-items: center; gap: 10px; }
.hero-floating-card.card-tl { top: -20px; left: -20px; }
.hero-floating-card.card-br { bottom: -20px; right: -20px; }
.hero-floating-card i { font-size: 1.4rem; color: #059669; }
.hero-floating-card .fc-text strong { display: block; font-size: 0.85rem; font-weight: 700; color: #0f172a; }
.hero-floating-card .fc-text span { font-size: 0.75rem; color: #64748b; }
.city-service-card { background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e2e8f0; transition: all 0.3s ease; height: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
.city-service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(5,150,105,0.12); border-color: #a7f3d0; }
.city-service-card .cs-icon { width: 60px; height: 60px; background: linear-gradient(135deg,#ecfdf5,#d1fae5); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #059669; margin-bottom: 18px; }
.city-service-card h4 { font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; }
.city-service-card p { color: #64748b; font-size: 0.88rem; line-height: 1.65; margin: 0; }
.area-chip { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 50px; color: #047857; font-weight: 600; font-size: 0.82rem; margin: 5px; }
.tech-badge { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; font-weight: 600; font-size: 0.85rem; color: #374151; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin: 6px; transition: all 0.25s ease; }
.tech-badge:hover { border-color: #059669; color: #059669; transform: translateY(-2px); }
.city-faq-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
.city-faq-item summary { padding: 18px 22px; font-weight: 600; font-size: 0.95rem; color: #0f172a; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; }
.city-faq-item summary::-webkit-details-marker { display: none; }
.city-faq-item summary::after { content: '+'; font-size: 1.4rem; color: #059669; font-weight: 300; }
.city-faq-item[open] summary::after { content: '−'; }
.city-faq-item .faq-body { padding: 0 22px 18px; color: #64748b; line-height: 1.7; font-size: 0.9rem; }
.sec-label { display: inline-block; padding: 6px 16px; background: #ecfdf5; border-radius: 50px; color: #047857; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 12px; }
.sec-title { font-size: clamp(1.8rem,3.5vw,2.6rem); font-weight: 800; color: #0f172a; margin-bottom: 16px; }
.sec-subtitle { color: #64748b; font-size: 1rem; line-height: 1.7; max-width: 600px; }
</style>
@include('website.pages.services.partials.location-seo-kit', ['mode' => 'schema', 'serviceKey' => 'web', 'cityKey' => 'delhi'])
@endpush

@section('schema-markup')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "LocalBusiness",
    "name": "Shiva Tech Digital",
    "description": "Best web development company in Delhi offering custom websites, web apps, Laravel, React at affordable prices.",
    "url": "https://shivatechdigital.com/services/web-development-delhi",
    "telephone": "+91-7007294764",
    "address": { "@@type": "PostalAddress", "addressLocality": "Delhi", "addressRegion": "Delhi", "addressCountry": "IN" },
    "areaServed": [{"@@type": "City", "name": "Delhi"}, {"@@type": "City", "name": "South Delhi"}, {"@@type": "City", "name": "East Delhi"}]
}
</script>
@endsection

@section('website.content')

<section class="city-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="city-badge"><i class="fas fa-map-marker-alt"></i> Delhi, India</span>
                <h1>Top <span>Web Development</span> Company in Delhi</h1>
                <p class="lead">Build your digital presence with Delhi's most affordable web development partner. We craft custom websites, web apps, and e-commerce solutions that grow your business in India's capital.</p>
                <div class="hero-cta-group">
                    <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
                    <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
                </div>
                <div class="hero-stats-row">
                    <div class="hero-stat"><span class="num">50+</span><span class="lbl">Projects</span></div>
                    <div class="hero-stat"><span class="num">30+</span><span class="lbl">Clients</span></div>
                    <div class="hero-stat"><span class="num">4.9★</span><span class="lbl">Rating</span></div>
                    <div class="hero-stat"><span class="num">5+</span><span class="lbl">Years</span></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-visual-right">
                    <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&q=85" alt="Web Development Company Delhi - Shiva Tech Digital" class="hero-main-img">
                    <div class="hero-floating-card card-tl"><i class="fas fa-check-circle text-success"></i><div class="fc-text"><strong>Delhi's Trusted Agency</strong><span>5+ Years Experience</span></div></div>
                    <div class="hero-floating-card card-br"><i class="fab fa-react" style="color:#059669"></i><div class="fc-text"><strong>React + Laravel</strong><span>Modern Development</span></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="sec-label">Services in Delhi</span>
            <h2 class="sec-title">Web Development Services We Offer in Delhi</h2>
            <p class="sec-subtitle mx-auto">Complete web solutions for Delhi businesses — from startups in Connaught Place to enterprises in Nehru Place.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['icon'=>'fas fa-laptop-code','title'=>'Business Website Development','desc'=>'Professional corporate websites for Delhi businesses. Clean design, fast loading, SEO-optimized for Delhi market.'],
                ['icon'=>'fab fa-laravel','title'=>'Laravel Application Development','desc'=>'Custom web apps using Laravel for Delhi SMEs. Portals, CRMs, booking systems, and management dashboards.'],
                ['icon'=>'fas fa-shopping-cart','title'=>'E-commerce for Delhi Businesses','desc'=>'Online stores for Delhi retailers and traders with payment gateway, GST invoicing, and inventory management.'],
                ['icon'=>'fab fa-react','title'=>'React.js Frontend Development','desc'=>'High-performance React applications for Delhi startups and enterprises. Fast, interactive, and scalable SPAs.'],
                ['icon'=>'fas fa-search','title'=>'SEO-Ready Web Design','desc'=>'Rank higher on Google for Delhi-specific keywords. Every website includes on-page SEO and technical optimization.'],
                ['icon'=>'fas fa-mobile-alt','title'=>'Mobile-Responsive Development','desc'=>'All websites are fully responsive for Delhi users browsing on mobile phones, tablets, and desktops.'],
            ] as $s)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="city-service-card"><div class="cs-icon"><i class="{{ $s['icon'] }}"></i></div><h4>{{ $s['title'] }}</h4><p>{{ $s['desc'] }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:white;">
    <div class="container">
        <div class="row align-items-center" style="background: white;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=85" alt="Web Development Team serving Delhi - Shiva Tech Digital" class="img-fluid rounded-3" style="box-shadow:0 20px 60px rgba(0,0,0,0.1);">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="sec-label">Why Choose Us</span>
                <h2 class="sec-title">Why Delhi Businesses Choose Shiva Tech Digital?</h2>
                <div class="mt-4">
                    @foreach([
                        ['icon'=>'fa-rupee-sign','title'=>'Affordable Delhi Pricing','text'=>'30-50% cheaper than established Delhi agencies. Transparent quotations with no hidden costs.'],
                        ['icon'=>'fa-headset','title'=>'Dedicated Support','text'=>'WhatsApp, call, or email — we respond fast. Delhi clients get priority support from our team.'],
                        ['icon'=>'fa-bolt','title'=>'Quick Turnaround','text'=>'Websites delivered on time, every time. Landing pages in 3-5 days, full sites in 1-2 weeks.'],
                        ['icon'=>'fa-shield-alt','title'=>'Secure & Reliable','text'=>'SSL certificates, secure coding practices, regular backups — your Delhi business is in safe hands.'],
                    ] as $item)
                    <div class="d-flex gap-3 mb-3">
                        <div style="width:42px;height:42px;background:#ecfdf5;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#059669;font-size:1.1rem;"><i class="fas {{ $item['icon'] }}"></i></div>
                        <div><h6 class="mb-1 fw-700" style="color:#0f172a;">{{ $item['title'] }}</h6><p class="mb-0 text-secondary" style="font-size:0.88rem;">{{ $item['text'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container text-center">
        <span class="sec-label">Areas in Delhi</span>
        <h2 class="sec-title">We Serve All Areas of Delhi</h2>
        <p class="sec-subtitle mx-auto mb-4">From Connaught Place to Dwarka — serving every corner of Delhi.</p>
        @foreach(['Connaught Place','South Delhi','East Delhi','West Delhi','North Delhi','Nehru Place','Lajpat Nagar','Saket','Dwarka','Rohini','Pitampura','Karol Bagh','Chandni Chowk','Janakpuri','Vasant Kunj','Hauz Khas'] as $area)
        <span class="area-chip"><i class="fas fa-map-marker-alt"></i> {{ $area }}</span>
        @endforeach
    </div>
</section>

<section class="py-5" style="background:white;">
    <div class="container text-center" style="background:white;">
        <span class="sec-label">Tech Stack</span>
        <h2 class="sec-title">Technologies We Use</h2>
        <div class="mt-4">
            @foreach([['fab fa-laravel','Laravel'],['fab fa-react','React.js'],['fab fa-vuejs','Vue.js'],['fab fa-node-js','Node.js'],['fab fa-php','PHP'],['fas fa-database','MySQL'],['fab fa-aws','AWS'],['fab fa-js','JavaScript'],['fab fa-html5','HTML5'],['fab fa-css3-alt','CSS3'],['fab fa-wordpress','WordPress'],['fab fa-docker','Docker']] as [$icon,$name])
            <span class="tech-badge"><i class="{{ $icon }}"></i> {{ $name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container"><div class="row justify-content-center"><div class="col-lg-8">
        <div class="text-center mb-5"><span class="sec-label">FAQ</span><h2 class="sec-title">Common Questions from Delhi Clients</h2></div>
        @foreach([
            ['q'=>'How much does website development cost in Delhi?','a'=>'Basic business websites start at ₹8,000-₹15,000. E-commerce from ₹20,000. We offer Delhi-competitive pricing with no hidden charges. Free quote on consultation.'],
            ['q'=>'Do you visit Delhi clients for meetings?','a'=>'We offer video calls, WhatsApp consultations, and in-person meetings on request. For Delhi clients, we schedule virtual meetings that save your travel time.'],
            ['q'=>'Can you rank my website on Google for Delhi keywords?','a'=>'Yes! We build SEO-optimized websites and also offer SEO packages targeting Delhi-specific keywords like "web development company Delhi", your industry + Delhi, etc.'],
            ['q'=>'How long to build a website for a Delhi business?','a'=>'Simple websites: 1-2 weeks. E-commerce: 3-4 weeks. Complex web apps: 6-10 weeks. We provide detailed timelines upfront.'],
        ] as $faq)
        <details class="city-faq-item" data-aos="fade-up"><summary>{{ $faq['q'] }}</summary><div class="faq-body">{{ $faq['a'] }}</div></details>
        @endforeach
    </div></div></div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#064e3b 100%);">
    <div class="container text-center">
        <h2 class="text-white mb-3" style="font-size:2.2rem;font-weight:800;">Build Your Website in Delhi Today!</h2>
        <p class="text-white-50 mb-4">Get a free consultation from Delhi's most affordable web development company.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
            <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
        </div>
    </div>
</section>


<!-- SEO-INTENT-SECTION-START -->
<section class="py-5" style="background:linear-gradient(180deg,#fff7ed 0%,#ffffff 100%); border-top:1px solid #fed7aa; border-bottom:1px solid #ffedd5;">
  <div class="container">
    <div class="text-center mb-5">
      <span style="display:inline-block; padding:6px 14px; border-radius:999px; background:#ffedd5; color:#9a3412; font-size:.75rem; font-weight:700; letter-spacing:.4px; text-transform:uppercase;">Intent SEO Coverage</span>
    <h2 style="font-weight:800; color:#7c2d12; margin-top:12px;">Best, Affordable and SEO-Focused Web Development in Delhi</h2>
      <p class="text-secondary mx-auto" style="max-width:760px; line-height:1.75;">This page is intentionally built to cover high-intent variations like best, affordable, and attractive without creating thin duplicate pages. This improves relevance and helps search engines trust one strong location URL.</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="h-100 p-4" style="background:#ffffff; border:1px solid #fdba74; border-radius:14px; box-shadow:0 10px 24px rgba(124,45,18,.08);">
          <h3 style="font-size:1.05rem; font-weight:700; color:#7c2d12;">Best Web Development in Delhi.Blade</h3>
          <p class="mb-0 text-secondary">For users searching quality-first solutions, we highlight architecture quality, delivery process, case-driven outcomes, and long-term reliability.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="h-100 p-4" style="background:#ffffff; border:1px solid #fdba74; border-radius:14px; box-shadow:0 10px 24px rgba(124,45,18,.08);">
          <h3 style="font-size:1.05rem; font-weight:700; color:#7c2d12;">Affordable Web Development in Delhi.Blade</h3>
          <p class="mb-0 text-secondary">For budget intent, we explain transparent pricing, phase-wise execution, optimized tech stack choices, and cost-efficient maintenance options.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="h-100 p-4" style="background:#ffffff; border:1px solid #fdba74; border-radius:14px; box-shadow:0 10px 24px rgba(124,45,18,.08);">
          <h3 style="font-size:1.05rem; font-weight:700; color:#7c2d12;">Attractive and Modern Web Development in Delhi.Blade</h3>
          <p class="mb-0 text-secondary">For design-focused intent, we cover modern UI standards, conversion-focused UX patterns, responsive performance, and brand-aligned visual systems.</p>
        </div>
      </div>
    </div>

    <div class="mt-4 p-4" style="background:#fff; border:1px dashed #fb923c; border-radius:12px;">
      <p class="mb-2" style="color:#7c2d12; font-weight:700;">Why this helps SEO:</p>
      <ul class="mb-0 text-secondary" style="line-height:1.8;">
        <li>One strong location page captures multiple same-intent keyword variants.</li>
        <li>Better topical depth, lower cannibalization risk, and stronger internal linking signals.</li>
        <li>Improved ranking potential for both primary and long-tail commercial keywords.</li>
      </ul>
    </div>
  </div>
</section>
<!-- SEO-INTENT-SECTION-END -->

@include('website.pages.services.partials.location-seo-kit', ['mode' => 'content', 'serviceKey' => 'web', 'cityKey' => 'delhi'])
@endsection