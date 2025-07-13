<div class="my-5 container">
    <div class="label-container d-flex align-items-center justify-content-between flex-column flex-md-row">
        <h4 class="mb-3 fw-bold border-bottom title-border">Dokumen Publik</h4>
    </div>
    <div class="row g-3"> 
        @foreach ($dokumen as $doc)
            <div class="col-md-3">
                <div class="p-3 bg-light border text-center rounded" style="height: 200px">
                    <div class="rounded py-2 h-100">
                        <img src="{{ asset('assets/images/file.png')}}" alt="Dokumen {{ $doc['judul'] }}" loading="lazy" class="w-25">
                        <h6 class="mt-2">{{ $doc['judul']}}</h6>
                        <button 
                        onclick="window.open('{{ Str::startsWith($doc['dokumen'], 'http') ? $doc['dokumen'] : asset('dokumen/' . $doc['dokumen']) }}', '_blank')"
                        class="btn btn-primary btn-sm">
                        Download
                        </button>
                    </div>
        
                </div>
            </div>
        @endforeach
        <!-- Tombol Lihat Selengkapnya -->
        <div class="mt-4 pb-1 text-center">
            <a href="/dokumen" class="btn btn-outline-primary">
              <span>Lihat Selengkapnya</span>
              <i class="bi bi-arrow-right"></i>
            </a>        
          </div>
    </div>
  </div>