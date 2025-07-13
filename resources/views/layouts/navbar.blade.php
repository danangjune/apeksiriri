<nav class="navbar navbar-expand-lg fixed-top" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('landing') }}">
      <div class="d-flex align-items-center gap-4 m-0">
        {{-- <img src="{{ asset('assets/images/harmoni.png') }}" class="d-none d-md-inline" height="35" alt="harmoni" /> --}}
        <img src="{{ asset('assets/images/logo-pemkot-stroke.png') }}" height="55" alt="Logo Pemerintah Kota Kediri" />
        {{-- <img src="{{ asset('assets/images/service-city.png') }}" class="d-none d-md-inline" height="35" alt="service-city" /> --}}
      </div>
      {{-- <span class="navbar-brand-label">PEMERINTAH KOTA KEDIRI</span> --}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-4">
        @foreach ($appNavigation as $item)
          @if (isset($item['children']) && count($item['children']) > 0)
              <li class="nav-item dropdown dropdown-lg fw-semibold">
                  <button 
                      @class([
                          'nav-link dropdown-toggle', 
                          'active-navbar' => Request::is(...$item['routes']),
                          'text-primary'
                      ]) 
                      data-bs-auto-close="outside" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false">
                      {{ $item['title'] }}
                  </button>
                  <div class="dropdown-menu" data-bs-theme="light">
                      <div class="container py-3 px-5">
                          <div class="row">
                              @foreach ($item['children'] as $child)
                                  <div class="col-md-4">
                                    <a 
                                    href="{{ $child['url'] }}" 
                                    @if (strpos(strtolower($child['url']), 'https') !== false) target="_blank" @endif
                                    @class([
                                        'text-decoration-none text-muted row d-flex', 
                                        'active-child' => Request::is(trim($child['url'], '/')),
                                    ])>
                                     <div class="col-md-2">
                                        <i class="bi {{ $child['icon'] }} fs-2 text-primary"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <h4 class="fw-bolder text-primary">{{ $child['title'] }}</h4>
                                        <p class="text-primary small">{{ $child['description'] }}</p>
                                    </div>
                                    </a>      
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </li>
          @else
              <li class="nav-item">
                  <a 
                      @class([
                          'nav-link', 
                          'active',
                          'fw-semibold'
                      ]) 
                      aria-current="page" 
                      href="{{ $item['url'] }}">
                      {{ $item['title'] }}
                  </a>
              </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>
</nav>
<script>
  document.addEventListener("DOMContentLoaded", function () {
      let navbar = document.querySelector(".navbar");
      let navLinks = document.querySelectorAll(".navbar a, .navbar button");

      window.addEventListener("scroll", function () {
          if (window.scrollY > 50) {
              navbar.classList.add("scrolled");
              navLinks.forEach(link => link.classList.add("text-light")); // Pastikan warna berubah
          } else {
              navbar.classList.remove("scrolled");
              navLinks.forEach(link => link.classList.remove("text-light"));
          }
      });
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let navbar = document.querySelector(".navbar");
    let dropdowns = document.querySelectorAll(".dropdown-toggle");

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener("click", function () {
            navbar.classList.add("bg-primary");
        });
    });

    // Hapus warna primary saat klik di luar dropdown
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".navbar")) {
            navbar.classList.remove("bg-primary");
        }
    });
});
</script>

