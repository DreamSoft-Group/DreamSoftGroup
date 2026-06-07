<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Dream Lab | DreamSoft Group</title>
    <meta name="description" content="Plataforma de Building in Public y portafolio de productos SaaS, open source y experimentos de DreamSoft Group.">
    <meta name="theme-color" content="#020617">

    <meta property="og:type" content="website">
    <meta property="og:title" content="The Dream Lab | DreamSoft Group">
    <meta property="og:description" content="Transformamos ideas complejas en software de alto impacto. Desde el concepto hasta el código.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:locale" content="es_ES">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The Dream Lab | DreamSoft Group">
    <meta name="twitter:description" content="Transformamos ideas complejas en software de alto impacto.">

    <link rel="canonical" href="{{ url('/') }}">

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

    <main id="main-content">

        <section aria-labelledby="hero-title" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-24 pb-12">
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
                <h1 id="hero-title"
                    class="text-4xl md:text-7xl lg:text-8xl font-display font-black tracking-tight leading-tight mb-8 drop-shadow-2xl">
                    Usted lo sueña y <br />
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-blue-400 to-accent animate-gradient">nosotros
                        lo desarrollamos.</span>
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-lg md:text-2xl text-text-secondary font-light leading-relaxed">
                    Transformamos ideas complejas en software de alto impacto. <br class="hidden md:block" /> Desde el
                    concepto hasta el código.
                </p>
                <div class="mt-12 flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#showcase"
                        class="px-8 py-4 bg-primary hover:bg-blue-600 rounded-full font-bold text-lg transition-all shadow-[0_0_30px_-5px_rgba(59,130,246,0.5)] hover:shadow-[0_0_40px_-5px_rgba(59,130,246,0.7)] hover:-translate-y-1">
                        Explorar el Lab
                    </a>
                    <a href="#waitlist"
                        class="px-8 py-4 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-white/20 rounded-full font-bold text-lg transition-all backdrop-blur-sm hover:-translate-y-1">
                        Unirse a Waitlist
                    </a>
                </div>
            </div>
        </section>

        <section id="showcase" aria-labelledby="showcase-title"
            class="py-16 md:py-24 bg-background relative overflow-hidden">
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-20">
                    <h2 id="showcase-title"
                        class="text-2xl md:text-5xl font-display font-black mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-500">
                        Portafolio de Productos
                    </h2>
                    <p class="text-text-secondary text-lg max-w-2xl mx-auto">Explora nuestros últimos experimentos,
                        productos SaaS y herramientas open source.</p>
                </div>

                <div class="mt-12">
                    @livewire('project-list')
                </div>
            </div>
        </section>

        <section id="process" aria-labelledby="process-title" class="py-16 md:py-24 bg-background relative overflow-hidden">
            <div
                class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[120px] opacity-20 pointer-events-none">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-accent/5 rounded-full blur-[120px] opacity-20 pointer-events-none">
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 md:mb-24 relative z-10">
                    <span
                        class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-primary text-xs font-bold tracking-widest uppercase mb-4">Workflow</span>
                    <h2 id="process-title"
                        class="text-3xl md:text-5xl font-display font-black mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-500">
                        Nuestro Proceso
                    </h2>
                    <p class="text-text-secondary text-lg max-w-2xl mx-auto">
                        Una metodología refinada para transformar ideas abstractas en productos digitales excepcionales.
                    </p>
                </div>

                <div class="relative">
                    <div class="hidden md:block absolute inset-0 z-0 pointer-events-none">
                        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                            <defs>
                                <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#8B5CF6;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <path d="M 12.5,50 Q 25,20 37.5,50 Q 50,80 62.5,50 Q 75,20 87.5,50" fill="none"
                                stroke="url(#lineGradient)" stroke-width="2" vector-effect="non-scaling-stroke"
                                stroke-dasharray="4 4" class="animate-dash-flow opacity-50" />
                        </svg>
                    </div>

                    <ol class="grid grid-cols-1 md:grid-cols-4 gap-6 relative z-10 list-none p-0">
                        @foreach ([
                            ['01', 'Descubrimiento', 'Analizamos requerimientos, definimos objetivos claros y trazamos la ruta crítica del proyecto.'],
                            ['02', 'Diseño', 'Creamos experiencias visuales intuitivas, sistemas de diseño escalables y prototipos interactivos.'],
                            ['03', 'Desarrollo', 'Codificación ágil con estándares modernos, arquitectura robusta y testing continuo.'],
                            ['04', 'Lanzamiento', 'Despliegue automatizado, optimización de rendimiento y monitoreo en tiempo real.'],
                        ] as [$number, $title, $description])
                            <li
                                class="group relative bg-gradient-to-b from-surface/50 to-background border border-white/5 rounded-3xl p-8 hover:border-primary/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_0_40px_-5px_rgba(59,130,246,0.3)] backdrop-blur-sm">
                                <div
                                    class="absolute inset-0 bg-gradient-to-b from-primary/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl">
                                </div>
                                <div class="relative">
                                    <div
                                        class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center font-black text-2xl text-white mb-6 group-hover:bg-primary group-hover:scale-110 transition-all duration-300 shadow-lg"
                                        aria-hidden="true">
                                        {{ $number }}
                                    </div>
                                    <h3 class="text-xl font-bold text-white mb-4">{{ $title }}</h3>
                                    <p
                                        class="text-text-secondary text-sm leading-relaxed group-hover:text-gray-300 transition-colors">
                                        {{ $description }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

        <section id="waitlist" aria-labelledby="waitlist-title" class="py-16 md:py-24 bg-background relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-primary/5 via-background to-background"></div>

            <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-accent text-xs font-bold tracking-widest uppercase mb-4">Early Access</span>
                <h2 id="waitlist-title"
                    class="text-3xl md:text-5xl font-display font-black mb-6 bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-500">
                    Sé el primero en probarlo
                </h2>
                <p class="text-text-secondary text-lg max-w-xl mx-auto mb-10">
                    Apúntate a la lista de espera y obtén acceso anticipado a nuestros productos en beta.
                </p>

                <div class="max-w-xl mx-auto">
                    @livewire('waitlist-form', ['source' => 'home_hero'])
                </div>
            </div>
        </section>

    </main>

    <x-footer />

</body>

</html>