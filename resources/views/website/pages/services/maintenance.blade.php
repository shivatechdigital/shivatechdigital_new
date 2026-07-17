@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/maintenance-support')

@section('breadcrumb-title', 'Website Maintenance')
@section('service-category', 'Support Services')
@section('hero-title', 'Website Maintenance & Support')
@section('hero-description', 'Keep your website secure, fast, and always online. Our comprehensive maintenance services ensure your website runs flawlessly 24/7, so you can focus on growing your business while we handle the technical stuff.')
@section('service-name', 'Website Maintenance')
@section('service-name-lower', 'website maintenance')

@section('trust-badge-1', '500+ Websites Managed')
@section('trust-badge-2', '99.9% Uptime Guarantee')
@section('trust-badge-3', '24/7 Support')

@section('hero-image')
<img src="{{ asset('web_assets/img/services/maintenance-hero.svg') }}" alt="Website Maintenance & Support Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>500+</h3>
    <p>Websites Managed</p>
</div>
<div class="stat-card">
    <h3>99.9%</h3>
    <p>Uptime Guarantee</p>
</div>
<div class="stat-card">
    <h3><15min</h3>
    <p>Response Time</p>
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
                    <h2>Your Website Deserves Expert Care</h2>
                    <p class="lead">A website isn't a "set it and forget it" asset. It requires continuous care to stay secure, perform well, and serve your customers effectively.</p>
                    <p>With 500+ websites under our management and a dedicated team of support engineers, we provide peace of mind through proactive monitoring, regular updates, and rapid response to any issues. Think of us as your website's dedicated IT department.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>24/7 Monitoring</h5>
                                <p>Round-the-clock uptime and performance monitoring</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Proactive Security</h5>
                                <p>Stay protected against threats and vulnerabilities</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Daily Backups</h5>
                                <p>Automatic backups with easy one-click restore</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Priority Support</h5>
                                <p>Fast response times with dedicated support team</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="{{ asset('web_assets/img/services/maintenance-overview.jpg') }}" alt="Website Maintenance Services" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">500+</span>
                        <span class="text">Websites Managed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Maintenance Matters -->
<section class="why-maintenance py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Why It Matters</span>
            <h2>What Happens Without Maintenance?</h2>
            <p class="section-subtitle">The risks of neglecting your website</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="risk-card">
                    <div class="risk-icon danger">
                        <i class="fas fa-user-secret"></i>
                    </div>
                    <h4>Security Breaches</h4>
                    <p>43% of cyber attacks target small businesses. Outdated software is the #1 vulnerability.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="risk-card">
                    <div class="risk-icon warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h4>Downtime & Lost Sales</h4>
                    <p>Every minute of downtime costs money. Average cost: ₹8,000+ per minute for e-commerce.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="risk-card">
                    <div class="risk-icon warning">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <h4>Poor Performance</h4>
                    <p>53% of users abandon sites that take >3 seconds to load. Slow sites lose customers.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="risk-card">
                    <div class="risk-icon danger">
                        <i class="fas fa-search-minus"></i>
                    </div>
                    <h4>SEO Rankings Drop</h4>
                    <p>Google penalizes slow, insecure, and broken websites. Maintenance protects your rankings.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="services-offered py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">What We Offer</span>
            <h2>Our Maintenance Services</h2>
            <p class="section-subtitle">Comprehensive care for your website</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h4>24/7 Uptime Monitoring</h4>
                    <p>Continuous monitoring from multiple locations with instant alerts and rapid response.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Real-time Uptime Checks</li>
                        <li><i class="fas fa-check"></i> Performance Monitoring</li>
                        <li><i class="fas fa-check"></i> Instant Alert Notifications</li>
                        <li><i class="fas fa-check"></i> Monthly Uptime Reports</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Security & Updates</h4>
                    <p>Keep your website protected with regular security patches and software updates.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> CMS & Plugin Updates</li>
                        <li><i class="fas fa-check"></i> Security Patches</li>
                        <li><i class="fas fa-check"></i> Malware Scanning</li>
                        <li><i class="fas fa-check"></i> Firewall Protection</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-database"></i>
                    </div>
                    <h4>Backup & Recovery</h4>
                    <p>Automated backups and disaster recovery to protect your valuable data.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Daily Automatic Backups</li>
                        <li><i class="fas fa-check"></i> Off-site Storage</li>
                        <li><i class="fas fa-check"></i> One-Click Restore</li>
                        <li><i class="fas fa-check"></i> 30-Day Retention</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <h4>Performance Optimization</h4>
                    <p>Keep your website fast and responsive with regular performance tuning.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Speed Optimization</li>
                        <li><i class="fas fa-check"></i> Database Optimization</li>
                        <li><i class="fas fa-check"></i> Image Compression</li>
                        <li><i class="fas fa-check"></i> Cache Management</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h4>Bug Fixes & Troubleshooting</h4>
                    <p>Quick resolution of any issues, errors, or bugs affecting your website.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Error Resolution</li>
                        <li><i class="fas fa-check"></i> Broken Link Fixes</li>
                        <li><i class="fas fa-check"></i> Compatibility Fixes</li>
                        <li><i class="fas fa-check"></i> Form Troubleshooting</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h4>Content Updates</h4>
                    <p>Keep your content fresh with regular updates and modifications.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Text & Image Updates</li>
                        <li><i class="fas fa-check"></i> Page Modifications</li>
                        <li><i class="fas fa-check"></i> Blog Post Publishing</li>
                        <li><i class="fas fa-check"></i> Product Updates</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Monitoring Dashboard Preview -->
