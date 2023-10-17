<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from yashadmin.w3itexpert.com/laravel/demo/page-register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 17:56:39 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Title -->
    <title> Register</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>


<body class="vh-100" style="background-image:url('public/images/bg.png'); background-position:center;">
    <div class="h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="public/images/logo/logo-full.png"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username"
                                                name="username" required>
                                        </div>
                                        @if (session('Error1'))
                                            <div class="alert alert-danger" style="color: white">
                                                Tên tài khoản đã tồn tại!
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com"
                                                name="email" required>
                                        </div>
                                        @if (session('Error2'))
                                            <div class="alert alert-danger" style="color: white">
                                                Email đã tồn tại!
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" placeholder="Password"
                                                name="password" required>
                                        </div>
                                        @if (session('Error3'))
                                            <div class="alert alert-danger" style="color: white">
                                                Mật khẩu phải có ít nhất 8 ký tự!
                                            </div>
                                        @endif
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>

                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="page-login.html">Sign
                                                in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
