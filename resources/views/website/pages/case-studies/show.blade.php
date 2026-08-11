@extends('website.index')

@section('seo_slug', 'case-study-' . ($caseStudy->slug ?? 'details'))

@section('website.content')
<section style="background:linear-gradient(130deg,#0f172a,#0e7490);padding:110px 0 60px;">
    <div class="container text-white">
        <div class="d-flex gap-2 flex-wrap mb-2">
            <span class="badge text-bg-light">{{ $caseStudy->industry ?? 'Industry' }}</span>
            <span class="badge text-bg-light">{{ $caseStudy->project_type ?? 'Project Type' }}</span>
        </div>
        <h1 style="font-weight:900;max-width:820px;">{{ $caseStudy->title }}</h1>
        <p style="opacity:.8;">Client: {{ $caseStudy->client_name ?? 'Confidential' }}</p>
    </div>
</section>

<section style="padding:55px 0;background:#f8fafc;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <article class="bg-white border rounded-4 p-4 p-lg-5 h-100">
                    <h2 style="font-size:1.15rem;font-weight:800;color:#0f172a;">Challenge</h2>
                    <p style="color:#334155;line-height:1.8;">{{ $caseStudy->challenge }}</p>

                    <h2 style="font-size:1.15rem;font-weight:800;color:#0f172a;" class="mt-4">Solution</h2>
                    <p style="color:#334155;line-height:1.8;">{{ $caseStudy->solution }}</p>

                    <h2 style="font-size:1.15rem;font-weight:800;color:#0f172a;" class="mt-4">Results</h2>
                    <p style="color:#334155;line-height:1.8;">{{ $caseStudy->results }}</p>
                </article>
            </div>

            <div class="col-lg-4">
                <aside class="bg-white border rounded-4 p-4 h-100">
                    <h3 style="font-size:1rem;font-weight:800;color:#0f172a;">Key Results</h3>
                    @if(!empty($caseStudy->result_metrics) && is_array($caseStudy->result_metrics))
                        <div class="d-grid gap-2 mt-3">
                            @foreach($caseStudy->result_metrics as $metric)
                                <div class="p-3 rounded-3" style="background:#eff6ff;">
                                    <div style="font-size:.7rem;color:#1d4ed8;font-weight:700;text-transform:uppercase;">{{ $metric['label'] ?? 'Metric' }}</div>
                                    <div style="font-size:1.2rem;font-weight:900;color:#0f172a;">{{ $metric['value'] ?? '-' }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(!empty($caseStudy->technologies) && is_array($caseStudy->technologies))
                        <h3 style="font-size:1rem;font-weight:800;color:#0f172a;" class="mt-4">Technology Stack</h3>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            @foreach($caseStudy->technologies as $tech)
                                <span class="badge text-bg-light">{{ $tech }}</span>
                            @endforeach
                        </div>
                    @endif

                    <a href="{{ route('contact') }}" class="btn btn-primary w-100 mt-4">Discuss Similar Project</a>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
