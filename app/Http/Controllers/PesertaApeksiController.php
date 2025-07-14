<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilPesertaApeksi;

class PesertaApeksiController extends Controller
{
    public function index ($id)
    {
        $peserta = ProfilPesertaApeksi::where('id', $id)->first();
        $firstId = ProfilPesertaApeksi::orderBy('id', 'asc')->first()?->id;
        $lastId = ProfilPesertaApeksi::orderBy('id', 'desc')->first()?->id;


        $titlepage = 'Profil Peserta Apeksi';
        $breadcrumb  = [
            'titlemenu' => 'Profil Peserta Apeksi',
            'titlepage' => $peserta['nama'],
            'detailpage' => false
        ];

        return view ('peserta-apeksi.detil', compact('titlepage', 'breadcrumb', 'peserta', 'firstId', 'lastId'));
    }
}
