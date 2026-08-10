<?php

namespace App\Support;

use App\Models\User;
use App\Notifications\AdminActivityNotification;
use Illuminate\Support\Facades\Schema;

class AdminNotifier
{
    public static function notify(
        string $title,
        string $message,
        ?string $url = null,
        string $eventType = 'general',
        array $meta = []
    ): void {
        if (!Schema::hasTable('notifications')) {
            return;
        }

        $admins = User::query()->where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new AdminActivityNotification($title, $message, $url, $eventType, $meta));
        }
    }
}
