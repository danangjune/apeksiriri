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
        Schema::create('sejarah_kota', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 100);
            $table->text('keterangan');
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sejarah_kota');
    }
};
