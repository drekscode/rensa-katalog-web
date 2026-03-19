<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rumus', function (Blueprint $table) {
            $table->decimal('panjang', 10, 2)->nullable()->after('kategori_id');
            $table->decimal('lebar', 10, 2)->nullable()->after('panjang');
            $table->unsignedInteger('lembar')->nullable()->after('lebar');
            $table->dropColumn('ukuran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rumus', function (Blueprint $table) {
            $table->string('ukuran')->nullable()->after('kategori_id');
            $table->dropColumn(['panjang', 'lebar', 'lembar']);
        });
    }
};
