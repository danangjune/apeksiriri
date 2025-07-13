<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel;
use Carbon\Carbon;
use DataTables;
use Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    //---------------------------------------- LANDINGPAGE -----------------------------
    public function artikel() {
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Artikel',
            'detailpage' => false
        ];

        $artikels = Artikel::where([['status_enabled', 1], ['status_published', 1]])->paginate(10);
        $artikel_hits = Artikel::where([['status_enabled', 1], ['status_published', 1], ['hits', 1]])->get();

        return view('artikel.index', compact('artikels','artikel_hits', 'breadcrumb'));
    }

    public function detail_artikel($slug, $id){
        $titlepage = 'Detail Artikel';
        // Update Count
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Artikel',
            'detailpage' => true,
        ];

        $artikel = [];
        $artikel = Artikel::where('id', $id)->first();
        if (!is_null($artikel)) {
            $count_view = Artikel::where('id', $artikel->id)->update([
                'count_view' => $artikel->count_view + 1
            ]);
        }
      
        return view('artikel.detail_artikel', compact('artikel', 'breadcrumb'));
    }

    // --------------------------------------- ADMINPAGE -------------------------------------

    // Adminpage - List Artikel
    public function list_artikel(Request $request)
    {
        $titlepage = 'List Artikel';

        // try {
            if ($request->ajax()) {
                $artikel = Artikel::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
                return Datatables::of($artikel)
                    ->addIndexColumn()
                    ->addColumn('judul', function($row){
                        $judul = substr($row['judul'], 0, 300) . '...';
                        return $judul;
                    })->addColumn('deskripsi', function($row){
                        $deskripsi =   substr(strip_tags($row['deskripsi']), 0, 200);
                        return $deskripsi;
                    })->addColumn('hits', function($row){
                        if ($row->hits == 1) {
                            $hits = '<span class="badge bg-success d-inline-block text-center" style="padding: 10px 15px; font-size: 14px; width: 60px; border-radius: 8px;">
                                        Ya
                                    </span>';
                        } else {
                            $hits = '<span class="badge bg-secondary d-inline-block text-center" style="padding: 10px 15px; font-size: 14px; width: 60px; border-radius: 8px;">
                                        Tidak
                                    </span>';
                        }
                        return $hits;
                    })->addColumn('status', function($row){
                        if ($row->status_published == 1) {
                            $status = '<button type="button" class="btn btn-success" onclick="location.href=`/update-status-artikel/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                            Published
                                       </button>';
                        } else {
                            $status = '<button type="button" class="btn btn-warning" onclick="location.href=`/update-status-artikel/0/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                            Draft
                                       </button>';
                        }

                        return $status;
                    })->addColumn('action', function($row){
                        $actionBtn = '<button  type="button" class="btn btn-primary" onclick="location.href=`/form-artikel/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deleteartikelConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                        return $actionBtn;
                    })->rawColumns(['action', 'judul', 'deskripsi', 'status', 'hits'])
                    ->make(true);
            }
        // }catch (\Exception $exception){

        // }

        return view('admin.artikel.index', compact('titlepage'));
    }

    // Adminpage - Form Artikel
    public function form_artikel(Request $request, $id)
    {
        if($id == 'add'){
            $titlepage = 'Tambah Artikel';
            $artikel = [];
        }else{
            $titlepage = 'Edit Artikel';
            $artikel = Artikel::where('id', $id)->first();
        }

        return view ('admin.artikel.form-artikel', compact('titlepage', 'artikel'));
    }

    public function update_artikel(Request $request) {
        $request->validate([
            'images' => 'image|mimes:jpeg,jpg,png,webp,svg|max:2048',
        ],
        [
            'gambar.image'=>trans('File yang di upload harus gambar !'),
            'gambar.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'gambar.max'=>trans('Ukuran file maksimal 2mb !')
        ]);

        // Cek apakah ada file yang diupload
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $fileName = 'artikel'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/artikel'), $fileName);
        }else{
            $fileName = $request->gambarlama;
        }

        if (isset($request->id)){
            Artikel::where(['id' => $request->id])->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'images' => $fileName,
                'author' => Auth::user()->id,
                'hits' => $request->hits ?? 0, 
                'status_published' => $request->status,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Artikel Berhasil Diubah.');

        }else{
            Artikel::insert([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'deskripsi' => $request->deskripsi,
                'images' => $fileName,
                'author' => Auth::user()->id,
                'hits' => $request->hits ?? 0, 
                'status_published' => $request->status,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            if ($request->status == 1){
                toastr()->success('Pengumuman Berhasil Dipublish.');
            }else{
                toastr()->success('Pengumuman Berhasil Ditambahkan Sebagai Draft.');
            }
        }

        return redirect('/list-artikel');
    }

    public function update_status_artikel($status, $id)
    {
        if ($status == 1){
            Artikel::where(['id' => $id])->update([
                'status_published' => 0,
            ]);

            toastr()->warning('Artikel Diturunkan Menjadi Draft.');
        }else{
            Artikel::where(['id' => $id])->update([
                'status_published' => 1,
            ]);

            toastr()->success('Artikel Berhasil Dipublish.');
        }

        return redirect('/list-artikel');
    }

    public function hapus_artikel($id)
    {
        $aktif = Artikel::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else{
            $success = false;
            $message = "Data Tidak Ditemukan";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
