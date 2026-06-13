<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPasangImage extends Model
{
    protected $table = 'hasil_pasang_images';
    protected $guarded = ['id'];

    public function hasilPasang()
    {
        return $this->belongsTo(HasilPasang::class, 'hasil_pasang_id');
    }
}
