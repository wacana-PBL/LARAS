@extends('layouts.app')

@section('title', 'Pendaftaran Sidang Skripsi — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-pembimbing.css') }}?v={{ filemtime(public_path('css/laras-pembimbing.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-daftar.css') }}?v={{ filemtime(public_path('css/laras-daftar.css')) }}">
@endpush

@section('content')
    <main class="pmb-page">
        <div class="pmb-shell">

            <x-navbar active="Pengajuan" />

            <div class="pmb-inner">
                <nav class="pmb-tabs" aria-label="Tahap pembimbing">
                    <a class="pmb-tab" href="{{ route('pengajuan') }}">Pembimbing</a>
                    <a class="pmb-tab" href="{{ route('pendaftaran.sempro') }}">Seminar Proposal</a>
                    <a class="pmb-tab is-active" href="{{ route('pendaftaran.skripsi') }}" aria-current="page">Sidang Skripsi</a>
                </nav>

                <h1 class="pmb-title">Pendaftaran Sidang Skripsi</h1>
                <p class="pmb-subtitle">Periksa persyaratan dan data pengajuan sebelum mendaftar.</p>

                <div class="dfs-stack">
                    <section class="dfs-card dfs-card--status" aria-labelledby="dfs-status">
                        <h2 class="dfs-head__title" id="dfs-status">Kesiapan Pendaftaran</h2>

                        <div class="dfs-reqs">
                            <p class="dfs-req">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
                                    <path d="M8 12.3l2.7 2.7L16 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Sudah mengikuti Seminar Proposal
                            </p>
                            <p class="dfs-req">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
                                    <path d="M8 12.3l2.7 2.7L16 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Proposal sudah disetujui
                            </p>
                            <p class="dfs-req">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
                                    <path d="M8 12.3l2.7 2.7L16 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Bimbingan Skripsi
                            </p>
                        </div>
                    </section>

                    <div class="dfs-columns">
                        <section class="dfs-card dfs-card--data" aria-labelledby="dfs-data">
                            <div class="dfs-head">
                                <span class="dfs-head__icon">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M14 3.5H7.6A1.6 1.6 0 0 0 6 5.1v13.8a1.6 1.6 0 0 0 1.6 1.6h8.8a1.6 1.6 0 0 0 1.6-1.6V7.5l-4-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                        <path d="M13.6 3.8v3.9h4M9 12.6h6M9 16h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <h2 class="dfs-head__title" id="dfs-data">Data Pengajuan</h2>
                            </div>

                            <div class="dfs-grid">
                                <div class="dfs-item">
                                    <span class="dfs-item__label">Nama Mahasiswa</span>
                                    <span class="dfs-item__value">Nadra Saputra</span>
                                </div>
                                <div class="dfs-item">
                                    <span class="dfs-item__label">NIM</span>
                                    <span class="dfs-item__value">2507411071</span>
                                </div>
                            </div>

                            <div class="dfs-divider"></div>

                            <div class="dfs-item">
                                <span class="dfs-item__label">Judul Skripsi</span>
                                <span class="dfs-item__value dfs-item__value--soft">
                                    Pengembangan Aplikasi Point of Sales (POS) untuk UMKM Kuliner &ldquo;Warung Mak Dara&rdquo;
                                </span>
                            </div>

                            <div class="dfs-divider"></div>

                            <div class="dfs-item">
                                <span class="dfs-item__label">Dosen Pembimbing</span>
                                <div class="dfs-advisor">
                                    <span class="dfs-advisor__avatar" aria-hidden="true">BW</span>
                                    <span class="dfs-advisor__name">Bambang Warsuta, S.Kom., M.T.I.</span>
                                </div>
                            </div>
                        </section>

                        <section class="dfs-card dfs-card--info" aria-labelledby="dfs-info">
                            <div class="dfs-head">
                                <span class="dfs-head__icon">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <circle cx="12" cy="12" r="8.6" stroke="currentColor" stroke-width="1.7" />
                                        <path d="M12 7.4V12l3.2 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <h2 class="dfs-head__title" id="dfs-info">Informasi Penjadwalan</h2>
                            </div>

                            <span class="dfs-badge">Belum Dijadwalkan</span>
                            <p class="dfs-info__note">Admin menginput jadwal setelah pendaftaran diproses.</p>

                            <div class="dfs-schedule">
                                <div class="dfs-schedule__row">
                                    <span class="dfs-schedule__icon">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <rect x="4" y="5.5" width="16" height="15" rx="2.2" stroke="currentColor" stroke-width="1.7" />
                                            <path d="M4.4 10.2h15.2M8.6 3.6v3.6M15.4 3.6v3.6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <span class="dfs-schedule__label">TANGGAL</span>
                                    <span class="dfs-schedule__value">Belum Tersedia</span>
                                </div>
                                <div class="dfs-schedule__row">
                                    <span class="dfs-schedule__icon">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <circle cx="12" cy="12" r="8.6" stroke="currentColor" stroke-width="1.7" />
                                            <path d="M12 7.4V12l3.2 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <span class="dfs-schedule__label">WAKTU</span>
                                    <span class="dfs-schedule__value">Belum Tersedia</span>
                                </div>
                                <div class="dfs-schedule__row">
                                    <span class="dfs-schedule__icon">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M12 21s6.4-5.4 6.4-10.2A6.4 6.4 0 0 0 5.6 10.8C5.6 15.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                            <circle cx="12" cy="10.4" r="2.4" stroke="currentColor" stroke-width="1.7" />
                                        </svg>
                                    </span>
                                    <span class="dfs-schedule__label">TEMPAT</span>
                                    <span class="dfs-schedule__value">Belum Tersedia</span>
                                </div>
                            </div>
                        </section>
                    </div>

                    <label class="dfs-agree">
                        <input type="checkbox" name="kesesuaian" checked>
                        Data dan persyaratan pengajuan sudah sesuai.
                    </label>

                    <div class="dfs-actions">
                        <button class="dfs-btn dfs-btn--ghost" type="button">PERIKSA DATA SIDANG</button>
                        <button class="dfs-btn dfs-btn--solid" type="button">Daftar Sidang</button>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
