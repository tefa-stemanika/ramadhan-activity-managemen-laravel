<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Walikelas;
use App\Imports\WalikelasImport;
use App\Http\Requests\WalikelasCreateRequest;
use App\Http\Requests\WalikelasUpdateRequest;

class WalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Walikelas::orderBy('kode_kelas');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%$search%");
        }

        $data = $query->paginate(15);

        return view('pages.admin.walikelas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.walikelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WalikelasCreateRequest $request)
    {
        Walikelas::create($request->validated());

        notify()->success('Walikelas berhasil ditambahkan');

        return redirect()->route('walikelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Walikelas $walas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Walikelas $walas)
    {
        return view('pages.admin.walikelas.edit', compact('walas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WalikelasUpdateRequest $request, Walikelas $walas)
    {
        $walas->update($request->validated());

        notify()->success('Data walikelas berhasil diperbarui');

        return redirect()->route('walikelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walikelas $walas)
    {
        $walas->delete();

        notify()->success('Walikelas berhasil dihapus');

        return redirect()->route('walikelas.index');
    }

    public function import(Request $request)
    {
        $walas = new WalikelasImport();

        $walas->import($request->excel);

        if ($walas->failures()->isNotEmpty()) {
            return back()->withFailures($walas->failures());
        }

        notify()->success('Walikelas telah berhasil diimpor');

        return back();
    }
}
