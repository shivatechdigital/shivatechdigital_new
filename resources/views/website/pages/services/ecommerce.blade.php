@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/ecommerce-development')

@section('breadcrumb-title', 'E-commerce Development')
@section('service-category', 'Development Services')
@section('hero-title', 'E-commerce Development Services')
@section('hero-description', 'Build a powerful online store that converts visitors into customers. We develop custom e-commerce solutions, Shopify stores, WooCommerce websites, and enterprise marketplaces that drive revenue and scale with your business.')
@section('service-name', 'E-commerce Development')
@section('service-name-lower', 'e-commerce development')

@section('trust-badge-1', '400+ Stores Launched')
@section('trust-badge-2', '₹500Cr+ GMV Generated')
@section('trust-badge-3', '35% Avg Conversion Boost')

@section('hero-image')
<img src="https://www.techspakes.com/images/wordpress/e2.jpg" alt="E-commerce Development Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>400+</h3>
    <p>Stores Launched</p>
</div>
<div class="stat-card">
    <h3>₹500Cr+</h3>
    <p>GMV Generated</p>
</div>
<div class="stat-card">
    <h3>35%</h3>
    <p>Avg Conversion Lift</p>
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
                    <h2>E-commerce Solutions That Drive Sales & Scale Business</h2>
                    <p class="lead">At Shiva Tech Digital, we build online stores that don't just look great – they're engineered to convert browsers into buyers and maximize your revenue.</p>
                    <p>With 400+ successful e-commerce projects and over ₹500 crore in GMV generated for our clients, we understand what makes online stores successful. From product discovery to checkout, we optimize every step of the customer journey.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Conversion Optimized</h5>
                                <p>Every design decision focuses on driving sales</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Mobile-First Approach</h5>
                                <p>70%+ of e-commerce traffic is mobile</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Secure Payments</h5>
                                <p>PCI-DSS compliant with multiple payment options</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Scalable Architecture</h5>
                                <p>Handle traffic spikes during sales & festivals</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="https://www.techspakes.com/images/wordpress/e2.jpg" alt="E-commerce Development Solutions" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">₹500Cr+</span>
                        <span class="text">GMV Generated</span>
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
            <h2>Our E-commerce Development Services</h2>
            <p class="section-subtitle">Complete e-commerce solutions for every business model</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-code"></i>
                    </div>
                    <h4>Custom E-commerce Development</h4>
                    <p>Fully customized e-commerce platforms built from scratch to match your unique business requirements.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Tailored Features</li>
                        <li><i class="fas fa-check"></i> Custom Workflows</li>
                        <li><i class="fas fa-check"></i> Unique Design</li>
                        <li><i class="fas fa-check"></i> Full Ownership</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-shopify"></i>
                    </div>
                    <h4>Shopify Development</h4>
                    <p>Professional Shopify store setup, custom themes, and app development for quick market entry.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Custom Theme Development</li>
                        <li><i class="fas fa-check"></i> Shopify Plus</li>
                        <li><i class="fas fa-check"></i> App Integration</li>
                        <li><i class="fas fa-check"></i> Store Migration</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-wordpress"></i>
                    </div>
                    <h4>WooCommerce Development</h4>
                    <p>Powerful WordPress-based e-commerce solutions with endless customization possibilities.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Custom Plugins</li>
                        <li><i class="fas fa-check"></i> Theme Development</li>
                        <li><i class="fas fa-check"></i> Payment Gateways</li>
                        <li><i class="fas fa-check"></i> Performance Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-magento"></i>
                    </div>
                    <h4>Magento Development</h4>
                    <p>Enterprise-grade Magento solutions for large catalogs and high-volume businesses.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Magento 2 Development</li>
                        <li><i class="fas fa-check"></i> Adobe Commerce</li>
                        <li><i class="fas fa-check"></i> Extension Development</li>
                        <li><i class="fas fa-check"></i> Performance Tuning</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-store"></i>
                    </div>
                    <h4>Multi-vendor Marketplace</h4>
                    <p>Build your own Amazon or Flipkart-style marketplace with multiple sellers and vendors.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Vendor Management</li>
                        <li><i class="fas fa-check"></i> Commission System</li>
                        <li><i class="fas fa-check"></i> Seller Dashboard</li>
                        <li><i class="fas fa-check"></i> Split Payments</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>E-commerce Mobile Apps</h4>
                    <p>Native and cross-platform mobile apps for your online store with seamless sync.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> iOS & Android Apps</li>
                        <li><i class="fas fa-check"></i> Push Notifications</li>
                        <li><i class="fas fa-check"></i> Mobile Payments</li>
                        <li><i class="fas fa-check"></i> Offline Catalog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Platforms Section -->
