@extends('layouts.app')

@section('title', 'Profil — LARAS')

@section('content')
    <main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-[54px] pl-[60px] font-sans text-ink-panel max-[901px]:px-7 max-[901px]:pt-5 max-[901px]:pb-10 max-[421px]:p-4">
        <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">

            <x-navbar variant="orange" />

            <section class="mt-[55px] flex min-h-[123px] items-center gap-6 rounded-[15px] bg-line py-4 pr-10 pl-6 max-[901px]:mt-8 max-[901px]:flex-wrap max-[901px]:gap-4 max-[901px]:p-[18px_20px] max-[421px]:mt-6 max-[421px]:p-4">
                <span class="flex h-[91px] w-[96px] shrink-0 items-center justify-center rounded-[12px] bg-brand text-[40px] font-bold leading-none text-white max-[901px]:size-16 max-[901px]:rounded-[10px] max-[901px]:text-[26px]" aria-hidden="true">NS</span>

                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-5">
                        <h1 class="m-0 text-[30px] font-medium leading-[1.1] text-black max-[901px]:text-[24px] max-[421px]:text-[21px]">Nadra Saputra</h1>
                        <span class="inline-flex h-7 items-center rounded-[57px] bg-[#5af4a5] px-3 text-[13px] font-bold leading-none whitespace-nowrap text-[#0a4619]">Mahasiswa Aktif</span>
                    </div>
                    <p class="mt-4 text-base font-light leading-[1.3] text-black max-[901px]:mt-2 max-[901px]:text-[14px] max-[421px]:text-[13px]">NIM: 2507411071 &ndash; SI Teknik Informatika (Angkatan 2025)</p>
                </div>

                <button class="ml-auto h-[53px] w-[181px] shrink-0 rounded-[40px] bg-brand text-[14px] font-semibold text-black transition-colors hover:bg-brand-dark max-[901px]:h-11 max-[901px]:text-[13px] max-[421px]:ml-0 max-[421px]:w-full"
                        type="button">Edit Biodata</button>
            </section>

            <section class="mt-[34px] rounded-[15px] bg-line p-[17px_24px_29px_21px] max-[901px]:p-[18px_20px_24px] max-[421px]:mt-5 max-[421px]:p-[16px_14px_22px]">
                <h2 class="m-0 text-[24px] font-semibold leading-none text-ink-panel max-[901px]:text-[20px] max-[421px]:text-[18px]">Data Diri &amp; Kontak Mahasiswa</h2>
                <p class="mt-4 text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Informasi utama identitas dan kontak aktif untuk keperluan akademik</p>
                <hr class="mt-[25px] border-0 border-t border-[#a8aaaf]">

                <div class="mt-[50px] grid grid-cols-[repeat(3,minmax(0,1fr))] gap-[77px_71px] max-[1101px]:gap-6 max-[901px]:mt-8 max-[901px]:grid-cols-[repeat(2,minmax(0,1fr))] max-[901px]:gap-5 max-[761px]:grid-cols-1 max-[761px]:gap-4">
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Nama lengkap</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Nadra Saputra</span>
                    </div>
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">NIM</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">2507411071</span>
                    </div>
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Program studi / Jurusan</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">SI Teknik Informatika / TIK</span>
                    </div>
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Email mahasiswa</span>
                        <a class="mt-[13px] text-[20px] font-normal leading-none text-black underline underline-offset-[3px] max-[901px]:text-[17px] max-[421px]:text-[16px]" href="mailto:nadrasaputra@gmail.com">nadrasaputra@gmail.com</a>
                    </div>
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Nomor Whatsapp / HP</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">+62 123-456-789</span>
                    </div>
                    <div class="flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Kontak darurat (orang tua / wali)</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">+62 987-654-321 (Bapak)</span>
                    </div>
                    <div class="col-span-full flex min-h-[96px] flex-col rounded-[15px] bg-white p-[15px_19px] min-[1101px]:-mt-[23px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Alamat domisili lengkap</span>
                        <span class="mt-[13px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Jl. Margonda Raya No.45, RT02/RW05, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424</span>
                    </div>
                </div>
            </section>

            <section class="mt-[33px] rounded-[15px] bg-line p-[15px_24px_27px_21px] max-[901px]:p-[18px_20px_24px] max-[421px]:mt-5 max-[421px]:p-[16px_14px_22px]">
                <div class="flex items-center justify-between gap-4">
                    <h2 class="m-0 text-[24px] font-semibold leading-none text-ink-panel max-[901px]:text-[20px] max-[421px]:text-[18px]">Detail Tugas Akhir / Proposal</h2>
                    <span class="inline-flex h-[27px] items-center rounded-[10px] bg-sand px-3 text-[16px] font-bold leading-none whitespace-nowrap text-brand max-[421px]:text-[13px]">Tahap Sempro</span>
                </div>
                <hr class="mt-[25px] border-0 border-t border-[#a8aaaf]">

                <p class="mt-[27px] text-base leading-none text-[#555b65] max-[901px]:text-[14px]">Judul Proposal Terdaftar:</p>
                <p class="mt-[14px] text-[20px] font-normal leading-[1.5] text-black max-[901px]:text-[17px] max-[421px]:text-[15px]">
                    &ldquo;Pengembangan Aplikasi Point of Sales (POS) berbasis Web untuk Optimalisasi Manajemen Stok dan Transaksi UMKM Kuliner &lsquo;Warung Mak Dara&rsquo;&rdquo;
                </p>

                <div class="mt-10 grid grid-cols-[618fr_640fr] gap-[27px] max-[901px]:mt-[26px] max-[901px]:gap-4 max-[761px]:grid-cols-1">
                    <div class="flex min-h-[127px] flex-col rounded-[15px] bg-white p-[14px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Dosen Pembimbing</span>
                        <span class="mt-[18px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Bambang Warsuta, S.Kom., M.T.I.</span>
                        <span class="mt-3 text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">NIDN: 0412088501</span>
                    </div>
                    <div class="flex min-h-[127px] flex-col rounded-[15px] bg-white p-[14px_19px] max-[761px]:min-h-0 max-[421px]:p-[14px_16px]">
                        <span class="text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">Dosen KPS</span>
                        <span class="mt-[18px] text-[20px] font-normal leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Euis Oktavianti, S.Si., M.T.I.</span>
                        <span class="mt-3 text-base font-normal leading-none text-[#555b65] max-[901px]:text-[14px]">NIDN: 0415108802</span>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
