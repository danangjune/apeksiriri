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
                        <a href="#">Data PIC</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data PIC</a>
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
                                <table class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Kontak</th>
                                            <th class="text-center">Kota</th>
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
                        <label>Jenis</label>
                        <select class="custom-select jenis-select2" style="width: 100%;" name="jenis">
                            @for ($i = 0; $i < count($jenis); $i++)
                                <option value="{{ $jenis[$i] }}">{{ $jenis[$i] }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" required />
                    </div>
                    <div class="form-group">
                        <label>Kontak</label>
                        <input type="tel" class="form-control contact" name="contact" required />
                    </div>
                    <div class="form-group">
                        <label>Kota</label>
                        <input type="text" class="form-control kota" name="kota" required />
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
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
            $(document).ready(function() {
                $('.jenis-select2').select2({
                    placeholder: "Select Jenis",
                    allowClear: true,
                    dropdownParent: $('#modalTambah')
                });
            });

            $(function() {
                var table = $('.table-bordered').DataTable({
                    ajax: {
                        url: "{{ route('data-pic') }}",
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
                            data: 'jenis',
                            name: 'jenis'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'contact',
                            name: 'contact'
                        },
                        {
                            data: 'kota',
                            name: 'kota'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            className: 'text-center'
                        },
                    ]
                });

            });

            $("#btnTambah").on("click", function() {
                new bootstrap.Modal($("#modalTambah")).show();
                $(".modal-title").html("Tambah PIC");
                $("#frmSubmit").attr("action", "{{ url('store-pic') }}");
            });

            $("#btnSave").on("click", function() {
                Swal.fire({
                    title: 'Konfirmasi Penyimpanan Link',
                    confirmButtonText: 'Ya Simpan',
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#frmSubmit').submit();
                    }
                });
            });

            $('body').on('click', '.btn-hapus', function() {
                var table = $('.table').DataTable();
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
                        $("#frmDelete").attr("action", "{{ url('delete-pic') }}" + "/" + data.id);
                        $('#frmDelete').submit();
                    }
                });
            });

            $('body').on('click', '.btn-edit', function() {
                new bootstrap.Modal($("#modalTambah")).show();
                $(".modal-title").html("Edit PIC");
                var table = $('.table').DataTable();
                var data = table.row($(this).parents('tr')).data();
                $(".nama").val(data.nama);
                $(".jenis_select2").val(data.jenis);
                $(".contact").val(data.contact);
                $(".kota").val(data.kota);
                $("#frmSubmit").attr("action", "{{ url('update-pic') }}" + "/" + data.id);
            });
        </script>
    @endpush

@endsection
