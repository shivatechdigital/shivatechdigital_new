@extends('website.index')

@section('title', 'Web Development Company in Gurgaon | Best Website Developers | Shiva Tech Digital')
@section('meta_title', 'Web Development Company in Gurgaon (Gurugram) | Shiva Tech Digital')
@section('meta_description', 'Top web development company in Gurgaon (Gurugram). Custom websites, React, Laravel, enterprise web apps for Cyber City, Golf Course Road businesses. Affordable pricing. Free quote!')
@section('meta_keywords', 'web development company gurgaon, website development gurgaon, web developer gurgaon, web development gurugram, custom website gurgaon, laravel gurgaon, react developer gurgaon, ecommerce gurgaon, cyber city web development')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/web-development-gurgaon">
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
<style>
.city-hero { min-height: 90vh; display: flex; align-items: center; position: relative; overflow: hidden; background: linear-gradient(135deg, rgba(15,23,42,0.88) 0%, rgba(124,58,237,0.75) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1600&q=85') center/cover no-repeat; padding: 110px 0 60px; }
.city-hero::after { content: ''; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); pointer-events: none; }
.city-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(124,58,237,0.2); border: 1px solid rgba(124,58,237,0.4); border-radius: 50px; color: #c4b5fd; font-size: 0.78rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; }
.city-hero h1 { font-size: clamp(2.2rem, 5vw, 3.6rem); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 20px; }
.city-hero h1 span { background: linear-gradient(90deg, #c4b5fd, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.city-hero p.lead { color: rgba(255,255,255,0.8); font-size: 1.1rem; line-height: 1.75; margin-bottom: 32px; max-width: 560px; }
.hero-cta-group { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 48px; }
.btn-hero-primary { background: linear-gradient(135deg,#7c3aed,#6d28d9); color: #fff; padding: 14px 30px; border-radius: 12px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(124,58,237,0.4); transition: all 0.3s ease; }
.btn-hero-primary:hover { transform: translateY(-3px); color: #fff; box-shadow: 0 14px 35px rgba(124,58,237,0.5); }
.btn-hero-outline { background: transparent; color: #fff; padding: 13px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s ease; }
.btn-hero-outline:hover { background: rgba(255,255,255,0.1); color: #fff; }
.hero-stats-row { display: flex; gap: 30px; flex-wrap: wrap; }
.hero-stat .num { font-size: 2rem; font-weight: 800; color: #fff; display: block; }
.hero-stat .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.6); margin-top: 4px; display: block; text-transform: uppercase; }
.hero-main-img { border-radius: 20px; box-shadow: 0 30px 80px rgba(0,0,0,0.4); width: 100%; object-fit: cover; height: 420px; }
.hero-floating-card { position: absolute; background: rgba(255,255,255,0.95); border-radius: 14px; padding: 14px 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); display: flex; align-items: center; gap: 10px; }
.hero-floating-card.card-tl { top: -20px; left: -20px; }
.hero-floating-card.card-br { bottom: -20px; right: -20px; }
.hero-floating-card i { font-size: 1.4rem; color: #7c3aed; }
.hero-floating-card .fc-text strong { display: block; font-size: 0.85rem; font-weight: 700; color: #0f172a; }
.hero-floating-card .fc-text span { font-size: 0.75rem; color: #64748b; }
.city-service-card { background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e2e8f0; transition: all 0.3s ease; height: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
.city-service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(124,58,237,0.12); border-color: #ddd6fe; }
.city-service-card .cs-icon { width: 60px; height: 60px; background: linear-gradient(135deg,#faf5ff,#ede9fe); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #7c3aed; margin-bottom: 18px; }
.city-service-card h4 { font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; }
.city-service-card p { color: #64748b; font-size: 0.88rem; line-height: 1.65; margin: 0; }
.area-chip { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #faf5ff; border: 1px solid #ddd6fe; border-radius: 50px; color: #6d28d9; font-weight: 600; font-size: 0.82rem; margin: 5px; }
.tech-badge { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; font-weight: 600; font-size: 0.85rem; color: #374151; margin: 6px; transition: all 0.25s ease; }
.tech-badge:hover { border-color: #7c3aed; color: #7c3aed; transform: translateY(-2px); }
.city-faq-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 12px; }
.city-faq-item summary { padding: 18px 22px; font-weight: 600; font-size: 0.95rem; color: #0f172a; cursor: pointer; list-style: none; display: flex; justify-content: space-between; }
.city-faq-item summary::-webkit-details-marker { display: none; }
.city-faq-item summary::after { content: '+'; font-size: 1.4rem; color: #7c3aed; font-weight: 300; }
.city-faq-item[open] summary::after { content: '−'; }
.city-faq-item .faq-body { padding: 0 22px 18px; color: #64748b; line-height: 1.7; font-size: 0.9rem; }
.sec-label { display: inline-block; padding: 6px 16px; background: #faf5ff; border-radius: 50px; color: #6d28d9; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; }
.sec-title { font-size: clamp(1.8rem,3.5vw,2.6rem); font-weight: 800; color: #0f172a; margin-bottom: 16px; }
.sec-subtitle { color: #64748b; font-size: 1rem; line-height: 1.7; max-width: 600px; }
</style>
@endpush

@section('schema-markup')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "LocalBusiness",
    "name": "Shiva Tech Digital",
    "description": "Professional web development company serving Gurgaon (Gurugram) — custom websites, Laravel apps, React development at startup-friendly prices.",
    "url": "https://shivatechdigital.com/services/web-development-gurgaon",
    "telephone": "+91-7007294764",
    "areaServed": [{"@@type": "City", "name": "Gurgaon"}, {"@@type": "City", "name": "Gurugram"}, {"@@type": "City", "name": "Cyber City"}]
}
</script>
@endsection

@section('website.content')

<section class="city-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="city-badge"><i class="fas fa-building"></i> Gurgaon (Gurugram), Haryana</span>
                <h1>Expert <span>Web Development</span> Company in Gurgaon</h1>
                <p class="lead">Serving Gurgaon's corporate hubs with enterprise-grade web development. Custom websites, SaaS applications, and e-commerce solutions for Cyber City, Golf Course Road, and beyond.</p>
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
                <div class="hero-visual-right position-relative">
                    <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=85" alt="Web Development Company Gurgaon - Shiva Tech Digital" class="hero-main-img">
                    <div class="hero-floating-card card-tl"><i class="fas fa-city"></i><div class="fc-text"><strong>Cyber City Ready</strong><span>Enterprise Solutions</span></div></div>
                    <div class="hero-floating-card card-br"><i class="fab fa-react" style="color:#7c3aed"></i><div class="fc-text"><strong>React + Laravel</strong><span>Modern Stack</span></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="sec-label">Gurgaon Services</span>
            <h2 class="sec-title">Web Development Services for Gurgaon Businesses</h2>
            <p class="sec-subtitle mx-auto">From startups in DLF Cyber City to established enterprises on Golf Course Road — we deliver world-class web solutions.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['fas fa-laptop-code','Corporate Website Development','Professional corporate websites for Gurgaon companies. Enterprise design, fast performance, and brand-aligned aesthetics.'],
                ['fas fa-cogs','Enterprise Web Applications','Complex web apps, ERP systems, CRM tools, and SaaS platforms for Gurgaon\'s corporate sector.'],
                ['fas fa-shopping-cart','E-commerce for Gurgaon Retail','Online stores for Gurgaon retailers with UPI payment gateway, GST billing, and inventory management.'],
                ['fab fa-react','React.js & Angular Development','High-performance SPAs and PWAs for Gurgaon tech companies. Interactive dashboards and data-driven interfaces.'],
                ['fas fa-api','API Development & Integration','RESTful APIs, third-party integrations — CRM, ERP, payment gateways for Gurgaon businesses.'],
                ['fas fa-search','Local SEO for Gurgaon','Rank for Gurgaon-specific keywords. Google My Business optimization for Cyber City businesses.'],
            ] as [$icon,$title,$desc])
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <div class="city-service-card"><div class="cs-icon"><i class="{{ $icon }}"></i></div><h4>{{ $title }}</h4><p>{{ $desc }}</p></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:white;">
    <div class="container">
        <div class="row align-items-center" style="background:white;">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=85" alt="Web Development Gurgaon" class="img-fluid rounded-3" style="box-shadow:0 20px 60px rgba(0,0,0,0.1);">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="sec-label">Why Gurgaon Chooses Us</span>
                <h2 class="sec-title">Why Gurgaon Companies Work With Us?</h2>
                @foreach([['fa-rupee-sign','Cost-Effective vs. Gurgaon Agencies','50-60% more affordable than Cyber City agencies. Same quality at Noida startup prices.'],['fa-bolt','Agile Delivery','Startup speed for Gurgaon corporates. No bureaucracy, direct developer access, fast iterations.'],['fa-award','Quality Guaranteed','Clean code, OWASP security, Core Web Vitals optimized. Enterprise quality at startup prices.'],['fa-headset','24/7 Support','Round-the-clock support for Gurgaon clients. WhatsApp, Slack, or email — we respond fast.']] as [$icon,$title,$text])
                <div class="d-flex gap-3 mb-3">
                    <div style="width:42px;height:42px;background:#faf5ff;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#7c3aed;font-size:1.1rem;"><i class="fas {{ $icon }}"></i></div>
                    <div><h6 class="mb-1" style="color:#0f172a;font-weight:700;">{{ $title }}</h6><p class="mb-0 text-secondary" style="font-size:0.88rem;">{{ $text }}</p></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container text-center">
        <span class="sec-label">Gurgaon Areas</span>
        <h2 class="sec-title">We Serve All of Gurgaon</h2>
        <div class="mt-3">
            @foreach(['DLF Cyber City','Golf Course Road','MG Road','Sector 29','Sohna Road','Udyog Vihar','Manesar','Sector 44','Sector 56','DLF Phase 1-5','Palam Vihar','South City','Nirvana Country','Vatika City','Farrukh Nagar'] as $area)
            <span class="area-chip"><i class="fas fa-map-marker-alt"></i> {{ $area }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:white;">
    <div class="container text-center" style="background:white;">
        <span class="sec-label">Tech Stack</span>
        <h2 class="sec-title">Enterprise-Grade Technologies</h2>
        <div class="mt-4">
            @foreach([['fab fa-laravel','Laravel'],['fab fa-react','React.js'],['fab fa-angular','Angular'],['fab fa-vuejs','Vue.js'],['fab fa-node-js','Node.js'],['fas fa-database','PostgreSQL'],['fab fa-aws','AWS'],['fab fa-docker','Docker'],['fas fa-code-branch','Git/CI-CD'],['fab fa-python','Python'],['fab fa-js','TypeScript'],['fas fa-cloud','Microservices']] as [$icon,$name])
            <span class="tech-badge"><i class="{{ $icon }}"></i> {{ $name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container"><div class="row justify-content-center"><div class="col-lg-8">
        <div class="text-center mb-5"><span class="sec-label">FAQ</span><h2 class="sec-title">Questions from Gurgaon Clients</h2></div>
        @foreach([
            ['q'=>'Do you build enterprise-level web apps for Gurgaon companies?','a'=>'Yes! We build scalable enterprise applications using Laravel, React, Node.js. From CRM systems to ERP portals — we handle complex requirements for Gurgaon corporates.'],
            ['q'=>'What is the cost of web development in Gurgaon?','a'=>'We are 40-60% more affordable than established Gurgaon agencies. Websites from ₹8,000, web apps quoted by scope. Free consultation to get an accurate estimate.'],
            ['q'=>'Can you handle high-traffic websites for Gurgaon businesses?','a'=>'Absolutely. We build with scalability in mind — load balancers, CDN integration, database optimization, and cloud deployment on AWS/GCP for high-traffic scenarios.'],
            ['q'=>'Do you sign NDAs for Gurgaon corporate projects?','a'=>'Yes, we sign NDAs for all corporate and enterprise projects. Your code, data, and business logic are fully confidential. We take IP protection seriously.'],
        ] as $faq)
        <details class="city-faq-item" data-aos="fade-up"><summary>{{ $faq['q'] }}</summary><div class="faq-body">{{ $faq['a'] }}</div></details>
        @endforeach
    </div></div></div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#4c1d95 100%);">
    <div class="container text-center">
        <h2 class="text-white mb-3" style="font-size:2.2rem;font-weight:800;">Launch Your Gurgaon Web Project!</h2>
        <p class="text-white-50 mb-4">Enterprise-grade web development at startup-friendly prices for Gurgaon businesses.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
            <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
        </div>
    </div>
</section>

@endsection
