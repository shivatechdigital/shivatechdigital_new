@extends('adminDashboard.index')

@section('title', 'Prepare Quotation')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:1100px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Prepare Quotation</h2>
        <a href="{{ route('admin.quote-requests.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    @php
        $items = old('items', $quoteRequest->quotation_line_items ?: [['name' => ucwords(str_replace('_', ' ', $quoteRequest->project_type)) . ' Package', 'qty' => 1, 'rate' => (int) ($quoteRequest->quoted_amount ?: $quoteRequest->estimated_amount)]]);
        $terms = old('quotation_terms', $quoteRequest->quotation_terms ?: "50% advance on kickoff\n30% on development completion\n20% before final deployment");
    @endphp

    <form method="POST" action="{{ route('admin.quote-requests.quotation.save', $quoteRequest) }}">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Quotation Number</label>
                        <input type="text" name="quotation_number" class="form-control" value="{{ old('quotation_number', $quoteRequest->quotation_number) }}" placeholder="STD-20260811-0001">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valid Till</label>
                        <input type="date" name="quotation_valid_till" class="form-control" value="{{ old('quotation_valid_till', optional($quoteRequest->quotation_valid_till)->format('Y-m-d')) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Client</label>
                        <input type="text" class="form-control" value="{{ $quoteRequest->name }} ({{ $quoteRequest->email }})" readonly>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Subject</label>
                        <input type="text" name="quotation_subject" class="form-control" value="{{ old('quotation_subject', $quoteRequest->quotation_subject) }}" placeholder="Quotation for Website Development">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Line Items</div>
            <div class="card-body">
                @for($i = 0; $i < 5; $i++)
                    <div class="row g-2 mb-2">
                        <div class="col-md-7"><input type="text" name="items[{{ $i }}][name]" class="form-control" value="{{ $items[$i]['name'] ?? '' }}" placeholder="Service item"></div>
                        <div class="col-md-2"><input type="number" min="1" name="items[{{ $i }}][qty]" class="form-control" value="{{ $items[$i]['qty'] ?? 1 }}" placeholder="Qty"></div>
                        <div class="col-md-3"><input type="number" min="0" name="items[{{ $i }}][rate]" class="form-control" value="{{ $items[$i]['rate'] ?? 0 }}" placeholder="Rate"></div>
                    </div>
                @endfor
                <div class="row g-3 mt-1">
                    <div class="col-md-3">
                        <label class="form-label">Discount (Rs)</label>
                        <input type="number" min="0" name="quotation_discount" class="form-control" value="{{ old('quotation_discount', $quoteRequest->quotation_discount ?? 0) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tax %</label>
                        <input type="number" min="0" max="100" step="0.01" name="quotation_tax_percent" class="form-control" value="{{ old('quotation_tax_percent', $quoteRequest->quotation_tax_percent ?? 0) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Quotation Message</label>
                    <textarea name="quotation_message" class="form-control" rows="5" placeholder="Thank you for considering Shiva Tech Digital.">{{ old('quotation_message', $quoteRequest->quotation_message) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Terms</label>
                    <textarea name="quotation_terms" class="form-control" rows="5" placeholder="One term per line">{{ $terms }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mb-4">
            <button class="btn btn-primary" type="submit">Save Quotation</button>
            <a href="{{ route('admin.quote-requests.download-doc', $quoteRequest) }}" class="btn btn-outline-secondary">Download DOC</a>
            <a href="{{ route('admin.quote-requests.download-pdf', $quoteRequest) }}" class="btn btn-outline-danger">Download PDF</a>
        </div>
    </form>

    <div class="card">
        <div class="card-header">Preview Snapshot</div>
        <div class="card-body">
            @include('adminDashboard.pages.quote-requests.exports.pdf', ['quoteRequest' => $quoteRequest])
        </div>
    </div>
</div>
@endsection
