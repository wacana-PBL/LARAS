<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::middleware('Role:mahasiswa')
        ->prefix('mahasiswa')
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::post('/create', 'store')->name('create');
            Route::get('/pengajuan/jadwal', [JadwalController::class, 'create'])->name('pengajuan.jadwal');
            Route::post('/create/pengajuan/jadwal', [JadwalController::class, 'store'])->name('create.pengajuan.jadwal');

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

            //Jadwal Routes
            Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
            Route::get('/jadwal/{bulan}', [JadwalController::class, 'show'])->name('jadwal');
            Route::get('/pengajuan/antrean', [PengajuanController::class, 'show'])->name('pengajuan.antrean');
            Route::get('/create/jadwal/form',[JadwalController::class,'create'])->name('create.jadwal.form');
            Route::post('/store/jadwal',[JadwalController::class,'store'])->name('store.jadwal');
            Route::get('/edit/jadwal/{id}', [JadwalController::class, 'edit'])->name('edit.jadwal');
            Route::put('/update/jadwal/{id}', [JadwalController::class, 'update'])->name('update.jadwal');
            Route::delete('/delete/jadwal/{id}', [JadwalController::class, 'destroy'])->name('delete.jadwal');

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


require __DIR__.'/auth.php';
