@extends('website.pages.services.index')

{{-- 🔥 SEO SLUG - This loads meta from service_meta table --}}
@section('seo_slug', 'services/ui-ux-design')

@section('breadcrumb-title', 'UI/UX Design')
@section('service-category', 'Design Services')
@section('hero-title', 'Professional UI/UX Design Services')
@section('hero-description', 'Create digital experiences that captivate users and drive conversions. Our award-winning designers craft intuitive interfaces and seamless user journeys that transform how people interact with your brand.')
@section('service-name', 'UI/UX Design')
@section('service-name-lower', 'UI/UX design')

@section('trust-badge-1', '600+ Projects Designed')
@section('trust-badge-2', '40% Avg Conversion Lift')
@section('trust-badge-3', 'Award-Winning Team')

@section('hero-image')
<img src="{{ asset('web_assets/img/services/ui-ux-design-hero.svg') }}" alt="UI/UX Design Services - Shiva Tech Digital" class="img-fluid service-hero-img" loading="eager">
@endsection

@section('hero-stats')
<div class="stat-card">
    <h3>600+</h3>
    <p>Projects Designed</p>
</div>
<div class="stat-card">
    <h3>40%</h3>
    <p>Avg Conversion Lift</p>
</div>
<div class="stat-card">
    <h3>15+</h3>
    <p>Design Awards</p>
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
                    <h2>User-Centered Design That Drives Business Results</h2>
                    <p class="lead">At Shiva Tech Digital, we believe great design is invisible – users don't notice it, they just enjoy effortless experiences that help them achieve their goals.</p>
                    <p>With over 600 successful projects and a passion for pixel-perfect design, our team of UI/UX experts combines creativity with data-driven insights to create interfaces that look stunning and perform exceptionally. We don't just make things pretty – we solve problems and create value.</p>
                    
                    <div class="overview-highlights">
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Research-Driven Design</h5>
                                <p>Every design decision backed by user research</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Conversion Focused</h5>
                                <p>Design that drives measurable business results</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Pixel-Perfect Execution</h5>
                                <p>Meticulous attention to every design detail</p>
                            </div>
                        </div>
                        <div class="highlight-item">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h5>Design Systems</h5>
                                <p>Scalable, consistent design across all touchpoints</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="overview-image-wrapper">
                    <img src="{{ asset('web_assets/img/services/ui-ux-design-overview.jpg') }}" alt="UI/UX Design Process" class="img-fluid rounded-lg shadow-lg" loading="lazy">
                    <div class="experience-badge">
                        <span class="years">600+</span>
                        <span class="text">Projects Delivered</span>
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
            <h2>Our UI/UX Design Services</h2>
            <p class="section-subtitle">End-to-end design solutions for digital products</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>User Research & Analysis</h4>
                    <p>Deep dive into user behavior, needs, and pain points to inform design decisions with real data.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> User Interviews</li>
                        <li><i class="fas fa-check"></i> Surveys & Questionnaires</li>
                        <li><i class="fas fa-check"></i> Competitor Analysis</li>
                        <li><i class="fas fa-check"></i> User Persona Creation</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <h4>Information Architecture</h4>
                    <p>Organize content and features in intuitive structures that make navigation effortless.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Site Mapping</li>
                        <li><i class="fas fa-check"></i> User Flow Design</li>
                        <li><i class="fas fa-check"></i> Content Strategy</li>
                        <li><i class="fas fa-check"></i> Navigation Design</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-pencil-ruler"></i>
                    </div>
                    <h4>Wireframing & Prototyping</h4>
                    <p>Transform ideas into tangible, testable prototypes before investing in development.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Low-Fidelity Wireframes</li>
                        <li><i class="fas fa-check"></i> High-Fidelity Wireframes</li>
                        <li><i class="fas fa-check"></i> Interactive Prototypes</li>
                        <li><i class="fas fa-check"></i> Clickable Mockups</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h4>User Interface Design</h4>
                    <p>Beautiful, modern UI designs that reflect your brand and delight your users.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Visual Design</li>
                        <li><i class="fas fa-check"></i> Icon & Illustration Design</li>
                        <li><i class="fas fa-check"></i> Responsive Design</li>
                        <li><i class="fas fa-check"></i> Motion Design</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Mobile App Design</h4>
                    <p>Native iOS and Android app designs that follow platform guidelines and best practices.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> iOS App Design</li>
                        <li><i class="fas fa-check"></i> Android App Design</li>
                        <li><i class="fas fa-check"></i> Cross-Platform Design</li>
                        <li><i class="fas fa-check"></i> App Icon Design</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-offered-card">
                    <div class="service-icon-wrapper">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h4>Design Systems</h4>
                    <p>Scalable design systems and component libraries for consistent brand experiences.</p>
                    <ul class="service-features-list">
                        <li><i class="fas fa-check"></i> Component Library</li>
                        <li><i class="fas fa-check"></i> Style Guide</li>
                        <li><i class="fas fa-check"></i> Design Tokens</li>
                        <li><i class="fas fa-check"></i> Documentation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Design Process Section -->
