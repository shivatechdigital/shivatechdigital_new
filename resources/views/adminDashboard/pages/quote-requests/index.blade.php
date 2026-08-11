@extends('adminDashboard.index')

@section('title', 'Quote Requests')

@section('adminDashboard.content')
<div class="container-fluid">
    <h2 class="h4 mb-3">Quote Requests</h2>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4"><input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search name/email/project"></div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                @foreach($statusLabels as $key => $label)
                    <option value="{{ $key }}" {{ $status === $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Client</th><th>Project</th><th>Estimate</th><th>Manage Quotation</th></tr></thead>
            <tbody>
                @forelse($quoteRequests as $quoteRequest)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $quoteRequest->name }}</div>
                            <small class="text-muted">{{ $quoteRequest->email }}{{ $quoteRequest->phone ? ' | ' . $quoteRequest->phone : '' }}</small>
                        </td>
                        <td>{{ ucwords(str_replace('_', ' ', $quoteRequest->project_type)) }}</td>
                        <td>Rs {{ number_format($quoteRequest->estimated_amount) }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.quote-requests.update', $quoteRequest) }}" class="row g-1 align-items-center">
                                @csrf @method('PUT')
                                <div class="col-md-2">
                                    <select name="status" class="form-select form-select-sm">
                                        @foreach($statusLabels as $key => $label)
                                            <option value="{{ $key }}" {{ $quoteRequest->status === $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"><input type="number" min="0" name="quoted_amount" value="{{ $quoteRequest->quoted_amount }}" class="form-control form-control-sm" placeholder="Quoted amount"></div>
                                <div class="col-md-3"><input type="text" name="quotation_message" value="{{ $quoteRequest->quotation_message }}" class="form-control form-control-sm" placeholder="Quotation message"></div>
                                <div class="col-md-3"><input type="text" name="admin_note" value="{{ $quoteRequest->admin_note }}" class="form-control form-control-sm" placeholder="Admin note"></div>
                                <div class="col-md-1"><button class="btn btn-sm btn-primary w-100">Save</button></div>
                                <div class="col-md-1">
                                    <a href="{{ route('admin.quote-requests.quotation', $quoteRequest) }}" class="btn btn-sm btn-outline-secondary w-100">Quotation</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4 text-muted">No quote requests found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $quoteRequests->links() }}</div>
</div>
@endsection
