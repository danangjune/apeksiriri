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
                    <li class="breadcrumb-item"><a href="#">Profil Kota</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ empty($title['namaLink']) ? '' : $title['namaLink'] }}</li>
                </ol>
            </nav>
            <div class="profil-content">
                <h4 class="mt-5 mb-5 fw-bold border-bottom title-border">{{ $program['judul'] }}</h4>
                <div class="col-lg-12 justify-content-center" style="margin-bottom:100px;">
                    {!! $program['deskripsi'] !!}
                </div>
                <div class="text-center mt-5">
                  <button class="btn btn-lg btn-secondary"  onclick="window.history.back();">Kembali</button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection