@extends('layouts.app')

@section('title', empty($breadcrumb['titlepage']) ? '' : $breadcrumb['titlepage'])

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

@section('content')
<div class="min-vh-50">
    
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-perangkat">
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
        <div class="my-5">
            <div class="card-hero">
                <div class="row">
                    @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
                <div class="col-md-3 py-4">
                    <!-- Tab list -->
                    <ul class="nav nav-pills flex-column">
                        @foreach ($kategori_opd as $item)
                        <li class="nav-item">
                            <!-- <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab{{ $item['id'] }}" data-bs-toggle="pill" href="#content{{ $item['id'] }}">
                                {{ $item['nama'] }}
                            </a> -->
                            <a class="nav-link {{ request()->is('perangkat-daerah/' . $item['slug']) ? 'active' : '' }}" href="{{ url('perangkat-daerah/' . $item['slug']) }}">
                                {{ $item['nama'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    <h4 class="py-4 mb-4 fw-bold border-bottom title-border text-left">{{ $kategori->nama }}</h4>
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="input-group w-100">
                                <input type="text" class="form-control search-opd" placeholder="Search..." aria-label="Search">
                                <button class="btn btn-outline-primary" type="button" id="button-search"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                        @forelse ($kategori->opd as $opd)
                        @if($opd['kategori'] == 1)
                        <div class="opd-card text-center">
                            <img src="{{ !empty($opd['logo']) ? asset('storage/opd/' . $opd['logo']) : asset('assets/images/logo.png') }}" alt="{{ $opd->nama }}" class="w-100">
                        </div>
                        @elseif($opd['kategori'] == 2) 
                        <div class="opd-card profile-card col-md-6 radius overflow-auto">
                        <div class="profile-header bg-primary text-white py-2 text-center">
                            <h5 class="mt-1">{{ $opd->pimpinan->jabatan['nama_jabatan']}}</h5>
                        </div>
                        <div class="profile-content row py-3">
                            <div class="profile-image text-center">
                                <img src="{{ asset('storage/pimpinan/' . $opd->pimpinan['foto']) }}" class="w-lg-50 w-md-75" alt="{{ $opd->pimpinan->jabatan['nama_jabatan']}}" loading="lazy" height="250px">
                            </div>
                            <div class="profile-details mt-3"> 
                                <h6 class="text-center fw-semibold text-primary">{{ $opd->pimpinan['nama_pimpinan']}}</h6>
                                <a href="/tentang-kediri/profilpimpinan" class="profile-header bg-primary text-white py-2 text-center d-flex justify-content-center align-items-center text-decoration-none">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                        </div>
                        @elseif($opd['kategori'] == 3) 
                        <div class="profile-card col-md-12 radius overflow-auto">
                            <div class="py-2 text-center">
                                <h5 class="mt-1 fw-bold">{{ $opd->pimpinan->jabatan['nama_jabatan']}}</h5>
                            </div>
                            <div class="profile-content row py-3">
                                <div class="profile-image text-center">
                                    <img src="{{ asset('storage/pimpinan/' . $opd->pimpinan['foto']) }}" class="w-lg-50 w-md-75" alt="{{ $opd->pimpinan->jabatan['nama_jabatan']}}" loading="lazy" height="250px">
                                </div>
                                <div class="profile-details mt-3"> 
                                    <h5 class="text-center fw-semibold text-primary">{{ $opd->pimpinan['nama_pimpinan']}}</h5>
                                    <div class="profile-section">
                                        {!! $opd->pimpinan['deskripsi'] !!}
                                      </div>
                                </div>
                            </div>
                            </div>
                        @else
                        <div class="opd-card col-md-6 row py-4 mb-2 border-0">
                            <div class="col-md-2">
                                <img src="{{ !empty($opd['logo']) ? asset('storage/opd/' . $opd['logo']) : asset('assets/images/logo.png') }}" alt="{{ $opd->nama }}" loading="lazy" class="pe-1" style="width:50px">
                            </div>
                            <div class="col-md-10">
                                <h6 class="fw-bold mt-2 text-secondary small">{{ $opd->nama }}</h6>
                                <span class="text-secondary">{{ $opd->pimpinan->nama_pimpinan ?? '' }}</span>
                                <p class="small">{{ $opd->alamat }}</p>
                                <a href="{{ $opd->website }}" target="_blank" class="text-decoration-none px-2 py-2 bg-primary text-white rounded small">Kunjungi Web</a>
                                <a href="/detail-opd/{{ $opd['id']}}" target="_blank" class="text-decoration-none px-2 py-2 rounded small bg-warning text-black">Selengkapnya</a>
                            </div>
                        </div>
                        @endif
                        @empty
                        <p>Tidak ada data OPD untuk kategori ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
   $(document).ready(function(){
        $(".search-opd").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".opd-card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>


@endsection