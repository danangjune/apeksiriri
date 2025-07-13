<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriFasilitas;

class KategoriFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriFasilitas::create(['nama_kategori' => 'Transportasi', 'icon' => 'bi-bus-front']);
        KategoriFasilitas::create(['nama_kategori' => 'Akomodasi', 'icon' => 'bi-house-heart-fill']);
        KategoriFasilitas::create(['nama_kategori' => 'Kesehatan', 'icon' => 'bi-heart-pulse-fill']);
        KategoriFasilitas::create(['nama_kategori' => 'Pendidikan', 'icon' => 'bi-mortarboard-fill']);
    }
}
