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
                'struktur_img' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=800&h=600&auto=format&fit=crop', // Metal texture fallback
                'cover_area' => '1.62m2 per lembar',
                'material' => 'Zinc-Aluminium coating steel',
                'ketebalan' => '0.25mm - 0.45mm',
                'ukuran' => '800mm x 1800mm',
                'deskripsi_produk' => 'Atap metal premium dengan lapisan zinc-aluminium untuk perlindungan maksimal terhadap korosi. Tersedia dalam berbagai warna dan profil.',
            ],
            [
                'kategori_id' => 1,
                'nama_series' => 'Rensa Spandek Pro',
                'struktur_img' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=800&h=600&auto=format&fit=crop', // Silver/Grey Metal
                'cover_area' => '0.75mm - 1.00mm BMT',
                'material' => 'Galvalume steel',
                'ketebalan' => '0.30mm - 0.50mm',
                'ukuran' => '1000mm x Custom Length',
                'deskripsi_produk' => 'Atap spandek berkualitas tinggi dengan ketahanan korosi superior. Cocok untuk bangunan industri dan komersial.',
            ],
            
            // Atap Bitumen (kategori_id: 2)
            [
                'kategori_id' => 2,
                'nama_series' => 'Rensa Bitumen Shield',
                'struktur_img' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=800&h=600&auto=format&fit=crop', // Bitumen
                'cover_area' => '3m2 per bundle',
                'material' => 'Modified bitumen membrane',
                'ketebalan' => '3mm',
                'ukuran' => '1000mm x 333mm',
                'deskripsi_produk' => 'Membran bitumen modified dengan daya rekat tinggi. Solusi waterproofing terbaik untuk atap datar.',
            ],
            
            // Atap Genteng (kategori_id: 3)
            [
                'kategori_id' => 3,
                'nama_series' => 'Rensa Genteng Keramik',
                'struktur_img' => 'https://images.unsplash.com/photo-1555519846-95333f2c525f?q=80&w=800&h=600&auto=format&fit=crop', // Ceramic
                'cover_area' => '14.5 pcs / m2',
                'material' => 'High quality ceramic',
                'ketebalan' => '12mm',
                'ukuran' => '315mm x 315mm',
                'deskripsi_produk' => 'Genteng keramik dengan finishing glazur. Tahan lama, tidak pudar, dan memberikan kesan mewah.',
            ],
            [
                'kategori_id' => 3,
                'nama_series' => 'Rensa Genteng Beton',
                'struktur_img' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=600&auto=format&fit=crop', // Concrete fallback
                'cover_area' => '10 pcs / m2',
                'material' => 'High strength concrete',
                'ketebalan' => '15mm',
                'ukuran' => '420mm x 330mm',
                'deskripsi_produk' => 'Genteng beton dengan kekuatan tinggi. Ekonomis dan tahan terhadap perubahan cuaca ekstrem.',
            ],
            
            // Plafon (kategori_id: 4)
            [
                'kategori_id' => 4,
                'nama_series' => 'Rensa Gypsum Board',
                'struktur_img' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=800&h=600&auto=format&fit=crop', // Gypsum
                'cover_area' => '2.88m2 per lembar',
                'material' => 'Gypsum core with paper liner',
                'ketebalan' => '9mm',
                'ukuran' => '1200mm x 2400mm',
                'deskripsi_produk' => 'Plafon gypsum berkualitas tinggi untuk interior modern. Permukaan halus dan mudah finishing.',
            ],
            [
                'kategori_id' => 4,
                'nama_series' => 'Rensa PVC Ceiling',
                'struktur_img' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=800&h=600&auto=format&fit=crop', // PVC Wood fallback (using gypsum white for now to work)
                'cover_area' => '0.8m2 per lembar',
                'material' => 'UV resistant PVC',
                'ketebalan' => '8mm',
                'ukuran' => '200mm x 4000mm',
                'deskripsi_produk' => 'Plafon PVC anti air dan mudah dibersihkan. Ideal untuk kamar mandi dan area basah.',
            ],
            
            // Dinding (kategori_id: 5)
            [
                'kategori_id' => 5,
                'nama_series' => 'Rensa Wall Panel',
                'struktur_img' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&h=600&auto=format&fit=crop', // Wall Panel fallback
                'cover_area' => '2.97m2 per lembar',
                'material' => 'Composite sandwich panel',
                'ketebalan' => '50mm',
                'ukuran' => '1000mm x 2970mm',
                'deskripsi_produk' => 'Panel dinding sandwich dengan insulasi thermal. Ringan, kuat, dan cepat dipasang.',
            ],
        ];

        foreach ($series as $item) {
            Series::create($item);
        }
    }
}
