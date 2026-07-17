@extends('adminDashboard.index')
@section('title', 'All Query')
@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Queries</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                        <th>Services</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($queries as $query)
                    <tr>
                        <td>{{ $query->name }}</td>
                        <td>{{ $query->email }}</td>
                        <td>{{ $query->contact }}</td>
                        <td>{{ $query->service }}</td>
                        <td>
                            <a href="{{ route('admin.servicecontact.edit', $query) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.servicecontact.destroy', $query) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No Query found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $queries->links() }}
        </div>
    </div>
</div>
@endsection