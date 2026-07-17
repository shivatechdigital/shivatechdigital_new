@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/seo-services')

@section('breadcrumb-title', 'SEO Services')
@section('service-category', 'Marketing Services')
@section('hero-title', 'SEO Services That Drive Results')
@section('hero-description', 'Dominate Google search results and outrank your competition. Our data-driven SEO strategies combine technical excellence, compelling content, and authoritative link building to deliver sustainable organic growth.')
@section('service-name', 'SEO Services')
@section('service-name-lower', 'SEO')

@section('trust-badge-1', '500+ Keywords on Page 1')
@section('trust-badge-2', '300% Avg Traffic Growth')
@section('trust-badge-3', 'Google Certified Partner')

@section('hero-image')
<img src="{{ asset('web_assets/img/services/seo-services-hero.svg') }}" alt="SEO Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>5,000+</h3>
    <p>Keywords on Page 1</p>
</div>
<div class="stat-card">
    <h3>300%</h3>
    <p>Avg Traffic Growth</p>
</div>
<div class="stat-card">
    <h3>200+</h3>
    <p>Clients Ranked</p>
</div>
@endsection

@section('service-content')
<!-- Free SEO Audit Banner -->
<section class="seo-audit-banner py-4 bg-gradient-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="audit-content">
                    <h3 class="text-white mb-2"><i class="fas fa-search"></i> Get Your Free SEO Audit Report</h3>
                    <p class="text-white-70 mb-0">Discover why you're not ranking and get actionable recommendations to improve your search visibility.</p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                <a href="{{ route('contact') }}" class="btn-audit">
                    Get Free Audit <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="service-overview py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="overview-content">
                    <span class="section-badge">About Our Service</span>
                    <h2>SEO That Moves the Needle</h2>
                    <p class="lead">At Shiva Tech Digital, we don't chase vanity metrics. We focus on what matters – rankings that drive traffic, and traffic that converts into revenue.</p>
                    <p>With 200+ clients ranked on page 1 and a team of certified SEO specialists, we've developed a proven methodology that works across industries. From technical foundations to content excellence, we leave no stone unturned.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>White-Hat Only</h5>
                                <p>Ethical SEO practices that stand the test of time</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Data-Driven Approach</h5>
                                <p>Every strategy backed by research and analytics</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Transparent Reporting</h5>
                                <p>Real-time dashboards and detailed monthly reports</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>ROI Focused</h5>
                                <p>We measure success in leads and revenue, not just rankings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="{{ asset('web_assets/img/services/seo-services-overview.jpg') }}" alt="SEO Strategy" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">200+</span>
                        <span class="text">Clients Ranked</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Services Offered -->
<section class="services-offered py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">What We Offer</span>
            <h2>Our SEO Services</h2>
            <p class="section-subtitle">Comprehensive SEO solutions for sustainable growth</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Technical SEO</h4>
                    <p>Build a solid foundation with technical optimizations that make your site crawlable, indexable, and fast.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Site Speed Optimization</li>
                        <li><i class="fas fa-check"></i> Core Web Vitals</li>
                        <li><i class="fas fa-check"></i> Mobile Optimization</li>
                        <li><i class="fas fa-check"></i> Crawlability & Indexing</li>
                        <li><i class="fas fa-check"></i> Schema Markup</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4>On-Page SEO</h4>
                    <p>Optimize every page to rank for target keywords and provide the best user experience.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Keyword Research & Strategy</li>
                        <li><i class="fas fa-check"></i> Title & Meta Optimization</li>
                        <li><i class="fas fa-check"></i> Content Optimization</li>
                        <li><i class="fas fa-check"></i> Internal Linking</li>
                        <li><i class="fas fa-check"></i> Image Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-link"></i>
                    </div>
                    <h4>Off-Page SEO & Link Building</h4>
                    <p>Build authority with high-quality backlinks from relevant, authoritative websites.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Quality Link Building</li>
                        <li><i class="fas fa-check"></i> Guest Posting</li>
                        <li><i class="fas fa-check"></i> Digital PR</li>
                        <li><i class="fas fa-check"></i> Brand Mentions</li>
                        <li><i class="fas fa-check"></i> Competitor Backlink Analysis</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Local SEO</h4>
                    <p>Dominate local search results and attract customers in your geographic area.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Google Business Profile</li>
                        <li><i class="fas fa-check"></i> Local Citations</li>
                        <li><i class="fas fa-check"></i> Review Management</li>
                        <li><i class="fas fa-check"></i> Local Content Strategy</li>
                        <li><i class="fas fa-check"></i> Map Pack Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>E-commerce SEO</h4>
                    <p>Drive organic sales with optimized product pages and category structures.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Product Page Optimization</li>
                        <li><i class="fas fa-check"></i> Category SEO</li>
                        <li><i class="fas fa-check"></i> Product Schema</li>
                        <li><i class="fas fa-check"></i> Faceted Navigation</li>
                        <li><i class="fas fa-check"></i> Shopping Feed Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <h4>Content SEO</h4>
                    <p>Create and optimize content that ranks, engages, and converts visitors.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Content Strategy</li>
                        <li><i class="fas fa-check"></i> Blog Content Creation</li>
                        <li><i class="fas fa-check"></i> Content Optimization</li>
                        <li><i class="fas fa-check"></i> Topic Clusters</li>
                        <li><i class="fas fa-check"></i> Content Refreshing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Process -->
