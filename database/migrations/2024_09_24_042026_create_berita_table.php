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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->nullable()->constrained('kategori_berita', 'id')->onUpdate('cascade');
            $table->string('judul', 500);
            $table->string('slug', 500);
            $table->longText('deskripsi');
            $table->string('images');
            $table->date('tanggal');
            $table->bigInteger('author')->nullable();
            $table->integer('count_view')->nullable();
            $table->boolean('eksklusif')->default(0);
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
        Schema::dropIfExists('berita');
    }
};
