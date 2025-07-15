<footer class="app-footer small mt-5">
    <div class="container position-relative py-3">
        <img src="{{ asset('assets/images/apeksi_footer.png') }}" height="55" alt="Logo Pemkot Kediri" />
        <div class="row g-3 mt-1">
            <div class="col-md-5">
                <h6 class="fw-semibold text-white">APEKSI MUSKOMWIL IV KE 13 - KOTA KEDIRI</h6>
                <div class="row">
                    <div class="d-flex text-white align-items-center">
                        <p class="m-0 text-justify">
                            Kota Kediri dengan bangga menjadi tuan rumah Muskomwil IV Apeksi Tahun 2025 dengan tema
                            "Semangat Pembangunan Berkelanjutan Menuju Kota Mapan". Kami menyambut hangat peserta dari
                            seluruh kota di Indonesia untuk berdiskusi, berbagi ide, dan berkolaborasi dalam
                            pengembangan perkotaan yang inklusif dan berkelanjutan, serta mendorong kemajuan dan sinergi
                            antar daerah demi masa depan yang lebih baik.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="fw-semibold text-white">LINK TERKAIT</h6>
                <div class="col-md-12 mb-3">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/fasilitas-kota?tab=1" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2"></i><span>Hotel & Penginapan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=2" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Persewaan / Rental Mobil</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=3" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Wisata Kuliner</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=4" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Coffee Shop</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=5" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Mall & Shopping</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=6" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Oleh - Oleh Kediri</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=7" class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2 "></i><span>Destinasi Wisata</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitas-kota?tab=8"
                                class="d-flex align-items-center text-white text-decoration-none">
                                <i class="bi bi-arrow-right me-2"></i><span>Rumah Sakit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold text-white">ALAMAT DAN KONTAK</h6>
                <div class="row">
                    <div class="d-flex text-white align-items-center">
                        <i class="bi bi-geo-alt-fill fs-6"></i>
                        <span class="ms-2">Jalan Basuki Rahmad No. 15, Kelurahan Pocanan, Kota Kediri, Jawa Timur
                            64123</span>
                    </div>
                    <div class="d-flex text-white align-items-center">
                        <i class="bi bi-telephone-fill fs-6"></i>
                        <span class="ms-2">(0354) 682955</span>
                    </div>
                    <div class="d-flex text-white align-items-center">
                        <i class="bi bi-envelope-fill fs-6"></i>
                        <span class="ms-2">kediri@kedirikota.go.id</span>
                    </div>
                    <div class="col-10 d-flex justify-content-between mt-3">
                        @php
                            $socialLinks = [
                                'instagram' => 'https://www.instagram.com/pemkotkediri/',
                                'facebook' => 'https://www.facebook.com/kotakediri/',
                                'youtube' => 'https://youtube.com/@pemkotkediritv?si=oM2enajVbV0UpkR1',
                                'twitter-x' => 'https://x.com/pemkot_kediri',
                                'tiktok' => 'https://www.tiktok.com/@pemkotkediri?is_from_webapp=1&sender_device=pc',
                            ];
                        @endphp

                        @foreach (['instagram', 'facebook', 'youtube', 'twitter-x', 'tiktok'] as $item)
                            <div>
                                <a href="{{ $socialLinks[$item] }}" class="text-decoration-none text-white" target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-{{ $item }} fs-4"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright border-top w-100 text-center pt-2">
        <p class="fw-light text-white">Pemerintah Kota Kediri | &copy; Copyright 2025</p>
    </div>
</footer>
