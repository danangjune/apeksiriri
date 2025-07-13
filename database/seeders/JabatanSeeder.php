<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::create(['id' => 1, 'nama_jabatan' => 'Walikota', 'status_enabled' => 1]);
        Jabatan::create(['id' => 2, 'nama_jabatan' => 'Wakil Walikota', 'status_enabled' => 1]);
        Jabatan::create(['id' => 3, 'nama_jabatan' => 'Penjabat Walikota', 'status_enabled' => 1]);
        Jabatan::create(['id' => 4, 'nama_jabatan' => 'Sekretaris daerah', 'status_enabled' => 1]);
        Jabatan::create(['id' => 5, 'nama_jabatan' => 'Kepala Dinas', 'status_enabled' => 1]);
        Jabatan::create(['id' => 6, 'nama_jabatan' => 'Inspektur', 'status_enabled' => 1]);
        Jabatan::create(['id' => 7, 'nama_jabatan' => 'Kepala Bagian', 'status_enabled' => 1]);
        Jabatan::create(['id' => 8, 'nama_jabatan' => 'Direktur', 'status_enabled' => 1]);
    }
}
