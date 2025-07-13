<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Berita;
use App\Models\AlbumBerita;
use App\Models\KategoriBerita;
use App\Models\BeritaLuar;
use Exception;
use Carbon\Carbon;
use Auth;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{

    // --------------------------------------- ADMINPAGE -------------------------------------

    // Adminpage - List Kategori Berita
    public function list_kategori_berita(Request $request){
        try{
            if($request->ajax()){
                $kategori = KategoriBerita::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
                return Datatables::of($kategori)
                ->addIndexColumn()
                ->addColumn('kategori', function($row){
                    $kategori = $row['nama_kategori'];
                    return $kategori;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-primary" onclick="editkategori(' . $row->id .')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['action', 'kategori'])
                ->make(true);
            }
        }catch (\Exception $exception){
            $kategori = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view('admin.berita.listkategori');
    }

    // Adminpage - Update Kategori Berita
    public function update_kategori(Request $request){        
        
        DB::beginTransaction();

        try{
            if (isset($request->id)){
                KategoriBerita::where(['id'=>$request->id])->update([
                    'nama_kategori' => $request->kategori,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Kategori Berhasil Diperbarui.');
            }else{
                KategoriBerita::insert([
                    'nama_kategori' => $request->kategori,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Kategori Berita Berhasil Ditambahkan.');
            }

            DB::commit();
        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/kategori');
    }

    // Adminpage - Value Kategori Berita
    public function valuekategori($id){
        $kategori = KategoriBerita::where('id', $id)->first();
        return response()->json($kategori);
    }

    // Adminpage - Delete Kategori
    public function hapus_kategori($id){
      
        $kategoriBerita = Berita::where('id_kategori', $id)->get();

        if (count($kategoriBerita) == 0){
            $aktif = KategoriBerita::where(['id'=>$id])->update([
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

        } else{
            $success = false;
            $message = "Data Tidak Bisa Dihapus Karena Terhubung Dengan Data Lain!";
        }

        //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // Adminpage - List Berita
    public function list_berita(Request $request){
        $titlepage = 'List Berita';
        try{
            if ($request->ajax()) {
                $berita = Berita::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
                return Datatables::of($berita)
                    ->addIndexColumn()
                    ->addColumn('judul', function($row){
                        $judul = substr($row['judul'], 0, 300) . '...';
                        return $judul;
                    })->addColumn('deskripsi', function($row){
                        $deskripsi =   substr(strip_tags($row['deskripsi']), 0, 200);
                        return $deskripsi;
                    })->addColumn('tanggal', function($row){
                        $tanggal = date('d-m-Y', strtotime($row['tanggal']));
                        return $tanggal;
                    })->addColumn('status', function($row){
                        if ($row->status_published == 1) {
                            $status = '<button type="button" class="btn btn-success" onclick="location.href=`/update-status-berita/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                            Published
                                       </button>';
                        } else {
                            $status = '<button type="button" class="btn btn-warning" onclick="location.href=`/update-status-berita/0/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                            Draft
                                       </button>';
                        }
                        return $status;
                    })->addColumn('action', function($row){
                        $actionBtn = '<button type="button" class="btn btn-warning" onclick="location.href=`/detail-berita/'.$row->id.'`" title="Preview" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-eye"></i></button>
                                        <button  type="button" class="btn btn-primary" onclick="location.href=`/form-berita/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deleteberitaConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['action', 'judul', 'deskripsi', 'tanggal', 'status'])
                    ->make(true);
            }
        }catch (\Exception $exception){
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.berita.listberita', compact('titlepage'));
    }

    // Adminpage - Form Berita
    public function form_berita(Request $request, $id){
        if ($id == 'add'){
            $titlepage = 'Tambah Berita';
            $berita = [];
            // $table = 'off';
            // $album = '';
            // $foto_berita = [];
        }else{
            $titlepage = 'Edit Berita';
            $berita = Berita::where('id', $id)->first();
            // $table = 'on';
            // $foto_berita = AlbumBerita::where([['id_berita', $berita->id], ['status_enabled', 1]])->get();
        }

        $kategori = KategoriBerita::get();

        return view ('admin.berita.formberita', compact('titlepage', 'berita', 'kategori'));
    }

    // Adminpage - Update Berita
    public function update_berita(Request $request) {
        DB::beginTransaction();

        try {
            // Validasi input
            $request->validate([
                'images' => 'image|mimes:jpeg,jpg,png,webp,svg|max:2048',
            ]);

            // Cek apakah ada file yang diupload
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $filename = 'berita' . time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berita', $filename, 'public'); 
            } else{
                $filename = $request->gambarlama;
            }

            // Update berita jika ID tersedia
            if (isset($request->id)) {
                $berita = Berita::findOrFail($request->id);
            
                // Jika berita yang diperbarui diset eksklusif, ubah semua berita lain menjadi 0
                if ($request->eksklusif == 1) {
                    Berita::where('id', '!=', $request->id)->update(['eksklusif' => 0]);
                }
            
                $berita->update([
                    'id_kategori' => $request->id_kategori,
                    'judul' => $request->judul,
                    'slug'=> Str::slug($request->judul),
                    'deskripsi' => $request->deskripsi,
                    'images' => $filename,
                    'tanggal' =>$request->tanggal,
                    'status_published' => $request->status_published,
                    'eksklusif' => $request->eksklusif ?? 0, 
                    'author' => Auth::user()->id,
                ]);
            
                toastr()->success('Berita Berhasil Diperbarui.');
            
            } else {
                if ($request->eksklusif == 1) {
                    // Berita::query()->update(['eksklusif' => 0]);
                    Berita::where('id', '!=', $request->id)->update(['eksklusif' => 0]);
                }
            
                // Menyimpan berita baru
                $berita = Berita::create([
                    'id_kategori' => $request->id_kategori,
                    'judul' => $request->judul,
                    'slug'=> Str::slug($request->judul),
                    'deskripsi' => $request->deskripsi,
                    'images' => $filename,
                    'tanggal' =>$request->tanggal,
                    'status_published' => $request->status_published,
                    'eksklusif' => $request->eksklusif ?? 0, // Default ke 0 jika tidak dicentang
                    'author' => Auth::user()->id,
                ]);
            
                toastr()->success('Berita Berhasil Ditambahkan.');
            }
            
    
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }
    
        return redirect('/list-berita');
    }    

    // Adminpage - Update Status Berita
    public function update_status_berita($status, $id)
    {   
        if ($status == 1){
            Berita::where(['id' => $id])->update([
                'status_published' => 0,
            ]);

            toastr()->warning('Berita Diturunkan Menjadi Draft.');
        }else{
            Berita::where(['id' => $id])->update([
                'status_published' => 1,
            ]);

            toastr()->success('Berita Berhasil Dipublish.');
        }

        return redirect('/list-berita');
    }

    public function hapus_berita($id){
        $aktif = Berita::where(['id'=>$id])->update([
            'eksklusif' => 0,
            'status_published' => 0,
            'status_enabled' => 0,
            'updated_at' => Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        // //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // Adminpage - List Berita
    public function list_berita_luar(Request $request){
        $titlepage = 'List Berita Luar';
        try{
            if ($request->ajax()) {
                $berita = BeritaLuar::where('status_enabled', 1)->orderBy('id', 'desc')->get();
                return Datatables::of($berita)
                    ->addIndexColumn()
                    ->addColumn('web', function($row){
                        $web =  $row['web'];
                        return $web;
                    })->addColumn('judul', function($row){
                        $judul = substr($row['judul'], 0, 300) . '...';
                        return $judul;
                    })->addColumn('link', function($row){
                        $link =  $row['link'];
                        return $link;
                    })->addColumn('status', function($row){
                        if ($row->status_published == 1) {
                            $status = '<button type="button" class="btn btn-success" onclick="location.href=`/update-status-berita-luar/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                            Published
                                       </button>';
                        } else {
                            $status = '<button type="button" class="btn btn-warning" onclick="location.href=`/update-status-berita-luar/0/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                            Draft
                                       </button>';
                        }
                        return $status;
                    })->addColumn('action', function($row){
                        $actionBtn = '<button type="button" class="btn btn-warning" onclick="location.href=`/detail-berita-luar/'.$row->id.'`" title="Preview" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-eye"></i></button>
                                        <button  type="button" class="btn btn-primary" onclick="location.href=`/form-berita-luar/' . $row->id.'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deleteberitaConfirmation('. $row->id. ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['action', 'judul', 'web', 'link', 'status'])
                    ->make(true);
            }
        }catch (\Exception $exception){
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.berita.listdalamberita', compact('titlepage'));
    }

     // Adminpage - Form Dalam Berita
     public function form_berita_luar(Request $request, $id){
        if ($id == 'add'){
            $titlepage = 'Tambah Berita Luar';
            $berita = [];
        }else{
            $titlepage = 'Edit Berita Luar';
            $berita = BeritaLuar::where('id', $id)->first();
        }

        return view ('admin.berita.formdalamberita', compact('titlepage', 'berita'));
    }

    // Adminpage - Update Dalam Berita
    public function update_berita_luar(Request $request) {
   
        try {
            // Validasi input
            $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required',
                'link' => 'required|url',
                'web' => 'required',
            ]);
    
            // Update berita jika ID tersedia
            if (isset($request->id)){
                BeritaLuar::where(['id'=>$request->id])->update([
                    'tanggal' => Carbon::today('Asia/Jakarta'),
                    'judul' => $request->judul,
                    'link' => $request->link,
                    'web' => $request->web,
                    'deskripsi' => $request->deskripsi,
                    'slug' => Str::slug($request->judul),
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Berita Berhasil Diperbarui.');
            }else{
                BeritaLuar::insert([
                    'tanggal' => Carbon::today('Asia/Jakarta'),
                    'judul' => $request->judul,
                    'link' => $request->link,
                    'web' => $request->web,
                    'deskripsi' => $request->deskripsi,
                    'slug' => Str::slug($request->judul),
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);

                toastr()->success('Berita Berhasil Ditambahkan.');
            }
    
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }
    
        return redirect('/list-berita-luar');
    }    

    // Adminpage - Update Status Berita Luar
    public function update_status_berita_luar($status, $id)
    {   
        if ($status == 1){
            BeritaLuar::where(['id' => $id])->update([
                'status_published' => 0,
            ]);

            toastr()->warning('BeritacLuar Diturunkan Menjadi Draft.');
        }else{
            BeritaLuar::where(['id' => $id])->update([
                'status_published' => 1,
            ]);

            toastr()->success('Berita Luar Berhasil Dipublish.');
        }

        return redirect('/list-berita-luar');
    }

    public function hapus_berita_luar($id){
    
        $aktif = BeritaLuar::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        // //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

    }

    
    // --------------------------------------- LANDINGPAGE -------------------------------------

    public function index(){
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Berita',
        ];

        $beritaTerbaru = Berita::where([['status_enabled', 1], ['status_published', 1]])->orderBy('tanggal', 'DESC')->limit(10)->get();
        $beritaTerpopuler = Berita::where([['status_enabled', 1], ['status_published', 1]])->orderBy('count_view', 'DESC')->limit(5)->get();
        $allBerita = Berita::where([['status_enabled', 1], ['status_published', 1]])->orderBy('tanggal', 'DESC')->paginate(5);
        $beritaLuar = BeritaLuar::where([['status_enabled', 1], ['status_published', 1]])->orderBy('id', 'DESC')->limit(5)->get();

        $categories = KategoriBerita::where('status_enabled', 1)->get();
        foreach ($categories as $category) {
            $category->latestBeritaKediri = $category->beritaKategori()
            ->where([['status_enabled', 1], ['status_published', 1]])
            ->orderBy('tanggal', 'desc')
            ->take(1) 
            ->get();  
            
            
            if ($category->latestBeritaKediri->isNotEmpty()) {
                $category->paginatedBeritaKediri = $category->beritaKategori()
                    ->where([
                        ['status_enabled', 1],
                        ['status_published', 1],
                        ['id', '<', $category->latestBeritaKediri->first()->id]
                    ])->orderBy('tanggal', 'DESC')
                    ->paginate(5);
            }else {
                $category->paginatedBeritaKediri = $category->beritaKategori()
                    ->where([['status_enabled', 1], ['status_published', 1]])
                    ->orderBy('tanggal', 'DESC')
                    ->paginate(5);
            }
        }

        return view('berita.index', compact('beritaTerbaru','beritaTerpopuler', 'beritaLuar', 'allBerita', 'categories', 'breadcrumb'));
    }

    public function detail_berita($slug, $id){
        $titlepage = 'Detil Berita';
        // Update Count
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Berita',
            'detailpage' => true,
        ];

        $berita = [];
        $berita = Berita::where('id', $id)->first();
        if (!is_null($berita)) {
            $count_view = Berita::where('id', $berita->id)->update([
                'count_view' => $berita->count_view + 1
            ]);
        }
        
        $beritaLuar = BeritaLuar::where('id', $id)->first();
      
        return view('berita.detailberita', compact('berita', 'beritaLuar', 'breadcrumb'));
    }
}
