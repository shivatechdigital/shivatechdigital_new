@extends('website.index')

@section('title', $settings->meta_title ?? 'Affordable Web Development Company in Noida | Shiva Tech Digital | Delhi NCR')

@section('meta_title', $settings->meta_title ?? 'Affordable Web Development Company in Noida | Shiva Tech Digital')

@section('meta_description', $settings->meta_description ?? 'Shiva Tech Digital is an affordable web development, mobile app development & digital marketing in Noida, Delhi NCR.-friendly pricing. Get free consultation today!')

@section('meta_keywords', 'web development company Noida, affordable web developer Noida, mobile app development Noida, digital marketing agency Noida, SEO services Noida, website design company Noida, web development Delhi NCR, React developer Noida, Laravel development company Noida, website development Noida, cheap website design Noida')

@section('canonical')
<link rel="canonical" href="https://shivatechdigital.com/">
@endsection

@push('additional-meta')
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://shivatechdigital.com/">
    <meta property="og:title" content="Affordable Web & App Development Company in Noida | Shiva Tech Digital">
    <meta property="og:description" content="Startup-friendly web development, mobile app & digital marketing company in Noida, Delhi NCR. Affordable pricing. Free consultation!">
    <meta property="og:image" content="https://shivatechdigital.com/web_assets/img/og-home.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Shiva Tech Digital - Web Development Agency in Noida, Delhi NCR">
    <meta property="og:site_name" content="Shiva Tech Digital">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@@shivatechdigi">
    <meta name="twitter:creator" content="@@shivatechdigi">
    <meta name="twitter:url" content="https://shivatechdigital.com/">
    <meta name="twitter:title" content="Affordable Web Development Company Noida | Shiva Tech Digital">
    <meta name="twitter:description" content="Grow your business with affordable web, app and digital marketing services in Noida, Delhi NCR. Free consultation!">
    <meta name="twitter:image" content="https://shivatechdigital.com/web_assets/img/og-home.jpg">
    <meta name="twitter:image:alt" content="Shiva Tech Digital Office Noida">

    <!-- Additional SEO Meta -->
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="7 days">
    <meta name="coverage" content="Worldwide">
    <meta name="target" content="all">
    <meta name="HandheldFriendly" content="True">

    <!-- Schema: WebPage - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebPage",
        "@@id": "https://shivatechdigital.com/#webpage",
        "url": "https://shivatechdigital.com/",
        "name": "Affordable Web Development Company in Noida | Shiva Tech Digital",
        "description": "Leading web development, mobile app development, and digital marketing in Noida, Delhi NCR.",
        "isPartOf": {
            "@@id": "https://shivatechdigital.com/#website"
        },
        "about": {
            "@@id": "https://shivatechdigital.com/#organization"
        },
        "primaryImageOfPage": {
            "@@type": "ImageObject",
            "url": "https://shivatechdigital.com/web_assets/img/og-home.jpg"
        },
        "datePublished": "2024-01-01",
        "dateModified": "{{ date('Y-m-d') }}",
        "inLanguage": "en-IN"
    }
    </script>

    <!-- Schema: WebSite - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "@@id": "https://shivatechdigital.com/#website",
        "name": "Shiva Tech Digital",
        "alternateName": "ShivaTechDigital Noida",
        "url": "https://shivatechdigital.com/",
        "description": "Affordable web development and digital marketing in Noida, Delhi NCR",
        "publisher": {
            "@@id": "https://shivatechdigital.com/#organization"
        },
        "inLanguage": "en-IN",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": {
                "@@type": "EntryPoint",
                "urlTemplate": "https://shivatechdigital.com/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <!-- Schema: LocalBusiness - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "@@id": "https://shivatechdigital.com/#localbusiness",
        "name": "Shiva Tech Digital",
        "image": "https://shivatechdigital.com/web_assets/img/og-home.jpg",
        "logo": "https://shivatechdigital.com/web_assets/img/logo.png",
        "url": "https://shivatechdigital.com/",
        "telephone": "+91-7007294764",
        "email": "info@@shivatechdigital.com",
        "priceRange": "$",
        "description": "Affordable web development and digital marketing in Noida, Delhi NCR.-friendly pricing with quality delivery.",
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
            "latitude": 28.6271,
            "longitude": 77.3779
        },
        "openingHoursSpecification": [
            {
                "@@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "09:00",
                "closes": "18:00"
            },
            {
                "@@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "10:00",
                "closes": "16:00"
            }
        ],
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61585380713440",
            "https://www.instagram.com/shivatechdigital",
            "https://x.com/shivatechdigi",
            "https://www.linkedin.com/company/shivatechdigital"
        ],
        "areaServed": [
            {"@@type": "City", "name": "Noida"},
            {"@@type": "City", "name": "Greater Noida"},
            {"@@type": "City", "name": "Delhi"},
            {"@@type": "City", "name": "Gurgaon"},
            {"@@type": "City", "name": "Ghaziabad"},
            {"@@type": "City", "name": "Faridabad"}
        ],
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "25",
            "bestRating": "5",
            "worstRating": "1"
        }
    }
    </script>

    <!-- Schema: BreadcrumbList -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://shivatechdigital.com/"
            }
        ]
    }
    </script>

    <!-- Schema: Organization - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "@@id": "https://shivatechdigital.com/#organization",
        "name": "Shiva Tech Digital",
        "alternateName": "ShivaTechDigital",
        "url": "https://shivatechdigital.com/",
        "logo": {
            "@@type": "ImageObject",
            "url": "https://shivatechdigital.com/web_assets/img/logo.png",
            "width": 300,
            "height": 60
        },
        "image": "https://shivatechdigital.com/web_assets/img/og-home.jpg",
        "description": "Affordable web development in Noida, Delhi NCR, India.",
        "foundingDate": "2024",
        "telephone": "+91-7007294764",
        "email": "info@@shivatechdigital.com",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Sector 62",
            "addressLocality": "Noida",
            "addressRegion": "Uttar Pradesh",
            "postalCode": "201301",
            "addressCountry": "IN"
        },
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61585380713440",
            "https://www.instagram.com/shivatechdigital",
            "https://x.com/shivatechdigi",
            "https://www.linkedin.com/company/shivatechdigital"
        ]
    }
    </script>

    <!-- Schema: FAQPage - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "FAQPage",
        "mainEntity": [
            {
                "@@type": "Question",
                "name": "What services does Shiva Tech Digital offer in Noida?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Shiva Tech Digital offers affordable web development, mobile app development, digital marketing, SEO, and e-commerce solutions in Noida and across Delhi NCR."
                }
            },
            {
                "@@type": "Question",
                "name": "How much does web development cost in Noida?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "Our web development projects start from Rs 25,000 for basic websites. We offer-friendly and affordable pricing. Contact us for a free quote."
                }
            },
            {
                "@@type": "Question",
                "name": "Where is Shiva Tech Digital located in Noida?",
                "acceptedAnswer": {
                    "@@type": "Answer",
                    "text": "We are located in Sector 62, Noida, Uttar Pradesh, India - 201301. We serve clients across Delhi NCR including Greater Noida, Delhi, Gurgaon, and Ghaziabad."
                }
            }
        ]
    }
    </script>

    <!-- Schema: Services - NOIDA -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ItemList",
        "name": "Our Digital Services in Noida",
        "description": "Affordable digital services by Shiva Tech Digital in Noida, Delhi NCR",
        "numberOfItems": 3,
        "itemListElement": [
            {
                "@@type": "ListItem",
                "position": 1,
                "item": {
                    "@@type": "Service",
                    "name": "Web Application Development in Noida",
                    "description": "Affordable web applications built with Laravel, React, Vue.js fors and businesses in Noida and Delhi NCR",
                    "provider": {
                        "@@id": "https://shivatechdigital.com/#organization"
                    },
                    "url": "https://shivatechdigital.com/services/web-development",
                    "areaServed": "Noida, Delhi NCR"
                }
            },
            {
                "@@type": "ListItem",
                "position": 2,
                "item": {
                    "@@type": "Service",
                    "name": "Mobile App Development in Noida",
                    "description": "iOS and Android apps using Flutter and React Native for Noidas",
                    "provider": {
                        "@@id": "https://shivatechdigital.com/#organization"
                    },
                    "url": "https://shivatechdigital.com/services/mobile-app-development",
                    "areaServed": "Noida, Delhi NCR"
                }
            },
            {
                "@@type": "ListItem",
                "position": 3,
                "item": {
                    "@@type": "Service",
                    "name": "SEO and Digital Marketing in Noida",
                    "description": "Affordable SEO, Google Ads, and Social Media Marketing services for Noida businesses",
                    "provider": {
                        "@@id": "https://shivatechdigital.com/#organization"
                    },
                    "url": "https://shivatechdigital.com/services/digital-marketing",
                    "areaServed": "Noida, Delhi NCR"
                }
            }
        ]
    }
    </script>
