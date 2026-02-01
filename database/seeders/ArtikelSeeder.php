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
                'kategori_id' => 1,
                'judul' => 'Tips Memilih Atap yang Tepat',
                'foto' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Memilih atap yang tepat adalah keputusan penting dalam pembangunan rumah.</p><p>Berikut beberapa faktor yang perlu dipertimbangkan:</p><ol><li>Budget</li><li>Iklim setempat</li><li>Gaya arsitektur</li><li>Daya tahan</li><li>Perawatan.</li></ol><p>Atap metal cocok untuk daerah tropis karena tahan panas dan anti karat, sementara genteng keramik memberikan kesan klasik dan elegan.</p>',
                'hastag_kategori' => 'tips,atap,konstruksi',
                'date' => '2026-01-15',
            ],
            [
                'kategori_id' => 2,
                'judul' => 'Keunggulan Atap Bitumen',
                'foto' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Mengapa Memilih Atap Bitumen?</h3><p>Atap bitumen semakin populer untuk bangunan modern karena berbagai keunggulannya.</p><p>Material ini menawarkan:</p><ul><li><strong>Waterproofing</strong> yang sempurna</li><li><strong>Fleksibilitas</strong> tinggi</li><li><strong>Mudah dipasang</strong> bahkan pada permukaan yang tidak rata</li></ul><p>Cocok untuk atap datar, teras, dan berbagai aplikasi waterproofing lainnya.</p>',
                'hastag_kategori' => 'bitumen,waterproofing,modern',
                'date' => '2026-01-10',
            ],
            [
                'kategori_id' => 1,
                'judul' => 'Panduan Perawatan Atap Metal',
                'foto' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Atap metal terkenal dengan daya tahannya, namun tetap memerlukan perawatan berkala.</p><h3>Langkah Perawatan:</h3><ol><li>Lakukan <em>inspeksi rutin</em> setiap 6 bulan</li><li>Bersihkan dari kotoran dan lumut</li><li>Periksa sekrup dan baut</li><li>Cat ulang jika diperlukan</li></ol><blockquote>Dengan perawatan yang tepat, atap metal dapat bertahan hingga 30-50 tahun.</blockquote>',
                'hastag_kategori' => 'perawatan,atap metal,tips',
                'date' => '2026-01-05',
            ],
            [
                'kategori_id' => 4,
                'judul' => 'Tren Desain Plafon Modern',
                'foto' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Plafon sebagai Elemen Desain</h3><p>Plafon tidak hanya berfungsi sebagai penutup langit-langit, tetapi juga elemen penting dalam desain interior.</p><p>Tren saat ini mencakup:</p><ul><li>Plafon dengan <strong>pencahayaan tersembunyi</strong></li><li>Kombinasi material</li><li>Desain bertingkat</li></ul><p>Gypsum board sangat fleksibel untuk berbagai kreasi desain modern.</p>',
                'hastag_kategori' => 'plafon,interior,desain',
                'date' => '2025-12-28',
            ],
            [
                'kategori_id' => 3,
                'judul' => 'Mengapa Genteng Beton Lebih Ekonomis',
                'foto' => 'https://images.unsplash.com/photo-1628189873995-1031d275713e?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Solusi Atap Ekonomis</h3><p>Genteng beton menawarkan solusi atap yang ekonomis tanpa mengorbankan kualitas.</p><p><strong>Keunggulan Genteng Beton:</strong></p><ul><li>Harga lebih terjangkau dibanding genteng keramik</li><li>Kekuatan tinggi dan daya tahan luar biasa</li><li>Kemampuan insulasi panas yang baik</li><li>Membantu menjaga suhu ruangan tetap nyaman</li></ul>',
                'hastag_kategori' => 'genteng,beton,ekonomis',
                'date' => '2025-12-20',
            ],
            [
                'kategori_id' => 6,
                'judul' => 'Keunggulan Rangka Baja Ringan',
                'foto' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Rangka baja ringan menjadi pilihan utama untuk konstruksi modern.</p><h3>Keunggulan:</h3><ul><li>Ringan namun kuat</li><li>Tahan karat dan rayap</li><li>Presisi tinggi</li><li>Instalasi cepat</li></ul>',
                'hastag_kategori' => 'rangka,baja ringan,konstruksi',
                'date' => '2025-12-15',
            ],
            [
                'kategori_id' => 7,
                'judul' => 'Pentingnya Insulasi Thermal',
                'foto' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Hemat Energi dengan Insulasi</h3><p>Insulasi thermal dapat mengurangi biaya listrik hingga 40%.</p><p>Manfaat:</p><ul><li>Menjaga suhu ruangan</li><li>Kedap suara</li><li>Tahan api</li></ul>',
                'hastag_kategori' => 'insulasi,hemat energi,thermal',
                'date' => '2025-12-10',
            ],
            [
                'kategori_id' => 8,
                'judul' => 'Sistem Talang Air yang Efektif',
                'foto' => 'https://images.unsplash.com/photo-1621905251918-48416bd8575a?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Sistem talang air yang baik melindungi fondasi bangunan dari kerusakan air.</p><h3>Tips Pemilihan:</h3><ol><li>Pilih material tahan karat</li><li>Ukuran sesuai luas atap</li><li>Pemasangan dengan kemiringan tepat</li></ol>',
                'hastag_kategori' => 'talang,drainase,waterproofing',
                'date' => '2025-12-05',
            ],
            [
                'kategori_id' => 9,
                'judul' => 'Tren Fasad Modern 2026',
                'foto' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Fasad sebagai Identitas Bangunan</h3><p>Fasad modern menggunakan material ACP dengan berbagai pilihan warna dan tekstur.</p><p>Keunggulan ACP:</p><ul><li>Ringan dan mudah dipasang</li><li>Tahan cuaca ekstrem</li><li>Tampilan premium</li></ul>',
                'hastag_kategori' => 'fasad,ACP,modern',
                'date' => '2025-11-28',
            ],
            [
                'kategori_id' => 10,
                'judul' => 'Memilih Kanopi yang Tepat',
                'foto' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Kanopi melindungi area outdoor dari panas dan hujan.</p><h3>Jenis Kanopi:</h3><ul><li>Polycarbonate - Transparan dan kuat</li><li>Alderon - Ekonomis</li><li>Kaca - Premium</li></ul>',
                'hastag_kategori' => 'kanopi,outdoor,polycarbonate',
                'date' => '2025-11-20',
            ],
            [
                'kategori_id' => 11,
                'judul' => 'Decking WPC untuk Outdoor',
                'foto' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Flooring Outdoor Tahan Lama</h3><p>WPC (Wood Plastic Composite) menggabungkan keindahan kayu dengan ketahanan plastik.</p><p>Keunggulan:</p><ul><li>Anti rayap</li><li>Tahan air</li><li>Perawatan minimal</li></ul>',
                'hastag_kategori' => 'decking,WPC,outdoor',
                'date' => '2025-11-15',
            ],
            [
                'kategori_id' => 12,
                'judul' => 'Sistem Partisi Modern',
                'foto' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Partisi modern memungkinkan fleksibilitas ruangan dengan insulasi suara yang baik.</p><h3>Keunggulan:</h3><ul><li>Cepat dipasang</li><li>Dapat dibongkar pasang</li><li>Kedap suara</li></ul>',
                'hastag_kategori' => 'partisi,interior,modular',
                'date' => '2025-11-10',
            ],
            [
                'kategori_id' => 13,
                'judul' => 'Skylight untuk Pencahayaan Alami',
                'foto' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Hemat Listrik dengan Skylight</h3><p>Skylight memberikan pencahayaan alami yang optimal.</p><p>Manfaat:</p><ul><li>Hemat energi</li><li>Ruangan lebih terang</li><li>Ventilasi udara</li></ul>',
                'hastag_kategori' => 'skylight,pencahayaan,hemat energi',
                'date' => '2025-11-05',
            ],
            [
                'kategori_id' => 14,
                'judul' => 'Aksesoris Atap yang Penting',
                'foto' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<p>Aksesoris atap melengkapi sistem atap untuk hasil sempurna.</p><h3>Komponen Penting:</h3><ol><li>Nok atap</li><li>Flashing</li><li>Sekrup khusus</li><li>Sealant</li></ol>',
                'hastag_kategori' => 'aksesoris,atap,komponen',
                'date' => '2025-10-28',
            ],
            [
                'kategori_id' => 15,
                'judul' => 'Waterproofing untuk Area Basah',
                'foto' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=800&h=600&auto=format&fit=crop',
                'deskripsi' => '<h3>Perlindungan Anti Bocor</h3><p>Waterproofing melindungi area basah dari kebocoran.</p><p>Aplikasi:</p><ul><li>Kamar mandi</li><li>Dapur</li><li>Balkon</li><li>Basement</li></ul>',
                'hastag_kategori' => 'waterproofing,anti bocor,area basah',
                'date' => '2025-10-20',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