<section class="seo-process py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Methodology</span>
            <h2>The SEO Process That Works</h2>
            <p class="section-subtitle">A systematic approach to sustainable rankings</p>
        </div>
        <div class="seo-process-timeline" data-aos="fade-up">
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="phase-number">01</div>
                <div class="phase-content">
                    <h4>Discovery & Audit</h4>
                    <p>Comprehensive analysis of your current SEO health, competitors, and opportunities.</p>
                    <ul>
                        <li>Technical SEO Audit</li>
                        <li>Competitor Analysis</li>
                        <li>Keyword Research</li>
                        <li>Content Gap Analysis</li>
                    </ul>
                </div>
            </div>
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-chess"></i>
                </div>
                <div class="phase-number">02</div>
                <div class="phase-content">
                    <h4>Strategy Development</h4>
                    <p>Custom SEO roadmap aligned with your business goals and competitive landscape.</p>
                    <ul>
                        <li>Keyword Targeting</li>
                        <li>Content Planning</li>
                        <li>Link Building Strategy</li>
                        <li>Timeline & Milestones</li>
                    </ul>
                </div>
            </div>
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-wrench"></i>
                </div>
                <div class="phase-number">03</div>
                <div class="phase-content">
                    <h4>Technical Optimization</h4>
                    <p>Fix technical issues and build a solid foundation for rankings.</p>
                    <ul>
                        <li>Site Speed Fixes</li>
                        <li>Mobile Optimization</li>
                        <li>Schema Implementation</li>
                        <li>Crawl Error Resolution</li>
                    </ul>
                </div>
            </div>
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-pen"></i>
                </div>
                <div class="phase-number">04</div>
                <div class="phase-content">
                    <h4>On-Page Optimization</h4>
                    <p>Optimize content and structure for target keywords and user intent.</p>
                    <ul>
                        <li>Content Optimization</li>
                        <li>Meta Tags</li>
                        <li>Internal Linking</li>
                        <li>UX Improvements</li>
                    </ul>
                </div>
            </div>
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-link"></i>
                </div>
                <div class="phase-number">05</div>
                <div class="phase-content">
                    <h4>Authority Building</h4>
                    <p>Build domain authority with high-quality backlinks and brand mentions.</p>
                    <ul>
                        <li>Link Acquisition</li>
                        <li>Guest Posting</li>
                        <li>Digital PR</li>
                        <li>Brand Signals</li>
                    </ul>
                </div>
            </div>
            <div class="process-phase">
                <div class="phase-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="phase-number">06</div>
                <div class="phase-content">
                    <h4>Monitor & Optimize</h4>
                    <p>Continuous tracking, analysis, and optimization for sustained growth.</p>
                    <ul>
                        <li>Ranking Tracking</li>
                        <li>Traffic Analysis</li>
                        <li>Conversion Tracking</li>
                        <li>Strategy Refinement</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Makes Us Different -->
<section class="seo-difference py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Why Us</span>
            <h2>What Makes Our SEO Different</h2>
            <p class="section-subtitle">Not all SEO agencies are created equal</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="comparison-card bad">
                    <div class="comparison-header">
                        <i class="fas fa-times-circle"></i>
                        <h4>Other SEO Agencies</h4>
                    </div>
                    <ul class="comparison-list">
                        <li><i class="fas fa-times"></i> Promise instant results</li>
                        <li><i class="fas fa-times"></i> Use black-hat techniques</li>
                        <li><i class="fas fa-times"></i> Focus on vanity metrics</li>
                        <li><i class="fas fa-times"></i> One-size-fits-all approach</li>
                        <li><i class="fas fa-times"></i> Lack transparency in reporting</li>
                        <li><i class="fas fa-times"></i> Buy low-quality links</li>
                        <li><i class="fas fa-times"></i> No dedicated account manager</li>
                        <li><i class="fas fa-times"></i> Lock you in long contracts</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="comparison-card good">
                    <div class="comparison-header">
                        <i class="fas fa-check-circle"></i>
                        <h4>Shiva Tech Digital</h4>
                    </div>
                    <ul class="comparison-list">
                        <li><i class="fas fa-check"></i> Set realistic expectations upfront</li>
                        <li><i class="fas fa-check"></i> 100% white-hat techniques only</li>
                        <li><i class="fas fa-check"></i> Focus on traffic & revenue</li>
                        <li><i class="fas fa-check"></i> Custom strategy for each client</li>
                        <li><i class="fas fa-check"></i> Complete transparency with live dashboards</li>
                        <li><i class="fas fa-check"></i> Build genuine, high-quality links</li>
                        <li><i class="fas fa-check"></i> Dedicated SEO specialist assigned</li>
                        <li><i class="fas fa-check"></i> Flexible month-to-month plans</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Results & Stats -->
<section class="seo-results py-5 bg-gradient-primary">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge light">Results</span>
            <h2 class="text-white">SEO Results That Speak</h2>
            <p class="section-subtitle text-white-50">Real numbers from real campaigns</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>5,000+</h3>
                    <p>Keywords on Page 1</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>300%</h3>
                    <p>Average Traffic Increase</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>200+</h3>
                    <p>Clients Ranked</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3>₹100Cr+</h3>
                    <p>Revenue Generated</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Tools We Use -->
<section class="seo-tools py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Arsenal</span>
            <h2>SEO Tools We Use</h2>
            <p class="section-subtitle">Industry-leading tools for maximum results</p>
        </div>
        <div class="tools-grid" data-aos="fade-up">
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/semrush.svg') }}" alt="SEMrush">
                <span>SEMrush</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/ahrefs.svg') }}" alt="Ahrefs">
                <span>Ahrefs</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/moz.svg') }}" alt="Moz">
                <span>Moz</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/google-search-console.svg') }}" alt="Google Search Console">
                <span>Search Console</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/google-analytics.svg') }}" alt="Google Analytics">
                <span>Analytics</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/screaming-frog.svg') }}" alt="Screaming Frog">
                <span>Screaming Frog</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/surfer-seo.svg') }}" alt="Surfer SEO">
                <span>Surfer SEO</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/majestic.svg') }}" alt="Majestic">
                <span>Majestic</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/google-pagespeed.svg') }}" alt="PageSpeed Insights">
                <span>PageSpeed</span>
            </div>
            <div class="tool-item">
                <img src="{{ asset('web_assets/img/tools/brightlocal.svg') }}" alt="BrightLocal">
                <span>BrightLocal</span>
            </div>
        </div>
    </div>
</section>

<!-- Industries We Serve -->
<section class="seo-industries py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>SEO Expertise Across Industries</h2>
            <p class="section-subtitle">We've ranked businesses in every major sector</p>
        </div>
        <div class="industries-grid" data-aos="fade-up">
            <div class="industry-item">
                <i class="fas fa-shopping-cart"></i>
                <span>E-commerce</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-home"></i>
                <span>Real Estate</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-heartbeat"></i>
                <span>Healthcare</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-gavel"></i>
                <span>Legal</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-university"></i>
                <span>Finance</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-laptop"></i>
                <span>SaaS & Tech</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-plane"></i>
                <span>Travel</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-utensils"></i>
                <span>Restaurant</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-car"></i>
                <span>Automotive</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-spa"></i>
                <span>Beauty & Wellness</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-building"></i>
                <span>B2B Services</span>
            </div>
        </div>
    </div>
</section>

