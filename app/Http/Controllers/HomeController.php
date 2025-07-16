<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Banner;
use App\Models\ProfilPesertaApeksi;
use App\Models\StandBooth;
use Illuminate\Support\Str;
use DataTables;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $meta = [
            'title' => 'APEKSI MUSKOMWIL IV KE 13 - KOTA KEDIRI',
            'description' => 'Kota Kediri dengan bangga menjadi tuan rumah Muskomwil IV Apeksi Tahun 2025 dengan tema "Semangat Pembangunan Berkelanjutan Menuju Kota Mapan".',
        ];

        $banners = Banner::where('status_enabled', 1)->get();

        $eventSchedules = [
            // // 1. Pra MUSKOMWIL APEKSI
            // [
            //     'event_name' => 'Pra MUSKOMWIL APEKSI',
            //     'venue' => 'Ruang Joyoboyo, Balai Kota Kediri',
            //     'date' => '16 April 2025',
            //     'attendees' => 'Anggota KOMWIL IV APEKSI',
            //     'dresscode' => 'Batik / Tenun Khas Daerah Anggota Komwil IV APEKSI',
            //     'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126489.25957110072!2d111.93201276797652!3d-7.8121087205627395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e785708e9c75897%3A0xb9c1ee25f7b49e27!2s52Q7%2B5Q3%2C%20Pocanan%2C%20Kota%2C%20Kota%20Kediri%2C%20East%20Java%2064129!3m2!1d-7.812106099999999!2d112.01437279999999!5e0!3m2!1sen!2sid!4v1752421834184!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            //     'schedule' => [
            //         ['time' => '07:00 - 08:00', 'activity' => 'Registrasi Peserta'],
            //         ['time' => '08:00 - 08:10', 'activity' => 'Tarian Pembuka'],
            //         ['time' => '08:10 - 08:15', 'activity' => 'Pembukaan oleh MC'],
            //         ['time' => '08:15 - 08:20', 'activity' => 'Menyanyikan lagu Indonesia Raya'],
            //         ['time' => '08:20 - 08:25', 'activity' => 'Menyanyikan lagu Mars APEKSI dan Hymne'],
            //         ['time' => '08:25 - 08:30', 'activity' => 'Pembacaan Doa'],
            //         ['time' => '08:30 - 08:45', 'activity' => 'Laporan Kegiatan'],
            //         ['time' => '08:45 - 09:00', 'activity' => 'Sambutan Walikota Kediri dan pembukaan kegiatan'],
            //         ['time' => '09:00 - 09:30', 'activity' => 'Paparan Sekda Kota Kediri'],
            //         ['time' => '09:30 - 10:00', 'activity' => 'Pembahasan Rekomendasi RAKERNAS 2025'],
            //         ['time' => '10:00 - 11:00', 'activity' => 'Penutupan dan ramah tamah']
            //     ]
            // ],

            // 1. Gala Dinner
            [
                'event_name' => 'Gala Dinner',
                'venue' => 'Halaman Balai Kota Kediri',
                'date' => '16 Juli 2025',
                'attendees' => 'Gubernur Jawa Timur, Kepala Daerah Anggota Komwil IV APEKSI, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, 3 (tiga) Pendamping Delegasi Komwil IV APEKSI, Wakil Wali Kota Kediri, Forkopimda Kota Kediri, Sekretaris Daerah Kota Kediri, Kepala OPD Kota Kediri',
                'dresscode' => 'Kepala Daerah & Pasangan: Baju Khas Kota Kediri (dari Panitia); Forkopimda Kota Kediri: Baju Khas Kota Kediri (dari Panitia); Sekda Kota Kediri: Baju Khas Kota Kediri (dari Panitia); Asisten, Staf Ahli, Kepala OPD: Tenun warna hijau (dari Panitia); Lurah dan Undangan Lain: Batik / Tenun',
                'image' => 'gala-dinner.jpg',
                'image-lokasi' => 'peta-jalan.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.572679133412!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752472541335!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '18:30 - 19:30', 'activity' => 'Tukar cinderamata di Depan Photo Booth Pintu Masuk VVIP'],
                    ['time' => '19:30 - 19:35', 'activity' => 'Looping Video Profil 13 Kota Peserta Muskomwil'],
                    ['time' => '19:35 - 19:55', 'activity' => 'Santunan Anak Yatim oleh Gubernur Jatim, Wali Kota Kediri, Ketua APEKSI dan Ketua Komwil IV'],
                    ['time' => '19:55 - 20:05', 'activity' => 'Menyanyikan lagu Indonesia Raya & Mars APEKSI'],
                    ['time' => '20:05 - 20:15', 'activity' => 'Tarian Pembuka'],
                    ['time' => '20:15 - 20:20', 'activity' => 'Opening MC'],
                    ['time' => '20:20 - 20:25', 'activity' => 'Pembacaan Do’a'],
                    ['time' => '20:25 - 20:35', 'activity' => 'Sambutan Selamat Datang dari Wali Kota Kediri'],
                    ['time' => '20:35 - 20:45', 'activity' => 'Sambutan Gubernur Jawa Timur'],
                    ['time' => '20:45 - 20:55', 'activity' => 'Opening Ceremony'],
                    ['time' => '20:55 - 21:05', 'activity' => 'Foto Bersama'],
                    ['time' => '21:05 - 21:50', 'activity' => 'Hiburan Guest Star'],
                    ['time' => '21:50 - 22:20', 'activity' => 'Kunjungan ke Booth Pameran (Optional)'],
                    ['time' => '22:20 - 22:30', 'activity' => 'Closing'],
                ]
            ],

            // 2. Kediri City Expo - Pembukaan
            [
                'event_name' => 'Kediri City Expo - Pembukaan',
                'venue' => 'Jl. Jend. Basuki Rakhmad dan Halaman Balai Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota Komwil IV APEKSI',
                'dresscode' => 'Batik / Tenun / Bebas Rapi',
                'image' => 'kediri-city-expo.jpg',
                'image-lokasi' => 'expo-denah.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '00:00 - 07:00', 'activity' => 'Loading peserta pameran'],
                    ['time' => '10:00 - 12:00', 'activity' => 'Pembukaan Kediri City Expo (Dresscode: Batik / Tenun)'],
                    ['time' => '12:00 - 22:00', 'activity' => 'Pameran Kediri City Expo']
                ]
            ],

            // 3. MUSKOMWIL
            [
                'event_name' => 'MUSKOMWIL',
                'venue' => 'Hotel Grand Surya (Tegowangi Ballroom)',
                'date' => '17 Juli 2025',
                'attendees' => 'Wakil Menteri Perdagangan RI, Kepala Daerah Anggota Komwil IV APEKSI, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, Wakil Wali Kota Kediri, Sekretaris Daerah, Asisten, Staf Ahli, Kepala OPD Kota Kediri, 2 (dua) Pendamping Delegasi Komwil IV APEKSI',
                'dresscode' => 'Batik / Tenun',
                'image' => 'muskomwil-iv.jpg',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7363539829644!2d112.0106326116563!3d-7.817706992170442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857107a9b0e79%3A0x31a5250470d9f02b!2sGrand%20Surya%20Hotel%20Kediri!5e0!3m2!1sen!2sid!4v1752472970048!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '07:00 - 08:00', 'activity' => 'Persiapan Peserta'],
                    ['time' => '08:00 - 08:05', 'activity' => 'Menyanyikan lagu Indonesia Raya & Mars APEKSI'],
                    ['time' => '08:05 - 08:20', 'activity' => 'Opening MC'],
                    ['time' => '08:20 - 08:30', 'activity' => 'Pembacaan Do’a'],
                    ['time' => '08:30 - 08:35', 'activity' => 'Penayangan Video Profil Kota Kediri'],
                    ['time' => '08:35 - 08:50', 'activity' => 'Sambutan Wali Kota Kediri'],
                    ['time' => '08:50 - 09:05', 'activity' => 'Penayangan Video 13 Kota'],
                    ['time' => '09:05 - 09:15', 'activity' => 'Sambutan Ketua Komwil IV APEKSI'],
                    ['time' => '09:15 - 09:30', 'activity' => 'Sambutan Ketua Dewan Pengurus APEKSI'],
                    ['time' => '09:30 - 10:50', 'activity' => 'Pleno Penunjukan Tuan Rumah Muskomwil IV APEKSI 2026 dan Pleno Pemilihan Pengurus dan Pelantikan Pengurus Komwil IV APEKSI Tahun 2025 - 2028'],
                    ['time' => '10:50 - 11:00', 'activity' => 'Pengukuhan'],
                    ['time' => '11:00 - 11:10', 'activity' => 'Keynote Speech Wamendag RI'],
                    ['time' => '11:10 - 11:20', 'activity' => 'Foto Bersama'],
                    ['time' => '11:20 - 11:30', 'activity' => 'Menyanyikan Hymne APEKSI'],
                    ['time' => '11:30 - 12:30', 'activity' => 'Ramah Tamah']
                ]
            ],



            // 3. Kediri City Expo - Pameran Hari Kedua
            [
                'event_name' => 'Kediri City Expo - Pameran Hari Kedua',
                'venue' => 'Jl. Jend. Basuki Rakhmad dan Halaman Balai Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota Komwil IV APEKSI',
                'dresscode' => 'Batik / Tenun / Bebas Rapi',
                'image' => 'kediri-city-expo.jpg',
                'image-lokasi' => 'expo-denah.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '10:00 - 22:00', 'activity' => 'Pameran Kediri City Expo']
                ]
            ],

            // 4. Kediri City Expo - Penutupan
            [
                'event_name' => 'Kediri City Expo - Penutupan',
                'venue' => 'Jl. Jend. Basuki Rakhmad dan Halaman Balai Kota Kediri',
                'date' => '18 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota Komwil IV APEKSI',
                'dresscode' => 'Batik / Tenun / Bebas Rapi',
                'image' => 'kediri-city-expo.jpg',
                'image-lokasi' => 'expo-denah.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '10:00 - 22:00', 'activity' => 'Pameran Kediri City Expo'],
                    ['time' => '22:00 - 24:00', 'activity' => 'Loading Out Peserta Pameran']
                ]
            ],

            // 5. City Tour & Ladies Program
            [
                'event_name' => 'City Tour & Ladies Program',
                'venue' => 'Pabrik Gudang Garam, Bandara Dhoho, Kampung Tenun Bandar Kidul, Pusat Oleh-oleh & Industri Tahu Takwa – Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'Istri Kepala Daerah dan Ibu Ketua TP PKK Kota Kediri, Kepala OPD Kota Kediri terkait beserta 2 (dua) Orang Pendamping Delegasi Komwil IV APEKSI, Pengurus TP PKK Kota Kediri',
                'dresscode' => 'Batik / Tenun',
                'image' => 'city-tour-ladies-program.jpg',
                'image-lokasi' => 'citytour-rute2.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1XijEsw4CyfFI9f5zAOIZeOz4jhkgY9A&ehbc=2E312F&noprof=1"></iframe>',
                'schedule' => [
                    ['time' => '08:00 - 08:30', 'activity' => 'Persiapan di Hotel Grand Surya'],
                    ['time' => '08:30 - 08:50', 'activity' => 'Perjalanan ke Pabrik PT. Gudang Garam'],
                    ['time' => '08:50 - 09:30', 'activity' => 'City Tour Pabrik PT. Gudang Garam Unit VIII'],
                    ['time' => '09:30 - 09:55', 'activity' => 'Perjalanan ke Bandara Dhoho Kediri'],
                    ['time' => '09:55 - 11:30', 'activity' => 'City Tour Bandara Dhoho Kediri'],
                    ['time' => '11:30 - 12:00', 'activity' => 'Perjalanan menuju Kampung Tenun Bandar Kidul'],
                    ['time' => '12:00 - 13:15', 'activity' => 'City Tour Kampung Tenun Bandar Kidul'],
                    ['time' => '13:15 - 13:30', 'activity' => 'Perjalanan menuju Pusat Oleh-oleh Kota Kediri'],
                    ['time' => '13:30 - 14:30', 'activity' => 'City Tour Wisata Belanja di Industri Tahu Takwa']
                ]
            ],


            // 6. APEKSI Nite Carnival
            [
                'event_name' => 'APEKSI Nite Carnival',
                'venue' => 'Start: Pertigaan Jl. Stasiun – Finish: Simpang Bank Indonesia, Jl. Dhoho Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'Wakil Menteri Perdagangan RI, Kepala Daerah beserta Pasangan, Wakil Wali Kota Kediri, Sekda Kota Kediri, Forkopimda Kota Kediri, Ketua Dewan Pengurus APEKSI, Direktur Eksekutif APEKSI, Kepala OPD Kota Kediri, Lurah se-Kota Kediri, dan Peserta Pawai Khas Daerah',
                'dresscode' => 'Kepala Daerah & Pasangan: Baju Khas Daerah masing-masing; Forkopimda & Sekda & Istri: Batik / Tenun; Staf Ahli, Ka-OPD & Pasangan: Baju Khas Kota Kediri; Lurah & Undangan Lain: Batik / Tenun',
                'image' => 'apeksi-nite-carnival.jpeg',
                'image-lokasi' => 'rute-nite2.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.735812659736!2d112.0105873116563!3d-7.817764142170372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857107a9b0e79%3A0x31a5250470d9f02b!2sGrand%20Surya%20Hotel%20Kediri!5e0!3m2!1sen!2sid!4v1752480821382!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '17:00 - 18:30', 'activity' => 'Persiapan'],
                    ['time' => '18:30 - 18:35', 'activity' => 'Pembukaan MC'],
                    ['time' => '18:35 - 18:40', 'activity' => 'Menyanyikan lagu Indonesia Raya'],
                    ['time' => '18:40 - 18:45', 'activity' => 'Pembacaan Doa'],
                    ['time' => '18:45 - 18:50', 'activity' => 'Pelepasan Peserta Pawai Budaya'],
                    ['time' => '18:50 - 21:30', 'activity' => 'Karnaval Budaya – Delegasi Komwil IV APEKSI'],
                    ['time' => '21:30 - 00:20', 'activity' => 'Karnaval Budaya – Partisipan Umum Kota Kediri'],
                    ['time' => '00:20 - 00:30', 'activity' => 'Closing']
                ]
            ],


            // 7. Penanaman Pohon & Penyebaran Benih Ikan
            [
                'event_name' => 'Penanaman Pohon & Penyebaran Benih Ikan',
                'venue' => 'Taman Brantas Kota Kediri',
                'date' => '18 Juli 2025',
                'attendees' => 'Wali Kota Anggota Komwil IV APEKSI Sarimbit beserta 2 (dua) Pendamping Delegasi, Ketua Dewan Pengurus APEKSI, Wakil Wali Kota Kediri, Forkopimda Kota Kediri, Sekretaris Daerah Kota Kediri, Direktur Eksekutif APEKSI, Asisten, Staf Ahli, Kepala OPD Kota Kediri',
                'dresscode' => 'Kaos Olahraga',
                'image' => 'tanam-pohon-tebar-benih2.jpg',
                'image-lokasi' => 'ikan-benih2.png',
                'dokumentasi' => 'https://bit.ly/dokumentasimuskomwil4apeksi2025',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786880996013!2d112.00600051165615!3d-7.812370792175646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857227dcc0931%3A0x1cff71ab45598392!2sBrantas%20Park!5e0!3m2!1sen!2sid!4v1752480914442!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '05:00 - 05:30', 'activity' => 'Persiapan'],
                    ['time' => '05:30 - 06:30', 'activity' => 'Gowes Bareng dari Grand Surya Hotel menuju Taman Brantas'],
                    ['time' => '06:30 - 06:45', 'activity' => 'Memberi Makan Burung Merpati'],
                    ['time' => '06:45 - 07:15', 'activity' => 'Penyebaran Benih Ikan'],
                    ['time' => '07:15 - 07:45', 'activity' => 'Penanaman Pohon'],
                    ['time' => '07:45 - 09:15', 'activity' => 'Makan Pagi dan Ramah Tamah'],
                    ['time' => '09:15 - 10:00', 'activity' => 'Kembali ke Hotel']
                ]
            ],

        ];

        $events = collect($eventSchedules);
        $groupedEvents = $events->groupBy('date');

        $profil_apeksi = ProfilPesertaApeksi::all();
        $slides = $profil_apeksi->chunk(7);

        $standBooth = StandBooth::limit(5)->get();

        return view('home.index', compact(
            'groupedEvents',
            'profil_apeksi',
            'slides',
            'meta',
            'banners',
            'standBooth'
        ));
    }



    // -------------------------------------------- ADMIN -------------------------------------
    public function banner_beranda(Request $request)
    {
        $titlepage = 'List Banner';

        try {
            if ($request->ajax()) {
                $banner = Banner::whereIn('status_enabled', [1, 2])->orderBy('status_enabled', 'asc')->get();

                return Datatables::of($banner)
                    ->addIndexColumn()
                    ->addColumn('gambar', function ($row) {
                        $gambar = '<img src="' . url('storage/banner/' . $row->gambar) . '" width="200">';
                        return $gambar;
                    })->addColumn('status', function ($row) {
                        if ($row->status_enabled == 1) {
                            $status = '<button type="button" class="btn btn-info" onclick="location.href=`/update-status-banner/2/' . $row->id . '`" style="margin-right:5px; margin-bottom:5px;">
                                            Enabled
                                       </button>';
                        } else {
                            $status = '<button type="button" class="btn btn-danger" onclick="location.href=`/update-status-banner/1/' . $row->id . '`" style="margin-right:5px; margin-bottom:10px;">
                                            Disabled
                                       </button>';
                        }
                        return $status;
                    })->addColumn('action', function ($row) {
                        $actionBtn = '<button type="button" class="btn btn-danger" onclick="deletebannerConfirmation(' . $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['gambar', 'status', 'action'])
                    ->make(true);
            }

            toastr()->success('Konten Berhasil Dimuat');
        } catch (\Exception $e) {
            $titlepage = [];
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');
        }

        return view('admin.banner.index', compact('titlepage'));
    }

    public function update_status_banner($status, $id)
    {
        if ($status == 2) {
            Banner::where(['id' => $id])->update([
                'status_enabled' => 2,
            ]);

            toastr()->warning('Disable Banner Berhasil !');
        } else {
            Banner::where(['id' => $id])->update([
                'status_enabled' => 1,
            ]);

            toastr()->success('Enable Banner Berhasil !');
        }

        return redirect('/banner-beranda');
    }

    public function upload_banner(Request $request)
    {
        $request->validate(
            [
                'banner' => 'image|mimes:jpeg,png,jpg,webp,svg|max:8024'
            ],
            [
                'banner.image' => trans('File yang di upload harus gambar !'),
                'banner.mimes' => trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
                'banner.max' => trans('Ukuran file maksimal 8mb !')
            ]
        );

        $file = $request->banner;
        $fileName = 'banner' . '-' . time() . '.' . $file->extension();
        $file->move(storage_path('app/public/banner'), $fileName);

        DB::beginTransaction();

        try {
            Banner::insert([
                'gambar' => $fileName,
                'status_enabled' => 1,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Banner Berhasil Diupload.');

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect()->back();
    }

    // Adminpage - Delete Banner
    public function hapus_banner($id)
    {

        $aktif = Banner::where(['id' => $id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1) {
            $success = true;
            $message = "Data Berhasil Dihapus";
        } else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function detailStandBooth()
    {
        $standBooth = StandBooth::all();
        $breadcrumb  = [
            'titlemenu' => 'Standbooth',
            'titlepage' => 'Daftar Standbooth',
            'detailpage' => false
        ];
        return view('home.detail-booth', compact('standBooth', 'breadcrumb'));
    }

    public function searchStandBooth(Request $request)
    {
        $q = $request->q;
        $limit = $request->limit;

        $data = StandBooth::when($q, function ($query, $q) {
            return $query->where('kategori', 'like', "%$q%")
                ->orWhere('no_stand', 'like', "%$q%")
                ->orWhere('nama_stand', 'like', "%$q%")
                ->orWhere('nama_perusahaan', 'like', "%$q%")
                ->orWhere('jenis_produk', 'like', "%$q%")
                ->orWhere('pic', 'like', "%$q%");
        })->orderBy('id')->limit($limit)->get();

        return response()->json($data);
    }
}
