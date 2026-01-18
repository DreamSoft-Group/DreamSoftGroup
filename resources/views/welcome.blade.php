<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Dream Lab | DreamSoft</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-white font-sans antialiased">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-background/80 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <span class="font-display font-black text-2xl tracking-tighter text-white">
                        DREAM<span class="text-primary">SOFT</span>
                    </span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#showcase"
                            class="hover:text-primary transition-colors px-3 py-2 rounded-md text-sm font-medium">Showcase</a>
                        <a href="#process"
                            class="hover:text-primary transition-colors px-3 py-2 rounded-md text-sm font-medium">Process</a>
                        <a href="/admin"
                            class="bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full text-sm font-bold transition-all">Client
                            Access</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Gradients -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/20 rounded-full blur-[128px]"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-accent/20 rounded-full blur-[128px]"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <span
                class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-primary text-sm font-bold tracking-wide mb-6 animate-fade-in-up">
                THE DREAM LAB
            </span>
            <h1 class="text-5xl md:text-7xl font-display font-black tracking-tight leading-tight mb-8">
                Usted lo sueña y <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">nosotros lo
                    desarrollamos.</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-text-secondary">
                Transformamos ideas complejas en software de alto impacto. Desde el concepto hasta el código.
            </p>
            <div class="mt-10 flex justify-center gap-4">
                <a href="#showcase"
                    class="px-8 py-4 bg-primary hover:bg-primary/90 rounded-full font-bold text-lg transition-all shadow-lg shadow-primary/25 hover:shadow-primary/40">
                    Explorar el Lab
                </a>
                <a href="#"
                    class="px-8 py-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-full font-bold text-lg transition-all">
                    Unirse a Waitlist
                </a>
            </div>
        </div>
    </div>

    <!-- Showcase Grid -->
    <div id="showcase" class="py-24 bg-background relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-display font-black mb-4">Product Showcase</h2>
                <p class="text-text-secondary max-w-2xl mx-auto">Explora nuestros últimos experimentos, productos SaaS y
                    herramientas open source.</p>
            </div>

            <!-- Dynamic Grid (Livewire Component Placeholder) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Static Example Card 1 -->
                <div
                    class="group relative bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-video bg-gray-800 relative overflow-hidden">
                        <!-- Image placeholder -->
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="px-2 py-1 bg-accent/90 rounded text-xs font-bold text-white uppercase tracking-wider">Beta</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">Project Alpha
                        </h3>
                        <p class="text-text-secondary text-sm mb-4 line-clamp-2">Una descripción corta del proyecto que
                            explica su valor principal.</p>
                        <a href="#" class="inline-flex items-center text-sm font-bold text-white hover:text-accent">
                            Ver Detalles <span class="ml-2">&rarr;</span>
                        </a>
                    </div>
                </div>
                <!-- Static Example Card 2 -->
                <div
                    class="group relative bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all duration-300 hover:-translate-y-2">
                    <div class="aspect-video bg-gray-800 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="px-2 py-1 bg-primary/90 rounded text-xs font-bold text-white uppercase tracking-wider">Concept</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">SaaS Starter kit
                        </h3>
                        <p class="text-text-secondary text-sm mb-4 line-clamp-2">Boilerplate completo para SaaS con
                            facturación, equipos y API.</p>
                        <a href="#" class="inline-flex items-center text-sm font-bold text-white hover:text-accent">
                            Ver Detalles <span class="ml-2">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                @livewire('project-list')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t border-white/10 py-12 bg-black/20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-text-secondary">&copy; {{ date('Y') }} DreamSoft Group. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>