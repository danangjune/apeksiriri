<div class="my-5 container">
  <h4 class="mb-5 fw-bold border-bottom title-border">Kediri Dalam Berita</h4>
  <div class="card pt-4 pe-3 ps-3" style="box-shadow: 0px 4px 8px #12434D;">
  <div class="row">
      <!-- Bagian Berita Terkini -->
      <div class="col-12 col-md-5">
        <div class="row">
          <div class="col-12 col-md-5 ms-3">
            <h3>Berita Terkini</h3>
          </div>
          <div class="col-12 col-md-6">
            <hr class="flex-grow-1" style="border-top: 2px solid #000;">
          </div>
        </div>
        <div class="slick-beritautama">
          @foreach ($berita_terkini as $brtkn)
          <a href="/berita/{{ $brtkn['slug'] }}/{{ $brtkn['id']}}" class="item card-service text-decoration-none" target="" rel="noopener noreferrer">
            <div class="card border-0">
              <div class="card-body"> 
                <img src="{{ !empty($brtkn['images']) ? (Str::startsWith($brtkn['images'], 'http') ? $brtkn['images'] : asset('storage/berita/' . $brtkn['images'])) : asset('assets/images/announ.jpg') }}" alt="{{ $brtkn['judul'] }}" loading="lazy" class="img-berita-baru"/>
                <div class="content">
                  <h5>{{ $brtkn['judul'] }}</h5>
                  <p>{{ \Carbon\Carbon::parse($brtkn['created_at'])->locale('id')->isoFormat('D MMMM Y') }}</p>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>

      <!-- Bagian Populer -->
      <div class="col-12 col-md-4">
        <div class="card border-0">
          <nav class="nav nav-pills nav-fill" id="berita-nav">
            <a class="nav-link active" onclick="berita(1)">Populer Bulan Ini</a>
            <a class="nav-link" onclick="berita(2)">Berita Luar</a>
            <a class="nav-link" onclick="berita(3)">Pengumuman</a>
          </nav>
        </div>

        <!-- List Berita Populer -->
        <!-- @for ($i = 0; $i < 4; $i++)
        <div class="card border1 mt-2">
          <div class="row g-2 p-1 align-items-center">
            <div class="col-4 col-sm-5 text-center">
              <img src="https://live.staticflickr.com/65535/54116868312_927a45819a.jpg" class="rounded img-fluid" />
            </div>
            <div class="col-8 col-sm-7">
              <h6>Bimtek Rapor Pendidikan, Kepala Dinas Pendidikan Kota Kediri Tekankan Pentingnya...</h6>
            </div>
          </div>
        </div>
        @endfor -->

        <div id="berita-list">
          <!-- Data berita akan dimasukkan di sini oleh JavaScript -->
        </div>

        <!-- Tombol Lihat Selengkapnya -->
        <div class="mt-4 pb-1 text-center">
          <a href="/berita" class="btn btn-outline-primary btn-sm">
            <span>Lihat Selengkapnya</span>
            <i class="bi bi-arrow-right"></i>
          </a>        
        </div>
      </div>

      <!-- Bagian Iframe -->
      <div class="col-12 col-md-3">
        <div class="card border-0 h-100">
          <iframe class="m-auto w-100 iframe-berita" 
                  src="https://www.kedirikota.go.id/gprkominfo"
                  scrolling="no"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    berita(1); // Load kategori default
  });

  function berita(kategori) {
    fetch(`/berita/${kategori}`)
      .then(response => response.json())
      .then(data => {
          let beritaContainer = document.getElementById("berita-list");
          beritaContainer.innerHTML = ""; // Kosongkan sebelum diisi ulang

          data.forEach(item => {
              beritaContainer.innerHTML += `
                <div class="card border-1 mt-2" onclick="window.location.href='${item.url}'" style="cursor: pointer; transition: background-color 0.3s ease-in-out;" 
     onmouseover="this.style.backgroundColor='var(--bs-primary-bg-subtle)'; this.style.color='white';" 
     onmouseout="this.style.backgroundColor=''; this.style.color='';">
                    <div class="row g-2 p-1 align-items-center">
                        <div class="col-4 col-sm-5 text-center">
                          <img src="${item.images}" alt="${item.judul}" loading="lazy" class="rounded img-berita-home" />
                        </div>
                        <div class="col-8 col-sm-7">
                            <h6>${item.judul}</h6>
                            <p>${item.tanggal}</p>
                        </div>
                    </div>
                </div>
              `;
          });

          // Hanya update tab yang ada dalam section "Kediri Dalam Berita"
          let beritaTabs = document.querySelectorAll("#berita-nav .nav-link");
          beritaTabs.forEach(tab => tab.classList.remove("active"));

          let activeTab = document.querySelector(`#berita-nav .nav-link[onclick="berita(${kategori})"]`);
          if (activeTab) {
              activeTab.classList.add("active");
          }
      })
      .catch(error => console.error("Error fetching data:", error));
    }

</script>