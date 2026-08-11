@extends('adminDashboard.index')

@section('title', 'Pricing Plans')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Pricing Plans</h2>
        @can('pricing.create')<a href="{{ route('admin.pricing.create') }}" class="btn btn-primary btn-sm">Add Plan</a>@endcan
    </div>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <select name="category" class="form-select">
                <option value="all" {{ $category === 'all' ? 'selected' : '' }}>All Categories</option>
                @foreach($categories as $key => $label)<option value="{{ $key }}" {{ $category === $key ? 'selected' : '' }}>{{ $label }}</option>@endforeach
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filter</button></div>
    </form>

    <div class="table-responsive bg-white border rounded-3">
        <table class="table align-middle mb-0">
            <thead class="table-light"><tr><th>Category</th><th>Title</th><th>Price</th><th>Status</th><th>Action</th></tr></thead>
            <tbody>
                @forelse($plans as $plan)
                    <tr>
                        <td>{{ $plan->category_label }}</td>
                        <td>{{ $plan->title }} {!! $plan->is_popular ? '<span class="badge text-bg-warning">Popular</span>' : '' !!}</td>
                        <td>{{ $plan->price_label }}</td>
                        <td>{!! $plan->is_active ? '<span class="badge text-bg-success">Active</span>' : '<span class="badge text-bg-secondary">Inactive</span>' !!}</td>
                        <td class="d-flex gap-1">
                            @can('pricing.update')<a href="{{ route('admin.pricing.edit', $plan) }}" class="btn btn-outline-primary btn-sm">Edit</a>@endcan
                            @can('pricing.delete')
                            <form method="POST" action="{{ route('admin.pricing.destroy', $plan) }}" onsubmit="return confirm('Delete this plan?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No plans found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">{{ $plans->links() }}</div>
</div>
@endsection
