<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RangkaianAcara;
use App\Models\DetailRangkaianAcara;
use App\Models\ProgressHarian;
use DataTables;

class ProgressHarianController extends Controller
{

   public function formatTanggalIndonesia($tanggal1, $tanggal2 = null) {
        // Array nama bulan Indonesia
        $bulanIndo = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $tgl1 = date('d', strtotime($tanggal1));
        $bln1 = date('n', strtotime($tanggal1));
        $thn1 = date('Y', strtotime($tanggal1));

        if ($tanggal2) {
            $tgl2 = date('d', strtotime($tanggal2));
            $bln2 = date('n', strtotime($tanggal2));
            $thn2 = date('Y', strtotime($tanggal2));

            // Jika bulan dan tahun sama
            if ($bln1 == $bln2 && $thn1 == $thn2) {
                return "{$tgl1}-{$tgl2} {$bulanIndo[$bln1]} {$thn1}";
            } else {
                // Jika berbeda
                return "{$tgl1} {$bulanIndo[$bln1]} {$thn1} - {$tgl2} {$bulanIndo[$bln2]} {$thn2}";
            }
        }

        // Jika hanya 1 tanggal
        return "{$tgl1} {$bulanIndo[$bln1]} {$thn1}";
    }
    
   public function rangkaianAcara(Request $request)
   {
        if (request()->ajax()) {
            $rangkaianAcara = RangkaianAcara::all();
            return DataTables::of($rangkaianAcara)
                ->addIndexColumn()
                ->addColumn('tanggal_kegiatan', function($row){
                    $tanggal = $row->tanggal;
                    if($row->tanggal == $row->sampai){
                        $tanggal = $this->formatTanggalIndonesia($row->tanggal);
                    }else{
                        $tanggal = $this->formatTanggalIndonesia($row->tanggal, $row->sampai);
                    }
                    return $tanggal;
                })
                ->addColumn('action', function($row){
                    $data = '<a href="'.route('detail-rangkaian-acara', $row->id).'" class="btn btn-info">Detail</a>';
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
                ->addColumn('progress_persen', function($row){
                    $status = "badge badge-primary";
                    if($row->progress != null && $row->progress->progress == 100){
                        $status = "badge badge-success";
                    }
                    $data = $row->progress != null ? '<h5 class="'.$status.'">'.$row->progress->progress.'%</h5>' : "-";
                    return $data;
                })
                ->addColumn('action', function($row){
                    $data = '<a href="'.route('histori-progress', $row->id).'" class="btn btn-info">Detail</a>';
                    return $data;
                })
                ->rawColumns(['action', 'progress_persen'])
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

}
