@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-pengumuman">
            <div class="inner-header flex"></div>
            <div>
              <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                </g>
              </svg>
            </div>
        </div>
    </section>
    <div class="my-5 container">
        @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
        <div class="label-container d-flex align-items-center justify-content-between flex-column mt-5 flex-md-row">
            <h2 class="mb-3 fw-bold border-bottom title-border">Pengumuman Terbaru</h2>
            <div class="button-container">
                <button class="btn btn-light restaurant-arrow-left"><i class="bi bi-arrow-left"></i></button>
                <button class="btn btn-light restaurant-arrow-right"><i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
        <div class="card-slider d-flex overflow-auto">
            @foreach ($pengumuman_terbaru as $ptbr)
            <div class="restaurant-card" onclick="window.location.href='{{ route('detil_pengumuman', ['slug' => $ptbr['slug'], 'id' => $ptbr['id']]) }}'" style="cursor: pointer;">
                <div class="mb-2">
                    <!-- <img src="{{ asset('storage/pengumuman/' . $ptbr['gambar'] ) }}" alt=""> -->
                    <img src="{{ !empty($ptbr['gambar']) ? (Str::startsWith($ptbr['gambar'], 'http') ? $ptbr['gambar'] : asset('storage/pengumuman/' . $ptbr['gambar'])) : asset('assets/images/announ.jpg') }}" alt="{{ $ptbr['judul'] }}" loading="lazy">
                </div>
                <h3 class="restaurant-name">{{ Str::limit($ptbr['judul'], 50) }}</h3>
                <div class="info-container">
                    <p>{{ \Carbon\Carbon::parse($ptbr['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <section id="about" class="about pt-0 position-relative" style="margin-top:100px">
        <div class="my-5 container">
            <h2 class="mb-5 fw-bold border-bottom title-border">Pengumuman Lain</h2>
            <div class="row">
                <div class="col-md-8 col-12">
                    @foreach ($pengumuman_lainnya as $plain)
                    <div class="card w-100 mb-3 shadow-sm">
                        <div class="row g-0 d-flex align-items-center">
                            <div class="col-md-3">
                                <img src="{{ !empty($plain['gambar']) ? (Str::startsWith($plain['gambar'], 'http') ? $plain['gambar'] : asset('storage/pengumuman/' . $plain['gambar'])) : asset('assets/images/announ.jpg') }}" class="img-fluid rounded-start img-thumbnail" 
                                    style="width: 100%; height: 130px; object-fit: cover;" 
                                    alt="{{ $plain['judul']}}" loading="lazy">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $plain['judul'] }}</h5>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($ptbr['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</p>
                                    <a href="{{ route('detil_pengumuman', ['slug' => $plain['slug'], 'id' => $plain['id']]) }}" class="btn btn-primary text-white btn-sm">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mt-5" id="pagination-links">
                        {!! $pengumuman_lainnya->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <img src="{{ asset('assets/images/talk2.png') }}" class="img-fluid" 
                     style="max-width: 100%; height: auto; border-radius: 10px;" 
                     alt="Pengumuman Kota Kediri" loading="lazy">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection