<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'The Dream Lab | DreamSoft Group' }}</title>
    <meta name="description" content="{{ $description ?? 'Portafolio de productos y bitácora de desarrollo de DreamSoft Group.' }}">
    <meta name="theme-color" content="#020617">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'The Dream Lab' }}">
    <meta property="og:description" content="{{ $description ?? 'Portafolio de productos y bitácora de desarrollo.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="es_ES">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'The Dream Lab' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Portafolio de productos y bitácora de desarrollo.' }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-white font-sans antialiased selection:bg-primary selection:text-white">

    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:bg-primary focus:text-white focus:px-4 focus:py-2 focus:rounded">
        Saltar al contenido
    </a>

    <x-navbar />

    <main id="main-content" class="pt-20">
        {{ $slot }}
    </main>

    <x-footer />

</body>

</html>