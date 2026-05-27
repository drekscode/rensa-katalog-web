<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\HasilPasang;
use App\Models\Series;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HasilPasangSeeder extends Seeder
{
    public function run(): void
    {
        $seriesIds = Series::pluck('id')->toArray();

        if (empty($seriesIds)) {
            return;
        }

        $projects = [
            ['nama_project' => 'Rumah Mewah Pondok Indah',      'id_project' => 'HP001', 'days' => 10,  'foto' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Apartemen Sudirman Suite',       'id_project' => 'HP002', 'days' => 25,  'foto' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Villa Puncak Resort',            'id_project' => 'HP003', 'days' => 30,  'foto' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Kantor Pusat Rensa',             'id_project' => 'HP004', 'days' => 60,  'foto' => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Minimalis BSD',            'id_project' => 'HP005', 'days' => 60,  'foto' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Gedung Perkantoran Kuningan',    'id_project' => 'HP006', 'days' => 90,  'foto' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Tropis Bali',              'id_project' => 'HP007', 'days' => 90,  'foto' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Warehouse Cikarang',             'id_project' => 'HP008', 'days' => 120, 'foto' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Modern Bandung',           'id_project' => 'HP009', 'days' => 120, 'foto' => 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Hotel Boutique Yogyakarta',      'id_project' => 'HP010', 'days' => 150, 'foto' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Klasik Surabaya',          'id_project' => 'HP011', 'days' => 150, 'foto' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Pabrik Tangerang',               'id_project' => 'HP012', 'days' => 180, 'foto' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Kontemporer Semarang',     'id_project' => 'HP013', 'days' => 180, 'foto' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Mall Medan',                     'id_project' => 'HP014', 'days' => 210, 'foto' => 'https://images.unsplash.com/photo-1600585152220-90363fe7e115?q=80&w=2000&auto=format&fit=crop'],
            ['nama_project' => 'Rumah Skandinavia Makassar',     'id_project' => 'HP015', 'days' => 210, 'foto' => 'https://images.unsplash.com/photo-1600573472592-401b489a3cdc?q=80&w=2000&auto=format&fit=crop'],
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
                'id_project'   => $project['id_project'],
                'tanggal'      => Carbon::now()->subDays($project['days'])->format('Y-m-d'),
                'foto'         => $project['foto'],
                'id_series'    => $seriesIds[array_rand($seriesIds)],
            ]);

            $count = rand(3, 6);
            $shuffled = $supportPhotos;
            shuffle($shuffled);

            foreach (array_slice($shuffled, 0, $count) as $photoUrl) {
                $hp->images()->create(['foto' => $photoUrl]);
            }
        }
    }
}
