<div class="my-5 container animate__animated animate__slideInUp" data-wow-duration="2s" data-wow-delay="5s">
  <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row">
      <h4 class="mb-5 fw-bold border-bottom title-border">Kediri Punya Produk</h4>
      <div class="button-container">
          <button class="btn btn-light restaurant-arrow-left"><i class="bi bi-arrow-left"></i></button>
          <button class="btn btn-light restaurant-arrow-right"><i class="bi bi-arrow-right"></i></button>
      </div>
  </div>
  <div class="card-slider d-flex overflow-auto">
    @foreach ($produk as $prod)
      <a href="/detil-wisata/{{ $prod['slug'] }}/{{ $prod['id'] }}" class="produk-card">
        <img src="{{ asset('storage/aset/' . $prod['gambar']) }}" alt="{{ $prod['nama'] }}" loading="lazy">
        <div class="produk-title">
          {{ $prod['nama'] }}
        </div>
      </a>
    @endforeach
  </div>
</div>