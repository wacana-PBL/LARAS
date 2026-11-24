<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::redirect('/', 'login');
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', function (Request $request) {
        return match ($request->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            'dosen' => redirect()->route('dosen.dashboard'),
        };
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('Role:mahasiswa')
        ->prefix('mahasiswa')
        ->name('mahasiswa.')
        ->group(function (){
            Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('dashboard');
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
            Route::get('/jadwal/{tanggal}', [JadwalController::class, 'show'])->name('jadwal.bulan');
            Route::get('/pengajuan/antrean', [PengajuanController::class, 'show'])->name('pengajuan.antrean');
            Route::get('/create/jadwal/form',[JadwalController::class,'create'])->name('create.jadwal.form');
            Route::post('/store/jadwal',[PengajuanController::class,'store'])->name('store.jadwal');
            Route::get('/edit/jadwal/{jadwal}', [JadwalController::class, 'edit'])->name('edit.jadwal');
            Route::put('/update/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('update.jadwal');
            Route::delete('/delete/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('delete.jadwal');

            //Dosen Routes
            Route::get('/display/dosen', [DosenController::class, 'index'])->name('dosen');
            Route::get('/create/dosen/form',[DosenController::class,'create'])->name('create.dosen.form');
            Route::post('/store/dosen',[DosenController::class,'store'])->name('store.dosen');
            Route::get('/edit/dosen/{dosen}', [DosenController::class, 'edit'])->name('edit.dosen');
            Route::put('/update/dosen/{dosen}', [DosenController::class, 'update'])->name('update.dosen');
            Route::delete('/delete/dosen/{dosen}', [DosenController::class, 'destroy'])->name('delete.dosen');

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
});

//require __DIR__.'/auth.php';
