@extends('website.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'about')

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
                <a itemprop="item" href="https://shivatechdigital.com/about">
                    <span itemprop="name">About Us</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
        </ol>
    </nav>

    <!-- ========================================
         PAGE HEADER - NOIDA FOCUSED
    ======================================== -->
    <section class="page-header-creative" aria-labelledby="page-heading">
        <div class="page-header-bg" aria-hidden="true">
            <div class="header-orb orb-1"></div>
            <div class="header-orb orb-2"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="page-badge">About Shiva Tech Digital Noida</span>
                    <h1 class="page-title" id="page-heading">
                        {{ $about->page_title ?? 'Noida\'s Startup-Friendly Web Development Agency' }}
                    </h1>
                    <p class="page-subtitle">
                        {{ $about->page_subtitle ?? 'We are a passionate team of developers and marketers based in Noida, Delhi NCR, dedicated to helping startups and SMEs build their digital presence at affordable prices.' }}
                    </p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="header-stats" role="list" aria-label="Our achievements">
                        <div class="header-stat-item" role="listitem">
                            <p class="stat-number" data-count="{{ $about->projects_delivered ?? '50' }}" aria-label="{{ $about->projects_delivered ?? '50' }}+ Projects">0+</p>
                            <p>Projects Delivered</p>
                        </div>
                        <div class="header-stat-item" role="listitem">
                            <p class="stat-number" data-count="{{ $about->happy_clients ?? '30' }}" aria-label="{{ $about->happy_clients ?? '30' }}+ Clients">0+</p>
                            <p>Happy Clients</p>
                        </div>
                        <div class="header-stat-item" role="listitem">
                            <p class="stat-number" data-count="4.9" aria-label="4.9 Star Rating">4.9</p>
                            <p>Star Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         ABOUT CONTENT SECTION - NOIDA
    ======================================== -->
    <section class="about-content-section py-5" id="our-story" aria-labelledby="about-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <figure class="about-image-wrapper">
                        @if($about->about_image ?? '')
                            <img src="{{ asset('storage/' . $about->about_image) }}" 
                                 alt="Shiva Tech Digital team working on web development projects in Noida office" 
                                 class="img-fluid"
                                 loading="lazy"
                                 width="600"
                                 height="400">
                        @else
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800" 
                                 alt="Shiva Tech Digital team collaborating on a startup project in Noida" 
                                 class="img-fluid"
                                 loading="lazy"
                                 width="600"
                                 height="400">
                        @endif
                        <div class="about-image-decoration" aria-hidden="true">
                            <div class="deco-element element-1"></div>
                            <div class="deco-element element-2"></div>
                        </div>
                        <figcaption class="visually-hidden">Shiva Tech Digital team in Noida</figcaption>
                    </figure>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="section-label">{{ $about->section_label ?? 'Who We Are' }}</span>
                    <h2 class="section-title-creative-dark" id="about-heading">
                        {{ $about->section_title ?? 'Affordable Web Development for Startups in Noida' }}
                    </h2>
                    <p class="lead">
                        {{ $about->lead_text ?? 'Shiva Tech Digital is a startup-friendly web development and digital marketing agency based in Sector 62, Noida, Delhi NCR. We specialize in delivering high-quality digital solutions at prices that startups and SMEs can afford.' }}
                    </p>
                    
                    <div class="about-description">
                        {!! nl2br(e($about->description ?? 'As a startup ourselves, we understand the challenges of building a business with limited resources. That\'s why we\'ve made it our mission to provide enterprise-quality web development, mobile app development, and digital marketing services at competitive prices.

Our team specializes in Laravel, React.js, Vue.js, Flutter, and comprehensive SEO services. We serve clients across Noida, Greater Noida, Delhi, Gurgaon, Ghaziabad, Faridabad, and the entire Delhi NCR region.

What sets us apart is our personal approach - you get direct access to the founders, transparent pricing with no hidden costs, and fast turnaround times that larger agencies can\'t match.')) !!}
                    </div>
                    
                    <div class="about-highlights" role="list" aria-label="Our key highlights">
                        <article class="highlight-item" role="listitem">
                            <i class="fas fa-rupee-sign" aria-hidden="true"></i>
                            <div>
                                <h3 class="h5">{{ $about->highlight_1_title ?? 'Affordable Pricing' }}</h3>
                                <p>{{ $about->highlight_1_text ?? '30-50% less than big agencies' }}</p>
                            </div>
                        </article>
                        <article class="highlight-item" role="listitem">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                            <div>
                                <h3 class="h5">{{ $about->highlight_2_title ?? 'Direct Founder Access' }}</h3>
                                <p>{{ $about->highlight_2_text ?? 'Talk to decision makers' }}</p>
                            </div>
                        </article>
                        <article class="highlight-item" role="listitem">
                            <i class="fas fa-bolt" aria-hidden="true"></i>
                            <div>
                                <h3 class="h5">{{ $about->highlight_3_title ?? 'Fast Delivery' }}</h3>
                                <p>{{ $about->highlight_3_text ?? 'Startup agility & speed' }}</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         WHY CHOOSE US SECTION - STARTUP FOCUSED
    ======================================== -->
    <section class="why-choose-section py-5" id="why-choose-us" aria-labelledby="why-choose-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Why Choose Us</span>
                <h2 class="section-title-creative-dark" id="why-choose-heading">Why Noida Startups Choose Shiva Tech Digital</h2>
                <p class="section-subtitle-creative">We understand startups because we are one</p>
            </header>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h3 class="h4">Startup-Friendly Pricing</h3>
                        <p>We offer <strong>30-50% lower prices</strong> than big agencies in Noida and Gurgaon. Transparent quotes with no hidden costs. EMI payment options available for larger projects.</p>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="h4">Direct Founder Access</h3>
                        <p>No account managers or middlemen. You communicate directly with decision-makers who understand your vision and can make quick decisions for your project.</p>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3 class="h4">Fast Turnaround</h3>
                        <p>No corporate bureaucracy means <strong>faster delivery</strong>. We move at startup speed - landing pages in 3-5 days, business websites in 1-2 weeks.</p>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="h4">Modern Tech Stack</h3>
                        <p>We use the latest technologies - <strong>Laravel, React, Vue.js, Flutter, Node.js</strong> - to build fast, scalable, and secure applications for your business.</p>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="h4">Flexible Payments</h3>
                        <p>We understand startup cash flow challenges. <strong>Milestone-based payments, EMI options</strong>, and flexible terms to work within your budget constraints.</p>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <article class="why-choose-card">
                        <div class="icon-box" aria-hidden="true">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="h4">Local Noida Team</h3>
                        <p>Based in <strong>Sector 62, Noida</strong> - we're available for in-person meetings across Delhi NCR. Local presence means better communication and trust.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         FOUNDER MESSAGE SECTION
    ======================================== -->
    <section class="founder-section" id="founder" aria-labelledby="founder-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <figure class="founder-image">
                        @if($about->founder_image ?? '')
                            <img src="{{ asset('storage/' . $about->founder_image) }}" 
                                 alt="{{ $about->founder_name ?? 'Shiva Tech Digital' }} - Founder & CEO of Shiva Tech Digital Noida" 
                                 class="img-fluid rounded"
                                 loading="lazy">
                        @else
                            <img src="https://ui-avatars.com/api/?name=Founder&size=400&background=667eea&color=fff" 
                                 alt="Shiva Tech Digital Founder" 
                                 class="img-fluid rounded"
                                 loading="lazy"
                                 width="400"
                                 height="500">
                        @endif
                        <div class="founder-badge" aria-hidden="true">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <figcaption class="visually-hidden">{{ $about->founder_name ?? 'Founder' }} - Founder of Shiva Tech Digital</figcaption>
                    </figure>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="founder-content">
                        <span class="founder-label">{{ $about->founder_label ?? 'Message from our Founder' }}</span>
                        <h2 class="section-title" id="founder-heading">{{ $about->founder_name ?? 'Our Founder' }}</h2>
                        <p class="founder-title">{{ $about->founder_title ?? 'Founder & CEO, Shiva Tech Digital Noida' }}</p>

                        <blockquote class="founder-message">
                            {!! nl2br(e($about->founder_message ?? '"I started Shiva Tech Digital with a simple mission - to provide enterprise-quality web development services at prices that startups can actually afford.

Having worked in the IT industry, I saw how larger agencies often overcharge and under-deliver, especially to small businesses. I wanted to create an agency that treats every client like a partner, not just a transaction.

Based in Noida\'s tech hub, we\'re committed to helping Delhi NCR startups and SMEs build their digital presence without breaking the bank. We believe great technology should be accessible to everyone, not just those with big budgets.

When you work with us, you work directly with me and my team. No middlemen, no account managers - just honest communication and quality work."')) !!}
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         MISSION & VISION SECTION
    ======================================== -->
    <section class="mission-vision-section py-5" id="mission-vision" aria-labelledby="mission-heading">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up">
                    <article class="mission-vision-card">
                        <div class="card-icon" aria-hidden="true">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2 id="mission-heading">Our Mission</h2>
                        <p>{{ $about->mission_text ?? 'To democratize quality web development by providing affordable, enterprise-grade digital solutions to startups and SMEs in Noida, Delhi NCR, and across India. We believe every business deserves a strong digital presence, regardless of budget size.' }}</p>
                        <div class="card-decoration" aria-hidden="true"></div>
                    </article>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="mission-vision-card">
                        <div class="card-icon" aria-hidden="true">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h2>Our Vision</h2>
                        <p>{{ $about->vision_text ?? 'To become the most trusted and recommended web development agency for startups in Delhi NCR by 2027. We aim to help 500+ businesses establish their digital presence while maintaining our commitment to affordable pricing and quality delivery.' }}</p>
                        <div class="card-decoration" aria-hidden="true"></div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CORE VALUES SECTION
    ======================================== -->
    @if(isset($coreValues) && $coreValues->count() > 0)
    <section class="values-section py-5" id="values" aria-labelledby="values-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Values</span>
                <h2 class="section-title-creative" id="values-heading">What Drives Us Forward</h2>
                <p class="section-subtitle-creative">The principles that guide everything we do at Shiva Tech Digital Noida</p>
            </header>
            <div class="row g-4" role="list">
                @foreach($coreValues as $value)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" role="listitem">
                    <article class="value-card">
                        <div class="value-icon" aria-hidden="true">
                            <i class="{{ $value->icon ?? 'fas fa-lightbulb' }}"></i>
                        </div>
                        <h3>{{ $value->title ?? 'Innovation' }}</h3>
                        <p>{{ $value->description ?? 'We constantly explore new technologies and creative solutions to deliver the best for our clients.' }}</p>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <!-- Default Values if none in database -->
    <section class="values-section py-5" id="values" aria-labelledby="values-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Values</span>
                <h2 class="section-title-creative" id="values-heading">What Drives Us Forward</h2>
                <p class="section-subtitle-creative">The principles that guide everything we do at Shiva Tech Digital</p>
            </header>
            <div class="row g-4" role="list">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="value-card">
                        <div class="value-icon" aria-hidden="true">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Transparency</h3>
                        <p>No hidden costs, no surprises. We provide clear quotes and honest communication throughout your project.</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="value-card">
                        <div class="value-icon" aria-hidden="true">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3>Quality</h3>
                        <p>Affordable doesn't mean cheap. We deliver enterprise-grade quality at startup-friendly prices.</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="value-card">
                        <div class="value-icon" aria-hidden="true">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Speed</h3>
                        <p>We move fast like a startup. Quick turnarounds and responsive communication are our standards.</p>
                    </article>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
                    <article class="value-card">
                        <div class="value-icon" aria-hidden="true">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Partnership</h3>
                        <p>We treat every client as a partner, not a transaction. Your success is our success.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ========================================
         TEAM SECTION
    ======================================== -->
    @if(isset($teamMembers) && $teamMembers->count() > 0)
    <section class="team-section py-5" id="team" aria-labelledby="team-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Team</span>
                <h2 class="section-title-creative-dark" id="team-heading">Meet The Experts Behind Shiva Tech Digital</h2>
                <p class="section-subtitle-creative">The talented people who make your projects successful</p>
            </header>
            <div class="row g-4" role="list">
                @foreach($teamMembers as $member)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" role="listitem">
                    <article class="team-card-creative" itemscope itemtype="https://schema.org/Person">
                        <div class="team-image-wrapper">
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" 
                                     alt="{{ $member->name }} - {{ $member->role }} at Shiva Tech Digital Noida"
                                     loading="lazy"
                                     width="300"
                                     height="250"
                                     itemprop="image">
                            @else
                                {{-- Custom styled avatar — no external dependency --}}
                                <div class="team-avatar-placeholder">
                                    @php
                                        $nameParts = explode(' ', trim($member->name));
                                        $initials = strtoupper(substr($nameParts[0], 0, 1));
                                        if (count($nameParts) > 1) $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                    @endphp
                                    <span class="team-avatar-initials" aria-hidden="true">{{ $initials }}</span>
                                </div>
                            @endif
                            <div class="team-overlay">
                                <div class="team-social">
                                    @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $member->name }}'s LinkedIn profile">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                    @if($member->twitter_url)
                                    <a href="{{ $member->twitter_url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $member->name }}'s Twitter profile">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                    @if($member->email)
                                    <a href="mailto:{{ $member->email }}" aria-label="Email {{ $member->name }}">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="team-info">
                            <h3 itemprop="name">{{ $member->name }}</h3>
                            <p class="role" itemprop="jobTitle">{{ $member->role }}</p>
                            <meta itemprop="worksFor" content="Shiva Tech Digital">
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- ========================================
         SERVICE AREAS SECTION - NOIDA/DELHI NCR
    ======================================== -->
    <section class="service-areas-section py-5" id="service-areas" aria-labelledby="service-areas-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Service Areas</span>
                <h2 class="section-title-creative-dark" id="service-areas-heading">We Serve Across Delhi NCR & Beyond</h2>
                <p class="section-subtitle-creative">Based in Noida, serving clients locally and globally</p>
            </header>
            
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-area-card" style="background: #f8f9fa; padding: 30px; border-radius: 15px;">
                        <h3 class="h4 mb-3"><i class="fas fa-map-marker-alt text-primary me-2" aria-hidden="true"></i> Delhi NCR</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">📍 <strong>Noida</strong> (Headquarters) - All Sectors</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">📍 <strong>Greater Noida</strong> - Knowledge Park, Alpha, Beta</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">📍 <strong>Delhi</strong> - South Delhi, East Delhi, Central</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">📍 <strong>Gurgaon</strong> - Cyber City, Golf Course Road</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">📍 <strong>Ghaziabad</strong> - Indirapuram, Vaishali</li>
                            <li style="padding: 8px 0;">📍 <strong>Faridabad</strong> - Sector 15, 16</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-area-card" style="background: #f8f9fa; padding: 30px; border-radius: 15px;">
                        <h3 class="h4 mb-3"><i class="fas fa-map text-primary me-2" aria-hidden="true"></i> Pan India</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇮🇳 <strong>Mumbai</strong> - Maharashtra</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇮🇳 <strong>Bangalore</strong> - Karnataka</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇮🇳 <strong>Hyderabad</strong> - Telangana</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇮🇳 <strong>Chennai</strong> - Tamil Nadu</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇮🇳 <strong>Kolkata</strong> - West Bengal</li>
                            <li style="padding: 8px 0;">🇮🇳 <strong>Pune</strong> - Maharashtra</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-area-card" style="background: #f8f9fa; padding: 30px; border-radius: 15px;">
                        <h3 class="h4 mb-3"><i class="fas fa-globe text-primary me-2" aria-hidden="true"></i> International</h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇺🇸 <strong>USA</strong> - New York, California, Texas</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇬🇧 <strong>UK</strong> - London, Manchester</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇦🇪 <strong>UAE</strong> - Dubai, Abu Dhabi</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇦🇺 <strong>Australia</strong> - Sydney, Melbourne</li>
                            <li style="padding: 8px 0; border-bottom: 1px solid #eee;">🇨🇦 <strong>Canada</strong> - Toronto, Vancouver</li>
                            <li style="padding: 8px 0;">🇸🇬 <strong>Singapore</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         TIMELINE SECTION
    ======================================== -->
    @if(isset($timelineItems) && $timelineItems->count() > 0)
    <section class="timeline-section py-5 bg-alternate" id="journey" aria-labelledby="timeline-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-label">Our Journey</span>
                <h2 class="section-title-creative-dark" id="timeline-heading">Key Milestones</h2>
                <p class="section-subtitle-creative">Our growth story from Noida</p>
            </header>
            <div class="timeline" role="list">
                @foreach($timelineItems as $timeline)
                <article class="timeline-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" role="listitem">
                    <div class="timeline-icon" aria-hidden="true">
                        <i class="{{ $timeline->icon ?? 'fas fa-flag' }}"></i>
                    </div>
                    <div class="timeline-content">
                        <h3>{{ $timeline->year }} - {{ $timeline->title }}</h3>
                        <p>{{ $timeline->description }}</p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

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
                <h2 id="cta-heading">{{ $about->cta_title ?? 'Ready to Work With Us?' }}</h2>
                <p>{{ $about->cta_subtitle ?? 'Let\'s discuss your project. Free consultation, no obligation. We\'ll provide honest advice and affordable pricing for your startup or business in Delhi NCR.' }}</p>
                
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary" title="Get free consultation for web development in Noida">
                        <span>Get Free Consultation</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="tel:+917007294764" class="btn-cta-secondary" title="Call Shiva Tech Digital Noida">
                        <span><i class="fas fa-phone me-2" aria-hidden="true"></i>+91-7007294764</span>
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
                        counter.textContent = Math.floor(target) + '+';
                    } else {
                        counter.textContent = target.toFixed(1);
                    }
                }
            };
            
            updateCounter();
        };
        
        // Intersection Observer
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
        // SMOOTH SCROLL FOR ANCHOR LINKS
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

    });
</script>
@endpush