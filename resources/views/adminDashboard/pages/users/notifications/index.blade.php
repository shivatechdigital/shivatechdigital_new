@extends('adminDashboard.index')

@section('title', 'Notifications')

@section('adminDashboard.content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Notifications</h2>
        <form method="POST" action="{{ route('admin.notifications.read-all') }}">
            @csrf
            <button type="submit" class="btn btn-outline-primary">Mark All as Read</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="list-group">
                @forelse($notifications as $notification)
                    <a href="{{ route('admin.notifications.open', $notification->id) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-start {{ $notification->read_at ? '' : 'list-group-item-info' }}">
                        <div class="me-3">
                            <h6 class="mb-1">{{ $notification->data['title'] ?? 'Notification' }}</h6>
                            <p class="mb-1 text-secondary">{{ $notification->data['message'] ?? '' }}</p>
                            <small class="text-muted">{{ $notification->created_at?->diffForHumans() }}</small>
                        </div>
                        @if(is_null($notification->read_at))
                            <span class="badge bg-primary">New</span>
                        @endif
                    </a>
                @empty
                    <div class="text-center text-muted py-4">No notifications available.</div>
                @endforelse
            </div>

            <div class="mt-3">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
