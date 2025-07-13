
<div class="container my-4">
    <h4 class="mb-3 fw-bold border-bottom title-border text-left">Sekilas Tentang Kediri</h4>

    <div class="row mb-4 pt-3">
        <div class="col-md-6">
            <img src="{{ asset('assets/images/taman brantas.png') }}" class="w-100" alt="Profil Kota Kediri" loading="lazy">
        </div>
        <div class="col-md-6 pt-5">
            <p>Kota Kediri ”berumah” nan jauh arah barat daya Ibu Kota Provinsi Jawa Timur, Surabaya. Jarak dari Kota Pahlawan sekitar 130 km. Untuk catatan jumlah penduduk, Kota Kediri adalah kota terbesar nomor 3 (tiga) di Jawa Timur. Kota nomor satu diduduki Surabaya. Disusul di nomor urut 2 (dua) Kota Malang</p>
            <ul class="list-unstyled fw-bold">
                <li><i class="bi bi-check-circle-fill fs-4 text-secondary m-2"></i> Posisi antara 111º05´ – 112º03´ BT</li>
                <li><i class="bi bi-check-circle-fill fs-4 text-secondary m-2"></i> Posisi antara 7º45´ – 7º55´ LS</li>   
                <li><i class="bi bi-check-circle-fill fs-4 text-secondary m-2"></i> Ketinggian rata-rata 67 M DPL</li>
                <li><i class="bi bi-check-circle-fill fs-4 text-secondary m-2"></i> Tingkat kemiringan 0-40%</li>
            </ul>
        </div>
    </div>
    
    <!-- Infografis Luas Wilayah -->
    <div class="card text-center mb-4">
        <div class="card-body">
            
            <h2>Luas Wilayah</h2>
            <p class="display-4 text-primary fw-semibold">63,404 km²</p>
            <p>Kota Kediri terbagi menjadi 3 Kecamatan dan 46 Kelurahan</p>
        </div>
    </div>

    <!-- Info Kecamatan -->
    <div class="row">
        <!-- Kecamatan Mojoroto -->
        @foreach ($jumlah_kelurahan as $kd_kecamatan => $data)
        <div class="col-md-4 mb-3">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="card-title">Kecamatan {{ $data['nm_kecamatan'] }}</h4>
                    <p>Jumlah Kelurahan: {{ $data['jumlah_kelurahan'] }}</p>
                    <a href="{{ route('kelurahan') }}" class="btn btn-primary text-white">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row penduduk">
        <div class="col-md-6 m-auto">
            <p>Penduduk Kota Kediri berdasarkan Hasil Registrasi Penduduk Dinas Kependudukan dan Pencatatan Sipil Kota Kediri </p>
            <div class="row">
                <div class="col-4">
                    <i class="bi bi-people text-secondary" style="font-size: 50px"></i> <br><span class="fs-2 fw-bold">298.820</span> <br> Total Populasi
                </div>
                <div class="col-4">
                    <i class="bi bi-gender-male text-secondary" style="font-size: 50px"></i> <br><span class="fs-2 fw-bold">148.296</span> <br> Laki-laki
                </div>
                <div class="col-4">
                    <i class="bi bi-gender-female text-secondary" style="font-size: 50px"></i> <br><span class="fs-2 fw-bold">150.524</span> <br> Perempuan
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none d-md-block">
            <img src="https://themewagon.github.io/productly/v1.0.0/assets/img/hero/hero-img.png" alt="Jumlah Penduduk Kota Kediri" width="100%" loading="lazy">
        </div>
    </div>
</div>

