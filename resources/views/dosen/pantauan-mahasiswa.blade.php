@extends('layouts.dosen')

@section('content')
<div class="mt-2 space-y-6">

    <!-- Header Banner -->
    <div class="bg-[#DFE2E6] rounded-2xl px-6 py-5 shadow-sm">
        <h1 class="text-lg sm:text-xl font-bold text-gray-900">Pantauan Mahasiswa Bimbingan</h1>
        <p class="text-xs sm:text-sm text-gray-700 mt-1">Daftar mahasiswa yang berada di bawah bimbingan Anda.</p>
    </div>

    <!-- Filter & Search Bar -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
        <div class="flex flex-col sm:flex-row sm:items-end gap-4 flex-1">
            <!-- Dropdown Dosen 1 -->
            <div class="w-full sm:w-64">
                <label for="filter-dosen" class="block text-[11px] font-medium text-gray-700 mb-1.5">Dosen 1</label>
                <div class="relative">
                    <select id="filter-dosen" class="w-full appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2 pr-9 text-xs text-gray-700 focus:outline-none focus:border-[#EE7816] transition cursor-pointer">
                        <option value="">Pilih Dosen</option>
                        <option value="dosen1">Dr. Ahmad Fauzi, M.Kom.</option>
                        <option value="dosen2">Siti Rahmawati, S.T., M.T.</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </div>

            <!-- Status Bimbingan Filter -->
            <div class="flex flex-wrap items-center gap-2 pb-0.5">
                <span class="text-xs text-gray-600 mr-1">Status Bimbingan:</span>
                <button type="button" data-filter="all" class="status-filter-btn bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer">
                    Semua
                </button>
                <button type="button" data-filter="Siap Sidang" class="status-filter-btn bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
                    Siap Sidang
                </button>
                <button type="button" data-filter="Revisi Proposal" class="status-filter-btn bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer">
                    Revisi Proposal
                </button>
            </div>
        </div>

        <!-- Search Input -->
        <div class="w-full lg:w-60">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" id="search-mahasiswa" placeholder="Cari Mahasiswa..."
                    class="w-full bg-white border border-gray-300 rounded-xl pl-9 pr-4 py-2 text-xs text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#EE7816] transition">
            </div>
        </div>
    </div>

    <!-- Main 2-Column Content -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        <!-- LEFT COLUMN (8 Cols): Daftar Mahasiswa -->
        <div class="lg:col-span-8 bg-[#DFE2E6] rounded-2xl p-5 sm:p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base sm:text-lg font-bold text-gray-900">Daftar Mahasiswa</h2>
                <span class="bg-[#EE7816] text-white text-[11px] font-semibold px-3.5 py-1 rounded-full">
                    12 Mahasiswa
                </span>
            </div>

            <!-- Student Cards Container -->
            <div id="mahasiswa-list" class="space-y-4">

                <!-- Card 1: Asfar Azuria -->
                <div class="mahasiswa-card bg-white rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition"
                    data-name="asfar azuria" data-title="sistem manajemen sidang skripsi" data-status="Siap Sidang">
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Asfar+Azuria&background=38BDF8&color=fff&size=128"
                            alt="Asfar Azuria" class="w-12 h-12 rounded-full object-cover shrink-0 border border-gray-100">
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Asfar Azuria</h3>
                            <p class="text-xs text-gray-500 mt-0.5">TI 2A &bull; Sistem Manajemen Sidang Skripsi</p>
                        </div>
                    </div>

                    <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2 shrink-0">
                        <span class="status-pill bg-[#FDE4CE] text-[#EE7816] text-[11px] font-semibold px-3 py-1 rounded-full">
                            Siap Sidang
                        </span>
                        <button type="button" class="btn-acc bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2 rounded-lg transition cursor-pointer">
                            ACC Sidang
                        </button>
                    </div>
                </div>

                <!-- Card 2: Bintang Pratama -->
                <div class="mahasiswa-card bg-white rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition"
                    data-name="bintang pratama" data-title="analisis sentimen pada media sosial" data-status="Revisi Proposal">
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Bintang+Pratama&background=0284C7&color=fff&size=128"
                            alt="Bintang Pratama" class="w-12 h-12 rounded-full object-cover shrink-0 border border-gray-100">
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Bintang Pratama</h3>
                            <p class="text-xs text-gray-500 mt-0.5">TI 2B &bull; Analisis Sentimen pada Media Sosial</p>
                        </div>
                    </div>

                    <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2 shrink-0">
                        <span class="status-pill bg-[#DFE2E6] text-gray-700 text-[11px] font-semibold px-3 py-1 rounded-full">
                            Revisi Proposal
                        </span>
                        <button type="button" class="btn-acc bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2 rounded-lg transition cursor-pointer">
                            ACC Sidang
                        </button>
                    </div>
                </div>

                <!-- Card 3: Citra Lestari -->
                <div class="mahasiswa-card bg-white rounded-2xl p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition"
                    data-name="citra lestari" data-title="pengembangan aplikasi mobile untuk kampus" data-status="Siap Sidang">
                    <div class="flex items-center gap-4">
                        <img src="https://ui-avatars.com/api/?name=Citra+Lestari&background=7DD3FC&color=0F172A&size=128"
                            alt="Citra Lestari" class="w-12 h-12 rounded-full object-cover shrink-0 border border-gray-100">
                        <div>
                            <h3 class="text-sm font-bold text-gray-900">Citra Lestari</h3>
                            <p class="text-xs text-gray-500 mt-0.5">TI 2A &bull; Pengembangan Aplikasi Mobile untuk Kampus</p>
                        </div>
                    </div>

                    <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2 shrink-0">
                        <span class="status-pill bg-[#FDE4CE] text-[#EE7816] text-[11px] font-semibold px-3 py-1 rounded-full">
                            Siap Sidang
                        </span>
                        <button type="button" class="btn-acc bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-semibold px-5 py-2 rounded-lg transition cursor-pointer">
                            ACC Sidang
                        </button>
                    </div>
                </div>

                <!-- Empty State (Hidden by default) -->
                <div id="empty-state" class="hidden bg-white rounded-2xl p-8 text-center">
                    <p class="text-xs font-medium text-gray-500">Tidak ada mahasiswa yang sesuai dengan filter atau pencarian.</p>
                </div>

            </div>
        </div>

        <!-- RIGHT COLUMN (4 Cols): Ringkasan Bimbingan -->
        <div class="lg:col-span-4 bg-[#DFE2E6] rounded-2xl p-5 sm:p-6 shadow-sm">
            <h2 class="text-base sm:text-lg font-bold text-gray-900">Ringkasan Bimbingan</h2>

            <div class="mt-4 space-y-2.5">
                <!-- Total Mahasiswa -->
                <div class="flex items-center justify-between px-4 py-3 rounded-xl">
                    <span class="text-xs sm:text-sm font-semibold text-gray-800">Total Mahasiswa</span>
                    <span class="text-sm sm:text-base font-bold text-gray-900">12</span>
                </div>

                <!-- Siap Sidang (Highlighted Box) -->
                <div class="flex items-center justify-between px-4 py-3 rounded-xl bg-[#FDF2E9] border border-[#F59E0B]">
                    <span class="text-xs sm:text-sm font-semibold text-[#EE7816]">Siap Sidang</span>
                    <span id="count-siap-sidang" class="text-sm sm:text-base font-bold text-[#EE7816]">3</span>
                </div>

                <!-- Perlu Revisi -->
                <div class="flex items-center justify-between px-4 py-3 rounded-xl">
                    <span class="text-xs sm:text-sm font-semibold text-gray-800">Perlu Revisi</span>
                    <span class="text-sm sm:text-base font-bold text-gray-900">4</span>
                </div>
            </div>

            <!-- Tindakan Massal -->
            <div class="mt-6">
                <span class="block text-[10px] font-bold tracking-wider text-gray-500 uppercase mb-2.5">
                    TINDAKAN MASSAL
                </span>

                <button type="button" id="btn-acc-semua"
                    class="w-full bg-black hover:bg-gray-800 text-white text-xs sm:text-sm font-semibold py-3 px-4 rounded-xl flex items-center justify-center gap-2 transition cursor-pointer">
                    <span>ACC Semua Sidang</span>
                    <span id="badge-acc-semua" class="bg-[#6B7280] text-white text-[11px] font-bold w-5 h-5 rounded-full inline-flex items-center justify-center">
                        3
                    </span>
                </button>

                <p class="text-[11px] text-gray-500 text-center mt-2.5 leading-relaxed">
                    *Tindakan ini hanya berlaku untuk mahasiswa dengan status <strong class="font-semibold text-gray-700">Siap Sidang</strong>
                </p>
            </div>
        </div>

    </div>

