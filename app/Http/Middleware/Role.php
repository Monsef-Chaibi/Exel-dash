<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Data;

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

                return response()->view("DashboardA");
            }
            elseif(Auth::user()->role == 2){
                return response()->view('/DashboardB');
            }
            elseif(Auth::user()->role == 3){

                return redirect()->route('dashboardC');
            }
            elseif(Auth::user()->role == 4){
                return response()->view('/DashboardA1');
            }
        }

        else {
            return redirect('/login');
        }
    }
}
