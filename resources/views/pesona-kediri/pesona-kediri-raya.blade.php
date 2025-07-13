@extends('layouts.app')

@section('title', $meta['title'])
@section('meta_description', $meta['description'])

@section('content')
<div class="min-vh-50-pesona">
  <section id="intro">
    <div class="info">
        <h1 class="fw-semibold mt-5">{{ empty($pesona) ? '' : $pesona['judul'] }}</h1>
        <div class="underline"></div>
        <div class="info-deskripsi">
            {!! empty($pesona) ? '' : $pesona['deskripsi'] !!} 
        </div>
    </div>
    <div class="split-beer">
        <img class="beer" src="{{asset('storage/pesona-kediri/' . $pesona['gambar1'] )}}" />
        <img class="beer" src="{{asset('storage/pesona-kediri/' . $pesona['gambar2'])}}" />
        <img class="beer" src="{{asset('storage/pesona-kediri/' . $pesona['gambar3'])}}" />
    </div>
  </section>
  <div class="col-lg-12  text-center">
    <img class="text-gif" src="{{ asset('assets/images/adaapa3.gif') }}" />
  </div>
  <div class="my-5 container">
    <div class="col-lg-12 mb-5 text-center">
        <div class="row pb-5">
            <div class="col-md-12">
                <!-- Tab Navigation -->
                <ul class="position-relative nav nav-pills end-0 h6 justify-content-center mb-5 gap-4" id="pills-tab" role="tablist">
                    @foreach ($categories as $key => $category)
                        <li class="nav-item" role="presentation">
                            <button 
                                @class(['nav-link', 'active' => $key == 0]) 
                                id="pills-{{ $category->id }}-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#pills-{{ $category->id }}" 
                                type="button" 
                                role="tab" 
                                aria-controls="pills-{{ $category->id }}" 
                                aria-selected="true"
                                onclick="resetPagination('{{ 'pills-' . $category->id }}')">
                                <span style="font-size:17px;">{{ $category->nama_kategori }}</span>
                            </button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($categories as $key => $category)
                        <div 
                            @class(['tab-pane fade', 'show' => $key == 0, 'active' => $key == 0]) 
                            id="pills-{{ $category->id }}" 
                            role="tabpanel" 
                            aria-labelledby="pills-{{ $category->id }}-tab" 
                            tabindex="0">
                            <div class="row">
                                @forelse ($category->paginatedAsetKediri as $aset)
                                  <div class="col-12 col-md-3">
                                      <div class="card-berita-home mb-3 rounded d-flex flex-column p-3 border border-primary">
                                          <img src="{{ asset('storage/aset/' . $aset->gambar) }}" alt="{{ $aset->nama }}" loading="lazy" class="w-100 rounded" height="200">
                                          <button class="btn btn-warning w-100 mt-2 open-modal" data-id="{{ $aset->id }}" data-bs-toggle="modal" data-bs-target="#asetModal">
                                              <span>{{ $aset->nama }} <i class="bi bi-info-circle ms-2"></i></span>
                                          </button>
                                      </div>
                                  </div>
                                @empty
                                  <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom:30px;">
                                      <img src="{{ asset('assets/images/nodata3.png') }}" alt="" loading="lazy" class="img-fluid" width="40%" style="margin:20px;">
                                  </div>
                                @endforelse
                                <!-- Pagination Links -->
                                <div class="d-flex justify-content-end mt-3">
                                    <!-- Pagination Controls (right-aligned) -->
                                    <div>
                                      {{ $category->paginatedAsetKediri->appends(['tab' => 'pills-' . $category->id])->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="asetModal" tabindex="-1" aria-labelledby="asetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- You can change modal-lg to modal-sm if needed -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="asetModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modal-content">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary" onclick="window.open('https://kec-mojoroto.kedirikota.go.id')">Go to Website</button> -->
      </div>
    </div>
  </div>
</div>

<!-- SCRIPT HANDLE DYNAMIC MODAL -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.open-modal').forEach(button => {
      button.addEventListener('click', function () {
        const assetId = this.getAttribute('data-id');

        // Clear previous modal content
        document.getElementById('modal-content').innerHTML = '<p>Loading...</p>';

        // Fetch data using AJAX
        fetch(`/detil-aset/${assetId}`)
          .then(response => response.json())
          .then(data => {
            // Populate modal content with the fetched data
            document.getElementById('asetModalLabel').innerText = data.nama;
            document.getElementById('modal-content').innerHTML = `
              <div class="row col-md-12">
                <div class="col-md-5 d-flex flex-column align-items-center">
                    <img class="fasilitas mb-3" src="${data.gambar_url}" alt="${data.nama}" />
                </div>
                <div class="col-md-7">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-geo-alt-fill me-3 fasilitas-icon"></i>
                        <div><b>Lokasi :</b> <a href="${data.maps}" target="_blank">${data.lokasi}</a></div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-alarm-fill me-3 fasilitas-icon"></i>
                        <div><b>Jam Operasional :</b> ${data.jam_buka} - ${data.jam_tutup}</div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-ticket-perforated-fill me-3 fasilitas-icon"></i>
                        <div><b>Tiket Masuk :</b> ${data.harga_tiket}</div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-chat-square-quote-fill me-3 fasilitas-icon"></i>
                        <div><b>Deskripsi :</b> ${data.deskripsi}</div>
                    </div>
                </div>
            </div>`;
          })
          .catch(error => {
              document.getElementById('modal-content').innerHTML = '<p>Error loading data. Please try again.</p>';
              console.error('Error fetching asset data:', error);
          });
      });
    });
  });
