@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/digital-marketing')

@section('breadcrumb-title', 'Digital Marketing')
@section('service-category', 'Marketing Services')
@section('hero-title', 'Digital Marketing Services')
@section('hero-description', 'Drive growth with data-driven digital marketing strategies. From SEO and paid advertising to social media and content marketing, we help you reach the right audience, generate qualified leads, and maximize your ROI.')
@section('service-name', 'Digital Marketing')
@section('service-name-lower', 'digital marketing')

@section('trust-badge-1', '300+ Clients Served')
@section('trust-badge-2', '500% Avg ROI')
@section('trust-badge-3', 'Google Premier Partner')

@section('hero-image')
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0V1gJY5ZH-KEmG-ZqcYPwGYcDzh2lQX6DgQ&s" alt="Digital Marketing Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>300+</h3>
    <p>Clients Served</p>
</div>
<div class="stat-card">
    <h3>500%</h3>
    <p>Avg ROI Delivered</p>
</div>
<div class="stat-card">
    <h3>₹50Cr+</h3>
    <p>Ad Spend Managed</p>
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
                    <h2>Marketing That Delivers Measurable Results</h2>
                    <p class="lead">At Shiva Tech Digital, we don't believe in vanity metrics. We focus on what matters – leads, sales, and revenue growth for your business.</p>
                    <p>With over 300 successful campaigns and ₹50 crore+ in managed ad spend, our team of certified marketers, SEO specialists, and creative strategists work together to create campaigns that not only reach your audience but convert them into loyal customers.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Data-Driven Approach</h5>
                                <p>Every decision backed by analytics and insights</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>ROI Focused</h5>
                                <p>Average 500% return on marketing investment</p>
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
                                <h5>Certified Experts</h5>
                                <p>Google, Meta, and HubSpot certified team</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://www.cardinaldigitalmarketing.com/wp-content/uploads/2020/06/what-is-digital-marketing-1800x1200.jpg" alt="Digital Marketing Strategy" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">₹50Cr+</span>
                        <span class="text">Ad Spend Managed</span>
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
            <h2>Our Digital Marketing Services</h2>
            <p class="section-subtitle">Full-funnel marketing solutions to grow your business</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Search Engine Optimization (SEO)</h4>
                    <p>Rank higher on Google and drive organic traffic with our proven SEO strategies.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Technical SEO Audit</li>
                        <li><i class="fas fa-check"></i> On-Page Optimization</li>
                        <li><i class="fas fa-check"></i> Link Building</li>
                        <li><i class="fas fa-check"></i> Local SEO</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-google"></i>
                    </div>
                    <h4>Google Ads (PPC)</h4>
                    <p>Get instant visibility and leads with expertly managed Google Ads campaigns.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Search Ads</li>
                        <li><i class="fas fa-check"></i> Display Ads</li>
                        <li><i class="fas fa-check"></i> Shopping Ads</li>
                        <li><i class="fas fa-check"></i> YouTube Ads</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <h4>Social Media Marketing</h4>
                    <p>Build brand awareness and engage your audience on social media platforms.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Facebook & Instagram Ads</li>
                        <li><i class="fas fa-check"></i> LinkedIn Marketing</li>
                        <li><i class="fas fa-check"></i> Content Creation</li>
                        <li><i class="fas fa-check"></i> Community Management</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <h4>Content Marketing</h4>
                    <p>Attract and engage your audience with valuable, relevant content that drives action.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Blog Writing</li>
                        <li><i class="fas fa-check"></i> Video Content</li>
                        <li><i class="fas fa-check"></i> Infographics</li>
                        <li><i class="fas fa-check"></i> Case Studies</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email Marketing</h4>
                    <p>Nurture leads and drive conversions with targeted email campaigns.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Email Automation</li>
                        <li><i class="fas fa-check"></i> Newsletter Campaigns</li>
                        <li><i class="fas fa-check"></i> Drip Sequences</li>
                        <li><i class="fas fa-check"></i> List Segmentation</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Conversion Rate Optimization</h4>
                    <p>Convert more visitors into customers with data-driven CRO strategies.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> A/B Testing</li>
                        <li><i class="fas fa-check"></i> Landing Page Optimization</li>
                        <li><i class="fas fa-check"></i> User Behavior Analysis</li>
                        <li><i class="fas fa-check"></i> Conversion Funnels</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Marketing Channels -->
