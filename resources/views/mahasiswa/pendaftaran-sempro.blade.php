@extends('layouts.app')

@section('title', 'Pendaftaran Seminar Proposal — LARAS')

@section('content')
    <x-pembimbing-shell step="sempro" title="Pendaftaran Seminar Proposal" subtitle="Periksa persyaratan dan data pengajuan sebelum mendaftar.">
        <x-daftar-pendaftaran
            jenis="sempro"
            judul-label="Judul Proposal"
            :syarat="['Minimal 3 kali bimbingan proposal', 'Proposal disetujui dosen pembimbing', 'Proposal Skripsi tersedia']"
            ghost-label="PERIKSA DATA SEMPRO"
            solid-label="Daftar Sempro"
            ghost-open="notif-periksa-data"
            solid-open="notif-konfirmasi-sempro"
        />
    </x-pembimbing-shell>

    <x-notif-dialog id="notif-konfirmasi-sempro" title="Daftar seminar proposal?" :actions="[
        ['label' => 'Periksa kembali', 'variant' => 'secondary'],
        ['label' => 'Ya, daftar sempro'],
    ]">
        <p class="m-0">Pastikan data proposal sudah sesuai.</p>
        <p class="m-0">Pendaftaran akan dikirim untuk diperiksa.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-periksa-data" title="Periksa data pendaftaran" :actions="[
        ['label' => 'Tutup pemeriksaan', 'variant' => 'secondary', 'size' => 'sm'],
        ['label' => 'Edit biodata', 'variant' => 'secondary', 'size' => 'sm', 'href' => route('profile')],
        ['label' => 'Edit topik pengajuan', 'size' => 'lg', 'href' => route('pengajuan')],
    ]">
        <p class="m-0">Perbaiki identitas melalui halaman profil.</p>
        <p class="m-0">Periksa topik dan usulan dosen melalui pengajuan.</p>
        <p class="mt-[20px]">Kembali ke pendaftaran setelah data sudah sesuai.</p>
    </x-notif-dialog>
@endsection
