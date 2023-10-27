<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HideRouteContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the request matches the condition to hide content
        if ($request->is('specific/route/*')) {
            return response()->json(['message' => 'Content hidden.'], 200);
        }

        return $next($request);
    }

}
