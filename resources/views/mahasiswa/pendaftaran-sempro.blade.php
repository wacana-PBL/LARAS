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
        />
    </x-pembimbing-shell>
@endsection
