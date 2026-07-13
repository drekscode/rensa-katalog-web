<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Rumus;
use Illuminate\Database\Seeder;

class RumusSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Rumus Batang categories (panjang/lebar in meters, matching Excel)
            ['kategori_id' => 1,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // Wallpanel Indoor/Outdoor
            ['kategori_id' => 2,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // UVM
            ['kategori_id' => 3,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // Wallboard
            ['kategori_id' => 4,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // PU Stone
            ['kategori_id' => 5,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // Decking Plank
            ['kategori_id' => 6,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null], // Plafon

            // Rumus Box categories (panjang/lebar in meters, matching Excel)
            ['kategori_id' => 7,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10], // SPC
            ['kategori_id' => 8,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10], // Vinyl
            ['kategori_id' => 9,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10], // Decking Tile

            // Rumus M2 categories
            ['kategori_id' => 10, 'rumus' => 'Rumus M2',     'panjang' => null,  'lebar' => null,  'lembar' => null], // Sandblast
        ];

        foreach ($data as $item) {
            Rumus::firstOrCreate(
                ['kategori_id' => $item['kategori_id'], 'rumus' => $item['rumus']],
                $item
            );
        }
    }
}
