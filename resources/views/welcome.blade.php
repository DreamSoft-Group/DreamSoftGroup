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

<body class="bg-background text-white font-sans antialiased selection:bg-primary selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-background/50 backdrop-blur-xl border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <span class="font-display font-black text-2xl tracking-tighter text-white">
                        DREAM<span class="text-primary drop-shadow-[0_0_10px_rgba(59,130,246,0.5)]">SOFT</span>
                    </span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#showcase"
                            class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proyectos</a>
                        <a href="#process"
                            class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proceso</a>
                        <a href="/admin"
                            class="bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 hover:border-primary/50 px-4 py-2 rounded-full text-sm font-bold transition-all shadow-[0_0_15px_-3px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_-3px_rgba(59,130,246,0.5)]">Acceso
                            Clientes</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Gradients -->
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900 via-background to-background">
        </div>

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-primary/20 rounded-full blur-[120px] opacity-40 mix-blend-screen animate-pulse">
        </div>
        <div
            class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-accent/10 rounded-full blur-[120px] opacity-30 mix-blend-screen">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <span
                class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/5 border border-white/10 text-primary text-sm font-bold tracking-wide mb-8 animate-fade-in-up shadow-lg">
                <span class="w-2 h-2 rounded-full bg-accent animate-ping"></span>
                THE DREAM LAB
            </span>
            <h1
                class="text-5xl md:text-7xl lg:text-8xl font-display font-black tracking-tight leading-tight mb-8 drop-shadow-2xl">
                Usted lo sueña y <br />
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-blue-400 to-accent animate-gradient">nosotros
                    lo desarrollamos.</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-xl md:text-2xl text-text-secondary font-light leading-relaxed">
                Transformamos ideas complejas en software de alto impacto. <br class="hidden md:block" /> Desde el
                concepto hasta el código.
            </p>
            <div class="mt-12 flex flex-col sm:flex-row justify-center gap-4">
                <a href="#showcase"
                    class="px-8 py-4 bg-primary hover:bg-blue-600 rounded-full font-bold text-lg transition-all shadow-[0_0_30px_-5px_rgba(59,130,246,0.5)] hover:shadow-[0_0_40px_-5px_rgba(59,130,246,0.7)] hover:-translate-y-1">
                    Explorar el Lab
                </a>
                <a href="#"
                    class="px-8 py-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-full font-bold text-lg transition-all backdrop-blur-sm hover:-translate-y-1">
                    Unirse a Waitlist
                </a>
            </div>
        </div>
    </div>

    <!-- Showcase Grid -->
    <div id="showcase" class="py-32 bg-background relative overflow-hidden">
        <!-- Decorational Grid -->
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2
                    class="text-3xl md:text-5xl font-display font-black mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-500">
                    Portafolio de Productos</h2>
                <p class="text-text-secondary text-lg max-w-2xl mx-auto">Explora nuestros últimos experimentos,
                    productos SaaS y herramientas open source.</p>
            </div>

            <!-- Dynamic Grid (Livewire Component Placeholder) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Static Example Card 1 -->
                <div
                    class="group relative bg-surface/50 border border-white/5 rounded-3xl overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-[0_0_30px_-10px_rgba(59,130,246,0.3)] hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="aspect-video bg-slate-900 relative overflow-hidden">
                        <!-- Image placeholder -->
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="px-3 py-1 bg-accent/20 border border-accent/50 text-accent rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md">Beta</span>
                        </div>
                    </div>
                    <div class="p-8 relative">
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-primary transition-colors">Project Alpha
                        </h3>
                        <p class="text-text-secondary text-sm mb-6 line-clamp-2 leading-relaxed">Una descripción corta
                            del proyecto que explica su valor principal y tecnología.</p>
                        <a href="#"
                            class="inline-flex items-center text-sm font-bold text-white group-hover:text-primary transition-colors">
                            Ver Detalles <span class="ml-2 group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </a>
                    </div>
                </div>
                <!-- Static Example Card 2 -->
                <div
                    class="group relative bg-surface/50 border border-white/5 rounded-3xl overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-[0_0_30px_-10px_rgba(59,130,246,0.3)] hover:-translate-y-2">
                    <div
                        class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="aspect-video bg-slate-900 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="px-3 py-1 bg-primary/20 border border-primary/50 text-primary rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md">Concept</span>
                        </div>
                    </div>
                    <div class="p-8 relative">
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-primary transition-colors">SaaS Starter kit
                        </h3>
                        <p class="text-text-secondary text-sm mb-6 line-clamp-2 leading-relaxed">Boilerplate completo
                            para SaaS con facturación, equipos y API.</p>
                        <a href="#"
                            class="inline-flex items-center text-sm font-bold text-white group-hover:text-primary transition-colors">
                            Ver Detalles <span class="ml-2 group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-20 text-center">
                @livewire('project-list')
            </div>
        </div>
    </div>

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