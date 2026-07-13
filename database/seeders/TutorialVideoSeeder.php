<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\TutorialVideo;
use Illuminate\Database\Seeder;

class TutorialVideoSeeder extends Seeder
{
    public function run(): void
    {
        $placeholderUrl = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';

        foreach (range(1, 10) as $id) {
            TutorialVideo::firstOrCreate(
                ['kategori_id' => $id],
                ['link' => $placeholderUrl]
            );
        }
    }
}
