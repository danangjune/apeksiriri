<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriAset;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriAset::create(['id' => '1', 'nama_kategori' => 'Tempat Wisata']);
        KategoriAset::create(['id' => '2', 'nama_kategori' => 'Wisata Rohani']);
        KategoriAset::create(['id' => '3', 'nama_kategori' => 'Wisata Kuliner']);
        KategoriAset::create(['id' => '4', 'nama_kategori' => 'Taman Kota']);
        KategoriAset::create(['id' => '5', 'nama_kategori' => 'Kebudayaan']);
        KategoriAset::create(['id' => '6', 'nama_kategori' => 'Pusat Perbelanjaan']);
        KategoriAset::create(['id' => '7', 'nama_kategori' => 'Produk']);
    }
}
