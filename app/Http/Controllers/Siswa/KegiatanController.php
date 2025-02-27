<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanCreateRequest;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('nis', auth()->user()->Siswa->nis)->get();

        return view('pages.siswa.kegiatan.index', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function create()
    {
        return view('pages.siswa.kegiatan.create');
    }

    public function store(KegiatanCreateRequest $request)
    {
        Kegiatan::create([
            'nis' => auth()->user()->Siswa->nis,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'deskripsi' => $request->deskripsi,
            'foto' => $this->store_image($request->file('foto')),
        ]);

        return redirect()->route('siswa.home');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        notify()->success("Kegiatan telah berhasil dihapus");

        return redirect()->back();
    }

    public function store_image($file)
    {
        $extension = $file->getClientOriginalExtension();

        $filename = time() . '.' . $extension;

        $path = 'uploads/';

        $movedFile = $file->move($path, $filename);

        return $movedFile->getPathname();
    }
}