<section class="monitoring-preview py-5 bg-gradient-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="monitoring-content">
                    <span class="section-badge light">Real-time Monitoring</span>
                    <h2 class="text-white">Always Watching, Always Ready</h2>
                    <p class="text-white-70">Our advanced monitoring system checks your website every 60 seconds from multiple global locations. The moment something goes wrong, we know – and we act.</p>
                    
                    <div class="monitoring-stats">
                        <div class="stat-row">
                            <div class="stat-item">
                                <div class="stat-value">60 sec</div>
                                <div class="stat-label">Check Interval</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">10+</div>
                                <div class="stat-label">Global Locations</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value"><15 min</div>
                                <div class="stat-label">Response Time</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="monitoring-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Instant SMS & Email Alerts</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Performance Benchmarking</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>SSL Certificate Monitoring</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Domain Expiry Alerts</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="monitoring-dashboard-preview">
                    <img src="{{ asset('web_assets/img/services/monitoring-dashboard.png') }}" alt="Website Monitoring Dashboard" class="img-fluid rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What's Included -->
<section class="whats-included py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Complete Coverage</span>
            <h2>What's Included in Every Plan</h2>
            <p class="section-subtitle">Comprehensive maintenance coverage</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="included-item">
                    <i class="fas fa-desktop"></i>
                    <h5>Uptime Monitoring</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="included-item">
                    <i class="fas fa-shield-alt"></i>
                    <h5>Security Scans</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="included-item">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <h5>Daily Backups</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="included-item">
                    <i class="fas fa-sync"></i>
                    <h5>Software Updates</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="included-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <h5>Speed Optimization</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="included-item">
                    <i class="fas fa-bug"></i>
                    <h5>Bug Fixes</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="included-item">
                    <i class="fas fa-headset"></i>
                    <h5>Priority Support</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="included-item">
                    <i class="fas fa-chart-line"></i>
                    <h5>Monthly Reports</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Platform Support -->
<section class="platform-support py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Platforms</span>
            <h2>Platforms We Support</h2>
            <p class="section-subtitle">Expert maintenance for all major platforms</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/wordpress.svg') }}" alt="WordPress Maintenance">
                    <h5>WordPress</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/shopify.svg') }}" alt="Shopify Maintenance">
                    <h5>Shopify</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/woocommerce.svg') }}" alt="WooCommerce Maintenance">
                    <h5>WooCommerce</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="250">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/magento.svg') }}" alt="Magento Maintenance">
                    <h5>Magento</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/laravel.svg') }}" alt="Laravel Maintenance">
                    <h5>Laravel</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="350">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/react.svg') }}" alt="React Maintenance">
                    <h5>React/Next.js</h5>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center mt-3">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="400">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/drupal.svg') }}" alt="Drupal Maintenance">
                    <h5>Drupal</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="450">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/php.svg') }}" alt="PHP Maintenance">
                    <h5>Custom PHP</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="500">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/nodejs.svg') }}" alt="Node.js Maintenance">
                    <h5>Node.js</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="550">
                <div class="platform-card">
                    <img src="{{ asset('web_assets/img/platforms/html.svg') }}" alt="HTML Maintenance">
                    <h5>HTML/CSS/JS</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SLA & Response Times -->
