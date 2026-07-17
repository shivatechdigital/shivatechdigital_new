@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/video-production')

@section('breadcrumb-title', 'Video Production')
@section('service-category', 'Creative Services')
@section('hero-title', 'Video Production Services')
@section('hero-description', 'Visual storytelling that moves people to action. From high-impact corporate films to engaging social media clips and animated explainers, we produce cinematic content that elevates your brand and delivers your message clearly.')
@section('service-name', 'Video Production')
@section('service-name-lower', 'video production')

@section('trust-badge-1', '500+ Videos Produced')
@section('trust-badge-2', '4K/8K Production')
@section('trust-badge-3', 'Award-Winning Editors')

@section('hero-image')
<img src="{{ asset('web_assets/img/services/video-production-hero.svg') }}" alt="Video Production Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>500+</h3>
    <p>Projects Delivered</p>
</div>
<div class="stat-card">
    <h3>10M+</h3>
    <p>Views Generated</p>
</div>
<div class="stat-card">
    <h3>100%</h3>
    <p>In-House Team</p>
</div>
@endsection

@section('service-content')
<!-- Overview Section -->
<section class="service-overview py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="overview-content">
                    <span class="section-badge">About Our Service</span>
                    <h2>Cinematic Storytelling for Modern Brands</h2>
                    <p class="lead">Video is the most powerful medium to convey emotion, explain complex ideas, and build trust. At Shiva Tech Digital, we don't just shoot footage; we craft narratives.</p>
                    <p>Our full-service video production house handles everything from the initial spark of an idea to the final color grade. Whether you need a 30-second Instagram Reel or a 10-minute corporate documentary, our team of directors, cinematographers, and editors bring broadcast-quality production to your business.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Script-to-Screen</h5>
                                <p>We handle concept, scripting, filming, and post-production</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Cinema-Grade Gear</h5>
                                <p>Shooting on Red, Sony Cinema Line & Professional Lighting</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Motion Graphics</h5>
                                <p>Advanced 2D/3D animation to explain complex concepts</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Multi-Platform Formats</h5>
                                <p>Content optimized for TV, Web, Mobile, and Social</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="{{ asset('web_assets/img/services/video-production-overview.jpg') }}" alt="Video Production Process" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">4K</span>
                        <span class="text">Ultra HD Quality</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="services-offered py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">What We Create</span>
            <h2>Our Video Production Services</h2>
            <p class="section-subtitle">Diverse video formats for every marketing objective</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Corporate Films</h4>
                    <p>Tell your brand story, showcase your culture, and build trust with stakeholders and clients.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Brand Stories</li>
                        <li><i class="fas fa-check"></i> CSR Videos</li>
                        <li><i class="fas fa-check"></i> Recruitment Videos</li>
                        <li><i class="fas fa-check"></i> Facility Tours</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Explainer Videos</h4>
                    <p>Simplify complex products or services using engaging animation or live-action demonstrations.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> 2D Animation</li>
                        <li><i class="fas fa-check"></i> Motion Graphics</li>
                        <li><i class="fas fa-check"></i> Whiteboard Animation</li>
                        <li><i class="fas fa-check"></i> App Demos</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4>Product Videography</h4>
                    <p>High-quality product shots and commercials that highlight features and drive sales.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> E-commerce Videos</li>
                        <li><i class="fas fa-check"></i> Unboxing Videos</li>
                        <li><i class="fas fa-check"></i> Feature Highlights</li>
                        <li><i class="fas fa-check"></i> 360° Product Views</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-ad"></i>
                    </div>
                    <h4>Commercials & Ads</h4>
                    <p>High-impact video ads designed for TV broadcast or digital ad campaigns (YouTube, Facebook).</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> TV Commercials (TVC)</li>
                        <li><i class="fas fa-check"></i> YouTube Pre-roll</li>
                        <li><i class="fas fa-check"></i> Instagram Reels/Ads</li>
                        <li><i class="fas fa-check"></i> Social Media Shorts</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4>Event Coverage</h4>
                    <p>Capture the energy of your events, conferences, and launches with professional coverage.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Event Highlights</li>
                        <li><i class="fas fa-check"></i> Speaker Sessions</li>
                        <li><i class="fas fa-check"></i> Live Streaming</li>
                        <li><i class="fas fa-check"></i> Behind the Scenes</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-photo-video"></i>
                    </div>
                    <h4>Post-Production</h4>
                    <p>Professional editing, color grading, sound design, and VFX to polish raw footage into a masterpiece.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Video Editing</li>
                        <li><i class="fas fa-check"></i> Color Correction</li>
                        <li><i class="fas fa-check"></i> Audio Mastering</li>
                        <li><i class="fas fa-check"></i> Subtitling</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Production Process -->
