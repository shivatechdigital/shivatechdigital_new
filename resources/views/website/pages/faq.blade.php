@extends('website.index')
@section('seo_slug', 'faq')

@push('additional-meta')
<link rel="canonical" href="https://shivatechdigital.com/faq">
<meta property="og:type" content="website">
<meta property="og:url" content="https://shivatechdigital.com/faq">
<meta property="og:title" content="FAQ | Web Development, Pricing & Services | Shiva Tech Digital Noida">
<meta property="og:description" content="Answers to common questions about our web development, mobile app, SEO & digital marketing services in Noida, Delhi NCR. Pricing, timelines and more.">
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {"@type":"Question","name":"What web development services does Shiva Tech Digital offer?","acceptedAnswer":{"@type":"Answer","text":"We offer web development, mobile app development (Flutter, React Native), SEO, digital marketing, UI/UX design, e-commerce development, cloud solutions, branding and maintenance services in Noida and across Delhi NCR."}},
        {"@type":"Question","name":"How much does a website cost at Shiva Tech Digital?","acceptedAnswer":{"@type":"Answer","text":"Our pricing: Landing Page ₹5,000–₹10,000; Business Website ₹10,000–₹20,000; E-commerce ₹10,000–₹25,000; Custom Web App ₹20,000+; Mobile App ₹30,000–₹3,00,000. EMI options available."}},
        {"@type":"Question","name":"How long does web development take?","acceptedAnswer":{"@type":"Answer","text":"Landing page: 3–5 days. Business website: 1–2 weeks. E-commerce: 2–4 weeks. Custom app: 4–8 weeks. Mobile app: 6–12 weeks."}},
        {"@type":"Question","name":"Do you offer EMI or installment payment?","acceptedAnswer":{"@type":"Answer","text":"Yes! We offer flexible payment plans including EMI options and milestone-based payments tailored to your budget."}},
        {"@type":"Question","name":"Where is Shiva Tech Digital located?","acceptedAnswer":{"@type":"Answer","text":"We are located in Sector 62, Noida, Uttar Pradesh, India – 201301. We serve clients across Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad and globally."}},
        {"@type":"Question","name":"Do you provide post-launch support?","acceptedAnswer":{"@type":"Answer","text":"Yes. We provide free bug fixes for 30 days after launch. We also offer affordable monthly maintenance packages starting from ₹2,000/month."}},
        {"@type":"Question","name":"Can I see your previous work?","acceptedAnswer":{"@type":"Answer","text":"Absolutely! Visit our Portfolio page at shivatechdigital.com/portfolio to see our completed web development, mobile app and digital marketing projects."}}
    ]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {"@type":"ListItem","position":1,"name":"Home","item":"https://shivatechdigital.com/"},
        {"@type":"ListItem","position":2,"name":"FAQ","item":"https://shivatechdigital.com/faq"}
    ]
}
</script>
@endpush

@section('website.content')

{{-- Hero --}}
<section style="background:linear-gradient(135deg,rgba(15,23,42,.90) 0%,rgba(30,58,138,.85) 100%),url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1400&q=80') center/cover;padding:110px 0 70px;position:relative;overflow:hidden;" aria-labelledby="faq-hero-heading">
    <div style="position:absolute;inset:0;background:url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E\");pointer-events:none;"></div>
    <div class="container" style="position:relative;z-index:1;text-align:center;">
        <nav aria-label="Breadcrumb" class="mb-3">
            <ol style="list-style:none;padding:0;margin:0;display:flex;justify-content:center;gap:6px;font-size:.78rem;color:rgba(255,255,255,.5);">
                <li><a href="{{ route('home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">Home</a></li>
                <li style="color:rgba(255,255,255,.3);">/</li>
                <li style="color:#a5b4fc;">FAQ</li>
            </ol>
        </nav>
        <span style="display:inline-flex;align-items:center;gap:6px;background:rgba(99,102,241,.2);border:1px solid rgba(99,102,241,.4);border-radius:50px;padding:5px 16px;color:#a5b4fc;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:18px;">
            <i class="fas fa-question-circle" aria-hidden="true"></i> Frequently Asked Questions
        </span>
        <h1 id="faq-hero-heading" style="font-size:clamp(2rem,5vw,3.2rem);font-weight:800;color:#fff;margin-bottom:16px;line-height:1.2;">
            Got <span style="background:linear-gradient(90deg,#818cf8,#60a5fa);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Questions?</span>
        </h1>
        <p style="font-size:1.05rem;color:rgba(255,255,255,.72);max-width:560px;margin:0 auto 30px;line-height:1.7;">
            Find answers to the most common questions about our web development, pricing, timelines and services in Noida, Delhi NCR.
        </p>
        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
            <a href="#general" style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:8px;padding:8px 18px;color:#fff;text-decoration:none;font-size:.82rem;font-weight:600;transition:background .2s;">
                <i class="fas fa-circle-info me-1"></i> General
            </a>
            <a href="#pricing-faq" style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:8px;padding:8px 18px;color:#fff;text-decoration:none;font-size:.82rem;font-weight:600;">
                <i class="fas fa-rupee-sign me-1"></i> Pricing
            </a>
            <a href="#process-faq" style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:8px;padding:8px 18px;color:#fff;text-decoration:none;font-size:.82rem;font-weight:600;">
                <i class="fas fa-cogs me-1"></i> Process
            </a>
            <a href="#services-faq" style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:8px;padding:8px 18px;color:#fff;text-decoration:none;font-size:.82rem;font-weight:600;">
                <i class="fas fa-laptop-code me-1"></i> Services
            </a>
        </div>
    </div>
