<div class="my-5 container animate__animated animate__slideInUp" data-wow-duration="2s" data-wow-delay="5s">
  <div class="row">
    <div class="col-md-4">
      <img src="{{ asset('assets/images/jelajah.gif') }}" alt="" width="100%">
      <a href="/pesona-kediri-raya" target="_blank"
        class="btn w-100 mt-4 text-white fw-semibold btn-primary"
        style="border: none; border-radius: 30px; padding: 12px; transition: 0.4s;">
        🚀 Jelajahi Kediri Lebih Dalam
      </a>
    </div>
     <div class="col-md-8">
      <div class="container">
        <h4 class="fw-bold border-bottom title-border">Menikmati Pesona Alam & Sejarah Kota Kediri</h4>
        <p>Untuk kamu yang ingin healing, menjelajah tempat bersejarah, dan menikmati suasana khas Kediri.</p>
        <div class="row g-3 slick-hero-banner mt-4">
          @foreach ($wisata as $item)
          <div class="col-md-6 col-12 me-3">
            <a href="/detil-wisata/{{ $item['slug'] }}/{{ $item['id'] }}">
              <div class="box-banner" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
                <img src="{{ asset('storage/aset/'.$item['gambar']) }}" alt="" class="w-100" style="height: 200px; object-fit: cover;">
                <div class="overlay-title">
                  <h5 class="text-white text-center">{{ $item['nama'] }}</h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
      <div class="container">
        <h4 class="fw-bold border-bottom title-border">Belanja & Kulineran Seru di Tengah Kota</h4>
        <p>Mulai dari mall modern hingga jajanan legendaris, semua ada di Kediri.</p>
        <div class="row g-3 slick-hero-banner mt-4">
          @foreach ($belanja as $shop)
          <div class="col-md-6 col-12 me-3">
            <a href="/detil-wisata/{{ $shop['slug'] }}/{{ $shop['id'] }}">
              <div class="box-banner" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
                <img src="{{ asset('storage/aset/'.$shop['gambar']) }}" alt="" class="w-100" style="height: 200px; object-fit: cover;">
                <div class="overlay-title">
                  <h5 class="text-white text-center">{{ $shop['nama'] }}</h5>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
     </div>
  </div>
</div>