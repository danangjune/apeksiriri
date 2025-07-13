<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PesonaKediri;
use App\Models\KategoriAset;
use App\Models\AsetKediri;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DataTables;

class PesonaKediriController extends Controller
{
    // --------------------------------------- USER ------------------------------------------

    // SHOW PESONA KEDIRI RAYA PAGE
    public function pesona_kediri_raya()
    {

        $pesona = PesonaKediri::first();
   
        $categories = KategoriAset::where('status_enabled', 1)->get();

        foreach ($categories as $category) {
            $category->paginatedAsetKediri = $category->asetKediri()
                ->where('status_enabled', 1)
                ->paginate(8); 
        }

        $meta = [
            'title' => 'Pemkot Kediri - Pesona Kediri Raya',
            'description' => Str::limit(strip_tags($pesona->deskripsi), 150, '...'),
        ];
        
        // dd($categories);
        return view('pesona-kediri.pesona-kediri-raya', compact('meta', 'pesona', 'categories'));
    }

    // Detil Aset
    public function detil_aset($id)
    {
        $aset = AsetKediri::where('status_enabled', 1)->findOrFail($id);

        return response()->json([
            'id' => $aset->id,
            'nama' => $aset->nama,
            'gambar_url' => asset('storage/aset/' . $aset->gambar),
            'lokasi' => $aset->alamat,
            'maps' => $aset->maps,
            'jam_buka' => Carbon::parse($aset->jam_buka)->format('H:i'),
            'jam_tutup' => Carbon::parse($aset->jam_tutup)->format('H:i'),
            'harga_tiket' => $aset->harga_tiket,
            'deskripsi' => $aset->deskripsi,
        ]);
    }

    public function detil_wisata($slug, $id)
    {
        $breadcrumb  = [
            'titlemenu' => 'Mengenal Kediri',
            'titlepage' => 'Perangkat Daerah',
            'detailpage' => true,
        ];
    
        $wisata = AsetKediri::where('status_enabled', 1)->findOrFail($id);

        $meta = [
            'title' => $wisata->nama,
            'description' => Str::limit(strip_tags($wisata->deskripsi), 150, '...'),
        ];

        return view ('pesona-kediri.detil', compact('wisata', 'meta', 'breadcrumb'));
    }

    // --------------------------------------- ADMIN ------------------------------------------

    // FORM SECTION DESKRIPSI PESONA KEDIRI RAYA
    public function form_pesona_kediri()
    {
        $titlepage = 'Pesona Kediri Raya';
        $pesona = PesonaKediri::first();
        return view('admin.pesona-kediri.form-pesona-kediri', compact('titlepage', 'pesona'));
    }

    // UPDATE DESKRIPSI PESONA KEDIRI RAYA
    public function update_pesona_kediri(Request $request)
    {
        DB::beginTransaction();

        try{
            $request->validate([
                'gambar1' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024',
                'gambar2' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024',
                'gambar3' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
            ]);
    
            if(isset($request->gambar1)){
                $file1 = $request->gambar1;
                $fileName1 = 'pesona'.'-'.time().'.'.$file1->extension();
                $file1->move(storage_path('app/public/pesona-kediri'), $fileName1);
            }else{
                $fileName1 = $request->gambarlama1;
            }
    
            if(isset($request->gambar2)){
                $file2 = $request->gambar2;
                $fileName2 = 'pesona'.'-'.time().'.'.$file2->extension();
                $file2->move(storage_path('app/public/pesona-kediri'), $fileName2);
            }else{
                $fileName2 = $request->gambarlama2;
            }
    
            if(isset($request->gambar3)){
                $file3 = $request->gambar3;
                $fileName3 = 'pesona'.'-'.time().'.'.$file3->extension();
                $file3->move(storage_path('app/public/pesona-kediri'), $fileName3);
            }else{
                $fileName3 = $request->gambarlama3;
            }
    
            PesonaKediri::where(['id'=>$request->id])->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar1' => $fileName1,
                'gambar2' => $fileName2,
                'gambar3' => $fileName3,
                'updated_at' => Carbon::now ('Asia/Jakarta')
            ]);
    
            toastr()->success('Data Berhasil Diubah.');