<section class="design-process-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Approach</span>
            <h2>Design Thinking Process</h2>
            <p class="section-subtitle">A proven methodology for creating exceptional user experiences</p>
        </div>
        <div class="design-process-wrapper" data-aos="fade-up">
            <div class="process-timeline">
                <div class="process-item">
                    <div class="process-icon empathize">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="process-content">
                        <h4>Empathize</h4>
                        <p>Understand users through research, interviews, and observation to identify their needs and pain points.</p>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-item">
                    <div class="process-icon define">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="process-content">
                        <h4>Define</h4>
                        <p>Analyze insights to define clear problem statements and design goals that address user needs.</p>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-item">
                    <div class="process-icon ideate">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="process-content">
                        <h4>Ideate</h4>
                        <p>Brainstorm creative solutions, explore possibilities, and generate innovative design concepts.</p>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-item">
                    <div class="process-icon prototype">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="process-content">
                        <h4>Prototype</h4>
                        <p>Create interactive prototypes to visualize solutions and test ideas before development.</p>
                    </div>
                </div>
                <div class="process-connector"></div>
                <div class="process-item">
                    <div class="process-icon test">
                        <i class="fas fa-vial"></i>
                    </div>
                    <div class="process-content">
                        <h4>Test</h4>
                        <p>Validate designs with real users, gather feedback, and iterate for optimal results.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Design Section -->
<section class="what-we-design py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Expertise</span>
            <h2>What We Design</h2>
            <p class="section-subtitle">UI/UX design across all digital touchpoints</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h5>Websites</h5>
                    <p>Corporate, E-commerce, Landing Pages</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h5>Mobile Apps</h5>
                    <p>iOS, Android, Cross-Platform</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h5>Web Applications</h5>
                    <p>SaaS, Dashboards, Portals</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h5>E-commerce</h5>
                    <p>Online Stores, Marketplaces</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h5>Dashboards</h5>
                    <p>Analytics, Admin Panels, CRM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-watch"></i>
                    </div>
                    <h5>Wearables</h5>
                    <p>Smartwatch, Fitness Apps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <h5>TV Apps</h5>
                    <p>Smart TV, Streaming Apps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-delay="450">
                <div class="design-type-card">
                    <div class="design-icon">
                        <i class="fas fa-vr-cardboard"></i>
                    </div>
                    <h5>AR/VR</h5>
                    <p>Immersive Experiences</p>
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
                    <h2>Why Invest in Professional UI/UX Design?</h2>
                    <p>Great design isn't an expense – it's an investment with measurable ROI</p>
                </div>
                <div class="benefit-stats mt-4">
                    <div class="stat-item">
                        <span class="stat-number">200%</span>
                        <span class="stat-text">Average ROI on UX Investment</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">88%</span>
                        <span class="stat-text">Users won't return after bad UX</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50%</span>
                        <span class="stat-text">Development time saved with proper design</span>
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
                            <h5>Increased Conversions</h5>
                            <p>Well-designed interfaces convert up to 400% better than poor ones</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Higher User Satisfaction</h5>
                            <p>Intuitive designs reduce frustration and increase loyalty</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Reduced Development Costs</h5>
                            <p>Fixing issues in design is 100x cheaper than in code</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Competitive Advantage</h5>
                            <p>Stand out in crowded markets with superior user experience</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Lower Support Costs</h5>
                            <p>Intuitive interfaces mean fewer support tickets</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="benefit-content">
                            <h5>Better User Retention</h5>
                            <p>Users stay longer and engage more with great UX</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Design Principles Section -->
