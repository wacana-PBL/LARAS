@extends('layouts.app')

@section('title', 'Dashboard Admin — LARAS')

@section('content')
    @php
        $stats = [
            ['title' => 'Menunggu Verifikasi', 'value' => $counts['pending'], 'link' => 'Perlu tindakan admin →', 'href' => route('admin.verifikasi'), 'icon' => 'inbox'],
            ['title' => 'Siap Dijadwalkan', 'value' => $counts['approved'], 'link' => 'Data Sudah Diapprove →', 'href' => route('admin.jadwal'), 'icon' => 'schedule'],
            ['title' => 'Sidang Hari Ini', 'value' => $counts['today'], 'link' => 'Lihat detail jadwal →', 'href' => route('admin.jadwal'), 'icon' => 'today'],
        ];
        $activities = [
            ['name' => 'Nadra Zaki Saputra', 'text' => 'Nadra Zaki Saputra mengirim pengajuan Sempro.', 'time' => '10 menit yang lalu'],
            ['name' => 'Bintang Putra Adryan', 'text' => 'Bintang Putra Adryan mengirim pengajuan Skripsi.', 'time' => '25 menit yang lalu'],
        ];
        $agenda = [
            ['time' => '09:00 - 10:30', 'room' => 'Ruang TIK 1', 'name' => 'Asfar Azuria', 'kind' => 'Seminar Proposal', 'accent' => true],
            ['time' => '09:00 - 10:30', 'room' => 'Ruang TIK 1', 'name' => 'Asfar Azuria', 'kind' => 'Seminar Proposal', 'accent' => false],
        ];
    @endphp

    <x-admin-shell active="Dashboard">
        <section class="mt-[92px] flex h-[117px] flex-wrap content-start items-center gap-x-6 gap-y-4 rounded-[15px] bg-line px-[10px] pt-2 max-[1101px]:mt-8 max-[1101px]:h-auto max-[1101px]:p-[18px_22px] max-[761px]:p-[16px_18px]"
                 aria-label="Ringkasan operasional">
            <h1 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[21px] max-[761px]:text-[19px] max-[421px]:text-[17px]">Overview Operasional</h1>
            <p class="mt-[14px] w-full text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:mt-2 max-[1101px]:text-[15px] max-[761px]:text-[14px] max-[421px]:text-[13px]">Pantau antrean pendaftaran dan jadwal sidang skripsi terkini.</p>
        </section>

        <section class="mt-[92px] grid grid-cols-3 gap-[127px] px-[2.5px] max-[1101px]:mt-7 max-[1101px]:grid-cols-[repeat(3,minmax(0,1fr))] max-[1101px]:gap-5 max-[1101px]:px-0 max-[761px]:grid-cols-1"
                 aria-label="Statistik pendaftaran">
            @foreach ($stats as $stat)
                <article class="relative h-[134px] rounded-[15px] bg-line p-[19px_18px_13px] max-[1101px]:h-auto max-[1101px]:p-[16px_18px_18px]">
                    <span class="absolute top-[15px] right-[18px] flex size-9" aria-hidden="true">
                        @if ($stat['icon'] === 'inbox')
                            <svg class="size-full" viewBox="0 0 24 24" fill="none">
                                <path d="M4 13h4l1.5 3h5L16 13h4" stroke="#020100" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M4 13 6.2 5.6A2 2 0 0 1 8.1 4h7.8a2 2 0 0 1 1.9 1.6L20 13v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4Z" stroke="#020100" stroke-width="1.8" stroke-linejoin="round" />
                            </svg>
                        @elseif ($stat['icon'] === 'schedule')
                            <svg class="size-full" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="8.2" stroke="#020100" stroke-width="1.8" />
                                <path d="M12 7.6V12l3.2 2" stroke="#020100" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        @else
                            <svg class="size-full" viewBox="0 0 24 24" fill="none">
                                <rect x="3.8" y="5.4" width="16.4" height="14.4" rx="2.4" stroke="#020100" stroke-width="1.8" />
                                <path d="M8 3.6v3.4M16 3.6v3.4M3.8 10h16.4" stroke="#020100" stroke-width="1.8" stroke-linecap="round" />
                            </svg>
                        @endif
                    </span>

                    <h2 class="m-0 text-[20px] font-medium leading-[1.5] text-ink max-[421px]:text-[17px]">{{ $stat['title'] }}</h2>
                    <p class="m-0 text-[32px] font-medium leading-[48px] text-ink max-[1101px]:text-[28px] max-[1101px]:leading-[40px]">{{ $stat['value'] }}</p>
                    <a class="inline-block text-base font-medium leading-[1.5] whitespace-nowrap text-brand hover:underline max-[1101px]:text-[14px] max-[1101px]:whitespace-normal"
                       href="{{ $stat['href'] }}">{{ $stat['link'] }}</a>
                </article>
            @endforeach
        </section>

        <section class="mt-[92px] grid grid-cols-2 gap-[106px] max-[1101px]:mt-7 max-[1101px]:grid-cols-1 max-[1101px]:gap-5" aria-label="Aktivitas dan agenda">
            <article class="h-[315px] rounded-lg bg-line p-[35px_29px_0] max-[1101px]:h-auto max-[1101px]:p-[24px_22px_26px]">
                <h2 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[20px] max-[421px]:text-[17px]">Aktivitas Sistem Terbaru</h2>

                <ul class="mt-[27px] flex list-none flex-col gap-[27px] p-0">
                    @foreach ($activities as $activity)
                        <li class="flex min-h-[82px] items-start gap-2.5 max-[761px]:min-h-0">
                            <span class="mt-[7px] flex size-[67px] shrink-0 items-center justify-center rounded-full bg-muted text-[22px] font-semibold text-white" aria-hidden="true">{{ mb_substr($activity['name'], 0, 1) }}</span>
                            <div class="min-w-0">
                                <p class="m-0 text-base font-medium leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $activity['text'] }}</p>
                                <p class="mt-2.5 text-base font-light leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $activity['time'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </article>

            <article class="h-[315px] rounded-lg bg-line p-[35px_29px_0] max-[1101px]:h-auto max-[1101px]:p-[24px_22px_26px]">
                <h2 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[20px] max-[421px]:text-[17px]">Agenda Terdekat</h2>

                <ul class="mt-2.5 flex list-none flex-col gap-[26px] p-0">
                    @foreach ($agenda as $item)
                        <li class="h-[89px] rounded-lg bg-[#bebebe] p-[9px_15px_4px_17px] max-[761px]:h-auto">
                            <div class="flex items-center justify-between gap-3">
                                <span @class([
                                    'inline-flex h-9 items-center justify-center rounded-lg px-1.5 text-base font-medium leading-[1.5] whitespace-nowrap text-ink max-[421px]:text-[13px]',
                                    'bg-sand' => $item['accent'],
                                    'bg-[#d9dce1]' => ! $item['accent'],
                                ])>{{ $item['time'] }}</span>
                                <span class="text-right text-base font-light leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $item['room'] }}</span>
                            </div>
                            <div class="mt-2.5 flex items-center justify-between gap-3">
                                <span class="text-[20px] font-medium leading-[1.5] text-ink max-[421px]:text-[16px]">{{ $item['name'] }}</span>
                                <span class="text-right text-base font-light leading-[1.5] text-ink max-[421px]:text-[13px]">{{ $item['kind'] }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </article>
        </section>
    </x-admin-shell>
@endsection
