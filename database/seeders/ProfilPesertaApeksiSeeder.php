<?php

namespace Database\Seeders;

use App\Models\ProfilPesertaApeksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfilPesertaApeksiSeeder extends Seeder
{
    public function run(): void
    {
       ProfilPesertaApeksi::insert([
            [
                'nama' => 'Kota Kediri',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c1/Logo_Kota_Kediri_-_Seal_of_Kediri_City.svg',
                'deskripsi' => 'Pusat perdagangan & budaya'
            ],
            [
                'nama' => 'Kota Surabaya',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/City_of_Surabaya_Logo.svg/1200px-City_of_Surabaya_Logo.svg.png',
                'deskripsi' => 'Kota Pahlawan & maritim'
            ],
            [
                'nama' => 'Kota Mojokerto',
                'logo' => 'https://ppid.mojokertokota.go.id/userfiles/2023/03/a1ee3d6283faf8ea08c97a0ec6b10d81.png',
                'deskripsi' => 'Warisan Majapahit'
            ],
            [
                'nama' => 'Kota Pasuruan',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/d/dc/Logo_Kota_Pasuruan_-_Seal_of_Pasuruan_City.svg',
                'deskripsi' => 'Industri kreatif & agrikultur'
            ],
            [
                'nama' => 'Kota Denpasar',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/6/65/Lambang_Kota_Denpasar_%281%29.png',
                'deskripsi' => 'Pariwisata & budaya Bali'
            ],
            [
                'nama' => 'Kota Batu',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Kota_Batu%2C_Jawa_Timur_%28Seal_of_Batu%2C_East_Java%29.svg/1200px-Logo_Kota_Batu%2C_Jawa_Timur_%28Seal_of_Batu%2C_East_Java%29.svg.png',
                'deskripsi' => 'Wisata alam & agro'
            ],
            [
                'nama' => 'Kota Malang',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/ef/Logo_Kota_Malang_color.png',
                'deskripsi' => 'Pendidikan & kuliner'
            ],
            [
                'nama' => 'Kota Blitar',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Lambang_Kota_Blitar.png/800px-Lambang_Kota_Blitar.png',
                'deskripsi' => 'Kota Proklamator'
            ],
            [
                'nama' => 'Kota Probolinggo',
                'logo' => 'https://example.com/logo-probolinggo.png',
                'deskripsi' => 'Gerbang Bromo'
            ],
            [
                'nama' => 'Kota Madiun',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/ec/Lambang_Kota_Madiun.png',
                'deskripsi' => 'Kota Gadis & industri kereta'
            ],
            [
                'nama' => 'Kota Kupang',
                'logo' => 'https://upload.wikimedia.org/wikipedia/id/b/b0/LOGO_KOTA_KUPANG.png',
                'deskripsi' => 'Pintu gerbang NTT'
            ],
            [
                'nama' => 'Kota Mataram',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Lambang_Kota_Mataram.png',
                'deskripsi' => 'Kota pesisir NTB'
            ],
            [
                'nama' => 'Kota Bima',
                'logo' => 'https://portal.bimakota.go.id/upload/kontent/fc2780b8d6db4d2767782e35e5211306_lambang1.png',
                'deskripsi' => 'Sejarah Kesultanan Bima'
            ],
        ]);
    }
}
