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
    pointer-events: none; /* Agar tidak mengganggu elemen lain */
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
@media(max-width: 756px){
  .card-hero{
    width: 90%
  }
}
</style>

@section('title', empty($titlepage) ? '' : $titlepage)
@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-apeksi">
            <!--Content before waves-->
            <div class="inner-header flex"></div>
        
            <!--Waves Container-->
            <div>
                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <!-- Gradasi overlay -->
                        <linearGradient id="gradientOverlay" x1="0" x2="0" y1="0" y2="1">
                            <stop offset="0%" stop-color="rgba(0, 0, 0, 0.5)" />
                            <stop offset="100%" stop-color="rgba(0, 0, 0, 0)" />
                        </linearGradient>
        
                        <!-- Path ombak -->
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
        
                    <!-- Gradasi overlay -->
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#gradientOverlay)"></rect>
        
                    <!-- Ombak dengan efek parallax -->
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#f8fafc" />
                    </g>
                </svg>
            </div>
            <!--Waves end-->
        </div>
        <div class="card-hero">
             <div class="row">
                @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
                <div class="col-md-4 py-4 text-center">
                    <img src="{{ $peserta['logo'] }}" alt="Pemkot Kediri TV" loading="lazy" height="15%">
                </div>
                <div class="col-md-8 py-4">
                    <h4 class="mb-3 fw-bold border-bottom title-border text-left">{{ $peserta['nama'] }}</h4>
                    <div class="col-md-12">
                        {!! $peserta['deskripsi'] !!}
                    </div>
                    <h4 class="mt-5 fw-bold border-bottom title-border text-left">Galeri Video dan Gambar</h4>
                    <div class="row g-4 align-items-start mt-4">
                        <!-- Video -->
                        <div class="col-md-6">
                            <div class="media-box p-3 shadow-lg rounded border border-success-subtle">
                                <div class="ratio ratio-16x9 rounded overflow-hidden">
                                    <iframe 
                                        src="https://drive.google.com/file/d/1Xn-BsdusAOmrXh4nzSGORa-WrjEPmwyn/preview"
                                        allowfullscreen
                                        style="border: none; border-radius: 10px;">
                                    </iframe>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="col-md-6">
                            <div class="media-box p-3 shadow-lg rounded border border-success-subtle text-center">
                                <img 
                                    src="{{ asset('storage/gambar-peserta/'.$peserta['gambar']) }}" 
                                    alt="Gambar Peserta" 
                                    class="img-fluid rounded"
                                    style="max-height: 300px; object-fit: cover;">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol kembali -->
                    <div class="text-center mt-5 pt-4">
                        <button onclick="window.history.back()" class="btn btn-secondary px-4 py-2">
                            Kembali
                        </button>
                    </div>
                </div>
             </div>
        </div>
    </section>
</div>
@endsection