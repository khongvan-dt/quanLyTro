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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


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
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" href="{{ route('logout') }}" role="button">
                    <i class="fa-solid fa-right-from-bracket"></i> 
                </a>
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Thêm Thông Tin
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
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
                            </nav>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3 class="mt-4"> Thêm Tên Khoản Tiền Dịch Vụ</h3>
                    <small>***(Chỉ ghi số tiền không ghi chữ)***</small>

                    <div class="card mb-4">

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" class="me-2">
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

                            <form action="{{ route('insertService') }}" method="POST" class="row g-3">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="electricityBill" class="form-label"><b>Tiền 1 số điện:</b></label>
                                        <input type="text" class="form-control thousands-separator" name="electricityBill"
                                            id="electricityBill"
                                            placeholder="Tiền 1 số điện (nếu có, không có không cần điền)"
                                            >
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label  for="waterBill" class="form-label"><b>Tiền một khối nước:</b></label>
                                        <input type="text" class="form-control thousands-separator" name="waterBill" id="waterBill"
                                            placeholder="Tiền một khối nước (nếu có, không có không cần điền)"
                                            >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="wifiFee" class="form-label"><b>Tiền wifi:</b></label>
                                        <input type="text" class="form-control thousands-separator" name="wifiFee"
                                            id="wifiFee" placeholder="Tiền wifi (nếu có, không có không cần điền)"
                                           >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cleaningFee" class="form-label"><b>Tiền dọn dẹp:</b></label>
                                        <input type="text" class="form-control thousands-separator"
                                            name="cleaningFee" id="cleaningFee"
                                            placeholder="Tiền dọn dẹp (nếu có, không có không cần điền)"
                                           >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="parkingFee" class="form-label"><b>Tiền để xe:</b></label>
                                        <input type="text" class="form-control thousands-separator"
                                            name="parkingFee" id="parkingFee"
                                            placeholder="Tiền để xe (nếu có, không có không cần điền)"
                                            >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fine" class="form-label"><b>Tiền phạt:</b></label>
                                        <input type="text" class="form-control thousands-separator" name="fine"
                                            id="fine" placeholder="Tiền phạt (nếu có, không có không cần điền)"
                                            >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="other_fees" class="form-label"><b>Tiền khác:</b></label>
                                        <input type="text" class="form-control" name="other_fees" id="other_fees"
                                            placeholder="Tiền khác (nếu có, không có không cần điền)"
                                            >
                                    </div>
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
                                        <th>ID</th>v
                                        <th>Tiền/Điện</th>
                                        <th>Nước/Khối</th>
                                        <th>Tiền wifi</th>
                                        <th>Vệ Sinh</th>
                                        <th>Để Xe</th>
                                        <th>Phạt</th>
                                        <th>Khoản Khác</th>
                                        <th>Tổng Tiền</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php $i = 1; ?>
                                    @foreach ($listServices as $item)
                                        <tr>
                                            <td> <?php echo $i++ ?></td>
                                            <td>{{ number_format($item['electricityBill'], 3) }} VND</td>
                                            <td>{{ number_format($item['waterBill'], 3) }} VND</td>
                                            <td>{{ number_format($item['wifiFee'], 3) }} VND</td>
                                            <td>{{ number_format($item['cleaningFee'], 3) }} VND</td>
                                            <td>{{ number_format($item['parkingFee'], 3) }} VND</td>
                                            <td>{{ number_format($item['fine'], 3) }} VND</td>
                                            <td>{{ number_format($item['other_fees'], 3) }} VND</td>
                                            <td><b>{{ number_format($item['sumServices'], 3) }} VND</b></td>
                                            <td>
                                                <a class="btn btn-primary" href="/editService/{{ $item['id'] }}">Sửa</a>
                                                <a href="{{ route('deleteService', ['id' => $item->id]) }}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-primary main__table-btn main__table-btn--banned open-modal">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Hàm để thêm dấu phẩy vào giá trị số
        function addCommas(inputId) {
            const inputElement = document.getElementById(inputId);
            let value = inputElement.value.replace(/\D/g, ''); // Lấy ra chỉ số và loại bỏ các ký tự không phải số
            inputElement.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Thêm dấu phẩy vào hàng nghìn
        }

        // Gán sự kiện 'input' cho các trường nhập liệu
        document.getElementById('electricityBill').addEventListener('input', function() {
            addCommas('electricityBill');
        });

        document.getElementById('waterBill').addEventListener('input', function() {
            addCommas('waterBill');
        });
        document.getElementById('wifiFee').addEventListener('input', function() {
            addCommas('wifiFee');
        });
        document.getElementById('cleaningFee').addEventListener('input', function() {
            addCommas('cleaningFee');
        });
        document.getElementById('parkingFee').addEventListener('input', function() {
            addCommas('parkingFee');
        });
        document.getElementById('fine').addEventListener('input', function() {
            addCommas('fine');
        });
        document.getElementById('other_fees').addEventListener('input', function() {
            addCommas('other_fees');
        });
    </script>


</body>

</html>
