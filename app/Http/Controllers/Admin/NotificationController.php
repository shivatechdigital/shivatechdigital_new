<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if (!Schema::hasTable('notifications')) {
            $notifications = new LengthAwarePaginator([], 0, 20, 1, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);

            return view('adminDashboard.pages.users.notifications.index', compact('notifications'));
        }

        $notifications = $request->user()
            ->notifications()
            ->latest()
            ->paginate(20);

        return view('adminDashboard.pages.users.notifications.index', compact('notifications'));
    }

    public function open(Request $request, string $notificationId): RedirectResponse
    {
        if (!Schema::hasTable('notifications')) {
            return redirect()->route('index');
        }

        $notification = $request->user()
            ->notifications()
            ->where('id', $notificationId)
            ->firstOrFail();

        if ($notification->read_at === null) {
            $notification->markAsRead();
        }

        $targetUrl = (string) ($notification->data['url'] ?? route('index'));

        return redirect()->to($targetUrl);
    }

    public function readAll(Request $request): RedirectResponse
    {
        if (!Schema::hasTable('notifications')) {
            return back();
        }

        $request->user()->unreadNotifications->markAsRead();

        return back()->with('success', 'All notifications marked as read.');
    }
}
