@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/web-development')

@section('title', 'Web Development Services in Noida')
@section('meta_description', 'Expert web development services in India. We build custom websites, web applications, and enterprise solutions using React, Angular, Node.js, Laravel & more. Get a free quote today!')
@section('meta_keywords', 'web development services, custom website development, web application development, frontend development, backend development, React development, Angular development, Laravel development, Node.js development, PHP development, website development company India')

@section('og_title', 'Professional Web Development Services | Shiva Tech Digital')
@section('og_description', 'Expert custom web development services. Build scalable, high-performance websites and web applications with our experienced team.')
@section('og_image', asset('web_assets/img/services/web-development-og.jpg'))
@section('twitter_title', 'Web Development Services | Shiva Tech Digital')
@section('twitter_description', 'Custom websites and web applications built with cutting-edge technologies. Get your free consultation today!')
@section('twitter_image', asset('web_assets/img/services/web-development-og.jpg'))

@section('schema-markup')

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "serviceType": "Web Development",
    "name": "Professional Web Development Services",
    "provider": {
        "@@type": "Organization",
        "name": "Shiva Tech Digital",
        "url": "https://shivatechdigital.com"
    },
    "areaServed": {
        "@@type": "Country",
        "name": "India"
    },
    "url": "https://shivatechdigital.com/services/web-development",
    "description": "Custom web development services including Laravel, React, Node.js and enterprise solutions."
}
</script>

@endsection

@section('breadcrumb-title', 'Web Development')
@section('service-category', 'Development Services')
@section('hero-title', 'Professional Web Development Services')
@section('hero-description', 'We create powerful, scalable, and high-performance websites and web applications that drive business growth. From simple landing pages to complex enterprise solutions, our expert developers deliver excellence.')
@section('service-name', 'Web Development')
@section('service-name-lower', 'web development')

@section('trust-badge-1', '500+ Websites Delivered')
@section('trust-badge-2', '99.9% Uptime Guarantee')
@section('trust-badge-3', 'SEO Optimized')

@section('hero-image')
<img src="https://www.xavor.com/wp-content/uploads/2023/08/Custom-Web-Development-101.webp" alt="Web Development Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>500+</h3>
    <p>Websites Built</p>
</div>
<div class="stat-card">
    <h3>98%</h3>
    <p>Client Satisfaction</p>
