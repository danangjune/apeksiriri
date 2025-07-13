<div class="layanan">
  <div class="container position-relative">
    <h1 class="mb-5 mt-5 fw-bold text-center text-secondary">PORTAL LAYANAN TERPADU</h1>
    <div class="owl-carousel owl-theme">
      @foreach($layanan as $layanan)
      <a href="https://pecut.kedirikota.go.id/" target="_blank" class="card-link">
        <div class="card border-0" style="background-color: transparent;">
          <div class="card-body">
            <img src="{{ asset('storage/layanan-terpadu/' . $layanan['banner']) }}" alt="Portal Layanan Terpadu Kota Kediri" loading="lazy" style="width: 80%; height: auto; margin: auto; border-radius: 25px;" />
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @include('landing.kalender-acara')
</div>
