<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::middleware('Role:mahasiswa')
        ->prefix('mahasiswa')
        ->controller(MahasiswaController::class)
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::post('/create', 'store')->name('create');
        });
    Route::middleware('Role:dosen')
        ->prefix('dosen')
        ->name('dosen.')
        ->controller(DosenController::class)
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
        });
    Route::middleware('Role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function (){
            Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');

            //Dosen Routes
            Route::get('/display/dosen', [DosenController::class, 'index'])->name('dosen');
            Route::get('/create/dosen/form',[DosenController::class,'create'])->name('create.dosen.form');
            Route::post('/store/dosen',[DosenController::class,'store'])->name('store.dosen');
            Route::get('/edit/dosen/{id}', [DosenController::class, 'edit'])->name('edit.dosen');
            Route::put('/update/dosen/{id}', [DosenController::class, 'update'])->name('update.dosen');
            Route::delete('/delete/dosen/{id}', [DosenController::class, 'destroy'])->name('delete.dosen');

            //Mahasiswa Routes
            Route::post('/store/mahasiswa',[MahasiswaController::class,'store'])->name('store.mahasiswa');




        });
    });



// Route Khusus Role Dosen
Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', fn() => view('dosen.dashboard'))->name('dashboard');
    Route::get('/bimbingan', fn() => view('dosen.bimbingan'))->name('bimbingan');
    Route::get('/pengajuan', fn() => view('dosen.pengajuan'))->name('pengajuan');
    Route::get('/jadwal', fn() => view('dosen.jadwal'))->name('jadwal');
    Route::get('/profil', fn() => view('dosen.profil'))->name('profil');
    Route::get('/detail-penilaian', fn() => view('dosen.detail-penilaian'))->name('detail-penilaian');
});

require __DIR__.'/auth.php';