@endpush

@push('styles')
<style>
    .section-title-creative-dark{
        color: black;
    }
    /* ========================================
       LEAD FORM BOX STYLES
    ======================================== */
    .hero-lead-box {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 20px;
        margin-top: 30px;
        border-radius: 15px;
        animation: fadeIn 1.5s ease;
        text-align: center;
    }

    .hero-lead-box h2 {
        color: #fff;
        margin-bottom: 10px;
        font-weight: 600;
        font-size: 1.5rem;
    }

    .lead-form {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .lead-form .form-group {
        flex: 1 1 200px;
        max-width: 250px;
    }

    .lead-form input {
        width: 100%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 2px solid transparent;
        outline: none;
        font-size: 14px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .lead-form input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
    }

    .lead-form input::placeholder {
        color: #999;
    }

    @media (max-width: 768px) {
        .lead-form .form-group {
            flex: 1 1 45%;
            max-width: none;
        }
    }

    @media (max-width: 480px) {
        .lead-form .form-group {
            flex: 1 1 100%;
        }
        
        .lead-form input {
            padding: 14px;
        }
    }

    .lead-btn {
        background: linear-gradient(135deg, #ff006a 0%, #ff4d4d 100%);
        color: #fff;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        white-space: nowrap;
    }

    .lead-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 0, 106, 0.4);
    }

    .lead-btn:active {
        transform: translateY(0);
    }

    .whatsapp-link-btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .whatsapp-btn {
        display: inline-flex;
        align-items: center;
        margin-top: 15px;
        font-weight: 600;
        color: #00ff8a;
        padding: 12px 25px;
        border: 2px solid #00ff8a;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .whatsapp-btn:hover {
        background: #00ff8a;
        color: #000;
    }

    /* ========================================
       FORM MESSAGES
    ======================================== */
    .form-message {
        padding: 12px 20px;
        border-radius: 8px;
        margin-top: 15px;
        text-align: center;
        font-weight: 500;
    }

    .form-message.success {
        background: rgba(0, 255, 138, 0.15);
        color: #00ff8a;
        border: 1px solid rgba(0, 255, 138, 0.3);
    }

    .form-message.error {
        background: rgba(255, 0, 106, 0.15);
        color: #ff006a;
        border: 1px solid rgba(255, 0, 106, 0.3);
    }

    .error-text {
        color: #ff6b6b;
        font-size: 12px;
        margin-top: 4px;
    }

    /* ========================================
       ACCESSIBILITY IMPROVEMENTS
    ======================================== */
    .visually-hidden {
        position: absolute !important;
        width: 1px !important;
        height: 1px !important;
        padding: 0 !important;
        margin: -1px !important;
        overflow: hidden !important;
        clip: rect(0, 0, 0, 0) !important;
        white-space: nowrap !important;
        border: 0 !important;
    }

    .skip-link {
        position: absolute;
        top: -40px;
        left: 0;
        background: #0d6efd;
        color: #fff;
        padding: 10px 20px;
        z-index: 10000;
        text-decoration: none;
        border-radius: 0 0 5px 0;
        transition: top 0.3s ease;
    }

    .skip-link:focus {
        top: 0;
    }

    /* ========================================
       PARTNER LOGO STYLES
    ======================================== */
    .partner-logo-img {
        max-width: 80px;
        max-height: 60px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: filter 0.3s ease, opacity 0.3s ease, transform 0.3s ease;
    }

    .partner-card:hover .partner-logo-img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.05);
    }

    /* ========================================
       STAT NUMBER STYLES
    ======================================== */
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #fff;
        margin: 0;
        line-height: 1.2;
    }

    .stat-label {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    /* ========================================
       ANIMATION KEYFRAMES
    ======================================== */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ========================================
       FAQ ACCORDION STYLES
    ======================================== */
    .faq-section .accordion-item {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .faq-section .accordion-button {
        font-weight: 600;
        font-size: 1.1rem;
        padding: 20px;
        background: #fff;
    }

    .faq-section .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
    }

    .faq-section .accordion-body {
        padding: 20px;
        background: #f8f9fa;
    }

    .faq-section .accordion-body ul {
        margin: 10px 0;
        padding-left: 20px;
    }

    .faq-section .accordion-body li {
        margin-bottom: 8px;
    }

    /* ========================================
       FOCUS STYLES FOR ACCESSIBILITY
    ======================================== */
    a:focus,
    button:focus,
    input:focus,
    select:focus,
    textarea:focus {
        outline: 2px solid #667eea;
        outline-offset: 2px;
    }

    /* ========================================
       REDUCED MOTION PREFERENCE
    ======================================== */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>
@endpush

@section('website.content')

    <!-- Breadcrumb Navigation (Hidden visually but good for SEO) -->
    <nav aria-label="Breadcrumb" class="visually-hidden">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="https://shivatechdigital.com/">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
        </ol>
    </nav>

    <!-- ========================================
         HERO SECTION - NOIDA
    ======================================== -->
    <section class="hero-section" id="home" aria-labelledby="hero-heading" itemscope itemtype="https://schema.org/WPHeader">
        <div class="hero-animated-bg" aria-hidden="true">
            <div class="gradient-orb orb-1"></div>
            <div class="gradient-orb orb-2"></div>
            <div class="gradient-orb orb-3"></div>
        </div>

        <div class="particles-container" id="particles" aria-hidden="true"></div>

        <div class="geometric-shapes" aria-hidden="true">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
        </div>

        <div class="grid-background" aria-hidden="true"></div>

        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    <div class="hero-content" itemprop="text">
                        <div class="hero-badge">
                            <span class="badge-dot" aria-hidden="true"></span>
                            <span class="badge-text">Affordable Web Development in Noida, Delhi NCR</span>
                        </div>

                        <!-- ✅ SINGLE H1 TAG - NOIDA FOCUSED -->
                        <h1 class="hero-title" id="hero-heading" itemprop="headline">
                            <span class="title-line-1">Transform Your</span>
                            <span class="title-line-2">
                                <span class="gradient-text typed-text" id="typedText" aria-label="Digital Business"></span>
                                <span class="cursor" aria-hidden="true">|</span>
                            </span>
                            <span class="title-line-3">Presence</span>
                        </h1>

                        <p class="hero-subtitle" itemprop="description">
                            We are an <strong class="highlight-text">affordable web development in Noida</strong> 
                            creating <strong class="highlight-text">stunning web & mobile applications</strong>
                            with powerful <strong class="highlight-text">SEO and digital marketing strategies</strong>
                            to grow your business. Serving <strong>Delhi NCR, India, USA, UK, UAE</strong> and worldwide.
                        </p>

                        <div class="hero-tags" role="list" aria-label="Our expertise areas">
                            <span class="tag" role="listitem" data-aos="fade-up" data-aos-delay="100">
                                <i class="fas fa-check-circle" aria-hidden="true"></i> 
                                <span>Web Development</span>
                            </span>
                            <span class="tag" role="listitem" data-aos="fade-up" data-aos-delay="200">
                                <i class="fas fa-check-circle" aria-hidden="true"></i> 
                                <span>Mobile Apps</span>
                            </span>
                            <span class="tag" role="listitem" data-aos="fade-up" data-aos-delay="300">
                                <i class="fas fa-check-circle" aria-hidden="true"></i> 
                                <span>SEO & Digital Marketing</span>
                            </span>
                        </div>

                        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                            <a href="{{ route('contact') }}" class="btn btn-primary-gradient" title="Start your web development project with Shiva Tech Digital Noida">
                                <span class="btn-text">Start Your Project</span>
                                <span class="btn-icon" aria-hidden="true"><i class="fas fa-rocket"></i></span>
                                <span class="btn-shine" aria-hidden="true"></span>
                            </a>
                            <a href="{{ route('portfolio') }}" class="btn btn-glass" title="View our web development portfolio">
                                <span class="play-icon" aria-hidden="true">
                                    <i class="fas fa-briefcase"></i>
                                </span>
                                <span class="btn-text">View Portfolio</span>
                            </a>
                        </div>

                        <!-- ✅ REALISTIC NUMBERS -->
                        <div class="hero-stats" data-aos="fade-up" data-aos-delay="500" role="list" aria-label="Our achievements">
                            <div class="stat-item" role="listitem">
                                <div class="stat-icon" aria-hidden="true">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div class="stat-content">
                                    <p class="stat-number" data-count="50" aria-label="50+ Projects Completed">0+</p>
                                    <p class="stat-label">Projects Completed</p>
                                </div>
                            </div>
                            <div class="stat-item" role="listitem">
                                <div class="stat-icon" aria-hidden="true">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <p class="stat-number" data-count="30" aria-label="30+ Happy Clients">0+</p>
                                    <p class="stat-label">Happy Clients</p>
                                </div>
                            </div>
                            <div class="stat-item" role="listitem">
                                <div class="stat-icon" aria-hidden="true">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-content">
                                    <p class="stat-number" data-count="5" aria-label="4.9 Star Rating">4.9</p>
                                    <p class="stat-label">Star Rating</p>
                                </div>
                            </div>
                        </div>

                        <div class="trusted-by" data-aos="fade-up" data-aos-delay="600">
                            <p class="trusted-label">Technologies We Use</p>
                            <div class="brand-logos" role="list" aria-label="Technologies and platforms we work with">
                                <i class="fa-brands fa-laravel brand-logo" role="listitem" aria-label="Laravel" title="Laravel Development"></i>
                                <i class="fa-brands fa-react brand-logo" role="listitem" aria-label="React" title="React Development"></i>
                                <i class="fa-brands fa-vuejs brand-logo" role="listitem" aria-label="Vue.js" title="Vue.js Development"></i>
                                <i class="fa-brands fa-node-js brand-logo" role="listitem" aria-label="Node.js" title="Node.js Development"></i>
                                <i class="fa-brands fa-aws brand-logo" role="listitem" aria-label="AWS" title="AWS Cloud Services"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <div class="hero-visual" aria-label="Our services illustration">
                        <div class="card-stack">
                            <article class="stack-card card-1" data-tilt>
                                <div class="card-glow" aria-hidden="true"></div>
                                <div class="card-content">
                                    <div class="card-icon" aria-hidden="true">
                                        <i class="fas fa-laptop-code"></i>
                                    </div>
                                    <h2 class="h4">Web Development</h2>
                                    <p>Laravel, React, Vue.js Solutions</p>
                                    <div class="card-stats">
                                        <span><i class="fas fa-check" aria-hidden="true"></i> Affordable Pricing</span>
                                    </div>
                                </div>
                            </article>

                            <article class="stack-card card-2" data-tilt>
                                <div class="card-glow" aria-hidden="true"></div>
                                <div class="card-content">
                                    <div class="card-icon" aria-hidden="true">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <h2 class="h4">Mobile Apps</h2>
                                    <p>Flutter & React Native</p>
                                    <div class="card-stats">
                                        <span><i class="fas fa-check" aria-hidden="true"></i> iOS & Android</span>
                                    </div>
                                </div>
                            </article>

                            <article class="stack-card card-3" data-tilt>
                                <div class="card-glow" aria-hidden="true"></div>
                                <div class="card-content">
                                    <div class="card-icon" aria-hidden="true">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h2 class="h4">SEO & Marketing</h2>
                                    <p>Data-driven digital growth</p>
                                    <div class="card-stats">
                                        <span><i class="fas fa-check" aria-hidden="true"></i> Results-Driven</span>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="floating-elements" aria-hidden="true">
                            <div class="float-item item-1"><i class="fab fa-react"></i></div>
                            <div class="float-item item-2"><i class="fab fa-node"></i></div>
                            <div class="float-item item-3"><i class="fab fa-python"></i></div>
                            <div class="float-item item-4"><i class="fab fa-angular"></i></div>
                            <div class="float-item item-5"><i class="fab fa-aws"></i></div>
                        </div>

                        <div class="animated-rings" aria-hidden="true">
                            <div class="ring ring-1"></div>
                            <div class="ring ring-2"></div>
                            <div class="ring ring-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-indicator mb-3" data-aos="fade-up" data-aos-delay="800" aria-hidden="true">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <p>Scroll to explore</p>
        </div>

        <!-- NOIDA FOCUSED TICKER -->
        <div class="social-proof-ticker" aria-label="Social proof" role="marquee">
            <div class="ticker-content">
                <span class="ticker-item">🚀 New website launched in Noida!</span>
                <span class="ticker-item">⭐ 4.9/5 rated on Google Reviews</span>
                <span class="ticker-item">💰 Affordable pricing fors</span>
                <span class="ticker-item">🏙️ Serving entire Delhi NCR</span>
                <span class="ticker-item">🌐 Clients in 10+ countries</span>
                <span class="ticker-item">🚀 New website launched in Noida!</span>
            </div>
        </div>
    </section>
    
    <!-- ========================================
         LEAD GENERATION FORM SECTION - NOIDA
    ======================================== -->
    <section class="lead-form-section py-4" id="get-quote" aria-labelledby="lead-form-heading">
        <div class="container">
            <div class="hero-lead-box" data-aos="fade-up" data-aos-delay="100">
                <h2 id="lead-form-heading">🚀 Get Free Quote for Your Project in Delhi NCR</h2>
                <p class="text-white-50 mb-3">Affordable web development, mobile app & digital marketing fors and businesses in Noida</p>
                
                <form action="{{ route('servicecontact.submit') }}" method="POST" class="lead-form" 
                      id="leadForm"
                      aria-label="Request a free quote for web development services in Noida">
                    @csrf
                    
                    <div class="form-group">
                        <label for="lead-name" class="visually-hidden">Your Full Name</label>
                        <input type="text" 
                               id="lead-name"
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Your Full Name *"
                               required
                               aria-required="true"
                               aria-describedby="name-error"
                               autocomplete="name"
                               minlength="2"
                               maxlength="100">
                        @error('name') 
                            <small id="name-error" class="error-text" role="alert">{{ $message }}</small> 
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="lead-email" class="visually-hidden">Email Address</label>
                        <input type="email" 
                               id="lead-email"
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Email Address *"
                               required
                               aria-required="true"
                               aria-describedby="email-error"
                               autocomplete="email">
                        @error('email') 
                            <small id="email-error" class="error-text" role="alert">{{ $message }}</small> 
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="lead-contact" class="visually-hidden">Contact Number with Country Code</label>
                        <input type="tel" 
                               id="lead-contact"
                               name="contact" 
                               value="{{ old('contact') }}" 
                               placeholder="Phone (+91-XXXXXXXXXX) *"
                               required
                               aria-required="true"
                               aria-describedby="contact-error"
                               autocomplete="tel"
                               pattern="[\+]?[0-9\-\s]{10,15}">
                        @error('contact') 
                            <small id="contact-error" class="error-text" role="alert">{{ $message }}</small> 
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="lead-service" class="visually-hidden">Service Required</label>
                        <input type="text" 
                               id="lead-service"
                               name="service" 
                               value="{{ old('service') }}" 
                               placeholder="Service (Website, App, SEO)"
                               autocomplete="off"
                               aria-describedby="service-help"
                               list="service-suggestions">
                        <datalist id="service-suggestions">
                            <option value="Startup Website">
                            <option value="E-commerce Website">
                            <option value="Mobile App Development">
                            <option value="SEO Services">
                            <option value="Digital Marketing">
                            <option value="UI/UX Design">
                        </datalist>
                        @error('service') 
                            <small class="error-text" role="alert">{{ $message }}</small> 
                        @enderror
                    </div>
                
                    <button type="submit" class="lead-btn" aria-label="Submit form to get free quote">
                        <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>
                        Get Free Quote
                    </button>
                </form>
                
                @if(session('success'))
                    <div class="form-message success" role="alert" aria-live="polite">
                        <i class="fas fa-check-circle me-2" aria-hidden="true"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="form-message error" role="alert" aria-live="polite">
                        <i class="fas fa-exclamation-circle me-2" aria-hidden="true"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <div class="whatsapp-link-btn">
                    <a href="https://wa.me/917007294764?text=Hello, I need a quote for web development services in Noida" 
                       class="whatsapp-btn" 
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="Chat with us on WhatsApp for web development inquiry">
                        <i class="fa-brands fa-whatsapp me-2" aria-hidden="true"></i>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SERVICES SECTION - NOIDA
    ======================================== -->
    <section class="services-preview-creative py-5" id="services" aria-labelledby="services-heading" itemscope itemtype="https://schema.org/ItemList">
        <div class="container">
            <div class="section-bg-elements" aria-hidden="true">
                <div class="bg-circle circle-1"></div>
                <div class="bg-circle circle-2"></div>
            </div>

            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Services</span>
                <h2 class="section-title-creative-dark" id="services-heading" itemprop="name">
                    Affordable Web Development Services in Noida, Delhi NCR
                </h2>
                <p class="section-subtitle-creative" itemprop="description">
                   -friendly digital solutions at competitive prices. From custom web applications to mobile apps and SEO services.
                </p>
            </header>

            <div class="row g-4">
                <!-- Web Application Service -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="1">
                    <a href="{{ route('services') }}#web-development" class="service-link-creative" aria-label="Learn more about our affordable Web Application Development services in Noida">
                        <article class="service-card-creative" itemprop="item" itemscope itemtype="https://schema.org/Service">
                            <div class="service-card-bg" aria-hidden="true"></div>
                            <div class="service-number" aria-hidden="true">01</div>
                            <div class="service-icon-creative" aria-hidden="true">
                                <div class="icon-bg-pulse"></div>
                                <i class="fas fa-laptop-code"></i>
                            </div>
                            <h3 itemprop="name">Web Application Development</h3>
                            <p itemprop="description">
                                Affordable web applications built with <strong>Laravel, React, Vue.js</strong> fors and businesses in <strong>Noida and Delhi NCR</strong>. SEO-friendly and responsive designs.
                            </p>
                            <meta itemprop="url" content="https://shivatechdigital.com/services/web-development">
                            <div class="service-hover-effect" aria-hidden="true"></div>
                        </article>
                    </a>
                </div>

                <!-- Mobile Application Service -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="2">
                    <a href="{{ route('services') }}#mobile-app-development" class="service-link-creative" aria-label="Learn more about our Mobile Application Development services in Noida">
                        <article class="service-card-creative" itemprop="item" itemscope itemtype="https://schema.org/Service">
                            <div class="service-card-bg" aria-hidden="true"></div>
                            <div class="service-number" aria-hidden="true">02</div>
                            <div class="service-icon-creative" aria-hidden="true">
                                <div class="icon-bg-pulse"></div>
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3 itemprop="name">Mobile App Development</h3>
                            <p itemprop="description">
                                Cross-platform mobile apps for <strong>iOS and Android</strong> using <strong>Flutter and React Native</strong>. Perfect for Noidas and SMEs.
                            </p>
                            <meta itemprop="url" content="https://shivatechdigital.com/services/mobile-app-development">
                            <div class="service-hover-effect" aria-hidden="true"></div>
                        </article>
                    </a>
                </div>

                <!-- Digital Marketing Service -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="3">
                    <a href="{{ route('services') }}#digital-marketing" class="service-link-creative" aria-label="Learn more about our Digital Marketing and SEO services in Noida">
                        <article class="service-card-creative" itemprop="item" itemscope itemtype="https://schema.org/Service">
                            <div class="service-card-bg" aria-hidden="true"></div>
                            <div class="service-number" aria-hidden="true">03</div>
                            <div class="service-icon-creative" aria-hidden="true">
                                <div class="icon-bg-pulse"></div>
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h3 itemprop="name">SEO & Digital Marketing</h3>
                            <p itemprop="description">
                                Affordable <strong>SEO services, Google Ads, Social Media Marketing</strong> to boost your online presence. Drive organic traffic for your Noida business.
                            </p>
                            <meta itemprop="url" content="https://shivatechdigital.com/services/digital-marketing">
                            <div class="service-hover-effect" aria-hidden="true"></div>
                        </article>
                    </a>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('services') }}" class="btn-view-all" title="View all our affordable web development and digital marketing services in Noida">
                    <span>View All Services</span>
                    <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================
         ABOUT SECTION - NOIDA
    ======================================== -->
    <section class="about-preview py-5" id="about-us" aria-labelledby="about-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('web_assets/img/about-team.jpg') }}" 
                             alt="Shiva Tech Digital team working on web development projects in Noida office"
                             class="img-fluid rounded-4 shadow-lg"
                             loading="lazy"
                             width="600"
                             height="400"
                             onerror="this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600'">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content">
                        <span class="section-label">About Shiva Tech Digital</span>
                        <h2 class="section-title-creative-dark" id="about-heading" style="color:white">
                            Noida's-Friendly Web Development Agency
                        </h2>
                        <p>
                            <strong>Shiva Tech Digital</strong> is an emerging web development and digital marketing based in <strong>Sector 62, Noida, Delhi NCR</strong>. We specialize in delivering <strong>high-quality digital solutions at affordable prices</strong>.
                        </p>
                        <p>
                            As a ourselves, we understand the challenges of building a business. That's why we offer <strong>flexible pricing, personal attention, and quick turnaround</strong> that larger agencies can't match.
                        </p>
                        <p>
                            Our team specializes in <strong>Laravel, React.js, Vue.js, Flutter mobile apps, and comprehensive SEO services</strong>. We serve clients across <strong>Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad</strong> and globally.
                        </p>
                        
                        <div class="about-features mt-4">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="about-feature-item">
                                        <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                                        <span>Startup-Friendly Pricing</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="about-feature-item">
                                        <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                                        <span>50+ Projects Delivered</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="about-feature-item">
                                        <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                                        <span>30+ Happy Clients</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="about-feature-item">
                                        <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                                        <span>Direct Founder Access</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('about') }}" class="btn btn-primary-gradient" title="Learn more about Shiva Tech Digital Noida">
                                Learn More About Us
                                <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         PROCESS SECTION
    ======================================== -->
    <section class="process-section py-5" id="process" aria-labelledby="process-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Process</span>
                <h2 class="section-title-creative" id="process-heading">How We Deliver Your Project</h2>
                <p class="section-subtitle-creative">A simple 4-step process ensuring quality delivery at affordable prices</p>
            </header>

            <div class="process-timeline-horizontal" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-progress-line" aria-hidden="true">
                    <div class="timeline-progress-fill" id="progressBar"></div>

                    <div class="process-missile" id="processMissile">
                        <div class="missile-flames">
                            <div class="flame flame-1"></div>
                            <div class="flame flame-2"></div>
                            <div class="flame flame-3"></div>
                        </div>
                        <div class="missile-body">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="missile-trail"></div>
                        <div class="missile-particles">
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                            <span class="particle"></span>
                        </div>
                    </div>
                </div>

                <div class="process-steps-row" role="list" aria-label="Our work process steps">
                    <!-- Step 1: Consultation -->
                    <article class="process-step-horizontal" data-step="1" role="listitem">
                        <div class="step-circle-horizontal">
                            <div class="step-pulse" aria-hidden="true"></div>
                            <div class="step-number-badge">01</div>
                            <div class="step-icon-container" aria-hidden="true">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="step-ring" aria-hidden="true"></div>
                        </div>
                        <div class="step-content-horizontal">
                            <h3>Free Consultation</h3>
                            <p>We understand your needs and provide honest advice</p>
                            <ul class="step-features-horizontal">
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Free 30-min call</li>
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> No obligation quote</li>
                            </ul>
                        </div>
                    </article>

                    <!-- Step 2: Planning -->
                    <article class="process-step-horizontal" data-step="2" role="listitem">
                        <div class="step-circle-horizontal">
                            <div class="step-pulse" aria-hidden="true"></div>
                            <div class="step-number-badge">02</div>
                            <div class="step-icon-container" aria-hidden="true">
                                <i class="fas fa-pencil-ruler"></i>
                            </div>
                            <div class="step-ring" aria-hidden="true"></div>
                        </div>
                        <div class="step-content-horizontal">
                            <h3>Planning & Design</h3>
                            <p>We create wireframes and get your approval first</p>
                            <ul class="step-features-horizontal">
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> UI/UX mockups</li>
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Clear timeline</li>
                            </ul>
                        </div>
                    </article>

                    <!-- Step 3: Development -->
                    <article class="process-step-horizontal" data-step="3" role="listitem">
                        <div class="step-circle-horizontal">
                            <div class="step-pulse" aria-hidden="true"></div>
                            <div class="step-number-badge">03</div>
                            <div class="step-icon-container" aria-hidden="true">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="step-ring" aria-hidden="true"></div>
                        </div>
                        <div class="step-content-horizontal">
                            <h3>Development</h3>
                            <p>Fast, quality coding with regular updates</p>
                            <ul class="step-features-horizontal">
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Weekly demos</li>
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Direct communication</li>
                            </ul>
                        </div>
                    </article>

                    <!-- Step 4: Launch -->
                    <article class="process-step-horizontal" data-step="4" role="listitem">
                        <div class="step-circle-horizontal">
                            <div class="step-pulse" aria-hidden="true"></div>
                            <div class="step-number-badge">04</div>
                            <div class="step-icon-container" aria-hidden="true">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="step-ring" aria-hidden="true"></div>
                        </div>
                        <div class="step-content-horizontal">
                            <h3>Launch & Support</h3>
                            <p>We launch and provide ongoing support</p>
                            <ul class="step-features-horizontal">
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Free bug fixes</li>
                                <li><i class="fas fa-check-circle" aria-hidden="true"></i> Ongoing support</li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>

            <div class="process-controls" data-aos="fade-up" data-aos-delay="500" role="navigation" aria-label="Process step controls">
                <button class="control-btn bg-alternate" id="prevStep" aria-label="Go to previous step">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                </button>
                <div class="flow-indicators" role="tablist" aria-label="Process phases">
                    <button class="flow-dot active" data-flow="1" role="tab" aria-selected="true" aria-label="Consultation phase">
                        <span class="dot-label">Consult</span>
                    </button>
                    <button class="flow-dot" data-flow="2" role="tab" aria-selected="false" aria-label="Planning phase">
                        <span class="dot-label">Plan</span>
                    </button>
                    <button class="flow-dot" data-flow="3" role="tab" aria-selected="false" aria-label="Development phase">
                        <span class="dot-label">Build</span>
                    </button>
                    <button class="flow-dot" data-flow="4" role="tab" aria-selected="false" aria-label="Launch phase">
                        <span class="dot-label">Launch</span>
                    </button>
                </div>
                <button class="control-btn bg-alternate" id="nextStep" aria-label="Go to next step">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
            
            <div class="process-status bg-alternate" data-aos="fade-up" data-aos-delay="600" aria-live="polite">
                <div class="status-info">
                    <span class="status-label">Current Phase:</span>
                    <span class="status-value" id="currentPhase">Consultation</span>
                </div>
                <div class="status-progress">
                    <span class="status-label">Progress:</span>
                    <span class="status-value" id="progressPercent">0%</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         FEATURES / WHY CHOOSE US - NOIDA
    ======================================== -->
    <section class="features-creative py-5" id="why-choose-us" aria-labelledby="features-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="features-visual">
                        <figure class="dashboard-mockup">
                            <div class="mockup-header" aria-hidden="true">
                                <span class="dot dot-red"></span>
                                <span class="dot dot-yellow"></span>
                                <span class="dot dot-green"></span>
                            </div>
                            <div class="mockup-content">
                                <div class="graph-container">
                                    <svg class="animated-graph" viewBox="0 0 300 150" role="img" aria-label="Business growth chart">
                                        <title>Business Growth Chart</title>
                                        <defs>
                                            <linearGradient id="graphGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                                <stop offset="0%" style="stop-color:#6366f1;stop-opacity:0.5" />
                                                <stop offset="100%" style="stop-color:#6366f1;stop-opacity:0" />
                                            </linearGradient>
                                        </defs>
                                        <path class="graph-line"
                                            d="M 0 100 L 50 80 L 100 60 L 150 70 L 200 40 L 250 30 L 300 20"
                                            stroke="#6366f1" stroke-width="3" fill="none" />
                                        <path class="graph-fill"
                                            d="M 0 100 L 50 80 L 100 60 L 150 70 L 200 40 L 250 30 L 300 20 L 300 150 L 0 150 Z"
                                            fill="url(#graphGradient)" />
                                    </svg>
                                </div>

                                <div class="mini-stats" role="list" aria-label="Performance metrics">
                                    <div class="mini-stat-card" role="listitem">
                                        <i class="fas fa-arrow-up" aria-hidden="true"></i>
                                        <span>+200% Traffic</span>
                                    </div>
                                    <div class="mini-stat-card" role="listitem">
                                        <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                                        <span>30% Savings</span>
                                    </div>
                                    <div class="mini-stat-card" role="listitem">
                                        <i class="fas fa-clock" aria-hidden="true"></i>
                                        <span>Fast Delivery</span>
                                    </div>
                                </div>
                            </div>
                            <figcaption class="visually-hidden">Dashboard showing results achieved for clients</figcaption>
                        </figure>

                        <div class="feature-float-icons" aria-hidden="true">
                            <div class="float-icon icon-1"><i class="fas fa-rocket"></i></div>
                            <div class="float-icon icon-2"><i class="fas fa-shield-alt"></i></div>
                            <div class="float-icon icon-3"><i class="fas fa-bolt"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="features-content">
                        <span class="section-label">Why Choose Us</span>
                        <h2 class="section-title-creative-dark" id="features-heading">
                            Why Noidas Choose Shiva Tech Digital?
                        </h2>
                        <p class="features-description">
                            As a <strong>startup ourselves</strong>, we understand your budget constraints. 
                            That's why we offer <strong>big agency quality at-friendly prices</strong>.
                        </p>

                        <div class="feature-items" role="list">
                            <article class="feature-item-creative" data-aos="fade-up" data-aos-delay="100" role="listitem">
                                <div class="feature-icon-box" aria-hidden="true">
                                    <i class="fas fa-rupee-sign"></i>
                                </div>
                                <div class="feature-content-box">
                                    <h3 style="color:white">Affordable Pricing</h3>
                                    <p>30-50% cheaper than big agencies in Noida. No hidden costs, transparent quotes.</p>
                                </div>
                            </article>

                            <article class="feature-item-creative" data-aos="fade-up" data-aos-delay="200" role="listitem">
                                <div class="feature-icon-box" aria-hidden="true">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="feature-content-box">
                                    <h3 style="color:white">Direct Founder Access</h3>
                                    <p>Talk directly with decision makers, not account managers. Faster decisions, better results.</p>
                                </div>
                            </article>

                            <article class="feature-item-creative" data-aos="fade-up" data-aos-delay="300" role="listitem">
                                <div class="feature-icon-box" aria-hidden="true">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <div class="feature-content-box">
                                    <h3 style="color:white">Fast Turnaround</h3>
                                    <p>Startup agility means faster delivery. No corporate bureaucracy slowing things down.</p>
                                </div>
                            </article>

                            <article class="feature-item-creative" data-aos="fade-up" data-aos-delay="400" role="listitem">
                                <div class="feature-icon-box" aria-hidden="true">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div class="feature-content-box">
                                    <h3 style="color:white">Flexible Payment</h3>
                                    <p>EMI options, milestone-based payments. We work with your budget constraints.</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         TESTIMONIALS SECTION - NOIDA
    ======================================== -->
    <section class="testimonials-creative py-5" id="testimonials" aria-labelledby="testimonials-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Client Testimonials</span>
                <h2 class="section-title-creative-dark" id="testimonials-heading">What Our Delhi NCR Clients Say</h2>
                <p class="section-subtitle-creative">Real feedback froms and businesses in Noida and Delhi NCR</p>
            </header>

            <div class="testimonials-slider" data-aos="fade-up" data-aos-delay="200" role="region" aria-label="Client testimonials carousel">
                <div class="testimonials-track" id="testimonialsTrack">
                    
                    <!-- Testimonial 1 - Noida -->
                    <article class="testimonial-card-creative" itemscope itemtype="https://schema.org/Review">
                        <meta itemprop="itemReviewed" content="Shiva Tech Digital Web Development Services">
                        <div class="testimonial-bg-glow" aria-hidden="true"></div>
                        <div class="client-info-creative mb-3">
                            <div class="client-avatar">
                                <img src="{{ asset('web_assets/img/testimonials/client-1.jpg') }}" 
                                     alt="Vikram Singh - Founder of NoidaTech"
                                     loading="lazy"
                                     width="60"
                                     height="60"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Vikram+Singh&background=667eea&color=fff'">
                                <div class="avatar-ring" aria-hidden="true"></div>
                            </div>
                            <div class="client-details">
                                <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
                                    <span itemprop="name">Vikram Singh</span>
                                </h3>
                                <p class="client-position">Founder, NoidaTech</p>
                                <div class="stars-rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" aria-label="5 out of 5 stars">
                                    <meta itemprop="ratingValue" content="5">
                                    <meta itemprop="bestRating" content="5">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <blockquote class="testimonial-text" itemprop="reviewBody">
                            "As a fellow in Noida, I was looking for affordable web development. Shiva Tech Digital delivered our MVP in just 3 weeks at half the price of other agencies. The founder personally handled our project. Highly recommend fors!"
                        </blockquote>
                        <meta itemprop="datePublished" content="2024-10-15">
                    </article>

                    <!-- Testimonial 2 - Delhi NCR Business -->
                    <article class="testimonial-card-creative" itemscope itemtype="https://schema.org/Review">
                        <meta itemprop="itemReviewed" content="Shiva Tech Digital Mobile App Development">
                        <div class="testimonial-bg-glow" aria-hidden="true"></div>
                        <div class="client-info-creative mb-3">
                            <div class="client-avatar">
                                <img src="{{ asset('web_assets/img/testimonials/client-2.jpg') }}" 
                                     alt="Anita Sharma - Owner of Delhi Fashion Store"
                                     loading="lazy"
                                     width="60"
                                     height="60"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Anita+Sharma&background=e91e63&color=fff'">
                                <div class="avatar-ring" aria-hidden="true"></div>
                            </div>
                            <div class="client-details">
                                <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
                                    <span itemprop="name">Anita Sharma</span>
                                </h3>
                                <p class="client-position">Owner, Delhi Fashion Store</p>
                                <div class="stars-rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" aria-label="5 out of 5 stars">
                                    <meta itemprop="ratingValue" content="5">
                                    <meta itemprop="bestRating" content="5">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <blockquote class="testimonial-text" itemprop="reviewBody">
                            "Needed an e-commerce website on a tight budget. Shiva Tech Digital built a beautiful Shopify store with custom features. They even offered EMI payment option. Best affordable web developer in Delhi NCR!"
                        </blockquote>
                        <meta itemprop="datePublished" content="2024-11-20">
                    </article>

                    <!-- Testimonial 3 - Greater Noida -->
                    <article class="testimonial-card-creative" itemscope itemtype="https://schema.org/Review">
                        <meta itemprop="itemReviewed" content="Shiva Tech Digital SEO Services">
                        <div class="testimonial-bg-glow" aria-hidden="true"></div>
                        <div class="client-info-creative mb-3">
                            <div class="client-avatar">
                                <img src="{{ asset('web_assets/img/testimonials/client-3.jpg') }}" 
                                     alt="Rahul Gupta - CEO of Greater Noida IT Solutions"
                                     loading="lazy"
                                     width="60"
                                     height="60"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Rahul+Gupta&background=00bcd4&color=fff'">
                                <div class="avatar-ring" aria-hidden="true"></div>
                            </div>
                            <div class="client-details">
                                <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
                                    <span itemprop="name">Rahul Gupta</span>
                                </h3>
                                <p class="client-position">CEO, GN IT Solutions</p>
                                <div class="stars-rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" aria-label="5 out of 5 stars">
                                    <meta itemprop="ratingValue" content="5">
                                    <meta itemprop="bestRating" content="5">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <blockquote class="testimonial-text" itemprop="reviewBody">
                            "Their SEO work got our Greater Noida business from page 5 to page 1 in Google within 3 months. Very affordable monthly packages compared to other agencies. Direct WhatsApp communication with the team is a plus!"
                        </blockquote>
                        <meta itemprop="datePublished" content="2024-12-10">
                    </article>

                    <!-- Testimonial 4 - Gurgaon -->
                    <article class="testimonial-card-creative" itemscope itemtype="https://schema.org/Review">
                        <meta itemprop="itemReviewed" content="Shiva Tech Digital App Development">
                        <div class="testimonial-bg-glow" aria-hidden="true"></div>
                        <div class="client-info-creative mb-3">
                            <div class="client-avatar">
                                <img src="{{ asset('web_assets/img/testimonials/client-4.jpg') }}" 
                                     alt="Priya Mehta - Founder of Gurgaon Food Delivery App"
                                     loading="lazy"
                                     width="60"
                                     height="60"
                                     onerror="this.src='https://ui-avatars.com/api/?name=Priya+Mehta&background=9c27b0&color=fff'">
                                <div class="avatar-ring" aria-hidden="true"></div>
                            </div>
                            <div class="client-details">
                                <h3 itemprop="author" itemscope itemtype="https://schema.org/Person">
                                    <span itemprop="name">Priya Mehta</span>
                                </h3>
                                <p class="client-position">Founder, FoodieGurgaon App</p>
                                <div class="stars-rating" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" aria-label="5 out of 5 stars">
                                    <meta itemprop="ratingValue" content="5">
                                    <meta itemprop="bestRating" content="5">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <blockquote class="testimonial-text" itemprop="reviewBody">
                            "Got my food delivery app built by Shiva Tech Digital at 40% less cost than Gurgaon agencies quoted. Flutter app works smoothly on both Android and iOS. They understood budget constraints. Recommend to all Delhi NCRs!"
                        </blockquote>
                        <meta itemprop="datePublished" content="2025-01-05">
                    </article>
                </div>

                <nav class="slider-controls" aria-label="Testimonials navigation">
                    <button class="slider-btn prev-btn" id="prevTestimonial" aria-label="View previous testimonial">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <div class="slider-dots" id="testimonialDots" role="tablist" aria-label="Testimonial slides"></div>
                    <button class="slider-btn next-btn" id="nextTestimonial" aria-label="View next testimonial">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </nav>
            </div>

            <!-- Trust Badges - Realistic for -->
            <div class="trust-badges" data-aos="fade-up" data-aos-delay="400" role="list" aria-label="Trust indicators">
                <div class="trust-badge" role="listitem">
                    <i class="fas fa-star" aria-hidden="true"></i>
                    <div>
                        <strong>4.9/5</strong>
                        <span>Google Rating</span>
                    </div>
                </div>
                <div class="trust-badge" role="listitem">
                    <i class="fas fa-project-diagram" aria-hidden="true"></i>
                    <div>
                        <strong>50+</strong>
                        <span>Projects Done</span>
                    </div>
                </div>
                <div class="trust-badge" role="listitem">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <div>
                        <strong>30+</strong>
                        <span>Happy Clients</span>
                    </div>
                </div>
                <div class="trust-badge" role="listitem">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <div>
                        <strong>Delhi NCR</strong>
                        <span>Based</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ========================================
         PARTNERS/TECHNOLOGIES SECTION
    ======================================== -->
    <section class="partners-creative py-5" id="partners" aria-labelledby="partners-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Technology Stack</span>
                <h2 class="section-title-creative-dark text-white" id="partners-heading">Technologies We Use for Your Project</h2>
                <p class="section-subtitle-creative">
                    We use modern, industry-standard technologies to build fast, scalable, and secure applications
                </p>
            </header>
    
            <div class="row g-4 justify-content-center" role="list" aria-label="Technologies and platforms we use">
                @forelse($partners as $partner)
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}" role="listitem">
                        <article class="partner-card" itemscope itemtype="https://schema.org/Organization">
                            <div class="partner-logo">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}"
                                         alt="{{ $partner->name }} - {{ $partner->type ?? 'Technology' }} used by Shiva Tech Digital Noida"
                                         class="partner-logo-img"
                                         loading="lazy"
                                         width="80"
                                         height="60"
                                         itemprop="logo">
                                @else
                                    <i class="fa-brands fa-aws" aria-hidden="true"></i>
                                @endif
                            </div>
                            <h3 itemprop="name">{{ $partner->name ?? 'Partner' }}</h3>
                            <span class="partner-type" itemprop="description">{{ $partner->type ?? 'Technology Partner' }}</span>
                        </article>
                    </div>
                @empty
                    <!-- Default technology partners -->
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-laravel" aria-label="Laravel Framework"></i>
                            </div>
                            <h3>Laravel</h3>
                            <span class="partner-type">Backend Framework</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-react" aria-label="React.js"></i>
                            </div>
                            <h3>React</h3>
                            <span class="partner-type">Frontend Library</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-vuejs" aria-label="Vue.js"></i>
                            </div>
                            <h3>Vue.js</h3>
                            <span class="partner-type">Frontend Framework</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-solid fa-mobile-screen" aria-label="Flutter"></i>
                            </div>
                            <h3>Flutter</h3>
                            <span class="partner-type">Mobile Framework</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-node-js" aria-label="Node.js"></i>
                            </div>
                            <h3>Node.js</h3>
                            <span class="partner-type">Backend Runtime</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="600" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-aws" aria-label="AWS"></i>
                            </div>
                            <h3>AWS</h3>
                            <span class="partner-type">Cloud Platform</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="700" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-brands fa-shopify" aria-label="Shopify"></i>
                            </div>
                            <h3>Shopify</h3>
                            <span class="partner-type">E-commerce</span>
                        </article>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="800" role="listitem">
                        <article class="partner-card">
                            <div class="partner-logo">
                                <i class="fa-solid fa-credit-card" aria-label="Razorpay"></i>
                            </div>
                            <h3>Razorpay</h3>
                            <span class="partner-type">Payments</span>
                        </article>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ========================================
         FAQ SECTION - NOIDA FOCUSED
    ======================================== -->
    <section class="faq-section py-5" id="faq" aria-labelledby="faq-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">FAQ</span>
                <h2 class="section-title-creative-dark" id="faq-heading">Frequently Asked Questions</h2>
                <p class="section-subtitle-creative">Common questions about our affordable web development services in Noida, Delhi NCR</p>
            </header>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        
                        <!-- FAQ Item 1 - NOIDA -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="accordion-header" id="faqHeading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                                    What web development services does Shiva Tech Digital offer in Noida?
                                </button>
                            </h3>
                            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>We offer affordable web development services in Noida including:</p>
                                    <ul>
                                        <li><strong>Startup Websites:</strong> MVP development, landing pages, company websites</li>
                                        <li><strong>E-commerce:</strong> Shopify, WooCommerce, custom e-commerce solutions</li>
                                        <li><strong>Web Applications:</strong> Laravel, React.js, Vue.js, Node.js development</li>
                                        <li><strong>Mobile Apps:</strong> Flutter, React Native (iOS & Android)</li>
                                        <li><strong>Digital Marketing:</strong> SEO, Google Ads, Social Media Marketing</li>
                                    </ul>
                                    <p>We serves and businesses across <strong>Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad, Faridabad</strong> and the entire Delhi NCR region.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 - Affordable Pricing -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="accordion-header" id="faqHeading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                                    How much does website development cost in Noida?
                                </button>
                            </h3>
                            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Our affordable website development pricing in Noida:</p>
                                    <ul>
                                        <li><strong>Startup Landing Page:</strong> ₹5,000 - ₹10,000</li>
                                        <li><strong>Business Website (5-10 pages):</strong> ₹10,000 - ₹20,000</li>
                                        <li><strong>E-commerce Website:</strong> ₹10,000 - ₹25,000</li>
                                        <li><strong>Custom Web Application:</strong> ₹20,000+</li>
                                        <li><strong>Mobile App (Flutter):</strong> ₹30,000 - ₹3,00,000</li>
                                    </ul>
                                    <p><strong>EMI options available!</strong> We offer flexible payment plans fors. <a href="{{ route('contact') }}">Contact us</a> at +91-7007294764 for a free quote.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="accordion-header" id="faqHeading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                                    How long does it take to build a website in Noida?
                                </button>
                            </h3>
                            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Our fast turnaround times:</p>
                                    <ul>
                                        <li><strong>Landing Page:</strong> 3-5 days</li>
                                        <li><strong>Business Website:</strong> 1-2 weeks</li>
                                        <li><strong>E-commerce Store:</strong> 2-4 weeks</li>
                                        <li><strong>Custom Web App:</strong> 4-8 weeks</li>
                                        <li><strong>Mobile App:</strong> 6-12 weeks</li>
                                    </ul>
                                    <p>As a, we move fast! No corporate bureaucracy means quicker delivery.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="accordion-header" id="faqHeading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                                    Why should I choose Shiva Tech Digital over bigger agencies in Noida?
                                </button>
                            </h3>
                            <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p><strong>Reasonss choose us:</strong></p>
                                    <ul>
                                        <li><strong>30-50% cheaper</strong> than big agencies in Noida/Gurgaon</li>
                                        <li><strong>Direct founder access</strong> - talk to decision makers, not account managers</li>
                                        <li><strong>Faster delivery</strong> - no corporate red tape</li>
                                        <li><strong>Flexible payments</strong> - EMI and milestone-based options</li>
                                        <li><strong>Personal attention</strong> - you're not just a ticket number</li>
                                        <li><strong>Startup mindset</strong> - we understand budget constraints</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 - Location NOIDA -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                            <h3 class="accordion-header" id="faqHeading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                                    Where is Shiva Tech Digital located in Noida?
                                </button>
                            </h3>
                            <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p><strong>Our Location:</strong></p>
                                    <address>
                                        Shiva Tech Digital<br>
                                        Sector 62, Noida<br>
                                        Uttar Pradesh - 201301<br>
                                        India
                                    </address>
                                    <p><strong>We serve the entire Delhi NCR:</strong></p>
                                    <ul>
                                        <li>🏙️ <strong>Noida:</strong> All sectors including 62, 63, 18, 15, 16</li>
                                        <li>🏙️ <strong>Greater Noida:</strong> Knowledge Park, Alpha, Beta, Gamma</li>
                                        <li>🏙️ <strong>Delhi:</strong> South Delhi, East Delhi, Central Delhi</li>
                                        <li>🏙️ <strong>Gurgaon:</strong> Cyber City, Golf Course Road, Sohna Road</li>
                                        <li>🏙️ <strong>Ghaziabad:</strong> Indirapuram, Vaishali, Kaushambi</li>
                                        <li>🏙️ <strong>Faridabad:</strong> Sector 15, 16, Ballabgarh</li>
                                    </ul>
                                    <p><strong>Contact:</strong> <a href="tel:+917007294764">+91-7007294764</a> | <a href="mailto:info@shivatechdigital.com">info@shivatechdigital.com</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                            <h3 class="accordion-header" id="faqHeading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                                    Do you offer support after website launch?
                                </button>
                            </h3>
                            <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes! All projects include:</p>
                                    <ul>
                                        <li><strong>1 Month Free Support:</strong> Bug fixes and minor changes</li>
                                        <li><strong>WhatsApp Support:</strong> Direct communication with our team</li>
                                        <li><strong>Training:</strong> How to manage your website/app</li>
                                        <li><strong>Documentation:</strong> User guides and admin manuals</li>
                                    </ul>
                                    <p>Optional maintenance packages from <strong>₹3,000/month</strong> for ongoing support, updates, and backups.</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CTA SECTION - NOIDA
    ======================================== -->
    <section class="cta-creative" id="contact-cta" aria-labelledby="cta-heading">
        <div class="cta-bg-animation" aria-hidden="true">
            <div class="cta-orb orb-1"></div>
            <div class="cta-orb orb-2"></div>
            <div class="cta-orb orb-3"></div>
        </div>

        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <div class="cta-icon-large" aria-hidden="true">
                    <i class="fas fa-rocket"></i>
                </div>
                <h2 class="section-title-creative-dark" id="cta-heading">Ready to Build Your Website or App in Noida?</h2>
                <p>Let's discuss your project. <strong>Free consultation</strong>, no obligation. 
                   We'll provide honest advice and affordable pricing for your or business.</p>

                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary" title="Get free consultation for web development in Noida">
                        <span>Get Free Consultation</span>
                        <i class="fas fa-arrow-right ms-2" aria-hidden="true"></i>
                    </a>
                    <a href="tel:+917007294764" class="btn-cta-secondary" title="Call Shiva Tech Digital Noida">
                        <span><i class="fas fa-phone me-2" aria-hidden="true"></i> +91-7007294764</span>
                    </a>
                </div>

                <div class="cta-features" role="list" aria-label="Our guarantees">
                    <div class="cta-feature" role="listitem">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Free Consultation</span>
                    </div>
                    <div class="cta-feature" role="listitem">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Affordable Pricing</span>
                    </div>
                    <div class="cta-feature" role="listitem">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>EMI Available</span>
                    </div>
                    <div class="cta-feature" role="listitem">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Fast Delivery</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        // ========================================
        // COUNTER ANIMATION FOR STATS
        // ========================================
        const counters = document.querySelectorAll('.stat-number');
        
        const animateCounter = (counter) => {
            const target = parseFloat(counter.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const updateCounter = () => {
                current += step;
                if (current < target) {
                    if (Number.isInteger(target)) {
                        counter.textContent = Math.floor(current) + '+';
                    } else {
                        counter.textContent = current.toFixed(1);
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    if (Number.isInteger(target)) {
                        counter.textContent = target + '+';
                    } else {
                        counter.textContent = target.toFixed(1);
                    }
                }
            };
            
            updateCounter();
        };
        
        // Intersection Observer for triggering counter animation when visible
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => counterObserver.observe(counter));

        // ========================================
        // FORM VALIDATION
        // ========================================
        const leadForm = document.getElementById('leadForm');
        if (leadForm) {
            leadForm.addEventListener('submit', function(e) {
                const phone = document.getElementById('lead-contact').value;
                const phoneRegex = /^[\+]?[0-9\-\s]{10,15}$/;
                
                if (!phoneRegex.test(phone.replace(/\s/g, ''))) {
                    e.preventDefault();
                    alert('Please enter a valid phone number (e.g., +91-7007294764)');
                    return false;
                }
            });
        }

        // ========================================
        // SMOOTH SCROLL
        // ========================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId !== '#') {
                    e.preventDefault();
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // ========================================
        // TESTIMONIAL SLIDER
        // ========================================
        let currentTestimonial = 0;
        const testimonialTrack = document.getElementById('testimonialsTrack');
        const testimonialCards = testimonialTrack ? testimonialTrack.querySelectorAll('.testimonial-card-creative') : [];
        const prevBtn = document.getElementById('prevTestimonial');
        const nextBtn = document.getElementById('nextTestimonial');
        const dotsContainer = document.getElementById('testimonialDots');

        if (testimonialCards.length > 0 && dotsContainer) {
            // Create dots
            testimonialCards.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.classList.add('slider-dot');
                if (index === 0) dot.classList.add('active');
                dot.setAttribute('aria-label', `Go to testimonial ${index + 1}`);
                dot.addEventListener('click', () => goToTestimonial(index));
                dotsContainer.appendChild(dot);
            });

            function goToTestimonial(index) {
                currentTestimonial = index;
                const cardWidth = testimonialCards[0].offsetWidth + 30;
                testimonialTrack.style.transform = `translateX(-${index * cardWidth}px)`;
                
                dotsContainer.querySelectorAll('.slider-dot').forEach((dot, i) => {
                    dot.classList.toggle('active', i === index);
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    currentTestimonial = currentTestimonial > 0 ? currentTestimonial - 1 : testimonialCards.length - 1;
                    goToTestimonial(currentTestimonial);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    currentTestimonial = currentTestimonial < testimonialCards.length - 1 ? currentTestimonial + 1 : 0;
                    goToTestimonial(currentTestimonial);
                });
            }

            // Auto-play
            setInterval(() => {
                currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
                goToTestimonial(currentTestimonial);
            }, 5000);
        }

    });
</script>
@endpush