@extends('website.index')

@section('title', 'Web Development Company in Ghaziabad | Best Website Developers | Shiva Tech Digital')
@section('meta_title', 'Web Development Company in Ghaziabad | Shiva Tech Digital')
@section('meta_description', 'Affordable web development company in Ghaziabad. Custom websites, e-commerce, Laravel & React for Indirapuram, Vaishali, Raj Nagar businesses. Fast delivery. Get free quote today!')
@section('meta_keywords', 'web development company ghaziabad, website development ghaziabad, web developer ghaziabad, custom website ghaziabad, ecommerce ghaziabad, laravel ghaziabad, indirapuram web development, vaishali web developer, affordable website ghaziabad')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/services/web-development-ghaziabad">
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
<style>
.city-hero { min-height: 90vh; display: flex; align-items: center; position: relative; overflow: hidden; background: linear-gradient(135deg, rgba(15,23,42,0.88) 0%, rgba(194,65,12,0.75) 100%), url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=85') center/cover no-repeat; padding: 110px 0 60px; }
.city-hero::after { content: ''; position: absolute; inset: 0; background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); pointer-events: none; }
.city-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(234,88,12,0.2); border: 1px solid rgba(234,88,12,0.4); border-radius: 50px; color: #fdba74; font-size: 0.78rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 20px; }
.city-hero h1 { font-size: clamp(2.2rem, 5vw, 3.6rem); font-weight: 800; color: #fff; line-height: 1.15; margin-bottom: 20px; }
.city-hero h1 span { background: linear-gradient(90deg, #fb923c, #fbbf24); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.city-hero p.lead { color: rgba(255,255,255,0.8); font-size: 1.1rem; line-height: 1.75; margin-bottom: 32px; max-width: 560px; }
.hero-cta-group { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 48px; }
.btn-hero-primary { background: linear-gradient(135deg,#ea580c,#c2410c); color: #fff; padding: 14px 30px; border-radius: 12px; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(234,88,12,0.4); transition: all 0.3s ease; }
.btn-hero-primary:hover { transform: translateY(-3px); color: #fff; box-shadow: 0 14px 35px rgba(234,88,12,0.5); }
.btn-hero-outline { background: transparent; color: #fff; padding: 13px 28px; border-radius: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; border: 2px solid rgba(255,255,255,0.3); transition: all 0.3s ease; }
.btn-hero-outline:hover { background: rgba(255,255,255,0.1); color: #fff; }
.hero-stats-row { display: flex; gap: 30px; flex-wrap: wrap; }
.hero-stat .num { font-size: 2rem; font-weight: 800; color: #fff; display: block; }
.hero-stat .lbl { font-size: 0.75rem; color: rgba(255,255,255,0.6); margin-top: 4px; display: block; text-transform: uppercase; }
.hero-main-img { border-radius: 20px; box-shadow: 0 30px 80px rgba(0,0,0,0.4); width: 100%; object-fit: cover; height: 420px; }
.hero-floating-card { position: absolute; background: rgba(255,255,255,0.95); border-radius: 14px; padding: 14px 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); display: flex; align-items: center; gap: 10px; }
.hero-floating-card.card-tl { top: -20px; left: -20px; }
.hero-floating-card.card-br { bottom: -20px; right: -20px; }
.hero-floating-card i { font-size: 1.4rem; color: #ea580c; }
.hero-floating-card .fc-text strong { display: block; font-size: 0.85rem; font-weight: 700; color: #0f172a; }
.hero-floating-card .fc-text span { font-size: 0.75rem; color: #64748b; }
.city-service-card { background: #fff; border-radius: 16px; padding: 30px; border: 1px solid #e2e8f0; transition: all 0.3s ease; height: 100%; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
.city-service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(234,88,12,0.12); border-color: #fed7aa; }
.city-service-card .cs-icon { width: 60px; height: 60px; background: linear-gradient(135deg,#fff7ed,#ffedd5); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #ea580c; margin-bottom: 18px; }
.city-service-card h4 { font-size: 1.1rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; }
.city-service-card p { color: #64748b; font-size: 0.88rem; line-height: 1.65; margin: 0; }
.area-chip { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: #fff7ed; border: 1px solid #fed7aa; border-radius: 50px; color: #c2410c; font-weight: 600; font-size: 0.82rem; margin: 5px; }
.tech-badge { display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; font-weight: 600; font-size: 0.85rem; color: #374151; margin: 6px; transition: all 0.25s ease; }
.tech-badge:hover { border-color: #ea580c; color: #ea580c; transform: translateY(-2px); }
.city-faq-item { background: #fff; border: 1px solid #e2e8f0; border-radius: 12px; margin-bottom: 12px; }
.city-faq-item summary { padding: 18px 22px; font-weight: 600; font-size: 0.95rem; color: #0f172a; cursor: pointer; list-style: none; display: flex; justify-content: space-between; }
.city-faq-item summary::-webkit-details-marker { display: none; }
.city-faq-item summary::after { content: '+'; font-size: 1.4rem; color: #ea580c; font-weight: 300; }
.city-faq-item[open] summary::after { content: '−'; }
.city-faq-item .faq-body { padding: 0 22px 18px; color: #64748b; line-height: 1.7; font-size: 0.9rem; }
.sec-label { display: inline-block; padding: 6px 16px; background: #fff7ed; border-radius: 50px; color: #c2410c; font-size: 0.78rem; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; }
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
    "description": "Affordable web development company in Ghaziabad — custom websites, e-commerce, Laravel & React for Indirapuram, Vaishali, Crossing Republik businesses.",
    "url": "https://shivatechdigital.com/services/web-development-ghaziabad",
    "telephone": "+91-7007294764",
    "areaServed": [{"@@type": "City", "name": "Ghaziabad"}, {"@@type": "City", "name": "Indirapuram"}, {"@@type": "City", "name": "Vaishali"}]
}
</script>
@endsection

@section('website.content')

<section class="city-hero">
    <div class="container position-relative" style="z-index:1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <span class="city-badge"><i class="fas fa-map-marker-alt"></i> Ghaziabad, Uttar Pradesh</span>
                <h1>Affordable <span>Web Development</span> in Ghaziabad</h1>
                <p class="lead">Growing your Ghaziabad business online is now easy and affordable. We build stunning websites, e-commerce stores, and web apps for Indirapuram, Vaishali, Crossing Republik and all of Ghaziabad.</p>
                <div class="hero-cta-group">
                    <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
                    <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
                </div>
                <div class="hero-stats-row">
                    <div class="hero-stat"><span class="num">50+</span><span class="lbl">Projects</span></div>
                    <div class="hero-stat"><span class="num">30+</span><span class="lbl">Clients</span></div>
                    <div class="hero-stat"><span class="num">4.9★</span><span class="lbl">Rating</span></div>
                    <div class="hero-stat"><span class="num">₹8K</span><span class="lbl">Starts From</span></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-visual-right position-relative">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=900&q=85" alt="Web Development Ghaziabad - Shiva Tech Digital" class="hero-main-img">
                    <div class="hero-floating-card card-tl"><i class="fas fa-rupee-sign"></i><div class="fc-text"><strong>Starts ₹8,000</strong><span>Best Price in Ghaziabad</span></div></div>
                    <div class="hero-floating-card card-br"><i class="fas fa-clock" style="color:#ea580c"></i><div class="fc-text"><strong>3-5 Day Delivery</strong><span>Landing Pages</span></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="sec-label">Ghaziabad Services</span>
            <h2 class="sec-title">Web Development for Ghaziabad Businesses</h2>
            <p class="sec-subtitle mx-auto">We help Ghaziabad businesses — traders, manufacturers, retailers, and service providers — grow online with professional websites.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['fas fa-laptop-code','Business Website','Professional websites for Ghaziabad businesses. Showcase your products & services, attract more customers online.'],
                ['fas fa-shopping-cart','E-commerce Store','Sell online! We build e-commerce stores for Ghaziabad traders and retailers with payment gateway & delivery integration.'],
                ['fab fa-wordpress','WordPress Development','Easy-to-manage WordPress websites for Ghaziabad business owners who want to update content themselves.'],
                ['fas fa-search','SEO Services','Rank on Google for "your business + Ghaziabad" keywords. Get more local customers from Indirapuram, Vaishali & beyond.'],
                ['fas fa-mobile-alt','Mobile-First Design','Websites optimized for mobile — most Ghaziabad customers browse on phones. We ensure perfect mobile experience.'],
                ['fas fa-tools','Website Maintenance','Keep your website running smoothly. Monthly maintenance packages with updates, backups, and support.'],
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
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=800&q=85" alt="Affordable Web Development Ghaziabad" class="img-fluid rounded-3" style="box-shadow:0 20px 60px rgba(0,0,0,0.1);">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="sec-label">Why Choose Us</span>
                <h2 class="sec-title">Why Ghaziabad Businesses Love Us?</h2>
                @foreach([['fa-rupee-sign','Most Affordable in Ghaziabad','Websites starting at ₹8,000. EMI options available. No hidden charges. Fits every Ghaziabad business budget.'],['fa-handshake','Nearest to Ghaziabad','Based in Noida (10 mins from Ghaziabad). In-person meetings, quick site visits. Local support you can trust.'],['fa-bolt','Fastest Delivery','Landing pages in 3-5 days. Complete websites in 1-2 weeks. Faster than any Ghaziabad agency.'],['fa-star','Quality Guaranteed','Money-back guarantee if not satisfied. We build websites that actually get customers.'],] as [$icon,$title,$text])
                <div class="d-flex gap-3 mb-3">
                    <div style="width:42px;height:42px;background:#fff7ed;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#ea580c;font-size:1.1rem;"><i class="fas {{ $icon }}"></i></div>
                    <div><h6 class="mb-1" style="color:#0f172a;font-weight:700;">{{ $title }}</h6><p class="mb-0 text-secondary" style="font-size:0.88rem;">{{ $text }}</p></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container text-center">
        <span class="sec-label">Areas in Ghaziabad</span>
        <h2 class="sec-title">We Serve All of Ghaziabad</h2>
        @foreach(['Indirapuram','Vaishali','Vasundhara','Raj Nagar Extension','Kaushambi','Crossing Republik','Shastri Nagar','Shalimar Garden','Mohan Nagar','Loni','Govindpuram','Pratap Vihar','Vijay Nagar','Sahibabad','Gyan Khand'] as $area)
        <span class="area-chip"><i class="fas fa-map-marker-alt"></i> {{ $area }}</span>
        @endforeach
    </div>
</section>

<section class="py-5" style="background:white;">
    <div class="container text-center" style="background:white;">
        <span class="sec-label">Pricing</span>
        <h2 class="sec-title">Website Packages for Ghaziabad</h2>
        <p class="sec-subtitle mx-auto mb-5">Transparent pricing — no hidden charges. Best value in Ghaziabad.</p>
        <div class="row g-4 justify-content-center">
            @foreach([['Basic','₹8,000 - ₹15,000','For Small Businesses',['Up to 5 Pages','Mobile Responsive','Contact Form','Basic SEO','1 Month Support']],['Business','₹15,000 - ₹35,000','For Growing Businesses',['Up to 15 Pages','E-commerce Ready','Payment Gateway','Advanced SEO','3 Month Support']],['Enterprise','₹35,000+','For Large Businesses',['Unlimited Pages','Custom Web App','API Integration','Full SEO Package','1 Year Support']]] as [$name,$price,$for,$features])
            <div class="col-lg-4 col-md-6">
                <div class="city-service-card text-center">
                    <h4>{{ $name }}</h4>
                    <div style="font-size:1.8rem;font-weight:800;color:#ea580c;margin:12px 0;">{{ $price }}</div>
                    <p style="color:#64748b;font-size:0.82rem;margin-bottom:16px;">{{ $for }}</p>
                    @foreach($features as $f)<div style="padding:6px 0;border-bottom:1px solid #f1f5f9;color:#374151;font-size:0.85rem;"><i class="fas fa-check text-success me-2"></i>{{ $f }}</div>@endforeach
                    <a href="{{ route('contact') }}" style="display:block;margin-top:16px;background:linear-gradient(135deg,#ea580c,#c2410c);color:#fff;padding:10px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.88rem;">Get Quote</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container"><div class="row justify-content-center"><div class="col-lg-8">
        <div class="text-center mb-5"><span class="sec-label">FAQ</span><h2 class="sec-title">Ghaziabad Business FAQs</h2></div>
        @foreach([
            ['q'=>'How much does a website cost in Ghaziabad?','a'=>'Basic websites start at ₹8,000-₹15,000. E-commerce from ₹20,000. We offer the most affordable web development in Ghaziabad with EMI options available for larger projects.'],
            ['q'=>'How close are you to Ghaziabad?','a'=>'We are based in Sector 62, Noida — just 10-15 minutes from Indirapuram and Vaishali. We can do in-person meetings easily and visit Ghaziabad client sites on request.'],
            ['q'=>'Can you make a website in Hindi for my Ghaziabad business?','a'=>'Yes! We build bilingual websites in English + Hindi to reach more customers in Ghaziabad and surrounding areas of UP.'],
            ['q'=>'Do you build e-commerce websites for Ghaziabad traders?','a'=>'Absolutely! We build full e-commerce stores with product catalog, UPI/card payment, order management, and delivery tracking. Perfect for Ghaziabad traders and retailers.'],
            ['q'=>'Do you provide GST invoice for web development services?','a'=>'Yes, we provide proper GST invoices for all our services. You can claim input tax credit for website development expenses.'],
        ] as $faq)
        <details class="city-faq-item" data-aos="fade-up"><summary>{{ $faq['q'] }}</summary><div class="faq-body">{{ $faq['a'] }}</div></details>
        @endforeach
    </div></div></div>
</section>

<section class="py-5" style="background:linear-gradient(135deg,#0f172a 0%,#9a3412 100%);">
    <div class="container text-center">
        <h2 class="text-white mb-3" style="font-size:2.2rem;font-weight:800;">Start Your Ghaziabad Website Today!</h2>
        <p class="text-white-50 mb-4">Most affordable web development in Ghaziabad. Free consultation, transparent pricing.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('contact') }}" class="btn-hero-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
            <a href="tel:+917007294764" class="btn-hero-outline"><i class="fas fa-phone"></i> +91-7007294764</a>
        </div>
    </div>
</section>

@endsection
