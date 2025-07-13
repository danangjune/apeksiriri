<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\SubMenu2;
use App\Models\Inflasi;
use App\Models\SubDomain;
use Illuminate\Support\Facades\Storage; 

class InformasiController extends Controller
{
    // ------------------------------------ LANDINGPAGE --------------------------------

    // Menampilkan agenda
    public function agenda(){
        $title = 'Agenda';
        $data = '<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;ctz=Asia%2FJakarta&amp;bgcolor=%23ffffff&amp;title=Agenda%20Kota%20Kediri&amp;src=Y2U0YzM4NGU5NjdiZTdiY2VlYTZjNzFlZTczYjI2ZWY2NTFhN2NjNTQxODJmOWRlZmRiNDQwYTQwOWZmZTFkMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Mjc1ZTYyNzMyMjAyNGE2Mzc0YjVkZDE0ODcyYzE5Y2Q3YzA3NmUxMGJmYzQwZWY0YjhhZmE2NTEwYWIyNTU5YkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NjYzMDAyNDcwZGU5YmFlOTI5ZGRhNTUxZDJkZWExMzVlNDMxOWI0MWY2YjM1YTYwZGFkNmU3ODYwYzYxMDRkOUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Y2Q2NGRiM2I2YTE3YmUxYTMzOThiMTVjOWU0ZGQ4N2M5ZDg1ZGM4YTYzNjkxMTk1MmM3MjAwOWMxZjZlNzZmZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZjI4Njk5ZjI5ODY1ZDJmNmJkMDA0MDU0NzE5M2Q1NjdiZTg5YWE1ODA2M2JlYmJiZDFjMWU2MDNmMzAzM2M5OUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NTYzN2QzMWIxZjg5MTI2ZjVhMDI4YmFhMDFlYzNiYTEwZjViOGU0MWYxYTI3YTBmNDE2MGI3NTY4Njc2M2VjZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ODAyOTVjMDI2ZWRjNzM5MzBjOGIxODI0MzQxNTgwNDZjOTBjMTk0ZTg5NmU5ZDNiYzRkZDQ3ZjA4ZDY3MWY4MkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=MTc3ZDExZGI0NTU1YzY5NGI4NDc1MDE1MTk5ZTkwNzlmODkxODBjMWU2ZWFiZWQwNTI4ZTc3ZDM5MGIwYzdmM0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=OTQ3NzZiNmZkZjAzMmUwN2QwYjhkODJkZjU4MTgzZjdmYTU5YzIzMWVmNGY0Yjc3MTdmNjVjNTgyNzc2NmE0NEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZTQ2ZDBiYTI5ZmYxMWYzYmI4MTE5ZGZjMjZlZTQyMzQyOWQ4YmEwYmE2NzM1NjNlOGNlNWVlZGM5YTVmYTlmNkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Y2NhYmY5NmNkMTljYTY5YTczZWZhYmUwNjFiNjUxN2NmOTYyOTdiNTFiMDBiZmM4NTMwYjNiMGVjZTFkMjA2YUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZGIxY2NkMTA3ZjhlZjExNmI2YWE4MTkxOTRiNDA4YzM2YjEyMmZlMTFlY2MyOWU4NTlhMWZjYTFmNjRhYTIzZkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=OTA3MTVlMDg5NTAzYTlkOGU1NjlhZjZhMWUxNzJjODYwYjE4MGRjN2E2Y2NlZTQxMzY4MWFlZGJjYTU5NzAyYkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YjVjMGMxMTg3MTkyMzRkZTRjOWVhOTZmNTAzZGMyYjk0NTgwYTA0NzRjMTA3MjBhZWIxMGUyMjFiMTc5YTQyNUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NmNhZjQ4OTBlZjJmMjQ2N2I0MzYxODQzNWM5YTY0MzVlOTdjZTQ5ZWQ4M2RkMTZiZGNhMTIzNjE5YmNiYzM5M0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NDdiMjEyN2ZhYWYyZmY0NGNiYTMwYTI5NWEyODE0MmZhNzBiNWFhODZlYTdiYmM3MTcwYzIyYjFkZTVmMDRjMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YTIzNDE4YTUzNDM2ZjE2Njc0ZTRjZWVlNzljMDBiMDliZWQ2ZGVhODcyN2VlODlmYzc0ODZkZWFmOWVjMDEyM0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YTU4Njc4ODYwMTJjNzU0Mjg3N2EzYWU1NjNhZmQxN2U2NDBkNDFlODI1NTFkMDE3YjYyNDQ5YTJjZDdhYjBiOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NzYzMTIyMmM5ZjNhZTYwMzYzNzY5MmEyN2RlMDNhNGQ3NTMzZWI3OGI3OTdkYTJmYjg0ODAyMDZjMDAxOTI0YUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YjdlMDI2MjI4ZWUzNzNiZTEyNmNmMmE0OTY2M2MwMTVlZjU1NzlkY2RlYzI1ZWY5MTY1OTlkODFkODJlZDViZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ODIxOTU1MWNlMTI4YjI1N2Y5ZWE5MTU4NDk1MWExMGFkYTk4ZTRkYjMxNjllNDZjMDZjYTMwNTk0OWM4ZGE4OUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YjQzMDk0MDNkODA5YzQ1OGI2ZmFmMDM2MGI3YTNmNjgzOTgwMDNiMjk4MGI0NjVlNTc5M2I4ZmE2ZGM1ZDcyMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NWY1ZWFlNTRmZTExOWRjZTFmMTMxZTJhOTZhODE2OWE3ZWM0Y2Y5OTEwMTdhNDg1Y2E2ZDM1MGJmZjM3ZjE0ZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NWY3NmRjMDYwMmQyMTgyOGZlZDcxYmU1NTA0Njg0ODM5N2FmNjFiYjZhYjA3OGM0YzkyOTUyNzgwYzBkZDY4Y0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=N2FhYTE4M2Y4YjZhZjFhNzIxNzZkOTM1YTMxYTA4MTJlN2QxMjEwNzg0YWZhMjJmZmViNjU4OGE3NTNiNzA0M0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ODM3MmI3YjYyMTYwMzQ4MjVkODM0ZmQ0Y2Y3ZjVhNTA0NjgzOTgyMTJiZmY2ZTk5ZGUyNmQwYTJkZTIzMWRjYkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZGU1MGI5YjMwZTYxMDViYTQ0MWM5MjdiNTVkZGRhNGMzYmI1ZWUyYTNjMDE3OTJhZTAyZDRhYmE2ODBjMzdhM0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NjE5OTE0Y2RjODI1OGQ0ZmNkZTZlMzEyYjYwYjM3NzQyNDE1MzFkNGNiNDAwNDZlYzVmYTZkY2VjNjUwMTEwYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NDYxY2QxNWU0MDgxNTIwNDMyNzYwMWEwNzJhN2YyMzcwODVhMDNjMDlhMzJjZDc2M2NjOGQyMjg3OTk2MWM3OEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Mzk4MzZkNzNmY2EzNTI4N2Q2YmFiMWE4NjRlY2RlN2YyNTU1ZWVkODZlM2ViYzI2MDk5Nzk3OTI0YzhjZTdmY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NTc0NjYwNGViY2NkYjdhNjQ2NjcwMWMwZGY1NjRjOGZjM2FhYTBlN2ZmMGZlOTYxOTQ1NWM2NWEyNDMwNmEzMUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NTJiYjAyNzM1M2U0ZjE2MDcyN2VlYTRjMmRkMTJhZGIzY2JiZGJmMDViMTYxNjliOWVlNTZmZWExZmYyOWQwMkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=NTEzNzE2NTk3NjVhOTc0M2RlZWI2OGRlOGQ5ZDNlZWExNzg5M2JiOGM4ZmZjN2I5ZDk1ZmJhMjI1NmE0ZTIxZEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZDdiMDViNGM0NTZhYmQ2YmNiOWQ4ZmVkNWEwNjYwYWY1NTViZWFmNDhiZGNjMzBmMWQ1YmUzNDhkOGQ5MTdlYUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=Y2ZjNWZhM2I4MzljOTcxZWM0ZmMzOWJlOTE3YWY2MjE2YjU5OGYyMzExNTJjYjNlYzMyMzcwNzc1ZWU1NjhmY0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=YjkwYjJhNWRiMjE4NzJkZDc5MzcwNTdiNWFhOTVhYTE0MmZlN2EyZWRlYzRkY2M4MjNhYWY4ZDhhYzhlOTFmNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23C0CA33&amp;color=%23009688&amp;color=%23AD1457&amp;color=%23C0CA33&amp;color=%23EF6C00&amp;color=%23F6BF26&amp;color=%23C0CA33&amp;color=%233F51B5&amp;color=%237986CB&amp;color=%23AD1457&amp;color=%23F4511E&amp;color=%23F09300&amp;color=%23F6BF26&amp;color=%23EF6C00&amp;color=%23D81B60&amp;color=%23E4C441&amp;color=%23EF6C00&amp;color=%23D81B60&amp;color=%23A79B8E&amp;color=%23E4C441&amp;color=%239E69AF&amp;color=%23D50000&amp;color=%23F09300&amp;color=%23AD1457&amp;color=%23A79B8E&amp;color=%237986CB&amp;color=%23A79B8E&amp;color=%23795548&amp;color=%23F6BF26&amp;color=%23616161&amp;color=%23F09300&amp;color=%23795548&amp;color=%238E24AA&amp;color=%239E69AF&amp;color=%237CB342&amp;color=%23F4511E" style="border:solid 1px #777" width="100%" height="600" frameborder="0" scrolling="no"></iframe>';

        return view ('informasi.index', compact('title', 'data'));
    }

