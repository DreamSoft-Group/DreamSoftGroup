<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página no encontrada | The Dream Lab</title>
    <meta name="theme-color" content="#020617">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-background text-white font-sans antialiased">
    <section class="min-h-screen flex items-center justify-center px-4 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-primary/5 via-background to-background"></div>

        <div class="relative max-w-xl mx-auto text-center z-10">
            <p class="text-9xl font-display font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-accent mb-4">404</p>
            <h1 class="text-3xl md:text-4xl font-display font-black text-white mb-4">
                Página no encontrada
            </h1>
            <p class="text-text-secondary text-lg mb-8">
                La página que buscas no existe, fue movida o el slug es incorrecto.
            </p>
            <a href="{{ route('home') }}"
                class="inline-flex items-center px-8 py-4 bg-primary hover:bg-blue-600 rounded-full font-bold transition-all shadow-[0_0_30px_-5px_rgba(59,130,246,0.5)] hover:shadow-[0_0_40px_-5px_rgba(59,130,246,0.7)]">
                &larr; Volver al inicio
            </a>
        </div>
    </section>
</body>
</html>
