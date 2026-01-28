<?php

namespace Database\Seeders;

use App\Models\TutorialGambar;
use Illuminate\Database\Seeder;

class TutorialGambarSeeder extends Seeder
{
    public function run(): void
    {
        $tutorials = [
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Persiapan Area Kerja',
                'gambar' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=600&h=400&auto=format&fit=crop', // Tools/Prep fallback
                'deskripsi' => 'Langkah 1: Persiapan Area Kerja. Bersihkan area atap dari debris dan pastikan struktur kuat. Siapkan alat keselamatan seperti safety harness dan helm.',
                'urutan' => 1,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pasang Rangka',
                'gambar' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=600&h=400&auto=format&fit=crop', // Construction/Structure fallback
                'deskripsi' => 'Langkah 2: Pasang Rangka. Pasang rangka baja ringan atau kayu sesuai spesifikasi. Pastikan jarak antar rangka sesuai dengan rekomendasi produk.',
                'urutan' => 2,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pasang Underlayer',
                'gambar' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=600&h=400&auto=format&fit=crop', // Layers fallback
                'deskripsi' => 'Langkah 3: Pasang Underlayer. Pasang underlayer atau lapisan dasar waterproofing untuk perlindungan ekstra terhadap kebocoran.',
                'urutan' => 3,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Instalasi Atap',
                'gambar' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=600&h=400&auto=format&fit=crop', // Installing Roof Worker fallback
                'deskripsi' => 'Langkah 4: Instalasi Atap. Mulai memasang atap dari bagian bawah ke atas. Pastikan overlap sesuai rekomendasi untuk mencegah kebocoran.',
                'urutan' => 4,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pemasangan Flashing',
                'gambar' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=600&h=400&auto=format&fit=crop', // Detail/Flashing context fallback
                'deskripsi' => 'Langkah 5: Pemasangan Flashing. Pasang flashing di area kritis seperti nok, talang, dan pertemuan dinding untuk mencegah rembesan air.',
                'urutan' => 5,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Finishing dan Inspeksi',
                'gambar' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=600&h=400&auto=format&fit=crop', // Finished House fallback
                'deskripsi' => 'Langkah 6: Finishing dan Inspeksi. Periksa seluruh area atap, pastikan semua sekrup terpasang dengan baik, dan lakukan uji kebocoran.',
                'urutan' => 6,
            ],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialGambar::create($tutorial);
        }
    }
}
