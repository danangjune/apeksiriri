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
        Schema::create('fasilitas_kota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_fasilitas', 'id')->onUpdate('cascade');
            $table->foreignId('sub_kategori_id')->constrained('sub_kategori_fasilitas', 'id')->onUpdate('cascade')->nullable();
            $table->string('nama');
            $table->string('foto');
            $table->string('alamat');
            $table->string('telp');
            $table->string('link')->nullable();
            $table->string('map')->nullable();
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kota');
    }
};
