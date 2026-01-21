<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';
    
    protected $fillable = [
        'kategori_id',
        'nama_series',
        'struktur_img',
        'cover_area',
        'material',
        'deskripsi_produk',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
