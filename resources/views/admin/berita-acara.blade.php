@extends('layouts.app')

@section('title', 'Penerbitan Berita Acara — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-admin.css') }}?v={{ filemtime(public_path('css/laras-admin.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-berita-acara.css') }}?v={{ filemtime(public_path('css/laras-berita-acara.css')) }}">
@endpush

@section('content')
    @php
        $documents = [
            ['name' => 'William Saputra', 'nim' => '25074110xx', 'selected' => true],
            ['name' => 'Bintang Putra Adryan', 'nim' => '25074110069', 'selected' => false],
        ];
        $fields = [
            ['label' => 'Nama', 'value' => 'William Saputra'],
            ['label' => 'NIM', 'value' => '25074110xx'],
            ['label' => 'Judul', 'value' => 'Pengembangan Modul Payroll Otomatis'],
        ];
    @endphp

    <main class="adm-page ba-page">
        <div class="adm-shell">

            <x-navbar variant="admin" active="Berita Acara" />

            <header class="ba-header">
                <h1 class="ba-header__title">Penerbitan Berita Acara</h1>
                <p class="ba-header__text">Review hasil sidang akhir dan terbitkan dokumen Berita Acara.</p>
            </header>

            <section class="ba-content" aria-label="Penerbitan berita acara">
                <aside class="ba-queue" aria-labelledby="ba-queue-title">
                    <header class="ba-queue__head">
                        <h2 class="ba-queue__title" id="ba-queue-title">Menunggu Diterbitkan</h2>
                        <span class="ba-queue__badge">2 Dokumen</span>
                    </header>

                    @foreach ($documents as $document)
                        <button class="ba-student{{ $document['selected'] ? ' is-active' : '' }}" type="button">
                            <span class="ba-student__row">
                                <span class="ba-student__name">{{ $document['name'] }}</span>
                                <span class="ba-student__type">Skripsi</span>
                            </span>
                            <span class="ba-student__nim">NIM: {{ $document['nim'] }}</span>
                            <span class="ba-student__nilai">&#10003; Nilai Lengkap</span>
                        </button>
                    @endforeach
                </aside>

                <div class="ba-preview">
                    <header class="ba-preview__head">
                        <div class="ba-preview__intro">
                            <h2 class="ba-preview__title">Preview: Berita Acara Sidang Skripsi</h2>
                            <p class="ba-preview__text">Sistem akan men-generate dokumen PDF secara otomatis.</p>
                        </div>

                        <div class="ba-preview__actions">
                            <button class="ba-btn ba-btn--outline" type="button">Unduh Draft (PDF)</button>
                            <button class="ba-btn ba-btn--solid" type="button">Publikasikan Dokumen</button>
                        </div>
                    </header>

                    <article class="ba-doc">
                        <header class="ba-doc__head">
                            <h3 class="ba-doc__title">BERITA ACARA SIDANG SKRIPSI</h3>
                            <p class="ba-doc__subtitle">Program Studi Teknik Informatika - Politeknik Negeri Jakarta</p>
                        </header>

                        <div class="ba-doc__rule"></div>

                        <div class="ba-doc__body">
                            <p class="ba-doc__lead">
                                Pada hari ini, Rabu, 28 Oktober 2026, telah dilaksanakan Sidang Skripsi untuk mahasiswa:
                            </p>

                            <dl class="ba-fields">
                                @foreach ($fields as $field)
                                    <div class="ba-field">
                                        <dt>{{ $field['label'] }}</dt>
                                        <dd>{{ $field['value'] }}</dd>
                                    </div>
                                @endforeach
                            </dl>

                            <div class="ba-verdict">
                                <p class="ba-verdict__label">KEPUTUSAN DEWAN PENGUJI</p>
                                <p class="ba-verdict__value">LULUS</p>
                                <p class="ba-verdict__score">Nilai Akhir: 85 (A-)</p>
                            </div>

                            <p class="ba-doc__note">
                                Dokumen ini diterbitkan secara otomatis oleh sistem LARAS dan sah secara akademik tanpa
                                memerlukan tanda tangan basah.
                            </p>
                        </div>
                    </article>
                </div>
            </section>

        </div>
    </main>
@endsection
