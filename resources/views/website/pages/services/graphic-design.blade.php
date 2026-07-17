@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/graphic-design')

@section('breadcrumb-title', 'Graphic Design')
@section('service-category', 'Design Services')
@section('hero-title', 'Graphic Design Services')
@section('hero-description', 'Transform your ideas into stunning visuals that captivate your audience. From logos and marketing materials to packaging and digital graphics, our creative designers bring your vision to life with pixel-perfect precision.')
@section('service-name', 'Graphic Design')
@section('service-name-lower', 'graphic design')

@section('trust-badge-1', '5,000+ Designs Created')
@section('trust-badge-2', 'Award-Winning Team')
@section('trust-badge-3', '100% Satisfaction Guarantee')

@section('hero-image')
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKoll_LrNZdvfkMgKIIBRqcbVOJiio_1W9mg&s" alt="Graphic Design Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>5,000+</h3>
    <p>Designs Created</p>
</div>
<div class="stat-card">
    <h3>20+</h3>
    <p>Design Awards</p>
</div>
<div class="stat-card">
    <h3>99%</h3>
    <p>Client Satisfaction</p>
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
                    <h2>Creative Design That Makes an Impact</h2>
                    <p class="lead">At Shiva Tech Digital, we believe great design is where art meets strategy. Every visual we create is crafted to not just look beautiful, but to communicate effectively and drive results.</p>
                    <p>With 5,000+ designs delivered and a team of 25+ award-winning designers, we bring creativity, precision, and strategic thinking to every project. From startups needing their first logo to enterprises requiring complete visual overhauls, we deliver excellence.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Award-Winning Designers</h5>
                                <p>Team featured on Dribbble, Behance & design publications</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Pixel-Perfect Delivery</h5>
                                <p>Meticulous attention to every detail</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Unlimited Revisions</h5>
                                <p>We iterate until you're 100% satisfied</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Quick Turnaround</h5>
                                <p>Most designs delivered within 48-72 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8FR_G4mTbcC5u4FQ5fWym5aYSc5KbbS19Nw&s" alt="Creative Graphic Design Process" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">5,000+</span>
                        <span class="text">Designs Delivered</span>
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
            <span class="section-badge">What We Offer</span>
            <h2>Our Graphic Design Services</h2>
            <p class="section-subtitle">Creative solutions for every visual communication need</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <h4>Logo & Brand Identity</h4>
                    <p>Memorable logos and complete brand identity systems that capture your essence.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Custom Logo Design</li>
                        <li><i class="fas fa-check"></i> Logo Variations & Formats</li>
                        <li><i class="fas fa-check"></i> Brand Color Palette</li>
                        <li><i class="fas fa-check"></i> Typography Selection</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h4>Marketing & Advertising</h4>
                    <p>Eye-catching marketing materials that drive engagement and conversions.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Brochures & Catalogs</li>
                        <li><i class="fas fa-check"></i> Flyers & Posters</li>
                        <li><i class="fas fa-check"></i> Digital Banners & Ads</li>
                        <li><i class="fas fa-check"></i> Email Templates</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-hashtag"></i>
                    </div>
                    <h4>Social Media Graphics</h4>
                    <p>Scroll-stopping social media content that builds engagement and followers.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Post Graphics</li>
                        <li><i class="fas fa-check"></i> Story Templates</li>
                        <li><i class="fas fa-check"></i> Cover Images</li>
                        <li><i class="fas fa-check"></i> Carousel Designs</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h4>Packaging Design</h4>
                    <p>Product packaging that stands out on shelves and creates memorable unboxing.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Product Packaging</li>
                        <li><i class="fas fa-check"></i> Label Design</li>
                        <li><i class="fas fa-check"></i> Box & Bag Design</li>
                        <li><i class="fas fa-check"></i> 3D Mockups</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-print"></i>
                    </div>
                    <h4>Print Design</h4>
                    <p>Professional print materials from business cards to large format displays.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Business Cards</li>
                        <li><i class="fas fa-check"></i> Stationery Design</li>
                        <li><i class="fas fa-check"></i> Signage & Banners</li>
                        <li><i class="fas fa-check"></i> Vehicle Wraps</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>Illustration & Icons</h4>
                    <p>Custom illustrations and icon sets that add personality to your brand.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Custom Illustrations</li>
                        <li><i class="fas fa-check"></i> Icon Design</li>
                        <li><i class="fas fa-check"></i> Infographic Design</li>
                        <li><i class="fas fa-check"></i> Character Design</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Design Categories Gallery -->
