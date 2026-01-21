<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        $tokos = [
            [
                'nama_toko' => 'Rensa Store Jakarta Pusat',
                'alamat' => 'Jl. Gatot Subroto No. 123, Jakarta Pusat, DKI Jakarta 10270',
                'kontak' => '021-5551234',
                'link_maps' => 'https://maps.google.com/?q=-6.2088,106.8456',
            ],
            [
                'nama_toko' => 'Rensa Store Bandung',
                'alamat' => 'Jl. Asia Afrika No. 45, Bandung, Jawa Barat 40111',
                'kontak' => '022-4447890',
                'link_maps' => 'https://maps.google.com/?q=-6.9175,107.6191',
            ],
            [
                'nama_toko' => 'Rensa Store Surabaya',
                'alamat' => 'Jl. Basuki Rahmat No. 78, Surabaya, Jawa Timur 60271',
                'kontak' => '031-3335678',
                'link_maps' => 'https://maps.google.com/?q=-7.2575,112.7521',
            ],
            [
                'nama_toko' => 'Rensa Store Medan',
                'alamat' => 'Jl. Imam Bonjol No. 56, Medan, Sumatera Utara 20152',
                'kontak' => '061-4449012',
                'link_maps' => 'https://maps.google.com/?q=3.5952,98.6722',
            ],
            [
                'nama_toko' => 'Rensa Store Makassar',
                'alamat' => 'Jl. Ahmad Yani No. 89, Makassar, Sulawesi Selatan 90174',
                'kontak' => '0411-3216789',
                'link_maps' => 'https://maps.google.com/?q=-5.1477,119.4327',
            ],
        ];

        foreach ($tokos as $toko) {
            Toko::create($toko);
        }
    }
}
