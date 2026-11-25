@extends('layouts.dosen')

@section('content')
<div class="mt-2 space-y-6">

    <!-- Header Banner -->
    <div class="bg-[#DFE2E6] rounded-2xl px-6 py-5 shadow-sm">
        <h1 class="text-lg sm:text-xl font-bold text-gray-900">Pengajuan Judul & Sidang</h1>
        <p class="text-xs sm:text-sm text-gray-700 mt-1">Verifikasi pengajuan topik skripsi maupun pendaftaran sidang dari mahasiswa.</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-[#DFE2E6] rounded-2xl p-5 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-gray-600">Total Pengajuan Masuk</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">6</p>
            </div>
            <span class="w-10 h-10 rounded-xl bg-white text-gray-800 font-bold text-sm flex items-center justify-center">06</span>
        </div>

        <div class="bg-[#FDF2E9] border border-[#F59E0B] rounded-2xl p-5 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-[#EE7816]">Perlu Persetujuan</p>
                <p id="pending-count" class="text-2xl font-bold text-[#EE7816] mt-1">3</p>
            </div>
            <span class="w-10 h-10 rounded-xl bg-[#EE7816] text-white font-bold text-sm flex items-center justify-center">!</span>
        </div>

        <div class="bg-[#DFE2E6] rounded-2xl p-5 flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-gray-600">Sudah Diverifikasi</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">3</p>
            </div>
            <span class="w-10 h-10 rounded-xl bg-white text-green-600 font-bold text-sm flex items-center justify-center">✓</span>
        </div>
    </div>

    <!-- Daftar Pengajuan -->
    <div class="bg-[#DFE2E6] rounded-2xl p-5 sm:p-6 shadow-sm space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-base sm:text-lg font-bold text-gray-900">Daftar Pengajuan Mahasiswa</h2>
            <span class="bg-[#EE7816] text-white text-[11px] font-semibold px-3.5 py-1 rounded-full">Semester Ganjil 2026/2027</span>
        </div>

        @php
            $daftarPengajuan = $pengajuans ?? [
                [
                    'nama' => 'Eka Putriani',
                    'nim' => '2207411041 • TI 2A',
                    'jenis' => 'Pengajuan Judul Skripsi',
                    'judul' => 'Rancang Bangun Sistem Rekomendasi Pemilihan Dosen Pembimbing Menggunakan Metode SAW',
                    'tanggal' => '25 Nov 2026',
                    'berkas' => 'Proposal_Eka_Putriani.pdf',
                    'status' => 'Menunggu',
                ],
                [
                    'nama' => 'Fajar Nugroho',
                    'nim' => '2207411052 • TI 2B',
                    'jenis' => 'Pendaftaran Sidang Akhir',
                    'judul' => 'Implementasi Microservices pada Sistem Informasi Inventaris Kampus',
                    'tanggal' => '24 Nov 2026',
                    'berkas' => 'Draft_Skripsi_Final_Fajar.pdf',
                    'status' => 'Menunggu',
                ],
                [
                    'nama' => 'Gita Maharani',
                    'nim' => '2207411060 • TI 2C',
                    'jenis' => 'Pengajuan Seminar Proposal',
                    'judul' => 'Optimasi Rute Distribusi Logistik Menggunakan Algoritma Genetika',
                    'tanggal' => '22 Nov 2026',
                    'berkas' => 'Naskah_Sempro_Gita.pdf',
                    'status' => 'Disetujui',
                ],
            ];
        @endphp

        @foreach($daftarPengajuan as $item)
            <div class="pengajuan-card bg-white rounded-2xl p-5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="space-y-1.5 flex-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="bg-[#FDE4CE] text-[#EE7816] text-[11px] font-semibold px-3 py-0.5 rounded-full">
                            {{ $item['jenis'] }}
                        </span>
                        <span class="text-[11px] text-gray-400">&bull; Diajukan {{ $item['tanggal'] }}</span>
                    </div>

                    <h3 class="text-sm sm:text-base font-bold text-gray-900">{{ $item['judul'] }}</h3>
                    <p class="text-xs text-gray-600">
                        Oleh: <strong class="font-semibold text-gray-800">{{ $item['nama'] }}</strong> ({{ $item['nim'] }})
                    </p>

                    <div class="pt-1">
                        <span class="inline-flex items-center gap-1.5 text-xs font-medium text-[#EE7816] bg-orange-50 px-3 py-1 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            {{ $item['berkas'] }}
                        </span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-area flex items-center gap-2.5 shrink-0">
                    @if($item['status'] === 'Menunggu')
                        <button type="button" onclick="handlePengajuan(this, 'Ditolak')"
                            class="bg-white border border-red-300 hover:bg-red-50 text-red-600 text-xs font-semibold px-4 py-2 rounded-xl transition cursor-pointer">
                            Tolak
                        </button>
                        <button type="button" onclick="handlePengajuan(this, 'Disetujui')"
                            class="bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2 rounded-xl transition cursor-pointer">
                            Setujui Pengajuan
                        </button>
                    @else
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-4 py-2 rounded-xl">
                            Disetujui ✓
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
function handlePengajuan(btn, status) {
    const area = btn.closest('.action-area');
    if (status === 'Disetujui') {
        area.innerHTML = '<span class="bg-green-100 text-green-700 text-xs font-semibold px-4 py-2 rounded-xl">Disetujui ✓</span>';
    } else {
        area.innerHTML = '<span class="bg-red-100 text-red-700 text-xs font-semibold px-4 py-2 rounded-xl">Ditolak</span>';
    }
}
</script>
@endsection