<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialVideo extends Model
{
    protected $table = 'tutorial_video';
    
    protected $fillable = [
        'kategori_id',
        'link',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
