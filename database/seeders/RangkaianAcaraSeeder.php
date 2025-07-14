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
        // 1
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
            "selesai" => "08:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Tarian Pembuka",
            "mulai" => "08:00:00",
            "selesai" => "08:10:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembukaan oleh MC",
            "mulai" => "08:10:00",
            "selesai" => "08:15:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya",
            "mulai" => "08:15:00",
            "selesai" => "08:20:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Menyanyikan lagu Mars APEKSI dilanjutkan Hymne APEKSI",
            "mulai" => "08:20:00",
            "selesai" => "08:30:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "08:25:00",
            "selesai" => "08:30:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Laporan Kegiatan Pra MUSKOMWIL",
            "mulai" => "08:30:00",
            "selesai" => "08:45:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Sambutan Walikota Kediri sekaligus membuka kegiatan Pemberitahuan kesiapan Kota Kediri sebagai tuan rumah MUSKOMWIL IV ke-13 APEKSI",
            "mulai" => "08:45:00",
            "selesai" => "09:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Paparan Bapak Sekretaris Daerah Kota Kediri terkait persiapan teknis Kota Kediri sebagai tuan rumah MUSKOMWIL IV bulan Juli 2025",
            "mulai" => "09:00:00",
            "selesai" => "09:30:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Pembahasan rancangan rekomendasi KOMWIL IV APEKSI pada RAKERNAS 2025 di Kota Surabaya",
            "mulai" => "09:30:00",
            "selesai" => "10:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Penutupan dan ramah tamah",
            "mulai" => "10:00:00",
            "selesai" => "11:00:00",
            "tanggal" => "2025-07-16"
        ]);

        // 2
        $galaDiner =  RangkaianAcara::create([
            'nama' => 'GALA DINNER',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
            'opd' => "Bagian Umum",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Tukar cinderamata di Depan Photo Booth Pintu Masuk VVIP",
            "mulai" => "17:00:00",
            "selesai" => "18:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "TLooping Video Profil 13 Kota Pesera Muskomwil",
            "mulai" => "18:00:00",
            "selesai" => "19:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Pembukaan oleh MC",
            "mulai" => "19:00:00",
            "selesai" => "19:15:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Santunan Anak Yatim Oleh Gubenur Jatim,Walikota Kediri dan 12 KDH Delegasi APEKSI",
            "mulai" => "19:15:00",
            "selesai" => "19:30:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya & Mars APEKSI",
            "mulai" => "19:30:00",
            "selesai" => "19:40:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Tarian pembuka",
            "mulai" => "19:40:00",
            "selesai" => "19:50:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "19:50:00",
            "selesai" => "20:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Sambutan Selamat Datang Wali Kota Kediri",
            "mulai" => "20:00:00",
            "selesai" => "20:15:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Sambutan Ketua Komwil Wali Kota Mojokerto",
            "mulai" => "20:15:00",
            "selesai" => "20:30:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Sambutan Ketua Apeksi Wali Kota Surabaya",
            "mulai" => "20:30:00",
            "selesai" => "20:45:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Sambutan Gubernur Jawa Timur",
            "mulai" => "20:45:00",
            "selesai" => "21:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Sambutan Pejabat Pemerintah Pusat",
            "mulai" => "21:00:00",
            "selesai" => "21:15:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Opening ceremony (Pejabat Pemerintah Pusat, Gubenur Jatim, Ketua APEKSI, Ketua Komwil dan Walikota Kediri)",
            "mulai" => "21:15:00",
            "selesai" => "21:25:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Foto bersama : - Sesi 1 13 KDH, Pejabat Pemerintah Pusat & Gubernur Jatim - Sesi 2 13 KDH, Pejabat Pemerintah Pusat,Gubernur Jatim bersama undangan",
            "mulai" => "21:25:00",
            "selesai" => "21:35:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Kunjungan Ke Booth Pameran (Optional)",
            "mulai" => "21:35:00",
            "selesai" => "22:35:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $galaDiner->id,
            "kegiatan" => "Hiburan Guest Star dan Makan Malam",
            "mulai" => "21:35:00",
            "selesai" => "22:20:00",
            "tanggal" => "2025-07-16"
        ]);

        // 3
        $rangkaianMus =  RangkaianAcara::create([
            'nama' => 'MUSKOMWIL IV',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
            'opd' => "Bagian Pemerintahan",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Peserta memasuki ruangan",
            "mulai" => "07:00:00",
            "selesai" => "08:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Salam dan Tarian pembuka",
            "mulai" => "08:00:00",
            "selesai" => "08:15:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya & Mars APEKSI",
            "mulai" => "08:15:00",
            "selesai" => "08:30:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "08:30:00",
            "selesai" => "08:40:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Pemutaran Video Profil Kota Kediri",
            "mulai" => "08:40:00",
            "selesai" => "08:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Sambutan Wali Kota Kediri",
            "mulai" => "08:45:00",
            "selesai" => "08:55:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Sambutan Ketua Dewan Pengurus APEKSI",
            "mulai" => "08:55:00",
            "selesai" => "09:10:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Prosesi Pembukaan",
            "mulai" => "09:10:00",
            "selesai" => "09:25:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Keynote Speaker oleh Pejabat Pemerintah Pusat",
            "mulai" => "09:25:00",
            "selesai" => "09:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Pleno Penunjukan Tuan Rumah MUSKOMWIL IV APEKSI 2026, Pleno Pemilihan Pengurus dan Pelantikan Pengurus KOMWIL IV APEKSI Tahun 2025 - 2028",
            "mulai" => "09:45:00",
            "selesai" => "10:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Menyanyikan Hymne APEKSI dilanjutkan Foto Bersama",
            "mulai" => "10:45:00",
            "selesai" => "11:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Menyanyikan Hymne APEKSI dilanjutkan Foto Bersama",
            "mulai" => "10:45:00",
            "selesai" => "11:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMus->id,
            "kegiatan" => "Ramah tamah",
            "mulai" => "11:00:00",
            "selesai" => "12:00:00",
            "tanggal" => "2025-07-17"
        ]);

        // 4
        $rangkaianExpo =  RangkaianAcara::create([
            'nama' => 'KEDIRI CITY EXPO 2025',
            'tanggal' => '2025-07-15',
            'sampai' => '2025-07-18',
            'opd' => "Disperdagin",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Loading In peserta pameran",
            "mulai" => "16:00:00",
            "selesai" => "24:00:00",
            "tanggal" => "2025-07-15"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Loading peserta pameran",
            "mulai" => "00:00:00",
            "selesai" => "07:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Soft Launching Kediri City Expo",
            "mulai" => "07:00:00",
            "selesai" => "18:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Persiapan pembukaan Kediri City Expo",
            "mulai" => "18:00:00",
            "selesai" => "20:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Pembukaan Kediri City Expo",
            "mulai" => "20:00:00",
            "selesai" => "21:00:00",
            "tanggal" => "2025-07-16"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Pameran Kediri City Expo",
            "mulai" => "08:00:00",
            "selesai" => "22:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Pameran Kediri City Expo",
            "mulai" => "08:00:00",
            "selesai" => "22:00:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianExpo->id,
            "kegiatan" => "Loading Out Kediri City Expo",
            "mulai" => "22:00:00",
            "selesai" => "24:00:00",
            "tanggal" => "2025-07-18"
        ]);

        // 5
        $rangkaianLadiesTour =  RangkaianAcara::create([
            'nama' => 'CITY TOUR & LADIES PROGRAM',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
            'opd' => "DKPP, DP3AP2KB, TP PKK , Camat, Disbudparpora",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "Penjemputan di Hotel Grand Surya menuju Kampoeng Tenun Medali Mas Bandar Kidul",
            "mulai" => "07:30:00",
            "selesai" => "08:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "City Tour Kampoeng Tenun Medali Mas Bandar Kidul",
            "mulai" => "08:00:00",
            "selesai" => "09:30:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "Perjalanan ke Pabrik Gudang Garam",
            "mulai" => "09:30:00",
            "selesai" => "10:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "City Tour Pabrik Gudang Garam Unit VIII",
            "mulai" => "10:00:00",
            "selesai" => "11:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "Perjalanan ke Bandara Dhoho Kota Kediri",
            "mulai" => "11:00:00",
            "selesai" => "11:30:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "City Tour Bandara Dhoho Kota Kediri",
            "mulai" => "11:30:00",
            "selesai" => "12:30:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "Perjalanan ke Pusat Oleh-oleh Tahu Poo Kota Kediri",
            "mulai" => "12:30:00",
            "selesai" => "12:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadiesTour->id,
            "kegiatan" => "City Tour ke Pusat Oleh-oleh Tahu Poo Kota Kediri",
            "mulai" => "12:45:00",
            "selesai" => "13:30:00",
            "tanggal" => "2025-07-17"
        ]);

        // 6
        $kdrNight =  RangkaianAcara::create([
            'nama' => 'KEDIRI NIGHT CARNIVAL',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
            'opd' => "Disbudparpora",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Clear Area - Registrasi Peserta",
            "mulai" => "17:00:00",
            "selesai" => "18:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Registrasi",
            "mulai" => "18:00:00",
            "selesai" => "18:30:00",
            "tanggal" => "2025-07-17"
        ]);


        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Opening MC",
            "mulai" => "18:30:00",
            "selesai" => "18:35:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya",
            "mulai" => "18:35:00",
            "selesai" => "18:40:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Menyanyikan Mars APEKSI",
            "mulai" => "18:40:00",
            "selesai" => "18:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Pembacaan Do’a",
            "mulai" => "18:45:00",
            "selesai" => "18:50:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Pelepasan peserta Kediri Night Carnival APEKSI 2025",
            "mulai" => "18:50:00",
            "selesai" => "19:00:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Tarian Kolosal - Romansa Sekartaji",
            "mulai" => "19:00:00",
            "selesai" => "19:15:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Barisan OPD",
            "mulai" => "19:15:00",
            "selesai" => "19:30:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Karnaval Budaya - Perwakilan Delegasi Kota Kediri",
            "mulai" => "19:30:00",
            "selesai" => "19:45:00",
            "tanggal" => "2025-07-17"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $kdrNight->id,
            "kegiatan" => "Karnaval Budaya - Perwakilan Delegasi Komwil IV APEKSI",
            "mulai" => "19:45:00",
            "selesai" => "21:45:00",
            "tanggal" => "2025-07-17"
        ]);

        // 7
        $penanaman =  RangkaianAcara::create([
            'nama' => 'PENANAMAN POHON & TABUR BENIH IKAN',
            'tanggal' => '2025-07-18',
            'sampai' => '2025-07-18',
            'opd' => "DLHKP, DKPP, BPBD, DPUPR",
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Persiapan",
            "mulai" => "05:00:00",
            "selesai" => "05:30:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Menuju lokasi mulai dari Jl. Dhoho - Jl. Kyai Mojo- Jl. Walter Monginsidi - Jl. Yos Sudarso - Taman Brantas",
            "mulai" => "05:30:00",
            "selesai" => "06:30:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Coffe Break",
            "mulai" => "06:30:00",
            "selesai" => "06:45:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Penanaman Pohon",
            "mulai" => "06:45:00",
            "selesai" => "07:15:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Penyebaran Benih Ikan",
            "mulai" => "07:15:00",
            "selesai" => "07:45:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Makan pagi dan ramah tamah",
            "mulai" => "07:45:00",
            "selesai" => "09:15:00",
            "tanggal" => "2025-07-18"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $penanaman->id,
            "kegiatan" => "Kembali ke hotel",
            "mulai" => "09:15:00",
            "selesai" => "10:00:00",
            "tanggal" => "2025-07-18"
        ]);
    }
}