<section class="design-principles py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Philosophy</span>
            <h2>Design Principles We Follow</h2>
            <p class="section-subtitle">Core principles that guide every design decision</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="principle-card">
                    <div class="principle-number">01</div>
                    <h4>User-Centered</h4>
                    <p>Every design decision starts and ends with the user. We design for real people, not personas on paper.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="principle-card">
                    <div class="principle-number">02</div>
                    <h4>Simplicity</h4>
                    <p>Less is more. We remove complexity and focus on what truly matters for users to achieve their goals.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="principle-card">
                    <div class="principle-number">03</div>
                    <h4>Consistency</h4>
                    <p>Consistent patterns and behaviors reduce cognitive load and make interfaces predictable and learnable.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="principle-card">
                    <div class="principle-number">04</div>
                    <h4>Accessibility</h4>
                    <p>Design for everyone. We ensure our designs are usable by people of all abilities and contexts.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="principle-card">
                    <div class="principle-number">05</div>
                    <h4>Data-Informed</h4>
                    <p>We combine creativity with data. Analytics and user testing validate our design hypotheses.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="principle-card">
                    <div class="principle-number">06</div>
                    <h4>Delightful</h4>
                    <p>Beyond usability, we create moments of delight through micro-interactions, animations, and polish.</p>
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
            <h2>Industries We've Designed For</h2>
            <p class="section-subtitle">Deep expertise across diverse sectors</p>
        </div>
        <div class="industries-grid" data-aos="fade-up">
            <div class="industry-item">
                <i class="fas fa-shopping-bag"></i>
                <span>E-commerce & Retail</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-university"></i>
                <span>FinTech & Banking</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-heartbeat"></i>
                <span>Healthcare</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-graduation-cap"></i>
                <span>Education</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-plane"></i>
                <span>Travel & Hospitality</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-home"></i>
                <span>Real Estate</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-utensils"></i>
                <span>Food & Restaurant</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-car"></i>
                <span>Automotive</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-dumbbell"></i>
                <span>Fitness & Wellness</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-gamepad"></i>
                <span>Gaming & Entertainment</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-building"></i>
                <span>Enterprise & B2B</span>
            </div>
            <div class="industry-item">
                <i class="fas fa-rocket"></i>
                <span>Startups & SaaS</span>
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
        <p>15+ design awards including Awwwards, CSS Design Awards, and more</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-users"></i>
        </div>
        <h4>User-First Approach</h4>
        <p>Every design is backed by user research and usability testing</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-handshake"></i>
        </div>
        <h4>Collaborative Process</h4>
        <p>We work as an extension of your team with complete transparency</p>
    </div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
    <div class="why-choose-card">
        <div class="icon-box">
            <i class="fas fa-code"></i>
        </div>
        <h4>Dev-Ready Designs</h4>
        <p>Pixel-perfect designs with proper specs for seamless development</p>
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
            <p>Understanding your business, users, and goals</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
        <div class="process-step">
            <div class="step-number">02</div>
            <div class="step-icon"><i class="fas fa-search"></i></div>
            <h4>Research</h4>
            <p>User research and competitive analysis</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
        <div class="process-step">
            <div class="step-number">03</div>
            <div class="step-icon"><i class="fas fa-pencil-alt"></i></div>
            <h4>Wireframe</h4>
            <p>Structure and layout planning</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="400">
        <div class="process-step">
            <div class="step-number">04</div>
            <div class="step-icon"><i class="fas fa-palette"></i></div>
            <h4>Design</h4>
            <p>Visual design and UI creation</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="500">
        <div class="process-step">
            <div class="step-number">05</div>
            <div class="step-icon"><i class="fas fa-mouse-pointer"></i></div>
            <h4>Prototype</h4>
            <p>Interactive prototypes for testing</p>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="600">
        <div class="process-step">
            <div class="step-number">06</div>
            <div class="step-icon"><i class="fas fa-file-export"></i></div>
            <h4>Handoff</h4>
            <p>Developer handoff with specs</p>
        </div>
    </div>