<section class="video-process py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">How We Work</span>
            <h2>Our Production Pipeline</h2>
            <p class="section-subtitle">A structured approach to creative chaos</p>
        </div>
        <div class="process-timeline-horizontal" data-aos="fade-up">
            <div class="timeline-step">
                <div class="step-icon"><i class="fas fa-lightbulb"></i></div>
                <h4>Pre-Production</h4>
                <p>Concept, Scripting, Storyboarding, Casting, Location Scouting.</p>
            </div>
            <div class="timeline-arrow"><i class="fas fa-chevron-right"></i></div>
            <div class="timeline-step">
                <div class="step-icon"><i class="fas fa-video"></i></div>
                <h4>Production</h4>
                <p>Filming, Lighting, Audio Capture, Directing, Drone Shots.</p>
            </div>
            <div class="timeline-arrow"><i class="fas fa-chevron-right"></i></div>
            <div class="timeline-step">
                <div class="step-icon"><i class="fas fa-film"></i></div>
                <h4>Post-Production</h4>
                <p>Editing, VFX, Color Grading, Sound Design, Music Scoring.</p>
            </div>
            <div class="timeline-arrow"><i class="fas fa-chevron-right"></i></div>
            <div class="timeline-step">
                <div class="step-icon"><i class="fas fa-paper-plane"></i></div>
                <h4>Delivery</h4>
                <p>Rendering, Format Optimization, Revisions, Final Handoff.</p>
            </div>
        </div>
    </div>
</section>

<!-- Equipment & Tech -->
<section class="equipment-section py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="equipment-content">
                    <span class="section-badge light">Our Gear</span>
                    <h2 class="text-white">Filmed on Cinema-Grade Equipment</h2>
                    <p class="text-white-50">We invest in top-tier technology to ensure your videos look pristine, professional, and future-proof. Quality is never compromised.</p>
                    <ul class="equipment-list">
                        <li><i class="fas fa-camera"></i> 4K/6K Cinema Cameras (Sony/Red)</li>
                        <li><i class="fas fa-plane"></i> 4K Aerial Drones</li>
                        <li><i class="fas fa-microphone-alt"></i> Professional Sennheiser Audio</li>
                        <li><i class="fas fa-lightbulb"></i> Aputure & Godox Lighting</li>
                        <li><i class="fas fa-desktop"></i> High-End Editing Workstations</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="equipment-grid">
                    <div class="gear-item">
                        <img src="{{ asset('web_assets/img/tech/premiere.svg') }}" alt="Adobe Premiere Pro">
                        <span>Premiere Pro</span>
                    </div>
                    <div class="gear-item">
                        <img src="{{ asset('web_assets/img/tech/aftereffects.svg') }}" alt="After Effects">
                        <span>After Effects</span>
                    </div>
                    <div class="gear-item">
                        <img src="{{ asset('web_assets/img/tech/davinci.svg') }}" alt="DaVinci Resolve">
                        <span>DaVinci Resolve</span>
                    </div>
                    <div class="gear-item">
                        <img src="{{ asset('web_assets/img/tech/cinema4d.svg') }}" alt="Cinema 4D">
                        <span>Cinema 4D</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="service-benefits py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="benefits-header">
                    <span class="section-badge">Benefits</span>
                    <h2>Why Invest in Video Marketing?</h2>
                    <p>Video is the highest converting media format on the web</p>
                </div>
                <div class="video-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">88%</span>
                        <span class="stat-text">More time spent on sites with video</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <span class="stat-text">Message retention (vs 10% text)</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">80%</span>
                        <span class="stat-text">Increase in conversion rates</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Grab Attention</h5>
                            <p>Videos stop the scroll and capture attention faster than any other medium.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Boost SEO</h5>
                            <p>Websites with video are 53x more likely to rank on Google's first page.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Simplify Concepts</h5>
                            <p>Explain complex products or services in seconds with visual storytelling.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Emotional Connection</h5>
                            <p>Video builds trust and emotional rapport better than text or images.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Social Sharing</h5>
                            <p>Video content generates 1200% more shares than text and image combined.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Mobile Friendly</h5>
                            <p>Video is the preferred content consumption method for mobile users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('why-choose-items')
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-film"></i>
        </div>
        <h4>Storytelling Experts</h4>
        <p>We don't just shoot; we craft compelling narratives that sell</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-video"></i>
        </div>
        <h4>High-End Production</h4>
        <p>Cinema-quality cameras, lighting, and audio equipment</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-laptop-code"></i>
        </div>
        <h4>Advanced Editing</h4>
        <p>Professional color grading, VFX, and sound design included</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-hand-holding-usd"></i>
        </div>
        <h4>Transparent Pricing</h4>
        <p>Clear packages and no hidden costs for revisions</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Brief</h4>
            <p>Define goals & style</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-pen-fancy"></i></div>
            <h4>Script</h4>
            <p>Write & storyboard</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-video"></i></div>
            <h4>Shoot</h4>
            <p>Filming day(s)</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-cut"></i></div>
            <h4>Edit</h4>
            <p>Post-production</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-comment-dots"></i></div>
            <h4>Review</h4>
            <p>Feedback rounds</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-file-export"></i></div>
            <h4>Deliver</h4>
            <p>Final files sent</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Video Production Packages</h2>
            <p class="section-subtitle">Flexible solutions for different production needs</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Social Starter</h4>
                        <p>Perfect for Reels & Shorts</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">25,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 60 Seconds</li>
                            <li><i class="fas fa-check"></i> Vertical Format (9:16)</li>
                            <li><i class="fas fa-check"></i> Basic Editing & Cuts</li>
                            <li><i class="fas fa-check"></i> Stock Music</li>
                            <li><i class="fas fa-check"></i> Basic Text Overlay</li>
                            <li><i class="fas fa-check"></i> 1 Revision Round</li>
                            <li><i class="fas fa-times text-muted"></i> Scriptwriting</li>
                            <li><i class="fas fa-times text-muted"></i> Voiceover</li>
                            <li><i class="fas fa-times text-muted"></i> On-Location Shoot</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Explainer / Promo</h4>
                        <p>Animated or Stock Footage</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">50,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 2 Minutes</li>
                            <li><i class="fas fa-check"></i> 2D Animation / Stock</li>
                            <li><i class="fas fa-check"></i> Professional Voiceover</li>
                            <li><i class="fas fa-check"></i> Scriptwriting</li>
                            <li><i class="fas fa-check"></i> Custom Motion Graphics</li>
                            <li><i class="fas fa-check"></i> Licensed Music</li>
                            <li><i class="fas fa-check"></i> 2 Revision Rounds</li>
                            <li><i class="fas fa-check"></i> HD 1080p Delivery</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Corporate Shoot</h4>
                        <p>On-Location Filming</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 1 Day Shoot</li>
                            <li><i class="fas fa-check"></i> Professional Crew</li>
                            <li><i class="fas fa-check"></i> Cinema Cameras & Lighting</li>
                            <li><i class="fas fa-check"></i> Drone Shots (if feasible)</li>
                            <li><i class="fas fa-check"></i> Advanced Post-Production</li>
                            <li><i class="fas fa-check"></i> Color Grading</li>
                            <li><i class="fas fa-check"></i> Sound Mixing</li>
                            <li><i class="fas fa-check"></i> 4K Delivery</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Video production costs vary heavily based on location, actors, length, and complexity.</p>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>Recent Productions</h2>
            <p class="section-subtitle">A glimpse of our visual work</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card video">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/video-project-1.jpg') }}" alt="Tech Startup Explainer Video" loading="lazy">
                        <div class="play-icon">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">Watch Video</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Explainer</span>
                        <h4>SaaS Platform Walkthrough</h4>
                        <p>2D animated explainer simplifying complex software features</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card video">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/video-project-2.jpg') }}" alt="Corporate Brand Film" loading="lazy">
                        <div class="play-icon">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">Watch Video</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Corporate</span>
                        <h4>Manufacturing Facility Tour</h4>
                        <p>Cinematic tour of a factory facility featuring drone shots</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card video">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/video-project-3.jpg') }}" alt="Product Commercial" loading="lazy">
                        <div class="play-icon">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">Watch Video</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Commercial</span>
                        <h4>Beverage Brand TVC</h4>
                        <p>High-energy lifestyle commercial for a new drink launch</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-view-all">
                View All Videos <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@section('testimonials-section')
