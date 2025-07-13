<div class="container my-5 profil-pemerintah">
  <h2 class="countdown-title-modern mb-4 mt-4">
    <span class="countdown-gradient">
      PROFIL PESERTA APEKSI MUSKOMWIL IV KE 13 / 2025 - KOTA KEDIRI
    </span>
  </h2>

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
                data-bs-toggle="modal"
                data-bs-target="#modalProfil"
                data-nama="{{ $profil->nama }}"
                data-logo="{{ $profil->logo }}"
                data-deskripsi="{{ $profil->deskripsi }}">
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
<div class="modal fade" id="modalProfil" tabindex="-1" aria-labelledby="modalProfilLabel" aria-hidden="true">
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
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
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
  modalProfil.addEventListener('show.bs.modal', function (event) {
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
