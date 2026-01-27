<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    public function run(): void
    {
        $series = [
            // Atap Metal (kategori_id: 1)
            [
                'kategori_id' => 1,
                'nama_series' => 'Rensa Metal Roof Premium',
                'struktur_img' => 'https://via.placeholder.com/800x600/4F46E5/ffffff?text=Metal+Roof+Structure',
                'cover_area' => '1.62m2 per lembar',
                'material' => 'Zinc-Aluminium coating steel',
                'deskripsi_produk' => 'Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.',
            ],
            [
                'kategori_id' => 1,
                'nama_series' => 'Rensa Spandek Pro',
                'struktur_img' => 'https://via.placeholder.com/800x600/7C3AED/ffffff?text=Spandek+Structure',
                'cover_area' => '0.75mm - 1.00mm BMT',
                'material' => 'Galvalume steel',
                'deskripsi_produk' => 'Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.',
            ],
            
            // Atap Bitumen (kategori_id: 2)
            [
                'kategori_id' => 2,
                'nama_series' => 'Rensa Bitumen Shield',
                'struktur_img' => 'https://via.placeholder.com/800x600/EC4899/ffffff?text=Bitumen+Shield',
                'cover_area' => '3m2 per bundle',
                'material' => 'Modified bitumen membrane',
                'deskripsi_produk' => 'Membran bitumen modified dengan daya rekat tinggi. Solusi waterproofing terbaik untuk atap datar.',
            ],
            
            // Atap Genteng (kategori_id: 3)
            [
                'kategori_id' => 3,
                'nama_series' => 'Rensa Genteng Keramik',
                'struktur_img' => 'https://via.placeholder.com/800x600/F59E0B/ffffff?text=Ceramic+Tile',
                'cover_area' => '14.5 pcs / m2',
                'material' => 'High quality ceramic',
                'deskripsi_produk' => 'Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.',
            ],
            [
                'kategori_id' => 3,
                'nama_series' => 'Rensa Genteng Beton',
                'struktur_img' => 'https://via.placeholder.com/800x600/10B981/ffffff?text=Concrete+Tile',
                'cover_area' => '10 pcs / m2',
                'material' => 'High strength concrete',
                'deskripsi_produk' => 'Genteng beton dengan kekuatan tinggi. Ekonomis dan tahan terhadap perubahan cuaca ekstrem.',
            ],
            
            // Plafon (kategori_id: 4)
            [
                'kategori_id' => 4,
                'nama_series' => 'Rensa Gypsum Board',
                'struktur_img' => 'https://via.placeholder.com/800x600/3B82F6/ffffff?text=Gypsum+Board',
                'cover_area' => '2.88m2 per lembar',
                'material' => 'Gypsum core with paper liner',
                'deskripsi_produk' => 'Plafon gypsum berkualitas tinggi untuk interior modern. Permukaan halus dan mudah finishing.',
            ],
            [
                'kategori_id' => 4,
                'nama_series' => 'Rensa PVC Ceiling',
                'struktur_img' => 'https://via.placeholder.com/800x600/8B5CF6/ffffff?text=PVC+Ceiling',
                'cover_area' => '0.8m2 per lembar',
                'material' => 'UV resistant PVC',
                'deskripsi_produk' => 'Plafon PVC anti air dan mudah dibersihkan. Ideal untuk kamar mandi dan area basah.',
            ],
            
            // Dinding (kategori_id: 5)
            [
                'kategori_id' => 5,
                'nama_series' => 'Rensa Wall Panel',
                'struktur_img' => 'https://via.placeholder.com/800x600/EF4444/ffffff?text=Wall+Panel',
                'cover_area' => '2.97m2 per lembar',
                'material' => 'Composite sandwich panel',
                'deskripsi_produk' => 'Panel dinding sandwich dengan insulasi thermal. Ringan, kuat, dan cepat dipasang.',
            ],
        ];

        foreach ($series as $item) {
            Series::create($item);
        }
    }
}
