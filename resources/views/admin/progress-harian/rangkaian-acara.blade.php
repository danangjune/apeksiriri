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
                            <button type="button" class="btn btn-primary mb-2" id="btnTambah">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <div class="table-responsive">
                                <table id="table" class="table table-bordered table-striped" style="width: 100%;">
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
    </div>


    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmSubmit" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" required />
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal" required />
                    </div>
                    <div class="form-group">
                        <label>Sampai</label>
                        <input type="date" class="form-control sampai" name="sampai" required />
                    </div>
                    <div class="form-group">
                        <label>OPD</label>
                        <input type="text" class="form-control opd" name="opd" />
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
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


                $("#btnTambah").on("click", function() {
                    new bootstrap.Modal($("#modalTambah")).show();
                    $(".modal-title").html("Tambah Rangkaian Kegiatan");
                    $('#frmSubmit')[0].reset();
                });

                $("#btnSimpan").on("click", function() {
                    $('#frmSubmit').attr("action", "{{ url('store-rangkaian-acara') }}");
                    $('#frmSubmit').submit();
                });

                $('body').on('click', '.btn-edit', function() {
                    new bootstrap.Modal($("#modalTambah")).show();
                    $(".modal-title").html("Edit Rangkaian Kegiatan");
                    var table = $('#table').DataTable();
                    var data = table.row($(this).parents('tr')).data();
                    $(".nama").val(data.nama);
                    $(".tanggal").val(data.tanggal);
                    $(".sampai").val(data.sampai);
                    $(".opd").val(data.opd);
                    $("#frmSubmit").attr("action", "{{ url('update-rangkaian-acara') }}" + "/" + data.id);
                });

                $('body').on('click', '.btn-hapus', function() {
                    var table = $('#table').DataTable();
                    var data = table.row($(this).parents('tr')).data();
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
                            $("#frmDelete").attr("action", "{{ url('del-rangkaian-acara') }}" + "/" + data.id);
                            $('#frmDelete').submit();
                        }
                    });
                });

            });
        </script>
    @endpush

@endsection
