@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/branding-services')

@section('breadcrumb-title', 'Branding & Identity Design')
@section('service-category', 'Design Services')
@section('hero-title', 'Professional Branding & Identity Design Services in Noida')
@section('hero-description', 'Create a powerful brand that resonates with your audience and stands the test of time. From strategic brand positioning to stunning visual identities, we craft brands that inspire trust, loyalty, and growth. Affordable pricing for startups in Delhi NCR.')
@section('service-name', 'Branding & Identity Design')
@section('service-name-lower', 'branding')

@section('trust-badge-1', '500+ Brands Created')
@section('trust-badge-2', 'Award-Winning Designs')
@section('trust-badge-3', '98% Client Satisfaction')

@section('hero-image')
<img src="{{ asset('web_assets/img/services/branding-hero.svg') }}" 
     alt="Branding & Identity Design Services - Logo Design, Brand Strategy - Shiva Tech Digital Noida" 
     class="img-fluid service-hero-img" 
     loading="eager"
     width="600"
     height="500">
@endsection

@section('hero-stats')
<div class="stat-card" role="listitem">
    <h3 aria-label="500+ Brands Created">500+</h3>
    <p>Brands Created</p>
</div>
<div class="stat-card" role="listitem">
    <h3 aria-label="15+ Design Awards">15+</h3>
    <p>Design Awards</p>
</div>
<div class="stat-card" role="listitem">
    <h3 aria-label="98% Client Satisfaction">98%</h3>
    <p>Client Satisfaction</p>
</div>
@endsection

