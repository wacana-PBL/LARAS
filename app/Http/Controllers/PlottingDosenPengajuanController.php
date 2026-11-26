<?php

namespace App\Http\Controllers;

use App\Models\Plotting_Dosen_Pengajuan;
use App\Models\Dosen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class PlottingDosenPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = ['pembimbing' => 'Pembimbing', 'penguji 1' => 'Penguji 1', 'penguji 2' => 'Penguji 2', 'penguji 3' => 'Penguji 3'];
        $pengajuans = Pengajuan::with(['mahasiswa', 'plotting_dosen_pengajuan.dosen'])
            ->where('is_active', true)
            ->when($request->filled('q'), function ($query) use ($request) {
                $term = $request->string('q')->toString();
                $query->where(function ($query) use ($term) {
                    $query->where('judul_penelitian', 'like', "%{$term}%")
                        ->orWhereHas('mahasiswa', fn ($student) => $student->where('nama_mahasiswa', 'like', "%{$term}%")
                            ->orWhere('nim', 'like', "%{$term}%"));
                });
            })
            ->latest()
            ->paginate(10);
        $dosens = Dosen::withCount('plottingPembimbingAktif')
            ->with('plotting_dosen_pengajuan.pengajuan.mahasiswa')
            ->orderBy('nama_dosen')->get();

        return view('admin.plotting', compact('pengajuans', 'dosens', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Plotting_Dosen_Pengajuan $plotting_Dosen_Pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plotting_Dosen_Pengajuan $plotting_Dosen_Pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $roles = ['pembimbing', 'penguji 1', 'penguji 2', 'penguji 3'];
        $validated = $request->validate([
            'assignments' => ['present', 'array'],
            'assignments.*' => ['nullable', 'integer', 'distinct', Rule::exists('dosens', 'id')],
        ]);

        $assignments = collect($validated['assignments'])
            ->filter(fn ($id) => $id !== null && $id !== '')
            ->map(fn ($id) => (int) $id);

        if ($assignments->count() !== $assignments->unique()->count()) {
            throw ValidationException::withMessages([
                'assignments' => 'Satu dosen tidak dapat mengisi lebih dari satu peran pada pengajuan yang sama.',
            ]);
        }

        try {
            DB::transaction(function () use ($pengajuan, $assignments, $roles) {
                $pengajuan = Pengajuan::whereKey($pengajuan->id)->lockForUpdate()->firstOrFail();
                $current = $pengajuan->plotting_dosen_pengajuan()->get()->keyBy('role');

                foreach ($roles as $role) {
                    $dosenId = $assignments->get($role);
                    $existing = $current->get($role);

                    if ($dosenId === null) {
                        $existing?->delete();
                        continue;
                    }

                    $dosen = Dosen::whereKey($dosenId)->lockForUpdate()->firstOrFail();

                    if ($role === 'pembimbing') {
                        $used = Plotting_Dosen_Pengajuan::where('id_dosen', $dosen->id)
                            ->where('role', 'pembimbing')
                            ->where('status_plotting', '!=', 'ditolak')
                            ->where('id_pengajuan', '!=', $pengajuan->id)
                            ->count();

                        if ($used >= $dosen->kuota_bimbingan) {
                            throw ValidationException::withMessages([
                                "assignments.$role" => "Kuota pembimbing {$dosen->nama_dosen} sudah penuh ({$used}/{$dosen->kuota_bimbingan}).",
                            ]);
                        }
                    }

                    if ($existing) {
                        $existing->update(['id_dosen' => $dosen->id, 'status_plotting' => 'pending']);
                    } else {
                        Plotting_Dosen_Pengajuan::create([
                            'id_dosen' => $dosen->id,
                            'id_pengajuan' => $pengajuan->id,
                            'role' => $role,
                            'status_plotting' => 'pending',
                        ]);
                    }
                }
            }, 3);
        } catch (ValidationException $exception) {
            return back()->withErrors($exception->errors())->withInput();
        }

        return back()->with('success', 'Penugasan dosen berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plotting_Dosen_Pengajuan $plotting_Dosen_Pengajuan)
    {
        //
    }
}
