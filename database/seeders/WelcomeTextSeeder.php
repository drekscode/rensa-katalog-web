<?php

namespace Database\Seeders;

use App\Models\WelcomeText;
use Illuminate\Database\Seeder;

class WelcomeTextSeeder extends Seeder
{
    public function run(): void
    {
        WelcomeText::create([
            'greeting' => 'Welcome to Rensa Katalog',
            'title' => 'Find the Best Roofing Solutions Here',
            'is_active' => true,
        ]);
        
        WelcomeText::create([
            'greeting' => 'Special Offers',
            'title' => 'Get 20% Off for New Projects',
            'is_active' => false,
        ]);
    }
}
