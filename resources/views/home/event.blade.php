<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">
                Event APEKSI Kota Kediri
            </h2>
            <p class="lead">Rangkaian acara spesial MUSKOMWIL IV APEKSI Kota Kediri 2025</p>
        </div>
    </div>

    <!-- Event Slider Section with Swiper -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="swiper eventSwiper">
                <div class="swiper-wrapper">

                    <!-- City Expo -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url=""
                            image="{{ asset('assets/images/banner/pramus.jpg') }}"
                            day="16"
                            month="Juli"
                            title="Kediri City Expo" />
                    </div>


                    <!-- Gala Dinner -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url="https://drive.google.com/file/d/19sCiHqcE-jDFHuuPvukM4IxSr9JJCDDP/view?usp=sharing"
                            image="{{ asset('assets/images/banner/gala-dinner.jpg') }}"
                            day="16"
                            month="Juli"
                            title="City Expo" />
                    </div>

                    <!-- Muskomwil -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url="https://drive.google.com/file/d/1QX-tYANXoQZGHNqHdVMrCg_DJ2Pkkxhn/view?usp=sharing"
                            image="{{ asset('assets/images/banner/muskomwil-iv.jpg') }}"
                            day="17"
                            month="Juli"
                            title="MUSKOMWIL IV" />
                    </div>

                    <!-- Apeksi Nite Carnival -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url="https://drive.google.com/file/d/1A6zJDi_X-UYiLFde1hkfoTeNMvLkie7T/view?usp=sharing"
                            image="{{ asset('assets/images/banner/apeksi-nite-carnival.jpeg') }}"
                            day="17"
                            month="Juli"
                            title="APEKSI NITE CARNIVAL" />
                    </div>

                    <!-- Kediri City Expo -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url=""
                            image="{{ asset('assets/images/banner/kediri-city-expo.jpg') }}"
                            day="16-18"
                            month="Juli"
                            title="Kediri City Expo" />
                    </div>

                    <!-- City Tour & Ladies Program -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url="https://drive.google.com/file/d/1bGtH57dPcfxgV9kZe9HsI6t3tO_jf_sx/view?usp=sharing"
                            image="{{ asset('assets/images/banner/city-tour-ladies-program.jpg') }}"
                            day="17"
                            month="Juli"
                            title="City Tour & Ladies Program" />
                    </div>

                    <!-- Tanam Pohon Tebar Benih -->
                    <div class="swiper-slide">
                        <x-event-image-card
                            url="https://drive.google.com/file/d/1FUSzFk7Japu8Fb-e7zJ3jUvskT4OQdZT/view?usp=sharing"
                            image="{{ asset('assets/images/banner/tanam-pohon-tebar-benih.jpg') }}"
                            day="18"
                            month="Juli"
                            title="Tanam Pohon Tebar Benih" />
                    </div>

                </div>

                <!-- Swiper Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Swiper Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

</div>

<!-- Custom Styles -->
<style>
    .swiper {
        width: 100%;
        padding-bottom: 50px;
    }

    /* Swiper Navigation Buttons */
    .swiper-button-next,
    .swiper-button-prev {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        color: white !important;
        font-weight: bold;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        transition: all 0.3s ease;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.6);
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 18px;
        font-weight: bold;
    }

    /* Swiper Pagination */
    .swiper-pagination {
        bottom: 10px !important;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #e5e7eb;
        opacity: 1;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        background: #f59e0b;
        transform: scale(1.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .eventSwiper {
            padding: 0 20px 40px 20px;
        }

        .event-card {
            height: 450px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            width: 40px;
            height: 40px;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 14px;
        }

        .event-slide .row>div {
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 576px) {

        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }
    }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.eventSwiper', {
            // Basic settings
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            initialSlide: 0,

            // Auto play
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Pagination dots
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },

            // Keyboard control
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },

            // Touch settings
            touchRatio: 1,
            touchAngle: 45,
            grabCursor: true,

            // Effects
            effect: 'slide',
            speed: 600,

            // Responsive breakpoints
            breakpoints: {
                // When window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },
                // When window width is >= 576px
                576: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // When window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // When window width is >= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            },

            // Events
            on: {
                init: function() {
                    console.log('Swiper initialized');
                },
                slideChange: function() {
                    // Optional: Add custom logic when slide changes
                },
            },
        });

        // Pause autoplay on hover
        const swiperContainer = document.querySelector('.eventSwiper');
        swiperContainer.addEventListener('mouseenter', () => {
            swiper.autoplay.stop();
        });

        swiperContainer.addEventListener('mouseleave', () => {
            swiper.autoplay.start();
        });
    });
</script>