@extends('layouts.app')

@section('title', empty($breadcrumb['titlepage']) ? 'Pemkot Kediri' : $breadcrumb['titlemenu'] .' - '. $breadcrumb['titlepage'])

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-penghargaan">
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

<div class="my-5 container">
  @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
  <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row mt-5">
    <h2 class="mb-3 fw-bold border-bottom title-border">Penghargaan Terbaru</h2>
    <div class="button-container">
        <button class="btn btn-light restaurant-arrow-left"><i class="bi bi-arrow-left"></i></button>
        <button class="btn btn-light restaurant-arrow-right"><i class="bi bi-arrow-right"></i></button>
    </div>
  </div>
  <div class="card-slider d-flex overflow-auto px-1">
    @foreach ($penghargaan_terbaru as $phgbaru)
    <div class="restaurant-card" onclick="window.location.href='{{ route('detil_penghargaan', ['slug' => $phgbaru['slug'], 'id' => $phgbaru['id']]) }}'" style="cursor: pointer;">
      <div class="mb-2">
        <img src="{{ !empty($phgbaru['foto']) ? (Str::startsWith($phgbaru['foto'], 'http') ? $phgbaru['foto'] : asset('storage/penghargaan/' . $phgbaru['foto'])) : asset('assets/images/piala.png') }}" alt="{{ $phgbaru['judul'] }}" loading="lazy">
      </div>
      <h3 class="restaurant-name">{{ Str::limit($phgbaru['judul'], 50) }}</h3>
      <div class="info-container">
        <p>{{ \Carbon\Carbon::parse($phgbaru['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>

<section id="about" class="about pt-0 position-relative" style="margin-top:100px">
  <div class="my-5 container">
    <h2 class="mb-5 fw-bold border-bottom title-border">Kediri Berprestasi</h2>
      <div class="row">
        <!-- Left Section -->
        <div class="col-md-3 col-12 mb-4">
          <div class="card w-100 border-1 card-kecamatan">
            <div class="card-body p-4">
              @foreach ($years as $index => $year)
                  @if ($index < 3)
                      <div class="mb-3">
                          <button class="btn btn-kecamatan w-100" onclick="filterByYear({{ $year }})">
                              <span>{{ $year }}</span>
                          </button>
                      </div>
                  @else
                      @if ($index === 3)
                          <div class="mb-3">
                              <div class="dropdown">
                                  <a class="btn btn-primary dropdown-toggle w-100 text-center" href="#" id="dropdownMenuLink"
                                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Lainnya
                                  </a>
                                  <div class="dropdown-menu w-100 text-center" aria-labelledby="dropdownMenuLink">
                      @endif
                                      <a class="dropdown-item" href="#" onclick="filterByYear({{ $year }})">{{ $year }}</a>
                      @if ($loop->last)
                                  </div>
                              </div>
                          </div>
                      @endif
                  @endif
              @endforeach
            </div>
          </div>
        </div>

        <!-- Right Section -->
        <div class="col-md-9 col-12">
          <div id="penghargaan-container">
            @foreach ($penghargaan_lainnya as $phglain)
            <div id="kelurahan-content" onclick="window.location.href='{{ route('detil_penghargaan', ['slug' => $phglain['slug'], 'id' => $phglain['id']]) }}'" style="cursor: pointer;">
                <div class="card w-100 border-0 card-kelurahan p-2 mb-4">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!-- Left Section (Text Content) -->
                        <div class="col-md-9 text-content flex-grow-1 p-3">
                            <h5 class="text-secondary"><b>{{ $phglain['judul'] }}</b></h5>
                            <h6 class="mt-3">{!! substr(strip_tags($phglain['deskripsi']), 0, 150) !!}<h6>
                            <h6 class="text-end text-secondary">
                                {{ \Carbon\Carbon::parse($phglain['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <img src="{{ !empty($phglain['foto']) ? (Str::startsWith($phglain['foto'], 'http') ? $phglain['foto'] : asset('storage/penghargaan/' . $phglain['foto'])) : asset('assets/images/piala.png') }}" class="img-fluid rounded-start img-thumbnail" 
                                style="width: 100%; height: 150px; object-fit: cover;" 
                                alt="{{ $phglain['judul'] }}" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-5" id="pagination-links">
                {!! $penghargaan_lainnya->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- <script>
  function filterByYear(year) {
      $.ajax({
          url: "/penghargaan/filter/" + year, // Route untuk filter data berdasarkan tahun
          type: "GET",
          success: function (response) {
              $("#penghargaan-container").html(response.penghargaan_html);
          },
          error: function () {
              alert("Gagal memuat data!");
          }
      });
  }
</script> -->

<script>
  let selectedYear = null; // Menyimpan tahun yang dipilih

  // Fungsi untuk memfilter berdasarkan tahun
  function filterByYear(year) {
      selectedYear = year; // Simpan tahun yang dipilih
      fetchPenghargaan(1); // Load data dari halaman pertama
  }

  // Fungsi untuk memuat data penghargaan (bisa untuk filter dan pagination)
  function fetchPenghargaan(page) {
    let url = "/penghargaan/filter?page=" + page;

    if (selectedYear) {
        url += "&year=" + selectedYear;
    }

    $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
            $("#penghargaan-container").html(response.penghargaan_html);
            $("#pagination-links").html(response.pagination_html);

            // Paksa gambar reload agar tidak kosong
            $("#penghargaan-container img").each(function () {
                var src = $(this).attr("src");
                $(this).attr("src", src);
            });
        },
        error: function () {
            alert("Gagal memuat data penghargaan!");
        }
    });
  }

  // Event handler untuk pagination
  $(document).on('click', '#pagination-links a', function (event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetchPenghargaan(page);
  });

</script>


@endsection
