@extends('layouts.app')

@section('title', 'Penerbitan Berita Acara — LARAS')

@section('content')
    @php
        $documents = [
            ['name' => 'William Saputra', 'nim' => '25074110xx', 'selected' => true],
            ['name' => 'Bintang Putra Adryan', 'nim' => '25074110069', 'selected' => false],
        ];
        $fields = [
            ['label' => 'Nama', 'value' => 'William Saputra'],
            ['label' => 'NIM', 'value' => '25074110xx'],
            ['label' => 'Judul', 'value' => 'Pengembangan Modul Payroll Otomatis'],
        ];
    @endphp

    <x-admin-shell active="Berita Acara" padding-bottom="pb-[57px]">
        <header class="mt-8 text-[#1a1a1a] max-[1101px]:mt-[26px]">
            <h1 class="m-0 text-[26px] font-bold leading-[1.5] text-[#1a1a1a] max-[1101px]:text-[22px] max-[761px]:text-[20px] max-[421px]:text-[18px]">Penerbitan Berita Acara</h1>
            <p class="mt-1.5 text-[14px] font-normal leading-[1.5] text-slate max-[421px]:text-[12px]">Review hasil sidang akhir dan terbitkan dokumen Berita Acara.</p>
        </header>

        <section class="mt-8 grid h-[720px] grid-cols-[340px_minmax(0,1fr)] overflow-hidden rounded-[12px] bg-[#f3f4f6] max-[1101px]:mt-6 max-[1101px]:h-auto max-[1101px]:grid-cols-1"
                 aria-label="Penerbitan berita acara">
            <aside class="border-r border-[#e5e7eb] bg-white max-[1101px]:border-r-0 max-[1101px]:border-b" aria-labelledby="ba-queue-title">
                <header class="flex h-[58px] items-center justify-between gap-3 border-b border-[#e5e7eb] px-5">
                    <h2 class="m-0 text-[15px] font-semibold leading-[1.5] text-[#1a1a1a]" id="ba-queue-title">Menunggu Diterbitkan</h2>
                    <span class="inline-flex h-[26px] items-center rounded-xl bg-brand px-2.5 text-[12px] font-semibold leading-none whitespace-nowrap text-white">2 Dokumen</span>
                </header>

                @foreach ($documents as $document)
                    <button @class([
                        'flex h-[101px] w-full cursor-pointer flex-col gap-1 px-5 py-4 text-left font-sans',
                        'border border-brand bg-[#fff7ed]' => $document['selected'],
                        'border-0 border-b border-[#e5e7eb] bg-white' => ! $document['selected'],
                    ]) type="button">
                        <span class="flex items-center justify-between gap-2.5">
                            <span class="text-[15px] font-bold leading-[1.5] text-[#1a1a1a]">{{ $document['name'] }}</span>
                            <span @class([
                                'inline-flex h-[23px] shrink-0 items-center justify-center rounded px-2 text-[11px] font-medium leading-none',
                                'bg-[#1a1a1a] text-white' => $document['selected'],
                                'bg-[#f3f4f6] text-[#1a1a1a]' => ! $document['selected'],
                            ])>Skripsi</span>
                        </span>
                        <span class="text-[13px] font-normal leading-[1.5] text-slate">NIM: {{ $document['nim'] }}</span>
                        <span class="text-[12px] font-normal leading-[1.5] text-[#10b981]">&#10003; Nilai Lengkap</span>
                    </button>
                @endforeach
            </aside>

            <div class="min-w-0 px-6 pt-5 max-[1101px]:p-5 max-[761px]:p-4">
                <header class="flex items-start justify-between gap-6 max-[1101px]:flex-col max-[1101px]:gap-3.5">
                    <div>
                        <h2 class="m-0 text-[15px] font-bold leading-[1.5] text-[#1a1a1a]">Preview: Berita Acara Sidang Skripsi</h2>
                        <p class="mt-1 text-[13px] font-normal leading-[1.5] text-slate max-[421px]:text-[12px]">Sistem akan men-generate dokumen PDF secara otomatis.</p>
                    </div>

                    <div class="flex shrink-0 gap-3 max-[761px]:w-full max-[761px]:flex-wrap">
                        <button class="h-10 cursor-pointer rounded-md border border-[#1a1a1a] bg-transparent px-5 text-[13px] font-medium leading-[1.5] text-[#1a1a1a] max-[761px]:flex-[1_1_150px] max-[761px]:px-3"
                                type="button">Unduh Draft (PDF)</button>
                        <button class="h-10 cursor-pointer rounded-md border border-[#1a1a1a] bg-[#1a1a1a] px-5 text-[13px] font-semibold leading-[1.5] text-white transition-colors hover:bg-black max-[761px]:flex-[1_1_150px] max-[761px]:px-3"
                                type="button">Publikasikan Dokumen</button>
                    </div>
                </header>

                <article class="mt-5 h-[509px] rounded-lg bg-white p-[40px_48px] max-[1101px]:h-auto max-[1101px]:p-[28px_24px] max-[761px]:p-[22px_18px]">
                    <header class="text-center">
                        <h3 class="m-0 text-[18px] font-bold leading-[1.5] text-[#1a1a1a]">BERITA ACARA SIDANG SKRIPSI</h3>
                        <p class="mt-1.5 text-[13px] font-normal leading-[1.5] text-brand">Program Studi Teknik Informatika - Politeknik Negeri Jakarta</p>
                    </header>

                    <div class="mt-4 h-0.5 bg-[#1a1a1a]"></div>

                    <div class="pt-6">
                        <p class="m-0 text-[13px] font-normal leading-[1.5] text-[#1a1a1a] max-[421px]:text-[12px]">
                            Pada hari ini, Rabu, 28 Oktober 2026, telah dilaksanakan Sidang Skripsi untuk mahasiswa:
                        </p>

                        <dl class="mt-4 flex flex-col gap-2">
                            @foreach ($fields as $field)
                                <div class="grid grid-cols-[100px_minmax(0,1fr)] text-[13px] leading-[1.5] max-[761px]:grid-cols-[80px_minmax(0,1fr)] max-[421px]:text-[12px]">
                                    <dt class="m-0 font-normal text-slate">{{ $field['label'] }}</dt>
                                    <dd @class([
                                        "relative m-0 pl-5 text-[#1a1a1a] before:absolute before:left-0 before:content-[':']",
                                        'font-bold' => $loop->last,
                                        'font-normal' => ! $loop->last,
                                    ])>{{ $field['value'] }}</dd>
                                </div>
                            @endforeach
                        </dl>

                        <div class="mt-4 flex h-[148px] flex-col items-center rounded-lg border border-[#e5e7eb] pt-5">
                            <p class="m-0 text-[11px] font-semibold leading-[1.5] text-slate">KEPUTUSAN DEWAN PENGUJI</p>
                            <p class="mt-2 text-[36px] font-bold leading-[1.5] text-[#1a1a1a] max-[421px]:text-[30px]">LULUS</p>
                            <p class="mt-2 text-[14px] font-semibold leading-[1.5] text-[#1a1a1a]">Nilai Akhir: 85 (A-)</p>
                        </div>

                        <p class="mt-3.5 text-[12px] font-normal leading-[1.5] text-[#707070]">
                            Dokumen ini diterbitkan secara otomatis oleh sistem LARAS dan sah secara akademik tanpa
                            memerlukan tanda tangan basah.
                        </p>
                    </div>
                </article>
            </div>
        </section>
    </x-admin-shell>
@endsection
