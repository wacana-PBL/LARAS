<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pengajuan;
use App\Models\Dosen;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['pengajuan', 'dosen'])->get();
        return view ('jadwal.index', compact ('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengajuans = Pengajuan::all();
        $dosens = Dosen::all();
        return view('jadwal.create', compact('pengajuans', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        Jadwal::create($request->validated());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        $jadwal->load(['pengajuan', 'dosen']);
        return view ('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $pengajuans = Pengajuan::all();
        $dosens = Dosen::all();
        return view('jadwal.edit', compact('jadwal', 'pengajuans', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->update($request->validated());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
