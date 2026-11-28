@extends('layouts.dosen')

@section('content')
<div class="mt-2 space-y-6">

    <!-- Header Banner -->
    <div class="bg-[#DFE2E6] rounded-2xl px-6 py-5 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-lg sm:text-xl font-bold text-gray-900">Manajemen Bimbingan Skripsi</h1>
            <p class="text-xs sm:text-sm text-gray-700 mt-1">Pantau progres bab, catatan logbook, dan riwayat konsultasi mahasiswa bimbingan.</p>
        </div>
        <a href="{{ route('dosen.pantauan-mahasiswa') }}"
            class="bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition shrink-0 text-center">
            Pantauan & ACC Sidang &rarr;
        </a>
    </div>

    <!-- Filter & Search -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex flex-wrap items-center gap-2">
            <button type="button" data-filter="all" class="bim-filter bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer">
                Semua (4)
            </button>
            <button type="button" data-filter="Menunggu Review" class="bim-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
                Menunggu Review
            </button>
            <button type="button" data-filter="Revisi" class="bim-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
                Revisi
            </button>
            <button type="button" data-filter="Disetujui" class="bim-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
                Disetujui
            </button>
        </div>

        <div class="relative w-full sm:w-64">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" id="search-bimbingan" placeholder="Cari nama / NIM / judul..."
                class="w-full bg-white border border-gray-300 rounded-xl pl-9 pr-4 py-2 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
        </div>
    </div>

    <!-- Daftar Logbook Bimbingan -->
    <div class="bg-[#DFE2E6] rounded-2xl p-5 sm:p-6 shadow-sm space-y-4">
        @php
            $daftarBimbingan = $bimbingans ?? [
                [
                    'nama' => 'Asfar Azuria',
                    'nim' => '2207411001 • TI 2A',
                    'judul' => 'Sistem Manajemen Sidang Skripsi Berbasis Web',
                    'pertemuan' => 'Bimbingan ke-8 (Bab IV & V)',
                    'tanggal' => '24 Nov 2026',
                    'catatan_mhs' => 'Sudah memperbaiki diagram ERD dan hasil pengujian UAT sesuai arahan pertemuan sebelumnya.',
                    'status' => 'Disetujui',
                ],
                [
                    'nama' => 'Bintang Pratama',
                    'nim' => '2207411014 • TI 2B',
                    'judul' => 'Analisis Sentimen pada Media Sosial Menggunakan IndoBERT',
                    'pertemuan' => 'Bimbingan ke-4 (Bab II & III)',
                    'tanggal' => '25 Nov 2026',
                    'catatan_mhs' => 'Mohon review bagian dataset preprocessing dan metrik evaluasi confusion matrix.',
                    'status' => 'Menunggu Review',
                ],
                [
                    'nama' => 'Citra Lestari',
                    'nim' => '2207411022 • TI 2A',
                    'judul' => 'Pengembangan Aplikasi Mobile Layanan Akademik Kampus',
                    'pertemuan' => 'Bimbingan ke-6 (Bab IV)',
                    'tanggal' => '23 Nov 2026',
                    'catatan_mhs' => 'Lampiran wireframe Figma dan API endpoint sudah ditambahkan pada laporan.',
                    'status' => 'Menunggu Review',
                ],
                [
                    'nama' => 'Dimas Saputra',
                    'nim' => '2207411035 • TI 2C',
                    'judul' => 'Deteksi Dini Penyakit Daun Padi dengan Convolutional Neural Network',
                    'pertemuan' => 'Bimbingan ke-3 (Bab I & II)',
                    'tanggal' => '20 Nov 2026',
                    'catatan_mhs' => 'Revisi rumusan masalah dan batasan penelitian telah diperbarui.',
                    'status' => 'Revisi',
                ],
            ];
        @endphp

        @foreach($daftarBimbingan as $item)
            @php
                $badgeClass = match($item['status']) {
                    'Disetujui' => 'bg-green-100 text-green-700',
                    'Menunggu Review' => 'bg-[#FDE4CE] text-[#EE7816]',
                    default => 'bg-gray-200 text-gray-700',
                };
            @endphp
            <div class="bim-card bg-white rounded-2xl p-5 shadow-xs space-y-3"
                data-search="{{ strtolower($item['nama'] . ' ' . $item['nim'] . ' ' . $item['judul']) }}"
                data-status="{{ $item['status'] }}">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3.5">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item['nama']) }}&background=EE7816&color=fff&size=128"
                            alt="{{ $item['nama'] }}" class="w-11 h-11 rounded-full object-cover shrink-0">
                        <div>
                            <div class="flex flex-wrap items-center gap-2">
                                <h3 class="text-sm font-bold text-gray-900">{{ $item['nama'] }}</h3>
                                <span class="text-[11px] text-gray-500">({{ $item['nim'] }})</span>
                            </div>
                            <p class="text-xs text-gray-600 mt-0.5">{{ $item['judul'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <span class="text-[11px] font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                            {{ $item['pertemuan'] }}
                        </span>
                        <span class="status-badge {{ $badgeClass }} text-[11px] font-semibold px-3 py-1 rounded-full">
                            {{ $item['status'] }}
                        </span>
                    </div>
                </div>

                <div class="bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-xs text-gray-700">
                    <span class="font-semibold text-gray-900">Catatan Mahasiswa ({{ $item['tanggal'] }}):</span>
                    {{ $item['catatan_mhs'] }}
                </div>

                <!-- Form Balasan Singkat Dosen -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 pt-1">
                    <input type="text" placeholder="Tulis catatan / feedback bimbingan untuk mahasiswa..."
                        class="flex-1 bg-white border border-gray-300 rounded-xl px-3.5 py-2 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816]">
                    <div class="flex items-center gap-2 shrink-0">
                        <button type="button" onclick="updateBimbinganStatus(this, 'Revisi')"
                            class="bg-white border border-gray-300 hover:border-gray-400 text-gray-700 text-xs font-semibold px-4 py-2 rounded-xl transition cursor-pointer">
                            Minta Revisi
                        </button>
                        <button type="button" onclick="updateBimbinganStatus(this, 'Disetujui')"
                            class="bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-4 py-2 rounded-xl transition cursor-pointer">
                            ACC Bimbingan
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
function updateBimbinganStatus(btn, newStatus) {
    const card = btn.closest('.bim-card');
    const badge = card.querySelector('.status-badge');
    card.dataset.status = newStatus;
    badge.textContent = newStatus;

    if (newStatus === 'Disetujui') {
        badge.className = 'status-badge bg-green-100 text-green-700 text-[11px] font-semibold px-3 py-1 rounded-full';
    } else {
        badge.className = 'status-badge bg-gray-200 text-gray-700 text-[11px] font-semibold px-3 py-1 rounded-full';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-bimbingan');
    const filterBtns = document.querySelectorAll('.bim-filter');
    const cards = document.querySelectorAll('.bim-card');
    let currentFilter = 'all';

    function applyFilter() {
        const q = searchInput.value.toLowerCase().trim();
        cards.forEach(card => {
            const matchText = card.dataset.search.includes(q);
            const matchStatus = currentFilter === 'all' || card.dataset.status === currentFilter;
            card.classList.toggle('hidden', !(matchText && matchStatus));
        });
    }

    searchInput.addEventListener('input', applyFilter);

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentFilter = btn.dataset.filter;
            filterBtns.forEach(b => {
                b.className = 'bim-filter bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer';
            });
            btn.className = 'bim-filter bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer';
            applyFilter();
        });
    });
});
</script>
@endsection