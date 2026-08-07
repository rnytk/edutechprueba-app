<?php

namespace App\Filament\Resources\Schools\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SchoolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre del Colegio')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->label('Telefono')
                    ->numeric()
                    ->maxLength(8),
                TextInput::make('address')
                    ->label('Direccion')
                    ->required(),
                Toggle::make('is_active')
                    ->label('¿Está activo?')
                    ->default(true)
                    ->required(),
            ]);
    }
}
