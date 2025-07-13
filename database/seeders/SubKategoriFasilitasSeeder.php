<?php

namespace Database\Seeders;

use App\Models\SubKategoriFasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKategoriFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubKategoriFasilitas::create(['kategori_id' => 2, 'nama_sub' => 'Hotel', 'status_enabled' => 1]);
        SubKategoriFasilitas::create(['kategori_id' => 2, 'nama_sub' => 'Homestay', 'status_enabled' => 1]);
        SubKategoriFasilitas::create(['kategori_id' => 3, 'nama_sub' => 'Rumah Sakit', 'status_enabled' => 1]);
        SubKategoriFasilitas::create(['kategori_id' => 3, 'nama_sub' => 'Puskesmas', 'status_enabled' => 1]);
        SubKategoriFasilitas::create(['kategori_id' => 4, 'nama_sub' => 'Perguruan Tinggi', 'status_enabled' => 1]);
        SubKategoriFasilitas::create(['kategori_id' => 4, 'nama_sub' => 'SMA', 'status_enabled' => 1]);
    }
}
