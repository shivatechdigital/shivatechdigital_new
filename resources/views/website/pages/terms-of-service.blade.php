@extends('website.index')

@section('page_slug', 'terms-of-service')
@section('title', 'Terms of Service | Shiva Tech Digital')
@section('meta_title', 'Terms of Service | Shiva Tech Digital')
@section('meta_description', 'Read the terms of service for Shiva Tech Digital covering project scope, intellectual property, payments, and website usage.')
@section('meta_keywords', 'terms of service shiva tech digital, website terms, agency terms and conditions')

@push('additional-meta')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {"@@type": "ListItem", "position": 1, "name": "Home", "item": "https://shivatechdigital.com/"},
    {"@@type": "ListItem", "position": 2, "name": "Terms of Service", "item": "https://shivatechdigital.com/terms-of-service"}
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
          <h1 style="font-weight:800;">Terms of Service</h1>
          <p class="text-secondary mb-0">These terms govern the use of this website and engagement with Shiva Tech Digital services.</p>
        </div>
        <div class="p-4 p-lg-5" style="background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 24px rgba(15,23,42,.06);line-height:1.8;">
          <h2 style="font-size:1.25rem;font-weight:700;">Website Use</h2>
          <p>Users may browse this website for lawful purposes only and may not misuse forms, content, or technical systems.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Project Scope and Delivery</h2>
          <p>All project work is executed according to approved scope, timelines, milestones, and communication documented during engagement.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Payments</h2>
          <p>Commercial terms, milestone schedules, and recurring support arrangements are defined in proposals, invoices, or signed agreements.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Intellectual Property</h2>
          <p>Ownership transfer, source code usage, design rights, and third-party license conditions depend on the engagement model and written agreement.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Liability</h2>
          <p>While we work to ensure quality and reliability, Shiva Tech Digital is not liable for indirect losses, third-party platform issues, or misuse outside agreed scope.</p>
          <h2 style="font-size:1.25rem;font-weight:700;">Contact</h2>
          <p class="mb-0">For terms-related questions, contact <a href="mailto:info@shivatechdigital.com">info@shivatechdigital.com</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection