<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfilKota;
use App\Models\ProgramUnggulan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\OPD;
use App\Models\KategoriOPD;
use App\Models\SejarahKota;
use App\Models\Jabatan;
use App\Models\DaftarPimpinan;
use App\Models\TentangKota;
use Carbon\Carbon;
use DataTables;

class ProfilController extends Controller
{
    // ------------------------------ ADMIN ------------------------------------

    // Show form editor for child menu profil kota
    public function profil_kota_editor($id) {
        try {
            $data = ProfilKota::where('id', $id)->first();
            toastr()->success('Konten Berhasil Dimuat');
        } catch (\Exception $e) {
            $data = [];
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');

        }

        return view('admin.profil.profil-kota-editor', compact('data'));
    }

    // Update data using tinymce editor
    public function update_profil_kota(Request $request) {
        DB::beginTransaction();

        try{
            ProfilKota::where(['id'=>$request->id])->update([
                'content' => $request->content,
                'updated_at' => Carbon::now ('Asia/Jakarta')
            ]);

            toastr()->success('Konten Berhasil Diupdate');
            DB::commit();
            
        }catch (\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }
        
        return redirect()->back();
    }

    // Show form editor for child menu deskripsi kota
    public function deskripsi_kota_editor($id) {
        $data = ProfilKota::where('id', $id)->first();
        
        if ($data){
            toastr()->success('Konten Berhasil Dimuat');
        }else{
            toastr()->error('Konten Gagal Dimuat. Hubungi Programmer!!');
        }

        if ($id == 9){
            return view('admin.profil.list-program-unggulan', compact('data'));
        }else if ($id == 11){
            return view('admin.profil.list-kelurahan', compact('data'));
        }else{
            return view('admin.profil.deskripsi-kota-editor', compact('data'));
        }
    } 

    // ------------------------------ USER ------------------------------------

    // Detil Program Unggulan
    public function detil_program($id) {
        $title['namaLink'] = 'Program Unggulan';
        $program = ProgramUnggulan::where('id', $id)->first();

        return view ('profil.detil', compact('program', 'title'));
    }
}