            DB::commit();
        }catch(\Exception $exception){
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect()->back();
    }

    // SHOW DATATABLE FASILITAS DAN PRODUK
    public function ada_apa_kediri(Request $request)
    {
        $titlepage = 'Ada Apa Di Kediri';
        $kategori = KategoriAset::where('status_enabled', 1)->get();

        if ($request->ajax()) {
            if ($request->kategori_id){
                $kategoriId = $request->kategori_id;

                $aset = AsetKediri::when($kategoriId, function ($query, $kategoriId) {
                    return $query->where([['kategori_id', $kategoriId],['status_enabled', 1]]);
                })->get();
            }else{
                $aset = AsetKediri::where('status_enabled', 1)->with('kategori_aset')->orderBy('created_at', 'desc')->get();

            }

            return Datatables::of($aset)
                ->addIndexColumn()
                ->addColumn('kategori', function($row){
                    $kategori = empty($row->kategori_id) ? '-' : $row->kategori_aset->nama_kategori;
                    return $kategori;
                })->addColumn('gambar', function($row){
                    $gambar = '<img src="'. url('storage/aset/' . $row->gambar) .'" width="200">';
                    return $gambar;
                })->addColumn('action', function($row){
                    $action = '<button type="button" class="btn btn-warning" onclick="location.href=`/form-ada-apa/'. $row->id .'`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $action;
                })->rawColumns(['kategori','action', 'gambar'])
                ->make(true);
        }

        toastr()->success('Data Berhasil Dimuat');

        return view('admin.pesona-kediri.ada-apa-kediri', compact('titlepage', 'kategori'));
    }

    // FORM FASILITAS & PRODUK
    public function form_ada_apa($id)
    {
        $kategori = KategoriAset::where('status_enabled', 1)->get();

        if ($id == 'add'){
            $titlepage = 'Tambah Fasilitas & Produk';
            $aset = [];
        }else{
            $titlepage = 'Edit Fasilitas & Produk';
            $aset = AsetKediri::where('id', $id)->first();
        }

        return view ('admin.pesona-kediri.form-ada-apa', compact('titlepage', 'aset', 'kategori'));
    }

    // UPDATE DATA FASILITAS & PRODUK
    public function update_aset(Request $request)
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
            $fileName = 'aset'.'-'.time().'.'.$file->extension();
            $file->move(storage_path('app/public/aset'), $fileName); 
        }else{
            $fileName = $request->gambarlama;
        }

        if (isset($request->id)){
            AsetKediri::where(['id'=>$request->id])->update([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori,
                'gambar' => $fileName,
                'alamat' => $request->alamat,
                'maps' => $request->maps,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'harga_tiket' => $request->harga_tiket,
                'deskripsi' => $request->deskripsi,
                'slug'=> Str::slug($request->nama),
                'updated_at' => Carbon::now ('Asia/Jakarta')
            ]);

            toastr()->success('Fasilitas Berhasil Diubah.');

        }else{
            AsetKediri::insert([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori,
                'gambar' => $fileName,
                'alamat' => $request->alamat,
                'maps' => $request->maps,
                'jam_buka' => $request->jam_buka,
                'jam_tutup' => $request->jam_tutup,
                'harga_tiket' => $request->harga_tiket,
                'deskripsi' => $request->deskripsi,
                'slug'=> Str::slug($request->nama),
                'created_at' => Carbon::now ('Asia/Jakarta')
            ]);

            toastr()->success('Data Aset Berhasil Ditambahkan.');
        }

        return redirect('/ada-apa-kediri');
    }

    // Hapus Aset
    public function hapus_aset($id)
    {
        $aktif = AsetKediri::where(['id'=>$id])->update([
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

    // SHOW DATATABLE KATEGORI ASET
    public function list_kategori_aset(Request $request)
    {
        $titlepage = 'Kategori Aset';
        $kategori = KategoriAset::where('status_enabled', '1')->get();
        
        if ($request->ajax()) {
            return Datatables::of($kategori)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $action = '<button type="button" class="btn btn-warning" onclick="edit(' . $row->id .')" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="deleteConfirmation('. $row->id . ')" title="Delete" style="margin-right:5px; margin-bottom:5px;"><i class="fa fa-trash"></i></button>';
                    return $action;
                })->rawColumns(['action'])
                ->make(true);
        }

        return view ('admin.pesona-kediri.list-kategori-aset', compact('titlepage'));
    }

    // UPDATE KATEGORI ASET
    public function update_kategori_aset(Request $request)
    {
        if (isset($request->id)){
            KategoriAset::where(['id'=>$request->id])->update([
                'nama_kategori' => $request->nama_kategori,
                'updated_at' => Carbon::now ('Asia/Jakarta')
            ]);
        }else{
            KategoriAset::insert([
                'nama_kategori' => $request->nama_kategori,
                'created_at' => Carbon::now ('Asia/Jakarta')
            ]);

            toastr()->success('Kategori Fasilitas Berhasil Ditambahkan.');
        }

        return redirect()->back();

    }

    // GET VALUE KATEGORI ASET
    public function value_kategori_aset($id)
    {
        $kategori = KategoriAset::where('id', $id)->first();
        return response()->json($kategori);
    }

    // Hapus Kategori Aset
    public function hapus_kategori_aset($id){
        $aktif = KategoriAset::where(['id'=>$id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        if ($aktif == 1){
            $success = true;
            $message = "Data Berhasil Dihapus";
        }else{
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