<section class="marketing-channels py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Channels</span>
            <h2>Platforms We Excel In</h2>
            <p class="section-subtitle">Certified experts across all major marketing platforms</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="channel-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_lbv-SHRFl9Mv9fY7MH__cym6fSdvF3gWog&s" alt="Google Ads">
                    <h5>Google Ads</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                <div class="channel-card">
                    <img src="https://blog.embertribe.com/hubfs/publicidad-digital-con-facebook-ads.png" alt="Facebook Ads">
                    <h5>Facebook</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
                <div class="channel-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdQ8-olywtCsZbrvXe3zgyPDHtKe0FSuJKyA&s" alt="Instagram">
                    <h5>Instagram</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="250">
                <div class="channel-card">
                    <img src="https://44173479.fs1.hubspotusercontent-na1.net/hubfs/44173479/2460154_Blogfeaturedimage-LinkedInads_093024.png" alt="LinkedIn">
                    <h5>LinkedIn</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
                <div class="channel-card">
                    <img src="https://44173479.fs1.hubspotusercontent-na1.net/hubfs/44173479/2460154_Blogfeaturedimage-LinkedInads_093024.png" alt="YouTube">
                    <h5>YouTube</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="350">
                <div class="channel-card">
                    <img src="https://cdn.prod.website-files.com/627532e043f5505c844dd553/63352eb9330b449f8d81b0e9_Types_of_Twitter_ads_and_variant_targeting_79c4cb1a85.png" alt="Twitter">
                    <h5>Twitter</h5>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center mt-3">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="400">
                <div class="channel-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRabpCUfvxzJR5WYGPD9Oj9HR48fjFSilsJQw&s" alt="Pinterest">
                    <h5>Pinterest</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="450">
                <div class="channel-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4NZKgIMNlODPkl-SPAFjgCpSCIjIvciMwlw&s" alt="TikTok">
                    <h5>TikTok</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="500">
                <div class="channel-card">
                    <img src="https://blogs-images.forbes.com/eladnatanson/files/2019/03/amazon2-e1553774022915.png" alt="Amazon Ads">
                    <h5>Amazon Ads</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="550">
                <div class="channel-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThO1gu4v0zwheDnHaeEzZh-Ww10UDq7HL-rQ&s" alt="Bing Ads">
                    <h5>Bing Ads</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="results-section py-5 bg-gradient-primary">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge light">Results</span>
            <h2 class="text-white">Real Results for Real Businesses</h2>
            <p class="section-subtitle text-white-50">Numbers that speak for themselves</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>10M+</h3>
                    <p>Leads Generated</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3>₹500Cr+</h3>
                    <p>Revenue Generated</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>500%</h3>
                    <p>Average ROI</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="result-card">
                    <div class="result-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>5000+</h3>
                    <p>Keywords on Page 1</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Industries We Serve -->
<section class="industries-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>Industries We've Grown</h2>
            <p class="section-subtitle">Proven success across diverse sectors</p>
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
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
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
                <i class="fas fa-utensils"></i>
                <span>Food & Restaurant</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-plane"></i>
                <span>Travel</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-tshirt"></i>
                <span>Fashion</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-laptop"></i>
                <span>SaaS & Tech</span>
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

<!-- Benefits Section -->
<section class="service-benefits py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="benefits-header">
                    <span class="section-badge">Benefits</span>
                    <h2>Why Invest in Digital Marketing?</h2>
                    <p>Digital marketing delivers the highest ROI of any marketing channel</p>
                </div>
                <div class="marketing-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">72%</span>
                        <span class="stat-text">of marketers say content marketing increases leads</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">49%</span>
                        <span class="stat-text">of users discover new products through social media</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">14.6%</span>
                        <span class="stat-text">SEO leads close rate vs 1.7% for outbound</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Targeted Reach</h5>
                            <p>Reach exactly who you want based on demographics, interests, and behavior</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Measurable Results</h5>
                            <p>Track every click, lead, and sale with complete transparency</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Cost Effective</h5>
                            <p>Get better ROI compared to traditional marketing methods</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Quick Results</h5>
                            <p>Start seeing leads and sales within days of campaign launch</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Global Reach</h5>
                            <p>Reach customers anywhere in the world, 24/7</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Agile & Flexible</h5>
                            <p>Adjust campaigns in real-time based on performance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Details Section -->
