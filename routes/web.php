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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'signin'])->name('signin')->middleware('guest');
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

Route::prefix('siswa')->middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Siswa\HomeController::class, 'index'])->name('siswa.home');
    Route::get('/jadwal-sholat', [App\Http\Controllers\Siswa\JadwalSholatController::class, 'index'])->name('siswa.jadwal-sholat');
    Route::get('/kegiatan/create', [App\Http\Controllers\Siswa\KegiatanController::class, 'create'])->name('siswa.kegiatan.create');
    Route::post('/kegiatan/store', [App\Http\Controllers\Siswa\KegiatanController::class, 'store'])->name('siswa.kegiatan.store');
    Route::get('/kegiatan/{kegiatan}/destroy', [App\Http\Controllers\Siswa\KegiatanController::class, 'destroy'])->name('siswa.kegiatan.destroy');
    Route::get('/kegiatan/rekap', [App\Http\Controllers\Siswa\KegiatanController::class, 'index'])->name('siswa.kegiatan.rekap');
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
