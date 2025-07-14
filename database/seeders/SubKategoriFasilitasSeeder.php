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
        // SubKategoriFasilitas::create(['kategori_id' => 2, 'nama_sub' => 'Hotel', 'status_enabled' => 1]);
        // SubKategoriFasilitas::create(['kategori_id' => 2, 'nama_sub' => 'Homestay', 'status_enabled' => 1]);
        // SubKategoriFasilitas::create(['kategori_id' => 3, 'nama_sub' => 'Rumah Sakit', 'status_enabled' => 1]);
        // SubKategoriFasilitas::create(['kategori_id' => 3, 'nama_sub' => 'Puskesmas', 'status_enabled' => 1]);
        // SubKategoriFasilitas::create(['kategori_id' => 4, 'nama_sub' => 'Perguruan Tinggi', 'status_enabled' => 1]);
        // SubKategoriFasilitas::create(['kategori_id' => 4, 'nama_sub' => 'SMA', 'status_enabled' => 1]);

        SubKategoriFasilitas::create([
            'id' => 1,
            'kategori_id' => 1,
            'nama_sub' => 'Hotel',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 02:34:39',
            'updated_at' => '2025-01-31 02:34:39',
        ]);

        SubKategoriFasilitas::create([
            'id' => 2,
            'kategori_id' => 2,
            'nama_sub' => 'Rental Mobil',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 02:34:39',
            'updated_at' => '2025-01-31 02:34:39',
        ]);

        SubKategoriFasilitas::create([
            'id' => 3,
            'kategori_id' => 3,
            'nama_sub' => 'Kuliner',
            'status_enabled' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);

        SubKategoriFasilitas::create([
            'id' => 4,
            'kategori_id' => 4,
            'nama_sub' => 'Coffee Shop',
            'status_enabled' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);

        SubKategoriFasilitas::create([
            'id' => 5,
            'kategori_id' => 5,
            'nama_sub' => 'Mall & Shopping',
            'status_enabled' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);

        SubKategoriFasilitas::create([
            'id' => 6,
            'kategori_id' => 6,
            'nama_sub' => 'Oleh - oleh',
            'status_enabled' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);

        SubKategoriFasilitas::create([
            'id' => 7,
            'kategori_id' => 7,
            'nama_sub' => 'Wisata',
            'status_enabled' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);

        SubKategoriFasilitas::create([
            'id' => 8,
            'kategori_id' => 8,
            'nama_sub' => 'Rumah Sakit',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 02:34:39',
            'updated_at' => '2025-01-31 02:34:39',
        ]);
    }
}
