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
        Schema::create('pesona_kediri', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->longtext('deskripsi')->nullable();
            $table->string('gambar1', 100);
            $table->string('gambar2', 100);
            $table->string('gambar3', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesona_kediri');
    }
};