<section class="seo-details py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">SEO</span>
            <h2>Our SEO Methodology</h2>
            <p class="section-subtitle">A comprehensive approach to dominate search rankings</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="seo-service-card">
                    <div class="seo-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Technical SEO</h4>
                    <ul>
                        <li>Site Speed Optimization</li>
                        <li>Mobile Optimization</li>
                        <li>Core Web Vitals</li>
                        <li>Schema Markup</li>
                        <li>Crawlability & Indexing</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="seo-service-card">
                    <div class="seo-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4>On-Page SEO</h4>
                    <ul>
                        <li>Keyword Research</li>
                        <li>Content Optimization</li>
                        <li>Title & Meta Tags</li>
                        <li>Internal Linking</li>
                        <li>Image Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="seo-service-card">
                    <div class="seo-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <h4>Off-Page SEO</h4>
                    <ul>
                        <li>Link Building</li>
                        <li>Guest Posting</li>
                        <li>Brand Mentions</li>
                        <li>Digital PR</li>
                        <li>Social Signals</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="seo-service-card">
                    <div class="seo-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Local SEO</h4>
                    <ul>
                        <li>Google Business Profile</li>
                        <li>Local Citations</li>
                        <li>Review Management</li>
                        <li>Local Content</li>
                        <li>Map Pack Optimization</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tools We Use -->
<section class="tools-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Tools</span>
            <h2>Marketing Tools We Use</h2>
            <p class="section-subtitle">Industry-leading tools for maximum performance</p>
        </div>
        <div class="tools-categories">
            <div class="tool-category" data-aos="fade-up" data-aos-delay="100">
                <h5><i class="fas fa-search"></i> SEO Tools</h5>
                <div class="tools-grid">
                    <div class="tool-item">
                        <img src="https://yt3.googleusercontent.com/SaaS8idd3yr7zOhLPFYTDu5byj0onVhhi6QeKx3WE1TYLVkYpbbaULdicLKZwZ7viOGzsalAGA=s900-c-k-c0x00ffffff-no-rj" alt="SEMrush">
                        <span>SEMrush</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://yt3.googleusercontent.com/G001asnVJeYt_ucN2LhO1nzYdKaaNa9AOWH1woHg6SYmMmJLpsriEh5Y9f8sqKgVUiVWGL9-tw=s900-c-k-c0x00ffffff-no-rj" alt="Ahrefs">
                        <span>Ahrefs</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://moz.com/images/assets/icons/moz-pro-logo@2.png?w=756&h=380&auto=compress%2Cformat&fit=crop&dm=1636397334&s=0493d1889a0d97fa8061883466bda311" alt="Moz">
                        <span>Moz</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStDogEy5rr5ZlcN71ULD3NgKOnRXHvW5kdSA&s" alt="Screaming Frog">
                        <span>Screaming Frog</span>
                    </div>
                </div>
            </div>
            <div class="tool-category" data-aos="fade-up" data-aos-delay="200">
                <h5><i class="fas fa-chart-bar"></i> Analytics</h5>
                <div class="tools-grid">
                    <div class="tool-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Logo_Google_Analytics.svg/1200px-Logo_Google_Analytics.svg.png" alt="Google Analytics">
                        <span>GA4</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://localo.com/assets/img/definitions/what-is-gtm.webp" alt="GTM">
                        <span>GTM</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2xbQkM8dq-2taIS95Sfn-dyuH85SZUmuuEA&s" alt="Hotjar">
                        <span>Hotjar</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE48dHnqpwAJngcqznoFWOlUBV2AXaPHt5mg&s" alt="Mixpanel">
                        <span>Mixpanel</span>
                    </div>
                </div>
            </div>
            <div class="tool-category" data-aos="fade-up" data-aos-delay="300">
                <h5><i class="fas fa-ad"></i> Advertising</h5>
                <div class="tools-grid">
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_lbv-SHRFl9Mv9fY7MH__cym6fSdvF3gWog&s" alt="Google Ads">
                        <span>Google Ads</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjsWLehhjcsLQ05eRUh5uNm2M4dPSM57knXQ&s" alt="Meta Ads">
                        <span>Meta Ads</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://44173479.fs1.hubspotusercontent-na1.net/hubfs/44173479/2460154_Blogfeaturedimage-LinkedInads_093024.png" alt="LinkedIn Ads">
                        <span>LinkedIn Ads</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_5k8YSkV7Zs2ASMmBHj3dGDY1sF5eWtsWCg&s" alt="Optimize">
                        <span>Optimize</span>
                    </div>
                </div>
            </div>
            <div class="tool-category" data-aos="fade-up" data-aos-delay="400">
                <h5><i class="fas fa-envelope"></i> Email & Automation</h5>
                <div class="tools-grid">
                    <div class="tool-item">
                        <img src="https://www.finemediabw.com/hubfs/Blog/HubSpot/1.%20What/What%20is%20HubSpot.png" alt="HubSpot">
                        <span>HubSpot</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://easydigitaldownloads.com/wp-content/uploads/edd/2019/05/mailchimp-product-image.png" alt="Mailchimp">
                        <span>Mailchimp</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://cyclr.com/wp-content/uploads/2022/03/ext-525.png" alt="Klaviyo">
                        <span>Klaviyo</span>
                    </div>
                    <div class="tool-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Zapier-logo.png" alt="Zapier">
                        <span>Zapier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reporting Dashboard -->
