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
        Schema::create('detail_rangkaian_acara', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("rangkaian_acara_id");
            $table->time("mulai");
            $table->time("selesai");
            $table->mediumText("kegiatan");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_rangkaian_acara');
    }
};
