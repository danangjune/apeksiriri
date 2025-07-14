<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaApeksiController extends Controller
{
    public function index ($id)
    {
        return view ('peserta-apeksi.detil');
    }
}
