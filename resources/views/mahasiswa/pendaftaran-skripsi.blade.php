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
        />
    </x-pembimbing-shell>
@endsection
