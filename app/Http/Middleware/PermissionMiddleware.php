<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();

        if ($user->role === 'admin') {
            return $next($request);
        }

        if (!$user->hasPermission($permission)) {
            Log::channel('rbac')->warning('RBAC forbidden access', [
                'guard' => 'permission',
                'permission' => $permission,
                'user_id' => $user->id,
                'user_email' => $user->email,
                'role' => $user->role,
                'method' => $request->method(),
                'route' => optional($request->route())->getName(),
                'path' => $request->path(),
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
            ]);

            abort(403, 'You do not have permission for this action.');
        }

        return $next($request);
    }
}
