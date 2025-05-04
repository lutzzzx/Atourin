@extends('layouts.master-admin')
@section('title')
    Admin
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <!-- Font Awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section('page-title')
    Daftar Agenda
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Daftar Agenda</h4>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div id="table-gridjs"></div>
                        @foreach ($agendas as $agenda)
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal-{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $agenda->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $agenda->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin menghapus agenda dengan judul {{ $agenda->judul }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.agendaDestroy', ['agenda' => $agenda->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger waves-effect waves-light" data-single-click>Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    @endsection
    @section('scripts')
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            const agendas = @json($agendas);

            const gridData = agendas.map(agenda => [
                agenda.judul,
                agenda.lokasi_berangkat,
                agenda.user.email,
                gridjs.html(`
                  @if(!empty($agenda))
                    <a href="{{ url('agendas') }}/${agenda.id}/details">
                      <button type="button" class="btn btn-info btn-sm">Detail</button>
                    </a>
                  @endif
                `),
                gridjs.html(`
                    <div class="btn-group gap-2" role="group">
                        <button type="button" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteModal-${agenda.id}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                `)
            ]);

            new gridjs.Grid({
                columns: ["Judul Agenda", "Lokasi Keberangkatan", "User", "Link", {
                    name: 'Aksi',
                    sort: false,
                    width: '100px'
                }],
                pagination: {
                    limit: 20
                },
                sort: true,
                search: true,
                data: gridData
            }).render(document.getElementById("table-gridjs"));
        </script>
    @endsection
