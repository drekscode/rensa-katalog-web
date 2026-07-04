<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kontak',
        'ruangan',
        'status',
        'dp_survey'
    ];

    public function images()
    {
        return $this->hasMany(SurveyRequestImage::class, 'survey_request_id');
    }
}
