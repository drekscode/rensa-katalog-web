<?php

namespace Database\Seeders;

use App\Models\TutorialVideo;
use Illuminate\Database\Seeder;

class TutorialVideoSeeder extends Seeder
{
    public function run(): void
    {
        $tutorials = [
            [
                'kategori_id' => 1, // Atap Metal
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'kategori_id' => 2, // Atap Bitumen
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'kategori_id' => 3, // Atap Genteng
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'kategori_id' => 4, // Plafon
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'kategori_id' => 1, // Atap Metal - Calculator
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialVideo::create($tutorial);
        }
    }
}
