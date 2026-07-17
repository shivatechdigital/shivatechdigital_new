<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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

        // Not admin
        if (auth()->user()->role !== 'admin') {

            return redirect()->back()
                ->with('error', 'Unauthorized Access');

            // OR:
            // abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}