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
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            [
                'kategori_id' => 1,
                'rumus' => 'Rumus Batang',
                'panjang' => 300.00,
                'lebar' => 8.00,
                'lembar' => null,
            ],
            
            // Atap Bitumen (kategori_id: 2)
            [
                'kategori_id' => 2,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Atap Genteng (kategori_id: 3)
            [
                'kategori_id' => 3,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            [
                'kategori_id' => 3,
                'rumus' => 'Rumus Batang',
                'panjang' => 400.00,
                'lebar' => 10.00,
                'lembar' => null,
            ],
            
            // Plafon (kategori_id: 4)
            [
                'kategori_id' => 4,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Dinding (kategori_id: 5)
            [
                'kategori_id' => 5,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Rangka Atap (kategori_id: 6)
            [
                'kategori_id' => 6,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Insulasi (kategori_id: 7)
            [
                'kategori_id' => 7,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Talang Air (kategori_id: 8)
            [
                'kategori_id' => 8,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Fasad (kategori_id: 9)
            [
                'kategori_id' => 9,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
            
            // Kanopi (kategori_id: 10)
            [
                'kategori_id' => 10,
                'rumus' => 'Rumus Box',
                'panjang' => 200.00,
                'lebar' => 100.00,
                'lembar' => 10,
            ],
            
            // Flooring (kategori_id: 11)
            [
                'kategori_id' => 11,
                'rumus' => 'Rumus M2',
                'panjang' => null,
                'lebar' => null,
                'lembar' => null,
            ],
        ];

        foreach ($rumus as $item) {
            Rumus::create($item);
        }
    }
}
