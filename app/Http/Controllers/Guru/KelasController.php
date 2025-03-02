<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(Request $request) {
        $search = $request->query('search');

        $data = Kelas::with(['guru', 'siswa'])
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%");
            })
            ->get();

        return view('pages.guru.kelas', compact('data', 'search'));
    }
}