</div>
<div class="stat-card">
    <h3>15+</h3>
    <p>Technologies</p>
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
                    <h2>Custom Web Development Solutions That Drive Results</h2>
                    <p class="lead">At Shiva Tech Digital, we don't just build websites – we create digital experiences that convert visitors into customers and help your business thrive online.</p>
                    <p>With over 8 years of experience and 500+ successful projects, our team of skilled developers, designers, and strategists work together to deliver websites that are not only visually stunning but also technically robust, SEO-friendly, and optimized for performance.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>100% Responsive Design</h5>
                                <p>Perfect on all devices from mobile to desktop</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>SEO-First Approach</h5>
                                <p>Built to rank higher on search engines</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Lightning Fast Performance</h5>
                                <p>Optimized for speed and Core Web Vitals</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Secure & Scalable</h5>
                                <p>Enterprise-grade security with SSL and best practices</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://www.xavor.com/wp-content/uploads/2023/08/Custom-Web-Development-101.webp" alt="Custom Web Development Services" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">8+</span>
                        <span class="text">Years Experience</span>
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
            <h2>Our Web Development Services</h2>
            <p class="section-subtitle">Comprehensive web solutions for every business need</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Custom Website Development</h4>
                    <p>Bespoke websites tailored to your brand identity and business objectives. From corporate sites to portfolios, we build it all.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Corporate Websites</li>
                        <li><i class="fas fa-check"></i> Landing Pages</li>
                        <li><i class="fas fa-check"></i> Portfolio Sites</li>
                        <li><i class="fas fa-check"></i> Business Websites</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h4>Web Application Development</h4>
                    <p>Powerful web applications with complex functionality, real-time features, and seamless user experiences.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> SaaS Applications</li>
                        <li><i class="fas fa-check"></i> Customer Portals</li>
                        <li><i class="fas fa-check"></i> Dashboard & Analytics</li>
                        <li><i class="fas fa-check"></i> CRM Systems</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>E-commerce Development</h4>
                    <p>Full-featured online stores with secure payments, inventory management, and seamless checkout experiences.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Custom E-commerce</li>
                        <li><i class="fas fa-check"></i> Shopify Development</li>
                        <li><i class="fas fa-check"></i> WooCommerce</li>
                        <li><i class="fas fa-check"></i> Magento Solutions</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-wordpress"></i>
                    </div>
                    <h4>CMS Development</h4>
                    <p>Easy-to-manage content management systems that put you in control of your website content.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> WordPress Development</li>
                        <li><i class="fas fa-check"></i> Custom CMS</li>
                        <li><i class="fas fa-check"></i> Headless CMS</li>
                        <li><i class="fas fa-check"></i> Content Migration</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-sync"></i>
                    </div>
                    <h4>API Development & Integration</h4>
                    <p>Robust APIs and seamless third-party integrations to connect your systems and automate workflows.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> RESTful APIs</li>
                        <li><i class="fas fa-check"></i> GraphQL APIs</li>
                        <li><i class="fas fa-check"></i> Payment Gateways</li>
                        <li><i class="fas fa-check"></i> Third-party Integrations</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Enterprise Solutions</h4>
                    <p>Large-scale enterprise applications with robust architecture, high security, and scalability.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> ERP Systems</li>
                        <li><i class="fas fa-check"></i> Enterprise Portals</li>
                        <li><i class="fas fa-check"></i> Workflow Automation</li>
                        <li><i class="fas fa-check"></i> Legacy Modernization</li>
                    </ul>
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
                    <h2>What You Get With Our Web Development Services</h2>
                    <p>Every website we build is designed to deliver tangible business results</p>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Blazing Fast Speed</h5>
                            <p>Optimized for Core Web Vitals with sub-3 second load times</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Mobile-First Design</h5>
                            <p>Perfect experience on smartphones, tablets, and desktops</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>SEO Optimized</h5>
                            <p>Built with on-page SEO best practices from the ground up</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Security First</h5>
                            <p>SSL certificates, secure coding practices, and regular updates</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Scalable Architecture</h5>
                            <p>Built to grow with your business without performance issues</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Ongoing Support</h5>
                            <p>Dedicated support team available for maintenance and updates</p>
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
            <i class="fas fa-user-tie"></i>
        </div>
        <h4>Experienced Team</h4>
        <p>8+ years of experience with 50+ skilled developers and designers</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-code"></i>
        </div>
        <h4>Modern Technologies</h4>
        <p>Using latest frameworks and tools like React, Vue.js, Laravel, and more</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-clock"></i>
        </div>
        <h4>Timely Delivery</h4>
        <p>95% on-time project delivery with transparent progress updates</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-rupee-sign"></i>
        </div>
        <h4>Competitive Pricing</h4>
        <p>Premium quality at affordable prices with flexible payment options</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-comments"></i></div>
            <h4>Discovery & Planning</h4>
            <p>We understand your requirements, goals, target audience, and create a detailed project roadmap.</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-pencil-ruler"></i></div>
            <h4>Design & Prototype</h4>
            <p>Creating wireframes, mockups, and interactive prototypes for your approval before development.</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-code"></i></div>
            <h4>Development & Testing</h4>
            <p>Agile development with regular sprints, code reviews, and comprehensive testing.</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Launch & Support</h4>
            <p>Seamless deployment, training, and ongoing support to ensure your success.</p>
        </div>
    </div>
</div>
@endsection

