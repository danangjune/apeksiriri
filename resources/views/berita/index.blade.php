@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
  <div class="min-vh-100">
    <div class="w-100 position-relative">
      <div class="banner-berita row g-0">
        <div class="swiper-container berita-swiper col-md-12 d-flex flex-wrap overflow-x-hidden">
          <div class="swiper-wrapper">
              @foreach($beritaTerbaru as $berita)
                  <div class="swiper-slide">
                      <div class="row">
                          <div class="col-md-12 position-relative" style="height:450px; background-image:url('{{ Str::startsWith($berita['images'], 'http') ? $berita['images'] : asset('storage/galeri/' . $berita['images']) }}'); background-size: cover; background-position:center center">
                                <div class="gradient-overlay"></div>
                                <div class="col-md-12 position-absolute py-3 bottom-0" style="z-index: 100">
                                  <div class="fw-semibold ms-md-5 mb-4 col-md-8">
                                      <span class="px-3 py-1 rounded ms-4 bg-warning me-3">{{ $berita->kategori['nama_kategori'] ?? 'Berita' }}
                                      </span>
                                      <span class="text-white">{{ \Carbon\Carbon::parse($berita['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                                      <div class="mx-4">
                                        <h3 class="text-white fw-bold my-3">{{ Str::limit($berita['judul'], 200) }}</h3>
                                        <a href="{{ route('detail_berita', ['slug' => $berita['slug'], 'id' => $berita['id']]) }}" class="btn btn-outline-light btn-sm">Baca Selengkapnya</a>
                                      </div>
                                  </div>
                                </div>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
      
          <!-- Pagination -->
          <div class="swiper-pagination"></div>
        </div>   
      </div>
    </div>

    <section id="about" class="about pt-0 position-relative">
      <div class="row">
        <div class="section-header">
          <div class="row" style="margin-left:auto; margin-right:auto;">
            <!-- Dropdown untuk tampilan mobile -->
            <div class="dropdown d-lg-none text-center">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Kategori Berita
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%">
                <div class="py-3 px-1">
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="row m-2">
                        
                              <div class="dropdown-berita">
                                <button 
                                    @class(['nav-link', 'active' => true]) 
                                    id="pills-all-categories-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#pills-all-categories" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="pills-all-categories" 
                                    aria-selected="true"
                                    onclick="resetPagination('pills-all-categories')">
                                    <span class="text-uppercase fs-6 fw-normal">Semua Kategori</span>
                                </button>
                              </div>
                     
                                @foreach ($categories as $key => $category)
                                <div class="col-6 dropdown-berita" style="border-left: black 2px solid">
                                  
                                  <button 
                                    @class(['nav-link', 'active' => false]) 
                                    id="pills-{{ $category->id }}-tab" 
                                    data-bs-toggle="pill" 
                                    data-bs-target="#pills-{{ $category->id }}" 
                                    type="button" 
                                    role="tab" 
                                    aria-controls="pills-{{ $category->id }}" 
                                    aria-selected="{{ $key == 0 ? 'true' : 'false' }}"
                                    onclick="resetPagination('{{ 'pills-' . $category->id }}')">
                                    <span class="fs-6 fw-normal">{{ $category->nama_kategori }}</span>
                                  </button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            </div>
            <!-- Tampilan default untuk desktop -->
            <div class="d-none d-lg-flex row my-3">
              <ul class="d-lg-flex col-lg-10 align-items-center nav nav-pills end-0 h6 justify-content-center gap-lg-5" style="margin-left:auto; margin-right:auto;">
                <!-- Tombol "Semua Kategori" -->
                <li class="nav-item" role="presentation">
                    <button 
                        @class(['nav-link', 'active' => true]) 
                        id="pills-all-categories-tab" 
                        data-bs-toggle="pill" 
                        data-bs-target="#pills-all-categories" 
                        type="button" 
                        role="tab" 
                        aria-controls="pills-all-categories" 
                        aria-selected="true"
                        onclick="resetPagination('pills-all-categories')">
                        <span class="text-uppercase fs-5 fw-normal">Semua Kategori</span>
                    </button>
                </li>
            
                <!-- Kategori -->
                @foreach ($categories->take(5) as $key => $category)
                <li class="nav-item" role="presentation">
                    <button 
                        @class(['nav-link', 'active' => false]) 
                        id="pills-{{ $category->id }}-tab" 
                        data-bs-toggle="pill" 
                        data-bs-target="#pills-{{ $category->id }}" 
                        type="button" 
                        role="tab" 
                        aria-controls="pills-{{ $category->id }}" 
                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}"
                        onclick="resetPagination('{{ 'pills-' . $category->id }}')">
                        <span class="text-uppercase fs-5 fw-normal">{{ $category->nama_kategori }}</span>
                    </button>
                </li>
                @endforeach
              </ul>
            
              <!-- Lainnya Dropdown -->
              <div class="col-lg-2 d-lg-flex row align-items-center" style="margin-left:auto; margin-right:auto;">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-uppercase fs-5 fw-normal">Lainnya</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 95%">
                    <div class="container py-3 px-5">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-secondary">Kategori Berita Lainnya</p>
                                <div class="row m-2">
                                    @foreach ($categories->skip(5) as $key => $category)
                                    <div class="col-lg-4 dropdown-berita" style="border-left: black 2px solid">
                                        <button 
                                        @class(['nav-link', 'active' => $key == 0]) 
                                        id="pills-{{ $category->id }}-tab" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#pills-{{ $category->id }}" 
                                        type="button" 
                                        role="tab" 
                                        aria-controls="pills-{{ $category->id }}" 
                                        aria-selected="{{ $key == 0 ? 'true' : 'false' }}"
                                        onclick="resetPagination('{{ 'pills-' . $category->id }}')">
                                        <span class="text-uppercase fs-5 fw-normal">{{ $category->nama_kategori }}</span>
                                    </button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
              </div>
            </div>
          </div>
          <hr class="mt-0">
        </div>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="row gy-4 mb-4 col-8 ms-auto me-auto">
            <div class="input-group mb-2">
                <input type="text" class="form-control search-berita" placeholder="Cari tentang Berita...." aria-label="Search">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search text-secondary fw- fs-3"></i></span>
            </div>   
        </div>
        <div class="row col-lg-12 d-flex justify-content-between">

        <div class="col-lg-8 berita-left tab-content">
          <div class="tab-pane fade show active" 
                id="pills-all-categories" 
                role="tabpanel" 
                aria-labelledby="pills-all-categories-tab">
                <div id="berita-terbaru">
                  <a href="{{ route('detail_berita', ['slug' => $allBerita->first()->slug, 'id' => $allBerita->first()->id]) }}" id="link-berita-terbaru">
                      <div class="card-berita" id="card-berita-terbaru">
                          <img src="{{ !empty($allBerita->first()->images) ? (Str::startsWith($allBerita->first()->images, 'http') ? $allBerita->first()->images : asset('storage/berita/' . $allBerita->first()->images)) : asset('assets/images/noimage2.png') }}" alt="{{ $allBerita->first()->judul }}" loading="lazy" class="img-fluid">
                          <div class="card-content">
                              <div class="kategori-date fw-semibold">
                                  <span class="px-3 py-1 rounded bg-warning small me-2 text-black">{{ $allBerita->first()->kategori['nama_kategori'] ?? 'Berita' }}</span>
                                  <span class="small text-white">{{ \Carbon\Carbon::parse($allBerita->first()->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</span>
                              </div>
                              <h2 class="fw-bold text-white fs-4 fs-md-3 fs-lg-2">{{ Str::limit($allBerita->first()->judul, 120) }}</h2>
                              <p class="d-none d-md-block">{!! substr(strip_tags($allBerita->first()->deskripsi), 0, 200) . '...' !!}</p>
                          </div>
                      </div>
                  </a>
                </div>
              @foreach ($allBerita as $berita)
                          <a href="{{ route('detail_berita', ['slug' => $berita['slug'], 'id' => $berita['id']]) }}" class="text-decoration-none">
                              <div class="col-md-12 mt-4 d-flex mb-4">
                                  <div class="col-md-4 col-3 mt-auto mb-auto">
                                      <img src="{{ !empty($berita['images']) ? (Str::startsWith($berita['images'], 'http') ? $berita['images'] : asset('storage/berita/' . $berita['images'])) : asset('assets/images/noimage2.png') }}" alt="{{ $berita['judul'] }}" loading="lazy" class="w-100 rounded">
                                  </div>
                                  <div class="col-md-8 mt-auto mb-auto">
                                      <div class="px-3">
                                          <h5 class="judul-berita fs-6 fs-lg-5">{{ Str::limit($berita['judul'], 120) }}</h5>
                                          <div class="fw-semibold pt-1">
                                              <span class="px-3 py-1 rounded bg-warning text-black small me-2">{{ $berita->kategori->nama_kategori ?? 'Berita' }}</span>
                                              <span class="small text-black">{{ \Carbon\Carbon::parse($berita['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </a>
                      @endforeach
                       <div class="d-flex justify-content-end mt-3">
            <!-- Pagination Controls (right-aligned) -->
            <div>
              {{ $allBerita->links('pagination::bootstrap-5') }}
            </div>
        </div>
          </div>
          
          @foreach ($categories as $key => $category)
          <div @class(['tab-pane fade',  'show active' => false])
              id="pills-{{ $category->id }}"
              role="tabpanel"
              aria-labelledby="pills-{{ $category->id }}-tab"
              tabindex="0">
              
              <div id="berita-terbaru">
                  <a href="{{ route('detail_berita', ['slug' => $category->latestBeritaKediri->first()->slug, 'id' => $category->latestBeritaKediri->first()->id]) }}" id="link-berita-terbaru">
                      <div class="card-berita" id="card-berita-terbaru">
                          <img src="{{ !empty($category->latestBeritaKediri->first()->images) ? (Str::startsWith($category->latestBeritaKediri->first()->images, 'http') ? $category->latestBeritaKediri->first()->images : asset('storage/berita/' . $category->latestBeritaKediri->first()->images)) : asset('assets/images/noimage2.png') }}" alt="{{ $category->latestBeritaKediri->first()->judul }}" loading="lazy" class="img-fluid">
                          <div class="card-content">
                              <div class="kategori-date fw-semibold">
                                  <span class="px-3 py-1 rounded bg-warning small me-2 text-black">{{ $category->latestBeritaKediri->first()->kategori['nama_kategori'] ?? 'Berita' }}</span>
                                  <span class="small text-white">{{ \Carbon\Carbon::parse($category->latestBeritaKediri->first()->tanggal)->locale('id')->isoFormat('D MMMM Y') }}</span>
                              </div>
                              <h2 class="fw-bold text-white fs-4 fs-md-3 fs-lg-2">{{ Str::limit($category->latestBeritaKediri->first()->judul, 120) }}</h2>
                              <p class="d-none d-md-block">{!! substr(strip_tags($category->latestBeritaKediri->first()->deskripsi), 0, 200) . '...' !!}</p>
                          </div>
                      </div>
                  </a>
              </div>

              @if($category->paginatedBeritaKediri->isEmpty())
                  <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                      <img src="{{ asset('assets/images/nodata3.png') }}" alt="" loading="lazy" class="img-fluid" width="40%" style="margin:20px;">
                  </div>
              @else
                  @foreach ($category->paginatedBeritaKediri as $berita)
                      <a href="{{ route('detail_berita', ['slug' => $berita['slug'], 'id' => $berita['id']]) }}" class="text-decoration-none">
                          <div class="col-md-12 mt-4 d-flex mb-4">
                              <div class="col-md-4 col-3 mt-auto mb-auto">
                                  <img src="{{ !empty($berita['images']) ? (Str::startsWith($berita['images'], 'http') ? $berita['images'] : asset('storage/berita/' . $berita['images'])) : asset('assets/images/noimage2.png') }}" alt="{{ $berita['judul'] }}" loading="lazy" class="w-100 rounded">
                              </div>
                              <div class="col-md-8 mt-auto mb-auto">
                                  <div class="px-3">
                                      <h5 class="judul-berita fs-6 fs-lg-5">{{ Str::limit($berita['judul'], 120) }}</h5>
                                      <div class="fw-semibold pt-1">
                                          <span class="px-3 py-1 rounded bg-warning small me-2">{{ $berita->kategori->nama_kategori }}</span>
                                          <span class="small text-black">{{ \Carbon\Carbon::parse($berita['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  @endforeach
              @endif

              <div class="d-flex justify-content-end mt-3">
                  <!-- Pagination Controls (right-aligned) -->
                  <div>
                      {{ $category->paginatedBeritaKediri->appends(['tab' => 'pills-' . $category->id])->links('pagination::bootstrap-5') }}
                  </div>
              </div>
          </div>
      @endforeach
        </div>

            <div class="col-lg-4" >
                <div class="berita-terbaru rounded p-3" style="overflow-y:auto; box-shadow: 0px 4px 8px #12434D;">
                    <h4 class="fw-semibold text-secondary">Populer Bulan Ini</h4>
                    <hr class="mt-0 gradient">
                    @foreach ($beritaTerpopuler as $listBerita)
                    <a href="{{ route('detail_berita', ['slug' => $listBerita['slug'], 'id' => $listBerita['id']]) }}" class="text-decoration-none">
                      <div class="row mb-1" style="height: 90px">
                        <div class="row d-flex col-12 ">
                            <div class="col-3">
                                <img src="{{ !empty($listBerita['images']) ? (Str::startsWith($listBerita['images'], 'http') ? $listBerita['images'] : asset('storage/berita/' . $listBerita['images'])) : asset('assets/images/noimage2.png') }}" alt="{{ $listBerita['judul'] }}" loading="lazy" class="m-2 w-100 h-75 rounded">
                            </div>
                            <div class="col-9 mt-auto mb-auto">
                               <h6 class="">{{ Str::limit($listBerita['judul'], 50) }}</h6>
                               <span class="small text-black text-capitalize">{{ optional($listBerita->kategori)->nama_kategori ? optional($listBerita->kategori)->nama_kategori . ' | ' : '' }}
                                {{ \Carbon\Carbon::parse($listBerita['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </div>
                        </div>
                      </div>
                    </a>
                    @endforeach
                </div>

                <div class="berita-terbaru rounded p-3 mt-4" style="overflow-y:auto;  box-shadow: 0px 4px 8px #12434D;">
                  <h4 class="fw-semibold text-secondary">Kediri dalam Berita</h4>
                  <hr class="mt-0 gradient">
                  @foreach ($beritaLuar as $listBerita)
                  <a href="{{ route('detail_berita_luar', ['slug' => $listBerita['slug'], 'id' => $listBerita['id']]) }}" class="text-decoration-none">
                    <div class="row">
                      <div class="row col-12">
                          <span class="fw-bold"> <i class="bi bi-box-arrow-up-right"></i> {{ $listBerita['web'] }}</span>
                            <h6 class="text-black">{{ Str::limit($listBerita['judul'], 200) }}</h6>
                            <hr class="mx-2">
                      </div>
                    </div>
                  </a>
                  @endforeach
                </div>
                
            </div>
        </div>
        
      </div>
    </div>
    </section>
  </div>

<!-- SCRIPT HANDLE TAB AND PAGINATION -->

<script>
  // Fungsi untuk mengatur ulang pagination ketika tab berubah
  function resetPagination(activeTab) {
      const urlParams = new URLSearchParams(window.location.search);
      
      // Update parameter 'tab'
      urlParams.set('tab', activeTab);
      
      // Hapus parameter 'page' agar pagination kembali ke halaman pertama
      urlParams.delete('page');
      
      // Perbarui URL di browser tanpa reload halaman
      const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
      history.replaceState(null, '', newUrl);

      // Perbarui link pagination agar sesuai dengan tab aktif
      updatePaginationLinks();
  }

  // Fungsi untuk memperbarui semua link pagination berdasarkan tab aktif
  function updatePaginationLinks() {
      const activeTab = document.querySelector('.nav-link.active').getAttribute('data-bs-target').substring(1);
      document.querySelectorAll('.pagination a').forEach(link => {
          const url = new URL(link.href);
          url.searchParams.set('tab', activeTab); // Set parameter 'tab'
          url.searchParams.delete('page'); // Reset halaman ke awal
          link.href = url.toString();
      });
  }

  // Fungsi untuk tab lainnya
  document.addEventListener("DOMContentLoaded", function () {
      // Ambil semua tombol kategori (termasuk di dropdown)
      let tabButtons = document.querySelectorAll(".nav-link");

      tabButtons.forEach(function (button) {
          button.addEventListener("click", function () {
              // Ambil ID kategori yang diklik
              let targetTab = button.getAttribute("data-bs-target");

              // Hapus class active dan aria-selected dari semua tombol
              tabButtons.forEach(function (btn) {
                  btn.classList.remove("active");
                  btn.setAttribute("aria-selected", "false");
              });

              // Tambahkan class active dan aria-selected ke tombol yang diklik
              button.classList.add("active");
              button.setAttribute("aria-selected", "true");

              // Sembunyikan semua konten tab
              document.querySelectorAll(".tab-pane").forEach(function (tab) {
                  tab.classList.remove("show", "active");
              });

              // Tampilkan tab yang sesuai dengan kategori yang diklik
              document.querySelector(targetTab).classList.add("show", "active");
          });
      });
  });

</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      var swiper = new Swiper(".berita-swiper", {
          slidesPerView: 1,
          loop: true,
          effect: "fade",
          fadeEffect: {
              crossFade: true, // Membuat transisi lebih halus
          },
          autoplay: {
              delay: 5000,
              disableOnInteraction: false,
          },
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          },
      });
  });
</script>

<script>
    $(document).ready(function(){
        $(".search-berita").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".tab-pane.show .text-decoration-none").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection
