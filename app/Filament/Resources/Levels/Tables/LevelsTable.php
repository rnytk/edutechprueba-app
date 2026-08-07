<?php

namespace App\Filament\Resources\Levels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn; 
use Filament\Tables\Table;

class LevelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Imagen')
                    ->circular(),
                TextColumn::make('course.title') // Muestra el título del curso relacionado
                    ->label('Curso')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Nivel')
                    ->searchable(),
                TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),
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
