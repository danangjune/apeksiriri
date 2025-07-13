@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
<div class="min-vh-50">
    <section id="about" class="about pt-0 position-relative">
        <div class="header-waves header-kelurahan">
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
        <div class="my-5 container">
            @include('layouts.breadcrumb', ['titlemenu' => $breadcrumb['titlemenu'], 'titlepage' => $breadcrumb['titlepage'], 'detailpage' => $breadcrumb['detailpage'] ?? false])
            <div class="profil-content">
                @if (empty($data) || $data['content'] == null)
                    @if(!empty($program))
                        @foreach ($program as $pro)
                        <div class="card border-0 mb-4">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td class="program-unggulan-image" style="vertical-align: center;">
                                            <img src="{{ $pro['gambar'] }}" alt="{{ $pro['judul'] }}" loading="lazy" class="w-100 rounded" width="100%">
                                        </td>
                                        <td style="vertical-align: top; display: flex; flex-direction: column; height: 100%;">
                                            <div style="flex-direction: column; flex-grow: 1;">
                                                <h5 class="judul-program">
                                                    <a href="/program-unggulan/{{ $pro['id'] }}">{{ $pro['judul'] }}</a>
                                                </h5>
                                                <h6 class="program-desc">
                                                    {!! strlen(strip_tags($pro['deskripsi'], '<p><a><br>')) > 350 
                                                        ? substr(strip_tags($pro['deskripsi'], '<p><a><br>'), 0, 350) . '...' 
                                                        : strip_tags($pro['deskripsi'], '<p><a><br>') !!}
                                                </h6>
                                                <h6 class="program-calender" style="margin-top: 40px; text-align: right;">
                                                    <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($pro['created_at'])->locale('id')->isoFormat('D MMMM Y') }}
                                                </h6>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endforeach
                        {!! $program->withQueryString()->links('pagination::bootstrap-5') !!}
                    @elseif(!empty($kecamatan))
                    <div class="row">
                        <div class="col-lg-3 col-12 me-4 mb-4">
                            <div class="card w-100 border-1 card-kecamatan">
                                <div class="card-body p-4">
                                    @foreach ($kecamatan as $kec)
                                    <div class="col-md-12 mb-3">
                                        <button class="btn btn-kecamatan w-100" onclick="getKelurahan('{{ $kec['kd_kecamatan'] }}');">
                                            <span>{{ $kec['nm_kecamatan'] }}</span>
                                        </button>                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="card w-100 border-1 card-kecamatan ps-5 pe-5 pt-2 pb-1">
                                <h5 style="color:white;" id="kecamatan">Kec. {{ $kecamatan->first()->nm_kecamatan ?? '' }}</h5>
                            </div>
                            <div id="kelurahan-content">
                                @foreach ($kelurahan as $kel)
                                <div class="card w-100 border-0 mt-3 card-kelurahan ps-5 pe-5 pt-1 pb-1 mb-3">
                                    <table>
                                        <tr>
                                            <td class="pe-3">
                                                <h5 class="text-secondary"><b>{{ $kel['nm_kelurahan'] }}</b></h5>
                                                <h6>Kec. {{ $kel->kecamatan->nm_kecamatan }}, Kota Kediri, Jawa Timur</h6>
                                            </td>
                                            <td class="text-center p-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                @if (!empty($kel['jml_penduduk']))
                                                    <h2 class="text-secondary"><b>{{ $kel['jml_penduduk'] }}</b></h2>
                                                    <h6 class="ms-2" style="text-align: left; color: var(--bs-primary);"><b>Ribu</b><br>Penduduk</h6>
                                                @endif
                                                </div>
                                                @if (!empty($kel['link']))
                                                <button class="btn btn-warning w-100" onclick="window.open('{{ $kel['link'] }}')">
                                                    <span>Kunjungi</span>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                        <img src="{{ asset('assets/images/nodata3.png') }}" alt="" class="img-fluid" width="50%" style="margin:20px;">
                    </div>
                    @endif
                @else
                <p>{!! $data['content'] !!}</p>
                @endif
            </div>
        </div>
    </section>
</div>
<script>
    function getKelurahan(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('/get-kelurahan') }}/" + id,
            dataType: 'json',
            success: function(response) {
                var kelurahanHtml = '';
                if (response.length > 0) {
                    const kecamatanName = response[0]?.kecamatan?.nm_kecamatan || 'Unknown Kecamatan';
                    $("#kecamatan").html("Kec. " + kecamatanName);

                    response.forEach(function(kel) {
                        kelurahanHtml += `
                            <div class="card border-0 mt-3 card-kelurahan ps-5 pe-5 pt-1 pb-1 mb-3">
                                <table>
                                    <tr>
                                        <td class="pe-3">
                                            <h5 style="color: var(--bs-primary);"><b>${kel.nm_kelurahan}</b></h5>
                                            <h6 style="color: var(--bs-primary);">${kel.kecamatan?.nm_kecamatan || 'Unknown Kecamatan'}, Kota Kediri, Jawa Timur</h6>
                                        </td>
                                        <td class="text-center p-2">
                                            <div class="d-flex align-items-center justify-content-center">
                                                ${kel.jml_penduduk 
                                                    ? `<h2 class="text-secondary"><b>${kel.jml_penduduk}</b></h2>
                                                    <h6 class="ms-2" style="text-align: left; color: var(--bs-primary);">
                                                        <b>Ribu</b><br>Penduduk
                                                    </h6>` 
                                                    : ''
                                                }
                                            </div>
                                            ${kel.link != null 
                                                ? `<button class="btn btn-warning w-100" onclick="window.open('${kel.link}')">
                                                    <span>Kunjungi</span>
                                                </button>`
                                                : ''}
                                        </td>
                                    </tr>
                                </table>
                            </div>`;
                    });
                } else {
                    kelurahanHtml = `<div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                        <img src="{{ asset('assets/images/nodata3.png') }}" alt="" class="img-fluid" width="50%" style="margin:20px;">
                    </div>`;
                }

                $("#kelurahan-content").html(kelurahanHtml);
            }

        });
    }
</script>

<script>
    function setActive(element) {
        document.querySelectorAll('.btn-kecamatan').forEach(btn => btn.classList.remove('active'));
        element.classList.add('active');
    }
</script>
@endsection
