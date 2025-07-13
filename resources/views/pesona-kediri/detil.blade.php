@extends('layouts.app')

@section('title', $meta['title'])
@section('meta_description', $meta['description'])

@section('content')
<div class="min-vh-50">
    <div class="hero-detail hero-detil-wisata w-100 position-relative text-center text-white p-5">
        <h1 class="fw-bold display-5 text-uppercase p-5 mt-5" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
            {{ empty($wisata) ? '' : $wisata['nama'] }}
        </h1>
    </div>
</div>

<div class="card-hero-fasilitas p-4 shadow-sm">
    @if (!empty($wisata['gambar']))
        <div class="text-center my-3 mt-5 mb-5">
            <img src="{{ !empty($wisata['gambar']) ? (Str::startsWith($wisata['gambar'], 'http') ? $wisata['gambar'] : asset('storage/aset/' . $wisata['gambar'])) : asset('assets/images/announ.jpg') }}" 
                alt="{{ $wisata['deskripsi'] }}" 
                loading="lazy"
                class="img-fluid rounded" 
                style="max-height: 300px; object-fit: cover;">
        </div>
    @endif

    <p>
        {!! empty($wisata) ? '' : $wisata['deskripsi'] !!}
    </p>
    <div class="text-center mt-4">
        <button onclick="window.history.back()" class="btn btn-secondary">
            Kembali
        </button>
    </div>
</div>

@endsection