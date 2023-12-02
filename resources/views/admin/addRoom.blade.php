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
                    <h3 class="mt-4"> Thêm Phòng</h3>

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

                            <form action="{{ route('insertRoom') }}" method="POST" class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <select class="form-select form-select-sm mb-3 city" aria-label=".form-select-sm"
                                        name="idAccommodationArea">
                                        <option value="" selected>Địa Chỉ</option>
                                        @foreach ($combinedData as $item)
                                            <option value="{{ $item['id'] }}">
                                                {{ $item['city'] }} - {{ $item['district'] }} -
                                                {{ $item['wardCommune'] }} - {{ $item['streetAddress'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-1">
                                    <select class="form-select form-select-sm mb-3 district"
                                        aria-label=".form-select-sm" name="idTotalFloors" id="idTotalFloors">
                                        <option value="" selected>Tổng Tầng</option>
                                        @foreach ($listFloors as $item)
                                            <option value="{{ $item->id }}">{{ $item->sumFloors }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <select class="form-select form-select-sm ward" aria-label=".form-select-sm"
                                        name="idNumberFloors" id="idNumberFloors">
                                        <option value="" selected>Tầng</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select form-select-sm mb-3 district"
                                        aria-label=".form-select-sm" name="idserviceFeeSummary"
                                        id="idserviceFeeSummary">
                                        <option value="" selected>Tính tiền Dịch vụ</option>
                                        @foreach ($serviceFeeSummary as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select form-select-sm mb-3 district"
                                        aria-label=".form-select-sm" name="idServices" id="idServices">
                                        <option value="" selected>Chi Tiết Tiền Dịch Vụ</option>
                                        @foreach ($Services as $item)
                                            <option value="{{ $item->id }}">
                                                Tiền điện: {{ number_format($item->electricityBill, 3) }},
                                                Tiền Nước: {{ number_format($item->waterBill, 3) }},
                                                Tiền wifi: {{ number_format($item->wifiFee, 3) }},
                                                Dọn Dẹp: {{ number_format($item->cleaningFee, 3) }},
                                                Tiền Để Xe: {{ number_format($item->parkingFee, 3) }},
                                                Tiền Phạt: {{ number_format($item->fine, 3) }},
                                                Tiền Khác: {{ number_format($item->other_fees, 3) }}
                                            </option>
                                        @endforeach

                                    </select>


                                </div>
                                <div class="card-body ">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="roomName" class="form-label"><b>Tên phòng, Số
                                                    phòng</b></label>
                                            <input type="text" class="form-control thousands-separator"
                                                name="roomName" id="roomName" required>
                                        </div>

                                        <div class="col-md-6">

                                            <label for="priceRoom" class="form-label"><b>Giá Phòng</b></label>


                                            <input type="text" class="form-control thousands-separator"
                                                name="priceRoom" id="priceRoom" placeholder="chỉ nhập số " required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="interior" class="form-label"><b>Đồ Có Sẵn </b></label>
                                            <input type="text" class="form-control thousands-separator"
                                                name="interior" id="interior" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="capacity" class="form-label"><b>Số Người Ở</b></label>
                                            <select class="form-select form-select-sm mb-3 district"
                                                aria-label=".form-select-sm" name="capacity" id="capacity">
                                                <option value="" selected>Chọn</option>
                                                <option value="1 người">1 người</option>
                                                <option value="2 người">2 người</option>
                                                <option value="3 người">3 người</option>
                                                <option value="4 người">4 người</option>
                                                <option value="5 người">5 người</option>
                                                <option value="6 người">6 người</option>
                                                <option value="7 người">7 người</option>
                                                <option value="8 người">8 người</option>
                                                <option value="9 người">9 người</option>
                                                <option value="10 người">10 người</option>
                                            </select>

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
                                        <th>Địa Chỉ</th>
                                        <th>Tên phòng</th>
                                        <th>Giá Phòng</th>
                                        <th>Tầng</th>
                                        <th>Số người</th>
                                        <th>Đồ Có Sẵn</th>
                                        <th>Tiền dịch vụ</th>
                                        <th>Chi tiết</th>
                                        <th>Tổng tiền dịch</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>


                                <tbody id="tableBody">
                                    <?php $i = 1; ?>
                                    @foreach ($combinedData2 as $item)
                                        <tr class="hidden-row">

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['city'] }} {{ $item['district'] }}
                                                {{ $item['wardCommune'] }} {{ $item['streetAddress'] }}</td>
                                            <td>{{ $item['roomName'] }}</td>
                                            <td>{{ number_format($item['priceRoom'], 3) }}</td>
                                            <td>Tầng {{ $item['floors'] }}</td>
                                            <td>{{ $item['capacity'] }}</td>
                                            <td>{{ $item['interior'] }}</td>
                                            <td>{{ $item['service_fee_summary_name'] }}</td>
                                            <td>
                                                Tiền điện: {{ number_format($item['electricityBill'], 3) }}-
                                                Tiền Nước: {{ number_format($item['waterBill'], 3) }}-
                                                Tiền wifi: {{ number_format($item['wifiFee'], 3) }}-
                                                Dọn Dẹp: {{ number_format($item['cleaningFee'], 3) }}-
                                                Tiền Để Xe: {{ number_format($item['parkingFee'], 3) }}-
                                                Tiền Phạt: {{ number_format($item['fine'], 3) }}-
                                                Tiền Khác: {{ number_format($item['other_fees'], 3) }}
                                            </td>
                                            <td>{{ number_format($item['sumServices'], 3) }}</td>
                                            <td>
                                                <a href="{{ route('DeleteId', ['id' => $item['id']]) }}"
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

    {{-- <script>
        // Hàm để thêm dấu phẩy vào giá trị số
        function addCommas(inputId) {
            const inputElement = document.getElementById(inputId);
            let value = inputElement.value.replace(/\D/g, ''); // Lấy ra chỉ số và loại bỏ các ký tự không phải số
            inputElement.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Thêm dấu phẩy vào hàng nghìn
        }
        document.getElementById('priceRoom').addEventListener('input', function() {
            addCommas('priceRoom');
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#idTotalFloors').on('change', function() {
                var totalFloorId = $(this).val();
                if (totalFloorId) {
                    // Send an Ajax request to fetch the corresponding "Tầng" values
                    $.ajax({
                        type: "GET",
                        url: "/get-number-floors",
                        data: {
                            totalFloorId: totalFloorId
                        },
                        success: function(data) {
                            // Clear and populate the "Tầng" dropdown with the received data
                            var numberFloorsDropdown = $('#idNumberFloors');
                            numberFloorsDropdown.empty();
                            numberFloorsDropdown.append($(
                                '<option value="" selected>Tầng</option>'));

                            $.each(data, function(key, value) {
                                numberFloorsDropdown.append($('<option value="' + key +
                                    '">' + value + '</option>'));
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
