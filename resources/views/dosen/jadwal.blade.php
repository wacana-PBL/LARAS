<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Sidang Dosen | LARAS</title>
    <link rel="stylesheet" href="{{ asset('css/laras-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/laras-dosen-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/laras-dosen-jadwal.css') }}">
</head>
<body>
    <a class="skip" href="#jadwal">Langsung ke jadwal</a>
    @include('dosen.navbar', ['active' => 'Jadwal Sidang', 'contentId' => 'jadwal'])

    <main class="schedule" id="jadwal" aria-label="Jadwal Sidang Dosen">
        <section aria-labelledby="empty-title">
            <div class="schedule-heading"><h1 id="empty-title">Jadwal Belum Tersedia</h1></div>
            <div class="schedule-empty">
                <p class="empty-title">Jadwal Belum Tersedia</p>
                <p>Admin jurusan sedang melakukan plotting jadwal dan dosen penguji. Silakan cek kembali halaman ini secara berkala.</p>
                <button type="button" onclick="window.location.reload()">Refresh Halaman</button>
            </div>
        </section>
        <section aria-labelledby="found-title">
            <div class="schedule-heading found"><h2 id="found-title">Jadwal Ditemukan</h2></div>
            <article class="agenda" aria-labelledby="agenda-title">
                <header>
                    <h3 id="agenda-title">Agenda Seminar Proposal</h3>
                    <span class="confirmed">Terkonfirmasi</span>
                </header>
                <div class="agenda-body">
                    <dl class="meeting">
                        <div><dt>Tanggal</dt><dd><time datetime="2026-10-28">Rabu, 28 Okt 2026</time></dd></div>
                        <div><dt>Waktu</dt><dd><mark>09:00 - 10.30 WIB</mark></dd></div>
                        <div><dt>Lokasi Sidang</dt><dd>Ruang Gedung TIK 2</dd></div>
                    </dl>
                    <div class="research">
                        <dl class="research-title">
                            <dt>Judul Penelitian</dt>
                            <dd>Implementasi Sistem Manajemen Sidang Skripsi (LARAS) Berbasis Web</dd>
                        </dl>
                        <dl class="examiners">
                            <div><dt>Penguji 1</dt><dd>Dr. Hendra Saputra, M.Sc.</dd></div>
                            <div><dt>Penguji 2</dt><dd>Dr. Anita Wijaya, M.Kom.</dd></div>
                            <div class="advisor"><dt>Pembimbing</dt><dd>Bambang Warsuta, S.Kom., M.T.I.</dd></div>
                        </dl>
                    </div>
                </div>
            </article>
        </section>
    </main>
</body>
</html>
