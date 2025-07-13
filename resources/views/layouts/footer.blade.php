<footer class="app-footer small mt-5"> 

  <div class="container position-relative py-3">
    <img src="{{ asset('assets/images/logo-pemkot-stroke.png') }}" height="55" alt="Logo Pemkot Kediri" />
    <div class="row g-3 mt-1">
      <div class="col-md-3">
        <h6 class="fw-semibold text-white">Alamat dan Kontak</h6>
        <div class="row">
          <div class="d-flex text-white align-items-center">
            <i class="bi bi-geo-alt-fill fs-6"></i>
            <span class="ms-2">Jalan Basuki Rahmad No. 15, Kelurahan Pocanan, Kota Kediri, Jawa Timur 64123</span>
          </div>
          <div class="d-flex text-white align-items-center">
            <i class="bi bi-telephone-fill fs-6"></i>
            <span class="ms-2">(0354) 682955</span>
          </div>
          <div class="d-flex text-white align-items-center">
            <i class="bi bi-envelope-fill fs-6"></i>
            <span class="ms-2">info@kedirikota.go.id</span>
          </div>
          <div class="col-10 d-flex justify-content-between mt-2">
            @foreach (['instagram','facebook','youtube', 'twitter-x'] as $item)
              <div class="">
                <a href="/" class="text-decoration-none text-white" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-{{ $item }} fs-4"></i>
                </a>
              </div>
            @endforeach
          </div>         
        </div>
      </div>
      <div class="col-md-6 d-md-flex d-block">
        @foreach ($footerMenus as $menu)
        <div class="col-md-6 mb-3">
            <h6 class="fw-semibold text-white">{{ $menu['title'] }}</h6>
            <ul class="list-unstyled">
                @foreach ($menu['children'] ?? [] as $child)
                    <li>
                        <a href="{{ $child['url'] }}" class="d-flex align-items-center text-white text-decoration-none">
                            <i class="bi {{ $child['icon'] }} me-2"></i> {{ $child['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
      </div>
     
      <div class="col-md-3">
        <h6 class="fw-semibold text-white">Statistik Kunjungan</h6>
        <div class="pt-2 px-3 rounded" style="background-color: rgba(7, 18, 56, 0.3);">
          <div class="badge bg-warning text-white align-items-center justify-content-center gap-2 d-block p-2">
              <i class="bi bi-circle-fill text-success small"></i>
              <span id="live-view">0 Online</span>
          </div>
          {{-- <div class="row col-12 d-flex">
            <div class="col-6">
              <span class="fw-light text-white small">Total Harian</span>
              <h6 class=" fw-bold text-warning">219.078</h6>
            </div>
            <div class="col-6">
              <span class="fw-light text-white small">Total Bulanan</span>
              <h6 class=" fw-bold text-warning">219.078</h6>
            </div>
          </div> --}}
          <div class="col-12 d-flex mt-3">
            <span class="col-6 text-white fw-semibold small">Total Visitor</span>
            <h6 class="fw-bold text-warning" id="total-view">0</h6>
          </div>
        </div>
        <h6 class="fw-semibold text-white mt-3">Survey Kepuasan</h6>
        <div class="col-md-10 d-flex">
          <div class="col-md-3 text-white d-flex flex-column align-items-center">
            <img src="{{ asset('assets/images/sangatpuas.png') }}" alt="" class="w-75">
            <span style="font-size: 8px">Sangat Puas</span>
            <span class="small fw-semibold">{{ $persentaseKepuasan['sangat_puas'] ?? 0 }}%</span>
          </div>
          <div class="col-md-3 text-white d-flex flex-column align-items-center">
            <img src="{{ asset('assets/images/puas.png') }}" alt="" class="w-75">
            <span style="font-size: 8px">Puas</span>
            <span class="small fw-semibold">{{ $persentaseKepuasan['puas'] ?? 0 }}%</span>
          </div>
          <div class="col-md-3 text-white d-flex flex-column align-items-center">
            <img src="{{ asset('assets/images/cukuppuas.png') }}" alt="" class="w-75">
            <span style="font-size: 8px">Cukup Puas</span>
            <span class="small fw-semibold">{{ $persentaseKepuasan['cukup_puas'] ?? 0 }}%</span>
          </div>
          <div class="col-md-3 text-white d-flex flex-column align-items-center">
            <img src="{{ asset('assets/images/tidakpuas.png') }}" alt="" class="w-75">
            <span style="font-size: 8px">Tidak Puas</span>
            <span class="small fw-semibold">{{ $persentaseKepuasan['tidak_puas'] ?? 0 }}%</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="copyright border-top w-100 text-center pt-2">
    <p class="fw-light text-white">Pemerintah Kota Kediri | &copy; Copyright 2025</p>
  </div>
</footer>

@push('scripts')
  <script>
    $(function () {
      const imgHeight = document.getElementById("cover").naturalHeight;
      // console.log('imgHeight', imgHeight);
      $('.app-footer').css('height', imgHeight);
    });
    var Time_Interval = 1; // Menit
        var Live_Views = $('#live-view');
        var Total_Views = $('#total-view');
       
    $(function() {
            // =============================================== //
            function getData() {
                $.ajax({
                    url: '/plugins/google_apis/autoload_data.php',
                    type: 'get',
                    success: function(res) {
                        var total_users = 0; var live_users = 0;
                        res = $.parseJSON(res);
                        // Live User
                        if(res['liveUsers']!=null){
                            for (var i = 0; i < res['liveUsers'].length; i++) {
                                live_users += Number(res['liveUsers'][i]['active_users']);
                            }
                            Live_Views.empty();
                            Live_Views.append(`
                                
                                ${live_users} Online
                            `);
                        }
                        // Total User
                        if(res['totalUsers']!=null){
                            for (var i = 0; i < res['totalUsers'].length; i++) {
                                total_users += Number(res['totalUsers'][i]['totalUsers']);
                            }
                            Total_Views.empty();
                            Total_Views.append(`
                                ${total_users}
                            `);
                        }
                        //devices
                        // total_users = res['totalUsers'].length;
                        // $("#active-users").html(total_users);
                        // devices += '<div class="progress" style="width:100%!important">';
                        // for (var i = 0; i < res['device'].length; i++) {
                        //     percent = (res['device'][i]['active_users'] / total_users) * 100;
                        //     devices += '<div class="progress-bar progress-bar-' + getDeviceColor(res['device'][i]['deviceCategory']) + '" style="width:' + percent + '%">' + res['device'][i]['active_users'] + '</div>';
                        // }
                        // devices += '</div>';
                        // $("#devices").html(devices);

                    }
                });
            }
            getData();
            // =============================================== //
            // Set Interval
            setInterval(function() {
                getData();
                // // Set Empty Live_View
                // Live_Views.empty();
                // // Set Data
                // var data_json = {
                //     url: '/get-live-views',
                //     method: 'get',
                // }
                // fetchdata(data_json).then(function(data) {
                //     console.log(data);
                //     Live_Views.append(`
                //         <div class="blink rounded-circle p-1 me-2" style="background-color: greenyellow"></div>
                //                 ${data} Online
                //     `);
                // });
            }, (Time_Interval * 60 * 1000));
            // =============================================== //
            
        });

  </script>
@endpush
