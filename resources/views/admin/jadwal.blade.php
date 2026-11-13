@extends('layouts.app')

@section('title', 'Penjadwalan Sidang — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-admin.css') }}?v={{ filemtime(public_path('css/laras-admin.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-admin-jadwal.css') }}?v={{ filemtime(public_path('css/laras-admin-jadwal.css')) }}">
@endpush

@section('content')
    @php
        $queue = [
            [
                'name' => 'Nadra Zaki Saputra',
                'kind' => 'Seminar Proposal',
                'status' => 'Pendaftaran Disetujui',
                'active' => true,
            ],
            [
                'name' => 'William Sembiring Brahmana',
                'kind' => 'Sidang Skripsi',
                'status' => null,
                'active' => false,
            ],
            [
                'name' => 'Asfar Azuria',
                'kind' => 'Sidang Skripsi',
                'status' => null,
                'active' => false,
            ],
        ];
    @endphp

    <main class="adm-page admj-page">
        <div class="adm-shell">

            <x-navbar variant="admin" active="Jadwal" />

            <section class="adm-banner admj-banner" aria-label="Penjadwalan sidang">
                <h1 class="adm-banner__title">Penjadwalan Sidang &amp; Sempro</h1>
                <p class="adm-banner__text">Plotting jadwal dan dosen penguji untuk pendaftaran yang telah disetujui</p>
            </section>

            <section class="admj-board" aria-label="Antrean dan plotting jadwal">
                <aside class="admj-queue">
                    <header class="admj-queue__head">
                        <h2 class="admj-queue__title">Antrean (3)</h2>
                        <span class="admj-queue__pill">Siap Jadwal</span>
                    </header>

                    <div class="admj-queue__list">
                        @foreach ($queue as $item)
                            <button class="admj-item{{ $item['active'] ? ' is-active' : '' }}" type="button">
                                <span class="admj-item__name">{{ $item['name'] }}</span>
                                <span class="admj-item__kind">{{ $item['kind'] }}</span>

                                @if ($item['status'])
                                    <span class="admj-item__status">
                                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M5 12.8 9.6 17.4 19 7.4" stroke="#1d9329" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $item['status'] }}
                                    </span>
                                @endif
                            </button>
                        @endforeach
                    </div>
                </aside>

                <div class="admj-form">
                    <h2 class="admj-form__title">Plotting: Nadra Zaki Saputra</h2>
                    <p class="admj-form__meta">
                        NIM: 4320210001 &bull; Seminar Proposal &bull; Pembimbing: Bambang Warsuta, S.Kom., M.T.I.
                    </p>

                    <hr class="admj-form__rule">

                    <div class="admj-field">
                        <p class="admj-field__label">TANGGAL SIDANG</p>

                        <div class="admj-field__row">
                            <label class="admj-input admj-input--date">
                                <span class="admj-input__value">28 / 10 / 2026</span>
                                <svg class="admj-input__icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="3.6" y="5.4" width="16.8" height="14.6" rx="2.2" stroke="#020100" stroke-width="1.8" />
                                    <path d="M8 3.4v3.6M16 3.4v3.6M3.6 10h16.8" stroke="#020100" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </label>

                            <label class="admj-input admj-input--time">
                                <span class="admj-input__value">09 . 00</span>
                            </label>

                            <label class="admj-input admj-input--time">
                                <span class="admj-input__value">10 . 30</span>
                            </label>
                        </div>
                    </div>

                    <div class="admj-field admj-field--room">
                        <p class="admj-field__label">RUANGAN / LOKASI</p>
                        <label class="admj-input admj-input--room">
                            <span class="admj-input__value admj-input__value--muted">Pilih ruangan sidang</span>
                        </label>
                    </div>

                    <div class="admj-examiners">
                        @foreach (['DOSEN PENGUJI 1', 'DOSEN PENGUJI 2'] as $label)
                            <div class="admj-examiner">
                                <p class="admj-examiner__label">{{ $label }}</p>
                                <button class="admj-examiner__select" type="button">
                                    <span>Pilih dosen penguji</span>
                                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <div class="admj-actions">
                        <button class="admj-cancel" type="button">Batal</button>
                        <button class="admj-submit" type="button">Kirim Pengajuan</button>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
