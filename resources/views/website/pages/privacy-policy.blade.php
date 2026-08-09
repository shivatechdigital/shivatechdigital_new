@extends('website.index')

@section('page_slug', 'privacy-policy')
@section('title', 'Privacy Policy | Shiva Tech Digital')
@section('meta_title', 'Privacy Policy | Shiva Tech Digital')
@section('meta_description', 'Read the privacy policy for Shiva Tech Digital covering website usage, lead forms, communication data, and user rights.')
@section('meta_keywords', 'privacy policy shiva tech digital, website privacy policy, data privacy noida agency')

@push('additional-meta')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type": "ListItem", "position": 1, "name": "Home", "item": "https://shivatechdigital.com/"},
    {"@@type": "ListItem", "position": 2, "name": "Privacy Policy", "item": "https://shivatechdigital.com/privacy-policy"}
  ]
}
</script>
@endpush

@section('website.content')
<section class="py-5" style="margin-top:90px;background:#f8fafc;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="mb-4">
          <h1 style="font-weight:800;">Privacy Policy</h1>
          <p class="text-secondary mb-0">This policy explains how Shiva Tech Digital collects, uses, and protects information submitted through this website.</p>
        </div>
        <div class="p-4 p-lg-5" style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 24px rgba(15,23,42,.06);line-height:1.8;">
          <h2 style="font-size:1.25rem;font-weight:700;">Information We Collect</h2>
          <p>We may collect contact details, enquiry information, business requirements, and basic analytics data when users submit forms or browse the website.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">How We Use Information</h2>
          <p>We use the information to respond to enquiries, improve our services, analyze website performance, and communicate regarding projects or support.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Data Sharing</h2>
          <p>We do not sell personal information. Data may be processed through secure third-party tools used for hosting, analytics, CRM, or communication workflows.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Cookies and Analytics</h2>
          <p>We use cookies and analytics tools to understand traffic trends, improve page performance, and measure marketing effectiveness.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Data Security</h2>
          <p>We use reasonable technical and administrative measures to protect submitted information, although no online system can guarantee absolute security.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Contact</h2>
          <p class="mb-0">For privacy-related questions, contact Shiva Tech Digital at <a href="mailto:info@shivatechdigital.com">info@shivatechdigital.com</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection