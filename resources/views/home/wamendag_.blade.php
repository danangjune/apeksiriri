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
                    <div class="profile-img-container">
                        <img src="{{ asset('assets/images/people/wamendag.png') }}" alt="Wakil Menteri Perdagangan" class="img-fluid profile-img">
                        <div class="profile-overlay"></div>
                    </div>
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

                            <!-- Pagination only -->
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
    /* Profile styling with gradient overlay */
    .profile-img-container {
        position: relative;
        overflow: hidden;
    }

    .profile-img {
        object-fit: cover;
        height: 500px;
        width: 100%;
        display: block;
    }

    .profile-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 40%;
        background: linear-gradient(to top, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0));
    }

    /* Swiper styling */
    .swiper-pagination {
        position: relative;
        margin-top: 15px;
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
            // Navigation arrows removed
        });
    });
</script>
