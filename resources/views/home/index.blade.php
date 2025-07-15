@extends('layouts.app')

@section('title', $meta['title'])
@section('meta_description', $meta['description'])

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/slick/slick-theme.css') }}">
@endpush

@include('home.hero')
@include('home.agenda-apeksi')
@include('home.profil-pemerintah')
@include('home.event')
@include('home.wamendag')
@include('home.fasilitas')
@include('home.teaser-info')
@include('home.layanan-aduan')
@include('home.stand-booth')

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <img src="" id="modalImage" class="img-fluid w-100" alt="Gambar Modal">
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script src="{{ asset('assets/slick/slick.min.js') }}"></script>
<script>
  $(function() {
    $('.slick-layanan').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.slick-wisata').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
      ]
    });

    $('.slick-agenda').slick({
      infinite: true,
      slidesToShow: 2,
      slidesToScroll: 2,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.slick-beritautama').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: false,
      dots: true,
      responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });
</script>

<script>
  $(document).ready(function() {
    function initSlick() {
      // Hapus Slick jika sudah diinisialisasi
      if ($('.slick-hero-banner').hasClass('slick-initialized')) {
        $('.slick-hero-banner').slick('unslick');
      }
      if ($('.slick-hero-artikel').hasClass('slick-initialized')) {
        $('.slick-hero-artikel').slick('unslick');
      }

      // Inisialisasi Slick untuk hero banner
      $('.slick-hero-banner').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

      // Inisialisasi Slick untuk hero artikel
      $('.slick-hero-artikel').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    }

    // Panggil pertama kali saat halaman dimuat
    initSlick();

    // Event saat tab desktop diklik
    $('.hero-menu .nav-link').on('click', function() {
      setTimeout(() => {
        initSlick();
      }, 300);
    });

    // Event untuk menu dropdown di mobile
    $('#mobileMenu').on('change', function() {
      setTimeout(() => {
        initSlick();
      }, 300);
    });
  });
</script>

@endpush

<script>
  function performSearch() {
    const query = document.getElementById('searchInput').value;
    const url = `{{ url('/search') }}?search=${encodeURIComponent(query)}`;
    window.location.href = url;
  }

  document.getElementById('searchButton').addEventListener('click', function() {
    performSearch();
  });

  document.getElementById('searchInput').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault();
      performSearch();
    }
  });
</script>