@section('service-content')
    <!-- ========================================
         OVERVIEW SECTION
    ======================================== -->
    <!-- Visible Breadcrumb (optional, for user navigation) -->
    <nav aria-label="Breadcrumb" class="breadcrumb-nav py-3 bg-light">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/services') }}">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb-title', 'Service')</li>
            </ol>
        </div>
    </nav>
    <section class="service-overview py-5" id="overview" aria-labelledby="overview-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <article class="overview-content">
                        <span class="section-badge">About Our Branding Service</span>
                        <h2 id="overview-heading">Build a Brand That Matters in Noida & Delhi NCR</h2>
                        <p class="lead">At Shiva Tech Digital, we don't just design logos – we build brands that tell compelling stories, create emotional connections, and drive business success.</p>
                        <p>With over <strong>500 successful branding projects</strong> across diverse industries, our team of brand strategists and designers collaborate to create identities that capture your essence and resonate with your target audience. Every color, every shape, every word is intentional. Based in Noida, we serve startups and businesses across Delhi NCR with affordable, high-quality branding services.</p>
                        
                        <div class="overview-highlights" role="list" aria-label="Our branding highlights">
                            <div class="highlight-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5" style="color:white">Strategy-First Approach</h3>
                                    <p>Every design decision rooted in brand strategy</p>
                                </div>
                            </div>
                            <div class="highlight-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5" style="color:white">Unique & Memorable</h3>
                                    <p>Distinctive identities that stand out from competition</p>
                                </div>
                            </div>
                            <div class="highlight-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5" style="color:white">Consistent & Scalable</h3>
                                    <p>Comprehensive systems that work across all touchpoints</p>
                                </div>
                            </div>
                            <div class="highlight-item" role="listitem">
                                <i class="fas fa-check-circle" aria-hidden="true"></i>
                                <div>
                                    <h3 class="h5" style="color:white">Future-Proof Design</h3>
                                    <p>Timeless aesthetics that evolve with your business</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <figure class="overview-image-wrapper">
                        <img src="{{ asset('web_assets/img/services/branding-overview.jpg') }}" 
                             alt="Brand Identity Design Process - Logo Design, Visual Identity - Shiva Tech Digital" 
                             class="img-fluid rounded-lg shadow-lg" 
                             loading="lazy"
                             width="600"
                             height="450">
                        <div class="experience-badge" aria-hidden="true">
                            <span class="years">500+</span>
                            <span class="text">Brands Created</span>
                        </div>
                        <figcaption class="visually-hidden">Brand Identity Design Process at Shiva Tech Digital</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SERVICES OFFERED SECTION
    ======================================== -->
    <section class="services-offered py-5 bg-light" id="branding-services" aria-labelledby="services-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">What We Offer</span>
                <h2 id="services-heading">Our Branding & Identity Design Services</h2>
                <p class="section-subtitle">Comprehensive branding solutions from strategy to execution in Noida</p>
            </header>
            <div class="row g-4" role="list">
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-chess"></i>
                        </div>
                        <h3 itemprop="name">Brand Strategy Services</h3>
                        <p itemprop="description">Define your brand's purpose, positioning, and personality to create a strong foundation for all brand communications.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Discovery & Research</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Competitor Analysis</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Positioning</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Messaging Framework</li>
                        </ul>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                        <h3 itemprop="name">Logo Design Services</h3>
                        <p itemprop="description">Create a distinctive, memorable logo that captures your brand essence and works across all applications.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Custom Logo Design</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Logo Variations</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Icon & Symbol Design</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Logo Animation</li>
                        </ul>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-palette"></i>
                        </div>
                        <h3 itemprop="name">Visual Identity System</h3>
                        <p itemprop="description">Develop a cohesive visual language including colors, typography, imagery, and graphic elements.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Color Palette</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Typography System</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Iconography</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Photography Style</li>
                        </ul>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 itemprop="name">Brand Guidelines</h3>
                        <p itemprop="description">Comprehensive documentation ensuring consistent brand application across all channels and teams.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Logo Usage Rules</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Color Specifications</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Typography Guidelines</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Application Examples</li>
                        </ul>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <h3 itemprop="name">Corporate Identity Design</h3>
                        <p itemprop="description">Design all business collateral from stationery to presentations for a professional brand presence.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Business Cards</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Letterheads & Envelopes</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Email Signatures</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Presentation Templates</li>
                        </ul>
                    </article>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="service-offered-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon-wrapper" aria-hidden="true">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <h3 itemprop="name">Packaging Design</h3>
                        <p itemprop="description">Eye-catching packaging that tells your brand story and creates memorable unboxing experiences.</p>
                        <ul class="service-features-list">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Product Packaging</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Label Design</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Box & Bag Design</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Packaging Mockups</li>
                        </ul>
                    </article>
                </div>
                
            </div>
        </div>
    </section>

    <!-- ========================================
         BRAND ELEMENTS SECTION
    ======================================== -->
    <section class="brand-elements py-5" id="deliverables" aria-labelledby="deliverables-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Deliverables</span>
                <h2 id="deliverables-heading">What's Included in Your Brand Identity Package</h2>
                <p class="section-subtitle">Every element you need to launch and grow your brand</p>
            </header>
            <div class="row g-4" role="list">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="h5">Primary Logo</h3>
                        <p>Main logo in all formats (AI, SVG, PNG, PDF)</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-compress-alt"></i>
                        </div>
                        <h3 class="h5">Logo Variations</h3>
                        <p>Horizontal, stacked, icon versions</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-fill-drip"></i>
                        </div>
                        <h3 class="h5">Color Palette</h3>
                        <p>Primary & secondary colors with codes</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-font"></i>
                        </div>
                        <h3 class="h5">Typography</h3>
                        <p>Font families & hierarchy guidelines</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-icons"></i>
                        </div>
                        <h3 class="h5">Icon Set</h3>
                        <p>Custom brand icons for digital use</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-shapes"></i>
                        </div>
                        <h3 class="h5">Graphic Elements</h3>
                        <p>Patterns, textures & design elements</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <h3 class="h5">Business Cards</h3>
                        <p>Print-ready designs with bleed</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450" role="listitem">
                    <div class="brand-element-card">
                        <div class="element-icon" aria-hidden="true">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3 class="h5">Brand Guidelines</h3>
                        <p>Complete usage manual (PDF)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         ADDITIONAL BRANDING SERVICES
    ======================================== -->
    <section class="additional-services py-5 bg-light" id="extended-services" aria-labelledby="extended-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Extended Services</span>
                <h2 id="extended-heading">Additional Branding Services in Noida</h2>
                <p class="section-subtitle">Complete brand expression across all touchpoints</p>
            </header>
            <div class="row g-4" role="list">
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-bullhorn" aria-hidden="true"></i>
                        <h3 class="h5">Brand Naming</h3>
                        <p>Name creation & trademark search</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-quote-left" aria-hidden="true"></i>
                        <h3 class="h5">Tagline & Messaging</h3>
                        <p>Compelling brand slogans</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-share-alt" aria-hidden="true"></i>
                        <h3 class="h5">Social Media Branding</h3>
                        <p>Profile graphics & templates</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-tshirt" aria-hidden="true"></i>
                        <h3 class="h5">Merchandise Design</h3>
                        <p>T-shirts, bags, merchandise</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-store" aria-hidden="true"></i>
                        <h3 class="h5">Signage Design</h3>
                        <p>Office & retail signage</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-car" aria-hidden="true"></i>
                        <h3 class="h5">Vehicle Branding</h3>
                        <p>Fleet & vehicle wraps</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-print" aria-hidden="true"></i>
                        <h3 class="h5">Print Collateral</h3>
                        <p>Brochures, flyers, posters</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450" role="listitem">
                    <div class="additional-service-card">
                        <i class="fas fa-sync-alt" aria-hidden="true"></i>
                        <h3 class="h5">Brand Refresh</h3>
                        <p>Modernize existing brands</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         BRANDING PROCESS SECTION
    ======================================== -->
    <section class="brand-process py-5" id="process" aria-labelledby="process-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Our Approach</span>
                <h2 id="process-heading">The Branding Process at Shiva Tech Digital</h2>
                <p class="section-subtitle">A strategic approach to creating meaningful brands</p>
            </header>
            <div class="brand-process-timeline" data-aos="fade-up" role="list">
                <article class="process-phase" role="listitem">
                    <div class="phase-number" aria-hidden="true">01</div>
                    <div class="phase-content">
                        <div class="phase-icon" aria-hidden="true"><i class="fas fa-search"></i></div>
                        <h3>Discover</h3>
                        <p>Deep dive into your business, audience, competitors, and goals through workshops and research.</p>
                        <ul class="phase-activities">
                            <li>Brand Audit</li>
                            <li>Stakeholder Interviews</li>
                            <li>Market Research</li>
                            <li>Competitor Analysis</li>
                        </ul>
                    </div>
                </article>
                <article class="process-phase" role="listitem">
                    <div class="phase-number" aria-hidden="true">02</div>
                    <div class="phase-content">
                        <div class="phase-icon" aria-hidden="true"><i class="fas fa-lightbulb"></i></div>
                        <h3>Define</h3>
                        <p>Establish brand strategy, positioning, personality, and key messaging frameworks.</p>
                        <ul class="phase-activities">
                            <li>Brand Positioning</li>
                            <li>Brand Personality</li>
                            <li>Value Proposition</li>
                            <li>Messaging Strategy</li>
                        </ul>
                    </div>
                </article>
                <article class="process-phase" role="listitem">
                    <div class="phase-number" aria-hidden="true">03</div>
                    <div class="phase-content">
                        <div class="phase-icon" aria-hidden="true"><i class="fas fa-pencil-alt"></i></div>
                        <h3>Design</h3>
                        <p>Create visual identity concepts, refine, and develop the complete brand system.</p>
                        <ul class="phase-activities">
                            <li>Concept Development</li>
                            <li>Logo Design</li>
                            <li>Visual Identity</li>
                            <li>Refinement Rounds</li>
                        </ul>
                    </div>
                </article>
                <article class="process-phase" role="listitem">
                    <div class="phase-number" aria-hidden="true">04</div>
                    <div class="phase-content">
                        <div class="phase-icon" aria-hidden="true"><i class="fas fa-rocket"></i></div>
                        <h3>Deliver</h3>
                        <p>Finalize all assets, create guidelines, and support brand launch and implementation.</p>
                        <ul class="phase-activities">
                            <li>Brand Guidelines</li>
                            <li>Asset Library</li>
                            <li>Implementation Support</li>
                            <li>Team Training</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ========================================
         INDUSTRIES SECTION
    ======================================== -->
    <section class="industries-section py-5 bg-light" id="industries" aria-labelledby="industries-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Industries</span>
                <h2 id="industries-heading">Branding Across Industries</h2>
                <p class="section-subtitle">We've created brands for diverse sectors in Delhi NCR & India</p>
            </header>
            <div class="industries-grid" data-aos="fade-up" role="list">
                <div class="industry-item" role="listitem">
                    <i class="fas fa-laptop" aria-hidden="true"></i>
                    <span>Technology & SaaS</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-shopping-bag" aria-hidden="true"></i>
                    <span>Retail & E-commerce</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-heartbeat" aria-hidden="true"></i>
                    <span>Healthcare & Wellness</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-university" aria-hidden="true"></i>
                    <span>Finance & Banking</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-utensils" aria-hidden="true"></i>
                    <span>Food & Beverage</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                    <span>Education</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <span>Real Estate</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-plane" aria-hidden="true"></i>
                    <span>Travel & Hospitality</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-dumbbell" aria-hidden="true"></i>
                    <span>Fitness & Sports</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-spa" aria-hidden="true"></i>
                    <span>Beauty & Cosmetics</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-building" aria-hidden="true"></i>
                    <span>Professional Services</span>
                </div>
                <div class="industry-item" role="listitem">
                    <i class="fas fa-rocket" aria-hidden="true"></i>
                    <span>Startups</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         BENEFITS SECTION
    ======================================== -->
    <section class="service-benefits py-5" id="benefits" aria-labelledby="benefits-heading">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <header class="benefits-header">
                        <span class="section-badge">Benefits</span>
                        <h2 id="benefits-heading">Why Invest in Professional Branding?</h2>
                        <p>A strong brand is your most valuable business asset</p>
                    </header>
                    <div class="brand-stats mt-4" role="list">
                        <div class="stat-item" role="listitem">
                            <span class="stat-number">59%</span>
                            <span class="stat-text">Consumers prefer to buy from familiar brands</span>
                        </div>
                        <div class="stat-item" role="listitem">
                            <span class="stat-number">77%</span>
                            <span class="stat-text">B2B buyers make purchases based on brand trust</span>
                        </div>
                        <div class="stat-item" role="listitem">
                            <span class="stat-number">23%</span>
                            <span class="stat-text">Average revenue increase with consistent branding</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="benefits-grid" role="list">
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Instant Recognition</h3>
                                <p>Stand out in crowded markets with a memorable visual identity</p>
                            </div>
                        </article>
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Emotional Connection</h3>
                                <p>Build lasting relationships through meaningful brand experiences</p>
                            </div>
                        </article>
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Trust & Credibility</h3>
                                <p>Professional branding signals quality and reliability</p>
                            </div>
                        </article>
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Premium Pricing</h3>
                                <p>Strong brands command higher prices and margins</p>
                            </div>
                        </article>
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Customer Loyalty</h3>
                                <p>Turn customers into advocates who choose you repeatedly</p>
                            </div>
                        </article>
                        <article class="benefit-item" role="listitem">
                            <div class="benefit-icon" aria-hidden="true">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <div class="benefit-content">
                                <h3 class="h5">Attract Top Talent</h3>
                                <p>Strong employer brands attract the best employees</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         BRAND TYPES SECTION
    ======================================== -->
    <section class="brand-types py-5 bg-light" id="brand-types" aria-labelledby="brand-types-heading">
        <div class="container">
            <header class="section-header text-center mb-5" data-aos="fade-up">
                <span class="section-badge">Brand Types</span>
                <h2 id="brand-types-heading">Branding Solutions for Every Need</h2>
                <p class="section-subtitle">Whether starting fresh or evolving, we've got you covered</p>
            </header>
            <div class="row g-4" role="list">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                    <article class="brand-type-card startup">
                        <div class="brand-type-icon" aria-hidden="true">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Startup Branding</h3>
                        <p>Launch with impact. Complete brand identity for new ventures looking to make their mark from day one.</p>
                        <ul>
                            <li>Brand Strategy</li>
                            <li>Logo & Visual Identity</li>
                            <li>Basic Guidelines</li>
                            <li>Essential Collateral</li>
                        </ul>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                    <article class="brand-type-card corporate">
                        <div class="brand-type-icon" aria-hidden="true">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Corporate Branding</h3>
                        <p>Comprehensive brand systems for established businesses seeking professional, scalable identities.</p>
                        <ul>
                            <li>In-depth Strategy</li>
                            <li>Complete Visual System</li>
                            <li>Extensive Guidelines</li>
                            <li>Full Collateral Suite</li>
                        </ul>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                    <article class="brand-type-card rebrand">
                        <div class="brand-type-icon" aria-hidden="true">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3>Rebranding</h3>
                        <p>Evolve your brand while retaining equity. Strategic refreshes for brands ready to level up.</p>
                        <ul>
                            <li>Brand Audit</li>
                            <li>Strategic Evolution</li>
                            <li>Updated Identity</li>
                            <li>Transition Planning</li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('why-choose-items')
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
    <article class="why-choose-card">
        <div class="icon-box" aria-hidden="true">
            <i class="fas fa-chess"></i>
        </div>
        <h3 class="h4">Strategy-Led Design</h3>
        <p>Every creative decision rooted in research and brand strategy</p>
    </article>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
    <article class="why-choose-card">
        <div class="icon-box" aria-hidden="true">
            <i class="fas fa-award"></i>
        </div>
        <h3 class="h4">Award-Winning Team</h3>
        <p>15+ design awards with work featured globally</p>
    </article>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
    <article class="why-choose-card">
        <div class="icon-box" aria-hidden="true">
            <i class="fas fa-infinity"></i>
        </div>
        <h3 class="h4">Unlimited Revisions</h3>
        <p>We iterate until you're 100% satisfied with your brand</p>
    </article>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
    <article class="why-choose-card">
        <div class="icon-box" aria-hidden="true">
            <i class="fas fa-file-alt"></i>
        </div>
        <h3 class="h4">Complete Ownership</h3>
        <p>All files, source assets & copyrights belong to you</p>
    </article>
