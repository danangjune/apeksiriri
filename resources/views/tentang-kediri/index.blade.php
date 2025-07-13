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
      <div class="header-waves header-jembatan">
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
            <div class="col-md-3 py-4">
              <!-- Tab list for desktop -->
              <ul class="nav nav-pills flex-column d-none d-md-flex">
                  <li class="nav-item">
                      <!-- <a class="nav-link active" id="tab1" data-bs-toggle="pill" href="#content1">Sekilas Kediri</a> -->
                      <a class="nav-link {{ $activeTab === 'sekilas' ? 'active' : '' }}" href="{{ url('/tentang-kediri/sekilas') }}">Sekilas Kediri</a>
                  </li>
                  <li class="nav-item">
                      <!-- <a class="nav-link" id="tab2" data-bs-toggle="pill" href="#content2">Visi & Misi</a> -->
                      <a class="nav-link {{ $activeTab === 'visimisi' ? 'active' : '' }}" href="{{ url('/tentang-kediri/visimisi') }}">Visi & Misi</a>
                  </li>
                  <li class="nav-item">
                      <!-- <a class="nav-link" id="tab3" data-bs-toggle="pill" href="#content3">Lambang Daerah</a> -->
                      <a class="nav-link {{ $activeTab === 'lambang' ? 'active' : '' }}" href="{{ url('/tentang-kediri/lambang') }}">Lambang Daerah</a>
                  </li>
                  <li class="nav-item">
                      <!-- <a class="nav-link" id="tab4" data-bs-toggle="pill" href="#content4">Sejarah Kediri</a> -->
                      <a class="nav-link {{ $activeTab === 'sejarah' ? 'active' : '' }}" href="{{ url('/tentang-kediri/sejarah') }}">Sejarah Kediri</a>
                  </li>
                  <li class="nav-item">
                      <!-- <a class="nav-link" id="tab5" data-bs-toggle="pill" href="#content5">Profil Pimpinan</a> -->
                      <a class="nav-link {{ $activeTab === 'profilpimpinan' ? 'active' : '' }}" href="{{ url('/tentang-kediri/profilpimpinan') }}">Profil Pimpinan</a>
                  </li>
              </ul>
          
              <!-- Dropdown for mobile -->
              <select class="form-select d-md-none" id="tabSelect">
                  <option value="{{ route('tentang-kediri', ['tab' => 'sekilas']) }}" {{ $activeTab === 'sekilas' ? 'selected' : '' }}>Sekilas Kediri</option>
                  <option value="{{ route('tentang-kediri', ['tab' => 'visimisi']) }}" {{ $activeTab === 'visimisi' ? 'selected' : '' }}>Visi & Misi</option>
                  <option value="{{ route('tentang-kediri', ['tab' => 'lambang']) }}" {{ $activeTab === 'lambang' ? 'selected' : '' }}>Lambang Daerah</option>
                  <option value="{{ route('tentang-kediri', ['tab' => 'sejarah']) }}" {{ $activeTab === 'sejarah' ? 'selected' : '' }}>Sejarah Kediri</option>
                  <option value="{{ route('tentang-kediri', ['tab' => 'profilpimpinan']) }}" {{ $activeTab === 'profilpimpinan' ? 'selected' : '' }}>Profil Pimpinan</option>
              </select>
            </div>
          
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade {{ $activeTab == 'sekilas' ? 'show active' : '' }}" id="content1">
                        @include('tentang-kediri.sekilas')
                    </div>
                    <div class="tab-pane fade {{ $activeTab == 'visimisi' ? 'show active' : '' }}" id="content2">
                        @include('tentang-kediri.visimisi')
                    </div>
                    <div class="tab-pane fade {{ $activeTab == 'lambang' ? 'show active' : '' }}" id="content3">
                        @include('tentang-kediri.lambang')
                    </div>
                    <div class="tab-pane fade {{ $activeTab == 'sejarah' ? 'show active' : '' }}" id="content4">
                        @include('tentang-kediri.sejarah')
                    </div>
                    <div class="tab-pane fade {{ $activeTab == 'profilpimpinan' ? 'show active' : '' }}" id="content5">
                        @include('tentang-kediri.profilpimpinan')
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </section>
</div>
<script>
  document.getElementById('tabSelect').addEventListener('change', function () {
    const selectedTab = this.value;

    // Aktifkan tab konten yang sesuai
    const tabs = document.querySelectorAll('.nav-link');
    const contents = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => tab.classList.remove('active')); // Hapus kelas 'active' dari semua tab
    contents.forEach(content => content.classList.remove('show', 'active')); // Sembunyikan semua konten

    // Aktifkan konten dan tab yang dipilih
    document.querySelector(`[href="${selectedTab}"]`).classList.add('active');
    document.querySelector(selectedTab).classList.add('show', 'active');
});

</script>

<script>
    document.getElementById('tabSelect').addEventListener('change', function() {
        window.location.href = this.value;
    });
</script>
@endsection