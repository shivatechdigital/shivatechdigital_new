@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/mobile-app-development')

@section('breadcrumb-title', 'Mobile App Development')
@section('service-category', 'Development Services')
@section('hero-title', 'Professional Mobile App Development Services')
@section('hero-description', 'Transform your ideas into powerful mobile applications. We design and develop custom iOS, Android, and cross-platform apps that engage users and drive business growth. From startups to enterprises, we deliver mobile excellence.')
@section('service-name', 'Mobile App Development')
@section('service-name-lower', 'mobile app development')

@section('trust-badge-1', '350+ Apps Delivered')
@section('trust-badge-2', '4.8★ Avg App Rating')
@section('trust-badge-3', '50M+ Downloads')

@section('hero-image')
<img src="https://square-root.co.uk/wp-content/themes/squareroot/assets/img/hire-mobile-app/hire-mobile-app-hero.webp" alt="Mobile App Development Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>350+</h3>
    <p>Apps Developed</p>
</div>
<div class="stat-card">
    <h3>50M+</h3>
    <p>App Downloads</p>
</div>
<div class="stat-card">
    <h3>4.8★</h3>
    <p>Avg Rating</p>
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
                    <h2>Custom Mobile App Development Solutions That Users Love</h2>
                    <p class="lead">At Shiva Tech Digital, we craft mobile experiences that captivate users and deliver real business value. Our apps don't just work – they delight.</p>
                    <p>With over 8 years of experience and 350+ apps successfully launched on App Store and Google Play, our team of expert mobile developers, UI/UX designers, and strategists collaborate to build applications that stand out in the crowded app marketplace.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Native & Cross-Platform</h5>
                                <p>iOS, Android, and cross-platform expertise</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>User-Centric Design</h5>
                                <p>Intuitive UX with stunning UI designs</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>High Performance</h5>
                                <p>Optimized for speed and battery efficiency</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Secure & Scalable</h5>
                                <p>Enterprise-grade security and cloud integration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="{{ asset('web_assets/img/services/mobile-app-development-overview.jpg') }}" alt="Custom Mobile App Development Services" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">350+</span>
                        <span class="text">Apps Launched</span>
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
            <h2>Our Mobile App Development Services</h2>
            <p class="section-subtitle">End-to-end mobile solutions for every platform</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-apple"></i>
                    </div>
                    <h4>iOS App Development</h4>
                    <p>Native iOS applications built with Swift and Objective-C for iPhone, iPad, and Apple Watch.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> iPhone Apps</li>
                        <li><i class="fas fa-check"></i> iPad Apps</li>
                        <li><i class="fas fa-check"></i> Apple Watch Apps</li>
                        <li><i class="fas fa-check"></i> App Store Optimization</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fab fa-android"></i>
                    </div>
                    <h4>Android App Development</h4>
                    <p>Native Android applications using Kotlin and Java for smartphones, tablets, and wearables.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Phone Apps</li>
                        <li><i class="fas fa-check"></i> Tablet Apps</li>
                        <li><i class="fas fa-check"></i> Wear OS Apps</li>
                        <li><i class="fas fa-check"></i> Android TV Apps</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Cross-Platform Development</h4>
                    <p>Build once, deploy everywhere with React Native and Flutter for cost-effective app development.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> React Native Apps</li>
                        <li><i class="fas fa-check"></i> Flutter Apps</li>
                        <li><i class="fas fa-check"></i> Single Codebase</li>
                        <li><i class="fas fa-check"></i> Native Performance</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>UI/UX Design for Apps</h4>
                    <p>Beautiful, intuitive app designs that keep users engaged and drive higher retention rates.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> User Research</li>
                        <li><i class="fas fa-check"></i> Wireframing</li>
                        <li><i class="fas fa-check"></i> Prototyping</li>
                        <li><i class="fas fa-check"></i> UI Design</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Enterprise Mobile Solutions</h4>
                    <p>Secure, scalable enterprise apps for workforce management, field operations, and business processes.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Enterprise Apps</li>
                        <li><i class="fas fa-check"></i> EMM Integration</li>
                        <li><i class="fas fa-check"></i> SSO & Security</li>
                        <li><i class="fas fa-check"></i> Offline Mode</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>App Maintenance & Support</h4>
                    <p>Ongoing support, updates, and optimization to keep your app running smoothly and up-to-date.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Bug Fixes</li>
                        <li><i class="fas fa-check"></i> OS Updates</li>
                        <li><i class="fas fa-check"></i> Performance Optimization</li>
                        <li><i class="fas fa-check"></i> Feature Enhancements</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- App Types Section -->
