@extends('layouts.app')

@section('title', 'Penjadwalan Sidang — LARAS')

@section('content')
    @php
        $queue = [
            ['name' => 'Nadra Zaki Saputra', 'kind' => 'Seminar Proposal', 'status' => 'Pendaftaran Disetujui', 'active' => true],
            ['name' => 'William Sembiring Brahmana', 'kind' => 'Sidang Skripsi', 'status' => null, 'active' => false],
            ['name' => 'Asfar Azuria', 'kind' => 'Sidang Skripsi', 'status' => null, 'active' => false],
        ];
    @endphp

    <x-admin-shell active="Jadwal" padding-bottom="pb-[73px]">
        <section class="mt-[92px] flex h-[137px] flex-wrap content-start items-center gap-x-6 gap-y-4 rounded-[15px] bg-line px-[10px] pt-4 max-[1101px]:mt-8 max-[1101px]:h-auto max-[1101px]:p-[18px_22px] max-[761px]:p-[16px_18px] max-[421px]:p-[14px_16px]"
                 aria-label="Penjadwalan sidang">
            <h1 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[21px] max-[761px]:text-[19px] max-[421px]:text-[17px]">Penjadwalan Sidang &amp; Sempro</h1>
            <p class="m-0 w-full text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[761px]:text-[14px] max-[421px]:text-[13px]">Plotting jadwal dan dosen penguji untuk pendaftaran yang telah disetujui</p>
        </section>

        <section class="mt-[49px] flex h-[556px] gap-[3px] overflow-hidden rounded-lg bg-muted p-1 max-[1101px]:mt-7 max-[1101px]:h-auto max-[1101px]:flex-col" aria-label="Antrean dan plotting jadwal">
            <aside class="flex w-[436px] shrink-0 flex-col rounded-md bg-white max-[1101px]:w-full max-[1101px]:flex-none max-[1101px]:pb-2">
                <header class="relative h-[70px] shrink-0 p-[20px_16px_0_18px]">
                    <h2 class="m-0 text-[20px] font-medium leading-[1.5] text-ink">Antrean (3)</h2>
                    <span class="absolute top-[22px] right-4 inline-flex h-[27px] items-center rounded-[10px] bg-sand px-3 text-base font-bold leading-none text-brand">Siap Jadwal</span>
                </header>

                <div class="flex flex-col gap-1 pt-1">
                    @foreach ($queue as $item)
                        <button @class([
                            'relative flex w-full cursor-pointer flex-col border-0 text-left font-sans max-[1101px]:h-auto max-[1101px]:p-[12px_16px_14px]',
                            'h-[113px] bg-sand p-[9px_16px_0] before:absolute before:top-0 before:-left-1 before:h-full before:w-1 before:bg-brand' => $item['active'],
                            'h-[97px] bg-line p-[10px_14px_0]' => ! $item['active'],
                        ]) type="button">
                            <span @class([
                                'truncate text-[20px] leading-[1.5] text-ink max-[421px]:text-[16px]',
                                'font-semibold' => $item['active'],
                                'font-normal' => ! $item['active'],
                            ])>{{ $item['name'] }}</span>
                            <span @class([
                                'text-base leading-[1.5] text-ink max-[421px]:text-[13px]',
                                'font-medium' => $item['active'],
                                'font-normal' => ! $item['active'],
                            ])>{{ $item['kind'] }}</span>

                            @if ($item['status'])
                                <span class="mt-[14px] flex items-center gap-2 text-base leading-[1.5] text-[#1d9329] max-[421px]:text-[13px]">
                                    <svg class="h-[17px] w-[14px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M5 12.8 9.6 17.4 19 7.4" stroke="#1d9329" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ $item['status'] }}
                                </span>
                            @endif
                        </button>
                    @endforeach
                </div>
            </aside>

            <div class="min-w-0 flex-1 rounded-md bg-white p-[35px_45px_0] max-[1101px]:p-[24px_22px_28px] max-[761px]:p-[20px_18px_24px]">
                <h2 class="m-0 text-[20px] font-semibold leading-[1.5] text-ink max-[761px]:text-[18px] max-[421px]:text-[16px]">Plotting: Nadra Zaki Saputra</h2>
                <p class="m-0 text-base font-medium leading-[1.5] text-ink max-[421px]:text-[13px]">
                    NIM: 4320210001 &bull; Seminar Proposal &bull; Pembimbing: Bambang Warsuta, S.Kom., M.T.I.
                </p>

                <hr class="mt-[29px] border-0 border-t border-black">

                <div class="mt-[25px]">
                    <p class="m-0 text-base font-semibold leading-[1.5] text-ink max-[421px]:text-[13px]">TANGGAL SIDANG</p>

                    <div class="flex gap-6 max-[1101px]:flex-wrap max-[1101px]:gap-3.5">
                        <label class="flex h-[45px] w-[382px] shrink-0 items-center justify-between rounded-lg border border-black px-[19px] max-[1101px]:w-auto max-[1101px]:flex-[1_1_160px] max-[761px]:flex-[1_1_100%]">
                            <span class="text-base font-normal leading-[1.5] text-ink max-[421px]:text-[13px]">28 / 10 / 2026</span>
                            <svg class="h-5 w-[17px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="3.6" y="5.4" width="16.8" height="14.6" rx="2.2" stroke="#020100" stroke-width="1.8" />
                                <path d="M8 3.4v3.6M16 3.4v3.6M3.6 10h16.8" stroke="#020100" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        </label>

                        <label class="flex h-[45px] w-[179px] shrink-0 items-center rounded-lg border border-black px-[19px] max-[1101px]:w-auto max-[1101px]:flex-[1_1_160px] max-[761px]:flex-[1_1_100%]">
                            <span class="text-base font-normal leading-[1.5] text-ink max-[421px]:text-[13px]">09 . 00</span>
                        </label>

                        <label class="flex h-[45px] w-[179px] shrink-0 items-center rounded-lg border border-black px-[19px] max-[1101px]:w-auto max-[1101px]:flex-[1_1_160px] max-[761px]:flex-[1_1_100%]">
                            <span class="text-base font-normal leading-[1.5] text-ink max-[421px]:text-[13px]">10 . 30</span>
                        </label>
                    </div>
                </div>

                <div class="mt-[21px]">
                    <p class="m-0 text-base font-semibold leading-[1.5] text-ink max-[421px]:text-[13px]">RUANGAN / LOKASI</p>
                    <label class="flex h-[45px] w-full items-center rounded-lg border border-black px-[19px]">
                        <span class="text-base font-normal leading-[1.5] text-muted max-[421px]:text-[13px]">Pilih ruangan sidang</span>
                    </label>
                </div>

                <div class="mt-[21px] flex h-[100px] gap-6 rounded-[15px] bg-line p-[13px_18px_0] max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:gap-3.5 max-[1101px]:p-4">
                    @foreach (['DOSEN PENGUJI 1', 'DOSEN PENGUJI 2'] as $label)
                        <div class="min-w-0 flex-1 max-[1101px]:flex-[1_1_220px] max-[761px]:flex-[1_1_100%]">
                            <p class="m-0 text-base font-semibold leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $label }}</p>
                            <button class="flex h-[45px] w-full cursor-pointer items-center justify-between rounded-lg border border-black bg-muted pr-3.5 pl-4 text-base font-normal text-ink max-[421px]:text-[13px]"
                                    type="button">
                                <span>Pilih dosen penguji</span>
                                <svg class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="mt-[45px] flex items-center justify-end gap-[34px] max-[1101px]:mt-6">
                    <button class="cursor-pointer border-0 bg-transparent p-0 text-base font-semibold text-ink" type="button">Batal</button>
                    <button class="h-[30px] cursor-pointer rounded-lg border-0 btn-primary bg-brand px-6 text-base font-semibold text-ink-panel max-[421px]:flex-1"
                            type="button">Kirim Pengajuan</button>
                </div>
            </div>
        </section>
    </x-admin-shell>
@endsection
