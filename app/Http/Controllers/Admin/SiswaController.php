<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kegiatan;
use App\Imports\SiswaImport;
use App\Http\Requests\SiswaCreateRequest;
use App\Http\Requests\SiswaUpdateRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Siswa::with('kelas')->orderBy('nis');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nis', 'like', "%$search%")
                ->orWhere('nama', 'like', "%$search%");
        }

        $data = $query->paginate(20);

        return view('pages.admin.siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaCreateRequest $request)
    {
        Siswa::create($request->validated());

        notify()->success('Siswa berhasil ditambahkan');

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $nis, Request $request)
    {
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

        return view('pages.admin.siswa.detail', compact('data', 'kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::where('id', $id)->firstOrFail();
        return view('pages.admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiswaUpdateRequest $request, string $id)
    {
        $siswa = Siswa::where('id', $id)->firstOrFail();

        $siswa->update($request->validated());

        notify()->success('Data siswa berhasil diperbarui');

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::where('id', $id)->firstOrFail();
        $siswa->delete();

        notify()->success('Siswa berhasil dihapus');
        return redirect()->route('siswa.index');
    }

    public function import(Request $request) {
        $siswa = new SiswaImport();

        $siswa->import($request->excel);

        if($siswa->failures()->isNotEmpty()) {
            return back()->withFailures($siswa->failures());
        }

        notify()->success('Siswa telah berhasil diimpor');

        return back();
    }
}
