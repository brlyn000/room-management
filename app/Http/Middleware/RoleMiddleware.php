<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek jika pengguna memiliki peran yang sesuai
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            // Jika tidak sesuai, redirect ke halaman yang sesuai
            return redirect('/rooms');
        }

        return $next($request);
    }
}