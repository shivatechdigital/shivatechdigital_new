@extends('website.index')

@section('title', 'Web Development Company in Noida | Best Website Developers | Shiva Tech Digital')
@section('meta_title', 'Web Development Company in Noida | Shiva Tech Digital')
@section('meta_description', 'Top-rated web development company in Noida, Delhi NCR. We build custom websites, Laravel apps, React solutions & e-commerce stores. Affordable pricing. Get free quote!')
@section('meta_keywords', 'web development company noida, website development noida, web developer noida, custom website noida, laravel development noida, react developer noida, website design noida, affordable web development noida, web application development noida, ecommerce website noida')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/web-development-noida">
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
<style>
.city-hero {
    min-height: 90vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    background:
        linear-gradient(135deg, rgba(15,23,42,0.88) 0%, rgba(30,58,138,0.8) 100%),
        url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=85') center/cover no-repeat;
    padding: 110px 0 60px;
}
.city-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}
.city-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(37,99,235,0.2); border: 1px solid rgba(37,99,235,0.4); border-radius: 50px; color: #93c5fd; font-size: 0.78rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; }
.city-hero h1 { font-size: clamp(2.2rem, 5vw, 3.6rem); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 20px; }
.city-hero h1 span { background: linear-gradient(90deg, #60a5fa, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.city-hero p.lead { color: rgba(255,255,255,0.8); font-size: 1.1rem; line-height: 1.75; margin-bottom: 32px; max-width: 560px; }
.hero-cta-group { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 48px; }
.btn-hero-primary { background: linear-gradient(135deg,#2563eb,#1d4ed8); color: #fff; padding: 14px 30px; border-radius: 12px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(37,99,235,0.4); transition: all 0.3s ease; }
.btn-hero-primary:hover { transform: translateY(-3px); color: #fff; box-shadow: 0 14px 35px rgba(37,99,235,0.5); }
.btn-hero-outline { background: transparent; color: #fff; padding: 13px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s ease; }
.btn-hero-outline:hover { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.6); color: #fff; }
.hero-stats-row { display: flex; gap: 30px; flex-wrap: wrap; }
.hero-stat { text-align: center; }
.hero-stat .num { font-size: 2rem; font-weight: 800; color: #fff; display: block; line-height: 1; }
.hero-stat .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.6); margin-top: 4px; display: block; text-transform: uppercase; letter-spacing: 0.5px; }
.hero-visual-right { position: relative; }
.hero-main-img { border-radius: 20px; box-shadow: 0 30px 80px rgba(0,0,0,0.4); width: 100%; object-fit: cover; height: 420px; }
.hero-floating-card { position: absolute; background: rgba(255,255,255,0.95); border-radius: 14px; padding: 14px 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); display: flex; align-items: center; gap: 10px; }
.hero-floating-card.card-tl { top: -20px; left: -20px; }
.hero-floating-card.card-br { bottom: -20px; right: -20px; }
.hero-floating-card i { font-size: 1.4rem; color: #2563eb; }
.hero-floating-card .fc-text strong { display: block; font-size: 0.85rem; font-weight: 700; color: #0f172a; }
.hero-floating-card .fc-text span { font-size: 0.75rem; color: #64748b; }

/* Service cards */
.city-service-card { background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e2e8f0; transition: all 0.3s ease; height: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
.city-service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(37,99,235,0.12); border-color: #bfdbfe; }
.city-service-card .cs-icon { width: 60px; height: 60px; background: linear-gradient(135deg,#eff6ff,#dbeafe); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #2563eb; margin-bottom: 18px; }
.city-service-card h4 { font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; }
.city-service-card p { color: #64748b; font-size: 0.88rem; line-height: 1.65; margin: 0; }

/* Areas section */
.area-chip { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 50px; color: #1d4ed8; font-weight: 600; font-size: 0.82rem; margin: 5px; }
.area-chip i { color: #2563eb; }

/* Tech stack */
.tech-badge { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; font-weight: 600; font-size: 0.85rem; color: #374151; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin: 6px; transition: all 0.25s ease; }
.tech-badge:hover { border-color: #2563eb; color: #2563eb; transform: translateY(-2px); }

/* FAQ */
.city-faq-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
.city-faq-item summary { padding: 18px 22px; font-weight: 600; font-size: 0.95rem; color: #0f172a; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; }
.city-faq-item summary::-webkit-details-marker { display: none; }
.city-faq-item summary::after { content: '+'; font-size: 1.4rem; color: #2563eb; font-weight: 300; }
.city-faq-item[open] summary::after { content: '−'; }
.city-faq-item .faq-body { padding: 0 22px 18px; color: #64748b; line-height: 1.7; font-size: 0.9rem; }

/* Section labels */
.sec-label { display: inline-block; padding: 6px 16px; background: #eff6ff; border-radius: 50px; color: #1d4ed8; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 12px; }
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
    "description": "Best web development company in Noida offering custom websites, web apps, Laravel, React development at affordable prices.",
    "url": "https://shivatechdigital.com/services/web-development-noida",
    "telephone": "+91-7007294764",
    "email": "info@@shivatechdigital.com",
    "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Sector 62",
        "addressLocality": "Noida",
        "addressRegion": "Uttar Pradesh",
        "postalCode": "201309",
        "addressCountry": "IN"
    },
    "geo": { "@@type": "GeoCoordinates", "latitude": 28.6271, "longitude": 77.3779 },
    "priceRange": "$$",
    "areaServed": [
        {"@@type": "City", "name": "Noida"},
        {"@@type": "City", "name": "Greater Noida"},
        {"@@type": "City", "name": "Delhi NCR"}
    ],
    "hasOfferCatalog": {
        "@@type": "OfferCatalog",
        "name": "Web Development Services Noida",
        "itemListElement": [
            {"@@type": "Offer", "itemOffered": {"@@type": "Service", "name": "Custom Website Development Noida"}},
            {"@@type": "Offer", "itemOffered": {"@@type": "Service", "name": "Laravel Development Noida"}},
            {"@@type": "Offer", "itemOffered": {"@@type": "Service", "name": "React Development Noida"}},
            {"@@type": "Offer", "itemOffered": {"@@type": "Service", "name": "E-commerce Development Noida"}}
        ]
    }
}
</script>
@endsection

@section('website.content')

{{-- HERO --}}
<section class="city-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="city-badge"><i class="fas fa-map-marker-alt"></i> Noida, Delhi NCR</span>
                <h1>Best <span>Web Development</span> Company in Noida</h1>
                <p class="lead">Shiva Tech Digital is Noida's most trusted web development agency. We build fast, scalable & SEO-optimized websites for startups, SMEs & enterprises in Sector 62, Noida and across Delhi NCR.</p>
                <div class="hero-cta-group">
                    <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
                    <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
                </div>
                <div class="hero-stats-row">
                    <div class="hero-stat"><span class="num">50+</span><span class="lbl">Projects Delivered</span></div>
                    <div class="hero-stat"><span class="num">30+</span><span class="lbl">Happy Clients</span></div>
                    <div class="hero-stat"><span class="num">4.9★</span><span class="lbl">Google Rating</span></div>
                    <div class="hero-stat"><span class="num">5+</span><span class="lbl">Years Exp.</span></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-visual-right">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=900&q=85" alt="Web Development Team Noida - Shiva Tech Digital" class="hero-main-img">
                    <div class="hero-floating-card card-tl">
                        <i class="fas fa-check-circle text-success"></i>
                        <div class="fc-text"><strong>Project Delivered</strong><span>On Time, Every Time</span></div>
                    </div>
                    <div class="hero-floating-card card-br">
                        <i class="fab fa-laravel"></i>
                        <div class="fc-text"><strong>Laravel + React</strong><span>Modern Tech Stack</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES WE OFFER --}}
<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="sec-label">What We Build</span>
            <h2 class="sec-title">Web Development Services in Noida</h2>
            <p class="sec-subtitle mx-auto">From simple landing pages to complex enterprise platforms — we deliver quality web solutions at Noida-friendly prices.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fas fa-laptop-code"></i></div>
                    <h4>Custom Website Development</h4>
                    <p>Business websites, portfolios, corporate sites built with clean code and pixel-perfect design. Fully responsive across all devices.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fab fa-laravel"></i></div>
                    <h4>Laravel Web Application</h4>
                    <p>Robust, scalable web apps using Laravel framework. CRM systems, ERP, booking platforms, SaaS — built for performance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fab fa-react"></i></div>
                    <h4>React.js & Vue.js Development</h4>
                    <p>Fast, interactive frontend applications using React and Vue.js. Perfect for dashboards, SPAs, and data-heavy applications.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fas fa-shopping-cart"></i></div>
                    <h4>E-commerce Development</h4>
                    <p>Feature-rich online stores with payment gateway, inventory management, order tracking. Boost your Noida business online.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fas fa-search"></i></div>
                    <h4>SEO-Optimized Websites</h4>
                    <p>Every website we build is SEO-ready — fast load times, proper meta tags, schema markup, and Core Web Vitals optimization.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="city-service-card">
                    <div class="cs-icon"><i class="fas fa-tools"></i></div>
                    <h4>Website Redesign & Migration</h4>
                    <p>Transform your outdated website into a modern, high-converting digital asset. Migrate with zero data loss and minimal downtime.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- WHY CHOOSE US IN NOIDA --}}
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=85" alt="Shiva Tech Digital Office Noida - Web Development Team" class="img-fluid rounded-3" style="box-shadow:0 20px 60px rgba(0,0,0,0.1);">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="sec-label">Why Choose Us</span>
                <h2 class="sec-title">Why Noida Businesses Trust Shiva Tech Digital?</h2>
                <p class="sec-subtitle">As a Noida-based startup ourselves, we understand what local businesses need — quality, speed, and affordability.</p>
                <div class="mt-4">
                    @foreach([
                        ['icon'=>'fa-rupee-sign','title'=>'30-50% Affordable','text'=>'Transparent pricing — no hidden charges. Startup-friendly packages designed for Noida businesses.'],
                        ['icon'=>'fa-user-tie','title'=>'Direct Founder Access','text'=>'Skip the account managers. Talk directly to our founders in Sector 62, Noida for faster decisions.'],
                        ['icon'=>'fa-bolt','title'=>'Fast Delivery','text'=>'Landing pages in 3-5 days, full websites in 2-3 weeks. No corporate bureaucracy.'],
                        ['icon'=>'fa-map-marker-alt','title'=>'Local Noida Presence','text'=>'Walk-in meetings at Sector 62, Noida. We serve all of Noida — Sector 18, 63, 126, Tech Park & more.'],
                    ] as $item)
                    <div class="d-flex gap-3 mb-3">
                        <div style="width:42px;height:42px;background:#eff6ff;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#2563eb;font-size:1.1rem;"><i class="fas {{ $item['icon'] }}"></i></div>
                        <div><h6 class="mb-1 fw-700" style="color:#0f172a;">{{ $item['title'] }}</h6><p class="mb-0 text-secondary" style="font-size:0.88rem;">{{ $item['text'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- AREAS WE SERVE IN NOIDA --}}
<section class="py-5" style="background:#f8fafc;">
    <div class="container text-center">
        <span class="sec-label">Service Areas</span>
        <h2 class="sec-title">Web Development Across All of Noida</h2>
        <p class="sec-subtitle mx-auto mb-4">We serve businesses in every sector and locality of Noida and Delhi NCR.</p>
        <div class="mb-2">
            @foreach(['Sector 18 Noida','Sector 62 Noida','Sector 63 Noida','Sector 126 Noida','Sector 132 Noida','Greater Noida','Noida Extension','Noida Tech Park','Delhi NCR','Gurgaon','Ghaziabad','Faridabad','Indirapuram','Vaishali','Crossing Republik'] as $area)
            <span class="area-chip"><i class="fas fa-map-marker-alt"></i> {{ $area }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- TECH STACK --}}
<section class="py-5">
    <div class="container text-center">
        <span class="sec-label">Technologies</span>
        <h2 class="sec-title">Our Web Development Tech Stack</h2>
        <p class="sec-subtitle mx-auto mb-5">We use modern, proven technologies to build fast, secure, and scalable websites.</p>
        <div>
            @foreach([
                ['icon'=>'fab fa-laravel','name'=>'Laravel'],['icon'=>'fab fa-react','name'=>'React.js'],['icon'=>'fab fa-vuejs','name'=>'Vue.js'],
                ['icon'=>'fab fa-node-js','name'=>'Node.js'],['icon'=>'fab fa-php','name'=>'PHP'],['icon'=>'fab fa-python','name'=>'Python'],
                ['icon'=>'fab fa-js','name'=>'JavaScript'],['icon'=>'fab fa-html5','name'=>'HTML5'],['icon'=>'fab fa-css3-alt','name'=>'CSS3'],
                ['icon'=>'fas fa-database','name'=>'MySQL'],['icon'=>'fab fa-aws','name'=>'AWS'],['icon'=>'fab fa-docker','name'=>'Docker'],
            ] as $tech)
            <span class="tech-badge"><i class="{{ $tech['icon'] }}"></i> {{ $tech['name'] }}</span>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <span class="sec-label">FAQ</span>
                    <h2 class="sec-title">Frequently Asked Questions</h2>
                </div>
                @foreach([
                    ['q'=>'How much does a website cost in Noida?','a'=>'A basic business website starts at ₹8,000-₹15,000. E-commerce sites start at ₹20,000. Custom web applications are quoted based on requirements. We offer 30-50% lower prices than most Noida agencies.'],
                    ['q'=>'How long does it take to build a website?','a'=>'A landing page takes 3-5 days. A full business website takes 1-2 weeks. Complex web apps take 4-8 weeks. We always deliver on time with clear milestones.'],
                    ['q'=>'Do you provide SEO with the website?','a'=>'Yes! Every website we build is SEO-optimized — meta tags, schema markup, fast loading, mobile-friendly, and Core Web Vitals optimized. Optional ongoing SEO packages available.'],
                    ['q'=>'Can I meet your team in Noida?','a'=>'Absolutely! We are based in Sector 62, Noida. You can schedule a walk-in meeting or video call. We believe in personal relationships with our Noida clients.'],
                    ['q'=>'Do you maintain websites after launch?','a'=>'Yes, we offer affordable maintenance packages starting at ₹999/month including security updates, backups, performance monitoring, and content updates.'],
                    ['q'=>'What technologies do you use for web development in Noida?','a'=>'We primarily use Laravel (PHP), React.js, Vue.js, Node.js, MySQL/PostgreSQL. We choose the best tech stack based on your project requirements and budget.'],
                ] as $faq)
                <details class="city-faq-item" data-aos="fade-up">
                    <summary>{{ $faq['q'] }}</summary>
                    <div class="faq-body">{{ $faq['a'] }}</div>
                </details>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 100%);">
    <div class="container text-center">
        <h2 class="text-white mb-3" style="font-size:2.2rem;font-weight:800;">Ready to Build Your Website in Noida?</h2>
        <p class="text-white-50 mb-4">Get a free consultation and quote from Noida's most affordable web development company.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
            <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> Call: +91-7007294764</a>
        </div>
    </div>
</section>

@endsection
