<?php

use App\Enums\ProjectStatus;
use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public function with(): array
    {
        $projects = Project::query()
            ->where('access_level', \App\Enums\ProjectAccessLevel::Free)
            ->latest('updated_at')
            ->get()
            ->sortBy(fn (Project $p) => array_search($p->status->value, ['live', 'beta', 'development', 'concept']))
            ->values();

        return ['projects' => $projects];
    }
};
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @forelse($projects as $project)
        <div
            class="group relative bg-surface/50 border border-white/5 rounded-3xl overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-[0_0_30px_-10px_rgba(59,130,246,0.3)] hover:-translate-y-2">
            <div
                class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            </div>

            <div class="aspect-video bg-slate-900 relative overflow-hidden">
                @if($project->cover_image_url)
                    <img src="{{ $project->cover_image_url }}"
                        alt="{{ $project->title }}"
                        loading="lazy"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105">
                @else
                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                @endif

                <div class="absolute bottom-4 left-4 z-10">
                    <span
                        class="px-3 py-1 {{ $project->status->tailwindBadgeClasses() }} border rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md">
                        {{ $project->status->label() }}
                    </span>
                </div>
            </div>

            <div class="p-4 md:p-6 relative">
                <h3 class="text-xl md:text-2xl font-bold mb-2 group-hover:text-primary transition-colors">
                    {{ $project->title }}</h3>
                <p class="text-text-secondary text-sm mb-4 line-clamp-2 leading-relaxed">
                    {{ $project->short_description }}
                </p>
                <a href="{{ route('projects.show', $project->slug) }}"
                    class="inline-flex items-center text-sm font-bold text-white group-hover:text-primary transition-colors"
                    wire:navigate>
                    Ver Detalles <span class="ml-2 group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-16">
            <p class="text-text-secondary text-lg">
                Aún no hay proyectos publicados. Vuelve pronto.
            </p>
        </div>
    @endforelse
</div>
