@extends('layouts.app')

@section('title', 'Verifikasi Pendaftaran — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-admin.css') }}?v={{ filemtime(public_path('css/laras-admin.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-admin-verifikasi.css') }}?v={{ filemtime(public_path('css/laras-admin-verifikasi.css')) }}">
@endpush

@section('content')
    @php
        $details = [
            ['label' => 'Dosen Pembimbing', 'value' => 'Bintang Putra, M.T', 'note' => null, 'tone' => null],
            ['label' => 'Log Bimbingan', 'value' => '6 Pertemuan', 'note' => 'TERCATAT', 'tone' => 'ok'],
            ['label' => 'Status Pembimbing', 'value' => 'Disetujui', 'note' => 'ACC DOSEN', 'tone' => 'ok'],
        ];
        $queue = [
            [
                'name' => 'Nadra Zaki Saputra',
                'nim' => '2507411000',
                'class' => 'TI 2A',
                'type' => 'Sempro',
                'sent' => 'Dikirim: 10 menit lalu',
                'title' => 'Implementasi Sistem Manajemen Sidang Skripsi (LARAS) Berbasis Web',
                'open' => true,
            ],
            [
                'name' => 'Nadra Zaki Saputra',
                'nim' => '2507411000',
                'class' => 'TI 2A',
                'type' => 'Skripsi',
                'sent' => 'Dikirim: 10 menit lalu',
                'title' => null,
                'open' => false,
            ],
        ];
    @endphp

    <main class="adm-page admv-page">
        <div class="adm-shell">

            <x-navbar variant="admin" active="Verifikasi" />

            <section class="adm-banner admv-banner" aria-label="Ringkasan verifikasi">
                <div class="admv-banner__text">
                    <h1 class="adm-banner__title">Verifikasi Pendaftaran</h1>
                    <p class="adm-banner__text">Review kelengkapan syarat akademik mahasiswa sebelum sidang.</p>
                </div>

                <span class="adm-pill admv-banner__pill">12 Menunggu Verifikasi</span>
            </section>

            <section class="admv-queue" aria-label="Antrean pendaftaran">
                @foreach ($queue as $item)
                    @if ($item['open'])
                        <article class="admv-card admv-card--open">
                            <header class="admv-head">
                                <div class="admv-who">
                                    <p class="admv-who__name">{{ $item['name'] }}</p>
                                    <p class="admv-who__nim">{{ $item['nim'] }} &bull; {{ $item['class'] }}</p>
                                </div>

                                <span class="admv-type">{{ $item['type'] }}</span>
                                <span class="admv-sent">{{ $item['sent'] }}</span>

                                <span class="admv-caret" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M6 14.5 12 8.5l6 6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </header>

                            <div class="admv-body">
                                <div class="admv-field">
                                    <p class="admv-field__label">Judul Penelitian</p>
                                    <p class="admv-field__value">{{ $item['title'] }}</p>
                                </div>

                                <div class="admv-facts">
                                    @foreach ($details as $detail)
                                        <div class="admv-fact">
                                            <p class="admv-fact__label">{{ $detail['label'] }}</p>
                                            <p class="admv-fact__value">
                                                {{ $detail['value'] }}
                                                @if ($detail['note'])
                                                    <span class="admv-tag">{{ $detail['note'] }}</span>
                                                @endif
                                            </p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="admv-actions">
                                    <button class="admv-btn admv-btn--reject" type="button">Tolak / Revisi</button>
                                    <button class="admv-btn admv-btn--accept" type="button">Setujui</button>
                                </div>
                            </div>
                        </article>
                    @else
                        <article class="admv-card admv-card--closed">
                            <header class="admv-head">
                                <div class="admv-who">
                                    <p class="admv-who__name">{{ $item['name'] }}</p>
                                    <p class="admv-who__nim">{{ $item['nim'] }} &bull; {{ $item['class'] }}</p>
                                </div>

                                <span class="admv-type admv-type--closed">{{ $item['type'] }}</span>
                                <span class="admv-sent">{{ $item['sent'] }}</span>

                                <span class="admv-caret" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </header>
                        </article>
                    @endif
                @endforeach
            </section>

        </div>
    </main>
@endsection
