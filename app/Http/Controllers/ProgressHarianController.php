<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RangkaianAcara;
use App\Models\DetailRangkaianAcara;
use App\Models\ProgressHarian;
use DataTables;
use App\Helpers\TanggalHelper;

class ProgressHarianController extends Controller
{
    
   public function rangkaianAcara(Request $request)
   {
        if (request()->ajax()) {
            $rangkaianAcara = RangkaianAcara::all();
            return DataTables::of($rangkaianAcara)
                ->addIndexColumn()
                ->addColumn('tanggal_kegiatan', function($row){
                    $tanggal = $row->tanggal;
                    if($row->tanggal == $row->sampai){
                        $tanggal = TanggalHelper::formatTanggalIndonesia($row->tanggal);
                    }else{
                        $tanggal = TanggalHelper::formatTanggalIndonesia($row->tanggal, $row->sampai);
                    }
                    return $tanggal;
                })
                ->addColumn('action', function($row){
                    $data = '<div class="btn-group" role="group" aria-label="Basic example">';
                    $data .= '<a href="'.route('detail-rangkaian-acara', $row->id).'" class="btn btn-info btn-sm">Detail</a>';
                    $data .= '<button class="btn btn-primary btn-sm btn-edit">Edit</button>';
                    $data .= '<button class="btn btn-danger btn-sm btn-hapus">Hapus</button>';
                    $data .= '</div>';
                    return $data;
                })
                ->rawColumns(['action', 'tanggal_kegiatan'])
                ->make(true);
        }
        return view('admin.progress-harian.rangkaian-acara');
   }

   public function detailRangkaianAcara(Request $request, $id)
   {
        $rangkaianAcara = RangkaianAcara::find($id);
        if (request()->ajax()) {
            $rangkaianAcara = DetailRangkaianAcara::with(["progress"])->where("rangkaian_acara_id", $id)
                ->get();
            return DataTables::of($rangkaianAcara)
                ->addIndexColumn()
                ->addColumn('tanggal_kegiatan', function($row){
                    $tanggal = TanggalHelper::formatTanggalIndonesia($row->tanggal);
                    return $tanggal;
                })
                ->addColumn('progress_persen', function($row){
                    $status = "badge badge-primary";
                    if($row->progress != null && $row->progress->progress == 100){
                        $status = "badge badge-success";
                    }
                    $data = $row->progress != null ? '<h5 class="'.$status.'">'.$row->progress->progress.'%</h5>' : "-";
                    return $data;
                })
                ->addColumn('action', function($row){
                    $data = '<div class="btn-group" role="group" aria-label="Basic example">';
                    $data .= '<a href="'.route('histori-progress', $row->id).'" class="btn btn-info btn-sm">Detail</a>';
                    $data .= '<button class="btn btn-primary btn-sm btn-edit">Edit</button>';
                    $data .= '<button class="btn btn-danger btn-sm btn-hapus">Hapus</button>';
                    $data .= '</div>';
                    return $data;
                })
                ->rawColumns(['action', 'progress_persen', 'tanggal_kegiatan'])
                ->make(true);
        }
        return view('admin.progress-harian.detail-rangkaian-acara', compact("rangkaianAcara"));
   }

   public function storeProgress(Request $request)
   {
        try {

            $validated = $request->validate([
                'keterangan' => ['required'],
                'progress' => ['required', 'numeric', 'max:100'],
                'detail_rangkaian_acara_id' => ['required', 'numeric']
            ]);

            $detail = DetailRangkaianAcara::find($request->detail_rangkaian_acara_id);
            ProgressHarian::create([
                "keterangan" => $request->keterangan,
                "rangkaian_acara_id" => $detail->rangkaian_acara_id,
                "detail_rangkaian_acara_id" => $detail->id,
                "progress" => $request->progress
            ]);

            toastr()->success('Berhasil Menambahkan Progress');

        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }

        return redirect()->back();
   }

   public function historiProgress(Request $request, $id)
   {
        $rangkaianAcara = DetailRangkaianAcara::with(["rangkaianAcara"])->find($id);
        if (request()->ajax()) {
            $rangkaianAcara = ProgressHarian::where("detail_rangkaian_acara_id", $id)
                ->get();
            return DataTables::of($rangkaianAcara)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $data = '<a href="#" class="btn btn-danger" onclick="deleteProgress('.$row->id.')">Hapus</a>';
                    return $data;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.progress-harian.progress-harian', compact("rangkaianAcara"));
   }

   public function deleteProgress($id)
   {
        $progress = ProgressHarian::find($id);
        $progress->delete();
        toastr()->success('Berhasil Menghapus Progress');
        return redirect()->back();
   }

   public function getDataProgress()
   {
        $data = RangkaianAcara::with(["detail", "detail.progress"])->get();
        return $data;
   }

   public function storeRangkaianAcara(Request $request)
   {
        try {
            $validated = $request->validate([
                'nama' => ['required'],
                'tanggal' => ['required'],
                'sampai' => ['required']
            ]);

            RangkaianAcara::create([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'opd' => $request->opd,
                'sampai' => $request->sampai
            ]);

            toastr()->success('Berhasil Menambahkan Rangkaian Acara');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }

        return redirect()->back();
   }

   public function updateRangkaianAcara(Request $request, $id)
   {
        try {
            $validated = $request->validate([
                'nama' => ['required'],
                'tanggal' => ['required'],
                'sampai' => ['required']
            ]);

            RangkaianAcara::where('id', $id)->update([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'opd' => $request->opd,
                'sampai' => $request->sampai
            ]);

            toastr()->success('Berhasil Mengubah Rangkaian Acara');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }

        return redirect()->back();
   }

   public function delRangkaianAcara(Request $request, $id)
   {
       $r = RangkaianAcara::find($id);
       $r->delete();
       toastr()->success('Berhasil Menghapus Rangkaian Acara');
       return redirect()->back();
   }

   public function storeDetailRangkaianAcara(Request $request)
   {
        try {
            $validated = $request->validate([
                'mulai' => ['required'],
                'selesai' => ['required'],
                'kegiatan' => ['required'],
                'tanggal' => ['required']
            ]);

            DetailRangkaianAcara::create([
                'rangkaian_acara_id' => $request->rangkaian_acara_id,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
                "lokasi" => $request->lokasi,
                "uraian" => $request->uraian,
                "perlengkapan" => $request->perlengkapan,
                "catatan" => $request->catatan
            ]);

            toastr()->success('Berhasil Menambahkan Detail Rangkaian Acara');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }

        return redirect()->back();
   }

   public function updateDetailRangkaianAcara(Request $request, $id)
   {
        try {
            $validated = $request->validate([
                'mulai' => ['required'],
                'selesai' => ['required'],
                'kegiatan' => ['required'],
                'tanggal' => ['required']
            ]);

            DetailRangkaianAcara::where('id', $id)->update([
                'rangkaian_acara_id' => $request->rangkaian_acara_id,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
                "lokasi" => $request->lokasi,
                "uraian" => $request->uraian,
                "perlengkapan" => $request->perlengkapan,
                "catatan" => $request->catatan
            ]);

            toastr()->success('Berhasil Menambahkan Detail Rangkaian Acara');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }

        return redirect()->back();
   }

   public function delDetailRangkaianAcara(Request $request, $id)
   {
       $r = DetailRangkaianAcara::find($id);
       $r->delete();
       toastr()->success('Berhasil Menghapus Detail Rangkaian Acara');
       return redirect()->back();
   }



}
