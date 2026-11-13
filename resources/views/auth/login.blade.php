@extends('layouts.app')

@section('title', 'Login — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-login.css') }}">
@endpush

@section('content')
    <main class="laras-page">
        <div class="laras-shell">
            <header class="laras-header">
                <h1 class="laras-title">LARAS</h1>
                <p class="laras-subtitle">
                    Layanan Administrasi dan Rangkaian<br>
                    Seminar Proposal &amp; Skripsi
                </p>
            </header>

            <section class="laras-card" aria-labelledby="laras-card-title">
                <h2 id="laras-card-title" class="laras-card-title">Masuk ke akun anda</h2>

                <form class="laras-form" onsubmit="return false;">
                    <div class="laras-field">
                        <label class="laras-label" for="nama">Nama</label>
                        <input
                            class="laras-input"
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama anda"
                            autocomplete="name"
                        >
                    </div>

                    <div class="laras-field">
                        <label class="laras-label" for="email">Email</label>
                        <input
                            class="laras-input"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email anda"
                            autocomplete="email"
                        >
                    </div>

                    <div class="laras-field">
                        <label class="laras-label" for="password">Password</label>
                        <input
                            class="laras-input"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password anda"
                            autocomplete="current-password"
                        >
                    </div>

                    <label class="laras-consent" for="consent">
                        <input class="laras-checkbox" type="checkbox" id="consent" name="consent">
                        <span class="laras-consent-text">
                            Saya mengakui bahwa akun yang saya gunakan merupakan milik sendiri, dan bukan mengambil atau mencuri identitas dari orang lain
                        </span>
                    </label>

                    <div class="laras-actions">
                        <button class="laras-submit" type="submit">Login</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
