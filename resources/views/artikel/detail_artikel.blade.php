@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
      <div class="header-waves"  style="background-image:url('{{asset('storage/artikel/' . $artikel['images'])}}'); background-size: cover; background-position:center center">
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
        <div class="container">
          @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
            <div class="profil-content">
                <h4 class="mt-4 fw-bold border-bottom title-border">{{ $artikel['judul'] }}</h4>
                <span class="small">{!! $artikel ? '<i class="bi bi-eye"></i> ' . $artikel->count_view . ' |' : '' !!} <i class="bi bi-calendar"></i> {{ $artikel['created_at'] }}</span>
                <div class="position-relative deskripsi">
                  {!! $artikel['deskripsi'] !!}
                </div>
          
                <div class="text-center mt-5">
                  <button class="btn btn-lg btn-secondary"  onclick="window.history.back();">Kembali</button>
                </div>
            </div>
           
        </div>
    </section>
</div>

@endsection