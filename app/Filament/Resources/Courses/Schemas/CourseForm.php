<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título del Curso')
                    ->required()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->label('¿Está activo?')
                    ->default(true)
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Imagen de Portada')
                    ->image()
                    ->directory('courses') // Guarda las imágenes en storage/app/public/courses
                    ->columnSpanFull(),
            ]);
    }
}
