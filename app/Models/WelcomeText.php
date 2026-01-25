<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeText extends Model
{
    protected $fillable = [
        'greeting',
        'title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
