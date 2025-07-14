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
        // KategoriFasilitas::create(['nama_kategori' => 'Transportasi', 'icon' => 'bi-bus-front']);
        // KategoriFasilitas::create(['nama_kategori' => 'Akomodasi', 'icon' => 'bi-house-heart-fill']);
        // KategoriFasilitas::create(['nama_kategori' => 'Kesehatan', 'icon' => 'bi-heart-pulse-fill']);
        // KategoriFasilitas::create(['nama_kategori' => 'Pendidikan', 'icon' => 'bi-mortarboard-fill']);

        KategoriFasilitas::create([
            'id' => 1,
            'nama_kategori' => 'Hotel',
            'icon' => 'bi-building-fill',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 2,
            'nama_kategori' => 'Rental Mobil',
            'icon' => 'bi-car-front-fill',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 3,
            'nama_kategori' => 'Kuliner',
            'icon' => 'bi-cup-straw',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 4,
            'nama_kategori' => 'Coffee Shop',
            'icon' => 'bi-cup-hot-fill',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 5,
            'nama_kategori' => 'Mall & Shopping',
            'icon' => 'bi-bag-fill',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 6,
            'nama_kategori' => 'Oleh - Oleh',
            'icon' => 'bi-gift',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 7,
            'nama_kategori' => 'Wisata',
            'icon' => 'bi-geo-alt',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);

        KategoriFasilitas::create([
            'id' => 8,
            'nama_kategori' => 'Rumah Sakit',
            'icon' => 'bi-hospital-fill',
            'status_enabled' => 1,
            'created_at' => '2025-01-31 01:43:24',
            'updated_at' => '2025-01-31 01:43:24',
        ]);
    }
}
