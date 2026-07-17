<style>
    .navbar-nav .nav-link {
        justify-content: center;
        align-items: center;
    }
</style>


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
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