<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RangkaianAcara;
use App\Models\DetailRangkaianAcara;

class RangkaianAcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rangkaian =  RangkaianAcara::create([
            'nama' => 'PRA MUSKOMWIL',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
            'opd' => "Bagian Pemerintahan",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Registrasi Peserta",
            "mulai" => "07:00:00",
            "selesai" => "08:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Tarian Pembuka",
            "mulai" => "08:00:00",
            "selesai" => "08:10:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembukaan oleh MC",
            "mulai" => "08:10:00",
            "selesai" => "08:15:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya",
            "mulai" => "08:15:00",
            "selesai" => "08:20:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Menyanyikan lagu Mars APEKSI dilanjutkan Hymne APEKSI",
            "mulai" => "08:20:00",
            "selesai" => "08:30:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "08:25:00",
            "selesai" => "08:30:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Laporan Kegiatan Pra MUSKOMWIL",
            "mulai" => "08:30:00",
            "selesai" => "08:45:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Walikota Kediri sekaligus membuka kegiatan Pemberitahuan kesiapan Kota Kediri sebagai tuan rumah MUSKOMWIL IV ke-13 APEKSI",
            "mulai" => "08:45:00",
            "selesai" => "09:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Paparan Bapak Sekretaris Daerah Kota Kediri terkait persiapan teknis Kota Kediri sebagai tuan rumah MUSKOMWIL IV bulan Juli 2025",
            "mulai" => "09:00:00",
            "selesai" => "09:30:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembahasan rancangan rekomendasi KOMWIL IV APEKSI pada RAKERNAS 2025 di Kota Surabaya",
            "mulai" => "09:30:00",
            "selesai" => "10:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Penutupan dan ramah tamah",
            "mulai" => "10:00:00",
            "selesai" => "11:00:00"
        ]);


        $rangkaian =  RangkaianAcara::create([
            'nama' => 'GALA DINNER',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
            'opd' => "Bagian Umum",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Tukar cinderamata di Depan Photo Booth Pintu Masuk VVIP",
            "mulai" => "17:00:00",
            "selesai" => "18:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "TLooping Video Profil 13 Kota Pesera Muskomwil",
            "mulai" => "18:00:00",
            "selesai" => "19:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembukaan oleh MC",
            "mulai" => "19:00:00",
            "selesai" => "19:15:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Santunan Anak Yatim Oleh Gubenur Jatim,Walikota Kediri dan 12 KDH Delegasi APEKSI",
            "mulai" => "19:15:00",
            "selesai" => "19:30:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya & Mars APEKSI",
            "mulai" => "19:30:00",
            "selesai" => "19:40:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Tarian pembuka",
            "mulai" => "19:40:00",
            "selesai" => "19:50:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "19:50:00",
            "selesai" => "20:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Selamat Datang Wali Kota Kediri",
            "mulai" => "20:00:00",
            "selesai" => "20:15:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Ketua Komwil Wali Kota Mojokerto",
            "mulai" => "20:15:00",
            "selesai" => "20:30:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Ketua Apeksi Wali Kota Surabaya",
            "mulai" => "20:30:00",
            "selesai" => "20:45:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Gubernur Jawa Timur",
            "mulai" => "20:45:00",
            "selesai" => "21:00:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Pejabat Pemerintah Pusat",
            "mulai" => "21:00:00",
            "selesai" => "21:15:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Opening ceremony (Pejabat Pemerintah Pusat, Gubenur Jatim, Ketua APEKSI, Ketua Komwil dan Walikota Kediri)",
            "mulai" => "21:15:00",
            "selesai" => "21:25:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Foto bersama : - Sesi 1 13 KDH, Pejabat Pemerintah Pusat & Gubernur Jatim - Sesi 2 13 KDH, Pejabat Pemerintah Pusat,Gubernur Jatim bersama undangan",
            "mulai" => "21:25:00",
            "selesai" => "21:35:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Kunjungan Ke Booth Pameran (Optional)",
            "mulai" => "21:35:00",
            "selesai" => "22:35:00"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Hiburan Guest Star dan Makan Malam",
            "mulai" => "21:35:00",
            "selesai" => "22:20:00"
        ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'MUSKOMWIL IV',
        //     'tanggal' => '2025-07-17',
        //     'sampai' => '2025-07-17',
        //     'opd' => "Bagian Pemerintahan",
        // ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'KEDIRI CITY EXPO 2025',
        //     'tanggal' => '2025-07-16',
        //     'sampai' => '2025-07-18',
        //     'opd' => "Disperdagin",
        // ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'JELAJAH KOTA / CITY TOUR',
        //     'tanggal' => '2025-07-17',
        //     'sampai' => '2025-07-17',
        //     'opd' => "DKPP, DP3AP2KB, TP PKK , Camat, Disbudparpora",
        // ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'LADIES PROGRAM',
        //     'tanggal' => '2025-07-17',
        //     'sampai' => '2025-07-17',
        //     'opd' => "DKPP, DP3AP2KB, TP PKK , Camat, Disbudparpora",
        // ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'KEDIRI NIGHT CARNIVAL',
        //     'tanggal' => '2025-07-17',
        //     'sampai' => '2025-07-17',
        //     'opd' => "Disbudparpora",
        // ]);


        // $rangkaian =  RangkaianAcara::create([
        //     'nama' => 'PENANAMAN POHON & TABUR BENIH IKAN',
        //     'tanggal' => '2025-07-18',
        //     'sampai' => '2025-07-18',
        //     'opd' => "DLHKP, DKPP, BPBD, DPUPR",
        // ]);
    }
}