<section class="platforms-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Platforms</span>
            <h2>E-commerce Platforms We Work With</h2>
            <p class="section-subtitle">Expert development across all major e-commerce platforms</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="100">
                <div class="platform-card">
                    <img src="https://glowbyte.in/wp-content/uploads/2024/09/shopify-development.png" alt="Shopify Development">
                    <h5>Shopify</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="150">
                <div class="platform-card">
                    <img src="https://www.indiainternets.com/img/woocommerce-development.jpg" alt="WooCommerce Development">
                    <h5>WooCommerce</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="200">
                <div class="platform-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuEIVyJBoKsR1FDhuqnYWNqo6HOmGULAVSjw&s" alt="Magento Development">
                    <h5>Magento</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="250">
                <div class="platform-card">
                    <img src="https://www.skynetindia.info/images/bigcommerce-development.png" alt="BigCommerce Development">
                    <h5>BigCommerce</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="300">
                <div class="platform-card">
                    <img src="https://4.imimg.com/data4/IS/FY/MY-12456303/opencart-development.png" alt="OpenCart Development">
                    <h5>OpenCart</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="350">
                <div class="platform-card">
                    <img src="https://www.knowband.com/blog/wp-content/uploads/2020/11/Main-Banner-750x300.gif" alt="PrestaShop Development">
                    <h5>PrestaShop</h5>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center mt-3">
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="400">
                <div class="platform-card">
                    <img src="https://aimeos.org/fileadmin/aimeos.org/images/aimeos-screen-laravel-ecommerce.png" alt="Laravel E-commerce">
                    <h5>Laravel</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="450">
                <div class="platform-card">
                    <img src="https://www.datocms-assets.com/205/1640011361-react-ecommerce-tutorial.png?auto=format&h=500" alt="React E-commerce">
                    <h5>React/Next.js</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-4" data-aos="fade-up" data-aos-delay="550">
                <div class="platform-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYVXBt9U1gUiOef9A4a5MEW1NQw-orPhHBXw&s" alt="Saleor E-commerce">
                    <h5>Saleor</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="ecommerce-features py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Features</span>
            <h2>E-commerce Features We Implement</h2>
            <p class="section-subtitle">Everything you need to run a successful online store</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-item">
                    <i class="fas fa-boxes"></i>
                    <h5>Product Management</h5>
                    <p>Unlimited products, variants, categories & attributes</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-item">
                    <i class="fas fa-shopping-cart"></i>
                    <h5>Smart Shopping Cart</h5>
                    <p>Persistent cart, saved items & quick checkout</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-item">
                    <i class="fas fa-credit-card"></i>
                    <h5>Payment Gateways</h5>
                    <p>Razorpay, PayU, Stripe, PayPal & more</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="feature-item">
                    <i class="fas fa-truck"></i>
                    <h5>Shipping Integration</h5>
                    <p>Shiprocket, Delhivery, Blue Dart & real-time tracking</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-item">
                    <i class="fas fa-warehouse"></i>
                    <h5>Inventory Management</h5>
                    <p>Stock tracking, low stock alerts & multi-warehouse</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="feature-item">
                    <i class="fas fa-tags"></i>
                    <h5>Discounts & Coupons</h5>
                    <p>Flexible promotions, offers & loyalty programs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-item">
                    <i class="fas fa-star"></i>
                    <h5>Reviews & Ratings</h5>
                    <p>Customer reviews, ratings & Q&A</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="feature-item">
                    <i class="fas fa-search"></i>
                    <h5>Smart Search</h5>
                    <p>Autocomplete, filters & AI recommendations</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-item">
                    <i class="fas fa-user-circle"></i>
                    <h5>Customer Accounts</h5>
                    <p>Registration, wishlist & order history</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="550">
                <div class="feature-item">
                    <i class="fas fa-chart-bar"></i>
                    <h5>Analytics Dashboard</h5>
                    <p>Sales reports, customer insights & KPIs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-item">
                    <i class="fas fa-envelope"></i>
                    <h5>Email Marketing</h5>
                    <p>Abandoned cart, newsletters & automation</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="650">
                <div class="feature-item">
                    <i class="fas fa-globe"></i>
                    <h5>Multi-language & Currency</h5>
                    <p>Sell globally with localization support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Business Types Section -->
