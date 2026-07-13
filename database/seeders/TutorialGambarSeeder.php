<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\TutorialGambar;
use Illuminate\Database\Seeder;

class TutorialGambarSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Wallpanel Indoor/Outdoor — kategori_id: 1
            ['kategori_id' => 1, 'urutan' => 1, 'judul' => 'Persiapan Dinding',         'gambar' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Bersihkan permukaan dinding dan pastikan rata sebelum pemasangan wallpanel.'],
            ['kategori_id' => 1, 'urutan' => 2, 'judul' => 'Pasang Rangka Batang',      'gambar' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang rangka batang dengan jarak sesuai spesifikasi produk.'],
            ['kategori_id' => 1, 'urutan' => 3, 'judul' => 'Instalasi Panel',           'gambar' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang wallpanel dari bawah ke atas dengan sistem interlocking.'],

            // UVM — kategori_id: 2
            ['kategori_id' => 2, 'urutan' => 1, 'judul' => 'Persiapan Permukaan',       'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pastikan dinding bersih dan kering sebelum pemasangan UVM.'],
            ['kategori_id' => 2, 'urutan' => 2, 'judul' => 'Pemasangan UVM Panel',      'gambar' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang panel UVM dengan lem khusus atau sistem batang.'],

            // Wallboard — kategori_id: 3
            ['kategori_id' => 3, 'urutan' => 1, 'judul' => 'Pemasangan Wallboard',      'gambar' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang wallboard pada rangka metal atau kayu dengan sekrup.'],

            // PU Stone — kategori_id: 4
            ['kategori_id' => 4, 'urutan' => 1, 'judul' => 'Pemasangan PU Stone',       'gambar' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Tempelkan PU Stone dengan lem khusus pada permukaan dinding.'],

            // Decking Plank — kategori_id: 5
            ['kategori_id' => 5, 'urutan' => 1, 'judul' => 'Persiapan Area Decking',    'gambar' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Ratakan dan padatkan area pemasangan decking.'],
            ['kategori_id' => 5, 'urutan' => 2, 'judul' => 'Instalasi Decking Plank',   'gambar' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang decking plank pada rangka dengan clip system.'],

            // Plafon — kategori_id: 6
            ['kategori_id' => 6, 'urutan' => 1, 'judul' => 'Pasang Rangka Plafon',      'gambar' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang rangka metal furring untuk plafon PVC.'],

            // SPC — kategori_id: 7
            ['kategori_id' => 7, 'urutan' => 1, 'judul' => 'Instalasi SPC Flooring',    'gambar' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang SPC flooring dengan click-lock system dari sisi ruangan.'],

            // Vinyl — kategori_id: 8
            ['kategori_id' => 8, 'urutan' => 1, 'judul' => 'Pemasangan Vinyl',          'gambar' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang vinyl flooring dengan lem atau self-adhesive backing.'],

            // Decking Tile — kategori_id: 9
            ['kategori_id' => 9, 'urutan' => 1, 'judul' => 'Pemasangan Decking Tile',   'gambar' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang decking tile dengan sistem interlocking di area balkon.'],

            // Sandblast — kategori_id: 10
            ['kategori_id' => 10, 'urutan' => 1, 'judul' => 'Instalasi Sandblast Panel','gambar' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang panel sandblast pada rangka dinding eksterior.'],
        ];

        foreach ($data as $item) {
            TutorialGambar::firstOrCreate(
                ['kategori_id' => $item['kategori_id'], 'judul' => $item['judul']],
                $item
            );
        }
    }
}
