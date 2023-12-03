<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Address</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
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
                    required aria-describedby="btnNavbarSearch" />
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
                    <h3 class="mt-4">Sửa Thông Tin Địa Chỉ</h3>
                    <div class="card mb-4">

                        <div class="card-body">


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
                                    <strong>Lỗi!</strong> Sửa Thông Tin Không Thành Công!
                                </div>
                            @endif
                            <form action="{{ route('updateAddress', ['id' => $firstItemId]) }}" method="POST"
                                class="row g-3">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm mb-3 city"
                                            aria-label=".form-select-sm" name="city">
                                            <option value="" required selected>Chọn tỉnh thành</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm mb-3 district"
                                            aria-label=".form-select-sm" name="district">
                                            <option value="" required selected>Chọn quận huyện</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm ward" aria-label=".form-select-sm"
                                            name="commune">
                                            <option value="" required selected>Chọn phường xã</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="specifically"
                                            value="{{ $idAddress->streetAddress }}" id="inputAddress2"
                                            placeholder="Đường Cụ Thể" required>

                                    </div>
                                </div>
                                <div class="row g-4">

                                    <div class="col-md-3">
                                      Tầng số: <input type="number" class="form-control" name="idNumberFloors"
                                            id="idNumberFloors" placeholder=" phòng ở tầng số" required value="{{$room->idNumberFloors}}">
                                    </div>
                                    <div class="col-md-3">
                                        Tên phòng: <input type="text" class="form-control thousands-separator"
                                            name="roomName" id="roomName" placeholder=" Tên phòng" value="{{$room->roomName}}" required>
                                    </div>
                                    <div class="col-md-3">
                                        giá phòng:  <input type="text" class="form-control thousands-separator"
                                            name="priceRoom" id="priceRoom" placeholder="giá phòng" value="{{$room->priceRoom}}" required>
                                    </div>

                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm mb-3 " aria-label=".form-select-sm"
                                            name="capacity">
                                            <option selected>Số Người Có Thể Ở</option>
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
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        Nội thất
                                        <input type="text" class="form-control thousands-separator"
                                            name="interior" id="interior" placeholder="Nội thất" value="{{$room->interior}}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm mb-3 " aria-label=".form-select-sm"
                                            name="idserviceFeeSummary" id="idserviceFeeSummary">
                                            <option value="{{$room->interior}}" selected>Tính tiền Dịch vụ</option>
                                            @foreach ($serviceFeeSummary as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-select form-select-sm mb-3 " aria-label=".form-select-sm"
                                            name="idServices" id="idServices">
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
    {{-- <script src="{{ asset('js/global.min.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var cities = document.querySelectorAll(".city");
        var districts = document.querySelectorAll(".district");
        var wards = document.querySelectorAll(".ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);

        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                cities.forEach(function(citySelect) {
                    citySelect.options[citySelect.options.length] = new Option(x.Name, x.Id);
                });
            }

            cities.forEach(function(citySelect) {
                citySelect.onchange = function() {
                    districts.forEach(function(districtSelect) {
                        districtSelect.length = 1;
                    });
                    wards.forEach(function(wardSelect) {
                        wardSelect.length = 1;
                    });

                    if (this.value != "") {
                        const result = data.filter(n => n.Id === this.value);

                        districts.forEach(function(districtSelect) {
                            for (const k of result[0].Districts) {
                                districtSelect.options[districtSelect.options.length] = new Option(k
                                    .Name, k.Id);
                            }
                        });
                    }
                };
            });

            districts.forEach(function(districtSelect) {
                districtSelect.onchange = function() {
                    wards.forEach(function(wardSelect) {
                        wardSelect.length = 1;
                    });

                    const dataCity = data.filter((n) => n.Id === cities[0].value);
                    if (this.value != "") {
                        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                        wards.forEach(function(wardSelect) {
                            for (const w of dataWards) {
                                wardSelect.options[wardSelect.options.length] = new Option(w.Name, w
                                    .Id);
                            }
                        });
                    }
                };
            });
        }
    </script>
    <script src="{{ asset('getApiJs/getAddress.js') }}"></script>



</body>

</html>
