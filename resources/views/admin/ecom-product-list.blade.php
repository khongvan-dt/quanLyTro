<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Static Navigation - SB Admin</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
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
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Static Navigation
                        </a>


                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            <div class="container-fluid px-4">
                <h1 class="mt-4">Static Navigation</h1>

            </div>


            <div class="container-fluid mh-auto">

                <div class="row">
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/2.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$320.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/3.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                    <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$325.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/4.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12 ">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$480.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/5.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$658.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/6.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$280.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                                <img class="img-fluid" src="public/images/product/7.jpg"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="ecom-product-detail.html">Solid Women's V-neck Dark
                                                    T-Shirt</a></h4>
                                            <div class="comment-review star-rating">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span class="review-text">(34 reviews) / </span><a
                                                    class="product-review" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#reviewModal">Write a review?</a>
                                                <p class="price">$600.00</p>
                                            </div>
                                            <p>Availability: <span class="item"> In stock <i
                                                        class="fa fa-check-circle text-success"></i></span></p>
                                            <p>Product code: <span class="item">0405689</span> </p>
                                            <p>Brand: <span class="item">Lee</span></p>
                                            <p class="text-content">There are many variations of passages of Lorem
                                                Ipsum available, but the majority have suffered alteration in some form,
                                                by injected humour, or randomised words.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- review -->
                    <div class="modal fade" id="reviewModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Review</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" name="_token"
                                            value="r6S5gWpEDiE5HANAJUMegglZVuuRWae9LNMMQKcm">
                                        <div class="text-center mb-4">
                                            <img class="img-fluid rounded" width="78"
                                                src="public/images/avatar/1.jpg" alt="DexignZone">
                                        </div>
                                        <div class="mb-3">
                                            <div class="rating-widget mb-4 text-center">
                                                <!-- Rating Stars Box -->
                                                <div class="rating-stars">
                                                    <ul id="stars">
                                                        <li class="star" title="Poor" data-value="1">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Fair" data-value="2">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Good" data-value="3">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="Excellent" data-value="4">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                        <li class="star" title="WOW!!!" data-value="5">
                                                            <i class="fa fa-star fa-fw"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                        </div>
                                        <button class="btn btn-success btn-block">RATE</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
