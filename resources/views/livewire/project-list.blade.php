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

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($projects as $project)
        <div
            class="group relative bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:border-primary/50 transition-all duration-300 hover:-translate-y-2">
            <div class="aspect-video bg-gray-800 relative overflow-hidden">
                @if($project->cover_image)
                    <img src="{{ Storage::url($project->cover_image) }}" alt="{{ $project->title }}"
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                @else
                    <div class="absolute inset-0 bg-gradient-to-t from-background to-transparent opacity-60"></div>
                @endif

                <div class="absolute bottom-4 left-4">
                    @php
                        $colors = [
                            'concept' => 'bg-gray-500',
                            'development' => 'bg-yellow-500',
                            'beta' => 'bg-accent',
                            'live' => 'bg-green-500',
                        ];
                        $statusColor = $colors[$project->status] ?? 'bg-primary';
                    @endphp
                    <span
                        class="px-2 py-1 {{ $statusColor }}/90 rounded text-xs font-bold text-white uppercase tracking-wider shadow-sm">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">{{ $project->title }}</h3>
                <p class="text-text-secondary text-sm mb-4 line-clamp-2">{{ $project->short_description }}</p>
                <a href="{{ route('projects.show', $project->slug) }}"
                    class="inline-flex items-center text-sm font-bold text-white hover:text-accent" wire:navigate>
                    Ver Detalles <span class="ml-2">&rarr;</span>
                </a>
            </div>
        </div>
    @endforeach
</div>