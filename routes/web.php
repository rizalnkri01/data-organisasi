<?php

use App\Http\Controllers\KetuaDanKomandanController;
use App\Http\Controllers\KondisiOrganisasiController;
use App\Http\Controllers\MediaSocialController;
use App\Http\Controllers\PimpinanKeduaController;
use App\Http\Controllers\ManagementPimpinanUtamaController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\MasaKhidmatController;
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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/media_social', [MediaSocialController::class, 'index'])->name('media_social');
Route::get('/ranting', [PimpinanKeduaController::class, 'index'])->name('ranting');

Route::get('/ketua-dan-komandan', [KetuaDanKomandanController::class, 'index'])->name('ketua-dan-komandan');
Route::get('/masa-khidmat', [MasaKhidmatController::class, 'index'])->name('masa-khidmat');

Route::get('/kondisi-organisasi/baik', [KondisiOrganisasiController::class, 'baik'])->name('kondisi-organisasi.baik');
Route::get('/kondisi-organisasi/kurang-baik', [KondisiOrganisasiController::class, 'kurang_baik'])->name('kondisi-organisasi.kurang-baik');
Route::get('/kondisi-organisasi/tidak-baik', [KondisiOrganisasiController::class, 'tidak_baik'])->name('kondisi-organisasi.tidak-baik');

Route::middleware('admin')->group(function () {
    Route::get('/kecamatan', [PimpinanUtamaController::class, 'index'])->name('kecamatan');
    
    Route::get('/management-kecamatan', [ManagementPimpinanUtamaController::class, 'index'])->name('management-kecamatan');
    Route::post('/management-kecamatan', [ManagementPimpinanUtamaController::class, 'store'])->name('management-kecamatan.store');
    Route::patch('/management-kecamatan/{id}', [ManagementPimpinanUtamaController::class, 'update'])->name('management-kecamatan.update');
    Route::delete('/management-kecamatan/{id}', [ManagementPimpinanUtamaController::class, 'destroy'])->name('management-kecamatan.destroy');

    Route::get('/management-user', [ManagementUserController::class, 'index'])->name('management-user');
    Route::patch('/management-user/{id}', [ManagementUserController::class, 'update'])->name('management-user.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/profile', [ProfileController::class, 'update_2'])->name('profile_2.update');
});

require __DIR__.'/auth.php';