</div>

<!-- Interactive Filter & ACC Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-mahasiswa');
    const filterBtns = document.querySelectorAll('.status-filter-btn');
    const cards = document.querySelectorAll('.mahasiswa-card');
    const emptyState = document.getElementById('empty-state');
    const btnAccSemua = document.getElementById('btn-acc-semua');
    let activeStatus = 'all';

    function filterCards() {
        const keyword = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        cards.forEach(card => {
            const name = card.dataset.name;
            const title = card.dataset.title;
            const status = card.dataset.status;

            const matchSearch = name.includes(keyword) || title.includes(keyword);
            const matchStatus = activeStatus === 'all' || status === activeStatus;

            if (matchSearch && matchStatus) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        emptyState.classList.toggle('hidden', visibleCount > 0);
    }

    searchInput.addEventListener('input', filterCards);

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            activeStatus = btn.dataset.filter;

            filterBtns.forEach(b => {
                b.className = 'status-filter-btn bg-white border border-gray-200 text-gray-600 hover:border-[#EE7816] text-xs font-medium px-3.5 py-1.5 rounded-lg transition cursor-pointer';
            });
            btn.className = 'status-filter-btn bg-[#EE7816] text-white text-xs font-semibold px-4 py-1.5 rounded-lg transition cursor-pointer';

            filterCards();
        });
    });

    // Individual ACC Sidang
    document.querySelectorAll('.btn-acc').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.textContent = 'Sudah Di-ACC ✓';
            btn.disabled = true;
            btn.className = 'btn-acc bg-[#16A34A] text-white text-xs font-semibold px-4 py-2 rounded-lg cursor-default';
        });
    });

    // Bulk ACC Semua Sidang (hanya status Siap Sidang)
    btnAccSemua.addEventListener('click', () => {
        cards.forEach(card => {
            if (card.dataset.status === 'Siap Sidang') {
                const btn = card.querySelector('.btn-acc');
                btn.textContent = 'Sudah Di-ACC ✓';
                btn.disabled = true;
                btn.className = 'btn-acc bg-[#16A34A] text-white text-xs font-semibold px-4 py-2 rounded-lg cursor-default';
            }
        });
    });
});
</script>
@endsection