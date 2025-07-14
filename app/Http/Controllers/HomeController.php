<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Berita;
use App\Models\BeritaLuar;
use App\Models\Pengumuman;
use App\Models\AlbumBerita;
use App\Models\KategoriBerita;
use App\Models\Banner;
use App\Models\ProgramUnggulan;
use App\Models\LayananDigital;
use App\Models\AsetKediri;
use App\Models\KalenderAcara;
use App\Models\Feedback;
use App\Models\Dokumen;
use App\Models\BannerPromo;
use App\Models\Artikel;
use App\Models\ProfilPesertaApeksi;
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
        $layanan = ProgramUnggulan::where('status_enabled', 1)->get();
        $wisata = AsetKediri::where([['kategori_id', 1], ['status_enabled', 1]])->get()->take(10)->toArray();
        $belanja = AsetKediri::where([['kategori_id', 6], ['status_enabled', 1]])->get()->take(10)->toArray();

        // $response = Http::get('https://api-splp.layanan.go.id:443/t/kedirikota.go.id/simalik/1.0/api/get_all_agenda', [
        //     'page' => $request->get('page', 1) 
        // ]);

        // // Decode the response
        // $agenda_pemerintah = json_decode($response->body());

        // Berita
        $kategori = KategoriBerita::get();
        $firstKategori = KategoriBerita::first();
        $berita_terkini = Berita::orderBy('tanggal', 'DESC')->limit(5)->get();

        $layanan_digital = LayananDigital::where('status_enabled', 1)->get();

        // Kalender Agenda
        // $currentMonth = Carbon::now()->month;
        // $currentYear = Carbon::now()->year;
        // $acara = KalenderAcara::where('status_enabled', 1)
        //         ->whereYear('tanggal_mulai', $currentYear)
        //         ->whereMonth('tanggal_mulai', $currentMonth)->orderBy('tanggal_mulai', 'asc')->get();

        // $detilacara = count($acara) > 0 ? $acara[0] : '';

        $produk = AsetKediri::where([['kategori_id', 7], ['status_enabled', 1]])->get();
        $dokumen = Dokumen::where([['status_enabled', 1], ['status_published', 1]])->orderBy('id', 'DESC')->limit(4)->get();

        $banner_promo = BannerPromo::where('status_enabled', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $artikel = Artikel::where([['status_enabled', 1], ['status_published', 1], ['hits', 1]])->orderBy('id', 'DESC')->limit(4)->get();

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
            // 4. Kediri City Expo
            [
                'event_name' => 'Kediri City Expo - Loading In',
                'venue' => 'Jl. Basuki Rahmat dan Halaman Balai Kota Kediri',
                'date' => '15 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah Masing Masing',
                'image' => 'kediri-city-expo.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '16:00 - 24:00', 'activity' => 'Loading In peserta pameran']
                ]
            ],
            [
                'event_name' => 'Gala Dinner',
                'venue' => 'Halaman Balai Kota Kediri',
                'date' => '16 Juli 2025',
                'attendees' => 'Pejabat Pemerintah Pusat, Gubernur Jawa Timur, Kepala Daerah Anggota KOMWIL IV APEKSI, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, 3 Pendamping Delegasi KOMWIL IV APEKSI, Wakil Walikota Kediri, FORKOPIMDA Kota Kediri, Sekretaris Daerah Kota Kediri, Kepala OPD Kota Kediri',
                'dresscode' => 'Tenun Khas Kota Kediri',
                'image' => 'gala-dinner.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.572679133412!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752472541335!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '17:00 - 18:00', 'activity' => 'Tukar cinderamata di Depan Photo Booth Pintu Masuk VVIP'],
                    ['time' => '18:00 - 19:00', 'activity' => 'Looping Video Profil 13 Kota Peserta Muskomwil'],
                    ['time' => '19:00 - 19:15', 'activity' => 'Pembukaan oleh MC'],
                    ['time' => '19:15 - 19:30', 'activity' => 'Santunan Anak Yatim oleh Gubernur Jatim, Walikota Kediri dan 12 KDH Delegasi APEKSI'],
                    ['time' => '19:30 - 19:40', 'activity' => 'Menyanyikan lagu Indonesia Raya & Mars APEKSI'],
                    ['time' => '19:40 - 19:50', 'activity' => 'Tarian pembuka'],
                    ['time' => '19:50 - 20:00', 'activity' => 'Pembacaan Do’a'],
                    ['time' => '20:00 - 20:15', 'activity' => 'Sambutan Selamat Datang Walikota Kediri'],
                    ['time' => '20:15 - 20:30', 'activity' => 'Sambutan Ketua Komwil IV Kota Mojokerto'],
                    ['time' => '20:30 - 20:45', 'activity' => 'Sambutan Ketua APEKSI Wilayah Kota Surabaya'],
                    ['time' => '20:45 - 21:00', 'activity' => 'Sambutan Gubernur Jawa Timur'],
                    ['time' => '21:00 - 21:15', 'activity' => 'Sambutan Pejabat Pemerintah Pusat'],
                    ['time' => '21:15 - 21:25', 'activity' => 'Opening Ceremony oleh Pejabat Pusat, Gubernur Jatim, Ketua APEKSI, Ketua Komwil dan Walikota Kediri'],
                    ['time' => '21:25 - 21:35', 'activity' => 'Foto bersama - Sesi 1 (13 KDH, Pejabat Pusat & Gubernur Jatim)'],
                    ['time' => '21:35 - 21:45', 'activity' => 'Foto bersama - Sesi 2 (13 KDH, Pejabat Pusat & Gubernur Jatim beserta undangan)'],
                    ['time' => '21:45 - 22:00', 'activity' => 'Kunjungan ke Booth Pameran (Optional)'],
                    ['time' => '22:00 - 22:30', 'activity' => 'Hiburan Guest Star dan Makan Malam']
                ]
            ],

            // 3. MUSKOMWIL
            [
                'event_name' => 'MUSKOMWIL',
                'venue' => 'Hotel Grand Surya - Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'Pejabat Pemerintah Pusat, Kepala Daerah Anggota KOMWIL IV APEKSI, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, Wakil Walikota Kediri, Sekretaris Daerah Kota Kediri, Kepala OPD Kota Kediri, 2 Orang Pendamping Delegasi KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah Masing Masing',
                'image' => 'muskomwil-iv.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7363539829644!2d112.0106326116563!3d-7.817706992170442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857107a9b0e79%3A0x31a5250470d9f02b!2sGrand%20Surya%20Hotel%20Kediri!5e0!3m2!1sen!2sid!4v1752472970048!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '07:00 - 08:00', 'activity' => 'Peserta memasuki ruangan'],
                    ['time' => '08:00 - 08:15', 'activity' => 'Salam dan Tarian pembuka'],
                    ['time' => '08:15 - 08:30', 'activity' => 'Menyanyikan lagu Indonesia Raya & Mars APEKSI'],
                    ['time' => '08:30 - 08:40', 'activity' => 'Pembacaan Do’a'],
                    ['time' => '08:40 - 08:45', 'activity' => 'Pemutaran Video Profil Kota Kediri'],
                    ['time' => '08:45 - 08:55', 'activity' => 'Sambutan Wali Kota Kediri'],
                    ['time' => '08:55 - 09:10', 'activity' => 'Sambutan Ketua Dewan Pengurus APEKSI'],
                    ['time' => '09:10 - 09:25', 'activity' => 'Prosesi Pembukaan'],
                    ['time' => '09:25 - 09:45', 'activity' => 'Keynote Speaker oleh Pejabat Pemerintah Pusat'],
                    ['time' => '09:45 - 10:45', 'activity' => 'Pleno Penunjukan Tuan Rumah MUSKOMWIL IV APEKSI 2026, Pemilihan Pengurus dan Pelantikan Pengurus KOMWIL IV APEKSI Tahun 2025 - 2028'],
                    ['time' => '10:45 - 11:00', 'activity' => 'Menyanyikan Hymne APEKSI dilanjutkan Foto Bersama'],
                    ['time' => '11:00 - 12:00', 'activity' => 'Ramah tamah']
                ]
            ],



            // 4. Kediri City Expo
            [
                'event_name' => 'Kediri City Expo - Pembukaan',
                'venue' => 'Jl. Basuki Rahmat dan Halaman Balai Kota Kediri',
                'date' => '16 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah Masing Masing',
                'image' => 'kediri-city-expo.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.572679133412!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752472541335!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '00:00 - 07:00', 'activity' => 'Loading peserta pameran'],
                    ['time' => '07:00 - 18:00', 'activity' => 'Soft Launching Kediri City Expo'],
                    ['time' => '18:00 - 20:00', 'activity' => 'Persiapan pembukaan Kediri City Expo'],
                    ['time' => '20:00 - 21:00', 'activity' => 'Pembukaan Kediri City Expo']
                ]
            ],
            // 4. Kediri City Expo
            [
                'event_name' => 'Kediri City Expo - Pameran',
                'venue' => 'Jl. Basuki Rahmat dan Halaman Balai Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah Masing Masing',
                'image' => 'kediri-city-expo.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '08:00 - 22:00', 'activity' => 'Pameran Kediri City Expo']
                ]
            ],
            // 4. Kediri City Expo
            [
                'event_name' => 'Kediri City Expo - Penutupan',
                'venue' => 'Jl. Basuki Rahmat dan Halaman Balai Kota Kediri',
                'date' => '18 Juli 2025',
                'attendees' => 'UMKM Peserta Kediri City Expo dan Delegasi Anggota KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah Masing Masing',
                'image' => 'kediri-city-expo.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786339566706!2d112.01167171165619!3d-7.812427992175574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785717d7cb3c5f%3A0xd11484a904dded86!2sCity%20Hall%20of%20Kediri!5e0!3m2!1sen!2sid!4v1752473170825!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '08:00 - 22:00', 'activity' => 'Pameran Kediri City Expo'],
                    ['time' => '22:00 - 24:00', 'activity' => 'Loading Out Kediri City Expo']
                ]
            ],

            // 5. City Tour & Ladies Program
            [
                'event_name' => 'City Tour & Ladies Program',
                'venue' => 'Kampoeng Tenun, Pabrik Gudang Garam, Bandara Dhoho, Pusat Oleh-oleh Tahu Poo – Kota Kediri',
                'date' => '17 Juli 2025',
                'attendees' => 'Istri Kepala Daerah dan Ibu Ketua TP PKK Kota Kediri, Kepala OPD terkait Kota Kediri beserta 2 Orang Pendamping Delegasi KOMWIL IV APEKSI',
                'dresscode' => 'Batik / Tenun Khas Daerah masing-masing',
                'image' => 'city-tour-ladies-program.jpg',
                'map' => '<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1XijEsw4CyfFI9f5zAOIZeOz4jhkgY9A&ehbc=2E312F&noprof=1" width="700" height="450"></iframe>',
                'schedule' => [
                    ['time' => '07:30 - 08:00', 'activity' => 'Penjemputan di Hotel Grand Surya menuju Kampoeng Tenun “Medali Mas” Bandar Kidul'],
                    ['time' => '08:00 - 09:30', 'activity' => 'City Tour Kampoeng Tenun “Medali Mas” Bandar Kidul'],
                    ['time' => '09:30 - 10:00', 'activity' => 'Perjalanan ke Pabrik Gudang Garam'],
                    ['time' => '10:00 - 11:00', 'activity' => 'City Tour Pabrik Gudang Garam Unit VIII'],
                    ['time' => '11:00 - 11:30', 'activity' => 'Perjalanan ke Bandara Dhoho Kota Kediri'],
                    ['time' => '11:30 - 12:00', 'activity' => 'City Tour Bandara Dhoho Kota Kediri'],
                    ['time' => '12:00 - 12:45', 'activity' => 'Perjalanan ke Pusat Oleh-oleh Tahu Poo Kota Kediri'],
                    ['time' => '12:45 - 13:30', 'activity' => 'City Tour ke Pusat Oleh-oleh Tahu Poo Kota Kediri']
                ]
            ],

            // 6. Kediri Night Carnival
            [
                'event_name' => 'Kediri Night Carnival',
                'venue' => 'Jl. Dhoho Kota Kediri – Start di selatan Hotel Grand Surya',
                'date' => '17 Juli 2025',
                'attendees' => 'Pejabat Pemerintah Pusat, Kepala Daerah beserta Pasangan, Wakil Walikota, Sekretaris Daerah, FORKOPIMDA, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, Kepala OPD, dan Peserta Pawai Khas Daerah',
                'dresscode' => 'Pakaian Khas Daerah Masing-masing',
                'image' => 'kediri-nite-carnival.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.735812659736!2d112.0105873116563!3d-7.817764142170372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857107a9b0e79%3A0x31a5250470d9f02b!2sGrand%20Surya%20Hotel%20Kediri!5e0!3m2!1sen!2sid!4v1752480821382!5m2!1sen!2sid" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '17:00 - 18:00', 'activity' => 'Clear Area - Registrasi Peserta'],
                    ['time' => '18:00 - 18:30', 'activity' => 'Registrasi'],
                    ['time' => '18:30 - 18:35', 'activity' => 'Opening MC'],
                    ['time' => '18:35 - 18:40', 'activity' => 'Menyanyikan lagu Indonesia Raya'],
                    ['time' => '18:40 - 18:45', 'activity' => 'Menyanyikan Mars APEKSI'],
                    ['time' => '18:45 - 18:50', 'activity' => 'Pembacaan Do’a'],
                    ['time' => '18:50 - 19:00', 'activity' => 'Pelepasan peserta Kediri Night Carnival APEKSI 2025'],
                    ['time' => '19:00 - 19:15', 'activity' => 'Tarian Kolosal – Romansa Sekartaji'],
                    ['time' => '19:15 - 19:30', 'activity' => 'Barisan OPD'],
                    ['time' => '19:30 - 19:45', 'activity' => 'Karnaval Budaya – Perwakilan Delegasi Kota Kediri'],
                    ['time' => '19:45 - 21:45', 'activity' => 'Karnaval Budaya – Perwakilan Delegasi Komwil IV APEKSI']
                ]
            ],

            // 7. Penanaman Pohon & Penyebaran Benih Ikan
            [
                'event_name' => 'Penanaman Pohon & Penyebaran Benih Ikan',
                'venue' => 'Taman Brantas Kota Kediri',
                'date' => '18 Juli 2025',
                'attendees' => 'Walikota Anggota KOMWIL IV APEKSI Sarimbit beserta 2 Pendamping, Wakil Walikota Kota Kediri, Forkopimda Kota Kediri, Sekretaris Daerah Kota Kediri, Ketua Dewan Eksekutif APEKSI, Direktur Eksekutif APEKSI, Kepala OPD Kota Kediri',
                'dresscode' => 'Kaos Olahraga',
                'image' => 'tanam-pohon-tebar-benih.jpg',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.786880996013!2d112.00600051165615!3d-7.812370792175646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7857227dcc0931%3A0x1cff71ab45598392!2sBrantas%20Park!5e0!3m2!1sen!2sid!4v1752480914442!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'schedule' => [
                    ['time' => '05:00 - 05:30', 'activity' => 'Persiapan'],
                    ['time' => '05:30 - 06:30', 'activity' => 'Menuju lokasi mulai dari Jl. Dhoho – Jl. Kyai Mojo – Jl. Walter Monginsidi – Jl. Yos Sudarso – Taman Brantas'],
                    ['time' => '06:30 - 06:45', 'activity' => 'Coffee Break'],
                    ['time' => '06:45 - 07:15', 'activity' => 'Penanaman Pohon'],
                    ['time' => '07:15 - 07:45', 'activity' => 'Penyebaran Benih Ikan'],
                    ['time' => '07:45 - 09:15', 'activity' => 'Makan pagi dan ramah tamah'],
                    ['time' => '09:15 - 10:00', 'activity' => 'Kembali ke hotel']
                ]
            ],
        ];

        $events = collect($eventSchedules);
        $groupedEvents = $events->groupBy('date');

        $profil_apeksi = ProfilPesertaApeksi::all();
        $slides = $profil_apeksi->chunk(7);

        return view('home.index', compact(
            'groupedEvents',
            'profil_apeksi',
            'slides',
            'meta',
            'layanan',
            'wisata',
            'belanja',
            'kategori',
            'berita_terkini',
            'banners',
            'layanan_digital',
            'produk',
            'dokumen',
            'banner_promo',
            'artikel'
        ));
    }


    public function get_content_hero(Request $request)
    {
        $kategoriId = $request->id;
        $content = '';

        if ($kategoriId == 1) {
            $banners = BannerPromo::where('status_enabled', 1)->orderBy('id', 'DESC')->limit(10)->get();
            $content .= '<div class="row g-0 slick-hero-banner">';
            foreach ($banners as $item) {
                $content .= '<div class="col-md-3 px-2">
                                <div class="box-banner">
                                    <img src="' . asset("storage/banner-promo/" . $item->gambar) . '" alt="{{ $item->judul }}"  data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage(this)" class="w-100" 
                                    style="border-radius: 10px;">
                                </div>
                            </div>';
            }
            $content .= '</div>';
        } elseif ($kategoriId == 2) {
            $artikels = Artikel::where([['status_enabled', 1], ['status_published', 1], ['hits', 1]])->orderBy('id', 'DESC')->limit(4)->get();
            $content .= '<div class="row g-0 slick-hero-artikel">';
            foreach ($artikels as $item) {
                $content .= '<div class="col-md-3 px-2">
                                <a href="' . route('detail_artikel', ['slug' => $item->slug, 'id' => $item->id]) . '">
                                    <div class="box-banner">
                                        <img src="' . asset("storage/artikel/" . $item->images) . '" 
                                             class="w-100" 
                                             style="border-radius: 10px;">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" style="background: rgba(71, 68, 68, 0.5);">
                                            <h6 class="m-0">' . $item->judul . '</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>';
            }
            $content .= '</div>';
            $content .= '<div class="text-end">
                <a href="' . route('artikel') . '" class="btn mt-0 mb-2 btn-sm">
                    Selengkapnya <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>';
        } elseif ($kategoriId == 3) {
            $layanan = LayananDigital::where('status_enabled', 1)->orderBy('created_at', 'desc')->limit(4)->get();

            $content .= '<div class="row g-3">';

            foreach ($layanan as $item) {
                $content .= '
                <div class="col-md-3">
                    <div class="border rounded p-3 h-100">
                        <h6 class="fw-bold text-primary text-center">
                            <a href="' . htmlspecialchars($item->url) . '" class="text-decoration-none text-primary">' .
                    htmlspecialchars($item->nama_layanan) .
                    '</a>
                        </h6>
                        <span>' . $item->deskripsi . '
                    </div>
                </div>';
            }
            $content .= '</div>';
            $content .= '<div class="text-end">
                <a href="#layanan-digital" class="btn mt-0 mb-2 btn-sm">
                    Selengkapnya <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>';
        } else {
            $data = [
                ['icon' => 'bi-book-fill', 'label' => 'Sejarah Kota', 'url' => '#'],
                ['icon' => 'bi-cart-fill', 'label' => 'Pusat Belanja', 'url' => '#'],
                ['icon' => 'bi-mortarboard-fill', 'label' => 'Pendidikan', 'url' => '#'],
                ['icon' => 'bi-geo-alt-fill', 'label' => 'Wisata', 'url' => '#'],
                ['icon' => 'bi-book-fill', 'label' => 'Sejarah Kota', 'url' => '#'],
                ['icon' => 'bi-cart-fill', 'label' => 'Pusat Belanja', 'url' => '#'],
                ['icon' => 'bi-mortarboard-fill', 'label' => 'Pendidikan', 'url' => '#'],
                ['icon' => 'bi-geo-alt-fill', 'label' => 'Wisata', 'url' => '#'],
            ];
            $content .= '<div class="row">';

            foreach ($data as $item) {
                $content .= '
                <div class="col-md-3 mb-1">
                    <div class="border rounded h-100 d-flex align-items-center justify-content-start">
                        <h6 class="text-center my-1 mx-2">
                            <a href="' . $item['url'] . '" class="text-decoration-none d-flex align-items-center justify-content-center gap-2">
                                <span class="d-inline-flex bg-light rounded-circle p-2">
                                    <i class="bi ' . $item['icon'] . ' fs-5 text-primary"></i>
                                </span>
                                <span class="fw-bold text-primary">' . $item['label'] . '</span>
                            </a>
                        </h6>
                    </div>
                </div>';
            }

            $content .= '</div>';
        }

        return response()->json($content);
    }

    public function detil_agenda($id)
    {
        $agenda = KalenderAcara::where('status_enabled', 1)->findOrFail($id);

        return response()->json([
            'id' => $agenda->id,
            'judul_acara' => $agenda->judul_acara,
            'tanggal_mulai' => Carbon::parse($agenda->tanggal_mulai)->locale('id')->isoFormat('D MMMM Y'),
            'tanggal_selesai' => Carbon::parse($agenda->tanggal_selesai)->locale('id')->isoFormat('D MMMM Y'),
            'jam_mulai' => Carbon::parse($agenda->tanggal_mulai)->locale('id')->isoFormat('HH:mm'),
            'jam_selesai' => Carbon::parse($agenda->tanggal_selesai)->locale('id')->isoFormat('HH:mm'),
            'banner' => asset('storage/acara/' . $agenda->banner),
            'lokasi_acara' => $agenda->lokasi_acara,
            'maps_lokasi' => $agenda->maps_lokasi,
            'deskripsi' => $agenda->deskripsi,
        ]);
    }

    public function berita_bykategori($kategori)
    {
        if ($kategori == 1) {
            $berita = Berita::where('status_enabled', 1)
                ->where('status_published', 1)
                ->whereMonth('tanggal', Carbon::now()->month)
                ->whereYear('tanggal', Carbon::now()->year)
                ->orderBy('count_view', 'desc')
                ->limit(4)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'url' => url('/detail-berita/' . $item->id),
                        'judul' => Str::limit($item->judul, 60, '...'),
                        'images' => !empty($item->images) ? (Str::startsWith($item->images, 'http') ? $item->images : asset('storage/berita/' . $item->images)) : asset('assets/images/announ.jpg'),
                        'tanggal' => Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y'),
                    ];
                });
        } else if ($kategori ==  2) {
            $berita =  BeritaLuar::where('status_enabled', 1)
                ->where('status_published', 1)
                ->orderBy('tanggal', 'desc')
                ->limit(4)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'url' => url('/berita-luar/' . $item->slug . '/' . $item->id),
                        'judul' => Str::limit($item->judul, 60, '...'),
                        'images' => asset('assets/images/news.png'),
                        'tanggal' => Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y'),
                    ];
                });
        } else {
            $berita = Pengumuman::where('status_enabled', 1)
                ->where('status_published', 1)
                ->orderBy('tanggal', 'desc')
                ->limit(4)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'url' => url('/detil-pengumuman/' . $item->slug . '/' . $item->id),
                        'judul' => Str::limit($item->judul, 60, '...'),
                        'images' => !empty($item->gambar) ? (Str::startsWith($item->gambar, 'http') ? $item->gambar : asset('storage/pengumuman/' . $item->gambar)) : asset('assets/images/announ.jpg'),
                        'tanggal' => Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y'),
                    ];
                });
        }

        return response()->json($berita);
    }

    public function store_feedback(Request $request)
    {
        // Validasi data
        $request->validate([
            'rating' => 'required|integer|min:1|max:4',
            'infoEase' => 'required|string',
            'infoAccuracy' => 'required|string',
            'infoClarity' => 'required|string',
            'infoCategory' => 'required|string',
            'infoSuggestion' => 'required|string',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string'
        ]);

        Feedback::create($request->all());

        return response()->json(['success' => true]);
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

    public function detil_agenda_pemerintah($id)
    {
        $title['namaLink'] = 'Agenda Pemerintah';
        $data = Http::get('https://api-splp.layanan.go.id:443/t/kedirikota.go.id/simalik/1.0/api/get_agenda_byid', [
            'id' => $id,
        ]);

        $agenda = json_decode($data->body());

        // dd($agenda[0]);

        return view('home.detil-agenda', compact('agenda', 'title'));
    }

    // Adminpage - List Layanan Digital
    public function list_layanan_digital(Request $request)
    {
        try {
            if ($request->ajax()) {
                $layanan = LayananDigital::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
                return Datatables::of($layanan)
                    ->addIndexColumn()
                    ->addColumn('layanan', function ($row) {
                        $layanan = $row['nama_layanan'];
                        return $layanan;
                    })->addColumn('url', function ($row) {
                        $url = $row['url'];
                        return $url;
                    })->addColumn('action', function ($row) {
                        $actionBtn = '<button  type="button" class="btn btn-primary" onclick="editlayanan(' . $row->id . ')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation(' . $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['layanan', 'url', 'action'])
                    ->make(true);
            }
        } catch (\Exception $exception) {
            $layanan = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view('admin.home.list-layanan-digital');
    }


    // Adminpage - Update Layanan Digital
    public function update_layanan_digital(Request $request)
    {

        DB::beginTransaction();

        try {
            if (isset($request->id)) {
                LayananDigital::where(['id' => $request->id])->update([
                    'nama_layanan' => $request->nama_layanan,
                    'url' => $request->url,
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Layanan Digital Berhasil Diperbarui.');
            } else {
                LayananDigital::insert([
                    'nama_layanan' => $request->nama_layanan,
                    'url' => $request->url,
                    'created_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Layanan Digital Berhasil Ditambahkan.');
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-layanan-digital');
    }

    // Adminpage - Value Layanan Digital
    public function value_layanan_digital($id)
    {
        $layanan = LayananDigital::where('id', $id)->first();
        return response()->json($layanan);
    }

    // Adminpage - Delete Layanan Digital
    public function hapus_layanan_digital($id)
    {

        $aktif = LayananDigital::where(['id' => $id])->update([
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

    // List Banner Promo
    public function list_banner_promo(Request $request)
    {
        $titlepage = 'List Banner Promo';

        try {
            if ($request->ajax()) {
                $banner_promo = BannerPromo::where('status_enabled', 1)->orderBy('status_enabled', 'asc')->get();

                return Datatables::of($banner_promo)
                    ->addIndexColumn()
                    ->addColumn('gambar', function ($row) {
                        $gambar = '<img src="' . url('storage/banner-promo/' . $row->gambar) . '" width="200">';
                        return $gambar;
                    })->addColumn('judul', function ($row) {
                        $judul = $row->judul;
                        return $judul;
                    })->addColumn('action', function ($row) {
                        $actionBtn = '<button  type="button" class="btn btn-primary" onclick="editbanner(' . $row->id . ')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-danger" onclick="deletebannerConfirmation(' . $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['gambar', 'judul', 'action'])
                    ->make(true);
            }

            toastr()->success('Konten Berhasil Dimuat');
        } catch (\Exception $e) {
            $titlepage = [];
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');
        }

        return view('admin.banner-promo.index', compact('titlepage'));
    }

    // Update Banner Promo
    public function update_banner_promo(Request $request)
    {
        $request->validate(
            [
                'gambar' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
            ],
            [
                'gambar.image' => trans('File yang di upload harus gambar !'),
                'gambar.mimes' => trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
                'gambar.max' => trans('Ukuran file maksimal 2mb !')
            ]
        );

        // Cek apakah ada file yang diupload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'banner-promo' . '-' . time() . '.' . $file->extension();
            $file->move(storage_path('app/public/banner-promo'), $fileName);
        } else {
            $fileName = $request->gambarlama;
        }

        DB::beginTransaction();

        try {

            if (isset($request->id)) {
                BannerPromo::where(['id' => $request->id])->update([
                    'judul' => $request->judul,
                    'gambar' => $fileName,
                    'updated_at' => Carbon::now('Asia/Jakarta'),
                ]);

                toastr()->success('Banner Promo Berhasil Diperbarui.');
            } else {
                BannerPromo::insert([
                    'judul' => $request->judul,
                    'gambar' => $fileName,
                    'created_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Banner Promo Berhasil Ditambahkan.');
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect()->back();
    }

    // Value Banner Promo
    public function value_banner_promo($id)
    {
        $banner = BannerPromo::where('id', $id)->first();
        return response()->json($banner);
    }

    // Delete Banner Promo
    public function hapus_banner_promo($id)
    {

        $aktif = BannerPromo::where(['id' => $id])->update([
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
}
