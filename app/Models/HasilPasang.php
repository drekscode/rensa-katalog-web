<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPasang extends Model
{
    protected $table = 'hasil_pasang';
    protected $guarded = ['id'];

    public function series()
    {
        return $this->belongsTo(Series::class, 'id_series');
    }
}