<section class="reporting-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="reporting-content">
                    <span class="section-badge">Transparency</span>
                    <h2>Real-Time Reporting Dashboard</h2>
                    <p class="lead">Know exactly how your marketing is performing with our live dashboards and detailed reports.</p>
                    
                    <div class="reporting-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Live Dashboards</h5>
                                <p>Access real-time campaign performance 24/7</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Weekly Reports</h5>
                                <p>Detailed weekly performance summaries</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Monthly Reviews</h5>
                                <p>In-depth monthly analysis with strategy calls</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>ROI Tracking</h5>
                                <p>Clear visibility into return on investment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="dashboard-preview">
                    <img src="https://www.slidekit.com/wp-content/uploads/2024/10/Digital-Marketing-Dashboard-Template-For-PPT-and-Google-Slides.jpg" alt="Marketing Dashboard" class="img-fluid rounded-lg shadow-lg">
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
            <i class="fas fa-certificate"></i>
        </div>
        <h4>Certified Team</h4>
        <p>Google, Meta, and HubSpot certified marketing experts</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-chart-line"></i>
        </div>
        <h4>ROI Focused</h4>
        <p>Average 500% return on marketing investment</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-eye"></i>
        </div>
        <h4>Full Transparency</h4>
        <p>Real-time dashboards and detailed reporting</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-handshake"></i>
        </div>
        <h4>No Lock-in Contracts</h4>
        <p>Month-to-month flexibility, results keep you with us</p>
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
            <p>Analyze current marketing efforts</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-chess"></i></div>
            <h4>Strategy</h4>
            <p>Develop custom marketing plan</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Launch</h4>
            <p>Execute campaigns across channels</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-chart-bar"></i></div>
            <h4>Analyze</h4>
            <p>Track performance metrics</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-sync-alt"></i></div>
            <h4>Optimize</h4>
            <p>Continuous improvement</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-expand-arrows-alt"></i></div>
            <h4>Scale</h4>
            <p>Grow successful campaigns</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Digital Marketing Packages</h2>
            <p class="section-subtitle">Flexible plans to match your growth goals</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter</h4>
                        <p>For small businesses starting out</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">25,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> SEO (10 Keywords)</li>
                            <li><i class="fas fa-check"></i> Google Ads (Up to ₹50K spend)</li>
                            <li><i class="fas fa-check"></i> Social Media (2 Platforms)</li>
                            <li><i class="fas fa-check"></i> 8 Social Posts/Month</li>
                            <li><i class="fas fa-check"></i> Monthly Reporting</li>
                            <li><i class="fas fa-check"></i> Email Support</li>
                            <li><i class="fas fa-times text-muted"></i> Content Marketing</li>
                            <li><i class="fas fa-times text-muted"></i> Email Marketing</li>
                            <li><i class="fas fa-times text-muted"></i> Dedicated Manager</li>
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
                        <p>For businesses ready to scale</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">60,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> SEO (25 Keywords)</li>
                            <li><i class="fas fa-check"></i> Google Ads (Up to ₹2L spend)</li>
                            <li><i class="fas fa-check"></i> Social Media (4 Platforms)</li>
                            <li><i class="fas fa-check"></i> 16 Social Posts/Month</li>
                            <li><i class="fas fa-check"></i> 4 Blog Posts/Month</li>
                            <li><i class="fas fa-check"></i> Email Marketing</li>
                            <li><i class="fas fa-check"></i> Weekly Reporting</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                            <li><i class="fas fa-check"></i> Monthly Strategy Calls</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>For large-scale marketing needs</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,50,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> SEO (Unlimited Keywords)</li>
                            <li><i class="fas fa-check"></i> Multi-Channel PPC</li>
                            <li><i class="fas fa-check"></i> All Social Platforms</li>
                            <li><i class="fas fa-check"></i> Daily Social Posts</li>
                            <li><i class="fas fa-check"></i> Full Content Strategy</li>
                            <li><i class="fas fa-check"></i> Marketing Automation</li>
                            <li><i class="fas fa-check"></i> CRO & A/B Testing</li>
                            <li><i class="fas fa-check"></i> Real-time Dashboard</li>
                            <li><i class="fas fa-check"></i> Dedicated Team</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Ad spend is billed separately directly to platforms. Prices exclude GST. Custom packages available.</p>
        </div>
        
        <!-- Individual Service Pricing -->
        <div class="individual-pricing mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>Individual Service Pricing</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">SEO Only</span>
                        <span class="addon-price">₹15,000/mo</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">PPC Management</span>
                        <span class="addon-price">15% of spend</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Social Media</span>
                        <span class="addon-price">₹12,000/mo</span>
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
                        <span class="addon-name">Email Marketing</span>
                        <span class="addon-price">₹8,000/mo</span>
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
            <h2>Marketing Success Stories</h2>
            <p class="section-subtitle">Real results from real campaigns</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card marketing">
                    <div class="portfolio-image">
                        <img src="https://chatgpt.com/backend-api/estuary/content?id=file_00000000859c72098a274bc3dc55f62f&ts=490670&p=fs&cid=1&sig=bad29cfffff8183fd6b993549e612c1692c0ae3803e62e21ce6be167ab9e19ad&v=0" alt="E-commerce SEO & PPC" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion Brand Digital Growth</h4>
                        <p>SEO + Google Ads campaign for D2C fashion brand</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-chart-line"></i> 450% ROI</span>
                            <span><i class="fas fa-search"></i> 3x Organic Traffic</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card marketing">
                    <div class="portfolio-image">
                        <img src="https://chatgpt.com/backend-api/estuary/content?id=file_00000000ef587206aaaacde3bcc0d6bd&ts=490670&p=fs&cid=1&sig=629e55f8cbd8d3080e31409d1440df9c789f8f74015ba8754df863704a5a723c&v=0" alt="Real Estate Lead Generation" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Real Estate</span>
                        <h4>Real Estate Lead Generation</h4>
                        <p>Facebook & Google Ads for luxury real estate developer</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-users"></i> 2500+ Leads</span>
                            <span><i class="fas fa-rupee-sign"></i> ₹50 Cr Sales</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card marketing">
                    <div class="portfolio-image">
                        <img src="https://chatgpt.com/backend-api/estuary/content?id=file_00000000beac7209bfd7f8d6ba21585e&ts=490670&p=fs&cid=1&sig=e4cb7fefe960de6b737172072e8dec4d662a2048b10edf901ccf97a1fdc556e2&v=0" alt="SaaS Content Marketing" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Case Study</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">SaaS</span>
                        <h4>SaaS Growth Marketing</h4>
                        <p>Content marketing & SEO for B2B SaaS platform</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-search"></i> #1 Rankings</span>
                            <span><i class="fas fa-user-plus"></i> 200% More Signups</span>
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
            <p class="section-subtitle">Success stories from businesses we've helped grow</p>
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
                    <p class="testimonial-text">"Our e-commerce sales grew from ₹10 lakhs to ₹1 crore per month within 8 months of working with Shiva Tech Digital. Their Google Ads and SEO strategies are exceptional!"</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Ankit Sharma</h5>
                            <span>Founder, Fashion E-commerce</span>
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
                    <p class="testimonial-text">"We were struggling to get quality leads for our real estate project. Their Facebook Ads campaigns generated 500+ qualified leads in just 2 months at a CPL we never thought possible."</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Priya Kapoor</h5>
                            <span>Marketing Head, Real Estate</span>
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
                    <p class="testimonial-text">"The SEO results speak for themselves. We now rank #1 for our primary keywords and organic traffic has increased by 400%. Best investment we've made in marketing."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Rajesh Menon</h5>
                            <span>CEO, EdTech Company</span>
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
        page-slug="services/digital-marketingl"
        section-title="Frequently Asked Questions About Digital Marketing Services"
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