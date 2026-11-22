<header class="dash-topbar">
    <a class="dash-brand" href="{{ $dashboardUrl ?? '#'.$contentId }}">LARAS</a>
    <nav class="dash-nav" aria-label="Navigasi dosen">
        @foreach (['Dashboard' => $dashboardUrl ?? null, 'Bimbingan' => null, 'Jadwal Sidang' => $jadwalUrl ?? null, 'Penilaian' => null] as $label => $href)
            @if ($label === $active)
                <a class="dash-nav__link is-active" aria-current="page" href="#{{ $contentId }}">{{ $label }}</a>
            @elseif ($href)
                <a class="dash-nav__link" href="{{ $href }}">{{ $label }}</a>
            @else
                <button type="button" class="dash-nav__link" disabled title="Modul belum tersedia">{{ $label }}</button>
            @endif
        @endforeach
    </nav>
    <div class="dash-tools">
        <button type="button" class="dash-tools__logout" disabled aria-label="Keluar" title="Sesi login belum tersedia">
            <img src="{{ asset('images/dosen/dashboard/logout.svg') }}" alt="" width="30" height="30">
        </button>
        <img class="dash-tools__avatar" src="{{ asset('images/dosen/dashboard/avatar.png') }}" alt="Avatar dosen" width="71" height="71">
    </div>
</header>
