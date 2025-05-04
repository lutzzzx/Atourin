@php
    use Carbon\Carbon;
@endphp
@extends('layouts.master') @section('title')
    Detail Agenda
@endsection
@section('page-title')
    Detail Agenda
    @endsection @section('body')

    <body>
        @endsection @section('content')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h3 class="text-primary">{{ $agenda->judul }}</h3>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card-text d-flex flex-wrap gap-1">
                                    <div class="me-3">
                                        <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                        <span class="fw-bold">Dari: {{ $agenda->lokasi_berangkat }}</span>
                                    </div>
                                    <div class="me-3 d-none d-sm-block">
                                        <i class="fas fa-clock me-1 text-info"></i>
                                        <span class="fw-bold">{{ $agenda->durasi }}</span>
                                    </div>
                                    <div class="d-none d-sm-block">
                                        <i class="fas fa-money-bill-wave me-1 text-success"></i>
                                        <span class="fw-bold">{{ $agenda->total_biaya }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingemailInput"
                                        placeholder="Enter Email address" disabled value="{{ $agenda->mulai ? Carbon::parse($agenda->mulai)->format('d F Y (H:i)') : '-' }}" />
                                    <label for="floatingemailInput">Waktu mulai:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingemailInput"
                                        placeholder="Enter Email address" disabled value="{{ $agenda->selesai ? Carbon::parse($agenda->selesai)->format('d F Y (H:i)') : '-' }}" />
                                    <label for="floatingemailInput">Waktu Selesai:</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-danger w-md" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Hapus
                            </button>
                            <a href="{{ route('agendas.edit', $agenda->id) }}">
                                <button type="button" class="btn btn-warning w-md mx-3">
                                    Ubah
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus agenda ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('agendas.destroy', ['agenda' => $agenda->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" data-single-click>Hapus</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Konfirmasi Hapus -->
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="timeline">
                                    <div class="timeline-container">
                                        <div class="timeline-end">
                                            <p>Mulai</p>
                                        </div>
                                        <div class="timeline-continue">
                                            @foreach ($details as $detail)
                                                @if ($detail->kategori == 'transportasi')
                                                    <div class="row timeline-left">
                                                        <div class="col-md-6 d-md-none d-block">
                                                            <div class="timeline-icon">
                                                                <i class="fas fa-car-side text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div class="timeline-date bg-primary text-center rounded">
                                                                    <h3 class="text-white mb-0 font-size-20">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('d') }}
                                                                    </h3>
                                                                    <p class="mb-0 text-white-50">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('F') }}
                                                                    </p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-17">{{ $detail->judul }}</h3>
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-clock me-1 text-primary"></i>
                                                                            <div class="text-primary">
                                                                                <b>{{ \Carbon\Carbon::parse($detail->mulai)->format('H:i') }}</b>
                                                                            </div>
                                                                            <span class="mx-1 text-primary"><b>-</b></span>
                                                                            <div class="text-primary">
                                                                                <b>
                                                                                    @if (\Carbon\Carbon::parse($detail->mulai)->format('Y-m-d') !== \Carbon\Carbon::parse($detail->selesai)->format('Y-m-d'))
                                                                                        {{ \Carbon\Carbon::parse($detail->selesai)->format('d F H:i') }}
                                                                                    @else
                                                                                        {{ \Carbon\Carbon::parse($detail->selesai)->format('H:i') }}
                                                                                    @endif
                                                                                </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                                            Biaya: <b>{{ $detail->biaya }}</b>
                                                                        </div>
                                                                        <br>
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="button" class="btn btn-sm btn-danger mt-3 mx-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModalDetails-{{ $detail->id }}">
                                                                                <i class="fas fa-trash h5 m-2"></i>
                                                                            </button>
                                                                            <a
                                                                                href="{{ route('details.editTransportasi', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}">
                                                                                <button
                                                                                    class="btn btn-sm btn-warning mt-3 waves-effect waves-light">
                                                                                    <i class="fas fa-pen h5 m-2"></i>
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 d-md-block d-none">
                                                            <div class="timeline-icon">
                                                                <i class="fas fa-car-side text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($detail->kategori == 'destinasi')
                                                    <div class="row timeline-right">
                                                        <div class="col-md-6">
                                                            <div class="timeline-icon">
                                                                <i class="far fa-map text-primary h2 mb-0"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="timeline-box">
                                                                <div class="timeline-date bg-info text-center rounded">
                                                                    <h3 class="text-white mb-0 font-size-20">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('d') }}
                                                                    </h3>
                                                                    <p class="mb-0 text-white-50">
                                                                        {{ \Carbon\Carbon::parse($detail->mulai)->format('F') }}
                                                                    </p>
                                                                </div>
                                                                <div class="event-content">
                                                                    <div class="timeline-text">
                                                                        <h3 class="font-size-17">{{ $detail->judul }}</h3>
                                                                        <div class="d-flex align-items-center">
                                                                            <i class="fas fa-clock me-1 text-primary"></i>
                                                                            <div class="text-primary">
                                                                                <b>{{ \Carbon\Carbon::parse($detail->mulai)->format('H:i') }}</b>
                                                                            </div>
                                                                            <span class="mx-1 text-primary"><b>-</b></span>
                                                                            <div class="text-primary">
                                                                                <b>
                                                                                    @if (\Carbon\Carbon::parse($detail->mulai)->format('Y-m-d') !== \Carbon\Carbon::parse($detail->selesai)->format('Y-m-d'))
                                                                                        {{ \Carbon\Carbon::parse($detail->selesai)->format('d F H:i') }}
                                                                                    @else
                                                                                        {{ \Carbon\Carbon::parse($detail->selesai)->format('H:i') }}
                                                                                    @endif
                                                                                </b>
                                                                            </div>
                                                                        </div>
                                                                        <div class="btn btn-subtle-primary mt-3 waves-effect waves-light">
                                                                            Biaya: <b>{{ $detail->biaya }}</b>
                                                                        </div>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <button type="button" class="btn btn-sm btn-danger mt-3 mx-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModalDetails-{{ $detail->id }}">
                                                                                <i class="fas fa-trash h5 m-2"></i>
                                                                            </button>
                                                                            <a
                                                                                href="{{ route('details.editDestinasi', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}">
                                                                                <button
                                                                                    class="btn btn-sm btn-warning mt-3 waves-effect waves-light">
                                                                                    <i class="fas fa-pen h5 m-2"></i>
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            <!-- Modal Konfirmasi Hapus -->
                                                <div class="modal fade" id="deleteModalDetails-{{ $detail->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="deleteModalLabel">Konfirmasi Hapus</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus detail ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('details.destroy', ['agenda' => $agenda->id, 'detail' => $detail->id]) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger" data-single-click>Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Konfirmasi Hapus -->
                                            @endforeach
                                        </div>
                                        <div class="timeline-start">
                                            <p>Selesai</p>
                                        </div>
                                        <hr class="mt-5">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div>
                                                <a
                                                    href="{{ route('details.createTransportasi', ['agenda' => $agenda->id]) }}">
                                                    <button class="btn btn-primary waves-effect waves-light mx-3">Tambah
                                                        Transportasi</button>
                                                </a>
                                            </div>
                                            <div>
                                                <a
                                                    href="{{ route('details.createDestinasi', ['agenda' => $agenda->id]) }}">
                                                    <button class="btn btn-info waves-effect waves-light">Tambah
                                                        Destinasi</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
