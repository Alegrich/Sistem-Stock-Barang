<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna memiliki peran staff
        if (!auth()->check() || auth()->user()->role !== 'staf') {
            abort(403, 'Akses Tidak Sah');
        }

        return $next($request);
    }
}
