@extends('adminDashboard.index')

@section('title', 'Quote Options')

@section('adminDashboard.content')
<div class="container-fluid">
    <h2 class="h4 mb-3">Quote Calculator Options</h2>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

    <div class="card mb-3">
        <div class="card-header">Add Option</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.quote-options.store') }}" class="row g-2">
                @csrf
                <div class="col-md-2"><input name="option_key" class="form-control" placeholder="project_website" required></div>
                <div class="col-md-3"><input name="label" class="form-control" placeholder="Business Website" required></div>
                <div class="col-md-2"><input name="base_price" type="number" min="0" class="form-control" placeholder="35000" required></div>
                <div class="col-md-2"><input name="sort_order" type="number" min="0" class="form-control" placeholder="0"></div>
                <div class="col-md-2"><select name="is_active" class="form-select"><option value="1">Active</option><option value="0">Inactive</option></select></div>
                <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
            </form>
        </div>
    </div>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Key</th><th>Label</th><th>Base Price</th><th>Status</th><th>Action</th></tr></thead>
            <tbody>
                @forelse($options as $option)
                    <tr>
                        <td>{{ $option->option_key }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.quote-options.update', $option) }}" class="row g-1 align-items-center">
                                @csrf @method('PUT')
                                <div class="col-md-3"><input name="option_key" value="{{ $option->option_key }}" class="form-control form-control-sm" required></div>
                                <div class="col-md-3"><input name="label" value="{{ $option->label }}" class="form-control form-control-sm" required></div>
                                <div class="col-md-2"><input name="base_price" type="number" min="0" value="{{ $option->base_price }}" class="form-control form-control-sm" required></div>
                                <div class="col-md-2"><input name="sort_order" type="number" min="0" value="{{ $option->sort_order }}" class="form-control form-control-sm"></div>
                                <div class="col-md-1"><select name="is_active" class="form-select form-select-sm"><option value="1" {{ $option->is_active ? 'selected' : '' }}>1</option><option value="0" {{ !$option->is_active ? 'selected' : '' }}>0</option></select></div>
                                <div class="col-md-1"><button class="btn btn-sm btn-primary">Save</button></div>
                            </form>
                        </td>
                        <td>Rs {{ number_format($option->base_price) }}</td>
                        <td>{!! $option->is_active ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>' !!}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.quote-options.destroy', $option) }}" onsubmit="return confirm('Delete this option?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No quote options found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
