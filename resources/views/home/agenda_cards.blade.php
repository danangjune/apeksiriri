@if (count($events) > 0)
<div class="event-list" style="width:100%; height:390px; overflow-y:scroll; scrollbar-width:none;">
@foreach ($events as $event)
<div class="box m-auto">
    <div class="ribbon ribbon-top-right"><span>{{ \Carbon\Carbon::parse($event['tanggal_mulai'])->locale('id')->isoFormat('D MMM') }}</span></div>
    <table style="width: 100%; position: relative;">
    <tr>
        <td class="w-25 m-auto" style="vertical-align: top; padding: 10px;">
            <img src="{{ asset('storage/acara/' . $event['banner']) }}" alt="{{ $event['judul_acara'] }}"  loading="lazy" class="table-image" style="border-radius: 5px;" />
        </td>
        <td style="vertical-align: top; padding: 10px; position: relative;">
            <h5 class="judul-agenda fw-bold mb-3">{{ $event['judul_acara'] }}</h5>

            <p class="agenda-tanggal">
                <i class="bi bi-calendar3 me-2"></i>
                {{ \Carbon\Carbon::parse($event['tanggal_mulai'])->locale('id')->isoFormat('D MMMM Y') }} - 
                {{ \Carbon\Carbon::parse($event['tanggal_selesai'])->locale('id')->isoFormat('D MMMM Y') }}
            </p>

            <!-- Jam dan Lokasi dalam satu baris -->
            <div class="d-flex align-items-center gap-3">
                <p class="agenda-desc mb-0">
                    <i class="bi bi-alarm-fill me-2"></i>
                    {{ \Carbon\Carbon::parse($event['tanggal_mulai'])->locale('id')->isoFormat('HH:mm') }} - 
                    {{ \Carbon\Carbon::parse($event['tanggal_selesai'])->locale('id')->isoFormat('HH:mm') }}
                </p>

                <p class="agenda-desc mb-0">
                    <i class="bi bi-geo-alt-fill me-2"></i>
                    <a href="{{ $event['maps_lokasi'] }}" target="_blank">{{ $event['lokasi_acara'] }}</a>
                </p>
            </div>

            <!-- Tombol di pojok kanan bawah -->
            <div style="position: absolute; left: 10px;">
                <a href="#" class="btn btn-primary text-white mt-2 open-modal" data-id="{{ $event['id'] }}" data-bs-toggle="modal" data-bs-target="#agendaModal">
                    Selengkapnya
                </a>
            </div>
        </td>
    </tr>
    </table>
</div>
<hr>
@endforeach
</div>
@else
<div class="col-lg-12 d-flex justify-content-center">
    <img src="{{ asset('assets/images/nodata3.png') }}" alt="" class="img-fluid" width="75%">
</div>
@endif


<div class="modal fade" id="agendaModal" tabindex="-1" role="dialog" aria-labelledby="agendaModalLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="modal-content">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.open-modal').forEach(button => {
      button.addEventListener('click', function () {
        const assetId = this.getAttribute('data-id');
        console.log(assetId);

        // Clear previous modal content
        document.getElementById('modal-content').innerHTML = '<p>Loading...</p>';

        // Fetch data using AJAX
        fetch(`/detil-agenda/${assetId}`)
          .then(response => response.json())
          .then(data => {
            // Populate modal content with the fetched data
            document.getElementById('modal-content').innerHTML = `
              <table>
                <tr>
                  <td style="text-align:center;">
                    <img src="${data.banner}" alt="${data.judul_acara}" loading="lazy" class="table-image-modal" />
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top; padding: 10px;">
                    <h5 class="judul-agenda" style="15px; margin-top: 10px; font-weight: bold;">${data.judul_acara}</h5>
                    <p class="agenda-desc">
                        ${data.deskripsi}
                    </p>
                    <p class="agenda-desc">
                        <i class="bi bi-calendar3 me-2"></i>
                        ${data.tanggal_mulai} - ${data.tanggal_selesai}
                    </p>
                    <p class="agenda-desc">
                        <i class="bi bi-alarm-fill me-2"></i>
                        ${data.jam_mulai} - ${data.jam_selesai}
                    </p>
                    <p class="agenda-desc">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <a href="${data.maps_lokasi}" target="_blank" style="text-decoration: none; color: purple;">
                            ${data.lokasi_acara}
                        </a>
                    </p>
                  </td>
                </tr>
              </table>  
            `;
          })
          .catch(error => {
              document.getElementById('modal-content').innerHTML = '<p>Error loading data. Please try again.</p>';
              console.error('Error fetching asset data:', error);
          });
      });
    });
  });
</script>