<section class="business-types py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>E-commerce Solutions for Every Business</h2>
            <p class="section-subtitle">We build online stores for diverse industries and business models</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h5>Fashion & Apparel</h5>
                    <p>Clothing, footwear, accessories</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h5>Electronics</h5>
                    <p>Gadgets, computers, appliances</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h5>Jewelry & Luxury</h5>
                    <p>Fine jewelry, watches, luxury goods</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h5>Health & Beauty</h5>
                    <p>Cosmetics, skincare, wellness</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h5>Food & Grocery</h5>
                    <p>Online grocery, gourmet food, beverages</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-couch"></i>
                    </div>
                    <h5>Home & Furniture</h5>
                    <p>Furniture, decor, home improvement</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h5>Pharmacy</h5>
                    <p>Online medicine, healthcare products</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="business-type-card">
                    <div class="business-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <h5>B2B & Wholesale</h5>
                    <p>Bulk orders, dealer portals, quotes</p>
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
                    <h2>Why Choose Professional E-commerce Development?</h2>
                    <p>A custom e-commerce solution pays for itself many times over</p>
                </div>
                <div class="benefit-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">2.86%</span>
                        <span class="stat-text">Global e-commerce conversion rate</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">70%</span>
                        <span class="stat-text">Cart abandonment rate (we reduce it)</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">200%</span>
                        <span class="stat-text">Average ROI for our clients</span>
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
                            <h5>Higher Conversion Rates</h5>
                            <p>Optimized checkout flows that reduce cart abandonment by 40%</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Lightning Fast Speed</h5>
                            <p>Sub-3 second load times for better UX and SEO rankings</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Mobile Commerce Ready</h5>
                            <p>70% of e-commerce happens on mobile - we optimize for it</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Secure Transactions</h5>
                            <p>PCI-DSS compliance and SSL for safe shopping</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>SEO Optimized</h5>
                            <p>Product pages that rank and drive organic traffic</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Scalable Infrastructure</h5>
                            <p>Handle 10x traffic during sales without breaking</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Integrations Section -->
