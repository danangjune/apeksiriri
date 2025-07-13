<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveReport;
use DataTables;

class LiveReportController extends Controller
{
    public function liveReport(Request $request)
    {
        $liveReport =  LiveReport::first();
         if (request()->ajax()) {
             $liveReport = LiveReport::all();
             return DataTables::of($liveReport)
                 ->addIndexColumn()
                 ->addColumn('action', function($row){
                     $data = '<a href="#" data-url="'.$row->link.'" class="btn btn-primary btn-copy">Copy</a> <a href="#" class="btn btn-info btn-edit">Edit</a>';
                     return $data;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
         return view('admin.live-report.index', compact("liveReport"));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'link' => ['required'],
            ]);

            $cekData = LiveReport::first();
            if($cekData == null){
                LiveReport::create([
                    'link' => $request->link
                ]);
            }else{
                LiveReport::where('id', $cekData->id)->update([
                    'link' => $request->link
                ]);
            }
            toastr()->success('Berhasil Menambahkan Live Report');
        } catch (\Exception $e) {
            toastr()->error('Gagal '.$e->getMessage());
        }
        return redirect()->back();
    }
 
}
