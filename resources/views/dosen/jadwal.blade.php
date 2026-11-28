@extends('layouts.dosen')

@section('content')
<div class="mt-2 space-y-6">

    <!-- Header Banner -->
    <div class="bg-[#DFE2E6] rounded-2xl px-6 py-5 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg sm:text-xl font-bold text-gray-900">Jadwal Sidang & Seminar</h1>
            <p class="text-xs sm:text-sm text-gray-700 mt-1">Jadwal pengujian dan pendampingan sidang skripsi mahasiswa.</p>
        </div>
        <a href="{{ route('dosen.detail-penilaian') }}"
            class="bg-black hover:bg-gray-800 text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition shrink-0 text-center">
            Buka Form Penilaian Sidang
        </a>
    </div>

    <!-- Filter Peran Dosen -->
    <div class="flex flex-wrap items-center gap-2">
        <span class="text-xs text-gray-600 mr-1">Peran Anda:</span>
        <button type="button" data-role="all" class="role-filter bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer">
            Semua Jadwal
        </button>
        <button type="button" data-role="Pembimbing" class="role-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
            Dosen Pembimbing
        </button>
        <button type="button" data-role="Penguji" class="role-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
            Dosen Penguji
        </button>
    </div>

    <!-- Tabel / Kartu Jadwal -->
    <div class="bg-[#DFE2E6] rounded-2xl p-5 sm:p-6 shadow-sm space-y-4">
        @php
            $daftarJadwal = $jadwals ?? [
                [
                    'hari' => 'Kamis',
                    'tanggal' => '26 Nov 2026',
                    'waktu' => '09:00 - 10:30 WIB',
                    'ruang' => 'Ruang Sidang 1 (Gedung A Lt. 3)',
                    'mahasiswa' => 'Asfar Azuria',
                    'nim' => '2207411001',
                    'judul' => 'Sistem Manajemen Sidang Skripsi Berbasis Web',
                    'jenis' => 'Sidang Akhir',
                    'peran' => 'Pembimbing',
                ],
                [
                    'hari' => 'Jumat',
                    'tanggal' => '27 Nov 2026',
                    'waktu' => '13:30 - 15:00 WIB',
                    'ruang' => 'Ruang Sidang 2 (Gedung A Lt. 3)',
                    'mahasiswa' => 'Hendra Wijaya',
                    'nim' => '2207411077',
                    'judul' => 'Penerapan IoT untuk Monitoring Kualitas Air Kolam Bioflok',
                    'jenis' => 'Seminar Proposal',
                    'peran' => 'Penguji',
                ],
                [
                    'hari' => 'Senin',
                    'tanggal' => '30 Nov 2026',
                    'waktu' => '10:30 - 12:00 WIB',
                    'ruang' => 'Lab Rekayasa Perangkat Lunak',
                    'mahasiswa' => 'Citra Lestari',
                    'nim' => '2207411022',
                    'judul' => 'Pengembangan Aplikasi Mobile Layanan Akademik Kampus',
                    'jenis' => 'Sidang Akhir',
                    'peran' => 'Pembimbing',
                ],
            ];
        @endphp

        @foreach($daftarJadwal as $jadwal)
            <div class="jadwal-card bg-white rounded-2xl p-5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-4"
                data-role="{{ $jadwal['peran'] }}">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                    <!-- Kotak Tanggal -->
                    <div class="bg-[#FDF2E9] border border-[#F59E0B] rounded-xl px-4 py-3 text-center sm:w-36 shrink-0">
                        <p class="text-[11px] font-semibold text-[#EE7816] uppercase">{{ $jadwal['hari'] }}</p>
                        <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $jadwal['tanggal'] }}</p>
                        <p class="text-[11px] text-gray-600 mt-0.5">{{ $jadwal['waktu'] }}</p>
                    </div>

                    <!-- Detail Mahasiswa & Ruangan -->
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="bg-gray-100 text-gray-800 text-[11px] font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $jadwal['jenis'] }}
                            </span>
                            <span class="{{ $jadwal['peran'] === 'Pembimbing' ? 'bg-[#FDE4CE] text-[#EE7816]' : 'bg-blue-100 text-blue-700' }} text-[11px] font-semibold px-2.5 py-0.5 rounded-full">
                                {{ $jadwal['peran'] }}
                            </span>
                        </div>
                        <h3 class="text-sm font-bold text-gray-900">{{ $jadwal['mahasiswa'] }} <span class="font-normal text-gray-500">({{ $jadwal['nim'] }})</span></h3>
                        <p class="text-xs text-gray-600">{{ $jadwal['judul'] }}</p>
                        <p class="text-xs font-medium text-gray-700 pt-0.5">Lokasi: {{ $jadwal['ruang'] }}</p>
                    </div>
                </div>

                <div class="flex items-center justify-end shrink-0">
                    <a href="{{ route('dosen.detail-penilaian') }}"
                        class="bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2.5 rounded-xl transition">
                        Input Nilai
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const roleBtns = document.querySelectorAll('.role-filter');
    const cards = document.querySelectorAll('.jadwal-card');

    roleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const role = btn.dataset.role;
            roleBtns.forEach(b => {
                b.className = 'role-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer';
            });
            btn.className = 'role-filter bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer';

            cards.forEach(card => {
                card.classList.toggle('hidden', role !== 'all' && card.dataset.role !== role);
            });
        });
    });
});
</script>
@endsection