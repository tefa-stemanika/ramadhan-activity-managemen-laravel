<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role === $role) {
            return $next($request);
        }

        switch (auth()->user()->role) {
            case 'siswa':
                return redirect()->route('siswa.home');
            case 'admin':
                return redirect()->route('admin.home');
            case 'guru':
                return redirect()->route('admin.home');
            case 'walikelas':
                return redirect()->route('admin.home');
        }
    }
}