</div>
@endsection

@section('process-steps')
<div class="row" role="list">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">01</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-comments"></i></div>
            <h3>Discovery</h3>
            <p>Understanding your vision & goals</p>
        </article>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">02</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-search"></i></div>
            <h3>Research</h3>
            <p>Market & competitor analysis</p>
        </article>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">03</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-chess"></i></div>
            <h3>Strategy</h3>
            <p>Brand positioning & messaging</p>
        </article>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">04</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-palette"></i></div>
            <h3>Design</h3>
            <p>Visual identity creation</p>
        </article>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">05</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-sync"></i></div>
            <h3>Refine</h3>
            <p>Feedback & revisions</p>
        </article>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600" role="listitem">
        <article class="process-step">
            <div class="step-number" aria-hidden="true">06</div>
            <div class="step-icon" aria-hidden="true"><i class="fas fa-box-open"></i></div>
            <h3>Deliver</h3>
            <p>Assets & guidelines handoff</p>
        </article>
    </div>
</div>
@endsection

@section('technologies-section')
<section class="technologies-section py-5" id="design-tools" aria-labelledby="tools-heading">
    <div class="container">
        <header class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Tools</span>
            <h2 id="tools-heading">Design Tools We Use</h2>
            <p class="section-subtitle">Industry-standard tools for professional brand design</p>
        </header>
        <div class="tech-categories" role="list">
            <article class="tech-category" data-aos="fade-up" data-aos-delay="100" role="listitem">
                <h3 class="h5">Vector & Logo Design</h3>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/illustrator.svg') }}" alt="Adobe Illustrator Logo" loading="lazy" width="48" height="48">
                        <span>Illustrator</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/figma.svg') }}" alt="Figma Logo" loading="lazy" width="48" height="48">
                        <span>Figma</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/sketch.svg') }}" alt="Sketch Logo" loading="lazy" width="48" height="48">
                        <span>Sketch</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/affinity-designer.svg') }}" alt="Affinity Designer Logo" loading="lazy" width="48" height="48">
                        <span>Affinity</span>
                    </div>
                </div>
            </article>
            <article class="tech-category" data-aos="fade-up" data-aos-delay="200" role="listitem">
                <h3 class="h5">Image & Photo Editing</h3>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/photoshop.svg') }}" alt="Adobe Photoshop Logo" loading="lazy" width="48" height="48">
                        <span>Photoshop</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/lightroom.svg') }}" alt="Adobe Lightroom Logo" loading="lazy" width="48" height="48">
                        <span>Lightroom</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/capture-one.svg') }}" alt="Capture One Logo" loading="lazy" width="48" height="48">
                        <span>Capture One</span>
                    </div>
                </div>
            </article>
            <article class="tech-category" data-aos="fade-up" data-aos-delay="300" role="listitem">
                <h3 class="h5">Layout & Print</h3>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/indesign.svg') }}" alt="Adobe InDesign Logo" loading="lazy" width="48" height="48">
                        <span>InDesign</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/canva.svg') }}" alt="Canva Logo" loading="lazy" width="48" height="48">
                        <span>Canva</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/affinity-publisher.svg') }}" alt="Affinity Publisher Logo" loading="lazy" width="48" height="48">
                        <span>Publisher</span>
                    </div>
                </div>
            </article>
            <article class="tech-category" data-aos="fade-up" data-aos-delay="400" role="listitem">
                <h3 class="h5">Motion & Animation</h3>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/after-effects.svg') }}" alt="After Effects Logo" loading="lazy" width="48" height="48">
                        <span>After Effects</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/lottie.svg') }}" alt="Lottie Logo" loading="lazy" width="48" height="48">
                        <span>Lottie</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/rive.svg') }}" alt="Rive Logo" loading="lazy" width="48" height="48">
                        <span>Rive</span>
                    </div>
                </div>
            </article>
            <article class="tech-category" data-aos="fade-up" data-aos-delay="500" role="listitem">
                <h3 class="h5">3D & Mockups</h3>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/blender.svg') }}" alt="Blender Logo" loading="lazy" width="48" height="48">
                        <span>Blender</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/cinema4d.svg') }}" alt="Cinema 4D Logo" loading="lazy" width="48" height="48">
                        <span>Cinema 4D</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/dimension.svg') }}" alt="Adobe Dimension Logo" loading="lazy" width="48" height="48">
                        <span>Dimension</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light" id="pricing" aria-labelledby="pricing-heading">
    <div class="container">
        <header class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2 id="pricing-heading">Affordable Branding Packages in Noida</h2>
            <p class="section-subtitle">Investment in your brand's future - Startup-friendly pricing</p>
        </header>
        <div class="row g-4 justify-content-center" role="list">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                <article class="pricing-card" itemscope itemtype="https://schema.org/Offer">
                    <div class="pricing-header">
                        <h3 itemprop="name">Logo Essentials</h3>
                        <p>Perfect for startups & small businesses</p>
                        <div class="price">
                            <span class="currency" itemprop="priceCurrency" content="INR">₹</span>
                            <span class="amount" itemprop="price" content="25000">25,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul itemprop="description">
                            <li><i class="fas fa-check" aria-hidden="true"></i> 3 Logo Concepts</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Unlimited Revisions</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Logo Variations</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Color Palette</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Typography Selection</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> All File Formats (AI, SVG, PNG, PDF)</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Copyright Transfer</li>
                            <li><i class="fas fa-times text-muted" aria-hidden="true"></i> <span class="text-muted">Brand Strategy</span></li>
                            <li><i class="fas fa-times text-muted" aria-hidden="true"></i> <span class="text-muted">Brand Guidelines</span></li>
                            <li><i class="fas fa-times text-muted" aria-hidden="true"></i> <span class="text-muted">Stationery Design</span></li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing" title="Get started with Logo Essentials package">Get Started</a>
                    <meta itemprop="availability" content="https://schema.org/InStock">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                <article class="pricing-card featured" itemscope itemtype="https://schema.org/Offer">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h3 itemprop="name">Brand Identity</h3>
                        <p>Complete visual identity system</p>
                        <div class="price">
                            <span class="currency" itemprop="priceCurrency" content="INR">₹</span>
                            <span class="amount" itemprop="price" content="75000">75,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul itemprop="description">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Discovery Session</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> 5 Logo Concepts</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Complete Logo Suite</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Color System</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Typography System</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Graphic Elements</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Business Card Design</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Letterhead & Envelope</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Guidelines (Basic)</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Social Media Kit</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing" title="Get started with Brand Identity package">Get Started</a>
                    <meta itemprop="availability" content="https://schema.org/InStock">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                <article class="pricing-card" itemscope itemtype="https://schema.org/Offer">
                    <div class="pricing-header">
                        <h3 itemprop="name">Complete Branding</h3>
                        <p>Full brand strategy & identity</p>
                        <div class="price">
                            <span class="currency" itemprop="priceCurrency" content="INR">₹</span>
                            <span class="amount" itemprop="price" content="200000">2,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul itemprop="description">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Strategy Workshop</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Competitor Analysis</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Positioning</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Brand Messaging</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Complete Visual Identity</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Comprehensive Guidelines</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Full Stationery Suite</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Social Media Branding</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Presentation Template</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Implementation Support</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing" title="Contact us for Complete Branding package">Contact Us</a>
                    <meta itemprop="availability" content="https://schema.org/InStock">
                </article>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Final pricing depends on scope, complexity & deliverables. Contact us for a custom quote. EMI options available.</p>
        </div>
        
        <!-- Add-on Services -->
        <div class="addon-services mt-5" data-aos="fade-up">
            <header class="section-header text-center mb-4">
                <h3>Add-on Branding Services</h3>
            </header>
            <div class="row g-3 justify-content-center" role="list">
                <div class="col-lg-2 col-md-3 col-4" role="listitem">
                    <div class="addon-card">
                        <span class="addon-name">Brand Naming</span>
                        <span class="addon-price">₹15,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4" role="listitem">
                    <div class="addon-card">
                        <span class="addon-name">Packaging Design</span>
                        <span class="addon-price">₹20,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4" role="listitem">
                    <div class="addon-card">
                        <span class="addon-name">Logo Animation</span>
                        <span class="addon-price">₹10,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4" role="listitem">
                    <div class="addon-card">
                        <span class="addon-name">Signage Design</span>
                        <span class="addon-price">₹15,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4" role="listitem">
                    <div class="addon-card">
                        <span class="addon-name">Brochure Design</span>
                        <span class="addon-price">₹12,000+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5" id="portfolio" aria-labelledby="portfolio-heading">
    <div class="container">
        <header class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2 id="portfolio-heading">Branding Projects by Shiva Tech Digital</h2>
            <p class="section-subtitle">Some of our recent brand identity work in Noida & Delhi NCR</p>
        </header>
        <div class="row g-4" role="list">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                <article class="portfolio-card branding" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/branding-project-1.jpg') }}" 
                             alt="FinTech Startup Brand Identity - Logo Design, Visual Identity - Shiva Tech Digital" 
                             loading="lazy"
                             width="400"
                             height="300"
                             itemprop="image">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view" title="View FinTech Brand Identity project">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category" itemprop="genre">Tech Startup</span>
                        <h3 itemprop="name">FinTech Brand Identity</h3>
                        <p itemprop="description">Complete brand identity for a digital payments startup in Noida</p>
                        <div class="portfolio-deliverables">
                            <span>Logo</span>
                            <span>Visual Identity</span>
                            <span>Guidelines</span>
                        </div>
                    </div>
                    <meta itemprop="creator" content="Shiva Tech Digital">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                <article class="portfolio-card branding" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/branding-project-2.jpg') }}" 
                             alt="Organic Food Brand - Packaging Design, Branding - Shiva Tech Digital" 
                             loading="lazy"
                             width="400"
                             height="300"
                             itemprop="image">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view" title="View Organic Food Brand project">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category" itemprop="genre">Food & Beverage</span>
                        <h3 itemprop="name">Organic Food Brand</h3>
                        <p itemprop="description">Branding & packaging for premium organic products</p>
                        <div class="portfolio-deliverables">
                            <span>Branding</span>
                            <span>Packaging</span>
                            <span>Stationery</span>
                        </div>
                    </div>
                    <meta itemprop="creator" content="Shiva Tech Digital">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                <article class="portfolio-card branding" itemscope itemtype="https://schema.org/CreativeWork">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/branding-project-3.jpg') }}" 
                             alt="Hospital Rebranding - Healthcare Brand Identity - Shiva Tech Digital" 
                             loading="lazy"
                             width="400"
                             height="300"
                             itemprop="image">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view" title="View Hospital Rebranding project">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category" itemprop="genre">Healthcare</span>
                        <h3 itemprop="name">Hospital Rebranding</h3>
                        <p itemprop="description">Complete brand refresh for a multi-specialty hospital</p>
                        <div class="portfolio-deliverables">
                            <span>Rebrand</span>
                            <span>Signage</span>
                            <span>Collateral</span>
                        </div>
                    </div>
                    <meta itemprop="creator" content="Shiva Tech Digital">
                </article>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-view-all" title="View all branding projects">
                View All Branding Projects <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@section('testimonials-section')
