<?php

use Livewire\Component;
use Livewire\Volt\Component as VoltComponent;
use App\Models\Project;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
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

<div class="py-12 bg-background min-h-screen text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-12">
            <a href="/" class="text-text-secondary hover:text-primary mb-4 inline-block">&larr; Volver al Lab</a>
            <div class="flex items-center justify-between">
                <h1 class="text-4xl md:text-5xl font-display font-black">{{ $project->title }}</h1>
                <span
                    class="px-3 py-1 bg-white/10 border border-white/20 rounded-full text-sm font-bold uppercase tracking-wider">
                    {{ $project->status }}
                </span>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- Cover Image -->
                @if($project->cover_image)
                    <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl">
                        <img src="{{ Storage::url($project->cover_image) }}" class="w-full h-auto" alt="Cover">
                    </div>
                @endif

                <!-- Description -->
                <div class="prose prose-invert max-w-none">
                    <h2 class="text-2xl font-bold mb-4 text-primary">Sobre el proyecto</h2>
                    <div class="text-text-secondary leading-relaxed space-y-4">
                        {!! $project->html_description ?? nl2br(e($project->short_description)) !!}
                    </div>
                </div>

                <!-- DevLog / Roadmap -->
                <div>
                    <h2 class="text-2xl font-bold mb-6 text-primary flex items-center">
                        <span class="mr-2">DevLog & Roadmap</span>
                        <div class="h-px flex-1 bg-white/10 ml-4"></div>
                    </h2>

                    <div class="space-y-8 pl-4 border-l-2 border-white/10">
                        @forelse($devLogs as $log)
                            <div class="relative pl-8">
                                <div
                                    class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-accent border-4 border-background">
                                </div>
                                <span
                                    class="text-xs text-text-secondary mb-1 block">{{ $log->published_at?->format('F j, Y') ?? 'Draft' }}</span>
                                <h3 class="text-lg font-bold text-white mb-2">{{ $log->title }}</h3>
                                <div class="prose prose-sm prose-invert text-text-secondary">
                                    {!! $log->content !!}
                                </div>
                            </div>
                        @empty
                            <p class="text-text-secondary italic">Aún no hay actualizaciones publicadas.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Meta Card -->
                <div class="p-6 bg-white/5 border border-white/10 rounded-2xl">
                    <h3 class="text-lg font-bold mb-4">Detalles</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between">
                            <span class="text-text-secondary">Acceso:</span>
                            <span class="font-bold text-white capitalize">{{ $project->access_level }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-text-secondary">Actualizado:</span>
                            <span class="font-bold text-white">{{ $project->updated_at->diffForHumans() }}</span>
                        </li>
                    </ul>

                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank"
                            class="mt-6 block w-full py-3 bg-primary hover:bg-primary/90 text-center rounded-lg font-bold transition-all">
                            Ver Demo en Vivo
                        </a>
                    @endif
                </div>

                <!-- Feedback Form would go here -->
                <div class="p-6 bg-accent/10 border border-accent/20 rounded-2xl">
                    <h3 class="text-lg font-bold text-accent mb-2">Feedback & Beta</h3>
                    <p class="text-sm text-text-secondary mb-4">¿Te interesa probar veras previas?</p>
                    <button
                        class="w-full py-2 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg text-sm font-bold">Unirse
                        a Waitlist</button>
                    <!-- Logic to handle waitlist join for specific project could vary -->
                </div>
            </div>

        </div>
    </div>
</div>