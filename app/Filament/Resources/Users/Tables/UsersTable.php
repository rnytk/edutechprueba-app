<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('email')
                    ->label('Correo')
                    ->searchable(),
                
                TextColumn::make('school.name')
                    ->label('Colegio')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Sin asignar'),
                
                TextColumn::make('academicDegree.name')
                    ->label('Grado')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Sin asignar'),
                
                TextColumn::make('created_at')
                    ->label('Registro')
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
