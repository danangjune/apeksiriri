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
        Schema::create('program_unggulan', function (Blueprint $table) {
            $table->id();
            $table->longText('judul');
            $table->longText('deskripsi')->nullable();
            $table->string('gambar', 200);
            $table->string('link', 200);
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_unggulan');
    }
};
