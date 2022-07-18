<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('frontend/favicon.ico') }}">

    <!--Title-->
    <title>Divano</title>

    <!--CSS bundle -->
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/animate.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/font-awesome.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/ion-range-slider.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/linear-icons.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/owl.carousel.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('frontend/css/theme.css') }}" />

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .active-click a {
            background-color: #3c5570;
            color: #ffffff;
            border-radius: 6px;
        }

    </style>

</head>
@php
$url = Request::url();
@endphp

<body>

    <div class="page-loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="wrapper">

        <div>

            <!-- ======================== Navigation ======================== -->

            <nav>

                <div class="container">

                    <a href="{{ route('home.index') }}" class="logo"><img
                            src="{{ asset('frontend/assets/images/divano-logo.svg') }}" alt="" width="130"
                            height="55"></a>

                    <!-- ==========  Top navigation ========== -->

                    <div class="navigation navigation-top clearfix">
                        <ul>
                            <!--add active classfor current page-->
                            <li class="left-side">
                                <a href="{{ route('home.index') }}" class="logo-icon"><img
                                        src="{{ asset('frontend/assets/images/divano-logo.svg') }}"
                                        alt="Alternate Text" width="150" height="34"></a>
                            </li>
                            @if (Auth::check())
                                <li><a href="{{ route('about.create') }}"><i class="icon icon-user"></i></a>
                            @endif
                            </li>
                            <li><a href="javascript:void(0);" class="open-search"><i
                                        class="icon icon-magnifier"></i></a></li>
                            <li><a href="javascript:void(0);" class="open-wish"><i class="icon icon-heart"></i>
                                    <span id="countwishlist">0</span></a></li>
                            <li><a class="open-cart"><i class="icon icon-cart"></i>
                                    <span id="countcart">0</span></a></li>
                        </ul>
                    </div>

                    <!-- ==========  Main navigation ========== -->

                    <div class="navigation navigation-main">
                        <a href="#" class="open-login"><i class="icon icon-user"></i></a>
                        <a href="#" class="open-search"><i class="icon icon-magnifier"></i></a>
                        <a href="#" class="open-cart"><i class="icon icon-cart"></i> <span
                                id="countcart">0</span></a>
                        <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

                        <div class="floating-menu">
                            <!--mobile toggle menu trigger-->
                            <div class="close-menu-wrapper">
                                <span class="close-menu"><i class="icon icon-cross"></i></span>
                            </div>
                            <ul>
                                <li class="{{ $url == route('home.index') ? 'active-click' : '' }}">
                                    <a href="{{ route('home.index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="#">Pages <span class="open-dropdown"><i
                                                class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown navbar-dropdown-single">
                                        <div class="navbar-box">
                                            <div class="box-full">
                                                <div class="box clearfix">
                                                    <ul>
                                                        <li class="label">Addons</li>
                                                        <li><a href="{{ route('about.index') }}">Về chúng tôi</a></li>
                                                        <li><a href="{{ route('contact.index') }}">Vị trí </a></li>
                                                        <li><a href="#">Not found 404</a></li>
                                                        <li><a href="{{ route('login.index') }}">Login &amp;
                                                                Register</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}">Blog</span></a>
                                </li>
                                <li>
                                    <a href="#">Shop <span class="open-dropdown"><i
                                                class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown navbar-dropdown-single">
                                        <div class="navbar-box">
                                            <div class="box-full">
                                                <div class="box clearfix">
                                                    <ul>
                                                        <li class="label">Sản phẩm</li>
                                                        <li><a href="{{ route('categories.index') }}">Danh mục sản phẩm</a></li>
                                                        <li><a href="{{ route('blog.index') }}">Sản phẩm bán chạy</a>
                                                        <li><a href="{{ route('product.index') }}">Sản phẩm phổ biến</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Thủ tục thanh toán <span class="open-dropdown"><i
                                                class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown navbar-dropdown-single">
                                        <div class="navbar-box">
                                            <div class="box-full">
                                                <div class="box clearfix">
                                                    <ul>
                                                        <li class="label">Thủ tục thanh toán</li>
                                                        <li><a href="{{ route('cart.index') }}">Thủ tục thanh toán - Cart
                                                                items</a></li>
                                                        <li><a href="{{ route('cart.create') }}">Thủ tục thanh toán -
                                                                Vận chuyển</a></li>
                                                        @if (Session::get('customer_cart'))
                                                            <li><a href="{{ route('pay-cart.index') }}">Thủ tục thanh toán -
                                                                    Thanh toán</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-settings">
                                    <a href="javascript:void(0);"><span class="nav-settings-value">USD</span> <span
                                            class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown navbar-dropdown-single">
                                        <div class="navbar-box">
                                            <div class="box-full">
                                                <div class="box clearfix">
                                                    <ul class="nav-settings-list">
                                                        <li><a href="javascript:void(0);">USD</a></li>
                                                        <li><a href="javascript:void(0);">EUR</a></li>
                                                        <li><a href="javascript:void(0);">GBP</a></li>
                                                        <li><a href="javascript:void(0);">VND</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-settings">
                                    <a href="javascript:void(0);"><span class="nav-settings-value">VIE</span> <span
                                            class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown navbar-dropdown-single">
                                        <div class="navbar-box">
                                            <div class="box-full">
                                                <div class="box clearfix">
                                                    <ul class="nav-settings-list">
                                                        <li><a href="javascript:void(0);">ENG</a></li>
                                                        <li><a href="javascript:void(0);">GER</a></li>
                                                        <li><a href="javascript:void(0);">لعربية</a></li>
                                                        <li><a href="javascript:void(0);">עִבְרִית</a></li>
                                                        <li><a href="javascript:void(0);">VIE</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- ==========  Search wrapper ========== -->
                    <form action="{{ route('product.create') }}" method="GET">
                        <div class="search-wrapper">
                            <input class="form-control" name="txtsearch" id="txtsearch" placeholder="Search...">
                            <button type="submit" class="btn btn-outline-dark btn-sm">Tìm kiếm ngay</button>
                        </div>
                    </form>

                    <!-- ==========  Cart wrapper ========== -->

                    <div class="cart-wrapper">
                        <div class="thủ tục thanh toán">
                            <div class="clearfix" id="CartWrapper">

                                <!--cart item-->

                                <div class="row">

                                    <div class="cart-block cart-block-item clearfix">
                                        <span>Data Not Found</span>
                                    </div>

                                </div>

                                <hr>

                                <!--cart final price -->

                                <div class="clearfix">
                                    <div class="cart-block cart-block-footer clearfix">
                                        <div>
                                            <strong>Total</strong>
                                        </div>
                                        <div>
                                            <div class="h4 title" id="totalcart">0 vnđ</div>
                                        </div>
                                    </div>
                                </div>


                                <!--cart navigation -->

                                <div class="cart-block-buttons clearfix">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="javascrip:void(0)" class="btn btn-outline-info continue">Tiếp tục mua sắm</a>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <a href="{{ Auth::check() ? route('cart.index') : route('login.index') }}"
                                                class="btn btn-outline-warning"><span class="icon icon-cart"></span>
                                                Thủ tục thanh toán</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        @yield('content')

        <!-- ========================  Product popup ======================== -->

        <div class="popup-main mfp-hide" id="productid1">

            <!--Product popup-->

            <div class="product" id="showpro">

                <!--Popup-title -->

                <div class="popup-title">
                    <div class="h3 title" id="namepro">

                    </div>
                </div>

                <!--Product gallery-->

                <div class="owl-product-gallery owl-theme owl-carousel owl-loaded owl-drag" id="imgshow">

                </div>


                <!--Popup info-->

                <div class="popup-content">
                    <div class="product-info-wrapper">
                        <div class="row">

                            <!--Left side-->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Maifacturer</strong>
                                    <span id="cate"></span>
                                </div>
                                <div class="info-box">
                                    <strong>Materials</strong>
                                    <span>Wood, Leather, Acrylic</span>
                                </div>
                                <div class="info-box">
                                    <strong>Khả dụng</strong>
                                    <span><i class="fa fa-check-square-o"></i> Trong kho</span>
                                </div>
                            </div>

                            <!--Right side-->

                            <div class="col-sm-6">
                                <div class="info-box">
                                    <strong>Màu sắc có sẵn</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                    </div>
                                </div>
                                <div class="info-box">
                                    <strong>Chọn kích thước</strong>
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-biege">S</span>
                                        <span class="color-btn color-btn-biege checked">M</span>
                                        <span class="color-btn color-btn-biege">XL</span>
                                        <span class="color-btn color-btn-biege">XXL</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/row-->
                    </div>
                    <!--/product-info-wrapper-->
                </div>
                <!--/popup-content-->

                <div class="popup-table">
                    <div class="popup-cell">
                        <div class="price">

                        </div>
                    </div>
                    <div class="popup-cell">
                        <div class="popup-buttons" id="btnaddcart">

                        </div>
                    </div>
                </div>

            </div>
            <!--/product-->
        </div>


        <div>
            <!-- ================== Footer  ================== -->

            <footer>

                <div class="container-fluid">

                    <div class="footer-wrap">

                        <div class="container">

                            <!--footer showroom-->
                            <div class="footer-showroom">
                                <div class="text-center">
                                    <a href="/"><img src="{{ asset('frontend/assets/images/divano-logo.svg') }}"
                                            alt="" width="130" height="55"></a>
                                </div>
                            </div>

                            <!--footer links-->
                            <div class="footer-links">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h5>Duyệt qua</h5>
                                        <ul>
                                            <li><a href="#">Thương hiệu</a></li>
                                            <li><a href="#">Sản phẩm</a></li>
                                            <li><a href="#">category</a></li>
                                            <li><a href="#">Dự án</a></li>
                                            <li><a href="#">Doanh thu</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Liên kết</h5>
                                        <ul>
                                            <li><a href="#">In-Store Pickup</a></li>
                                            <li><a href="#">Thẻ quà tặng</a></li>
                                            <li><a href="#">Trả sau</a></li>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Câu hỏi thường gặp</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Thông tin đặt hàng</h5>
                                        <ul>
                                            <li><a href="#">Tình trạng đặt hàng </a></li>
                                            <li><a href="#">Thanh toán</a></li>
                                            <li><a href="#">Đang vận chuyển</a></li>
                                            <li><a href="#">Lợi nhuận</a></li>
                                            <li><a href="#">Lịch sử đặt hàng</a></li>
                                        </ul>
                                    </div>
                                    <div class="offset-md-3 col-md-3">
                                        <h5>Đăng ký nhận bản tin của chúng tôi</h5>
                                        <p><i>Thêm địa chỉ email của bạn để đăng ký nhận email hàng tháng của chúng tôi và nhận khuyến mại.</i></p>
                                        <div class="form-group form-newsletter">
                                            <input class="form-control" type="text" name="email" value=""
                                                placeholder="Email address">
                                            <input type="submit" class="btn btn-secondary btn-sm" value="Subscribe">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--footer social-->

                            <div class="footer-social">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ URL::to('/') }}/sitemap.xml" target="_blank">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a>
                                    </div>
                                    <div class="col-sm-6 links">
                                        <ul>
                                            <li><a href="https://www.facebook.com/HocDolce9X"target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="https://www.google.com"target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="https://www.youtube.com/channel/UCcJyotaGmjvp0hCMUJj6W8Q"target="_blank"><i class="fa fa-youtube"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </footer>

            <script>
                //(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                //(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                //m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                //})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                //ga('create', 'UA-105330313-1', 'auto');
                //ga('send', 'pageview');
            </script>
        </div>
        <input type="hidden" id="csrf-token" name="csrf-token" value="{{ csrf_token() }}">
        <style>
            .scroll-top:hover,
            .scroll-top.active {
                left: 96%;
            }

            nav .open-wish {
                position: relative;
            }

            nav .open-wish span {
                background-color: #3a3d45;
                color: white;
                position: absolute;
                width: 15px;
                height: 15px;
                line-height: 15px;
                right: 4px;
                top: 5%;
                text-align: center;
                font-size: 10px;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 5px;
            }

        </style>
    </div>
    <!--/wrapper-->
    <!--Scripts -->

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('frontend/js/bigtext.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="csrf-token"]').val()
            },
        });
        $(document).ready(function() {
            LoadCart();
            LoadWish();
        });


        function LoadCart() {
            $.ajax({
                type: 'get',
                url: '{{ route('home.create') }}',
                success: function(res) {
                    $('#CartWrapper').html(res.output);
                    $('#countcart').html(res.count);
                }
            })
        }

        function LoadWish() {
            $.ajax({
                type: 'get',
                url: '{{ route('wishlist.index') }}',
                dataType: 'json',
                success: function(res) {
                    if (res.status == 200) {
                        $('#countwishlist').html(res.data);
                        $.each(res.wish, function(key, values) {
                            $('span[data-pro_wishid="' + values.pro_id + '"]').addClass("added");
                        });
                    }
                }
            });
        }
        $(document).on('click', '.add-favorite,.addwish', function() {
            $(this).toggleClass("added");

            var id = $(this).data('pro_wishid');

            $.ajax({
                type: 'post',
                url: '{{ route('wishlist.store') }}',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.status == 200) {
                        LoadWish();
                        if (res.action == 'add') {
                            alert(res.message);
                        }
                    } else {
                        location.replace(res.url);
                    }
                }
            });
        });
        $(document).on('click', '.addcart', function(e) {
            e.preventDefault();
            var id = $(this).data('cart_id');
            var qty = $('#qty' + id).val();

            $.ajax({
                type: 'post',
                url: '{{ route('cart.store') }}',
                data: {
                    id: id,
                    qty: qty
                },
                success: function(res) {
                    if (res.status == 200) {
                        LoadCart();
                        alert(res.message);
                    } else {
                        setTimeout(function() {
                            location.replace(res.url);
                        }, 100);
                    }
                }
            })
        });
        $(document).on('change', '.updateqtycart', function() {
            var id = $(this).data('cart_id');
            var qty = $(this).val();

            $.ajax({
                type: 'put',
                url: '/cart/' + id,
                data: {
                    qty: qty
                },
                success: function(res) {
                    if (res.status == 200) {
                        LoadCart();
                        @if (Request::segment(1) == 'pay-cart' || Request::segment(1) == 'cart')
                            Loaddata();
                        @endif
                    } else {
                        alert(res.message);
                    }
                }
            })
        })
        $(document).on('click', '.delete_cart', function() {
            var id = $(this).data('cart_id');

            $.ajax({
                type: 'delete',
                url: '/cart/' + id,
                success: function(res) {
                    if (res.status == 200) {
                        LoadCart();
                        @if (Request::segment(1) == 'pay-cart' || Request::segment(1) == 'cart')
                            Loaddata();
                        @endif
                    } else {
                        alert(res.message);
                    }
                }
            })
        });

        $('.click').click(function() {
            var id = $(this).data('proid');

            $.ajax({
                type: 'post',
                url: '{{ route('home.store') }}',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.status == 200) {

                        $('#namepro').html(res.name);
                        $('#cate').html(res.cate);
                        $('.price').html(res.price);
                        $('#imgshow').html(res.img);
                        $('#btnaddcart').html(res.btn);
                    } else {
                        alert(res.message);
                    }
                }
            });
        });
    </script>

    @yield('js')
    @yield('js2')
</body>

</html>
