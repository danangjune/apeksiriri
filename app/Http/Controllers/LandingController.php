<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LayananTerpadu;
use App\Models\KalenderAcara;
use Carbon\Carbon;
use DataTables;

class LandingController extends Controller
{
    public function index() 
    {
        $layanan = LayananTerpadu::where('status_enabled', 1)->orderBy('no_order', 'asc')->get();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $acara = KalenderAcara::where('status_enabled', 1)
                ->whereYear('tanggal_mulai', $currentYear)
                ->whereMonth('tanggal_mulai', $currentMonth)->orderBy('tanggal_mulai', 'asc')->get();
                
        $detilacara = count($acara) > 0 ? $acara[0] : '';

        return view('landing.index', compact('layanan', 'acara', 'detilacara'));
    }

    public function get_acara_details(Request $request) 
    {
        $acara = KalenderAcara::where('id', $request->id)->first();
        return response()->json($acara);
    }

    public function getBadgeData(Request $request)
    {
        $agendas = KalenderAcara::all();

        $events = [];

        foreach ($agendas as $agenda) {
            $events[] = [
                'title' => $agenda->judul_acara,
                'start' => Carbon::parse($agenda->tanggal_mulai)->toDateString(),
                'end' => Carbon::parse($agenda->tanggal_selesai)->addDay()->toDateString(), // FullCalendar butuh 'end' = hari berikutnya
                'className' => $agenda->class_name ?? 'bg-event', // kalau ada kolom warna di tabel
            ];
        }

        return response()->json($events);
    }


    public function getCardData(Request $request)
    {
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);

        $start = Carbon::create($year, $month, 1)->startOfMonth();
        $end = Carbon::create($year, $month, 1)->endOfMonth();

        $events = KalenderAcara::where('status_enabled', 1)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('tanggal_mulai', [$start, $end])
                    ->orWhereBetween('tanggal_selesai', [$start, $end])
                    ->orWhere(function ($query) use ($start, $end) {
                        $query->where('tanggal_mulai', '<', $start)
                            ->where('tanggal_selesai', '>', $end);
                    });
            })
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        $html = view('home.agenda_cards', compact('events'))->render();

        return response()->json(['html' => $html]);
    }

    public function getEventsMonthly(Request $request)
    {
        // Validasi input
        $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|min:2000',
        ]);

        $month = $request->month;
        $year = $request->year;

        // Ambil data agenda berdasarkan bulan dan tahun
        $events = KalenderAcara::whereMonth('tanggal_mulai', $month)
            ->whereYear('tanggal_mulai', $year)
            ->get();

        // Buat badge JSON
        $badges = $events->map(function ($event) {
            return [
                'date' => Carbon::parse($event->tanggal_mulai)->format('Y-m-d'),
                'badge' => true,
                'classname' => 'bg-event'
            ];
        });

        // Render cards HTML untuk agenda dengan Blade
        $cards_html = view('home.agenda_cards', compact('events'))->render();

        // Kembalikan response JSON
        return response()->json([
            'badges' => $badges,
            'cards_html' => $cards_html
        ]);
    }


    public function events_by_date($date)
    {
        $events = KalenderAcara::whereDate('tanggal_mulai', $date)->get();

        if ($events->isNotEmpty()) {
            $eventList = $events->map(function ($event) {
                return [
                    'banner' => asset('storage/acara/' . $event->banner),
                    'judul_acara' => $event->judul_acara,
                    'tanggal_mulai' => [
                        'day' => Carbon::parse($event->tanggal_mulai)->isoFormat('D'),
                        'month' => Carbon::parse($event->tanggal_mulai)->isoFormat('MMM'),
                        'full_date' => Carbon::parse($event->tanggal_mulai)->isoFormat('D MMMM Y'),
                        'time' => Carbon::parse($event->tanggal_mulai)->isoFormat('HH:mm'),
                    ],
                        'tanggal_selesai' => [
                        'full_date' => Carbon::parse($event->tanggal_selesai)->isoFormat('D MMMM Y'),
                        'time' => Carbon::parse($event->tanggal_selesai)->isoFormat('HH:mm'),
                    ],
                    'lokasi_acara' => $event->lokasi_acara,
                    'deskripsi' => $event->deskripsi,
                ];
            });

            return response()->json($eventList);
        }

        return response()->json($events);
    }

    // ---------------------------------------- ADMINPAGE -------------------------------------------

    
    // List Layanan Terpadu
    public function layanan_terpadu(Request $request)
    {
        $data['menu'] = 'Layanan Terpadu';

        try {
            if($request->ajax()){
                $layananterpadu = LayananTerpadu::where('status_enabled', 1)->orderBy('no_order', 'asc')->get();
                return Datatables::of($layananterpadu)
                ->addIndexColumn()
                ->addColumn('banner', function($row){
                    $banner = '<img src="'. url('storage/layanan-terpadu/'. $row->banner .''). '" width="100%">';
                    return $banner;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-primary" onclick="edit(' . $row->id .')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-warning" onclick="arsipConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-archive"></i></button>';
                    return $actionBtn;
                })->rawColumns(['banner', 'action'])
                ->make(true);
            }

            toastr()->success('Data Berhasil Dimuat');
        }catch (\Exception $exception){
            $layananterpadu = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.landing-page.layanan-terpadu', compact('data'));
    }

    // Upload New and Update No Order Banner
    public function banner_layanan(Request $request)
    {
        DB::beginTransaction();

        try{
            if (isset($request->banner))
            {
                $request->validate([
                    'banner' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
                ],
                [
                    'banner.image'=>trans('File yang di upload harus gambar !'),
                    'banner.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
                    'banner.max'=>trans('Ukuran file maksimal 2mb !')
                ]);
        
                $file = $request->banner;
                $fileName = 'banner'.'-'.time().'.'.$file->extension();
                $file->move(storage_path('app/public/layanan-terpadu'), $fileName);
            }
    
            if (empty($request->id)){
                LayananTerpadu::insert([
                    'banner' => $fileName,
                    'no_order' => $request->no_order,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                toastr()->success('Banner Berhasil Diupload.');
    
            }else{
                LayananTerpadu::where(['id'=>$request->id])->update([
                    'no_order' => $request->no_order,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                toastr()->success('No Order Berhasil Diubah.');
            }

            DB::commit();
        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect()->back();
    }

    // Get Value Banner For Edit
    public function value_banner_layanan($id)
    {
        $banner = LayananTerpadu::where('id', $id)->first();
        return response()->json($banner);
    }

    // Arsip Banner
    public function arsip_banner_layanan($id)
    {
        $status = LayananTerpadu::where('id', $id)->value('status_enabled');

        // dd($status);
        $banner = LayananTerpadu::where(['id'=>$id])->update([
            'status_enabled' => ($status == 1) ? 2 : 1,
            'updated_at' => Carbon::now ('Asia/Jakarta')
        ]);

        if ($banner == 1){
            $success = true;
            $message = "Data Berhasil Diarsip";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // List Arsip Banner Layanan
    public function list_arsip_banner_layanan(Request $request)
    {
        $data['menu'] = 'Arsip Banner Layanan';

        try{
            if($request->ajax()){
                $layananterpadu = LayananTerpadu::where('status_enabled', 2)->orderBy('no_order', 'asc')->get();
                return Datatables::of($layananterpadu)
                ->addIndexColumn()
                ->addColumn('banner', function($row){
                    $banner = '<img src="'. url('storage/layanan-terpadu/'. $row->banner .''). '" width="100%">';
                    return $banner;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-warning" onclick="arsipConfirmation(' . $row->id .')" title="Batal Arsip" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-undo"></i></button>
                                    <button  type="button" class="btn btn-danger" onclick="deleteConfirmation(' . $row->id .')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['banner', 'action'])
                ->make(true);
            }
        }catch(\Exception $exception){
            $layananterpadu = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.landing-page.arsip-banner', compact('data'));
    }

    // Hapus Banner Layanan
    public function hapus_banner_layanan($id)
    {
        $banner = LayananTerpadu::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now ('Asia/Jakarta')
        ]);

        if ($banner == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // List Kalender Acara
    public function kalender_acara(Request $request)
    {
        $data['menu'] = 'Kalender Acara';

        if($request->ajax()){
            $acara = KalenderAcara::where('status_enabled', 1)->orderBy('tanggal_mulai', 'desc')->get();
            return Datatables::of($acara)
            ->addIndexColumn()
            ->addColumn('banner', function($row){
                $banner = '<img src="'. url('storage/acara/'. $row->banner .''). '" width="100%">';
                return $banner;
            })->addColumn('tanggal', function($row){
                $tanggal = date('d-m-Y', strtotime($row['tanggal_mulai'])) .' s/d '. date('d-m-Y', strtotime($row['tanggal_selesai'])) ;
                return $tanggal;
            })->addColumn('deskripsi', function($row){
                $deskripsi =   substr(strip_tags($row['deskripsi']), 0, 200) .'...';
                return $deskripsi;
            })->addColumn('action', function($row){
                $actionBtn = '<button  type="button" class="btn btn-primary" onclick="location.href=`/form-kalender-acara/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                return $actionBtn;
            })->rawColumns(['banner', 'action', 'tanggal'])
            ->make(true);
        }

        return view ('admin.landing-page.kalender-acara', compact('data'));
    }

    // Get Form Kalender Acara
    public function form_kalender_acara(Request $request, $id)
    {
        if ($id == 'add'){
            $titlepage = 'Tambah Kalender Acara';
            $acara = [];
        }else{
            $titlepage = 'Edit Kalender Acara';
            $acara = KalenderAcara::where('id', $id)->first();
        }

        return view ('admin.landing-page.form-kalender-acara', compact('titlepage', 'acara'));
    }

    // Create & Update Kalender Acara
    public function update_kalender_acara(Request $request)
    {
        $request->validate([
            'banner' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
        ],
        [
            'banner.image'=>trans('File yang di upload harus gambar !'),
            'banner.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'banner.max'=>trans('Ukuran file maksimal 2mb !')
        ]);

        if (isset($request->banner)){
            $file = $request->banner;
            $fileName = 'acara'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/acara'), $fileName); 
        }else{
            $fileName = $request->bannerlama;
        }

        DB::beginTransaction();

        try{
            if (isset($request->id)){
                KalenderAcara::where(['id'=>$request->id])->update([
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'judul_acara' => $request->judul_acara,
                    'lokasi_acara' => $request->lokasi_acara,
                    'maps_lokasi' => $request->maps_lokasi,
                    'banner' => $fileName,
                    'deskripsi' => $request->deskripsi,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Kalendeer Acara Berhasil Diperbarui.');

            }else{
                KalenderAcara::insert([
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'judul_acara' => $request->judul_acara,
                    'lokasi_acara' => $request->lokasi_acara,
                    'maps_lokasi' => $request->maps_lokasi,
                    'banner' => $fileName,
                    'deskripsi' => $request->deskripsi,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Kalender Acara Berhasil Ditambahkan.');
            }

            DB::commit();

        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/kalender-acara');
    } 

    public function hapus_kalender_acara($id) {
        $banner = KalenderAcara::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now ('Asia/Jakarta')
        ]);

        if ($banner == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
