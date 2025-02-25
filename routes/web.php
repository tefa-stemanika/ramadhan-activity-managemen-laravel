<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/siswa');
})->name('siswa.home');

Route::get('/siswa', [App\Http\Controllers\Siswa\HomeController::class, 'index'])->name('siswa.home');
Route::get('/siswa/jadwal-sholat', [App\Http\Controllers\Siswa\JadwalSholatController::class, 'index'])->name('siswa.jadwal-sholat');
Route::get('/siswa/kegiatan/rekap', [App\Http\Controllers\Siswa\KegiatanController::class, 'index'])->name('siswa.kegiatan.rekap');
Route::get('/siswa/kegiatan/insert', [App\Http\Controllers\Siswa\KegiatanController::class, 'create'])->name('siswa.kegiatan.insert');