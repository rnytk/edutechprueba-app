<?php

namespace App\Filament\Resources\Modules\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder;          
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;


class ModuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Datos Generales del Módulo
                Section::make('Información General')
                    ->schema([
                        Select::make('level_id')
                            ->label('Nivel')
                            ->relationship('level', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        
                        TextInput::make('title')
                            ->label('Título del Módulo')
                            ->required(),
                        
                        TextInput::make('order')
                            ->label('Orden')
                            ->numeric()
                            ->default(0),

                        Textarea::make('objective')
                            ->label('Objetivo de Aprendizaje')
                            ->columnSpanFull(),

                        FileUpload::make('image_path')
                            ->label('Imagen del Módulo')
                            ->image()
                            ->directory('modules')
                            ->columnSpanFull(),
                    ])->columns(3),

                // 2. Motor de Teoría (Flashcards)
                Section::make('Contenido Teórico')
                    ->schema([
                        Builder::make('content_blocks')
                            ->label('Tarjetas de Estudio')
                            ->blocks([
                                Block::make('flashcard')
                                    ->label('Tarjeta de Información')
                                    ->schema([
                                        TextInput::make('title')->label('Título del tema')->required(),
                                        FileUpload::make('image')->label('Imagen ilustrativa')->image(),
                                        RichEditor::make('content')->label('Contenido explicativo')->required(),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),

                // 3. Motor de Actividades (Juegos)
                Section::make('Actividades Interactivas')
                    ->schema([
                        Builder::make('activities')
                            ->label('Juegos del Módulo')
                            ->blocks([
                                // Juego 1: Falso o Verdadero
                                Block::make('true_false')
                                    ->label('Falso / Verdadero')
                                    ->schema([
                                        TextInput::make('question')->label('Pregunta')->required(),
                                        Toggle::make('correct_answer')->label('¿La respuesta correcta es Verdadero?'),
                                    ]),
                                
                                // Juego 2: Opción Múltiple
                                Block::make('multiple_choice')
                                    ->label('Opción Múltiple')
                                    ->schema([
                                        TextInput::make('question')->label('Pregunta')->required(),
                                        Repeater::make('options')
                                            ->label('Opciones de respuesta')
                                            ->schema([
                                                TextInput::make('option_text')->label('Texto de la opción')->required(),
                                                Toggle::make('is_correct')->label('¿Es la opción correcta?'),
                                            ])
                                            ->minItems(2)
                                            ->maxItems(4),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ]),

                // 4. Cierre
                Section::make('Finalización')
                    ->schema([
                        TextInput::make('closing_message')
                            ->label('Mensaje de felicitación al terminar')
                            ->placeholder('¡Felicidades, ganaste este módulo!')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
