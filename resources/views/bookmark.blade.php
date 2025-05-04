@extends('layouts.master')

@section('title')
    Bookmarks
@endsection

@section('page-title')
    Bookmarks
@endsection

@section('body')
<body>
@endsection

@section('content')
    <div class="row">
        <h4></h4>
    </div>

    <div class="row" id="bookmarks-container">
        @if($agendas->isEmpty())
            <div class="col-lg-4" id="no-bookmarks">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="fas fa-info-circle me-3"></i>Belum Ada Bookmark</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Anda belum menambahkan bookmark apapun. Mulailah menambahkan bookmark untuk melihatnya di sini.</p>
                        <a href="{{ route('agendas.index') }}" class="btn btn-primary mt-3">Jelajahi Agenda</a>
                    </div>
                </div>
            </div><!-- end col -->
        @else
            <div class="col-lg-4 d-none" id="no-bookmarks">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="fas fa-info-circle me-3"></i>Belum Ada Bookmark</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Anda belum menambahkan bookmark apapun. Mulailah menambahkan bookmark untuk melihatnya di sini.</p>
                        <a href="{{ route('agendas.index') }}" class="btn btn-primary mt-3">Jelajahi Agenda</a>
                    </div>
                </div>
            </div><!-- end col -->
            @foreach ($agendas as $agenda)
                <div class="col-lg-6 agenda-card" id="agenda-card-{{ $agenda->id }}">
                    <div class="card">
                        <div class="card-header bg-transparent d-flex border-bottom py-2 px-3 align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ $agenda->user->foto ? asset('storage/' . $agenda->user->foto) : URL::asset('build/images/users/avatar-10.jpg') }}" alt="Profile Picture" class="rounded-circle header-profile-user">
                                <div class="ms-3">
                                    <p class="mb-0">{{ $agenda->user->name }}</p>
                                    <small class="text-muted">{{ $agenda->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div>
                                    <form class="mb-0 bookmark-form" action="{{ route('agendas.bookmark', $agenda->id) }}" method="POST" data-agenda-id="{{ $agenda->id }}">
                                        @csrf
                                        <button type="submit" class="btn p-3 btn-subtle-primary waves-effect waves-light bookmark-btn">
                                            @if($agenda->bookmarks->contains('user_id', Auth::id()))
                                                <i class="fas fa-bookmark fa-lg"></i>
                                            @else
                                                <i class="far fa-bookmark fa-lg"></i>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                <p class="mb-0 d-none d-sm-block">{{ $agenda->comments->count() }} Komentar</p>
                            </div>
                            <a href="{{ route('details.index', $agenda->id) }}" style="color: blue; text-decoration: none;" class="btn btn-subtle-primary">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('scripts')
    <!-- Card Masonry -->
    <script src="{{ URL::asset('build/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    
    <!-- AJAX BOOKMARK -->
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
                            let bookmarkBtn = form.querySelector('.bookmark-btn i');

                            if (data.bookmarked) {
                                bookmarkBtn.classList.remove('far');
                                bookmarkBtn.classList.add('fas');
                                alertify.success('Agenda berhasil ditambahkan ke bookmark');
                            } else {
                                let card = document.getElementById(`agenda-card-${agendaId}`);
                                card.parentNode.removeChild(card);
                                alertify.success('Agenda berhasil dihapus dari bookmark');
                                
                                // Check if there are any remaining agenda cards
                                if (document.querySelectorAll('.agenda-card').length === 0) {
                                    document.getElementById('no-bookmarks').classList.remove('d-none');
                                }
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

    <!-- AJAX SUKA-->
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