<section class="app-types-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Industries</span>
            <h2>Types of Apps We Develop</h2>
            <p class="section-subtitle">Expertise across diverse industries and app categories</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h5>E-commerce Apps</h5>
                    <p>Online stores, marketplaces, m-commerce</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h5>Food Delivery Apps</h5>
                    <p>Restaurant, delivery, ordering apps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h5>Healthcare Apps</h5>
                    <p>Telemedicine, fitness, wellness</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h5>Education Apps</h5>
                    <p>E-learning, LMS, EdTech</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h5>FinTech Apps</h5>
                    <p>Banking, payments, trading</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-taxi"></i>
                    </div>
                    <h5>On-Demand Apps</h5>
                    <p>Taxi, services, booking</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h5>Social Media Apps</h5>
                    <p>Networking, chat, community</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="app-type-card">
                    <div class="app-type-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <h5>Gaming Apps</h5>
                    <p>Casual, puzzle, multiplayer</p>
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
                    <h2>Why Invest in Mobile App Development?</h2>
                    <p>Mobile apps are no longer a luxury – they're a business necessity</p>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Direct Customer Access</h5>
                            <p>Reach customers anytime with push notifications and personalized content</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Increased Revenue</h5>
                            <p>In-app purchases, subscriptions, and mobile commerce opportunities</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Enhanced Customer Loyalty</h5>
                            <p>Build lasting relationships with loyalty programs and personalization</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Improved Efficiency</h5>
                            <p>Streamline operations with mobile solutions for your team</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Competitive Advantage</h5>
                            <p>Stand out from competitors with a superior mobile experience</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-analytics"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Valuable Insights</h5>
                            <p>Gain deep analytics on user behavior and preferences</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="app-features-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Features</span>
            <h2>Advanced Features We Implement</h2>
            <p class="section-subtitle">Cutting-edge functionality for modern mobile apps</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <i class="fas fa-bell"></i>
                    <h5>Push Notifications</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="feature-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h5>GPS & Geolocation</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <i class="fas fa-credit-card"></i>
                    <h5>Payment Integration</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="feature-card">
                    <i class="fas fa-camera"></i>
                    <h5>Camera & AR</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <i class="fas fa-fingerprint"></i>
                    <h5>Biometric Auth</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="feature-card">
                    <i class="fas fa-wifi-slash"></i>
                    <h5>Offline Mode</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <i class="fas fa-comments"></i>
                    <h5>Real-time Chat</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="feature-card">
                    <i class="fas fa-share-alt"></i>
                    <h5>Social Integration</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
                <div class="feature-card">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <h5>Cloud Sync</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="550">
                <div class="feature-card">
                    <i class="fas fa-brain"></i>
                    <h5>AI & ML Integration</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
                <div class="feature-card">
                    <i class="fas fa-video"></i>
                    <h5>Video Calling</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="650">
                <div class="feature-card">
                    <i class="fas fa-chart-bar"></i>
                    <h5>Analytics Dashboard</h5>
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
            <i class="fas fa-mobile-alt"></i>
        </div>
        <h4>350+ Apps Launched</h4>
        <p>Proven track record with apps across App Store and Google Play</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-star"></i>
        </div>
        <h4>4.8★ Average Rating</h4>
        <p>Our apps consistently receive high ratings and positive reviews</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-users-cog"></i>
        </div>
        <h4>Expert Team</h4>
        <p>Certified developers with expertise in iOS, Android, and cross-platform</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-rocket"></i>
        </div>
        <h4>End-to-End Service</h4>
        <p>From idea to launch and beyond - complete app development lifecycle</p>
    </div>
</div>
@endsection

@section('process-steps')
<div class="row">
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
        <div class="process-step">
            <div class="step-number">01</div>
            <div class="step-icon"><i class="fas fa-lightbulb"></i></div>
            <h4>Ideation</h4>
            <p>Requirements gathering and feasibility analysis</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-pencil-ruler"></i></div>
            <h4>UI/UX Design</h4>
            <p>Wireframes, prototypes, and stunning UI</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-code"></i></div>
            <h4>Development</h4>
            <p>Agile development with regular sprints</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-vial"></i></div>
            <h4>Testing</h4>
            <p>Rigorous QA and device testing</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-rocket"></i></div>
            <h4>Launch</h4>
            <p>App Store and Play Store submission</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-sync"></i></div>
            <h4>Support</h4>
            <p>Ongoing maintenance and updates</p>
        </div>
    </div>
</div>
@endsection

