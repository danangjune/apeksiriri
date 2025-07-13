@extends('layouts.app')

@section('title', 'Pemerintah Kota Kediri')

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative" style="margin-top:100px">
        <div class="my-5 container">
            <div class="profil-content">
                <div class="row col-lg-12">
                    <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px; margin-top:100px;">
                        <img src="{{ asset('assets/images/404.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-secondary text-white w-50" onclick="location.href='/'">
                            <span>Kembali Ke Beranda</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection