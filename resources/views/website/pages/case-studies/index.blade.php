@extends('website.index')
@section('seo_slug', 'case-studies')

@push('styles')
<style>
.cs-hero { background: linear-gradient(140deg, rgba(2,6,23,.9), rgba(22,78,99,.86)); padding: 110px 0 64px; }
.cs-card { border: 1px solid #e2e8f0; border-radius: 18px; background: #fff; overflow: hidden; height: 100%; }
.cs-metric { border-radius: 12px; background: #eff6ff; padding: 10px 12px; }
</style>
@endpush

@section('website.content')
<section class="cs-hero text-white">
    <div class="container text-center">
        <h1 style="font-weight:900;">Case Studies</h1>
        <p style="max-width:700px;margin:0 auto;opacity:.86;">Portfolio se aage: har project ka challenge, approach aur measurable results clear format me.</p>
    </div>
</section>

<section style="padding:56px 0;background:#f8fafc;">
    <div class="container">
        <div class="row g-4">
            @forelse($caseStudies as $item)
                <div class="col-lg-6">
                    <article class="cs-card p-4">
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            <span class="badge text-bg-light">{{ $item->industry ?? 'Industry' }}</span>
                            <span class="badge text-bg-light">{{ $item->project_type ?? 'Project' }}</span>
                        </div>
                        <h2 style="font-size:1.22rem;font-weight:800;color:#0f172a;">{{ $item->title }}</h2>
                        <p style="font-size:.9rem;color:#334155;"><strong>Challenge:</strong> {{ \Illuminate\Support\Str::limit($item->challenge, 120) }}</p>
                        <p style="font-size:.9rem;color:#334155;"><strong>Solution:</strong> {{ \Illuminate\Support\Str::limit($item->solution, 130) }}</p>

                        @if(!empty($item->result_metrics) && is_array($item->result_metrics))
                            <div class="row g-2 mb-3">
                                @foreach(array_slice($item->result_metrics, 0, 3) as $metric)
                                    <div class="col-md-4">
                                        <div class="cs-metric h-100">
                                            <div style="font-size:.7rem;color:#1e3a8a;text-transform:uppercase;font-weight:700;">{{ $metric['label'] ?? 'Metric' }}</div>
                                            <div style="font-weight:900;color:#0f172a;font-size:1.1rem;">{{ $metric['value'] ?? '-' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <small style="color:#64748b;">{{ $item->client_name ?? 'Confidential Client' }}</small>
                            <a href="{{ route('case-studies.show', $item->slug) }}" class="btn btn-sm btn-primary">Read Full Study</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p style="color:#475569;" class="mb-0">Case studies will be published soon.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
