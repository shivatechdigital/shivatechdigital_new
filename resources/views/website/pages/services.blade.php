@extends('website.index')
{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services')
@push('styles')
<style>
    /* ========================================
       SERVICES PAGE SPECIFIC STYLES
    ======================================== */
    
    /* Page Header */
    .page-header-creative {
        position: relative;
        padding: 120px 0 80px;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        overflow: hidden;
    }

    .page-header-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .header-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.3;
    }

    .header-orb.orb-1 {
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        top: -100px;
        right: -100px;
    }

    .header-orb.orb-2 {
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, #f093fb, #f5576c);
        bottom: -50px;
        left: -50px;
    }

    .page-badge {
        display: inline-block;
        padding: 8px 20px;
        background: rgba(102, 126, 234, 0.2);
        border: 1px solid rgba(102, 126, 234, 0.3);
        border-radius: 50px;
        color: #a8b5ff;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }
    }

    .page-subtitle {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 600px;
    }

    /* Header Stats */
    .header-stats {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }

    .header-stat-item {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px 25px;
        border-radius: 15px;
        text-align: center;
        flex: 1;
        min-width: 120px;
    }

    .header-stat-item h3 {
        font-size: 2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 5px;
    }

    .header-stat-item p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 0.875rem;
    }

    /* Service Detail Section */
    .service-detail-section {
        position: relative;
    }

    .bg-alternate {
        background: #f8f9fa;
    }

    .service-detail-visual {
        position: relative;
        padding: 40px;
    }

    .service-detail-visual img {
        position: relative;
        z-index: 2;
        max-width: 100%;
        height: auto;
    }

    .visual-decoration {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .deco-circle {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
    }

    .deco-circle.circle-1 {
        width: 200px;
        height: 200px;
        top: 0;
        right: 0;
    }

    .deco-circle.circle-2 {
        width: 150px;
        height: 150px;
        bottom: 0;
        left: 0;
    }

    /* Service Detail Content */
    .service-detail-content {
        padding: 20px;
    }

    .service-badge-detail {
        display: inline-block;
        padding: 8px 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 50px;
        color: #667eea;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .service-detail-content h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .service-detail-content h2 {
            font-size: 1.75rem;
        }
    }

    .service-desc {
        font-size: 1.1rem;
        color: #666;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    /* Feature Grid */
    .service-features-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }

    @media (max-width: 576px) {
        .service-features-grid {
            grid-template-columns: 1fr;
        }
    }

    .feature-grid-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .feature-grid-item:hover {
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transform: translateY(-5px);
    }

    .feature-grid-item i {
        color: #667eea;
        font-size: 1.5rem;
        margin-top: 5px;
    }

    .feature-grid-item h5 {
        margin: 0 0 5px;
        font-size: 1rem;
        color: #1a1a2e;
    }

    .feature-grid-item p {
        margin: 0;
        font-size: 0.875rem;
        color: #666;
    }

    /* Tech Stack */
    .tech-stack-detail {
        margin-bottom: 30px;
    }

    .tech-stack-detail h5 {
        font-size: 1rem;
        font-weight: 600;
        color: #1a1a2e;
        margin-bottom: 15px;
    }

    .tech-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tech-badge-detail {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: #fff;
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 500;
        color: #1a1a2e;
        transition: all 0.3s ease;
    }

    .tech-badge-detail:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: transparent;
        color: #fff;
        transform: translateY(-2px);
    }

    .tech-badge-detail i {
        font-size: 1rem;
    }

    /* Service Detail Button */
    .btn-service-detail {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 15px 35px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-service-detail:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        color: #fff;
    }

    /* Marketing Services List */
    .marketing-services-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 30px;
    }

    .marketing-service-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px;
        background: #f8f9fa;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .marketing-service-item:hover {
        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transform: translateX(10px);
    }

    .marketing-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .marketing-icon i {
        font-size: 1.5rem;
        color: #fff;
    }

    .marketing-service-item h5 {
        margin: 0 0 8px;
        font-size: 1.1rem;
        color: #1a1a2e;
    }

    .marketing-service-item p {
        margin: 0;
        color: #666;
        line-height: 1.6;
    }

    /* Additional Services */
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

    .additional-service-card {
        position: relative;
        background: #fff;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        overflow: hidden;
    }

    .additional-service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .service-card-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .additional-service-card:hover .service-card-bg {
        opacity: 1;
    }

    .additional-service-card i {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .additional-service-card h4 {
        font-size: 1.5rem;
        color: #1a1a2e;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .additional-service-card p {
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .service-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
        position: relative;
        z-index: 2;
        transition: all 0.3s ease;
    }

    .service-link:hover {
        color: #764ba2;
        gap: 12px;
    }

    /* CTA Section */
    .cta-creative {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        overflow: hidden;
    }

    .cta-bg-animation {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .cta-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.3;
        animation: float 15s ease-in-out infinite;
    }

    .cta-orb.orb-1 {
        width: 400px;
        height: 400px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        top: -100px;
        right: -100px;
    }

    .cta-orb.orb-2 {
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, #f093fb, #f5576c);
        bottom: -50px;
        left: -50px;
        animation-delay: 5s;
    }

    .cta-orb.orb-3 {
        width: 200px;
        height: 200px;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation-delay: 10s;
    }

    @keyframes float {
        0%, 100% {
            transform: translate(0, 0);
        }
        50% {
            transform: translate(30px, -30px);
        }
    }

    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
    }

    .cta-icon-large {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
    }

    .cta-icon-large i {
        font-size: 2.5rem;
        color: #fff;
    }

    .cta-content h2 {
        font-size: 2.5rem;
        color: #fff;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .cta-content h2 {
            font-size: 1.75rem;
        }
    }

    .cta-content > p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }

    .btn-cta-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 15px 35px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        color: #fff;
    }

    .btn-cta-secondary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 15px 35px;
        background: transparent;
        color: #fff;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: #fff;
    }

    .cta-features {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .cta-feature {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.8);
    }

    .cta-feature i {
        color: #00ff8a;
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
    button:focus {
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
                <a itemprop="item" href="https://shivatechdigital.com/services">
                    <span itemprop="name">Services</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </nav>

    <!-- ========================================
         PAGE HEADER
    ======================================== -->
    <section class="page-header-creative" aria-labelledby="page-heading">
        <div class="page-header-bg" aria-hidden="true">
            <div class="header-orb orb-1"></div>
            <div class="header-orb orb-2"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="page-badge">Our Services - Shiva Tech Digital Noida</span>
                    <h1 class="page-title" id="page-heading">Affordable Digital Solutions for Startups & Businesses</h1>
                    <p class="page-subtitle">From web development to digital marketing, we provide comprehensive, affordable services to help your business thrive in the digital world. Based in Noida, serving Delhi NCR & globally.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="header-stats" role="list" aria-label="Our service highlights">
                        <div class="header-stat-item" role="listitem">
                            <h2 style="font-size: 2rem; font-weight: 700; color: #fff; margin-bottom: 5px;">10+</h2>
                            <p>Services Offered</p>
                        </div>
                        <div class="header-stat-item" role="listitem">
                            <h2 style="font-size: 2rem; font-weight: 700; color: #fff; margin-bottom: 5px;">4.9/5</h2>
                            <p>Client Satisfaction</p>
                        </div>
                        <div class="header-stat-item" role="listitem">
                            <h2 style="font-size: 2rem; font-weight: 700; color: #fff; margin-bottom: 5px;">24/7</h2>
                            <p>Support Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         WEB DEVELOPMENT SERVICE
    ======================================== -->
    <section class="service-detail-section py-5" id="web-app" aria-labelledby="web-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <figure class="service-detail-visual">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/web-development-4986316-4159834.png" 
                             alt="Web Development Services - Laravel, React, Vue.js - Shiva Tech Digital Noida" 
                             class="img-fluid"
                             loading="lazy"
                             width="600"
                             height="600">
                        <div class="visual-decoration" aria-hidden="true">
                            <div class="deco-circle circle-1"></div>
                            <div class="deco-circle circle-2"></div>
                        </div>
                        <figcaption class="visually-hidden">Custom Web Application Development</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <article class="service-detail-content">
                        <span class="service-badge-detail">Web Development</span>
                        <h2 id="web-heading">Custom Web Application Development in Noida</h2>
                        <p class="service-desc">We create powerful, scalable web applications that drive business growth. Our expert team uses the latest technologies like Laravel, React, and Vue.js to build custom solutions that meet your unique requirements at affordable prices.</p>
                        
                        <div class="service-features-grid" role="list">
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Responsive Design</h3>
                                    <p>Perfect on all devices & screen sizes</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Modern Frameworks</h3>
                                    <p>React, Angular, Vue.js, Laravel</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">SEO Optimized</h3>
                                    <p>Built for Google visibility</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Fast Performance</h3>
                                    <p>Lightning-fast load times</p>
                                </div>
                            </div>
                        </div>

                        <div class="tech-stack-detail">
                            <h3 class="h5">Technologies We Use:</h3>
                            <div class="tech-badges">
                                <span class="tech-badge-detail"><i class="fab fa-react" aria-hidden="true"></i> React</span>
                                <span class="tech-badge-detail"><i class="fab fa-angular" aria-hidden="true"></i> Angular</span>
                                <span class="tech-badge-detail"><i class="fab fa-vuejs" aria-hidden="true"></i> Vue.js</span>
                                <span class="tech-badge-detail"><i class="fab fa-laravel" aria-hidden="true"></i> Laravel</span>
                                <span class="tech-badge-detail"><i class="fab fa-node" aria-hidden="true"></i> Node.js</span>
                                <span class="tech-badge-detail"><i class="fab fa-python" aria-hidden="true"></i> Python</span>
                                <span class="tech-badge-detail"><i class="fab fa-php" aria-hidden="true"></i> PHP</span>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" class="btn-service-detail" title="Get started with web development">
                            <span>Get Free Quote</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         MOBILE DEVELOPMENT SERVICE
    ======================================== -->
    <section class="service-detail-section py-5 bg-alternate" id="mobile-app" aria-labelledby="mobile-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2" data-aos="fade-left">
                    <figure class="service-detail-visual">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/mobile-app-development-4974401-4159834.png" 
                             alt="Mobile App Development - iOS & Android - Flutter, React Native - Noida" 
                             class="img-fluid"
                             loading="lazy"
                             width="600"
                             height="600">
                        <div class="visual-decoration" aria-hidden="true">
                            <div class="deco-circle circle-1"></div>
                            <div class="deco-circle circle-2"></div>
                        </div>
                        <figcaption class="visually-hidden">iOS & Android App Development</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
                    <article class="service-detail-content">
                        <span class="service-badge-detail">Mobile Development</span>
                        <h2 id="mobile-heading">iOS & Android App Development Services</h2>
                        <p class="service-desc">Create stunning mobile experiences for iOS and Android. We develop native and cross-platform apps using Flutter and React Native that engage users and drive business results. Affordable pricing for startups in Noida & Delhi NCR.</p>
                        
                        <div class="service-features-grid" role="list">
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Native iOS Apps</h3>
                                    <p>Swift & Objective-C development</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Native Android</h3>
                                    <p>Kotlin & Java development</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">Cross-Platform</h3>
                                    <p>React Native, Flutter</p>
                                </div>
                            </div>
                            <div class="feature-grid-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5">App Store Optimization</h3>
                                    <p>Maximize app visibility</p>
                                </div>
                            </div>
                        </div>

                        <div class="tech-stack-detail">
                            <h3 class="h5">Technologies We Use:</h3>
                            <div class="tech-badges">
                                <span class="tech-badge-detail"><i class="fab fa-apple" aria-hidden="true"></i> Swift</span>
                                <span class="tech-badge-detail"><i class="fab fa-android" aria-hidden="true"></i> Kotlin</span>
                                <span class="tech-badge-detail"><i class="fab fa-react" aria-hidden="true"></i> React Native</span>
                                <span class="tech-badge-detail">Flutter</span>
                                <span class="tech-badge-detail">Firebase</span>
                                <span class="tech-badge-detail">AWS</span>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" class="btn-service-detail" title="Get started with mobile app development">
                            <span>Get Free Quote</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         DIGITAL MARKETING SERVICE
    ======================================== -->
    <section class="service-detail-section py-5" id="digital-marketing" aria-labelledby="marketing-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <figure class="service-detail-visual">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/digital-marketing-5713164-4778052.png" 
                             alt="Digital Marketing Services - SEO, Social Media, Content Marketing - Noida" 
                             class="img-fluid"
                             loading="lazy"
                             width="600"
                             height="600">
                        <div class="visual-decoration" aria-hidden="true">
                            <div class="deco-circle circle-1"></div>
                            <div class="deco-circle circle-2"></div>
                        </div>
                        <figcaption class="visually-hidden">Complete Digital Marketing Solutions</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <article class="service-detail-content">
                        <span class="service-badge-detail">Digital Marketing</span>
                        <h2 id="marketing-heading">Complete Digital Marketing Solutions in Delhi NCR</h2>
                        <p class="service-desc">Grow your online presence and reach your target audience with our comprehensive digital marketing strategies. We combine creativity with data-driven insights to deliver 300%+ traffic increases and 450% average ROI.</p>
                        
                        <div class="marketing-services-list" role="list">
                            <div class="marketing-service-item" role="listitem">
                                <div class="marketing-icon" aria-hidden="true"><i class="fas fa-search"></i></div>
                                <div>
                                    <h3 class="h5">SEO & SEM Services</h3>
                                    <p>Improve Google rankings and drive qualified traffic with proven SEO strategies</p>
                                </div>
                            </div>
                            <div class="marketing-service-item" role="listitem">
                                <div class="marketing-icon" aria-hidden="true"><i class="fab fa-facebook"></i></div>
                                <div>
                                    <h3 class="h5">Social Media Marketing</h3>
                                    <p>Engage audiences on Facebook, Instagram, LinkedIn & all major platforms</p>
                                </div>
                            </div>
                            <div class="marketing-service-item" role="listitem">
                                <div class="marketing-icon" aria-hidden="true"><i class="fas fa-pen"></i></div>
                                <div>
                                    <h3 class="h5">Content Marketing</h3>
                                    <p>Create compelling, SEO-optimized content that converts visitors to customers</p>
                                </div>
                            </div>
                            <div class="marketing-service-item" role="listitem">
                                <div class="marketing-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                                <div>
                                    <h3 class="h5">Email Marketing</h3>
                                    <p>Personalized email campaigns that engage and nurture leads effectively</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}" class="btn-service-detail" title="Get started with digital marketing">
                            <span>Get Free Marketing Audit</span>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         ADDITIONAL SERVICES GRID
    ======================================== -->
    <section class="additional-services py-5 bg-alternate" id="more-services" aria-labelledby="additional-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">More Services</span>
                <h2 class="section-title-creative" id="additional-heading">Additional Solutions We Offer</h2>
                <p class="section-subtitle-creative">Comprehensive services to cover all your digital needs in Noida & beyond</p>
            </header>
            <div class="row g-4" role="list">
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-paint-brush" aria-hidden="true"></i>
                        <h3 class="h4">UI/UX Design Services</h3>
                        <p>Create beautiful, intuitive interfaces that users love and that drive conversions. Modern design principles for web & mobile.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about UI/UX design">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        <h3 class="h4">E-commerce Development</h3>
                        <p>Build powerful online stores with secure payments, inventory management & seamless checkout experiences.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about e-commerce development">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-cloud" aria-hidden="true"></i>
                        <h3 class="h4">Cloud Solutions & AWS</h3>
                        <p>Scalable cloud infrastructure, migration services, and AWS deployment for high-performance applications.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about cloud solutions">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-tools" aria-hidden="true"></i>
                        <h3 class="h4">Maintenance & Support</h3>
                        <p>Ongoing maintenance, 24/7 technical support, bug fixes, updates & security patches for your peace of mind.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about maintenance services">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-palette" aria-hidden="true"></i>
                        <h3 class="h4">Brand Strategy & Identity</h3>
                        <p>Develop compelling brand identity, messaging, and visual design that resonates with your target audience.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about brand strategy">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="additional-service-card">
                        <div class="service-card-bg" aria-hidden="true"></div>
                        <i class="fas fa-video" aria-hidden="true"></i>
                        <h3 class="h4">Video Marketing</h3>
                        <p>Engaging video content production, editing & optimization for all digital platforms and social media.</p>
                        <a href="{{ route('contact') }}" class="service-link" title="Learn more about video marketing">
                            Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                </div>
                
            </div>
        </div>
    </section>

    <!-- ========================================
         CTA SECTION
    ======================================== -->
    <section class="cta-creative" id="get-started" aria-labelledby="cta-heading">
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
                <h2 id="cta-heading">Ready to Get Started with Shiva Tech Digital?</h2>
                <p>Let's discuss your project and bring your vision to life with our expert team. Free consultation, affordable pricing, fast delivery.</p>
                
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary" title="Request free quote">
                        <span>Request Free Quote</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('portfolio') }}" class="btn-cta-secondary" title="View our portfolio">
                        <span>View Portfolio</span>
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                    </a>
                </div>
                
                <div class="cta-features">
                    <div class="cta-feature">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Free Consultation</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Flexible Pricing</span>
                    </div>
                    <div class="cta-feature">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                        <span>Expert Team</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ========================================
    // SMOOTH SCROLL TO ANCHOR SECTIONS
    // ========================================
    
    // Check if there's a hash in the URL
    if (window.location.hash) {
        setTimeout(function() {
            const element = document.querySelector(window.location.hash);
            if (element) {
                element.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        }, 100);
    }
    
    // Handle anchor link clicks
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                e.preventDefault();
                const target = document.querySelector(targetId);
                
                if (target) {
                    target.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                    
                    // Update URL without scrolling
                    history.pushState(null, null, targetId);
                }
            }
        });
    });

    // ========================================
    // TRACK SERVICE LINK CLICKS (GA4)
    // ========================================
    document.querySelectorAll('.service-link, .btn-service-detail').forEach(link => {
        link.addEventListener('click', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'service_click', {
                    'event_category': 'Services',
                    'event_label': this.closest('article, section').querySelector('h2, h3, h4')?.textContent || 'Unknown Service'
                });
            }
        });
    });
});
</script>
@endpush