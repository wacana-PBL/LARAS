@extends('layouts.app')

@section('title', 'Jadwal — LARAS')

@section('content')
    @php
        $weeks = [
            [27, 28, 29, 30, 1, 2, 3],
            [4, 5, 6, 7, 8, 9, 10],
            [11, 12, 13, 14, 15, 16, 17],
            [18, 19, 20, 21, 22, 23, 24],
        ];
        $highlight = [7 => 'bimbingan', 15 => 'sidang'];
        $prefs = [
            ['label' => 'BIMBINGAN', 'meter' => 'bg-[#ff383c]'],
            ['label' => 'SIDANG', 'meter' => 'bg-success'],
            ['label' => 'DEADLINE REVISI', 'meter' => 'bg-[#ff8d28]'],
        ];
    @endphp

    <main class="flex min-h-screen bg-white px-[53px] pt-[25px] pb-11 pl-[60px] font-sans text-ink max-[1101px]:p-[26px_28px_40px] max-[421px]:p-[20px_16px_32px]">
        <div class="mx-auto flex w-full max-w-[1327px] flex-1 flex-col">

            <x-navbar active="Jadwal" />

            <section class="mt-[67px] grid grid-cols-[665px_minmax(0,1fr)] gap-[31px] rounded-[15px] bg-line px-[21px] pt-[19px] pb-[41px] pl-[30px] max-[1101px]:mt-[26px] max-[1101px]:grid-cols-1 max-[1101px]:gap-6 max-[1101px]:px-[18px] max-[1101px]:pt-[18px] max-[1101px]:pb-6 max-[421px]:rounded-lg max-[421px]:px-3 max-[421px]:pt-4 max-[421px]:pb-5"
                     aria-label="Kalender dan jadwal terdekat">
                <div>
                    <h1 class="m-0 text-center text-[24px] font-semibold leading-9 max-[1101px]:text-[19px]">SEPTEMBER, 2026</h1>

                    <div class="mt-[21px] rounded-[15px] bg-white px-3 pt-[31px] pb-[14px] max-[1101px]:mt-3 max-[1101px]:px-1.5 max-[1101px]:pt-[18px] max-[1101px]:pb-1.5">
                        <div class="grid grid-cols-7" aria-hidden="true">
                            @foreach (['SAN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'] as $day)
                                <span class="text-center text-[20px] font-semibold leading-[30px] max-[761px]:text-[13px]">{{ $day }}</span>
                            @endforeach
                        </div>

                        <div class="mt-[29px]">
                            @foreach ($weeks as $week)
                                <div class="grid grid-cols-7">
                                    @foreach ($week as $date)
                                        <span class="flex h-[74px] items-center justify-center text-[20px] font-semibold leading-none max-[761px]:h-[52px] max-[761px]:text-[15px] max-[421px]:h-11 max-[421px]:text-[14px]">
                                            <span @class([
                                                'flex size-[49px] items-center justify-center rounded-full max-[761px]:size-[34px] max-[421px]:size-[30px]',
                                                'bg-[#ff973d] text-[#f7f1f1]' => ($highlight[$date] ?? null) === 'bimbingan',
                                                'bg-danger text-white' => ($highlight[$date] ?? null) === 'sidang',
                                            ])>{{ $date }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-[57px] max-[1101px]:mt-0">
                    <h2 class="m-0 text-[24px] font-semibold leading-9 max-[1101px]:text-[19px]">Jadwal Terdekat</h2>

                    <div class="mt-[17px] grid gap-[26px]">
                        <article class="overflow-hidden rounded-[30px] bg-white">
                            <p class="flex h-[60px] items-center bg-brand px-[23px] text-[18px] font-semibold leading-[1.2] text-line max-[1101px]:h-12 max-[1101px]:text-[15px] max-[761px]:px-4">07, September 2026</p>
                            <p class="flex h-[60px] items-center border-t border-black px-[23px] text-[20px] font-normal leading-[1.2] text-black max-[1101px]:h-12 max-[1101px]:text-[16px] max-[761px]:px-4">BIMBINGAN 1</p>
                        </article>

                        <article class="overflow-hidden rounded-[30px] bg-white">
                            <p class="flex h-[60px] items-center bg-danger px-[23px] text-[18px] font-semibold leading-[1.2] text-line max-[1101px]:h-12 max-[1101px]:text-[15px] max-[761px]:px-4">15, September 2026</p>
                            <p class="flex h-[60px] items-center border-t border-black px-[23px] text-[20px] font-normal leading-[1.2] text-black max-[1101px]:h-12 max-[1101px]:text-[16px] max-[761px]:px-4">SIDANG PROPOSAL</p>
                        </article>
                    </div>

                    <p class="mt-[37px] text-base font-normal leading-[1.4]">
                        Silahkan untuk mengikuti kegiatan pada waktu-nya agar dapat menyelesaikan Proposal / Skripsi tepat
                        waktu
                    </p>
                </div>
            </section>

            <section class="mt-[27px] rounded-[22px] bg-line pt-[11px] pr-14 pb-[23px] pl-[19px] max-[1101px]:mt-5 max-[1101px]:px-4 max-[1101px]:pt-4 max-[1101px]:pb-5 max-[421px]:rounded-[14px] max-[421px]:px-3 max-[421px]:pt-3.5 max-[421px]:pb-[18px]"
                     aria-labelledby="jdw-prefs-title">
                <h2 class="m-0 text-[24px] font-semibold leading-9 max-[1101px]:text-[19px]" id="jdw-prefs-title">PREFERENSI</h2>

                <div class="mt-[26px] grid gap-[21px]">
                    @foreach ($prefs as $pref)
                        <div class="flex h-[52px] items-stretch bg-white">
                            <span class="flex flex-1 items-center pl-[37px] text-[20px] font-normal leading-[1.2] text-black max-[1101px]:text-[15px] max-[761px]:pl-4 max-[421px]:pl-3 max-[421px]:text-[12.5px]">{{ $pref['label'] }}</span>
                            <span class="flex flex-[0_0_360px] items-center justify-center max-[1101px]:flex-[0_0_33%] max-[761px]:flex-[0_0_26%] {{ $pref['meter'] }}">
                                <button class="flex size-[49px] cursor-pointer items-center justify-center rounded-full border-0 bg-transparent p-0 text-white"
                                        type="button" aria-label="Naikkan prioritas {{ $pref['label'] }}">
                                    <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M6 15l6-6 6 6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-[21px] flex justify-end">
                    <button class="flex h-[52px] w-[360px] cursor-pointer items-center justify-between gap-3 rounded-[25px] border-0 btn-primary bg-brand pr-[22px] pl-[70px] text-[20px] font-semibold text-white max-[1101px]:w-full max-[1101px]:px-[18px] max-[1101px]:text-[16px] max-[421px]:text-[14px]"
                            type="button">
                        TAMBAH PREFERENSI
                        <svg class="size-7 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </section>

        </div>
    </main>
@endsection
