@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <div class="hero-detail hero-detil-pengumuman w-100 position-relative text-center text-white p-5">
        <h1 class="fw-bold text-uppercase p-5 mt-5" 
            style="font-size: 2rem; text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
            {{ empty($pengumuman) ? '' : $pengumuman['judul'] }}
        </h1>
        <p class="text-center fs-5 fw-medium">
            <i class="bi bi-calendar2-week-fill"></i> {{ \Carbon\Carbon::parse($pengumuman['tanggal'])->locale('id')->isoFormat('D MMMM Y') }} | <i class="bi bi-eye-fill ms-1 me-1"></i> {{ $pengumuman['count_view'] }} Views
        </p>
    </div>
    <section id="about" class="about pt-0 position-relative" style="margin-top:100px">
        <div class="my-5 container">
            <div class="card card-hero-pengumuman p-4 shadow-sm">
                @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
                <!-- <h3 class="text-center fw-bold">{{ empty($pengumuman) ? '' : $pengumuman['judul'] }}</h3> -->
                @if (!empty($pengumuman['gambar']))
                <div class="text-center my-3 mt-5 mb-5">
                    <img src="{{ !empty($pengumuman['gambar']) ? (Str::startsWith($pengumuman['gambar'], 'http') ? $pengumuman['gambar'] : asset('storage/pengumuman/' . $pengumuman['gambar'])) : asset('assets/images/announ.jpg') }}" 
                        alt="{{ $pengumuman['judul'] }}" loading="lazy" 
                        class="img-fluid rounded" 
                        style="max-height: 300px; object-fit: cover;">
                </div>
                @endif
                <p>
                    {!! empty($pengumuman) ? '' : $pengumuman['deskripsi'] !!}
                </p>
                <div class="text-center mt-4">
                    <button onclick="window.history.back()" class="btn btn-secondary">
                        Kembali
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection