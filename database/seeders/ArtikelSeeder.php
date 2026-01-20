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
                'foto' => 'https://via.placeholder.com/800x600/4F46E5/ffffff?text=Tips+Memilih+Atap',
                'deskripsi' => 'Memilih atap yang tepat adalah keputusan penting dalam pembangunan rumah. Berikut beberapa faktor yang perlu dipertimbangkan: 1) Budget, 2) Iklim setempat, 3) Gaya arsitektur, 4) Daya tahan, 5) Perawatan. Atap metal cocok untuk daerah tropis karena tahan panas dan anti karat, sementara genteng keramik memberikan kesan klasik dan elegan.',
                'hastag_kategori' => 'tips,atap,konstruksi',
                'date' => '2026-01-15',
                'slug' => 'tips-memilih-atap-yang-tepat',
            ],
            [
                'kategori_id' => 2, // Atap Bitumen
                'foto' => 'https://via.placeholder.com/800x600/EC4899/ffffff?text=Atap+Bitumen',
                'deskripsi' => 'Atap bitumen semakin populer untuk bangunan modern karena berbagai keunggulannya. Material ini menawarkan waterproofing yang sempurna, fleksibilitas tinggi, dan mudah dipasang bahkan pada permukaan yang tidak rata. Cocok untuk atap datar, teras, dan berbagai aplikasi waterproofing lainnya.',
                'hastag_kategori' => 'bitumen,waterproofing,modern',
                'date' => '2026-01-10',
                'slug' => 'keunggulan-atap-bitumen',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'foto' => 'https://via.placeholder.com/800x600/10B981/ffffff?text=Perawatan+Atap',
                'deskripsi' => 'Atap metal terkenal dengan daya tahannya, namun tetap memerlukan perawatan berkala. Lakukan inspeksi rutin setiap 6 bulan, bersihkan dari kotoran dan lumut, periksa sekrup dan baut, serta cat ulang jika diperlukan. Dengan perawatan yang tepat, atap metal dapat bertahan hingga 30-50 tahun.',
                'hastag_kategori' => 'perawatan,atap metal,tips',
                'date' => '2026-01-05',
                'slug' => 'panduan-perawatan-atap-metal',
            ],
            [
                'kategori_id' => 4, // Plafon
                'foto' => 'https://via.placeholder.com/800x600/F59E0B/ffffff?text=Desain+Plafon',
                'deskripsi' => 'Plafon tidak hanya berfungsi sebagai penutup langit-langit, tetapi juga elemen penting dalam desain interior. Tren saat ini mencakup plafon dengan pencahayaan tersembunyi, kombinasi material, dan desain bertingkat. Gypsum board sangat fleksibel untuk berbagai kreasi desain modern.',
                'hastag_kategori' => 'plafon,interior,desain',
                'date' => '2025-12-28',
                'slug' => 'tren-desain-plafon-modern',
            ],
            [
                'kategori_id' => 3, // Atap Genteng
                'foto' => 'https://via.placeholder.com/800x600/8B5CF6/ffffff?text=Genteng+Beton',
                'deskripsi' => 'Genteng beton menawarkan solusi atap yang ekonomis tanpa mengorbankan kualitas. Dengan harga lebih terjangkau dibanding genteng keramik, genteng beton memiliki kekuatan yang tinggi dan daya tahan luar biasa. Material ini juga memiliki kemampuan insulasi panas yang baik, membantu menjaga suhu ruangan tetap nyaman.',
                'hastag_kategori' => 'genteng,beton,ekonomis',
                'date' => '2025-12-20',
                'slug' => 'mengapa-genteng-beton-lebih-ekonomis',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
