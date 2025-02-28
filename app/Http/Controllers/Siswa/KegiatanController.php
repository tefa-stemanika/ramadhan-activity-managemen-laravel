<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanCreateRequest;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::where('nis', auth()->user()->Siswa->nis)
            ->when($request->search, function ($query) use ($request) {
                $query
                    ->where('nis', 'like', '%' . $request->search . '%')
                    ->orWhere('jenis_kegiatan', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            })
            ->when($request->tanggal, function ($query) use ($request) {
                $query
                    ->whereDate('created_at', $request->tanggal);
            })
            ->latest()
            ->get();

            $request->flash();

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
            'foto' => $this->store_image_as_text($request->file('foto')),
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

    public function store_image_as_text($file)
    {
        // Baca konten file gambar
        $imageContent = file_get_contents($file->getRealPath());

        // Konversi konten gambar ke Base64
        return 'data:image/jpeg;base64,' . base64_encode($imageContent);
    }
}
