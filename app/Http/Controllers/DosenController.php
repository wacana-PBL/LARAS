<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::with('user')->get();
        return view('dosen.dashboard', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createFormDosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'id_pengguna' => 'required|exists:users,id',
            'email' => 'required|email|unique:dosens,email',
            'password' => 'required|string|min:8',
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Dosen::create([
                'nama_dosen' => $validated['nama_dosen'],
                'id_pengguna' => $user->id,
            ]);
        });

        return redirect()->route('admin.dashboard')->with('success', 'Dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen, $id)
    {
       $dosen = Dosen::with('user')->findOrFail($id);

        return view('dosen.show', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen, $id)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $dosen->user->id,
            'password' => 'required|string|min:8',
        ]);
        $dosen = Dosen::with('user')->findOrFail($id);

        DB::transaction(function () use ($validated, $dosen) {
            $dosen->user->update([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $dosen->update([
                'nama_dosen' => $validated['nama_dosen'],
            ]);
        });
        return redirect()->route('dosen.show', $dosen->id)->with('success', 'Dosen berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen, $id)
    {
        if($id) {
            $dosen = Dosen::with('user')->findOrFail($id);
            DB::transaction(function () use ($dosen) {
                $dosen->user->delete();
                $dosen->delete();
            });
        }elseif(!$id) {
        DB::transaction(function () {
            $userIDs = Dosen::pluck('id_pengguna')->filter();
            Dosen::query()->delete();
            User::whereIn('id', $userIDs)->delete();
        });
        }
        return redirect()->route('admin.dashboard')->with('success', 'Dosen berhasil dihapus.');

    }
}
