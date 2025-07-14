@extends('layouts.app')

@section('title', empty($titlepage) ? '' : $titlepage)

@section('content')
    <div class="min-vh-50">
        <section id="about" class="about pt-0 position-relative">
            <div class="header-waves header-fasilitas">
                <div class="inner-header flex"></div>
                <div>
                    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
                        <defs>
                            <path id="gentle-wave"
                                d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(249,250,252,255)" />
                        </g>
                    </svg>
                </div>
            </div>

            <div class="card-hero-fasilitas p-3">
                <ul class="nav nav-pills row col-md-12">
                    @foreach ($kategori as $item)
                        <li class="nav-item col-3">
                            <a class="nav-link {{ request()->get('tab') == $item['id'] || (!request()->has('tab') && $loop->first) ? 'active' : '' }} d-flex flex-column align-items-center"
                                id="tab{{ $item['id'] }}" href="{{ route('fasilitas-kota', ['tab' => $item['id']]) }}"
                                role="tab" aria-controls="content{{ $item['id'] }}"
                                aria-selected="{{ request()->get('tab') == $item['id'] || (!request()->has('tab') && $loop->first) ? 'true' : 'false' }}">
                                <span class="fw-bold fs-1"><i class="bi {{ $item['icon'] }}"></i></span>
                                <span class="fw-bold fs-5 d-none d-md-block">{{ $item['nama_kategori'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="content-fasilitas">
                <div class="container">
                    <div class="tab-content">
                        @foreach ($kategori as $kategori)
                            <div class="tab-pane fade {{ request()->get('tab') == $kategori['id'] || (!request()->has('tab') && $loop->first) ? 'show active' : '' }}"
                                id="content{{ $kategori['id'] }}">
                                @include('layouts.breadcrumb', [
                                    'titlemenu' => $breadcrumb['titlemenu'],
                                    'titlepage' => $breadcrumb['titlepage'],
                                    'detailpage' => $breadcrumb['detailpage'] ?? false,
                                ])
                                @if (in_array($kategori['id'], [1]))
                                    <div class="row py-2">
                                        <form class="search-form">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <input type="text" class="search-keyword form-control"
                                                        placeholder="Search Keyword">
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="search-filter form-control">
                                                        <option value="">Pilih Kategori</option>
                                                        @foreach ($kategori->fasilitas->unique('sub_kategori_id') as $item)
                                                            <option value="{{ $item['sub_kategori_id'] }}">
                                                                {{ $item->sub_kategori->nama_sub }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="search-btn btn btn-primary w-100">
                                                        <i class="bi bi-search"></i> Search
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="mt-4 grid-container search-results">
                                            @foreach ($fasilitasByKategori[$kategori['id']] as $item)
                                                <div class="border rounded search-item"
                                                    data-name="{{ strtolower($item['nama']) }}"
                                                    data-category="{{ $item['sub_kategori_id'] }}">
                                                    <div class="border rounded">
                                                        <div class="col-md-12">
                                                            <img src="{{ !empty($item['foto']) ? (Str::startsWith($item['foto'], 'http') ? $item['foto'] : asset('storage/fasilitas/' . $item['foto'])) : asset('assets/images/noimage2.png') }}"
                                                                alt="{{ $item['nama'] }}" loading="lazy"
                                                                class="w-100 rounded" height="250">
                                                        </div>
                                                        <div class="px-3 py-2">
                                                            <h5 class="card-title fw-semibold">{{ $item['nama'] }}</h5>
                                                            <a href="{{ $item['map'] }}" target="_blank"
                                                                class="text-decoration-none">
                                                                <span><strong><i class="bi bi-geo-alt-fill"></i></strong>
                                                                    {{ $item['alamat'] }}</span>
                                                            </a>
                                                            <br>
                                                            <span><strong><i class="bi bi-telephone-fill"></i></strong>
                                                                {{ $item['telp'] }}</span>
                                                            <br>
                                                            <a href="{{ $item['map'] }}" class="btn btn-warning mt-2"
                                                                target="_blank">Kunjungi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-4">
                                            {{ $fasilitasByKategori[$kategori['id']]->links('pagination::bootstrap-5') }}
                                        </div>
                                    </div>
                                @elseif(in_array($kategori['id'], [2, 3, 4, 5, 6, 7, 8]))
                                    <!-- Pencarian -->
                                    <div class="row py-2">
                                        <form class="search-form">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-5">
                                                    <input type="text" class="search-keyword form-control"
                                                        placeholder="Search Keyword">
                                                </div>
                                                <div class="col-md-5">
                                                    <select class="search-filter form-control">
                                                        <option value="">Pilih Kategori</option>
                                                        @foreach ($kategori->fasilitas->unique('sub_kategori_id') as $item)
                                                            <option value="{{ $item['sub_kategori_id'] }}">
                                                                {{ $item->sub_kategori->nama_sub }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="search-btn btn btn-primary w-100">
                                                        <i class="bi bi-search"></i> Search
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="grid-container mt-4 search-results">
                                            @foreach ($fasilitasByKategori[$kategori['id']] as $item)
                                                <div class="search-item" data-name="{{ strtolower($item['nama']) }}"
                                                    data-category="{{ $item['sub_kategori_id'] }}">
                                                    <div class="border rounded d-flex p-3" style="height: 200px">
                                                        <div class="flex-shrink-0 me-3">
                                                            <img src="{{ !empty($item['foto']) ? (Str::startsWith($item['foto'], 'http') ? $item['foto'] : asset('storage/fasilitas/' . $item['foto'])) : asset('assets/images/noimage2.png') }}"
                                                                alt="{{ $item['nama'] }}" loading="lazy"
                                                                style="width: 100px;">
                                                        </div>
                                                        <div>
                                                            <h5 class="card-title fw-semibold">{{ $item['nama'] }}</h5>
                                                            <a href="{{ $item['map'] }}" target="_blank"
                                                                class="text-decoration-none">
                                                                <span><strong><i class="bi bi-geo-alt-fill"></i></strong>
                                                                    {{ $item['alamat'] }}</span>
                                                            </a>
                                                            <br>
                                                            <span><strong><i class="bi bi-telephone-fill"></i></strong>
                                                                {{ $item['telp'] }}</span>
                                                            <br>
                                                            <a href="{{ $item['map'] }}" class="btn btn-warning mt-2"
                                                                target="_blank">Kunjungi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-4">
                                            {{ $fasilitasByKategori[$kategori['id']]->links('pagination::bootstrap-5') }}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".search-form").forEach((form) => {
                const searchInput = form.querySelector(".search-keyword");
                const filterSelect = form.querySelector(".search-filter");
                const searchResults = form.closest(".row.py-2").querySelector(".search-results");
                const searchItems = searchResults.querySelectorAll(".search-item");

                function filterItems() {
                    let keyword = searchInput.value.toLowerCase();
                    let selectedCategory = filterSelect.value;

                    searchItems.forEach(item => {
                        let name = item.getAttribute("data-name");
                        let category = item.getAttribute("data-category");

                        let matchesKeyword = keyword === "" || name.includes(keyword);
                        let matchesCategory = selectedCategory === "" || category ===
                            selectedCategory;

                        if (matchesKeyword && matchesCategory) {
                            item.style.display = "block";
                        } else {
                            item.style.display = "none";
                        }
                    });
                }

                searchInput.addEventListener("input", filterItems);
                filterSelect.addEventListener("change", filterItems);
            });
        });
    </script>

@endsection
