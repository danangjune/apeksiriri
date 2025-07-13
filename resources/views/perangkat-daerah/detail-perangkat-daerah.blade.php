@extends('layouts.app')

@section('title', $breadcrumb['titlepage'])
@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves">
            <div class="inner-header flex"></div>
            <div>
              <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(148, 117, 117, 0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                </g>
              </svg>
            </div>
        </div>
        <div class="container">
            <div class="card card-hero-pengumuman p-4 shadow-sm">
                @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])

                <div class="text-left my-3">
                    <h4 class="mb-5 fw-bold border-bottom title-border">{{ $opd['nama']}}</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ !empty($opd->pimpinan->foto) ? (Str::startsWith($opd->pimpinan->foto, 'http') ? $opd->pimpinan->foto : asset('storage/pimpinan/' . $opd->pimpinan->foto)) : asset('assets/images/noimage2.png') }}" alt="{{ $opd['nama'] }}" loading="lazy" class="w-100  mx-auto my-auto">
                        </div>
                        <div class="col-md-9">
                            <b class="my-3 fs-5">Profil Pimpinan</b>
                        <table>
                            <tr>
                                <td style="width: 40%">Alamat Kantor</td>
                                <td style="width: 1%">:</td>
                                <td> {{ $opd['alamat']}} </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Nama </td>
                                <td style="width: 1%">:</td>
                                <td> {{ empty($opd->pimpinan) ? '' : $opd->pimpinan->nama_pimpinan }} </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">NIP </td>
                                <td style="width: 1%">:</td>
                                <td> {{ empty($opd->pimpinan) ? '' : $opd->pimpinan->nip }} </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Pangkat </td>
                                <td style="width: 1%">:</td>
                                <td> {{ empty($opd->pimpinan) ? '' : $opd->pimpinan->pangkat }} </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Gol. Ruang </td>
                                <td style="width: 1%">:</td>
                                <td> {{ empty($opd->pimpinan) ? '' : $opd->pimpinan->gol_ruang }} </td>
                            </tr>
                            <tr>
                                <td style="width: 40%">Deskripsi </td>
                                <td style="width: 1%">:</td>
                                <td> {{ empty($opd->pimpinan) ? '' : $opd->pimpinan->deskripsi }} </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
                <p>
                    {!! empty($opd) ? '' : $opd['detail_opd'] !!}
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