@props(['titlemenu' => '', 'titlepage' => '', 'detailpage' => false])

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door-fill"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">{{ $breadcrumb['titlemenu'] }}</a></li>

        @if($breadcrumb['detailpage'])
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() ?? request()->url() }}">{{ $breadcrumb['titlepage'] }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['titlepage'] }}</li>
        @endif
    </ol>
</nav>
