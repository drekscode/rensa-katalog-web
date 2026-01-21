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
        // 1. Update Artikel
        Schema::table('artikel', function (Blueprint $table) {
            if (!Schema::hasColumn('artikel', 'judul')) {
                $table->string('judul')->after('kategori_id')->nullable();
            }
        });

        // 2. Update Banner
        Schema::table('banner', function (Blueprint $table) {
            if (Schema::hasColumn('banner', 'slug')) {
                $table->dropColumn('slug');
            }
        });

        // 3. Update Tutorial Gambar
        Schema::table('tutorial_gambar', function (Blueprint $table) {
            if (!Schema::hasColumn('tutorial_gambar', 'judul')) {
                $table->string('judul')->after('kategori_id')->nullable();
            }
            if (!Schema::hasColumn('tutorial_gambar', 'urutan')) {
                $table->integer('urutan')->nullable()->after('deskripsi');
            }
            if (Schema::hasColumn('tutorial_gambar', 'slug')) {
                $table->dropColumn('slug');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artikel', function (Blueprint $table) {
            if (Schema::hasColumn('artikel', 'judul')) {
                $table->dropColumn('judul');
            }
        });

        Schema::table('banner', function (Blueprint $table) {
            if (!Schema::hasColumn('banner', 'slug')) {
                $table->string('slug')->nullable()->after('banner_image');
            }
        });

        Schema::table('tutorial_gambar', function (Blueprint $table) {
            if (Schema::hasColumn('tutorial_gambar', 'judul')) {
                $table->dropColumn('judul');
            }
            if (Schema::hasColumn('tutorial_gambar', 'urutan')) {
                $table->dropColumn('urutan');
            }
            if (!Schema::hasColumn('tutorial_gambar', 'slug')) {
                $table->string('slug')->nullable()->after('deskripsi');
            }
        });
    }
};
