<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HasilPasang;
use App\Models\Series;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HasilPasangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seriesIds = Series::pluck('id')->toArray();

        if (empty($seriesIds)) {
            return;
        }

        $projects = [
            [
                'nama_project' => 'Rumah Mewah Pondok Indah',
                'id_project' => 'HP001',
                'tanggal' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'foto' => 'https://images.unsplash.com/photo-1600596542815-2250657d2fc5?q=80&w=2000&auto=format&fit=crop', // Placeholder URL
            ],
            [
                'nama_project' => 'Apartemen Sudirman Suite',
                'id_project' => 'HP002',
                'tanggal' => Carbon::now()->subDays(25)->format('Y-m-d'),
                'foto' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2000&auto=format&fit=crop',
            ],
            [
                'nama_project' => 'Villa Puncak Resort',
                'id_project' => 'HP003',
                'tanggal' => Carbon::now()->subMonths(1)->format('Y-m-d'),
                'foto' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000&auto=format&fit=crop',
            ],
            [
                'nama_project' => 'Kantor Pusat Rensa',
                'id_project' => 'HP004',
                'tanggal' => Carbon::now()->subMonths(2)->format('Y-m-d'),
                'foto' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=2000&auto=format&fit=crop',
            ],
        ];

        foreach ($projects as $key => $project) {
            HasilPasang::create([
                'nama_project' => $project['nama_project'],
                'id_project' => $project['id_project'],
                'tanggal' => $project['tanggal'],
                'foto' => $project['foto'],
                'id_series' => $seriesIds[array_rand($seriesIds)],
            ]);
        }
    }
}
