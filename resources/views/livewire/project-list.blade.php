<?php

use Livewire\Component;
use Livewire\Volt\Component as VoltComponent;
use App\Models\Project;

new class extends Component {
    public function with()
    {
        return [
            'projects' => Project::orderByRaw("FIELD(status, 'live', 'beta', 'development', 'concept')")->get(),
        ];
    }
};
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach($projects as $project)
        <div class="group relative bg-surface/50 border border-white/5 rounded-3xl overflow-hidden hover:border-primary/50 transition-all duration-500 hover:shadow-[0_0_30px_-10px_rgba(59,130,246,0.3)] hover:-translate-y-2">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            
            <div class="aspect-video bg-slate-900 relative overflow-hidden">
                @if($project->cover_image)
                    <img src="{{ Storage::url($project->cover_image) }}" alt="{{ $project->title }}"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-105">
                @else
                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                @endif

                <div class="absolute bottom-4 left-4 z-10">
                    @php
                        $colors = [
                            'concept' => 'bg-primary/20 border-primary/50 text-primary',
                            'development' => 'bg-yellow-500/20 border-yellow-500/50 text-yellow-500',
                            'beta' => 'bg-accent/20 border-accent/50 text-accent',
                            'live' => 'bg-green-500/20 border-green-500/50 text-green-500',
                        ];
                        $statusClass = $colors[$project->status] ?? 'bg-primary/20 border-primary/50 text-primary';
                    @endphp
                    <span class="px-3 py-1 {{ $statusClass }} border rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-md">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
            
            <div class="p-8 relative">
                <h3 class="text-2xl font-bold mb-3 group-hover:text-primary transition-colors">{{ $project->title }}</h3>
                <p class="text-text-secondary text-sm mb-6 line-clamp-2 leading-relaxed">{{ $project->short_description }}</p>
                <a href="{{ route('projects.show', $project->slug) }}"
                    class="inline-flex items-center text-sm font-bold text-white group-hover:text-primary transition-colors" wire:navigate>
                    Ver Detalles <span class="ml-2 group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>
        </div>
    @endforeach
</div>