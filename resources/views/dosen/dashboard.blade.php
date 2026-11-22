@php
    $metrics ??= [
        ['label' => 'Total Anak Didik (Aktif)', 'value' => 12, 'note' => 'Perlu tindakan admin →', 'icon' => 'inbox'],
        ['label' => 'Perlu ACC Bimbingan', 'value' => 12, 'note' => 'Data Sudah Diapprove →', 'icon' => 'schedule'],
        ['label' => 'Disetujui Lanjut Sidang', 'value' => 12, 'note' => 'Dafa Sudah Diapprove →', 'icon' => null],
    ];
    $activities ??= [
        ['name' => 'Asfar Azuria', 'project' => 'TI 2A • Sistem Manajemen Sidang Skripsi'],
        ['name' => 'Asfar Azuria', 'milestone' => 'Seminar Proposal'],
        ['name' => 'Nadia Putri', 'project' => 'TI 2B • Sistem Inventaris Laboratorium'],
        ['name' => 'Bima Aditya', 'milestone' => 'Sidang Skripsi'],
    ];
    $pendingGrades ??= [
        ['name' => 'Asfar Azuria', 'exam' => 'Sidang Skripsi (Kemarin)'],
    ];
@endphp
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Dosen | LARAS</title>
    <link rel="stylesheet" href="{{ asset('css/laras-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/laras-dosen-dashboard.css') }}">
</head>
<body>
    <a class="skip" href="#dashboard">Langsung ke dashboard</a>
    @include('dosen.navbar', ['active' => 'Dashboard', 'contentId' => 'dashboard'])

    <main id="dashboard">
        <header class="welcome">
            <h1>Dashboard Dosen</h1>
            <p>Sistem Manajemen Sidang &amp; Bimbingan Mahasiswa</p>
        </header>

        <div class="overview">
            @foreach ($metrics as $metric)
                <section class="metric">
                    <h2>{{ $metric['label'] }}
                        @if ($metric['icon'])
                            <img src="{{ asset('images/dosen/dashboard/'.$metric['icon'].'.png') }}" width="36" height="36" alt="">
                        @endif
                    </h2>
                    <p class="count">{{ $metric['value'] }}</p>
                    <p class="note">{{ $metric['note'] }}</p>
                </section>
            @endforeach

            <section class="monitor panel" id="pantauan">
                <div class="section-head">
                    <h2>Pantauan Mahasiswa Bimbingan</h2>
                    @if (count($activities) > 2)
                        <button type="button" id="activity-toggle" aria-controls="activities" aria-expanded="false">Lihat Semua</button>
                    @endif
                </div>
                @if ($activities)
                    <ul class="activities" id="activities">
                        @foreach ($activities as $activity)
                            <li class="{{ isset($activity['project']) ? 'project' : 'milestone' }}" @if ($loop->index >= 2) hidden @endif>
                                <strong>{{ $activity['name'] }}</strong>
                                <span>{{ $activity['project'] ?? $activity['milestone'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="empty">Belum ada aktivitas bimbingan.</p>
                @endif
            </section>

            <section class="actions panel">
                @if ($pendingGrades)
                    <h2>Tindakan Diperlukan!</h2>
                    <p class="alert">Ada {{ count($pendingGrades) }} mahasiswa yang belum<br>Anda input nilainya.</p>
                    @foreach ($pendingGrades as $exam)
                        <div class="exam">
                            <h3>{{ $exam['name'] }}</h3>
                            <p>{{ $exam['exam'] }}</p>
                            <button type="button" class="grade" popovertarget="grade-info">Form Input Nilai</button>
                        </div>
                    @endforeach
                    <div id="grade-info" popover>
                        <h3>Form Input Nilai</h3>
                        <p>Form akan tersedia setelah modul penilaian terhubung. Data yang tampil adalah data contoh.</p>
                        <button type="button" class="grade" popovertarget="grade-info" popovertargetaction="hide">Tutup</button>
                    </div>
                @else
                    <h2>Penilaian</h2>
                    <p class="empty">Tidak ada nilai yang perlu diinput.</p>
                @endif
            </section>
        </div>
    </main>
    <script>
        const toggle = document.getElementById('activity-toggle');
        toggle?.addEventListener('click', () => {
            const expand = toggle.getAttribute('aria-expanded') === 'false';
            for (const row of document.querySelectorAll('#activities li:nth-child(n+3)')) {
                row.hidden = !expand;
            }
            toggle.setAttribute('aria-expanded', String(expand));
            toggle.textContent = expand ? 'Lihat Ringkas' : 'Lihat Semua';
        });
    </script>
</body>
</html>
