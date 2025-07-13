@extends('layouts.app')

@section('title', 'Layanan Publik')

@section('content')
<div class="min-vh-50-pesona">
  <div class="container content-layanan">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 order-1 order-md-1">
        <h1 class="mb-3">Portal Efisien Cepat Mudah Terpadu</h1>
        <p class="">Sang pecut, yang memiliki sifat keras dan lentur, mengajarkan sikap bijaksana dan beradab, terutama bagi setiap aparatur sipil negara baik sebagai pemimpin birokrasi sekaligus sebagai pelayan masyarakat. Kerasnya pecut mencerminkan keteguhan prinsip, sementara lenturnya melambangkan kemampuan bergaul dan membangun jaringan. Dalam kehidupan, pecut menjadi alat penting, seperti dalam pentas seni jaranan dan membajak sawah. Pecut bahkan bisa menjadi simbol bahwa seorang pemimpin birokrasi sekaligus sebagai pelayan masyarakat harus mampu mengatasi tantangan dengan sikap yang bijaksana untuk meraih keberhasilan dalam tugasnya dan pelayanan terbaik kepada masyarakat.</p>
        <a href="https://pecut.kedirikota.go.id" target="_blank" class="btn btn-warning">Selengkapnya</a>
      </div>
      <div class="col-md-6 order-md-2">
        <img src="{{ asset('assets/images/layanan_publik.png') }}" alt="" class="w-100">
      </div>
    </div>
    <div class="">
      <div class="col-md-10 row m-auto d-flex">
          <div class="col-md-4 p-5 bg-primary d-flex fle-column align-items-center">
              <h2 class="text-white fs-1 fw-bold">Layanan Terpopuler</h2>
          </div>
          <div class="col-md-8">
              <div class="carousel-container">
                  <button class="carousel-btn prev">‹</button>
                  <div class="carousel">
                      @foreach ($layanan as $item)
                      <a href="{{ $item['url'] }}" target="_blank" class="carousel-transportasi border rounded ms-3 my-3 text-decoration-none">
                          <img src="{{ asset('assets/images/general.png') }}" alt="" class="w-75"  style="max-height: 150px">
                          <h6 class="fw-semibold mt-2">{{ $item['nama_layanan'] }}</h6>
                      </a>
                      @endforeach
                  </div>
                  <button class="carousel-btn next">›</button>
              </div>
          </div>
      </div>

  </div>
  </div>
</div>
<script>
  const carousel = document.querySelector('.carousel');
  const nextButton = document.querySelector('.next');
  const prevButton = document.querySelector('.prev');

  let currentIndex = 0;

  nextButton.addEventListener('click', () => {
  const items = document.querySelectorAll('.carousel-transportasi');
  if (currentIndex < items.length - 1) {
      currentIndex++;
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
  }
  });

  prevButton.addEventListener('click', () => {
      if (currentIndex > 0) {
          currentIndex--;
          carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
      }
  });

</script>
@endsection