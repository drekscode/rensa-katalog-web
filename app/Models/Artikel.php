<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'kategori_id',
        'foto',
        'deskripsi',
        'hastag_kategori',
        'date',
        'slug',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
