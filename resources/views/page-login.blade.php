<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from yashadmin.w3itexpert.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 17:53:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Title -->
    <title>YashAdmin Laravel | Login</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">
    <meta name="csrf-token" content="r6S5gWpEDiE5HANAJUMegglZVuuRWae9LNMMQKcm">
    <meta name="keywords"
        content="bootstrap, courses, education admin template, educational, instructors, learning, learning admin, learning admin theme, learning application, lessons, lms admin template, lms rails, quizzes ui, school admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Some description for the page">
    <meta property="og:title" content="Yashadmin Customer Relationship Management Laravel Admin">
    <meta property="og:description" content="YashAdmin Laravel | Login">
    <meta property="og:image" content="https://yashadmin.dexignzone.com/xhtml/page-error-404.html">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons Icon -->
    <!-- Favicons Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

    <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="vh-100">
    <div class="page-wraper">

        <!-- Content -->
        <div class="browse-job login-style3">
            <!-- Coming Soon -->
            <div class="bg-img-fix overflow-hidden"
                style="background:#fff url(public/images/background/bg6.jpg); height: 100vh;">
                <div class="row gx-0">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                            style="max-height: 653px;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div class="login-form style-2">

                                    <div class="card-body">
                                        <div class="logo-header">
                                            <a href="index.html" class="logo"><img
                                                    src="public/images/logo/logo-full.png" alt=""
                                                    class="width-230 light-logo"></a>
                                            <a href="index.html" class="logo"><img
                                                    src="public/images/logo/logofull-white.png" alt=""
                                                    class="width-230 dark-logo"></a>
                                        </div>

                                        <nav>
                                            <form action="{{ route('login') }}" method="post">

                                                <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
                                                    @if (session('success'))
                                                        <div class="alert alert-success alert-dismissible fade show">
                                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                                stroke="currentColor" stroke-width="2" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="me-2">
                                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                                <path
                                                                    d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                                                </path>
                                                            </svg>
                                                            <strong>Thành Công!</strong>Tạo Tài Khoản Thành Công!

                                                        </div>
                                                    @endif
                                                    <div class="tab-content w-100" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-personal"
                                                            role="tabpanel" aria-labelledby="nav-personal-tab">


                                                            <input type="hidden" name="_token"
                                                                value="r6S5gWpEDiE5HANAJUMegglZVuuRWae9LNMMQKcm">
                                                            <h3 class="form-title m-t0">Personal Information</h3>
                                                            <div class="dz-separator-outer m-b5">
                                                                <div class="dz-separator bg-primary style-liner">
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <input type="text" class="form-control" required
                                                                    name="name">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <input type="password" class="form-control" required
                                                                    name="password">
                                                            </div>
                                                            <div class="form-group text-left mb-5 forget-main">
                                                                <button type="submit" class="btn btn-primary">Sign
                                                                    Me
                                                                    In</button>
                                                                @if (session('login_failed'))
                                                                    <div
                                                                        class="alert alert-danger alert-dismissible fade show">
                                                                        <svg viewBox="0 0 24 24" width="24"
                                                                            height="24" stroke="currentColor"
                                                                            stroke-width="2" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" class="me-2">
                                                                            <polygon
                                                                                points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                                            </polygon>
                                                                            <line x1="15" y1="9"
                                                                                x2="9" y2="15"></line>
                                                                            <line x1="9" y1="9"
                                                                                x2="15" y2="15"></line>
                                                                        </svg>
                                                                        <strong>Lỗi!</strong>Đăng nhập thất bại

                                                                    </div>
                                                                @endif

                                                                <button
                                                                    class="nav-link m-auto btn tp-btn-light btn-primary forget-tab "
                                                                    id="nav-forget-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#nav-forget" type="button"
                                                                    role="tab" aria-controls="nav-forget"
                                                                    aria-selected="false">Forget Password
                                                                    ?</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @csrf
                                            </form>

                                            <div class="dz-social ">
                                                <h5 class="form-title fs-20">Sign In With</h5>
                                                <ul class="dz-social-icon dz-border dz-social-icon-lg text-white">
                                                    <li><a target="_blank" href="https://www.facebook.com/"
                                                            class="fab fa-facebook-f btn-facebook"></a>
                                                    </li>
                                                    <li><a target="_blank" href="https://www.google.com/"
                                                            class="fab fa-google-plus-g btn-google-plus"></a>
                                                    </li>
                                                    <li><a target="_blank" href="https://www.linkedin.com/"
                                                            class="fab fa-linkedin-in btn-linkedin"></a>
                                                    </li>
                                                    <li><a target="_blank" href="https://twitter.com/"
                                                            class="fab fa-twitter btn-twitter"></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="text-center bottom">
                                                <button class="btn btn-primary button-md btn-block" id="nav-sign-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-sign" type="button"
                                                    role="tab" aria-controls="nav-sign"
                                                    aria-selected="false">Create an account</button>

                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-forget" role="tabpanel"
                                        aria-labelledby="nav-forget-tab">
                                        <form class="dz-form">
                                            <input type="hidden" name="_token"
                                                value="r6S5gWpEDiE5HANAJUMegglZVuuRWae9LNMMQKcm">
                                            <h3 class="form-title m-t0">Forget Password ?</h3>
                                            <div class="dz-separator-outer m-b5">
                                                <div class="dz-separator bg-primary style-liner">
                                                </div>
                                            </div>
                                            <p>Enter your e-mail address below to reset your
                                                password.
                                            </p>
                                            <div class="form-group mb-4">
                                                <input name="dzName" required="" class="form-control"
                                                    placeholder="Email Address" type="text">
                                            </div>
                                            <div class="form-group clearfix text-left">
                                                <button class=" active btn btn-primary" id="nav-personal-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-personal"
                                                    type="button" role="tab" aria-controls="nav-personal"
                                                    aria-selected="true">Back</button>
                                                <button class="btn btn-primary float-end">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                            </nav>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- Full Blog Page Contant -->
    </div>
    <!-- Content END-->
    </div>
    <!--**********************************
 Scripts
***********************************-->

</body>

<!-- Mirrored from yashadmin.w3itexpert.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 17:53:41 GMT -->

</html>
