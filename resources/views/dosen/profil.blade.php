@extends('layouts.dosen')

@section('content')
<div class="space-y-6 mt-2">

    <!-- SECTION 1: Header Profil -->
    <div class="bg-[#DFE2E6] rounded-2xl p-5 sm:px-7 sm:py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <!-- Avatar Inisial -->
            <div class="w-14 h-14 rounded-xl bg-[#EE7816] flex items-center justify-center text-white font-bold text-xl shrink-0">
                BP
            </div>

            <!-- Nama & NIDN -->
            <div>
                <div class="flex flex-wrap items-center gap-2.5">
                    <h1 class="text-lg sm:text-xl font-semibold text-gray-900">
                        Bambang Warsuta
                    </h1>
                    <span class="bg-[#5CE889] text-gray-900 text-[11px] font-semibold px-3 py-0.5 rounded-full">
                        Dosen Aktif
                    </span>
                </div>
                <p class="text-xs text-gray-600 mt-1">
                    NIDN: 0019057504 - Magister Teknik Informatika
                </p>
            </div>
        </div>

        <!-- Tombol Edit Biodata -->
        <div>
            <button type="button" class="inline-flex items-center space-x-2 bg-[#EE7816] hover:bg-[#d9690d] text-white text-xs font-medium px-5 py-2.5 rounded-full transition shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span>Edit Biodata</span>
            </button>
        </div>
    </div>

    <!-- SECTION 2: Data Diri & Kontak Dosen -->
    <div class="bg-[#DFE2E6] rounded-2xl p-6 sm:p-7">
        <div>
            <h2 class="text-base font-semibold text-gray-900">Data Diri & Kontak Dosen</h2>
            <p class="text-xs text-gray-600 mt-0.5">Informasi utama identitas dan kontak aktif untuk keperluan akademik</p>
        </div>

        <hr class="border-gray-500/60 my-4">

        <div class="space-y-4">
            <!-- Baris 1: 3 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                    <span class="block text-xs text-gray-500">Nama lengkap</span>
                    <span class="block text-sm font-medium text-gray-900 mt-1">Bambang Warsuta</span>
                </div>

                <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                    <span class="block text-xs text-gray-500">NIDN</span>
                    <span class="block text-sm font-medium text-gray-900 mt-1">0019057504</span>
                </div>

                <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                    <span class="block text-xs text-gray-500">Jurusan</span>
                    <span class="block text-sm font-medium text-gray-900 mt-1">Teknik Informatika dan Komputer</span>
                </div>
            </div>

            <!-- Baris 2: 2 Kolom -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                    <span class="block text-xs text-gray-500">Email dosen</span>
                    <span class="block text-sm font-medium text-gray-900 mt-1">bambangwarsuta@stu.pnj.ac.id</span>
                </div>

                <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                    <span class="block text-xs text-gray-500">Nomor WhatsApp / HP</span>
                    <span class="block text-sm font-medium text-gray-900 mt-1">+62 123-456-789</span>
                </div>
            </div>

            <!-- Baris 3: Full Width -->
            <div class="bg-white rounded-2xl px-5 py-3.5 shadow-2xs">
                <span class="block text-xs text-gray-500">Alamat domisili lengkap</span>
                <span class="block text-sm font-medium text-gray-900 mt-1">
                    Jl. Margonda Raya No.45, RT02/RW05, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424
                </span>
            </div>
        </div>
    </div>

    <!-- SECTION 3: Bidang Keahlian Dosen -->
    <div class="bg-[#DFE2E6] rounded-2xl p-6 sm:p-7">
        <div>
            <h2 class="text-base font-semibold text-gray-900">Bidang Keahlian Dosen</h2>
        </div>

        <hr class="border-gray-500/60 my-4">

        <div class="space-y-4">
            <div class="bg-white rounded-2xl px-6 py-4 shadow-2xs">
                <span class="block text-xs text-gray-500">Mata Kuliah yang diampu</span>
                <p class="text-sm font-medium text-gray-900 mt-1.5">
                    Pemrograman Web, Basis Data, Rekayasa Perangkat Lunak
                </p>
            </div>

            <div class="bg-white rounded-2xl px-6 py-4 shadow-2xs">
                <span class="block text-xs text-gray-500">Keahlian/riset</span>
                <p class="text-sm font-medium text-gray-900 mt-1.5">
                    Machine Learning, Software Engineering, Web Development
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-1">
                <div class="relative bg-white rounded-2xl px-6 py-3.5 shadow-2xs">
                    <label for="batas_bimbingan" class="block text-xs text-gray-500">Batas maks. bimbingan</label>
                    <div class="relative mt-1">
                        <select id="batas_bimbingan" name="batas_bimbingan" class="w-full appearance-none bg-transparent text-sm font-medium text-gray-900 focus:outline-none cursor-pointer pr-8">
                            <option value="5" selected>5 Mahasiswa</option>
                            <option value="8">8 Mahasiswa</option>
                            <option value="10">10 Mahasiswa</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="relative bg-white rounded-2xl px-6 py-3.5 shadow-2xs">
                    <label for="status_ketersediaan" class="block text-xs text-gray-500">Status Ketersediaan</label>
                    <div class="relative mt-1">
                        <select id="status_ketersediaan" name="status_ketersediaan" class="w-full appearance-none bg-transparent text-sm font-medium text-gray-900 focus:outline-none cursor-pointer pr-8">
                            <option value="tersedia" selected>Tersedia</option>
                            <option value="penuh">Penuh</option>
                            <option value="cuti">Cuti Akademik</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection