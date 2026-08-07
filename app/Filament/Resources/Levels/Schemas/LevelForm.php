<?php

namespace App\Filament\Resources\Levels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
class LevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
           ->components([
                Select::make('course_id')
                    ->label('Curso al que pertenece')
                    ->relationship('course', 'title') // Carga los cursos automáticamente
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                
                TextInput::make('title')
                    ->label('Título del Nivel')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('order')
                    ->label('Orden de aparición')
                    ->numeric()
                    ->default(0),

                FileUpload::make('image_path')
                    ->label('Imagen del Nivel')
                    ->image()
                    ->directory('levels')
                    ->columnSpanFull(),
            ]);
    }
}
