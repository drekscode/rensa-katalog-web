<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorialVideoSeeder extends Seeder
{
    public function run(): void
    {
        $placeholderUrl = 'https://www.youtube.com/watch?v=dQw4w9WgXcQ';
        $now = now();

        $rows = array_map(
            fn (int $id) => ['kategori_id' => $id, 'link' => $placeholderUrl, 'created_at' => $now, 'updated_at' => $now],
            range(1, 10)
        );

        DB::table('tutorial_video')->insert($rows);
    }
}
