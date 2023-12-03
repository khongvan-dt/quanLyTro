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
        <a class="navbar-brand ps-3">Quản Lý Phòng Trọ</a>
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
                    <h3 class="mt-4">  Đóng Tiền</h3>
                    <h5><b style="color: green;">Tổng Thu:{{ number_format($totalPriceRoom) }}</b></h5>

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
                            @if (session('errorDelete1'))
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
                                    <strong>Lỗi!</strong> Xóa Thông Tin Thất Bại Do Còn Đang Sử Dụng!
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

                            <form action="{{ route('insertCollectDayMoney') }}" method="POST" class="row g-3">
                            @csrf


                            <div class="card-body ">

                               
                                <div class="row">
                                    <div class="col-md-2">
                                        <select class="form-select form-select-sm mb-3 district" aria-label=".form-select-sm" name="idRoomContract" id="idServices" onchange="updateFields()">
                                            <option value="" selected>Tên phòng</option>
                                            @foreach ($listCollectDay as $item)
                                                <option value="{{ $item->idRoomContract }}" data-price="{{ number_format($item->priceRoom, 3) }}" data-address="{{ $item->streetAddress }}" data-resident="{{ $item->residentName }}">
                                                    {{ $loop->iteration }}: phòng {{ $item->roomName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="residentName" class="form-control thousands-separator" id="residentName" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="priceRoom" class="form-control thousands-separator" id="priceRoom" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="streetAddress" class="form-control thousands-separator" id="streetAddress" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" name="date" class="form-control thousands-separator" id="date" required>
                                    </div>
                                </div>

                                <div class="col-12" style="margin-top: 10px">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
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
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Tên phòng</th>
                                        <th>Giá Phòng</th>
                                        <th>Tiền dịch vụ</th>
                                        <th>Địa Chỉ</th>
                                        <th>Ngày Đóng</th>
                                        <th>Tổng</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php $i = 1; ?>
                                    @foreach ($listCollectDay2 as $item)
                                        <tr class="hidden-row">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->residentName }}</td>
                                            <td>{{ $item->roomName }}</td>
                                            <td>{{ number_format($item->priceRoom) }}</td>
                                            <td>{{ number_format($item->sumServices) }}</td>
                                            <td>{{ $item->streetAddress }}</td>
                                            
                                            @if ($item->collectmoney_id)
                                                <td>{{ \Carbon\Carbon::parse($item->collectmoney_time)->format('d/m/Y') }}</td>
                                            @else
                                                <td>Chưa đóng</td>
                                            @endif
                                            <td>{{ number_format($item->sumServices+$item->priceRoom) }}</td>

                                            <td>
                                                <a href="{{ route('deleteCollectmoney', ['id' => $item->idRoomContract]) }}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    class="btn btn-primary main__table-btn main__table-btn--banned open-modal">
                                                    Xóa
                                                </a>
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
    <script src="{{ asset('getApiJs/select.js') }}"></script>
</body>

</html>
