@extends('layouts.app')

@section('title', 'Login — LARAS')

@section('content')
    <main class="flex min-h-screen flex-col items-center bg-white pt-[61px] pr-[78px] pl-6 font-sans text-[#111111] max-[769px]:px-5 max-[769px]:pt-14 max-[421px]:px-4 max-[421px]:pt-10">
        <div class="w-full max-w-[650px]">
            <header class="mb-11 text-center max-[769px]:mb-8">
                <h1 class="font-display text-[64px] font-normal leading-[1.09] text-black max-[769px]:text-[38px] max-[421px]:text-[31px]">LARAS</h1>
                <p class="mx-auto mt-[17px] max-w-[520px] text-[24px] font-light leading-normal text-black max-[769px]:text-[14px] max-[769px]:leading-[1.65] max-[421px]:text-[13px]">
                    Layanan Administrasi dan Rangkaian<br>
                    Seminar Proposal &amp; Skripsi
                </p>
            </header>

            <section class="w-full rounded-[15px] bg-surface pt-[35px] pr-[35px] pb-12 pl-[47px] max-[769px]:rounded-2xl max-[769px]:p-[26px_22px_24px] max-[421px]:rounded-[14px] max-[421px]:p-[22px_18px_20px]"
                     aria-labelledby="laras-card-title">
                <h2 id="laras-card-title" class="text-[20px] font-medium leading-[1.2] text-black">Masuk ke akun anda</h2>

                <form class="mt-[61px]" onsubmit="return false;">
                    <div>
                        <label class="mb-4 block text-[18px] font-normal leading-[1.2] text-black" for="nama">Nama</label>
                        <input
                            class="block h-[49px] w-full rounded-[15px] border border-transparent bg-white px-[22px] text-base font-light text-black transition-shadow placeholder:text-black focus:border-brand focus:shadow-[0_0_0_3px_rgba(237,122,28,0.18)] focus:outline-none"
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama anda"
                            autocomplete="name"
                        >
                    </div>

                    <div class="mt-[30px] max-[421px]:mt-4">
                        <label class="mb-4 block text-[18px] font-normal leading-[1.2] text-black" for="email">Email</label>
                        <input
                            class="block h-[49px] w-full rounded-[15px] border border-transparent bg-white px-[22px] text-base font-light text-black transition-shadow placeholder:text-black focus:border-brand focus:shadow-[0_0_0_3px_rgba(237,122,28,0.18)] focus:outline-none"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email anda"
                            autocomplete="email"
                        >
                    </div>

                    <div class="mt-[30px] max-[421px]:mt-4">
                        <label class="mb-4 block text-[18px] font-normal leading-[1.2] text-black" for="password">Password</label>
                        <input
                            class="block h-[49px] w-full rounded-[15px] border border-transparent bg-white px-[22px] text-base font-light text-black transition-shadow placeholder:text-black focus:border-brand focus:shadow-[0_0_0_3px_rgba(237,122,28,0.18)] focus:outline-none"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password anda"
                            autocomplete="current-password"
                        >
                    </div>

                    <label class="mt-[18px] flex cursor-pointer items-start gap-[19px] max-[421px]:mt-5" for="consent">
                        <span class="relative mt-1 inline-flex size-[25px] shrink-0">
                            <input class="peer size-full cursor-pointer appearance-none rounded-none bg-[#d9d9d9] transition-colors checked:bg-[#f58220] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#f58220]"
                                   type="checkbox" id="consent" name="consent">
                            <svg class="pointer-events-none absolute inset-0 m-auto size-3 opacity-0 peer-checked:opacity-100" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                <path d="M1.5 6.2 4.4 9.1 10.5 2.9" stroke="#111111" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-[15px] font-light leading-[1.6] text-black">
                            Saya mengakui bahwa akun yang saya gunakan merupakan milik sendiri, dan bukan mengambil atau mencuri identitas dari orang lain
                        </span>
                    </label>

                    <div class="mt-[59px] flex justify-end max-[421px]:mt-5">
                        <button class="h-8 w-[110px] rounded-[15px] bg-brand text-[20px] font-medium leading-none text-black transition hover:bg-brand-dark active:translate-y-px focus-visible:outline-2 focus-visible:outline-offset-[3px] focus-visible:outline-[#111111] max-[421px]:w-full"
                                type="submit">Login</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