<section class="sla-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">SLA</span>
            <h2>Service Level Agreement</h2>
            <p class="section-subtitle">Our commitment to you</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="sla-card critical">
                    <div class="sla-header">
                        <div class="priority-badge">Critical</div>
                        <h4>Site Down / Security Breach</h4>
                    </div>
                    <div class="sla-body">
                        <div class="response-time">
                            <span class="time">< 15 min</span>
                            <span class="label">Response Time</span>
                        </div>
                        <div class="resolution-time">
                            <span class="time">< 2 hours</span>
                            <span class="label">Resolution Target</span>
                        </div>
                    </div>
                    <div class="sla-footer">
                        <i class="fas fa-phone-alt"></i> 24/7 Phone Support
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="sla-card high">
                    <div class="sla-header">
                        <div class="priority-badge">High</div>
                        <h4>Major Bug / Feature Broken</h4>
                    </div>
                    <div class="sla-body">
                        <div class="response-time">
                            <span class="time">< 1 hour</span>
                            <span class="label">Response Time</span>
                        </div>
                        <div class="resolution-time">
                            <span class="time">< 8 hours</span>
                            <span class="label">Resolution Target</span>
                        </div>
                    </div>
                    <div class="sla-footer">
                        <i class="fas fa-comment-dots"></i> Priority Support
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="sla-card normal">
                    <div class="sla-header">
                        <div class="priority-badge">Normal</div>
                        <h4>Minor Issues / Updates</h4>
                    </div>
                    <div class="sla-body">
                        <div class="response-time">
                            <span class="time">< 4 hours</span>
                            <span class="label">Response Time</span>
                        </div>
                        <div class="resolution-time">
                            <span class="time">< 24 hours</span>
                            <span class="label">Resolution Target</span>
                        </div>
                    </div>
                    <div class="sla-footer">
                        <i class="fas fa-envelope"></i> Email & Ticket Support
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <div class="uptime-guarantee">
                <i class="fas fa-shield-alt"></i>
                <span><strong>99.9% Uptime Guarantee</strong> – We're confident in our infrastructure and processes</span>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Process</span>
            <h2>How Our Maintenance Works</h2>
            <p class="section-subtitle">Simple onboarding, continuous care</p>
        </div>
        <div class="process-steps-horizontal" data-aos="fade-up">
            <div class="step-item">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>Onboarding</h4>
                    <p>Share your website access. We audit your site and set up monitoring.</p>
                </div>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>Initial Optimization</h4>
                    <p>We optimize, secure, and create baseline backups of your website.</p>
                </div>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>Ongoing Maintenance</h4>
                    <p>Regular updates, monitoring, and proactive care every month.</p>
                </div>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>Monthly Reporting</h4>
                    <p>Detailed reports on uptime, security, updates, and recommendations.</p>
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
                    <h2>Why Choose Our Maintenance Service?</h2>
                    <p>Peace of mind for your online presence</p>
                </div>
                <div class="maintenance-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">99.9%</span>
                        <span class="stat-text">Average uptime for managed sites</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">0</span>
                        <span class="stat-text">Security breaches on managed sites</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">4.9/5</span>
                        <span class="stat-text">Client satisfaction rating</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Save Time</h5>
                            <p>Focus on your business while we handle technical maintenance</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Stay Secure</h5>
                            <p>Proactive security measures protect against threats</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Stay Fast</h5>
                            <p>Optimized performance keeps visitors engaged</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Never Lose Data</h5>
                            <p>Daily backups ensure you can always recover</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Reduce Costs</h5>
                            <p>Prevent expensive emergency fixes with proactive care</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Expert Support</h5>
                            <p>Access to skilled developers whenever you need help</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Support -->
