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
        Schema::table('detail_rangkaian_acara', function (Blueprint $table) {
            $table->mediumText("lokasi")->nullable();
            $table->mediumText("uraian")->nullable();
            $table->mediumText("perlengkapan")->nullable();
            $table->mediumText("catatan")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
