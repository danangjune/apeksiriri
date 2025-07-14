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
                    <img src="{{ $peserta['logo'] }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
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
                            <div class="media-box p-3 shadow-lg rounded border-3 border-primary">
                                @if(!empty($peserta['embed_video']) && $peserta['embed_video'] != '/preview')
                                    <div class="ratio ratio-16x9 rounded overflow-hidden">
                                        <iframe 
                                            src="{{ $peserta['embed_video'] }}"
                                            allowfullscreen
                                            style="border: none; border-radius: 10px;">
                                        </iframe>
                                    </div>
                                @else
                                    <div class="text-center text-muted py-5">
                                        <em>Video belum tersedia</em>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <!-- Gambar -->
                        <div class="col-md-6">
                            <div class="media-box p-3 shadow-lg rounded border-3 border-primary text-center">
                                @if(!empty($peserta['image']))
                                        <img 
                                            src="{{ asset('gambar-peserta/'.$peserta['image']) }}" 
                                            alt="Gambar Peserta" 
                                            class="img-fluid rounded"
                                            style="max-height: 300px; object-fit: cover;">
                                @else
                                    <div class="text-center text-muted py-5">
                                        <em>Gambar belum tersedia</em>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Tombol kembali -->
                    <div class="text-center mt-5 pt-4">
                        <button onclick="window.history.back()" class="btn btn-secondary px-4 py-2 fs-6">
                            <i class="bi bi-arrow-left me-2"></i> Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
