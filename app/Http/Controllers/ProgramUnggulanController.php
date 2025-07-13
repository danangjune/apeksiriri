<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramUnggulan;
use Carbon\Carbon;
use DataTables;

class ProgramUnggulanController extends Controller
{
    // Datatable program unggulan
    public function list_program_unggulan(Request $request){
        $data['menu'] = 'Program Unggulan';

        try {
            if ($request->ajax()) {
                $program = ProgramUnggulan::where('status_enabled', 1)->get();
                return Datatables::of($program)
                    ->addIndexColumn()
                    ->addColumn('judul', function($row){
                        $judul = substr($row['judul'], 0, 200) . '...';
                        return $judul;
                    })->addColumn('deskripsi', function($row){
                        $deskripsi = substr(strip_tags($row['deskripsi'], '<p><a><br>'),0, 150) . '...';
                        return $deskripsi;
                    })->addColumn('gambar', function($row){
                        $gambar = '<img src="'. url('storage/program-unggulan/'. $row->gambar .''). '" width="100%">';
                        return $gambar;
                    })->addColumn('action', function($row){
                        $action = '<button type="button" class="btn btn-warning" onclick="location.href=`/form-program-unggulan/'. $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                        return $action;
                    })->rawColumns(['deskripsi', 'judul', 'gambar', 'action'])
                    ->make(true);
            }

            toastr()->success('Data Berhasil Dimuat');
        }catch (\Exceprion $exception){
            $program = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.home.list-program-unggulan', compact('data'));
    }

    // Show form editor for program unggulan
    public function form_program_unggulan($id){
        if ($id == 'add'){
            $titlepage = 'Tambah Program Unggulan';
            $program = [];
        }else{
            $titlepage = 'Edit Program Unggulan';
            $program = ProgramUnggulan::where('id', $id)->first();
        }

        return view ('admin.home.form-program-unggulan', compact('titlepage', 'program'));
    }

    // Update program unggulan
    public function update_program_unggulan(Request $request){
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
            $fileName = 'program'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/program-unggulan'), $fileName); 
        }else{
            $fileName = $request->gambarlama;
        }

        DB::beginTransaction();

        try{
            if (isset($request->id)){
                ProgramUnggulan::where(['id'=>$request->id])->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $fileName,
                    'link' => $request->link,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);
                
                toastr()->success('Program Unggulan Berhasil Diubah.');
            }else{
                ProgramUnggulan::insert([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $fileName,
                    'link' => $request->link,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                toastr()->success('Program Unggulan Berhasil Ditambahkan.');
            }

            DB::commit();

        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-program-unggulan');
    }
    
    // Hapus program unggulan
    public function hapus_program_unggulan($id){
    
        $aktif = ProgramUnggulan::where(['id'=>$id])->update([
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
}
