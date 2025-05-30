@extends('layouts.master-without-nav')
@section('title')
    Login
@endsection
@section('page-title')
    Login
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
                                        <h5>Selamat Datang, lagi!</h5>
                                        <p class="text-muted">Login untuk masuk ke Leavin.</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="index">

                                            <div class="mb-3">
                                                <label class="form-label" for="username">Email</label>
                                                <div class="position-relative input-custom-icon">
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Masukkan email anda">
                                                    <span class="bx bx-user"></span>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="auth-recoverpw"
                                                        class="text-muted text-decoration-underline">Lupa kata sandi?</a>
                                                </div>
                                                <label class="form-label" for="password-input">Kata sandi</label>
                                                <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                    <span class="bx bx-lock-alt"></span>
                                                    <input type="password" class="form-control" id="password-input"
                                                        placeholder="Masukkan kata sandi anda">
                                                    <button type="button"
                                                        class="btn btn-link position-absolute h-100 end-0 top-0"
                                                        id="password-addon">
                                                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="form-check py-1">
                                                <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                                <label class="form-check-label" for="auth-remember-check">Ingat saya</label>
                                            </div>

                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                    type="submit">Log In</button>
                                            </div>

                                            <div class="mt-2 text-center">
                                                <p class="mb-0">Belum mempunyai akun? <a href="auth-register"
                                                        class="fw-medium text-primary"> Daftar sekarang </a> </p>
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
                                    </script> Leavin. Crafted with <i
                                        class="mdi mdi-heart text-danger"></i> by Upi Biy
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
