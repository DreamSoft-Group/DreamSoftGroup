<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'pending' => 'Pendiente',
                        'approved' => 'Aprobado',
                        'rejected' => 'Rechazado',
                        'converted' => 'Convertido',
                    ])
                    ->required()
                    ->default('pending'),
                TextInput::make('source')
                    ->label('Origen')
                    ->maxLength(255)
                    ->helperText('URL o identificador de la página desde donde se registró.'),
                TextInput::make('stripe_id')
                    ->label('ID de Stripe (Cashier)')
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Asignado automáticamente al sincronizar con Stripe.'),
            ]);
    }
}
