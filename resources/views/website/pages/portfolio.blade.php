@extends('website.index')
{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'portfolio')
@push('styles')
<style>
    /* ========================================
       PORTFOLIO PAGE SPECIFIC STYLES
    ======================================== */
    .technologies-section{
        background: white !important;
    }
    /* Page Header */
    .page-header-creative {
        position: relative;
        min-height: 88vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background:
            linear-gradient(135deg, rgba(10,15,40,0.85) 0%, rgba(30,58,138,0.78) 100%),
            url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1600&q=85') center/cover no-repeat;
        padding: 110px 0 70px;
    }

    .page-header-creative::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 0;
    }

    .page-header-creative .container { position: relative; z-index: 1; }
    .portfolio-header-inner { text-align: center; max-width: 860px; margin: 0 auto; }

    .page-header-bg { display: none; }

    .page-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 22px;
        background: rgba(99,102,241,0.2);
        border: 1px solid rgba(99,102,241,0.45);
        border-radius: 50px;
        color: #a5b4fc;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .page-title {
        font-size: clamp(2.2rem, 5vw, 3.8rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 20px;
        line-height: 1.15;
    }

    .page-title span {
        background: linear-gradient(90deg, #818cf8, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.75);
        max-width: 640px;
        margin: 0 auto 50px;
        line-height: 1.75;
    }

    /* Stats bar */
    .portfolio-stats-bar {
        display: flex;
        justify-content: center;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 20px;
        overflow: hidden;
        backdrop-filter: blur(10px);
        max-width: 700px;
        margin: 0 auto 40px;
    }

    .header-stat-item {
        flex: 1;
        padding: 22px 18px;
        text-align: center;
        border-right: 1px solid rgba(255,255,255,0.1);
        background: transparent;
        border-radius: 0;
    }
    .header-stat-item:last-child { border-right: none; }

    .header-stat-item .stat-icon {
        font-size: 1.3rem;
        margin-bottom: 8px;
        display: block;
    }
    .stat-icon-1 { color: #818cf8; }
    .stat-icon-2 { color: #34d399; }
    .stat-icon-3 { color: #fbbf24; }
    .stat-icon-4 { color: #f472b6; }

    .header-stat-item .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 4px;
        line-height: 1;
    }

    .header-stat-item p {
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
        font-size: 0.72rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Tech chips */
    .portfolio-tech-chips { display: flex; justify-content: center; flex-wrap: wrap; gap: 8px; }
    .tech-chip {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 6px 14px; background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.15); border-radius: 50px;
        color: rgba(255,255,255,0.8); font-size: 0.75rem; font-weight: 600;
        transition: all 0.25s ease;
    }
    .tech-chip:hover { background: rgba(99,102,241,0.3); border-color: rgba(99,102,241,0.5); color: #fff; }
    .tech-chip i { font-size: 0.72rem; color: #818cf8; }

    /* Scroll hint */
    .header-scroll-hint {
        position: absolute; bottom: 24px; left: 50%; transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: 5px;
        color: rgba(255,255,255,0.45); font-size: 0.72rem; animation: bounceHint 2s ease-in-out infinite; z-index: 2;
    }
    @keyframes bounceHint { 0%,100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(6px); } }

    @media (max-width: 768px) {
        .page-header-creative { min-height: auto; padding: 110px 0 60px; }
        .portfolio-stats-bar { flex-wrap: wrap; }
        .header-stat-item { min-width: 45%; }
    }

    /* Filter Section */
    .portfolio-filter-section {
        background: #f8f9fa;
    }

    .filter-buttons-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .filter-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 25px;
        background: #fff;
        border: 2px solid #e0e0e0;
        border-radius: 50px;
        font-size: 0.95rem;
        font-weight: 500;
        color: #666;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: transparent;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .filter-btn i {
        font-size: 1rem;
    }

    /* Portfolio Grid */
    #portfolio-grid {
        transition: all 0.3s ease;
    }

    .portfolio-item {
        transition: all 0.4s ease;
    }

    .portfolio-item.hide {
        opacity: 0;
        transform: scale(0.8);
        display: none !important;
    }

    .portfolio-item.show {
        opacity: 1;
        transform: scale(1);
        display: block !important;
    }

    /* Portfolio Card */
    .portfolio-card-creative {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
    }

    .portfolio-card-creative:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .portfolio-image {
        position: relative;
        overflow: hidden;
        height: 280px;
    }

    .portfolio-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .portfolio-card-creative:hover .portfolio-image img {
        transform: scale(1.1);
    }

    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.95), rgba(118, 75, 162, 0.95));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .portfolio-card-creative:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-content {
        text-align: center;
        padding: 30px;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .portfolio-card-creative:hover .portfolio-content {
        transform: translateY(0);
    }

    .portfolio-category {
        display: inline-block;
        padding: 5px 15px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        color: #fff;
        font-size: 0.8rem;
        margin-bottom: 15px;
    }

    .portfolio-content h4 {
        color: #fff;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .portfolio-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 20px;
    }

    .portfolio-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: #fff;
        border-radius: 50%;
        color: #667eea;
        font-size: 1.25rem;
        transition: all 0.3s ease;
    }

    .portfolio-link:hover {
        background: #1a1a2e;
        color: #fff;
        transform: scale(1.1);
    }

    .portfolio-info {
        padding: 20px;
    }

    .portfolio-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .portfolio-tags span {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 12px;
        background: #f0f0f0;
        border-radius: 20px;
        font-size: 0.8rem;
        color: #666;
    }

    .portfolio-tags span i {
        color: #667eea;
    }

    /* Success Stats Section */
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

    .section-title-creative-dark {
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
        .section-title-creative-dark {
            font-size: 1.75rem;
        }
    }

    .success-stat-card {
        background: #f8f9fa;
        padding: 35px 25px;
        border-radius: 20px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        height: 100%;
    }

    .success-stat-card:hover {
        background: #fff;
        border-color: #667eea;
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.15);
    }

    .success-stat-card .stat-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }

    .success-stat-card .stat-icon i {
        font-size: 1.75rem;
        color: #fff;
    }

    .success-stat-card h3 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 5px;
    }

    .success-stat-card .metric {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .success-stat-card .description {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
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
                <a itemprop="item" href="https://shivatechdigital.com/portfolio">
                    <span itemprop="name">Portfolio</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </nav>

    <!-- ========================================
         PAGE HEADER
    ======================================== -->
    <section class="page-header-creative" aria-labelledby="page-heading">
        <div class="container">
            <div class="portfolio-header-inner" data-aos="fade-up">

                <span class="page-badge">
                    <i class="fas fa-briefcase"></i>
                    Our Portfolio — Shiva Tech Digital, Noida
                </span>

                <h1 class="page-title" id="page-heading">
                    Web Development <span>Projects &</span><br>Success Stories
                </h1>

                <p class="page-subtitle">
                    Showcasing our best work in web development, mobile apps, e-commerce & digital marketing.
                    Real results delivered for startups and businesses across Noida, Delhi NCR and globally.
                </p>

                <!-- Stats bar -->
                <div class="portfolio-stats-bar" role="list" aria-label="Our achievements">
                    <div class="header-stat-item" role="listitem">
                        <span class="stat-icon stat-icon-1"><i class="fas fa-laptop-code"></i></span>
                        <h2 class="stat-number" data-count="50">0+</h2>
                        <p>Projects Done</p>
                    </div>
                    <div class="header-stat-item" role="listitem">
                        <span class="stat-icon stat-icon-2"><i class="fas fa-users"></i></span>
                        <h2 class="stat-number" data-count="30">0+</h2>
                        <p>Happy Clients</p>
                    </div>
                    <div class="header-stat-item" role="listitem">
                        <span class="stat-icon stat-icon-3"><i class="fas fa-star"></i></span>
                        <h2 class="stat-number">4.9★</h2>
                        <p>Google Rating</p>
                    </div>
                    <div class="header-stat-item" role="listitem">
                        <span class="stat-icon stat-icon-4"><i class="fas fa-globe"></i></span>
                        <h2 class="stat-number">10+</h2>
                        <p>Countries Served</p>
                    </div>
                </div>

                <!-- Tech chips -->
                <div class="portfolio-tech-chips">
                    <span class="tech-chip"><i class="fab fa-laravel"></i> Laravel</span>
                    <span class="tech-chip"><i class="fab fa-react"></i> React.js</span>
                    <span class="tech-chip"><i class="fab fa-vuejs"></i> Vue.js</span>
                    <span class="tech-chip"><i class="fas fa-mobile-alt"></i> Flutter</span>
                    <span class="tech-chip"><i class="fab fa-wordpress"></i> WordPress</span>
                    <span class="tech-chip"><i class="fas fa-shopping-cart"></i> E-commerce</span>
                    <span class="tech-chip"><i class="fas fa-search"></i> SEO</span>
                </div>

            </div>
        </div>

        <div class="header-scroll-hint" aria-hidden="true">
            <i class="fas fa-chevron-down"></i>
            <span>View Projects</span>
        </div>
    </section>

    <!-- ========================================
         PORTFOLIO FILTER SECTION
    ======================================== -->
    <section class="portfolio-filter-section py-5" id="projects" aria-labelledby="portfolio-heading">
        <div class="container">
            <header class="text-center mb-4" data-aos="fade-up">
                <h2 class="visually-hidden" id="portfolio-heading">Our Web Development & Mobile App Projects</h2>
            </header>
            
            <div class="filter-buttons-wrapper text-center mb-5" data-aos="fade-up" role="tablist" aria-label="Filter projects by category">
                <button class="filter-btn active" data-filter="all" role="tab" aria-selected="true" aria-controls="portfolio-grid">
                    <i class="fas fa-th" aria-hidden="true"></i>
                    <span>All Projects</span>
                </button>
                <button class="filter-btn" data-filter="web" role="tab" aria-selected="false" aria-controls="portfolio-grid">
                    <i class="fas fa-laptop-code" aria-hidden="true"></i>
                    <span>Web Apps</span>
                </button>
                <button class="filter-btn" data-filter="mobile" role="tab" aria-selected="false" aria-controls="portfolio-grid">
                    <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                    <span>Mobile Apps</span>
                </button>
                <button class="filter-btn" data-filter="marketing" role="tab" aria-selected="false" aria-controls="portfolio-grid">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                    <span>Digital Marketing</span>
                </button>
                <button class="filter-btn" data-filter="design" role="tab" aria-selected="false" aria-controls="portfolio-grid">
                    <i class="fas fa-paint-brush" aria-hidden="true"></i>
                    <span>UI/UX Design</span>
                </button>
            </div>

            <div class="row g-4" id="portfolio-grid" role="tabpanel" aria-label="Portfolio projects">
                
                <!-- Portfolio Item 1: E-Commerce Platform -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="web" data-aos="fade-up" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=400&fit=crop" 
                                 alt="E-Commerce Platform - Web Application Development by Shiva Tech Digital" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="genre">Web Application</span>
                                    <h3 itemprop="name">E-Commerce Platform</h3>
                                    <p itemprop="description">Modern online shopping experience with Laravel & React</p>
                                    <a href="#" class="portfolio-link" aria-label="View E-Commerce Platform project details">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fab fa-react" aria-hidden="true"></i> React</span>
                                <span><i class="fab fa-laravel" aria-hidden="true"></i> Laravel</span>
                            </div>
                        </div>
                        <meta itemprop="creator" content="Shiva Tech Digital">
                    </div>
                </article>

                <!-- Portfolio Item 2: Fitness Tracking App -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="mobile" data-aos="fade-up" data-aos-delay="100" itemscope itemtype="https://schema.org/MobileApplication">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=500&h=400&fit=crop" 
                                 alt="Fitness Tracking Mobile App - iOS & Android Development" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="applicationCategory">Mobile App</span>
                                    <h3 itemprop="name">Fitness Tracking App</h3>
                                    <p itemprop="description">Health & wellness tracking for iOS & Android</p>
                                    <a href="#" class="portfolio-link" aria-label="View Fitness App project details">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags">
                                <span><i class="fab fa-apple" aria-hidden="true"></i> iOS</span>
                                <span><i class="fab fa-android" aria-hidden="true"></i> Android</span>
                            </div>
                        </div>
                        <meta itemprop="operatingSystem" content="iOS, Android">
                    </div>
                </article>

                <!-- Portfolio Item 3: SEO Campaign -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="marketing" data-aos="fade-up" data-aos-delay="200" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=500&h=400&fit=crop" 
                                 alt="SEO Campaign - 300% Traffic Increase - Digital Marketing" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="genre">Digital Marketing</span>
                                    <h3 itemprop="name">SEO Campaign Success</h3>
                                    <p itemprop="description">300% traffic increase in 6 months</p>
                                    <a href="#" class="portfolio-link" aria-label="View SEO Campaign case study">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fas fa-search" aria-hidden="true"></i> SEO</span>
                                <span><i class="fas fa-chart-line" aria-hidden="true"></i> Analytics</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 4: SaaS Dashboard -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="web" data-aos="fade-up" itemscope itemtype="https://schema.org/WebApplication">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500&h=400&fit=crop" 
                                 alt="SaaS Dashboard - Analytics & Reporting Platform Development" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="applicationCategory">Web Application</span>
                                    <h3 itemprop="name">SaaS Dashboard</h3>
                                    <p itemprop="description">Analytics & reporting platform with Vue.js</p>
                                    <a href="#" class="portfolio-link" aria-label="View SaaS Dashboard project">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fab fa-vuejs" aria-hidden="true"></i> Vue.js</span>
                                <span><i class="fab fa-python" aria-hidden="true"></i> Python</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 5: Food Delivery App -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="mobile" data-aos="fade-up" data-aos-delay="100" itemscope itemtype="https://schema.org/MobileApplication">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=500&h=400&fit=crop" 
                                 alt="Food Delivery Mobile App - React Native Development" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="applicationCategory">Mobile App</span>
                                    <h3 itemprop="name">Food Delivery App</h3>
                                    <p itemprop="description">On-demand delivery solution with real-time tracking</p>
                                    <a href="#" class="portfolio-link" aria-label="View Food Delivery App project">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fab fa-react" aria-hidden="true"></i> React Native</span>
                                <span>Firebase</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 6: Banking App Redesign -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="design" data-aos="fade-up" data-aos-delay="200" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=500&h=400&fit=crop" 
                                 alt="Banking App UI/UX Redesign - Modern Interface Design" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="genre">UI/UX Design</span>
                                    <h3 itemprop="name">Banking App Redesign</h3>
                                    <p itemprop="description">Modern & secure interface with improved UX</p>
                                    <a href="#" class="portfolio-link" aria-label="View Banking App UI/UX project">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fas fa-pencil-ruler" aria-hidden="true"></i> Figma</span>
                                <span><i class="fas fa-paint-brush" aria-hidden="true"></i> UI/UX</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 7: Real Estate Portal -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="web" data-aos="fade-up" itemscope itemtype="https://schema.org/WebApplication">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500&h=400&fit=crop" 
                                 alt="Real Estate Portal - Property Listing Platform with Laravel" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="applicationCategory">Web Application</span>
                                    <h3 itemprop="name">Real Estate Portal</h3>
                                    <p itemprop="description">Property listing & management platform</p>
                                    <a href="#" class="portfolio-link" aria-label="View Real Estate Portal project">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fab fa-vuejs" aria-hidden="true"></i> Vue.js</span>
                                <span><i class="fab fa-laravel" aria-hidden="true"></i> Laravel</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 8: Brand Campaign -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="marketing" data-aos="fade-up" data-aos-delay="100" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1557838923-2985c318be48?w=500&h=400&fit=crop" 
                                 alt="Social Media Brand Campaign - 5M+ Impressions" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="genre">Social Media</span>
                                    <h3 itemprop="name">Brand Campaign</h3>
                                    <p itemprop="description">5M+ impressions achieved across platforms</p>
                                    <a href="#" class="portfolio-link" aria-label="View Brand Campaign case study">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</span>
                                <span><i class="fab fa-instagram" aria-hidden="true"></i> Instagram</span>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Portfolio Item 9: Travel Booking App -->
                <article class="col-lg-4 col-md-6 portfolio-item" data-category="mobile" data-aos="fade-up" data-aos-delay="200" itemscope itemtype="https://schema.org/MobileApplication">
                    <div class="portfolio-card-creative">
                        <div class="portfolio-image">
                            <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?w=500&h=400&fit=crop" 
                                 alt="Travel Booking Mobile App - Flutter Development" 
                                 loading="lazy"
                                 width="500"
                                 height="400"
                                 itemprop="image">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <span class="portfolio-category" itemprop="applicationCategory">Mobile App</span>
                                    <h3 itemprop="name">Travel Booking App</h3>
                                    <p itemprop="description">Seamless booking experience with Flutter</p>
                                    <a href="#" class="portfolio-link" aria-label="View Travel Booking App project">
                                        <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-info">
                            <div class="portfolio-tags" itemprop="keywords">
                                <span>Flutter</span>
                                <span>Firebase</span>
                            </div>
                        </div>
                    </div>
                </article>
                
            </div>
        </div>
    </section>

    <!-- ========================================
         SUCCESS STATS SECTION
    ======================================== -->
    <section class="success-stats-section py-5 bg-alternate" id="success-metrics" aria-labelledby="stats-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Success Metrics</span>
                <h2 class="section-title-creative-dark" id="stats-heading">Real Results, Real Impact</h2>
                <p class="section-subtitle-creative">Numbers that speak for our excellence in web development & digital marketing</p>
            </header>
            <div class="row g-4" role="list" aria-label="Our success metrics">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="success-stat-card">
                        <div class="stat-icon" aria-hidden="true">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <h3>+300%</h3>
                        <p class="metric">Traffic Increase</p>
                        <p class="description">Average for our SEO campaigns in Noida & Delhi NCR</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="success-stat-card">
                        <div class="stat-icon" aria-hidden="true">
                            <i class="fas fa-download"></i>
                        </div>
                        <h3>1M+</h3>
                        <p class="metric">App Downloads</p>
                        <p class="description">Across all mobile app projects we've developed</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="success-stat-card">
                        <div class="stat-icon" aria-hidden="true">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>450%</h3>
                        <p class="metric">Average ROI</p>
                        <p class="description">For digital marketing campaigns we manage</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
                    <article class="success-stat-card">
                        <div class="stat-icon" aria-hidden="true">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>4.9/5</h3>
                        <p class="metric">Client Rating</p>
                        <p class="description">Average satisfaction score from our clients</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         TECHNOLOGIES SECTION
    ======================================== -->
    <section class="technologies-section py-5" id="technologies" aria-labelledby="tech-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Tech Stack</span>
                <h2 class="section-title-creative-dark" id="tech-heading">Technologies We Use</h2>
                <p class="section-subtitle-creative">Modern technologies for scalable, secure & high-performance solutions</p>
            </header>
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="tech-tags d-flex flex-wrap justify-content-center gap-3">
                        <span class="tech-tag"><i class="fab fa-laravel" aria-hidden="true"></i> Laravel</span>
                        <span class="tech-tag"><i class="fab fa-react" aria-hidden="true"></i> React.js</span>
                        <span class="tech-tag"><i class="fab fa-vuejs" aria-hidden="true"></i> Vue.js</span>
                        <span class="tech-tag"><i class="fab fa-node-js" aria-hidden="true"></i> Node.js</span>
                        <span class="tech-tag"><i class="fab fa-php" aria-hidden="true"></i> PHP</span>
                        <span class="tech-tag"><i class="fab fa-python" aria-hidden="true"></i> Python</span>
                        <span class="tech-tag">Flutter</span>
                        <span class="tech-tag">React Native</span>
                        <span class="tech-tag"><i class="fab fa-aws" aria-hidden="true"></i> AWS</span>
                        <span class="tech-tag">Firebase</span>
                        <span class="tech-tag">MySQL</span>
                        <span class="tech-tag">MongoDB</span>
                        <span class="tech-tag">PostgreSQL</span>
                        <span class="tech-tag"><i class="fab fa-docker" aria-hidden="true"></i> Docker</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CTA SECTION
    ======================================== -->
    <section class="cta-creative" id="start-project" aria-labelledby="cta-heading">
        <div class="cta-bg-animation" aria-hidden="true">
            <div class="cta-orb orb-1"></div>
            <div class="cta-orb orb-2"></div>
            <div class="cta-orb orb-3"></div>
        </div>
        
        <div class="container">
            <div class="cta-content" data-aos="zoom-in">
                <div class="cta-icon-large" aria-hidden="true">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h2 id="cta-heading">Want to See Your Project Here?</h2>
                <p>Let's create something amazing together. Get your success story featured in our portfolio with affordable, quality web development from Shiva Tech Digital Noida.</p>
                
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary" title="Start your web development project">
                        <span>Start Your Project</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-cta-secondary" title="Request free quote for web development">
                        <span>Request Free Quote</span>
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </a>
                </div>
                
                <div class="cta-features mt-4" style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
                    <span style="color: rgba(255,255,255,0.8);"><i class="fas fa-check-circle me-2" style="color: #00ff8a;"></i>Free Consultation</span>
                    <span style="color: rgba(255,255,255,0.8);"><i class="fas fa-check-circle me-2" style="color: #00ff8a;"></i>Affordable Pricing</span>
                    <span style="color: rgba(255,255,255,0.8);"><i class="fas fa-check-circle me-2" style="color: #00ff8a;"></i>Fast Delivery</span>
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
    // PORTFOLIO FILTER FUNCTIONALITY
    // ========================================
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
            });
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            
            // Filter items with animation
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    item.classList.remove('hide');
                    item.classList.add('show');
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.classList.remove('show');
                        item.classList.add('hide');
                    }, 300);
                }
            });
            
            // Track filter event (Google Analytics)
            if (typeof gtag !== 'undefined') {
                gtag('event', 'portfolio_filter', {
                    'event_category': 'Portfolio',
                    'event_label': filter
                });
            }
        });
    });
    
    // ========================================
    // COUNTER ANIMATION FOR STATS
    // ========================================
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += step;
            if (current < target) {
                counter.textContent = Math.floor(current) + '+';
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + '+';
            }
        };
        
        updateCounter();
    };
    
    // Intersection Observer for counters
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
    // LAZY LOAD IMAGES
    // ========================================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>

<style>
/* Additional inline styles for tech tags */
.tech-tags {
    padding: 20px 0;
}

.tech-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #f8f9fa;
    border: 2px solid #e0e0e0;
    border-radius: 50px;
    font-size: 0.95rem;
    font-weight: 500;
    color: #1a1a2e;
    transition: all 0.3s ease;
}

.tech-tag:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-color: transparent;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
}

.tech-tag i {
    font-size: 1.1rem;
}
</style>
@endpush