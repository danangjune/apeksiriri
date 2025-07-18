<?php

namespace Database\Seeders;

use App\Models\StandBooth;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // KategoriAsetSeeder::class,
            // KategoriOPDSeeder::class,
            // PesonaKediriSeeder::class,
            // KategoriOPDSeeder::class,
            KategoriBeritaSeeder::class,
            JabatanSeeder::class,
            TentangKotaSeeder::class,
            KategoriFasilitasSeeder::class,
            SubKategoriFasilitasSeeder::class,
            FasilitasKotaSeeder::class,
            RangkaianAcaraSeederV2::class,
            UserSeeder::class,
            ProfilPesertaApeksiSeeder::class,
            BannerSeeder::class,
            StandBoothSeeder::class,
            // ProfilPesertaApeksi::class,
        ]);
    }
}
