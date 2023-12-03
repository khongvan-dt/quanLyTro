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
        <a class="navbar-brand ps-3" >Quản Lý Phòng Trọ</a>
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

                        <a class="nav-link" href="{{ route('addAddres') }}">
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
                                <a class="nav-link" href="{{ route('addservices') }}">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                                    Thêm Tên Khoản Tiền Dịch Vụ
                                </a>
                                <a class="nav-link" href="{{ route('Path') }}">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                                    Thêm Đường dân file lưu hợp đồng
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('tenant') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Thêm Người Thuê
                        </a>

                        <a class="nav-link" href="{{ route('collectmoney') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Đóng Tiền
                        </a>
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
                                    <strong>Lỗi!</strong> Sửa Thông Tin Không Thành Công!
                                </div>
                            @endif

                            <form action="{{ route('updateServices', ['id' => $service->id]) }}" method="POST"
                                class="row g-3">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="electricityBill" class="form-label"><b>Tiền 1 số điện</b></label>
                                        <input type="text" class="form-control thousands-separator" name="electricityBill"
                                            id="electricityBill" required
                                            placeholder="Tiền 1 số điện (nếu có, không có không cần điền)"
                                            value="{{$service->electricityBill }}">
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label  for="waterBill" class="form-label"><b>Tiền một khối nước</b></label>
                                        <input type="text" class="form-control thousands-separator" name="waterBill" id="waterBill"
                                        required   placeholder="Tiền một khối nước (nếu có, không có không cần điền)"
                                            value="{{$service->waterBill}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="wifiFee" class="form-label"><b>Tiền wifi</b></label>
                                        <input type="text" class="form-control thousands-separator" name="wifiFee"
                                        required   id="wifiFee" placeholder="Tiền wifi (nếu có, không có không cần điền)"
                                            value="{{$service->wifiFee}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cleaningFee" class="form-label"><b>Tiền dọn dẹp</b></label>
                                        <input type="text" class="form-control thousands-separator"
                                            name="cleaningFee" id="cleaningFee"
                                            required  placeholder="Tiền dọn dẹp (nếu có, không có không cần điền)"
                                            value="{{$service->cleaningFee }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="parkingFee" class="form-label"><b>Tiền để xe</b></label>
                                        <input type="text" class="form-control thousands-separator"
                                            name="parkingFee" id="parkingFee"
                                            required   placeholder="Tiền để xe (nếu có, không có không cần điền)"
                                            value="{{$service->parkingFee }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fine" class="form-label"><b>Tiền phạt</b></label>
                                        <input type="number" class="form-control thousands-separator" name="fine"
                                        required    id="fine" placeholder="Tiền phạt (nếu có, không có không cần điền)"
                                            value="{{$service->fine }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="other_fees" class="form-label"><b>Tiền khác</b></label>
                                        <input type="text" class="form-control" name="other_fees" id="other_fees"
                                        required   placeholder="Tiền khác (nếu có, không có không cần điền)"
                                            value="{{$service->other_fees }}">
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </form>
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
    {{-- <script>
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

        // Gán sự kiện cho các trường nhập liệu khác tương tự
    </script> --}}



</body>

</html>
