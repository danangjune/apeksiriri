<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use App\Models\SejarahKota;
use App\Models\TentangKota;
use App\Models\DaftarPimpinan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Jabatan;
use App\Models\OPD;
use Carbon\Carbon;
use DataTables;

class TentangKediriController extends Controller
{

    // Adminpage - Visi Misi
    public function form_visimisi(){
        $titlepage = 'Visi dan Misi';
        $visi = '';
        $misi = [];
        try {
            $data = TentangKota::where('status_enabled', 1)->get();

            foreach ($data as $data) {
        
                if ($data->title == 'visi') {
                    $visi = $data->deskripsi;
                }

                if ($data->title == 'misi') {
                    $misi[] = ['id'=>$data->id, 'deskripsi'=>$data->deskripsi];
                }
            }

            toastr()->success('Data Berhasil Dimuat.'); 

        }catch (\Exception $exception){
            $visi = '';
            $misi = [];
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
        }

        return view ('admin.tentang-kediri.form-visimisi', compact('titlepage', 'visi', 'misi'));
    }

    // Adminpage - Get Value Misi
    public function valuemisi($id){
        $misi = TentangKota::where('id', $id)->first();
        return response()->json($misi);
    }

    // Adminpage - Update Visi Misi
    public function update_visimisi(Request $request){
        DB::beginTransaction();

        try{

            if ($request->updatevisi == true){
                TentangKota::where(['title'=>'visi'])->update([
                    'deskripsi' => $request->visi,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                DB::commit();
                toastr()->success('Visi Berhasil Diperbarui.');
            }
    
            if ($request->simpanmisi == true || isset($request->simpanmisi)){
                if ($request->idmisi == true || isset($request->idmisi)){
                    TentangKota::where(['id'=>$request->idmisi])->update([
                        'deskripsi' => $request->misi,
                        'updated_at' => Carbon::now ('Asia/Jakarta')
                    ]);
    
                    toastr()->success('Misi Berhasil Diperbarui.');
                }else{
                    TentangKota::insert([
                        'title' => 'misi',
                        'deskripsi' => $request->misi,
                        'created_at' => Carbon::now ('Asia/Jakarta')
                    ]);
        
                    toastr()->success('Misi Berhasil Ditambahkan.');   
                }

                DB::commit();
            }
        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Update Gagal. Hubungi Programmer!!');
        }
        

        return redirect()->back();
    }

    // Adminpage - Delete Misi
    public function hapus_misi($id){
    
        $aktif = TentangKota::where(['id'=>$id])->update([
            'status_enabled'=>0,
            'updated_at'=> Carbon::now ('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1){
            $success = true;
            $message = "Berita Berhasil Dihapus";
        }else {
            $success = false;
            $message = "Berita Tidak Ditemukan!";
        }

        // //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

    }

     // List Sejarah Kota
     public function list_sejarah(Request $request){
        if ($request->ajax()) {
            $sejarah = SejarahKota::where('status_enabled', 1)->get();
            return Datatables::of($sejarah)
                ->addIndexColumn()
                ->addColumn('tahun', function($row){
                    $tahun = $row['tahun'];
                    return $tahun;
                })->addColumn('keterangan', function($row){
                    $keterangan = substr($row['keterangan'], 0, 200) . '...';
                    return $keterangan;
                })->addColumn('action', function($row){
                    $action = '<button type="button" class="btn btn-warning" onclick="edit(' . $row->id . ')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $action;
                })->rawColumns(['tahun', 'keterangan', 'action'])
                ->make(true);
        }
        return view('admin.tentang-kediri.list-sejarah');
    }

    public function form_sejarah($id){
        $sejarah = SejarahKota::find($id);
        if ($sejarah) {
            return response()->json([
                'success' => true,
                'data' => $sejarah
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    // Update Sejarah
    public function update_sejarah(Request $request){

        DB::beginTransaction();

        try{
            if (isset($request->id)){
                SejarahKota::where(['id'=>$request->id])->update([
                    'tahun' => $request->tahun,
                    'keterangan' => $request->keterangan,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);
                
                toastr()->success('Sejarah Berhasil Diubah.');
            }else{
                SejarahKota::insert([
                    'tahun' => $request->tahun,
                    'keterangan' => $request->keterangan,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                toastr()->success('Sejarah Berhasil Ditambahkan.');
            }

            DB::commit();

        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-sejarah');
    }  

    // Hapus Sejarah
    public function hapus_sejarah($id){
        
        $aktif = SejarahKota::where(['id'=>$id])->update([
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

     // List Pimpinan
     public function list_pimpinan(Request $request){
        if ($request->ajax()) {
            $pimpinan = DaftarPimpinan::where('status_enabled', 1)->get();
            return Datatables::of($pimpinan)
                ->addIndexColumn()
                ->addColumn('nama_pimpinan', function($row){
                    $nama_pimpinan = $row['nama_pimpinan'];
                    return $nama_pimpinan;
                })->addColumn('jabatan', function($row){
                    $jabatan = $row->jabatan->nama_jabatan;
                    return $jabatan;
                })->addColumn('action', function($row){
                    $action = '<button type="button" class="btn btn-warning" onclick="location.href=`/form-pimpinan/'. $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $action;
                })->rawColumns(['nama_pimpinan', 'jabatan', 'action'])
                ->make(true);
        }
        return view('admin.tentang-kediri.list-pimpinan');
    }

    // Form Pimpinan

    public function form_pimpinan($id){
        $jabatan = Jabatan::where('status_enabled', 1)->get();
        $opd = OPD::where('status_enabled', 1)->get();
        if ($id == 'add'){
            $titlepage = 'Tambah Pimpinan';
            $pimpinan = [];
        }else{
            $titlepage = 'Edit Pimpinan';
            $pimpinan = DaftarPimpinan::where('id', $id)->first();
        }

        return view ('admin.tentang-kediri.form-pimpinan', compact('titlepage', 'jabatan', 'opd', 'pimpinan'));
    }

    // Update Pimpinan
    public function update_pimpinan(Request $request){
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
            $fileName = 'foto_pimpinan'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/pimpinan'), $fileName); 
        }else{
            $fileName = $request->fotolama;
        }

        try{
            if (isset($request->id)){
                DaftarPimpinan::where(['id'=>$request->id])->update([
                    'nama_pimpinan' => $request->nama_pimpinan,
                    'nip' => $request->nip,
                    'foto' => $fileName,
                    'id_jabatan' => $request->jabatan,
                    'id_opd' => $request->opd,
                    'pangkat' => $request->pangkat,
                    'gol_ruang' => $request->gol_ruang,
                    'deskripsi' => $request->deskripsi,
                    'updated_at' => Carbon::now ('Asia/Jakarta')
                ]);
                
                toastr()->success('Daftar Pimpinan Berhasil Diubah.');
            }else{
                DaftarPimpinan::insert([
                   'nama_pimpinan' => $request->nama_pimpinan,
                    'nip' => $request->nip,
                    'foto' => $fileName,
                    'id_jabatan' => $request->jabatan,
                    'id_opd' => $request->opd,
                    'pangkat' => $request->pangkat,
                    'gol_ruang' => $request->gol_ruang,
                    'deskripsi' => $request->deskripsi,
                    'created_at' => Carbon::now ('Asia/Jakarta')
                ]);
    
                toastr()->success('Daftar Pimpinan Berhasil Ditambahkan.');
            }

            DB::commit();

        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-pimpinan');
    }   

    // Adminpage - Delete Pimpinan
    public function hapus_pimpinan($id){
        $aktif = DaftarPimpinan::where(['id'=>$id])->update([
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

    // ------------------------------ LANDING ------------------------------------
    public function tentang_kediri(Request $request, $tab = 'sekilas') {
        $validTabs = ['sekilas', 'visimisi', 'lambang', 'sejarah', 'profilpimpinan'];
        if (!in_array($tab, $validTabs)) {
            abort(404);
        }
    
        $breadcrumb  = [
            'titlemenu' => 'Mengenal Kediri',
            'titlepage' => 'Tentang Kediri',
            'detailpage' => false
        ];
    
        $kecamatan = Kecamatan::all();
        $jumlah_kelurahan = $this->getJumlahKelurahan($kecamatan);
    
        $sejarah = SejarahKota::where('status_enabled', 1)->orderBy('id', 'ASC')->get();
    
        $visi = TentangKota::where([['status_enabled', 1], ['title', 'visi']])->first();
    
        $misi = TentangKota::where([['status_enabled', 1], ['title', 'misi']])->get();
    
        $profil_pimpinan = DaftarPimpinan::where('status_enabled', 1)
                ->whereIn('id_jabatan', [1, 2, 3, 4])
                ->limit(2)
                ->get();
    
        $meta = [
            'title' => 'Pemkot Kediri - Tentang Kediri',
            'description' => Str::limit(strip_tags(optional($visi)->deskripsi), 150, '...'),
        ];
    
        return view('tentang-kediri.index', compact(
            'kecamatan', 'jumlah_kelurahan', 'sejarah', 'visi', 'misi',
            'profil_pimpinan', 'breadcrumb', 'meta', 'tab'
        ))->with('activeTab', $tab);
    }
    
    private function getJumlahKelurahan($kecamatan)
    {
        return $kecamatan->mapWithKeys(function ($kec) {
            $count = Kelurahan::where('kd_kecamatan', $kec->kd_kecamatan)->count();
            return [$kec->kd_kecamatan => [
                'nm_kecamatan' => $kec->nm_kecamatan,
                'jumlah_kelurahan' => $count
            ]];
        });
    }
}
