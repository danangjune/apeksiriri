<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilPesertaApeksi;

class PesertaApeksiController extends Controller
{
    public function index ($id)
    {
        $peserta = ProfilPesertaApeksi::where('id', $id)->first();

        $titlepage = 'Profil Peserta Apeksi';
        $breadcrumb  = [
            'titlemenu' => 'Profil Peserta Apeksi',
            'titlepage' => $peserta['nama'],
            'detailpage' => false
        ];

        return view ('peserta-apeksi.detil', compact('titlepage', 'breadcrumb', 'peserta'));
    }
}
