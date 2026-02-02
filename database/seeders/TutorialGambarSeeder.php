<?php

namespace Database\Seeders;

use App\Models\TutorialGambar;
use Illuminate\Database\Seeder;

class TutorialGambarSeeder extends Seeder
{
    public function run(): void
    {
        $tutorials = [
            ['kategori_id' => 1, 'judul' => 'Persiapan Area Kerja', 'gambar' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 1: Persiapan Area Kerja. Bersihkan area atap dari debris dan pastikan struktur kuat. Siapkan alat keselamatan seperti safety harness dan helm.', 'urutan' => 1],
            ['kategori_id' => 1, 'judul' => 'Pasang Rangka', 'gambar' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 2: Pasang Rangka. Pasang rangka baja ringan atau kayu sesuai spesifikasi. Pastikan jarak antar rangka sesuai dengan rekomendasi produk.', 'urutan' => 2],
            ['kategori_id' => 1, 'judul' => 'Pasang Underlayer', 'gambar' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 3: Pasang Underlayer. Pasang underlayer atau lapisan dasar waterproofing untuk perlindungan ekstra terhadap kebocoran.', 'urutan' => 3],
            ['kategori_id' => 1, 'judul' => 'Instalasi Atap', 'gambar' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 4: Instalasi Atap. Mulai memasang atap dari bagian bawah ke atas. Pastikan overlap sesuai rekomendasi untuk mencegah kebocoran.', 'urutan' => 4],
            ['kategori_id' => 1, 'judul' => 'Pemasangan Flashing', 'gambar' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 5: Pemasangan Flashing. Pasang flashing di area kritis seperti nok, talang, dan pertemuan dinding untuk mencegah rembesan air.', 'urutan' => 5],
            ['kategori_id' => 1, 'judul' => 'Finishing dan Inspeksi', 'gambar' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Langkah 6: Finishing dan Inspeksi. Periksa seluruh area atap, pastikan semua sekrup terpasang dengan baik, dan lakukan uji kebocoran.', 'urutan' => 6],
            ['kategori_id' => 2, 'judul' => 'Persiapan Permukaan', 'gambar' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Bersihkan dan ratakan permukaan atap sebelum aplikasi bitumen.', 'urutan' => 1],
            ['kategori_id' => 2, 'judul' => 'Aplikasi Primer', 'gambar' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Aplikasikan primer untuk meningkatkan daya rekat bitumen.', 'urutan' => 2],
            ['kategori_id' => 3, 'judul' => 'Pemasangan Genteng', 'gambar' => 'https://images.unsplash.com/photo-1555519846-95333f2c525f?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang genteng dari bawah ke atas dengan overlap yang tepat.', 'urutan' => 1],
            ['kategori_id' => 4, 'judul' => 'Pemasangan Rangka Plafon', 'gambar' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang rangka metal furring untuk plafon gypsum.', 'urutan' => 1],
            ['kategori_id' => 5, 'judul' => 'Instalasi Panel Dinding', 'gambar' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang panel dinding dengan sistem interlocking.', 'urutan' => 1],
            ['kategori_id' => 6, 'judul' => 'Perakitan Rangka Atap', 'gambar' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Rakit rangka baja ringan sesuai desain struktur.', 'urutan' => 1],
            ['kategori_id' => 7, 'judul' => 'Pemasangan Insulasi', 'gambar' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang insulasi thermal di antara rangka atap.', 'urutan' => 1],
            ['kategori_id' => 8, 'judul' => 'Instalasi Talang Air', 'gambar' => 'https://images.unsplash.com/photo-1621905251918-48416bd8575a?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang talang air dengan kemiringan yang tepat.', 'urutan' => 1],
            ['kategori_id' => 9, 'judul' => 'Pemasangan Fasad ACP', 'gambar' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=600&h=400&auto=format&fit=crop', 'deskripsi' => 'Pasang panel ACP pada rangka fasad.', 'urutan' => 1],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialGambar::create($tutorial);
        }
    }
}
