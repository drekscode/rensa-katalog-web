<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use App\Models\SurveyRequestImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SurveyRequestModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_survey_request_relations()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Test Name',
            'alamat' => 'Test Address',
            'kontak' => '0812345678',
            'ruangan' => 'Living Room',
            'status' => 'pending',
            'dp_survey' => 50000
        ]);

        $image = SurveyRequestImage::create([
            'survey_request_id' => $survey->id,
            'foto' => 'path/to/image.jpg'
        ]);

        $this->assertEquals(1, $survey->images()->count());
        $this->assertEquals($survey->id, $image->surveyRequest->id);
    }
}
