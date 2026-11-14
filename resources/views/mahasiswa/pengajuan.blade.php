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
            <div class="flex flex-wrap items-center justify-between gap-2">
                <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="pgj-lecturers">Usulan Dosen Pembimbing</h2>
                <button class="cursor-pointer border-0 bg-transparent p-0 text-[14px] font-semibold text-brand underline decoration-transparent underline-offset-4 transition-colors hover:text-brand-dark hover:decoration-current"
                        type="button" data-notif-open="notif-petunjuk-pengajuan">Petunjuk</button>
            </div>
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
                    type="button"
                    data-notif-open="notif-draf-pengajuan">Simpan Draf</button>
            <button class="h-[53px] w-[181px] cursor-pointer rounded-lg border-0 btn-primary bg-brand text-base font-semibold text-ink max-[761px]:h-12 max-[761px]:w-auto max-[761px]:flex-1"
                    type="button"
                    data-notif-open="notif-konfirmasi-pengajuan"
                    data-notif-empty="notif-data-pengajuan"
                    data-notif-fields="#pgj-judul,#pgj-abstrak">Kirim Pengajuan</button>
        </div>
    </x-pembimbing-shell>

    <x-notif-dialog id="notif-konfirmasi-pengajuan" title="Kirim pengajuan pembimbing?" :actions="[
        ['label' => 'Periksa kembali', 'variant' => 'secondary'],
        ['label' => 'Ya, kirim pengajuan', 'act' => 'pengajuan-kirim'],
    ]">
        <p class="m-0">Pastikan judul, abstrak, dan referensi sudah sesuai.</p>
        <p class="m-0">Periksa kembali urutan dosen yang kamu usulkan.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-pengajuan-mengirim" title="Sedang mengirim pengajuan"
                    auto="notif-pengajuan-berhasil" :delay="1600">
        <p class="m-0">Tunggu sampai proses pengiriman selesai.</p>
        <p class="m-0">Halaman akan menampilkan hasil pengiriman.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-pengajuan-berhasil" title="Pengajuan berhasil dikirim" :actions="[
        ['label' => 'Tutup', 'variant' => 'secondary'],
        ['label' => 'Lihat dashboard', 'href' => route('dashboard')],
    ]">
        <p class="m-0">Pengajuanmu menunggu pemeriksaan.</p>
        <p class="m-0">Lihat perkembangan pengajuan melalui dashboard.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-pengajuan-gagal" title="Pengajuan belum terkirim" tone="line" :actions="[
        ['label' => 'Kembali', 'variant' => 'secondary'],
        ['label' => 'Coba kirim lagi', 'act' => 'pengajuan-kirim'],
    ]">
        <p class="m-0">Periksa koneksi internet, lalu coba kirim kembali.</p>
        <p class="m-0">Jangan tutup halaman sebelum proses selesai.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-draf-pengajuan" title="Draf pengajuan tersimpan" tone="line" :actions="[
        ['label' => 'Kembali ke form'],
    ]">
        <p class="m-0">Data yang sudah kamu isi disimpan sebagai draf.</p>
        <p class="m-0">Pengajuan belum dikirim untuk diperiksa.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-data-pengajuan" title="Lengkapi data pengajuan" :actions="[
        ['label' => 'Lengkapi data'],
    ]">
        <p class="m-0">Judul proposal dan abstrak masih kosong.</p>
        <p class="m-0">Isi kedua kolom tersebut sebelum mengirim pengajuan.</p>
    </x-notif-dialog>

    <x-notif-dialog id="notif-petunjuk-pengajuan" title="Petunjuk pengajuan pembimbing" tone="line" :actions="[
        ['label' => 'Mengerti'],
    ]">
        <p class="m-0">Topik Mandiri: ajukan topik yang kamu susun.</p>
        <p class="m-0">Topik dari Dosen: pilih topik yang ditawarkan dosen.</p>
        <p class="m-0">Isi data topik, lalu usulkan dosen pembimbing.</p>
    </x-notif-dialog>
@endsection
