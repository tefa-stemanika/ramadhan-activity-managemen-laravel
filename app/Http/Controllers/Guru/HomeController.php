<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('pages.guru.home');
    }

    public function charData() {
        $data = [
            ['kelas' => 'XII RPL 1', 'total_kegiatan' => 28],
            ['kelas' => 'XI RPL 1', 'total_kegiatan' => 34],
            ['kelas' => 'X PPLG 1', 'total_kegiatan' => 23],
            ['kelas' => 'XII TJKT 1', 'total_kegiatan' => 26],
            ['kelas' => 'XI TJKT 1', 'total_kegiatan' => 22]
        ];

        return response()->json($data);
    }

    public function profile() {
        return view('pages.guru.profile');
    }
}
