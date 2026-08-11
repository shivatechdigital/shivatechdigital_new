@extends('website.index')
@section('seo_slug', 'careers')

@push('styles')
<style>
.careers-hero { background: linear-gradient(135deg, rgba(15,23,42,.92), rgba(14,116,144,.82)); padding: 110px 0 60px; }
.job-card { border: 1px solid #dbeafe; border-radius: 16px; background: #fff; transition: all .2s ease; }
.job-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(14,116,144,.14); }
.job-chip { border-radius: 999px; padding: 4px 10px; background: #eff6ff; color: #1d4ed8; font-size: .72rem; font-weight: 700; }
</style>
@endpush

@section('website.content')
<section class="careers-hero text-white">
    <div class="container text-center">
        <h1 style="font-weight:900;">Careers at Shiva Tech Digital</h1>
        <p style="max-width:700px;margin:0 auto;opacity:.85;">Humari team grow kar rahi hai. Agar aap ownership lena chahte ho aur high-impact projects par kaam karna chahte ho, apply karo.</p>
    </div>
</section>

<section style="background:#f8fafc;padding:55px 0 70px;">
    <div class="container">
        <div class="row g-4">
            @forelse($jobs as $job)
                <div class="col-lg-6">
                    <article class="job-card p-4 h-100">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="job-chip">{{ $job->department ?? 'General' }}</span>
                            <span class="job-chip">{{ $job->employment_type_label ?? 'Full Time' }}</span>
                            <span class="job-chip">{{ $job->location ?? 'Noida / Remote' }}</span>
                        </div>
                        <h3 style="font-size:1.3rem;font-weight:800;color:#0f172a;">{{ $job->title }}</h3>
                        <p style="font-size:.92rem;color:#475569;line-height:1.7;">{{ $job->summary ?? 'Role details will be shared during the interview process.' }}</p>

                        <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                            <small style="color:#64748b;">Experience: {{ $job->experience_level ?? 'As per role' }}</small>
                            <a href="{{ !empty($job->slug) ? route('careers.apply', $job->slug) : '#' }}" class="btn btn-sm btn-primary {{ empty($job->slug) ? 'disabled' : '' }}">Apply Now</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="mb-0" style="color:#475569;">No active openings right now. You can still share your CV at <a href="mailto:info@shivatechdigital.com">info@shivatechdigital.com</a>.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
