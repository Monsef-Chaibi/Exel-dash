<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){

            if (Auth::user()->role == 1){

                return $next($request);

            }
            elseif(Auth::user()->role == 0){

                return redirect('/DashboardA');

            }
            else{

                return redirect('/DashboardB');

            }
        }

        else {
            return redirect('/login');
        }
    }
}
