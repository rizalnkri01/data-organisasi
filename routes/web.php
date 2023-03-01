<?php

use App\Http\Controllers\MediaSocialController;
use App\Http\Controllers\PimpinanKeduaController;
use App\Http\Controllers\ManagementPimpinanUtamaController;
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

Route::get('/media_social', [MediaSocialController::class, 'index'])->name('media_social');

Route::get('/ranting', [PimpinanKeduaController::class, 'index'])->name('ranting');

Route::get('/management-kecamatan', [ManagementPimpinanUtamaController::class, 'index'])->name('management-kecamatan');
Route::post('/management-kecamatan', [ManagementPimpinanUtamaController::class, 'store'])->name('management-kecamatan.store');
Route::patch('/management-kecamatan/{id}', [ManagementPimpinanUtamaController::class, 'update'])->name('management-kecamatan.update');
Route::delete('/management-kecamatan/{id}', [ManagementPimpinanUtamaController::class, 'destroy'])->name('management-kecamatan.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/profile', [ProfileController::class, 'update_2'])->name('profile_2.update');
});

require __DIR__.'/auth.php';
