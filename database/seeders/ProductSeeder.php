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
                'thumbnail' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=300&h=300&auto=format&fit=crop', // Red-ish house roof
                'big_pic' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 1,
                'nama_product' => 'Metal Roof Premium - Blue',
                'thumbnail' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=300&h=300&auto=format&fit=crop', // Blue/Modern roof
                'big_pic' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 1,
                'nama_product' => 'Metal Roof Premium - Green',
                'thumbnail' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&h=300&auto=format&fit=crop', // Green/Safe fallback
                'big_pic' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Spandek Pro (series_id: 2)
            [
                'series_id' => 2,
                'nama_product' => 'Spandek Pro - Natural Silver',
                'thumbnail' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=300&h=300&auto=format&fit=crop', // Silver fallback
                'big_pic' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 2,
                'nama_product' => 'Spandek Pro - Dark Grey',
                'thumbnail' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=300&h=300&auto=format&fit=crop', // Grey metal
                'big_pic' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Bitumen Shield (series_id: 3)
            [
                'series_id' => 3,
                'nama_product' => 'Bitumen Shield - Standard Roll',
                'thumbnail' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=300&h=300&auto=format&fit=crop', // Bitumen texture
                'big_pic' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Genteng Keramik (series_id: 4)
            [
                'series_id' => 4,
                'nama_product' => 'Genteng Keramik - Gelombang Merah',
                'thumbnail' => 'https://images.unsplash.com/photo-1555519846-95333f2c525f?q=80&w=300&h=300&auto=format&fit=crop', // Red Clay
                'big_pic' => 'https://images.unsplash.com/photo-1555519846-95333f2c525f?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 4,
                'nama_product' => 'Genteng Keramik - Gelombang Coklat',
                'thumbnail' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=300&h=300&auto=format&fit=crop', // Brown Clay
                'big_pic' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Genteng Beton (series_id: 5)
            [
                'series_id' => 5,
                'nama_product' => 'Genteng Beton - Natural Grey',
                'thumbnail' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&h=300&auto=format&fit=crop', // Concrete fallback
                'big_pic' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 5,
                'nama_product' => 'Genteng Beton - Terracotta',
                'thumbnail' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=300&h=300&auto=format&fit=crop', // Terracotta fallback
                'big_pic' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Gypsum Board (series_id: 6)
            [
                'series_id' => 6,
                'nama_product' => 'Gypsum Board - Standard 9mm',
                'thumbnail' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=300&h=300&auto=format&fit=crop', // Gypsum White
                'big_pic' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 6,
                'nama_product' => 'Gypsum Board - Standard 12mm',
                'thumbnail' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=300&h=300&auto=format&fit=crop', // Gypsum Interior
                'big_pic' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa PVC Ceiling (series_id: 7)
            [
                'series_id' => 7,
                'nama_product' => 'PVC Ceiling - White',
                'thumbnail' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=300&h=300&auto=format&fit=crop', // PVC White fallback
                'big_pic' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            [
                'series_id' => 7,
                'nama_product' => 'PVC Ceiling - Wood Pattern',
                'thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', // Wood pattern fallback
                'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
            
            // Rensa Wall Panel (series_id: 8)
            [
                'series_id' => 8,
                'nama_product' => 'Wall Panel - Cream',
                'thumbnail' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=300&h=300&auto=format&fit=crop', // Wall panel fallback
                'big_pic' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&h=800&auto=format&fit=crop',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
