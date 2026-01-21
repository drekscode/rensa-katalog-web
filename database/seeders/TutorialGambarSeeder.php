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
                'gambar' => 'https://via.placeholder.com/600x400/4F46E5/ffffff?text=Persiapan+Area',
                'deskripsi' => 'Langkah 1: Persiapan Area Kerja. Bersihkan area atap dari debris dan pastikan struktur kuat. Siapkan alat keselamatan seperti safety harness dan helm.',
                'urutan' => 1,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pasang Rangka',
                'gambar' => 'https://via.placeholder.com/600x400/EC4899/ffffff?text=Pasang+Rangka',
                'deskripsi' => 'Langkah 2: Pasang Rangka. Pasang rangka baja ringan atau kayu sesuai spesifikasi. Pastikan jarak antar rangka sesuai dengan rekomendasi produk.',
                'urutan' => 2,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pasang Underlayer',
                'gambar' => 'https://via.placeholder.com/600x400/10B981/ffffff?text=Underlayer',
                'deskripsi' => 'Langkah 3: Pasang Underlayer. Pasang underlayer atau lapisan dasar waterproofing untuk perlindungan ekstra terhadap kebocoran.',
                'urutan' => 3,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Instalasi Atap',
                'gambar' => 'https://via.placeholder.com/600x400/F59E0B/ffffff?text=Instalasi+Atap',
                'deskripsi' => 'Langkah 4: Instalasi Atap. Mulai memasang atap dari bagian bawah ke atas. Pastikan overlap sesuai rekomendasi untuk mencegah kebocoran.',
                'urutan' => 4,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Pemasangan Flashing',
                'gambar' => 'https://via.placeholder.com/600x400/8B5CF6/ffffff?text=Flashing',
                'deskripsi' => 'Langkah 5: Pemasangan Flashing. Pasang flashing di area kritis seperti nok, talang, dan pertemuan dinding untuk mencegah rembesan air.',
                'urutan' => 5,
            ],
            [
                'kategori_id' => 1, // Atap Metal
                'judul' => 'Finishing dan Inspeksi',
                'gambar' => 'https://via.placeholder.com/600x400/3B82F6/ffffff?text=Inspeksi',
                'deskripsi' => 'Langkah 6: Finishing dan Inspeksi. Periksa seluruh area atap, pastikan semua sekrup terpasang dengan baik, dan lakukan uji kebocoran.',
                'urutan' => 6,
            ],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialGambar::create($tutorial);
        }
    }
}
