<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h4><img src="{{ asset('storage/settings/logos/' . basename($settings->site_logo ?? '')) }}" alt="{{ $settings->site_name ?? 'ShivaTechDigital' }}" class="navbar-brand-icon" style="height:70px; width:auto;"></h4>
                    <p>{{ $settings->site_description ?? 'Your trusted partner for web development, mobile apps, and digital marketing solutions.'}}</p>
                    <div class="social-links">
                        @if(!empty($settings->facebook_url))
                            <a href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                    
                        @if(!empty($settings->twitter_url))
                            <a href="{{ $settings->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                    
                        @if(!empty($settings->instagram_url))
                            <a href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    
                        @if(!empty($settings->youtube_url))
                            <a href="{{ $settings->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                    
                        @if(!empty($settings->linkedin_url))
                            <a href="{{ $settings->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Services</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('services') }}#web-app">Web Development</a></li>
                        <li><a href="{{ route('services') }}#mobile-app">Mobile Apps</a></li>
                        <li><a href="{{ route('services') }}#digital-marketing">Digital Marketing</a></li>
                        <li><a href="">SEO Services</a></li>
                        <li><a href="">UI/UX Design</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i>{{ $settings->site_address ?? '123 Business St, NY 10001'}}</li>
                        <li><i class="fas fa-phone"></i>{{ $settings->site_phone ?? '+1 (555) 123-4567'}}</li>
                        <li><i class="fas fa-envelope"></i> {{ $settings->site_email ?? 'info@ShivaTechDigital.com'}}</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy;{{$settings->footer_text ?? ''}} | <a href="{{ \Illuminate\Support\Facades\Route::has('privacy-policy') ? route('privacy-policy') : url('/privacy-policy') }}">Privacy Policy</a> | <a href="{{ \Illuminate\Support\Facades\Route::has('terms-of-service') ? route('terms-of-service') : url('/terms-of-service') }}">Terms of
                    Service</a></p>
            </div>
        </div>
    </footer>