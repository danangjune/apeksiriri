<div class="container-fluid py-5" id="fasilitas-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">Fasilitas Kota Kediri</h2>
                <p class="lead">Layanan dan fasilitas terbaik untuk mendukung kenyamanan Anda</p>
            </div>
        </div>

        <!-- Row 1: 4 Cards -->
        <div class="row mb-4">
            <!-- Card 1 - Hotel -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 1]) }}" class="facility-card-link">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/hotel.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Hotel</h4>
                            <p class="facility-desc">Cari tempat menginap</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2 - Transportasi -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 2]) }}" class="facility-card-link">
                    <div class="facility-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/car-rent.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Rental Mobil</h4>
                            <p class="facility-desc">Sewa mobil mudah</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3 - Kuliner -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 3]) }}" class="facility-card-link">
                    <div class="facility-card culiner-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/culinary.png') }}"></i>
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Kuliner</h4>
                            <p class="facility-desc">Nikmati kuliner lokal</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 4 - Ibadah -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 4]) }}" class="facility-card-link">
                    <div class="facility-card worship-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/coffee-cup.png') }}"></i>
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Coffee Shop</h4>
                            <p class="facility-desc">Ngopi dan santai</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 5 - Rekreasi -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 5]) }}" class="facility-card-link">
                    <div class="facility-card recreation-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/shopping-bag.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Mall & Shopping</h4>
                            <p class="facility-desc">Belanja puas hemat</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 6 - Belanja -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 6]) }}" class="facility-card-link">
                    <div class="facility-card shopping-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/tofu.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Oleh-oleh</h4>
                            <p class="facility-desc">Beli buat oleh-oleh</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 7 - Pemerintahan -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 7]) }}" class="facility-card-link">
                    <div class="facility-card government-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/destination atau wisata.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Wisata</h4>
                            <p class="facility-desc">Jelajahi tempat seru</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 8 - Hotel -->
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="{{ route('fasilitas-kota', ['tab' => 8]) }}" class="facility-card-link">
                    <div class="facility-card hotel-card">
                        <div class="facility-icon">
                            <img src="{{ asset('assets/icons/hospital.png') }}">
                        </div>
                        <div class="facility-content">
                            <h4 class="facility-title">Rumah Sakit</h4>
                            <p class="facility-desc">Cari bantuan medis</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- CSS untuk section Fasilitas -->
<style>
    #fasilitas-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 600px;
    }

    .facility-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .facility-card-link:hover {
        text-decoration: none;
        color: inherit;
    }

    .facility-card {
        background: white;
        border-radius: 15px;
        padding: 15px;
        height: 140px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 20px;
        cursor: pointer;
    }

    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .facility-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        flex-shrink: 0;
    }

    .facility-content {
        flex: 1;
    }

    .facility-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
        line-height: 1.2;
        color: #2c3e50;
    }

    .facility-desc {
        font-size: 14px;
        color: #7f8c8d;
        line-height: 1.4;
        margin-bottom: 0;
    }

    .facility-icon img {
        height: 45px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .facility-card {
            height: 120px;
            padding: 20px;
            gap: 15px;
        }

        .facility-icon {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        .facility-title {
            font-size: 16px;
        }

        .facility-desc {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .facility-card {
            height: 100px;
            padding: 15px;
            gap: 12px;
        }

        .facility-icon {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .facility-title {
            font-size: 15px;
        }

        .facility-desc {
            font-size: 12px;
        }
    }
</style>
