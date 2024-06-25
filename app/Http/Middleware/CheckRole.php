<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->role !== $role) {
            // Redirect if user does not have the required role
            return redirect('/login');
        }

        return $next($request);
    }
}
