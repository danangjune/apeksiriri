<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPIC;
use DataTables;

class DataPICController extends Controller
{
    public function dataPIC(Request $request)
    {
        $jenis = [
            "LO",
            "Protokol",
            "Hotel",
            "Gudang Garam",
            "EO",
            "Bandara"
        ];
         if (request()->ajax()) {
             $dataPIC = DataPIC::all();
             return DataTables::of($dataPIC)
                 ->addIndexColumn()
                 ->addColumn('action', function($row){
                     $data = '<a href="#" class="btn btn-info btn-edit">Edit</a><a href="#" class="btn btn-danger btn-hapus">Hapus</a>';
                     return $data;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
         return view('admin.data-pic.index', compact("jenis"));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'jenis' => ['required'],
                'nama' => ['required'],
                'kota' => ['required'],
                'contact' => ['required'],
            ]);
            DataPIC::create([
                "jenis" => $request->jenis,
                "nama" => $request->nama,
                "kota" => $request->kota,
                "contact" => $request->contact
            ]);
            toastr()->success('Berhasil Menambahkan Data PIC');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'jenis' => ['required'],
                'nama' => ['required'],
                'kota' => ['required'],
                'contact' => ['required'],
            ]);
            DataPIC::where("id", $id)->update([
                "jenis" => $request->jenis,
                "nama" => $request->nama,
                "kota" => $request->kota,
                "contact" => $request->contact
            ]);
            toastr()->success('Berhasil Mengubah Data PIC');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        DataPIC::where("id", $id)->delete();
        toastr()->success('Berhasil Menghapus Data PIC');
        return redirect()->back();
    }
}
