<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'mahasiswa',
                'nim' => $validated['nim'],
                'program_studi' => $validated['program_studi']
            ]);

            Mahasiswa::create([
                'nama_mahasiswa' => $validated['nama_mahasiswa'],
                'id_pengguna' => $user->id,
            ]);
        });

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->update(['nama_mahasiswa' => $request->validated()['nama_mahasiswa']]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        DB::transaction(function () use ($mahasiswa) {
            $user = User::find($mahasiswa->id_pengguna);
            $mahasiswa->delete();
            $user?->delete();
        });
    }
}
