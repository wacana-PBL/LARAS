@extends('layouts.app')

@section('title', 'Bimbingan — LARAS')

@section('content')
    <main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-[67px] pl-[60px] font-sans text-ink max-[1101px]:p-[26px_28px_48px] max-[421px]:p-[20px_16px_32px]">
        <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">

            <x-navbar active="Bimbingan" />

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

                <form class="mt-[31px]" onsubmit="return false;">
                    <div class="grid grid-cols-[repeat(3,minmax(0,1fr))] gap-[15px] max-[1101px]:grid-cols-1 max-[1101px]:gap-3.5">
                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-date">Tanggal Bimbingan</label>
                            <input class="h-[45px] rounded-[15px] border-0 bg-white px-4 text-base font-light leading-[normal] text-ink outline-offset-2 placeholder:text-[#555b65]"
                                   id="bmb-date" type="text" placeholder="No Selected Date">
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-lecturer">Dosen Pembimbing</label>
                            <input class="h-[45px] rounded-[15px] border-0 bg-white px-4 text-base font-light leading-[normal] text-ink outline-offset-2 placeholder:text-[#555b65]"
                                   id="bmb-lecturer" type="text" value="Bambang Warsuta, S.Kom., M.T.I.">
                        </div>

                        <div class="flex min-w-0 flex-col">
                            <label class="text-base font-light leading-[30px] text-ink" for="bmb-file">Upload File Draft (.pdf / .docx)</label>
                            <div class="flex h-[45px] items-center rounded-[15px] bg-white p-[3px]">
                                <button class="h-10 shrink-0 cursor-pointer rounded-[12px] border-0 btn-primary bg-brand px-[18px] text-[14px] font-semibold text-white" type="button">Pilih File</button>
                                <input class="ml-[11px] h-10 min-w-0 flex-1 border-0 bg-transparent text-base font-extralight leading-[normal] text-ink outline-offset-2 placeholder:text-[#555b65]"
                                       id="bmb-file" type="text" placeholder="No File Selected">
                            </div>
                        </div>
                    </div>

                    <label class="mt-[15px] block text-base font-light leading-[30px] text-ink" for="bmb-topic">Topik &amp; Catatan Pembahasan Bimbingan</label>
                    <input class="h-[45px] w-full rounded-[15px] border-0 bg-white px-4 text-base font-light leading-[normal] text-ink outline-offset-2 placeholder:text-[#555b65]"
                           id="bmb-topic" type="text" placeholder="Tuliskan topik dan catatan bimbingan">

                    <div class="mt-[15px] flex items-center gap-6 max-[1101px]:flex-wrap max-[1101px]:gap-3 max-[421px]:gap-2.5">
                        <p class="m-0 flex-1 text-[14px] font-normal leading-[1.3] max-[1101px]:flex-[0_0_100%] max-[761px]:text-[13px]">Draf belum dikirim kepada dosen.</p>
                        <button class="h-14 w-[184px] cursor-pointer rounded-[15px] border border-muted bg-white text-base font-bold text-ink max-[761px]:h-12 max-[761px]:w-full max-[761px]:text-[15px]"
                                type="button">Simpan Draf Log</button>
                        <button class="h-14 w-[216px] cursor-pointer rounded-[15px] border-0 btn-primary bg-brand text-base font-bold text-ink max-[761px]:h-12 max-[761px]:w-full max-[761px]:text-[15px]"
                                type="button">Kirim Logbook</button>
                    </div>
                </form>
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

                    @foreach ([
                        ['Bimbingan #1', 'Bambang Warsuta, S.Kom., M.T.I.', 'Pembahasan Bab 1 Latar Belakang & Identifikasi Masalah POS Warung Mak Dara.', 'Disetujui Dosen'],
                        ['Bimbingan #2', 'Bambang Warsuta, S.Kom., M.T.I.', 'Review Bab 2 Tinjauan Pustaka & Desain WBS 3 Level.', 'Menunggu dosen'],
                        ['Bimbingan #3', 'Euis Oktavianti, S.Si., M.T.I.', 'Finalisasi Proposal Full Bab 1-3 & Pengajuan Form F1 Sempro.', 'Perlu revisi'],
                    ] as [$session, $lecturer, $note, $status])
                        <div class="relative grid grid-cols-[190px_283px_352px_219px_minmax(0,1fr)] items-center border-t border-ink/22 pl-[38px] min-h-[188px] max-[1101px]:min-h-0 max-[1101px]:min-w-[980px] max-[1101px]:py-[18px] @if ($loop->last) border-b @endif"
                             role="row">
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $session }}</span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $lecturer }}</span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">{{ $note }}</span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">
                                <span class="inline-flex h-[61px] w-[159px] items-center gap-[7px] rounded-[15px] bg-sand pl-[15px] text-[13px] font-normal text-ink">
                                    <svg class="h-[27px] w-[25px] shrink-0 text-white" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ $status }}
                                </span>
                            </span>
                            <span role="cell" class="pr-6 text-[18px] font-normal leading-[1.3] max-[1101px]:text-[15px]">
                                <span class="inline-flex h-[58px] w-[179px] items-center gap-[7px] rounded-[15px] bg-sand pl-[15px] text-[15px] font-normal text-ink">
                                    <svg class="h-[27px] w-[25px] shrink-0 text-white" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Terkonfirmasi
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </main>
@endsection
