<?php

namespace App\Http\Middleware;

use Closure;

class CompanyMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'company') {
            return response()->errorJson('Unauthorized', 403);
        }

        return $next($request);
    }
}
