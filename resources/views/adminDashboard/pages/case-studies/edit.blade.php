@extends('adminDashboard.index')

@section('title', 'Edit Case Study')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:960px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Edit Case Study</h2>
        <a href="{{ route('admin.case-studies.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <form method="POST" action="{{ route('admin.case-studies.update', $caseStudy) }}" enctype="multipart/form-data" class="card card-body">
        @csrf @method('PUT')
        @include('adminDashboard.pages.case-studies.partials.form', ['caseStudy' => $caseStudy])
        <div class="mt-3">
            <button class="btn btn-primary">Update Case Study</button>
        </div>
    </form>
</div>
@endsection
