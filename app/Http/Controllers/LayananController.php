<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananDigital;

class LayananController extends Controller
{
    // ------------------------------------ USER ----------------------------------------
    public function layanan_publik()
    {
        $layanan = LayananDigital::where('status_enabled', 1)->get();
        return view('layanan.index', compact('layanan'));
    }
}
