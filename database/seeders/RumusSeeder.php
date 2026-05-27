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
            // Atap Metal — kategori_id: 1
            ['kategori_id' => 1,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],
            ['kategori_id' => 1,  'rumus' => 'Rumus Batang', 'panjang' => 300.00, 'lebar' => 8.00,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Atap Bitumen — kategori_id: 2
            ['kategori_id' => 2,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Atap Genteng — kategori_id: 3
            ['kategori_id' => 3,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],
            ['kategori_id' => 3,  'rumus' => 'Rumus Batang', 'panjang' => 400.00, 'lebar' => 10.00, 'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Plafon — kategori_id: 4
            ['kategori_id' => 4,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Dinding — kategori_id: 5
            ['kategori_id' => 5,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Rangka Atap — kategori_id: 6
            ['kategori_id' => 6,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Insulasi — kategori_id: 7
            ['kategori_id' => 7,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Talang Air — kategori_id: 8
            ['kategori_id' => 8,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Fasad — kategori_id: 9
            ['kategori_id' => 9,  'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],

            // Kanopi — kategori_id: 10
            ['kategori_id' => 10, 'rumus' => 'Rumus Box',   'panjang' => 200.00, 'lebar' => 100.00, 'lembar' => 10, 'created_at' => $now, 'updated_at' => $now],

            // Flooring — kategori_id: 11
            ['kategori_id' => 11, 'rumus' => 'Rumus M2',    'panjang' => null,   'lebar' => null,  'lembar' => null, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
