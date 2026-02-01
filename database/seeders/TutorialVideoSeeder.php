<?php

namespace Database\Seeders;

use App\Models\TutorialVideo;
use Illuminate\Database\Seeder;

class TutorialVideoSeeder extends Seeder
{
    public function run(): void
    {
        $tutorials = [
            ['kategori_id' => 1, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 2, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 3, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 4, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 5, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 6, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 7, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 8, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 9, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 10, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 11, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 12, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 13, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 14, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
            ['kategori_id' => 15, 'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'],
        ];

        foreach ($tutorials as $tutorial) {
            TutorialVideo::create($tutorial);
        }
    }
}
