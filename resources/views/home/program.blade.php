<div class="mt-3 mb-5 container">
  <h4 class="mb-5 fw-bold border-bottom title-border">Program Sapta Cipta</h4>
  <div class="slick-layanan slick-arrow-dark">
    @foreach ($layanan as $item)
      <a href="{{ $item['url'] }}" target="_blank" class="d-flex justify-content-center align-items-center">
        <div class="card border-0">
          <div class="card-body-banner">
            <img src="{{ asset('storage/program-unggulan/'.$item['gambar']) }}" alt="Program Unggulan Kota Kediri" loading="lazy" class="program-unggulan"/>
          </div>
        </div>
      </a>
    @endforeach
  </div>
</div>