<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        // Check if user is admin
        $user = Auth::user();
        $admin = Admin::where('email', $user->email)->first();

        if ($admin) {
            return $next($request); // Allow access if the user is an admin
        }

        return redirect()->route('home')->with('error', 'You do not have admin access.'); // Redirect if not admin
    }
}
