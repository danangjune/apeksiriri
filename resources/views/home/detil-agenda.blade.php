@extends('layouts.app')

@section('title', empty($title['namaLink']) ? '' : $title['namaLink'])

@section('content')

<div class="min-vh-50">
    <div class="hero w-100 position-relative text-center text-white p-5">
      <h1 class="display-4 fw-semibold">{{ empty($title['namaLink']) ? '' : $title['namaLink'] }}</h1>
    </div>
    <section id="about" class="about pt-0 position-relative" style="margin-top:100px">
        <div class="my-5 container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door-fill"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ empty($title['namaLink']) ? '' : $title['namaLink'] }}</li>
                </ol>
            </nav>
            <div class="profil-content">
                <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">{{ $agenda[0]->nama }}</h4>
                <div class="col-lg-12 justify-content-center" style="margin-bottom:100px;">
                    {{ $agenda[0]->deskripsi }}<br><br>

                    @if(isset($agenda[0]))
                    <table>
                        <tr>
                            <td><p>Tanggal Kegiatan</p></td>
                            <td><p class="ms-4 me-3">:</p></td>
                            <td><p>{{ \Carbon\Carbon::parse($agenda[0]->tgl_kegiatan)->isoFormat('D MMMM Y') }} s/d {{ \Carbon\Carbon::parse($agenda[0]->tgl_akhir)->isoFormat('D MMMM Y') }}</p></td>
                        </tr>
                        <tr>
                            <td><p>Waktu Kegiatan</p></td>
                            <td><p class="ms-4 me-3">:</p></td>
                            <td><p>{{ $agenda[0]->waktu_kegiatan == '' && $agenda[0]->waktu_kegiatan == null ? '-' :  $agenda[0]->waktu_kegiatan }} </p></td>
                        </tr>
                        <tr>
                            <td><p>Tempat Kegiatan</p></td>
                            <td><p class="ms-4 me-3">:</p></td>
                            <td><p>{{ $agenda[0]->tempat == '' && $agenda[0]->tempat == null ? '-' :  $agenda[0]->tempat }}</p></td>
                        </tr>
                        <tr>
                            <td><p>Narasumber</p></td>
                            <td><p class="ms-4 me-3">:</p></td>
                            <td><p>{{ $agenda[0]->narasumber == '' && $agenda[0]->narasumber == null ? '-' :  $agenda[0]->narasumber }}</p></td>
                        </tr>
                        <tr>
                            <td><p>Peserta</p></td>
                            <td><p class="ms-4 me-3">:</p></td>
                            <td><p>{{ $agenda[0]->peserta == '' && $agenda[0]->peserta == null ? '-' :  $agenda[0]->peserta }}</p></td>
                        </tr>
                    </table>
                    @endif
                </div>
                <div class="text-center mt-5">
                  <button class="btn btn-lg btn-secondary"  onclick="window.history.back();">Kembali</button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection