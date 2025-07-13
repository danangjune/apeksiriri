<style>
   .banner-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background:  rgba(5, 49, 77, 0.4);
    z-index: 10;
  }
</style>
<div class="banner-hero">
  <img src="{{ asset('assets/images/hero banner pemkot.png') }}" class="img-hero" alt="hero-banner">
  <div class="container position-absolute bottom-50 start-50 translate-middle-x mb-4 rounded" style="z-index: 100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6 mt-2">
        <div class="input-group">
          <input type="search" class="form-control form-control-lg" id="searchInput" placeholder="Jelajahi disini..." />
          <span class="input-group-text bg-primary" id="searchButton" style="border-left: none; cursor: pointer;">
            <i class="bi bi-search text-white"></i>
          </span>
        </div>
      </div>
      
      <!-- P tag fixed -->
      <div class="col-12 text-center mt-2 mb-2">
        <p class="text-white">Populer di Kota Kediri</p>
        <div class="w-100 overflow-auto text-nowrap">
          <button type="button" class="btn btn-light me-2">Harmoni Kediri <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Kediri The Service City <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Hayo Apa <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Apa Ya <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Tau Dah <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
        </div>
        <div class="w-100 overflow-auto text-nowrap mt-2">
          <button type="button" class="btn btn-light me-2">Harmoni Kediri <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Kediri The Service City <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Hayo Apa <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Apa Ya <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
          <button type="button" class="btn btn-light me-2">Tau Dah <i class="bi bi-box-arrow-in-up-right ms-3"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>