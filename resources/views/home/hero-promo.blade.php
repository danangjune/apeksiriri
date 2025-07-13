
<!-- Banner Section -->
<div class="container">
    <div class="row g-0 slick-hero-banner">
        @foreach ($banner_promo as $item)
            <div class="col-md-3 px-2 mb-3">
                <div class="box-banner" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
                    <a href="#" class="openModal" data-img="{{ asset('storage/banner-promo/' . $item->gambar) }}">
                        <img src="{{ asset('storage/banner-promo/' . $item->gambar) }}" 
                             alt="{{ $item->judul }}" 
                             class="w-100"
                             style="border-radius: 10px;">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