<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Testimonials</span>
            <h2>What Our Clients Say</h2>
            <p class="section-subtitle">Feedback on our production quality</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"The explainer video they created for us was exactly what we needed. It simplified our complex product into a 90-second engaging story. Sales conversions went up by 20%!"</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-video-1.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Vikram Sethi</h5>
                            <span>Founder, FinTech App</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Professional, creative, and on time. The crew was great to work with during the shoot, and the post-production magic they did made our office look amazing."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-video-2.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Anjali Sharma</h5>
                            <span>HR Director, MNC</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">"We needed a series of quick social media ads. Shiva Tech Digital delivered high-energy cuts that performed exceptionally well on Instagram. Great editing skills!"</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-video-3.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Rahul Verma</h5>
                            <span>Marketing Head, Fashion Brand</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('faqs-section')
    <x-faqs-section 
        page-slug="services/video-production"
        section-title="Frequently Asked Questions About Video Production Services"
        section-subtitle="Answers to common branding questions" />
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Close other FAQs
            faqQuestions.forEach(q => {
                if (q !== question) {
                    q.nextElementSibling.classList.remove('show');
                    q.querySelector('i').style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current FAQ
            answer.classList.toggle('show');
            icon.style.transform = answer.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
        });
    });

    // Lazy loading for images
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src || image.src;
                    image.classList.add('loaded');
                    observer.unobserve(image);
                }
            });
        });
        lazyImages.forEach(img => imageObserver.observe(img));
    }
});
</script>
@endpush