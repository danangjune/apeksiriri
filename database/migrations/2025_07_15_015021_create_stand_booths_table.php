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
        Schema::create('stand_booth', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 100)->nullable();
            $table->string('no_stand', 100)->nullable();
            $table->string('nama_stand', 100)->nullable();
            $table->string('nama_perusahaan', 100)->nullable();
            $table->string('jenis_produk', 500)->nullable();
            $table->string('pic', 100)->nullable();
            $table->string('no_telp', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stand_booth');
    }
};
