@extends('layouts.app')

@section('title', 'Review Logbook — LARAS')

@section('content')
<main class="min-h-screen bg-white px-6 py-8 font-sans text-ink md:px-14">
    <div class="mx-auto max-w-6xl">
        <header class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <a class="text-3xl font-bold text-ink" href="{{ route('dosen.dashboard') }}">LARAS</a>
            <nav class="flex gap-5"><a href="{{ route('dosen.dashboard') }}">Dashboard</a><a class="font-semibold text-brand" href="{{ route('dosen.bimbingan') }}">Logbook Bimbingan</a></nav>
        </header>
        <section class="rounded-2xl bg-line p-6"><h1 class="text-2xl font-semibold">Review Logbook Mahasiswa</h1><p class="mt-2 text-sm">Periksa catatan, beri keputusan, dan catat presensi sesi bimbingan.</p></section>
        @if (session('success'))<p class="mt-5 rounded-lg bg-green-50 p-4 text-green-800" role="status">{{ session('success') }}</p>@endif
        @if ($errors->any())<div class="mt-5 rounded-lg bg-red-50 p-4 text-red-800" role="alert"><ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <section class="mt-8 space-y-4">
            @forelse ($logbooks as $logbook)
                <article class="rounded-2xl border border-gray-200 p-5">
                    <div class="flex flex-wrap justify-between gap-3">
                        <div><h2 class="font-semibold">{{ $logbook->pengajuan?->mahasiswa?->nama_mahasiswa ?? 'Mahasiswa' }}</h2><p class="text-sm text-gray-600">{{ $logbook->pengajuan?->judul_penelitian }}</p><p class="mt-1 text-sm">{{ $logbook->tanggal_konsultasi->format('d M Y') }} · {{ ucfirst($logbook->metode_konsultasi) }} · {{ ucfirst($logbook->status_logbook) }}</p></div>
                        @if ($logbook->file_draft)<a class="text-brand underline" href="{{ route('dosen.logbook.download', $logbook) }}">Unduh lampiran</a>@endif
                    </div>
                    <p class="mt-4 whitespace-pre-line">{{ $logbook->catatan_progress }}</p>
                    @if ($logbook->status_logbook === 'submitted' && $logbook->status_approval === 'pending')
                        <form class="mt-5 grid gap-3 rounded-lg bg-line p-4" method="POST" action="{{ route('dosen.logbook.review', $logbook) }}">
                            @csrf @method('PATCH')
                            <label class="text-sm font-medium">Catatan review<textarea class="mt-1 w-full rounded border bg-white p-3" name="catatan_review" rows="3" placeholder="Wajib diisi jika meminta revisi"></textarea></label>
                            <div class="flex flex-wrap gap-3"><button class="rounded-lg bg-green-100 px-4 py-2 font-medium" name="status_approval" value="approved">Setujui</button><button class="rounded-lg bg-red-100 px-4 py-2 font-medium" name="status_approval" value="rejected">Minta Revisi</button></div>
                        </form>
                    @elseif ($logbook->catatan_review)
                        <p class="mt-3 rounded-lg bg-amber-50 p-3"><strong>Catatan review:</strong> {{ $logbook->catatan_review }}</p>
                    @endif
                    @if ($logbook->status_logbook !== 'draft')
                        <form class="mt-4 flex flex-wrap items-end gap-3" method="POST" action="{{ route('dosen.logbook.presensi', $logbook) }}">
                            @csrf @method('PATCH')
                            <label class="text-sm font-medium">Presensi
                                <select class="mt-1 block rounded border bg-white p-2" name="status_presensi"><option value="hadir" @selected($logbook->status_presensi === 'hadir')>Hadir</option><option value="tidak_hadir" @selected($logbook->status_presensi === 'tidak_hadir')>Tidak hadir</option></select>
                            </label>
                            <button class="rounded-lg border border-gray-300 px-4 py-2" type="submit">Simpan Presensi</button>
                        </form>
                    @endif
                </article>
            @empty
                <p class="rounded-xl bg-line p-5">Belum ada logbook yang ditugaskan kepada Anda.</p>
            @endforelse
        </section>
        <div class="mt-5">{{ $logbooks->links() }}</div>
    </div>
</main>
@endsection
