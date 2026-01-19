<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'series_id',
        'nama_product',
        'thumbnail',
        'big_pic',
    ];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
