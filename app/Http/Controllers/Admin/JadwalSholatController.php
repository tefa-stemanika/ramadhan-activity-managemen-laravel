<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\JadwalSholatImport;
use App\Models\JadwalSholat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalSholatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = JadwalSholat::when($request->search, function ($q) use ($request) {
            $parsedTanggal = Carbon::parse($request->search)->format('Y-m-d');
            $q->whereDate('tanggal', 'like', "%$parsedTanggal%");
        })->paginate(15);

        return view('pages.admin.jadwal-sholat.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.jadwal-sholat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \App\Models\JadwalSholat::create([
            'tanggal' => $request->tanggal,
            'imsak' => $request->imsak,
            'subuh' => $request->subuh,
            'terbit' => $request->terbit,
            'dhuha' => $request->dhuha,
            'dzuhur' => $request->dzuhur,
            'ashar' => $request->ashar,
            'maghrib' => $request->maghrib,
            'isya' => $request->isya,
        ]);

        notify()->success(("Jadwal sholat berhasil ditambahkan!"));

        return redirect()->route('jadwal-sholat.index');
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
    public function edit(string $id)
    {
        $jadwal_sholat = JadwalSholat::findOrFail($id);
        return view('pages.admin.jadwal-sholat.edit', compact('jadwal_sholat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jadwal_sholat = JadwalSholat::findOrFail($id);
        $jadwal_sholat->update([
            'tanggal' => $request->tanggal,
            'imsak' => $request->imsak,
            'subuh' => $request->subuh,
            'terbit' => $request->terbit,
            'dhuha' => $request->dhuha,
            'dzuhur' => $request->dzuhur,
            'ashar' => $request->ashar,
            'maghrib' => $request->maghrib,
            'isya' => $request->isya,
        ]);

        notify()->success("Jadwal sholat berhasil diubah!");
        return redirect()->route('jadwal-sholat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JadwalSholat $jadwal_sholat)
    {
        $jadwal_sholat->delete();

        notify()->success("Jadwal sholat berhasil dihapus!");

        return redirect()->route('jadwal-sholat.index');
    }

    public function import(Request $request)
    {
        $jadwal_sholat = new JadwalSholatImport();

        $jadwal_sholat->import($request->excel);

        if ($jadwal_sholat->failures()->isNotEmpty()) {
            return back()->withFailures($jadwal_sholat->failures());
        }

        notify()->success('Jadwal sholat berhasil diimpor');

        return back();
    }
}
