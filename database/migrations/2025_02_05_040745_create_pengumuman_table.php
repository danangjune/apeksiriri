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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 500);
            $table->longText('deskripsi');
            $table->datetime('tanggal');
            $table->string('gambar');
            $table->string('slug', 500);
            $table->bigInteger('author')->nullable();
            $table->integer('count_view')->nullable();
            $table->boolean('status_published')->default(0);
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
