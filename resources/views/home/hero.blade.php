<style>
  .banner-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 4s ease-in-out;
  }

  .banner-slide.active {
    opacity: 1;
  }
</style>

<div class="banner-home d-flex flex-column align-items-center justify-content-end position-relative overflow-hidden">
  <!-- Background image -->
  @foreach($banners as $key => $banner)
    <img src="{{ asset('storage/banner/' . $banner->gambar) }}" 
         class="banner-slide {{ $key == 0 ? 'active' : '' }} position-absolute w-100 h-75 object-fit-cover" 
         style="object-position: bottom;" alt="Pemerintah Kota Kediri">
  @endforeach

  <!-- <div class="banner-content text-center">
    <h1 class="display-4 fs-md-3 fs-sm-5">Kediri Ngangeni di Dalam Hati</h1>
    <p class="fs-5 fs-md-6 fs-sm-small">
        Keindahan yang memikat, pengalaman yang tak terlupakan. Datang sekali, ingin kembali lagi!
    </p>
    
  </div> -->

  <div class="banner-card px-3">
    @php
        $menus = [
            ['id' => 1, 'nama_kategori' => 'Promo Warga', 'icon' => 'bi-tags'],
            ['id' => 2, 'nama_kategori' => 'Hits di Kediri', 'icon' => 'bi-fire'],
            ['id' => 3, 'nama_kategori' => 'Layanan Warga', 'icon' => 'bi-people'],
            ['id' => 4, 'nama_kategori' => 'Akses Cepat', 'icon' => 'bi-grid']
        ];
    @endphp

    <div class="header-card-hero d-flex flex-column flex-lg-row justify-content-between align-items-center">
        <!-- Menu & Dropdown di Mobile -->
        <div class="d-flex align-items-center flex-grow-1 order-0 mt-2">
            <div class="d-lg-none mb-2 w-100 mt-3 mt-lg-0">
                <select class="form-select" id="mobileMenu">
                    @foreach ($menus as $item)
                        <option value="{{ $item['id'] }}">{{ $item['nama_kategori'] }}</option>
                    @endforeach
                </select>
            </div>

            <ul class="hero-menu nav nav-pills d-none d-lg-flex p-2 mb-0" id="parentTabGroup">
                @foreach ($menus as $item)
                    <li class="nav-item ms-1 me-3">
                        <a class="nav-link-hero {{ $loop->first ? 'active' : '' }}"
                           id="tab{{ $item['id'] }}" 
                           href="#" 
                           data-id="{{ $item['id'] }}">
                            <span class="fw-bold fs-6"><i class="bi {{ $item['icon'] }}"></i> {{ $item['nama_kategori'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Search Box -->
        <div class="position-relative w-lg-auto order-1 me-0 me-lg-3">
            <div class="input-group">
                <input type="search" class="form-control text-grey bg-light fs-6" id="searchInput" placeholder="Ada apa di Kediri" aria-label="Search" style="color: #6c757d;">
                <span class="input-group-text bg-primary text-white" id="searchButton" style="cursor: pointer;">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tab-content" id="tabContent">
            <div class="tab-pane fade show active" id="content1">
                @include('home.hero-promo')
            </div>
        </div>
    </div>
  </div>

    <!-- SVG Wave sebagai overlay -->
    <svg class="hero-waves position-absolute top-75 start-0 w-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
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


  <!-- Modal Banner Promo -->
  <div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" aria-labelledby="agendaModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div id="modal-content">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".banner-slide");
    let index = 0;

    function changeSlide() {
      slides[index].classList.remove("active"); // Sembunyikan gambar aktif
      index = (index + 1) % slides.length; // Pindah ke gambar berikutnya
      slides[index].classList.add("active"); // Tampilkan gambar baru
    }

    setInterval(changeSlide, 4000); // Ganti gambar setiap 4 detik
  });
</script>

<script>
 document.getElementById('mobileMenu').addEventListener('change', function() {
    let selectedTab = this.value;
    let targetTab = document.getElementById('tab' + selectedTab); // Cari tab berdasarkan ID

    if (targetTab) {
        targetTab.click(); // Simulasikan klik pada tab
    }
});

</script>
<script>
$(document).ready(function () {
    $(".nav-link-hero").on("click", function (e) {
        e.preventDefault();
        
        let kategoriId = $(this).data("id"); // Ambil ID kategori
        let contentId = "#content" + kategoriId; // Target div untuk isi konten

        // Tambahkan efek loading
        $("#tabContent").html('<div class="text-center py-4"><i class="bi bi-arrow-repeat fa-spin"></i> Memuat...</div>');

        // Panggil AJAX untuk mengambil data berdasarkan kategori
        $.ajax({
            url: "/get-content-hero",
            type: "GET",
            data: { id: kategoriId },
            success: function (response) {
                $("#tabContent").html('<div class="tab-pane fade show active">' + response + '</div>');
            },
            error: function () {
                $("#tabContent").html('<div class="text-danger text-center">Gagal memuat data.</div>');
            }
        });

        // Update active class
        $(".nav-link-hero").removeClass("active");
        $(this).addClass("active");
    });
});
</script>