@extends('layouts.app')

@section('title', 'Detail Verifikasi — LARAS')

@section('content')
    <x-admin-shell active="Verifikasi" padding-bottom="pb-[151px]">
        <section class="mt-10 rounded-lg border border-line bg-white p-6">
            <a class="text-brand hover:underline" href="{{ route('admin.verifikasi') }}">← Kembali ke antrean</a>
            <div class="mt-5 flex flex-wrap items-start justify-between gap-4">
                <div>
                    <h1 class="m-0 text-2xl font-semibold text-ink">{{ $pengajuan->mahasiswa?->nama_mahasiswa ?? 'Mahasiswa' }}</h1>
                    <p class="mt-1 text-slate">{{ $pengajuan->mahasiswa?->nim }} · {{ $pengajuan->mahasiswa?->program_studi }}</p>
                </div>
                <span class="rounded-lg bg-sand px-3 py-1 capitalize">{{ $pengajuan->jenis_pengajuan }} · {{ $pengajuan->status_pengajuan }}</span>
            </div>

            <dl class="mt-7 grid gap-5 md:grid-cols-2">
                <div><dt class="font-medium text-slate">Judul penelitian</dt><dd class="mt-1 text-ink">{{ $pengajuan->judul_penelitian }}</dd></div>
                <div><dt class="font-medium text-slate">Usulan dosen pembimbing</dt><dd class="mt-1 text-ink">{{ $pengajuan->usulan_dosen_pembimbing }}</dd></div>
                <div><dt class="font-medium text-slate">Semester / Tahun ajaran</dt><dd class="mt-1 text-ink">{{ $pengajuan->semester }} / {{ $pengajuan->tahun_ajaran }}</dd></div>
                <div><dt class="font-medium text-slate">Tanggal pengajuan</dt><dd class="mt-1 text-ink">{{ $pengajuan->created_at?->format('d M Y H:i') ?? '—' }}</dd></div>
            </dl>

            <h2 class="mt-8 text-lg font-semibold text-ink">Dosen dan konsultasi</h2>
            @forelse ($pengajuan->plotting_dosen_pengajuan as $plotting)
                <p class="mt-2 text-ink">{{ $plotting->dosen?->nama_dosen ?? 'Dosen' }} · {{ $plotting->role }} · {{ $plotting->status_plotting }}</p>
            @empty
                <p class="mt-2 text-slate">Belum ada dosen yang ditugaskan.</p>
            @endforelse
            @forelse ($pengajuan->konsultasi as $konsultasi)
                <p class="mt-2 text-ink">Konsultasi {{ $konsultasi->tanggal_konsultasi }} · {{ $konsultasi->metode_konsultasi }} · {{ $konsultasi->status_approval }}: {{ $konsultasi->catatan_progress }}</p>
            @empty
                <p class="mt-2 text-slate">Belum ada catatan konsultasi.</p>
            @endforelse

            <h2 class="mt-8 text-lg font-semibold text-ink">Dokumen</h2>
            @forelse ($pengajuan->dokumen as $dokumen)
                <p class="mt-2 text-ink">{{ $dokumen->nama_file }} · {{ $dokumen->kategori_dokumen }} · {{ $dokumen->status_verifikasi }}</p>
            @empty
                <p class="mt-2 text-slate">Belum ada dokumen yang dilampirkan.</p>
            @endforelse

            @if ($pengajuan->alasan_penolakan)
                <div class="mt-6 rounded-lg bg-red-50 p-4 text-red-700"><strong>Alasan penolakan:</strong> {{ $pengajuan->alasan_penolakan }}</div>
            @endif

            @if ($pengajuan->status_pengajuan === 'pending')
                <div class="mt-8 flex flex-wrap justify-end gap-3">
                    <form method="POST" action="{{ route('admin.verifikasi.decide', $pengajuan) }}" class="flex flex-wrap justify-end gap-3">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status_pengajuan" value="rejected">
                        <label class="sr-only" for="alasan-penolakan">Alasan penolakan</label>
                        <textarea id="alasan-penolakan" name="alasan_penolakan" required maxlength="2000" rows="2" placeholder="Tulis alasan reject / revisi" class="min-w-[280px] rounded-lg border border-line px-3 py-2"></textarea>
                        <button class="rounded-lg border border-red-600 px-5 py-2 text-red-600" type="submit">Tolak / Revisi</button>
                    </form>
                    <form method="POST" action="{{ route('admin.verifikasi.decide', $pengajuan) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status_pengajuan" value="approved">
                        <button class="rounded-lg bg-brand px-5 py-2 font-semibold text-white" type="submit">Setujui</button>
                    </form>
                </div>
            @endif
        </section>
    </x-admin-shell>
@endsection
