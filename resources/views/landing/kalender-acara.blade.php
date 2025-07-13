<div class="py-5 my-5 container position-relative">
    <h1 class="mb-5 fw-bold text-center text-black">KALENDER ACARA</h1>
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <div id="my-calendar"></div>
            <hr />
            @if (count($acara) > 0)
            <div class="event-list" style="width: 100%; height: 400px; overflow-y: auto; scrollbar-width: none;">
                <!-- Event Boxes -->
                @foreach ($acara as $acara)
                <div class="box m-auto" data-id="{{ $acara['id'] }}" style="cursor: pointer;">
                    <div class="ribbon ribbon-top-right">
                        <span>{{ \Carbon\Carbon::parse($acara['tanggal_mulai'])->locale('id')->isoFormat('D MMM') }}</span>
                    </div>
                    <table class="w-100">
                        <tr>
                            <td class="w-25 m-auto" style="vertical-align: top; padding: 10px;">
                                <img src="{{ asset('storage/acara/' . $acara['banner']) }}" alt="{{ $acara['judul_acara'] }}" loading="lazy" class="table-image" style="border-radius: 5px;" />
                            </td>
                            <td style="vertical-align: top; padding: 10px;">
                                <h5 class="judul-agenda fw-bold mb-3">{{ $acara['judul_acara'] }}</h5>
                                <p class="agenda-desc"><i class="bi bi-calendar3 me-2"></i>{{ \Carbon\Carbon::parse($acara['tanggal_mulai'])->locale('id')->isoFormat('D MMMM Y') }} - {{ \Carbon\Carbon::parse($acara['tanggal_selesai'])->locale('id')->isoFormat('D MMMM Y') }}</p>
                                <p class="agenda-desc"><i class="bi bi-alarm-fill me-2"></i>{{ \Carbon\Carbon::parse($acara['tanggal_mulai'])->locale('id')->isoFormat('HH:mm') }} - {{ \Carbon\Carbon::parse($acara['tanggal_selesai'])->locale('id')->isoFormat('HH:mm') }}</p>
                                <p class="agenda-desc"><i class="bi bi-geo-alt-fill me-2"></i><a href="{{ $acara['maps_lokasi'] }}" target="_blank">{{ $acara['lokasi_acara'] }}</a></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr />
                @endforeach
            </div>
            @endif
        </div>
        <!-- Right Column -->
        <div class="col-md-6">
            @if($detilacara != '')
            <div style="width: 100%; height: 600px; overflow-y: auto; scrollbar-width: none;">
                <figure class="snip1493">
                    <div class="image text-center mt-4">
                        <img src="{{ asset('storage/acara/' . $detilacara['banner']) }}" alt="{{ $detilacara['judul_acara'] }}" loading="lazy" style="max-width: 50%; border-radius: 5px;" />
                    </div>
                    <figcaption>
                        <div class="date">
                            <span class="day">{{ \Carbon\Carbon::parse($detilacara['tanggal_mulai'])->locale('id')->isoFormat('D') }}</span>
                            <span class="month">{{ \Carbon\Carbon::parse($detilacara['tanggal_mulai'])->locale('id')->isoFormat('MMM') }}</span>
                        </div>
                        <h3 class="mb-4">{{ $detilacara['judul_acara'] }}</h3>
                        <p class="agenda-desc"><i class="bi bi-calendar3 me-2"></i>{{ \Carbon\Carbon::parse($detilacara['tanggal_mulai'])->locale('id')->isoFormat('D MMMM Y') }} - {{ \Carbon\Carbon::parse($detilacara['tanggal_selesai'])->locale('id')->isoFormat('D MMMM Y') }}</p>
                        <p class="agenda-desc"><i class="bi bi-alarm-fill me-2"></i>{{ \Carbon\Carbon::parse($detilacara['tanggal_mulai'])->locale('id')->isoFormat('HH:mm') }} - {{ \Carbon\Carbon::parse($detilacara['tanggal_selesai'])->locale('id')->isoFormat('HH:mm') }}</p>
                        <p class="agenda-desc"><i class="bi bi-geo-alt-fill me-2"></i>{{ $detilacara['lokasi_acara'] }}</p>
                        <span style="text-align:justify">{!! $detilacara['deskripsi'] !!}</span>
                        <!-- <p class="agenda-desc">{!! $detilacara['deskripsi'] !!}</p> -->
                    </figcaption>
                </figure>
            </div>
            @else
            <div class="col-lg-12 d-flex justify-content-center">
                <img src="{{ asset('assets/images/nodata3.png') }}" alt="" class="img-fluid" width="75%">
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Event handler for click on the .box div
        $('.box').on('click', function () {
            // Get the ID of the clicked acara
            var acaraId = $(this).data('id');
            
            // Send an AJAX request to fetch more details
            $.ajax({
                url: '/get-acara-details',  // Endpoint to fetch event details
                method: 'GET',
                data: { id: acaraId },  // Send acara ID
                success: function (response) {
                    // Build the HTML for the details
                    var detailsHtml = `
                        <div style="width: 100%; height: 600px; overflow-y: auto; scrollbar-width: none;">
                            <figure class="snip1493">
                                <div class="image text-center mt-4">
                                    <img src="/storage/acara/${response.banner}" alt="Event Image" style="max-width: 50%; border-radius: 5px;" />
                                </div>
                                <figcaption>
                                    <div class="date">
                                        <span class="day">${new Date(response.tanggal_mulai).getDate()}</span>
                                        <span class="month">${new Date(response.tanggal_mulai).toLocaleString('id-ID', { month: 'short' })}</span>
                                    </div>
                                    <h3 class="mb-4">${response.judul_acara}</h3>
                                    <p class="agenda-desc">
                                        <i class="bi bi-calendar3 me-2"></i>
                                        ${new Date(response.tanggal_mulai).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })} - 
                                        ${new Date(response.tanggal_selesai).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}
                                    </p>
                                    <p class="agenda-desc">
                                        <i class="bi bi-alarm-fill me-2"></i>
                                        ${new Date(response.tanggal_mulai).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })} - 
                                        ${new Date(response.tanggal_selesai).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' })}
                                    </p>
                                    <p class="agenda-desc">
                                        <i class="bi bi-geo-alt-fill me-2"></i>
                                        ${response.lokasi_acara}
                                    </p>
                                    <p style="text-align:justify">${response.deskripsi}</p>
                                </figcaption>
                                <a href="#"></a>
                            </figure>
                        </div>
                     `;
                    
                    // Replace the content of the right column
                    $('.col-md-6:last-child').html(detailsHtml);
                },
                error: function (xhr, status, error) {
                    console.log('AJAX Error: ' + error);
                }
            });
        });
    });
</script>

