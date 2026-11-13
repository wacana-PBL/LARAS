<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('mahasiswa.dashboard');
})->name('dashboard');

Route::get('/profile', function () {
    return view('mahasiswa.profile');
})->name('profile');

Route::get('/bimbingan', function () {
    return view('mahasiswa.bimbingan');
})->name('bimbingan');

Route::get('/pengajuan', function () {
    return view('mahasiswa.pengajuan');
})->name('pengajuan');

Route::get('/pendaftaran-sempro', function () {
    return view('mahasiswa.pendaftaran-sempro');
})->name('pendaftaran.sempro');

Route::get('/pendaftaran-skripsi', function () {
    return view('mahasiswa.pendaftaran-skripsi');
})->name('pendaftaran.skripsi');

Route::get('/jadwal', function () {
    return view('mahasiswa.jadwal');
})->name('jadwal');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/verifikasi', function () {
    return view('admin.verifikasi');
})->name('admin.verifikasi');

Route::get('/admin/jadwal', function () {
    return view('admin.jadwal');
})->name('admin.jadwal');

Route::get('/admin/plotting-dosen', function () {
    return view('admin.plotting');
})->name('admin.plotting');

Route::get('/admin/berita-acara', function () {
    return view('admin.berita-acara');
})->name('admin.berita-acara');
