@if ($albums->isEmpty())
    <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
        <img src="{{ asset('assets/images/nodata3.png') }}" alt="" loading="lazy" class="img-fluid" width="50%" style="margin:20px;">
    </div>
@else
    <div class="grid-container">
        @foreach ($albums as $item)
            <div class="grid-item border border-primary rounded px-3 hover-effect">
                <div class="img-galeri p-2 mt-3">
                    @php
                        $fotoPertama = $item->foto->first();
                        $src = $fotoPertama
                            ? (Str::startsWith($fotoPertama->foto, 'http') ? $fotoPertama->foto : asset('storage/galeri/' . $fotoPertama->foto))
                            : asset('assets/images/nodata3.png'); // fallback gambar default
                    @endphp

                    <img src="{{ $src }}" alt="{{ $item->judul }}" class="img-fluid">
                </div>
                <h6 class="m-2 fw-bolder text-capitalize">{{ $item->judul }}</h6>
                @php
                    $fotoPertama = $item->foto->first();
                    $src = $fotoPertama
                        ? (Str::startsWith($fotoPertama->foto, 'http') ? $fotoPertama->foto : asset('storage/galeri/' . $fotoPertama->foto))
                        : asset('assets/images/nodata3.png'); // fallback ke gambar default
                @endphp

                <a href="{{ $fotoPertama ? $src : '#' }}"
                    class="glightbox text-decoration-none btn btn-warning fs-6 m-2 px-4 {{ $fotoPertama ? '' : 'disabled' }}"
                    data-gallery="galeri-{{ $item->id }}"
                    data-title="{{ $item->judul }}">
                    <i class="bi bi-eye"></i> Lihat
                </a>

                @foreach ($item->foto->skip(1) as $foto)
                <a href="{{ Str::startsWith($foto->foto, 'http') ? $foto->foto : asset('storage/galeri/' . $foto->foto) }}" class="glightbox"
                   data-gallery="galeri-{{ $item->id }}" data-title="{{ $foto->nama_foto }}"
                   style="display: none;"></a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {!! $albums->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endif