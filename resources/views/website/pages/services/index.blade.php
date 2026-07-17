@extends('website.index')

@section('hero-title', 'Our Digital Services')
@section('service-name', 'Digital Services')
@section('service-name-lower', 'digital services')
@section('hero-description',
'Explore our professional web development, mobile app development, cloud solutions, SEO, and digital marketing services.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('web_assets/css/services.css') }}">
@endpush

@section('website.content')

<style>
    .related-service-card:hover .explore-link {
        gap: 0.75rem;
    }
    
    .explore-link i {
        transition: var(--transition-normal);
    }
    
    .related-service-card:hover .explore-link i {
        transform: translateX(5px);
    }
    
    .cta-contact-info{
        display: flex;
        text-align: center;
        justify-content: center;
        margin-bottom: 3rem;
    }
    
    .cta-contact-info .contact-item
    {
        border: 2px solid grey;
        padding: 10px 15px;
        border-radius: 20px;
        color: lightblue;
    }
    .cta-contact-info .contact-item a{
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: white;
    }
</style>

    {{-- Breadcrumb (visible navigation) --}}
    <section class="service-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('services.index') }}">Services</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        @yield('breadcrumb-title', 'Our Services')
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Service Hero --}}
    <section class="service-hero-section">
        <div class="service-hero-bg">
            <div class="hero-gradient"></div>
            <div class="hero-particles"></div>
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-60">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-hero-content">
                        <span class="service-category-badge">@yield('service-category', 'Digital Solutions')</span>
                        <h1 class="service-hero-title text-white">
                            @yield('hero-title', 'Our Services')
                        </h1>
                        <p class="service-hero-description">@yield('hero-description')</p>
                        <div class="service-hero-cta mb-4 mt-4">
                            <a href="{{ route('contact') }}" class="btn-primary-service">
                                <span>Get Free Consultation</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="tel:+917007294764" class="btn-secondary-service">
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

    {{-- Main Service Content --}}
    @yield('service-content')

    {{-- Why Choose Us --}}
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

    {{-- Process Section --}}
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

    {{-- Technologies/Tools Section --}}
    @yield('technologies-section')

    {{-- Pricing Section --}}
    @yield('pricing-section')

    {{-- Case Studies / Portfolio --}}
    @yield('case-studies-section')

    {{-- Testimonials Section --}}
    @yield('testimonials-section')

    {{-- ============================================ --}}
    {{-- 🔥 FAQ SECTION - DB-DRIVEN (NEW LOGIC)     --}}
    {{-- ============================================ --}}
    @hasSection('faqs-section')
        {{-- If page has custom FAQs section, render it --}}
        @yield('faqs-section')
    @else
        {{-- Otherwise, load from DB based on current route slug --}}
        @php
            $currentSlug = trim($__env->yieldContent('seo_slug', ''));
            $faqsFromDb = [];
            
            if ($currentSlug) {
                $pageMeta = \App\Models\ServiceMeta::where('page_slug', $currentSlug)->first();
                
                if ($pageMeta && $pageMeta->faq_schema) {
                    $faqData = json_decode($pageMeta->faq_schema, true);
                    if (isset($faqData['mainEntity'])) {
                        foreach ($faqData['mainEntity'] as $item) {
                            $faqsFromDb[] = [
                                'question' => $item['name'] ?? '',
                                'answer' => $item['acceptedAnswer']['text'] ?? ''
                            ];
                        }
                    }
                }
            }
            
            // Fallback to controller $faqs if DB is empty (backward compatibility)
            $finalFaqs = !empty($faqsFromDb) ? $faqsFromDb : ($faqs ?? []);
        @endphp
        
        @if(count($finalFaqs) > 0)
        <section class="service-faq py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="faq-header-side">
                            <span class="section-badge">FAQs</span>
                            <h2>Frequently Asked Questions About @yield('service-name')</h2>
                            <p>Find answers to common questions about our @yield('service-name-lower')</p>
                            <a href="{{ route('contact') }}" class="btn-faq-contact">
                                Still have questions?
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-left">
                        <div class="faq-accordion" id="serviceFaq">
                            @foreach($finalFaqs as $index => $faq)
                            <div class="faq-item">
                                <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                    <h3>{{ $faq['question'] }}</h3>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="faq{{ $index }}" class="faq-answer collapse {{ $index === 0 ? 'show' : '' }}">
                                    <div>
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
        @endif
    @endif

    {{-- Related Services --}}
    @if(isset($relatedServices) && count($relatedServices) > 0)
    <section class="related-services py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Explore More</span>
                <h2>Related Services</h2>
                <p class="section-subtitle">Discover other services that complement @yield('service-name-lower')</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($relatedServices as $related)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-step">
                        <a href="{{ route($related['route']) }}" class="related-service-card">
                            <div class="step-icon"><i class="{{ $related['icon'] }}"></i></div>
                            <h4>{{ $related['name'] }}</h4>
                            <span class="explore-link">Explore Service <i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="service-cta-section">
        <div class="cta-bg-gradient"></div>
        <div class="container">
            <div class="cta-content text-center mt-4" data-aos="zoom-in">
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
                        <a href="tel:+917007294764">
                            <i class="fas fa-phone"></i>
                            <span>+91 7007294764</span>
                        </a>
                    </div>
                    <div class="contact-item">
                        <a href="mailto:info@shivatechdigital.com">
                            <i class="fas fa-envelope"></i>
                            <span style="text-transform: lowercase !important">info@shivatechdigital.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection