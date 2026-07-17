@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/social-media-marketing')

@section('breadcrumb-title', 'Social Media Marketing')
@section('service-category', 'Marketing Services')
@section('hero-title', 'Social Media Marketing Services')
@section('hero-description', 'Turn your social media channels into powerful growth engines. We create thumb-stopping content, manage communities, and run high-converting ad campaigns to help you connect with your audience and drive real business results.')
@section('service-name', 'Social Media Marketing')
@section('service-name-lower', 'social media marketing')

@section('trust-badge-1', '1M+ Followers Managed')
@section('trust-badge-2', 'High Engagement Rates')
@section('trust-badge-3', 'Meta Business Partner')

@section('hero-image')
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkulTHvMntWsK_cr5EfNSIk0jY4IHAfBTFBw&s" alt="Social Media Marketing Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>1M+</h3>
    <p>Followers Gained</p>
</div>
<div class="stat-card">
    <h3>50k+</h3>
    <p>Leads Generated</p>
</div>
<div class="stat-card">
    <h3>300+</h3>
    <p>Brands Managed</p>
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
                    <h2>Spark Conversations, Build Communities, Drive Sales</h2>
                    <p class="lead">Social media is no longer just about posting pictures; it's about building a digital ecosystem where your brand lives, breathes, and interacts with its customers.</p>
                    <p>At Shiva Tech Digital, we move beyond vanity metrics. We focus on building genuine connections and driving tangible ROI. Whether it's crafting viral Reels, managing LinkedIn thought leadership, or running precision-targeted Facebook Ads, our team of social strategists and creatives ensures your brand stands out in the feed.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Platform-Specific Strategy</h5>
                                <p>Custom strategies for Instagram, LinkedIn, Twitter & more</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Creative Storytelling</h5>
                                <p>Visuals and copy that resonate with your target audience</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Data-Backed Decisions</h5>
                                <p>Analytics-driven approach to optimize performance</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Community Growth</h5>
                                <p>Active engagement to turn followers into loyal fans</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://cdn.educba.com/academy/wp-content/uploads/2016/01/Social-Media-Strategy-Plan.jpg" alt="Social Media Strategy" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">300+</span>
                        <span class="text">Brands Managed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Platforms Section -->
<section class="platforms-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Platforms</span>
            <h2>Platforms We Master</h2>
            <p class="section-subtitle">We help you dominate the networks that matter most to your business</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="platform-card instagram">
                    <div class="icon-wrapper">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h5>Instagram</h5>
                    <p>Visual Storytelling & Reels</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="platform-card facebook">
                    <div class="icon-wrapper">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <h5>Facebook</h5>
                    <p>Community & Ads</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="platform-card linkedin">
                    <div class="icon-wrapper">
                        <i class="fab fa-linkedin-in"></i>
                    </div>
                    <h5>LinkedIn</h5>
                    <p>B2B Networking</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="platform-card twitter">
                    <div class="icon-wrapper">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <h5>Twitter / X</h5>
                    <p>Real-time Engagement</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="platform-card youtube">
                    <div class="icon-wrapper">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <h5>YouTube</h5>
                    <p>Long-form Video</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="platform-card pinterest">
                    <div class="icon-wrapper">
                        <i class="fab fa-pinterest-p"></i>
                    </div>
                    <h5>Pinterest</h5>
                    <p>Visual Discovery</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="services-offered py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Services</span>
            <h2>Comprehensive SMM Solutions</h2>
            <p class="section-subtitle">End-to-end management for your social presence</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chess-knight"></i>
                    </div>
                    <h4>Social Media Strategy</h4>
                    <p>Tailored roadmaps that align social media goals with your overall business objectives.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Competitor Analysis</li>
                        <li><i class="fas fa-check"></i> Audience Persona Mapping</li>
                        <li><i class="fas fa-check"></i> Content Pillars</li>
                        <li><i class="fas fa-check"></i> Platform Selection</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h4>Content Creation</h4>
                    <p>High-quality visuals, videos, and copy that capture attention and encourage sharing.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Graphic Design</li>
                        <li><i class="fas fa-check"></i> Reels & Short Videos</li>
                        <li><i class="fas fa-check"></i> Copywriting</li>
                        <li><i class="fas fa-check"></i> Photography</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Community Management</h4>
                    <p>Active engagement with your audience to build trust and foster brand loyalty.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Comment Monitoring</li>
                        <li><i class="fas fa-check"></i> DM Management</li>
                        <li><i class="fas fa-check"></i> Crisis Management</li>
                        <li><i class="fas fa-check"></i> Engagement Growth</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-ad"></i>
                    </div>
                    <h4>Paid Advertising</h4>
                    <p>Targeted ad campaigns on Facebook, Instagram, and LinkedIn to drive leads and sales.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Ad Creative & Copy</li>
                        <li><i class="fas fa-check"></i> Audience Targeting</li>
                        <li><i class="fas fa-check"></i> A/B Testing</li>
                        <li><i class="fas fa-check"></i> Retargeting Campaigns</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Influencer Marketing</h4>
                    <p>Collaborate with niche influencers to expand your reach and build credibility.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Influencer Discovery</li>
                        <li><i class="fas fa-check"></i> Campaign Management</li>
                        <li><i class="fas fa-check"></i> Contract Negotiation</li>
                        <li><i class="fas fa-check"></i> Performance Tracking</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Analytics & Reporting</h4>
                    <p>Detailed insights into what's working, what's not, and how we're improving.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Monthly Reports</li>
                        <li><i class="fas fa-check"></i> Reach & Engagement Metrics</li>
                        <li><i class="fas fa-check"></i> Conversion Tracking</li>
                        <li><i class="fas fa-check"></i> ROI Analysis</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Types Showcase -->
