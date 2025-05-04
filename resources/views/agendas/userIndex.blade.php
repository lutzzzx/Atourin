@extends('layouts.master')

@section('title')
    Agenda
@endsection

@section('page-title')
    Agenda Saya
@endsection

@section('body')
<body>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6 col-xl-6 d-flex gap-3">
            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" onclick="window.location.href='{{ route('agendas.create') }}'">Tambah Agenda</button>
        </div>
    </div>
    <!-- end row -->

    <div class="row mb-2">
        <h4></h4>
    </div>

    <div class="row">
        @if($agendas->isEmpty())
            <div class="col-lg-4">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="fas fa-info-circle me-3"></i>Belum Ada Agenda</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Anda belum menambahkan agenda apapun. Mulailah menambahkan agenda untuk melihatnya di sini.</p>
                    </div>
                </div>
            </div><!-- end col -->
        @else
            @foreach ($agendas as $agenda)
            <div class="col-lg-6">
                <div class="card">
                    <div
                        class="card-header bg-transparent d-flex border-bottom py-2 px-3 align-items-center justify-content-between"
                    >
                        <div class="d-flex align-items-center">
                            <img src="{{ $agenda->user->foto ? asset('storage/' . $agenda->user->foto) : URL::asset('build/images/users/avatar-10.jpg') }}" alt="Profile Picture" class="rounded-circle header-profile-user d-none d-sm-block">
                            <div class="ms-3">
                                <p class="mb-0">{{ $agenda->user->name }}</p>
                                <small class="text-muted d-none d-sm-block">{{ $agenda->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                        <div>
                            @if ($agenda->private)
                                <span class="btn btn-primary btn-sm text-bg-primary pt-1">Private</span>
                            @else
                                <span class="btn btn-success btn-sm text-bg-success pt-1">Publish</span>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-subtle-danger waves-effect waves-light p-3" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $agenda->id }}">
                                <i class="fas fa-trash fa-lg"></i>
                            </button>
                            <a href="{{ route('agendas.edit', $agenda->id) }}">
                                <button type="button" class="btn btn-subtle-warning waves-effect waves-light p-3">
                                    <i class="fas fa-pencil-alt fa-lg"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Title and Location Section -->
                        <div class="mb-4">
                            <h5 class="text-primary">{{ $agenda->judul }}</h5>
                            <div class="card-text d-flex flex-wrap gap-1">
                                <div class="me-3">
                                    <i class="fas fa-map-marker-alt me-1 text-danger"></i>
                                    <span class="fw-bold">{{ $agenda->lokasi_berangkat }}</span>
                                </div>
                                <div class="me-3">
                                    <i class="fas fa-clock me-1 text-info"></i>
                                    <span class="fw-bold">{{ $agenda->durasi }}</span>
                                </div>
                                <div class="">
                                    <i class="fas fa-money-bill-wave me-1 text-success"></i>
                                    <span class="fw-bold">{{ $agenda->total_biaya }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Destination Section -->
                        <div>
                            <h6 class="text-secondary">Destinasi:</h6>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($agenda->details as $detail)
                                    @if($detail->kategori === 'destinasi')
                                    <a href="javascript: void(0);" class="btn btn-light btn-rounded waves-effect waves-light">{{ $detail->judul }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top text-muted d-flex justify-content-between gap-4 py-2 px-3">
                        <div class="d-flex align-items-center gap-3">
                            <p class="mb-0"><span>{{ $agenda->likes->count() }} Suka</span></p>
                            <p class="mb-0">{{ $agenda->comments->count() }} Komentar</p>
                        </div>
                        <a href="{{ route('details.userDetail', $agenda->id) }}" style="color: blue; text-decoration: none;" class="btn btn-subtle-primary">
                            Selengkapnya
                        </a>
                    </div>         
                </div>

                <div class="modal fade" id="deleteModal-{{ $agenda->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Konfirmasi Hapus</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin menghapus agenda ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect waves-light" data-bs-dismiss="modal">Batal</button>
                            <form class="" action="{{ route('agendas.destroy', ['agenda' => $agenda->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger waves-effect waves-light" data-single-click>Hapus</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
    <!-- end row -->
@endsection 

@section('scripts')

<!-- Card Masonry -->
<script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
<!-- App js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
</body>
