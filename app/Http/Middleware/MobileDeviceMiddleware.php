<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MobileDeviceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $agent = $request->header('User-Agent');

        if (str_contains($agent, 'Mobile')) {
            $request->attributes->add(['is_mobile' => true]);
        } else {
            $request->attributes->add(['is_mobile' => false]);
        }

        return $next($request);
    }
}
