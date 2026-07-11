<?php

namespace Tests\Feature;

use App\Models\Kategori;
use App\Models\Rumus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RumusTest extends TestCase
{
    use RefreshDatabase;

    private function getExpectedHtmlResult($panjangBidang, $lebarBidang, $panjangProduk, $lebarProduk)
    {
        // Port of JS calculation logic from kalkulator-batang-wallpanel.html with clean names
        $jumlahBaris = (int) ceil($lebarBidang / $lebarProduk);
        $isCaseA = $panjangProduk >= $panjangBidang;

        if ($isCaseA) {
            $n = (int) floor($panjangProduk / $panjangBidang);
            $batangPerBaris = $n == 0 ? 1.0 : 1.0 / $n;
        } else {
            $batangPerBaris = (float) floor($panjangBidang / $panjangProduk);
        }

        $totalBidangUtama = $jumlahBaris * $batangPerBaris;
        $sisaBatang = $isCaseA ? 0.0 : ($panjangBidang - $panjangProduk * $batangPerBaris);
        
        $jumlahPotonganPerBaris = ($sisaBatang == 0.0) ? 0 : (int) floor(round($panjangProduk / $sisaBatang, 10));
        $batangDariSisa = ($jumlahPotonganPerBaris == 0) ? 0 : (int) ceil(round($jumlahBaris / $jumlahPotonganPerBaris, 10));
        
        $totalBatang = $totalBidangUtama + $batangDariSisa + 1;
        
        return (int) round($totalBatang);
    }

    public function test_calculate_against_html_logic()
    {
        $kategori = Kategori::create(['nama_kategori' => 'Wallpanel']);
        $rumus = Rumus::create([
            'kategori_id' => $kategori->id,
            'rumus' => 'Rumus Batang',
            'panjang' => 2.9,
            'lebar' => 0.16,
        ]);

        $panjangBidangs = [0.5, 1.2, 2.4, 2.9, 3.0, 4.5, 5.8, 8.7];
        $lebarBidangs = [0.5, 1.5, 3.0, 7.0, 10.0, 12.5];

        foreach ($panjangBidangs as $panjangBidang) {
            foreach ($lebarBidangs as $lebarBidang) {
                $expected = $this->getExpectedHtmlResult($panjangBidang, $lebarBidang, 2.9, 0.16);

                $response = $this->postJson('/api/formulas/calculate', [
                    'rumus_id' => $rumus->id,
                    'panjang_bidang' => $panjangBidang,
                    'lebar_bidang' => $lebarBidang,
                ]);

                $response->assertStatus(200);
                $actual = $response->json('total');

                $this->assertEquals(
                    $expected, 
                    $actual, 
                    "Failed for: panjangBidang={$panjangBidang}, lebarBidang={$lebarBidang}. Expected: {$expected}, Got: {$actual}"
                );
            }
        }
    }
}
