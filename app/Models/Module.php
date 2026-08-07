<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'content_blocks' => 'array',
        'activities' => 'array',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function capsules()
    {
        return $this->hasMany(Capsule::class);
    }
}
