@extends('layouts.app')

@section('title', 'Dashboard — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-dashboard.css') }}?v={{ filemtime(public_path('css/laras-dashboard.css')) }}">
@endpush

@section('content')
    <main class="dash-page">
        <div class="dash-shell">

            <x-navbar active="Dashboard" />

            <section class="dash-banner">
                <h1 class="dash-banner__title">
                    Pengembangan Aplikasi Point of Sales (POS) untuk UMKM Kuliner &ldquo;Warung Mak Dara&rdquo;
                </h1>
                <p class="dash-banner__meta">
                    Studi Kasus: Warung Mak Dara - Bidang Fokus Manajemen Proyek, TI &amp; Software Engineering
                </p>
            </section>

            <div class="dash-grid">

                <article class="dash-card">
                    <div class="dash-card__head">
                        <h2 class="dash-card__label">Nilai Sempro</h2>
                        <span class="dash-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 6.6c-1.9-1.5-4.1-2-6.5-2v13c2.4 0 4.6.5 6.5 2 1.9-1.5 4.1-2 6.5-2v-13c-2.4 0-4.6.5-6.5 2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                <path d="M12 6.6v13" stroke="currentColor" stroke-width="1.7" />
                            </svg>
                        </span>
                    </div>
                    <p class="dash-card__value">88.5</p>
                </article>

                <article class="dash-card">
                    <div class="dash-card__head">
                        <h2 class="dash-card__label">Status ACC Sidang</h2>
                        <span class="dash-card__icon dash-card__icon--success">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="dash-card__value dash-card__value--success">ACC FULL</p>
                </article>

                <article class="dash-card">
                    <div class="dash-card__head">
                        <h2 class="dash-card__label">Logbook Bimbingan</h2>
                        <span class="dash-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M14 4H7.5A1.5 1.5 0 0 0 6 5.5v13A1.5 1.5 0 0 0 7.5 20h9a1.5 1.5 0 0 0 1.5-1.5V8l-4-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                <path d="M13.6 4.3V8.4h4.2M9 12.4h6M9 15.6h6" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="dash-card__value">8 / 8</p>
                </article>

                <article class="dash-card">
                    <div class="dash-card__head">
                        <h2 class="dash-card__label">Jadwal Sidang</h2>
                        <span class="dash-card__icon">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="4" y="5.5" width="16" height="15" rx="2.2" stroke="currentColor" stroke-width="1.7" />
                                <path d="M4.4 10.2h15.2M8.6 3.6v3.6M15.4 3.6v3.6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="dash-card__value">22 Okt 2026</p>
                </article>

                <article class="dash-card dash-card--detail">
                    <h2 class="dash-card__label">Dosen Pembimbing</h2>
                    <dl class="dash-rows">
                        <div class="dash-row">
                            <dt>Pembimbing:</dt>
                            <dd>Bambang Warsuta, S.Kom., M.T.I.</dd>
                        </div>
                        <div class="dash-row">
                            <dt>KP:</dt>
                            <dd>Faisal Oktavian, SS., M.T.I.</dd>
                        </div>
                    </dl>
                </article>

                <article class="dash-card dash-card--detail">
                    <h2 class="dash-card__label">Dewan Penguji Skripsi</h2>
                    <div class="dash-examiners">
                        <div class="dash-examiner">
                            <span class="dash-examiner__role">Ketua Penguji</span>
                            <span class="dash-examiner__name">Prof. Dr. Irwan Santosa</span>
                        </div>
                        <div class="dash-examiner">
                            <span class="dash-examiner__role">Anggota Penguji</span>
                            <span class="dash-examiner__name">Dr. Hendra Saputra, M.Sc.</span>
                        </div>
                        <div class="dash-examiner">
                            <span class="dash-examiner__role">Anggota Penguji</span>
                            <span class="dash-examiner__name">Dr. Anika Wijaya, M.M.</span>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </main>
@endsection
