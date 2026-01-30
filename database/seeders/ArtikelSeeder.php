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
                'foto' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Memilih atap yang tepat adalah keputusan penting dalam pembangunan rumah.</p><p>Berikut beberapa faktor yang perlu dipertimbangkan:</p><ol><li>Budget</li><li>Iklim setempat</li><li>Gaya arsitektur</li><li>Daya tahan</li><li>Perawatan.</li></ol><p>Atap metal cocok untuk daerah tropis karena tahan panas dan anti karat, sementara genteng keramik memberikan kesan klasik dan elegan.</p>',
                'hastag_kategori' => 'tips,atap,konstruksi',
                'date' => '2026-01-15',
            ],
            [
                'kategori_id' => 2, // Atap Bitumen
                'judul' => 'Keunggulan Atap Bitumen',
                'foto' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Mengapa Memilih Atap Bitumen?</h3><p>Atap bitumen semakin populer untuk bangunan modern karena berbagai keunggulannya.</p><p>Material ini menawarkan:</p><ul><li><strong>Waterproofing</strong> yang sempurna</li><li><strong>Fleksibilitas</strong> tinggi</li><li><strong>Mudah dipasang</strong> bahkan pada permukaan yang tidak rata</li></ul><p>Cocok untuk atap datar, teras, dan berbagai aplikasi waterproofing lainnya.</p>',
                'hastag_kategori' => 'bitumen,waterproofing,modern',
                'date' => '2026-01-10',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Panduan Perawatan Atap Metal',
                'foto' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Atap metal terkenal dengan daya tahannya, namun tetap memerlukan perawatan berkala.</p><h3>Langkah Perawatan:</h3><ol><li>Lakukan <em>inspeksi rutin</em> setiap 6 bulan</li><li>Bersihkan dari kotoran dan lumut</li><li>Periksa sekrup dan baut</li><li>Cat ulang jika diperlukan</li></ol><blockquote>Dengan perawatan yang tepat, atap metal dapat bertahan hingga 30-50 tahun.</blockquote>',
                'hastag_kategori' => 'perawatan,atap metal,tips',
                'date' => '2026-01-05',
            ],
            [
                'kategori_id' => 4, // Plafon
                'judul' => 'Tren Desain Plafon Modern',
                'foto' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Plafon sebagai Elemen Desain</h3><p>Plafon tidak hanya berfungsi sebagai penutup langit-langit, tetapi juga elemen penting dalam desain interior.</p><p>Tren saat ini mencakup:</p><ul><li>Plafon dengan <strong>pencahayaan tersembunyi</strong></li><li>Kombinasi material</li><li>Desain bertingkat</li></ul><p>Gypsum board sangat fleksibel untuk berbagai kreasi desain modern.</p>',
                'hastag_kategori' => 'plafon,interior,desain',
                'date' => '2025-12-28',
            ],
            [
                'kategori_id' => 3, // Atap Genteng
                'judul' => 'Mengapa Genteng Beton Lebih Ekonomis',
                'foto' => 'https://images.unsplash.com/photo-1628189873995-1031d275713e?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Solusi Atap Ekonomis</h3><p>Genteng beton menawarkan solusi atap yang ekonomis tanpa mengorbankan kualitas.</p><p><strong>Keunggulan Genteng Beton:</strong></p><ul><li>Harga lebih terjangkau dibanding genteng keramik</li><li>Kekuatan tinggi dan daya tahan luar biasa</li><li>Kemampuan insulasi panas yang baik</li><li>Membantu menjaga suhu ruangan tetap nyaman</li></ul>',
                'hastag_kategori' => 'genteng,beton,ekonomis',
                'date' => '2025-12-20',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
