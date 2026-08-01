<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
