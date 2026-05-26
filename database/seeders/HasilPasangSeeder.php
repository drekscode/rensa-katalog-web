<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HasilPasang;
use App\Models\Series;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HasilPasangSeeder extends Seeder
{
    public function run(): void
    {
        $seriesIds = Series::pluck('id')->toArray();

        if (empty($seriesIds)) {
            return;
        }

        $projects = [
            ['nama_project' => 'Rumah Mewah Pondok Indah', 'id_project' => 'HP001', 'tanggal' => Carbon::now()->subDays(10)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Apartemen Sudirman Suite', 'id_project' => 'HP002', 'tanggal' => Carbon::now()->subDays(25)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Villa Puncak Resort', 'id_project' => 'HP003', 'tanggal' => Carbon::now()->subMonths(1)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Kantor Pusat Rensa', 'id_project' => 'HP004', 'tanggal' => Carbon::now()->subMonths(2)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Minimalis BSD', 'id_project' => 'HP005', 'tanggal' => Carbon::now()->subMonths(2)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Gedung Perkantoran Kuningan', 'id_project' => 'HP006', 'tanggal' => Carbon::now()->subMonths(3)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Tropis Bali', 'id_project' => 'HP007', 'tanggal' => Carbon::now()->subMonths(3)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Warehouse Cikarang', 'id_project' => 'HP008', 'tanggal' => Carbon::now()->subMonths(4)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Modern Bandung', 'id_project' => 'HP009', 'tanggal' => Carbon::now()->subMonths(4)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Hotel Boutique Yogyakarta', 'id_project' => 'HP010', 'tanggal' => Carbon::now()->subMonths(5)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Klasik Surabaya', 'id_project' => 'HP011', 'tanggal' => Carbon::now()->subMonths(5)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Pabrik Tangerang', 'id_project' => 'HP012', 'tanggal' => Carbon::now()->subMonths(6)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Kontemporer Semarang', 'id_project' => 'HP013', 'tanggal' => Carbon::now()->subMonths(6)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Mall Medan', 'id_project' => 'HP014', 'tanggal' => Carbon::now()->subMonths(7)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Skandinavia Makassar', 'id_project' => 'HP015', 'tanggal' => Carbon::now()->subMonths(7)->format('Y-m-d'), 'foto' => 'https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=2000&auto=format&fit=crop'],
        ];

        $supportPhotos = [
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600210492493-0946911123ea?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600566752355-35792bedcfea?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=1000&auto=format&fit=crop',
        ];

        foreach ($projects as $project) {
            $hp = HasilPasang::create([
                'nama_project' => $project['nama_project'],
                'id_project' => $project['id_project'],
                'tanggal' => $project['tanggal'],
                'foto' => $project['foto'],
                'id_series' => $seriesIds[array_rand($seriesIds)],
            ]);

            // Seed a random number of support collage photos (between 3 and 6)
            $count = rand(3, 6);
            $selectedPhotos = array_slice($supportPhotos, 0, $count);
            shuffle($selectedPhotos);
            foreach ($selectedPhotos as $photoUrl) {
                $hp->images()->create([
                    'foto' => $photoUrl,
                ]);
            }
        }
    }
}
