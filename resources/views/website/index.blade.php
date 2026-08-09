<!DOCTYPE html>
<html lang="en-IN">
<head>
    
    
    {{-- Preconnect to external domains for faster loading --}}
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://www.google-analytics.com">

    {{-- Preload Critical Assets --}}
    <link rel="preload" href="{{ asset('web_assets/img/logo.png') }}" as="image">
    
    {{-- Google tag --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TS4TFY4TL7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-TS4TFY4TL7');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msvalidate.01" content="5CCECD56E4416531BD002FB491E542C6" />
    {{-- ============================================ --}}
    {{-- 🔥 DYNAMIC SEO META - AUTO-MANAGED VIA CRM --}}
    {{-- ============================================ --}}
    @php
        // Page slug priority:
        // 1. Explicitly set via @section('page_slug', 'xxx') in child views
        // 2. Auto-detect from current URL path
        $seoPageSlug = trim($__env->yieldContent('page_slug', request()->path()), '/');
        
        // Handle root URL (home page)
        if (empty($seoPageSlug) || $seoPageSlug === '/') {
            $seoPageSlug = 'home';
        }
    @endphp
    
    <x-seo-meta 
        :page-slug="$seoPageSlug"
        :default-title="$__env->yieldContent('title', 'Web Development Company in Noida | Shiva Tech Digital')"
        :default-description="$__env->yieldContent('meta_description', 'Affordable web development and digital marketing agency in Noida, Delhi NCR.')"
        :default-keywords="$__env->yieldContent('meta_keywords', 'web development Noida, digital marketing Delhi NCR, mobile app development Noida, SEO services Noida')"
    />
    
    {{-- Favicon & Icons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    
    {{-- Sitemap --}}
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('sitemap.xml') }}">
    
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "@id": "https://shivatechdigital.com/#organization",
        "name": "Shiva Tech Digital",
        "alternateName": ["ShivaTechDigital", "STD", "Shiva Tech Digital Noida"],
        "url": "https://shivatechdigital.com/",
        "logo": {
            "@type": "ImageObject",
            "url": "https://shivatechdigital.com/web_assets/img/logo.png",
            "width": 300,
            "height": 60
        },
        "image": "https://shivatechdigital.com/web_assets/img/og-default.jpg",
        "description": "Shiva Tech Digital is an affordable web development, mobile app development, and digital marketing startup based in Noida, Delhi NCR. We specialize in helping startups and SMEs build their digital presence with quality solutions at competitive prices.",
        "foundingDate": "2024",
        "foundingLocation": {
            "@type": "Place",
            "name": "Noida, Uttar Pradesh, India"
        },
        "numberOfEmployees": {
            "@type": "QuantitativeValue",
            "minValue": 5,
            "maxValue": 15
        },
        "slogan": "Affordable Web Development for Startups in Noida",
        "knowsAbout": [
            "Web Development",
            "Mobile App Development",
            "Laravel Development",
            "React.js Development",
            "Vue.js Development",
            "Flutter App Development",
            "SEO Services",
            "Digital Marketing",
            "E-commerce Development",
            "UI/UX Design"
        ],
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+91-7007294764",
            "contactType": "customer service",
            "email": "info@shivatechdigital.com",
            "areaServed": ["IN", "US", "GB", "AE", "AU"],
            "availableLanguage": ["English", "Hindi"],
            "hoursAvailable": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "opens": "09:00",
                "closes": "18:00"
            }
        }],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Sector 62",
            "addressLocality": "Noida",
            "addressRegion": "Uttar Pradesh",
            "postalCode": "201301",
            "addressCountry": "IN"
        },
        "areaServed": [
            {"@type": "City", "name": "Noida"},
            {"@type": "City", "name": "Greater Noida"},
            {"@type": "City", "name": "Delhi"},
            {"@type": "City", "name": "Gurgaon"},
            {"@type": "City", "name": "Ghaziabad"},
            {"@type": "City", "name": "Faridabad"},
            {"@type": "Country", "name": "India"}
        ],
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61585380713440",
            "https://www.instagram.com/shivatechdigital",
            "https://x.com/shivatechdigi",
            "https://www.linkedin.com/company/shivatechdigital"
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "@id": "https://shivatechdigital.com/#localbusiness",
        "name": "Shiva Tech Digital",
        "image": "https://shivatechdigital.com/web_assets/img/og-default.jpg",
        "logo": "https://shivatechdigital.com/web_assets/img/logo.png",
        "url": "https://shivatechdigital.com/",
        "telephone": "+91-7007294764",
        "email": "info@shivatechdigital.com",
        "priceRange": "$",
        "description": "Affordable web development and digital marketing startup in Noida, Delhi NCR.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Sector 62",
            "addressLocality": "Noida",
            "addressRegion": "Uttar Pradesh",
            "postalCode": "201301",
            "addressCountry": "IN"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "09:00",
                "closes": "18:00"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": "Saturday",
                "opens": "10:00",
                "closes": "16:00"
            }
        ],
        "currenciesAccepted": "INR, USD",
        "paymentAccepted": "Cash, Credit Card, UPI, Bank Transfer",
        "sameAs": [
            "https://www.facebook.com/profile.php?id=61585380713440",
            "https://www.instagram.com/shivatechdigital",
            "https://x.com/shivatechdigi",
            "https://www.linkedin.com/company/shivatechdigital"
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "@id": "https://shivatechdigital.com/#website",
        "name": "Shiva Tech Digital",
        "alternateName": "ShivaTechDigital Noida",
        "url": "https://shivatechdigital.com/",
        "description": "Affordable web development and digital marketing in Noida, Delhi NCR",
        "publisher": {
            "@id": "https://shivatechdigital.com/#organization"
        },
        "inLanguage": "en-IN",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "https://shivatechdigital.com"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "@id": "https://shivatechdigital.com/about#founder",
      "name": "Prashant Yadav",
      "givenName": "Prashant",
      "familyName": "Yadav",
      "jobTitle": "Founder & CEO",
      "description": "Founder and CEO of Shiva Tech Digital, a Noida-based web development, mobile app development, SEO, and digital marketing company.",
      "image": "https://shivatechdigital.com/storage/about/founder/rdWGwluoIQ6Xgh1G1xkl6lPcIoNeov9hotbWrXGI.png",
      "url": "https://shivatechdigital.com/about",
      "worksFor": {
        "@type": "Organization",
        "@id": "https://shivatechdigital.com/#organization",
        "name": "Shiva Tech Digital"
      },
    
      "alumniOf": {
        "@type": "Organization",
        "name": "Shiva Tech Digital"
      },
    
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Noida",
        "addressRegion": "Uttar Pradesh",
        "addressCountry": "IN"
      },
    
      "knowsAbout": [
        "Web Development",
        "Mobile App Development",
        "Digital Marketing",
        "SEO",
        "Business Strategy",
        "Startup Growth"
      ]
    
    }
    </script>
    @endverbatim
    
    {{-- Facebook App ID --}}
    <meta property="fb:app_id" content="1319656359706913">

    {{-- Page-specific additional meta (if any pages need custom) --}}
    @stack('additional-meta')

    {{-- Styles --}}
    @include('website.css.style')
    @stack('styles')
</head>

<body itemscope itemtype="https://schema.org/WebPage" style="padding-top: 0;">
    {{-- Skip to main content --}}
    <a href="#main-content" class="skip-link visually-hidden-focusable">Skip to main content</a>

    {{-- Header --}}
    <header role="banner">
        @include('website.components.navbar')
    </header>

    {{-- Spacer for fixed topbar + navbar (desktop: 36px topbar + ~72px navbar = 108px, mobile: ~72px) --}}
    <div class="navbar-spacer" style="height: 108px;"></div>
    <style>
        @media (max-width: 991px) { .navbar-spacer { height: 72px !important; } }
    </style>

    {{-- Main Content --}}
    <main id="main-content" role="main" itemprop="mainContentOfPage">
        @yield('website.content')
    </main>

    {{-- Footer --}}
    <footer role="contentinfo">
        @include('website.components.footer')
    </footer>

    {{-- Scripts --}}
    @include('website.js.script')
    @stack('scripts')
</body>
</html>