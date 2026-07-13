<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Wallpanel Indoor/Outdoor', 'keunggulan_produk' => 'Panel dinding serbaguna untuk interior dan eksterior. Tahan cuaca, mudah dipasang, dan tersedia dalam berbagai desain.', 'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'UVM',                      'keunggulan_produk' => 'Material dinding modern dengan finishing premium. Tahan lama, anti rayap, dan perawatan minimal.',                      'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'Wallboard',                 'keunggulan_produk' => 'Papan dinding berkualitas tinggi untuk partisi dan plafon. Ringan, kuat, dan mudah dipotong sesuai kebutuhan.',        'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'PU Stone',                  'keunggulan_produk' => 'Batu tiruan berbahan polyurethane. Ringan, tampilan natural, dan mudah dipasang untuk aksen dinding.',                 'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'Decking Plank',             'keunggulan_produk' => 'Papan decking untuk area outdoor. Anti slip, tahan cuaca, dan tampilan natural kayu.',                                 'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'Plafon',                    'keunggulan_produk' => 'Berbagai pilihan material plafon untuk interior. Mudah perawatan dan meningkatkan estetika ruangan.',                  'allowed_rumus' => ['Rumus Batang']],
            ['nama_kategori' => 'SPC',                       'keunggulan_produk' => 'Stone Plastic Composite flooring. Tahan air, anti gores, dan cocok untuk berbagai ruangan.',                          'allowed_rumus' => ['Rumus Box']],
            ['nama_kategori' => 'Vinyl',                     'keunggulan_produk' => 'Lantai vinyl premium dengan berbagai motif. Nyaman di kaki, kedap suara, dan mudah dibersihkan.',                     'allowed_rumus' => ['Rumus Box']],
            ['nama_kategori' => 'Decking Tile',              'keunggulan_produk' => 'Tile decking modular untuk balkon dan teras. Sistem interlocking, mudah dipasang tanpa lem.',                          'allowed_rumus' => ['Rumus Box']],
            ['nama_kategori' => 'Sandblast',                 'keunggulan_produk' => 'Material finishing dengan tekstur sandblast. Tampilan elegan dan modern untuk dinding eksterior.',                     'allowed_rumus' => ['Rumus M2']],
        ];

        foreach ($data as $item) {
            Kategori::firstOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                [
                    'keunggulan_produk' => $item['keunggulan_produk'],
                    'allowed_rumus' => $item['allowed_rumus'],
                ]
            );
        }
    }
}
