<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert existing strings to valid JSON arrays
        $products = DB::table('product')->whereNotNull('big_pic')->get();
        foreach ($products as $product) {
            $value = $product->big_pic;
            // Check if it's already a JSON array
            if (!is_array(json_decode($value, true))) {
                DB::table('product')
                    ->where('id', $product->id)
                    ->update(['big_pic' => json_encode([$value])]);
            }
        }

        Schema::table('product', function (Blueprint $table) {
            $table->json('big_pic')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
};
