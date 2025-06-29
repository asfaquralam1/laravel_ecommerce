<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // switch($guard){
        //     //Redirecting Authenticated Admin To Dashboard Page
        //     case 'admin':
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::ADMIN);
        //         }
        //         break;
        //     default:
        //     //Redirecting the user to the website homepage ('/')
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::HOME);
        //         }
        //         break;
        // }

        return $next($request);
    }
}
