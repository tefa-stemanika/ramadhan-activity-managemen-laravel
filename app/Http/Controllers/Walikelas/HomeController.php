<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Walikelas;
use App\Models\Kegiatan;

class HomeController extends Controller
{
    public function index() {
        return view('pages.walikelas.home');
    }

    public function chartData() {
        $walikelas = Walikelas::where('username', auth()->user()->username)->first();

        $data = Kegiatan::join('siswa', 'kegiatan.nis', '=', 'siswa.nis')
            ->select('siswa.nama') 
            ->selectRaw('COUNT(*) as total_kegiatan') 
            ->where('siswa.kode_kelas', $walikelas->kode_kelas) 
            ->groupBy('siswa.nama') 
            ->orderByDesc('total_kegiatan')
            ->limit(5)
            ->get();
        return response()->json($data);
    }
}
