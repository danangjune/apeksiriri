<div class="container-fluid py-5" id="layanan-aduan-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">Lapor Mbak Wali</h2>
                <p class="lead text-muted">Layanan Aduan Terpadu Kota Kediri</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Instagram Button -->
            <div class="col-md-4 text-center">
                <a href="https://www.instagram.com/lapormbakwali112/" target="_blank" class="aduan-card instagram-card">
                    <div class="aduan-icon-large">
                        <img src="{{ asset('assets/icons/112-ig.png') }}" alt="Instagram">
                    </div>
                </a>
                <h4 class="aduan-title mt-4">Instagram</h4>
                <p class="aduan-subtitle">@lapormbakwali112</p>
            </div>

            <!-- WhatsApp Button -->
            <div class="col-md-4 text-center">
                <a href="https://lapormbakwali.kedirikota.go.id/api/chatbot-link" target="_blank" class="aduan-card whatsapp-card">
                    <div class="aduan-icon-large">
                        <img src="{{ asset('assets/icons/112-wa-sodok.png') }}" alt="WhatsApp">
                    </div>
                </a>
                <h4 class="aduan-title mt-4">WhatsApp ChatBot</h4>
                <p class="aduan-subtitle">Lapor Mbak Wali & Sobat Dokter</p>
            </div>

            <!-- Telepon Button -->
            <div class="col-md-4 text-center">
                <a href="tel:112" class="aduan-card telepon-card">
                    <div class="aduan-icon-large">
                        <img src="{{ asset('assets/icons/112.png') }}" alt="112">
                    </div>
                </a>
                <h4 class="aduan-title mt-4">Call Center</h4>
                <p class="aduan-subtitle">Layanan Darurat</p>
            </div>
        </div>
    </div>
</div>

<!-- CSS untuk section Layanan Aduan -->
<style>
    #layanan-aduan-section {
        background: linear-gradient(135deg, #f8f9fc 0%, #e8eaf6 100%);
        min-height: 500px;
    }

    .aduan-card {
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 25px;
        padding: 40px;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 3px solid transparent;
        position: relative;
        overflow: hidden;
        height: 200px;
        width: 100%
        aspect-ratio: 1;
    }

    .aduan-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .aduan-card:hover::before {
        transform: translateX(100%);
    }

    .aduan-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        color: inherit;
    }

    .aduan-icon-large {
        width: 150px;
        height: 150px;
        border-radius: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
        color: white;
        transition: all 0.3s ease;
    }

    .aduan-icon-large img {
        width: 80%;
        height: 80%;
        object-fit: contain;
    }

    .instagram-card:hover {
        border-color: #e6683c;
    }

    .instagram-card:hover .aduan-icon-large {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(230, 104, 60, 0.4);
    }

    .whatsapp-card:hover {
        border-color: #25d366;
    }

    .whatsapp-card:hover .aduan-icon-large {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(37, 211, 102, 0.4);
    }

    .telepon-card:hover {
        border-color: #3b82f6;
    }

    .telepon-card:hover .aduan-icon-large {
        transform: scale(1.1);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
    }

    /* Title Styles */
    .aduan-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .aduan-subtitle {
        font-size: 1rem;
        color: #64748b;
        font-weight: 500;
        margin-bottom: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .aduan-card {
            padding: 30px;
            height: 160px;
        }

        .aduan-icon-large {
            width: 100px;
            height: 100px;
            font-size: 50px;
        }

        .aduan-title {
            font-size: 1.3rem;
            margin-top: 1rem !important;
        }

        .aduan-subtitle {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .aduan-card {
            padding: 25px;
            height: 140px;
        }

        .aduan-icon-large {
            width: 80px;
            height: 80px;
            font-size: 40px;
        }

        .aduan-title {
            font-size: 1.1rem;
            margin-top: 0.75rem !important;
        }

        .aduan-subtitle {
            font-size: 0.85rem;
        }
    }
</style>
