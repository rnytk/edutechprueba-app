<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAssignment extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function academicDegree()
    {
        return $this->belongsTo(AcademicDegree::class);
    }
}
