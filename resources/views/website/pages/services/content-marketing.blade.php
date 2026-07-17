@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/content-marketing')

@section('breadcrumb-title', 'Content Marketing')
@section('service-category', 'Marketing Services')
@section('hero-title', 'Content Marketing Services')
@section('hero-description', 'Create content that captivates, educates, and converts. From strategic planning to creation and distribution, we build content engines that drive organic traffic, generate leads, and establish your brand as an industry authority.')
@section('service-name', 'Content Marketing')
@section('service-name-lower', 'content marketing')

@section('trust-badge-1', '10,000+ Articles Written')
@section('trust-badge-2', '300% Avg Traffic Growth')
@section('trust-badge-3', 'Top Industry Writers')

@section('hero-image')
<img src="https://growwithdigitalexperts.com/wp-content/uploads/2025/03/content-marketing-1.jpg" alt="Content Marketing Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>10,000+</h3>
    <p>Articles Published</p>
</div>
<div class="stat-card">
    <h3>300%</h3>
    <p>Avg Traffic Growth</p>
</div>
<div class="stat-card">
    <h3>50+</h3>
    <p>Expert Writers</p>
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
                    <h2>Content That Works as Hard as You Do</h2>
                    <p class="lead">At Shiva Tech Digital, we believe content isn't just king – it's the entire kingdom. Strategic content marketing builds lasting relationships with your audience and drives sustainable business growth.</p>
                    <p>With over 10,000 pieces of content published across 20+ industries and a team of 50+ specialist writers, we create content that ranks, engages, and converts. From blog posts to videos, whitepapers to social content, we're your complete content partner.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>SEO-Optimized Content</h5>
                                <p>Every piece crafted to rank and drive organic traffic</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Industry Expert Writers</h5>
                                <p>Subject matter experts in your specific niche</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Data-Driven Strategy</h5>
                                <p>Content plans based on research and analytics</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Multi-Format Content</h5>
                                <p>Blogs, videos, infographics, podcasts & more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://media.geeksforgeeks.org/wp-content/uploads/20230801113133/Steps-of-Content-Marketing-copy.webp" alt="Content Marketing Strategy" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">10,000+</span>
                        <span class="text">Content Pieces</span>
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
            <h2>Our Content Marketing Services</h2>
            <p class="section-subtitle">Full-spectrum content solutions for every stage of your funnel</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chess-queen"></i>
                    </div>
                    <h4>Content Strategy</h4>
                    <p>Data-driven content strategies aligned with your business goals and audience needs.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Content Audit & Gap Analysis</li>
                        <li><i class="fas fa-check"></i> Audience Research</li>
                        <li><i class="fas fa-check"></i> Editorial Calendar</li>
                        <li><i class="fas fa-check"></i> Content Pillars & Clusters</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <h4>Blog Writing & Articles</h4>
                    <p>SEO-optimized blog content that ranks, educates, and drives organic traffic.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> SEO Blog Posts</li>
                        <li><i class="fas fa-check"></i> Long-Form Content</li>
                        <li><i class="fas fa-check"></i> Listicles & How-To Guides</li>
                        <li><i class="fas fa-check"></i> Industry News & Trends</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-video"></i>
                    </div>
                    <h4>Video Content</h4>
                    <p>Engaging video content for social media, YouTube, and your website.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Explainer Videos</li>
                        <li><i class="fas fa-check"></i> Social Media Videos</li>
                        <li><i class="fas fa-check"></i> Product Videos</li>
                        <li><i class="fas fa-check"></i> Video Testimonials</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4>Infographics & Visuals</h4>
                    <p>Data visualization and visual content that simplifies complex information.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Data Infographics</li>
                        <li><i class="fas fa-check"></i> Process Diagrams</li>
                        <li><i class="fas fa-check"></i> Social Graphics</li>
                        <li><i class="fas fa-check"></i> Presentation Decks</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4>Lead Magnets & Gated Content</h4>
                    <p>High-value content assets that capture leads and nurture prospects.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Ebooks & Guides</li>
                        <li><i class="fas fa-check"></i> Whitepapers</li>
                        <li><i class="fas fa-check"></i> Case Studies</li>
                        <li><i class="fas fa-check"></i> Research Reports</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h4>Content Distribution</h4>
                    <p>Strategic content promotion to maximize reach and engagement.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Social Media Distribution</li>
                        <li><i class="fas fa-check"></i> Email Newsletter</li>
                        <li><i class="fas fa-check"></i> Content Syndication</li>
                        <li><i class="fas fa-check"></i> Influencer Outreach</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Types Section -->
