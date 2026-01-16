<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Elektronik',
            'keunggulan_produk' => 'Produk elektronik berkualitas tinggi dengan garansi.',
        ]);

        Kategori::create([
            'nama_kategori' => 'Pakaian',
            'keunggulan_produk' => 'Koleksi pakaian fashion terbaru dan nyaman.',
        ]);

        Kategori::create([
            'nama_kategori' => 'Makanan',
            'keunggulan_produk' => 'Makanan sehat dan lezat untuk keluarga.',
        ]);
    }
}