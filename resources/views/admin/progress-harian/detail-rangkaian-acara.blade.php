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
                            <p><i class="fa fa-calendar"></i>
                                @if ($rangkaianAcara->tanggal == $rangkaianAcara->sampai)
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($rangkaianAcara->tanggal) }}
                                @else
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($rangkaianAcara->tanggal, $rangkaianAcara->sampai) }}
                                @endif
                                <br />
                            </p>
                            <div class="table-responsive">
                                <button type="button" class="btn btn-primary mb-2" id="btnTambah">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                                <table id="table" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Acara</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Mulai</th>
                                            <th class="text-center">Selesai</th>
                                            <th class="text-center">Lokasi/Rute</th>
                                            <th class="text-center">Uraian</th>
                                            <th class="text-center">Perlengkapan</th>
                                            <th class="text-center">Catatan</th>
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

    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmSubmit" method="post">
                    @csrf
                    <input type="hidden" name="rangkaian_acara_id" value="{{ $rangkaianAcara->id }}">
                    <div class="form-group">
                        <label>Acara</label>
                        <input type="text" class="form-control kegiatan" name="kegiatan" required />
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal" required />
                    </div>
                    <div class="form-group">
                        <label>Mulai</label>
                        <input type="time" class="form-control mulai" name="mulai" required />
                    </div>
                    <div class="form-group">
                        <label>Selesai</label>
                        <input type="time" class="form-control selesai" name="selesai" required />
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" class="form-control lokasi" name="lokasi" required />
                    </div>
                    <div class="form-group">
                        <label>Uraian</label>
                        <textarea name="uraian" class="form-control uraian" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Perlengkapan</label>
                        <textarea name="perlengkapan" class="form-control perlengkapan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" class="form-control catatan"></textarea>
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
                            data: 'lokasi',
                            name: 'lokasi'
                        },
                        {
                            data: 'uraian',
                            name: 'uraian'
                        },
                        {
                            data: 'perlengkapan',
                            name: 'perlengkapan'
                        },
                        {
                            data: 'catatan',
                            name: 'catatan'
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


                $("#btnTambah").on("click", function() {
                    new bootstrap.Modal($("#modalTambah")).show();
                    $(".modal-title").html("Tambah Detail Rangkaian Kegiatan");
                    $('#frmSubmit')[0].reset();
                });

                $("#btnSimpan").on("click", function() {
                    $('#frmSubmit').attr("action", "{{ url('store-det-rangkaian-acara') }}");
                    $('#frmSubmit').submit();
                });

                $('body').on('click', '.btn-edit', function() {
                    new bootstrap.Modal($("#modalTambah")).show();
                    $(".modal-title").html("Edit Detail Rangkaian Kegiatan");
                    var table = $('#table').DataTable();
                    var data = table.row($(this).parents('tr')).data();
                    console.log(data);
                    $(".kegiatan").val(data.kegiatan);
                    $(".tanggal").val(data.tanggal);
                    $(".mulai").val(data.mulai);
                    $(".selesai").val(data.selesai);
                    $(".uraian").val(data.uraian);
                    $(".lokasi").val(data.lokasi);
                    $(".perlengkapan").val(data.perlengkapan);
                    $(".catatan").val(data.catatan);
                    $("#frmSubmit").attr("action", "{{ url('update-det-rangkaian-acara') }}" + "/" + data.id);
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
                            $("#frmDelete").attr("action", "{{ url('del-det-rangkaian-acara') }}" +
                                "/" + data.id);
                            $('#frmDelete').submit();
                        }
                    });
                });

            });
        </script>
    @endpush

@endsection
