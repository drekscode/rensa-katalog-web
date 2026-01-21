<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialGambar extends Model
{
    protected $table = 'tutorial_gambar';
    
    protected $fillable = [
        'kategori_id',
        'judul',
        'gambar',
        'deskripsi',
        'urutan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
