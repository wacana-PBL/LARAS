<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAS - Portal Dosen</title>

    <!-- Google Fonts: Krona One & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFFFF;
        }
    </style>
</head>

<body class="text-gray-900 antialiased">

    {{-- Navbar Khusus Dosen --}}
    @include('layouts.partials.navbar-dosen')

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        @yield('content')
    </main>

</body>

</html>