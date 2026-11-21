<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route Khusus Role Dosen
Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', fn() => view('dosen.dashboard'))->name('dashboard');
    Route::get('/bimbingan', fn() => view('dosen.bimbingan'))->name('bimbingan');
    Route::get('/pengajuan', fn() => view('dosen.pengajuan'))->name('pengajuan');
    Route::get('/jadwal', fn() => view('dosen.jadwal'))->name('jadwal');
    Route::get('/profil', fn() => view('dosen.profil'))->name('profil');
});

//require __DIR__.'/auth.php';