</section>

{{-- FAQ Content --}}
<div style="background:#f8fafc;padding:60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                {{-- ===== GENERAL ===== --}}
                <section id="general" style="margin-bottom:48px;" aria-labelledby="general-heading">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid #e2e8f0;">
                        <div style="width:42px;height:42px;background:linear-gradient(135deg,#667eea,#764ba2);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-circle-info" style="color:#fff;"></i>
                        </div>
                        <h2 id="general-heading" style="font-size:1.25rem;font-weight:800;color:#0f172a;margin:0;">General Questions</h2>
                    </div>

                    <div class="accordion" id="accordionGeneral">

                        @php
                        $generalFaqs = [
                            ['q'=>'What is Shiva Tech Digital?','a'=>'Shiva Tech Digital is an affordable web development and digital marketing agency based in Sector 62, Noida, Delhi NCR. We specialize in helping startups, SMEs, and businesses build their digital presence with quality solutions at competitive prices.'],
                            ['q'=>'Where are you located?','a'=>'We are located in Sector 62, Noida, Uttar Pradesh, India – 201301. We serve clients across Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad and globally via remote collaboration.'],
                            ['q'=>'How can I contact you?','a'=>'You can reach us via: Email: info@shivatechdigital.com | Phone: +91-7007294764 | WhatsApp: +91-7007294764 | Or fill the contact form at shivatechdigital.com/contact. We respond within 2 hours on business days.'],
                            ['q'=>'Do you work with international clients?','a'=>'Yes! While we are based in Noida, we work with clients from USA, UK, UAE, Australia, Canada and other countries. We collaborate via video calls, WhatsApp and project management tools.'],
                            ['q'=>'Can I see your portfolio?','a'=>'Absolutely! Visit our Portfolio page to see completed web development, mobile app and digital marketing projects. We also share case studies on request.'],
                        ];
                        @endphp

                        @foreach($generalFaqs as $i => $faq)
                        <div class="accordion-item" style="border:1px solid #e2e8f0;border-radius:12px;margin-bottom:10px;overflow:hidden;background:#fff;" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                            <h3 class="accordion-header" id="genH{{ $i }}">
                                <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#genC{{ $i }}"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                    style="font-weight:700;font-size:.92rem;color:#0f172a;background:#fff;box-shadow:none;padding:16px 20px;">
                                    <i class="fas fa-chevron-right me-2" style="font-size:.7rem;color:#667eea;transition:transform .3s;"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h3>
                            <div id="genC{{ $i }}" class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                                 aria-labelledby="genH{{ $i }}" data-bs-parent="#accordionGeneral">
                                <div class="accordion-body" style="color:#475569;font-size:.9rem;line-height:1.7;padding:0 20px 16px 44px;">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- ===== PRICING ===== --}}
                <section id="pricing-faq" style="margin-bottom:48px;" aria-labelledby="pricing-heading">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid #e2e8f0;">
                        <div style="width:42px;height:42px;background:linear-gradient(135deg,#10b981,#059669);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-rupee-sign" style="color:#fff;"></i>
                        </div>
                        <h2 id="pricing-heading" style="font-size:1.25rem;font-weight:800;color:#0f172a;margin:0;">Pricing & Payment</h2>
                    </div>

                    <div class="accordion" id="accordionPricing">
                        @php
                        $pricingFaqs = [
                            ['q'=>'How much does a website cost?','a'=>'Our affordable pricing: Landing Page ₹5,000–₹10,000 | Business Website (5–10 pages) ₹10,000–₹20,000 | E-commerce Website ₹10,000–₹25,000 | Custom Web Application ₹20,000+ | Mobile App (Flutter) ₹30,000–₹3,00,000. All prices include free hosting setup guidance and basic SEO.'],
                            ['q'=>'Do you offer EMI or installment payment?','a'=>'Yes! We understand budget constraints. We offer flexible payment plans: 50% advance + 50% on delivery, or milestone-based installments for larger projects. Contact us to discuss a plan that works for you.'],
                            ['q'=>'Are there any hidden charges?','a'=>'No hidden charges at all. We give you a complete, transparent quote before starting. The only extras that may apply are third-party costs like domain (₹800–₹1,500/year), hosting (₹3,000–₹10,000/year), premium plugins, or paid API services – and we always inform you upfront.'],
                            ['q'=>'What payment methods do you accept?','a'=>'We accept UPI (GPay, PhonePe, Paytm), Bank Transfer (NEFT/RTGS/IMPS), Credit/Debit Card, and Cash (for local Noida clients). International clients can pay via PayPal, Wise, or bank wire transfer.'],
                            ['q'=>'Do you offer refunds?','a'=>'We have a milestone-based payment structure that protects both parties. We do not offer refunds on completed milestones, but we work hard to ensure you are 100% satisfied. Any issues post-launch are fixed for free within 30 days.'],
                        ];
                        @endphp

                        @foreach($pricingFaqs as $i => $faq)
                        <div class="accordion-item" style="border:1px solid #e2e8f0;border-radius:12px;margin-bottom:10px;overflow:hidden;background:#fff;" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                            <h3 class="accordion-header" id="priceH{{ $i }}">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#priceC{{ $i }}"
                                    aria-expanded="false"
                                    style="font-weight:700;font-size:.92rem;color:#0f172a;background:#fff;box-shadow:none;padding:16px 20px;">
                                    <i class="fas fa-chevron-right me-2" style="font-size:.7rem;color:#10b981;transition:transform .3s;"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h3>
                            <div id="priceC{{ $i }}" class="accordion-collapse collapse" aria-labelledby="priceH{{ $i }}" data-bs-parent="#accordionPricing">
                                <div class="accordion-body" style="color:#475569;font-size:.9rem;line-height:1.7;padding:0 20px 16px 44px;">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- ===== PROCESS ===== --}}
                <section id="process-faq" style="margin-bottom:48px;" aria-labelledby="process-heading">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid #e2e8f0;">
                        <div style="width:42px;height:42px;background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-cogs" style="color:#fff;"></i>
                        </div>
                        <h2 id="process-heading" style="font-size:1.25rem;font-weight:800;color:#0f172a;margin:0;">Process & Timelines</h2>
                    </div>

                    <div class="accordion" id="accordionProcess">
                        @php
                        $processFaqs = [
                            ['q'=>'How long does it take to build a website?','a'=>'Landing Page: 3–5 days | Business Website: 1–2 weeks | E-commerce: 2–4 weeks | Custom Web Application: 4–8 weeks | Mobile App: 6–12 weeks. Timeline depends on complexity and how quickly you provide feedback and content.'],
                            ['q'=>'What is your development process?','a'=>'Our 4-step process: (1) Free Consultation – We understand your needs and provide a quote. (2) Planning & Design – Wireframes and UI mockups for your approval. (3) Development – Regular demos and updates. (4) Launch & Support – Deployment + 30 days free bug fixes.'],
                            ['q'=>'How do we communicate during the project?','a'=>'We primarily use WhatsApp for quick updates and queries, email for formal documentation, Google Meet/Zoom for video calls, and share progress via staging links. You can reach us directly – no account manager barriers.'],
                            ['q'=>'Do I need to provide content?','a'=>'Yes, you need to provide your text content, images, and any specific requirements. If you need content writing, we offer affordable content writing services separately. We can guide you on what information is needed.'],
                            ['q'=>'What happens after the website is launched?','a'=>'After launch: 30-day free bug fixes, free minor edits (up to 3), basic training on how to manage your website. We also offer monthly maintenance packages for regular updates, security patches, and backups.'],
                        ];
                        @endphp

                        @foreach($processFaqs as $i => $faq)
                        <div class="accordion-item" style="border:1px solid #e2e8f0;border-radius:12px;margin-bottom:10px;overflow:hidden;background:#fff;" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                            <h3 class="accordion-header" id="procH{{ $i }}">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#procC{{ $i }}"
                                    aria-expanded="false"
                                    style="font-weight:700;font-size:.92rem;color:#0f172a;background:#fff;box-shadow:none;padding:16px 20px;">
                                    <i class="fas fa-chevron-right me-2" style="font-size:.7rem;color:#f59e0b;transition:transform .3s;"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h3>
                            <div id="procC{{ $i }}" class="accordion-collapse collapse" aria-labelledby="procH{{ $i }}" data-bs-parent="#accordionProcess">
                                <div class="accordion-body" style="color:#475569;font-size:.9rem;line-height:1.7;padding:0 20px 16px 44px;">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- ===== SERVICES ===== --}}
                <section id="services-faq" style="margin-bottom:48px;" aria-labelledby="services-faq-heading">
                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid #e2e8f0;">
                        <div style="width:42px;height:42px;background:linear-gradient(135deg,#3b82f6,#1d4ed8);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="fas fa-laptop-code" style="color:#fff;"></i>
                        </div>
                        <h2 id="services-faq-heading" style="font-size:1.25rem;font-weight:800;color:#0f172a;margin:0;">Services & Technology</h2>
                    </div>

                    <div class="accordion" id="accordionServices">
                        @php
                        $servicesFaqs = [
                            ['q'=>'Which technologies do you work with?','a'=>'Backend: Laravel (PHP), Node.js, Python | Frontend: React.js, Vue.js, Tailwind CSS, Bootstrap | Mobile: Flutter, React Native | Database: MySQL, PostgreSQL, MongoDB | Cloud: AWS, Google Cloud, DigitalOcean | E-commerce: Shopify, WooCommerce | CMS: WordPress'],
                            ['q'=>'Do you build e-commerce websites?','a'=>'Yes! We build e-commerce solutions using Shopify, WooCommerce, and custom Laravel platforms. Features include product management, payment gateway (Razorpay, PayU, Stripe), inventory management, order tracking, and admin dashboard. Pricing starts from ₹10,000.'],
                            ['q'=>'What SEO services do you offer?','a'=>'We offer: On-Page SEO (content optimization, meta tags, schema markup), Technical SEO (site speed, Core Web Vitals, mobile optimization), Local SEO (Google My Business, local citations), Link Building, Content Marketing, Monthly SEO reports. We have achieved top 3 Google rankings for multiple clients.'],
                            ['q'=>'Do you offer website maintenance?','a'=>'Yes! Our maintenance packages start from ₹2,000/month and include: Regular backups, security updates, plugin/extension updates, minor content edits (up to 5/month), uptime monitoring, performance optimization, monthly health report.'],
                            ['q'=>'Can you redesign my existing website?','a'=>'Absolutely! Website redesign is one of our specialties. We can redesign your existing website with a modern design while preserving SEO rankings, improve site speed, add new features, and migrate to a better platform if needed. Contact us with your current website URL for a free audit.'],
                        ];
                        @endphp

                        @foreach($servicesFaqs as $i => $faq)
                        <div class="accordion-item" style="border:1px solid #e2e8f0;border-radius:12px;margin-bottom:10px;overflow:hidden;background:#fff;" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                            <h3 class="accordion-header" id="svcH{{ $i }}">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#svcC{{ $i }}"
                                    aria-expanded="false"
                                    style="font-weight:700;font-size:.92rem;color:#0f172a;background:#fff;box-shadow:none;padding:16px 20px;">
                                    <i class="fas fa-chevron-right me-2" style="font-size:.7rem;color:#3b82f6;transition:transform .3s;"></i>
                                    {{ $faq['q'] }}
                                </button>
                            </h3>
                            <div id="svcC{{ $i }}" class="accordion-collapse collapse" aria-labelledby="svcH{{ $i }}" data-bs-parent="#accordionServices">
                                <div class="accordion-body" style="color:#475569;font-size:.9rem;line-height:1.7;padding:0 20px 16px 44px;">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                {{-- Still have questions CTA --}}
                <div style="background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 100%);border-radius:20px;padding:40px;text-align:center;" data-aos="fade-up">
                    <div style="width:60px;height:60px;background:rgba(99,102,241,.25);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;">
                        <i class="fas fa-headset" style="font-size:1.4rem;color:#818cf8;"></i>
                    </div>
                    <h3 style="color:#fff;font-size:1.4rem;font-weight:800;margin-bottom:10px;">Still have questions?</h3>
                    <p style="color:rgba(255,255,255,.65);margin-bottom:24px;font-size:.92rem;">
                        Can't find the answer? Talk directly with our founder — no bots, no account managers.
                    </p>
                    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                        <a href="{{ route('contact') }}" style="background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border-radius:10px;padding:12px 24px;text-decoration:none;font-weight:700;font-size:.9rem;display:inline-flex;align-items:center;gap:8px;">
                            <i class="fas fa-envelope"></i> Send a Message
                        </a>
                        <a href="https://wa.me/917007294764?text=Hi, I have a question about your services" target="_blank" rel="noopener noreferrer nofollow"
                           style="background:#25D366;color:#fff;border-radius:10px;padding:12px 24px;text-decoration:none;font-weight:700;font-size:.9rem;display:inline-flex;align-items:center;gap:8px;">
                            <i class="fab fa-whatsapp"></i> WhatsApp Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.accordion-button:not(.collapsed) { color: #0f172a !important; box-shadow: none !important; }
.accordion-button:not(.collapsed) .fa-chevron-right { transform: rotate(90deg); }
.accordion-button:focus { box-shadow: none !important; }
</style>
@endpush

@endsection
