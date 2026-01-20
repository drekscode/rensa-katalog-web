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
                'banner_image' => 'https://via.placeholder.com/1200x400/4F46E5/ffffff?text=Promo+Atap+Metal',
                'slug' => 'promo-atap-metal',
                'link' => null,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/EC4899/ffffff?text=New+Bitumen+Series',
                'slug' => 'new-bitumen-series',
                'link' => null,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/10B981/ffffff?text=Genteng+Berkualitas',
                'slug' => 'genteng-berkualitas',
                'link' => null,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/F59E0B/ffffff?text=Konsultasi+Gratis',
                'slug' => 'konsultasi-gratis',
                'link' => null,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
