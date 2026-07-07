<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->json('allowed_rumus')->nullable()->after('keunggulan_produk');
        });
    }

    public function down(): void
    {
        Schema::table('kategori', function (Blueprint $table) {
            $table->dropColumn('allowed_rumus');
        });
    }
};
