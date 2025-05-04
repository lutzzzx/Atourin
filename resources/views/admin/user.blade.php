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
    Daftar Pengguna
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Daftar Pengguna</h4>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div id="table-gridjs"></div>
                        @foreach ($users as $user)
                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-{{ $user->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $user->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakan anda yakin menghapus pengguna {{ $user->email }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form class="" action="{{ route('admin.destroy', ['user' => $user->id]) }}" method="POST">
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
            const users = @json($users);

            const gridData = users.map((user, index) => [
                index + 1, // Add this line to include the number
                user.name,
                user.email,
                user.role,
                user.jk,
                user.tgl_lahir,
                user.alamat,
                gridjs.html(`
                    <div class="gap-2" role="group">
                        <a href="{{ url('admin') }}/${user.id}/edit"><button type="button" class="btn btn-warning btn-sm edit-button">
                            <i class="fas fa-edit"></i>
                        </button></a>
                        <button type="button" class="btn btn-danger btn-sm delete-button" data-toggle="modal" data-target="#deleteModal-${user.id}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                `)
            ]);

            new gridjs.Grid({
                columns: ["Nomor", "Name", "Email", "Role", "Jenis Kelamin", "Tgl Lahir", "Alamat", {
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
