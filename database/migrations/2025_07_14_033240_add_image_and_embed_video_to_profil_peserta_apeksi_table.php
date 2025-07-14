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
        Schema::table('profil_peserta_apeksi', function (Blueprint $table) {
            $table->string('image')->nullable()->after('logo');
            $table->text('embed_video')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('profil_peserta_apeksi', function (Blueprint $table) {
            $table->dropColumn(['image', 'embed_video']);
        });
    }
};
