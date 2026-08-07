<?php

namespace App\Filament\Resources\AcademicDegrees\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AcademicDegreeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
           ->components([
                TextInput::make('name')
                    ->label('Nombre del Grado (Ej: 1ro Básico)')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
            ]);
    }
}
