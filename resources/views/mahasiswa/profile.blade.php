@extends('layouts.app')

@section('title', 'Profil — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-profile.css') }}?v={{ filemtime(public_path('css/laras-profile.css')) }}">
@endpush

@section('content')
    <main class="prof-page">
        <div class="prof-shell">

            <x-navbar variant="orange" />

            <section class="prof-hero">
                <span class="prof-hero__avatar" aria-hidden="true">NS</span>

                <div class="prof-hero__identity">
                    <div class="prof-hero__nameline">
                        <h1 class="prof-hero__name">Nadra Saputra</h1>
                        <span class="prof-badge prof-badge--active">Mahasiswa Aktif</span>
                    </div>
                    <p class="prof-hero__meta">NIM: 2507411071 &ndash; SI Teknik Informatika (Angkatan 2025)</p>
                </div>

                <button class="prof-hero__edit" type="button">Edit Biodata</button>
            </section>

            <section class="prof-panel">
                <h2 class="prof-panel__title">Data Diri &amp; Kontak Mahasiswa</h2>
                <p class="prof-panel__subtitle">Informasi utama identitas dan kontak aktif untuk keperluan akademik</p>
                <hr class="prof-panel__rule">

                <div class="prof-fields">
                    <div class="prof-field">
                        <span class="prof-field__label">Nama lengkap</span>
                        <span class="prof-field__value">Nadra Saputra</span>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">NIM</span>
                        <span class="prof-field__value">2507411071</span>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">Program studi / Jurusan</span>
                        <span class="prof-field__value">SI Teknik Informatika / TIK</span>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">Email mahasiswa</span>
                        <a class="prof-field__value prof-field__link" href="mailto:nadrasaputra@gmail.com">nadrasaputra@gmail.com</a>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">Nomor Whatsapp / HP</span>
                        <span class="prof-field__value">+62 123-456-789</span>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">Kontak darurat (orang tua / wali)</span>
                        <span class="prof-field__value">+62 987-654-321 (Bapak)</span>
                    </div>
                    <div class="prof-field prof-field--wide">
                        <span class="prof-field__label">Alamat domisili lengkap</span>
                        <span class="prof-field__value">Jl. Margonda Raya No.45, RT02/RW05, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424</span>
                    </div>
                </div>
            </section>

            <section class="prof-panel">
                <div class="prof-panel__head">
                    <h2 class="prof-panel__title">Detail Tugas Akhir / Proposal</h2>
                    <span class="prof-badge prof-badge--stage">Tahap Sempro</span>
                </div>
                <hr class="prof-panel__rule">

                <p class="prof-panel__eyebrow">Judul Proposal Terdaftar:</p>
                <p class="prof-thesis">
                    &ldquo;Pengembangan Aplikasi Point of Sales (POS) berbasis Web untuk Optimalisasi Manajemen Stok dan Transaksi UMKM Kuliner &lsquo;Warung Mak Dara&rsquo;&rdquo;
                </p>

                <div class="prof-advisors">
                    <div class="prof-field">
                        <span class="prof-field__label">Dosen Pembimbing</span>
                        <span class="prof-field__value prof-field__value--lg">Bambang Warsuta, S.Kom., M.T.I.</span>
                        <span class="prof-field__note">NIDN: 0412088501</span>
                    </div>
                    <div class="prof-field">
                        <span class="prof-field__label">Dosen KPS</span>
                        <span class="prof-field__value prof-field__value--lg">Euis Oktavianti, S.Si., M.T.I.</span>
                        <span class="prof-field__note">NIDN: 0415108802</span>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
