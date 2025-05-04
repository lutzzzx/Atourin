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
                                <h2>Atourin</h2>
                            </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5>Selamat Datang!</h5>
                                        <p class="text-muted">Daftar untuk masuk ke Atourin.</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <form action="index">

                                            <div class="mb-3">
                                                <label class="form-label" for="useremail">Email</label>
                                                <div class="position-relative input-custom-icon">
                                                    <input type="email" class="form-control" id="useremail" placeholder="Masukkan email anda">  
                                                    <span class="bx bx-mail-send"></span>
                                                </div>     
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="username">Nama</label>
                                                <div class="position-relative input-custom-icon">
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Masukkan nama anda">
                                                    <span class="bx bx-user"></span>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="userpassword">Kata sandi</label>
                                                <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                    <span class="bx bx-lock-alt"></span>
                                                    <input type="password" class="form-control" id="password-input" placeholder="Masukkan kata sandi anda">
                                                </div>
                                            </div>

                                            <div class="form-check py-1">
                                                <input type="checkbox" class="form-check-input" id="auth-terms-condition-check">
                                                <label class="form-check-label" for="auth-terms-condition-check">Saya menyetujui <a href="javascript: void(0);" class="text-body">Syarat dan ketentuan</a></label>
                                            </div>



                                            <div class="mt-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light"
                                                    type="submit">Sign Up</button>
                                            </div>

                                            <div class="mt-2 text-center">
                                                <p class="mb-0">Sudah mempunyai akun? <a href="auth-register"
                                                        class="fw-medium text-primary"> Login </a> </p>
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
                                    </script> Atourin. Crafted with <i
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
