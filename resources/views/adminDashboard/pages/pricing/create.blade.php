@extends('adminDashboard.index')

@section('title', 'Add Pricing Plan')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:920px;">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Add Pricing Plan</h2><a href="{{ route('admin.pricing.index') }}" class="btn btn-secondary btn-sm">Back</a></div>
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.pricing.store') }}" class="card card-body">
        @csrf
        @include('adminDashboard.pages.pricing.partials.form', ['plan' => null])
        <div class="mt-3"><button class="btn btn-primary">Save Plan</button></div>
    </form>
</div>
@endsection
