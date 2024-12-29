<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaticTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $staticToken = env('STATIC_API_TOKEN', 'default_token');
        $providedToken = $request->header('Authorization');
        \Log::info('Provided Token:', [$providedToken]);
        $providedToken = trim($providedToken);

        if ($providedToken !== 'Bearer ' . $staticToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
