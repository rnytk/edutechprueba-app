<?php

namespace App\Filament\Resources\CourseAssignments;

use App\Filament\Resources\CourseAssignments\Pages\CreateCourseAssignment;
use App\Filament\Resources\CourseAssignments\Pages\EditCourseAssignment;
use App\Filament\Resources\CourseAssignments\Pages\ListCourseAssignments;
use App\Filament\Resources\CourseAssignments\Schemas\CourseAssignmentForm;
use App\Filament\Resources\CourseAssignments\Tables\CourseAssignmentsTable;
use App\Models\CourseAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseAssignmentResource extends Resource
{
    protected static ?string $model = CourseAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CourseAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseAssignmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourseAssignments::route('/'),
            'create' => CreateCourseAssignment::route('/create'),
            'edit' => EditCourseAssignment::route('/{record}/edit'),
        ];
    }
}
