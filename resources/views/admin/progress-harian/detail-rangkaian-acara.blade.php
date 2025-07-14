@extends('admin.layouts.app')

@section('title', 'Progress Harian')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Home</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Progress Harian</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Rangkaian Acara</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="margin-top:20px;">
                        <div class="card-body" style="margin-top:20px;">
                            <h5>{{ $rangkaianAcara->nama }}</h5>
                            <p><i class="fa fa-user"></i> {{ $rangkaianAcara->opd }}<br />
                                <i class="fa fa-calendar"></i>
                                @if ($rangkaianAcara->tanggal == $rangkaianAcara->sampai)
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($rangkaianAcara->tanggal) }}
                                @else
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($rangkaianAcara->tanggal, $rangkaianAcara->sampai) }}
                                @endif
                                <br />
                            </p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Kegiatan</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Mulai</th>
                                            <th class="text-center">Selesai</th>
                                            <th class="text-center">Progress</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('datatable')
        <script type="text/javascript">
            $(function() {
                var table = $('.table-bordered').DataTable({
                    ajax: {
                        url: "{{ route('detail-rangkaian-acara', $rangkaianAcara->id) }}",
                        type: "GET",
                        dataSrc: function(json) {
                            console.log(json); // Debug respons di konsol
                            return json.data; // Pastikan ini sesuai dengan struktur respons JSON
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            className: 'text-center',
                            width: '10%'
                        },
                        {
                            data: 'kegiatan',
                            name: 'kegiatan'
                        },
                        {
                            data: 'tanggal_kegiatan',
                            name: 'tanggal_kegiatan'
                        },
                        {
                            data: 'mulai',
                            name: 'mulai'
                        },
                        {
                            data: 'selesai',
                            name: 'selesai'
                        },
                        {
                            data: 'progress_persen',
                            name: 'progress_persen'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            className: 'text-center'
                        },
                    ]
                });

            });
        </script>
    @endpush

@endsection
