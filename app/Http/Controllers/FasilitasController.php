<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\FasilitasKota;
use App\Models\KategoriFasilitas;
use App\Models\SubKategoriFasilitas;
use App\Models\Akomodasi;
use Carbon\Carbon;
use DataTables;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    //---------------------------------------- LANDINGPAGE -----------------------------

    public function fasilitas_kota(Request $request)
    {
        $breadcrumb  = [
            'titlemenu' => 'Mengenal Kediri',
            'titlepage' => 'Fasilitas Kota',
            'detailpage' => false
        ];

        $kategori = KategoriFasilitas::where('status_enabled', 1)->get();
        $fasilitasByKategori = [];
        $activeTab = $request->get('tab', $kategori->first()->id); // Get active tab from request or default to first

        foreach ($kategori as $item) {
            $fasilitasByKategori[$item->id] = FasilitasKota::where('kategori_id', $item->id)
                ->paginate(9)
                ->appends(['tab' => $activeTab]); // Append tab parameter to pagination links
        }

        return view('fasilitas.index', compact('kategori', 'breadcrumb', 'fasilitasByKategori', 'activeTab'));
    }


    //---------------------------------------- ADMINPAGE -----------------------------

    // Datatable Fasilitas
    public function list_fasilitas(Request $request)
    {
        $titlepage = 'List Fasilitas';
        $kategori = KategoriFasilitas::where('status_enabled', 1)->get();
        $sub_kategori = SubKategoriFasilitas::where('status_enabled', 1)->get();

        try {
            if ($request->ajax()) {
                // Ambil data fasilitas dengan filter kategori (jika ada)
                $query = FasilitasKota::where('status_enabled', 1);

                if ($request->has('kategori') && $request->kategori != null) {
                    $query->where('kategori_id', $request->kategori);
                }

                $fasilitas = $query->orderBy('created_at', 'desc')->get();

                return Datatables::of($fasilitas)
                    ->addIndexColumn()
                    ->addColumn('nama', function ($row) {
                        return $row['nama'];
                    })
                    ->addColumn('kategori', function ($row) {
                        return $row->kategori->nama_kategori ?? '-';
                    })
                    ->addColumn('sub_kategori', function ($row) {
                        return $row->sub_kategori->nama_sub ?? '-';
                    })
                    ->addColumn('action', function ($row) {
                        return '<button  type="button" class="btn btn-primary"  onclick="location.href=`/form-fasilitas/' . $row->id . '`" title="Edit" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation(' . $row->id . ')" title="Hapus" style="margin-right:5px; margin-bottom:5px;"><i class="fas fa-trash"></i></button>';
                    })
                    ->rawColumns(['nama', 'kategori', 'sub_kategori', 'action'])
                    ->make(true);
            }
        } catch (\Exception $exception) {
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
            return response()->json(['error' => 'Data gagal dimuat'], 500);
        }

        return view('admin.fasilitas.list-fasilitas', compact('titlepage', 'kategori', 'sub_kategori'));
    }


    // Get Form Fasilitas
    public function form_fasilitas($id)
    {
        $kategori = KategoriFasilitas::where('status_enabled', 1)->get();
        $sub_kategori = SubKategoriFasilitas::where('status_enabled', 1)->get();
        if ($id == 'add') {
            $titlepage = 'Tambah Fasilitas Kota';
            $fasilitas = [];
        } else {
            $titlepage = 'Edit Fasilitas Kota';
            $fasilitas = FasilitasKota::where('id', $id)->first();
        }

        return view('admin.fasilitas.form-fasilitas', compact('titlepage', 'fasilitas', 'kategori', 'sub_kategori'));
    }

    public function get_sub_kategori(Request $request)
    {
        $kategori = $request->input('kategori');
        $sub_kategori = SubKategoriFasilitas::where('kategori_id', $kategori)->get();

        return response()->json($sub_kategori);
    }

    // Insert & Update Fasilitas
    public function update_fasilitas(Request $request)
    {

        $request->validate(
            [
                'gambar' => 'image|mimes:jpeg,png,jpg,webp,svg|max:2024'
            ],
            [
                'gambar.image' => trans('File yang di upload harus gambar !'),
                'gambar.mimes' => trans('Tipe file harus .jpeg .png .jpg .webp .svg !'),
                'gambar.max' => trans('Ukuran file maksimal 2mb !')
            ]
        );

        if (isset($request->gambar)) {
            $file = $request->gambar;
            $fileName = 'fasilitas' . '-' . time() . '.' . $file->extension();
            $file->move(storage_path('app/public/fasilitas'), $fileName);
        } else {
            $fileName = $request->gambarlama;
        }

        DB::beginTransaction();

        try {
            if (isset($request->id)) {
                FasilitasKota::where(['id' => $request->id])->update([
                    'kategori_id' => $request->kategori,
                    'sub_kategori_id' => $request->sub_kategori,
                    'nama' => $request->nama,
                    'foto' => $fileName,
                    'alamat' => $request->alamat,
                    'telp' => $request->telp,
                    'link' => $request->link,
                    'map' => $request->map,
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Fasilitas Berhasil Diubah.');
            } else {
                FasilitasKota::insert([
                    'kategori_id' => $request->kategori,
                    'sub_kategori_id' => $request->sub_kategori,
                    'nama' => $request->nama,
                    'foto' => $fileName,
                    'alamat' => $request->alamat,
                    'telp' => $request->telp,
                    'link' => $request->link,
                    'map' => $request->map,
                    'created_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Fasilitas Berhasil Ditambahkan.');
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect('/list-fasilitas');
    }

    // Hapus fasilitas
    public function hapus_fasilitas($id)
    {

        $aktif = FasilitasKota::where(['id' => $id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1) {
            $success = true;
            $message = "Data Berhasil Dihapus";
        } else {
            $success = false;
            $message = "Data Tidak Ditemukan!";
        }

        // //Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    // Insert dan Update Kategori
    public function update_kategori_fasilitas(Request $request)
    {

        DB::beginTransaction();

        try {
            if (isset($request->id)) {
                KategoriFasilitas::where(['id' => $request->id])->update([
                    'nm_kategori' => $request->nm_kategori,
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Kategori Fasilitas Berhasil Diubah.');
            } else {
                KategoriFasilitas::insert([
                    'nm_kategori' => $request->nm_kategori,
                    'updated_at' => Carbon::now('Asia/Jakarta')
                ]);

                toastr()->success('Kategori Fasilitas Berhasil Ditambahkan.');
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            toastr()->error('Terdapat kesalahan dalam memproses data. Hubungi Programmer!!');
        }

        return redirect()->back();
    }

    public function value_kategori_fasilitas($id)
    {
        $kategori = KategoriFasilitas::where('id', $id)->first();
        return response()->json($kategori);
    }

    // Hapus fasilitas
    public function hapus_kategori_fasilitas($id)
    {

        $aktif = KategoriFasilitas::where(['id' => $id])->update([
            'status_enabled' => 0,
            'updated_at' => Carbon::now('Asia/Jakarta')
        ]);

        //Check data deleted or not
        if ($aktif == 1) {
            $success = true;
            $message = "Data Berhasil Dihapus";
        } else {
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
