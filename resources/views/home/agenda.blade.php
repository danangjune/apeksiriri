<div class="my-5 container" style="background: url({{ asset('assets/images/patren.png') }}) no-repeat center center /cover">
  <h4 class="mb-5 fw-bold border-bottom title-border">Seru-seruan di Kota Kediri : Konser, Festival & Event Pilihan</h4>
  <div class="row pb-5">
    <div class="col-md-6 mb-5">
      <div id="calendar" class="mb-5"></div>
      <!-- <hr>
      <div id="event-card-container"></div> -->
    </div>
    <div class="col-md-6 mb-5" style="margin-top: -50px;">
      <img src="{{ asset('assets/images/agenda_header2.gif') }}" alt="" width="100%">
      <div id="event-card-container"></div>
    </div>
    <!-- <div class="col-md-6">
      <div class="card mb-3 border-0 bg-primary-subtle" style="min-height: 600px;">
        <div class="card-body" style="max-height: 600px; overflow-y: auto;">
          <h5 class="fw-bolder text-secondary">Agenda Pemerintah</h5>
          <hr>
          @if (isset($agenda_pemerintah->data))
            @foreach ($agenda_pemerintah->data as $item)
              <a href="#" class=" d-flex text-decoration-none">
                <div class="flex-shrink-0">
                  <img src="{{ asset('storage/agenda/schedule.png') }}" style="width: 60px; height: 60px; radius:50%;" class="object-fit-cover rounded" alt="{{ $item->nama }}" loading="lazy" />
                </div>
                <div class="flex-grow-1 ms-3">
                  <p class="text-secondary fw-bold">{{ $item->nama }}</p>
                  <small class="d-block text-muted"><i class="bi bi-calendar3 me-2"></i>{{ \Carbon\Carbon::parse($item->tgl_kegiatan)->locale('id')->isoFormat('D MMMM Y') }} - {{ \Carbon\Carbon::parse($item->tgl_akhir)->locale('id')->isoFormat('D MMMM Y') }}</small>
                  <small class="d-block text-muted"><i class="bi bi-geo-alt-fill me-2"></i>{{ $item->tempat }} </small>
                </div>
              </a>
              <hr>
            @endforeach
          @else
            <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                <img src="{{ asset('assets/images/nodata3.png') }}" alt="" loading="lazy" class="img-fluid" width="60%" style="margin:20px;">
            </div>
          @endif
        </div>
      </div>
    </div> -->
  </div>
</div>


