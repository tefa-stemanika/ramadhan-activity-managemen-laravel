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


Route::prefix('siswa')->group(function () {
    Route::get('/', [App\Http\Controllers\Siswa\HomeController::class, 'index'])->name('siswa.home');
    Route::get('/jadwal-sholat', [App\Http\Controllers\Siswa\JadwalSholatController::class, 'index'])->name('siswa.jadwal-sholat');
    Route::get('/kegiatan/rekap', [App\Http\Controllers\Siswa\KegiatanController::class, 'index'])->name('siswa.kegiatan.rekap');
    Route::get('/kegiatan/insert', [App\Http\Controllers\Siswa\KegiatanController::class, 'create'])->name('siswa.kegiatan.insert');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
    Route::resources([
        'user' => App\Http\Controllers\Admin\UserController::class,
        'kelas' => App\Http\Controllers\Admin\KelasController::class,
        'siswa' => App\Http\Controllers\Admin\SiswaController::class,
        'guru' => App\Http\Controllers\Admin\GuruController::class,
        'walikelas' => App\Http\Controllers\Admin\WalikelasController::class,
    ]);
});
