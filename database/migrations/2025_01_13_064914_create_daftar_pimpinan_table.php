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
        Schema::create('daftar_pimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pimpinan');
            $table->string('nip', 20)->nullable();
            $table->string('foto', 200);
            $table->foreignId('id_jabatan')->nullable()->constrained('jabatan', 'id')->onUpdate('cascade');
            $table->integer('id_opd')->nullable();
            $table->string('pangkat', 20)->nullable();
            $table->string('gol_ruang', 20)->nullable();
            $table->longText('deskripsi');
            $table->boolean('status')->default(1);
            $table->boolean('status_enabled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_pimpinan');
    }
};