<section class="emergency-support py-5 bg-danger-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="emergency-content">
                    <h2><i class="fas fa-exclamation-triangle"></i> Website Down? Hacked? Need Emergency Help?</h2>
                    <p>Don't panic – we're here to help. Our emergency response team is available 24/7 to get your website back online fast.</p>
                    <ul class="emergency-features">
                        <li><i class="fas fa-check"></i> Average response time: 15 minutes</li>
                        <li><i class="fas fa-check"></i> Malware removal & cleanup</li>
                        <li><i class="fas fa-check"></i> Data recovery from backups</li>
                        <li><i class="fas fa-check"></i> Security hardening included</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <div class="emergency-cta">
                    <a href="tel:+919876543210" class="btn-emergency">
                        <i class="fas fa-phone-alt"></i>
                        Call Now: 24/7 Support
                    </a>
                    <p class="emergency-note">Or email: emergency@shivatechdigital.com</p>
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
            <i class="fas fa-clock"></i>
        </div>
        <h4>24/7 Monitoring</h4>
        <p>Round-the-clock monitoring with instant alerts and rapid response</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-bolt"></i>
        </div>
        <h4>Fast Response</h4>
        <p>15-minute response for critical issues, same-day for normal requests</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-user-tie"></i>
        </div>
        <h4>Dedicated Manager</h4>
        <p>Single point of contact who knows your website inside out</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-file-contract"></i>
        </div>
        <h4>No Lock-in</h4>
        <p>Month-to-month plans with no long-term commitments required</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-handshake"></i></div>
            <h4>Onboard</h4>
            <p>Share website access</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-search"></i></div>
            <h4>Audit</h4>
            <p>Assess current state</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-wrench"></i></div>
            <h4>Optimize</h4>
            <p>Initial improvements</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-desktop"></i></div>
            <h4>Monitor</h4>
            <p>24/7 monitoring setup</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-sync"></i></div>
            <h4>Maintain</h4>
            <p>Ongoing care & updates</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-chart-bar"></i></div>
            <h4>Report</h4>
            <p>Monthly reports</p>
        </div>
    </div>
