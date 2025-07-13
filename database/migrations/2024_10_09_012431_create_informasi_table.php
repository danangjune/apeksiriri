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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->nullable()->constrained('kategori_informasi', 'id')->onUpdate('cascade');
            $table->longText('deskripsi');
            $table->string('gambar', 100)->nullable();
            $table->string('link_gambar', 100)->nullable();
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
