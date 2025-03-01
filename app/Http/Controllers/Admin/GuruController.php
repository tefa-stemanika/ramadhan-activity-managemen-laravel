<?php

namespace App\Http\Controllers\Admin;

use App\Imports\GuruImport;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuruCreateRequest;
use App\Http\Requests\GuruUpdateRequest;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Guru::query();

        if ($request->has('q')) {
            $query->where('kode', 'like', "%{$request->q}%")
                ->orWhere('nama', 'like', "%{$request->q}%")
                ->orWhere('username', 'like', "%{$request}%");
        }

        $guru = $query->get();

        return view('pages.admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruCreateRequest $request)
    {
        Guru::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'username' => $request->username
        ]);

        notify()->success(("Data guru berhasil ditambahkan!"));

        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('pages.admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuruUpdateRequest $request, Guru $guru)
    {
        $guru->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'username' => $request->username
        ]);

        notify()->success("Data guru berhasil diubah!");
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Guru $guru)
    {
        $guru->delete();

        notify()->success("Data guru berhasil dihapus!");

        return redirect()->route('guru.index');
    }

    public function import(Request $request)
    {
        $guru = new GuruImport();

        $guru->import($request->excel);

        if ($guru->failures()->isNotEmpty()) {
            return back()->withFailures($guru->failures());
        }

        notify()->success('Guru telah berhasil diimpor');

        return back();
    }
}