<section class="design-gallery py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">What We Design</span>
            <h2>Types of Designs We Create</h2>
            <p class="section-subtitle">Comprehensive design solutions across all mediums</p>
        </div>
        <div class="row g-4">
            <!-- Logo Design -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h5>Logo Design</h5>
                    <p>Wordmarks, symbols, emblems</p>
                </div>
            </div>
            <!-- Business Cards -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h5>Business Cards</h5>
                    <p>Standard, folded, die-cut</p>
                </div>
            </div>
            <!-- Brochures -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h5>Brochures</h5>
                    <p>Bi-fold, tri-fold, booklets</p>
                </div>
            </div>
            <!-- Flyers & Posters -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-file-image"></i>
                    </div>
                    <h5>Flyers & Posters</h5>
                    <p>Events, promotions, ads</p>
                </div>
            </div>
            <!-- Social Media -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h5>Social Graphics</h5>
                    <p>Posts, stories, covers</p>
                </div>
            </div>
            <!-- Packaging -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h5>Packaging</h5>
                    <p>Boxes, labels, bags</p>
                </div>
            </div>
            <!-- Presentations -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-presentation"></i>
                    </div>
                    <h5>Presentations</h5>
                    <p>PowerPoint, pitch decks</p>
                </div>
            </div>
            <!-- Infographics -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h5>Infographics</h5>
                    <p>Data visualization</p>
                </div>
            </div>
            <!-- Banner Ads -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-ad"></i>
                    </div>
                    <h5>Digital Ads</h5>
                    <p>Banner, display, retargeting</p>
                </div>
            </div>
            <!-- Email Design -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="550">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <h5>Email Design</h5>
                    <p>Newsletters, campaigns</p>
                </div>
            </div>
            <!-- Signage -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-store-alt"></i>
                    </div>
                    <h5>Signage</h5>
                    <p>Indoor, outdoor, wayfinding</p>
                </div>
            </div>
            <!-- Merchandise -->
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="650">
                <div class="design-category-card">
                    <div class="category-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h5>Merchandise</h5>
                    <p>T-shirts, mugs, swag</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Design Styles Section -->
<section class="design-styles py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Expertise</span>
            <h2>Design Styles We Master</h2>
            <p class="section-subtitle">Whatever your aesthetic, we can bring it to life</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="style-card">
                    <div class="style-preview minimalist"></div>
                    <h5>Minimalist</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                <div class="style-card">
                    <div class="style-preview modern"></div>
                    <h5>Modern</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
                <div class="style-card">
                    <div class="style-preview vintage"></div>
                    <h5>Vintage</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="250">
                <div class="style-card">
                    <div class="style-preview playful"></div>
                    <h5>Playful</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
                <div class="style-card">
                    <div class="style-preview corporate"></div>
                    <h5>Corporate</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="350">
                <div class="style-card">
                    <div class="style-preview luxury"></div>
                    <h5>Luxury</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="service-benefits py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="benefits-header">
                    <span class="section-badge">Benefits</span>
                    <h2>Why Professional Graphic Design Matters</h2>
                    <p>First impressions are visual – make them count</p>
                </div>
                <div class="design-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">94%</span>
                        <span class="stat-text">of first impressions are design-related</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">75%</span>
                        <span class="stat-text">judge credibility based on design</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">80%</span>
                        <span class="stat-text">brand recognition from consistent design</span>
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
                            <h5>Capture Attention</h5>
                            <p>Stand out in a crowded marketplace with eye-catching visuals</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Build Trust</h5>
                            <p>Professional design signals credibility and quality</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-comment"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Communicate Effectively</h5>
                            <p>Visuals convey messages faster than words</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Improve Recall</h5>
                            <p>People remember 80% of what they see vs 20% of what they read</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Increase Conversions</h5>
                            <p>Well-designed materials drive more action</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Differentiate Your Brand</h5>
                            <p>Unique design sets you apart from competitors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Design Process -->
