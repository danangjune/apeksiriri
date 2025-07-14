<div class="container-fluid py-5" id="wamendagri-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">Kunjungan Kerja Wakil
                    Menteri Perdagangan</h2>
                <p class="lead">dalam rangka MUSKOMWIL IV APEKSI Kota Kediri 2025</p>
            </div>
        </div>

        <div class="row align-items-center g-5">
            <!-- Kolom Kiri - Foto Wamendagri dengan Background Transparan -->
            <div class="col-lg-5 position-relative">
                <div class="profile-card">
                    <img src="{{ asset('assets/images/people/wamendag.png') }}" alt="Wakil Menteri Perdagangan" class="img-fluid profile-img">  >
                    <div class="profile-info text-center p-4">
                        <h3 class="fw-bold text-primary mb-2">Dyah Roro Esti, B.A., M.Sc</h3>
                        <p class="text-muted">Wakil Menteri Perdagangan Republik Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan - Image Slider -->
            <div class="col-lg-7">
                <div class="gallery-container">

                    <div class="card-body p-0">
                        <!-- Image Slider -->
                        <div class="swiper wamendagSwiper">
                            <div class="swiper-wrapper">
                                <!-- Slide 1 -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/banner/kunjungan-gg.jpg') }}" alt="Kunjungan Wamendag" class="img-fluid w-100">
                                </div>

                                <!-- Slide 2 -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/banner/kunjungan-kampung-tenun.jpg') }}" alt="Pembukaan MUSKOMWIL" class="img-fluid w-100">
                                </div>

                                <!-- Slide 3 -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/banner/kunjungan-pasar-ngronggo.jpg') }}" alt="Seminar Ekonomi Digital" class="img-fluid w-100">
                                </div>

                                <!-- Slide 4 -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/banner/kunjungan-hotel.jpg') }}" alt="Gala Dinner APEKSI" class="img-fluid w-100">
                                </div>

                                <!-- Slide 5 -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/images/banner/kunjungan-balkot.jpg') }}" alt="Forum Dialog Perdagangan" class="img-fluid w-100">
                                </div>
                            </div>

                            <!-- Navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                            <!-- Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS untuk section Wamendag -->
<style>
    .profile-img {
        object-fit: cover;
        height: 500px;
    }
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .transform-up {
            transform: translateY(0);
            margin-top: 20px;
        }

        #wamendagri-section .card {
            margin-bottom: 20px;
        }
    }
</style>

<!-- Swiper JS Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper(".wamendagSwiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });
    });
</script>
