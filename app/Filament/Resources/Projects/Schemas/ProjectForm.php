<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'concept' => 'Concepto',
                        'development' => 'En Desarrollo',
                        'beta' => 'Beta',
                        'live' => 'En Vivo',
                    ])
                    ->required()
                    ->default('concept'),
                Select::make('access_level')
                    ->label('Nivel de Acceso')
                    ->options([
                        'free' => 'Gratis',
                        'waitlist' => 'Lista de Espera',
                        'premium' => 'Premium',
                    ])
                    ->required()
                    ->default('free'),
                Textarea::make('short_description')
                    ->label('Descripción Corta')
                    ->default(null)
                    ->columnSpanFull(),
                RichEditor::make('html_description')
                    ->label('Descripción HTML')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->label('Imagen de Portada')
                    ->image(),
                TextInput::make('demo_url')
                    ->label('URL de Demo')
                    ->url()
                    ->default(null),
            ]);
    }
}