<section class="design-process-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">How We Work</span>
            <h2>Our Design Process</h2>
            <p class="section-subtitle">A collaborative approach that delivers exceptional results</p>
        </div>
        <div class="design-process-timeline" data-aos="fade-up">
            <div class="process-row">
                <div class="process-card">
                    <div class="process-number">01</div>
                    <div class="process-icon"><i class="fas fa-comments"></i></div>
                    <h4>Brief & Discovery</h4>
                    <p>We understand your goals, audience, preferences, and requirements through a detailed creative brief.</p>
                </div>
                <div class="process-card">
                    <div class="process-number">02</div>
                    <div class="process-icon"><i class="fas fa-search"></i></div>
                    <h4>Research & Inspiration</h4>
                    <p>We research your industry, competitors, and trends to inform creative direction.</p>
                </div>
                <div class="process-card">
                    <div class="process-number">03</div>
                    <div class="process-icon"><i class="fas fa-pencil-alt"></i></div>
                    <h4>Concept Development</h4>
                    <p>Multiple creative concepts are developed based on strategy and inspiration.</p>
                </div>
            </div>
            <div class="process-row">
                <div class="process-card">
                    <div class="process-number">04</div>
                    <div class="process-icon"><i class="fas fa-palette"></i></div>
                    <h4>Design & Create</h4>
                    <p>Selected concepts are refined into polished designs with attention to every detail.</p>
                </div>
                <div class="process-card">
                    <div class="process-number">05</div>
                    <div class="process-icon"><i class="fas fa-sync-alt"></i></div>
                    <h4>Review & Revise</h4>
                    <p>You provide feedback and we iterate until you're completely satisfied.</p>
                </div>
                <div class="process-card">
                    <div class="process-number">06</div>
                    <div class="process-icon"><i class="fas fa-file-download"></i></div>
                    <h4>Deliver Files</h4>
                    <p>Final files delivered in all required formats – print-ready and web-optimized.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- File Formats Section -->
<section class="file-formats py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Deliverables</span>
            <h2>File Formats You'll Receive</h2>
            <p class="section-subtitle">Everything you need for print and digital use</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="formats-grid" data-aos="fade-up">
                    <div class="format-item">
                        <div class="format-icon ai">AI</div>
                        <span>Adobe Illustrator</span>
                        <small>Editable vector</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon psd">PSD</div>
                        <span>Photoshop</span>
                        <small>Layered file</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon pdf">PDF</div>
                        <span>PDF</span>
                        <small>Print-ready</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon png">PNG</div>
                        <span>PNG</span>
                        <small>Transparent bg</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon jpg">JPG</div>
                        <span>JPEG</span>
                        <small>Web optimized</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon svg">SVG</div>
                        <span>SVG</span>
                        <small>Scalable vector</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon eps">EPS</div>
                        <span>EPS</span>
                        <small>Universal vector</small>
                    </div>
                    <div class="format-item">
                        <div class="format-icon figma">FIG</div>
                        <span>Figma</span>
                        <small>On request</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="industries-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>Industries We Design For</h2>
            <p class="section-subtitle">Creative expertise across diverse sectors</p>
        </div>
        <div class="industries-grid" data-aos="fade-up">
            <div class="industry-item">
                <i class="fas fa-shopping-bag"></i>
                <span>Retail & E-commerce</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-utensils"></i>
                <span>Food & Restaurant</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-heartbeat"></i>
                <span>Healthcare</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-university"></i>
                <span>Finance</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-laptop"></i>
                <span>Technology</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-home"></i>
                <span>Real Estate</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-spa"></i>
                <span>Beauty & Wellness</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-plane"></i>
                <span>Travel</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-dumbbell"></i>
                <span>Fitness</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-music"></i>
                <span>Entertainment</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-handshake"></i>
                <span>Professional Services</span>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section class="tools-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Tools</span>
            <h2>Design Software We Use</h2>
            <p class="section-subtitle">Industry-standard tools for professional output</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="tool-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuUhkgJfWRryyB5CjW-447p_Y7HkeJFNE33g&s" alt="Adobe Illustrator">
                    <h5>Illustrator</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                <div class="tool-card">
                    <img src="https://images.sftcdn.net/images/t_app-icon-m/p/bbdedd58-96bf-11e6-ab2f-00163ed833e7/2782924292/adobe-photoshop-icon.png" alt="Adobe Photoshop">
                    <h5>Photoshop</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
                <div class="tool-card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Adobe_InDesign_CC_icon.svg/960px-Adobe_InDesign_CC_icon.svg.png" alt="Adobe InDesign">
                    <h5>InDesign</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="250">
                <div class="tool-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS62LVhts8-ERiNmlrfHQShVXasUYH38KKSRw&s" alt="Figma">
                    <h5>Figma</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
                <div class="tool-card">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Adobe_After_Effects_CC_icon.svg/2101px-Adobe_After_Effects_CC_icon.svg.png" alt="After Effects">
                    <h5>After Effects</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="350">
                <div class="tool-card">
                    <img src="https://images-eds-ssl.xboxlive.com/image?url=4rt9.lXDC4H_93laV1_eHHFT949fUipzkiFOBH3fAiZZUCdYojwUyX2aTonS1aIwMrx6NUIsHfUHSLzjGJFxxo4K81Ei7WzcnqEk8W.MgwZKGOGyylNO5Zmpypx72dKW30JQijPB.R5zwcpxtBwH3OJlEQGtDjjqpeLMKnjHhi8-&format=source" alt="Canva">
                    <h5>Canva</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Turnaround Section -->
