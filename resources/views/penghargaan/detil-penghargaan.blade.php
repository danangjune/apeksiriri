@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <div class="hero-detail hero-detil-penghargaan w-100 position-relative text-center text-white p-5">
        <h1 class="fw-bold display-5 text-uppercase mt-5" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.3);">
            {{ empty($penghargaan) ? '' : $penghargaan['judul'] }}
        </h1>
        <p class="text-center mt-2 fs-5 fw-medium">
            <i class="bi bi-calendar2-week-fill"></i> {{ \Carbon\Carbon::parse($penghargaan['tanggal'])->locale('id')->isoFormat('D MMMM Y') }} | <i class="bi bi-eye-fill ms-1 me-1"></i> {{ $penghargaan['count_view'] }} Views
        </p>
    </div>
    <section id="about" class="about pt-0 position-relative" style="margin-top:100px">
        <div class="my-5 container">
            <div class="card card-hero-pengumuman p-4 shadow-sm">
                @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
                <!-- <h3 class="text-center fw-bold">{{ empty($penghargaan) ? '' : $penghargaan['judul'] }}</h3> -->
                @if (!empty($penghargaan['foto']))
                <div class="text-center my-3 mt-5 mb-5">
                    <img src="{{ !empty($penghargaan['foto']) ? (Str::startsWith($penghargaan['foto'], 'http') ? $penghargaan['foto'] : asset('storage/penghargaan/' . $penghargaan['foto'])) : asset('assets/images/piala.png') }}" 
                        alt="{{ $penghargaan['judul'] }}" loading="lazy" 
                        class="img-fluid rounded">
                </div>
                @endif
                <p>
                    {!! empty($penghargaan) ? '' : $penghargaan['deskripsi'] !!}
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