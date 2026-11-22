@extends('layouts.app')

@section('title', 'Dashboard — LARAS')

@section('content')
    <main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-[52px] pl-[60px] font-sans text-[#111111] max-[901px]:px-7 max-[901px]:pt-[26px] max-[901px]:pb-10 max-[421px]:px-4 max-[421px]:pt-5 max-[421px]:pb-8">
        <div class="mx-auto flex w-full max-w-[1400px] flex-1 flex-col">

            <x-navbar active="Dashboard" />

            <section class="mt-[70px] flex min-h-[117px] flex-col justify-start rounded-[15px] bg-line p-[21px_22px] max-[901px]:mt-[26px] max-[901px]:min-h-0 max-[901px]:p-[18px_20px] max-[421px]:mt-6 max-[421px]:rounded-lg max-[421px]:p-[16px_18px]">
                <h1 class="m-0 text-[24px] font-medium leading-[1.4] text-black max-[901px]:text-[15.5px] max-[421px]:text-[14px]">
                    Pengembangan Aplikasi Point of Sales (POS) untuk UMKM Kuliner &ldquo;Warung Mak Dara&rdquo;
                </h1>
                <p class="mt-1.5 text-base font-light leading-[1.4] text-black max-[901px]:text-[12.5px]">
                    Studi Kasus: Warung Mak Dara - Bidang Fokus Manajemen Proyek, TI &amp; Software Engineering
                </p>
            </section>

            <div class="mt-[61px] grid grid-cols-[repeat(2,minmax(0,1fr))] gap-x-[61px] gap-y-[43px] max-[901px]:mt-7 max-[901px]:gap-4 max-[761px]:grid-cols-1 max-[761px]:gap-3">

                <article class="flex min-h-[134px] flex-col rounded-[15px] bg-line p-[19px_12px_19px_31px] max-[901px]:min-h-[128px] max-[901px]:p-[20px_16px_22px_22px] max-[421px]:min-h-[110px] max-[421px]:p-[18px_18px_20px]">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="m-0 text-[20px] font-bold uppercase leading-none text-black max-[901px]:text-[16px] max-[421px]:text-[15px]">Nilai Sempro</h2>
                        <span class="-mt-[7px] flex shrink-0 text-brand">
                            <svg class="size-[46px] max-[901px]:size-[30px] max-[421px]:size-[26px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 6.6c-1.9-1.5-4.1-2-6.5-2v13c2.4 0 4.6.5 6.5 2 1.9-1.5 4.1-2 6.5-2v-13c-2.4 0-4.6.5-6.5 2Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                <path d="M12 6.6v13" stroke="currentColor" stroke-width="1.7" />
                            </svg>
                        </span>
                    </div>
                    <p class="m-0 text-[32px] font-normal leading-[1.1] tabular-nums text-black max-[901px]:mt-[14px] max-[901px]:text-[27px] max-[421px]:text-[26px]">88.5</p>
                </article>

                <article class="flex min-h-[134px] flex-col rounded-[15px] bg-line p-[19px_12px_19px_31px] max-[901px]:min-h-[128px] max-[901px]:p-[20px_16px_22px_22px] max-[421px]:min-h-[110px] max-[421px]:p-[18px_18px_20px]">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="m-0 text-[20px] font-bold uppercase leading-none text-black max-[901px]:text-[16px] max-[421px]:text-[15px]">Status ACC Sidang</h2>
                        <span class="-mt-[7px] flex shrink-0 text-[#2f9e57]">
                            <svg class="size-[46px] max-[901px]:size-[30px] max-[421px]:size-[26px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 12.8l4.4 4.4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="m-0 text-[32px] font-normal leading-[1.1] tabular-nums text-[#19a32e] max-[901px]:mt-[14px] max-[901px]:text-[27px] max-[421px]:text-[26px]">ACC FULL</p>
                </article>

                <article class="flex min-h-[134px] flex-col rounded-[15px] bg-line p-[19px_12px_19px_31px] max-[901px]:min-h-[128px] max-[901px]:p-[20px_16px_22px_22px] max-[421px]:min-h-[110px] max-[421px]:p-[18px_18px_20px]">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="m-0 text-[20px] font-bold uppercase leading-none text-black max-[901px]:text-[16px] max-[421px]:text-[15px]">Logbook Bimbingan</h2>
                        <span class="-mt-[7px] flex shrink-0 text-brand">
                            <svg class="size-[46px] max-[901px]:size-[30px] max-[421px]:size-[26px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M14 4H7.5A1.5 1.5 0 0 0 6 5.5v13A1.5 1.5 0 0 0 7.5 20h9a1.5 1.5 0 0 0 1.5-1.5V8l-4-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                                <path d="M13.6 4.3V8.4h4.2M9 12.4h6M9 15.6h6" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="m-0 text-[32px] font-normal leading-[1.1] tabular-nums text-black max-[901px]:mt-[14px] max-[901px]:text-[27px] max-[421px]:text-[26px]">8 / 8</p>
                </article>

                <article class="flex min-h-[134px] flex-col rounded-[15px] bg-line p-[19px_12px_19px_31px] max-[901px]:min-h-[128px] max-[901px]:p-[20px_16px_22px_22px] max-[421px]:min-h-[110px] max-[421px]:p-[18px_18px_20px]">
                    <div class="flex items-start justify-between gap-4">
                        <h2 class="m-0 text-[20px] font-bold uppercase leading-none text-black max-[901px]:text-[16px] max-[421px]:text-[15px]">Jadwal Sidang</h2>
                        <span class="-mt-[7px] flex shrink-0 text-brand">
                            <svg class="size-[46px] max-[901px]:size-[30px] max-[421px]:size-[26px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="4" y="5.5" width="16" height="15" rx="2.2" stroke="currentColor" stroke-width="1.7" />
                                <path d="M4.4 10.2h15.2M8.6 3.6v3.6M15.4 3.6v3.6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>
                    <p class="m-0 text-[32px] font-normal leading-[1.1] tabular-nums text-black max-[901px]:mt-[14px] max-[901px]:text-[27px] max-[421px]:text-[26px]">22 Okt 2026</p>
                </article>

                <article class="mt-5 flex min-h-[227px] flex-col rounded-[15px] bg-line p-[11px_24px_24px_14px] max-[901px]:mt-0 max-[901px]:min-h-0 max-[901px]:p-[18px_18px_22px] max-[761px]:min-h-0">
                    <h2 class="m-0 text-[20px] font-medium leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Dosen Pembimbing</h2>
                    <dl class="mt-9 grid gap-[35px] max-[901px]:mt-[18px] max-[901px]:gap-3">
                        <div class="flex min-h-[47px] items-center rounded-[15px] bg-white px-[17px] max-[901px]:min-h-0 max-[901px]:gap-2.5 max-[901px]:px-4 max-[901px]:py-3 max-[761px]:py-[13px] max-[421px]:flex-wrap max-[421px]:gap-[2px_10px]">
                            <dt class="flex-[0_0_187px] text-[20px] leading-[1.2] text-black max-[901px]:flex-none max-[901px]:text-[15px] max-[421px]:flex-[0_0_100%]">Pembimbing:</dt>
                            <dd class="m-0 text-[20px] font-light leading-[1.2] text-black max-[901px]:text-[15px]">Bambang Warsuta, S.Kom., M.T.I.</dd>
                        </div>
                        <div class="flex min-h-[47px] items-center rounded-[15px] bg-white px-[17px] max-[901px]:min-h-0 max-[901px]:gap-2.5 max-[901px]:px-4 max-[901px]:py-3 max-[761px]:py-[13px] max-[421px]:flex-wrap max-[421px]:gap-[2px_10px]">
                            <dt class="flex-[0_0_187px] text-[20px] leading-[1.2] text-black max-[901px]:flex-none max-[901px]:text-[15px] max-[421px]:flex-[0_0_100%]">KP:</dt>
                            <dd class="m-0 text-[20px] font-light leading-[1.2] text-black max-[901px]:text-[15px]">Faisal Oktavian, SS., M.T.I.</dd>
                        </div>
                    </dl>
                </article>

                <article class="mt-5 flex min-h-[227px] flex-col rounded-[15px] bg-line p-[11px_24px_24px_14px] max-[901px]:mt-0 max-[901px]:min-h-0 max-[901px]:p-[18px_18px_22px] max-[761px]:min-h-0">
                    <h2 class="m-0 text-[20px] font-medium leading-none text-black max-[901px]:text-[17px] max-[421px]:text-[16px]">Dewan Penguji Skripsi</h2>
                    <div class="mt-9 grid grid-cols-[repeat(3,minmax(0,1fr))] gap-[22px] max-[901px]:mt-[18px] max-[901px]:grid-cols-1 max-[901px]:gap-2.5 max-[761px]:gap-2">
                        <div class="flex min-h-[136px] flex-col items-center rounded-[15px] bg-white p-[7px_10px_10px] text-center max-[901px]:min-h-0 max-[901px]:p-[12px_14px] max-[761px]:p-[10px_12px]">
                            <span class="text-[18px] leading-[1.2] text-black max-[901px]:text-[15px]">Ketua Penguji</span>
                            <span class="mt-[35px] text-base font-light leading-[1.3] text-black max-[901px]:mt-1.5 max-[901px]:text-[14px]">Prof. Dr. Irwan Santosa</span>
                        </div>
                        <div class="flex min-h-[136px] flex-col items-center rounded-[15px] bg-white p-[7px_10px_10px] text-center max-[901px]:min-h-0 max-[901px]:p-[12px_14px] max-[761px]:p-[10px_12px]">
                            <span class="text-[18px] leading-[1.2] text-black max-[901px]:text-[15px]">Anggota Penguji</span>
                            <span class="mt-[35px] text-base font-light leading-[1.3] text-black max-[901px]:mt-1.5 max-[901px]:text-[14px]">Dr. Hendra Saputra, M.Sc.</span>
                        </div>
                        <div class="flex min-h-[136px] flex-col items-center rounded-[15px] bg-white p-[7px_10px_10px] text-center max-[901px]:min-h-0 max-[901px]:p-[12px_14px] max-[761px]:p-[10px_12px]">
                            <span class="text-[18px] leading-[1.2] text-black max-[901px]:text-[15px]">Anggota Penguji</span>
                            <span class="mt-[35px] text-base font-light leading-[1.3] text-black max-[901px]:mt-1.5 max-[901px]:text-[14px]">Dr. Anika Wijaya, M.M.</span>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </main>
@endsection
