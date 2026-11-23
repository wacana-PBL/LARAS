@extends('layouts.app')

@section('title', 'Pendaftaran Sidang Skripsi — LARAS')

@section('content')
    <x-pembimbing-shell step="skripsi" title="Pendaftaran Sidang Skripsi" subtitle="Periksa persyaratan dan data pengajuan sebelum mendaftar.">
        <x-daftar-pendaftaran
            jenis="skripsi"
            judul-label="Judul Skripsi"
            :syarat="['Sudah mengikuti Seminar Proposal', 'Proposal sudah disetujui', 'Bimbingan Skripsi']"
            ghost-label="PERIKSA DATA SIDANG"
            solid-label="Daftar Sidang"
            ghost-open="notif-periksa-data"
            solid-open="notif-konfirmasi-sidang"
            unchecked-open="notif-syarat-skripsi"
        />
    </x-pembimbing-shell>

    <x-notif-dialog id="notif-konfirmasi-sidang" title="Daftar sidang skripsi?" :actions="[
        ['label' => 'Periksa kembali', 'variant' => 'secondary'],
        ['label' => 'Ya, daftar sidang'],
    ]">
        <p class="m-0">Pastikan data skripsi sudah sesuai.</p>
        <p class="m-0">Pendaftaran akan dikirim untuk diperiksa.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-syarat-skripsi" title="Syarat pendaftaran belum lengkap" tone="line" :actions="[
        ['label' => 'Periksa syarat'],
    ]">
        <p class="m-0">Lengkapi syarat yang ditandai pada halaman pendaftaran.</p>
        <p class="m-0">Setelah semua syarat terpenuhi, kamu bisa mendaftar.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-perbaikan-skripsi" title="Pendaftaran perlu diperbaiki" tone="line" :actions="[
        ['label' => 'Perbaiki data'],
    ]">
        <p class="m-0">Baca catatan pemeriksa sebelum mengirim ulang.</p>
        <p class="m-0">Catatan pemeriksa: lampiran hasil pengujian belum diunggah.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-periksa-data" top="48" title="Periksa data pendaftaran" :actions="[
        ['label' => 'Tutup pemeriksaan', 'variant' => 'secondary', 'size' => 'sm'],
        ['label' => 'Edit biodata', 'variant' => 'secondary', 'size' => 'sm', 'href' => route('profile')],
        ['label' => 'Edit topik pengajuan', 'size' => 'lg', 'href' => route('pengajuan')],
    ]">
        <p class="m-0">Perbaiki identitas melalui halaman profil.</p>
        <p class="m-0">Periksa topik dan usulan dosen melalui pengajuan.</p>
        <p class="mt-[20px]">Kembali ke pendaftaran setelah data sudah sesuai.</p>
    </x-notif-dialog>
@endsection
