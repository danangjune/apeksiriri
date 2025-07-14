<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
  <title>@yield('title')</title>
  <meta name="description" content="@yield('meta_description')">
  <link rel="stylesheet" href="{{ asset('assets/animate/animate.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />

  <!-- jQuery (required for Zabuto Calendar) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Zabuto Calendar stable version -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.4/zabuto_calendar.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.4/zabuto_calendar.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  @vite('resources/sass/app.scss')

  @stack('styles')
</head>

{{-- Google Analytics --}}
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WZN4GZBF0B"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-WZN4GZBF0B');
</script>

<body>
  {{-- @include('layouts.navbar') --}}
  @yield('content')
  @include('layouts.footer')

  @vite('resources/js/app.js')

  @include('layouts.floating')
  @include('layouts.penilaian')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="{{ asset('assets/animate/wow.min.js') }}"></script>

  <!-- FullCalendar JS -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.global.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      @if(Route::currentRouteName() == 'landing')
        var iklanModal = new bootstrap.Modal(document.getElementById('iklanModal'), {
          backdrop: 'static', // Agar tidak bisa ditutup dengan klik di luar modal
          keyboard: false // Nonaktifkan tombol ESC untuk menutup
        });

        // setTimeout(() => {
        //   iklanModal.show();
        // }, 2000); // Muncul setelah 2 detik (bisa diubah)

        iklanModal.show(); // Langsung tampil tanpa delay
      @endif
    });
  </script>

  <!-- Additional Scripts -->
  <script>
    new WOW().init();

    // Toastr Settings
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000"
    };

    // AJAX Form Submission
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    toastr.success('Search completed successfully!');
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        toastr.error('Data Gagal Dimuat. Hubungi Programmer!!');
                    }
                }
            });
        });
    });

    // Slider Navigation
    document.addEventListener("DOMContentLoaded", function () {
      const restaurantContainer = document.querySelector(".card-slider");
      const leftRButton = document.querySelector(".restaurant-arrow-left");
      const rightRButton = document.querySelector(".restaurant-arrow-right");

      function updateButtonState() {
        leftRButton.disabled = restaurantContainer.scrollLeft <= 0;
        rightRButton.disabled =
          restaurantContainer.scrollLeft + restaurantContainer.offsetWidth >=
          restaurantContainer.scrollWidth;
      }

      leftRButton.onclick = function () {
        restaurantContainer.scrollBy({
          left: -restaurantContainer.offsetWidth / 2,
          behavior: "smooth",
        });
      };

      rightRButton.onclick = function () {
        restaurantContainer.scrollBy({
          left: restaurantContainer.offsetWidth / 2,
          behavior: "smooth",
        });
      };

      restaurantContainer.addEventListener("scroll", updateButtonState);
      updateButtonState();
    });

  </script>

<script>
    (function(d){
      var s = d.createElement("script");
      /* uncomment the following line to override default position*/
      s.setAttribute("data-position", 3);
      /* uncomment the following line to override default size (values: small, large)*/
      /* s.setAttribute("data-size", "small");*/
      /* uncomment the following line to override default language (e.g., fr, de, es, he, nl, etc.)*/
      /* s.setAttribute("data-language", "language");*/
      /* uncomment the following line to override color set via widget (e.g., #053f67)*/
      s.setAttribute("data-color", "#053e67");
      /* uncomment the following line to override type set via widget (1=person, 2=chair, 3=eye, 4=text)*/
      /* s.setAttribute("data-type", "1");*/
      /* s.setAttribute("data-statement_text:", "Our Accessibility Statement");*/
      /* s.setAttribute("data-statement_url", "http://www.example.com/accessibility")";*/
      /* uncomment the following line to override support on mobile devices*/
      /* s.setAttribute("data-mobile", true);*/
      /* uncomment the following line to set custom trigger action for accessibility menu*/
      /* s.setAttribute("data-trigger", "triggerId")*/
      s.setAttribute("data-account", "FCl1e8LsIe");
      s.setAttribute("src", "https://cdn.userway.org/widget.js");
      (d.body || d.head).appendChild(s);
    })(document)
    </script>
    <noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
  @stack('scripts')
</body>
</html>
