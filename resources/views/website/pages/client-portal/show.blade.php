@extends('website.index')
@section('seo_slug', 'client-project-' . ($project->slug ?? 'details'))

@section('website.content')
<section style="background:linear-gradient(130deg,#0f172a,#1d4ed8);padding:110px 0 60px;">
    <div class="container text-white">
        <a href="{{ route('client.portal.index') }}" style="color:#bfdbfe;text-decoration:none;font-size:.82rem;"><- Back to tracker</a>
        <h1 class="mt-2" style="font-weight:900;">{{ $project->title }}</h1>
        <p style="opacity:.8;">Status: {{ $project->status_label }} | Progress: {{ $project->progress }}%</p>
    </div>
</section>

<section style="padding:50px 0;background:#f8fafc;">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white border rounded-4 p-4">
                    <h2 style="font-size:1.1rem;font-weight:800;color:#0f172a;">Project Timeline</h2>
                    <ul class="list-group list-group-flush mt-3">
                        @forelse(($project->milestones ?? []) as $milestone)
                            <li class="list-group-item px-0">
                                <div class="d-flex justify-content-between gap-3">
                                    <div>
                                        <strong>{{ $milestone['title'] ?? 'Milestone' }}</strong>
                                        <div style="font-size:.85rem;color:#64748b;">{{ $milestone['note'] ?? '' }}</div>
                                    </div>
                                    <span class="badge text-bg-light align-self-start">{{ $milestone['status'] ?? 'Pending' }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item px-0" style="color:#64748b;">Milestones will be shared soon.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-white border rounded-4 p-4">
                    <h3 style="font-size:1rem;font-weight:800;color:#0f172a;">Project Details</h3>
                    <p class="mb-1" style="font-size:.9rem;"><strong>Start:</strong> {{ optional($project->start_date)->format('d M Y') ?? '-' }}</p>
                    <p class="mb-1" style="font-size:.9rem;"><strong>ETA:</strong> {{ optional($project->estimated_delivery_date)->format('d M Y') ?? '-' }}</p>
                    <p class="mb-3" style="font-size:.9rem;"><strong>Last update:</strong> {{ optional($project->last_updated_at)->format('d M Y, h:i A') ?? '-' }}</p>

                    @if(!empty($project->client_note))
                        <div class="p-3 rounded-3" style="background:#eff6ff;">
                            <div style="font-size:.75rem;font-weight:700;color:#1d4ed8;text-transform:uppercase;">Team Note</div>
                            <p class="mb-0" style="font-size:.88rem;color:#1e293b;">{{ $project->client_note }}</p>
                        </div>
                    @endif

                    <a href="mailto:info@shivatechdigital.com?subject=Project%20Update%20-%20{{ urlencode($project->title) }}" class="btn btn-primary w-100 mt-3">Contact Project Manager</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
