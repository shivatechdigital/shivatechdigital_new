@extends('website.index')

@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="robots" content="index, follow">
<meta name="author" content="ShivaTechDigital">
@yield('service-specific-meta')
@endsection

@push('additional-meta')
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title')">
    <meta property="og:description" content="@yield('og_description')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="@yield('og_image', asset('web_assets/img/og-default.jpg'))">
    <meta property="og:site_name" content="Shiva Tech Digital">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title')">
    <meta name="twitter:description" content="@yield('twitter_description')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('web_assets/img/og-default.jpg'))">
    <meta name="twitter:site" content="@shivatechdigital">

    <!-- Schema Markup -->
    @yield('schema-markup')
@endpush

@section('website.content')
    <!-- Breadcrumb -->
    <section class="service-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ route('home') }}" itemprop="item">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ route('services.index') }}" itemprop="item">
                            <span itemprop="name">Services</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>
                    <li class="breadcrumb-item active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" aria-current="page">
                        <span itemprop="name">@yield('breadcrumb-title')</span>
                        <meta itemprop="position" content="3" />
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Service Hero -->
    <section class="service-hero-section">
        <div class="service-hero-bg">
            <div class="hero-gradient"></div>
            <div class="hero-particles"></div>
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-60">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-hero-content">
                        <span class="service-category-badge">@yield('service-category')</span>
                        <h1 class="service-hero-title">@yield('hero-title')</h1>
                        <p class="service-hero-description">@yield('hero-description')</p>
                        <div class="service-hero-cta">
                            <a href="{{ route('contact') }}" class="btn-primary-service">
                                <span>Get Free Consultation</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="tel:+919876543210" class="btn-secondary-service">
                                <i class="fas fa-phone"></i>
                                <span>Call Us Now</span>
                            </a>
                        </div>
                        <div class="hero-trust-badges">
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>@yield('trust-badge-1', 'Free Consultation')</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>@yield('trust-badge-2', 'Expert Team')</span>
                            </div>
                            <div class="trust-item">
                                <i class="fas fa-check-circle"></i>
                                <span>@yield('trust-badge-3', '24/7 Support')</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="service-hero-visual">
                        @yield('hero-image')
                        <div class="floating-stats">
                            @yield('hero-stats')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Service Content -->
    @yield('service-content')

    <!-- Why Choose Us -->
    <section class="why-choose-service py-5">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Why Shiva Tech Digital</span>
                <h2>Why Choose Us for @yield('service-name')?</h2>
                <p class="section-subtitle">Partner with experts who deliver results</p>
            </div>
            <div class="row g-4">
                @yield('why-choose-items')
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="service-process py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Our Process</span>
                <h2>How We Deliver @yield('service-name')</h2>
                <p class="section-subtitle">A proven methodology for success</p>
            </div>
            <div class="process-timeline">
                @yield('process-steps')
            </div>
        </div>
    </section>

    <!-- Technologies/Tools Section -->
    @yield('technologies-section')

    <!-- Pricing Section -->
    @yield('pricing-section')

    <!-- Case Studies / Portfolio -->
    @yield('case-studies-section')

    <!-- FAQ Section -->
    <section class="service-faq py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="faq-header-side">
                        <span class="section-badge">FAQs</span>
                        <h2>Frequently Asked Questions About @yield('service-name')</h2>
                        <p>Find answers to common questions about our @yield('service-name-lower') services</p>
                        <a href="{{ route('contact') }}" class="btn-faq-contact">
                            Still have questions?
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="faq-accordion" id="serviceFaq">
                        @foreach($faqs as $index => $faq)
                        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                <h3 itemprop="name">{{ $faq['question'] }}</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div id="faq{{ $index }}" class="faq-answer collapse {{ $index === 0 ? 'show' : '' }}" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                <div itemprop="text">
                                    <p>{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="related-services py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Explore More</span>
                <h2>Related Services</h2>
                <p class="section-subtitle">Discover other services that complement @yield('service-name-lower')</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($relatedServices as $related)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <a href="{{ route($related['route']) }}" class="related-service-card">
                        <div class="related-service-icon">
                            <i class="{{ $related['icon'] }}"></i>
                        </div>
                        <h4>{{ $related['name'] }}</h4>
                        <span class="explore-link">Explore Service <i class="fas fa-arrow-right"></i></span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="service-cta-section">
        <div class="cta-bg-gradient"></div>
        <div class="container">
            <div class="cta-content text-center" data-aos="zoom-in">
                <h2>Ready to Start Your @yield('service-name') Project?</h2>
                <p>Let's discuss your requirements and create something amazing together</p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary">
                        <i class="fas fa-rocket"></i>
                        <span>Start Your Project</span>
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn-cta-secondary">
                        <i class="fas fa-briefcase"></i>
                        <span>View Our Work</span>
                    </a>
                </div>
                <div class="cta-contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+91 98765 43210</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>hello@shivatechdigital.com</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection