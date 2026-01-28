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
                'banner_image' => 'https://images.unsplash.com/photo-1448630360428-65456885c650?q=80&w=1200&h=400&auto=format&fit=crop', // Modern Architecture
                'link' => null,
                'urutan' => 1,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1631641042533-5c798e2110c7?q=80&w=1200&h=400&auto=format&fit=crop', // Bitumen Texture
                'link' => null,
                'urutan' => 2,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1555519846-95333f2c525f?q=80&w=1200&h=400&auto=format&fit=crop', // Clay Tile Pattern
                'link' => null,
                'urutan' => 3,
            ],
            [
                'banner_image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1200&h=400&auto=format&fit=crop', // Construction Site/Planning
                'link' => null,
                'urutan' => 4,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
