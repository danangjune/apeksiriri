<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Storage; 
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Str;

class DokumenController extends Controller
{
    // ------------------------------ USER -------------------------------------
    public function dokumen(){
        $breadcrumb  = [
            'titlemenu' => 'Pusat Media dan Informasi',
            'titlepage' => 'Dokumen',
            'detailpage' => false
        ];

        $titlepage = 'Dokumen';
        $files = Dokumen::where([['status_enabled', 1], ['status_published', 1]])->orderBy('id', 'DESC')->paginate(10);

        return view('dokumen.index', compact('files', 'breadcrumb'));
    }

    public function download_dokumen($fileName){
        $file = Dokumen::where('dokumen', $fileName)->first();

        try {
            $path = storage_path('app/public/dokumen/' . $file->dokumen);
    
            // Cek apakah fileName memiliki ekstensi
            if (!pathinfo($fileName, PATHINFO_EXTENSION)) {
                // Jika tidak ada ekstensi, buka direktori atau redirect ke halaman lain
                return redirect($file->dokumen); // Ubah ke path yang sesuai
            }

            // Cek apakah file ada
            if (!file_exists($path)) {
                toastr()->error('File tidak ditemukan.');
                return redirect()->back();
            }

    
            // Dapatkan tipe MIME
            $mimeType = mime_content_type($path);
    
            // Jika file adalah PDF, tampilkan di browser
            if ($mimeType == 'application/pdf') {
                return response()->file($path, [
                    'Content-Type' => $mimeType
                ]);
            } 
            // Jika format file lain (bukan PDF), unduh file
            else {
                return response()->download($path);
            }
        } catch (\Exception $exception) {
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
            return redirect()->back();
        }
    }

    // ------------------------------ ADMINPAGE -------------------------------------
    public function list_dokumen(Request $request)
    {
        $titlepage = 'List Dokumen';

        if ($request->ajax()) {
            $dokumen = Dokumen::where('status_enabled', 1)->orderBy('tanggal', 'desc')->get();
            return Datatables::of($dokumen)
                ->addIndexColumn()
                ->addColumn('judul', function($row){
                    $judul = substr($row['judul'], 0, 300);
                    return $judul;
                // })->addColumn('deskripsi', function($row){
                //     $deskripsi = substr(strip_tags($row['deskripsi']), 0, 200);
                //     return $deskripsi;
                // })->addColumn('gambar', function($row){
                //     $gambar = '<img src="'. url('storage/pengumuman/' . $row->gambar) .'" width="200">';
                //     return $gambar;
                })->addColumn('tanggal', function($row){
                    $tanggal = date('d-m-Y', strtotime($row['tanggal']));
                    return $tanggal;
                })->addColumn('status', function($row){
                    if ($row->status_published == 1) {
                        $status = '<button type="button" class="btn btn-success" onclick="location.href=`/update-status-dokumen/1/'.$row->id.'`" style="margin-right:5px; margin-bottom:5px;">
                                        Published
                                   </button>';
                    } else {
                        $status = '<button type="button" class="btn btn-warning" onclick="location.href=`/update-status-dokumen/0/'.$row->id.'`" style="margin-right:5px; margin-bottom:10px;">
                                        Draft
                                   </button>';
                    }
                    return $status;
                })->addColumn('action', function($row){
                    $actionBtn = '<button  type="button" class="btn btn-primary" onclick="location.href=`/form-dokumen/' . $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deletedokumenConfirmation('. $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:10px;"><i class="fas fa-trash"></i></button>';
                    return $actionBtn;
                })->rawColumns(['judul','tanggal', 'action', 'status'])
                ->make(true);
        }

        return view ('admin.dokumen.list-dokumen', compact('titlepage'));
    }

    public function form_dokumen($id)
    {
        if ($id == 'add'){
            $titlepage = 'Tambah Dokumen';
            $dokumen = [];
        }else{
            $titlepage = 'Edit Dokumen';
            $dokumen = Dokumen::where('id', $id)->first();
        }

        return view ('admin.dokumen.form-dokumen', compact('titlepage', 'dokumen'));
    }

    public function update_dokumen(Request $request)
    {
        $request->validate([
            'file' => 'mimes:zip,rar,doc,docx,pdf,ppt,pptx,xls,xlsx|max:5120'
        ], [
            'file.required' => trans('File tidak boleh kosong!'),
            'file.mimes'    => trans('Tipe file harus zip, rar, doc, docx, pdf, ppt, pptx, xls, atau xlsx!'),
            'file.max'      => trans('Ukuran file maksimal 5MB!')
        ]);        
        

        if (isset($request->file)){
            $file = $request->file;
            $fileName = $request->judul.'.'.$file->extension();
            $file->move(storage_path('app/public/dokumen'), $fileName);
        }else{
            $fileName = $request->filelama;
        }

        if (isset($request->id)){
            Dokumen::where(['id' => $request->id])->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'dokumen' => $fileName,
                'status_published' => $request->status,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            toastr()->success('Pengumuman Berhasil Diubah.');

        }else{
            Dokumen::insert([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'dokumen' => $fileName,
                'status_published' => $request->status,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            if ($request->status == 1){
                toastr()->success('Pengumuman Berhasil Dipublish.');
            }else{
                toastr()->success('Pengumuman Berhasil Ditambahkan Sebagai Draft.');
            }
        }

        return redirect('/list-dokumen');
    }

    public function hapus_dokumen($id)
    {
        $aktif = Dokumen::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'status_published' => 0,
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

    public function update_status_dokumen($status, $id)
    {   
        if ($status == 1){
            Dokumen::where(['id' => $id])->update([
                'status_published' => 0,
            ]);

            toastr()->warning('Dokumen Diturunkan Menjadi Draft.');
        }else{
            Dokumen::where(['id' => $id])->update([
                'status_published' => 1,
            ]);

            toastr()->success('Dokumen Berhasil Dipublish.');
        }

        return redirect('/list-dokumen');
    }
}
