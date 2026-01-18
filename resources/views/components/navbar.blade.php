<nav class="fixed top-0 left-0 w-full z-50 bg-background/50 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
                <a href="/" class="font-display font-black text-2xl tracking-tighter text-white">
                    DREAM<span class="text-primary drop-shadow-[0_0_10px_rgba(59,130,246,0.5)]">SOFT</span>
                </a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="/#showcase"
                        class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proyectos</a>
                    <a href="/#process"
                        class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proceso</a>
                    @auth
                        <a href="{{ url('/admin') }}"
                            class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    @else
                        <a href="{{ url('/admin') }}"
                            class="bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 hover:border-primary/50 px-4 py-2 rounded-full text-sm font-bold transition-all shadow-[0_0_15px_-3px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_-3px_rgba(59,130,246,0.5)]">Acceso
                            Clientes</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>