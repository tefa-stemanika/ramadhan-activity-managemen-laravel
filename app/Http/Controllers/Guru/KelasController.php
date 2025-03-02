<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::where('username', auth()->user()->username)->first();

        $data = $guru->Kelas()->when($request->search, function ($q) use ($request) {
            $q->where('nama', 'like', "%{$request->search}%");
        })->orderBy('nama')->get();

        $request->flash();

        return view('pages.guru.kelas', [
            'data' => $data
        ]);
    }
}
