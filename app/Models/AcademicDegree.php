<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDegree extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function courseAssignments()
    {
        return $this->hasMany(CourseAssignment::class);
    }
}
