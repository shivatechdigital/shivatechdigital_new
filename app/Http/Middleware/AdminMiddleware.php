<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Not logged in
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        if ($user->role === 'admin') {
            return $next($request);
        }

        if ($user->role === 'user') {
            $this->logForbidden($request, $user, 'role_user_blocked');
            abort(403, 'Unauthorized access.');
        }

        if (!Schema::hasTable('roles')) {
            $this->logForbidden($request, $user, 'roles_table_missing');
            abort(403, 'Unauthorized access.');
        }

        if (!$user->hasPermission('dashboard.view')) {
            $this->logForbidden($request, $user, 'missing_dashboard_view_permission');
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }

    private function logForbidden(Request $request, $user, string $reason): void
    {
        Log::channel('rbac')->warning('Admin guard forbidden access', [
            'guard' => 'admin',
            'reason' => $reason,
            'user_id' => $user->id,
            'user_email' => $user->email,
            'role' => $user->role,
            'method' => $request->method(),
            'route' => optional($request->route())->getName(),
            'path' => $request->path(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
        ]);
    }
}