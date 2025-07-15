<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StandBoothSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            'seeders/stand_booth.sql',
        ];

        foreach ($files as $file) {
            $path = public_path($file);
            if (file_exists($path)) {
                DB::unprepared(file_get_contents($path));
            }
        }
    }
}
