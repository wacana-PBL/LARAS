@php
    $metrics ??= [
        ['label' => 'Total Anak Didik (Aktif)', 'value' => 12, 'note' => 'Perlu tindakan admin →', 'icon' => 'inbox'],
        ['label' => 'Perlu ACC Bimbingan', 'value' => 12, 'note' => 'Data Sudah Diapprove →', 'icon' => 'schedule'],
        ['label' => 'Disetujui Lanjut Sidang', 'value' => 12, 'note' => 'Data Sudah Diapprove →', 'icon' => null],
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

<style>
    body {
        margin: 0;
        background-color: #FFFFFF;
        min-height: 100vh;
    }

    main#dashboard {
        width: 100% !important;
        max-width: 1152px !important;
        /* Setara max-w-6xl halaman Bimbingan/Pengajuan/Jadwal */
        box-sizing: border-box !important;
        padding: 0 32px 48px 32px !important;
        margin: 0 auto !important;
    }

    /* Perkecil proporsi elemen dashboard di zoom 100% agar pas seperti zoom 80% */
    main#dashboard .welcome {
        padding: 20px 28px !important;
        margin-bottom: 24px !important;
    }

    main#dashboard .welcome h1 {
        font-size: 20px !important;
        margin-bottom: 4px !important;
    }

    main#dashboard .welcome p {
        font-size: 14px !important;
    }

    main#dashboard .overview {
        gap: 20px !important;
    }

    main#dashboard .metric {
        padding: 20px 24px !important;
    }

    main#dashboard .metric h2 {
        font-size: 15px !important;
    }

    main#dashboard .metric .count {
        font-size: 28px !important;
        margin: 10px 0 6px 0 !important;
    }

    main#dashboard .metric .note {
        font-size: 12px !important;
    }

    main#dashboard .panel {
        padding: 22px 24px !important;
    }

    main#dashboard .panel h2 {
        font-size: 18px !important;
    }

    main#dashboard .activities li {
        padding: 16px 20px !important;
    }

    main#dashboard .activities li strong {
        font-size: 15px !important;
    }

    main#dashboard .activities li span {
        font-size: 13px !important;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Dosen | LARAS</title>
    <link rel="stylesheet" href="{{ asset('css/laras-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/laras-dosen-dashboard.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <a class="skip" href="#dashboard">Langsung ke dashboard</a>

    <main id="dashboard" style="padding-top: 0;">
        <!-- Topbar / Navbar Dosen -->
        <header class="dash-topbar"
            style="display:flex; align-items:center; justify-content:space-between; width:100%; height:96px; margin-bottom:12px; font-family:'Poppins', sans-serif;">
            <a class="dash-brand" href="{{ route('dosen.dashboard') }}"
                style="font-family:'Krona One', sans-serif; text-decoration:none; color:#000000; font-size:24px; letter-spacing:1.5px;">
                LARAS
            </a>

            <nav class="dash-nav" aria-label="Navigasi dosen" style="display:flex; align-items:center; gap:36px;">
                <a class="dash-nav__link {{ request()->routeIs('dosen.dashboard') ? 'is-active' : '' }}"
                    href="{{ route('dosen.dashboard') }}"
                    style="text-decoration:none; font-size:15px; font-weight:{{ request()->routeIs('dosen.dashboard') ? '600' : '500' }}; color:{{ request()->routeIs('dosen.dashboard') ? '#EE7816' : '#1F2937' }};">
                    Dashboard
                </a>
                <a class="dash-nav__link {{ request()->routeIs('dosen.bimbingan') ? 'is-active' : '' }}"
                    href="{{ route('dosen.bimbingan') }}"
                    style="text-decoration:none; font-size:15px; font-weight:{{ request()->routeIs('dosen.bimbingan') ? '600' : '500' }}; color:{{ request()->routeIs('dosen.bimbingan') ? '#EE7816' : '#1F2937' }};">
                    Bimbingan
                </a>
                <a class="dash-nav__link {{ request()->routeIs('dosen.pengajuan') ? 'is-active' : '' }}"
                    href="{{ route('dosen.pengajuan') }}"
                    style="text-decoration:none; font-size:15px; font-weight:{{ request()->routeIs('dosen.pengajuan') ? '600' : '500' }}; color:{{ request()->routeIs('dosen.pengajuan') ? '#EE7816' : '#1F2937' }};">
                    Pengajuan
                </a>
                <a class="dash-nav__link {{ request()->routeIs('dosen.jadwal') ? 'is-active' : '' }}"
                    href="{{ route('dosen.jadwal') }}"
                    style="text-decoration:none; font-size:15px; font-weight:{{ request()->routeIs('dosen.jadwal') ? '600' : '500' }}; color:{{ request()->routeIs('dosen.jadwal') ? '#EE7816' : '#1F2937' }};">
                    Jadwal
                </a>
                <a class="dash-nav__link {{ request()->routeIs('dosen.detail-penilaian') ? 'is-active' : '' }}"
                    href="{{ route('dosen.detail-penilaian') }}"
                    style="text-decoration:none; font-size:15px; font-weight:{{ request()->routeIs('dosen.detail-penilaian') ? '600' : '500' }}; color:{{ request()->routeIs('dosen.detail-penilaian') ? '#EE7816' : '#1F2937' }};">
                    Penilaian
                </a>
            </nav>

            <div class="dash-tools"
                style="display:flex; align-items:center; gap:14px; background:#D8D6C8; padding:8px 10px 8px 18px; border-radius:999px;">
                <form method="POST" action="{{ route('logout') }}" style="margin:0; display:flex;">
                    @csrf
                    <button type="submit" class="dash-tools__logout" aria-label="Keluar" title="Keluar"
                        style="background:#D35D53; border:none; border-radius:10px; width:40px; height:40px; display:flex; align-items:center; justify-content:center; cursor:pointer;">
                        <img src="{{ asset('images/dosen/dashboard/logout.svg') }}" alt="Keluar" width="22" height="22">
                    </button>
                </form>
                <a href="{{ route('dosen.profil') }}" title="Profil Dosen"
                    style="display:flex; border-radius:999px; overflow:hidden; width:50px; height:50px;">
                    <img class="dash-tools__avatar" src="{{ asset('images/dosen/dashboard/avatar.png') }}"
                        alt="Avatar dosen" style="width:50px; height:50px; object-fit:cover; border-radius:999px;">
                </a>
            </div>
        </header>

        <!-- Welcome Banner -->
        <header class="welcome">
            <h1>Dashboard Dosen</h1>
            <p>Sistem Manajemen Sidang &amp; Bimbingan Mahasiswa</p>
        </header>

        <!-- Overview Metrics & Panels -->
        <div class="overview">
            @foreach ($metrics as $metric)
                <section class="metric">
                    <h2>{{ $metric['label'] }}
                        @if ($metric['icon'])
                            <img src="{{ asset('images/dosen/dashboard/' . $metric['icon'] . '.png') }}" width="36" height="36"
                                alt="">
                        @else
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#111827" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" style="float:right;">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 16 16 12 12 8"></polyline>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                        @endif
                    </h2>
                    <p class="count">{{ $metric['value'] }}</p>
                    <p class="note">{{ $metric['note'] }}</p>
                </section>
            @endforeach

            <!-- Pantauan Mahasiswa Bimbingan -->
            <section class="monitor panel" id="pantauan">
                <div class="section-head">
                    <h2>Pantauan Mahasiswa Bimbingan</h2>
                    <a href="{{ route('dosen.pantauan-mahasiswa') }}"
                        style="color:#EE7816; font-weight:600; font-size:14px; text-decoration:none;">
                        Lihat Semua &rarr;
                    </a>
                </div>
                @if ($activities)
                    <ul class="activities" id="activities">
                        @foreach ($activities as $activity)
                            <li class="{{ isset($activity['project']) ? 'project' : 'milestone' }}" @if ($loop->index >= 2)
                            hidden @endif>
                                <strong>{{ $activity['name'] }}</strong>
                                <span>{{ $activity['project'] ?? $activity['milestone'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="empty">Belum ada aktivitas bimbingan.</p>
                @endif
            </section>

            <!-- Tindakan Diperlukan / Penilaian -->
            <section class="actions panel">
                @if ($pendingGrades)
                    <h2>Tindakan Diperlukan!</h2>
                    <p class="alert">Ada {{ count($pendingGrades) }} mahasiswa yang belum<br>Anda input nilainya.</p>
                    @foreach ($pendingGrades as $exam)
                        <div class="exam">
                            <h3>{{ $exam['name'] }}</h3>
                            <p>{{ $exam['exam'] }}</p>
                            <a href="{{ route('dosen.detail-penilaian') }}" class="grade"
                                style="display:inline-block; text-decoration:none; text-align:center;">
                                Form Input Nilai
                            </a>
                        </div>
                    @endforeach
                @else
                    <h2>Penilaian</h2>
                    <p class="empty">Tidak ada nilai yang perlu diinput.</p>
                @endif
            </section>
        </div>
    </main>
</body>

</html>