<section class="turnaround-section py-5 bg-gradient-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="turnaround-content">
                    <span class="section-badge light">Fast Delivery</span>
                    <h2 class="text-white">Need It Fast? We've Got You</h2>
                    <p class="text-white-70">We understand deadlines are critical. Our streamlined process ensures quick turnaround without compromising quality.</p>
                    
                    <div class="turnaround-times">
                        <div class="time-item">
                            <div class="time-value">24 hrs</div>
                            <div class="time-label">Social Media Graphics</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">48 hrs</div>
                            <div class="time-label">Flyers & Posters</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">3-5 days</div>
                            <div class="time-label">Logo Design</div>
                        </div>
                        <div class="time-item">
                            <div class="time-value">5-7 days</div>
                            <div class="time-label">Brochures & Catalogs</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="rush-service-card">
                    <div class="rush-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Rush Service Available</h3>
                    <p>Need it even faster? Our rush service guarantees expedited delivery for urgent projects. Contact us for rush pricing.</p>
                    <a href="{{ route('contact') }}" class="btn-rush">Request Rush Service</a>
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
            <i class="fas fa-award"></i>
        </div>
        <h4>Award-Winning Team</h4>
        <p>Designers featured on Dribbble, Behance & international publications</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-infinity"></i>
        </div>
        <h4>Unlimited Revisions</h4>
        <p>We iterate until you're 100% satisfied with the final design</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-clock"></i>
        </div>
        <h4>Fast Turnaround</h4>
        <p>Most designs delivered within 48-72 hours</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-file-alt"></i>
        </div>
        <h4>All File Formats</h4>
        <p>Receive print-ready and web-optimized files in all formats</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-clipboard-list"></i></div>
            <h4>Brief</h4>
            <p>Share your requirements</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-lightbulb"></i></div>
            <h4>Concepts</h4>
            <p>We create initial concepts</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Feedback</h4>
            <p>You review & comment</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-edit"></i></div>
            <h4>Revisions</h4>
            <p>We refine the design</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-check-circle"></i></div>
            <h4>Approval</h4>
            <p>Final sign-off</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-download"></i></div>
            <h4>Delivery</h4>
            <p>Files sent in all formats</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Graphic Design Pricing</h2>
            <p class="section-subtitle">Transparent pricing for every design need</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Essential</h4>
                        <p>Perfect for small projects</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">15,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 5 Design Requests/Month</li>
                            <li><i class="fas fa-check"></i> Social Media Graphics</li>
                            <li><i class="fas fa-check"></i> Flyers & Posters</li>
                            <li><i class="fas fa-check"></i> Simple Illustrations</li>
                            <li><i class="fas fa-check"></i> 48-72hr Turnaround</li>
                            <li><i class="fas fa-check"></i> Unlimited Revisions</li>
                            <li><i class="fas fa-check"></i> All File Formats</li>
                            <li><i class="fas fa-times text-muted"></i> Logo Design</li>
                            <li><i class="fas fa-times text-muted"></i> Packaging Design</li>
                            <li><i class="fas fa-times text-muted"></i> Branding</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Professional</h4>
                        <p>For growing businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">35,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 12 Design Requests/Month</li>
                            <li><i class="fas fa-check"></i> All Essential Features</li>
                            <li><i class="fas fa-check"></i> Logo Design (1/Quarter)</li>
                            <li><i class="fas fa-check"></i> Brochures & Catalogs</li>
                            <li><i class="fas fa-check"></i> Presentation Design</li>
                            <li><i class="fas fa-check"></i> Email Templates</li>
                            <li><i class="fas fa-check"></i> 24-48hr Turnaround</li>
                            <li><i class="fas fa-check"></i> Dedicated Designer</li>
                            <li><i class="fas fa-check"></i> Priority Support</li>
                            <li><i class="fas fa-check"></i> Source Files</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>Unlimited design power</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">75,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Unlimited Requests</li>
                            <li><i class="fas fa-check"></i> All Professional Features</li>
                            <li><i class="fas fa-check"></i> Brand Identity Design</li>
                            <li><i class="fas fa-check"></i> Packaging Design</li>
                            <li><i class="fas fa-check"></i> Motion Graphics</li>
                            <li><i class="fas fa-check"></i> Print Production Support</li>
                            <li><i class="fas fa-check"></i> Same Day Turnaround*</li>
                            <li><i class="fas fa-check"></i> Dedicated Team</li>
                            <li><i class="fas fa-check"></i> Weekly Strategy Calls</li>
                            <li><i class="fas fa-check"></i> Brand Guidelines</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Same day for simple requests. Prices exclude GST. Custom packages available.</p>
        </div>
        
        <!-- Individual Design Pricing -->
        <div class="individual-pricing mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>One-Time Project Pricing</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Logo Design</span>
                        <span class="addon-price">₹15,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Business Card</span>
                        <span class="addon-price">₹3,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Brochure</span>
                        <span class="addon-price">₹8,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Social Post</span>
                        <span class="addon-price">₹500</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Packaging</span>
                        <span class="addon-price">₹15,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Infographic</span>
                        <span class="addon-price">₹5,000+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>Design Projects</h2>
            <p class="section-subtitle">A glimpse of our creative work</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card design">
                    <div class="portfolio-image">
                        <img src="https://www.datocms-assets.com/22695/1751313991-1661436264-branding-portfolio_11dohee1_p4.jpg" alt="Brand Identity Design" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Brand Identity</span>
                        <h4>Organic Food Brand</h4>
                        <p>Complete brand identity including logo, packaging & marketing materials</p>
                        <div class="portfolio-tags">
                            <span>Logo</span>
                            <span>Packaging</span>
                            <span>Stationery</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card design">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuGS1aebhVaMpxMQ9lfZUNer3gHn6Z7AzkbA&s" alt="Packaging Design" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Packaging</span>
                        <h4>Premium Skincare Line</h4>
                        <p>Luxury packaging design for a premium skincare brand</p>
                        <div class="portfolio-tags">
                            <span>Packaging</span>
                            <span>Labels</span>
                            <span>Boxes</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card design">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsPvJzomD2qiQkkU69MbCezyPBowJwP2BM1g&s" alt="Marketing Collateral" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Marketing</span>
                        <h4>Tech Conference Materials</h4>
                        <p>Complete event branding including banners, badges & presentations</p>
                        <div class="portfolio-tags">
                            <span>Banners</span>
                            <span>Badges</span>
                            <span>Signage</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-view-all">
                View All Projects <i class="fas fa-arrow-right"></i>
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
            <p class="section-subtitle">Hear from businesses we've designed for</p>
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
                    <p class="testimonial-text">"The packaging design they created for our product line is absolutely stunning. It's helped us stand out on retail shelves and customers constantly compliment our branding. Worth every rupee!"</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Neha Kapoor</h5>
                            <span>Founder, Skincare Brand</span>
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
                    <p class="testimonial-text">"We use their monthly design service for all our social media and marketing materials. The quality is consistently excellent and the turnaround is incredibly fast. Our marketing team loves working with them."</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Vikram Singh</h5>
                            <span>Marketing Head, E-commerce</span>
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
                    <p class="testimonial-text">"They nailed our logo on the second concept! The whole process was smooth and professional. We now have a brand identity that truly represents who we are. Highly recommend for any design needs."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Ravi Patel</h5>
                            <span>CEO, Tech Startup</span>
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
        page-slug="services/graphic-design"
        section-title="Frequently Asked Questions About Graphic Design Services"
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