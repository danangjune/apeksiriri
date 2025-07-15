@extends('layouts.app')

@section('title', 'Daftar Standbooth Apeksi')

@push('styles')
    <style>
        body {
            background-color: #f4f6fc;
            font-family: 'Segoe UI', sans-serif;
        }

        .svg-header {
            padding: 4rem 1rem 5rem;
            /* <--- UBAH INI dari 2rem ke 5rem */
            position: relative;
            text-align: center;
            color: #0a4d56;
        }

        .svg-header h1 {
            font-weight: 800;
            font-size: 2rem;
            text-shadow: 1px 1px 2px #ffffff;
        }

        .section-title {
            text-align: center;
            margin-top: 2rem;
        }

        .section-title p {
            color: #6c757d;
        }

        .table-card {
            border-radius: 1.25rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            background: white;
            border: none;
        }

        #liveSearch {
            padding-left: 2.5rem;
            background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
            background-size: 1.25rem;
            background-position: 0.75rem center;
            background-repeat: no-repeat;
        }

        input::placeholder {
            color: #6c757d;
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


@section('content')

    <div class="svg-header">
        <h1>Stand Booth MUSKOMWIL IV APEKSI Kota Kediri 2025</h1>
    </div>

    <div class="container section-title" style="margin-top: -70px;">
        <h2>Daftar Stand</h2>
        <p class="text-muted">Temukan berbagai stand dari delegasi kota dan UMKM unggulan.</p>
    </div>

    <div class="container-fluid py-5" id="stand-booth-section" style="margin-top: -50px;">
        <div class="container">
            <div class="table-card p-3">
                @include('layouts.breadcrumb', [
                    'titlemenu' => $breadcrumb['titlemenu'],
                    'titlepage' => $breadcrumb['titlepage'],
                    'detailpage' => $breadcrumb['detailpage'] ?? false,
                ])

                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <input type="text" id="liveSearch" class="form-control form-control-lg shadow-sm rounded-pill"
                            placeholder="Cari stand, nama, produk...">
                    </div>
                </div>

                <div id="standResults">
                    @include('home.standbooth._table', ['data' => $standBooth])
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('#liveSearch').on('keyup', function() {
            let query = $(this).val();

            $.ajax({
                url: '{{ route('standbooth.search') }}',
                data: {
                    q: query,
                    limit: 5
                },
                success: function(res) {
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
                        html =
                            `<div class="text-center text-muted py-4">Tidak ada hasil ditemukan</div>`;
                    }

                    $('#standResults').html(html);
                }
            });
        });
    </script>
@endpush
