<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteJadwalRequest;
use App\Models\Jadwal;
use App\Models\Pengajuan;
use App\Models\Dosen;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Http\Requests\ViewJadwalRequest;
use App\Models\Mahasiswa;
use App\Models\User;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = jadwal::with (['Pengajuan', 'Dosen'])->get();
        return view ('jadwal.index', compact ('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        $validated = $request->validate([
            'id_pengajuan' => 'required|exists:pengajuans,id',
            'tanggal_jadwal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'lokasi_jadwal' => 'required|string|max:255',
            'id_dosen' => 'required|exists:dosens,id',
        ]);

        $lokasiJadwalExists = Jadwal::where('tanggal_jadwal', $validated['tanggal_jadwal'])
        ->where('lokasi_jadwal', $validated['lokasi_jadwal'])
        ->exists();

        $jadwalExists = Jadwal::where('id_pengajuan', $validated['id_pengajuan'])
        ->exists();
        if($jadwalExists) {
            return redirect()->back()->withErrors('409','Jadwal untuk pengajuan ini sudah ada.')->withInput();
        }
        elseif($lokasiJadwalExists){
            return redirect()->back()->withErrors('422','Lokasi jadwal sudah digunakan pada tanggal yang sama.')->withInput();
        }
        elseif($validated['waktu_mulai'] >= $validated['waktu_selesai']){
            return redirect()->back()->withErrors(['waktu_selesai' => 'Waktu selesai harus lebih besar dari waktu mulai.'])->withInput();
        }elseif($validated['tanggal_jadwal'] < now()->toDateString()){
            return redirect()->back()->withErrors(['tanggal_jadwal' => 'Tanggal jadwal tidak boleh kurang dari tanggal sekarang.'])->withInput();
        }
        Jadwal::create($validated);

        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user,string $tanggal)
    {
        [$year, $month] = explode('-', $tanggal);
        if($user->role === 'admin'){
        $jadwals = Jadwal::with(['pengajuan', 'dosen'])
        ->whereYear('tanggal_jadwal', $year)
        ->whereMonth('tanggal_jadwal', $month)
        ->orderBy('tanggal_jadwal', 'asc')
        ->get();
        }elseif($user->role === 'dosen'){
            $dosen = Dosen::where('id_pengguna', $user->id)->first();
            $jadwals = Jadwal::with(['pengajuan', 'dosen'])
            ->where('id_dosen', $dosen->id)
            ->whereYear('tanggal_jadwal', $year)
            ->whereMonth('tanggal_jadwal', $month)
            ->orderBy('tanggal_jadwal', 'asc')
            ->get();
        }elseif($user->role === 'mahasiswa'){
            $mahasiswa = Mahasiswa::where('id_pengguna', $user->id)->first();
            $jadwals = Jadwal::with(['pengajuan', 'mahasiswa'])
            ->whereHas('pengajuan', function ($query) use ($mahasiswa) {
                $query->where('id_mahasiswa', $mahasiswa?->id);
            })
            ->whereYear('tanggal_jadwal', $year)
            ->whereMonth('tanggal_jadwal', $month)
            ->orderBy('tanggal_jadwal', 'asc')
            ->get();

        }



    return view('admin.jadwal', compact($jadwals));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ViewJadwalRequest $request, Jadwal $jadwal)
    {
        $request->validated();
        $jadwal = Jadwal::with('pengajuan')->findOrFail($jadwal->id);
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $validated = $request->validated();
        $jadwal->update($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteJadwalRequest $request, Jadwal $jadwal)
    {
        $request->validated();

        $jadwal = Jadwal::findOrFail($jadwal->id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
