@extends('layouts.master') @section('title') Ubah Agenda @endsection

@section('page-title') Ubah Agenda @endsection @section('body')

<body>
    @endsection @section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ubah Agenda</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('agendas.update', $agenda) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control @error('judul') is-invalid @enderror"
                                id="judul"
                                name="judul"
                                placeholder="Judul"
                                value="{{ $agenda->judul }}"
                            />
                            <label for="judul">Judul Agenda</label>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input
                                        type="text"
                                        class="form-control @error('lokasi_berangkat') is-invalid @enderror"
                                        id="lokasi_berangkat"
                                        name="lokasi_berangkat"
                                        placeholder="Lokasi Awal"
                                        value="{{ $agenda->lokasi_berangkat }}"
                                    />
                                    <label for="lokasi_berangkat">Lokasi Berangkat</label>
                                    @error('lokasi_berangkat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name="private" value="0">
                            <div class="form-check form-switch">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="private"
                                    name="private"
                                    value="1"
                                    {{ $agenda->private ? 'checked' : '' }}
                                />
                                <label
                                    class="form-check-label"
                                    for="private"
                                >
                                    Private
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md" data-single-click>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @endsection @section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
</body>
