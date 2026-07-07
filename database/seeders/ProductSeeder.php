<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('product')->insert([
            // Rensa Wallpanel Classic — series_id: 1
            ['series_id' => 1, 'nama_product' => 'Wallpanel Classic - Oak',    'thumbnail' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 1, 'nama_product' => 'Wallpanel Classic - Walnut', 'thumbnail' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa UVM Premium — series_id: 2
            ['series_id' => 2, 'nama_product' => 'UVM Premium - White Marble',  'thumbnail' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 2, 'nama_product' => 'UVM Premium - Grey Marble',   'thumbnail' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1533038590840-1cde6e668a91?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Wallboard Standard — series_id: 3
            ['series_id' => 3, 'nama_product' => 'Wallboard Standard 6mm',  'thumbnail' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 3, 'nama_product' => 'Wallboard Standard 9mm',  'thumbnail' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa PU Stone Natural — series_id: 4
            ['series_id' => 4, 'nama_product' => 'PU Stone - Brick Red',     'thumbnail' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 4, 'nama_product' => 'PU Stone - Sandstone',     'thumbnail' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Decking Plank WPC — series_id: 5
            ['series_id' => 5, 'nama_product' => 'Decking Plank - Teak',     'thumbnail' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 5, 'nama_product' => 'Decking Plank - Mahogany', 'thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Plafon PVC — series_id: 6
            ['series_id' => 6, 'nama_product' => 'Plafon PVC - White',        'thumbnail' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1595846519845-68e298c2edd8?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 6, 'nama_product' => 'Plafon PVC - Wood Pattern', 'thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa SPC Flooring — series_id: 7
            ['series_id' => 7, 'nama_product' => 'SPC Flooring - Light Oak',  'thumbnail' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 7, 'nama_product' => 'SPC Flooring - Dark Walnut','thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Vinyl Flooring — series_id: 8
            ['series_id' => 8, 'nama_product' => 'Vinyl Flooring - Maple',    'thumbnail' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 8, 'nama_product' => 'Vinyl Flooring - Cherry',   'thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Decking Tile — series_id: 9
            ['series_id' => 9, 'nama_product' => 'Decking Tile - Natural',    'thumbnail' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1615971677499-5467cbab01c0?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 9, 'nama_product' => 'Decking Tile - Grey',       'thumbnail' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],

            // Rensa Sandblast Panel — series_id: 10
            ['series_id' => 10, 'nama_product' => 'Sandblast Panel - Natural', 'thumbnail' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
            ['series_id' => 10, 'nama_product' => 'Sandblast Panel - Grey',    'thumbnail' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=300&h=300&auto=format&fit=crop', 'big_pic' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&h=800&auto=format&fit=crop', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
