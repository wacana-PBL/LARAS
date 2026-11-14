@extends('layouts.app')

@section('title', 'Plotting Peran Dosen — LARAS')

@section('content')
    @php
        $dosen = [
            ['name' => 'Mera Kartika Delimayanti, S.Si., M.T., Ph.D.', 'nidn' => '0015087301', 'role' => 'Pembimbing', 'status' => ['label' => 'Tersimpan', 'tone' => 'saved']],
            ['name' => 'Dr. Anita Hidayati, S.Kom., M.Kom.', 'nidn' => '0023107602', 'role' => 'Penguji', 'status' => ['label' => 'Tersimpan', 'tone' => 'saved']],
            ['name' => 'Dr. Hata Maulana, S.Si., M.T.', 'nidn' => '0012077803', 'role' => 'Penguji', 'status' => ['label' => 'Belum disimpan', 'tone' => 'dirty'], 'edited' => true],
            ['name' => 'Bambang Warsuta, S.Kom., M.T.I.', 'nidn' => '0019057504', 'role' => 'Pembimbing', 'status' => ['label' => 'Tersimpan', 'tone' => 'saved']],
            ['name' => 'Dewi Anggraini, S.Kom., M.Kom.', 'nidn' => '0021088205', 'role' => 'Belum ditetapkan', 'status' => ['label' => 'Perlu ditetapkan', 'tone' => 'empty']],
        ];
        $rubrik = [
            ['name' => 'Kualitas Konsep & Metodologi', 'text' => 'Kekuatan ide, relevansi teori, dan konsistensi metodologi penelitian.', 'desc' => 'Dinilai dari kejelasan tujuan, keterkaitan teori, dan konsistensi metode.', 'weight' => '30%'],
            ['name' => 'Kemampuan Analisis & Interpretasi', 'text' => 'Kemampuan menganalisis data, menarik kesimpulan, dan menghubungkan hasil dengan tujuan penelitian.', 'desc' => 'Dinilai dari kedalaman analisis, ketepatan interpretasi, dan konsistensi kesimpulan.', 'weight' => '25%'],
            ['name' => 'Sistematika & Penulisan', 'text' => 'Keteraturan struktur, kejelasan kalimat, dan penerapan pedoman penulisan yang konsisten.', 'desc' => 'Dinilai dari keteraturan bab, kejelasan kalimat, dan konsistensi format penulisan.', 'weight' => '20%'],
            ['name' => 'Presentasi & Jawaban Pertanyaan', 'text' => 'Kemampuan menyampaikan hasil, menjawab pertanyaan, dan menunjukkan penguasaan materi.', 'desc' => 'Dinilai dari kejelasan presentasi, ketepatan jawaban, dan kesiapan menghadapi pertanyaan.', 'weight' => '25%'],
        ];
    @endphp

    <x-admin-shell active="Manajemen Data" padding-bottom="pb-[73px]">
        <section class="mt-6 flex h-[117px] flex-nowrap items-center gap-x-6 gap-y-4 rounded-[15px] bg-line px-[29px] max-[1101px]:mt-[26px] max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:p-[18px_22px] max-[761px]:p-[16px_18px] max-[421px]:p-[14px_16px]"
                 aria-label="Manajemen peran dosen">
            <div class="min-w-0">
                <h1 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[21px] max-[761px]:text-[19px] max-[421px]:text-[17px]">Plotting Peran Dosen &amp; Rubrik Penilaian</h1>
                <p class="mt-2.5 text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[761px]:text-[14px] max-[421px]:text-[13px]">Tetapkan dosen sebagai Pembimbing atau Penguji untuk seminar dan skripsi.</p>
            </div>

            <span class="inline-flex h-11 w-[217px] shrink-0 items-center justify-center rounded-lg bg-sand px-3 text-[20px] font-medium leading-[1.5] whitespace-nowrap text-ink max-[1101px]:h-[38px] max-[1101px]:w-auto max-[1101px]:px-3.5 max-[1101px]:text-[15px] max-[761px]:h-[34px] max-[761px]:text-[13px] max-[421px]:h-8 max-[421px]:text-[12px]">1 Belum ditetapkan</span>
        </section>

        <section class="mt-8 max-[1101px]:mt-6" aria-labelledby="admp-list-title">
            <div class="flex h-[55px] items-start justify-between gap-6 max-[1101px]:h-auto max-[1101px]:flex-col max-[1101px]:gap-4">
                <div class="min-w-0">
                    <h2 class="m-0 text-[20px] font-medium leading-[1.5] text-ink max-[421px]:text-[17px]" id="admp-list-title">Daftar Dosen (5)</h2>
                    <p class="mt-1 text-[14px] font-normal leading-[1.5] text-muted max-[421px]:text-[13px]">2 Pembimbing &bull; 2 Penguji &bull; 1 Belum ditetapkan</p>
                </div>

                <div class="flex shrink-0 gap-4 max-[1101px]:w-full max-[1101px]:gap-3 max-[761px]:flex-wrap">
                    <label class="flex h-11 w-[320px] items-center gap-2.5 rounded-lg border border-[#b8b8b8] px-3.5 max-[1101px]:w-auto max-[1101px]:flex-1">
                        <svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="11" cy="11" r="6.4" stroke="#747373" stroke-width="2" />
                            <path d="m16 16 4 4" stroke="#747373" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <input class="w-full border-none bg-transparent p-0 text-[14px] text-ink outline-none placeholder:text-muted max-[421px]:text-[13px]"
                               type="search" placeholder="Cari nama atau NIDN dosen" aria-label="Cari nama atau NIDN dosen">
                    </label>

                    <div class="flex h-11 w-[190px] cursor-pointer items-center justify-between gap-2.5 rounded-lg border border-[#b8b8b8] px-3.5 text-[14px] font-normal text-ink max-[761px]:w-full max-[421px]:text-[13px]">
                        <span>Semua peran</span>
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-5 overflow-hidden rounded-lg shadow-[inset_0_0_0_1px_#b8b8b8] max-[1339px]:overflow-x-auto max-[761px]:overflow-visible max-[761px]:shadow-none">
                <div class="grid h-[46px] grid-cols-[515px_184px_300px_1fr] items-center gap-6 bg-line px-6 max-[1101px]:w-max max-[1101px]:min-w-full max-[1101px]:grid-cols-[260px_120px_200px_150px] max-[1101px]:gap-4 max-[1101px]:px-4 max-[761px]:hidden">
                    <span class="text-[14px] font-semibold leading-[1.5] text-muted">NAMA DOSEN / NIDN</span>
                    <span class="text-[14px] font-semibold leading-[1.5] text-muted">PERAN SAAT INI</span>
                    <span class="text-[14px] font-semibold leading-[1.5] text-muted">PENETAPAN PERAN</span>
                    <span class="text-[14px] font-semibold leading-[1.5] text-muted">STATUS</span>
                </div>

                @foreach ($dosen as $index => $item)
                    <div @class([
                        'grid h-[88px] grid-cols-[515px_184px_300px_1fr] items-center gap-6 border-b border-line px-6',
                        'max-[1101px]:h-24 max-[1101px]:w-max max-[1101px]:min-w-full max-[1101px]:grid-cols-[260px_120px_200px_150px] max-[1101px]:gap-4 max-[1101px]:px-4',
                        'max-[761px]:mt-3 max-[761px]:h-auto max-[761px]:w-full max-[761px]:grid-cols-1 max-[761px]:gap-y-2.5 max-[761px]:rounded-lg max-[761px]:border max-[761px]:border-line max-[761px]:p-4',
                        'bg-white' => empty($item['edited']),
                        'bg-brand-soft' => ! empty($item['edited']),
                    ])>
                        <div class="min-w-0">
                            <p class="m-0 text-base font-medium leading-[1.5] text-ink max-[1101px]:text-[14px]">{{ $item['name'] }}</p>
                            <p class="mt-1 text-[13px] font-normal leading-[1.5] text-muted">NIDN: {{ $item['nidn'] }}</p>
                        </div>

                        <p @class([
                            'm-0 min-w-0 text-base font-normal leading-[1.5]',
                            'text-ink' => $item['role'] !== 'Belum ditetapkan',
                            'text-muted' => $item['role'] === 'Belum ditetapkan',
                        ])>{{ $item['role'] }}</p>

                        <div class="min-w-0">
                            <fieldset class="relative m-0 flex h-[68px] w-full flex-col gap-1 rounded-lg border border-[#b8b8b8] p-[8px_12px]">
                                <legend class="sr-only">Peran {{ $item['name'] }}</legend>
                                @foreach (['Pembimbing', 'Penguji'] as $role)
                                    <label class="relative flex cursor-pointer items-center gap-2 text-[13px] font-normal leading-6 text-ink">
                                        <input class="peer absolute size-px opacity-0" type="radio" name="peran-{{ $index }}" value="{{ $role }}"
                                            @checked($item['role'] === $role)>
                                        <span class="block size-4 shrink-0 rounded-full border border-muted peer-checked:border-brand peer-checked:bg-brand peer-checked:shadow-[inset_0_0_0_3px_#ffffff] peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand" aria-hidden="true"></span>
                                        {{ $role }}
                                    </label>
                                @endforeach
                            </fieldset>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="flex size-[18px] shrink-0 items-center justify-center" aria-hidden="true">
                                @if ($item['status']['tone'] === 'saved')
                                    <svg class="size-[18px]" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12.8 9.6 17.4 19 7.4" stroke="#747373" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                @else
                                    <span @class([
                                        'size-2 rounded-full',
                                        'bg-brand' => $item['status']['tone'] === 'dirty',
                                        'bg-muted' => $item['status']['tone'] !== 'dirty',
                                    ])></span>
                                @endif
                            </span>
                            <span @class([
                                'text-[13px] leading-[1.5]',
                                'font-medium text-brand' => $item['status']['tone'] === 'dirty',
                                'font-normal text-muted' => $item['status']['tone'] !== 'dirty',
                            ])>{{ $item['status']['label'] }}</span>
                        </div>
                    </div>
                @endforeach

                <div class="flex h-11 items-center justify-between gap-6 px-6 text-[13px] font-normal leading-[1.5] text-muted max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:gap-4 max-[1101px]:px-4 max-[1101px]:py-3 max-[761px]:px-1">
                    <span>Menampilkan 5 dari 5 dosen</span>
                    <span>Pilih satu peran untuk setiap dosen: Pembimbing atau Penguji.</span>
                </div>
            </div>

            <div class="mt-5 flex h-[72px] items-center justify-between gap-6 rounded-lg bg-line px-6 max-[1101px]:h-auto max-[1101px]:flex-col max-[1101px]:items-start max-[1101px]:gap-3.5 max-[1101px]:p-[18px_20px]">
                <div>
                    <p class="m-0 text-base font-medium leading-[1.5] text-ink">1 perubahan belum disimpan</p>
                    <p class="mt-0.5 text-[13px] font-normal leading-[1.5] text-muted">Peran baru diterapkan setelah Anda menyimpan perubahan.</p>
                </div>

                <div class="flex shrink-0 gap-4 max-[1101px]:w-full max-[1101px]:justify-end">
                    <button class="h-10 cursor-pointer rounded-lg border border-[#b8b8b8] bg-white px-5 text-base font-medium leading-[1.5] text-muted max-[421px]:flex-1 max-[421px]:px-3 max-[421px]:text-[14px]"
                            type="button">Batal</button>
                    <button class="h-10 cursor-pointer rounded-lg border-0 btn-primary bg-brand px-5 text-base font-semibold leading-[1.5] text-ink max-[421px]:flex-1 max-[421px]:px-3 max-[421px]:text-[14px]"
                            type="button">Simpan Perubahan</button>
                </div>
            </div>
        </section>

        <section class="mt-[60px] rounded-[12px] bg-white p-6 shadow-[inset_0_0_0_1px_#e5e7eb] max-[1101px]:mt-8 max-[1101px]:p-5 max-[761px]:p-4" aria-labelledby="rub-title">
            <div class="flex h-[55px] items-start justify-between gap-6 max-[1101px]:h-auto max-[1101px]:flex-col max-[1101px]:gap-3.5">
                <div class="min-w-0">
                    <h2 class="m-0 text-[20px] font-semibold leading-[1.5] text-[#1a1a1a] max-[1101px]:text-[18px]" id="rub-title">Rubrik Penilaian Sidang Skripsi</h2>
                    <p class="mt-1 text-[14px] font-normal leading-[1.5] text-slate">
                        Tambahkan kriteria penilaian sesuai kebutuhan. Total bobot akan dihitung otomatis untuk
                        memastikan penilaian tetap konsisten.
                    </p>
                </div>

                <div class="mt-2.5 flex shrink-0 gap-3 max-[1101px]:mt-0 max-[1101px]:flex-wrap">
                    <span class="inline-flex h-[34px] items-center rounded-lg bg-[#fff7ed] px-3 text-[13px] font-semibold leading-[1.5] whitespace-nowrap text-brand shadow-[inset_0_0_0_1px_#ed7a1c]">4 Kriteria aktif</span>
                    <span class="inline-flex h-[34px] items-center rounded-lg bg-line px-3 text-[13px] font-normal leading-[1.5] whitespace-nowrap text-slate">Total bobot: 100%</span>
                </div>
            </div>

            <div class="mt-6 max-[1340px]:overflow-x-auto max-[761px]:overflow-visible">
                <div class="grid h-[21px] grid-cols-[723px_220px_120px_120px] items-center gap-4 rounded-lg bg-line px-6 text-[14px] font-semibold leading-[1.5] text-muted max-[1101px]:w-max max-[1101px]:min-w-full max-[1101px]:grid-cols-[300px_220px_100px_90px] max-[1101px]:px-4 max-[761px]:hidden">
                    <span>Kriteria Penilaian</span>
                    <span>Deskripsi Penilaian</span>
                    <span>Bobot</span>
                    <span>Aksi</span>
                </div>

                @foreach ($rubrik as $row)
                    <div class="mt-6 grid min-h-[60px] grid-cols-[723px_220px_120px_120px] items-center gap-4 rounded-[2px] bg-white px-6 shadow-[inset_0_0_0_1px_#e5e7eb] max-[1101px]:w-max max-[1101px]:min-w-full max-[1101px]:grid-cols-[300px_220px_100px_90px] max-[1101px]:px-4 max-[1101px]:py-3 max-[761px]:w-full max-[761px]:grid-cols-[minmax(0,1fr)_auto] max-[761px]:gap-y-2.5 max-[761px]:p-[14px]">
                        <div class="min-w-0">
                            <p class="m-0 text-base font-medium leading-[1.5] text-[#1a1a1a]">{{ $row['name'] }}</p>
                            <p class="mt-1 text-[13px] font-normal leading-[1.5] text-slate">{{ $row['text'] }}</p>
                        </div>

                        <p class="m-0 text-[13px] font-normal leading-[1.5] text-[#1a1a1a] max-[761px]:col-span-full">{{ $row['desc'] }}</p>

                        <div class="flex max-[761px]:col-start-1">
                            <span class="inline-flex h-[37px] items-center justify-center rounded-lg bg-line px-3 text-[14px] font-medium leading-[1.5] text-[#1a1a1a]">{{ $row['weight'] }}</span>
                        </div>

                        <div class="flex max-[761px]:col-start-2">
                            <button class="h-9 cursor-pointer rounded-lg border border-[#b8b8b8] bg-white px-3 text-[13px] font-medium leading-[1.5] text-slate"
                                    type="button">Edit</button>
                        </div>
                    </div>
                @endforeach

                <div class="mt-6 grid min-h-12 grid-cols-[723px_220px_120px_120px] items-center gap-4 rounded-lg bg-brand-soft px-6 shadow-[inset_0_0_0_1px_#ed7a1c] max-[1101px]:w-max max-[1101px]:min-w-full max-[1101px]:grid-cols-[300px_220px_100px_90px] max-[1101px]:px-4 max-[1101px]:py-3 max-[761px]:w-full max-[761px]:grid-cols-[minmax(0,1fr)_auto] max-[761px]:gap-y-2.5 max-[761px]:p-[14px]">
                    <div class="min-w-0">
                        <p class="m-0 text-base font-medium leading-[1.5] text-[#1a1a1a]">Tambah Kriteria Baru</p>
                        <p class="mt-1 text-[13px] font-normal leading-[1.5] text-slate">Tambahkan kriteria penilaian lain untuk dosen penguji.</p>
                    </div>

                    <p class="m-0 text-[13px] font-normal leading-[1.5] text-slate max-[761px]:col-span-full">Deskripsi penilaian akan muncul di rubrik.</p>

                    <div class="flex max-[761px]:col-start-1">
                        <span class="inline-flex h-[37px] items-center justify-center rounded-lg bg-white px-3 text-[14px] font-medium leading-[1.5] text-[#1a1a1a] shadow-[inset_0_0_0_1px_#b8b8b8]">0%</span>
                    </div>

                    <div class="flex max-[761px]:col-start-2">
                        <button class="h-9 cursor-pointer rounded-lg border-0 btn-primary bg-brand px-3 text-[13px] font-semibold leading-[1.5] text-ink"
                                type="button">Tambah</button>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex h-[78px] items-center justify-between gap-6 rounded-lg bg-line px-6 max-[1101px]:h-auto max-[1101px]:flex-col max-[1101px]:items-start max-[1101px]:gap-3.5 max-[1101px]:p-[18px_20px]">
                <div>
                    <p class="m-0 text-base font-medium leading-[1.5] text-ink">Total bobot: 100%</p>
                    <p class="mt-0.5 text-[13px] font-normal leading-[1.5] text-muted">Perubahan akan diterapkan setelah Anda menyimpan rubrik.</p>
                </div>

                <div class="flex shrink-0 gap-4 max-[1101px]:w-full max-[1101px]:justify-end">
                    <button class="h-10 cursor-pointer rounded-lg border border-[#b8b8b8] bg-white px-5 text-base font-medium leading-[1.5] text-muted max-[761px]:flex-1 max-[761px]:px-3 max-[761px]:text-[14px]"
                            type="button">Batal</button>
                    <button class="h-10 cursor-pointer rounded-lg border-0 btn-primary bg-brand px-5 text-base font-semibold leading-[1.5] text-ink max-[761px]:flex-1 max-[761px]:px-3 max-[761px]:text-[14px]"
                            type="button">Simpan Rubrik</button>
                </div>
            </div>
        </section>
    </x-admin-shell>
@endsection
