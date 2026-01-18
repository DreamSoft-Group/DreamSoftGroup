<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),
                ImageColumn::make('cover_image')
                    ->label('Portada'),
                TextColumn::make('demo_url')
                    ->label('URL Demo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'concept' => 'gray',
                        'development' => 'warning',
                        'beta' => 'success',
                        'live' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'concept' => 'Concepto',
                        'development' => 'Desarrollo',
                        'beta' => 'Beta',
                        'live' => 'En Vivo',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('access_level')
                    ->label('Acceso')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'free' => 'success',
                        'waitlist' => 'warning',
                        'premium' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'free' => 'Gratis',
                        'waitlist' => 'Lista de Espera',
                        'premium' => 'Premium',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
