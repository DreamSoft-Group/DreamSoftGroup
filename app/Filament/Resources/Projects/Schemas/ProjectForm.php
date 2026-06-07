<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Enums\ProjectAccessLevel;
use App\Enums\ProjectStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, ?string $old, callable $set, ?int $record) {
                        if (filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Se genera automáticamente desde el título. Puedes editarlo.')
                    ->rules(['regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/']),
                Select::make('status')
                    ->label('Estado')
                    ->options(ProjectStatus::options())
                    ->required()
                    ->default(ProjectStatus::Concept->value),
                Select::make('access_level')
                    ->label('Nivel de Acceso')
                    ->options(ProjectAccessLevel::options())
                    ->required()
                    ->default(ProjectAccessLevel::Free->value),
                Textarea::make('short_description')
                    ->label('Descripción Corta')
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),
                RichEditor::make('html_description')
                    ->label('Descripción Completa')
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->label('Imagen de Portada')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('projects')
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                TextInput::make('demo_url')
                    ->label('URL de Demo')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
            ]);
    }
}
