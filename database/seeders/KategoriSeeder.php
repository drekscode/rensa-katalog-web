<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Atap Metal',
                'keunggulan_produk' => 'Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.',
            ],
            [
                'nama_kategori' => 'Atap Bitumen',
                'keunggulan_produk' => 'Kedap air sempurna, fleksibel, dan mudah dipasang. Ideal untuk atap datar dan berbagai aplikasi waterproofing.',
            ],
            [
                'nama_kategori' => 'Atap Genteng',
                'keunggulan_produk' => 'Estetika klasik, isolasi panas yang baik, dan ramah lingkungan. Memberikan tampilan elegan pada bangunan.',
            ],
            [
                'nama_kategori' => 'Plafon',
                'keunggulan_produk' => 'Berbagai pilihan desain, mudah perawatan, dan meningkatkan estetika interior ruangan.',
            ],
            [
                'nama_kategori' => 'Dinding',
                'keunggulan_produk' => 'Kuat, tahan cuaca, dan mudah dipasang. Memberikan proteksi maksimal untuk bangunan Anda.',
            ],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
