<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalSholat;
use Illuminate\Http\Request;

class JadwalSholatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = JadwalSholat::query();

    if ($request->has('q')) {
        $query->where('tanggal', 'like', "%{$request->q}%");
    }

    $jadwal_sholat = $query->get()->map(function ($jadwal) {
        return [
            'id' => $jadwal->id,
            'tanggal' => \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y'),
            'imsak' => \Carbon\Carbon::parse($jadwal->imsak)->format('H:i'),
            'subuh' => \Carbon\Carbon::parse($jadwal->subuh)->format('H:i'),
            'terbit' => \Carbon\Carbon::parse($jadwal->terbit)->format('H:i'),
            'dhuha' => \Carbon\Carbon::parse($jadwal->dhuha)->format('H:i'),
            'dzuhur' => \Carbon\Carbon::parse($jadwal->dzuhur)->format('H:i'),
            'ashar' => \Carbon\Carbon::parse($jadwal->ashar)->format('H:i'),
            'maghrib' => \Carbon\Carbon::parse($jadwal->maghrib)->format('H:i'),
            'isya' => \Carbon\Carbon::parse($jadwal->isya)->format('H:i'),
        ];
    });

    return view('pages.admin.jadwal-sholat.index', compact('jadwal_sholat'));
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
}
