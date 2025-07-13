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
        Schema::table('progress_harian', function (Blueprint $table) {
            $table->bigInteger("rangkaian_acara_id")->nullable();
            $table->bigInteger("detail_rangkaian_acara_id")->nullable();
            $table->integer("progress")->comment("Persen")->nullable();
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
