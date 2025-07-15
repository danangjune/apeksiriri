@push('styles')
    <style>
        .table-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
            padding: 1rem;
            text-transform: uppercase;
        }

        .show-more-btn {
            border-radius: 2rem;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.15);
            transition: all 0.3s ease;
            background-color: white;
        }

        .show-more-btn:hover {
            background-color: #0d6efd;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.3);
        }

        .show-more-btn:active {
            transform: scale(0.98);
        }

        .input-group input::placeholder {
            font-style: italic;
            color: #6c757d;
        }

        .input-group .btn {
            font-weight: 600;
        }

        @media(max-width: 576px) {
            .input-group {
                flex-direction: column;
            }

            .input-group input,
            .input-group .btn {
                border-radius: 2rem !important;
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }

        /* Mobile Style */
        @media (max-width: 768px) {
            .table-card table {
                border: none;
            }

            .table-card thead {
                display: none;
            }

            .table-card tr {
                display: flex;
                flex-direction: column;
                background: #fff;
                margin-bottom: 1rem;
                border-radius: 0.5rem;
                border: 1px solid #dee2e6;
                padding: 1rem;
            }

            .table-card td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                border-bottom: 1px dashed #dee2e6;
            }

            .table-card td:last-child {
                border-bottom: none;
            }

            .table-card td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #6c757d;
                flex: 0 0 40%;
                max-width: 40%;
                text-align: left;
            }

            .table-card td {
                flex: 1;
                text-align: right;
            }
        }
    </style>
@endpush


<div class="container-fluid py-5" id="stand-booth-section">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12 text-center">
                <h2 class="fw-bold mb-3 border-bottom border-3 border-primary d-inline-block pb-2">Peserta City Expo</h2>
                <p class="lead text-muted">Daftar Peserta City Expo di MUSKOMWIL IV APEKSI Kota Kediri 2025</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="table-card">
                <div class="mb-4 col-md-4">
                    <input type="text" id="liveSearch" class="form-control form-control-lg shadow-sm"
                        placeholder="🔍 Cari stand, nama, produk...">
                </div>
                <div id="standResults">
                    @include('home.standbooth._table', ['data' => $standBooth])
                  </div>
                <div class="text-center mt-4">
                    <a href="{{ url('standbooth') }}"
                        class="btn btn-gradient-green px-4 py-2 fw-semibold rounded-pill d-inline-flex align-items-center gap-2"
                        >
                        Tampilkan Lebih Banyak
                        <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
