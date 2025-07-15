<style>
    .banner-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 4s ease-in-out;
    }

    .banner-slide.active {
        opacity: 1;
    }
</style>

<div class="banner-home d-flex flex-column align-items-center justify-content-end position-relative overflow-hidden">
    <!-- Background image -->
    @foreach ($banners as $key => $banner)
        <img src="{{ asset('banner/' . $banner->gambar) }}"
            class="banner-slide {{ $key == 0 ? 'active' : '' }} position-absolute w-100 h-75 object-fit-cover"
            style="object-position: bottom;" alt="Pemerintah Kota Kediri">
    @endforeach

    <!-- <div class="banner-content text-center">
    <h1 class="display-4 fs-md-3 fs-sm-5">Kediri Ngangeni di Dalam Hati</h1>
    <p class="fs-5 fs-md-6 fs-sm-small">
        Keindahan yang memikat, pengalaman yang tak terlupakan. Datang sekali, ingin kembali lagi!
    </p>

  </div> -->

    <div class="banner-card px-3 text-center py-4 modern-glass mb-5">
        <h2 class="countdown-title-modern mb-2">
            <span class="countdown-gradient">MENUJU APEKSI MUSKOMWIL IV KE 13 / 2025 - KOTA KEDIRI</span>
        </h2>
        <div class="countdown-subtitle-modern mb-3">
            Kota Kediri | 13th Edition
        </div>
        <div id="countdown-modern" class="d-flex justify-content-center gap-3 flex-wrap modern-countdown-row">
            <div class="countdown-item-modern">
                <div class="countdown-number-modern" id="days">00</div>
                <div class="countdown-label-modern">Hari</div>
            </div>
            <div class="countdown-separator-modern">:</div>
            <div class="countdown-item-modern">
                <div class="countdown-number-modern" id="hours">00</div>
                <div class="countdown-label-modern">Jam</div>
            </div>
            <div class="countdown-separator-modern">:</div>
            <div class="countdown-item-modern">
                <div class="countdown-number-modern" id="minutes">00</div>
                <div class="countdown-label-modern">Menit</div>
            </div>
            <div class="countdown-separator-modern">:</div>
            <div class="countdown-item-modern">
                <div class="countdown-number-modern" id="seconds">00</div>
                <div class="countdown-label-modern">Detik</div>
            </div>
        </div>
        <div id="countdown-message" class="mt-3 fs-6 fw-semibold text-success"></div>
    </div>
    <style>
        .countdown-title-modern {
            font-size: 1.6rem;
            font-weight: 700;
            color: #165a63;
            font-family: 'Montserrat', Arial, sans-serif;
            letter-spacing: 1px;
            line-height: 1.2;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .countdown-title-modern .countdown-gradient {
            background: linear-gradient(90deg, #165a63 30%, #21808c 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            letter-spacing: 1px;
            font-size: 1.6rem;
            display: inline-block;
        }

        .countdown-subtitle-modern {
            font-size: 1rem;
            color: #21808c;
            font-family: 'Montserrat', Arial, sans-serif;
            opacity: 0.85;
            font-weight: 500;
            letter-spacing: 0.5px;
            margin-bottom: 1.2rem;
            text-align: center;
        }

        .modern-glass {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 28px;
            box-shadow: 0 8px 32px rgba(22, 90, 99, 0.08), 0 1.5px 6px rgba(0, 0, 0, 0.04);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(22, 90, 99, 0.08);
            max-width: 900px;
            margin: 0 auto;
        }

        .modern-countdown-row {
            margin-top: 10px;
        }

        .countdown-item-modern {
            background: linear-gradient(135deg, #e6f4f1 60%, #f8fafc 100%);
            border-radius: 20px;
            box-shadow: 0 6px 24px rgba(22, 90, 99, 0.07), 0 1.5px 6px rgba(0, 0, 0, 0.04);
            padding: 25px 20px;
            min-width: 90px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 2px;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #d2e7e4;
            position: relative;
            overflow: hidden;
        }

        .countdown-item-modern::before {
            content: '';
            position: absolute;
            top: -30px;
            left: -30px;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #21808c 0%, transparent 70%);
            opacity: 0.08;
            z-index: 0;
        }

        .countdown-item-modern:hover {
            transform: translateY(-4px) scale(1.04);
            box-shadow: 0 12px 32px rgba(22, 90, 99, 0.13), 0 2px 8px rgba(0, 0, 0, 0.06);
            background: linear-gradient(135deg, #e6f4f1 40%, #c2e2db 100%);
        }

        .countdown-number-modern {
            font-size: 2.8rem;
            font-weight: 900;
            color: #165a63;
            letter-spacing: 2px;
            margin-bottom: 8px;
            font-family: 'Montserrat', Arial, sans-serif;
            text-shadow: 0 2px 16px rgba(22, 90, 99, 0.10);
            transition: color 0.2s;
            z-index: 1;
        }

        .countdown-label-modern {
            font-size: 1rem;
            color: #165a63;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Montserrat', Arial, sans-serif;
            opacity: 0.85;
            z-index: 1;
        }

        .countdown-separator-modern {
            font-size: 2.4rem;
            font-weight: bold;
            color: #21808c;
            align-self: center;
            margin: 0 6px;
            user-select: none;
            opacity: 0.7;
            font-family: 'Montserrat', Arial, sans-serif;
        }

        /* Extra Large Desktop screens */
        @media (min-width: 1400px) {
            .banner-card {
                max-width: 1000px;
                padding: 2rem 2rem !important;
                margin-bottom: 3rem !important;
            }

            .countdown-item-modern {
                padding: 28px 24px;
                min-width: 95px;
            }

            .countdown-number-modern {
                font-size: 3rem;
            }

            .countdown-label-modern {
                font-size: 1.1rem;
            }

            .countdown-separator-modern {
                font-size: 2.6rem;
                margin: 0 8px;
            }
        }

        /* Large Desktop screens */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .banner-card {
                max-width: 900px;
                padding: 1.8rem 1.5rem !important;
                margin-bottom: 2.5rem !important;
            }

            .countdown-item-modern {
                padding: 26px 22px;
                min-width: 92px;
            }

            .countdown-number-modern {
                font-size: 2.9rem;
            }

            .countdown-separator-modern {
                font-size: 2.5rem;
                margin: 0 7px;
            }
        }

        /* Standard Desktop screens */
        @media (min-width: 993px) and (max-width: 1199px) {
            .banner-card {
                padding: 1.5rem 1.2rem !important;
                margin-bottom: 2rem !important;
            }

            .countdown-item-modern {
                padding: 24px 20px;
                min-width: 88px;
            }

            .countdown-number-modern {
                font-size: 2.7rem;
            }

            .countdown-separator-modern {
                font-size: 2.3rem;
            }
        }

        /* Large tablets and small desktops */
        @media (max-width: 992px) {
            .countdown-title-modern {
                font-size: 1.4rem;
            }

            .countdown-title-modern .countdown-gradient {
                font-size: 1.4rem;
            }

            .countdown-item-modern {
                padding: 28px 22px;
                min-width: 85px;
            }

            .countdown-number-modern {
                font-size: 2.8rem;
            }

            .countdown-label-modern {
                font-size: 1rem;
            }

            .countdown-separator-modern {
                font-size: 2.3rem;
                margin: 0 6px;
            }
        }

        /* Tablets */
        @media (max-width: 768px) {
            .banner-card {
                padding: 2rem 1rem !important;
                margin: 0 1rem;
            }

            .countdown-title-modern {
                font-size: 1.2rem;
            }

            .countdown-title-modern .countdown-gradient {
                font-size: 1.2rem;
            }

            .countdown-subtitle-modern {
                font-size: 0.9rem;
            }

            .modern-countdown-row {
                gap: 0.5rem !important;
            }

            .countdown-item-modern {
                padding: 20px 16px;
                min-width: 70px;
            }

            .countdown-number-modern {
                font-size: 2.2rem;
                margin-bottom: 8px;
            }

            .countdown-label-modern {
                font-size: 0.9rem;
            }

            .countdown-separator-modern {
                font-size: 2rem;
                margin: 0 4px;
            }
        }

        /* Mobile devices */
        @media (max-width: 576px) {
            .banner-card {
                padding: 1.5rem 0.8rem !important;
                margin: 0 0.5rem;
            }

            .countdown-title-modern {
                font-size: 1rem;
                line-height: 1.3;
            }

            .countdown-title-modern .countdown-gradient {
                font-size: 1rem;
            }

            .countdown-subtitle-modern {
                font-size: 0.8rem;
                margin-bottom: 1rem;
            }

            .modern-countdown-row {
                gap: 0.3rem !important;
                justify-content: center !important;
            }

            .countdown-item-modern {
                padding: 16px 12px;
                min-width: 60px;
                margin: 0 1px;
            }

            .countdown-number-modern {
                font-size: 1.8rem;
                margin-bottom: 6px;
                letter-spacing: 1px;
            }

            .countdown-label-modern {
                font-size: 0.75rem;
                letter-spacing: 0.5px;
            }

            .countdown-separator-modern {
                font-size: 1.6rem;
                margin: 0 2px;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .banner-card {
                padding: 1.2rem 0.5rem !important;
                margin: 0 0.3rem;
            }

            .countdown-title-modern {
                font-size: 0.9rem;
                padding: 0 0.5rem;
            }

            .countdown-title-modern .countdown-gradient {
                font-size: 0.9rem;
            }

            .countdown-subtitle-modern {
                font-size: 0.75rem;
            }

            .modern-countdown-row {
                gap: 0.2rem !important;
                flex-wrap: nowrap !important;
            }

            .countdown-item-modern {
                padding: 12px 8px;
                min-width: 50px;
                margin: 0;
            }

            .countdown-number-modern {
                font-size: 1.5rem;
                margin-bottom: 4px;
            }

            .countdown-label-modern {
                font-size: 0.65rem;
            }

            .countdown-separator-modern {
                font-size: 1.3rem;
                margin: 0 1px;
            }
        }

        /* Very small devices */
        @media (max-width: 360px) {
            .banner-card {
                padding: 1rem 0.3rem !important;
            }

            .countdown-title-modern {
                font-size: 0.8rem;
            }

            .countdown-title-modern .countdown-gradient {
                font-size: 0.8rem;
            }

            .countdown-item-modern {
                padding: 10px 6px;
                min-width: 45px;
            }

            .countdown-number-modern {
                font-size: 1.3rem;
            }

            .countdown-label-modern {
                font-size: 0.6rem;
            }

            .countdown-separator-modern {
                font-size: 1.1rem;
            }
        }
    </style>
    <script>
        const eventDate = new Date("2025-07-15T23:59:59").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = eventDate - now;
            if (distance < 0) {
                document.getElementById("countdown-modern").style.display = "none";
                document.getElementById("countdown-message").innerHTML = "Event telah dimulai!";
                return;
            }
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("days").textContent = String(days).padStart(2, '0');
            document.getElementById("hours").textContent = String(hours).padStart(2, '0');
            document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
            document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>

    <!-- SVG Wave sebagai overlay -->
    <svg class="hero-waves position-absolute top-75 start-0 w-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
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


<!-- Modal Banner Promo -->
<div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" aria-labelledby="agendaModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="modal-content">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let slides = document.querySelectorAll(".banner-slide");
        let index = 0;

        function changeSlide() {
            slides[index].classList.remove("active"); // Sembunyikan gambar aktif
            index = (index + 1) % slides.length; // Pindah ke gambar berikutnya
            slides[index].classList.add("active"); // Tampilkan gambar baru
        }

        setInterval(changeSlide, 4000); // Ganti gambar setiap 4 detik
    });
</script>

<script>
    document.getElementById('mobileMenu').addEventListener('change', function() {
        let selectedTab = this.value;
        let targetTab = document.getElementById('tab' + selectedTab); // Cari tab berdasarkan ID

        if (targetTab) {
            targetTab.click(); // Simulasikan klik pada tab
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(".nav-link-hero").on("click", function(e) {
            e.preventDefault();

            let kategoriId = $(this).data("id"); // Ambil ID kategori
            let contentId = "#content" + kategoriId; // Target div untuk isi konten

            // Tambahkan efek loading
            $("#tabContent").html('<div class="text-center py-4"><i class="bi bi-arrow-repeat fa-spin"></i> Memuat...</div>');

            // Panggil AJAX untuk mengambil data berdasarkan kategori
            $.ajax({
                url: "/get-content-hero",
                type: "GET",
                data: {
                    id: kategoriId
                },
                success: function(response) {
                    $("#tabContent").html('<div class="tab-pane fade show active">' + response + '</div>');
                },
                error: function() {
                    $("#tabContent").html('<div class="text-danger text-center">Gagal memuat data.</div>');
                }
            });

            // Update active class
            $(".nav-link-hero").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
