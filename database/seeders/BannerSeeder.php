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
                'link' => null,
                'urutan' => 1,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/EC4899/ffffff?text=New+Bitumen+Series',
                'link' => null,
                'urutan' => 2,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/10B981/ffffff?text=Genteng+Berkualitas',
                'link' => null,
                'urutan' => 3,
            ],
            [
                'banner_image' => 'https://via.placeholder.com/1200x400/F59E0B/ffffff?text=Konsultasi+Gratis',
                'link' => null,
                'urutan' => 4,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
