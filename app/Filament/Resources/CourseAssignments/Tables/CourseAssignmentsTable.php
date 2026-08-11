<?php

namespace App\Filament\Resources\CourseAssignments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CourseAssignmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.title')
                    ->label('Curso')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('school.name')
                    ->label('Colegio')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('academicDegree.name')
                    ->label('Grado')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Todos los grados'),
                    
                TextColumn::make('created_at')
                    ->label('Asignado el')
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
