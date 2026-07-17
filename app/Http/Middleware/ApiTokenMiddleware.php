<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('X-API-Token');
        $validToken = config('services.crm.token');

        if (!$validToken) {
            return response()->json([
                'success' => false,
                'message' => 'API token not configured on server',
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'API token missing in request',
            ], 401);
        }

        if (!hash_equals($validToken, $token)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized — Invalid API Token',
            ], 401);
        }

        return $next($request);
    }
}