<style>
/* ================================================
   NAVBAR - COMPLETE REDESIGN
   Two-tier: Top bar + Main nav with mega menu
================================================ */

/* ---- TOP BAR ---- */
.topbar { background: linear-gradient(90deg, #0f172a, #1e3a8a) !important; padding: 6px 0; font-size: 0.78rem; position: fixed; top: 0; left: 0; right: 0; z-index: 1032; width: 100%; }
.topbar-left { display: flex; align-items: center; gap: 18px; }
.topbar-left a { color: rgba(255,255,255,0.75); text-decoration: none; display: flex; align-items: center; gap: 5px; transition: color 0.2s; }
.topbar-left a:hover { color: #60a5fa; }
.topbar-left i { font-size: 0.72rem; color: #60a5fa; }
.topbar-right { display: flex; align-items: center; gap: 10px; }
.topbar-social { width: 26px; height: 26px; background: rgba(255,255,255,0.08); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.72rem; transition: all 0.2s; }
.topbar-social:hover { background: #2563eb; color: #fff; }
.topbar-badge { background: rgba(99,102,241,0.25); border: 1px solid rgba(99,102,241,0.4); color: #a5b4fc; padding: 2px 10px; border-radius: 50px; font-size: 0.7rem; font-weight: 600; }

/* ---- MAIN NAVBAR ---- */
.navbar {
        padding: 0.6rem 0;
        transition: all 0.3s ease;
        background: rgba(15, 23, 42, 0.95) !important;
        box-shadow: 0 2px 16px rgba(0,0,0,0.07);
        top: 36px !important; /* Below topbar on desktop */
    }
.navbar.scrolled {
    padding: 0.6rem 0;
    transition: all 0.3s ease;
    background: rgba(15, 23, 42, 0.95) !important;
    box-shadow: 0 2px 16px rgba(0,0,0,0.07);
    top: 36px !important;
}
.navbar-brand-icon { height: 52px !important; width: auto; }
.navbar-nav .nav-link { color:white !important; font-weight: 600; font-size: 0.875rem; padding: 12px 14px !important; position: relative; transition: all 0.25s ease; }
.navbar-nav .nav-link:hover, .navbar-nav .nav-link.active { color: #2563eb !important; }
.navbar-nav .nav-link::after { content: ''; position: absolute; bottom: 6px; left: 14px; right: 14px; height: 2px; background: #2563eb; border-radius: 2px; transform: scaleX(0); transition: transform 0.3s ease; border: none; vertical-align: unset; display: block; }
.navbar-nav .nav-link:hover::after, .navbar-nav .nav-link.active::after { transform: scaleX(1); }
.dropdown-toggle-icon { display: inline-flex; align-items: center; gap: 4px; }
.dropdown-toggle-icon .chevron { font-size: 0.65rem; transition: transform 0.3s ease; }
.dropdown-toggle.show .chevron { transform: rotate(180deg); }
.btn-get-started { background: linear-gradient(135deg, #2563eb, #1d4ed8) !important; color: #fff !important; border-radius: 10px !important; padding: 9px 20px !important; font-weight: 700 !important; font-size: 0.85rem !important; margin-left: 10px; box-shadow: 0 4px 14px rgba(37,99,235,0.35); transition: all 0.3s ease !important; display: inline-flex !important; align-items: center; gap: 6px; }
.btn-get-started::before, .btn-get-started::after { display: none !important; }
.btn-get-started:hover { transform: translateY(-2px) !important; box-shadow: 0 8px 24px rgba(37,99,235,0.5) !important; color: #fff !important; }
.navbar-toggler { border: 1.5px solid rgba(30,41,59,0.2) !important; border-radius: 8px !important; padding: 6px 10px !important; }
.navbar-toggler:focus { box-shadow: none !important; }
.navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231e293b' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important; }

/* ---- MEGA MENU ---- */
.mega-dropdown { position: static !important; }
.mega-menu { position: fixed !important; left: 0 !important; right: 0 !important; top: auto !important; width: 100% !important; border: none !important; border-radius: 0 0 20px 20px !important; box-shadow: 0 20px 60px rgba(0,0,0,0.12) !important; padding: 0 !important; margin-top: 0 !important; overflow: hidden; animation: megaSlideDown 0.2s ease; }
@keyframes megaSlideDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
.mega-menu-inner { display: grid; grid-template-columns: 1fr 1fr 1fr 280px; }
.mega-col { padding: 24px 20px; border-right: 1px solid #f1f5f9; }
.mega-col:last-child { border-right: none; }
.mega-col-header { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; padding-bottom: 12px; border-bottom: 2px solid #f1f5f9; }
.mega-col-header .col-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; }
.col-icon-blue { background: #eff6ff; color: #2563eb; }
.col-icon-green { background: #ecfdf5; color: #059669; }
.col-icon-purple { background: #faf5ff; color: #7c3aed; }
.mega-col-header h6 { margin: 0; font-size: 0.72rem; font-weight: 700; color: #475569; text-transform: uppercase; letter-spacing: 0.8px; }
.mega-item { display: flex; align-items: flex-start; gap: 10px; padding: 9px 10px; border-radius: 10px; text-decoration: none; transition: all 0.2s ease; margin-bottom: 2px; }
.mega-item:hover { background: #f8fafc; }
.mega-item-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; }
.icon-web { background: #eff6ff; color: #2563eb; } .icon-app { background: #ecfdf5; color: #059669; } .icon-ui { background: #fdf4ff; color: #a21caf; } .icon-shop { background: #fff7ed; color: #ea580c; } .icon-bull { background: #fffbeb; color: #d97706; } .icon-seo { background: #ecfdf5; color: #065f46; } .icon-sm { background: #fdf2f8; color: #db2777; } .icon-cont { background: #f0f9ff; color: #0369a1; } .icon-cloud { background: #f0fdf4; color: #15803d; } .icon-maint { background: #fefce8; color: #854d0e; } .icon-brand { background: #fff1f2; color: #be123c; }
.mega-item-text strong { display: block; font-size: 0.83rem; font-weight: 700; color: white; margin-bottom: 1px; }
.mega-item-text span { font-size: 0.72rem; color: #94a3b8; }
.location-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
.location-card { border: 1px solid #e2e8f0; border-radius: 12px; padding: 8px; background: #ffffff; }
.location-card-head { display: flex; align-items: center; gap: 7px; margin-bottom: 8px; font-size: 0.82rem; font-weight: 700; color: #0f172a; }
.location-card-head i { color: #7c3aed; }
.location-link-row { display: flex; gap: 6px; flex-wrap: wrap; }
.location-link-chip { display: inline-flex; align-items: center; gap: 5px; padding: 5px 8px; border-radius: 999px; border: 1px solid #dbeafe; background: #f8fafc; color: #1e293b; font-size: 0.69rem; font-weight: 600; text-decoration: none; }
.location-link-chip i { font-size: 0.7rem; }
.location-link-chip:hover { color: #1d4ed8; border-color: #93c5fd; background: #eff6ff; }
.mega-col-cta { background: linear-gradient(160deg, #0f172a 0%, #1e3a8a 100%); padding: 24px 20px; }
.mega-cta-badge { display: inline-flex; align-items: center; gap: 5px; background: rgba(99,102,241,0.2); border: 1px solid rgba(99,102,241,0.3); border-radius: 50px; padding: 3px 10px; color: #a5b4fc; font-size: 0.68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px; }
.mega-cta-title { font-size: 1.05rem; font-weight: 800; color: #fff; line-height: 1.3; margin-bottom: 8px; }
.mega-cta-desc { font-size: 0.78rem; color: rgba(255,255,255,0.65); line-height: 1.6; margin-bottom: 14px; }
.mega-cta-stat { display: flex; gap: 14px; margin-bottom: 16px; }
.mega-cta-stat-item .num { display: block; font-size: 1.2rem; font-weight: 800; color: #fff; }
.mega-cta-stat-item .lbl { font-size: 0.65rem; color: rgba(255,255,255,0.55); text-transform: uppercase; }
.mega-btn-primary { display: flex; align-items: center; justify-content: center; gap: 7px; background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff; padding: 10px 16px; border-radius: 10px; font-weight: 700; font-size: 0.82rem; text-decoration: none; margin-bottom: 8px; transition: all 0.25s ease; box-shadow: 0 4px 14px rgba(37,99,235,0.4); }
.mega-btn-primary:hover { transform: translateY(-2px); color: #fff; }
.mega-btn-secondary { display: flex; align-items: center; justify-content: center; gap: 7px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: rgba(255,255,255,0.85); padding: 9px 16px; border-radius: 10px; font-weight: 600; font-size: 0.8rem; text-decoration: none; transition: all 0.25s ease; }
.mega-btn-secondary:hover { background: rgba(255,255,255,0.15); color: #fff; }
.mega-city-links { margin-top: 12px; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.1); }
.mega-city-links p { font-size: 0.65rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; }
.mega-city-links a { display: inline-block; font-size: 0.73rem; color: #60a5fa; margin-right: 8px; margin-bottom: 4px; text-decoration: none; }
.mega-city-links a:hover { color: #93c5fd; text-decoration: underline; }
@media (max-width: 1200px) { .location-grid { grid-template-columns: 1fr; } }
@media (max-width: 991px) { .navbar.scrolled{top: 0px !important} .topbar { display: none !important; } .navbar { top: 0 !important; } .mega-menu { position: relative !important; border-radius: 12px !important; } .mega-menu-inner { grid-template-columns: 1fr; } .mega-col { padding: 12px 14px; border-right: none; border-bottom: 1px solid #f1f5f9; } }
</style>

{{-- TOP BAR --}}
<div class="topbar d-none d-lg-block">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="topbar-left">
                <a href="tel:+917007294764"><i class="fas fa-phone"></i> +91-7007294764</a>
                <a href="mailto:info@shivatechdigital.com"><i class="fas fa-envelope"></i> info@shivatechdigital.com</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i> Sector 62, Noida</a>
            </div>
            <div class="topbar-right">
                <span class="topbar-badge">⚡ Free Consultation Available</span>
                <a href="https://www.facebook.com/profile.php?id=61585380713440" target="_blank" class="topbar-social"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/shivatechdigital" target="_blank" class="topbar-social"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/shivatechdigital" target="_blank" class="topbar-social"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://x.com/shivatechdigi" target="_blank" class="topbar-social"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div>

{{-- MAIN NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('storage/settings/logos/' . basename($settings->site_logo ?? '')) }}" alt="{{ $settings->site_name ?? 'Shiva Tech Digital' }}" class="navbar-brand-icon">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation" style="background:white;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>

                {{-- SERVICES MEGA MENU --}}
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" aria-haspopup="true">
                        <span class="dropdown-toggle-icon">Services <i class="fas fa-chevron-down chevron ms-1"></i></span>
                    </a>
                    <div class="dropdown-menu mega-menu">
                        <div class="container">
                            <div class="mega-menu-inner">
                                {{-- Column 1: Development --}}
                                <div class="mega-col">
                                    <div class="mega-col-header"><div class="col-icon col-icon-blue"><i class="fas fa-laptop-code"></i></div><h6>Development</h6></div>
                                    <a href="{{ route('services.web-development') }}" class="mega-item"><div class="mega-item-icon icon-web"><i class="fas fa-globe"></i></div><div class="mega-item-text"><strong>Web Development</strong><span>Custom websites & web apps</span></div></a>
                                    <a href="{{ route('services.mobile-app') }}" class="mega-item"><div class="mega-item-icon icon-app"><i class="fas fa-mobile-alt"></i></div><div class="mega-item-text"><strong>Mobile App Development</strong><span>iOS & Android apps</span></div></a>
                                    <a href="{{ route('services.ui-ux') }}" class="mega-item"><div class="mega-item-icon icon-ui"><i class="fas fa-paint-brush"></i></div><div class="mega-item-text"><strong>UI/UX Design</strong><span>Beautiful user experiences</span></div></a>
                                    <a href="{{ route('services.ecommerce') }}" class="mega-item"><div class="mega-item-icon icon-shop"><i class="fas fa-shopping-cart"></i></div><div class="mega-item-text"><strong>E-commerce</strong><span>Online store solutions</span></div></a>
                                    <a href="{{ route('services.cloud') }}" class="mega-item"><div class="mega-item-icon icon-cloud"><i class="fas fa-cloud"></i></div><div class="mega-item-text"><strong>Cloud Solutions</strong><span>Scalable infrastructure</span></div></a>
                                </div>
                                {{-- Column 2: Marketing --}}
                                <div class="mega-col">
                                    <div class="mega-col-header"><div class="col-icon col-icon-green"><i class="fas fa-chart-line"></i></div><h6>Digital Marketing</h6></div>
                                    <a href="{{ route('services.digital-marketing') }}" class="mega-item"><div class="mega-item-icon icon-bull"><i class="fas fa-bullhorn"></i></div><div class="mega-item-text"><strong>Digital Marketing</strong><span>Complete online marketing</span></div></a>
                                    <a href="{{ route('services.seo') }}" class="mega-item"><div class="mega-item-icon icon-seo"><i class="fas fa-search"></i></div><div class="mega-item-text"><strong>SEO & SEM</strong><span>Search engine ranking</span></div></a>
                                    <a href="{{ route('services.social-media') }}" class="mega-item"><div class="mega-item-icon icon-sm"><i class="fab fa-instagram"></i></div><div class="mega-item-text"><strong>Social Media Marketing</strong><span>Grow your social presence</span></div></a>
                                    <a href="{{ route('services.content') }}" class="mega-item"><div class="mega-item-icon icon-cont"><i class="fas fa-pen-nib"></i></div><div class="mega-item-text"><strong>Content Marketing</strong><span>Engaging content strategy</span></div></a>
                                    <a href="{{ route('services.branding') }}" class="mega-item"><div class="mega-item-icon icon-brand"><i class="fas fa-palette"></i></div><div class="mega-item-text"><strong>Branding & Identity</strong><span>Brand design & strategy</span></div></a>
                                </div>
                                {{-- Column 3: City Pages --}}
                                <div class="mega-col">
                                    <div class="mega-col-header"><div class="col-icon col-icon-purple"><i class="fas fa-map-marker-alt"></i></div><h6>By Location</h6></div>
                                    <div class="location-grid">
                                        <div class="location-card">
                                            <div class="location-card-head"><i class="fas fa-map-pin"></i> Noida</div>
                                            <div class="location-link-row">
                                                <a href="{{ route('services.web-development-noida') }}" class="location-link-chip"><i class="fas fa-laptop-code"></i> Web Development</a>
                                                <a href="{{ route('services.mobile-app-noida') }}" class="location-link-chip"><i class="fas fa-mobile-alt"></i> Android Development</a>
                                            </div>
                                        </div>
                                        <div class="location-card">
                                            <div class="location-card-head"><i class="fas fa-map-pin"></i> Delhi</div>
                                            <div class="location-link-row">
                                                <a href="{{ route('services.web-development-delhi') }}" class="location-link-chip"><i class="fas fa-laptop-code"></i> Web Development</a>
                                                <a href="{{ route('services.mobile-app-delhi') }}" class="location-link-chip"><i class="fas fa-mobile-alt"></i> Android Development</a>
                                            </div>
                                        </div>
                                        <div class="location-card">
                                            <div class="location-card-head"><i class="fas fa-map-pin"></i> Gurgaon</div>
                                            <div class="location-link-row">
                                                <a href="{{ route('services.web-development-gurgaon') }}" class="location-link-chip"><i class="fas fa-laptop-code"></i> Web Development</a>
                                                <a href="{{ route('services.mobile-app-gurgaon') }}" class="location-link-chip"><i class="fas fa-mobile-alt"></i> Android Development</a>
                                            </div>
                                        </div>
                                        <div class="location-card">
                                            <div class="location-card-head"><i class="fas fa-map-pin"></i> Ghaziabad</div>
                                            <div class="location-link-row">
                                                <a href="{{ route('services.web-development-ghaziabad') }}" class="location-link-chip"><i class="fas fa-laptop-code"></i> Web Development</a>
                                                <a href="{{ route('services.mobile-app-ghaziabad') }}" class="location-link-chip"><i class="fas fa-mobile-alt"></i> Android Development</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('services.maintenance') }}" class="mega-item"><div class="mega-item-icon icon-maint"><i class="fas fa-tools"></i></div><div class="mega-item-text"><strong>Maintenance & Support</strong><span>Ongoing support packages</span></div></a>
                                </div>
                                {{-- Column 4: CTA --}}
                                <div class="mega-col mega-col-cta">
                                    <div class="mega-cta-badge"><i class="fas fa-star" style="color:#fbbf24;font-size:0.65rem;"></i> 30+ Happy Clients</div>
                                    <div class="mega-cta-title">Ready to Grow Your Business Online?</div>
                                    <div class="mega-cta-desc">Free consultation with Noida's most affordable web team. No obligation.</div>
                                    <div class="mega-cta-stat">
                                        <div class="mega-cta-stat-item"><span class="num">50+</span><span class="lbl">Projects</span></div>
                                        <div class="mega-cta-stat-item"><span class="num">4.9★</span><span class="lbl">Rating</span></div>
                                        <div class="mega-cta-stat-item"><span class="num">₹8K</span><span class="lbl">Starting</span></div>
                                    </div>
                                    <a href="{{ route('contact') }}" class="mega-btn-primary"><i class="fas fa-rocket"></i> Get Free Quote</a>
                                    <a href="tel:+917007294764" class="mega-btn-secondary"><i class="fas fa-phone"></i> +91-7007294764</a>
                                    <div class="mega-city-links">
                                        <p>We serve:</p>
                                        <a href="{{ route('services.web-development-noida') }}">Noida</a>
                                        <a href="{{ route('services.web-development-delhi') }}">Delhi</a>
                                        <a href="{{ route('services.web-development-gurgaon') }}">Gurgaon</a>
                                        <a href="{{ route('services.web-development-ghaziabad') }}">Ghaziabad</a>
                                        <a href="{{ route('services.mobile-app-noida') }}">App Noida</a>
                                        <a href="{{ route('services.mobile-app-delhi') }}">App Delhi</a>
                                        <a href="{{ route('services.mobile-app-gurgaon') }}">App Gurgaon</a>
                                        <a href="{{ route('services.mobile-app-ghaziabad') }}">App Ghaziabad</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Pricing</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link btn-get-started" href="{{ route('contact') }}"><i class="fas fa-rocket"></i> Get Started</a></li>
            </ul>
        </div>
    </div>
</nav>