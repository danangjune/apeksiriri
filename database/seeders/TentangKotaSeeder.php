<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TentangKota;

class TentangKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TentangKota::create(['title' => 'visi', 'deskripsi' => 'Mewujudkan Kota Kediri unggul dan makmur dalam harmoni.', 'status_enabled' => 1]);
        TentangKota::create(['title' => 'misi', 'deskripsi' => 'Mewujudkan tata kelola pemerintahan yang bersih, transparan dan berintegritas berorientasi pada pelayanan prima dan teknologi informasi.', 'status_enabled' => 1]);
        TentangKota::create(['title' => 'misi', 'deskripsi' => 'Mewujudkan SDM yang berkualitas dan berdaya saing berbasis nilai agama dan budaya.', 'status_enabled' => 1]);
        TentangKota::create(['title' => 'misi', 'deskripsi' => 'Memperkuat perekonomian daerah berbasis potensi unggulan daerah dan pengembangan ekonomi kreatif yang berkeadilan.', 'status_enabled' => 1]);
        TentangKota::create(['title' => 'misi', 'deskripsi' => 'Mewujudkan Kota Kediri yang aman, nyaman, dan berwawasan lingkungan yang berkelanjutan.', 'status_enabled' => 1]);
    }
}