<section class="integrations-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Integrations</span>
            <h2>Seamless Third-Party Integrations</h2>
            <p class="section-subtitle">Connect your store with the tools you already use</p>
        </div>
        <div class="integration-categories">
            <div class="integration-category" data-aos="fade-up" data-aos-delay="100">
                <h5><i class="fas fa-credit-card"></i> Payment Gateways</h5>
                <div class="integration-logos">
                    <div class="integration-logo">
                        <img src="https://d6xcmfyh68wv8.cloudfront.net/newsroom-content/uploads/2024/05/Razorpay-Logo.jpg" alt="Razorpay">
                        <span>Razorpay</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/PayU.svg/1200px-PayU.svg.png" alt="PayU">
                        <span>PayU</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRc_b7cYDTEaXxYsRDAdsVXYknigIr16CNbZQ&s" alt="Stripe">
                        <span>Stripe</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1280px-PayPal.svg.png" alt="PayPal">
                        <span>PayPal</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://www.medianama.com/wp-content/uploads/2020/10/Paytm-Logo2.jpg.jpg" alt="Paytm">
                        <span>Paytm</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://media.licdn.com/dms/image/v2/D560BAQHLOrShxWW33g/company-logo_200_200/company-logo_200_200/0/1732870614932/phonepe_internet_logo?e=2147483647&v=beta&t=ADpboFA5Osbqra1iZzn343_VA2mUGAblUQe2-gejglo" alt="PhonePe">
                        <span>PhonePe</span>
                    </div>
                </div>
            </div>
            <div class="integration-category" data-aos="fade-up" data-aos-delay="200">
                <h5><i class="fas fa-truck"></i> Shipping & Logistics</h5>
                <div class="integration-logos">
                    <div class="integration-logo">
                        <img src="https://yt3.googleusercontent.com/ytc/AIdro_mxXVJEOZK8eH6E1DznroSFal4E6h1oIoi-oCGt-bb8cg=s900-c-k-c0x00ffffff-no-rj" alt="Shiprocket">
                        <span>Shiprocket</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://media.licdn.com/dms/image/v2/D560BAQFHOFbzc8eTug/company-logo_200_200/B56ZqQnVlMG0AI-/0/1763362822878/delhivery_logo?e=2147483647&v=beta&t=R9VIaXnRRP82Fysm7dT0eL98rtnRo9Peh-J_4uC2PtM" alt="Delhivery">
                        <span>Delhivery</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://www.synctrack.io/logo_couriers/bluedart.svg" alt="Blue Dart">
                        <span>Blue Dart</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/FedEx_Express.svg/1200px-FedEx_Express.svg.png" alt="FedEx">
                        <span>FedEx</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://5.imimg.com/data5/SELLER/Default/2024/6/424993503/QA/RB/JS/63239273/dtdc-ltd-courier-services.jpg" alt="DTDC">
                        <span>DTDC</span>
                    </div>
                </div>
            </div>
            <div class="integration-category" data-aos="fade-up" data-aos-delay="300">
                <h5><i class="fas fa-chart-pie"></i> Marketing & Analytics</h5>
                <div class="integration-logos">
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Logo_Google_Analytics.svg/1200px-Logo_Google_Analytics.svg.png" alt="Google Analytics">
                        <span>Analytics</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://www.nopcommerce.com/images/thumbs/0015917_facebook-pixel-by-nopcommerce-team.png" alt="Facebook Pixel">
                        <span>FB Pixel</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://easydigitaldownloads.com/wp-content/uploads/edd/2019/05/mailchimp-product-image.png" alt="Mailchimp">
                        <span>Mailchimp</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://cyclr.com/wp-content/uploads/2022/03/ext-525.png" alt="Klaviyo">
                        <span>Klaviyo</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSfivHpTLB_uUxhdGr6a9SiuYuIRcDufn5vw&s" alt="HubSpot">
                        <span>HubSpot</span>
                    </div>
                </div>
            </div>
            <div class="integration-category" data-aos="fade-up" data-aos-delay="400">
                <h5><i class="fas fa-cogs"></i> ERP & Accounting</h5>
                <div class="integration-logos">
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Tally_-_Logo.png/1200px-Tally_-_Logo.png" alt="Tally">
                        <span>Tally</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://mms.businesswire.com/media/20250514746507/en/2468646/5/Zoho-logo_%2817%29.jpg?download=1" alt="Zoho">
                        <span>Zoho</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/SAP_2011_logo.svg/1200px-SAP_2011_logo.svg.png" alt="SAP">
                        <span>SAP</span>
                    </div>
                    <div class="integration-logo">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpyMJkaLObgW-PQluOE3vLJkUT-J9I_wGO9w&s" alt="QuickBooks">
                        <span>QuickBooks</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Metrics Section -->
<section class="success-metrics py-5 bg-gradient">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge light">Results</span>
            <h2 class="text-white">Our E-commerce Success Metrics</h2>
            <p class="section-subtitle text-white-50">Real results from real clients</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="metric-card">
                    <div class="metric-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3>400+</h3>
                    <p>Online Stores Launched</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="metric-card">
                    <div class="metric-icon">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3>₹500Cr+</h3>
                    <p>Total GMV Generated</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="metric-card">
                    <div class="metric-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3>35%</h3>
                    <p>Avg Conversion Increase</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="metric-card">
                    <div class="metric-icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <h3>50L+</h3>
                    <p>Orders Processed</p>
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
            <i class="fas fa-store"></i>
        </div>
        <h4>400+ Stores Launched</h4>
        <p>Proven experience across diverse e-commerce verticals</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-chart-line"></i>
        </div>
        <h4>Conversion Focused</h4>
        <p>Every design decision optimized for sales</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-plug"></i>
        </div>
        <h4>50+ Integrations</h4>
        <p>Payment, shipping, ERP & marketing integrations</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-headset"></i>
        </div>
        <h4>24/7 Support</h4>
        <p>Round-the-clock support especially during sales</p>
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
            <p>Business analysis & requirements gathering</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-palette"></i></div>
            <h4>Design</h4>
            <p>UX/UI design & store planning</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-code"></i></div>
            <h4>Development</h4>
            <p>Store build & customization</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-plug"></i></div>
            <h4>Integration</h4>
            <p>Payments, shipping & tools</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-vial"></i></div>
            <h4>Testing</h4>
            <p>QA, security & load testing</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Launch</h4>
            <p>Go live & ongoing support</p>
        </div>
    </div>
</div>
@endsection

