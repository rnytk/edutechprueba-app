<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModuleProgress extends Model
{
    protected $table = 'user_module_progress';
    protected $guarded = [];

    protected $casts = [
        'completed_at' => 'datetime',
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
