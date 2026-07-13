<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\WelcomeText;
use Illuminate\Database\Seeder;

class WelcomeTextSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['greeting' => 'Welcome to Rensa Katalog', 'title' => 'Find the Best Roofing Solutions Here',    'is_active' => true],
            ['greeting' => 'Special Offers',           'title' => 'Get 20% Off for New Projects',           'is_active' => false],
            ['greeting' => 'Premium Quality',          'title' => 'Trusted by Thousands of Customers',      'is_active' => false],
            ['greeting' => 'Expert Installation',      'title' => 'Professional Team Ready to Help',        'is_active' => false],
            ['greeting' => 'Wide Selection',           'title' => 'Choose from 100+ Product Variants',      'is_active' => false],
            ['greeting' => 'Warranty Guaranteed',      'title' => 'Up to 25 Years Product Warranty',        'is_active' => false],
            ['greeting' => 'Free Consultation',        'title' => 'Get Expert Advice for Your Project',     'is_active' => false],
            ['greeting' => 'Fast Delivery',            'title' => 'Same Day Delivery Available',            'is_active' => false],
            ['greeting' => 'Eco-Friendly',             'title' => 'Sustainable Building Materials',         'is_active' => false],
            ['greeting' => 'Innovation',               'title' => 'Latest Technology in Roofing',           'is_active' => false],
            ['greeting' => 'Customer Support',         'title' => '24/7 Customer Service Available',        'is_active' => false],
            ['greeting' => 'Competitive Prices',       'title' => 'Best Value for Your Investment',         'is_active' => false],
            ['greeting' => 'Nationwide Coverage',      'title' => 'Serving All Major Cities in Indonesia',  'is_active' => false],
            ['greeting' => 'Quality Certified',        'title' => 'ISO Certified Products',                 'is_active' => false],
            ['greeting' => 'Easy Installation',        'title' => 'Quick and Hassle-Free Setup',            'is_active' => false],
        ];

        foreach ($data as $item) {
            WelcomeText::firstOrCreate(
                ['greeting' => $item['greeting'], 'title' => $item['title']],
                $item
            );
        }
    }
}
