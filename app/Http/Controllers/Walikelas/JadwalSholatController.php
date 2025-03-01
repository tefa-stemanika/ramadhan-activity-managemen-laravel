<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalSholatController extends Controller
{
    public function index() {
        return view('pages.walikelas.jadwal-sholat');
    }
}
