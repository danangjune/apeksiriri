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
        Schema::create('penghargaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->datetime('tanggal');
            $table->longText('deskripsi')->nullable();
            $table->string('foto', 255);
            $table->string('slug', 500);
            $table->integer('count_view')->nullable();
            $table->integer('author')->nullable();
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghargaan');
    }
};
