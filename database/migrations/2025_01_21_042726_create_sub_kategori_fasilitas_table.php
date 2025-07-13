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
        Schema::create('sub_kategori_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_fasilitas', 'id')->onUpdate('cascade');
            $table->string('nama_sub');
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kategori_fasilitas');
    }
};
