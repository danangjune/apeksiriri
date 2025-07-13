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
        Schema::create('kalender_acara', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal_mulai');
            $table->datetime('tanggal_selesai');
            $table->string('judul_acara', 300);
            $table->string('lokasi_acara', 300);
            $table->longText('maps_lokasi');
            $table->string('banner', 100);
            $table->longText('deskripsi');
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender_acara');
    }
};
