<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

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
<body>

    @yield('content')

    @stack('scripts')
</body>
</html>