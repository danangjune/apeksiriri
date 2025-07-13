<?php

namespace App\Http\Controllers\Api;

use App\Models\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    //API GET BERITA
    public function get_berita()
    {
        $berita = Berita::where([['status_enabled', 1], ['status_published', 1]])->orderBy('tanggal', 'DESC')->paginate(10);
        return response()->json($berita);
    }

    // API GET DETIL BERITA
    public function get_detil_berita($id)
    {
        $berita = Berita::where('id', $id)->first();
        return response()->json($berita);
    }
}
