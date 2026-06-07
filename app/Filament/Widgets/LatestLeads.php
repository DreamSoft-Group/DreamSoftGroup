<?php

namespace App\Filament\Widgets;

use App\Enums\LeadStatus;
use App\Models\Lead;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestLeads extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Lead::query()->latest('created_at')->limit(5)
            )
            ->heading('Últimos Leads')
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->copyable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (LeadStatus $state): string => $state->color())
                    ->formatStateUsing(fn (LeadStatus $state): string => $state->label()),
                Tables\Columns\TextColumn::make('source')
                    ->label('Origen')
                    ->limit(40)
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registrado')
                    ->since(),
            ])
            ->paginated(false);
    }
}
