<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 bg-background/50 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="font-display font-black text-2xl tracking-tighter text-white" aria-label="The Dream Lab - Inicio">
                    DREAM<span class="text-primary drop-shadow-[0_0_10px_rgba(59,130,246,0.5)]">SOFT</span>
                </a>
            </div>

            <div class="hidden md:block">
                <nav class="ml-10 flex items-baseline space-x-8" aria-label="Navegación principal">
                    <a href="/#showcase"
                        class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proyectos</a>
                    <a href="/#process"
                        class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Proceso</a>
                    <a href="/#waitlist"
                        class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Waitlist</a>
                    @auth
                        <a href="{{ url('/admin') }}"
                            class="text-gray-300 hover:text-white hover:bg-white/5 transition-all px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    @else
                        <a href="{{ url('/admin') }}"
                            class="bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 hover:border-primary/50 px-4 py-2 rounded-full text-sm font-bold transition-all shadow-[0_0_15px_-3px_rgba(59,130,246,0.3)] hover:shadow-[0_0_20px_-3px_rgba(59,130,246,0.5)]">Acceso
                            Clientes</a>
                    @endauth
                </nav>
            </div>

            <button @click="open = !open"
                :aria-expanded="open"
                aria-controls="mobile-menu"
                aria-label="Abrir menú"
                class="md:hidden p-2 rounded-md text-gray-300 hover:text-white hover:bg-white/5 transition-all">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        id="mobile-menu"
        class="md:hidden border-t border-white/5 bg-background/80 backdrop-blur-xl"
        style="display: none;">
        <nav aria-label="Navegación móvil" class="px-4 pt-2 pb-4 space-y-1">
            <a href="/#showcase" @click="open = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5">Proyectos</a>
            <a href="/#process" @click="open = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5">Proceso</a>
            <a href="/#waitlist" @click="open = false" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-white/5">Waitlist</a>
            <a href="{{ url('/admin') }}" @click="open = false" class="block px-3 py-2 rounded-full text-center text-base font-bold text-primary border border-primary/20 bg-primary/10 mt-2">Acceso Clientes</a>
        </nav>
    </div>
</nav>
