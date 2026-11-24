@extends('layouts.app')

@section('title', 'Verifikasi Pendaftaran — LARAS')

@section('content')
    <x-admin-shell active="Verifikasi" padding-bottom="pb-[151px]">
        <section class="mt-10 flex flex-wrap items-center justify-between gap-4 rounded-[15px] bg-line p-6" aria-label="Ringkasan verifikasi">
            <div>
                <h1 class="m-0 text-2xl font-medium text-ink">Verifikasi Pendaftaran</h1>
                <p class="mt-2 text-base text-ink">Review pengajuan mahasiswa dan catat keputusan admin.</p>
            </div>
            <span class="rounded-lg bg-sand px-4 py-2 font-medium text-ink">{{ $pengajuans->total() }} Menunggu Verifikasi</span>
        </section>

        @if (session('success'))
            <p role="status" class="mt-5 rounded-lg bg-[#daffe0] p-4 text-[#067400]">{{ session('success') }}</p>
        @endif
        @if ($errors->any())
            <div role="alert" class="mt-5 rounded-lg bg-red-50 p-4 text-red-700">{{ $errors->first() }}</div>
        @endif

        <section class="mt-6 flex flex-col gap-5" aria-label="Antrean pendaftaran">
            @forelse ($pengajuans as $pengajuan)
                <article class="rounded-lg border-2 border-brand bg-white p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h2 class="m-0 text-xl font-semibold text-ink">{{ $pengajuan->mahasiswa?->nama_mahasiswa ?? 'Mahasiswa' }}</h2>
                            <p class="mt-1 text-sm text-slate">{{ $pengajuan->mahasiswa?->nim ?? 'NIM tidak tersedia' }} · {{ $pengajuan->mahasiswa?->program_studi ?? 'Program studi tidak tersedia' }}</p>
                        </div>
                        <span class="rounded-lg bg-sand px-3 py-1 capitalize">{{ $pengajuan->jenis_pengajuan }}</span>
                    </div>
                    <p class="mt-5 text-sm text-slate">Dikirim {{ $pengajuan->created_at?->diffForHumans() ?? '—' }} · Semester {{ $pengajuan->semester }} · Tahun ajaran {{ $pengajuan->tahun_ajaran }}</p>
                    <h3 class="mt-4 text-base font-medium text-ink">Judul penelitian</h3>
                    <p class="mt-1 text-ink">{{ $pengajuan->judul_penelitian }}</p>
                    <p class="mt-4 text-sm text-ink"><strong>Usulan dosen pembimbing:</strong> {{ $pengajuan->usulan_dosen_pembimbing }}</p>
                    <a class="mt-4 inline-block text-brand hover:underline" href="{{ route('admin.verifikasi.detail', $pengajuan) }}">Lihat detail pengajuan →</a>

                    <div class="mt-6 flex flex-wrap justify-end gap-3">
                        <form method="POST" action="{{ route('admin.verifikasi.decide', $pengajuan) }}" class="flex flex-wrap justify-end gap-3">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status_pengajuan" value="rejected">
                            <label class="sr-only" for="alasan-{{ $pengajuan->id }}">Alasan penolakan</label>
                            <input id="alasan-{{ $pengajuan->id }}" name="alasan_penolakan" required maxlength="2000" placeholder="Alasan reject / revisi" class="min-w-[240px] rounded-lg border border-line px-3 py-2" value="{{ old('alasan_penolakan') }}">
                            <button class="rounded-lg border border-red-600 px-5 py-2 text-red-600" type="submit">Tolak / Revisi</button>
                        </form>
                        <form method="POST" action="{{ route('admin.verifikasi.decide', $pengajuan) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status_pengajuan" value="approved">
                            <button class="rounded-lg bg-brand px-5 py-2 font-semibold text-white" type="submit">Setujui</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="rounded-lg bg-line p-8 text-center text-ink">Tidak ada pengajuan yang menunggu verifikasi.</div>
            @endforelse
            {{ $pengajuans->links() }}
        </section>
    </x-admin-shell>
@endsection
