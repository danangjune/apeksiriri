@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-galeri">
            <div class="inner-header flex"></div>
            <div>
              <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                </g>
              </svg>
            </div>
        </div>
    </section>

    <div class="my-5 container">
        @include('layouts.breadcrumb', [
            'titlemenu' => $breadcrumb['titlemenu'],
            'titlepage' => $breadcrumb['titlepage'],
            'detailpage' => $breadcrumb['detailpage'] ?? false
        ])

        <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row mt-4">
            <h2 class="mb-3 fw-bold border-bottom title-border">Galeri Terbaru</h2>
        </div>

        <div class="galeri" id="galeri-container">
            @include('galeri._list') {{-- view partial --}}
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const lightbox = GLightbox({ selector: '.glightbox' });

    // Tangkap klik pagination
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page) {
        $.ajax({
            url: "/galeri?page=" + page,
            success: function(data) {
                $('#galeri-container').html(data);
                GLightbox({ selector: '.glightbox' }); // Re-inisialisasi GLightbox
                history.pushState(null, null, '?page=' + page); // opsional: ubah URL
            },
            error: function() {
                $('#galeri-container').html('<p class="text-danger text-center">Gagal memuat data galeri.</p>');
            }
        });
    }
});
</script>
@endsection