@section('technologies-section')
<section class="technologies-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Tech Stack</span>
            <h2>Technologies We Use</h2>
            <p class="section-subtitle">Modern technologies for robust e-commerce solutions</p>
        </div>
        <div class="tech-categories">
            <div class="tech-category" data-aos="fade-up" data-aos-delay="100">
                <h5>E-commerce Platforms</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://cdn.prod.website-files.com/66a20ccd546166c2928e14c1/66ec29017eaed9d51dfd51a0_shopify-1.jpeg" alt="Shopify">
                        <span>Shopify</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://www.businessbloomer.com/wp-content/uploads/2017/01/woocommerce-logo-color-black@2x.png" alt="WooCommerce">
                        <span>WooCommerce</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://bairesdev.mo.cloudinary.net/blog/2023/06/What-is-Magento.jpg?tx=w_1920,q_auto" alt="Magento">
                        <span>Magento</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://storage.googleapis.com/s.mkswft.com/RmlsZTo3NzQyZWFmYy1iMTY5LTQxNzItYTcxNi1iNWRjNzA1YWRjMDA=/bg-image.webp" alt="BigCommerce">
                        <span>BigCommerce</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="200">
                <h5>Custom Development</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1969px-Laravel.svg.png" alt="Laravel">
                        <span>Laravel</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcR5U16C8yXgBpl7-Bc7Itjx3_LRl425zINA&s" alt="React">
                        <span>React</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDcMIKmVQ11MCAs_IaZ8NThtJZycqvl5YceQ&s" alt="Next.js">
                        <span>Next.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Node.js_logo.svg" alt="Node.js">
                        <span>Node.js</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="300">
                <h5>Headless Commerce</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROQ-jzLWFdy9Rw4cSNJ_SpPOhEdjd5iAakww&s" alt="Medusa">
                        <span>Medusa</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQibYgWJkM_rxNHyXJyhMv4q-YB_aS4JExdYg&s" alt="Saleor">
                        <span>Saleor</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://raw.githubusercontent.com/chec/commercejs-examples/master/assets/logo.svg" alt="Commerce.js">
                        <span>Commerce.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://images.surferseo.art/de25e209-e96a-4209-9183-aefc68631f1a.png" alt="Hydrogen">
                        <span>Hydrogen</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="400">
                <h5>Database & Cloud</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://www.fullstackpython.com/img/logos/mysql.png" alt="MySQL">
                        <span>MySQL</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNcCK71bf4Yaf9qLrEk9BdAzIf6fRR6StmKA&s" alt="MongoDB">
                        <span>MongoDB</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://www.padok.fr/hubfs/Website%202021/Illustrations/Aws-padok.png" alt="AWS">
                        <span>AWS</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://yt3.googleusercontent.com/XLwUPwwj7PAZ4n-hMiM8poQUO9at8jaQf5BjEzdgMw6r_hOI_FZy9oM5f2mTCJWOfP5RM06XCw=s900-c-k-c0x00ffffff-no-rj" alt="Cloudflare">
                        <span>Cloudflare</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pricing-section')
