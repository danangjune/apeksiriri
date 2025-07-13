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
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kelurahan')->unique();
            $table->string('kd_kecamatan');
            $table->foreign('kd_kecamatan')->references('kd_kecamatan')->on('kecamatan')->onUpdate('cascade');
            $table->string('nm_kelurahan');
            $table->string('link')->nullable();
            $table->integer('jml_penduduk')->nullable();
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};
