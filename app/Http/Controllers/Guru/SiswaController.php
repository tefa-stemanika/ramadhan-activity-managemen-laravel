<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function index(Request $request, $kode_kelas)
    {
        $search = $request->query('search');

        $kelas = Kelas::where('kode', $kode_kelas)->first();

        $data = $kelas->Siswa()->where('kode_kelas', $kode_kelas)
            ->when($search, function ($query) use ($search) {
                $query->where('nis', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");
            })
            ->get();

        return view('pages.guru.data-siswa.home', compact('data', 'search', 'kode_kelas', 'kelas'));
    }
}
