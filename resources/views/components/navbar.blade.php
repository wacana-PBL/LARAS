@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/laras-navbar.css') }}?v={{ filemtime(public_path('css/laras-navbar.css')) }}">
    @endpush
@endonce

<header class="dash-topbar{{ $variant !== 'default' ? ' dash-topbar--' . $variant : '' }}">
    <a class="dash-brand" href="{{ route('dashboard') }}">LARAS</a>

    <nav class="dash-nav" aria-label="Navigasi utama">
        @foreach ($items as $item)
            <a class="dash-nav__link{{ $item['active'] ? ' is-active' : '' }}"
               href="{{ $item['href'] }}"
               @if ($item['active']) aria-current="page" @endif>{{ $item['label'] }}</a>
        @endforeach
    </nav>

    <div class="dash-tools">
        <button class="dash-tools__logout" type="button" aria-label="Keluar">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M9.4 3.9H6.2a1.9 1.9 0 0 0-1.9 1.9v12.4a1.9 1.9 0 0 0 1.9 1.9h3.2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <path d="M11.4 12h8.4M16.2 8.4 19.8 12l-3.6 3.6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <span class="dash-tools__avatar" aria-hidden="true"></span>
    </div>
</header>
