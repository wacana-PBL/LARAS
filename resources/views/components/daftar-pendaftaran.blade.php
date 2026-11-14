@props([
    'jenis' => 'sempro',
    'judulLabel' => 'Judul Proposal',
    'syarat' => [],
    'ghostLabel',
    'solidLabel',
])

@php
    $step = $jenis === 'skripsi' ? 'skripsi' : 'sempro';
@endphp

<div class="mt-[26px] max-[1101px]:mt-[22px]">
    <section class="min-h-[160px] rounded-[12px] border border-stage bg-line p-6 max-[761px]:p-[20px_18px]" aria-labelledby="dfs-status">
        <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="dfs-status">Kesiapan Pendaftaran</h2>

        <div class="mt-[33px] grid grid-cols-[repeat(3,minmax(0,1fr))] gap-x-[60px] gap-y-6 max-[1101px]:mt-[22px] max-[1101px]:grid-cols-1 max-[1101px]:gap-3.5">
            @foreach ($syarat as $item)
                <p class="flex items-center gap-5 text-base font-normal leading-[1.5] max-[761px]:gap-3 max-[761px]:text-[14px]">
                    <svg class="size-6 shrink-0 text-brand" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
                        <path d="M8 12.3l2.7 2.7L16 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {{ $item }}
                </p>
            @endforeach
        </div>
    </section>

    <div class="mt-6 flex items-start gap-6 max-[1101px]:flex-col max-[1101px]:gap-5">
        <section class="min-h-[440px] w-[calc(60%-12px)] rounded-[12px] bg-line p-6 max-[1101px]:min-h-0 max-[1101px]:w-full max-[761px]:p-[20px_18px]"
                 aria-labelledby="dfs-data">
            <div class="flex items-center gap-3">
                <span class="flex shrink-0 text-brand">
                    <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M14 3.5H7.6A1.6 1.6 0 0 0 6 5.1v13.8a1.6 1.6 0 0 0 1.6 1.6h8.8a1.6 1.6 0 0 0 1.6-1.6V7.5l-4-4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                        <path d="M13.6 3.8v3.9h4M9 12.6h6M9 16h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>
                </span>
                <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="dfs-data">Data Pengajuan</h2>
            </div>

            <div class="mt-7 grid grid-cols-[372px_minmax(0,1fr)] gap-x-6 max-[1101px]:grid-cols-1 max-[1101px]:gap-3.5">
                <div class="flex flex-col">
                    <span class="text-base font-normal leading-[1.5]">Nama Mahasiswa</span>
                    <span class="text-[20px] font-normal leading-[1.5] max-[761px]:text-[17px]">Nadra Saputra</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-base font-normal leading-[1.5]">NIM</span>
                    <span class="text-[20px] font-normal leading-[1.5] max-[761px]:text-[17px]">2507411071</span>
                </div>
            </div>

            <div class="my-[18px] h-px bg-muted/85"></div>

            <div class="flex flex-col">
                <span class="text-base font-normal leading-[1.5]">{{ $judulLabel }}</span>
                <span class="text-base font-normal leading-[1.5]">
                    Pengembangan Aplikasi Point of Sales (POS) untuk UMKM Kuliner &ldquo;Warung Mak Dara&rdquo;
                </span>
            </div>

            <div class="my-[18px] h-px bg-muted/85"></div>

            <div class="flex flex-col">
                <span class="text-base font-normal leading-[1.5]">Dosen Pembimbing</span>
                <div class="flex items-center gap-4">
                    <span class="flex size-10 shrink-0 items-center justify-center rounded-full bg-sand text-[15px] font-medium text-ink" aria-hidden="true">BW</span>
                    <span class="text-[15px] font-light leading-[1.4]">Bambang Warsuta, S.Kom., M.T.I.</span>
                </div>
            </div>
        </section>

        <section class="min-h-[440px] w-[calc(40%-12px)] rounded-[12px] bg-line p-6 max-[1101px]:min-h-0 max-[1101px]:w-full max-[761px]:p-[20px_18px]"
                 aria-labelledby="dfs-info">
            <div class="flex items-center gap-3">
                <span class="flex shrink-0 text-brand">
                    <svg class="size-7" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="12" r="8.6" stroke="currentColor" stroke-width="1.7" />
                        <path d="M12 7.4V12l3.2 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                    </svg>
                </span>
                <h2 class="m-0 text-[18px] font-semibold leading-[1.5] max-[421px]:text-[16px]" id="dfs-info">Informasi Penjadwalan</h2>
            </div>

            <span class="mt-5 inline-flex h-8 max-w-full items-center rounded-2xl bg-sand px-[14px] text-[13px] font-semibold whitespace-nowrap text-brand">Belum Dijadwalkan</span>
            <p class="mt-[14px] text-base font-normal leading-[1.4]">Admin menginput jadwal setelah pendaftaran diproses.</p>

            <div class="mt-[30px] grid gap-6">
                <div class="flex items-center gap-3">
                    <span class="flex shrink-0 text-ink">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <rect x="4" y="5.5" width="16" height="15" rx="2.2" stroke="currentColor" stroke-width="1.7" />
                            <path d="M4.4 10.2h15.2M8.6 3.6v3.6M15.4 3.6v3.6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="flex-[0_0_120px] text-[14px] font-medium tracking-[0.02em] max-[421px]:flex-none">TANGGAL</span>
                    <span class="text-base font-normal">Belum Tersedia</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="flex shrink-0 text-ink">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="8.6" stroke="currentColor" stroke-width="1.7" />
                            <path d="M12 7.4V12l3.2 2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="flex-[0_0_120px] text-[14px] font-medium tracking-[0.02em] max-[421px]:flex-none">WAKTU</span>
                    <span class="text-base font-normal">Belum Tersedia</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="flex shrink-0 text-ink">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 21s6.4-5.4 6.4-10.2A6.4 6.4 0 0 0 5.6 10.8C5.6 15.6 12 21 12 21Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
                            <circle cx="12" cy="10.4" r="2.4" stroke="currentColor" stroke-width="1.7" />
                        </svg>
                    </span>
                    <span class="flex-[0_0_120px] text-[14px] font-medium tracking-[0.02em] max-[421px]:flex-none">TEMPAT</span>
                    <span class="text-base font-normal">Belum Tersedia</span>
                </div>
            </div>
        </section>
    </div>

    <label class="mt-8 flex cursor-pointer items-center gap-3 text-base font-normal leading-[1.4] max-[761px]:items-start max-[761px]:text-[14px]">
        <input class="size-6 shrink-0 accent-[#ed7a1c]" type="checkbox" name="kesesuaian" checked>
        Data dan persyaratan pengajuan sudah sesuai.
    </label>

    <div class="mt-[35px] flex items-center justify-end gap-[21px] max-[1101px]:mt-6 max-[1101px]:gap-3">
        <button class="h-11 w-[200px] cursor-pointer rounded-lg border border-muted bg-white text-[14px] font-bold tracking-[0.01em] text-ink max-[761px]:h-12 max-[761px]:w-auto max-[761px]:flex-1"
                type="button">{{ $ghostLabel }}</button>
        <button class="h-[53px] w-[181px] cursor-pointer rounded-[10px] border-0 btn-primary bg-brand text-base font-semibold text-ink max-[761px]:h-12 max-[761px]:w-auto max-[761px]:flex-1"
                type="button">{{ $solidLabel }}</button>
    </div>
</div>
