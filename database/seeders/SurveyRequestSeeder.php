<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SurveyRequest;
use Illuminate\Database\Seeder;

class SurveyRequestSeeder extends Seeder
{
    public function run(): void
    {
        $requests = [
            [
                'nama' => 'Budi Santoso',
                'alamat' => "Jl. Kemang Raya No. 45\nJakarta Selatan, DKI Jakarta",
                'kontak' => '081234567890',
                'ruangan' => 'Living Room: 6m x 4m. Need to estimate vinyl flooring layout and alignment.',
                'status' => 'pending',
                'dp_survey' => 50000,
            ],
            [
                'nama' => 'Siti Aminah',
                'alamat' => "Apartemen Mediterania Garden Residence Tower B Lt. 12\nJakarta Barat, DKI Jakarta",
                'kontak' => '087798765432',
                'ruangan' => 'Master Bedroom: 4m x 3.5m. Needs SPC flooring estimation.',
                'status' => 'scheduled',
                'dp_survey' => 50000,
            ],
            [
                'nama' => 'David Wijaya',
                'alamat' => "Cluster Eucalyptus Blok C5 No. 8, BSD City\nTangerang Selatan, Banten",
                'kontak' => '081987654321',
                'ruangan' => 'Kitchen & Dining Room: 8m x 3m. Ceramic tile replacement options.',
                'status' => 'completed',
                'dp_survey' => 50000,
            ],
            [
                'nama' => 'Dewi Lestari',
                'alamat' => "Jl. Dago Asri No. 12\nCoblong, Bandung, Jawa Barat",
                'kontak' => '085211223344',
                'ruangan' => 'Rooftop garden area: 5m x 5m. Survey for outdoor decking options.',
                'status' => 'cancelled',
                'dp_survey' => 50000,
            ],
        ];

        $photos = [
            'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600210492493-0946911123ea?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1600573472591-ee6b68d14c68?q=80&w=1000&auto=format&fit=crop',
        ];

        foreach ($requests as $request) {
            $survey = SurveyRequest::firstOrCreate(
                ['nama' => $request['nama'], 'kontak' => $request['kontak']],
                $request
            );

            if ($survey->wasRecentlyCreated && $request['status'] !== 'cancelled') {
                $count = rand(1, 3);
                $shuffled = $photos;
                shuffle($shuffled);

                foreach (array_slice($shuffled, 0, $count) as $photoUrl) {
                    $survey->images()->create(['foto' => $photoUrl]);
                }
            }
        }
    }
}
