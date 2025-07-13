<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Album;
use App\Models\FotoAlbum;
use Exception;
use Carbon\Carbon;
use DataTables;

class GaleriController extends Controller
{
    // ------------------------------------------------- ADMINPAGE ----------------------------------------------

    // Adminpage - List Album
    public function list_galeri(Request $request){

        if ($request->ajax()) {
            $album = Album::where('status_enabled', 1)->orderBy('created_at', 'desc')->get();
            return Datatables::of($album)
                ->addIndexColumn()
                ->addColumn('judul', function($row){
                    $judul = $row['judul'];
                    return $judul;
                })->addColumn('tanggal', function($row){
                    $tanggal = date('d-m-Y', strtotime($row['created_at']));
                    return $tanggal;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-primary" onclick="location.href=`/form-galeri/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" onclick="deletealbumConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['judul', 'tanggal', 'action'])
                ->make(true);
        }
        return view ('admin.galeri.list-galeri');
    }

    // Adminpage - Form Galeri
    public function form_galeri(Request $request, $id){
        if ($id == 'add'){
            $titlepage = 'Tambah Foto';
            $table = 'off';
            $album = '';
        }else{
            $titlepage = 'Edit Foto';
            $table = 'on';
            
            if ($id == 'view'){
                $album = Album::where('status_enabled', 1)->latest()->first();
            }else{
                $album = Album::where('id', $id)->first();
            }
        }

        return view ('admin.galeri.form-galeri', compact('titlepage', 'table', 'album'));
    }

    public function data_foto(Request $request, $id){
        $id_album = Album::where('id', $id)->first();
        $foto_album = FotoAlbum::where([['id_album', $id_album->id], ['status_enabled', 1]])->get();

        if ($request->ajax()) {
        return Datatables::of($foto_album)
            ->addIndexColumn()
            ->addColumn('foto', function($row){
                $foto = '<img src="'. url('storage/galeri/'. $row->foto .''). '" width="50%">';
                return $foto;
            })->addColumn('hapus', function($row){
                $hapus = '<button type="button" class="btn btn-danger" onclick="deletefotoConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                return $hapus;
            })->rawColumns(['hapus', 'foto'])->make(true);
        }

        return redirect('/form-foto/view');
    }

    public function dropzoneStore(Request $request){
        if ($request->id_album != null){
            $id_album = $request->id_album;
        }else{
            $album = Album::where('judul', $request->judul_album)->first();

            if ($album == null){
                Album::insert([
                    'judul' => $request->judul_album,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);

                $album = Album::latest()->first();
            }

            $id_album = $album->id;
        }

        $image = $request->file('file');
        $imageName = 'galeri-'.time().'.'.$image->extension();
        $image->move(storage_path('app/public/galeri'), $imageName);

        FotoAlbum::insert([
            'id_album' => $id_album,
            'foto' => $imageName,
            'created_at' => Carbon::now ('Asia/Jakarta')
        ]);
        
        return response()->json(['success'=>$imageName]);
    }

    // Adminpage - Update Judul Album
    public function update_album(Request $request){
        Album::where(['id'=>$request->id])->update([
            'judul' => $request->judul_album
        ]);

        return redirect()->back();
    }

    // Adminpage - Hapus Foto
    public function hapus_foto($id){

        $aktif = FotoAlbum::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Foto Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Foto Tidak Ditemukan!";
        }

        //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]); 
    }

    // Adminpage - Hapus Album
    public function hapus_album($id){

        $aktif = Album::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Album Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Album Tidak Ditemukan!";
        }

        //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]); 
    }
    
    // ------------------------------------------------- LANDINGPAGE ----------------------------------------------
    public function galeri(Request $request){
        $albums = Album::with('foto')->orderBy('id', 'DESC')->paginate(6); // sesuaikan jumlah per halaman

        if ($request->ajax()) {
            return view('galeri._list', compact('albums'))->render(); // untuk response AJAX
        }

        $breadcrumb = [
            'titlemenu' => 'Galeri',
            'titlepage' => 'Galeri Terbaru',
            'detailpage' => false
        ];

        return view('galeri.index', compact('albums', 'breadcrumb'));
    }

}
