@extends('layouts.app')

@section('title', 'Telusuri')

@section('content')

<div class="min-vh-50-pesona">
    <div class="w-100 position-relative text-center text-white p-5">
        <div class="col-lg-12 d-flex justify-content-center mt-5">
            <img src="{{ asset('assets/images/search2.png') }}" alt="Populer di Kota Kediri" loading="lazy" class="img-fluid mt-5">
        </div>
    </div>
    <section class="position-relative">
        <div class="my-0 container">
            <!-- Wisata dan Kuliner -->
            <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">Wisata & Kuliner</h4>
            @if(count($wisata) == 0)
            <div class="search-kosong bg-primary-subtle" style="height:50px; padding:10px; border-radius: 10px;">
                <h6 style="margin: 5px">Tidak Ada Data</h6>
            </div>
            @else
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($wisata as $wst)
                        <div class="col-6 col-md-3">
                            <a href="/detil-wisata/{{ $wst['slug'] }}/{{ $wst['id'] }}" class="text-decoration-none">
                                <div class="card-berita-home mb-3 rounded d-flex flex-column p-3 border border-secondary h-100">
                                    <img src="{{ asset('storage/aset/' . $wst['gambar']) }}" alt="{{ Str::limit($wst['nama'], 100) }}" loading="lazy" class="w-100 rounded mb-3" height="150"> 
                                    <p class="small fw-bold mt-1 text-dark" style="text-align: justify;">
                                        {{ Str::limit($wst['nama'], 100) }}
                                    </p>
                                    <span class="small text-blue-300 mt-2">
                                        <i class="bi bi-geo-alt-fill"></i> {{ $wst['alamat'] }}
                                    </span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        {!! $wisata->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
            @endif

            <!-- Fasilitas Kota -->
            <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">Fasilitas Kota</h4>
            @if(count($fasilitas) == 0)
            <div class="search-kosong bg-primary-subtle" style="height:50px; padding:10px; border-radius: 10px;">
                <h6 style="margin: 5px">Tidak Ada Data</h6>
            </div>
            @else
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($fasilitas as $fsl)
                        <div class="col-6 col-md-3">
                            <div class="card-berita-home mb-3 rounded d-flex flex-column  p-3 border border-secondary">
                                <img src="{{ asset('storage/fasilitas/' . $fsl['foto']) }}" alt="{{ Str::limit($fsl['nama'], 100) }}" loading="lazy" class="w-100 rounded mb-3" height="150"> 
                                <a href="/fasilitas-kota" class="small fw-bold text-decoration-none mt-1" style="text-align: justify"> {{ Str::limit($fsl['nama'], 100) }}</a>
                                <span class="small text-blue-300 mt-2"><i class="bi bi-geo-alt-fill"></i> {{ $fsl['alamat'] }}</span>
                            </div>
                        </div>
                        @endforeach
                        {!! $fasilitas->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
            @endif

            <!-- Berita -->
            <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">Berita</h4>
            @if(count($berita) == 0)
            <div class="search-kosong bg-primary-subtle" style="height:50px; padding:10px; border-radius: 10px;">
                <h6 style="margin: 5px">Tidak Ada Data</h6>
            </div>
            @else
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($berita as $brt)
                        <div class="col-6 col-md-3">
                            <div class="card-berita-home mb-3 rounded d-flex flex-column  p-3 border border-secondary">
                                <img src="{{ asset('storage/berita/' . $brt['images']) }}" alt="{{ Str::limit($brt['judul'], 100) }}" loading="lazy" class="w-100 rounded mb-3" height="150"> 
                                <a href="/pesona-kediri-raya" class="small fw-bold text-decoration-none mt-1" style="text-align: justify"> {{ Str::limit($brt['judul'], 100) }}</a>
                                <span class="small text-blue-300 mt-2"><i class="bi bi-calendar2-week-fill me-2"></i>{{ \Carbon\Carbon::parse($brt['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                        {!! $wisata->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
            @endif

            <!-- Pengumuman -->
            <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">Pengumuman</h4>
            @if(count($pengumuman) == 0)
            <div class="search-kosong bg-primary-subtle" style="height:50px; padding:10px; border-radius: 10px;">
                <h6 style="margin: 5px">Tidak Ada Data</h6>
            </div>
            @else
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="row">
                        @foreach ($pengumuman as $pgm)
                        <div class="col-6 col-md-3">
                            <div class="card-berita-home mb-3 rounded d-flex flex-column  p-3 border border-secondary">
                                <img src="{{ asset('storage/berita/' . $pgm['gambar']) }}" alt="{{ Str::limit($pgm['judul'], 100) }}" loading="lazy" class="w-100 rounded mb-3" height="150"> 
                                <a href="/pesona-kediri-raya" class="small fw-bold text-decoration-none mt-1" style="text-align: justify"> {{ Str::limit($pgm['judul'], 100) }}</a>
                                <span class="small text-blue-300 mt-2"><i class="bi bi-calendar2-week-fill me-2"></i>{{ \Carbon\Carbon::parse($pgm['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                        {!! $wisata->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

@endsection