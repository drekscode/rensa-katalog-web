<?php

namespace Database\Seeders;

use App\Models\Rumus;
use Illuminate\Database\Seeder;

class RumusSeeder extends Seeder
{
    public function run(): void
    {
        $rumus = [
            // Atap Metal (kategori_id: 1)
            [
                'kategori_id' => 1,
                'ukuran' => 'Luas Atap (m²)',
                'rumus' => '(Luas Atap × 1.05) / 1.00',
            ],
            [
                'kategori_id' => 1,
                'ukuran' => 'Panjang × Lebar',
                'rumus' => '((Panjang × Lebar) × 1.05) / Cover Area per Lembar',
            ],
            
            // Atap Bitumen (kategori_id: 2)
            [
                'kategori_id' => 2,
                'ukuran' => 'Luas Atap (m²)',
                'rumus' => '(Luas Atap × 1.10) / 10',
            ],
            
            // Atap Genteng (kategori_id: 3)
            [
                'kategori_id' => 3,
                'ukuran' => 'Luas Atap (m²)',
                'rumus' => 'Luas Atap × 10 × 1.05',
            ],
            [
                'kategori_id' => 3,
                'ukuran' => 'Panjang × Lebar',
                'rumus' => '(Panjang × Lebar) × 10 × 1.05',
            ],
            
            // Plafon (kategori_id: 4)
            [
                'kategori_id' => 4,
                'ukuran' => 'Luas Plafon (m²)',
                'rumus' => 'Luas Plafon / 2.88',
            ],
            [
                'kategori_id' => 4,
                'ukuran' => 'Ruangan (Panjang × Lebar)',
                'rumus' => '(Panjang × Lebar) / 2.88',
            ],
            
            // Dinding (kategori_id: 5)
            [
                'kategori_id' => 5,
                'ukuran' => 'Luas Dinding (m²)',
                'rumus' => 'Luas Dinding / 2.4',
            ],
            [
                'kategori_id' => 5,
                'ukuran' => 'Tinggi × Keliling',
                'rumus' => '(Tinggi × Keliling) / 2.4',
            ],
            
            // Rangka Atap (kategori_id: 6)
            [
                'kategori_id' => 6,
                'ukuran' => 'Luas Atap (m²)',
                'rumus' => 'Luas Atap × 4.5 (kg/m²)',
            ],
            
            // Insulasi (kategori_id: 7)
            [
                'kategori_id' => 7,
                'ukuran' => 'Luas Area (m²)',
                'rumus' => '(Luas Area × 1.10) / 10',
            ],
            
            // Talang Air (kategori_id: 8)
            [
                'kategori_id' => 8,
                'ukuran' => 'Keliling Atap (m)',
                'rumus' => 'Keliling Atap / 3',
            ],
            
            // Fasad (kategori_id: 9)
            [
                'kategori_id' => 9,
                'ukuran' => 'Luas Fasad (m²)',
                'rumus' => 'Luas Fasad / 2.4',
            ],
            
            // Kanopi (kategori_id: 10)
            [
                'kategori_id' => 10,
                'ukuran' => 'Luas Kanopi (m²)',
                'rumus' => '(Luas Kanopi × 1.05) / 2.1',
            ],
            
            // Flooring (kategori_id: 11)
            [
                'kategori_id' => 11,
                'ukuran' => 'Luas Lantai (m²)',
                'rumus' => '(Luas Lantai × 1.10) / 0.48',
            ],
        ];

        foreach ($rumus as $item) {
            Rumus::create($item);
        }
    }
}