@section('technologies-section')
<section class="technologies-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Tech Stack</span>
            <h2>Technologies We Use</h2>
            <p class="section-subtitle">Modern frameworks and tools for powerful mobile apps</p>
        </div>
        <div class="tech-categories">
            <div class="tech-category" data-aos="fade-up" data-aos-delay="100">
                <h5>iOS Development</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://developer.apple.com/swift/images/screen-macos26-xcode_2x.jpg" alt="Swift Development">
                        <span>Swift</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://developer.apple.com/assets/elements/icons/swiftui/swiftui-256x256_2x.png" alt="SwiftUI Development">
                        <span>SwiftUI</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20240305155842/What-Is-Objective-C-(Definition-Uses-vs-Swift).webp" alt="Objective-C Development">
                        <span>Objective-C</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://developer.apple.com/xcode/images/screen-xcode-s-light-large_2x.jpg?1" alt="Xcode IDE">
                        <span>Xcode</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="200">
                <h5>Android Development</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://cdn-cjmik.nitrocdn.com/UjszoEMIGzQLBmRYICliaPmdTnvQlovN/assets/images/optimized/rev-8428f05/www.aalpha.net/wp-content/uploads/2018/12/kotlin-development-india.png" alt="Kotlin Development">
                        <span>Kotlin</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190911190208/How-to-Become-A-Successful-Java-Developer.png" alt="Java Development">
                        <span>Java</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDZduY8u3BI2p6YBgErN5-9BCizRJ9JVbtoA&s" alt="Jetpack Compose">
                        <span>Jetpack Compose</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoHDmKIWhBh37ZCg2j76jt5hjOD_R4GyInNQ&s" alt="Android Studio">
                        <span>Android Studio</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="300">
                <h5>Cross-Platform</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_Tcoj-dnxcgrX0GwJeyWyXpMNPwbSbG5RgQ&s" alt="React Native Development">
                        <span>React Native</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQReLiDcs1kaymXAmIelYeOaKtSQ4FD67IqZA&s" alt="Flutter Development">
                        <span>Flutter</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20240319135223/Introduction-to-Dart_-Installation-of-Dart_etc--13.webp" alt="Dart Language">
                        <span>Dart</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://miro.medium.com/1*kepX0EHTbLc6O9mRKsierg.png" alt="Expo Framework">
                        <span>Expo</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="400">
                <h5>Backend & Cloud</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://flowygo.com/wp-content/uploads/2023/04/Firebase_Logo.png" alt="Firebase">
                        <span>Firebase</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://flowygo.com/wp-content/uploads/2023/04/Firebase_Logo.png" alt="Node.js">
                        <span>Node.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://flowygo.com/wp-content/uploads/2023/04/Firebase_Logo.png" alt="AWS">
                        <span>AWS</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTF9mWMa0kSGfRq3dVLCQj60PXQQMgaU3XVqQ&s" alt="GraphQL">
                        <span>GraphQL</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="500">
                <h5>Database</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="https://miro.medium.com/0*QABc7Qb2ZYGzunoo.jpg" alt="Realm Database">
                        <span>Realm</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFEg8iNYGbErRLzMFdAzdhzgIJGWk9ItYb8Q&s" alt="SQLite Database">
                        <span>SQLite</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://toppng.com/uploads/preview/mongodb-logo-11609369386lqoc6r2ga9.png" alt="MongoDB">
                        <span>MongoDB</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://toppng.com/uploads/preview/postgresql-transparent-11549831769mskagmdcwn.png" alt="PostgreSQL">
                        <span>PostgreSQL</span>
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
            <h2>Mobile App Development Packages</h2>
            <p class="section-subtitle">Flexible pricing for every budget and requirement</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>MVP / Starter</h4>
                        <p>Perfect for startups & MVPs</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,50,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Single Platform (iOS or Android)</li>
                            <li><i class="fas fa-check"></i> Up to 8 Screens</li>
                            <li><i class="fas fa-check"></i> Basic UI/UX Design</li>
                            <li><i class="fas fa-check"></i> User Authentication</li>
                            <li><i class="fas fa-check"></i> Push Notifications</li>
                            <li><i class="fas fa-check"></i> API Integration (Basic)</li>
                            <li><i class="fas fa-check"></i> App Store Submission</li>
                            <li><i class="fas fa-check"></i> 2 Months Support</li>
                            <li><i class="fas fa-times text-muted"></i> Admin Panel</li>
                            <li><i class="fas fa-times text-muted"></i> Advanced Features</li>
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
                            <span class="amount">4,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> iOS & Android Apps</li>
                            <li><i class="fas fa-check"></i> Up to 20 Screens</li>
                            <li><i class="fas fa-check"></i> Custom UI/UX Design</li>
                            <li><i class="fas fa-check"></i> Social Login</li>
                            <li><i class="fas fa-check"></i> Payment Integration</li>
                            <li><i class="fas fa-check"></i> Admin Dashboard</li>
                            <li><i class="fas fa-check"></i> Analytics Integration</li>
                            <li><i class="fas fa-check"></i> Backend Development</li>
                            <li><i class="fas fa-check"></i> 4 Months Support</li>
                            <li><i class="fas fa-check"></i> Source Code</li>
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
                            <span class="amount">10,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> iOS, Android & Web</li>
                            <li><i class="fas fa-check"></i> Unlimited Screens</li>
                            <li><i class="fas fa-check"></i> Premium UI/UX Design</li>
                            <li><i class="fas fa-check"></i> Advanced Security</li>
                            <li><i class="fas fa-check"></i> Real-time Features</li>
                            <li><i class="fas fa-check"></i> AI/ML Integration</li>
                            <li><i class="fas fa-check"></i> Third-party Integrations</li>
                            <li><i class="fas fa-check"></i> Scalable Architecture</li>
                            <li><i class="fas fa-check"></i> 12 Months Support</li>
                            <li><i class="fas fa-check"></i> Dedicated Team</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Final cost depends on app complexity, features, and platforms. Contact us for a detailed quote.</p>
        </div>
    </div>
