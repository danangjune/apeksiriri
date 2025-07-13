<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBerita::create(['nama_kategori' => 'Ekonomi']);
        KategoriBerita::create(['nama_kategori' => 'Kesehatan']);
        KategoriBerita::create(['nama_kategori' => 'Pemerintah']);
        KategoriBerita::create(['nama_kategori' => 'Pendidikan']);
        KategoriBerita::create(['nama_kategori' => 'Informasi']);
        KategoriBerita::create(['nama_kategori' => 'Potensi']);
        KategoriBerita::create(['nama_kategori' => 'Lelang']);
        KategoriBerita::create(['nama_kategori' => 'Tenaga Kerja']);
    }
}
