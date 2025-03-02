<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
   public function index(Request $request, $nis)
{
    $siswa = Siswa::where('nis', $nis)->firstOrFail();

    // Ambil query search dan filter tanggal dari request
    $search = $request->query('search');
    $tanggal = $request->query('tanggal');

    // Query kegiatan berdasarkan nis dan filter search/tanggal jika ada
    $data = Kegiatan::where('nis', $nis)
        ->when($search, function ($query) use ($search) {
            $query->where('jenis_kegiatan', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        })
        ->when($tanggal, function ($query) use ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('pages.guru.data-siswa.kegiatan', compact('data', 'siswa', 'search', 'tanggal'));
}
}
