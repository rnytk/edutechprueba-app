<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityAttempt extends Model
{
    protected $casts = [
        'submitted_answers' => 'array',
        'is_passed' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
