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
        Schema::create('berita_luar', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('judul', 500);
            $table->string('link', 500);
            $table->string('web', 100);
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
        Schema::dropIfExists('berita_luar');
    }
};
