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
        Schema::create('hasil_pasang_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hasil_pasang_id');
            $table->longText('foto');
            $table->timestamps();

            $table->foreign('hasil_pasang_id')
                  ->references('id')
                  ->on('hasil_pasang')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pasang_images');
    }
};
