<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->errorJson('Unauthorized', 403);
        }

        return $next($request);
    }
}
