<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $artikels = [
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Tips Memilih Atap yang Tepat',
                'foto' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop', // House Roof Tips
                'deskripsi' => 'Memilih atap yang tepat adalah keputusan penting dalam pembangunan rumah. Berikut beberapa faktor yang perlu dipertimbangkan: 1) Budget, 2) Iklim setempat, 3) Gaya arsitektur, 4) Daya tahan, 5) Perawatan. Atap metal cocok untuk daerah tropis karena tahan panas dan anti karat, sementara genteng keramik memberikan kesan klasik dan elegan.',
                'hastag_kategori' => 'tips,atap,konstruksi',
                'date' => '2026-01-15',
            ],
            [
                'kategori_id' => 2, // Atap Bitumen
                'judul' => 'Keunggulan Atap Bitumen',
                'foto' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=800&h=600&auto=format&fit=crop', // Bitumen benefits
                'deskripsi' => 'Atap bitumen semakin populer untuk bangunan modern karena berbagai keunggulannya. Material ini menawarkan waterproofing yang sempurna, fleksibilitas tinggi, dan mudah dipasang bahkan pada permukaan yang tidak rata. Cocok for atap datar, teras, dan berbagai aplikasi waterproofing lainnya.',
                'hastag_kategori' => 'bitumen,waterproofing,modern',
                'date' => '2026-01-10',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Panduan Perawatan Atap Metal',
                'foto' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=600&auto=format&fit=crop', // Maintenance/Worker
                'deskripsi' => 'Atap metal terkenal dengan daya tahannya, namun tetap memerlukan perawatan berkala. Lakukan inspeksi rutin setiap 6 bulan, bersihkan dari kotoran dan lumut, periksa sekrup dan baut, serta cat ulang jika diperlukan. Dengan perawatan yang tepat, atap metal dapat bertahan hingga 30-50 tahun.',
                'hastag_kategori' => 'perawatan,atap metal,tips',
                'date' => '2026-01-05',
            ],
            [
                'kategori_id' => 4, // Plafon
                'judul' => 'Tren Desain Plafon Modern',
                'foto' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&h=600&auto=format&fit=crop', // Ceiling Design
                'deskripsi' => 'Plafon tidak hanya berfungsi sebagai penutup langit-langit, tetapi juga elemen penting dalam desain interior. Tren saat ini mencakup plafon dengan pencahayaan tersembunyi, kombinasi material, dan desain bertingkat. Gypsum board sangat fleksibel untuk berbagai kreasi desain modern.',
                'hastag_kategori' => 'plafon,interior,desain',
                'date' => '2025-12-28',
            ],
            [
                'kategori_id' => 3, // Atap Genteng
                'judul' => 'Mengapa Genteng Beton Lebih Ekonomis',
                'foto' => 'https://images.unsplash.com/photo-1628189873995-1031d275713e?q=80&w=800&h=600&auto=format&fit=crop', // Concrete Tile
                'deskripsi' => 'Genteng beton menawarkan solusi atap yang ekonomis tanpa mengorbankan kualitas. Dengan harga lebih terjangkau dibanding genteng keramik, genteng beton memiliki kekuatan yang tinggi dan daya tahan luar biasa. Material ini juga memiliki kemampuan insulasi panas yang baik, membantu menjaga suhu ruangan tetap nyaman.',
                'hastag_kategori' => 'genteng,beton,ekonomis',
                'date' => '2025-12-20',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
