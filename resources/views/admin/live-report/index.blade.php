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
                        <a href="#">Live Report</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Live Report</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="margin-top:20px;">
                        <div class="card-body" style="margin-top:20px;">
                            @if ($liveReport == null)
                                <button type="button" class="btn btn-primary mb-2" id="btnTambah">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Link</th>
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

    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('live-report') }}" id="frmSubmit" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control link" name="link" required />
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('datatable')
        <script type="text/javascript">
            $(function() {
                var table = $('.table-bordered').DataTable({
                    ajax: {
                        url: "{{ route('liveReport') }}",
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
                            data: 'link',
                            name: 'link'
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
                $(".modal-title").html("Tambah Link")
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

            $('body').on('click', '.btn-copy', function() {
                var url = $(this).data('url');

                navigator.clipboard.writeText(url).then(() => {
                    Swal.fire({
                        title: "Link berhasil disalin",
                        icon: "success",
                    });
                }).catch(err => {
                    console.error("Copy error:", err);
                });
            });

            $('body').on('click', '.btn-edit', function() {
                new bootstrap.Modal($("#modalTambah")).show();
                $(".modal-title").html("Edit Link");
                var table = $('.table').DataTable();
                var data = table.row($(this).parents('tr')).data();
                $(".link").val(data.link);
            });
        </script>
    @endpush

@endsection