<!-- Ranking Guarantee -->
<section class="ranking-guarantee py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="guarantee-image">
                    <img src="{{ asset('web_assets/img/services/seo-guarantee.svg') }}" alt="SEO Ranking Guarantee" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="guarantee-content">
                    <span class="section-badge">Our Promise</span>
                    <h2>Our Ranking Guarantee</h2>
                    <p class="lead">We're so confident in our SEO process that we offer a performance-based guarantee.</p>
                    
                    <div class="guarantee-points">
                        <div class="guarantee-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Minimum 20% Traffic Increase in 90 Days</h5>
                                <p>Or we continue working at no additional cost</p>
                            </div>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>First Page Rankings for Target Keywords</h5>
                                <p>Based on agreed keyword difficulty levels</p>
                            </div>
                        </div>
                        <div class="guarantee-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>No Long-Term Lock-in Contracts</h5>
                                <p>Month-to-month flexibility – results keep you with us</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('contact') }}" class="btn-guarantee">
                        Claim Your Guarantee <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Reporting -->
<section class="seo-reporting py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="reporting-content">
                    <span class="section-badge">Transparency</span>
                    <h2>Real-Time SEO Reporting</h2>
                    <p class="lead">Know exactly how your SEO is performing with our comprehensive reporting.</p>
                    
                    <div class="reporting-features">
                        <div class="feature-item">
                            <i class="fas fa-desktop"></i>
                            <div>
                                <h5>Live Dashboard Access</h5>
                                <p>24/7 access to rankings, traffic, and progress</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-chart-bar"></i>
                            <div>
                                <h5>Weekly Progress Updates</h5>
                                <p>Email updates on key activities and wins</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <h5>Monthly Detailed Reports</h5>
                                <p>In-depth analysis with actionable insights</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <h5>Monthly Strategy Calls</h5>
                                <p>Review performance and plan next steps</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="dashboard-preview">
                    <img src="{{ asset('web_assets/img/services/seo-dashboard.png') }}" alt="SEO Reporting Dashboard" class="img-fluid rounded-lg shadow-lg">
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
                    <h2>Why Invest in SEO?</h2>
                    <p>SEO delivers the highest ROI of any marketing channel</p>
                </div>
                <div class="seo-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">53%</span>
                        <span class="stat-text">of all website traffic comes from organic search</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">14.6%</span>
                        <span class="stat-text">SEO close rate vs 1.7% for outbound leads</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">70%</span>
                        <span class="stat-text">of marketers see SEO more effective than PPC</span>
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
                            <h5>Sustainable Traffic</h5>
                            <p>Unlike paid ads, SEO traffic doesn't stop when budget runs out</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Lower Cost Per Lead</h5>
                            <p>SEO leads cost 61% less than outbound leads</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Higher Quality Leads</h5>
                            <p>Users actively searching for your solutions</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Build Trust & Credibility</h5>
                            <p>Top rankings signal authority to users</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Competitive Advantage</h5>
                            <p>Outrank competitors and capture their traffic</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>24/7 Visibility</h5>
                            <p>Your website works for you around the clock</p>
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
            <i class="fas fa-user-shield"></i>
        </div>
        <h4>White-Hat Only</h4>
        <p>100% ethical SEO practices – no risky shortcuts</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-chart-pie"></i>
        </div>
        <h4>Data-Driven</h4>
        <p>Every decision backed by research and analytics</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-eye"></i>
        </div>
        <h4>Full Transparency</h4>
        <p>Live dashboards and detailed reporting</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-handshake"></i>
        </div>
        <h4>No Lock-in</h4>
        <p>Flexible month-to-month agreements</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-search"></i></div>
            <h4>Audit</h4>
            <p>Analyze current SEO health</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-key"></i></div>
            <h4>Research</h4>
            <p>Keyword & competitor analysis</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-cogs"></i></div>
            <h4>Technical</h4>
            <p>Fix technical issues</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-file-alt"></i></div>
            <h4>On-Page</h4>
            <p>Content optimization</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-link"></i></div>
            <h4>Off-Page</h4>
            <p>Link building & PR</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-chart-line"></i></div>
            <h4>Monitor</h4>
            <p>Track & optimize</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>SEO Packages</h2>
            <p class="section-subtitle">Flexible plans for every business size</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter SEO</h4>
                        <p>For small businesses & startups</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">20,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 10 Keywords</li>
                            <li><i class="fas fa-check"></i> Technical SEO Audit</li>
                            <li><i class="fas fa-check"></i> On-Page Optimization</li>
                            <li><i class="fas fa-check"></i> Google Business Profile</li>
                            <li><i class="fas fa-check"></i> 2 Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> 5 Backlinks/Month</li>
                            <li><i class="fas fa-check"></i> Monthly Reporting</li>
                            <li><i class="fas fa-times text-muted"></i> Competitor Analysis</li>
                            <li><i class="fas fa-times text-muted"></i> Content Strategy</li>
                            <li><i class="fas fa-times text-muted"></i> Priority Support</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Growth SEO</h4>
                        <p>For growing businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">45,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 25 Keywords</li>
                            <li><i class="fas fa-check"></i> Full Technical SEO</li>
                            <li><i class="fas fa-check"></i> Advanced On-Page</li>
                            <li><i class="fas fa-check"></i> Local SEO</li>
                            <li><i class="fas fa-check"></i> 4 Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> 15 Backlinks/Month</li>
                            <li><i class="fas fa-check"></i> Competitor Analysis</li>
                            <li><i class="fas fa-check"></i> Content Strategy</li>
                            <li><i class="fas fa-check"></i> Weekly Reports</li>
                            <li><i class="fas fa-check"></i> Dedicated Manager</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise SEO</h4>
                        <p>For large businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,00,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Unlimited Keywords</li>
                            <li><i class="fas fa-check"></i> Enterprise Technical SEO</li>
                            <li><i class="fas fa-check"></i> Full Content Strategy</li>
                            <li><i class="fas fa-check"></i> National & Local SEO</li>
                            <li><i class="fas fa-check"></i> 8+ Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> 30+ Backlinks/Month</li>
                            <li><i class="fas fa-check"></i> Digital PR</li>
                            <li><i class="fas fa-check"></i> Conversion Optimization</li>
                            <li><i class="fas fa-check"></i> Real-time Dashboard</li>
                            <li><i class="fas fa-check"></i> Dedicated Team</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices exclude GST. Minimum 3-month engagement recommended for best results. Custom packages available.</p>
        </div>
        
        <!-- SEO Add-ons -->
        <div class="seo-addons mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>SEO Add-on Services</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">SEO Audit</span>
                        <span class="addon-price">₹15,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Link Building</span>
                        <span class="addon-price">₹2,000/link</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Content Writing</span>
                        <span class="addon-price">₹3/word</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Local SEO Setup</span>
                        <span class="addon-price">₹10,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Speed Optimization</span>
                        <span class="addon-price">₹8,000</span>
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
            <h2>SEO Success Stories</h2>
            <p class="section-subtitle">Real results from real clients</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card seo">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/seo-project-1.jpg') }}" alt="E-commerce SEO Case Study" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion Store SEO</h4>
                        <p>Organic traffic growth for D2C fashion brand</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-chart-line"></i> 450% Traffic</span>
                            <span><i class="fas fa-trophy"></i> 150+ Page 1 Keywords</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card seo">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/seo-project-2.jpg') }}" alt="SaaS SEO Case Study" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">SaaS</span>
                        <h4>B2B SaaS Growth</h4>
                        <p>From 0 to 50K monthly organic visitors</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-users"></i> 50K/Month Traffic</span>
                            <span><i class="fas fa-user-plus"></i> 5x Demo Requests</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card seo">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/seo-project-3.jpg') }}" alt="Local SEO Case Study" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Local Business</span>
                        <h4>Healthcare Local SEO</h4>
                        <p>Multi-location clinic ranking domination</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-map-marker-alt"></i> #1 Map Pack</span>
                            <span><i class="fas fa-phone"></i> 300% More Calls</span>
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
            <h2>What Our SEO Clients Say</h2>
            <p class="section-subtitle">Success stories from businesses we've ranked</p>
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
                    <p class="testimonial-text">"We went from page 5 to position 1 for our main keyword in 4 months. The organic traffic has completely transformed our business – we're now getting 500+ leads per month from SEO alone."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-28.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Rahul Sharma</h5>
                            <span>CEO, Real Estate Company</span>
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
                    <p class="testimonial-text">"Unlike other agencies that just sent reports, Shiva Tech Digital actually delivered results. Our e-commerce organic revenue grew 300% in 8 months. Their SEO strategy is data-driven and effective."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-29.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Priya Kapoor</h5>
                            <span>Founder, Fashion Brand</span>
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
                    <p class="testimonial-text">"The local SEO work they did for our clinic chain is incredible. We now rank #1 for 'clinic near me' in 5 cities. The increase in appointment bookings has been phenomenal."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-30.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Dr. Amit Patel</h5>
                            <span>Director, Healthcare Network</span>
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
        page-slug="services/seo-services"
        section-title="Frequently Asked Questions About SEO Services"
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