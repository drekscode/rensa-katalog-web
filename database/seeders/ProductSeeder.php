<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Rensa Metal Roof Premium (series_id: 1)
            [
                'series_id' => 1,
                'nama_product' => 'Metal Roof Premium - Red',
                'thumbnail' => 'https://via.placeholder.com/300x300/DC2626/ffffff?text=Red',
                'big_pic' => 'https://via.placeholder.com/1200x800/DC2626/ffffff?text=Metal+Roof+Red',
            ],
            [
                'series_id' => 1,
                'nama_product' => 'Metal Roof Premium - Blue',
                'thumbnail' => 'https://via.placeholder.com/300x300/2563EB/ffffff?text=Blue',
                'big_pic' => 'https://via.placeholder.com/1200x800/2563EB/ffffff?text=Metal+Roof+Blue',
            ],
            [
                'series_id' => 1,
                'nama_product' => 'Metal Roof Premium - Green',
                'thumbnail' => 'https://via.placeholder.com/300x300/059669/ffffff?text=Green',
                'big_pic' => 'https://via.placeholder.com/1200x800/059669/ffffff?text=Metal+Roof+Green',
            ],
            
            // Rensa Spandek Pro (series_id: 2)
            [
                'series_id' => 2,
                'nama_product' => 'Spandek Pro - Natural Silver',
                'thumbnail' => 'https://via.placeholder.com/300x300/94A3B8/ffffff?text=Silver',
                'big_pic' => 'https://via.placeholder.com/1200x800/94A3B8/ffffff?text=Spandek+Silver',
            ],
            [
                'series_id' => 2,
                'nama_product' => 'Spandek Pro - Dark Grey',
                'thumbnail' => 'https://via.placeholder.com/300x300/475569/ffffff?text=Grey',
                'big_pic' => 'https://via.placeholder.com/1200x800/475569/ffffff?text=Spandek+Grey',
            ],
            
            // Rensa Bitumen Shield (series_id: 3)
            [
                'series_id' => 3,
                'nama_product' => 'Bitumen Shield - Standard Roll',
                'thumbnail' => 'https://via.placeholder.com/300x300/1F2937/ffffff?text=Bitumen',
                'big_pic' => 'https://via.placeholder.com/1200x800/1F2937/ffffff?text=Bitumen+Roll',
            ],
            
            // Rensa Genteng Keramik (series_id: 4)
            [
                'series_id' => 4,
                'nama_product' => 'Genteng Keramik - Gelombang Merah',
                'thumbnail' => 'https://via.placeholder.com/300x300/B91C1C/ffffff?text=Ceramic+Red',
                'big_pic' => 'https://via.placeholder.com/1200x800/B91C1C/ffffff?text=Genteng+Merah',
            ],
            [
                'series_id' => 4,
                'nama_product' => 'Genteng Keramik - Gelombang Coklat',
                'thumbnail' => 'https://via.placeholder.com/300x300/92400E/ffffff?text=Ceramic+Brown',
                'big_pic' => 'https://via.placeholder.com/1200x800/92400E/ffffff?text=Genteng+Coklat',
            ],
            
            // Rensa Genteng Beton (series_id: 5)
            [
                'series_id' => 5,
                'nama_product' => 'Genteng Beton - Natural Grey',
                'thumbnail' => 'https://via.placeholder.com/300x300/6B7280/ffffff?text=Concrete',
                'big_pic' => 'https://via.placeholder.com/1200x800/6B7280/ffffff?text=Genteng+Beton',
            ],
            [
                'series_id' => 5,
                'nama_product' => 'Genteng Beton - Terracotta',
                'thumbnail' => 'https://via.placeholder.com/300x300/D97706/ffffff?text=Terracotta',
                'big_pic' => 'https://via.placeholder.com/1200x800/D97706/ffffff?text=Genteng+Terracotta',
            ],
            
            // Rensa Gypsum Board (series_id: 6)
            [
                'series_id' => 6,
                'nama_product' => 'Gypsum Board - Standard 9mm',
                'thumbnail' => 'https://via.placeholder.com/300x300/F3F4F6/1F2937?text=Gypsum+9mm',
                'big_pic' => 'https://via.placeholder.com/1200x800/F3F4F6/1F2937?text=Gypsum+Board+9mm',
            ],
            [
                'series_id' => 6,
                'nama_product' => 'Gypsum Board - Standard 12mm',
                'thumbnail' => 'https://via.placeholder.com/300x300/F3F4F6/1F2937?text=Gypsum+12mm',
                'big_pic' => 'https://via.placeholder.com/1200x800/F3F4F6/1F2937?text=Gypsum+Board+12mm',
            ],
            
            // Rensa PVC Ceiling (series_id: 7)
            [
                'series_id' => 7,
                'nama_product' => 'PVC Ceiling - White',
                'thumbnail' => 'https://via.placeholder.com/300x300/FFFFFF/1F2937?text=PVC+White',
                'big_pic' => 'https://via.placeholder.com/1200x800/FFFFFF/1F2937?text=PVC+Ceiling+White',
            ],
            [
                'series_id' => 7,
                'nama_product' => 'PVC Ceiling - Wood Pattern',
                'thumbnail' => 'https://via.placeholder.com/300x300/78350F/ffffff?text=PVC+Wood',
                'big_pic' => 'https://via.placeholder.com/1200x800/78350F/ffffff?text=PVC+Wood+Pattern',
            ],
            
            // Rensa Wall Panel (series_id: 8)
            [
                'series_id' => 8,
                'nama_product' => 'Wall Panel - Cream',
                'thumbnail' => 'https://via.placeholder.com/300x300/FEF3C7/1F2937?text=Panel+Cream',
                'big_pic' => 'https://via.placeholder.com/1200x800/FEF3C7/1F2937?text=Wall+Panel+Cream',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
