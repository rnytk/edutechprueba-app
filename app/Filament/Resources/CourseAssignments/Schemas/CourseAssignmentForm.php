<?php

namespace App\Filament\Resources\CourseAssignments\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class CourseAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_id')
                    ->label('Curso a Asignar')
                    ->relationship('course', 'title')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),

                Select::make('school_id')
                    ->label('Institución (Colegio)')
                    ->relationship('school', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('academic_degree_id')
                    ->label('Grado Académico Específico')
                    ->relationship('academicDegree', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->helperText('Déjalo en blanco si el curso aplica para todos los grados de este colegio.'),
            ]);
    }
}
