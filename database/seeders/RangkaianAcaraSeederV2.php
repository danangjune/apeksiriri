<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RangkaianAcara;
use App\Models\DetailRangkaianAcara;

class RangkaianAcaraSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 1
         $rangkaian =  RangkaianAcara::create([
            'nama' => 'PRA MUSKOMWIL',
            'tanggal' => '2025-07-15',
            'sampai' => '2025-07-15',
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Kedatangan Para KDH Peserta MUSKOMWIL IV",
            "mulai" => "00:00:00",
            "selesai" => "24:00:00",
            "tanggal" => "2025-07-15",
            "lokasi" => "Hotel Grand Surya",
            "uraian" => "- Penjemputan Walikota Denpasar, Kupang, Bima dan Mataram di Bandara Juanda, Para Walikota Lain langsung menuju Grand Surya, disambut oleh Panitia",
            "perlengkapan" => "-",
            "catatan" =>  "Setibanya di Grand Surya, Pembagian Kamar, Perlengkapan acara MUSKOMWIL IV APEEKSI dan Souvenir"
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Loading peserta Kediri City Expo 2025",
            "mulai" => "16:00:00",
            "selesai" => "24:00:00",
            "tanggal" => "2025-07-15",
            "lokasi" => "Balaikota Kediri",
            "uraian" => "- para Peserta mulai mengisi stand sesuai dengan titik yang sudah ditentukan",
            "perlengkapan" => "- Radar\n- Disdag Kota Kediri",
            "catatan" => "- Senin peserta bisa loading"
        ]);

         // 2
         $rangkaianExpo =  RangkaianAcara::create([
            'nama' => 'KEDIRI CITY EXPO',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan"           => "Pameran Kediri City Expo 2025",
            "mulai"              => "10:00:00",
            "selesai"            => "22:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Balai Kota Kediri",
            "uraian"             => "-",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);


        // Ganti Acara
        $rangkaianKunjunganIbu =  RangkaianAcara::create([
            'nama' => 'KUNJUNGAN IBU WAKIL MENTERI PERDAGANGAN',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
        ]);

        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Penyambutan Ibu Wamendag",
            "mulai"              => "09:00:00",
            "selesai"            => "10:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Rumah Dinas Walikota Kediri",
            "uraian"             => "-",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Pembukaan Kediri City Expo",
            "mulai"              => "10:00:00",
            "selesai"            => "12:00:00",
           "tanggal"            => "2025-07-16",
            "lokasi"             => "Balaikota Kediri",
            "uraian"             => "-Pembukaan ada Selatan Rumah Dinas\n- MC Dona\n- Pengalungan Kain Scarf Kepada Wamendag oleh Bu Walikota, Pengalungan Kain Scarf Kpd Direktur PEN dan Direktur PDN oleh Pak Wawali\n- Doa dipimpin oleh Master of Ceremony\n- Speech Mba Walikota (4 Menit)\n- Speech Wamendag (4 Menit)\n- Memotong Untaian Melati (Stand Melati dan Hiasan dari Radar Kediri)\n- Sepasang Panji Galuh",
            "perlengkapan"       => "-",
            "catatan"            => "Posisi Tamu Undangan dibelakang Walikota; Transit Tamu di Dinas Arpus; Scarf disiapkan Bagian Perekonomian",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Perjalanan Menuju Gudang Garam Unit 8",
            "mulai"              => "12:00:00",
            "selesai"            => "12:15:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "-",
            "uraian"             => "-Mobil Disiapkan di sisi utara Gate\n- Jl Hasanudin-Belok Kiri ke Jl KKO Usman-GG Unit 8",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Kunjungan ke Industri Pengolahan Tembakau",
            "mulai"              => "12:15:00",
            "selesai"            => "13:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Gudang Garam Unit 8",
            "uraian"             => "- Kunjungan di pandu oleh pihak Gudang Garam\n- Dokumentasi seluruhnya dari GG\n- Wajib Menggunakan Masker",
            "perlengkapan"       => "materi Pemkot PDRB; materi GG ttg Proyeksi ke depan",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Perjalanan menuju Kampung Tenun Ikat Bandar",
            "mulai"              => "13:00:00",
            "selesai"            => "13:15:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "-",
            "uraian"             => "- Jl KKO Usman-Jl Pemuda-Jl Hayam Wuruk-Jl Dhoho-Jl Panglima Sudirman-Jl Agus Salim-Jl Raung-Gor Joyoboyo-Bandar Kidul Gg 9",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Kunjungan ke IKM Potensial Ekspor",
            "mulai"              => "13:15:00",
            "selesai"            => "14:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Kampung Tenun Ikat Bandar “Medali Mas”",
            "uraian"             => "- Disambut dengan Tarian\n- Menenun kain menggunakan ATBM\n- Diskusi produk turunan tenun ikat\n- Pameran Tenun Ikat",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Perjalanan menuju Pasar Grosir Ngronggo",
            "mulai"              => "14:00:00",
            "selesai"            => "14:15:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "-",
            "uraian"             => "- Jl Raung-Jl Agus Salim-Jl Urip Sumoharjo-Jl Perintis Kemerdekaan",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Kunjungan di Pasar Grosir Ngronggo",
            "mulai"              => "14:15:00",
            "selesai"            => "15:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Pasar Grosir Ngronggo",
            "uraian"             => "- Kunjungan lapangan untuk peninjauan dan dukungan pengembangan pasar melalui Kementerian Perdagangan\n- MC Lilin dari Prokopim\n- Kunjungan ke 3 Kios Pedagang yang komoditasnya mempengaruhi Inflasi\n- Sarasehan dengan 150 perwakilan Pedagang\n- Disiapkan Toilet Portable",
            "perlengkapan"       => "-",
            "catatan"            => "ada 6 kios yang rencana di kunjungi",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Perjalan Menuju Hotel Grand Surya",
            "mulai"              => "15:00:00",
            "selesai"            => "15:15:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "-",
            "uraian"             => "-",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKunjunganIbu->id,
            "kegiatan"           => "Istirahat",
            "mulai"              => "15:15:00",
            "selesai"            => "19:00:00",
            "tanggal"            => "2025-07-16",
            "lokasi"             => "Hotel Grand Surya",
            "uraian"             => "- Istirahat dan persiapan Ibu Wamendag untuk Giat Gala Dinner",
            "perlengkapan"       => "-",
            "catatan"            => "-",
        ]);

        // Ganti Acara
        $rangkaianGala =  RangkaianAcara::create([
            'nama' => 'GALA DINNER',
            'tanggal' => '2025-07-16',
            'sampai' => '2025-07-16',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Persiapan untuk seluruh Kepala Daerah, Protokoler untuk TM",
            "mulai" => "15:00:00",
            "selesai" => "18:00:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Hotel Grand Surya",
            "uraian" => "Persiapan untuk seluruh Kepala Daerah, Protokoler untuk TM",
            "perlengkapan" => "-",
            "catatan" => "Penyambutan kepala daerah di Hotel Grand Surya oleh Sekda dan Kepala OPD"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Persiapan Perjalanan Menuju Lokasi Gala Diner",
            "mulai" => "18:00:00",
            "selesai" => "18:30:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Hotel Grand Surya",
            "uraian" => "Semua Kepala Daerah/Anggota Apeksi Standby di Hotel Grand Surya",
            "perlengkapan" => "-",
            "catatan" => "Memastikan masing-masing kepala daerah telah siap dengan menggunakan pakaian tenun ikat"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Perjalan Menuju Balaikota Kediri",
            "mulai" => "18:30:00",
            "selesai" => "19:30:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "-",
            "uraian" => "Wali Kota, Pejabat Pusat, dan Gubernur datang ke lokasi Gala Dinner menggunakan becak yang sudah di sediakan\n\nNote: urutan keberangkatan becak\n- Wali Kota Kupang\n- Wali Kota Bima\n- Wali Kota Mataram\n- Wali Kota Denpasar\n- Wali kota Probolinggo\n- Wali Kota Pasuruan\n- Wali Kota Malang\n- Wali Kota Batu\n- Wali Kota Blitar\n- Wali Kota Madiun\n- Wali Kota Mojokerto\n- Wali kota Surabaya",
            "perlengkapan" => "-",
            "catatan" => "- Wali Kota, Wamendag, dan Gubernur datang ke lokasi Gala Dinner (transit R. Tengah pemkot)\n- becak berhenti di gate masuk, disambut Sekda\n- di halaman balai kota, kepala daerah disambut paskibra, siswa SMA\n- saat sampai balai kota, kepala daerah menerima cinderamata dari Wali Kota Kediri di photobooth\n- kepala daerah disambut wawali dan sekda di round table dan makan malam"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Pemutaran Video Profil",
            "mulai" => "19:30:00",
            "selesai" => "19:35:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Looping video profile 13 Kota peserta MUSKOMWIL IV APEKSI",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Santunan Anak Yatim",
            "mulai" => "19:35:00",
            "selesai" => "19:55:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "santunan anak yatim, gubernur jawa timur, oleh wali kota kediri, ketua apeksi, ketua komwil",
            "perlengkapan" => "- hadrah untuk mengiringi proses santunan di sebalah selatan\n- Hadirin di mohon berdiri\n- santunan diawali oleh gubernur di lanjut wali kota kediri, Wamendag, ketua apeksi,Dirut Apeksi ,dan ketua komwil",
            "catatan" => "- hadrah untuk mengiringi proses santunan di sebalah selatan\n- Hadirin di mohon berdiri\n- santunan diawali oleh gubernur di lanjut wali kota kediri, Wamendag, ketua apeksi,Dirut Apeksi ,dan ketua komwil"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya dan Mars Apeksi",
            "mulai" => "19:55:00",
            "selesai" => "20:05:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Menyanyikan lagu Indonesia Raya, Mars Apeksi",
            "perlengkapan" => "- musik by audio",
            "catatan" => "- musik by audio"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Penampilan Tarian Pembuka",
            "mulai" => "20:05:00",
            "selesai" => "20:15:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "BLACK OUT - Kediri Sesaji",
            "perlengkapan" => "dari SMKN 2 Kota Kediri",
            "catatan" => "dari SMKN 2 Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Opening MC",
            "mulai" => "20:15:00",
            "selesai" => "20:20:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Openig MC",
            "perlengkapan" => "Kemenag Kota Kediri",
            "catatan" => "Kemenag Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Pembacaan Doa",
            "mulai" => "20:20:00",
            "selesai" => "20:25:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Pembacaan Doa",
            "perlengkapan" => "MC in",
            "catatan" => "MC in"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Sambutan Selamat Datang Wali Kota Kediri",
            "mulai" => "20:25:00",
            "selesai" => "20:32:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Sambutan Selamat Datang Wali Kota Kediri",
            "perlengkapan" => "Oleh : Vinanda Prameswati, S.H., M.Kn.",
            "catatan" => "Oleh : Vinanda Prameswati, S.H., M.Kn."
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Sambutan Gubernur Jawa Timur",
            "mulai" => "20:32:00",
            "selesai" => "20:39:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Sambutan Gubernur Jawa Timur",
            "perlengkapan" => "Oleh : Dr. H.C .UA Hj Khofifah Indar Parawansa",
            "catatan" => "Oleh : Dr. H.C .UA Hj Khofifah Indar Parawansa"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Sambutan Wakil Menteri Perdagangan",
            "mulai" => "20:39:00",
            "selesai" => "20:49:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Sambutan Ibu Wakil Menteri Perdagangan",
            "perlengkapan" => "-",
            "catatan" => "Oleh : Dyah Roro Esti Widya Putri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Opening Ceremony",
            "mulai" => "20:49:00",
            "selesai" => "20:54:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Opening Ceremony",
            "perlengkapan" => "Wamendag, Gubernur Jawa Timur, Ketua Apeksi, Ketua Komwil, Dirut Apeksi, dan Wali Kota Kediri",
            "catatan" => "- Opening Ceremoni ditandai dengan menekan tombol di LCD\n- Wamendag, Gubernur Jawa Timur, Ketua Apeksi, Ketua Komwil, Dirut Apeksi, dan Wali Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Foto bersama",
            "mulai" => "20:54:00",
            "selesai" => "21:04:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Foto bersama",
            "perlengkapan" => "Sesi 1: 13 KDH dan Gubernur Jawa Timur di atas panggung\nSesi 2 : 13 KDH dan Gubernur Jawa Timur di atas panggung bersama tamu undangan",
            "catatan" => "Sesi 1: 13 KDH dan Gubernur Jawa Timur di depan panggung bersama tamu undangan"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Penampilan Guest Star",
            "mulai" => "21:04:00",
            "selesai" => "21:49:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Guest Star",
            "perlengkapan" => "Ghea Indrawari",
            "catatan" => "Ghea Indrawari"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianGala->id,
            "kegiatan" => "Kunjungan ke Booth Delegasi",
            "mulai" => "21:49:00",
            "selesai" => "22:19:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Kunjungan ke Booth Delegasi",
            "perlengkapan" => "13 booth pameran delegasi (opsional)",
            "catatan" => "13 booth pameran delegasi (opsional)"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaian->id,
            "kegiatan" => "Closing",
            "mulai" => "22:19:00",
            "selesai" => "22:24:00",
            "tanggal" => "2025-07-16",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "Closing",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        // Ganti Acara
        $rangkaianPameran =  RangkaianAcara::create([
            'nama' => 'KEDIRI CITY EXPO',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPameran->id,
            "kegiatan" => "Pameran Kediri City Expo 2025",
            "mulai" => "10:00:00",
            "selesai" => "22:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        // Ganti Acara
        $rangkaianMuskonwil =  RangkaianAcara::create([
            'nama' => 'MUSKOMWIL IV',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Persiapan Team",
            "mulai" => "06:00:00",
            "selesai" => "06:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Tim EO Clear Area & Final Check",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Persiapan KDH",
            "mulai" => "06:30:00",
            "selesai" => "07:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Resto Grand Surya",
            "uraian" => "Para KDH Peserta Muskomwil, Pengurus APEKSI dan Pejabat Pusat Transit di Resto",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Persiapan Peserta",
            "mulai" => "07:00:00",
            "selesai" => "08:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Para Pendamping dari Masing2 delegasi dan Ka.OPD Kota Kedir langsung menuju Ruang Tegowangi diawali melakukan registrasi di depan Tempat Acara",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Menyanyikan lagu Indonesia Raya dan Mars Apeksi",
            "mulai" => "08:00:00",
            "selesai" => "08:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Tamu VIP tiba di Lokasi Acara, posisi tetap berdiri langsung menyanyikan Indonesia Raya dan Mars APEKSI",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Opening MC",
            "mulai" => "08:05:00",
            "selesai" => "08:20:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Opening MC",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Doa",
            "mulai" => "08:20:00",
            "selesai" => "08:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Pembacaan Doa",
            "perlengkapan" => "Podium",
            "catatan" => "Doa Oleh Kemenag"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Penanyangan Video Profil",
            "mulai" => "08:30:00",
            "selesai" => "08:35:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Penayangan Video Profil Kota Kediri",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Sambutan Tuan Rumah MUSKOMWIL IV",
            "mulai" => "08:35:00",
            "selesai" => "08:50:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Sambutan Walikota Kediri",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Pemutaran Video 13 Kota",
            "mulai" => "08:50:00",
            "selesai" => "09:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Pemutaran Video 13 Kota Komwil IV",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Sambutan Ketua KOMWIL IV APEKSI",
            "mulai" => "09:05:00",
            "selesai" => "09:15:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Sambutan Walikota Mojokerto, Ketua KOMWIL IV APEKSI",
            "perlengkapan" => "-",
            "catatan" => "Oleh Ibu Hj. Ika Puspitasari, S.E."
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Sambutan Ketua Dewan Pengurus APEKSI",
            "mulai" => "09:15:00",
            "selesai" => "09:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Sambutan Walikota Surabaya, Ketua Dewan Pengurus APEKSI",
            "perlengkapan" => "-",
            "catatan" => "Oleh Bpk. Dr. Eri Cahyadi, S.T., M.T"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Keynote Speaker",
            "mulai" => "09:30:00",
            "selesai" => "10:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Keynote Speaker oleh Wakil Menteri Perdagangan",
            "perlengkapan" => "-",
            "catatan" => "Oleh Ibu Dyah Roro Esti Widya Putri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Pembukaan Pleno Rakerwil IV APEKSI 2025",
            "mulai" => "10:00:00",
            "selesai" => "10:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Ibu Wakil Menteri tetap di panggung\n- Mengundang 13 KDH Anggota Komwil IV maju ke panggung",
            "perlengkapan" => "-",
            "catatan" => "Pembukaan ditandai pemukulan Bonang secara serentak di pandu MC"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Foto bersama",
            "mulai" => "10:05:00",
            "selesai" => "10:10:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "Foto bersama tanpa membawa Bonang",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Break Time",
            "mulai" => "10:10:00",
            "selesai" => "10:20:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Persiapan sidang pleno \n- Penampilan band Hiburan 1-2 Lagu\n- Tamu Undangan kembali ke tempat duduk",
            "perlengkapan" => "-",
            "catatan" => "Penataan meja pleno diatas panggung"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Wamendag Meninggalkan Tempat",
            "mulai" => "10:20:00",
            "selesai" => "10:35:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Doorstop di Open Gate",
            "uraian" => "- Jika Ibu Wamendag Meninggalkan tempa acara, Ketua Dewan Pengurus, Ketua Komwil IV APEKSI dan Walikota Kediri mengantar sampai Lobby\n- Doorstop oleh Ketua Dewan Peengurus dan Ketua Komwil IV APEKSI\n- Jika Ibu Wamendag tetap dtempat, kembali ke tempat duduk semula",
            "perlengkapan" => "-",
            "catatan" => "*Opsional"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Pleno",
            "mulai" => "10:35:00",
            "selesai" => "11:35:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Ketua Komwil IV APEKSI, Pimpinan Direktorat APEKSI, dan Sekretaris KOMWIL IV APEKSI menuju atas panggung, duduk di kursi yang ditentukan\n- Pleno Penunjukan Tuan Rumah RAKERKOMWIL IV APEKSI 2026\n- Pleno Pemilihan Pengurus MUSKOMWIL IV APEKSI Tahun 2025 - 2028 ( Ketua & Wakil Ketua )",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Pengukuhan",
            "mulai" => "11:35:00",
            "selesai" => "11:45:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "- Pengukuhan Pengurus MUSKOMWIL IV APEKSI Tahun 2025 - 2028 yang sudah di tetapkan ditandai serah terima bendera APEKSI",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Foto bersama",
            "mulai" => "11:45:00",
            "selesai" => "11:55:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Menyanyikan Hymne APEKSI",
            "mulai" => "11:55:00",
            "selesai" => "12:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tegowangi Ballroom - Grand Surya Hotel Kediri",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianMuskonwil->id,
            "kegiatan" => "Ramah Tamah",
            "mulai" => "12:05:00",
            "selesai" => "13:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Grand Surya Hotel Kediri",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        // Ganti Acara
        $rangkaianLadies =  RangkaianAcara::create([
            'nama' => 'LADIES PROGRAM DAN CITY TOUR',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Persiapan",
            "mulai" => "06:00:00",
            "selesai" => "08:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Hotel Grand Surya",
            "uraian" => "- 3 Bus Mapan stand by di depan lobby\n- Para Peserta berkumpul di Lobby Hotel",
            "perlengkapan" => "-",
            "catatan" => "- diarahkan panitia untuk memasuki bus sesuai yang sudah ditentukan"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Perjalanan menuju Kampung Tenun Ikat bandar",
            "mulai" => "08:00:00",
            "selesai" => "08:15:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Rute: Jl. Dhoho - Jl. Panglima Sudriman - Jembatan Alun-alun - Jl. KH Agus Saliim - Jl. Raung - GOR Jayabaya",
            "uraian" => "Rangkaian:\n- Voorijder \n- Bus 1 - Peserta Ladies Program (13 org)\n- Bus 2 & 3 - Ajudan dan Pendamping (masing2 daerah 1 ajudan dan 1 pendamping)",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Kunjungan Kampung Tenun Ikat Bandar",
            "mulai" => "08:15:00",
            "selesai" => "09:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => 'Tenun Ikat "Medali Mas"',
            "uraian" => "- turun bus disambut Tarian Selamat Datang\n- pengalungan syal oleh penari ke seluruh tamu vip\n- Para peserta meunju Raung Tamu, menyaksikan Pemutaran Video Profil Perkembangan Tenun Ikat\n- Para Peserta memasuki Rumah Produksi lanjut menenun didampingi Komunitas Pengrajin Tenun\n- sebelum meninggalkan tempat, para peserta diarahkan menuju Etalasa dan Stand Bazar produk tenun ikat",
            "perlengkapan" => "- Sound\n- Alat Musik\n- TV/layar untuk Pemutaran Video Profil\n- Mesin Tenun",
            "catatan" => "- Kegiatan di pandu oleh Guide dari POKDARWIS Tenun Ikat\n- dibatasi untuk orang yang masuk ke dalam"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Perjalanan menuju Gudang Garam Unit 8",
            "mulai" => "09:30:00",
            "selesai" => "09:45:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Rute: GOR Joyoboyo - Jl. Penanggungan  - Jl. Veteran - Bunderan Sekartaji - Jembatan Brawijaya - Jl. Mayjen Sungkono - Jl. Diponegoro - Perempatan BPJS Kesehatan belok kiri - Jl Sersan KKO Usman - GG Unit VIII",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "Drop peserta di pintu masuk. Selanjutnya bus parkir di sisi utara"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Kunjungan Gudang Garam Unit 8",
            "mulai" => "09:45:00",
            "selesai" => "11:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Gudang Garam Unit 8",
            "uraian" => "- Rombongan yang masuk unit produksi sebanyak 20 orang terdiri dari Pasangan Kepala Daerah dan OPD Pemkot Kediri. \n- Action di sana proses giling rokok, melihat proses produksi, dan foto bersama",
            "perlengkapan" => "-",
            "catatan" => "Semua rombongan mengguanakan masker saat masuk unit produksi, tim dokumentasi dan ajudan tidak diperkenankan mendampingi, seluruh dokumentasi disediakan oleh GG, tidak boleh mempublish kegiatan di Unit VIII"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Perjalanan Menuju Bandara Dhoho",
            "mulai" => "11:00:00",
            "selesai" => "11:15:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Rute: Jl Mataram - Jl Sultan Iskandar Muda - Jl Gatot Subroto - Jl Sersan Bahrun - Jl Raya Maron - Perempatan Banyakan belok kiri - Jl PB Sudirman - belok kanan - Jl Samberejo - belok kiri - Jl Kedung Pawon - Jl Akses Bandara Dhoho",
            "uraian" => "- Drop off rombongan di terminal keberangkatan. \n- Kendaraan parkir di parkir VIP Bandara Dhoho",
            "perlengkapan" => "-",
            "catatan" => "SOP masuk terminal sesuai SOP penerbangan. Tidak diperkenankan membawa korek dan benda tajam. Serta tidak diperkenankan foto di terminal keberangkatan."
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Pembukaan Ladies Program",
            "mulai" => "11:15:00",
            "selesai" => "11:25:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Terminal Kedatangan Bandara Dhoho",
            "uraian" => "- Menyanyikan lagu kebangsaan Indonesia Raya\n- Opening MC\n- Doa",
            "perlengkapan" => "- Mic MC\n- Mic Pembaca Doa\n- Layar/LCD\n- Audio Indonesia Raya",
            "catatan" => "- MC: dari GG\n- Doa : Pak Zainudin"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Sambutan Pimpinan Gudang Garam",
            "mulai" => "11:25:00",
            "selesai" => "11:35:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Terminal Kedatangan Bandara Dhoho",
            "uraian" => "-",
            "perlengkapan" => "- Podium dan Mic Sambutan",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Sambutan Ketua TP PKK Kota Kediri",
            "mulai" => "11:35:00",
            "selesai" => "11:45:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Terminal Kedatangan Bandara Dhoho",
            "uraian" => "-",
            "perlengkapan" => "- Podium dan Mic Sambutan",
            "catatan" => "Ibu Hj. FAIQOH AZIZAH MUHAMMAD QOWIMUDDIN THOHA"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Hiburan",
            "mulai" => "11:45:00",
            "selesai" => "12:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Terminal Kedatangan Bandara Dhoho",
            "uraian" => "- Tarian\n- Fashion Show Busana Tenun Ikat",
            "perlengkapan" => "- Audio Tarian\n- Audio Fashion Show",
            "catatan" => "- Panggung clear"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Ramah Tamah",
            "mulai" => "12:00:00",
            "selesai" => "12:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Terminal Kedatangan Bandara Dhoho",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Perjalanan Menuju Tahu Poo",
            "mulai" => "12:30:00",
            "selesai" => "12:50:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Rute : Jl Akses Bandara Dhoho - Jl. Kedung Pawon Belok kanan - Jl. Samberejo - Jl. PB Sudirman - Jl. Raya Maron - Jl. Sersan Bahrun - Jl. Gatot Subroto - Jl Sultan Iskandar Muda - Jl. Mayor Bismo - Jl. Diponegoro - RS Bhayangkara - Jl. Hayam Wuruk - Jl. Dhoho - Jl. Yos Sudarso",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "Penjemputan rombongan di dekat pintu keluar."
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Kunjungan Industri dan Wisata Belanja",
            "mulai" => "12:50:00",
            "selesai" => "13:50:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Tahu Poo",
            "uraian" => "Tamu VVIP datang langsung dipersilahkan masuk ke rumah produksi dilanjutkan meninjau showroom Tahu Poo (wisata belanja)",
            "perlengkapan" => "-",
            "catatan" => "- Diperlukan pembatasan/tamu mengalir agar tidak terlalu padat\n- Parkir, diusahakan 100 m kiri -kanan lokasi free dan dikhususkan untuk CITY TOUR dan disiapkan halaman Gereja GKI kediri\n- Radius 50 m dari lokasi bebas PKL"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianLadies->id,
            "kegiatan" => "Perjalanan Kembali ke Grand Surya",
            "mulai" => "13:50:00",
            "selesai" => "14:00:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Rute: Jl. Diponegoro - RS Bhayangkara - Jl. Hayam Wuruk - Jl. Dhoho",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        // Ganti Acara
        $rangkaianApeksiNite =  RangkaianAcara::create([
            'nama' => 'APEKSI NITE CARNIVAL',
            'tanggal' => '2025-07-17',
            'sampai' => '2025-07-17',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Persiapan",
            "mulai" => "17:00:00",
            "selesai" => "18:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Start : Pertigaan Stasiun\nFinish : Perempatan Bank Indonesia",
            "uraian" => "- Clear Area sepanjang rute \n- Registasi Ulang Peserta di titik Start\n- Para KDH dan Pendamping serta Tamu Undangan lainnya langsung meunju Panggung di titik Finsih",
            "perlengkapan" => "-",
            "catatan" => "- Peserta langsung di posisikan sesuai titik yang ditentukan berdasarkan nomor urut"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Pembukaan MC",
            "mulai" => "18:30:00",
            "selesai" => "18:35:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Perempatan Bank Indonesia",
            "uraian" => "Rangkaian:\n- Voorijder \n- Bus 1 - Peserta Ladies Program (13 org)\n- Bus 2 & 3 - Ajudan dan Pendamping (masing2 daerah 1 ajudan dan 1 pendamping)",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Menyanyikan Lagu Indonesia Raya",
            "mulai" => "18:35:00",
            "selesai" => "18:40:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Perempatan Bank Indonesia",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Pembacaan Doa",
            "mulai" => "18:40:00",
            "selesai" => "18:45:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Perempatan Bank Indonesia",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "Oleh :"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Pelepasan Peserta Pawai Budaya - Apeksi 2025",
            "mulai" => "18:45:00",
            "selesai" => "18:50:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Pertigaan Stasiun",
            "uraian" => "Pelepasan di Pandu oleh MC di tiitik Start",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Tarian Kolosal - Romansa Sekartaji",
            "mulai" => "18:50:00",
            "selesai" => "19:05:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Start : Pertigaan Stasiun\nFinish : Perempatan Bank Indonesia",
            "uraian" => "- ditarikan oleh 100 siswa di Kota Kediri",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Barisan OPD",
            "mulai" => "19:05:00",
            "selesai" => "19:15:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Start : Pertigaan Stasiun\nFinish : Perempatan Bank Indonesia",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "dresscode : pakaian khas Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Penampilan 13 Delegasi",
            "mulai" => "19:15:00",
            "selesai" => "21:30:00",
            "tanggal" => "2025-07-17",
            "lokasi" => "Start : Pertigaan Stasiun\nFinish : Perempatan Bank Indonesia",
            "uraian" => "- Penampialan dari Delegasi Kota Anggota Komwil IV APEKSI\n- Penampilan diawali oleh Delegasi Kota Kediri",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Penampilan Para Partisipan",
            "mulai" => "21:30:00",
            "selesai" => "00:20:00",
            "tanggal" => "2025-07-17", // ganti ke 2025-07-18 kalau dianggap masuk ke tanggal baru
            "lokasi" => "Start : Pertigaan Stasiun\nFinish : Perempatan Bank Indonesia",
            "uraian" => "- papan nama delegasi dipegang paskibraka\n- titik perform peserta di perempatan BI",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianApeksiNite->id,
            "kegiatan" => "Closing MC",
            "mulai" => "00:20:00",
            "selesai" => "00:30:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Perempatan Bank Indonesia",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        // Ganti Acara
        $rangkaianKediriCityExpo =  RangkaianAcara::create([
            'nama' => 'KEDIRI CITY EXPO',
            'tanggal' => '2025-07-18',
            'sampai' => '2025-07-18',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianKediriCityExpo->id,
            "kegiatan" => "Pameran Kediri City Expo 2025",
            "mulai" => "10:00:00",
            "selesai" => "22:00:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Balai Kota Kediri",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);

        
        // Ganti Acara
        $rangkaianPenamamanPohon =  RangkaianAcara::create([
            'nama' => 'PENANAMAN POHON DAN PENYEBARAN BENIH',
            'tanggal' => '2025-07-18',
            'sampai' => '2025-07-18',
        ]);
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Persiapan",
            "mulai" => "05:00:00",
            "selesai" => "05:30:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "-",
            "uraian" => "-",
            "perlengkapan" => "-",
            "catatan" => "-"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Gowes Bareng",
            "mulai" => "05:30:00",
            "selesai" => "06:30:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Start di depan Lobby Grand Surya\nFinish di Pintu masuk Taman Brantas",
            "uraian" => "- Para Peserta menempati sepeda yang sudah siapkan dan sudah diatur posisi oleh Bag. Prokompim Kota Kediri\n- Start diawali dengan kata2 pemberangkatan oleh Ketua Dewan APEKSI dilanjutkan Pengibaran Bendera Start didampingi oleh Ketua KOMWIL IV dan Walikota Kediri\n- MC di titik finish (Pintu Masuk Taman Brantas) menyampaikan kata2 penyambutan kedatangan para peserta Gowes",
            "perlengkapan" => "Titik Start:\n- Sepeda Peserta yang sudah diberi nama\n- Mic untuk MC dan Kata2 Pemberangkatan\n- Sound Portable\n- Bendera Start\n\nTitik Finish (Pintu Masuk Taman Brantas):\n- Mic MC\n- Sound",
            "catatan" => "*Bagi peserta yang tidak ikut Gowes Langsung menuju Taman Brantas dan menunggu di Taman Brantas sisi selatan Pintu Masuk\n*Setelah droping peserta, kendaraan langsung di parkir di GNI\n*Bagi peserta yang ikut gowes, ketika finish droping di pintu masuk dan sepeda langsung dikondisikan ke GNI oleh ajudan/protokol/LO masing2\n*Urutan Barisan:\n- Voorijder\n- Patwal Satpol PP\n- Pengurus APEKSI, KDH+Pasangan, Wawali Kediri, Forkopimda Kota Kediri\n- Ka. OPD Kota Kediri\n- Ambulance dan Satpol PP"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Pemberian Makan Burung Merpati",
            "mulai" => "06:30:00",
            "selesai" => "06:45:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Taman Brantas sisi Timur",
            "uraian" => "- Sesampainya di Taman Brantas, Para Peserta diarahkan menuju Water Station yang ada di dekat pintu masuk sebelum diarahkan ke lokasi pemberian pakan burung\n- Para Peserta diarahkan untuk memposisikan diri 1 baris menghadap timur di depan tulisan \"TAMAN BRANTAS\"\n- Panitia/LO memberikan kantong berisikan jagung kepada para peserta\n- Para Peserta menabur jagung di hadapan nya masing2. dipandu oleh MC\n- Foto Bersama\n- MC mengarahkan Para peserta menuju Lokasi Penyebaran Benih Ikan",
            "perlengkapan" => "- Mic MC\n- Sound\n- Kantong Jagung (Pakan Burung)",
            "catatan" => "- Media dan Tim Dokumentasi diarahkan ke sisi timur lokasi"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Penyebaran Benih Ikan",
            "mulai" => "06:45:00",
            "selesai" => "07:15:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Tempat Parkir Mobil Taman Brantas",
            "uraian" => "- Kepala Daerah + Pasangan dan 2 Pendamping menempati Papan Kayu masing2 yang sudah ditentukan\n- Penyebaran Benih dalam 2 sesi: Sesi 1 untuk KDH, Sesi 2 untuk Pasangan KDH/pendamping\n- Penyebaran Benih dipandu oleh MC\n- Selesai, Para Peserta menuju Lokasi Penanaman Pohon",
            "perlengkapan" => "- Mic MC\n- Sound\n- Kantong Benih Ikan @2 Kantong tiap Papan Kayu\n- 3 Perahu Karet\n- Pelampung",
            "catatan" => "- Tim Dokumentasi dari Kota Kediri sudah ready diatas Perahu Karet (Tiap perahu berisikan 1 Vidiografer dan 2 Fotografer)\n- Posisi Perahu Karet stand by di sungai brantas dan tepat di tengah Tempat Pelaksanaan\n- Tim Dokumentasi lain (Selain official Dokomentasi dari Kota Kediri) pada awal posisinya tidak boleh melebihi papan kayu peserta paling selatan\n- Setelah sesi 1 selesai Tim Dokumentasi lain baru boleh menempati posisi di sisi timur Papan Kayu (Tidak boleh di Papan Kayu)"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Penanaman Pohon",
            "mulai" => "07:15:00",
            "selesai" => "07:45:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Lahan sisi Timur & Tengah Taman Brantas",
            "uraian" => "- Bagi Peserta/KDH yang posisi Lubang Penanaman Pohon berada di sisi Timur, melalui jalur depan tulisan \"TAMAN BRANTAS\"\n- Bagi Peserta/KDH yang posisi Lubang Penanaman Pohon Berada di sisi Barat, melalui jalur pintu masuk Taman Brantas Langsung ke barat\n- Para Peserta/KDH dan pedamping menuju Lubang sesuai nomor yang sudah ditentukan\n- Penanaman Pohon oleh Para KDH dipandu MC\n- Selesai, Seluruh Peserta Menuju Lokasi Ramah Tamah",
            "perlengkapan" => "- Mic MC\n- Sound\n- Bibit Tanaman di Masing2 Lubang\n- Cangkul, Cetok, Gayung, Ember, Kompos, Lap",
            "catatan" => "- Petugas dari DLHKP Kota Kediri sudah ready di tiap Lubang penanaman pohon\n- Band on setelah MC announce untuk penanaman pohon\n- 6 Lubang di sisi Timur untuk Direktur Eksekutif APEKSI, Ketua Dewan Pengurus APEKSI, Ketua KOMWIL IV yang lama dan baru, Walikota Kediri dan Wakil Wali Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Makan Pagi dan Ramah Tamah",
            "mulai" => "07:45:00",
            "selesai" => "09:15:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "Ruang Bawah Jembatan",
            "uraian" => "- Para KDH menikmati Makan Pagi\n- Sambutan dan Ucapan Terimakasih Ketua Komwil Baru\n- Sambutan dan Ucapan Terimakasih Wali Kota Kediri\n- Hiburan penutup: *opsional\na. Menyanyi Bersama seluruh KDH\nb. berjoget bersama\nc. Penampilan band dari KDH Peserta\nd. lainnya",
            "perlengkapan" => "- Stand Mic Sambutan\n- Mic MC\n- Menu Sarapan Pagi",
            "catatan" => "- Lokasi Makan Para KDH beserta pasangan dan 2 Pendamping, Pengurus Pusat APEKSI, Forkopimda dan Ka.OPD Kota Kediri di Sisi Tengah\n- Lokasi Makan ajudan/protokol dan dokumentasi di Sisi Timur\n- Sisi Tengah:\na. 12 Meja Bundar Besar\nb. 5 Meja berisikan 8 Kursi untuk Pengurus Pusat APEKSI, 13 KDH Anggota KOMWIL, Wawali Kediri+Ketua TP PKK Kota Kediri, Forkopimda Kota Kediri\nc. 7 Meja berisikan 10 Kursi untuk Pendamping KDH dan Ka. OPD Kota Kediri"
        ]);
        
        DetailRangkaianAcara::create([
            "rangkaian_acara_id" => $rangkaianPenamamanPohon->id,
            "kegiatan" => "Kembali ke hotel",
            "mulai" => "09:15:00",
            "selesai" => "10:00:00",
            "tanggal" => "2025-07-18",
            "lokasi" => "-",
            "uraian" => "Para Peserta kembali ke Pintu Masuk Taman Brantas, persiapan menuju ke kendaraan masing2.",
            "perlengkapan" => "- Kendaraan Roda 4 untuk seluruh peserta sudah stand by di daerah persiapan sejak Ramah Tamah\n- kendaraan diposisikan berbasis sepanjang jalan dari pintu masuk taman brantas ke selatan, diposisikan di sisi barat jalan\n- barisan Kendaraan diurutkan dari depan diawali dengan Kendaran milik Pengurus Pusat APEKSI di akhiri dengan Kendaraan Milik Walikota Kediri diikuti Kendaraan Milik Forkopimda Kota Kediri\n- Kendaraan yang meninggalkan Taman Brantas diarahkan melalui jalur melewati Kantor Pos",
            "catatan" => "-"
        ]);
        
        

    }
}
