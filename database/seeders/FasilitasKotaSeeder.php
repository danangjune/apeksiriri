<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            // 'seeders/kategori_fasilitas.sql',
            // 'seeders/sub_fasilitas_kota.sql',
            'seeders/fasilitas_kota.sql',
        ];

        foreach ($files as $file) {
            $path = public_path($file);
            if (file_exists($path)) {
                DB::unprepared(file_get_contents($path));
            }
        }
    }
}
