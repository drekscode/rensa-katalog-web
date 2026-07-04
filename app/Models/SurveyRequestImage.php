<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRequestImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_request_id',
        'foto'
    ];

    public function surveyRequest()
    {
        return $this->belongsTo(SurveyRequest::class, 'survey_request_id');
    }
}
