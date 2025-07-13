<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penghargaan;
use Carbon\Carbon;
use DataTables;
use Auth;
use Illuminate\Support\Str;

class PenghargaanController extends Controller
{
    // ------------------------------ USER -------------------------------------
    // PENGHARGAAN
    public function penghargaan(){
        // $penghargaan_terbaru = Penghargaan::where('status_enabled', 1)->orderBy('tanggal', 'desc')->take(5)->get();

        // $excludedIds = $penghargaan_terbaru->pluck('id');

        // $penghargaan_lainnya = Penghargaan::where('status_enabled', 1)->whereNotIn('id', $excludedIds)->orderBy('tanggal', 'desc')->paginate(5);
        
        // $currentYear = Carbon::now()->year;
        // $years = range($currentYear, 2015);

        // return view('penghargaan.index', compact('penghargaan_terbaru', 'penghargaan_lainnya', 'years'));
        // $penghargaan = Penghargaan::all();
        //  foreach($penghargaan as $p){
        //     Penghargaan::where(['id'=>$p->id])->update([
            
        //         'slug' => Str::slug($p->judul),
        //     ]);

        //  }

        $breadcrumb  = [
            'titlemenu' => 'Mengenal Kediri',
            'titlepage' => 'Penghargaan',
            'detailpage' => false
        ];

        $penghargaan_terbaru = Penghargaan::where('status_enabled', 1)->orderBy('tanggal', 'desc')->take(5)->get();
        // dd($penghargaan_terbaru);
        $excludedIds = $penghargaan_terbaru->pluck('id');

        $penghargaan_lainnya = Penghargaan::where('status_enabled', 1)->whereNotIn('id', $excludedIds)->orderBy('tanggal', 'desc')->paginate(5);

        // Tambahkan URL gambar penuh untuk AJAX
        $penghargaan_lainnya->each(function ($item) {
            $item->foto_url = !empty($item->foto) 
                ? (Str::startsWith($item->foto, 'http') ? $item->foto : asset('storage/galeri/' . $item->foto))
                : asset('assets/images/piala.png');
        });

        $currentYear = Carbon::now()->year;
        $years = range($currentYear, 2015);

        return view('penghargaan.index', compact('penghargaan_terbaru', 'penghargaan_lainnya', 'years', 'breadcrumb'));
    }

    public function detil_penghargaan($slug, $id)
    {
        $breadcrumb  = [
            'titlemenu' => 'Mengenal Kediri',
            'titlepage' => 'Penghargaan',
            'detailpage' => true,
        ];
     
        // Update Count
        $post = Penghargaan::find($id);
        $count_view = Penghargaan::where(['id'=>$id])->update([
            'count_view'=> $post->count_view + 1
        ]);

        $penghargaan = Penghargaan::where('id', $id)->first();
        return view('penghargaan.detil-penghargaan', compact('penghargaan', 'breadcrumb'));
    }

    public function filter_tahun(Request $request)
    {
        $year = $request->query('year');
        $query = Penghargaan::where('status_enabled', 1);

        if ($year) {
            $query->whereYear('tanggal', $year);
        }

        $penghargaan_lainnya = $query->orderBy('tanggal', 'desc')->paginate(5);

        // Pastikan foto menggunakan URL penuh
        $penghargaan_lainnya->each(function ($item) {
            $item->foto_url = !empty($item->foto) 
                ? (Str::startsWith($item->foto, 'http') ? $item->foto : asset('storage/galeri/' . $item->foto))
                : asset('assets/images/piala.png');
        });

        return response()->json([
            'penghargaan_html' => view('penghargaan.penghargaan-list', compact('penghargaan_lainnya'))->render(),
            'pagination_html' => $penghargaan_lainnya->withQueryString()->links('pagination::bootstrap-5')->toHtml()
        ]);
    }


    // ------------------------------ ADMIN ------------------------------------

    // DATATBLE PENGHARGAAN
    public function list_penghargaan(Request $request)
    {
        $titlepage = 'List Penghargaan';

        if ($request->ajax()) {
            $penghargaan = Penghargaan::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();

            return Datatables::of($penghargaan)
                ->addIndexColumn()
                ->addColumn('foto', function($row){
                    $foto = '<img src="'. url('storage/penghargaan/' . $row->foto) .'" width="200">';
                    return $foto;
                })->addColumn('tanggal', function($row){
                    $tanggal = date('d-m-Y', strtotime($row['tanggal']));
                    return $tanggal;
                })->addColumn('deskripsi', function($row){
                    $deskripsi =   substr(strip_tags($row['deskripsi']), 0, 200);
                    return $deskripsi;
                })->addColumn('action', function($row){
                    $action = '<button type="button" class="btn btn-warning" onclick="location.href=`/form-penghargaan/'. $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $action;
                })->rawColumns(['foto', 'tanggal', 'deskripsi', 'action'])
                ->make(true);
        }

        return view ('admin.penghargaan.list-penghargaan', compact('titlepage'));
    }

    // FORM PENGHARGAAN
    public function form_penghargaan($id)
    {
        if ($id == 'add'){
            $titlepage = 'Tambah Penghargaan';
            $penghargaan = [];
        }else{
            $titlepage = 'Edit Penghargaan';
            $penghargaan = Penghargaan::where('id', $id)->first();
        }

        return view ('admin.penghargaan.form-penghargaan', compact('titlepage','penghargaan'));
    }

    public function update_penghargaan(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
        ],
        [
            'foto.image'=>trans('File yang di upload harus gambar !'),
            'foto.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'foto.max'=>trans('Ukuran file maksimal 2mb !')
        ]);

        if (isset($request->foto)){
            $file = $request->foto;
            $fileName = 'penghargaan'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/penghargaan'), $fileName);
        }else{
            $fileName = $request->fotolama;
        }

        if (isset($request->id)){
            Penghargaan::where(['id'=>$request->id])->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'foto' => $fileName,
                'slug' => Str::slug($request->judul),
                'author' => Auth::user()->id,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Data Penghargaan Berhasil Diubah.');

        }else{
            Penghargaan::insert([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'foto' => $fileName,
                'slug' => Str::slug($request->judul),
                'author' => Auth::user()->id,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Data Penghargaan Berhasil Ditambahkan.');
        }

        return redirect('/list-penghargaan');
    }

    public function hapus_penghargaan($id)
    {
        $aktif = Penghargaan::where(['id'=>$id])->update([
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
