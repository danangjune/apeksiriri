@extends('admin.layouts.app')

@section('title', 'Progress Harian')

@section('content')

    <style>
        .progress-container {
            margin-bottom: 0px;
        }

        input[type="range"] {
            width: 100%;
        }

        .progress-output {
            margin-top: 10px;
            font-size: 18px;
        }
    </style>

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
                        <a href="#">Progress Harian</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="margin-top:20px;">
                        <div class="card-body" style="margin-top:20px;">
                            <h5>{{ $rangkaianAcara->kegiatan }}</h5>
                            <p>{{ $rangkaianAcara->rangkaianAcara->nama }}</p>
                            <p><i class="fa fa-calendar"></i>
                                {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($rangkaianAcara->tanggal) }}<br />
                                <i class="fa fa-clock"></i> {{ $rangkaianAcara->mulai . ' - ' . $rangkaianAcara->selesai }}
                            </p>
                            <div class="row justify-content-end mb-3">
                                <div>
                                    <button type="button" class="btn btn-primary" id="btnTambah">
                                        <i class="fa fa-plus"></i> Tambah Progress
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Keterangan</th>
                                            <th class="text-center">Progress % </th>
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

    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Progress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('store-progress') }}" id="frmSubmit" method="post">
                    @csrf
                    <div id="loadIDRangkaianAcara"></div>
                    <div class="progress-container form-group">
                        <label for="progress">Progress (%)</label>
                        <input type="range" id="progress" name="progress" min="0" max="100" value="50"
                            oninput="updateOutput(this.value)">
                        <div>Total : <span class="progress-output">50%</span></div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnSaveProgress">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <form method="post" id="frmDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('datatable')
        <script type="text/javascript">
            function updateOutput(value) {
                document.querySelector('.progress-output').textContent = value + '%';
            }

            $("#btnTambah").on("click", function() {
                new bootstrap.Modal($("#modalTambah")).show();
            });

            $("#btnSaveProgress").on("click", function() {
                Swal.fire({
                    title: 'Konfirmasi Penyimpanan Progress',
                    confirmButtonText: 'Ya Simpan',
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#loadIDRangkaianAcara").append(
                            '<input type="hidden" name="detail_rangkaian_acara_id" value="{{ $rangkaianAcara->id }}" />'
                            );
                        $('#frmSubmit').submit();
                    }
                });
            });

            function deleteProgress(id) {
                Swal.fire({
                    title: 'Konfirmasi Penghapusan Data',
                    confirmButtonText: 'Ya Hapus',
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#frmDelete").attr("action", "{{ url('del-progress') }}" + "/" + id);
                        $("#frmDelete").submit();
                    }
                });
            }

            $(function() {
                var table = $('.table-bordered').DataTable({
                    ajax: {
                        url: "{{ route('histori-progress', $rangkaianAcara->id) }}",
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
                            data: 'keterangan',
                            name: 'keterangan'
                        },
                        {
                            data: 'progress',
                            name: 'progress'
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
