<style>
    .slider-container {
      width: 100%;
      background: #fff;
      border-radius: 15px;
      padding: 20px 0 40px 0;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      user-select: none;
    }

    /* Slider */
    .slider {
      position: relative;
      overflow: hidden;
      width: 100%;
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
      // gap: 25px;
    }

    /* Each slide */
    .slide {
      flex-shrink: 0;
      width: 100%;
      display: grid;
      justify-content: center;
      gap: 20px;
      user-select: none;
    }

    /* Cards container for slide1 and slide2 */
    .cards-slide1 {
      /* 7 cards, arranged 4 on top row and 3 on bottom row */
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(2, 1fr);
      grid-template-areas:
        "card1 card2 card3 card4"
        "card5 card6 card7 card7";
      gap: 20px 25px;
    }
    .cards-slide1 > div:nth-child(1) { grid-area: card1; }
    .cards-slide1 > div:nth-child(2) { grid-area: card2; }
    .cards-slide1 > div:nth-child(3) { grid-area: card3; }
    .cards-slide1 > div:nth-child(4) { grid-area: card4; }
    .cards-slide1 > div:nth-child(5) { grid-area: card5; }
    .cards-slide1 > div:nth-child(6) { grid-area: card6; }
    .cards-slide1 > div:nth-child(7) { grid-area: card7; }

    .cards-slide2 {
      /* 6 cards, arranged 4 on top row and 2 on bottom row */
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: repeat(2, 1fr);
      grid-template-areas:
        "card1 card2 card3 card4"
        "card5 card6 card6 card6";
      gap: 20px 25px;
      justify-items: center;
    }
    .cards-slide2 > div:nth-child(1) { grid-area: card1; }
    .cards-slide2 > div:nth-child(2) { grid-area: card2; }
    .cards-slide2 > div:nth-child(3) { grid-area: card3; }
    .cards-slide2 > div:nth-child(4) { grid-area: card4; }
    .cards-slide2 > div:nth-child(5) { grid-area: card5; }
    .cards-slide2 > div:nth-child(6) { grid-area: card6; }

    /* Card styles */
    .card {
      background: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      display: flex;
      flex-direction: column;
      padding: 15px;
      align-items: center;
      text-align: center;
      transition: transform 0.3s cubic-bezier(.4,0,.2,1);
      cursor: default;
      min-width: 140px;
    }
    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 25px rgba(0,0,0,0.15);
      z-index: 5;
    }
    .card img {
      width: 64px;
      height: 64px;
      object-fit: contain;
      margin-bottom: 12px;
      border-radius: 10px;
      background: #eaeaea;
      padding: 8px;
      box-shadow: 0 3px 10px rgb(0 0 0 / 0.05);
    }
    .card h3 {
      font-size: 1.1rem;
      color: #264653;
      margin-bottom: 6px;
      min-height: 2.6rem;
      font-weight: 700;
      line-height: 1.2;
    }
    .card p {
      color: #4a5568;
      font-size: 0.85rem;
      font-weight: 500;
      margin-bottom: 12px;
      min-height: 2rem;
      opacity: 0.8;
      line-height: 1.3;
    }
    .card button {
      background-color: #264653;;
      border: none;
      outline: none;
      padding: 8px 18px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 0.9rem;
      color: white;
      cursor: pointer;
      user-select: none;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 8px rgb(43 108 176 / 0.35);
      width: 100%;
      max-width: 160px;
    }
    .card button:hover {
      background-color: white;
      color: #264653;;
      box-shadow: 0 6px 14px rgb(30 66 159 / 0.5);
    }

    /* Slider Nav BTN container */
    .nav-buttons {
      margin-top: 25px;
      display: flex;
      justify-content: center;
      gap: 15px;
    }
    .nav-buttons button {
      background-color: #264653;;
      border: none;
      outline: none;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      cursor: pointer;
      color: white;
      font-weight: 700;
      font-size: 1.2rem;
      user-select: none;
      box-shadow: 0 4px 12px rgb(43 108 176 / 0.3);
      transition: background-color 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .nav-buttons button:hover,
    .nav-buttons button.active {
      background-color: white;
      color: #264653;;
      box-shadow: 0 6px 16px rgb(30 66 159 / 0.45);
    }

    .slide {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  padding: 1rem;
}

.cards-slide1 .card:nth-child(1),
.cards-slide1 .card:nth-child(2),
.cards-slide1 .card:nth-child(3),
.cards-slide1 .card:nth-child(4) {
  width: 22%; /* kira-kira 4 dalam satu baris dengan gap */
}

.cards-slide1 .card:nth-child(5),
.cards-slide1 .card:nth-child(6),
.cards-slide1 .card:nth-child(7),
.cards-slide1 .card:nth-child(8),
.cards-slide1 .card:nth-child(9) {
  width: 18%;
}

.cards-slide1 .card:nth-child(10),
.cards-slide1 .card:nth-child(11),
.cards-slide1 .card:nth-child(12),
.cards-slide1 .card:nth-child(13) {
  width: 22%;
}
/* Umum */
.slide {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
  padding: 1rem;
}

/* Slide 1 */
.cards-slide1 .card:nth-child(-n+4), /* baris 1: 4 kartu */
.cards-slide1 .card:nth-child(n+10) {
  width: 22%;
}
.cards-slide1 .card:nth-child(n+5):nth-child(-n+9) { /* baris 2: 5 kartu */
  width: 22%;
}

/* Slide 2 */
.cards-slide2 .card:nth-child(-n+4), /* baris 1: 4 kartu */
.cards-slide2 .card:nth-child(n+10) {
  width: 22%;
}
.cards-slide2 .card:nth-child(n+5):nth-child(-n+9) { /* baris 2: 5 kartu */
  width: 22%;
}


    /* Responsive adjustments */
    @media (max-width: 950px) {
      .cards-slide1 {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(3, 1fr);
        grid-template-areas:
          "card1 card2 card3"
          "card4 card5 card6"
          "card7 card7 card7";
      }
      .cards-slide2 {
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        grid-template-areas:
          "card1 card2 card3"
          "card4 card5 card6";
      }
      .slide {
        padding-top: 10px;
      }
    }
    @media (max-width: 600px) {
      .cards-slide1, .cards-slide2 {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: auto;
        grid-template-areas: none;
        justify-content: center;
        gap: 18px;
      }
      .cards-slide1 > div, .cards-slide2 > div {
        width: 100%;
        max-width: 280px;
        height: 220px;
      }
      .cards-slide2{
        height: fit-content;
      }
      .slide {
        padding-top: 10px;
      }
    }
</style>
<div class="container my-5 profil-pemerintah">
  <div class="row mb-4">
    <div class="col-12 text-center">
      <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">
        Profil Peserta APEKSI
      </h2>
      <p class="lead">MUSKOMWIL IV KE 13 / 2025 - KOTA KEDIRI</p>
    </div>
  </div>

  <div class="slider-container" role="region" aria-label="Government Logo and Button Slider">
    <div class="slider">
      <div class="slides" id="slides">

        @foreach ($slides as $i => $slide)
        <div class="slide cards-slide{{ $i + 1 }}" aria-label="Slide {{ $i + 1 }}">
          @foreach ($slide as $profil)
          <div class="card" tabindex="0" aria-label="Logo {{ $profil->id }}: {{ $profil->nama }}">
            <img src="{{ $profil->logo }}" alt="Logo {{ $profil->nama }}" />
            <h3>{{ $profil->nama }}</h3>

            {{-- Tombol modal: bawa data nama + logo + deskripsi --}}
            <button
              type="button"
              class="btn-profil"
              onclick="location.href='/detil-peserta/{{ $profil->id }}'">
              Lihat Profil
            </button>
          </div>
          @endforeach
        </div>
        @endforeach

      </div>
    </div>

    <div class="nav-buttons" role="tablist" aria-label="Slide navigation">
      @foreach ($slides as $i => $slide)
      <button role="tab"
        aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
        aria-controls="slide{{ $i + 1 }}"
        id="btn-slide{{ $i + 1 }}"
        class="{{ $i === 0 ? 'active' : '' }}"
        tabindex="{{ $i === 0 ? '0' : '-1' }}">
        {{ $i === 0 ? '<' : '>' }}
      </button>
      @endforeach
    </div>
  </div>
</div>
{{-- ============== MODAL PROFIL (Bootstrap) ============== --}}
<!-- <div class="modal fade" id="modalProfil" tabindex="-1" aria-labelledby="modalProfilLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="modalProfilLabel">Profil Kota</h5>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="modalLogo" class="img-fluid mb-3" style="max-width: 100px;" alt="Logo Kota">
        <h4 id="modalNama" class="fw-bold"></h4>
        <p id="modalDeskripsi" class="text-muted"></p>
      </div>
    </div>
  </div>
</div> -->


<script>
  document.addEventListener("DOMContentLoaded", function() {
    const slidesContainer = document.getElementById("slides");
    const slideButtons = document.querySelectorAll(".nav-buttons button");
    const slides = document.querySelectorAll(".slide");

    let currentSlide = 0;

    function updateSlide(index) {
      currentSlide = index;
      const offset = -index * slidesContainer.clientWidth;
      slidesContainer.style.transform = `translateX(${offset}px)`;
      slidesContainer.style.transition = 'transform 0.5s ease-in-out';

      slideButtons.forEach((btn, i) => {
        btn.classList.toggle("active", i === index);
        btn.setAttribute("aria-selected", i === index);
        btn.tabIndex = i === index ? 0 : -1;
      });
    }

    slideButtons.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        updateSlide(i);
      });
    });

    // Init
    updateSlide(0);
  });
</script>
<script>
  const modalProfil = document.getElementById('modalProfil');
  modalProfil.addEventListener('show.bs.modal', function(event) {
    const button = event.relatedTarget;
    const nama = button.getAttribute('data-nama');
    const logo = button.getAttribute('data-logo');
    const deskripsi = button.getAttribute('data-deskripsi');

    const modalNama = modalProfil.querySelector('#modalNama');
    const modalLogo = modalProfil.querySelector('#modalLogo');
    const modalDeskripsi = modalProfil.querySelector('#modalDeskripsi');

    modalNama.textContent = nama;
    modalLogo.src = logo;
    modalLogo.alt = `Logo ${nama}`;
    modalDeskripsi.textContent = deskripsi;
  });
</script>