<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\AsetKediri;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\FasilitasKota;
use App\Models\KalenderAcara;

class SearchController extends Controller
{
    // Search
    public function search(Request $request) {

        $request->validate([
            'search' => 'required|string|max:20',
        ]);    

        if ($request->search == 'option')
        {
            return view('search.search-option');
        }else{
            $wisata = AsetKediri::select('id','nama','gambar', 'alamat', 'slug')
                            ->where('nama', 'LIKE', '%' . $request->search . '%')
                            ->orWhere('deskripsi', 'LIKE', '%' . $request->search . '%')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(4);

            $berita = Berita::select('id','judul', 'deskripsi', 'images', 'tanggal')
                                ->where('judul', 'LIKE', '%' . $request->search . '%')
                                ->orWhere('deskripsi', 'LIKE', '%' . $request->search . '%')
                                ->orderBy('created_at', 'DESC')
                                ->paginate(4);

            $pengumuman = Pengumuman::select('id','judul', 'deskripsi', 'gambar', 'tanggal')
                                    ->where('judul', 'LIKE', '%' . $request->search . '%')
                                    ->orWhere('deskripsi', 'LIKE', '%' . $request->search . '%')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(4);

            $fasilitas = FasilitasKota::select('id','nama', 'alamat', 'foto')
                                    ->where('nama', 'LIKE', '%' . $request->search . '%')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(4);
            
            return view('search.index', compact('wisata', 'berita', 'pengumuman', 'fasilitas'));
        }
    }
}
