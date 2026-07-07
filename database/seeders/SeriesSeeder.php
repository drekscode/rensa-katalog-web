<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('series')->insert([
            // Wallpanel Indoor/Outdoor — kategori_id: 1
            [
                'kategori_id'    => 1,
                'nama_series'    => 'Rensa Wallpanel Classic',
                'struktur_img'   => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '2.97m2 per lembar',
                'material'       => 'WPC (Wood Plastic Composite)',
                'ketebalan'      => '8mm - 12mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Panel dinding WPC untuk indoor dan outdoor. Tahan air, anti rayap, dan mudah dipasang.',
                'keyword' => 'wallpanel, WPC, dinding, indoor, outdoor',
                'created_at' => $now, 'updated_at' => $now
            ],

            // UVM — kategori_id: 2
            [
                'kategori_id'    => 2,
                'nama_series'    => 'Rensa UVM Premium',
                'struktur_img'   => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '2.90m2 per lembar',
                'material'       => 'UV Marble sheet',
                'ketebalan'      => '3mm - 5mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Panel dinding UV Marble dengan finishing glossy premium. Tahan gores dan mudah dibersihkan.',
                'keyword' => 'UVM, UV marble, dinding, glossy, premium',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Wallboard — kategori_id: 3
            [
                'kategori_id'    => 3,
                'nama_series'    => 'Rensa Wallboard Standard',
                'struktur_img'   => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '2.90m2 per lembar',
                'material'       => 'Calcium silicate board',
                'ketebalan'      => '6mm - 9mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Papan dinding serbaguna untuk partisi dan plafon. Tahan api dan kelembaban.',
                'keyword' => 'wallboard, calcium silicate, partisi, plafon, tahan api',
                'created_at' => $now, 'updated_at' => $now
            ],

            // PU Stone — kategori_id: 4
            [
                'kategori_id'    => 4,
                'nama_series'    => 'Rensa PU Stone Natural',
                'struktur_img'   => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '0.5m2 per piece',
                'material'       => 'Polyurethane foam',
                'ketebalan'      => '20mm - 30mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Batu tiruan PU ringan dengan tampilan natural. Cocok untuk aksen dinding indoor dan outdoor.',
                'keyword' => 'PU stone, batu tiruan, polyurethane, aksen dinding, dekorasi',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Decking Plank — kategori_id: 5
            [
                'kategori_id'    => 5,
                'nama_series'    => 'Rensa Decking Plank WPC',
                'struktur_img'   => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '0.48m2 per piece',
                'material'       => 'WPC (Wood Plastic Composite)',
                'ketebalan'      => '25mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Papan decking WPC untuk teras dan area outdoor. Anti slip, tahan cuaca, dan tampilan natural.',
                'keyword' => 'decking, plank, WPC, outdoor, anti slip',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Plafon — kategori_id: 6
            [
                'kategori_id'    => 6,
                'nama_series'    => 'Rensa Plafon PVC',
                'struktur_img'   => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '0.8m2 per lembar',
                'material'       => 'PVC',
                'ketebalan'      => '8mm',
                'ukuran'         => '2900mm x 160mm',
                'deskripsi_produk' => 'Plafon PVC anti air dan mudah dibersihkan. Tersedia berbagai motif kayu dan polos.',
                'keyword' => 'plafon, PVC, anti air, interior, ceiling',
                'created_at' => $now, 'updated_at' => $now
            ],

            // SPC — kategori_id: 7
            [
                'kategori_id'    => 7,
                'nama_series'    => 'Rensa SPC Flooring',
                'struktur_img'   => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '2.24m2 per box',
                'material'       => 'Stone Plastic Composite',
                'ketebalan'      => '4mm - 5mm',
                'ukuran'         => '2900mm x 140mm',
                'deskripsi_produk' => 'Lantai SPC tahan air dengan click-lock system. Anti gores dan cocok untuk seluruh ruangan.',
                'keyword' => 'SPC, flooring, lantai, tahan air, click lock',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Vinyl — kategori_id: 8
            [
                'kategori_id'    => 8,
                'nama_series'    => 'Rensa Vinyl Flooring',
                'struktur_img'   => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '3.34m2 per box',
                'material'       => 'Luxury Vinyl Plank',
                'ketebalan'      => '2mm - 3mm',
                'ukuran'         => '2900mm x 140mm',
                'deskripsi_produk' => 'Lantai vinyl premium dengan berbagai motif kayu. Nyaman di kaki dan kedap suara.',
                'keyword' => 'vinyl, flooring, lantai, LVP, motif kayu',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Decking Tile — kategori_id: 9
            [
                'kategori_id'    => 9,
                'nama_series'    => 'Rensa Decking Tile',
                'struktur_img'   => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '0.09m2 per tile',
                'material'       => 'WPC interlocking tile',
                'ketebalan'      => '22mm',
                'ukuran'         => '2900mm x 140mm',
                'deskripsi_produk' => 'Tile decking modular untuk balkon dan teras. Sistem interlocking, pasang tanpa lem.',
                'keyword' => 'decking, tile, modular, interlocking, balkon',
                'created_at' => $now, 'updated_at' => $now
            ],

            // Sandblast — kategori_id: 10
            [
                'kategori_id'    => 10,
                'nama_series'    => 'Rensa Sandblast Panel',
                'struktur_img'   => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&h=600&auto=format&fit=crop',
                'cover_area'     => '2.88m2 per lembar',
                'material'       => 'Fiber cement sandblast',
                'ketebalan'      => '8mm',
                'ukuran'         => '1200mm x 2400mm',
                'deskripsi_produk' => 'Panel sandblast fiber cement untuk eksterior. Tekstur premium, tahan cuaca ekstrem.',
                'keyword' => 'sandblast, fiber cement, eksterior, fasad, tekstur',
                'created_at' => $now, 'updated_at' => $now
            ],
        ]);
    }
}
