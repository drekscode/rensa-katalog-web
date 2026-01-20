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
                'gambar' => 'https://via.placeholder.com/600x400/4F46E5/ffffff?text=Persiapan+Area',
                'deskripsi' => 'Langkah 1: Persiapan Area Kerja. Bersihkan area atap dari debris dan pastikan struktur kuat. Siapkan alat keselamatan seperti safety harness dan helm.',
                'slug' => 'langkah-1-persiapan-area',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'gambar' => 'https://via.placeholder.com/600x400/EC4899/ffffff?text=Pasang+Rangka',
                'deskripsi' => 'Langkah 2: Pasang Rangka. Pasang rangka baja ringan atau kayu sesuai spesifikasi. Pastikan jarak antar rangka sesuai dengan rekomendasi produk.',
                'slug' => 'langkah-2-pasang-rangka',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'gambar' => 'https://via.placeholder.com/600x400/10B981/ffffff?text=Underlayer',
                'deskripsi' => 'Langkah 3: Pasang Underlayer. Pasang underlayer atau lapisan dasar waterproofing untuk perlindungan ekstra terhadap kebocoran.',
                'slug' => 'langkah-3-underlayer',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'gambar' => 'https://via.placeholder.com/600x400/F59E0B/ffffff?text=Instalasi+Atap',
                'deskripsi' => 'Langkah 4: Instalasi Atap. Mulai memasang atap dari bagian bawah ke atas. Pastikan overlap sesuai rekomendasi untuk mencegah kebocoran.',
                'slug' => 'langkah-4-instalasi-atap',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'gambar' => 'https://via.placeholder.com/600x400/8B5CF6/ffffff?text=Flashing',
                'deskripsi' => 'Langkah 5: Pemasangan Flashing. Pasang flashing di area kritis seperti nok, talang, dan pertemuan dinding untuk mencegah rembesan air.',
                'slug' => 'langkah-5-flashing',
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'gambar' => 'https://via.placeholder.com/600x400/3B82F6/ffffff?text=Inspeksi',
                'deskripsi' => 'Langkah 6: Finishing dan Inspeksi. Periksa seluruh area atap, pastikan semua sekrup terpasang dengan baik, dan lakukan uji kebocoran.',
                'slug' => 'langkah-6-inspeksi',
            ],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialGambar::create($tutorial);
        }
    }
}