<section class="pricing-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Pricing</span>
            <h2>E-commerce Development Packages</h2>
            <p class="section-subtitle">Transparent pricing for every business size</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter Store</h4>
                        <p>Perfect for small businesses & startups</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">50,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 100 Products</li>
                            <li><i class="fas fa-check"></i> Shopify/WooCommerce</li>
                            <li><i class="fas fa-check"></i> Responsive Design</li>
                            <li><i class="fas fa-check"></i> Payment Gateway (1)</li>
                            <li><i class="fas fa-check"></i> Shipping Integration</li>
                            <li><i class="fas fa-check"></i> Basic SEO Setup</li>
                            <li><i class="fas fa-check"></i> 2 Months Support</li>
                            <li><i class="fas fa-times text-muted"></i> Custom Features</li>
                            <li><i class="fas fa-times text-muted"></i> Multi-vendor</li>
                            <li><i class="fas fa-times text-muted"></i> Mobile App</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card featured">
                    <div class="popular-badge">Most Popular</div>
                    <div class="pricing-header">
                        <h4>Business Store</h4>
                        <p>For growing e-commerce businesses</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,50,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 1000 Products</li>
                            <li><i class="fas fa-check"></i> Custom Design</li>
                            <li><i class="fas fa-check"></i> Multiple Payment Gateways</li>
                            <li><i class="fas fa-check"></i> Multiple Shipping Partners</li>
                            <li><i class="fas fa-check"></i> Inventory Management</li>
                            <li><i class="fas fa-check"></i> Discount & Coupons</li>
                            <li><i class="fas fa-check"></i> Analytics Dashboard</li>
                            <li><i class="fas fa-check"></i> Email Marketing Setup</li>
                            <li><i class="fas fa-check"></i> 4 Months Support</li>
                            <li><i class="fas fa-check"></i> SEO Optimization</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise / Marketplace</h4>
                        <p>For large stores & multi-vendor</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">5,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Unlimited Products</li>
                            <li><i class="fas fa-check"></i> Custom Platform</li>
                            <li><i class="fas fa-check"></i> Multi-vendor Support</li>
                            <li><i class="fas fa-check"></i> Advanced Features</li>
                            <li><i class="fas fa-check"></i> ERP Integration</li>
                            <li><i class="fas fa-check"></i> Mobile App (iOS & Android)</li>
                            <li><i class="fas fa-check"></i> AI Recommendations</li>
                            <li><i class="fas fa-check"></i> Load Balancing</li>
                            <li><i class="fas fa-check"></i> 12 Months Support</li>
                            <li><i class="fas fa-check"></i> Dedicated Account Manager</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Final pricing depends on product count, features & customizations. Contact us for a detailed quote.</p>
        </div>
        
        <!-- Add-on Services -->
        <div class="addon-services mt-5" data-aos="fade-up">
            <div class="section-header text-center mb-4">
                <h4>Add-on Services</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="addon-card">
                        <span class="addon-name">Mobile App</span>
                        <span class="addon-price">₹1,50,000+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="addon-card">
                        <span class="addon-name">Multi-vendor Module</span>
                        <span class="addon-price">₹75,000+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="addon-card">
                        <span class="addon-name">ERP Integration</span>
                        <span class="addon-price">₹50,000+</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="addon-card">
                        <span class="addon-name">Annual Maintenance</span>
                        <span class="addon-price">₹30,000/yr</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>E-commerce Success Stories</h2>
            <p class="section-subtitle">See how we've helped businesses sell online</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9bQPcqDLGVLMv3ys9ch_K3FA6GDWwJZCyCw&s" alt="Fashion E-commerce Store" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Fashion</span>
                        <h4>Ethnic Wear Brand</h4>
                        <p>Custom Shopify store with 250% increase in online sales</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-chart-line"></i> 250% Sales Growth</span>
                            <span><i class="fas fa-shopping-cart"></i> 5K+ Orders/Month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://avada.io/wp-content/uploads/2023/12/electronics-ecommerce-websites-1.png" alt="Electronics E-commerce" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Electronics</span>
                        <h4>Gadget Marketplace</h4>
                        <p>Multi-vendor marketplace with 100+ sellers</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-store"></i> 100+ Vendors</span>
                            <span><i class="fas fa-rupee-sign"></i> ₹10Cr+ GMV</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjNfz3fGQBECbyNXItAbuDdaKNpxIwUCA0PQ&s" alt="Grocery E-commerce" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Grocery</span>
                        <h4>Online Grocery Store</h4>
                        <p>D2C grocery platform with same-day delivery</p>
                        <div class="portfolio-stats">
                            <span><i class="fas fa-users"></i> 50K+ Customers</span>
                            <span><i class="fas fa-truck"></i> 2Hr Delivery</span>
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
<section class="testimonials-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Testimonials</span>
            <h2>What Our E-commerce Clients Say</h2>
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
                    <p class="testimonial-text">"Our online sales went from ₹5 lakhs to ₹50 lakhs per month within 6 months of launching our new store. The team understood e-commerce inside out!"</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Rahul Mehta</h5>
                            <span>Founder, Fashion Brand</span>
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
                    <p class="testimonial-text">"They built our marketplace from scratch and it handled 50,000 orders during our first Diwali sale without any downtime. Exceptional work!"</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Priya Sharma</h5>
                            <span>CEO, Online Marketplace</span>
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
                    <p class="testimonial-text">"The cart abandonment solutions they implemented reduced our abandonment rate from 78% to 45%. That alone has generated lakhs in additional revenue."</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Amit Kumar</h5>
                            <span>Director, Electronics Store</span>
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
        page-slug="services/ecommerce-development"
        section-title="Frequently Asked Questions About Ecommerce Development Services"
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