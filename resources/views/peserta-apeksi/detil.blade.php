@extends('layouts.app')

<style>
.header::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
    pointer-events: none;
    z-index: 1;
}

.card-hero {
    position: relative;
    top: -200px;
    left: 50%;
    transform: translateX(-50%);
    background: white;
    padding: 30px;
    box-shadow: 0 15px 30px rgb(21, 79, 71);
    border-radius: 10px;
    width: 70%;
    z-index: 10;
}

.media-box {
    background-color: #f8fafc;
    border: 4px solid #154f47;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.media-box:hover {
    transform: scale(1.03);
    box-shadow: 0 20px 40px rgba(21, 79, 71, 0.3);
}

.media-equal {
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.media-equal iframe,
.media-equal img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

/* Responsive */
@media(max-width: 768px) {
    .card-hero {
        width: 95%;
        top: -100px;
        padding: 20px;
    }
    .card-hero img {
        max-width: 100%;
        height: auto;
    }
    .media-box {
        padding: 10px;
    }
    .btn {
        width: 100%;
        font-size: 1rem;
    }
}
@media(max-width: 576px) {
    .ratio {
        aspect-ratio: 16 / 9;
    }
    .media-box iframe {
        width: 100%;
        height: auto;
    }
    .title-border {
        font-size: 1.2rem;
    }
    .card-hero {
        top: -80px;
    }
}
</style>

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-apeksi">
            <div class="inner-header flex"></div>
            <div>
                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="gradientOverlay" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0%" stop-color="rgba(0, 0, 0, 0.5)" />
                            <stop offset="100%" stop-color="rgba(0, 0, 0, 0)" />
                        </linearGradient>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#gradientOverlay)"></rect>
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#f8fafc" />
                    </g>
                </svg>
            </div>
        </div>

        <div class="card-hero">
            <div class="row">
                @include('layouts.breadcrumb', [
                    'titlemenu' => $breadcrumb['titlemenu'],
                    'titlepage' => $breadcrumb['titlepage'],
                    'detailpage' => $breadcrumb['detailpage'] ?? false
                ])

               <div class="col-md-4 py-4 text-center mb-3 mb-md-0">
                    <img src="{{ $peserta['logo'] }}" alt="Logo" class="img-fluid mb-4" style="max-height: 150px;">

                    <div class="d-flex justify-content-center gap-4">
                        @if($peserta['id'] > $firstId)
                            <a href="{{ url('detil-peserta/' . ($peserta['id'] - 1)) }}" class="btn btn-primary btn-lg" title="Sebelumnya">
                                <i class="bi bi-arrow-left-circle"></i>
                            </a>
                        @endif

                        @if($peserta['id'] < $lastId)
                            <a href="{{ url('detil-peserta/' . ($peserta['id'] + 1)) }}" class="btn btn-primary btn-lg" title="Selanjutnya">
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 py-4">
                    <h4 class="mb-3 fw-bold border-bottom title-border text-left">{{ $peserta['nama'] }}</h4>

                    {{-- Pimpinan --}}
                    <div class="row justify-content-center my-5">
                        <div class="col-12 text-center">
                            <img src="{{ asset('assets/images/gambar-pimpinan/'.$peserta['pimpinan']) }}" 
                                alt="Pemimpin"
                                class="img-fluid"
                                style="max-width: 600px; width: 100%;">
                        </div>
                    </div>
                    <div class="col-12 my-4">
                        {!! $peserta['deskripsi'] !!}
                    </div>

                    <h4 class="mt-4 fw-bold border-bottom title-border text-left">Galeri Video dan Gambar</h4>
                    <div class="row g-4 align-items-start mt-3">
                        <!-- Video -->
                        <div class="col-md-6">
                            <div class="media-box p-3 shadow-lg rounded border-3 border-primary media-equal">
                                @if(!empty($peserta['embed_video']) && $peserta['embed_video'] != '/preview')
                                    <iframe 
                                        src="{{ $peserta['embed_video'] }}"
                                        allowfullscreen
                                        style="border: none;">
                                    </iframe>
                                @else
                                    <div class="text-center text-muted">
                                        <em>Video belum tersedia</em>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="col-md-6">
                            <div class="media-box p-3 shadow-lg rounded border-3 border-primary media-equal">
                                @if(!empty($peserta['image']))
                                    <img 
                                        src="{{ $peserta['image'] }}" 
                                        alt="Gambar Peserta" 
                                        class="img-fluid">
                                @else
                                    <div class="text-center text-muted">
                                        <em>Gambar belum tersedia</em>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Tombol kembali -->
                    <div class="text-center mt-5 pt-4">
                        <button onclick="window.open('{{ $peserta['website'] }}', '_blank')" class="btn btn-primary px-4 py-3 fs-6">
                            <i class="bi bi-browser-edge me-2"></i> Kunjungi Website {{ $peserta['nama'] }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