@section('technologies-section')
<section class="technologies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Stack</span>
            <h2>Technologies We Use</h2>
            <p class="section-subtitle">Cutting-edge technologies for modern web solutions</p>
        </div>
        <div class="tech-categories">
            <div class="tech-category" data-aos="fade-up" data-aos-delay="100">
                <h5>Frontend</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://e7.pngegg.com/pngimages/452/495/png-clipart-react-javascript-angularjs-ionic-github-text-logo-thumbnail.png" alt="React Development">
                        <span>React</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3WuM1lq_KIQeNyFNRsanl8CryZeMgPics-Q&s" alt="Angular Development">
                        <span>Angular</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://w7.pngwing.com/pngs/854/555/png-transparent-vue-js-hd-logo-thumbnail.png" alt="Vue.js Development">
                        <span>Vue.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRybLuC72NnF0a661MH694igC7kBxBdmnxhJw&s" alt="Next.js Development">
                        <span>Next.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/060/194/946/small_2x/typescript-programming-language-3d-icon-transparent-background-free-png.png" alt="TypeScript Development">
                        <span>TypeScript</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="200">
                <h5>Backend</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://p7.hiclipart.com/preview/306/37/167/node-js-javascript-web-application-express-js-computer-software-others.jpg" alt="Node.js Development">
                        <span>Node.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://e7.pngegg.com/pngimages/407/190/png-clipart-laravel-new-logo-tech-companies-thumbnail.png" alt="Laravel Development">
                        <span>Laravel</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkBKGzgKHQA42GTo40DCQUnNVkUWd3FMzFJA&s" alt="Python Development">
                        <span>Python</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://www.vhv.rs/dpng/d/443-4430861_django-python-logo-png-png-download-django-python.png" alt="Django Development">
                        <span>Django</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQSTeu0pvft4TX0xNo5kzZu-HO3Rk5JkPBmg&s" alt=".NET Development">
                        <span>.NET</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="300">
                <h5>Database</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrLIsoAHea-BOhRzeFAqp8P9OChYR2Fch6mQ&s" alt="MySQL Database">
                        <span>MySQL</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSti-dGQk1CVpJQO2jFc4YR7gmTezs2frTA5w&s" alt="PostgreSQL Database">
                        <span>PostgreSQL</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://toppng.com/uploads/preview/mongodb-logo-11609369386lqoc6r2ga9.png" alt="MongoDB Database">
                        <span>MongoDB</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnP_YlTzhYLa-MgCrIfSx4pq1MlQCUKkPBXA&s" alt="Redis Cache">
                        <span>Redis</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="400">
                <h5>Cloud & DevOps</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnP_YlTzhYLa-MgCrIfSx4pq1MlQCUKkPBXA&s" alt="AWS Cloud Services">
                        <span>AWS</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvlSEeTBgbDi1rAoN8aW-UeA28nX6i8aoj3Q&s" alt="Google Cloud Platform">
                        <span>GCP</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://p7.hiclipart.com/preview/852/593/318/using-docker-developing-and-deploying-software-with-containers-application-software-software-deployment-computer-software-github.jpg" alt="Docker Container">
                        <span>Docker</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://toppng.com/uploads/preview/kubernetes-logo-transparent-115632039740fmii0y8yr.png" alt="Kubernetes Orchestration">
                        <span>Kubernetes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pricing-section')
<section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>Web Development Packages</h2>
            <p class="section-subtitle">Transparent pricing for every budget</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter</h4>
                        <p>Perfect for small businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">25,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 5 Pages</li>
                            <li><i class="fas fa-check"></i> Responsive Design</li>
                            <li><i class="fas fa-check"></i> Contact Form</li>
                            <li><i class="fas fa-check"></i> Basic SEO Setup</li>
                            <li><i class="fas fa-check"></i> Social Media Integration</li>
                            <li><i class="fas fa-check"></i> 1 Month Support</li>
                            <li><i class="fas fa-times text-muted"></i> Custom Features</li>
                            <li><i class="fas fa-times text-muted"></i> E-commerce</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Business</h4>
                        <p>For growing businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">75,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 15 Pages</li>
                            <li><i class="fas fa-check"></i> Custom Design</li>
                            <li><i class="fas fa-check"></i> CMS Integration</li>
                            <li><i class="fas fa-check"></i> Advanced SEO</li>
                            <li><i class="fas fa-check"></i> Blog Section</li>
                            <li><i class="fas fa-check"></i> Analytics Integration</li>
                            <li><i class="fas fa-check"></i> 3 Months Support</li>
                            <li><i class="fas fa-check"></i> Performance Optimization</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>For large organizations</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">2,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Unlimited Pages</li>
                            <li><i class="fas fa-check"></i> Custom Web Application</li>
                            <li><i class="fas fa-check"></i> Advanced Features</li>
                            <li><i class="fas fa-check"></i> API Integrations</li>
                            <li><i class="fas fa-check"></i> User Dashboard</li>
                            <li><i class="fas fa-check"></i> Database Design</li>
                            <li><i class="fas fa-check"></i> 6 Months Support</li>
                            <li><i class="fas fa-check"></i> Priority Support</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Actual pricing depends on specific requirements. Contact us for a custom quote.</p>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>Web Development Projects</h2>
            <p class="section-subtitle">See some of our recent web development work</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://5.imimg.com/data5/UB/SN/MY-46768798/ecommerce-website-development.png" alt="E-commerce Website Development Project" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion E-commerce Store</h4>
                        <p>Custom Shopify development with 200% increase in conversions</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://www.blendb2b.com/hs-fs/hubfs/blog-images/Best%20SaaS%20Websites/databox-saas-website.jpg?width=1600&height=780&name=databox-saas-website.jpg" alt="SaaS Web Application Development" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Web Application</span>
                        <h4>HR Management SaaS Platform</h4>
                        <p>Full-stack application with React and Node.js</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQnNFEnLmwCH_NEzHHpfjA4_Mc2l2Y5BWafQ&s" alt="Corporate Website Development" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Corporate</span>
                        <h4>Financial Services Website</h4>
                        <p>Modern corporate website with CMS integration</p>
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

@section('faqs-section')
    <x-faqs-section 
        page-slug="services/web-development"
        section-title="Frequently Asked Questions About Web Develeopment Services"
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