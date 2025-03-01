<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasCreateRequest;
use App\Http\Requests\KelasUpdateRequest;
use App\Imports\KelasImport;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('pages.admin.kelas.index', [
            'data' => Kelas::orderBy('nama')->when($request->search, function ($q) use ($request) {
                $q->where('kode', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('nama', 'LIKE', '%' . $request->search . '%');
            })->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelasCreateRequest $request)
    {
        Kelas::create($request->validated());

        notify()->success("Kelas telah berhasil dibuat");

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        return view('pages.admin.kelas.detail', [
            'data' => $kelas
        ]);
    }

    public function detail_kegiatan(Kelas $kelas, Siswa $siswa)
    {
        return view('pages.admin.kelas.detail-kegiatan-siswa', [
            'data' => $siswa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Kelas $kelas)
    {
        return view('pages.admin.kelas.edit', [
            'data' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelasUpdateRequest $request, Kelas $kelas)
    {
        $kelas->update($request->validated());

        notify()->success("Kelas telah berhasil diubah");

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Kelas $kelas)
    {
        $kelas->delete();

        notify()->success("Kelas telah berhasil dihapus");

        return redirect()->route('kelas.index');
    }

    public function import(Request $request)
    {
        $kelas = new KelasImport();

        $kelas->import($request->excel);

        if ($kelas->failures()->isNotEmpty()) {
            return back()->withFailures($kelas->failures());
        }

        notify()->success('Kelas telah berhasil diimpor');

        return back();
    }
}
