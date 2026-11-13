@extends('layouts.app')

@section('title', 'Plotting Peran Dosen — LARAS')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laras-admin.css') }}?v={{ filemtime(public_path('css/laras-admin.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/laras-admin-plotting.css') }}?v={{ filemtime(public_path('css/laras-admin-plotting.css')) }}">
@endpush

@section('content')
    @php
        $dosen = [
            [
                'name' => 'Mera Kartika Delimayanti, S.Si., M.T., Ph.D.',
                'nidn' => '0015087301',
                'role' => 'Pembimbing',
                'status' => ['label' => 'Tersimpan', 'tone' => 'saved'],
            ],
            [
                'name' => 'Dr. Anita Hidayati, S.Kom., M.Kom.',
                'nidn' => '0023107602',
                'role' => 'Penguji',
                'status' => ['label' => 'Tersimpan', 'tone' => 'saved'],
            ],
            [
                'name' => 'Dr. Hata Maulana, S.Si., M.T.',
                'nidn' => '0012077803',
                'role' => 'Penguji',
                'status' => ['label' => 'Belum disimpan', 'tone' => 'dirty'],
                'edited' => true,
            ],
            [
                'name' => 'Bambang Warsuta, S.Kom., M.T.I.',
                'nidn' => '0019057504',
                'role' => 'Pembimbing',
                'status' => ['label' => 'Tersimpan', 'tone' => 'saved'],
            ],
            [
                'name' => 'Dewi Anggraini, S.Kom., M.Kom.',
                'nidn' => '0021088205',
                'role' => 'Belum ditetapkan',
                'status' => ['label' => 'Perlu ditetapkan', 'tone' => 'empty'],
            ],
        ];
        $rubrik = [
            [
                'name' => 'Kualitas Konsep & Metodologi',
                'text' => 'Kekuatan ide, relevansi teori, dan konsistensi metodologi penelitian.',
                'desc' => 'Dinilai dari kejelasan tujuan, keterkaitan teori, dan konsistensi metode.',
                'weight' => '30%',
            ],
            [
                'name' => 'Kemampuan Analisis & Interpretasi',
                'text' => 'Kemampuan menganalisis data, menarik kesimpulan, dan menghubungkan hasil dengan tujuan penelitian.',
                'desc' => 'Dinilai dari kedalaman analisis, ketepatan interpretasi, dan konsistensi kesimpulan.',
                'weight' => '25%',
            ],
            [
                'name' => 'Sistematika & Penulisan',
                'text' => 'Keteraturan struktur, kejelasan kalimat, dan penerapan pedoman penulisan yang konsisten.',
                'desc' => 'Dinilai dari keteraturan bab, kejelasan kalimat, dan konsistensi format penulisan.',
                'weight' => '20%',
            ],
            [
                'name' => 'Presentasi & Jawaban Pertanyaan',
                'text' => 'Kemampuan menyampaikan hasil, menjawab pertanyaan, dan menunjukkan penguasaan materi.',
                'desc' => 'Dinilai dari kejelasan presentasi, ketepatan jawaban, dan kesiapan menghadapi pertanyaan.',
                'weight' => '25%',
            ],
        ];
    @endphp

    <main class="adm-page admp-page">
        <div class="adm-shell">

            <x-navbar variant="admin" active="Manajemen Data" />

            <section class="adm-banner admp-banner" aria-label="Manajemen peran dosen">
                <div class="admp-banner__text">
                    <h1 class="adm-banner__title">Plotting Peran Dosen &amp; Rubrik Penilaian</h1>
                    <p class="adm-banner__text">Tetapkan dosen sebagai Pembimbing atau Penguji untuk seminar dan skripsi.</p>
                </div>

                <span class="adm-pill admp-banner__pill">1 Belum ditetapkan</span>
            </section>

            <section class="admp-list" aria-labelledby="admp-list-title">
                <div class="admp-toolbar">
                    <div class="admp-toolbar__summary">
                        <h2 class="admp-toolbar__title" id="admp-list-title">Daftar Dosen (5)</h2>
                        <p class="admp-toolbar__meta">2 Pembimbing &bull; 2 Penguji &bull; 1 Belum ditetapkan</p>
                    </div>

                    <div class="admp-toolbar__tools">
                        <label class="admp-search">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="11" cy="11" r="6.4" stroke="#747373" stroke-width="2" />
                                <path d="m16 16 4 4" stroke="#747373" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <input type="search" placeholder="Cari nama atau NIDN dosen" aria-label="Cari nama atau NIDN dosen">
                        </label>

                        <div class="admp-filter">
                            <span>Semua peran</span>
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M6 9.5 12 15.5l6-6" stroke="#020100" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="admp-table">
                    <div class="admp-table__head">
                        <span>NAMA DOSEN / NIDN</span>
                        <span>PERAN SAAT INI</span>
                        <span>PENETAPAN PERAN</span>
                        <span>STATUS</span>
                    </div>

                    @foreach ($dosen as $index => $item)
                        <div class="admp-row{{ ! empty($item['edited']) ? ' admp-row--edited' : '' }}">
                            <div class="admp-cell admp-cell--dosen">
                                <p class="admp-row__name">{{ $item['name'] }}</p>
                                <p class="admp-row__nidn">NIDN: {{ $item['nidn'] }}</p>
                            </div>

                            <p class="admp-cell admp-row__role{{ $item['role'] === 'Belum ditetapkan' ? ' admp-row__role--empty' : '' }}">
                                {{ $item['role'] }}
                            </p>

                            <div class="admp-cell">
                                <fieldset class="admp-role">
                                    <legend class="admp-role__legend">Peran {{ $item['name'] }}</legend>
                                    @foreach (['Pembimbing', 'Penguji'] as $role)
                                        <label class="admp-role__option">
                                            <input type="radio" name="peran-{{ $index }}" value="{{ $role }}"
                                                @checked($item['role'] === $role)>
                                            <span class="admp-role__dot" aria-hidden="true"></span>
                                            {{ $role }}
                                        </label>
                                    @endforeach
                                </fieldset>
                            </div>

                            <div class="admp-cell admp-status admp-status--{{ $item['status']['tone'] }}">
                                <span class="admp-status__mark" aria-hidden="true">
                                    @if ($item['status']['tone'] === 'saved')
                                        <svg viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12.8 9.6 17.4 19 7.4" stroke="#747373" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    @else
                                        <span class="admp-status__dot"></span>
                                    @endif
                                </span>
                                <span class="admp-status__label">{{ $item['status']['label'] }}</span>
                            </div>
                        </div>
                    @endforeach

                    <div class="admp-table__foot">
                        <span class="admp-table__count">Menampilkan 5 dari 5 dosen</span>
                        <span class="admp-table__hint">Pilih satu peran untuk setiap dosen: Pembimbing atau Penguji.</span>
                    </div>
                </div>

                <div class="admp-save">
                    <div class="admp-save__text">
                        <p class="admp-save__title">1 perubahan belum disimpan</p>
                        <p class="admp-save__meta">Peran baru diterapkan setelah Anda menyimpan perubahan.</p>
                    </div>

                    <div class="admp-save__actions">
                        <button class="admp-btn admp-btn--ghost" type="button">Batal</button>
                        <button class="admp-btn admp-btn--primary" type="button">Simpan Perubahan</button>
                    </div>
                </div>
            </section>

            <section class="rub-card" aria-labelledby="rub-title">
                <div class="rub-summary">
                    <div class="rub-summary__copy">
                        <h2 class="rub-summary__title" id="rub-title">Rubrik Penilaian Sidang Skripsi</h2>
                        <p class="rub-summary__text">
                            Tambahkan kriteria penilaian sesuai kebutuhan. Total bobot akan dihitung otomatis untuk
                            memastikan penilaian tetap konsisten.
                        </p>
                    </div>

                    <div class="rub-summary__chips">
                        <span class="rub-chip rub-chip--accent">4 Kriteria aktif</span>
                        <span class="rub-chip">Total bobot: 100%</span>
                    </div>
                </div>

                <div class="rub-table">
                    <div class="rub-table__head">
                        <span>Kriteria Penilaian</span>
                        <span>Deskripsi Penilaian</span>
                        <span>Bobot</span>
                        <span>Aksi</span>
                    </div>

                    @foreach ($rubrik as $row)
                        <div class="rub-row">
                            <div class="rub-row__main">
                                <p class="rub-row__name">{{ $row['name'] }}</p>
                                <p class="rub-row__text">{{ $row['text'] }}</p>
                            </div>

                            <p class="rub-row__desc">{{ $row['desc'] }}</p>

                            <div class="rub-row__weight">
                                <span class="rub-weight">{{ $row['weight'] }}</span>
                            </div>

                            <div class="rub-row__action">
                                <button class="rub-edit" type="button">Edit</button>
                            </div>
                        </div>
                    @endforeach

                    <div class="rub-add">
                        <div class="rub-row__main">
                            <p class="rub-row__name">Tambah Kriteria Baru</p>
                            <p class="rub-row__text">Tambahkan kriteria penilaian lain untuk dosen penguji.</p>
                        </div>

                        <p class="rub-row__desc rub-row__desc--muted">Deskripsi penilaian akan muncul di rubrik.</p>

                        <div class="rub-row__weight">
                            <span class="rub-weight rub-weight--blank">0%</span>
                        </div>

                        <div class="rub-row__action">
                            <button class="rub-add__btn" type="button">Tambah</button>
                        </div>
                    </div>
                </div>

                <div class="rub-footer">
                    <div class="rub-footer__copy">
                        <p class="rub-footer__title">Total bobot: 100%</p>
                        <p class="rub-footer__text">Perubahan akan diterapkan setelah Anda menyimpan rubrik.</p>
                    </div>

                    <div class="rub-footer__actions">
                        <button class="rub-btn rub-btn--ghost" type="button">Batal</button>
                        <button class="rub-btn rub-btn--primary" type="button">Simpan Rubrik</button>
                    </div>
                </div>
            </section>

        </div>
    </main>
@endsection
