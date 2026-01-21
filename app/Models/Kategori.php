<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori',
        'keunggulan_produk',
    ];

    public function series()
    {
        return $this->hasMany(Series::class);
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class);
    }

    public function tutorial_gambars()
    {
        return $this->hasMany(TutorialGambar::class);
    }

    public function tutorial_videos()
    {
        return $this->hasMany(TutorialVideo::class);
    }
}