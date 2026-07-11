<?php

namespace Tests\Feature;

use App\Models\Kategori;
use App\Models\Rumus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RumusTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculate_rumus_batang_case_a()
    {
        $kategori = Kategori::create(['nama_kategori' => 'Wallpanel']);
        $rumus = Rumus::create([
            'kategori_id' => $kategori->id,
            'rumus' => 'Rumus Batang',
            'panjang' => 2.9,
            'lebar' => 0.16,
        ]);

        $response = $this->postJson('/api/formulas/calculate', [
            'rumus_id' => $rumus->id,
            'panjang_bidang' => 2.4,
            'lebar_bidang' => 7.0,
        ]);

        $response->assertStatus(200);
        $data = $response->json();
        
        $this->assertEquals(45, $data['total']);
    }

    public function test_calculate_rumus_batang_case_b()
    {
        $kategori = Kategori::create(['nama_kategori' => 'Wallpanel']);
        $rumus = Rumus::create([
            'kategori_id' => $kategori->id,
            'rumus' => 'Rumus Batang',
            'panjang' => 2.9,
            'lebar' => 0.16,
        ]);

        $response = $this->postJson('/api/formulas/calculate', [
            'rumus_id' => $rumus->id,
            'panjang_bidang' => 3.0,
            'lebar_bidang' => 7.0,
        ]);

        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEquals(47, $data['total']);
    }

    public function test_calculate_with_another_case_a()
    {
        $kategori = Kategori::create(['nama_kategori' => 'Wallpanel']);
        // Let's test a Case A where shareN > 1.
        // e.g. b5 (panjangProduk) = 2.9, b3 (panjangBidang) = 1.2
        // shareN = Math.floor(2.9 / 1.2) = 2
        // baris9 = 1 / 2 = 0.5
        // baris8 = Math.ceil(7 / 0.16) = 44
        // baris10 = 44 * 0.5 = 22
        // baris11 = 0
        // baris12 = 0
        // baris13 = 0
        // baris14 = 22 + 0 + 1 = 23
        $rumus = Rumus::create([
            'kategori_id' => $kategori->id,
            'rumus' => 'Rumus Batang',
            'panjang' => 2.9,
            'lebar' => 0.16,
        ]);

        $response = $this->postJson('/api/formulas/calculate', [
            'rumus_id' => $rumus->id,
            'panjang_bidang' => 1.2,
            'lebar_bidang' => 7.0,
        ]);

        $response->assertStatus(200);
        $data = $response->json();
        
        $this->assertEquals(23, $data['total']);
    }
}
