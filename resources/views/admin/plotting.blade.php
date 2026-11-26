@extends('layouts.app')

@section('title', 'Plotting Peran Dosen — LARAS')

@section('content')
    @php
        $rubrik = [
            ['name' => 'Kualitas Konsep & Metodologi', 'text' => 'Kekuatan ide, relevansi teori, dan konsistensi metodologi penelitian.', 'desc' => 'Dinilai dari kejelasan tujuan, keterkaitan teori, dan konsistensi metode.', 'weight' => '30%'],
            ['name' => 'Kemampuan Analisis & Interpretasi', 'text' => 'Kemampuan menganalisis data, menarik kesimpulan, dan menghubungkan hasil dengan tujuan penelitian.', 'desc' => 'Dinilai dari kedalaman analisis, ketepatan interpretasi, dan konsistensi kesimpulan.', 'weight' => '25%'],
            ['name' => 'Sistematika & Penulisan', 'text' => 'Keteraturan struktur, kejelasan kalimat, dan penerapan pedoman penulisan yang konsisten.', 'desc' => 'Dinilai dari keteraturan bab, kejelasan kalimat, dan konsistensi format penulisan.', 'weight' => '20%'],
            ['name' => 'Presentasi & Jawaban Pertanyaan', 'text' => 'Kemampuan menyampaikan hasil, menjawab pertanyaan, dan menunjukkan penguasaan materi.', 'desc' => 'Dinilai dari kejelasan presentasi, ketepatan jawaban, dan kesiapan menghadapi pertanyaan.', 'weight' => '25%'],
        ];
    @endphp

    <x-admin-shell active="Manajemen Data" padding-bottom="pb-[73px]">
        <section class="mt-6 flex min-h-[117px] flex-nowrap items-center gap-x-6 gap-y-4 rounded-[15px] bg-line px-[29px] max-[1101px]:mt-[26px] max-[1101px]:h-auto max-[1101px]:flex-wrap max-[1101px]:p-[18px_22px] max-[761px]:p-[16px_18px] max-[421px]:p-[14px_16px]"
                 aria-label="Manajemen peran dosen">
            <div class="min-w-0">
                <h1 class="m-0 text-[24px] font-medium leading-[1.5] text-ink max-[1101px]:text-[21px] max-[761px]:text-[19px] max-[421px]:text-[17px]">Plotting Peran Dosen &amp; Rubrik Penilaian</h1>
                <p class="mt-2.5 text-[20px] font-normal leading-[1.5] text-ink max-[1101px]:text-[15px] max-[761px]:text-[14px] max-[421px]:text-[13px]">Pilih dosen pembimbing dan penguji untuk setiap pengajuan mahasiswa.</p>
            </div>

            <span class="inline-flex h-11 w-auto shrink-0 items-center justify-center rounded-lg bg-sand px-3 text-[16px] font-medium leading-[1.5] whitespace-nowrap text-ink max-[1101px]:h-[38px] max-[1101px]:px-3.5 max-[1101px]:text-[14px]">{{ $pengajuans->total() }} Pengajuan</span>
        </section>

        <section class="mt-8" aria-labelledby="dosen-list-title">
            <div class="mb-4">
                <h2 id="dosen-list-title" class="text-xl font-medium text-ink">Daftar Dosen ({{ $dosens->count() }})</h2>
                <p class="mt-1 text-sm text-muted">Informasi dosen, peran saat ini, dan penggunaan kuota bimbingan.</p>
            </div>
            <div class="overflow-x-auto rounded-lg shadow-[inset_0_0_0_1px_#b8b8b8]">
                <table class="w-full min-w-[760px] border-collapse bg-white text-left">
                    <thead class="bg-line text-sm font-semibold text-muted"><tr><th class="p-4">NAMA DOSEN / NIDN</th><th class="p-4">PERAN SAAT INI</th><th class="p-4">PENGAJUAN</th><th class="p-4">KUOTA PEMBIMBING</th><th class="p-4">STATUS</th></tr></thead>
                    <tbody>
                        @foreach ($dosens as $dosen)
                            @php $assignments = $dosen->plotting_dosen_pengajuan->where('status_plotting', '!=', 'ditolak'); @endphp
                            <tr class="border-t border-line">
                                <td class="p-4"><p class="font-medium text-ink">{{ $dosen->nama_dosen }}</p><p class="mt-1 text-xs text-muted">NIDN: {{ $dosen->nidn ?? '—' }}</p></td>
                                <td class="p-4">{{ $assignments->pluck('role')->map(fn ($role) => $roles[$role] ?? ucfirst($role))->unique()->join(', ') ?: 'Belum ditetapkan' }}</td>
                                <td class="p-4 text-sm">{{ $assignments->map(fn ($assignment) => $assignment->pengajuan?->mahasiswa?->nama_mahasiswa)->filter()->unique()->join(', ') ?: '—' }}</td>
                                <td class="p-4">{{ $dosen->plotting_pembimbing_aktif_count }} / {{ $dosen->kuota_bimbingan }}</td>
                                <td class="p-4">{{ $dosen->plotting_pembimbing_aktif_count >= $dosen->kuota_bimbingan ? 'Kuota penuh' : 'Tersedia' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-8 max-[1101px]:mt-6" aria-labelledby="admp-list-title">
            <div class="flex h-[55px] items-start justify-between gap-6 max-[1101px]:h-auto max-[1101px]:flex-col max-[1101px]:gap-4">
                <div class="min-w-0">
                    <h2 class="m-0 text-[20px] font-medium leading-[1.5] text-ink max-[421px]:text-[17px]" id="admp-list-title">Daftar Pengajuan ({{ $pengajuans->total() }})</h2>
                    <p class="mt-1 text-[14px] font-normal leading-[1.5] text-muted max-[421px]:text-[13px]">Penugasan disimpan berdasarkan peran dosen.</p>
                </div>

                <div class="flex shrink-0 gap-4 max-[1101px]:w-full max-[1101px]:gap-3 max-[761px]:flex-wrap">
                    <form id="plotting-search" method="GET" action="{{ route('admin.plotting') }}" class="flex h-11 w-[320px] items-center gap-2.5 rounded-lg border border-[#b8b8b8] px-3.5 max-[1101px]:w-auto max-[1101px]:flex-1">
                        <svg class="size-[18px] shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="11" cy="11" r="6.4" stroke="#747373" stroke-width="2" />
                            <path d="m16 16 4 4" stroke="#747373" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <input class="w-full border-none bg-transparent p-0 text-[14px] text-ink outline-none placeholder:text-muted max-[421px]:text-[13px]"
                               type="search" name="q" value="{{ request('q') }}" placeholder="Cari mahasiswa atau judul" aria-label="Cari mahasiswa atau judul">
                        <button class="shrink-0 text-sm font-medium" type="submit">Cari</button>
                    </form>
                </div>
            </div>

            <div class="mt-5 overflow-hidden rounded-lg shadow-[inset_0_0_0_1px_#b8b8b8] max-[1339px]:overflow-x-auto max-[761px]:overflow-visible max-[761px]:shadow-none">
                @if (session('success')) <p class="m-4 rounded bg-green-50 p-3 text-green-800" role="status">{{ session('success') }}</p> @endif
                @if ($errors->any()) <div class="m-4 rounded bg-red-50 p-3 text-red-800" role="alert"><p class="font-semibold">Penugasan belum disimpan.</p><ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif
                <div class="grid h-[46px] grid-cols-[minmax(220px,1.1fr)_minmax(240px,1fr)_minmax(240px,1fr)_minmax(240px,1fr)_minmax(240px,1fr)] items-center gap-4 bg-line px-6 max-[1101px]:hidden">
                    <span class="text-sm font-semibold text-muted">MAHASISWA / PENGAJUAN</span>
                    @foreach ($roles as $label)<span class="text-sm font-semibold text-muted">{{ strtoupper($label) }}</span>@endforeach
                </div>

                @forelse ($pengajuans as $pengajuan)
                    @php $assigned = $pengajuan->plotting_dosen_pengajuan->keyBy('role'); @endphp
                    <form method="POST" action="{{ route('admin.plotting.update', $pengajuan) }}" class="grid grid-cols-[minmax(220px,1.1fr)_repeat(4,minmax(240px,1fr))] items-center gap-4 border-b border-line bg-white px-6 py-5 max-[1101px]:grid-cols-1 max-[1101px]:gap-3 max-[1101px]:px-4">
                        @csrf @method('PUT')
                        <div class="min-w-0">
                            <p class="font-medium text-ink">{{ $pengajuan->mahasiswa?->nama_mahasiswa ?? 'Mahasiswa' }}</p>
                            <p class="text-xs text-muted">NIM: {{ $pengajuan->mahasiswa?->nim ?? '—' }}</p>
                            <p class="mt-2 text-sm text-ink">{{ $pengajuan->judul_penelitian }}</p>
                            <p class="mt-1 text-xs text-muted">{{ ucfirst($pengajuan->jenis_pengajuan) }} · {{ $pengajuan->status_pengajuan }}</p>
                        </div>
                        @foreach ($roles as $role => $label)
                            @php $existing = $assigned->get($role); @endphp
                            <label class="block text-sm font-medium text-ink">{{ $label }}
                                <select name="assignments[{{ $role }}]" class="mt-1 w-full rounded-lg border border-[#b8b8b8] bg-white p-2.5 text-sm" aria-label="{{ $label }} untuk {{ $pengajuan->mahasiswa?->nama_mahasiswa }}">
                                    <option value="">Belum ditetapkan</option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id }}" @selected((string) old("assignments.$role", $existing?->id_dosen) === (string) $dosen->id)>{{ $dosen->nama_dosen }} · Kuota {{ $dosen->plotting_pembimbing_aktif_count }}/{{ $dosen->kuota_bimbingan }}</option>
                                    @endforeach
                                </select>
                                @if ($existing)<span class="mt-1 block text-xs text-muted">Status: {{ $existing->status_plotting }}</span>@endif
                                @error("assignments.$role")<span class="mt-1 block text-xs text-red-700">{{ $message }}</span>@enderror
                            </label>
                        @endforeach
                        <div class="col-span-full flex justify-end"><button class="rounded-lg bg-brand px-5 py-2.5 font-semibold text-ink" type="submit">Simpan Penugasan</button></div>
                    </form>
                @empty
                    <p class="p-8 text-center text-muted">Belum ada pengajuan aktif untuk ditugaskan.</p>
                @endforeach

                <div class="p-4">{{ $pengajuans->links() }}</div>
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
                            type="button"
                            data-notif-open="notif-admin-tersimpan">Simpan Perubahan</button>
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

    <x-notif-dialog id="notif-admin-tersimpan" title="Perubahan tersimpan" tone="line" :actions="[
        ['label' => 'Mengerti'],
    ]">
        <p class="m-0">Perubahan data sudah disimpan.</p>
        <p class="m-0">Kamu dapat melanjutkan pengelolaan data.</p>
    </x-notif-dialog>
@endsection
