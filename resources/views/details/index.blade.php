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
                                    <label for="floatingemailInput">Waktu Berangkat: </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingemailInput"
                                        placeholder="Enter Email address" disabled value="{{ $agenda->selesai? Carbon::parse($agenda->selesai)->format('d F Y (H:i)') : '-' }}" />
                                    <label for="floatingemailInput">Waktu Selesai:</label>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <form class="like-form mb-0" data-agenda-id="{{ $agenda->id }}">
                                    @csrf
                                    <button type="submit" class="like-btn btn btn-subtle-danger waves-effect waves-light me-2 d-flex align-items-center justify-content-center">
                                        @if($agenda->likes->contains('user_id', Auth::id()))
                                            <i class="fas fa-heart fa-lg me-2"></i>
                                        @else
                                            <i class="far fa-heart fa-lg me-2"></i>
                                        @endif
                                        <p class="mb-0"><span class="likes-count">{{ $agenda->likes->count() }} Suka</span></p>
                                    </button>
                                </form>
                                <form class="bookmark-form" data-agenda-id="{{ $agenda->id }}">
                                    @csrf
                                    <button type="submit" class="bookmark-btn btn @if($agenda->bookmarks->contains('user_id', Auth::id())) btn-danger @else btn-subtle-primary @endif d-flex align-items-center justify-content-center">
                                        @if($agenda->bookmarks->contains('user_id', Auth::id()))
                                            <i class="fas fa-bookmark fa-lg d-block d-sm-none p-1"></i> 
                                            <span class="d-none d-sm-block">Hapus Bookmark</span>
                                        @else
                                            <i class="far fa-bookmark fa-lg d-block d-sm-none p-1"></i> 
                                            <span class="d-none d-sm-block">Simpan Bookmark</span>
                                        @endif
                                    </button>
                                </form>
                                @if($agenda->user_id == Auth::id())
                                    <a href="{{ route('details.userDetail', $agenda->id) }}">
                                        <button type="submit" class="btn btn-subtle-warning d-flex align-items-center justify-content-center">
                                            <i class="far fa-edit fa-lg d-block d-sm-none p-1"></i> <span class="d-none d-sm-block">Kelola Agenda</span>
                                        </button>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="timeline-start">
                                            <p>Selesai</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="">
                            <h5 class="font-size-14 mb-3">Komentar : </h5>
                            <div class="border py-3 rounded">
                                <div class="px-4" data-simplebar style="max-height: 360px;">
                                    @if ($agenda->comments->isEmpty())
                                        <!-- KETERANGAN BELUM ADA KOMENTAR -->
                                        <div class="pt-3">
                                            <p class="text-muted text-center">Belum ada komentar</p>
                                        </div>
                                    @else
                                        @foreach ($agenda->comments as $comment)
                                            <!-- ITERASI KOMENTAR -->
                                            <div class="border-bottom pb-3 pt-3">
                                                <p class="float-sm-end text-muted font-size-13">
                                                    {{ $comment->created_at->format('d M, Y') }}</p>
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex">
                                                            <img src="{{ $comment->user->foto ? asset('storage/' . $comment->user->foto) : URL::asset('build/images/users/avatar-10.jpg') }}"
                                                                class="avatar-sm rounded-circle" alt="">
                                                            <div class="flex-1 mt-2 ps-3">
                                                                <h5 class="font-size-16 mb-0">{{ $comment->user->name }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-muted my-3">{{ $comment->deskripsi }}</p>

                                                @if (Auth::id() === $comment->user_id)
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-single-click>Hapus Komentar</button>
                                                    </form>
                                                @endif
                                            </div>
                                            <!-- ITERASI KOMENTAR SELESAI -->
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="mt-2">
                            <div class="border rounded mt-4">
                                <form action="{{ route('comments.store', $agenda->id) }}" method="POST" id="form-komentar">
                                    @csrf
                                    <div class="px-2 py-1 bg-light">
                                        <div class="btn-group" role="group">
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-link"></i></button>
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-smile"></i></button>
                                            <button type="button"
                                                class="btn btn-sm btn-link text-body text-decoration-none"><i
                                                    class="bx bx-at"></i></button>
                                        </div>
                                    </div>
                                    <textarea rows="3" class="form-control border-0 resize-none" placeholder="Komentar anda..." name="deskripsi"></textarea>
                                    <div class="text-end mt-3">
                                        <button type="submit" class="btn btn-success w-sm text-truncate ms-2" id="btn-kirim" data-single-click>
                                            Kirim <i class="bx bx-send ms-2 align-middle"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          @endsection @section('scripts')
            <!-- App js -->
            <script src="{{ URL::asset('build/js/app.js') }}"></script>
            
            <!-- AJAX BOOKMARKS -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.bookmark-form').forEach(form => {
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            let agendaId = form.dataset.agendaId;
                            let formData = new FormData(form);

                            fetch(`{{ url('/bookmark') }}/${agendaId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    let button = form.querySelector('.bookmark-btn');
                                    let icon = button.querySelector('i');
                                    let span = button.querySelector('span');

                                    if (data.bookmarked) {
                                        button.classList.remove('btn-subtle-primary');
                                        button.classList.add('btn-danger');
                                        icon.classList.remove('far');
                                        icon.classList.add('fas');
                                        span.textContent = 'Hapus Bookmark';
                                        alertify.success('Agenda berhasil ditambahkan ke bookmark');
                                    } else {
                                        button.classList.remove('btn-danger');
                                        button.classList.add('btn-subtle-primary');
                                        icon.classList.remove('fas');
                                        icon.classList.add('far');
                                        span.textContent = 'Simpan Bookmark';
                                        alertify.success('Agenda berhasil dihapus dari bookmark');
                                    }
                                } else {
                                    alertify.error('Terjadi kesalahan. Silakan coba lagi.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alertify.error('Terjadi kesalahan. Silakan coba lagi.');
                            });
                        });
                    });
                });
            </script>
  
            <!-- AJAX LIKE-->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.like-form').forEach(form => {
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            let agendaId = form.dataset.agendaId;
                            let formData = new FormData(form);

                            fetch(`{{ url('/like') }}/${agendaId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.liked !== undefined) {
                                    let button = form.querySelector('.like-btn');
                                    let icon = button.querySelector('i');
                                    let likesCountSpan = button.querySelector('.likes-count');

                                    if (data.liked) {
                                        icon.classList.remove('far');
                                        icon.classList.add('fas');
                                        alertify.success('Agenda berhasil ditambahkan ke suka');
                                    } else {
                                        icon.classList.remove('fas');
                                        icon.classList.add('far');
                                        alertify.success('Agenda berhasil dihapus dari suka');
                                    }

                                    likesCountSpan.textContent = `${data.likes_count} Suka`;
                                } else {
                                    alertify.error('Terjadi kesalahan. Silakan coba lagi.');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alertify.error('Terjadi kesalahan. Silakan coba lagi.');
                            });
                        });
                    });
                });
            </script>
        @endsection
    </body>
