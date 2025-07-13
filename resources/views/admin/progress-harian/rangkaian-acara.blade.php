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
                        <a href="#">Rangkaian Acara</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="margin-top:20px;">
                        <div class="card-body" style="margin-top:20px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tanggal</th>
                                        <th></th>
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

    @push('datatable')
        <script type="text/javascript">
            $(function() {
                var table = $('.table-bordered').DataTable({
                    ajax: {
                        url: "{{ route('rangkaian-acara') }}",
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
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'tanggal_kegiatan',
                            name: 'tanggal_kegiatan'
                        },
                        {
                            data: 'opd',
                            name: 'opd'
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
