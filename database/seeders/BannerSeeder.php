<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600585152220-90363fe7e115?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600566752355-35792bedcfea?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&h=1067&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&h=1067&auto=format&fit=crop',
        ];

        foreach ($images as $index => $url) {
            Banner::firstOrCreate(
                ['banner_image' => $url],
                ['link' => null, 'urutan' => $index + 1]
            );
        }
    }
}
