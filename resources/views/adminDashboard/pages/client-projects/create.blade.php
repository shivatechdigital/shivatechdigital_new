@extends('adminDashboard.index')

@section('title', 'Add Client Project')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:980px;">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Add Client Project</h2><a href="{{ route('admin.client-projects.index') }}" class="btn btn-secondary btn-sm">Back</a></div>
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.client-projects.store') }}" class="card card-body">
        @csrf
        @include('adminDashboard.pages.client-projects.partials.form', ['clientProject' => null])
        <div class="mt-3"><button class="btn btn-primary">Save Project</button></div>
    </form>
</div>
@endsection
