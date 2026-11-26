@extends('layouts.app')

@section('title', 'Bimbingan — LARAS')

@section('content')
    <main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-[67px] pl-[60px] font-sans text-ink max-[1101px]:p-[26px_28px_48px] max-[421px]:p-[20px_16px_32px]">
        <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">

            <x-navbar active="Bimbingan" :items="[
                ['label' => 'Dashboard', 'href' => route('mahasiswa.dashboard')],
                ['label' => 'Bimbingan', 'href' => route('mahasiswa.bimbingan')],
            ]" />

            @if (session('success'))
                <p class="mt-5 rounded-lg bg-green-50 p-4 text-green-800" role="status">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                <div class="mt-5 rounded-lg bg-red-50 p-4 text-red-800" role="alert"><ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <section class="mt-[70px] flex min-h-[117px] flex-col rounded-[15px] bg-line p-[17px_22px_19px] max-[1101px]:mt-[26px] max-[1101px]:min-h-0 max-[421px]:mt-6 max-[421px]:rounded-lg max-[421px]:p-[16px_18px]">
                <h1 class="m-0 text-[24px] font-medium leading-[1.35] max-[761px]:text-[19px] max-[421px]:text-[18px]">Logbook Bimbingan</h1>
                <p class="mt-1 text-base font-light leading-[1.4] max-[761px]:text-[13.5px]">
                    Lakukan bimbingan dengan dosen, unggah draft log bimbingan, tunggu verifikasi dosen, dan konfirmasi
                    presensi. Minimal 3x Bimbingan Valid untuk menerbitkan Form F1 (Persetujuan Proposal).
                </p>
            </section>

            <section class="mt-[55px] min-h-[352px] rounded-[15px] bg-line p-[18px_35px_0_22px] max-[1101px]:mt-[26px] max-[1101px]:min-h-0 max-[1101px]:p-[22px_24px_26px] max-[421px]:p-[18px_16px_22px]"
                     aria-labelledby="bmb-form-title">
                <header class="flex items-start justify-between gap-5">
                    <div>
                        <h2 id="bmb-form-title" class="m-0 text-[24px] font-medium leading-[1.3] max-[761px]:text-[19px] max-[421px]:text-[17px]">Catatan Bimbingan Baru</h2>
                        <p class="mt-1.5 text-base font-light leading-[1.35] max-[761px]:text-[13.5px]">Isi catatan dan lampirkan berkas untuk diperiksa dosen pembimbing.</p>
                    </div>
                    <button class="mt-[3px] inline-flex h-[49px] w-[52px] shrink-0 cursor-pointer items-center justify-center rounded-full border-0 bg-white p-0 text-brand"
                            type="button" aria-label="Tambah catatan bimbingan">
                        <svg class="size-[22px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </header>

                @if ($pengajuans->isEmpty())
                    <p class="mt-6 rounded-xl bg-white p-4">Belum ada pengajuan aktif dengan dosen pembimbing. Hubungi admin untuk penugasan dosen.</p>
                @else
                <form class="mt-[31px]" method="POST" action="{{ route('mahasiswa.logbook.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-[repeat(3,minmax(0,1fr))] gap-[15px] max-[1101px]:grid-cols-1 max-[1101px]:gap-3.5">
                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-date">Tanggal Bimbingan</label>
                            <input class="h-[45px] rounded-[15px] border-0 bg-white px-4 text-base font-light leading-[normal] text-ink outline-offset-2 placeholder:text-[#555b65]"
                                   id="bmb-date" name="tanggal_konsultasi" type="date" value="{{ old('tanggal_konsultasi') }}" required>
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-lecturer">Pengajuan &amp; Dosen Pembimbing</label>
                            <select class="h-[45px] rounded-[15px] border-0 bg-white px-4 text-base font-light text-ink" id="bmb-lecturer" name="id_pengajuan" required>
                                @foreach ($pengajuans as $pengajuan)
                                    @php $pembimbing = $pengajuan->plotting_dosen_pengajuan->firstWhere('role', 'pembimbing'); @endphp
                                    <option value="{{ $pengajuan->id }}" @selected(old('id_pengajuan') == $pengajuan->id)>{{ $pengajuan->judul_penelitian }} — {{ $pembimbing?->dosen?->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-file">Upload File Draft (.pdf / .docx)</label>
                            <div class="flex h-[45px] items-center rounded-[15px] bg-white p-[3px]">
                                <input class="ml-[11px] h-10 min-w-0 flex-1 border-0 bg-transparent text-sm text-ink" id="bmb-file" name="file_draft" type="file" accept=".pdf,.docx">
                            </div>
                        </div>
                    </div>

                    <div class="mt-[15px] grid gap-3 sm:grid-cols-2">
                        <label class="block text-base font-light leading-[30px] text-ink" for="bmb-method">Metode Bimbingan
                            <select class="h-[45px] w-full rounded-[15px] border-0 bg-white px-4 text-ink" id="bmb-method" name="metode_konsultasi"><option value="online">Online</option><option value="offline" @selected(old('metode_konsultasi') === 'offline')>Offline</option></select>
                        </label>
                    </div>
                    <label class="mt-[15px] block text-base font-light leading-[30px] text-ink" for="bmb-topic">Topik &amp; Catatan Pembahasan Bimbingan</label>
                    <textarea class="min-h-[90px] w-full rounded-[15px] border-0 bg-white px-4 py-3 text-base font-light text-ink outline-offset-2 placeholder:text-[#555b65]" id="bmb-topic" name="catatan_progress" maxlength="5000" placeholder="Tuliskan topik dan catatan bimbingan" required>{{ old('catatan_progress') }}</textarea>

                    <div class="mt-[15px] flex items-center gap-6 max-[1101px]:flex-wrap max-[1101px]:gap-3 max-[421px]:gap-2.5">
                        <p class="m-0 flex-1 text-[14px] font-normal leading-[1.3] max-[1101px]:flex-[0_0_100%] max-[761px]:text-[13px]">Simpan sebagai draf atau kirim untuk direview dosen.</p>
                        <button class="h-14 w-[184px] cursor-pointer rounded-[15px] border border-muted bg-white text-base font-bold text-ink max-[761px]:h-12 max-[761px]:w-full max-[761px]:text-[15px]"
                                type="submit" name="intent" value="draft">Simpan Draf Log</button>
                        <button class="h-14 w-[216px] cursor-pointer rounded-[15px] border-0 btn-primary bg-brand text-base font-bold text-ink max-[761px]:h-12 max-[761px]:w-full max-[761px]:text-[15px]"
                                type="submit" name="intent" value="submitted">Kirim Logbook</button>
                    </div>
                </form>
                @endif
            </section>

            <section class="mt-[44px] min-h-[779px] rounded-[15px] bg-line p-[27px_27px_0_28px] max-[1101px]:mt-5 max-[1101px]:min-h-0 max-[1101px]:p-[22px_20px_0]"
                     aria-labelledby="bmb-history-title">
                <header class="flex items-start justify-between gap-6 pl-[3px] max-[1101px]:flex-col max-[1101px]:gap-0 max-[1101px]:pl-0">
                    <div>
                        <h2 id="bmb-history-title" class="m-0 text-[24px] font-medium leading-[1.3] max-[761px]:text-[19px] max-[421px]:text-[17px]">Riwayat Logbook Bimbingan</h2>
                        <p class="mt-1.5 text-base font-light leading-[1.35] max-[761px]:text-[13.5px]">Lihat status pemeriksaan dan catatan revisi dari dosen pembimbing.</p>
                    </div>
                    <ul class="mt-[14px] flex flex-wrap gap-x-6 gap-y-2.5 pr-[19px] pl-0 max-[1101px]:pr-0">
                        <li class="flex items-center gap-1 text-base font-light leading-[30px] whitespace-nowrap"><span class="size-4 rounded-full bg-white"></span>Draf</li>
                        <li class="flex items-center gap-1 text-base font-light leading-[30px] whitespace-nowrap"><span class="size-4 rounded-full bg-white"></span>Perlu Perbaikan</li>
                        <li class="flex items-center gap-1 text-base font-light leading-[30px] whitespace-nowrap"><span class="size-4 rounded-full bg-white"></span>Disetujui / Valid</li>
                    </ul>
                </header>

                <div class="mt-10 max-[1349px]:overflow-x-auto max-[1101px]:mt-5" role="table" aria-label="Riwayat logbook bimbingan">
                    <div class="grid grid-cols-[190px_283px_352px_219px_minmax(0,1fr)] items-center rounded-[15px] bg-white pl-[38px] min-h-[87px] text-[18px] font-normal max-[1101px]:min-h-16 max-[1101px]:min-w-[980px] max-[1101px]:text-[15px]"
                         role="row">
                        <span role="columnheader">Sesi &amp; Tanggal</span>
                        <span role="columnheader">Dosen Pembimbing</span>
                        <span role="columnheader">Catatan Mahasiswa &amp; Draft</span>
                        <span role="columnheader">Status Review Dosen</span>
                        <span role="columnheader">Konfirmasi Presensi</span>
                    </div>

                    @forelse ($logbooks as $logbook)
                        <div class="relative grid grid-cols-[190px_283px_352px_219px_minmax(0,1fr)] items-center border-t border-ink/22 pl-[38px] min-h-[188px] max-[1101px]:min-h-0 max-[1101px]:min-w-[980px] max-[1101px]:py-[18px] @if ($loop->last) border-b @endif"
                             role="row">
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">Bimbingan #{{ $loop->iteration }}<br>{{ $logbook->tanggal_konsultasi->format('d M Y') }}</span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $logbook->dosen?->nama_dosen }}</span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">
                                {{ $logbook->catatan_progress }}
                                @if ($logbook->file_draft)<a class="mt-2 block text-brand underline" href="{{ route('mahasiswa.logbook.download', $logbook) }}">Unduh draft</a>@endif
                                @if ($logbook->catatan_review)<span class="mt-2 block text-sm">Catatan dosen: {{ $logbook->catatan_review }}</span>@endif
                                @if ($logbook->status_logbook === 'draft' || $logbook->status_approval === 'rejected')
                                    <details class="mt-3"><summary class="cursor-pointer text-sm font-semibold text-brand">Edit dan kirim ulang</summary>
                                        <form class="mt-2 space-y-2" method="POST" action="{{ route('mahasiswa.logbook.update', $logbook) }}" enctype="multipart/form-data">
                                            @csrf @method('PATCH')<input type="hidden" name="id_pengajuan" value="{{ $logbook->id_pengajuan }}">
                                            <input class="w-full rounded border bg-white p-2 text-sm" type="date" name="tanggal_konsultasi" value="{{ $logbook->tanggal_konsultasi->format('Y-m-d') }}" required>
                                            <select class="w-full rounded border bg-white p-2 text-sm" name="metode_konsultasi"><option value="online" @selected($logbook->metode_konsultasi === 'online')>Online</option><option value="offline" @selected($logbook->metode_konsultasi === 'offline')>Offline</option></select>
                                            <textarea class="w-full rounded border bg-white p-2 text-sm" name="catatan_progress" rows="3" required>{{ $logbook->catatan_progress }}</textarea>
                                            <input class="w-full rounded border bg-white p-2 text-sm" type="file" name="file_draft" accept=".pdf,.docx">
                                            <div class="flex gap-2"><button class="rounded border px-3 py-1 text-sm" name="intent" value="draft">Simpan Draf</button><button class="rounded bg-brand px-3 py-1 text-sm" name="intent" value="submitted">Kirim Logbook</button></div>
                                        </form>
                                    </details>
                                @endif
                            </span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">
                                <span class="inline-flex h-[61px] w-[159px] items-center gap-[7px] rounded-[15px] bg-sand pl-[15px] text-[13px] font-normal text-ink">
                                    <svg class="h-[27px] w-[25px] shrink-0 text-white" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ ucfirst($logbook->status_logbook) }}
                                </span>
                            </span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">
                                <span class="inline-flex h-[58px] w-[179px] items-center gap-[7px] rounded-[15px] bg-sand pl-[15px] text-[15px] font-normal text-ink">
                                    @if ($logbook->status_presensi === 'hadir')<svg class="h-[27px] w-[25px] shrink-0 text-white" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>@endif
                                    {{ $logbook->status_presensi === 'hadir' ? 'Hadir' : ($logbook->status_presensi === 'tidak_hadir' ? 'Tidak hadir' : 'Menunggu') }}
                                </span>
                            </span>
                        </div>
                    @empty
                        @foreach ([
                            ['Bimbingan #1', 'Bambang Warsuta, S.Kom., M.T.I.', 'Pembahasan Bab 1 Latar Belakang & Identifikasi Masalah POS Warung Mak Dara.', 'Disetujui Dosen'],
                            ['Bimbingan #2', 'Bambang Warsuta, S.Kom., M.T.I.', 'Review Bab 2 Tinjauan Pustaka & Desain WBS 3 Level.', 'Menunggu dosen'],
                            ['Bimbingan #3', 'Euis Oktavianti, S.Si., M.T.I.', 'Finalisasi Proposal Full Bab 1-3 & Pengajuan Form F1 Sempro.', 'Perlu revisi'],
                        ] as [$session, $lecturer, $note, $status])
                            <div class="relative grid grid-cols-[190px_283px_352px_219px_minmax(0,1fr)] items-center border-t border-ink/22 pl-[38px] min-h-[188px] max-[1101px]:min-h-0 max-[1101px]:min-w-[980px] max-[1101px]:py-[18px] @if ($loop->last) border-b @endif" role="row">
                                <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $session }}</span>
                                <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $lecturer }}</span>
                                <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $note }}</span>
                                <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $status }}</span>
                                <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">Terkonfirmasi</span>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </section>

        </div>
    </main>

    <x-notif-dialog id="notif-draf-logbook" top="48" title="Draf logbook tersimpan" :actions="[
        ['label' => 'Tutup draf logbook', 'size' => 'xl'],
    ]">
        <p class="m-0">Catatan belum dikirim kepada dosen pembimbing.</p>
        <p class="m-0">Lengkapi draf, lalu pilih Kirim Logbook saat sudah siap.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-logbook-kurang" top="48" title="Lengkapi catatan bimbingan" :actions="[
        ['label' => 'Lengkapi data logbook', 'size' => 'xl'],
    ]">
        <p class="m-0">Tanggal bimbingan, dosen pembimbing, dan catatan pembahasan masih kosong.</p>
        <p class="mt-[20px]">Lengkapi data sebelum mengirim kepada dosen.</p>
    </x-notif-dialog>
@endsection
