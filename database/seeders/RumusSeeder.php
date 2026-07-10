<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumusSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('rumus')->insert([
            // Rumus Batang categories (panjang/lebar in meters, matching Excel)
            ['kategori_id' => 1,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // Wallpanel Indoor/Outdoor
            ['kategori_id' => 2,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // UVM
            ['kategori_id' => 3,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // Wallboard
            ['kategori_id' => 4,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // PU Stone
            ['kategori_id' => 5,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // Decking Plank
            ['kategori_id' => 6,  'rumus' => 'Rumus Batang', 'panjang' => 2.90, 'lebar' => 0.16,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // Plafon

            // Rumus Box categories (panjang/lebar in meters, matching Excel)
            ['kategori_id' => 7,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10, 'created_at' => $now, 'updated_at' => $now], // SPC
            ['kategori_id' => 8,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10, 'created_at' => $now, 'updated_at' => $now], // Vinyl
            ['kategori_id' => 9,  'rumus' => 'Rumus Box',    'panjang' => 2.90, 'lebar' => 0.14,  'lembar' => 10, 'created_at' => $now, 'updated_at' => $now], // Decking Tile

            // Rumus M2 categories
            ['kategori_id' => 10, 'rumus' => 'Rumus M2',     'panjang' => null,  'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now], // Sandblast
        ]);
    }
}