<section class="testimonials-section py-5 bg-light" id="testimonials" aria-labelledby="testimonials-heading">
    <div class="container">
        <header class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Testimonials</span>
            <h2 id="testimonials-heading">What Our Branding Clients Say</h2>
            <p class="section-subtitle">Hear from brands we've helped transform in Noida & Delhi NCR</p>
        </header>
        <div class="row g-4" role="list">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" role="listitem">
                <article class="testimonial-card" itemscope itemtype="https://schema.org/Review">
                    <div class="testimonial-rating" aria-label="5 out of 5 stars">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text" itemprop="reviewBody">"They didn't just design a logo – they built a complete brand that tells our story. Every client now recognizes us instantly. The brand guidelines are so comprehensive, even new team members maintain consistency."</p>
                    <div class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <img src="{{ asset('web_assets/img/testimonials/client-10.jpg') }}" alt="Kavita Sharma - Wellness Brand Founder" loading="lazy" width="60" height="60">
                        <div class="author-info">
                            <h4 itemprop="name">Kavita Sharma</h4>
                            <span itemprop="jobTitle">Founder, Wellness Brand</span>
                        </div>
                    </div>
                    <meta itemprop="reviewRating" content="5">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200" role="listitem">
                <article class="testimonial-card" itemscope itemtype="https://schema.org/Review">
                    <div class="testimonial-rating" aria-label="5 out of 5 stars">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text" itemprop="reviewBody">"Our rebrand was the best decision we made. The team understood our heritage while making us modern. Customer perception improved dramatically – we now attract premium clients we couldn't before."</p>
                    <div class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <img src="{{ asset('web_assets/img/testimonials/client-11.jpg') }}" alt="Rajesh Krishnan - Manufacturing Company CEO" loading="lazy" width="60" height="60">
                        <div class="author-info">
                            <h4 itemprop="name">Rajesh Krishnan</h4>
                            <span itemprop="jobTitle">CEO, Manufacturing Company</span>
                        </div>
                    </div>
                    <meta itemprop="reviewRating" content="5">
                </article>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300" role="listitem">
                <article class="testimonial-card" itemscope itemtype="https://schema.org/Review">
                    <div class="testimonial-rating" aria-label="4.5 out of 5 stars">
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star" aria-hidden="true"></i>
                        <i class="fas fa-star-half-alt" aria-hidden="true"></i>
                    </div>
                    <p class="testimonial-text" itemprop="reviewBody">"The strategy workshop was eye-opening. They helped us articulate what we stand for. The visual identity now perfectly reflects our values. We've received countless compliments on our new look."</p>
                    <div class="testimonial-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <img src="{{ asset('web_assets/img/testimonials/client-12.jpg') }}" alt="Neha Patel - EdTech Startup Co-founder" loading="lazy" width="60" height="60">
                        <div class="author-info">
                            <h4 itemprop="name">Neha Patel</h4>
                            <span itemprop="jobTitle">Co-founder, EdTech Startup</span>
                        </div>
                    </div>
                    <meta itemprop="reviewRating" content="4.5">
                </article>
            </div>
        </div>
    </div>
</section>
@endsection

@section('faqs-section')
    <x-faqs-section 
        page-slug="services/branding-services"
        section-title="Frequently Asked Questions About Branding Services"
        section-subtitle="Answers to common branding questions" />
@endsection

@push('styles')
<style>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    // ========================================
    // LAZY LOADING FOR IMAGES
    // ========================================
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    if (image.dataset.src) {
                        image.src = image.dataset.src;
                    }
                    image.classList.add('loaded');
                    observer.unobserve(image);
                }
            });
        });
        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // ========================================
    // TRACK CTA CLICKS (GA4)
    // ========================================
    document.querySelectorAll('.btn-pricing, .btn-view, .btn-view-all').forEach(btn => {
        btn.addEventListener('click', function() {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'cta_click', {
                    'event_category': 'Branding Services',
                    'event_label': this.textContent.trim() || 'CTA Click'
                });
            }
        });
    });
});
</script>
@endpush