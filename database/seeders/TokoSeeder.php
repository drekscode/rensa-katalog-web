<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('toko')->insert([
            ['nama_toko' => 'Rensa Store Jakarta Pusat', 'alamat' => 'Jl. Gatot Subroto No. 123, Jakarta Pusat, DKI Jakarta 10270',            'kontak' => '021-5551234',   'link_maps' => 'https://maps.google.com/?q=-6.2088,106.8456', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Bandung',       'alamat' => 'Jl. Asia Afrika No. 45, Bandung, Jawa Barat 40111',                       'kontak' => '022-4447890',   'link_maps' => 'https://maps.google.com/?q=-6.9175,107.6191', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Surabaya',      'alamat' => 'Jl. Basuki Rahmat No. 78, Surabaya, Jawa Timur 60271',                    'kontak' => '031-3335678',   'link_maps' => 'https://maps.google.com/?q=-7.2575,112.7521', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Medan',         'alamat' => 'Jl. Imam Bonjol No. 56, Medan, Sumatera Utara 20152',                     'kontak' => '061-4449012',   'link_maps' => 'https://maps.google.com/?q=3.5952,98.6722', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Makassar',      'alamat' => 'Jl. Ahmad Yani No. 89, Makassar, Sulawesi Selatan 90174',                 'kontak' => '0411-3216789', 'link_maps' => 'https://maps.google.com/?q=-5.1477,119.4327', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Semarang',      'alamat' => 'Jl. Pandanaran No. 112, Semarang, Jawa Tengah 50134',                     'kontak' => '024-8521456',   'link_maps' => 'https://maps.google.com/?q=-6.9932,110.4203', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Yogyakarta',    'alamat' => 'Jl. Malioboro No. 67, Yogyakarta, DIY 55213',                             'kontak' => '0274-5678901', 'link_maps' => 'https://maps.google.com/?q=-7.7956,110.3695', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Bali',          'alamat' => 'Jl. Sunset Road No. 234, Denpasar, Bali 80361',                           'kontak' => '0361-7894561', 'link_maps' => 'https://maps.google.com/?q=-8.6705,115.2126', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Palembang',     'alamat' => 'Jl. Sudirman No. 145, Palembang, Sumatera Selatan 30126',                 'kontak' => '0711-3214567', 'link_maps' => 'https://maps.google.com/?q=-2.9761,104.7754', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Balikpapan',    'alamat' => 'Jl. Jenderal Sudirman No. 88, Balikpapan, Kalimantan Timur 76114',        'kontak' => '0542-7651234', 'link_maps' => 'https://maps.google.com/?q=-1.2379,116.8529', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Manado',        'alamat' => 'Jl. Sam Ratulangi No. 56, Manado, Sulawesi Utara 95115',                  'kontak' => '0431-8523456', 'link_maps' => 'https://maps.google.com/?q=1.4748,124.8421', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Pontianak',     'alamat' => 'Jl. Gajah Mada No. 123, Pontianak, Kalimantan Barat 78121',              'kontak' => '0561-7412345', 'link_maps' => 'https://maps.google.com/?q=-0.0263,109.3425', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Banjarmasin',   'alamat' => 'Jl. A. Yani KM 5.5, Banjarmasin, Kalimantan Selatan 70249',              'kontak' => '0511-3698521', 'link_maps' => 'https://maps.google.com/?q=-3.3194,114.5906', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Pekanbaru',     'alamat' => 'Jl. Jenderal Sudirman No. 234, Pekanbaru, Riau 28116',                   'kontak' => '0761-8529631', 'link_maps' => 'https://maps.google.com/?q=0.5071,101.4478', 'created_at' => $now, 'updated_at' => $now],
            ['nama_toko' => 'Rensa Store Batam',         'alamat' => 'Jl. Engku Putri No. 67, Batam, Kepulauan Riau 29444',                    'kontak' => '0778-4567891', 'link_maps' => 'https://maps.google.com/?q=1.0456,104.0305', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
