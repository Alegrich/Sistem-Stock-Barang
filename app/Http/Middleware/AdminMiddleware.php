<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is not authenticated or if the user role is not admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Redirect to the login page
            return redirect()->route('login');
        }

        // Proceed with the request if the user is an admin
        return $next($request);
    }
}