</div>
@endsection

@section('technologies-section')
<section class="technologies-section py-5 bg-light">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-badge">Our Tools</span>
            <h2>Design Tools We Use</h2>
            <p class="section-subtitle">Industry-leading tools for exceptional design output</p>
        </div>
        <div class="tech-categories">
            <div class="tech-category" data-aos="fade-up" data-aos-delay="100">
                <h5>UI Design</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/figma.svg') }}" alt="Figma">
                        <span>Figma</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/sketch.svg') }}" alt="Sketch">
                        <span>Sketch</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/adobe-xd.svg') }}" alt="Adobe XD">
                        <span>Adobe XD</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/photoshop.svg') }}" alt="Photoshop">
                        <span>Photoshop</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="200">
                <h5>Prototyping</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/figma.svg') }}" alt="Figma Prototyping">
                        <span>Figma</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/invision.svg') }}" alt="InVision">
                        <span>InVision</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/principle.svg') }}" alt="Principle">
                        <span>Principle</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/protopie.svg') }}" alt="ProtoPie">
                        <span>ProtoPie</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="300">
                <h5>Illustration & Graphics</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/illustrator.svg') }}" alt="Illustrator">
                        <span>Illustrator</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/after-effects.svg') }}" alt="After Effects">
                        <span>After Effects</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/lottie.svg') }}" alt="Lottie">
                        <span>Lottie</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/blender.svg') }}" alt="Blender">
                        <span>Blender</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="400">
                <h5>Collaboration & Handoff</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/zeplin.svg') }}" alt="Zeplin">
                        <span>Zeplin</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/abstract.svg') }}" alt="Abstract">
                        <span>Abstract</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/miro.svg') }}" alt="Miro">
                        <span>Miro</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/notion.svg') }}" alt="Notion">
                        <span>Notion</span>
                    </div>
                </div>
            </div>
            <div class="tech-category" data-aos="fade-up" data-aos-delay="500">
                <h5>User Research & Testing</h5>
                <div class="tech-items">
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/hotjar.svg') }}" alt="Hotjar">
                        <span>Hotjar</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/usertesting.svg') }}" alt="UserTesting">
                        <span>UserTesting</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/maze.svg') }}" alt="Maze">
                        <span>Maze</span>
                    </div>
                    <div class="tech-item">
                        <img src="{{ asset('web_assets/img/tech/lookback.svg') }}" alt="Lookback">
                        <span>Lookback</span>
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
            <h2>UI/UX Design Packages</h2>
            <p class="section-subtitle">Flexible pricing options for every project size</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Starter</h4>
                        <p>Perfect for landing pages & small projects</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">35,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 5 Screens/Pages</li>
                            <li><i class="fas fa-check"></i> Wireframes</li>
                            <li><i class="fas fa-check"></i> UI Design</li>
                            <li><i class="fas fa-check"></i> Mobile Responsive</li>
                            <li><i class="fas fa-check"></i> 2 Design Revisions</li>
                            <li><i class="fas fa-check"></i> Figma Source Files</li>
                            <li><i class="fas fa-times text-muted"></i> User Research</li>
                            <li><i class="fas fa-times text-muted"></i> Interactive Prototype</li>
                            <li><i class="fas fa-times text-muted"></i> Design System</li>
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
                        <p>For websites & mobile apps</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">1,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Up to 20 Screens/Pages</li>
                            <li><i class="fas fa-check"></i> User Research</li>
                            <li><i class="fas fa-check"></i> Wireframes</li>
                            <li><i class="fas fa-check"></i> UI Design</li>
                            <li><i class="fas fa-check"></i> Interactive Prototype</li>
                            <li><i class="fas fa-check"></i> Mobile + Desktop</li>
                            <li><i class="fas fa-check"></i> 4 Design Revisions</li>
                            <li><i class="fas fa-check"></i> Developer Handoff</li>
                            <li><i class="fas fa-check"></i> Basic Style Guide</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Get Started</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Enterprise</h4>
                        <p>For complex products & platforms</p>
                        <div class="price">
                            <span class="currency">₹</span>
                            <span class="amount">3,00,000</span>
                            <span class="period">Starting</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Unlimited Screens</li>
                            <li><i class="fas fa-check"></i> In-depth User Research</li>
                            <li><i class="fas fa-check"></i> User Journey Mapping</li>
                            <li><i class="fas fa-check"></i> Complete Design System</li>
                            <li><i class="fas fa-check"></i> Advanced Prototypes</li>
                            <li><i class="fas fa-check"></i> Usability Testing</li>
                            <li><i class="fas fa-check"></i> Unlimited Revisions</li>
                            <li><i class="fas fa-check"></i> Motion Design</li>
                            <li><i class="fas fa-check"></i> Dedicated Designer</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-pricing">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4" data-aos="fade-up">
            <p class="text-muted">* Prices are indicative. Final pricing depends on project scope and complexity. Contact us for a custom quote.</p>
        </div>
        
        <!-- Hourly Rates -->
        <div class="hourly-rates mt-5" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="hourly-card">
                        <h4><i class="fas fa-clock"></i> Need Flexible Engagement?</h4>
                        <p>We also offer hourly and dedicated designer models</p>
                        <div class="rate-options">
                            <div class="rate-item">
                                <span class="rate-type">Hourly Rate</span>
                                <span class="rate-price">₹2,500 - ₹4,000/hr</span>
                            </div>
                            <div class="rate-item">
                                <span class="rate-type">Dedicated Designer</span>
                                <span class="rate-price">₹80,000 - ₹1,50,000/month</span>
                            </div>
                        </div>
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
            <h2>UI/UX Design Projects</h2>
            <p class="section-subtitle">A glimpse of our recent design work</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/uiux-project-1.jpg') }}" alt="E-commerce App UI/UX Design" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Mobile App Design</span>
                        <h4>Fashion E-commerce App</h4>
                        <p>Complete app redesign resulting in 65% increase in conversions</p>
                        <div class="portfolio-tech">
                            <span>Figma</span>
                            <span>Prototyping</span>
                            <span>iOS & Android</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/uiux-project-2.jpg') }}" alt="SaaS Dashboard UI Design" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">Dashboard Design</span>
                        <h4>Analytics SaaS Platform</h4>
                        <p>Complex data visualization made simple and intuitive</p>
                        <div class="portfolio-tech">
                            <span>Design System</span>
                            <span>Data Viz</span>
                            <span>Dark Mode</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ asset('web_assets/img/portfolio/uiux-project-3.jpg') }}" alt="FinTech App UI/UX Design" loading="lazy">
                        <div class="portfolio-overlay">
                            <a href="{{ route('portfolio') }}" class="btn-view">View Project</a>
                        </div>
                    </div>
                    <div class="portfolio-content">
                        <span class="portfolio-category">FinTech Design</span>
                        <h4>Digital Banking App</h4>
                        <p>Award-winning design for a leading digital bank</p>
                        <div class="portfolio-tech">
                            <span>User Research</span>
                            <span>Motion Design</span>
                            <span>Accessibility</span>
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
            <p class="section-subtitle">Hear from businesses who transformed with our designs</p>
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
                    <p class="testimonial-text">"The redesign of our app was transformative. User engagement increased by 80% and our app store rating jumped from 3.2 to 4.7 stars. Incredible attention to detail!"</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-4.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Sneha Reddy</h5>
                            <span>Product Manager, TechStartup</span>
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
                    <p class="testimonial-text">"Their design system saved us months of development time. Every component was perfectly documented and the handoff to our dev team was seamless. Highly professional!"</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-5.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Vikram Singh</h5>
                            <span>CTO, Enterprise Solutions</span>
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
                    <p class="testimonial-text">"The user research they conducted revealed insights we never knew about our customers. The new design based on real data has doubled our conversion rate."</p>
                    <div class="testimonial-author">
                        <img src="{{ asset('web_assets/img/testimonials/client-6.jpg') }}" alt="Client">
                        <div class="author-info">
                            <h5>Ananya Gupta</h5>
                            <span>Founder, E-commerce Brand</span>
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
        page-slug="services/ui-ux-design"
        section-title="Frequently Asked Questions About UI/UX Design Services"
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