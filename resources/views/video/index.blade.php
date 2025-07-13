@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="banner-tv d-flex flex-column align-items-center justify-content-end">
  <!-- <img src="{{ asset('storage/banner/banner-1727924762.png') }}" class="position-absolute w-100 h-100 object-fit-cover" style="object-position: bottom;" alt=""> -->
  <video autoplay muted loop class="position-absolute w-100 h-100" style="object-fit: cover; object-position: center;">
    <source src="{{ asset('storage/video/profil.mp4') }}" type="video/mp4">
  </video>
  <!-- SVG for the waves -->
  <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none">
    <defs>
      <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
    </defs>
    <g class="wave1">
      <use xlink:href="#wave-path" x="50" y="3"></use>
    </g>
    <g class="wave2">
      <use xlink:href="#wave-path" x="50" y="0"></use>
    </g>
    <g class="wave3">
      <use xlink:href="#wave-path" x="50" y="9"></use>
    </g>
  </svg>
</div>
<div class="sorotan-video-wrapper">
    <div class="my-5 container">
        <h4 class="mb-5 fw-bold border-bottom title-border">Pemkot Kediri TV</h4>
        <div class="row align-items-center">
            <div class="col-md-5 mb-4 d-flex justify-content-center align-items-center">
                <div class="wave-box">
                    <img src="{{ asset('assets/images/pemkottv2.jpg') }}" alt="Pemkot Kediri TV" loading="lazy">
                </div>
            </div>
            <div class="col-md-7">
                <h2>Pemkot Kediri TV</h2>
                <p>
                    Pemkot Kediri TV Kota Kediri adalah saluran YouTube resmi yang menghadirkan berbagai informasi, berita, dan hiburan khas Kota Kediri. 
                    Dengan konten yang edukatif dan inspiratif, Pemkot Kediri TV menyajikan liputan acara kota, wawancara eksklusif, serta dokumenter yang 
                    memperkenalkan budaya dan potensi lokal. Jangan lewatkan program menariknya dengan subscribe ke channel Pemkot Kediri TV!
                </p>
                <a href="https://www.youtube.com/@harmonitvkediri/featured" target="_blank" class="btn btn-danger">Kunjungi Channel</a>
            </div>
        </div>
    </div>
    <div class="my-5 container">
        <h4 class="mb-5 fw-bold border-bottom title-border">Sorotan Video</h4>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/ph3drEhOC-Y?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/X3iM8SfyW7g?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/A3Jk_2YF9cg?rel=0z" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/QvQbKDETPw8?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/iKUdILVt41o?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="video-container">
                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/b-E0-n5AK3E?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection