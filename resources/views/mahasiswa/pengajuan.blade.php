@extends('layouts.app')

@section('title', 'Pengajuan — LARAS')

@section('content')
    <x-pembimbing-shell step="pembimbing" title="Pengajuan Pembimbing" subtitle="Isi topik dan usulan dosen, lalu periksa data sebelum mengirim.">

        <section class="mt-[18px] min-h-[136px] rounded-[12px] bg-line p-[24px_24px_3px] max-[1101px]:mt-[22px] max-[761px]:p-[20px_18px]" aria-labelledby="pgj-type">
            <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="pgj-type">Jenis Pengajuan</h2>
            <div class="mt-[25px] flex gap-[22px] max-[761px]:mt-3 max-[761px]:flex-wrap max-[761px]:gap-2">
                <label class="flex h-[57px] min-w-[154px] cursor-pointer items-center gap-3 px-[14px] text-base leading-[1.2] whitespace-nowrap max-[761px]:h-11 max-[761px]:w-auto max-[761px]:p-0">
                    <input class="size-4 shrink-0 accent-[#ed7a1c]" type="radio" name="jenis" value="sempro" checked>
                    Seminar Proposal
                </label>
                <label class="flex h-[57px] min-w-[154px] cursor-pointer items-center gap-3 px-[14px] text-base leading-[1.2] whitespace-nowrap max-[761px]:h-11 max-[761px]:w-auto max-[761px]:p-0">
                    <input class="size-4 shrink-0 accent-[#ed7a1c]" type="radio" name="jenis" value="skripsi">
                    Sidang Skripsi
                </label>
            </div>
        </section>

        <section class="mt-6 min-h-[376px] rounded-[12px] bg-line p-6 max-[1101px]:mt-[22px] max-[761px]:p-[20px_18px]" aria-labelledby="pgj-topic">
            <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="pgj-topic">Data Topik</h2>

            <form class="mt-[25px]" onsubmit="return false;">
                <div class="flex items-start gap-4 max-[1101px]:flex-col max-[1101px]:items-stretch max-[1101px]:gap-1.5">
                    <label class="flex-[0_0_184px] pt-3 text-base font-normal leading-[1.5] max-[1101px]:flex-none max-[1101px]:text-[15px]" for="pgj-judul">Judul Proposal</label>
                    <div class="min-w-0 flex-1">
                        <input class="block h-12 w-full rounded-lg border border-muted bg-white px-[15px] text-[14px] text-ink outline-offset-2 placeholder:text-ink"
                               id="pgj-judul" type="text" placeholder="Masukkan judul proposal">
                    </div>
                </div>

                <div class="mt-4 flex items-start gap-4 max-[1101px]:flex-col max-[1101px]:items-stretch max-[1101px]:gap-1.5">
                    <label class="flex-[0_0_184px] pt-3 text-base font-normal leading-[1.5] max-[1101px]:flex-none max-[1101px]:text-[15px]" for="pgj-abstrak">Abstrak</label>
                    <div class="min-w-0 flex-1">
                        <textarea class="block h-24 w-full resize-none rounded-lg border border-muted bg-white px-[15px] py-3 text-[14px] leading-[1.45] text-ink outline-offset-2 placeholder:text-ink"
                                  id="pgj-abstrak" placeholder="Tuliskan ringkasan topik yang diajukan"></textarea>
                    </div>
                </div>

                <div class="mt-4 flex items-start gap-4 max-[1101px]:flex-col max-[1101px]:items-stretch max-[1101px]:gap-1.5">
                    <label class="flex-[0_0_184px] pt-3 text-base font-normal leading-[1.5] max-[1101px]:flex-none max-[1101px]:text-[15px]" for="pgj-referensi">Referensi</label>
                    <div class="min-w-0 flex-1">
                        <textarea class="block h-24 w-full resize-none rounded-lg border border-muted bg-white px-[15px] py-3 text-[14px] leading-[1.45] text-ink outline-offset-2 placeholder:text-ink"
                                  id="pgj-referensi" placeholder="Tuliskan referensi pendukung"></textarea>
                    </div>
                </div>
            </form>
        </section>

        <section class="mt-6 min-h-[224px] rounded-[12px] bg-line p-6 max-[1101px]:mt-[22px] max-[761px]:p-[20px_18px]" aria-labelledby="pgj-lecturers">
            <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="pgj-lecturers">Usulan Dosen Pembimbing</h2>
            <p class="mt-[5px] text-[14px] leading-[1.45]">Urutkan hingga 3 usulan dosen. Pembimbing ditetapkan setelah proses persetujuan.</p>

            <div class="mt-5 grid grid-cols-[repeat(3,minmax(0,1fr))] gap-5 max-[1101px]:grid-cols-1 max-[1101px]:gap-3.5">
                @foreach ([1, 2, 3] as $i)
                    <div>
                        <span class="block text-base leading-6" id="pgj-dosen-{{ $i }}">Dosen {{ $i }}</span>
                        <button class="mt-[7px] flex h-[39px] w-full cursor-pointer items-center justify-between gap-2 rounded-lg border border-muted bg-white pr-3 pl-[15px] text-base text-[#555b65]"
                                type="button" aria-labelledby="pgj-dosen-{{ $i }}">
                            <span>Pilih dosen</span>
                            <svg class="h-[7px] w-[14px] shrink-0 text-ink" viewBox="0 0 14 7" fill="none" aria-hidden="true">
                                <path d="M1 1l6 5 6-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="mt-[67px] flex justify-end gap-[42px] max-[1101px]:mt-7 max-[1101px]:gap-4">
            <button class="h-[53px] w-[181px] cursor-pointer rounded-lg border border-muted bg-white text-[14px] font-bold text-ink max-[761px]:h-12 max-[761px]:w-auto max-[761px]:flex-1"
                    type="button">Simpan Draf</button>
            <button class="h-[53px] w-[181px] cursor-pointer rounded-lg border-0 bg-brand text-base font-semibold text-ink max-[761px]:h-12 max-[761px]:w-auto max-[761px]:flex-1"
                    type="button">Kirim Pengajuan</button>
        </div>
    </x-pembimbing-shell>
@endsection
