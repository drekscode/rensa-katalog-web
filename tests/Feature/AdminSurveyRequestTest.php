<?php

namespace Tests\Feature;

use App\Models\SurveyRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminSurveyRequestTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminUser = User::factory()->create();
    }

    public function test_admin_can_view_survey_requests()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Jule Client',
            'alamat' => 'Jl. Merdeka No. 12',
            'kontak' => '0812345678',
            'ruangan' => 'Bathroom',
            'status' => 'pending'
        ]);

        $response = $this->actingAs($this->adminUser)
                         ->get(route('admin.survey-request.index'));

        $response->assertStatus(200);
        $response->assertSee('Jule Client');
    }

    public function test_admin_can_update_status()
    {
        $survey = SurveyRequest::create([
            'nama' => 'Jule Client',
            'alamat' => 'Jl. Merdeka No. 12',
            'kontak' => '0812345678',
            'ruangan' => 'Bathroom',
            'status' => 'pending'
        ]);

        $response = $this->actingAs($this->adminUser)
                         ->put(route('admin.survey-request.update', $survey->id), [
                             'status' => 'scheduled'
                         ]);

        $response->assertRedirect(route('admin.survey-request.show', $survey->id));
        $this->assertDatabaseHas('survey_requests', [
            'id' => $survey->id,
            'status' => 'scheduled'
        ]);
    }
}
