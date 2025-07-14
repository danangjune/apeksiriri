<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner')->insert([
            [
                'gambar' => 'banner-1752427237.jpg',
                'status_enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'banner-1752427170.jpg',
                'status_enabled' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
