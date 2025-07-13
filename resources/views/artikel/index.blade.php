@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-artikel">
            <div class="inner-header flex"></div>
            <div>
              <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                </g>
              </svg>
            </div>
        </div>
    </section>
</div>

<div class="container">
  @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
  <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row mt-5">
    <h2 class="mb-3 fw-bold border-bottom title-border">Hits di Kediri</h2>
    <div class="button-container">
        <button class="btn btn-light restaurant-arrow-left"><i class="bi bi-arrow-left"></i></button>
        <button class="btn btn-light restaurant-arrow-right"><i class="bi bi-arrow-right"></i></button>
    </div>
  </div>
  <div class="card-slider d-flex overflow-auto px-1">
    @foreach ($artikel_hits as $artikel)
    <div class="restaurant-card" onclick="window.location.href='{{ route('detail_artikel', ['slug' => $artikel['slug'], 'id' => $artikel['id']]) }}'" style="cursor: pointer;">
      <div class="mb-2">
        <img src="{{ !empty($artikel['images']) ? (Str::startsWith($artikel['images'], 'http') ? $artikel['images'] : asset('storage/artikel/' . $artikel['images'])) : asset('assets/images/piala.png') }}" alt="{{ $artikel['judul'] }}" loading="lazy">
      </div>
      <h6 class="restaurant-name">{{ Str::limit($artikel['judul'], 70) }}</h6>
      <div class="info-container">
        <p>{{ \Carbon\Carbon::parse($artikel['created_at'])->locale('id')->isoFormat('D MMMM Y') }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>

<section id="about" class="about pt-0 position-relative">
    <div class="container">
      <h2 class="mb-5 fw-bold border-bottom title-border">Rekomendasi Artikel</h2>
        <div class="row">
          <!-- Right Section -->
          <div class="col-md-12">
            <div id="penghargaan-container">
              @foreach ($artikels as $artikel)
              <div onclick="window.location.href='{{ route('detail_artikel', ['slug' => $artikel['slug'], 'id' => $artikel['id']]) }}'" style="cursor: pointer;">
                  <div class="card w-100 border-0 card-kelurahan p-2 mb-4">
                      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                          <div class="col-md-3">
                            <img src="{{ !empty($artikel['images']) ? (Str::startsWith($artikel['images'], 'http') ? $artikel['images'] : asset('storage/artikel/' . $artikel['images'])) : asset('assets/images/piala.png') }}" class="img-fluid rounded-start img-thumbnail" 
                                style="width: 100%; height: 150px; object-fit: cover;" 
                                alt="{{ $artikel['judul'] }}" loading="lazy">
                          </div>
                          <div class="col-md-9 text-content flex-grow-1 p-3">
                              <h5 class="text-secondary"><b>{{ $artikel['judul'] }}</b></h5>
                              <h6 class="mt-3">{!! substr(strip_tags($artikel['deskripsi']), 0, 150) !!}<h6>
                              <h6 class="text-end text-secondary">
                                  {{ \Carbon\Carbon::parse($artikel['created_at'])->locale('id')->isoFormat('D MMMM Y') }}
                              </h6>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
              <div class="mt-5" id="pagination-links">
                  {!! $artikels->withQueryString()->links('pagination::bootstrap-5') !!}
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