<!-- <script>
    $(document).ready(function () {
      const calendar = $("#my-calendar");

      // Load kartu agenda awal
      const now = new Date();
      loadAgendaCards(now.getMonth() + 1, now.getFullYear());

      // Inisialisasi Kalender
      calendar.zabuto_calendar({
        language: "id",
        today_markup: '<span class="badge bg-primary">[day]</span>',
        show_previous: true,
        show_next: true,
        show_navigation: true,
        nav_icon: {
          prev: '<i class="bi bi-chevron-left fs-4 text-dark"></i>',
          next: '<i class="bi bi-chevron-right fs-4 text-dark"></i>'
        },
        ajax: {
          url: "/events-badge",
          modal: false
        },
        legend: [
          { type: "block", label: "Agenda", classname: "bg-event" }
        ],
        action_nav: function () {
          const zabuto = calendar.data("zabuto_calendar");
          if (!zabuto || !zabuto.nav) {
            console.warn("Zabuto belum siap, skip load agenda.");
            return false;
          }

          const month = zabuto.nav.getMonth() + 1;
          const year = zabuto.nav.getFullYear();

          console.log("Navigasi ke bulan:", month, "tahun:", year);
          loadAgendaCards(month, year);
          return true;
        },
        view_render: function () {
          console.log("Kalender sudah siap dirender.");

                    document.querySelectorAll('.calendar-month-navigation').forEach(el => {
                        if (el.id.endsWith('_nav-prev')) {
                            el.innerHTML = '<i class="bi bi-chevron-left fs-4 text-dark"></i>';
                        } else if (el.id.endsWith('_nav-next')) {
                            el.innerHTML = '<i class="bi bi-chevron-right fs-4 text-dark"></i>';
                        }
                    });

                    // Periksa kalender terinisialisasi
                    const zabuto = calendar.data("zabuto_calendar");
                    if (zabuto) {
                        console.log("Zabuto calendar siap!");
                    } else {
                        console.error("Zabuto calendar belum terinisialisasi.");
                    }
                }
            });
        });

        // Fungsi load kartu agenda
        function loadAgendaCards(month, year) {
            $.ajax({
                url: '/events-card',
                method: 'GET',
                data: {
                    month,
                    year
                },
                success: function(data) {
                    $('#event-card-container').html(data.html);
                    bindModalEvents();
                },
                error: function() {
                    $('#event-card-container').html('<p class="text-danger text-center">Gagal memuat agenda.</p>');
                }
            });
        }

        function bindModalEvents() {
            $('.open-modal').click(function() {
                const id = $(this).data('id');
                $('#modal-content').html('<p>Loading...</p>');

                $.getJSON(`/detil-agenda/${id}`, function(data) {
                    $('#modal-content').html(`
            <table>
              <tr>
                <td style="text-align:center;">
                  <img src="${data.banner}" alt="${data.judul_acara}" class="table-image-modal" />
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top; padding: 10px;">
                  <h5 class="judul-agenda">${data.judul_acara}</h5>
                  <p class="agenda-desc">${data.deskripsi}</p>
                  <p class="agenda-desc"><i class="bi bi-calendar3 me-2"></i>${data.tanggal_mulai} - ${data.tanggal_selesai}</p>
                  <p class="agenda-desc"><i class="bi bi-alarm-fill me-2"></i>${data.jam_mulai} - ${data.jam_selesai}</p>
                  <p class="agenda-desc"><i class="bi bi-geo-alt-fill me-2"></i><a href="${data.maps_lokasi}" target="_blank">${data.lokasi_acara}</a></p>
                </td>
              </tr>
            </table>
          `);
          $('#agendaModal').modal('show');
        }).fail(function () {
          $('#modal-content').html('<p class="text-danger">Gagal memuat detail agenda.</p>');
        });
      });
    }

  </script> -->

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',
      height: 500,
      contentHeight: 500,
      aspectRatio: 1.5,
      events: '/events-badge',
      eventDisplay: 'list-item',
      eventClassNames: function(info) {
        return info.event.extendedProps.className; // Menampilkan class 'bg-event'
      },
      eventContent: function(arg) {
        return {
          html: `
                <div style="text-align:center;">
                  <span class="badge ${arg.event.extendedProps.className || ''}" style="font-size:10px;">●</span>
                </div>
              `
        };
      },
      datesSet: function(info) {
        const currentDate = this.getDate();
        const month = currentDate.getMonth() + 1;
        const year = currentDate.getFullYear();
        console.log('Filter kartu agenda untuk:', month, year);
        loadAgendaCards(month, year);
      },
      eventDisplay: 'block',
      eventDidMount: function(info) {
        info.el.classList.add('bg-event');
      }
    });

    calendar.render();

    // Fungsi ambil dan tampilkan kartu agenda
    function loadAgendaCards(month, year) {
      $.ajax({
        url: '/events-card',
        method: 'GET',
        data: {
          month: month,
          year: year
        },
        success: function(data) {
          $('#event-card-container').html(data.html);
          bindModalEvents(); // kalau ada modal
        },
        error: function() {
          $('#event-card-container').html('<p class="text-danger text-center">Gagal memuat agenda.</p>');
        }
      });
    }

    // Fungsi modal (jika kamu pakai)
    function bindModalEvents() {
      $('.open-modal').on('click', function() {
        const assetId = $(this).data('id');
        $('#modal-content').html('<p>Loading...</p>');
        fetch(`/detil-agenda/${assetId}`)
          .then(res => res.json())
          .then(data => {
            $('#modal-content').html(`
                            <table>
                              <tr>
                                <td style="text-align:center;">
                                  <img src="${data.banner}" alt="${data.judul_acara}" class="table-image-modal" />
                                </td>
                              </tr>
                              <tr>
                                <td style="vertical-align: top; padding: 10px;">
                                  <h5 class="judul-agenda">${data.judul_acara}</h5>
                                  <p class="agenda-desc">${data.deskripsi}</p>
                                  <p class="agenda-desc"><i class="bi bi-calendar3 me-2"></i>${data.tanggal_mulai} - ${data.tanggal_selesai}</p>
                                  <p class="agenda-desc"><i class="bi bi-alarm-fill me-2"></i>${data.jam_mulai} - ${data.jam_selesai}</p>
                                  <p class="agenda-desc"><i class="bi bi-geo-alt-fill me-2"></i><a href="${data.maps_lokasi}" target="_blank">${data.lokasi_acara}</a></p>
                                </td>
                              </tr>
                            </table>
                        `);
          })
          .catch(() => {
            $('#modal-content').html('<p class="text-danger">Gagal memuat detail agenda.</p>');
          });
      });
    }
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modalImage = document.getElementById('modalImage');
    const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

    document.querySelectorAll('.openModal').forEach(function(el) {
      el.addEventListener('click', function(e) {
        e.preventDefault();
        const imgSrc = this.getAttribute('data-img');
        modalImage.src = imgSrc;
        imageModal.show();
      });
    });
  });
</script>
<script>
  $('#liveSearch').on('keyup', function () {
    let query = $(this).val();

    $.ajax({
      url: '{{ route("standbooth.search") }}',
      data: { q: query, limit: 5 },
      success: function (res) {
        let html = '';
        if (res.length > 0) {
          html += `<div class="table-card">
                    <table class="table align-middle mb-0">
                      <thead class="table-light">
                        <tr>
                          <th>Kategori</th>
                          <th>Stand</th>
                          <th>Nama</th>
                          <th>Perusahaan</th>
                          <th>Produk</th>
                          <th>PIC</th>
                          <th>No. Telp</th>
                        </tr>
                      </thead>
                      <tbody>`;

          res.forEach(item => {
            html += `<tr>
                      <td data-label="Kategori">${item.kategori}</td>
                      <td data-label="Stand">${item.no_stand}</td>
                      <td data-label="Nama">${item.nama_stand}</td>
                      <td data-label="Perusahaan">${item.nama_perusahaan}</td>
                      <td data-label="Produk">${item.jenis_produk}</td>
                      <td data-label="PIC">${item.pic}</td>
                      <td data-label="No. Telp"><a href="tel:${item.no_telp}">${item.no_telp}</a></td>
                    </tr>`;
          });

          html += `</tbody></table></div>`;
        } else {
          html = `<div class="text-center text-muted py-4">Tidak ada hasil ditemukan</div>`;
        }

        $('#standResults').html(html);
      }
    });
  });
</script>
@endpush

@endsection
