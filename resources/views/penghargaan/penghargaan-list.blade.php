@if (count($penghargaan_lainnya) > 0)
    @foreach ($penghargaan_lainnya as $phglain)
        <div id="kelurahan-content" onclick="window.location.href='{{ route('detil_penghargaan', ['slug' => $phglain['slug'], 'id' => $phglain['id']]) }}'" style="cursor: pointer;">
            <div class="card w-100 border-0 card-kelurahan p-2 mb-4">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="col-md-9 text-content flex-grow-1 p-3">
                        <h5><b>{{ $phglain['judul'] }}</b></h5>
                        <h6 class="mt-3">{!! substr(strip_tags($phglain['deskripsi']), 0, 150) !!}</h6>
                        <h6 class="text-end text-secondary">
                            {{ \Carbon\Carbon::parse($phglain['tanggal'])->locale('id')->isoFormat('D MMMM Y') }}
                        </h6>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ $phglain['foto_url'] }}" class="img-fluid rounded-start img-thumbnail" 
                            style="width: 100%; height: 150px; object-fit: cover;" 
                            alt="{{ $phglain['judul'] }}" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Tambahkan pagination -->
    <div class="mt-5" id="pagination-links">
        {!! $penghargaan_lainnya->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@else
<div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
    <img src="{{ asset('assets/images/nodata3.png') }}" alt="Penghargaan Kota Kediri" loading="lazy" class="img-fluid" width="50%" style="margin:20px;">
</div>
@endif
