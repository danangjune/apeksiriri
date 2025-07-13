<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Pemerintah Kota Kediri</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />
  @vite('resources/sass/app.scss')
  <link rel="stylesheet" href="{{ asset('assets/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/owlcarousel/assets/owl.theme.default.min.css') }}">
  <!-- Add Zabuto Calendar CSS -->
  <link href="https://www.zabuto.com/dev/calendar/dist/zabuto_calendar.min.css" rel="stylesheet">
  <!-- jQuery (required for Zabuto Calendar) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Zabuto Calendar JS -->
  <script src="https://www.zabuto.com/dev/calendar/dist/zabuto_calendar.min.js"></script>
</head>
<body class="bg-white">
  @include('landing.hero')
  @include('landing.layanan')
  @include('landing.footer')

  <!-- <script src="{{ asset('assets/jquery-3.7.1.min.js') }}"></script> -->
  @vite('resources/js/app.js')
  <script src="{{ asset('assets/owlcarousel/owl.carousel.min.js') }}"></script>
  <script>
  $(function () {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: true, // Ensure dots are enabled
      autoplay: true, // Enable auto sliding
      autoplayTimeout: 3000, // Set delay between slides in milliseconds
      autoplayHoverPause: true, // Pause on hover
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        }
      }
    });
  });
</script>

<script type="application/javascript">
    $(document).ready(function () {
        $("#my-calendar").zabuto_calendar({
            language: "id",
            // today_markup: '<span class="badge bg-primary">[day]</span>',
            data: function () {
                return $.get('/events'); // Fetch events from the server
            },
            ajax: {
                url: "/events"
            },
        });
    });
</script>
</body>
</html>