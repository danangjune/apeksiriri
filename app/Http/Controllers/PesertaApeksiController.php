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

        $videos = [
        [
            'jabatan' => 'Kapolres Kota Kediri',
            'link_video' => 'https://drive.google.com/file/d/1SmXdhwdX46Tgp4mXrvun7kSUAlOoItMZ/preview'
        ],
        [
            'jabatan' => 'Ketua DPRD Kota Kediri',
            'link_video' => 'https://drive.google.com/file/d/1YDt80qZjL2PYPd84Lu2KMCpq9EyN2pqb/preview'
        ],
        [
            'jabatan' => 'Ketua Pengadilan Negeri Kediri',
            'link_video' => 'https://drive.google.com/file/d/1pvvblkAfCEJMeFuaRCM6O4JGkkVuubfh/preview'
        ],
        [
            'jabatan' => 'Kepala Kejaksaan Negeri Kota Kediri',
            'link_video' => 'https://drive.google.com/file/d/1WYvkAHuhzXc4uET2YyFTeXDe9LBdW7GM/preview'
        ],
        [
            'jabatan' => 'Komandan Kodim 0809/Kediri',
            'link_video' => 'https://drive.google.com/file/d/18KVQPQtfujb1mEGJ2S8-dTIXRqLxVyWo/preview'
        ],
        [
            'jabatan' => 'Komandan Brigif 16/Wira Yudha',
            'link_video' => 'https://drive.google.com/file/d/1u3MGXL4D2pXGGlm79LkR5VuZWUMV0UbI/preview'
        ],
    ];

        return view ('peserta-apeksi.detil', compact('titlepage', 'breadcrumb', 'peserta', 'firstId', 'lastId', 'videos'));
    }
}
