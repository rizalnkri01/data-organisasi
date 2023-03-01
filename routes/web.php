<?php

use App\Http\Controllers\MediaSocialController;
use App\Http\Controllers\PimpinanKeduaController;
use App\Http\Controllers\PimpinanUtamaController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/kecamatan', [PimpinanUtamaController::class, 'index'])->name('kecamatan');
Route::post('/kecamatan', [PimpinanUtamaController::class, 'store'])->name('kecamatan.store');
Route::patch('/kecamatan/{id}', [PimpinanUtamaController::class, 'update'])->name('kecamatan.update');
Route::delete('/kecamatan/{id}', [PimpinanUtamaController::class, 'destroy'])->name('kecamatan.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/profile', [ProfileController::class, 'update_2'])->name('profile_2.update');
});

require __DIR__.'/auth.php';