    // Menampilkan kediri dalam angka
    public function kediri_dalam_angka(Request $request){

        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 36)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 36)->orderby('tgl', 'desc')->paginate(5);
        }else{
            $data = Informasi::where('idSubMenu2', 36)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title','data', 'key'));

    }

    // Menampilkan data inflasi
    public function inflasi(Request $request){
        $title = ['namaLink' => 'Inflasi Kota Kediri'];
        $key = $request->search;

        if (empty($key)){
            $data = Inflasi::where('status_enabled', 1)->orderby('created_at', 'desc')->paginate(5);
        }else{
            $data = Inflasi::where('status_enabled', 1)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title', 'data', 'key'));
    }

    // Download file inflasi
    public function download_inflasi($fileName){
        try{
            $path = 'public/inflasi/' .$fileName;
            return Storage::disk('local')->download($path);
        }catch (\Exception $exception){
            toastr()->error('Data Gagal Dimuat. Hubungi Programmer!!');
            return redirect()->back();
        }
    }

    // Menampilkan grafik_bps
    public function grafik_bps(){
        $title = ['namaLink' => 'Grafik BPS'];
        $data = '<iframe frameborder="0" marginheight="0" marginwidth="0" title="Data Visualization" allowtransparency="true" allowfullscreen="true" class="tableauViz" style="display: block; width: 1120px; height: 4027px; margin: 0px; padding: 0px; border: none;" src="https://public.tableau.com/views/BPSKOTAKEDIRI/Dashboard1?:embed=y&amp;:showVizHome=no&amp;:host_url=https%3A%2F%2Fpublic.tableau.com%2F&amp;:embed_code_version=3&amp;:tabs=no&amp;:toolbar=yes&amp;:animate_transition=yes&amp;:display_static_image=no&amp;:display_spinner=no&amp;:display_overlay=yes&amp;:display_count=yes&amp;:language=en-US&amp;:loadOrderID=0"></iframe>';
        
        return view ('informasi.index', compact('title', 'data'));
    }

    public function lowongan_pekerjaan(Request $request){
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 19)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 19)->orderby('tgl', 'desc')->paginate(5);
        } else{
            $data = Informasi::where('idSubMenu2', 19)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title', 'data', 'key'));
    }

    public function koperasi_umkm(Request $request){
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 23)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 23)->orderby('tgl', 'desc')->paginate(5);
        }else{
            $data = Informasi::where('idSubMenu2', 23)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title', 'data', 'key'));
    }

    public function telepon_penting(Request $request){
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 20)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 20)->orderby('tgl', 'desc')->paginate(5);
        }else{
            $data = Informasi::where('idSubMenu2', 20)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title', 'data', 'key'));
    }

    public function organisasi(Request $request){
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 27)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 27)->orderby('tgl', 'desc')->paginate(5);
        }else{
            $data = Informasi::where('idSubMenu2', 27)
                        ->where(function($query) use ($key) {
                            $query->where('judul', 'LIKE', '%' . $key . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
                        })
                        ->orderby('tgl', 'desc')
                        ->paginate(5);
        }

        return view ('informasi.index', compact('title', 'data'));
    }

    public function ulp(Request $request){
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', 103)->first();
        $key = $request->search;

        if (empty($key)){
            $data = Informasi::where('idSubMenu2', 103)->orderby('tgl', 'desc')->paginate(5);
        }else{
            $data = Informasi::where('idSubMenu2', 103)
            ->where(function($query) use ($key) {
                $query->where('judul', 'LIKE', '%' . $key . '%')
                    ->orWhere('deskripsi', 'LIKE', '%' . $key . '%');
            })
            ->orderby('tgl', 'desc')
            ->paginate(5);
        }
        
        return view ('informasi.index', compact('title', 'data', 'key'));
    }

    public function detil_informasi($id){
        $data = Informasi::where('id', $id)->first();
        $title = SubMenu2::select('namaLink')->where('idSubMenu2', $data['idSubMenu2'])->first();
        return view ('informasi.detil', compact('data', 'title'));
    }

    public function sub_domain()
    {
        $title = ['namaLink' => 'Sub Domain'];
        $data = SubDomain::where('group_id', 1)->get();
        return view ('informasi.index', compact('title', 'data'));
    }
}