</div>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Maintenance Plans</h2>
            <p class="section-subtitle">Choose the plan that fits your needs</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Basic Care</h4>
                        <p>For small websites & blogs</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">5,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 24/7 Uptime Monitoring</li>
                            <li><i class="fas fa-check"></i> Weekly Backups</li>
                            <li><i class="fas fa-check"></i> Security Scans</li>
                            <li><i class="fas fa-check"></i> Monthly Updates</li>
                            <li><i class="fas fa-check"></i> 2 Content Changes/Month</li>
                            <li><i class="fas fa-check"></i> Email Support</li>
                            <li><i class="fas fa-check"></i> Monthly Report</li>
                            <li><i class="fas fa-times text-muted"></i> Phone Support</li>
                            <li><i class="fas fa-times text-muted"></i> Performance Optimization</li>
                            <li><i class="fas fa-times text-muted"></i> Priority Response</li>
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
                        <p>For business websites</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">12,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 24/7 Uptime Monitoring</li>
                            <li><i class="fas fa-check"></i> Daily Backups</li>
                            <li><i class="fas fa-check"></i> Daily Security Scans</li>
                            <li><i class="fas fa-check"></i> Weekly Updates</li>
                            <li><i class="fas fa-check"></i> 5 Content Changes/Month</li>
                            <li><i class="fas fa-check"></i> Performance Optimization</li>
                            <li><i class="fas fa-check"></i> Priority Support</li>
                            <li><i class="fas fa-check"></i> Phone Support</li>
                            <li><i class="fas fa-check"></i> 4-Hour Response SLA</li>
                            <li><i class="fas fa-check"></i> Monthly Strategy Call</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>For e-commerce & critical sites</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">30,000</span>
                            <span class="period">/month</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Real-time Monitoring</li>
                            <li><i class="fas fa-check"></i> Hourly Backups</li>
                            <li><i class="fas fa-check"></i> Advanced Security</li>
                            <li><i class="fas fa-check"></i> Real-time Updates</li>
                            <li><i class="fas fa-check"></i> Unlimited Content Changes</li>
                            <li><i class="fas fa-check"></i> CDN & Caching Setup</li>
                            <li><i class="fas fa-check"></i> 24/7 Phone Support</li>
                            <li><i class="fas fa-check"></i> 15-Min Response SLA</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                            <li><i class="fas fa-check"></i> Quarterly Reviews</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices exclude GST. Annual plans get 2 months free. Custom plans available for complex sites.</p>
        </div>
        
        <!-- Annual Savings -->
        <div class="annual-savings mt-5" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="savings-card">
                        <div class="savings-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="savings-content">
                            <h4>Save 17% with Annual Plans</h4>
                            <p>Pay annually and get 2 months free. Plus, lock in your rate for 12 months.</p>
                        </div>
                        <a href="{{ route('contact') }}" class="btn-savings">Get Annual Quote</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- One-time Services -->
        <div class="onetime-services mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>One-Time Services</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Malware Removal</span>
                        <span class="addon-price">₹10,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Speed Optimization</span>
                        <span class="addon-price">₹8,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Security Audit</span>
                        <span class="addon-price">₹15,000</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">Migration</span>
                        <span class="addon-price">₹12,000+</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-4">
                    <div class="addon-card">
                        <span class="addon-name">SSL Setup</span>
                        <span class="addon-price">₹3,000</span>
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
            <span class="section-badge">Success Stories</span>
            <h2>Maintenance Results</h2>
            <p class="section-subtitle">Real improvements from real clients</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card maintenance">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/maintenance-project-1.jpg') }}" alt="E-commerce Website Maintenance" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Details</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion Store Optimization</h4>
                        <p>Rescued a hacked WooCommerce store and optimized for performance</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-tachometer-alt"></i> 3x Faster</span>
                            <span><i class="fas fa-shield-alt"></i> Zero Downtime</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card maintenance">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/maintenance-project-2.jpg') }}" alt="Corporate Website Maintenance" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Details</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Corporate</span>
                        <h4>Enterprise Portal Management</h4>
                        <p>24/7 management for a high-traffic corporate portal</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-clock"></i> 99.99% Uptime</span>
                            <span><i class="fas fa-bolt"></i> <5 min Response</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card maintenance">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/maintenance-project-3.jpg') }}" alt="Healthcare Website Maintenance" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Details</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Healthcare</span>
                        <h4>Hospital Website Security</h4>
                        <p>Security hardening and compliance maintenance for hospital network</p>
                        <div class="portfolio-results">
                            <span><i class="fas fa-user-shield"></i> HIPAA Compliant</span>
                            <span><i class="fas fa-bug"></i> 0 Breaches</span>
                        </div>
                    </div>
                </div>
            </div>
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
            <p class="section-subtitle">Peace of mind from businesses like yours</p>
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
                    <p class="testimonial-text">"Our website was hacked on a Friday night. Within 20 minutes of calling, their team was working on it. By Saturday morning, we were back online with enhanced security. That's when I knew we made the right choice."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-25.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Rakesh Sharma</h5>
                            <span>CEO, E-commerce Store</span>
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
                    <p class="testimonial-text">"Before their maintenance service, I was constantly worried about my website. Now I don't even think about it – they handle everything. My site is faster, more secure, and I get monthly reports showing everything they've done."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-26.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Priya Kapoor</h5>
                            <span>Founder, Travel Agency</span>
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
                    <p class="testimonial-text">"The value is incredible. We used to spend ₹50,000+ on emergency fixes every year. Now we pay a fraction of that for proactive maintenance and haven't had a single emergency. The peace of mind is priceless."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-27.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Amit Joshi</h5>
                            <span>Director, Manufacturing Company</span>
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
        page-slug="services/maintenance-support"
        section-title="Frequently Asked Questions About Maintenance Support Services"
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