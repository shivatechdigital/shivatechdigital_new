@extends('website.index')
@section('seo_slug', 'pricing')

@push('additional-meta')
<link rel="canonical" href="https://shivatechdigital.com/pricing">
<meta property="og:type" content="website">
<meta property="og:url" content="https://shivatechdigital.com/pricing">
<meta property="og:title" content="Affordable Pricing | Web Development & Digital Marketing | Shiva Tech Digital Noida">
<meta property="og:description" content="Transparent, startup-friendly pricing for web development, mobile apps, SEO & digital marketing in Noida. Starting from ₹5,000. EMI available.">
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"https://shivatechdigital.com/"},
        {"@type":"ListItem","position":2,"name":"Pricing","item":"https://shivatechdigital.com/pricing"}
    ]
}
</script>
@endpush

@push('styles')
<style>
.pricing-hero { background: linear-gradient(135deg,rgba(15,23,42,.90) 0%,rgba(30,58,138,.85) 100%), url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1400&q=80') center/cover; padding: 110px 0 70px; position: relative; overflow: hidden; }
.price-tab-btn { border: 1.5px solid #e2e8f0; background: #fff; border-radius: 10px; padding: 8px 20px; font-weight: 600; font-size: .85rem; color: #475569; cursor: pointer; transition: all .2s; }
.price-tab-btn.active { background: #2563eb; border-color: #2563eb; color: #fff; }
.pricing-card { background: #fff; border: 1.5px solid #e2e8f0; border-radius: 20px; padding: 32px 28px; height: 100%; transition: all .3s ease; position: relative; }
.pricing-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(37,99,235,.12); border-color: #93c5fd; }
.pricing-card.popular { border-color: #2563eb; box-shadow: 0 8px 40px rgba(37,99,235,.18); }
.popular-badge { position: absolute; top: -14px; left: 50%; transform: translateX(-50%); background: linear-gradient(135deg,#667eea,#764ba2); color: #fff; border-radius: 30px; padding: 4px 18px; font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .6px; white-space: nowrap; }
.plan-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 18px; font-size: 1.4rem; }
.plan-name { font-size: 1.1rem; font-weight: 800; color: #0f172a; margin-bottom: 4px; }
.plan-desc { font-size: .82rem; color: #64748b; margin-bottom: 20px; line-height: 1.5; }
.plan-price { font-size: 2.2rem; font-weight: 900; color: #0f172a; line-height: 1; }
.plan-price sup { font-size: 1rem; font-weight: 700; vertical-align: super; }
.plan-price-unit { font-size: .78rem; font-weight: 500; color: #94a3b8; margin-left: 2px; }
.plan-divider { border: none; border-top: 1px solid #f1f5f9; margin: 20px 0; }
.plan-feature { display: flex; align-items: flex-start; gap: 10px; font-size: .85rem; color: #374151; margin-bottom: 10px; line-height: 1.45; }
.plan-feature i { color: #10b981; font-size: .75rem; flex-shrink: 0; margin-top: 3px; }
.plan-feature.missing { color: #94a3b8; }
.plan-feature.missing i { color: #e2e8f0; }
.plan-cta { display: block; width: 100%; text-align: center; padding: 13px; border-radius: 12px; font-weight: 700; font-size: .9rem; text-decoration: none; transition: all .25s; margin-top: 24px; }
.plan-cta-primary { background: linear-gradient(135deg,#2563eb,#1d4ed8); color: #fff !important; }
.plan-cta-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(37,99,235,.4); }
.plan-cta-outline { background: transparent; color: #2563eb !important; border: 2px solid #2563eb; }
.plan-cta-outline:hover { background: #2563eb; color: #fff !important; }
.compare-table th, .compare-table td { padding: 12px 16px; font-size: .85rem; }
.compare-table thead th { background: #f8fafc; font-weight: 700; color: #0f172a; border-bottom: 2px solid #e2e8f0; }
.compare-table tbody tr:nth-child(even) { background: #fafafa; }
.compare-table .check { color: #10b981; font-size: .9rem; }
.compare-table .cross { color: #e2e8f0; font-size: .9rem; }
.price-section { display: none; }
.price-section.active { display: block; }
</style>
@endpush

@section('website.content')

{{-- Hero --}}
<section class="pricing-hero" aria-labelledby="pricing-hero-heading">
    <div style="position:absolute;inset:0;background:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");pointer-events:none;"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <nav aria-label="Breadcrumb" class="mb-3">
            <ol style="list-style:none;padding:0;margin:0;display:flex;justify-content:center;gap:6px;font-size:.78rem;color:rgba(255,255,255,.5);">
                <li><a href="{{ route('home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Home</a></li>
                <li>/</li>
                <li style="color:#a5b4fc;">Pricing</li>
            </ol>
        </nav>
        <span style="display:inline-flex;align-items:center;gap:6px;background:rgba(99,102,241,.2);border:1px solid rgba(99,102,241,.4);border-radius:50px;padding:5px 16px;color:#a5b4fc;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:18px;">
            <i class="fas fa-rupee-sign"></i> Transparent Pricing
        </span>
        <h1 id="pricing-hero-heading" style="font-size:clamp(2rem,5vw,3.2rem);font-weight:800;color:#fff;margin-bottom:14px;line-height:1.2;">
            Affordable Plans for <span style="background:linear-gradient(90deg,#818cf8,#60a5fa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Every Business</span>
        </h1>
        <p style="font-size:1rem;color:rgba(255,255,255,.72);max-width:560px;margin:0 auto 30px;line-height:1.7;">
            No hidden fees. No surprises. Startup-friendly pricing for web development, mobile apps, and digital marketing in Noida.
        </p>
        <div style="display:flex;gap:20px;justify-content:center;flex-wrap:wrap;font-size:.82rem;color:rgba(255,255,255,.6);">
            <span><i class="fas fa-check-circle text-success me-1"></i>EMI Available</span>
            <span><i class="fas fa-check-circle text-success me-1"></i>Free Consultation</span>
            <span><i class="fas fa-check-circle text-success me-1"></i>No Hidden Charges</span>
            <span><i class="fas fa-check-circle text-success me-1"></i>30-Day Support</span>
        </div>
    </div>
</section>

{{-- Category Tabs --}}
<div style="background:#fff;border-bottom:1px solid #f1f5f9;padding:20px 0;position:sticky;top:108px;z-index:90;box-shadow:0 2px 12px rgba(0,0,0,.05);">
    <div class="container">
        <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap;">
            <button class="price-tab-btn active" data-tab="website" onclick="switchTab(this,'website')">
                <i class="fas fa-globe me-1"></i> Website
            </button>
            <button class="price-tab-btn" data-tab="mobile" onclick="switchTab(this,'mobile')">
                <i class="fas fa-mobile-alt me-1"></i> Mobile App
            </button>
            <button class="price-tab-btn" data-tab="seo" onclick="switchTab(this,'seo')">
                <i class="fas fa-search me-1"></i> SEO / Marketing
            </button>
            <button class="price-tab-btn" data-tab="maintenance" onclick="switchTab(this,'maintenance')">
                <i class="fas fa-tools me-1"></i> Maintenance
            </button>
        </div>
    </div>
</div>

<div style="background:#f8fafc;padding:60px 0;">
    <div class="container">

        {{-- ====== WEBSITE PRICING ====== --}}
        <div id="tab-website" class="price-section active">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:8px;">Website Development Pricing</h2>
                <p style="color:#64748b;font-size:.9rem;">All prices include responsive design, basic SEO setup, and 30-day support.</p>
            </div>
            <div class="row g-4 justify-content-center">
                {{-- Starter --}}
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-seedling" style="color:#2563eb;"></i></div>
                        <div class="plan-name">Starter</div>
                        <div class="plan-desc">Perfect for freelancers, new businesses & landing pages</div>
                        <div class="plan-price"><sup>₹</sup>5,000 <span class="plan-price-unit">– ₹10,000</span></div>
                        <hr class="plan-divider">
                        @foreach(['Landing page or portfolio website','Up to 5 pages','Mobile responsive design','Contact form','Basic SEO setup','WhatsApp button integration','Free domain setup guidance','Delivery in 3–7 days'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Get Started →</a>
                    </div>
                </div>
                {{-- Business (Popular) --}}
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <span class="popular-badge">⭐ Most Popular</span>
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-briefcase" style="color:#7c3aed;"></i></div>
                        <div class="plan-name">Business</div>
                        <div class="plan-desc">For growing businesses needing a complete web presence</div>
                        <div class="plan-price"><sup>₹</sup>10,000 <span class="plan-price-unit">– ₹20,000</span></div>
                        <hr class="plan-divider">
                        @foreach(['Everything in Starter','5–10 pages + blog','CMS (content management)','Google Analytics integration','Social media integration','Google Maps & reviews widget','Speed optimisation (90+ PageSpeed)','1 month free maintenance','Delivery in 1–2 weeks'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-primary">Get This Plan →</a>
                    </div>
                </div>
                {{-- Enterprise --}}
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#f0fdf4;"><i class="fas fa-building" style="color:#10b981;"></i></div>
                        <div class="plan-name">Enterprise / Custom</div>
                        <div class="plan-desc">Custom web applications, portals, SaaS & e-commerce platforms</div>
                        <div class="plan-price"><sup>₹</sup>20,000 <span class="plan-price-unit">– ₹2,00,000+</span></div>
                        <hr class="plan-divider">
                        @foreach(['Everything in Business','Custom web application (Laravel, React)','E-commerce with payment gateway','Admin dashboard & user roles','API development & third-party integrations','Multi-language support','Advanced SEO & schema markup','3 months free maintenance','EMI payment option available'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Request Quote →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ====== MOBILE APP PRICING ====== --}}
        <div id="tab-mobile" class="price-section">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:8px;">Mobile App Development Pricing</h2>
                <p style="color:#64748b;font-size:.9rem;">Cross-platform apps for iOS & Android using Flutter and React Native.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#f0fdf4;"><i class="fas fa-mobile-alt" style="color:#10b981;"></i></div>
                        <div class="plan-name">Basic App</div>
                        <div class="plan-desc">Simple informational or service app with basic features</div>
                        <div class="plan-price"><sup>₹</sup>30,000 <span class="plan-price-unit">– ₹60,000</span></div>
                        <hr class="plan-divider">
                        @foreach(['Android + iOS (Flutter)','Up to 8 screens','User login & registration','Push notifications','Admin panel','Play Store + App Store submission','6–8 weeks delivery'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Get Started →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <span class="popular-badge">⭐ Most Popular</span>
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-rocket" style="color:#7c3aed;"></i></div>
                        <div class="plan-name">Business App</div>
                        <div class="plan-desc">Feature-rich app for e-commerce, booking or marketplace</div>
                        <div class="plan-price"><sup>₹</sup>60,000 <span class="plan-price-unit">– ₹1,50,000</span></div>
                        <hr class="plan-divider">
                        @foreach(['Everything in Basic','Payment gateway (Razorpay/Stripe)','Real-time chat or notifications','Maps & location features','Social login (Google, Facebook)','Analytics dashboard','In-app purchases','8–12 weeks delivery','1 month free support'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-primary">Get This Plan →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#fff7ed;"><i class="fas fa-layer-group" style="color:#f59e0b;"></i></div>
                        <div class="plan-name">Full Platform</div>
                        <div class="plan-desc">Complete ecosystem: app + backend + admin + API</div>
                        <div class="plan-price"><sup>₹</sup>1,50,000 <span class="plan-price-unit">– ₹3,00,000+</span></div>
                        <hr class="plan-divider">
                        @foreach(['Everything in Business','Custom backend API (Laravel/Node)','Super admin + vendor + user roles','Advanced analytics & reporting','Offline mode support','AI/ML integrations on request','12–20 weeks delivery','3 months free support','EMI available'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Request Quote →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ====== SEO / MARKETING PRICING ====== --}}
        <div id="tab-seo" class="price-section">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:8px;">SEO & Digital Marketing Plans</h2>
                <p style="color:#64748b;font-size:.9rem;">Monthly retainer plans. Minimum 3-month commitment for measurable results.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-seedling" style="color:#2563eb;"></i></div>
                        <div class="plan-name">Basic SEO</div>
                        <div class="plan-desc">Ideal for new businesses starting their online journey</div>
                        <div class="plan-price"><sup>₹</sup>5,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['10 target keywords','On-page SEO optimisation','Google My Business setup','Monthly ranking report','2 blog posts/month','Basic link building'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Get Started →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <span class="popular-badge">⭐ Best Value</span>
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-chart-line" style="color:#7c3aed;"></i></div>
                        <div class="plan-name">Growth</div>
                        <div class="plan-desc">For businesses ready to dominate Google rankings</div>
                        <div class="plan-price"><sup>₹</sup>12,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['25 target keywords','Technical SEO audit & fixes','Google Ads management (₹5k budget included)','Social media (Facebook + Instagram)','4 blog posts/month','Backlink building campaign','Monthly strategy call','Analytics & conversion tracking'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-primary">Get This Plan →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#fdf4ff;"><i class="fas fa-trophy" style="color:#a21caf;"></i></div>
                        <div class="plan-name">Dominator</div>
                        <div class="plan-desc">Complete digital marketing for established businesses</div>
                        <div class="plan-price"><sup>₹</sup>25,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['50+ keywords','Full SEO + content strategy','Google Ads + Meta Ads management','LinkedIn marketing','8 blog posts/month','Video marketing (2 reels/month)','Email marketing campaigns','Dedicated account manager','Weekly reporting'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Request Quote →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ====== MAINTENANCE PRICING ====== --}}
        <div id="tab-maintenance" class="price-section">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:8px;">Website Maintenance Plans</h2>
                <p style="color:#64748b;font-size:.9rem;">Keep your website fast, secure and updated with our affordable maintenance packages.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#f0fdf4;"><i class="fas fa-shield-alt" style="color:#10b981;"></i></div>
                        <div class="plan-name">Basic Care</div>
                        <div class="plan-desc">Essential maintenance for small websites</div>
                        <div class="plan-price"><sup>₹</sup>2,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['Weekly automated backups','Security monitoring','CMS / plugin updates','1 hour content edits/month','Monthly health report','Email support'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Get Started →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <span class="popular-badge">⭐ Most Popular</span>
                        <div class="plan-icon" style="background:#eff6ff;"><i class="fas fa-tools" style="color:#7c3aed;"></i></div>
                        <div class="plan-name">Pro Care</div>
                        <div class="plan-desc">Complete maintenance for growing businesses</div>
                        <div class="plan-price"><sup>₹</sup>5,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['Daily backups','Priority security patches','Performance optimisation','3 hours edits/month','Uptime monitoring (99.9%)','Speed optimisation report','WhatsApp support','Minor feature additions'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-primary">Get This Plan →</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card">
                        <div class="plan-icon" style="background:#fff7ed;"><i class="fas fa-headset" style="color:#f59e0b;"></i></div>
                        <div class="plan-name">Premium Support</div>
                        <div class="plan-desc">Dedicated support for high-traffic or business-critical sites</div>
                        <div class="plan-price"><sup>₹</sup>12,000 <span class="plan-price-unit">/ month</span></div>
                        <hr class="plan-divider">
                        @foreach(['Real-time monitoring','Emergency response < 2 hours','8 hours development/month','Database optimisation','Monthly SEO audit','Staging environment','Dedicated WhatsApp line','Monthly strategy call'] as $f)
                        <div class="plan-feature"><i class="fas fa-check-circle"></i> {{ $f }}</div>
                        @endforeach
                        <a href="{{ route('contact') }}" class="plan-cta plan-cta-outline">Request Quote →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Custom Quote CTA --}}
        <div style="background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 100%);border-radius:20px;padding:48px;text-align:center;margin-top:56px;" data-aos="fade-up">
            <h3 style="color:#fff;font-size:1.6rem;font-weight:800;margin-bottom:10px;">Need a Custom Quote?</h3>
            <p style="color:rgba(255,255,255,.65);margin-bottom:28px;font-size:.95rem;max-width:500px;margin-left:auto;margin-right:auto;">
                Every project is unique. Tell us your requirements and we'll give you an honest, affordable quote within 2 hours.
            </p>
            <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                <a href="{{ route('contact') }}" style="background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border-radius:12px;padding:14px 30px;text-decoration:none;font-weight:700;font-size:.95rem;display:inline-flex;align-items:center;gap:8px;">
                    <i class="fas fa-paper-plane"></i> Get Free Quote
                </a>
                <a href="https://wa.me/917007294764?text=Hi, I need a quote for my project" target="_blank" rel="noopener noreferrer nofollow"
                   style="background:#25D366;color:#fff;border-radius:12px;padding:14px 30px;text-decoration:none;font-weight:700;font-size:.95rem;display:inline-flex;align-items:center;gap:8px;">
                    <i class="fab fa-whatsapp"></i> WhatsApp Now
                </a>
            </div>
            <p style="color:rgba(255,255,255,.4);font-size:.78rem;margin-top:16px;margin-bottom:0;">
                <i class="fas fa-credit-card me-1"></i> EMI available on projects above ₹10,000 &nbsp;|&nbsp;
                <i class="fas fa-lock me-1"></i> Secure payment via UPI, Bank Transfer, Card
            </p>
        </div>

        {{-- Pricing FAQ --}}
        <div style="margin-top:56px;" data-aos="fade-up">
            <h3 style="font-size:1.4rem;font-weight:800;color:#0f172a;text-align:center;margin-bottom:28px;">Pricing FAQs</h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:20px;">
                        <h4 style="font-size:.9rem;font-weight:700;color:#0f172a;margin-bottom:8px;">
                            <i class="fas fa-circle-question me-2" style="color:#667eea;font-size:.8rem;"></i>Are there any hidden charges?
                        </h4>
                        <p style="font-size:.83rem;color:#475569;margin:0;line-height:1.6;">No. All quotes include everything discussed. The only additional costs are third-party services like domain, hosting, or paid APIs, and we always inform you upfront.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:20px;">
                        <h4 style="font-size:.9rem;font-weight:700;color:#0f172a;margin-bottom:8px;">
                            <i class="fas fa-circle-question me-2" style="color:#667eea;font-size:.8rem;"></i>Can I pay in installments?
                        </h4>
                        <p style="font-size:.83rem;color:#475569;margin:0;line-height:1.6;">Yes. We typically take 50% advance and 50% on delivery. For larger projects, we can split into 3-4 milestones. EMI is available for projects above Rs 10,000.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:20px;">
                        <h4 style="font-size:.9rem;font-weight:700;color:#0f172a;margin-bottom:8px;">
                            <i class="fas fa-circle-question me-2" style="color:#667eea;font-size:.8rem;"></i>Do prices include hosting?
                        </h4>
                        <p style="font-size:.83rem;color:#475569;margin:0;line-height:1.6;">Prices do not include hosting costs (typically Rs 3,000-Rs 10,000 per year), but we guide you to affordable options and set it up for you at no additional service charge.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:20px;">
                        <h4 style="font-size:.9rem;font-weight:700;color:#0f172a;margin-bottom:8px;">
                            <i class="fas fa-circle-question me-2" style="color:#667eea;font-size:.8rem;"></i>What if I need changes after delivery?
                        </h4>
                        <p style="font-size:.83rem;color:#475569;margin:0;line-height:1.6;">Minor changes within 30 days are free. Beyond that, small changes are billed separately, or you can opt for the Pro Care maintenance plan for ongoing edits.</p>
                    </div>
                </div>
            </div>
            <div style="text-align:center;margin-top:20px;">
                <a href="{{ route('faq') }}" style="color:#667eea;font-size:.85rem;font-weight:600;text-decoration:none;">
                    <i class="fas fa-arrow-right me-1"></i> View all FAQs
                </a>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
function switchTab(btn, tab) {
    document.querySelectorAll('.price-tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.price-section').forEach(s => s.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('tab-' + tab).classList.add('active');
}
</script>
@endpush

@endsection
