<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('rooms.index')->with('error', 'Akses ditolak, hanya admin yang dapat melakukan ini.');
        }
    
        return $next($request);
    }
}