</section>
@endsection

@section('case-studies-section')
<section class="case-studies-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Portfolio</span>
            <h2>Mobile App Projects</h2>
            <p class="section-subtitle">Some of our recent mobile app development work</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkBsCHksy1nQSGApMcVOTVEIdaB2zku_c1Sw&s" alt="E-commerce Mobile App Development" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">E-commerce</span>
                        <h4>Fashion Shopping App</h4>
                        <p>iOS & Android app with 100K+ downloads and 4.8★ rating</p>
                        <div class="portfolio-tech">
                            <span>React Native</span>
                            <span>Node.js</span>
                            <span>MongoDB</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3SqrLC2ROIAeK5zngw95ewJCzZU5rchsy9A&s" alt="Food Delivery App Development" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Food Delivery</span>
                        <h4>Food Ordering & Delivery App</h4>
                        <p>Complete food delivery solution with real-time tracking</p>
                        <div class="portfolio-tech">
                            <span>Flutter</span>
                            <span>Firebase</span>
                            <span>Google Maps</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSC-Rv1MJZeP8AJphwwiqj7-ehY_Yza3TBCCg&s" alt="Healthcare Mobile App Development" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Healthcare</span>
                        <h4>Telemedicine App</h4>
                        <p>Video consultation, prescription & appointment booking</p>
                        <div class="portfolio-tech">
                            <span>Swift</span>
                            <span>Kotlin</span>
                            <span>WebRTC</span>
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
            <h2>What Our Clients Say</h2>
            <p class="section-subtitle">Hear from businesses who transformed with our mobile apps</p>
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
                    <p class="testimonial-text">"Shiva Tech Digital delivered our e-commerce app ahead of schedule. The app has already generated 50% of our total sales. Highly recommend their mobile development services!"</p>
                    <div class="testimonial-author">
                        <img src="https://media.licdn.com/dms/image/v2/D4D03AQG9fpTG4Nxzkw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1673247965564?e=2147483647&v=beta&t=ioB8zwuFeJXSEzHYJHiAxVKoFJfhyKvdu2iViwyq_0A" alt="Client">
                        <div class="author-info">
                            <h5>Priya Sharma</h5>
                            <span>CEO, Fashion Store</span>
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
                    <p class="testimonial-text">"The team built a complex healthcare app with video calling and prescription features. Their attention to security and compliance was exceptional. Great experience!"</p>
                    <div class="testimonial-author">
                        <img src="https://assets.myntassets.com/dpr_1.5,q_30,w_400,c_limit,fl_progressive/assets/images/16698514/2024/9/4/78f2ea5c-04c5-4fac-a4f5-65834f7998f11725452488510-Peter-England-Men-Black-Solid-Slim-Fit-Single-Breasted-Blaze-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Dr. Rajesh Kumar</h5>
                            <span>Founder, HealthCare Plus</span>
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
                    <p class="testimonial-text">"We needed both iOS and Android apps on a tight budget. Their React Native solution saved us 40% in development costs while delivering native-like performance."</p>
                    <div class="testimonial-author">
                        <img src="https://pharmanovia.com/wp-content/uploads/2023/01/amit-patel-1.jpg" alt="Client">
                        <div class="author-info">
                            <h5>Amit Patel</h5>
                            <span>CTO, StartupX</span>
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
        page-slug="services/mobile-app-development"
        section-title="Frequently Asked Questions About Mobile App Development Services"
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