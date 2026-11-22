<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'LARAS'))</title>

    <script>
        // Terapkan preferensi warna sebelum halaman digambar agar tidak berkedip.
        try {
            const accent = localStorage.getItem('laras:accent');
            if (accent && accent !== 'oren') {
                document.documentElement.dataset.accent = accent;
            }
        } catch (error) {
            // localStorage bisa diblokir; biarkan warna bawaan dipakai.
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ Vite::fonts() }}
</head>
<body class="font-sans antialiased">
    @isset($slot)
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            {{ $slot }}
        </main>
    @else
        @yield('content')
    @endisset

    @stack('scripts')
</body>
</html>
