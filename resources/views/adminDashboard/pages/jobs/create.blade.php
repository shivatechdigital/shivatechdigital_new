@extends('adminDashboard.index')

@section('title', 'Add Job Opening')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:980px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Add Job Opening</h2>
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>

    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

    <form method="POST" action="{{ route('admin.jobs.store') }}" class="card card-body">
        @csrf
        @include('adminDashboard.pages.jobs.partials.form', ['job' => null])
        <div class="mt-3"><button class="btn btn-primary">Save Job</button></div>
    </form>
</div>
@endsection
