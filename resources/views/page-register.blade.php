<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/oddo-2-html/HTML/main/register-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 13:04:27 GMT -->

<head>
    <title>Tạo Tài Khoản</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body id="top">
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Tạo Tài Khoản Đăng Nhập</p>

                                    <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        @if (session('Error1'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                stroke="currentColor" stroke-width="2" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="15" y1="9" x2="9" y2="15">
                                                </line>
                                                <line x1="9" y1="9" x2="15" y2="15">
                                                </line>
                                            </svg>
                                            <strong>Lỗi!</strong> Tên tài khoản đã tồn tại!

                                        </div>
                                    @endif
                                    @if (session('Error2'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                stroke="currentColor" stroke-width="2" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="15" y1="9" x2="9" y2="15">
                                                </line>
                                                <line x1="9" y1="9" x2="15" y2="15">
                                                </line>
                                            </svg>
                                            <strong>Lỗi!</strong> Email đã tồn tại!

                                        </div>
                                    @endif
                                    @if (session('Error3'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                stroke="currentColor" stroke-width="2" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="15" y1="9" x2="9" y2="15">
                                                </line>
                                                <line x1="9" y1="9" x2="15" y2="15">
                                                </line>
                                            </svg>
                                            <strong>Lỗi!</strong> Mật khẩu phải có ít nhất
                                            8 ký tự!
                                        </div>
                                    @endif

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                 <input class="form-control" id="inputFirstName" type="text"
                                                placeholder="Enter your first name" name="username" required />
                                            <label for="inputFirstName">First name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control" id="inputEmail" type="email"
                                                placeholder="name@example.com" name="email" required />
                                            <label for="inputEmail">Email address</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Create a password" name="password" required />
                                            <label for="inputPassword">Password</label>
                                            </div>
                                        </div>

                                       

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="save" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <label class="form-check-label" for="form2Example3">
                                            <a href="{{ route('pageLogin') }}">Have an account? Go to
                                                login</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="{{asset('images/3.png')}}"
                                        class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
