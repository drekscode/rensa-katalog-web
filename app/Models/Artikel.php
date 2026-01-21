<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    
    protected $fillable = [
        'kategori_id',
        'judul',
        'foto',
        'deskripsi',
        'hastag_kategori',
        'date',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($artikel) {
            $artikel->slug = \Illuminate\Support\Str::slug($artikel->judul);
        });
        static::updating(function ($artikel) {
            $artikel->slug = \Illuminate\Support\Str::slug($artikel->judul);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
