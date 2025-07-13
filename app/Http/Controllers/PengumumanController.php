<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengumuman;
use Carbon\Carbon;
use DataTables;
use Auth;
use Illuminate\Support\Str;


class PengumumanController extends Controller
{
    // ------------------------------------ USER ----------------------------------------

    public function pengumuman()
    {
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Pengumuman',
            'detailpage' => false
        ];

        $pengumuman_terbaru = Pengumuman::where('status_enabled', 1)->orderBy('tanggal', 'desc')->take(10)->get();

        $excludedIds = $pengumuman_terbaru->pluck('id');

        $pengumuman_lainnya = Pengumuman::where('status_enabled', 1)->whereNotIn('id', $excludedIds)->orderBy('tanggal', 'desc')->paginate(5);
        
        return view ('pengumuman.index', compact('pengumuman_terbaru', 'pengumuman_lainnya', 'breadcrumb'));
    }

    public function detil_pengumuman($slug, $id)
    {
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Pengumuman',
            'detailpage' => true,
        ];

        // Update Count
        $post = Pengumuman::find($id);
        $count_view = Pengumuman::where(['id'=>$id])->update([
            'count_view'=> $post->count_view + 1
        ]);

        $pengumuman = Pengumuman::where('id', $id)->first();
        return view('pengumuman.detil-pengumuman', compact('pengumuman', 'breadcrumb'));
    }

    // ------------------------------------ ADMIN ----------------------------------------

    public function list_pengumuman(Request $request)
    {
        $titlepage = 'List Pengumuman';

        if ($request->ajax()) {
            $pengumuman = Pengumuman::where('status_enabled', 1)->orderBy('tanggal', 'desc')->get();
            return Datatables::of($pengumuman)
                ->addIndexColumn()
                ->addColumn('judul', function($row){
                    $judul = substr($row['judul'], 0, 300);
                    return $judul;
                })->addColumn('deskripsi', function($row){
                    $deskripsi = substr(strip_tags($row['deskripsi']), 0, 200);
                    return $deskripsi;
                })->addColumn('gambar', function($row){
                    $gambar = '<img src="'. url('storage/pengumuman/' . $row->gambar) .'" width="200">';
                    return $gambar;
                })->addColumn('tanggal', function($row){
                    $tanggal = date('d-m-Y', strtotime($row['tanggal']));
                    return $tanggal;
                })->addColumn('status', function($row){
                    if ($row->status_published == 1) {
                        $status = '<button type="button" class="btn btn-success" onclick="location.href=`/update-status-pengumuman/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                        Published
                                   </button>';
                    } else {
                        $status = '<button type="button" class="btn btn-warning" onclick="location.href=`/update-status-pengumuman/0/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                        Draft
                                   </button>';
                    }
                    return $status;
                })->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn btn-secondary" onclick="location.href=`/detil-pengumuman/'.$row->id.'`" title="Preview" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-eye"></i></button>
                                        <button  type="button" class="btn btn-primary" onclick="location.href=`/form-pengumuman/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deletepengumumanConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['judul', 'deskripsi', 'tanggal', 'status', 'action', 'gambar'])
                ->make(true);
        }

        return view ('admin.pengumuman.list-pengumuman', compact('titlepage'));
    }

    public function form_pengumuman($id)
    {
        if ($id == 'add'){
            $titlepage = 'Tambah Pengumuman';
            $pengumuman = [];
        }else{
            $titlepage = 'Edit Pengumuman';
            $pengumuman = Pengumuman::where('id', $id)->first();
        }

        return view ('admin.pengumuman.form-pengumuman', compact('titlepage', 'pengumuman'));
    }

    public function update_pengumuman(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
        ],
        [
            'gambar.image'=>trans('File yang di upload harus gambar !'),
            'gambar.mimes'=>trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
            'gambar.max'=>trans('Ukuran file maksimal 2mb !')
        ]);

        if (isset($request->gambar)){
            $file = $request->gambar;
            $fileName = 'pengumuman'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/pengumuman'), $fileName);
        }else{
            $fileName = $request->gambarlama;
        }

        if (isset($request->id)){
            Pengumuman::where(['id' => $request->id])->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'gambar' => $fileName,
                'slug' => Str::slug($request->judul),
                'author' => Auth::user()->id,
                'status_published' => $request->status,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Pengumuman Berhasil Diubah.');

        }else{
            Pengumuman::insert([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'gambar' => $fileName,
                'slug' => Str::slug($request->judul),
                'author' => Auth::user()->id,
                'status_published' => $request->status,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            if ($request->status == 1){
                toastr()->success('Pengumuman Berhasil Dipublish.');
            }else{
                toastr()->success('Pengumuman Berhasil Ditambahkan Sebagai Draft.');
            }
        }

        return redirect('/list-pengumuman');
    }

    public function hapus_pengumuman($id)
    {
        $aktif = Pengumuman::where(['id'=>$id])->update([
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

    public function update_status_pengumuman($status, $id)
    {   
        if ($status == 1){
            Pengumuman::where(['id' => $id])->update([
                'status_published' => 0,
            ]);

            toastr()->warning('Pengumuman Diturunkan Menjadi Draft.');
        }else{
            Pengumuman::where(['id' => $id])->update([
                'status_published' => 1,
            ]);

            toastr()->success('Pengumuman Berhasil Dipublish.');
        }

        return redirect('/list-pengumuman');
    }
}
