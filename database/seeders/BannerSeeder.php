<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 1,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 2,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 3,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 4,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 5,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 6,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 7,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 8,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 9,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 10,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687644-aac4c3eac7f4?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 11,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600566752355-35792bedcfea?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 12,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 13,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 14,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=800&h=1067&auto=format&fit=crop',
                'link' => null,
                'urutan' => 15,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
