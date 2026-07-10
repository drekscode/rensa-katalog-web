<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('artikel')->insert([
            [
                'kategori_id'     => 1,
                'judul'           => 'Panduan Memilih Wallpanel yang Tepat',
                'foto'            => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Wallpanel Indoor vs Outdoor</h3><p>Wallpanel hadir dalam berbagai material yang cocok untuk indoor maupun outdoor.</p><ul><li>WPC untuk area outdoor yang tahan cuaca</li><li>PVC untuk indoor dengan perawatan minimal</li><li>Pilih ketebalan sesuai kebutuhan</li></ul>',
                'hastag_kategori' => 'wallpanel,dinding,interior',
                'date' => '2026-01-15', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 2,
                'judul'           => 'Keunggulan UVM untuk Dinding Modern',
                'foto'            => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>UV Marble Panel</h3><p>UVM memberikan tampilan marble premium dengan harga terjangkau.</p><ul><li><strong>Finishing glossy</strong> premium</li><li>Tahan gores dan mudah dibersihkan</li><li>Pemasangan cepat dengan sistem batang</li></ul>',
                'hastag_kategori' => 'UVM,marble,dinding',
                'date' => '2026-01-10', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 3,
                'judul'           => 'Wallboard: Solusi Partisi dan Plafon',
                'foto'            => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<p>Wallboard calcium silicate menawarkan solusi serbaguna untuk partisi dan plafon.</p><ul><li>Tahan api dan kelembaban</li><li>Ringan dan mudah dipotong</li><li>Cocok untuk area komersial dan residensial</li></ul>',
                'hastag_kategori' => 'wallboard,partisi,plafon',
                'date' => '2026-01-05', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 4,
                'judul'           => 'PU Stone untuk Aksen Dinding',
                'foto'            => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Batu Tiruan yang Ringan</h3><p>PU Stone memberikan tampilan batu alam natural tanpa beban berlebih pada dinding.</p><ul><li>Berat hanya 1/3 batu asli</li><li>Mudah dipasang dengan lem khusus</li><li>Tahan UV dan cuaca</li></ul>',
                'hastag_kategori' => 'PU stone,batu,dekorasi',
                'date' => '2025-12-28', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 5,
                'judul'           => 'Decking Plank untuk Area Outdoor',
                'foto'            => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<p>Decking plank WPC menggabungkan keindahan kayu dengan ketahanan plastik.</p><ul><li>Anti slip dan tahan cuaca</li><li>Anti rayap dan jamur</li><li>Perawatan minimal</li></ul>',
                'hastag_kategori' => 'decking,outdoor,WPC',
                'date' => '2025-12-20', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 6,
                'judul'           => 'Tren Desain Plafon Modern',
                'foto'            => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Plafon sebagai Elemen Desain</h3><p>Plafon PVC hadir dalam berbagai motif untuk interior modern.</p><ul><li>Anti air, cocok untuk kamar mandi</li><li>Mudah dibersihkan</li><li>Berbagai pilihan motif kayu dan polos</li></ul>',
                'hastag_kategori' => 'plafon,interior,desain',
                'date' => '2025-12-15', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 7,
                'judul'           => 'SPC Flooring: Lantai Masa Kini',
                'foto'            => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Stone Plastic Composite</h3><p>SPC flooring adalah pilihan lantai modern yang tahan air 100%.</p><ul><li>Click-lock system, pasang tanpa lem</li><li>Anti gores dan tahan lama</li><li>Cocok untuk seluruh ruangan termasuk kamar mandi</li></ul>',
                'hastag_kategori' => 'SPC,flooring,lantai',
                'date' => '2025-12-10', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 8,
                'judul'           => 'Vinyl Flooring Premium',
                'foto'            => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<p>Vinyl flooring menawarkan kenyamanan dan estetika tinggi.</p><ul><li>Nyaman di kaki dan kedap suara</li><li>Berbagai motif kayu natural</li><li>Mudah dipasang dan dibersihkan</li></ul>',
                'hastag_kategori' => 'vinyl,flooring,premium',
                'date' => '2025-12-05', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 9,
                'judul'           => 'Decking Tile Modular untuk Balkon',
                'foto'            => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Interlocking Tile System</h3><p>Decking tile dengan sistem interlocking untuk balkon dan teras.</p><ul><li>Pasang tanpa lem atau sekrup</li><li>Bisa dibongkar pasang</li><li>Drainase built-in</li></ul>',
                'hastag_kategori' => 'decking,tile,balkon',
                'date' => '2025-11-28', 'created_at' => $now, 'updated_at' => $now
            ],
            [
                'kategori_id'     => 10,
                'judul'           => 'Sandblast Panel untuk Eksterior',
                'foto'            => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi'       => '<h3>Finishing Sandblast Premium</h3><p>Panel sandblast fiber cement untuk fasad dan dinding eksterior.</p><ul><li>Tekstur natural premium</li><li>Tahan cuaca ekstrem</li><li>Perhitungan mudah dengan rumus m²</li></ul>',
                'hastag_kategori' => 'sandblast,eksterior,fasad',
                'date' => '2025-11-20', 'created_at' => $now, 'updated_at' => $now
            ],
        ]);
    }
}
