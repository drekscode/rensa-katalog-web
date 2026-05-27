<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('kategori')->insert([
            ['nama_kategori' => 'Atap Metal',    'keunggulan_produk' => 'Ringan, tahan lama, dan anti karat. Cocok untuk berbagai jenis bangunan dari rumah tinggal hingga gedung komersial.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Atap Bitumen',  'keunggulan_produk' => 'Kedap air sempurna, fleksibel, dan mudah dipasang. Ideal untuk atap datar dan berbagai aplikasi waterproofing.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Atap Genteng',  'keunggulan_produk' => 'Estetika klasik, isolasi panas yang baik, dan ramah lingkungan. Memberikan tampilan elegan pada bangunan.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Plafon',        'keunggulan_produk' => 'Berbagai pilihan desain, mudah perawatan, dan meningkatkan estetika interior ruangan.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Dinding',       'keunggulan_produk' => 'Kuat, tahan cuaca, dan mudah dipasang. Memberikan proteksi maksimal untuk bangunan Anda.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Rangka Atap',   'keunggulan_produk' => 'Struktur kuat dan presisi tinggi. Mempercepat proses konstruksi dengan hasil yang konsisten.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Insulasi',      'keunggulan_produk' => 'Efisiensi energi maksimal, kedap suara, dan tahan api. Meningkatkan kenyamanan ruangan.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Talang Air',    'keunggulan_produk' => 'Sistem drainase optimal, tahan korosi, dan mudah maintenance. Melindungi struktur bangunan dari air hujan.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Fasad',         'keunggulan_produk' => 'Tampilan modern dan elegan, tahan cuaca ekstrem. Meningkatkan nilai estetika bangunan.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Kanopi',        'keunggulan_produk' => 'Desain variatif, tahan UV, dan mudah dipasang. Memberikan perlindungan area outdoor.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Flooring',      'keunggulan_produk' => 'Tahan lama, anti slip, dan mudah dibersihkan. Cocok untuk berbagai aplikasi interior dan eksterior.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Partisi',       'keunggulan_produk' => 'Fleksibel, kedap suara, dan cepat dipasang. Solusi pembatas ruangan yang efisien.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Skylight',      'keunggulan_produk' => 'Pencahayaan alami optimal, hemat energi, dan tahan bocor. Menciptakan suasana ruangan yang terang.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Aksesoris Atap','keunggulan_produk' => 'Komponen pelengkap berkualitas, presisi tinggi. Memastikan instalasi atap yang sempurna.', 'created_at' => $now, 'updated_at' => $now],
            ['nama_kategori' => 'Waterproofing', 'keunggulan_produk' => 'Perlindungan anti bocor maksimal, tahan lama, dan mudah aplikasi. Solusi terbaik untuk berbagai area basah.', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
