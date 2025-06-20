@extends('layouts.master-without-nav')
@section('title')
    Register
@endsection
@section('page-title')
    Register
@endsection
@section('body')

    <body>
    @endsection
@section('content')
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 d-flex justify-content-center pb-2">
                            <h2>Leavin</h2>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5>Selamat Datang!</h5>
                                    <p class="text-muted">Daftar untuk masuk ke Leavin.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nama</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama anda">
                                                <span class="bx bx-user"></span>
                                            </div>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Masukkan email anda">
                                                <span class="bx bx-mail-send"></span>
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password">Kata sandi</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Masukkan kata sandi anda">
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Konfirmasi Kata sandi</label>
                                            <div class="position-relative input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi kata sandi anda">
                                            </div>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <div class="form-check py-1">
                                            <input type="checkbox" class="form-check-input" id="auth-terms-condition-check" required>
                                            <label class="form-check-label" for="auth-terms-condition-check">Saya menyetujui <a href="{{ route('terms.show') }}" class="text-primary">Syarat dan ketentuan</a></label>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" data-single-click>Sign Up</button>
                                        </div>

                                        <div class="mt-2 text-center">
                                            <p class="mb-0">Sudah mempunyai akun? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login </a> </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Leavin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Upi Biy
                                <br> 
                                Image by <a href="https://www.freepik.com/free-vector/white-background-with-blue-tech-hexagon_4775334.htm">starline</a> on Freepik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

@endsection
@section('scripts')
    <script src="{{ URL::asset('build/js/pages/pass-addon.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
