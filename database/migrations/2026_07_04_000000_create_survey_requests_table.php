<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('survey_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('kontak');
            $table->text('ruangan');
            $table->enum('status', ['pending', 'scheduled', 'completed', 'cancelled'])->default('pending');
            $table->integer('dp_survey')->default(50000);
            $table->timestamps();
        });

        Schema::create('survey_request_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_request_id')->constrained('survey_requests')->cascadeOnDelete();
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('survey_request_images');
        Schema::dropIfExists('survey_requests');
    }
};
