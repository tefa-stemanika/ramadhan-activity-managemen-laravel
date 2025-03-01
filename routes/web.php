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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'signin'])->name('signin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('/siswa');
    })->name('siswa.home');
    Route::get('/logout', function () {
        auth()->logout();
        return redirect()->route('login');
    })->name('logout')->middleware('auth');

    Route::prefix('siswa')->middleware(['role:siswa'])->group(function () {
        Route::get('/', [App\Http\Controllers\Siswa\HomeController::class, 'index'])->name('siswa.home');
        Route::get('/jadwal-sholat', [App\Http\Controllers\Siswa\JadwalSholatController::class, 'index'])->name('siswa.jadwal-sholat');
        Route::get('/kegiatan/create', [App\Http\Controllers\Siswa\KegiatanController::class, 'create'])->name('siswa.kegiatan.create');
        Route::post('/kegiatan/store', [App\Http\Controllers\Siswa\KegiatanController::class, 'store'])->name('siswa.kegiatan.store');
        Route::get('/kegiatan/{kegiatan}/destroy', [App\Http\Controllers\Siswa\KegiatanController::class, 'destroy'])->name('siswa.kegiatan.destroy');
        Route::get('/kegiatan/rekap', [App\Http\Controllers\Siswa\KegiatanController::class, 'index'])->name('siswa.kegiatan.rekap');
    });

    Route::prefix('admin')->middleware(['role:admin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');

        Route::prefix('kelas')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('kelas.index');
            Route::get('/create', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('kelas.create');
            Route::get('/{kelas}/edit', [App\Http\Controllers\Admin\KelasController::class, 'edit'])->name('kelas.edit');
            Route::post('/store', [App\Http\Controllers\Admin\KelasController::class, 'store'])->name('kelas.store');
            Route::put('/{kelas}', [App\Http\Controllers\Admin\KelasController::class, 'update'])->name('kelas.update');
            Route::delete('/{kelas}', [App\Http\Controllers\Admin\KelasController::class, 'destroy'])->name('kelas.destroy');
        });

        Route::resources([
            'user' => App\Http\Controllers\Admin\UserController::class,
            'siswa' => App\Http\Controllers\Admin\SiswaController::class,
            'guru' => App\Http\Controllers\Admin\GuruController::class,
            'walikelas' => App\Http\Controllers\Admin\WalikelasController::class,
            'jadwal-sholat' => \App\Http\Controllers\Admin\JadwalSholatController::class,
        ]);

        //? IMPORT 
        Route::prefix('import')->group(function () {
            Route::post('/user', [App\Http\Controllers\Admin\UserController::class, 'import'])->name('user.import');
            Route::post('/kelas', [App\Http\Controllers\Admin\KelasController::class, 'import'])->name('kelas.import');
            Route::post('/guru', [App\Http\Controllers\Admin\GuruController::class, 'import'])->name('guru.import');
            Route::post('/siswa', [App\Http\Controllers\Admin\SiswaController::class, 'import'])->name('siswa.import');
            Route::post('/walikelas', [App\Http\Controllers\Admin\WalikelasController::class, 'import'])->name('walikelas.import');
            Route::post('/jadwal-sholat', [App\Http\Controllers\Admin\JadwalSholatController::class, 'import'])->name('jadwal-sholat.import');
        });
    });
  
});