<section class="content-types py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Content Types</span>
            <h2>Content We Create</h2>
            <p class="section-subtitle">Diverse content formats for every channel and purpose</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-blog"></i>
                    </div>
                    <h5>Blog Posts</h5>
                    <p>SEO-optimized articles</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h5>Ebooks & Guides</h5>
                    <p>In-depth resources</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <h5>Whitepapers</h5>
                    <p>Research & insights</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5>Case Studies</h5>
                    <p>Success stories</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h5>Videos</h5>
                    <p>Engaging visual content</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h5>Infographics</h5>
                    <p>Visual data stories</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-podcast"></i>
                    </div>
                    <h5>Podcasts</h5>
                    <p>Audio content</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h5>Newsletters</h5>
                    <p>Email content</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-hashtag"></i>
                    </div>
                    <h5>Social Posts</h5>
                    <p>Platform-specific</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="550">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h5>Website Copy</h5>
                    <p>Conversion-focused</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-ad"></i>
                    </div>
                    <h5>Ad Copy</h5>
                    <p>Compelling CTAs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="650">
                <div class="content-type-card">
                    <div class="content-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h5>Press Releases</h5>
                    <p>Media coverage</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Marketing Funnel -->
<section class="content-funnel py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Strategy</span>
            <h2>Content for Every Stage of the Funnel</h2>
            <p class="section-subtitle">Strategic content that guides prospects from awareness to conversion</p>
        </div>
        <div class="funnel-wrapper" data-aos="fade-up">
            <div class="funnel-stage awareness">
                <div class="stage-header">
                    <h4><i class="fas fa-eye"></i> Awareness (TOFU)</h4>
                    <p>Attract new audiences</p>
                </div>
                <div class="stage-content">
                    <ul>
                        <li>Blog Posts</li>
                        <li>Social Media Content</li>
                        <li>Infographics</li>
                        <li>Videos</li>
                        <li>Podcasts</li>
                    </ul>
                </div>
            </div>
            <div class="funnel-connector">
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="funnel-stage consideration">
                <div class="stage-header">
                    <h4><i class="fas fa-search"></i> Consideration (MOFU)</h4>
                    <p>Educate and nurture</p>
                </div>
                <div class="stage-content">
                    <ul>
                        <li>Ebooks & Guides</li>
                        <li>Webinars</li>
                        <li>Comparison Guides</li>
                        <li>Email Nurture Series</li>
                        <li>Expert Interviews</li>
                    </ul>
                </div>
            </div>
            <div class="funnel-connector">
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="funnel-stage decision">
                <div class="stage-header">
                    <h4><i class="fas fa-shopping-cart"></i> Decision (BOFU)</h4>
                    <p>Convert to customers</p>
                </div>
                <div class="stage-content">
                    <ul>
                        <li>Case Studies</li>
                        <li>Testimonials</li>
                        <li>Product Demos</li>
                        <li>ROI Calculators</li>
                        <li>Free Trials/Consultations</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Writing Process -->
<section class="writing-process py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Process</span>
            <h2>How We Create Content</h2>
            <p class="section-subtitle">A systematic approach to producing high-quality content</p>
        </div>
        <div class="process-timeline" data-aos="fade-up">
            <div class="process-item">
                <div class="process-number">01</div>
                <div class="process-icon"><i class="fas fa-search"></i></div>
                <div class="process-content">
                    <h4>Research</h4>
                    <p>Keyword research, competitor analysis, and audience intent mapping</p>
                </div>
            </div>
            <div class="process-item">
                <div class="process-number">02</div>
                <div class="process-icon"><i class="fas fa-sitemap"></i></div>
                <div class="process-content">
                    <h4>Outline</h4>
                    <p>Structured content briefs with headlines, subheads, and key points</p>
                </div>
            </div>
            <div class="process-item">
                <div class="process-number">03</div>
                <div class="process-icon"><i class="fas fa-pen"></i></div>
                <div class="process-content">
                    <h4>Write</h4>
                    <p>Expert writers create engaging, accurate, and optimized content</p>
                </div>
            </div>
            <div class="process-item">
                <div class="process-number">04</div>
                <div class="process-icon"><i class="fas fa-edit"></i></div>
                <div class="process-content">
                    <h4>Edit</h4>
                    <p>Professional editing for grammar, style, accuracy, and SEO</p>
                </div>
            </div>
            <div class="process-item">
                <div class="process-number">05</div>
                <div class="process-icon"><i class="fas fa-image"></i></div>
                <div class="process-content">
                    <h4>Design</h4>
                    <p>Add visuals, formatting, and optimize for readability</p>
                </div>
            </div>
            <div class="process-item">
                <div class="process-number">06</div>
                <div class="process-icon"><i class="fas fa-rocket"></i></div>
                <div class="process-content">
                    <h4>Publish & Promote</h4>
                    <p>Strategic distribution across channels for maximum reach</p>
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
                    <h2>Why Invest in Content Marketing?</h2>
                    <p>Content marketing is the gift that keeps on giving</p>
                </div>
                <div class="content-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">3x</span>
                        <span class="stat-text">More leads than paid advertising</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">62%</span>
                        <span class="stat-text">Less cost than traditional marketing</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">6x</span>
                        <span class="stat-text">Higher conversion for content adopters</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Organic Traffic Growth</h5>
                            <p>SEO-optimized content drives sustainable organic traffic</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Brand Authority</h5>
                            <p>Position your brand as an industry thought leader</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Lead Generation</h5>
                            <p>Attract and capture qualified leads with valuable content</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Customer Loyalty</h5>
                            <p>Build lasting relationships through helpful content</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Cost Effective</h5>
                            <p>Evergreen content delivers long-term ROI</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Social Amplification</h5>
                            <p>Great content gets shared and expands reach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="industries-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>Content Expertise Across Industries</h2>
            <p class="section-subtitle">Specialist writers for your specific niche</p>
        </div>
        <div class="industries-grid" data-aos="fade-up">
            <div class="industry-item">
                <i class="fas fa-laptop-code"></i>
                <span>Technology & SaaS</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-heartbeat"></i>
                <span>Healthcare</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-university"></i>
                <span>Finance & FinTech</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-shopping-cart"></i>
                <span>E-commerce</span>
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
                <i class="fas fa-briefcase"></i>
                <span>B2B Services</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-gavel"></i>
                <span>Legal</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-plane"></i>
                <span>Travel</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-spa"></i>
                <span>Wellness</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-car"></i>
                <span>Automotive</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-building"></i>
                <span>Manufacturing</span>
            </div>
        </div>
    </div>
