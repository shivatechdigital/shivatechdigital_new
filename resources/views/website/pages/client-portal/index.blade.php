@extends('website.index')
@section('seo_slug', 'client-portal')

@section('website.content')
<section style="background:linear-gradient(130deg,#0f172a,#1d4ed8);padding:110px 0 60px;">
    <div class="container text-white">
        <h1 style="font-weight:900;">Client Project Tracker</h1>
        <p style="opacity:.85;max-width:740px;">Aapke active projects ki current status, progress aur latest update yahan available hai.</p>
    </div>
</section>

<section style="padding:50px 0;background:#f8fafc;">
    <div class="container">
        <div class="bg-white border rounded-4 p-4 mb-4">
            <h2 style="font-size:1.1rem;font-weight:800;color:#0f172a;">Quotation Tracker</h2>
            @if(($quoteRequests ?? collect())->isEmpty())
                <p class="mb-0" style="color:#64748b;">No quotation requests found. You can submit one from the quote calculator.</p>
            @else
                <div class="table-responsive mt-3">
                    <table class="table table-sm align-middle mb-0">
                        <thead style="background:#f1f5f9;">
                            <tr>
                                <th>Project Type</th>
                                <th>Status</th>
                                <th>Estimate</th>
                                <th>Quoted Amount</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quoteRequests as $quote)
                                <tr>
                                    <td>{{ ucwords(str_replace('_', ' ', $quote->project_type)) }}</td>
                                    <td><span class="badge text-bg-light">{{ $quote->status_label }}</span></td>
                                    <td>Rs {{ number_format($quote->estimated_amount) }}</td>
                                    <td>{{ $quote->quoted_amount ? 'Rs ' . number_format($quote->quoted_amount) : '-' }}</td>
                                    <td>{{ $quote->updated_at?->format('d M Y, h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        @if($projects->isEmpty())
            <div class="alert alert-info border-0" style="background:#e0f2fe;color:#075985;">Abhi koi active project assigned nahi hai. Support ke liye <a href="mailto:info@shivatechdigital.com">info@shivatechdigital.com</a> par contact karein.</div>
        @else
            <div class="table-responsive bg-white rounded-4 border">
                <table class="table mb-0 align-middle">
                    <thead style="background:#f1f5f9;">
                        <tr>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Last Update</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>
                                    <strong style="color:#0f172a;">{{ $project->title }}</strong>
                                    <div style="font-size:.78rem;color:#64748b;">{{ $project->project_type ?? 'Project' }}</div>
                                </td>
                                <td><span class="badge text-bg-light">{{ $project->status_label }}</span></td>
                                <td style="min-width:180px;">
                                    <div class="progress" style="height:9px;">
                                        <div class="progress-bar" style="width: {{ $project->progress }}%;"></div>
                                    </div>
                                    <small style="color:#64748b;">{{ $project->progress }}%</small>
                                </td>
                                <td>{{ optional($project->last_updated_at)->format('d M Y, h:i A') ?? '-' }}</td>
                                <td><a class="btn btn-sm btn-outline-primary" href="{{ route('client.portal.show', $project->slug) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>
@endsection
