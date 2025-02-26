<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('pages.siswa.kegiatan.index');
    }

    public function create()
    {
        return view('pages.siswa.kegiatan.insert');
    }
}