</section>

<!-- Content Samples -->
<section class="content-samples py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Quality</span>
            <h2>Our Content Standards</h2>
            <p class="section-subtitle">What sets our content apart</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>SEO Optimized</h4>
                    <p>Keyword research, proper structure, meta optimization, and internal linking built into every piece.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h4>Expert Written</h4>
                    <p>Content crafted by writers with deep expertise in your industry – not generic freelancers.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-spell-check"></i>
                    </div>
                    <h4>Thoroughly Edited</h4>
                    <p>Multi-layer editing for grammar, accuracy, style consistency, and brand voice alignment.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <h4>100% Original</h4>
                    <p>Plagiarism-free content verified with Copyscape. We never use AI-generated text without disclosure.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4>Audience-Focused</h4>
                    <p>Content designed to resonate with your target audience's pain points and interests.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="quality-card">
                    <div class="quality-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4>Data Backed</h4>
                    <p>Content supported by research, statistics, and credible sources for authority.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Results Showcase -->
<section class="results-showcase py-5 bg-gradient-primary">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge light">Results</span>
            <h2 class="text-white">Content Marketing Results</h2>
            <p class="section-subtitle text-white-50">Real outcomes from our content strategies</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h3>10,000+</h3>
                    <p>Articles Published</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>300%</h3>
                    <p>Avg Traffic Growth</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>5,000+</h3>
                    <p>Keywords Ranking</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3>50,000+</h3>
                    <p>Leads Generated</p>
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
            <i class="fas fa-user-edit"></i>
        </div>
        <h4>Expert Writers</h4>
        <p>50+ specialist writers across industries, not generic freelancers</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-search"></i>
        </div>
        <h4>SEO-First Approach</h4>
        <p>Every piece optimized for search from keyword research to structure</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h4>Consistent Delivery</h4>
        <p>On-time delivery with editorial calendar management</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-sync"></i>
        </div>
        <h4>Unlimited Revisions</h4>
        <p>We refine until you're 100% satisfied with every piece</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Discovery</h4>
            <p>Understand your goals & audience</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-chess"></i></div>
            <h4>Strategy</h4>
            <p>Develop content roadmap</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-pen-fancy"></i></div>
            <h4>Create</h4>
            <p>Write & design content</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-check-double"></i></div>
            <h4>Review</h4>
            <p>Edit & optimize</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Publish</h4>
            <p>Launch & distribute</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-chart-line"></i></div>
            <h4>Analyze</h4>
            <p>Measure & optimize</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Content Marketing Packages</h2>
            <p class="section-subtitle">Flexible plans for every content need</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter</h4>
                        <p>For businesses starting with content</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">25,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Content Strategy</li>
                            <li><i class="fas fa-check"></i> 4 Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> 1000-1500 Words Each</li>
                            <li><i class="fas fa-check"></i> SEO Optimization</li>
                            <li><i class="fas fa-check"></i> 8 Social Posts</li>
                            <li><i class="fas fa-check"></i> Featured Images</li>
                            <li><i class="fas fa-check"></i> Monthly Report</li>
                            <li><i class="fas fa-times text-muted"></i> Video Content</li>
                            <li><i class="fas fa-times text-muted"></i> Infographics</li>
                            <li><i class="fas fa-times text-muted"></i> Lead Magnets</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Growth</h4>
                        <p>For serious content marketing</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">60,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Comprehensive Strategy</li>
                            <li><i class="fas fa-check"></i> 8 Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> 1500-2500 Words Each</li>
                            <li><i class="fas fa-check"></i> 2 Videos/Month</li>
                            <li><i class="fas fa-check"></i> 2 Infographics/Month</li>
                            <li><i class="fas fa-check"></i> 20 Social Posts</li>
                            <li><i class="fas fa-check"></i> 1 Lead Magnet/Quarter</li>
                            <li><i class="fas fa-check"></i> Content Distribution</li>
                            <li><i class="fas fa-check"></i> Weekly Reporting</li>
                            <li><i class="fas fa-check"></i> Dedicated Manager</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>Full content engine</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,50,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Advanced Content Strategy</li>
                            <li><i class="fas fa-check"></i> Unlimited Blog Posts</li>
                            <li><i class="fas fa-check"></i> Long-Form Content</li>
                            <li><i class="fas fa-check"></i> Video Production</li>
                            <li><i class="fas fa-check"></i> Infographics & Visuals</li>
                            <li><i class="fas fa-check"></i> Ebooks & Whitepapers</li>
                            <li><i class="fas fa-check"></i> Case Studies</li>
                            <li><i class="fas fa-check"></i> Full Distribution</li>
                            <li><i class="fas fa-check"></i> Dedicated Team</li>
                            <li><i class="fas fa-check"></i> Real-time Dashboard</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices exclude GST. Custom content packages available based on your specific needs.</p>
        </div>
        
        <!-- Individual Content Pricing -->
        <div class="individual-pricing mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>À La Carte Content Pricing</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Blog Post (1000w)</span>
                        <span class="addon-price">₹3,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Long-Form (2500w)</span>
                        <span class="addon-price">₹6,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Infographic</span>
                        <span class="addon-price">₹5,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Explainer Video</span>
                        <span class="addon-price">₹15,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Ebook</span>
                        <span class="addon-price">₹25,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Case Study</span>
                        <span class="addon-price">₹10,000</span>
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
            <span class="section-badge">Case Studies</span>
            <h2>Content Marketing Success Stories</h2>
            <p class="section-subtitle">See how content drives real business results</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card content">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJyQss3a9O9dvWdS_nEb09d9fOmex9g6pI5A&s" alt="SaaS Content Marketing" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">SaaS</span>
                        <h4>B2B SaaS Content Strategy</h4>
                        <p>Comprehensive content strategy for HR tech startup</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-chart-line"></i> 400% Traffic Growth</span>
                            <span><i class="fas fa-user-plus"></i> 5x Lead Increase</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card content">
                    <div class="portfolio-image">
                        <img src="https://www.cloudways.com/blog/wp-content/uploads/Ecomeerce-1.jpg" alt="E-commerce Content Marketing" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion Brand Content Engine</h4>
                        <p>Blog + video content strategy for D2C fashion brand</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-search"></i> 200+ Keywords #1</span>
                            <span><i class="fas fa-rupee-sign"></i> 300% Revenue Lift</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card content">
                    <div class="portfolio-image">
                        <img src="https://kanopi.com/wp-content/uploads/2023/12/healthcare-content-marketing_stats-1-1024x794.png" alt="Healthcare Content Marketing" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Healthcare</span>
                        <h4>Medical Content Authority</h4>
                        <p>Patient education content for healthcare network</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-users"></i> 1M+ Monthly Readers</span>
                            <span><i class="fas fa-phone"></i> 500% More Appointments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn-view-all">
                View All Case Studies <i class="fas fa-arrow-right"></i>
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
            <p class="section-subtitle">Hear from brands powered by our content</p>
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
                    <p class="testimonial-text">"Their content team understands our technical SaaS product better than most. The blog posts they create rank quickly and actually generate demo requests. Game changer for our marketing."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Arjun Mehta</h5>
                            <span>CMO, SaaS Startup</span>
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
                    <p class="testimonial-text">"We went from zero organic traffic to 50,000 monthly visitors in 8 months. Their content strategy and execution is top-notch. The ebooks they created are our best lead magnets."</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Priya Sharma</h5>
                            <span>Founder, EdTech Platform</span>
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
                    <p class="testimonial-text">"Quality and consistency. That's what sets them apart. Every piece of content is well-researched, beautifully written, and delivered on time. Our thought leadership has never been stronger."</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Vikram Singh</h5>
                            <span>Director, Consulting Firm</span>
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
        page-slug="services/content-marketing"
        section-title="Frequently Asked Questions About Content Marketing"
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