<section class="content-types py-5 bg-gradient-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="content-showcase-text">
                    <span class="section-badge">Content Variety</span>
                    <h2>We Create Content That Stops the Scroll</h2>
                    <p>In a crowded feed, you need diverse and engaging content formats. We specialize in creating:</p>
                    <ul class="content-list">
                        <li>
                            <div class="icon"><i class="fas fa-video"></i></div>
                            <div>
                                <h5>Reels & TikToks</h5>
                                <p>Short-form video that drives viral reach.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fas fa-images"></i></div>
                            <div>
                                <h5>Carousels</h5>
                                <p>Educational swipable content for high engagement.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fas fa-poll"></i></div>
                            <div>
                                <h5>Interactive Stories</h5>
                                <p>Polls, quizzes, and Q&As to connect directly.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><i class="fas fa-quote-right"></i></div>
                            <div>
                                <h5>User-Generated Content</h5>
                                <p>Leveraging customer stories for authenticity.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="showcase-grid">
                    <img src="Social Media Post Example" class="grid-img img-1" alt="Social Media Post Example">
                    <img src="https://www.wordstream.com/wp-content/uploads/2021/07/how-to-use-instagram-reels-for-business-three-reel-examples-1-1.png" class="grid-img img-2" alt="Instagram Reel Example">
                    <img src="https://media.licdn.com/dms/image/v2/D5612AQGTBApPZP562A/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1729509510421?e=2147483647&v=beta&t=g_M2asxxnW7vH1bzTIRqNLBwSvd_uotG-PuMPHUwmL4" class="grid-img img-3" alt="LinkedIn Carousel Example">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section class="tools-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Stack</span>
            <h2>Tools We Use</h2>
            <p class="section-subtitle">Premium tools for scheduling, listening, and analytics</p>
        </div>
        <div class="tools-grid justify-content-center">
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="100">
                <img src="https://cdn.aptoide.com/imgs/6/3/2/6325244fa59be7ebb13a15f081e01dc0_fgraphic.png" alt="Buffer">
            </div>
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="150">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq48QtRVkF19rXfslBSuZCILU3p_6fd3xHrg&s" alt="Hootsuite">
            </div>
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="200">
                <img src="https://dka575ofm4ao0.cloudfront.net/pages-transactional_logos/retina/12162/WORDMARK_LOGO_-_GRADIENT_-_RGB.png" alt="Canva">
            </div>
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="250">
                <img src="https://cdn.aptoide.com/imgs/6/1/b/61baeb03864bab84fd6f250cbd3a26df_fgraphic.png" alt="Meta Business Suite">
            </div>
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="300">
                <img src="https://media.sproutsocial.com/uploads/2023/08/Sprout-Logo.png" alt="Sprout Social">
            </div>
            <div class="tool-item" data-aos="zoom-in" data-aos-delay="350">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Logo_Google_Analytics.svg/1200px-Logo_Google_Analytics.svg.png" alt="Google Analytics">
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
                    <h2>Why Partner With Us?</h2>
                    <p>We take the stress out of social media so you can focus on your business.</p>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Increased Brand Awareness</h5>
                            <p>Get seen by thousands of potential customers daily</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Higher Engagement</h5>
                            <p>Create a two-way dialogue with your audience</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-funnel-dollar"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>More Website Traffic</h5>
                            <p>Drive targeted traffic from social to your site</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Improved Brand Loyalty</h5>
                            <p>Consistent presence builds trust and retention</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Customer Insights</h5>
                            <p>Learn what your audience likes and wants</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Save Time</h5>
                            <p>We handle everything from creation to posting</p>
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
            <i class="fas fa-palette"></i>
        </div>
        <h4>Creative Excellence</h4>
        <p>In-house design and video team creating unique content</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-bullseye"></i>
        </div>
        <h4>Targeted Strategy</h4>
        <p>We don't guess; we target the right people at the right time</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <h4>ROI Focused</h4>
        <p>Campaigns designed to generate leads and sales, not just likes</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-calendar-check"></i>
        </div>
        <h4>Consistency</h4>
        <p>Regular posting schedule to keep your brand top-of-mind</p>
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
            <p>Analyze current presence</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-chess"></i></div>
            <h4>Strategy</h4>
            <p>Define goals & audience</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-pencil-ruler"></i></div>
            <h4>Creation</h4>
            <p>Design content calendar</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Publishing</h4>
            <p>Schedule & post</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Engage</h4>
            <p>Community management</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-chart-bar"></i></div>
            <h4>Report</h4>
            <p>Analyze & optimize</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Social Media Packages</h2>
            <p class="section-subtitle">Flexible plans for businesses of all sizes</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter</h4>
                        <p>For establishing presence</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">15,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 2 Platforms (FB/Insta)</li>
                            <li><i class="fas fa-check"></i> 12 Posts per Month</li>
                            <li><i class="fas fa-check"></i> Content Creation</li>
                            <li><i class="fas fa-check"></i> Basic Community Mgmt</li>
                            <li><i class="fas fa-check"></i> Monthly Report</li>
                            <li><i class="fas fa-times text-muted"></i> Reels/Video Production</li>
                            <li><i class="fas fa-times text-muted"></i> Paid Ad Management</li>
                            <li><i class="fas fa-times text-muted"></i> Strategy Calls</li>
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
                        <p>For aggressive growth</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">35,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 3 Platforms</li>
                            <li><i class="fas fa-check"></i> 20 Posts per Month</li>
                            <li><i class="fas fa-check"></i> 4 Reels/Short Videos</li>
                            <li><i class="fas fa-check"></i> Story Management</li>
                            <li><i class="fas fa-check"></i> Active Community Mgmt</li>
                            <li><i class="fas fa-check"></i> Ad Management (₹50k budget)</li>
                            <li><i class="fas fa-check"></i> Monthly Strategy Call</li>
                            <li><i class="fas fa-check"></i> Competitor Tracking</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>Full brand dominance</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">75,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 4+ Platforms (incl LinkedIn)</li>
                            <li><i class="fas fa-check"></i> Daily Posting</li>
                            <li><i class="fas fa-check"></i> 8 Reels/Videos</li>
                            <li><i class="fas fa-check"></i> Influencer Outreach</li>
                            <li><i class="fas fa-check"></i> Priority Community Mgmt</li>
                            <li><i class="fas fa-check"></i> Advanced Ad Management</li>
                            <li><i class="fas fa-check"></i> Bi-weekly Reports</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices exclude GST. Ad spend is billed directly to platforms. Custom packages available.</p>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>Success Stories</h2>
            <p class="section-subtitle">Real results for real brands</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card social">
                    <div class="portfolio-image">
                        <img src="https://bestcolorfulsocks.com/cdn/shop/articles/Instagram_fashion_statistics_76866d72-2e24-4f49-9f90-de6b627963f4_1100x.jpg?v=1745368794" alt="Fashion Brand Instagram Growth" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Fashion E-commerce</span>
                        <h4>Instagram Growth Campaign</h4>
                        <p>Grew followers by 200% and sales by 150% through Reels and Influencer collabs.</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-user-plus"></i> +25k Followers</span>
                            <span><i class="fas fa-shopping-bag"></i> 3.5x ROAS</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card social">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSchlGXaQiFgl_hjTUjfRH92siam9PavKzJbg&s" alt="B2B LinkedIn Strategy" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">B2B SaaS</span>
                        <h4>LinkedIn Lead Gen</h4>
                        <p>Thought leadership strategy and LinkedIn Ads for a software company.</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-briefcase"></i> +500 Leads</span>
                            <span><i class="fas fa-chart-line"></i> 40% Engagement</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card social">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzRN_-DWwvG88w8GsRHDX3ddHWu8mkcDVbKg&s" alt="Restaurant Facebook Marketing" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Hospitality</span>
                        <h4>Restaurant Chain Viral Campaign</h4>
                        <p>User-generated content campaign and local Facebook ads.</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-utensils"></i> +30% Footfall</span>
                            <span><i class="fas fa-share-alt"></i> 10k Shares</span>
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
            <h2>Client Feedback</h2>
            <p class="section-subtitle">What brands say about our social media services</p>
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
                    <p class="testimonial-text">"Our Instagram was stagnant for years. Shiva Tech Digital completely revamped our visual identity and content strategy. The engagement we see now is incredible!"</p>
                    <div class="testimonial-author">
                        <img src="https://www.staffuniforms.co.uk/cdn/shop/files/Novara_Jacket_-_Charcoal_-_Large_0ae00d4d-8e7c-4f58-8bcf-bd0e37e8b290.jpg?crop=region&crop_height=1050&crop_left=28&crop_top=0&crop_width=703&v=1737291943&width=760" alt="Client">
                        <div class="author-info">
                            <h5>Riya Malhotra</h5>
                            <span>Founder, The Organic Store</span>
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
                    <p class="testimonial-text">"We rely on them for our B2B LinkedIn strategy. They understand how to speak to a professional audience while keeping it engaging. High quality leads are up."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Amit Verma</h5>
                            <span>VP Sales, TechFlow Solutions</span>
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
                    <p class="testimonial-text">"Their ad management is top-notch. They optimized our Facebook ad spend and lowered our cost per acquisition by 40%. Highly recommended team."</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Sneha Reddy</h5>
                            <span>Marketing Head, Eduspark</span>
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
        page-slug="services/social-media-marketing"
        section-title="Frequently Asked Questions About Social Media Marketing Services"
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