<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
use Illuminate\Support\Str;
use DataTables;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $meta = [
            'title' => 'Website Resmi Pemkot Kediri - Portal Informasi dan Pelayanan Publik',
            'description' => 'Selamat datang di website resmi Pemerintah Kota Kediri. Dapatkan informasi terbaru, layanan publik online, berita pemerintahan, program unggulan, promo untuk warga, dan pengumuman penting. Kami hadir untuk memberikan pelayanan yang transparan, cepat, dan terpercaya bagi masyarakat.',
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
        [
            'event_name' => 'Pra Muskowil APEKSI',
            'venue' => 'Ruang Joyoboyo, Balai Kota Kediri',
            'date' => '16 April 2025',
            'attendees' => 'Anggota KOMWIL IV APEKSI',
            'dresscode' => 'Batik / Tenun Khas Daerah Anggota Komwil IV APEKSI',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126489.25957110072!2d111.93201276797652!3d-7.8121087205627395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e785708e9c75897%3A0xb9c1ee25f7b49e27!2s52Q7%2B5Q3%2C%20Pocanan%2C%20Kota%2C%20Kota%20Kediri%2C%20East%20Java%2064129!3m2!1d-7.812106099999999!2d112.01437279999999!5e0!3m2!1sen!2sid!4v1752421834184!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'schedule' => [
                ['time' => '07:00 - 08:00', 'activity' => 'Registrasi Peserta'],
                ['time' => '08:00 - 08:10', 'activity' => 'Tarian Pembuka'],
                ['time' => '08:10 - 08:15', 'activity' => 'Pembukaan oleh MC'],
                ['time' => '08:15 - 08:20', 'activity' => 'Menyanyikan lagu Indonesia Raya'],
                ['time' => '08:20 - 08:25', 'activity' => 'Menyanyikan lagu Mars APEKSI dilanjutkan Hymne APEKSI'],
                ['time' => '08:25 - 08:30', 'activity' => 'Pembacaan Do’a'],
                ['time' => '08:30 - 08:45', 'activity' => 'Laporan Kegiatan Pra MUSKOMWIL'],
                ['time' => '08:45 - 09:00', 'activity' => 'Sambutan Walikota Kediri sekaligus membuka kegiatan'],
                ['time' => '09:00 - 09:30', 'activity' => 'Paparan Sekda Kediri'],
                ['time' => '09:30 - 10:00', 'activity' => 'Pembahasan Rekomendasi KOMWIL IV APEKSI'],
                ['time' => '10:00 - 11:00', 'activity' => 'Penutupan dan ramah tamah'],
            ]
        ],
        [
            'event_name' => 'Workshop Smart City',
            'venue' => 'Hotel Grand Surya, Kediri',
            'date' => '17 April 2025',
            'attendees' => 'Perwakilan Dinas Kominfo se-KOMWIL IV',
            'dresscode' => 'Pakaian Dinas Harian (PDH)',
             'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126489.25957110072!2d111.93201276797652!3d-7.8121087205627395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e785708e9c75897%3A0xb9c1ee25f7b49e27!2s52Q7%2B5Q3%2C%20Pocanan%2C%20Kota%2C%20Kota%20Kediri%2C%20East%20Java%2064129!3m2!1d-7.812106099999999!2d112.01437279999999!5e0!3m2!1sen!2sid!4v1752421834184!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'schedule' => [
                ['time' => '08:00 - 08:30', 'activity' => 'Registrasi'],
                ['time' => '08:30 - 09:00', 'activity' => 'Pembukaan dan sambutan'],
                ['time' => '09:00 - 10:30', 'activity' => 'Sesi I: Penerapan Smart Governance'],
                ['time' => '10:30 - 10:45', 'activity' => 'Coffee Break'],
                ['time' => '10:45 - 12:00', 'activity' => 'Sesi II: Infrastruktur Teknologi'],
                ['time' => '12:00 - 13:00', 'activity' => 'Makan Siang'],
                ['time' => '13:00 - 15:00', 'activity' => 'Diskusi dan Tanya Jawab'],
                ['time' => '15:00 - 15:30', 'activity' => 'Penutupan'],
            ]
            ],
            [
            'event_name' => 'Workshop Smart City 2',
            'venue' => 'Hotel Grand Surya, Kediri',
            'date' => '18 April 2025',
            'attendees' => 'Perwakilan Dinas Kominfo se-KOMWIL IV',
            'dresscode' => 'Pakaian Dinas Harian (PDH)',
             'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126489.25957110072!2d111.93201276797652!3d-7.8121087205627395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e785708e9c75897%3A0xb9c1ee25f7b49e27!2s52Q7%2B5Q3%2C%20Pocanan%2C%20Kota%2C%20Kota%20Kediri%2C%20East%20Java%2064129!3m2!1d-7.812106099999999!2d112.01437279999999!5e0!3m2!1sen!2sid!4v1752421834184!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'schedule' => [
                ['time' => '08:00 - 08:30', 'activity' => 'Registrasi'],
                ['time' => '08:30 - 09:00', 'activity' => 'Pembukaan dan sambutan'],
                ['time' => '09:00 - 10:30', 'activity' => 'Sesi I: Penerapan Smart Governance'],
                ['time' => '10:30 - 10:45', 'activity' => 'Coffee Break'],
                ['time' => '10:45 - 12:00', 'activity' => 'Sesi II: Infrastruktur Teknologi'],
                ['time' => '12:00 - 13:00', 'activity' => 'Makan Siang'],
                ['time' => '13:00 - 15:00', 'activity' => 'Diskusi dan Tanya Jawab'],
                ['time' => '15:00 - 15:30', 'activity' => 'Penutupan'],
            ]
            ],
            [
            'event_name' => 'Workshop Smart City 4',
            'venue' => 'Hotel Grand Surya, Kediri',
            'date' => '19 April 2025',
            'attendees' => 'Perwakilan Dinas Kominfo se-KOMWIL IV',
            'dresscode' => 'Pakaian Dinas Harian (PDH)',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126489.25957110072!2d111.93201276797652!3d-7.8121087205627395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2e785708e9c75897%3A0xb9c1ee25f7b49e27!2s52Q7%2B5Q3%2C%20Pocanan%2C%20Kota%2C%20Kota%20Kediri%2C%20East%20Java%2064129!3m2!1d-7.812106099999999!2d112.01437279999999!5e0!3m2!1sen!2sid!4v1752421834184!5m2!1sen!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'schedule' => [
                ['time' => '08:00 - 08:30', 'activity' => 'Registrasi'],
                ['time' => '08:30 - 09:00', 'activity' => 'Pembukaan dan sambutan'],
                ['time' => '09:00 - 10:30', 'activity' => 'Sesi I: Penerapan Smart Governance'],
                ['time' => '10:30 - 10:45', 'activity' => 'Coffee Break'],
                ['time' => '10:45 - 12:00', 'activity' => 'Sesi II: Infrastruktur Teknologi'],
                ['time' => '12:00 - 13:00', 'activity' => 'Makan Siang'],
                ['time' => '13:00 - 15:00', 'activity' => 'Diskusi dan Tanya Jawab'],
                ['time' => '15:00 - 15:30', 'activity' => 'Penutupan'],
            ]
        ]
    ];

        return view('home.index', compact('eventSchedules', 'meta', 'layanan', 'wisata', 'belanja','kategori', 'berita_terkini', 'banners', 'layanan_digital', 'produk', 'dokumen', 'banner_promo', 'artikel'));
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
                                    <img src="'. asset("storage/banner-promo/" . $item->gambar) .'" alt="{{ $item->judul }}"  data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage(this)" class="w-100" 
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
                                        <img src="'. asset("storage/artikel/" . $item->images) .'" 
                                             class="w-100" 
                                             style="border-radius: 10px;">
                                        <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white" style="background: rgba(71, 68, 68, 0.5);">
                                            <h6 class="m-0">'. $item->judul .'</h6>
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
        if ($kategori == 1){
            $berita = Berita::where('status_enabled', 1)
            ->where('status_published', 1)
            ->whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year) 
            ->orderBy('count_view', 'desc') 
            ->limit(4) 
            ->get()
            ->map(function ($item){
                return [
                    'id' => $item->id,
                    'url' => url('/detail-berita/' . $item->id),
                    'judul' => Str::limit($item->judul, 60, '...'),
                    'images' => !empty($item->images) ? (Str::startsWith($item->images, 'http') ? $item->images : asset('storage/berita/' . $item->images)) : asset('assets/images/announ.jpg'), 
                    'tanggal' => Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y'),
                ];
            });
        }else if ($kategori ==  2){
            $berita =  BeritaLuar::where('status_enabled', 1)
            ->where('status_published', 1)
            ->orderBy('tanggal', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($item){
                return [
                    'id' => $item->id,
                    'url' => url('/berita-luar/' . $item->slug . '/' . $item->id),
                    'judul' => Str::limit($item->judul, 60, '...'),
                    'images' => asset('assets/images/news.png'),
                    'tanggal' => Carbon::parse($item->created_at)->locale('id')->isoFormat('D MMMM Y'),
                ];
            });
        }else{
            $berita = Pengumuman::where('status_enabled', 1)
            ->where('status_published', 1)
            ->orderBy('tanggal', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($item){
                return [
                    'id' => $item->id,
                    'url' => url('/detil-pengumuman/' . $item->slug .'/'. $item->id),
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
    public function banner_beranda(Request $request){
        $titlepage = 'List Banner';

        try {
            if ($request->ajax()) {
                $banner = Banner::whereIn('status_enabled', [1, 2])->orderBy('status_enabled', 'asc')->get();

                return Datatables::of($banner)
                    ->addIndexColumn()
                    ->addColumn('gambar', function($row){
                        $gambar = '<img src="'. url('storage/banner/' . $row->gambar) .'" width="200">';
                        return $gambar;
                    })->addColumn('status', function($row){
                        if ($row->status_enabled == 1) {
                            $status = '<button type="button" class="btn btn-info" onclick="location.href=`/update-status-banner/2/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                            Enabled
                                       </button>';
                        } else {
                            $status = '<button type="button" class="btn btn-danger" onclick="location.href=`/update-status-banner/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                            Disabled
                                       </button>';
                        }
                        return $status;
                    })->addColumn('action', function($row){
                        $actionBtn = '<button type="button" class="btn btn-danger" onclick="deletebannerConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['gambar', 'status', 'action'])
                    ->make(true);
            }

            toastr()->success('Konten Berhasil Dimuat');
        } catch (\Exception $e){
            $titlepage = [];
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.banner.index', compact('titlepage'));
    }

    public function update_status_banner($status, $id)
    {   
        if ($status == 2){
            Banner::where(['id' => $id])->update([
                'status_enabled' => 2,
            ]);

            toastr()->warning('Disable Banner Berhasil !');
        }else{
            Banner::where(['id' => $id])->update([
                'status_enabled' => 1,
            ]);

            toastr()->success('Enable Banner Berhasil !');
        }

        return redirect('/banner-beranda');
    }

    public function upload_banner(Request $request){
        $request->validate([
            'banner' => 'image|mimes:jpeg,png,jpg,webp,svg|max:8024'
        ],
        [
            'banner.image'=>trans('File yang di upload harus gambar !'),
            'banner.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'banner.max'=>trans('Ukuran file maksimal 8mb !')
        ]);

        $file = $request->banner;
        $fileName = 'banner'.'-'.time().'.'.$file->extension();
        $file->move(storage_path('app/public/banner'), $fileName); 

        DB::beginTransaction();

        try {
            Banner::insert([
                'gambar' => $fileName,
                'status_enabled' => 1,
                'created_at' => Carbon::now ('Asia/Jakarta')
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
    public function hapus_banner($id){

        $aktif = Banner::where(['id'=>$id])->update([
            'status_enabled'=>0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function detil_agenda_pemerintah($id){
        $title['namaLink'] = 'Agenda Pemerintah';
        $data = Http::get('https://api-splp.layanan.go.id:443/t/kedirikota.go.id/simalik/1.0/api/get_agenda_byid', [
            'id' => $id,
        ]);

        $agenda = json_decode($data->body());

        // dd($agenda[0]);

        return view ('home.detil-agenda', compact('agenda', 'title'));
    }

    // Adminpage - List Layanan Digital
    public function list_layanan_digital(Request $request){
        try{
            if($request->ajax()){
                $layanan = LayananDigital::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
                return Datatables::of($layanan)
                ->addIndexColumn()
                ->addColumn('layanan', function($row){
                    $layanan = $row['nama_layanan'];
                    return $layanan;
                })->addColumn('url', function($row){
                    $url = $row['url'];
                    return $url;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-primary" onclick="editlayanan(' . $row->id .')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['layanan', 'url', 'action'])
                ->make(true);
            }
        }catch (\Exception $exception){
            $layanan = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view('admin.home.list-layanan-digital');
    }


    // Adminpage - Update Layanan Digital
    public function update_layanan_digital(Request $request){        
        
        DB::beginTransaction();

        try{
            if (isset($request->id)){
                LayananDigital::where(['id'=>$request->id])->update([
                    'nama_layanan' => $request->nama_layanan,
                    'url' => $request->url,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Layanan Digital Berhasil Diperbarui.');
            }else{
                LayananDigital::insert([
                    'nama_layanan' => $request->nama_layanan,
                    'url' => $request->url,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Layanan Digital Berhasil Ditambahkan.');
            }

            DB::commit();
        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-layanan-digital');
    }

    // Adminpage - Value Layanan Digital
    public function value_layanan_digital($id){
        $layanan = LayananDigital::where('id', $id)->first();
        return response()->json($layanan);
    }

    // Adminpage - Delete Layanan Digital
    public function hapus_layanan_digital($id){

        $aktif = LayananDigital::where(['id'=>$id])->update([
            'status_enabled'=>0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
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
    public function list_banner_promo(Request $request){
        $titlepage = 'List Banner Promo';

        try {
            if ($request->ajax()) {
                $banner_promo = BannerPromo::where('status_enabled', 1)->orderBy('status_enabled', 'asc')->get();

                return Datatables::of($banner_promo)
                    ->addIndexColumn()
                    ->addColumn('gambar', function($row){
                        $gambar = '<img src="'. url('storage/banner-promo/' . $row->gambar) .'" width="200">';
                        return $gambar;
                    })->addColumn('judul', function($row){
                        $judul = $row->judul;
                        return $judul;
                    })->addColumn('action', function($row){
                        $actionBtn = '<button  type="button" class="btn btn-primary" onclick="editbanner(' . $row->id .')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-danger" onclick="deletebannerConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['gambar', 'judul', 'action'])
                    ->make(true);
            }

            toastr()->success('Konten Berhasil Dimuat');
        } catch (\Exception $e){
            $titlepage = [];
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.banner-promo.index', compact('titlepage'));
    }

    // Update Banner Promo
    public function update_banner_promo(Request $request){
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
        ],
        [
            'gambar.image'=>trans('File yang di upload harus gambar !'),
            'gambar.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'gambar.max'=>trans('Ukuran file maksimal 2mb !')
        ]);

        // Cek apakah ada file yang diupload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = 'banner-promo'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/banner-promo'), $fileName); 
        } else{
            $fileName = $request->gambarlama;
        }

        DB::beginTransaction();

        try {
            
            if (isset($request->id)){
                BannerPromo::where(['id'=>$request->id])->update([
                    'judul' => $request->judul,
                    'gambar' => $fileName,
                    'updated_at' => Carbon::now('Asia/Jakarta'),
                ]);
    
                toastr()->success('Banner Promo Berhasil Diperbarui.');
            }else{
                BannerPromo::insert([
                    'judul' => $request->judul,
                    'gambar' => $fileName,
                    'created_at' => Carbon::now ('Asia/Jakarta')
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
    public function value_banner_promo($id){
        $banner = BannerPromo::where('id', $id)->first();
        return response()->json($banner);
    }

    // Delete Banner Promo
    public function hapus_banner_promo($id){

        $aktif = BannerPromo::where(['id'=>$id])->update([
            'status_enabled'=>0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
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
