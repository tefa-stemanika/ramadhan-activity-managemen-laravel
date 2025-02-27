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
Route::prefix('admin')->group(function () {
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
    ]);
});