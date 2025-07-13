<footer class="app-footer small">
  <img src="{{ asset('assets/images/footer2.png') }}" id="cover" class="cover" alt="">

  <div class="container position-relative" style="padding-top: 1rem;">
   
  </div>

  <div class="container position-absolute pb-2" style="bottom:0; z-index:10">
    <div class="navigation-wrapper text-white">
      <div class="row plr">
        <div class="col-md-3">
          <h6 class="mb-3 fw-bold text-center">Statistik Kunjungan</h6>
          <div class="py-3 px-4 rounded">
            <div class="badge bg-primary text-white align-items-center justify-content-center gap-2 d-block p-2">
                <i class="bi bi-circle-fill text-success small"></i>
                <span>5 Online</span>
            </div>
            <div class="row col-12 d-flex mt-2">
              <div class="col-6">
                <span class="fw-light">Total Harian</span>
                <h5 class="mt-1 mb-2 fw-bold text-primary">219.078</h5>
              </div>
              <div class="col-6">
                <span class="fw-light">Total Bulanan</span>
                <h5 class="mt-1 mb-2 fw-bold text-primary">219.078</h5>
              </div>
            </div>
            <hr class="mt-0 mb-1 text-primary">
            <div class="col-12 d-flex justify-between">
              <span class="col-6">Total Visitor</span>
              <span class="text-primary fw-bold">219.078</span>
            </div>
          </div>
        </div>
        <div class="row col-md-8 contact">
          <div class="col-md-4 text-center">
            <i class="bi bi-person-fill fs-2"></i>
            <p class="fs-6">Dikelola oleh Dinas Komunikasi dan Informatika Pemerintah Kota Kediri</p>
          </div>
          <div class="col-md-4 text-center">
            <i class="bi bi-telephone-fill fs-3"></i>
            <p class="fs-6">(0354) 682955</p>
          </div>
          <div class="col-md-4 text-center">
            <i class="bi bi-geo-alt-fill fs-3"></i>
            <p class="fs-6">Jalan Basuki Rahmad No. 15, Kelurahan Pocanan, Kota Kediri, Jawa Timur 64123</p>
          </div>
        </div>

        <div class="col-md-1 p-4 sosmed">
          @foreach (['instagram','facebook','youtube'] as $item)
            <div class="mb-3 text-md-end">
              <a href="/" class="text-decoration-none text-white" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-{{ $item }} fs-3"></i>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="text-center text-white mt-2">
      <span>Pemerintah Kota Kediri | &copy; Copyright 2024</span>
    </div>
  </div>

  <div class="bg posiition-relative"></div>
  
</footer>

@push('scripts')
  <script>
    $(function () {
      const imgHeight = document.getElementById("cover").naturalHeight;
      // console.log('imgHeight', imgHeight);
      $('.app-footer').css('height', imgHeight);
    });
  </script>
@endpush
