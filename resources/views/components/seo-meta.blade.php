{{-- ================================================ --}}
{{-- SEO META COMPONENT - Auto-managed via CRM        --}}
{{-- Last Updated By: {{ $pageMeta->last_updated_by ?? 'manual' }} --}}
{{-- SEO Score: {{ $pageMeta->seo_score ?? 'N/A' }}/100 --}}
{{-- ================================================ --}}

{{-- Primary Meta Tags --}}
<title>{{ $meta['title'] }}</title>
<meta name="title" content="{{ $meta['title'] }}">
<meta name="description" content="{{ $meta['description'] }}">
@if($meta['keywords'])
<meta name="keywords" content="{{ $meta['keywords'] }}">
@endif

{{-- Canonical & Robots --}}
<link rel="canonical" href="{{ $meta['canonical'] }}">
<meta name="robots" content="{{ $meta['robots'] }}">
<meta name="googlebot" content="{{ $meta['robots'] }}, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

{{-- Author & Publisher --}}
<meta name="author" content="Shiva Tech Digital">
<meta name="publisher" content="Shiva Tech Digital">
<meta name="copyright" content="Shiva Tech Digital">

{{-- Language & Regional --}}
<link rel="alternate" hreflang="en-in" href="{{ $meta['canonical'] }}">
<link rel="alternate" hreflang="x-default" href="{{ $meta['canonical'] }}">

{{-- Page-level Geo Targeting --}}
<meta name="geo.region" content="{{ $geo['region'] }}">
<meta name="geo.placename" content="{{ $geo['placename'] }}">
<meta name="geo.position" content="{{ $geo['position'] }}">
<meta name="ICBM" content="{{ $geo['icbm'] }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $meta['og_type'] }}">
<meta property="og:url" content="{{ $meta['canonical'] }}">
<meta property="og:title" content="{{ $meta['og_title'] }}">
<meta property="og:description" content="{{ $meta['og_description'] }}">
<meta property="og:image" content="{{ $meta['og_image'] }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name" content="Shiva Tech Digital">
<meta property="og:locale" content="en_IN">

{{-- Twitter Card --}}
<meta name="twitter:card" content="{{ $meta['twitter_card'] }}">
<meta name="twitter:site" content="@shivatechdigi">
<meta name="twitter:creator" content="@shivatechdigi">
<meta name="twitter:url" content="{{ $meta['canonical'] }}">
<meta name="twitter:title" content="{{ $meta['twitter_title'] }}">
<meta name="twitter:description" content="{{ $meta['twitter_description'] }}">
<meta name="twitter:image" content="{{ $meta['twitter_image'] }}">

{{-- Additional SEO Meta --}}
<meta name="rating" content="general">
<meta name="distribution" content="global">
<meta name="revisit-after" content="7 days">
<meta name="coverage" content="Delhi NCR, India, Worldwide">
<meta name="target" content="all">
<meta name="HandheldFriendly" content="True">

{{-- Theme & Mobile --}}
<meta name="theme-color" content="#0d6efd">
<meta name="format-detection" content="telephone=yes">

{{-- Schema Markup (JSON-LD) --}}
@if($meta['schema'])
<script type="application/ld+json">
{!! $meta['schema'] !!}
</script>
@endif

@if($meta['breadcrumb_schema'])
<script type="application/ld+json">
{!! $meta['breadcrumb_schema'] !!}
</script>
@endif

@if($meta['faq_schema'])
<script type="application/ld+json">
{!! $meta['faq_schema'] !!}
</script>
@endif

{{-- Debug Info (only in local environment) --}}
@if(config('app.env') === 'local')
<!-- 
   SEO Debug Info:
   Page Slug: {{ $pageSlug }}
   Loaded from DB: {{ $pageMeta ? 'YES' : 'NO (using defaults)' }}
   Focus Keyword: {{ $meta['focus_keyword'] ?? 'Not set' }}
   SEO Score: {{ $pageMeta->seo_score ?? 'N/A' }}/100
   Last Updated By: {{ $pageMeta->last_updated_by ?? 'N/A' }}
-->
@endif
