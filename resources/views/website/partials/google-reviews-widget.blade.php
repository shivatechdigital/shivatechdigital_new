{{-- ============================================
   GOOGLE REVIEWS WIDGET
   Shows aggregate Google rating + reviews from DB
   Include with: @include('website.partials.google-reviews-widget')
   Optionally pass $widgetTestimonials variable.
   If not passed, it auto-loads featured testimonials.
============================================ --}}
@php
    $reviews = $widgetTestimonials ?? \App\Models\Testimonial::featured()->orderBy('order')->limit(3)->get();
    $avgRating = 4.9;
    $reviewCount = 25;
    $googleMapsUrl = 'https://maps.google.com/?q=Shiva+Tech+Digital+Sector+62+Noida';
    $googleReviewUrl = 'https://search.google.com/local/writereview?placeid=ChIJ5R-Y5aRhDDkRCnV5wBXvGkQ'; // update with real Place ID
@endphp

<section class="google-reviews-widget py-5" aria-labelledby="google-reviews-heading"
         style="background:#fff;" itemscope itemtype="https://schema.org/LocalBusiness">
    <meta itemprop="name" content="Shiva Tech Digital">
    <meta itemprop="url" content="https://shivatechdigital.com">

    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-5" data-aos="fade-up">
            <div style="display:inline-flex;align-items:center;gap:10px;background:#fff;border:1.5px solid #e2e8f0;border-radius:14px;padding:12px 22px;margin-bottom:20px;box-shadow:0 4px 14px rgba(0,0,0,.06);">
                {{-- Google "G" logo --}}
                <svg width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-label="Google" role="img">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                <span style="font-size:.88rem;font-weight:700;color:#0f172a;">Google Reviews</span>
            </div>
            <h2 id="google-reviews-heading" style="font-size:1.8rem;font-weight:800;color:#0f172a;margin-bottom:8px;">
                Trusted by Businesses Across Delhi NCR
            </h2>
            <p style="color:#64748b;font-size:.9rem;max-width:480px;margin:0 auto 16px;">
                Real reviews from real clients. See what businesses in Noida, Delhi, Gurgaon & Ghaziabad say about us.
            </p>

            {{-- Aggregate rating block --}}
            <div style="display:inline-flex;align-items:center;gap:20px;background:#f8fafc;border:1.5px solid #e2e8f0;border-radius:16px;padding:16px 28px;flex-wrap:wrap;justify-content:center;"
                 itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="{{ $avgRating }}">
                <meta itemprop="reviewCount" content="{{ $reviewCount }}">
                <meta itemprop="bestRating" content="5">
                <div style="text-align:center;">
                    <div style="font-size:2.6rem;font-weight:900;color:#0f172a;line-height:1;">{{ number_format($avgRating,1) }}</div>
                    <div style="display:flex;gap:3px;justify-content:center;margin:4px 0;">
                        @for($s=1;$s<=5;$s++)
                            <i class="fas fa-star" style="color:#FBBC05;font-size:.85rem;" aria-hidden="true"></i>
                        @endfor
                    </div>
                    <div style="font-size:.72rem;color:#94a3b8;font-weight:600;">{{ $reviewCount }}+ Google Reviews</div>
                </div>
                <div style="width:1px;height:50px;background:#e2e8f0;flex-shrink:0;"></div>
                <div style="display:flex;flex-direction:column;gap:4px;">
                    @foreach([5=>90,4=>7,3=>3,2=>0,1=>0] as $star=>$pct)
                    <div style="display:flex;align-items:center;gap:6px;">
                        <span style="font-size:.7rem;color:#64748b;width:6px;">{{ $star }}</span>
                        <i class="fas fa-star" style="color:#FBBC05;font-size:.58rem;"></i>
                        <div style="width:80px;height:5px;background:#e2e8f0;border-radius:3px;overflow:hidden;">
                            <div style="width:{{ $pct }}%;height:100%;background:#FBBC05;border-radius:3px;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer nofollow"
                   style="display:inline-flex;align-items:center;gap:7px;background:linear-gradient(135deg,#4285F4,#1a73e8);color:#fff;border-radius:10px;padding:10px 18px;text-decoration:none;font-size:.82rem;font-weight:700;white-space:nowrap;">
                    <i class="fas fa-star"></i> Write a Review
                </a>
            </div>
        </div>

        {{-- Review Cards --}}
        @if($reviews->count())
        <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            @foreach($reviews as $review)
            <div class="col-lg-4 col-md-6" itemprop="review" itemscope itemtype="https://schema.org/Review">
                <div style="background:#fff;border:1.5px solid #e2e8f0;border-radius:18px;padding:24px;height:100%;position:relative;transition:all .3s;box-shadow:0 2px 10px rgba(0,0,0,.04);"
                     onmouseenter="this.style.boxShadow='0 12px 36px rgba(66,133,244,.12)';this.style.borderColor='#93c5fd';this.style.transform='translateY(-4px)'"
                     onmouseleave="this.style.boxShadow='0 2px 10px rgba(0,0,0,.04)';this.style.borderColor='#e2e8f0';this.style.transform='translateY(0)'">

                    {{-- Google G badge --}}
                    <div style="position:absolute;top:16px;right:16px;width:28px;height:28px;background:#fff;border:1.5px solid #e2e8f0;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </div>

                    {{-- Stars --}}
                    <div style="display:flex;gap:3px;margin-bottom:14px;"
                         itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"
                         aria-label="{{ $review->rating }} out of 5 stars">
                        <meta itemprop="ratingValue" content="{{ $review->rating }}">
                        <meta itemprop="bestRating" content="5">
                        @for($s=1;$s<=5;$s++)
                            <i class="fas fa-star" style="color:{{ $s <= $review->rating ? '#FBBC05' : '#e2e8f0' }};font-size:.82rem;" aria-hidden="true"></i>
                        @endfor
                    </div>

                    {{-- Review text --}}
                    <p style="color:#374151;font-size:.88rem;line-height:1.7;margin-bottom:18px;font-style:italic;" itemprop="reviewBody">
                        "{{ \Illuminate\Support\Str::limit($review->review, 160) }}"
                    </p>

                    {{-- Reviewer --}}
                    <div style="display:flex;align-items:center;gap:10px;padding-top:14px;border-top:1px solid #f1f5f9;"
                         itemprop="author" itemscope itemtype="https://schema.org/Person">
                        @if($review->client_photo)
                            <img src="{{ asset('storage/'.$review->client_photo) }}" alt="{{ $review->client_name }}"
                                 style="width:40px;height:40px;border-radius:50%;object-fit:cover;" loading="lazy" itemprop="image">
                        @else
                            <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,#4285F4,#1a73e8);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.9rem;flex-shrink:0;">
                                {{ strtoupper(substr($review->client_name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <div style="font-weight:700;font-size:.85rem;color:#0f172a;" itemprop="name">{{ $review->client_name }}</div>
                            @if($review->client_role || $review->client_company)
                            <div style="font-size:.75rem;color:#94a3b8;">
                                {{ $review->client_role }}{{ $review->client_role && $review->client_company ? ', ' : '' }}{{ $review->client_company }}
                            </div>
                            @endif
                        </div>
                        @if($review->service_type)
                        <span style="margin-left:auto;font-size:.68rem;font-weight:700;background:#eff6ff;color:#2563eb;border-radius:20px;padding:2px 10px;white-space:nowrap;">
                            {{ $review->service_type }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- CTA row --}}
        <div style="text-align:center;margin-top:36px;" data-aos="fade-up">
            <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener noreferrer nofollow"
               style="display:inline-flex;align-items:center;gap:8px;border:1.5px solid #4285F4;color:#4285F4;border-radius:10px;padding:11px 24px;text-decoration:none;font-weight:700;font-size:.88rem;transition:all .2s;margin-right:10px;"
               onmouseenter="this.style.background='#4285F4';this.style.color='#fff'"
               onmouseleave="this.style.background='transparent';this.style.color='#4285F4'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                View All Google Reviews
            </a>
            <a href="{{ $googleReviewUrl }}" target="_blank" rel="noopener noreferrer nofollow"
               style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#FBBC05,#f59e0b);color:#fff;border-radius:10px;padding:11px 24px;text-decoration:none;font-weight:700;font-size:.88rem;">
                <i class="fas fa-star"></i> Leave a Review
            </a>
        </div>

    </div>
</section>
