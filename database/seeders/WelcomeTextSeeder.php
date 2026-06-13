<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WelcomeTextSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('welcome_texts')->insert([
            ['greeting' => 'Welcome to Rensa Katalog', 'title' => 'Find the Best Roofing Solutions Here',    'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Special Offers',           'title' => 'Get 20% Off for New Projects',           'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Premium Quality',          'title' => 'Trusted by Thousands of Customers',      'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Expert Installation',      'title' => 'Professional Team Ready to Help',        'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Wide Selection',           'title' => 'Choose from 100+ Product Variants',      'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Warranty Guaranteed',      'title' => 'Up to 25 Years Product Warranty',        'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Free Consultation',        'title' => 'Get Expert Advice for Your Project',     'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Fast Delivery',            'title' => 'Same Day Delivery Available',            'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Eco-Friendly',             'title' => 'Sustainable Building Materials',         'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Innovation',               'title' => 'Latest Technology in Roofing',           'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Customer Support',         'title' => '24/7 Customer Service Available',        'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Competitive Prices',       'title' => 'Best Value for Your Investment',         'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Nationwide Coverage',      'title' => 'Serving All Major Cities in Indonesia',  'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Quality Certified',        'title' => 'ISO Certified Products',                 'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
            ['greeting' => 'Easy Installation',        'title' => 'Quick and Hassle-Free Setup',            'is_active' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