</script>

<!-- SCRIPT HANDLE TAB AND PAGINATION -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const activeTab = urlParams.get('tab'); // Get active tab from query string

    if (activeTab) {
        // Find the corresponding tab button and trigger its click event
        const activeTabButton = document.querySelector(`button[data-bs-target="#${activeTab}"]`);
        if (activeTabButton) {
            activeTabButton.click();
        }
    }

    // Ensure pagination links are updated dynamically on page load
    updatePaginationLinks();

    // // Ensure tab ID is added to pagination links dynamically
    // document.querySelectorAll('.pagination a').forEach(link => {
    //     link.href = `${link.href}&tab=${document.querySelector('.nav-link.active').getAttribute('data-bs-target').substring(1)}`;
    // });

    // Add event listener for tab change
    document.querySelectorAll('.nav-link').forEach(tab => {
        tab.addEventListener('click', function () {
            const activeTabId = this.getAttribute('data-bs-target').substring(1); // Extract tab ID
            resetPagination(activeTabId);
        });
    });
});

</script>

<!-- SCRIPT HANDLE RESET PAGINATION WHEN TAB CHANGE -->
<script>
  function resetPagination(activeTab) {
    const urlParams = new URLSearchParams(window.location.search);
    
    // Update the 'tab' parameter
    urlParams.set('tab', activeTab);
    
    // Remove the 'page' parameter to reset pagination
    urlParams.delete('page');
    
    // Update the browser's URL without reloading the page
    const newUrl = `${window.location.pathname}?${urlParams.toString()}`;
    history.replaceState(null, '', newUrl);

    // Refresh pagination links with the new tab and reset page
    updatePaginationLinks();
}
</script>

<script>
  // Update pagination links dynamically based on the active tab
  function updatePaginationLinks() {
      const activeTab = document.querySelector('.nav-link.active').getAttribute('data-bs-target').substring(1);
      document.querySelectorAll('.pagination a').forEach(link => {
          const url = new URL(link.href);
          url.searchParams.set('tab', activeTab); // Set the active tab in the link
          url.searchParams.delete('page'); // Reset the page parameter
          link.href = url.toString();
      });
  }
</script>
@endsection