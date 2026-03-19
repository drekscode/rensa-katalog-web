<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumus extends Model
{
    protected $table = 'rumus';
    
    protected $fillable = [
        'kategori_id',
        'panjang',
        'lebar',
        'lembar',
        'rumus',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
