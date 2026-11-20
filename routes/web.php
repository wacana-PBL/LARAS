<?php

use App\Http\Controllers\ProfileController;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){

    Route::middleware('Role:mahasiswa')
        ->prefix('mahasiswa')
        ->name('mahasiswa.')
        ->controller(Mahasiswa::class)
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
        });
    Route::middleware('Role:dosen')
        ->prefix('dosen')
        ->name('dosen.')
        ->controller(Dosen::class)
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
        });
    Route::middleware('Role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->controller(Mahasiswa::class)
        ->group(function (){
            Route::get('/dashboard', 'index')->name('dashboard');
        });
});


require __DIR__.'/auth.php';
