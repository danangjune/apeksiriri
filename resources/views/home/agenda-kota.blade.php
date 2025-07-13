<div class="my-5">
  <div class="container">
    <h4 class="mb-5 fw-bold border-bottom title-border">Agenda Kota</h4>
  </div>

  <div style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url({{ asset('assets/images/bg-agenda.png') }}) no-repeat center center /cover;">
    <div class="container py-5">
      <div class="slick-agenda py-5 px-3">
        @foreach ($agenda_masyarakat as $item)
          <!-- <a href="{{ $item['url'] }}" class="text-decoration-none px-2 text-dark" target="_blank" rel="noopener noreferrer"> -->
            <div class="row">
              <div class="col-md-6">
                <img src="{{ asset('storage/agenda/'.$item['cover']) }}" class="img-fluid rounded" alt="{{ $item['title'] }}" loading="lazy" />
              </div>
              <div class="col-md-6">
                <p class="mb-4 text-white">{{ Str::limit($item['title'], 50) }}</p>
                <small class="text-light" style="font-size: .7rem">{{ $item['published_at'] }}</small>
              </div>
            </div>
          <!-- </a> -->
        @endforeach
      </div>
    </div>
  </div>
</div>