<?php

use Livewire\Component;
use Livewire\Volt\Component as VoltComponent;
use App\Models\Project;
use Livewire\Attributes\Layout;

new #[Layout('layouts.public')] class extends Component {
    public Project $project;

    public function mount($slug)
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
    }

    public function with()
    {
        return [
            'devLogs' => $this->project->devLogs()->orderBy('published_at', 'desc')->get(),
            'title' => $this->project->title . ' | The Dream Lab',
        ];
    }
};
?>

<div class="py-24 bg-background min-h-screen text-white relative overflow-hidden">
    <!-- Background Gradients -->
    <div
        class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px] opacity-30 pointer-events-none">
    </div>
    <div
        class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[100px] opacity-20 pointer-events-none">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Header -->
        <div class="mb-16">
            <a href="/"
                class="text-text-secondary hover:text-white px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 transition-all inline-flex items-center mb-8 font-medium text-sm border border-white/5">
                &larr; <span class="ml-2">Volver al Lab</span>
            </a>
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-5xl md:text-6xl font-display font-black tracking-tight leading-tight">
                        {{ $project->title }}
                    </h1>
                </div>
                <div>
                    @php
                        $colors = [
                            'concept' => 'bg-primary/20 border-primary/50 text-primary',
                            'development' => 'bg-yellow-500/20 border-yellow-500/50 text-yellow-500',
                            'beta' => 'bg-accent/20 border-accent/50 text-accent',
                            'live' => 'bg-green-500/20 border-green-500/50 text-green-500',
                        ];
                        $statusClass = $colors[$project->status] ?? 'bg-primary/20 border-primary/50 text-primary';
                    @endphp
                    <span
                        class="px-4 py-2 {{ $statusClass }} border rounded-full text-sm font-bold uppercase tracking-wider backdrop-blur-md">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Cover Image -->
                @if($project->cover_image)
                    <div class="rounded-3xl overflow-hidden border border-white/10 shadow-2xl relative group">
                        <div class="absolute inset-0 bg-gradient-to-t from-background/50 to-transparent z-10"></div>
                        <img src="{{ Storage::url($project->cover_image) }}"
                            class="w-full h-auto transform group-hover:scale-105 transition-transform duration-700"
                            alt="Cover">
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-lg prose-invert max-w-none">
                    <h2 class="text-3xl font-display font-bold mb-6 text-white border-l-4 border-primary pl-4">Sobre el
                        proyecto</h2>
                    <div class="text-text-secondary leading-relaxed space-y-4">
                        {!! $project->html_description ?? nl2br(e($project->short_description)) !!}
                    </div>
                </div>

                <!-- DevLog / Roadmap -->
                <div>
                    <h2 class="text-3xl font-display font-bold mb-8 text-white flex items-center">
                        <span class="mr-4">DevLog & Roadmap</span>
                        <div class="h-px flex-1 bg-gradient-to-r from-white/10 to-transparent"></div>
                    </h2>

                    <div class="space-y-8 pl-4 border-l-2 border-white/5 relative">
                        @forelse($devLogs as $log)
                            <div class="relative pl-10 group">
                                <div
                                    class="absolute -left-[9px] top-2 w-4 h-4 rounded-full bg-surface border-4 border-primary group-hover:scale-125 transition-transform duration-300 shadow-[0_0_10px_rgba(59,130,246,0.5)]">
                                </div>
                                <span
                                    class="text-xs text-primary font-bold uppercase tracking-wider mb-2 block">{{ $log->published_at?->format('F j, Y') ?? 'Draft' }}</span>

                                <div
                                    class="bg-surface/50 border border-white/5 rounded-2xl p-6 hover:border-primary/30 transition-colors">
                                    <h3 class="text-xl font-bold text-white mb-3">{{ $log->title }}</h3>
                                    <div class="prose prose-sm prose-invert text-text-secondary">
                                        {!! $log->content !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-text-secondary italic pl-6">Aún no hay actualizaciones publicadas.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Meta Card -->
                <div class="p-8 bg-surface/50 border border-white/5 rounded-3xl backdrop-blur-xl">
                    <h3 class="text-xl font-bold mb-6 font-display">Detalles</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex justify-between items-center py-2 border-b border-white/5 last:border-0">
                            <span class="text-text-secondary">Acceso</span>
                            <span
                                class="font-bold text-white capitalize px-3 py-1 bg-white/5 rounded-full">{{ $project->access_level }}</span>
                        </li>
                        <li class="flex justify-between items-center py-2 border-b border-white/5 last:border-0">
                            <span class="text-text-secondary">Actualizado</span>
                            <span class="font-bold text-white">{{ $project->updated_at->diffForHumans() }}</span>
                        </li>
                    </ul>

                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank"
                            class="mt-8 block w-full py-4 bg-primary hover:bg-blue-600 shadow-[0_0_20px_-5px_rgba(59,130,246,0.5)] text-center rounded-xl font-bold transition-all transform hover:-translate-y-1">
                            Ver Demo en Vivo
                        </a>
                    @endif
                </div>

                <!-- Feedback Form -->
                <div
                    class="p-8 bg-gradient-to-br from-surface/50 to-accent/5 border border-white/5 rounded-3xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-accent/20 rounded-full blur-[40px] -mr-10 -mt-10">
                    </div>

                    <h3 class="text-xl font-bold text-white mb-3 relative z-10">Feedback y Beta</h3>
                    <p class="text-sm text-text-secondary mb-6 relative z-10 leading-relaxed">¿Te interesa probar
                        versiones previas de este proyecto?</p>
                    <button
                        class="w-full py-3 bg-white/5 hover:bg-white/10 border border-white/10 hover:border-accent/50 rounded-xl text-sm font-bold transition-all relative z-10 text-white hover:text-accent">
                        Unirse a la Lista de Espera
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>