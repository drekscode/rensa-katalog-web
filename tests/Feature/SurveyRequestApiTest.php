<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SurveyRequestApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_submit_survey_request_api()
    {
        Storage::fake('public');

        $response = $this->postJson('/api/survey-requests', [
            'nama' => 'Jule',
            'alamat' => 'Jl. Merdeka No. 10',
            'kontak' => '081234567890',
            'ruangan' => 'Kitchen room 4x3 meters',
            'images' => [
                UploadedFile::fake()->create('room1.jpg', 100, 'image/jpeg'),
                UploadedFile::fake()->create('room2.jpg', 100, 'image/jpeg')
            ]
        ]);

        $response->assertStatus(201)
                 ->assertJson(['success' => true]);

        $this->assertDatabaseHas('survey_requests', [
            'nama' => 'Jule',
            'kontak' => '081234567890'
        ]);

        $survey = SurveyRequest::first();
        $this->assertCount(2, $survey->images);

        foreach ($survey->images as $img) {
            Storage::disk('public')->assertExists($img->foto);
        }
    }
}
