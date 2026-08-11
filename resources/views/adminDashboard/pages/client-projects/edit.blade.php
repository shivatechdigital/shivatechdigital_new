@extends('adminDashboard.index')

@section('title', 'Edit Client Project')

@section('adminDashboard.content')
<div class="container-fluid" style="max-width:980px;">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 mb-0">Edit Client Project</h2><a href="{{ route('admin.client-projects.index') }}" class="btn btn-secondary btn-sm">Back</a></div>
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.client-projects.update', $clientProject) }}" class="card card-body">
        @csrf @method('PUT')
        @include('adminDashboard.pages.client-projects.partials.form', ['clientProject' => $clientProject])
        <div class="mt-3"><button class="btn btn-primary">Update Project</button></div>
    </form>
</div>
@endsection
