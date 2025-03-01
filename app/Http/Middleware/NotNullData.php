<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Walikelas;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotNullData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        switch ($role) {
            case 'siswa':
                $siswa = Siswa::where('username', auth()->user()->username);
                if (!$siswa->exists()) abort(403, 'Anda tidak memiliki data siswa, silahkan hubungi admin!');

                return $next($request);
            case 'guru':
                $guru = Guru::where('username', auth()->user()->username);
                if (!$guru->exists()) abort(403, 'Anda tidak memiliki data guru, silahkan hubungi admin!');

                return $next($request);
            case 'walikelas':
                $walikelas = Walikelas::where('username', auth()->user()->username);

                if (!$walikelas->exists()) {
                    abort(403, 'Anda tidak memiliki data kelas, silahkan hubungi admin!');
                }

                return $next($request);
            default:
                return $next($request);
        }
    }
}
