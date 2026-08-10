@php
    $topbarUser = auth()->user();
    $hasNotificationsTable = \Illuminate\Support\Facades\Schema::hasTable('notifications');
    $unreadCount = ($topbarUser && $hasNotificationsTable) ? $topbarUser->unreadNotifications()->count() : 0;
    $recentNotifications = ($topbarUser && $hasNotificationsTable)
        ? $topbarUser->notifications()->latest()->limit(8)->get()
        : collect();
@endphp

<div class="navbar-header">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-4">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                </button>
                <form class="navbar-search">
                    <input type="text" name="search" placeholder="Search">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
            </div>
        </div>

        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button type="button" data-theme-toggle
                    class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>

                <div class="dropdown">
                    <button
                        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="iconoir:bell" class="text-primary-light text-xl"></iconify-icon>
                    </button>

                    <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                        <div class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                            <h6 class="text-lg text-primary-light fw-semibold mb-0">Notifications</h6>
                            <span class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">{{ $unreadCount }}</span>
                        </div>

                        <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                            @forelse($recentNotifications as $notification)
                                <a href="{{ route('admin.notifications.open', $notification->id) }}"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between {{ $notification->read_at ? '' : 'bg-neutral-50' }}">
                                    <div class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                        <span class="w-44-px h-44-px bg-info-subtle text-info-main rounded-circle d-flex justify-content-center align-items-center flex-shrink-0">
                                            <iconify-icon icon="solar:bell-bing-outline" class="icon text-lg"></iconify-icon>
                                        </span>
                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">{{ $notification->data['title'] ?? 'Notification' }}</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-200-px">
                                                {{ \Illuminate\Support\Str::limit($notification->data['message'] ?? '', 80) }}
                                            </p>
                                        </div>
                                    </div>
                                    <span class="text-sm text-secondary-light flex-shrink-0">{{ $notification->created_at?->diffForHumans() }}</span>
                                </a>
                            @empty
                                <div class="px-24 py-16 text-center text-secondary-light">No notifications yet.</div>
                            @endforelse
                        </div>

                        <div class="text-center py-12 px-16 d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.notifications.index') }}" class="text-primary-600 fw-semibold text-md">See All</a>
                            <form method="POST" action="{{ route('admin.notifications.read-all') }}">
                                @csrf
                                <button type="submit" class="btn btn-link text-primary-600 fw-semibold text-md p-0">Mark all read</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('admin_assets/images/user.png') }}" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
                    </button>
                    <div class="dropdown-menu to-top dropdown-menu-sm">
                        <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                            <div>
                                <h6 class="text-lg text-primary-light fw-semibold mb-2">{{ $topbarUser?->name ?? 'User' }}</h6>
                                <span class="text-secondary-light fw-medium text-sm">{{ ucfirst(str_replace('_', ' ', $topbarUser?->role ?? 'user')) }}</span>
                            </div>
                        </div>
                        <ul class="to-top-list">
                            <li>
                                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                    href="{{ route('admin.profile.edit') }}">
                                    <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> My Profile
                                </a>
                            </li>
                            @if($topbarUser && ($topbarUser->role === 'admin' || $topbarUser->hasPermission('sitedetails.manage')))
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="{{ route('sitedetails') }}">
                                        <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon> Setting
                                    </a>
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">
                                        <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>