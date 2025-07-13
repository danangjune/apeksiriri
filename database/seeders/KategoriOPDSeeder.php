<?php

namespace Database\Seeders;

use App\Models\KategoriOPD;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriOPDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriOPD::create(['id' => 1, 'nama' => 'Bagan Organisasi', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 2, 'nama' => 'Sekretariat Daerah', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 3, 'nama' => 'Sekretariat DPRD', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 4, 'nama' => 'Staff Ahli', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 5, 'nama' => 'Badan', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 6, 'nama' => 'Dinas', 'status_enabled' => 1]);
        KategoriOPD::create(['id' => 7, 'nama' => 'Kecamatan', 'status_enabled' => 1]);
    }
}
