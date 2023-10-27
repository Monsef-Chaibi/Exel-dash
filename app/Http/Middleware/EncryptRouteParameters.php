<?php

namespace App\Http\Middleware;

use Closure;

class EncryptRouteParameters
{
    public function handle($request, Closure $next)
    {
        // Check if the route parameter 'id' is present and not empty
        if ($request->has('id')) {
            // Encrypt the 'id' parameter
            $request->route()->setParameter('id', encrypt($request->route('id')));
        }

        return $next($request);
    }
}
