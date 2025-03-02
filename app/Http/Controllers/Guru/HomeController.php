<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Guru;

class HomeController extends Controller
{
    public function index()
    {
        $guru = Guru::where('username', auth()->user()->username)->first();
        return view('pages.guru.home', compact('guru'));
    }

    public function chartData()
    {
        $guru = Guru::where('username', auth()->user()->username)->first();

        $data = Kegiatan::join('siswa', 'kegiatan.nis', '=', 'siswa.nis')
            ->join('kelas', 'siswa.kode_kelas', '=', 'kelas.kode')
            ->where('kelas.kode_guru', $guru->kode_guru)
            ->select('kelas.nama as kelas')
            ->selectRaw('COUNT(*) as total_kegiatan')
            ->groupBy('kelas.nama')
            ->orderByDesc('total_kegiatan')
            ->get();

        return response()->json($data);
    }

    public function profile()
    {
        $guru = Guru::where('username', auth()->user()->username)->first();
        return view('pages.guru.profile', compact('guru'));
    }
}
