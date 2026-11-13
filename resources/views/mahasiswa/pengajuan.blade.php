@extends('layouts.app')

@section('title', 'Pengajuan — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-pembimbing.css') }}?v={{ filemtime(public_path('css/laras-pembimbing.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-pengajuan.css') }}?v={{ filemtime(public_path('css/laras-pengajuan.css')) }}">
@endpush

@section('content')
    <main class="pmb-page">
        <div class="pmb-shell">

            <x-navbar active="Pengajuan" />

            <div class="pmb-inner">
                <nav class="pmb-tabs" aria-label="Tahap pembimbing">
                    <a class="pmb-tab is-active" href="{{ route('pengajuan') }}" aria-current="page">Pembimbing</a>
                    <a class="pmb-tab" href="{{ route('pendaftaran.sempro') }}">Seminar Proposal</a>
                    <a class="pmb-tab" href="{{ route('pendaftaran.skripsi') }}">Sidang Skripsi</a>
                </nav>

                <h1 class="pmb-title">Pengajuan Pembimbing</h1>
                <p class="pmb-subtitle">Isi topik dan usulan dosen, lalu periksa data sebelum mengirim.</p>

                <section class="pgj-panel pgj-panel--type" aria-labelledby="pgj-type">
                    <h2 class="pgj-panel__label" id="pgj-type">Jenis Pengajuan</h2>
                    <div class="pgj-radios">
                        <label class="pgj-radio">
                            <input type="radio" name="jenis" value="sempro" checked>
                            Seminar Proposal
                        </label>
                        <label class="pgj-radio">
                            <input type="radio" name="jenis" value="skripsi">
                            Sidang Skripsi
                        </label>
                    </div>
                </section>

                <section class="pgj-panel pgj-panel--topic" aria-labelledby="pgj-topic">
                    <h2 class="pgj-panel__label" id="pgj-topic">Data Topik</h2>

                    <form class="pgj-form" onsubmit="return false;">
                        <div class="pgj-field">
                            <label class="pgj-field__label" for="pgj-judul">Judul Proposal</label>
                            <div class="pgj-field__body">
                                <input class="pgj-input" id="pgj-judul" type="text" placeholder="Masukkan judul proposal">
                            </div>
                        </div>

                        <div class="pgj-field">
                            <label class="pgj-field__label" for="pgj-abstrak">Abstrak</label>
                            <div class="pgj-field__body">
                                <textarea class="pgj-input" id="pgj-abstrak" placeholder="Tuliskan ringkasan topik yang diajukan"></textarea>
                            </div>
                        </div>

                        <div class="pgj-field">
                            <label class="pgj-field__label" for="pgj-referensi">Referensi</label>
                            <div class="pgj-field__body">
                                <textarea class="pgj-input" id="pgj-referensi" placeholder="Tuliskan referensi pendukung"></textarea>
                            </div>
                        </div>
                    </form>
                </section>

                <section class="pgj-panel pgj-panel--lecturers" aria-labelledby="pgj-lecturers">
                    <h2 class="pgj-panel__label" id="pgj-lecturers">Usulan Dosen Pembimbing</h2>
                    <p class="pgj-note">Urutkan hingga 3 usulan dosen. Pembimbing ditetapkan setelah proses persetujuan.</p>

                    <div class="pgj-dropdowns">
                        @foreach ([1, 2, 3] as $i)
                            <div class="pgj-dropdown">
                                <span class="pgj-dropdown__label" id="pgj-dosen-{{ $i }}">Dosen {{ $i }}</span>
                                <button class="pgj-select" type="button" aria-labelledby="pgj-dosen-{{ $i }}">
                                    <span>Pilih dosen</span>
                                    <svg viewBox="0 0 14 7" fill="none" aria-hidden="true">
                                        <path d="M1 1l6 5 6-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </section>

                <div class="pgj-actions">
                    <button class="pgj-btn pgj-btn--ghost" type="button">Simpan Draf</button>
                    <button class="pgj-btn pgj-btn--solid" type="button">Kirim Pengajuan</button>
                </div>
            </div>

        </div>
    </main>
@endsection
