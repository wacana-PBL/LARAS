@extends('layouts.app')

@section('title', 'Jadwal — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-jadwal.css') }}?v={{ filemtime(public_path('css/laras-jadwal.css')) }}">
@endpush

@section('content')
    @php
        $weeks = [
            [27, 28, 29, 30, 1, 2, 3],
            [4, 5, 6, 7, 8, 9, 10],
            [11, 12, 13, 14, 15, 16, 17],
            [18, 19, 20, 21, 22, 23, 24],
        ];
        $highlight = [7 => 'bimbingan', 15 => 'sidang'];
        $prefs = [
            ['label' => 'BIMBINGAN', 'class' => 'bimbingan'],
            ['label' => 'SIDANG', 'class' => 'sidang'],
            ['label' => 'DEADLINE REVISI', 'class' => 'deadline'],
        ];
    @endphp

    <main class="jdw-page">
        <div class="jdw-shell">

            <x-navbar active="Jadwal" />

            <section class="jdw-agenda" aria-label="Kalender dan jadwal terdekat">
                <div class="jdw-calendar-wrap">
                    <h1 class="jdw-month">SEPTEMBER, 2026</h1>

                    <div class="jdw-calendar">
                        <div class="jdw-calendar__grid" aria-hidden="true">
                            @foreach (['SAN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'] as $day)
                                <span class="jdw-calendar__day">{{ $day }}</span>
                            @endforeach
                        </div>

                        <div class="jdw-calendar__dates">
                            @foreach ($weeks as $week)
                                <div class="jdw-calendar__grid">
                                    @foreach ($week as $date)
                                        <span class="jdw-date{{ isset($highlight[$date]) ? ' jdw-date--' . $highlight[$date] : '' }}">
                                            <span class="jdw-date__inner">{{ $date }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="jdw-side">
                    <h2 class="jdw-side__title">Jadwal Terdekat</h2>

                    <div class="jdw-events">
                        <article class="jdw-event">
                            <p class="jdw-event__top">07, September 2026</p>
                            <p class="jdw-event__bottom">BIMBINGAN 1</p>
                        </article>

                        <article class="jdw-event jdw-event--sidang">
                            <p class="jdw-event__top">15, September 2026</p>
                            <p class="jdw-event__bottom">SIDANG PROPOSAL</p>
                        </article>
                    </div>

                    <p class="jdw-side__note">
                        Silahkan untuk mengikuti kegiatan pada waktu-nya agar dapat menyelesaikan Proposal / Skripsi tepat
                        waktu
                    </p>
                </div>
            </section>

            <section class="jdw-prefs" aria-labelledby="jdw-prefs-title">
                <h2 class="jdw-prefs__title" id="jdw-prefs-title">PREFERENSI</h2>

                <div class="jdw-prefs__list">
                    @foreach ($prefs as $pref)
                        <div class="jdw-pref jdw-pref--{{ $pref['class'] }}">
                            <span class="jdw-pref__label">{{ $pref['label'] }}</span>
                            <span class="jdw-pref__meter">
                                <button class="jdw-pref__move" type="button" aria-label="Naikkan prioritas {{ $pref['label'] }}">
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M6 15l6-6 6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="jdw-prefs__actions">
                    <button class="jdw-add" type="button">
                        TAMBAH PREFERENSI
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </section>

        </div>
    </main>
@endsection
