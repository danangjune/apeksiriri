@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-dokumen">
            <div class="inner-header flex"></div>
            <div>
              <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                </g>
              </svg>
            </div>
        </div>
    </section>
    <div class="my-5 container">
        @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
        <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row mt-4">
            <h2 class="mb-3 fw-bold border-bottom title-border">Dokumen Laporan dan Regulasi</h2>
        </div>
        <div class="galeri">
            @if ($files->isEmpty())
                <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                    <img src="{{ asset('assets/images/nodata3.png') }}" alt="" loading="lazy" class="img-fluid" width="50%" style="margin:20px;">
                </div>
            @else
           <div class="card-body">
                <div class="table-responsive table-dokumen">
                    <table class="col-lg-12">
                    <tr class="bg-primary-subtle" height="50px">
                                    <td width="8%" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;"></td>
                                    <td width="5%" class="text-center">No</td>
                                    <td width="60%">Nama File</td>
                                    <td class="text-center">Tanggal Upload</td>
                                    <td style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"></td>
                                </tr>
                                @php $no = 1 @endphp
                                @foreach ($files as $file)
                                <tr style="height: 60px">
                                    <td class="text-center fs-2 text-secondary fw-bold"><i class="bi bi-folder"></i></td>
                                    <td class="text-center text-secondary fw-bold">{{ $no++ }}</td>
                                    <td class="text-secondary fw-bold">{{ $file['dokumen'] }}</td>
                                    <td class="text-center text-secondary fw-bold">{{ $file['tanggal'] }}</td>
                                    <td class="text-left">
                                        <button 
                                            onclick="window.open('{{ Str::startsWith($file['dokumen'], 'http') ? $file['dokumen'] : asset('dokumen/' . $file['dokumen']) }}', '_blank')"
                                            class="btn btn-warning">
                                            Download
                                        </button>
                                    </td>
                                    {{-- <td class="text-left"><button  onclick="location.href='/dokumen/{{ $file['dokumen'] }}'" class="btn btn-secondary">Download</button></td> --}}
                                </tr>
                                @endforeach
                              
                    </table>
                            
                </div>
            </div>
            {!! $files->withQueryString()->links('pagination::bootstrap-5') !!}
            @endif
        </div>
    </div>
</div>

@endsection
