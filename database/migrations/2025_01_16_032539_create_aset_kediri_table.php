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
        Schema::create('aset_kediri', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200);
            $table->foreignId('kategori_id')->nullable()->constrained('kategori_aset', 'id')->onUpdate('cascade');
            $table->string('gambar', 200);
            $table->string('alamat', 200);
            $table->string('maps', 200)->nullable();
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            $table->string('harga_tiket', 30)->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('slug', 500);
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_kediri');
    }
};
