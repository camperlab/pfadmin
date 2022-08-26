<?php

namespace App\Http\Middleware;

use Closure;

class TokenAuthenticate
{
    public function handle($request, Closure $next)
    {
        if ($request->bearerToken() !== config('app.token')) {

            return response()->json([
                'status' => 'error',
                'message' => 'Your API key is invalid or incorrect.'
            ], 401);
        }

        return $next($request);
    }
}
