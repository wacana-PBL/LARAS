@extends('layouts.app')

@section('title', 'Dashboard Admin — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-admin.css') }}?v={{ filemtime(public_path('css/laras-admin.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-admin-dashboard.css') }}?v={{ filemtime(public_path('css/laras-admin-dashboard.css')) }}">
@endpush

@section('content')
    @php
        $stats = [
            ['title' => 'Menunggu Verifikasi', 'value' => '12', 'link' => 'Perlu tindakan admin →', 'href' => route('admin.verifikasi'), 'icon' => 'inbox'],
            ['title' => 'Siap Dijadwalkan', 'value' => '12', 'link' => 'Data Sudah Diapprove →', 'href' => route('admin.jadwal'), 'icon' => 'schedule'],
            ['title' => 'Sidang Hari Ini', 'value' => '12', 'link' => 'Lihat detail jadwal →', 'href' => route('admin.jadwal'), 'icon' => 'today'],
        ];
        $activities = [
            ['name' => 'Nadra Zaki Saputra', 'text' => 'Nadra Zaki Saputra mengirim pengajuan Sempro.', 'time' => '10 menit yang lalu'],
            ['name' => 'Bintang Putra Adryan', 'text' => 'Bintang Putra Adryan mengirim pengajuan Skripsi.', 'time' => '25 menit yang lalu'],
        ];
        $agenda = [
            ['time' => '09:00 - 10:30', 'room' => 'Ruang TIK 1', 'name' => 'Asfar Azuria', 'kind' => 'Seminar Proposal', 'accent' => true],
            ['time' => '09:00 - 10:30', 'room' => 'Ruang TIK 1', 'name' => 'Asfar Azuria', 'kind' => 'Seminar Proposal', 'accent' => false],
        ];
    @endphp

    <main class="adm-page">
        <div class="adm-shell">

            <x-navbar variant="admin" active="Dashboard" />

            <section class="adm-banner admd-banner" aria-label="Ringkasan operasional">
                <h1 class="adm-banner__title">Overview Operasional</h1>
                <p class="adm-banner__text">Pantau antrean pendaftaran dan jadwal sidang skripsi terkini.</p>
            </section>

            <section class="admd-stats" aria-label="Statistik pendaftaran">
                @foreach ($stats as $stat)
                    <article class="admd-stat">
                        <span class="admd-stat__icon" aria-hidden="true">
                            @if ($stat['icon'] === 'inbox')
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M4 13h4l1.5 3h5L16 13h4" stroke="#020100" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4 13 6.2 5.6A2 2 0 0 1 8.1 4h7.8a2 2 0 0 1 1.9 1.6L20 13v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4Z" stroke="#020100" stroke-width="1.8" stroke-linejoin="round" />
                                </svg>
                            @elseif ($stat['icon'] === 'schedule')
                                <svg viewBox="0 0 24 24" fill="none">
                                    <circle cx="12" cy="12" r="8.2" stroke="#020100" stroke-width="1.8" />
                                    <path d="M12 7.6V12l3.2 2" stroke="#020100" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @else
                                <svg viewBox="0 0 24 24" fill="none">
                                    <rect x="3.8" y="5.4" width="16.4" height="14.4" rx="2.4" stroke="#020100" stroke-width="1.8" />
                                    <path d="M8 3.6v3.4M16 3.6v3.4M3.8 10h16.4" stroke="#020100" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            @endif
                        </span>

                        <h2 class="admd-stat__title">{{ $stat['title'] }}</h2>
                        <p class="admd-stat__value">{{ $stat['value'] }}</p>
                        <a class="admd-stat__link" href="{{ $stat['href'] }}">{{ $stat['link'] }}</a>
                    </article>
                @endforeach
            </section>

            <section class="admd-info" aria-label="Aktivitas dan agenda">
                <article class="admd-card">
                    <h2 class="admd-card__title">Aktivitas Sistem Terbaru</h2>

                    <ul class="admd-activity">
                        @foreach ($activities as $activity)
                            <li class="admd-activity__item">
                                <span class="admd-avatar" aria-hidden="true">{{ mb_substr($activity['name'], 0, 1) }}</span>
                                <div class="admd-activity__body">
                                    <p class="admd-activity__text">{{ $activity['text'] }}</p>
                                    <p class="admd-activity__time">{{ $activity['time'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </article>

                <article class="admd-card">
                    <h2 class="admd-card__title">Agenda Terdekat</h2>

                    <ul class="admd-agenda">
                        @foreach ($agenda as $item)
                            <li class="admd-agenda__item">
                                <div class="admd-agenda__row">
                                    <span class="admd-agenda__time{{ $item['accent'] ? ' admd-agenda__time--accent' : '' }}">{{ $item['time'] }}</span>
                                    <span class="admd-agenda__room">{{ $item['room'] }}</span>
                                </div>
                                <div class="admd-agenda__row admd-agenda__row--bottom">
                                    <span class="admd-agenda__name">{{ $item['name'] }}</span>
                                    <span class="admd-agenda__kind">{{ $item['kind'] }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </section>

        </div>
    </main>
@endsection
