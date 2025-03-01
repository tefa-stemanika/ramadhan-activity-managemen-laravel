<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalSholat;
use Carbon\Carbon;

class JadwalSholatController extends Controller
{
    public function index() {

        $tanggalHariIni = Carbon::today()->toDateString();

        $jadwal_sholat = JadwalSholat::whereDate('tanggal', $tanggalHariIni)->get()->map(function ($jadwal) {
            return [
                'imsak' => Carbon::parse($jadwal->imsak)->format('H:i'),
                'subuh' => Carbon::parse($jadwal->subuh)->format('H:i'),
                'terbit' => Carbon::parse($jadwal->terbit)->format('H:i'),
                'dhuha' => Carbon::parse($jadwal->dhuha)->format('H:i'),
                'dzuhur' => Carbon::parse($jadwal->dzuhur)->format('H:i'),
                'ashar' => Carbon::parse($jadwal->ashar)->format('H:i'),
                'maghrib' => Carbon::parse($jadwal->maghrib)->format('H:i'),
                'isya' => Carbon::parse($jadwal->isya)->format('H:i'),
            ];
        });

        return view('pages.walikelas.jadwal-sholat', compact('jadwal_sholat'));
    }
}
