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
        ];

        foreach ($rumus as $item) {
            Rumus::create($item);
        }
    }
}
