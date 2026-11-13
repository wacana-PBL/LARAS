@extends('layouts.app')

@section('title', 'Bimbingan — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-bimbingan.css') }}?v={{ filemtime(public_path('css/laras-bimbingan.css')) }}">
@endpush

@section('content')
    <main class="bmb-page">
        <div class="bmb-shell">

            <x-navbar active="Bimbingan" />

            <section class="bmb-banner">
                <h1 class="bmb-banner__title">Logbook Bimbingan</h1>
                <p class="bmb-banner__text">
                    Lakukan bimbingan dengan dosen, unggah draft log bimbingan, tunggu verifikasi dosen, dan konfirmasi
                    presensi. Minimal 3x Bimbingan Valid untuk menerbitkan Form F1 (Persetujuan Proposal).
                </p>
            </section>

            <section class="bmb-panel bmb-panel--form" aria-labelledby="bmb-form-title">
                <header class="bmb-panel__head">
                    <div>
                        <h2 id="bmb-form-title" class="bmb-panel__title">Catatan Bimbingan Baru</h2>
                        <p class="bmb-panel__subtitle">Isi catatan dan lampirkan berkas untuk diperiksa dosen pembimbing.</p>
                    </div>
                    <button class="bmb-plus" type="button" aria-label="Tambah catatan bimbingan">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </header>

                <form class="bmb-form" onsubmit="return false;">
                    <div class="bmb-fields">
                        <div class="bmb-field">
                            <label class="bmb-label" for="bmb-date">Tanggal Bimbingan</label>
                            <input class="bmb-input" id="bmb-date" type="text" placeholder="No Selected Date">
                        </div>

                        <div class="bmb-field">
                            <label class="bmb-label" for="bmb-lecturer">Dosen Pembimbing</label>
                            <input class="bmb-input" id="bmb-lecturer" type="text" value="Bambang Warsuta, S.Kom., M.T.I.">
                        </div>

                        <div class="bmb-field">
                            <label class="bmb-label" for="bmb-file">Upload File Draft (.pdf / .docx)</label>
                            <div class="bmb-upload">
                                <button class="bmb-upload__btn" type="button">Pilih File</button>
                                <input class="bmb-upload__name" id="bmb-file" type="text" placeholder="No File Selected">
                            </div>
                        </div>
                    </div>

                    <label class="bmb-label bmb-label--topic" for="bmb-topic">Topik &amp; Catatan Pembahasan Bimbingan</label>
                    <input class="bmb-input bmb-input--topic" id="bmb-topic" type="text" placeholder="Tuliskan topik dan catatan bimbingan">

                    <div class="bmb-actions">
                        <p class="bmb-actions__note">Draf belum dikirim kepada dosen.</p>
                        <button class="bmb-btn bmb-btn--ghost" type="button">Simpan Draf Log</button>
                        <button class="bmb-btn bmb-btn--solid" type="button">Kirim Logbook</button>
                    </div>
                </form>
            </section>

            <section class="bmb-panel bmb-panel--history" aria-labelledby="bmb-history-title">
                <header class="bmb-history__head">
                    <div>
                        <h2 id="bmb-history-title" class="bmb-panel__title">Riwayat Logbook Bimbingan</h2>
                        <p class="bmb-panel__subtitle">Lihat status pemeriksaan dan catatan revisi dari dosen pembimbing.</p>
                    </div>
                    <ul class="bmb-legend">
                        <li><span class="bmb-legend__dot"></span>Draf</li>
                        <li><span class="bmb-legend__dot"></span>Perlu Perbaikan</li>
                        <li><span class="bmb-legend__dot"></span>Disetujui / Valid</li>
                    </ul>
                </header>

                <div class="bmb-table" role="table" aria-label="Riwayat logbook bimbingan">
                    <div class="bmb-row bmb-row--head" role="row">
                        <span role="columnheader">Sesi &amp; Tanggal</span>
                        <span role="columnheader">Dosen Pembimbing</span>
                        <span role="columnheader">Catatan Mahasiswa &amp; Draft</span>
                        <span role="columnheader">Status Review Dosen</span>
                        <span role="columnheader">Konfirmasi Presensi</span>
                    </div>

                    <div class="bmb-row" role="row">
                        <span role="cell" class="bmb-cell bmb-cell--strong">Bimbingan #1</span>
                        <span role="cell" class="bmb-cell">Bambang Warsuta, S.Kom., M.T.I.</span>
                        <span role="cell" class="bmb-cell">Pembahasan Bab 1 Latar Belakang &amp; Identifikasi Masalah POS Warung Mak Dara.</span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--status">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Disetujui Dosen
                            </span>
                        </span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--presence">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Terkonfirmasi
                            </span>
                        </span>
                    </div>

                    <div class="bmb-row" role="row">
                        <span role="cell" class="bmb-cell bmb-cell--strong">Bimbingan #2</span>
                        <span role="cell" class="bmb-cell">Bambang Warsuta, S.Kom., M.T.I.</span>
                        <span role="cell" class="bmb-cell">Review Bab 2 Tinjauan Pustaka &amp; Desain WBS 3 Level.</span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--status">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Menunggu dosen
                            </span>
                        </span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--presence">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Terkonfirmasi
                            </span>
                        </span>
                    </div>

                    <div class="bmb-row" role="row">
                        <span role="cell" class="bmb-cell bmb-cell--strong">Bimbingan #3</span>
                        <span role="cell" class="bmb-cell">Euis Oktavianti, S.Si., M.T.I.</span>
                        <span role="cell" class="bmb-cell">Finalisasi Proposal Full Bab 1-3 &amp; Pengajuan Form F1 Sempro.</span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--status">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Perlu revisi
                            </span>
                        </span>
                        <span role="cell" class="bmb-cell">
                            <span class="bmb-pill bmb-pill--presence">
                                <svg class="bmb-check" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Terkonfirmasi
                            </span>
                        </span>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
