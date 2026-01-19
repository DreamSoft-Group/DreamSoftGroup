<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'The Dream Lab' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-white font-sans antialiased selection:bg-primary selection:text-white layout-zoom-75">

    <x-navbar />

    <main class="pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/5 py-16 bg-background relative z-10">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <span class="font-display font-black text-2xl tracking-tighter text-white opacity-50 mb-4 block">
                DREAM<span class="text-primary">SOFT</span>
            </span>
            <p class="text-text-secondary text-sm">&copy; {{ date('Y') }} DreamSoft Group. Todos los derechos
                reservados.</p>
        </div>
    </footer>

</body>

</html>