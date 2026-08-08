<style>
    /* ===== NAVBAR STYLES ===== */
    .navbar {
        padding: 0.6rem 0;
        transition: all 0.3s ease;
        background: #ffffff;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
    }

    .navbar.scrolled {
        background: #ffffff !important;
        box-shadow: 0 4px 24px rgba(0,0,0,0.10) !important;
        padding: 0.4rem 0 !important;
    }

    .navbar-brand-icon {
        height: 55px !important;
        width: auto;
    }

    .navbar-nav .nav-link {
        color: #1e293b !important;
        font-weight: 600;
        font-size: 0.92rem;
        padding: 0.5rem 1rem;
        position: relative;
        transition: color 0.25s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #2563eb !important;
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #2563eb;
        transition: all 0.3s ease;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
        width: 70%;
    }

    /* Get Started button */
    .btn-get-started {
        background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
        color: #fff !important;
        border-radius: 50px !important;
        padding: 0.5rem 1.4rem !important;
        font-weight: 700 !important;
        margin-left: 8px;
        box-shadow: 0 4px 15px rgba(99,102,241,0.35);
        transition: all 0.3s ease !important;
    }

    .btn-get-started:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 25px rgba(99,102,241,0.5) !important;
        color: #fff !important;
    }

    .btn-get-started::after { display: none !important; }

    /* Mobile toggler */
    .navbar-toggler {
        border-color: rgba(30,41,59,0.2) !important;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2830, 41, 59, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    }

    /* Dropdown */
    .dropdown-menu {
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        border-radius: 12px;
    }
</style>


    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{ asset('storage/settings/logos/' . basename($settings->site_logo ?? '')) }}" alt="{{ $settings->site_name ?? 'ShivaTechDigital' }}" class="navbar-brand-icon" style="height:70px; width:auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">About</a></li>

                    <!-- Services Mega Menu -->
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('services') ? 'active' : '' }}" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu mega-menu" aria-labelledby="servicesDropdown">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 mega-menu-col">
                                        <div class="mega-menu-header">
                                            <i class="fas fa-laptop-code"></i>
                                            <h6>Development Services</h6>
                                        </div>
                                        <div class="mega-menu-items">
                                            <a class="dropdown-item" href="{{ route('services.web-development') }}">
                                                <i class="fas fa-globe"></i>
                                                <div>
                                                    <strong>Web Application</strong>
                                                    <span>Custom web solutions</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.mobile-app') }}">
                                                <i class="fas fa-mobile-alt"></i>
                                                <div>
                                                    <strong>Mobile Apps</strong>
                                                    <span>iOS & Android development</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.ui-ux') }}">
                                                <i class="fas fa-paint-brush"></i>
                                                <div>
                                                    <strong>UI/UX Design</strong>
                                                    <span>Beautiful user experiences</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.ecommerce') }}">
                                                <i class="fas fa-shopping-cart"></i>
                                                <div>
                                                    <strong>E-commerce</strong>
                                                    <span>Online store solutions</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mega-menu-col">
                                        <div class="mega-menu-header">
                                            <i class="fas fa-chart-line"></i>
                                            <h6>Digital Marketing</h6>
                                        </div>
                                        <div class="mega-menu-items">
                                            <a class="dropdown-item" href="{{ route('services.digital-marketing') }}">
                                                <i class="fas fa-bullhorn"></i>
                                                <div>
                                                    <strong>Digital Marketing</strong>
                                                    <span>Complete online marketing</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.seo') }}">
                                                <i class="fas fa-search"></i>
                                                <div>
                                                    <strong>SEO & SEM</strong>
                                                    <span>Search engine optimization</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.social-media') }}">
                                                <i class="fab fa-facebook"></i>
                                                <div>
                                                    <strong>Social Media</strong>
                                                    <span>Social media management</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.content') }}">
                                                <i class="fas fa-pen"></i>
                                                <div>
                                                    <strong>Content Marketing</strong>
                                                    <span>Engaging content creation</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mega-menu-col">
                                        <div class="mega-menu-header">
                                            <i class="fas fa-cogs"></i>
                                            <h6>Other Services</h6>
                                        </div>
                                        <div class="mega-menu-items">
                                            <a class="dropdown-item" href="{{ route('services.cloud') }}">
                                                <i class="fas fa-cloud"></i>
                                                <div>
                                                    <strong>Cloud Solutions</strong>
                                                    <span>Scalable cloud infrastructure</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.maintenance') }}">
                                                <i class="fas fa-tools"></i>
                                                <div>
                                                    <strong>Maintenance</strong>
                                                    <span>Ongoing support & updates</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('services.branding') }}">
                                                <i class="fas fa-palette"></i>
                                                <div>
                                                    <strong>Brand Strategy</strong>
                                                    <span>Brand identity & messaging</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mega-menu-cta">
                                            <a href="{{route('contact')}}" class="btn btn-primary btn-sm w-100">
                                                <i class="fas fa-paper-plane"></i> Get Started
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{route('portfolio')}}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn-get-started" href="{{route('contact')}}">Get Started</a></li>
                </ul>
            </div>
        </div>
    </nav>