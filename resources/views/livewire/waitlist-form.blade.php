<?php

use App\Models\Lead;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Validation\Rule;

new class extends Component
{
    #[Validate('required|email:rfc|max:255')]
    public string $email = '';

    public ?int $projectId = null;

    public ?string $source = null;

    public ?string $successMessage = null;

    public ?string $errorMessage = null;

    public bool $alreadyRegistered = false;

    public function mount(?int $projectId = null, ?string $source = null): void
    {
        $this->projectId = $projectId;
        $this->source = $source;
    }

    public function submit(): void
    {
        $this->errorMessage = null;
        $this->successMessage = null;
        $this->alreadyRegistered = false;

        $this->validate();

        $existing = Lead::where('email', $this->email)->first();

        if ($existing) {
            $this->alreadyRegistered = true;
            $this->successMessage = 'Este email ya estaba en la lista. ¡Gracias por el interés!';

            return;
        }

        Lead::create([
            'email' => $this->email,
            'source' => $this->source ?? url()->previous(),
            'status' => 'pending',
        ]);

        $this->successMessage = '¡Listo! Te hemos añadido a la lista de espera.';
        $this->reset('email');
        $this->dispatch('waitlist:subscribed');
    }
};
?>

<div class="w-full">
    @if ($successMessage)
        <div role="status"
            class="rounded-2xl border {{ $alreadyRegistered ? 'border-primary/30 bg-primary/5' : 'border-accent/30 bg-accent/5' }} p-4 mb-4 text-sm">
            <p class="font-bold {{ $alreadyRegistered ? 'text-primary' : 'text-accent' }}">
                {{ $successMessage }}
            </p>
        </div>
    @endif

    @error('email')
        <p role="alert" class="text-red-400 text-sm mb-2">{{ $message }}</p>
    @enderror

    <form wire:submit="submit" class="flex flex-col sm:flex-row gap-3" novalidate>
        <label for="waitlist-email" class="sr-only">Email</label>
        <input
            id="waitlist-email"
            type="email"
            wire:model="email"
            placeholder="tu@email.com"
            autocomplete="email"
            required
            class="flex-1 px-5 py-4 bg-white/5 border border-white/10 rounded-full text-white placeholder:text-text-secondary focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/30 transition-all"
        >
        <button type="submit"
            wire:loading.attr="disabled"
            wire:target="submit"
            class="px-6 py-4 bg-primary hover:bg-blue-600 disabled:opacity-50 disabled:cursor-not-allowed rounded-full font-bold transition-all shadow-[0_0_20px_-5px_rgba(59,130,246,0.5)] hover:shadow-[0_0_30px_-5px_rgba(59,130,246,0.7)] whitespace-nowrap">
            <span wire:loading.remove wire:target="submit">Unirme a la lista</span>
            <span wire:loading wire:target="submit">Enviando…</span>
        </button>
    </form>
</div>
