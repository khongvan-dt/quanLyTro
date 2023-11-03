<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            <button class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('addRoom') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Phòng
                        </a>
                        <a class="nav-link" href="{{ route('addAddres') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Địa Chỉ
                        </a>
                        <a class="nav-link" href="{{ route('addTotalFloor') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Tổng Số Tầng
                        </a>
                        <a class="nav-link" href="{{ route('addServiceFeeSummary') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Danh sách các tùy chọn tính tiền
                        </a>
                        <a class="nav-link" href="{{ route('addservices') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Tên Khoản Tiền Dịch Vụ
                        </a>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> Thêm Phòng</h1>


                    <div class="card mb-4">
                      
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="me-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                        </path>
                                    </svg>
                                    <strong>Thành Công!</strong>Thêm Thông Tin Thành Công!

                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="me-2">
                                        <polygon
                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                        </polygon>
                                        <line x1="15" y1="9" x2="9" y2="15">
                                        </line>
                                        <line x1="9" y1="9" x2="15" y2="15">
                                        </line>
                                    </svg>
                                    <strong>Lỗi!</strong> Thêm Thông Tin!
                                </div>
                            @endif
                            @if (session('errorDelete'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-2">
                                        <polygon
                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                        </polygon>
                                        <line x1="15" y1="9" x2="9" y2="15">
                                        </line>
                                        <line x1="9" y1="9" x2="15" y2="15">
                                        </line>
                                    </svg>
                                    <strong>Lỗi!</strong> Xóa Thông Tin Thất Bại!
                                </div>
                            @endif
                            @if (session('successUpdelete'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                        </path>
                                    </svg>
                                    <strong>Thành Công!</strong>Sửa Thông Tin Thành Công!

                                </div>
                            @endif
                            @if (session('successDelete'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11">
                                        </path>
                                    </svg>
                                    <strong>Thành Công!</strong>Xóa Thông Tin Thành Công!

                                </div>
                            @endif

                            <form action="{{ route('insertAddress') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-8">
                                    <select class="form-select form-select-sm mb-3 city" aria-label=".form-select-sm"
                                        name="city">

                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <select class="form-select form-select-sm mb-3 district"
                                        aria-label=".form-select-sm" name="district" id="totalFloors">
                                        <option value="" selected>Tổng Tầng</option>
                                        @foreach ($listFloors as $item)
                                            <option value="{{ $item->id }}">{{ $item->sumFloors }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="col-md-1">
                                    <select class="form-select form-select-sm ward" aria-label=".form-select-sm"
                                        name="commune" id="numberFloors">
                                        <option value="" selected>Tầng</option>
                                    </select>

                                </div>
                                <div class="col-12">
                                    <label for="inputAddress2" class="form-label"></label>
                                    <input type="text" class="form-control" name="specifically"
                                        id="inputAddress2" placeholder="Đường Cụ Thể">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">

                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Thành Phố</th>
                                        <th>Quận/Huyện</th>
                                        <th>Phường/Xã</th>
                                        <th>Đường</th>
                                        <th>Sửa</th>

                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr class="hidden-row">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/global.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>



    {{-- <script src="{{ asset('getApiJs/numberFloor.js') }}"></script> --}}
    <script src="{{ asset('getApiJs/getRoom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#totalFloors').change(function() {
                var selectedTotalFloorId = $(this).val();

                $.ajax({
                    url: '/api/get-number-floors', // Đúng đường dẫn API đã đăng ký
                    method: 'GET',
                    data: {
                        totalFloorId: selectedTotalFloorId
                    },
                    success: function(data) {
                        // Xóa tất cả các tùy chọn hiện có trong dropdown "Tầng"
                        $('#numberFloors').empty();

                        // Thêm các tùy chọn mới dựa trên dữ liệu từ API
                        $.each(data, function(key, value) {
                            $('#numberFloors').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Lỗi khi gửi yêu cầu AJAX');
                    }
                });
            });
        });
    </script>
</body>

</html>
