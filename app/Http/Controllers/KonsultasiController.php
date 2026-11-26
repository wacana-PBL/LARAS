<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Konsultasi;
use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KonsultasiController extends Controller
{
    public function studentIndex(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id_pengguna', $request->user()->id)->firstOrFail();
        $pengajuans = Pengajuan::with(['plotting_dosen_pengajuan.dosen'])
            ->where('id_mahasiswa', $mahasiswa->id)
            ->where('is_active', true)
            ->get()
            ->filter(fn ($pengajuan) => $pengajuan->plotting_dosen_pengajuan->contains(fn ($plot) => $plot->role === 'pembimbing' && $plot->status_plotting !== 'ditolak'));

        $logbooks = Konsultasi::with('dosen')
            ->whereHas('pengajuan', fn ($query) => $query->where('id_mahasiswa', $mahasiswa->id))
            ->latest('tanggal_konsultasi')
            ->latest()
            ->get();

        return view('mahasiswa.bimbingan', compact('pengajuans', 'logbooks'));
    }

    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id_pengguna', $request->user()->id)->firstOrFail();
        $validated = $this->validateLogbook($request);
        $pengajuan = Pengajuan::where('id', $validated['id_pengajuan'])
            ->where('id_mahasiswa', $mahasiswa->id)
            ->where('is_active', true)
            ->firstOrFail();
        $plotting = $pengajuan->plotting_dosen_pengajuan()
            ->where('role', 'pembimbing')
            ->where('status_plotting', '!=', 'ditolak')
            ->firstOrFail();

        $file = $request->file('file_draft')?->store('logbook', 'local');
        Konsultasi::create([
            'status_logbook' => $validated['intent'],
            'status_approval' => 'pending',
            'status_presensi' => 'pending',
            'tanggal_konsultasi' => $validated['tanggal_konsultasi'],
            'metode_konsultasi' => $validated['metode_konsultasi'],
            'catatan_progress' => $validated['catatan_progress'],
            'file_draft' => $file,
            'id_pengajuan' => $pengajuan->id,
            'id_dosen' => $plotting->id_dosen,
        ]);

        return back()->with('success', $validated['intent'] === 'draft' ? 'Draf logbook berhasil disimpan.' : 'Logbook berhasil dikirim ke dosen pembimbing.');
    }

    public function update(Request $request, Konsultasi $konsultasi)
    {
        $mahasiswa = Mahasiswa::where('id_pengguna', $request->user()->id)->firstOrFail();
        abort_unless($konsultasi->pengajuan()->where('id_mahasiswa', $mahasiswa->id)->exists(), 403);
        abort_unless($konsultasi->status_logbook === 'draft' || $konsultasi->status_approval === 'rejected', 403);

        $validated = $this->validateLogbook($request);
        abort_unless((int) $validated['id_pengajuan'] === (int) $konsultasi->id_pengajuan, 403);
        $file = $konsultasi->file_draft;
        if ($request->hasFile('file_draft')) {
            if ($file) Storage::disk('local')->delete($file);
            $file = $request->file('file_draft')->store('logbook', 'local');
        }

        $konsultasi->update([
            'status_logbook' => $validated['intent'],
            'status_approval' => 'pending',
            'catatan_review' => null,
            'tanggal_konsultasi' => $validated['tanggal_konsultasi'],
            'metode_konsultasi' => $validated['metode_konsultasi'],
            'catatan_progress' => $validated['catatan_progress'],
            'file_draft' => $file,
        ]);

        return back()->with('success', $validated['intent'] === 'draft' ? 'Draf logbook berhasil diperbarui.' : 'Logbook berhasil dikirim ke dosen pembimbing.');
    }

    public function lecturerIndex(Request $request)
    {
        $dosen = Dosen::where('id_pengguna', $request->user()->id)->firstOrFail();
        $logbooks = Konsultasi::with(['pengajuan.mahasiswa'])
            ->where('id_dosen', $dosen->id)
            ->latest('tanggal_konsultasi')
            ->latest()
            ->paginate(15);

        return view('dosen.bimbingan', compact('logbooks'));
    }

    public function review(Request $request, Konsultasi $konsultasi)
    {
        $dosen = Dosen::where('id_pengguna', $request->user()->id)->firstOrFail();
        abort_unless($konsultasi->id_dosen === $dosen->id, 403);
        abort_unless($konsultasi->status_logbook === 'submitted' && $konsultasi->status_approval === 'pending', 409, 'Logbook ini tidak menunggu review.');

        $validated = $request->validate([
            'status_approval' => ['required', Rule::in(['approved', 'rejected'])],
            'catatan_review' => ['required_if:status_approval,rejected', 'nullable', 'string', 'max:3000'],
        ]);

        $konsultasi->update([
            'status_approval' => $validated['status_approval'],
            'status_logbook' => $validated['status_approval'],
            'catatan_review' => $validated['catatan_review'] ?? null,
        ]);

        return back()->with('success', 'Review logbook berhasil disimpan.');
    }

    public function attendance(Request $request, Konsultasi $konsultasi)
    {
        $dosen = Dosen::where('id_pengguna', $request->user()->id)->firstOrFail();
        abort_unless($konsultasi->id_dosen === $dosen->id, 403);
        abort_unless($konsultasi->status_logbook !== 'draft', 409, 'Draf belum dapat dicatat presensinya.');

        $validated = $request->validate([
            'status_presensi' => ['required', Rule::in(['hadir', 'tidak_hadir'])],
        ]);
        $konsultasi->update($validated);

        return back()->with('success', 'Presensi berhasil dicatat.');
    }

    public function download(Request $request, Konsultasi $konsultasi)
    {
        $user = $request->user();
        $mahasiswaId = Mahasiswa::where('id_pengguna', $user->id)->value('id');
        $dosenId = Dosen::where('id_pengguna', $user->id)->value('id');
        abort_unless(
            ($mahasiswaId && $konsultasi->pengajuan()->where('id_mahasiswa', $mahasiswaId)->exists())
            || ($dosenId && $konsultasi->id_dosen === $dosenId),
            403,
        );
        abort_unless($konsultasi->file_draft, 404);

        return Storage::disk('local')->download($konsultasi->file_draft);
    }

    private function validateLogbook(Request $request): array
    {
        return $request->validate([
            'id_pengajuan' => ['required', 'integer', 'exists:pengajuans,id'],
            'tanggal_konsultasi' => ['required', 'date'],
            'metode_konsultasi' => ['required', Rule::in(['online', 'offline'])],
            'catatan_progress' => ['required', 'string', 'max:5000'],
            'file_draft' => ['nullable', 'file', 'mimes:pdf,docx', 'max:10240'],
            'intent' => ['required', Rule::in(['draft', 'submitted'])],
        ]);
    }
}
