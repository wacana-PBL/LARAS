@extends('layouts.app')

@section('title', 'Verifikasi Pendaftaran — LARAS')

@section('content')
    @php
        $details = [
            ['label' => 'Dosen Pembimbing', 'value' => 'Bintang Putra, M.T', 'note' => null],
            ['label' => 'Log Bimbingan', 'value' => '6 Pertemuan', 'note' => 'TERCATAT'],
            ['label' => 'Status Pembimbing', 'value' => 'Disetujui', 'note' => 'ACC DOSEN'],
        ];
        $queue = [
            [
                'name' => 'Nadra Zaki Saputra',
                'nim' => '2507411000',
                'class' => 'TI 2A',
                'type' => 'Sempro',
                'sent' => 'Dikirim: 10 menit lalu',
                'title' => 'Implementasi Sistem Manajemen Sidang Skripsi (LARAS) Berbasis Web',
                'open' => true,
            ],
            [
                'name' => 'Nadra Zaki Saputra',
                'nim' => '2507411000',
                'class' => 'TI 2A',
                'type' => 'Skripsi',
                'sent' => 'Dikirim: 10 menit lalu',
                'title' => null,
                'open' => false,
            ],
        ];
    @endphp

    <x-admin-shell active="Verifikasi" padding-bottom="pb-[151px]">
        <section class="mt-[43px] flex h-[117px] flex-nowrap items-center gap-x-6 gap-y-4 rounded-[15px] bg-line px-[29px] max-[1101px]:mt-8 max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:p-[18px_22px] max-[761px]:p-[16px_18px] max-[421px]:p-[14px_16px]"
                 aria-label="Ringkasan verifikasi">
            <div class="min-w-0">
                <h1 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[21px] max-[761px]:text-[19px] max-[421px]:text-[17px]">Verifikasi Pendaftaran</h1>
                <p class="mt-[14px] text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[761px]:text-[14px] max-[421px]:text-[13px]">Review kelengkapan syarat akademik mahasiswa sebelum sidang.</p>
            </div>

            <span class="inline-flex h-11 w-[254px] shrink-0 items-center justify-center rounded-lg bg-sand px-3 text-[20px] font-medium leading-[1.5] whitespace-nowrap text-ink max-[1101px]:h-[38px] max-[1101px]:w-auto max-[1101px]:px-3.5 max-[1101px]:text-[15px] max-[761px]:h-[34px] max-[761px]:text-[13px] max-[421px]:h-8 max-[421px]:text-[12px]">12 Menunggu Verifikasi</span>
        </section>

        <section class="mt-[31px] flex flex-col gap-[31px] max-[1101px]:mt-6 max-[1101px]:gap-[22px]" aria-label="Antrean pendaftaran">
            @foreach ($queue as $item)
                @if ($item['open'])
                    <article class="h-[429px] overflow-hidden rounded-lg border-2 border-brand bg-white max-[1101px]:h-auto">
                        <header class="flex h-[105px] items-start bg-sand p-[19px_25px_0_28px] max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:gap-x-3.5 max-[1101px]:gap-y-2.5 max-[1101px]:p-[18px_20px]">
                            <div class="w-[265px] min-w-0 shrink-0 max-[1101px]:w-auto max-[1101px]:flex-[1_1_100%]">
                                <p class="m-0 truncate text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[20px] max-[761px]:text-[18px] max-[421px]:text-[16px]">{{ $item['name'] }}</p>
                                <p class="m-0 text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[421px]:text-[13px]">{{ $item['nim'] }} &bull; {{ $item['class'] }}</p>
                            </div>

                            <span class="mt-[18px] inline-flex h-[30px] shrink-0 items-center justify-center rounded-lg bg-brand px-2.5 text-[20px] leading-none text-ink max-[1101px]:mt-0 max-[1101px]:h-[26px] max-[1101px]:text-[15px]">{{ $item['type'] }}</span>
                            <span class="mt-[11px] ml-auto text-[20px] leading-[1.5] whitespace-nowrap text-[#707070] max-[1101px]:m-0 max-[1101px]:text-[15px] max-[421px]:text-[13px]">{{ $item['sent'] }}</span>

                            <span class="mt-[49px] ml-5 flex size-8 shrink-0 max-[1101px]:m-0 max-[1101px]:ml-auto" aria-hidden="true">
                                <svg class="size-full" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 14.5 12 8.5l6 6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </header>

                        <div class="p-[10px_25px_31px_28px] max-[1101px]:p-[16px_20px_22px]">
                            <div class="max-w-[574px]">
                                <p class="m-0 text-base font-normal leading-[1.5] text-ink max-[421px]:text-[13px]">Judul Penelitian</p>
                                <p class="mt-[5px] text-base font-medium leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $item['title'] }}</p>
                            </div>

                            <div class="mt-[26px] flex justify-between gap-6 max-[1101px]:mt-[18px] max-[1101px]:flex-wrap max-[1101px]:gap-3.5">
                                @foreach ($details as $detail)
                                    <div class="h-[89px] w-[331px] rounded-lg bg-line p-[13px_13px_0] max-[1101px]:h-auto max-[1101px]:w-full max-[1101px]:p-[12px_14px]">
                                        <p class="m-0 text-base font-normal leading-[1.5] whitespace-nowrap text-ink max-[421px]:text-[13px]">{{ $detail['label'] }}</p>
                                        <p class="mt-2 flex items-center gap-3 text-[20px] font-semibold leading-[1.5] whitespace-nowrap text-ink max-[1101px]:flex-wrap max-[1101px]:text-[17px] max-[421px]:text-[15px]">
                                            <span>{{ $detail['value'] }}</span>
                                            @if ($detail['note'])
                                                <span class="inline-flex h-[18px] items-center rounded bg-[#daffe0] px-[11px] text-[12px] leading-none text-[#067400]">{{ $detail['note'] }}</span>
                                            @endif
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-[70px] flex justify-end gap-[27px] max-[1101px]:mt-6 max-[1101px]:gap-3.5 max-[761px]:flex-wrap">
                                <button class="h-[41px] w-[181px] cursor-pointer rounded-lg border border-[#ff0000] bg-transparent text-base font-medium leading-[1.5] text-[#ff0000] max-[761px]:h-10 max-[761px]:w-full max-[761px]:flex-[1_1_140px] max-[761px]:text-[14px]"
                                        type="button">Tolak / Revisi</button>
                                <button class="h-[41px] w-[181px] cursor-pointer rounded-lg border-0 bg-brand text-base font-semibold leading-[1.5] text-white transition-colors hover:bg-brand-dark max-[761px]:h-10 max-[761px]:w-full max-[761px]:flex-[1_1_140px] max-[761px]:text-[14px]"
                                        type="button">Setujui</button>
                            </div>
                        </div>
                    </article>
                @else
                    <article class="h-[105px] overflow-hidden rounded-lg bg-[#a7a29c] max-[1101px]:h-auto">
                        <header class="flex h-[105px] items-start bg-transparent p-[19px_25px_0_28px] max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:gap-x-3.5 max-[1101px]:gap-y-2.5 max-[1101px]:p-[18px_20px]">
                            <div class="w-[265px] min-w-0 shrink-0 max-[1101px]:w-auto max-[1101px]:flex-[1_1_100%]">
                                <p class="m-0 truncate text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[20px] max-[761px]:text-[18px] max-[421px]:text-[16px]">{{ $item['name'] }}</p>
                                <p class="m-0 text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[421px]:text-[13px]">{{ $item['nim'] }} &bull; {{ $item['class'] }}</p>
                            </div>

                            <span class="mt-[18px] inline-flex h-[30px] shrink-0 items-center justify-center rounded-lg bg-brand px-2.5 text-[20px] leading-none text-ink max-[1101px]:mt-0 max-[1101px]:h-[26px] max-[1101px]:text-[15px]">{{ $item['type'] }}</span>
                            <span class="mt-[11px] ml-auto text-[20px] leading-[1.5] whitespace-nowrap text-[#707070] max-[1101px]:m-0 max-[1101px]:text-[15px] max-[421px]:text-[13px]">{{ $item['sent'] }}</span>

                            <span class="mt-[49px] ml-5 flex size-8 shrink-0 max-[1101px]:m-0 max-[1101px]:ml-auto" aria-hidden="true">
                                <svg class="size-full" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </header>
                    </article>
                @endif
            @endforeach
        </section>
    </x-admin-shell>
@endsection
