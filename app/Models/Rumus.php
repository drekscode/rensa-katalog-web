<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumus extends Model
{
    protected $fillable = [
        'kategori_id',
        'ukuran',
        'rumus',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
