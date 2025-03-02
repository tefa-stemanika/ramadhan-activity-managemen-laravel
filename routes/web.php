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
    Route::get('/profile/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'index'])->name('password.form');
    Route::post('/profile/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

    Route::prefix('siswa')->middleware(['role:siswa', 'not.null:siswa'])->group(function () {
        Route::get('/', [App\Http\Controllers\Siswa\HomeController::class, 'index'])->name('siswa.home');
        Route::get('/profile', [App\Http\Controllers\Siswa\HomeController::class, 'profile'])->name('siswa.profile');
        Route::get('/jadwal-sholat', [App\Http\Controllers\Siswa\JadwalSholatController::class, 'index'])->name('siswa.jadwal-sholat');
        Route::get('/kegiatan/create', [App\Http\Controllers\Siswa\KegiatanController::class, 'create'])->name('siswa.kegiatan.create');
        Route::post('/kegiatan/store', [App\Http\Controllers\Siswa\KegiatanController::class, 'store'])->name('siswa.kegiatan.store');
        Route::get('/kegiatan/{kegiatan}/destroy', [App\Http\Controllers\Siswa\KegiatanController::class, 'destroy'])->name('siswa.kegiatan.destroy');
        Route::get('/kegiatan/rekap', [App\Http\Controllers\Siswa\KegiatanController::class, 'index'])->name('siswa.kegiatan.rekap');
    });

    Route::prefix('walikelas')->middleware(['role:walikelas', 'not.null:walikelas'])->group(function () {
        Route::get('/', [App\Http\Controllers\Walikelas\HomeController::class, 'index'])->name('walikelas.home');
        Route::get('/profile', [App\Http\Controllers\Walikelas\HomeController::class, 'profile'])->name('walikelas.profile');
        Route::get('/siswa', [App\Http\Controllers\Walikelas\DataSiswaController::class, 'index'])->name('walikelas.data.siswa');
        Route::get('/siswa/kegiatan/{nis}', [App\Http\Controllers\Walikelas\DataSiswaController::class, 'show'])->name('walikelas.data.siswa.kegiatan');
        Route::get('/jadwal-sholat', [App\Http\Controllers\Walikelas\JadwalSholatController::class, 'index'])->name('walikelas.jadwal-sholat');
        Route::get('/chart-data', [App\Http\Controllers\Walikelas\HomeController::class, 'chartData'])->name('chart.data.siswa');
    });

    Route::prefix('guru')->middleware(['role:guru', 'not.null:guru'])->group(function () {
        Route::get('/', [App\Http\Controllers\Guru\HomeController::class, 'index'])->name('guru.home');
        Route::get('/profile', [App\Http\Controllers\Guru\HomeController::class, 'profile'])->name('guru.profile');
        Route::get('/kelas', [App\Http\Controllers\Guru\KelasController::class, 'index'])->name('guru.data.kelas');
        Route::get('/kelas/{kode_kelas}/siswa', [App\Http\Controllers\Guru\SiswaController::class, 'index'])->name('guru.data.kelas.siswa');
        Route::get('/kelas/siswa/{nis}/kegiatan', [App\Http\Controllers\Guru\KegiatanController::class, 'index'])->name('guru.data.kelas.siswa.kegiatan');
        Route::get('/jadwal-sholat', [App\Http\Controllers\Guru\JadwalSholatController::class, 'index'])->name('guru.jadwal-sholat');
        Route::get('/chart-data', [App\Http\Controllers\Guru\HomeController::class, 'chartData'])->name('chart.data.kelas');
    });

    Route::prefix('admin')->middleware(['role:admin'])->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');

        Route::prefix('kelas')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('kelas.index');
            Route::get('/create', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('kelas.create');
            Route::get('/{kelas}/edit', [App\Http\Controllers\Admin\KelasController::class, 'edit'])->name('kelas.edit');
            Route::get('/{kelas}', [App\Http\Controllers\Admin\KelasController::class, 'show'])->name('kelas.show');
            Route::get('/{kelas}/{siswa}', [App\Http\Controllers\Admin\KelasController::class, 'detail_kegiatan'])->name('kelas.detail-kegiatan');
            Route::post('/store', [App\Http\Controllers\Admin\KelasController::class, 'store'])->name('kelas.store');
            Route::put('/{kelas}', [App\Http\Controllers\Admin\KelasController::class, 'update'])->name('kelas.update');
            Route::delete('/{kelas}', [App\Http\Controllers\Admin\KelasController::class, 'destroy'])->name('kelas.destroy');
        });

        Route::prefix('walikelas')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\WalikelasController::class, 'index'])->name('walikelas.index');
            Route::get('/create', [App\Http\Controllers\Admin\WalikelasController::class, 'create'])->name('walikelas.create');
            Route::get('/{walikelas}/edit', [App\Http\Controllers\Admin\WalikelasController::class, 'edit'])->name('walikelas.edit');
            Route::post('/store', [App\Http\Controllers\Admin\WalikelasController::class, 'store'])->name('walikelas.store');
            Route::put('/{walikelas}', [App\Http\Controllers\Admin\WalikelasController::class, 'update'])->name('walikelas.update');
            Route::delete('/{walikelas}', [App\Http\Controllers\Admin\WalikelasController::class, 'destroy'])->name('walikelas.destroy');
        });

        Route::resources([
            'user' => App\Http\Controllers\Admin\UserController::class,
            'guru' => App\Http\Controllers\Admin\GuruController::class,
            'siswa' => App\Http\Controllers\Admin\SiswaController::class,
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
