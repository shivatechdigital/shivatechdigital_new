@extends('website.index')
{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'contact')
@push('styles')
<style>
    /* ========================================
       CONTACT PAGE SPECIFIC STYLES
    ======================================== */
    
    /* Page Header */
    .page-header-creative {
        position: relative;
        min-height: 340px;
        display: flex;
        align-items: center;
        overflow: hidden;
        background:
            linear-gradient(135deg, rgba(10,15,40,0.88) 0%, rgba(30,58,138,0.82) 100%),
            url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1400&q=80') center/cover no-repeat;
        padding: 110px 0 50px;
    }

    .page-header-creative::after {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
    }

    .page-header-bg { display: none; }
    .page-header-creative .container { position: relative; z-index: 1; }
    .contact-header-inner { max-width: 680px; }

    .page-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 18px;
        background: rgba(99,102,241,0.2);
        border: 1px solid rgba(99,102,241,0.4);
        border-radius: 50px;
        color: #a5b4fc;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 18px;
    }

    .page-title {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 14px;
        line-height: 1.2;
    }

    .page-title span {
        background: linear-gradient(90deg, #818cf8, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    @media (max-width: 768px) { .page-title { font-size: 1.8rem; } }

    .page-subtitle {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.72);
        max-width: 520px;
        line-height: 1.7;
        margin-bottom: 26px;
    }

    /* Hero quick contact pills */
    .hero-contact-pills { display: flex; gap: 12px; flex-wrap: wrap; }
    .hero-pill {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);
        border-radius: 50px; padding: 7px 16px; color: #fff; text-decoration: none;
        font-size: 0.82rem; font-weight: 600; transition: all 0.25s ease;
        backdrop-filter: blur(6px);
    }
    .hero-pill:hover { background: rgba(37,99,235,0.4); border-color: rgba(37,99,235,0.6); color: #fff; }
    .hero-pill i { font-size: 0.75rem; color: #60a5fa; }

    /* Quick Info */
    .contact-quick-info {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
    }

    .quick-info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .quick-info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .quick-info-item i {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.25rem;
    }

    .quick-info-item span {
        color: #fff;
        font-size: 1.1rem;
    }

    /* Contact Section */
    .contact-section {
        background: #f8f9fa;
    }

    /* Contact Info Card */
    .contact-info-creative {
        background: linear-gradient(160deg, #0f172a 0%, #1e3a8a 100%);
        padding: 28px;
        border-radius: 18px;
        height: 100%;
        box-shadow: 0 8px 32px rgba(15,23,42,0.2);
    }

    .contact-info-creative h3 {
        color: #fff;
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .contact-info-creative > p {
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 24px;
        font-size: 0.82rem;
        line-height: 1.6;
    }

    .contact-info-items {
        margin-bottom: 22px;
    }

    .contact-info-item {
        display: flex;
        gap: 14px;
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.07);
        align-items: flex-start;
    }

    .contact-info-item:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: rgba(99,102,241,0.2);
        border: 1px solid rgba(99,102,241,0.35);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .info-icon i {
        font-size: 0.95rem;
        color: #818cf8;
    }

    .info-content h5 {
        color: #94a3b8;
        font-size: 0.68rem;
        margin-bottom: 4px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-weight: 700;
    }

    .info-content p {
        color: rgba(255,255,255,0.9);
        margin: 0;
        font-size: 0.85rem;
        line-height: 1.55;
    }

    .info-content a { color: rgba(255,255,255,0.9); text-decoration: none; }
    .info-content a:hover { color: #60a5fa; }
    .info-content small { color: rgba(255,255,255,0.45) !important; font-size: 0.72rem; }
    .info-content strong { font-size: 0.82rem; color: rgba(255,255,255,0.75); }

    /* Social Links */
    .social-links-contact {
        display: flex;
        gap: 10px;
        margin-top: 20px;
        padding-top: 18px;
        border-top: 1px solid rgba(255,255,255,0.08);
    }

    .social-links-contact a {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.7);
        font-size: 0.8rem;
        transition: all 0.25s ease;
    }

    .social-links-contact a:hover {
        background: #2563eb;
        border-color: #2563eb;
        color: #fff;
        transform: translateY(-3px);
    }

    /* Contact Form Card */
    .contact-form-creative {
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    .contact-form-creative h3 {
        color: #1a1a2e;
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .contact-form-creative > p {
        color: #666;
        margin-bottom: 30px;
    }

    /* Form Styles */
    .form-group-creative {
        margin-bottom: 0;
    }

    .form-group-creative label {
        display: block;
        color: #1a1a2e;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        font-size: 1rem;
    }

    .form-control-creative {
        width: 100%;
        padding: 15px 20px 15px 50px;
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control-creative:focus {
        outline: none;
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .form-control-creative.is-invalid {
        border-color: #dc3545;
    }

    textarea.form-control-creative {
        min-height: 150px;
        resize: vertical;
    }

    select.form-control-creative {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23667eea' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 50px;
    }

    /* Submit Button */
    .btn-submit-creative {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 40px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .btn-submit-creative:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
    }

    .btn-submit-creative:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Map Section */
    .map-section {
        margin-top: 0;
    }

    .map-section iframe {
        filter: grayscale(0.3);
        transition: filter 0.3s ease;
    }

    .map-section iframe:hover {
        filter: grayscale(0);
    }

    /* FAQ Section */
    .bg-alternate {
        background: #fff;
    }

    .section-label {
        display: inline-block;
        padding: 6px 16px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 50px;
        color: #667eea;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-title-creative {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 15px;
    }

    .section-subtitle-creative {
        font-size: 1.1rem;
        color: #666;
    }

    @media (max-width: 768px) {
        .section-title-creative {
            font-size: 1.75rem;
        }
    }

    /* Accordion Styles */
    .accordion-creative {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .accordion-item-creative {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .accordion-button-creative {
        width: 100%;
        padding: 20px 25px;
        background: transparent;
        border: none;
        text-align: left;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1a1a2e;
        transition: all 0.3s ease;
    }

    .accordion-button-creative:not(.collapsed) {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
    }

    .accordion-button-creative i {
        color: #667eea;
        font-size: 1.25rem;
    }

    .accordion-button-creative::after {
        content: '\f107';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    .accordion-button-creative:not(.collapsed)::after {
        transform: rotate(-180deg);
    }

    .accordion-body-creative {
        padding: 0 25px 25px 60px;
        color: #666;
        line-height: 1.7;
    }

    /* Accessibility */
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

    /* Focus Styles */
    a:focus,
    button:focus,
    input:focus,
    select:focus,
    textarea:focus {
        outline: 2px solid #667eea;
        outline-offset: 2px;
    }

    /* Reduced Motion */
    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-info-creative {
            margin-bottom: 30px;
        }
    }
</style>
@endpush

@section('website.content')

    <!-- Breadcrumb Navigation (SEO) -->
    <nav aria-label="Breadcrumb" class="visually-hidden">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="https://shivatechdigital.com/">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="https://shivatechdigital.com/contact">
                    <span itemprop="name">Contact Us</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </nav>

    <!-- ========================================
         PAGE HEADER - CONTACT
    ======================================== -->
    <section class="page-header-creative" aria-labelledby="page-heading">
        <div class="container">
            <div class="contact-header-inner" data-aos="fade-up">
                <span class="page-badge"><i class="fas fa-headset"></i> Noida's Affordable Web Agency</span>
                <h1 class="page-title" id="page-heading">
                    Let's Build Something <span>Amazing</span> Together
                </h1>
                <p class="page-subtitle">
                    Have a project in mind? Get a free consultation for web development, mobile apps & digital marketing. Direct founder access — no middlemen.
                </p>
                <div class="hero-contact-pills">
                    <a href="tel:+917007294764" class="hero-pill"><i class="fas fa-phone"></i> +91-7007294764</a>
                    <a href="mailto:info@shivatechdigital.com" class="hero-pill"><i class="fas fa-envelope"></i> info@shivatechdigital.com</a>
                    <span class="hero-pill" style="cursor:default;"><i class="fas fa-map-marker-alt"></i> Sector 62, Noida</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CONTACT SECTION
    ======================================== -->
    <section class="contact-section py-5" id="contact-form" aria-labelledby="contact-heading">
        <div class="container">
            <div class="row g-4">
                <!-- Contact Info -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-creative">
                        <h2 id="contact-heading">Contact Information</h2>
                        <p>Reach out to Shiva Tech Digital for affordable web development, mobile apps, and digital marketing services in Noida, Delhi NCR. We're here to help!</p>
                        
                        <div class="contact-info-items" role="list">
                            <article class="contact-info-item" role="listitem" itemscope itemtype="https://schema.org/PostalAddress">
                                <div class="info-icon" aria-hidden="true">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h3 class="h5">Office Address</h3>
                                    <p itemprop="streetAddress">
                                        Sector 62, <span itemprop="addressLocality">Noida</span>, 
                                        <span itemprop="addressRegion">Uttar Pradesh</span> - 
                                        <span itemprop="postalCode">201301</span>, 
                                        <span itemprop="addressCountry">India</span>
                                    </p>
                                    <meta itemprop="name" content="Shiva Tech Digital">
                                </div>
                            </article>

                            <article class="contact-info-item" role="listitem">
                                <div class="info-icon" aria-hidden="true">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <h3 class="h5">Phone Number</h3>
                                    <p>
                                        <a href="tel:+917007294764" style="color: #fff; text-decoration: none;" itemprop="telephone">
                                            +91-7007294764
                                        </a>
                                        <br>
                                        <small style="color: rgba(255,255,255,0.7);">Available Monday-Saturday, 9 AM - 9 PM IST</small>
                                    </p>
                                </div>
                            </article>

                            <article class="contact-info-item" role="listitem">
                                <div class="info-icon" aria-hidden="true">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h3 class="h5">Email Address</h3>
                                    <p>
                                        <a href="mailto:info@shivatechdigital.com" style="color: #fff; text-decoration: none;" itemprop="email">
                                            info@shivatechdigital.com
                                        </a>
                                        <br>
                                        <small style="color: rgba(255,255,255,0.7);">We respond within 24 hours</small>
                                    </p>
                                </div>
                            </article>

                            <article class="contact-info-item" role="listitem">
                                <div class="info-icon" aria-hidden="true">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h3 class="h5">Business Hours</h3>
                                    <p>
                                        <strong>Monday - Saturday:</strong> 9:00 AM - 9:00 PM<br>
                                        <strong>Sunday:</strong> 11:30 AM - 7:00 PM<br>
                                    </p>
                                </div>
                            </article>
                        </div>

                        <div class="social-links-contact" role="list" aria-label="Social Media Links">
                            <a href="https://www.facebook.com/profile.php?id=61585380713440" target="_blank" rel="noopener noreferrer" aria-label="Visit our Facebook page" role="listitem">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="https://x.com/shivatechdigi" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Twitter" role="listitem">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com/shivatechdigital" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram" role="listitem">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/shivatechdigital" target="_blank" rel="noopener noreferrer" aria-label="Connect on LinkedIn" role="listitem">
                                <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form-creative">
                        <h2>Send Us a Message for Free Consultation</h2>
                        <p>Fill out the form below and we'll get back to you within 24 hours with a free consultation and quote</p>
                        
                        <form id="contactForm" method="POST" action="{{ route('contact.store') }}" aria-label="Contact form">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group-creative">
                                        <label for="name">Full Name <span style="color: #dc3545;">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-user" aria-hidden="true"></i>
                                            <input type="text" 
                                                   class="form-control-creative @error('name') is-invalid @enderror" 
                                                   id="name" 
                                                   name="name" 
                                                   value="{{ old('name') }}" 
                                                   required 
                                                   aria-required="true"
                                                   placeholder="Enter your full name">
                                        </div>
                                        @error('name')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group-creative">
                                        <label for="email">Email Address <span style="color: #dc3545;">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-envelope" aria-hidden="true"></i>
                                            <input type="email" 
                                                   class="form-control-creative @error('email') is-invalid @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email') }}" 
                                                   required 
                                                   aria-required="true"
                                                   placeholder="your.email@example.com">
                                        </div>
                                        @error('email')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group-creative">
                                        <label for="phone">Phone Number</label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-phone" aria-hidden="true"></i>
                                            <input type="tel" 
                                                   class="form-control-creative @error('phone') is-invalid @enderror" 
                                                   id="phone" 
                                                   name="phone" 
                                                   value="{{ old('phone') }}"
                                                   placeholder="+91-XXXXXXXXXX"
                                                   pattern="[0-9+\-\s]+">
                                        </div>
                                        @error('phone')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group-creative">
                                        <label for="service">Service Interested In <span style="color: #dc3545;">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-briefcase" aria-hidden="true"></i>
                                            <select class="form-control-creative @error('service') is-invalid @enderror" 
                                                    id="service" 
                                                    name="service" 
                                                    required 
                                                    aria-required="true">
                                                <option value="">Select a service</option>
                                                <option value="web" {{ old('service') == 'web' ? 'selected' : '' }}>Web Application Development</option>
                                                <option value="mobile" {{ old('service') == 'mobile' ? 'selected' : '' }}>Mobile App Development</option>
                                                <option value="ecommerce" {{ old('service') == 'ecommerce' ? 'selected' : '' }}>E-commerce Development</option>
                                                <option value="marketing" {{ old('service') == 'marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                                <option value="seo" {{ old('service') == 'seo' ? 'selected' : '' }}>SEO Services</option>
                                                <option value="ui" {{ old('service') == 'ui' ? 'selected' : '' }}>UI/UX Design</option>
                                                <option value="laravel" {{ old('service') == 'laravel' ? 'selected' : '' }}>Laravel Development</option>
                                                <option value="react" {{ old('service') == 'react' ? 'selected' : '' }}>React Development</option>
                                                <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other Services</option>
                                            </select>
                                        </div>
                                        @error('service')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group-creative">
                                        <label for="subject">Subject <span style="color: #dc3545;">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-tag" aria-hidden="true"></i>
                                            <input type="text" 
                                                   class="form-control-creative @error('subject') is-invalid @enderror" 
                                                   id="subject" 
                                                   name="subject" 
                                                   value="{{ old('subject') }}" 
                                                   required 
                                                   aria-required="true"
                                                   placeholder="Brief subject of your inquiry">
                                        </div>
                                        @error('subject')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group-creative">
                                        <label for="message">Your Message <span style="color: #dc3545;">*</span></label>
                                        <div class="input-wrapper">
                                            <i class="fas fa-comment" aria-hidden="true"></i>
                                            <textarea class="form-control-creative @error('message') is-invalid @enderror" 
                                                      id="message" 
                                                      name="message" 
                                                      rows="6" 
                                                      required 
                                                      aria-required="true"
                                                      placeholder="Tell us about your project requirements, budget, and timeline...">{{ old('message') }}</textarea>
                                        </div>
                                        @error('message')
                                            <small class="text-danger" role="alert">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn-submit-creative" id="submitBtn" aria-label="Submit contact form">
                                        <span>Send Message</span>
                                        <i class="fas fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                    <p style="margin-top: 15px; font-size: 0.875rem; color: #666;">
                                        <i class="fas fa-lock" aria-hidden="true"></i> Your information is safe and will never be shared with third parties.
                                    </p>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Success/Error Messages -->
                        <div id="form-message" class="mt-3" style="display: none;" role="alert"></div>

                        @if(session('success'))
                            <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         MAP SECTION - NOIDA LOCATION
    ======================================== -->
    <section class="map-section" aria-label="Shiva Tech Digital office location on map">
        <div class="container-fluid p-0">
            <h2 class="visually-hidden">Our Office Location in Sector 62, Noida</h2>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3502.3495145180937!2d77.36763517550028!3d28.619285075672007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjjCsDM3JzA5LjQiTiA3N8KwMjInMTIuOCJF!5e0!3m2!1sen!2sin!4v1761968119860!5m2!1sen!2sin" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Shiva Tech Digital office location in Sector 62, Noida, Uttar Pradesh, India"
                aria-label="Google Maps showing Shiva Tech Digital office location in Noida">
            </iframe>
        </div>
    </section>

    <!-- ========================================
         FAQ SECTION - CONTACT RELATED
    ======================================== -->
    <section class="faq-section py-5 bg-alternate" id="contact-faq" aria-labelledby="faq-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Frequently Asked Questions</span>
                <h2 class="section-title-creative" id="faq-heading">Common Questions About Contacting Us</h2>
                <p class="section-subtitle-creative">Quick answers to help you reach us better</p>
            </header>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion-creative" id="faqAccordion">
                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>What services does Shiva Tech Digital offer?</span>
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    Shiva Tech Digital offers comprehensive digital solutions including <strong>web application development, mobile app development (iOS & Android), e-commerce development, digital marketing, SEO services, UI/UX design, Laravel development, React.js development, and cloud solutions</strong>. We specialize in affordable solutions for startups and SMEs in Noida, Delhi NCR.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>How can I contact Shiva Tech Digital in Noida?</span>
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    You can contact us by <strong>phone at +91-7007294764, email at info@shivatechdigital.com</strong>, or visit our office in <strong>Sector 62, Noida, Uttar Pradesh - 201301</strong>. We offer free consultation and are available <strong>Monday-Saturday, 9 AM to 6 PM IST</strong>. You can also fill out our contact form for a quick response within 24 hours.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="300">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>How long does a typical web development project take?</span>
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    Project timelines vary based on scope and complexity. A <strong>landing page takes 3-5 days, business website takes 1-2 weeks, e-commerce website takes 3-4 weeks, and custom web applications take 8-12 weeks</strong>. Mobile apps typically take 10-16 weeks. Digital marketing campaigns are ongoing. We provide detailed timelines during free consultation.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>Do you provide ongoing support after project completion?</span>
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    Yes! Shiva Tech Digital offers <strong>24/7 support and maintenance packages</strong>. Our support includes bug fixes, updates, security patches, performance optimization, and technical assistance. We provide flexible support plans tailored to your needs and budget. All projects come with free support during the warranty period.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="500">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>What is Shiva Tech Digital's pricing model?</span>
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    We offer <strong>startup-friendly pricing 30-50% lower than big agencies</strong>. We provide flexible payment options including fixed-price projects, hourly rates, milestone-based payments, and <strong>EMI options for larger projects</strong>. Transparent quotes with no hidden costs. Contact us for a custom quote tailored to your project requirements and budget.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="600">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>Do you work with startups and small businesses?</span>
                                </button>
                            </h3>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    Absolutely! Shiva Tech Digital <strong>specializes in working with startups and SMEs</strong>. We offer special startup packages, flexible payment terms, EMI options, and <strong>direct founder access</strong>. Being a startup ourselves, we understand budget constraints and provide quality solutions at affordable prices. We've helped 50+ startups in Noida and Delhi NCR.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="700">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>Where is Shiva Tech Digital located in Noida?</span>
                                </button>
                            </h3>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    Shiva Tech Digital is located in <strong>Sector 62, Noida, Uttar Pradesh - 201301, India</strong>. We serve clients across Delhi NCR including Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad, Faridabad, and internationally. We're available for <strong>in-person meetings in Delhi NCR</strong> and virtual meetings worldwide.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item-creative" data-aos="fade-up" data-aos-delay="800">
                            <h3 class="accordion-header">
                                <button class="accordion-button-creative collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                                    <i class="fas fa-question-circle" aria-hidden="true"></i>
                                    <span>What technologies does Shiva Tech Digital use?</span>
                                </button>
                            </h3>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body-creative">
                                    We use modern technologies including <strong>Laravel, React.js, Vue.js, Node.js, Flutter, React Native, PHP, Python, MySQL, PostgreSQL, MongoDB, AWS, and more</strong>. We choose the best technology stack based on your project requirements to ensure scalability, security, performance, and maintainability. Our team stays updated with the latest industry trends.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
(function() {
    'use strict';
    
    // ========================================
    // AJAX CONTACT FORM SUBMISSION
    // ========================================
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = document.getElementById('submitBtn');
            const formMessage = document.getElementById('form-message');
            
            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span>Sending...</span> <i class="fas fa-spinner fa-spin"></i>';
            
            // Get CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                            || document.querySelector('input[name="_token"]')?.value;
            
            // Send AJAX request
            fetch(contactForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                return response.json().then(data => ({
                    status: response.status,
                    ok: response.ok,
                    data: data
                }));
            })
            .then(({status, ok, data}) => {
                if (ok && data.success) {
                    // Show success message
                    formMessage.className = 'alert alert-success alert-dismissible fade show';
                    formMessage.innerHTML = `
                        <i class="fas fa-check-circle"></i> ${data.message || 'Thank you for contacting Shiva Tech Digital! We will get back to you within 24 hours.'}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                    formMessage.style.display = 'block';
                    
                    // Reset form
                    contactForm.reset();
                    
                    // Scroll to message
                    formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    
                    // Track conversion (Google Analytics)
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'form_submit', {
                            'event_category': 'Contact',
                            'event_label': 'Contact Form Submission'
                        });
                    }
                    
                    // Hide message after 10 seconds
                    setTimeout(() => {
                        formMessage.style.display = 'none';
                    }, 10000);
                    
                } else {
                    // Show error message
                    let errorMessage = data.message || 'Something went wrong. Please try again or call us at +91-7007294764.';
                    
                    // Handle validation errors
                    if (data.errors) {
                        errorMessage = '<strong>Please fix the following errors:</strong><ul class="mb-0 mt-2" style="padding-left: 20px;">';
                        Object.values(data.errors).forEach(errors => {
                            errors.forEach(error => {
                                errorMessage += `<li>${error}</li>`;
                            });
                        });
                        errorMessage += '</ul>';
                    }
                    
                    formMessage.className = 'alert alert-danger alert-dismissible fade show';
                    formMessage.innerHTML = `
                        <i class="fas fa-exclamation-circle"></i> ${errorMessage}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                    formMessage.style.display = 'block';
                    formMessage.setAttribute('role', 'alert');
                    
                    // Scroll to message
                    formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                formMessage.className = 'alert alert-danger alert-dismissible fade show';
                formMessage.innerHTML = `
                    <i class="fas fa-exclamation-circle"></i> An error occurred. Please try again later or contact us directly at +91-7007294764 or info@shivatechdigital.com.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                formMessage.style.display = 'block';
                formMessage.setAttribute('role', 'alert');
            })
            .finally(() => {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Send Message</span> <i class="fas fa-paper-plane"></i>';
            });
        });
    }

    // ========================================
    // PHONE NUMBER FORMATTING
    // ========================================
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove non-numeric characters except + and -
            let value = e.target.value.replace(/[^\d+\-\s]/g, '');
            e.target.value = value;
        });
    }

})();
</script>
@endpush