
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="PIXINVENT">
    <title>Register - Klinik Sehat</title>
    <link rel="apple-touch-icon" href="/img/health.png">
    <link rel="shortcut icon" type="image/x-icon" href="/img/health.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <a class="brand-logo" href="#">
                            <img src="../../../img/health.png" alt="" width="50">
                            <h2 class="brand-text ms-1 align-bottom">Klinik Sehat</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="/admin/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Selamat Datang di Klinik Sehat! 👋</h2>
                                <p class="card-text mb-2">Buat akun baru untuk membuat janji temu.</p>
                                <form class="auth-login-form mt-2" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="name">Nama</label>
                                        <input value="{{ old('name', '') }}" class="form-control @error('name') is-invalid @enderror" id="name" type="name" name="name" placeholder="Nama" aria-describedby="name" autofocus="" tabindex="0" required/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="gender">Jenis Kelamin</label>
                                        <div class="position-relative">
                                            <select class="select2 form-select select2-hidden-accessible"
                                                name="gender" id="select2-basic" data-select2-id="select2-basic"
                                                tabindex="1" aria-hidden="true" required>
                                                @php
                                                    $val = old('gender');
                                                @endphp
                                                <option value="">Pilih Jenis Kelamin :</option>
                                                <option value="Laki-laki" {{ $val == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="Perempuan" {{ $val == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="email">Email</label>
                                        <input value="{{ old('email', '') }}" class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="Email" aria-describedby="email" autofocus="" tabindex="2" required />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="phone_number">No Telepon</label>
                                        <input value="{{ old('phone_number', '') }}" class="form-control prefix-mask @error('phone_number') is-invalid @enderror" id="prefix" type="phone_number" name="phone_number" placeholder="Nomor Telepon" aria-describedby="phone_number" autofocus="" tabindex="3" required />
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                            {{-- <a href="#">
                                                <small>Forgot Password?</small>
                                            </a> --}}
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="4" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password_confirmation">Confirmation Password</label>
                                            {{-- <a href="#">
                                                <small>Forgot Password?</small>
                                            </a> --}}
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" name="password_confirmation" placeholder="············" aria-describedby="password_confirmation" tabindex="5" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox" tabindex="6" />
                                            <label class="form-check-label" for="remember-me"> Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                                </form>
                                <p class="text-center mt-2"><span>New on our platform?</span><a href="auth-register-cover.html"><span>&nbsp;Create an account</span></a></p>
                                {{-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a><a class="btn btn-google" href="#"><i data-feather="mail"></i></a><a class="btn btn-github" href="#"><i data-feather="github"></i></a></div> --}}
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/admin/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/admin/app-assets/js/scripts/forms/form-input-mask.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admin/app-assets/js/core/app-menu.js"></script>
    <script src="/admin/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/admin/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/admin/app-assets/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
