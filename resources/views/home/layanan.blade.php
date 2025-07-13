
<section id="layanan-digital">
  <div class="my-5 container">
  <h4 class="mb-5 fw-bold border-bottom title-border">Layanan Digital</h4>
  <div class="card shadow-layanan pe-3 ps-3">
    <div class="row">
      <div class="col-md-4 d-flex flex-direction-column justify-content-center align-items-center">
        <img src="{{ asset('assets/images/customer-care.png') }}" alt="Layanan Digital Kota Kediri" loading="lazy" class="w-75">
      </div>
      <div class="col-md-8 position-relative py-4">
        <ul class="position-relative pe-md-5 overflow-auto" style="max-height: 300px">
          @foreach ($layanan_digital as $item)
          <li class="position-relative left-0 list-unstyled pointer text-black border-start-primary mt-2 d-md-flex justify-content-between">
            <span class="position-relative p-md-2 px-3 d-block fs-5">{{ $item['nama_layanan'] }}</span>
            <a href="{{ $item['url'] }}" target="_blank" class="btn btn-primary text-white position-relative my-1 ms-3 ms-md-auto">Situs Web</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
</section>