<div class="container-fluid py-5" id="wamendagri-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">Kunjungan Kerja Wakil
                    Menteri Perdagangan</h2>
                <p class="lead">Dalam rangka MUSKOMWIL IV APEKSI Kota Kediri 2025</p>
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
                                <!-- Slide 3 -->
                                {{-- <div class="swiper-slide">
                                    <div class="slide-number">3</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/aQxCWMpxP3Dmvpoq9" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-pasar-ngronggo.jpg') }}" alt="Kunjungan Pasar Ngronggo" class="img-fluid w-100">
                                </div> --}}

                                <!-- Balkot -->
                                <div class="swiper-slide">
                                    <div class="slide-number">1</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/mz9V5eKhdZZK9jf39" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-balkot.jpg') }}" alt="Kunjungan Balai Kota" class="img-fluid w-100">
                                </div>

                                <!-- Hotel -->
                                <div class="swiper-slide">
                                    <div class="slide-number">2</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/E3AKBaqFqD1J1iGe6" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-hotel.jpg') }}" alt="Kunjungan Hotel" class="img-fluid w-100">
                                </div>

                                <!-- GG -->
                                <div class="swiper-slide">
                                    <div class="slide-number">3</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/g6PBzBWvtJiMc7JM7" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-gg.jpg') }}" alt="Kunjungan Gudang Garam" class="img-fluid w-100">
                                </div>

                                <!-- Kampung Tenun -->
                                <div class="swiper-slide">
                                    <div class="slide-number">4</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/HFbuQ5Na9o5h26NFA" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-kampung-tenun.jpg') }}" alt="Kunjungan Kampung Tenun" class="img-fluid w-100">
                                </div>

                                <!-- POO -->
                                <div class="swiper-slide">
                                    <div class="slide-number">5</div>
                                    <div class="slide-map-marker">
                                        <a href="https://maps.app.goo.gl/haEXuUcBxgoWojBL8" target="_blank">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </a>
                                    </div>
                                    <img src="{{ asset('assets/images/banner/kunjungan-poo.jpg') }}" alt="Kunjungan Pusat Oleh-oleh" class="img-fluid w-100">
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
    .slide-number {
        position: absolute;
        font-weight: bold;
        width: 2.5rem;
        top: 15px;
        right: 15px;
        background-color: rgba(70, 158, 246, 0.8);
        color: #ffffff;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        font-size: 1.5em;
    }

    /* Map Marker */
    .slide-map-marker {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 10;
    }

    .slide-map-marker a {
        width: 45px;
        height: 45px;
        background: rgba(220, 38, 38, 0.9);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .slide-map-marker a:hover {
        background: rgba(220, 38, 38, 1);
        transform: scale(1.1);
        color: white;
    }

    .profile-img-container {
        position: relative;
        overflow: hidden;
    }

    .profile-img {
        object-fit: contain;
        height: 600px;
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

    .gallery-container .swiper-slide img {
        border-radius: 10px;
    }

    .profile-info {
        position: relative;
        top: -100px;
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
                delay: 5000,
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
