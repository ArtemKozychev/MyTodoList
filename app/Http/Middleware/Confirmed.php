<?php

namespace App\Http\Middleware;

use Closure;

class Confirmed
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->verified) {
            return $next($request);
        }
        abort(401, 'Confirm your email.');
    }
}
