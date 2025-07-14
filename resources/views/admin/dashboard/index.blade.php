@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($progress as $row)
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                {{ $row->nama }}<br />
                                @if ($row->sampai == $row->tanggal)
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($row->tanggal) }}
                                @else
                                    {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($row->tanggal, $row->sampai) }}
                                @endif
                            </div>
                            <div class="card-body">
                                @foreach ($row->detail as $item)
                                    <h6>{{ $item->kegiatan }}</h6>
                                    <i class="text-secondary"><span class="fa fa-clock"></span>
                                        {{ $item->mulai . '-' . $item->selesai }}</i><br />
                                    <i class="text-secondary"><span class="fa fa-calendar"></span>
                                        {{ App\Helpers\TanggalHelper::formatTanggalIndonesia($item->tanggal) }}</i>
                                    @if ($item->progress != null)
                                        @if ($item->progress != null && $item->progress->progress == "100")
                                            @php $status = "bg-success"; @endphp
                                        @else
                                            @php $status = "bg-danger"; @endphp
                                        @endif
                                        <div class="progress mt-2 mb-1">
                                            <div class="progress-bar {{ $status }}" role="progressbar"
                                                style="width: {{ $item->progress != null ? $item->progress->progress : '0' }}%"
                                                aria-valuenow="{{ $item->progress != null ? $item->progress->progress : '0' }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                                {{ $item->progress != null ? $item->progress->progress . '%' : '0%' }}</div>
                                        </div>
                                        <i class="text-info">Ket :
                                            {{ $item->progress != null ? $item->progress->keterangan : '-' }}</i>
                                    @endif
                                    <hr />
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
