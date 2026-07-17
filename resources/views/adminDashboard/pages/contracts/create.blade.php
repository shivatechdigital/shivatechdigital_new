@extends('adminDashboard.index')

@section('title', 'Create Contract')

@section('adminDashboard.content')
<div class="container">
    <h1>Create Mobile App Development Contract</h1>

    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf

        <h4>Top Section</h4>
        <div class="mb-3">
            <label>Client Name (Sample Client)</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Client Company (optional)</label>
            <input type="text" name="client_company" class="form-control">
        </div>

        <div class="mb-3">
            <label>Developer Name</label>
            <input type="text" name="developer_name" class="form-control" value="shivatechdigital">
        </div>

        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="India">
        </div>

        <div class="mb-3">
            <label>Contract Date</label>
            <input type="date" name="contract_date" class="form-control" required>
        </div>

        <hr>

        <h4>1. Work and Payment</h4>

        <div class="mb-3">
            <label>Project Details (Details to be provided)</label>
            <textarea name="project_details" rows="3" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Schedule Text (e.g. "and will continue until the work is completed")</label>
            <input type="text" name="schedule_text" class="form-control"
                   value="and will continue until the work is completed">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Total Fee (₹35,000)</label>
                <input type="number" step="0.01" name="total_fee" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Advance Before Work (₹5,000)</label>
                <input type="number" step="0.01" name="advance_fee" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Invoice Due Days (15 days)</label>
                <input type="number" name="invoice_due_days" class="form-control" value="15">
            </div>
            <div class="col-md-6 mb-3">
                <label>Late Fee % (2.0)</label>
                <input type="number" step="0.01" name="late_fee_percent" class="form-control" value="2.0">
            </div>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1"
                   id="support_after_acceptance" name="support_after_acceptance">
            <label class="form-check-label" for="support_after_acceptance">
                Developer will provide support after client accepts the deliverables
                (agar unchecked raha to "will not provide support")
            </label>
        </div>

        <hr>

        <h4>Editable Clauses (yellow paragraphs)</h4>

        <div class="mb-3">
            <label>2.2 Developer's Use Of Work Product (portfolio wali line)</label>
            <textarea name="section_2_2_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>2.4 Developer's IP That Is Not Work Product</label>
            <textarea name="section_2_4_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>4. Non-Solicitation paragraph (agar change karna ho)</label>
            <textarea name="section_4_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>5.6 Client Will Review Work</label>
            <textarea name="section_5_6_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>6. Term and Termination (whole highlighted sentence)</label>
            <textarea name="section_6_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>10.1 Indemnity Overview</label>
            <textarea name="section_10_1_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>11.3 Modification; Waiver</label>
            <textarea name="section_11_3_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>11.5 Severability</label>
            <textarea name="section_11_5_text" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Governing Law Country (India)</label>
            <input type="text" name="governing_law_country" class="form-control" value="India">
        </div>

        <button type="submit" class="btn btn-primary">Save Contract</button>
    </form>
</div>
@endsection
