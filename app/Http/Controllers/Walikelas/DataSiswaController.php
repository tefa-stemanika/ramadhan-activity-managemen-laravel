<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Walikelas;
use App\Models\Kegiatan;

class DataSiswaController extends Controller
{
    public function index(Request $request)
    {
        $walikelas = Walikelas::where('username', auth()->user()->username)->first();

            $data = Siswa::with('kelas')
            ->withCount('kegiatan') 
            ->where('kode_kelas', $walikelas->kode_kelas)
            ->when($request->search, function ($query) use ($request) {
                $query->where('nis', 'like', '%' . $request->search . '%')
                    ->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->orderBy('nis')
            ->paginate(20);

        $request->flash();

        return view('pages.walikelas.data-siswa.home', compact('data'));
    }

    public function show(String $nis, Request $request) {
         $data = Siswa::where('nis', $nis)->firstOrFail();

        $search = $request->input('search');
        $tanggal = $request->input('tanggal');

        $kegiatan = Kegiatan::where('nis', $nis);

        if (!empty($tanggal)) {
            $kegiatan->whereDate('created_at', $tanggal);
        }

        if (!empty($search)) {
            $kegiatan->where(function ($query) use ($search) {
                $query->where('jenis_kegiatan', 'LIKE', "%{$search}%")
                    ->orWhere('deskripsi', 'LIKE', "%{$search}%");
            });
        }

        $kegiatan = $kegiatan->paginate(20);

        return view('pages.walikelas.data-siswa.kegiatan', compact('data', 'kegiatan'));
    }
}
