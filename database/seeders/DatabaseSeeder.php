<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            SeriesSeeder::class,
            ProductSeeder::class,
            RumusSeeder::class,
            BannerSeeder::class,
            TokoSeeder::class,
            ArtikelSeeder::class,
            TutorialGambarSeeder::class,
            TutorialVideoSeeder::class,
            WelcomeTextSeeder::class,
            HasilPasangSeeder::class,
        ]);
    }
}
