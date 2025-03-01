<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index() {
        return view('pages.guru.data-siswa.kegiatan');
    }
}
