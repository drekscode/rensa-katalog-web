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
        Schema::create('hasil_pasang', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama_project');
            $table->date('tanggal');
            $table->string('id_project');
            $table->unsignedBigInteger('id_series');
            $table->timestamps();

            $table->foreign('id_series')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_pasang');
    }
};
