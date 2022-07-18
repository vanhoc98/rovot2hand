@extends('Layout_User')
@section('content')
    <!-- ======================== Products ======================== -->

    <section class="products pt-0">

        <!--Header-->

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
                <h2 class="title">{{ $title }}</h2>
                <div class="text">
                    <p>Xoa bóp sự ghét bỏ của con mèo</p>
                </div>
            </div>
        </header>


        <!--Content-->

        <div class="container">
            <div class="row">

                <!--Left content-->

                <div class="col-12">

                    <!--Product filters-->

                    <div class="filters filters-fixed">

                        <div class="filter-scroll">

                            <div class="filter-header">
                                <span class="h4">Filter products</span>
                                <br />Select your options
                            </div>
                            <hr />

                            <!--Colors-->

                            <div class="filter-box active">
                                <div class="title">
                                    Colors
                                </div>
                                <div class="filter-content">
                                    <div class="product-colors clearfix">
                                        <span class="color-btn color-btn-yellow"></span>
                                        <span class="color-btn color-btn-pink"></span>
                                        <span class="color-btn color-btn-orange"></span>
                                        <span class="color-btn color-btn-red"></span>
                                        <span class="color-btn color-btn-blue checked"></span>
                                        <span class="color-btn color-btn-green"></span>
                                        <span class="color-btn color-btn-gray"></span>
                                        <span class="color-btn color-btn-biege"></span>
                                        <span class="color-btn color-btn-black"></span>
                                        <span class="color-btn color-btn-white"></span>
                                    </div>
                                </div>
                            </div>

                            <!--Price-->

                            <div class="filter-box active">
                                <div class="title">Giá</div>
                                <div class="filter-content">
                                    <div class="price-filter">
                                        <input type="text" id="range-price-slider" value="" name="range" />
                                    </div>
                                </div>
                            </div>

                            <!--Type-->

                            <div class="filter-box active">
                                <div class="title">
                                    Type
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeIdAll" checked="checked">
                                        <label for="typeIdAll">All <i>(1200)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId1">
                                        <label for="typeId1">Sofa <i>(20)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId2">
                                        <label for="typeId2">Armchairs <i>(12)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId3">
                                        <label for="typeId3">Chairs <i>(80)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId4">
                                        <label for="typeId4">Dining tables <i>(140)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId5">
                                        <label for="typeId5">Media storage <i>(20)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId6">
                                        <label for="typeId6">Tables <i>(10)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId7">
                                        <label for="typeId7">Bookcase <i>(450)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId8">
                                        <label for="typeId8">Nightstands <i>(750)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId9">
                                        <label for="typeId9">Children room <i>(960)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId10">
                                        <label for="typeId10">Kitchen <i>(44)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId11">
                                        <label for="typeId11">Bathroom <i>(5)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId12">
                                        <label for="typeId12">Wardrobe <i>(80)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId13">
                                        <label for="typeId13">Shoe cabinet <i>(23)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId14">
                                        <label for="typeId14">Office <i>(24)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId15">
                                        <label for="typeId15">Bar sets <i>(92)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" name="radiogroup-type" id="typeId16">
                                        <label for="typeId16">Lightning <i>(1120)</i></label>
                                    </span>
                                </div>
                            </div>

                            <!--Material-->

                            <div class="filter-box active">
                                <div class="title">
                                    Material
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="checkbox" id="matId1">
                                        <label for="matId1">Blend <i>(1200)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="matId2">
                                        <label for="matId2">Leather <i>(12)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="matId3">
                                        <label for="matId3">Wood <i>(80)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="matId4">
                                        <label for="matId4">Shell <i>(80)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="matId5">
                                        <label for="matId5">Metal <i>(80)</i></label>
                                    </span>
                                </div>
                            </div>

                            <!--Discount-->

                            <div class="filter-box">
                                <div class="title">
                                    Miễn giảm
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="radio" id="discountId1" name="discountPrice" checked="checked">
                                        <label for="discountId1">Giảm giá</label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="radio" id="discountId2" name="discountPrice">
                                        <label for="discountId2">Giá cả phải chăng</label>
                                    </span>
                                </div>
                            </div>

                            <!--Availability-->

                            <div class="filter-box">
                                <div class="title">
                                    Khả dụng
                                </div>
                                <div class="filter-content">
                                    <span class="checkbox">
                                        <input type="checkbox" id="availableId1" checked="checked">
                                        <label for="availableId1">Trong kho <i>(152)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="availableId2">
                                        <label for="availableId2">1 Tuần <i>(100)</i></label>
                                    </span>
                                    <span class="checkbox">
                                        <input type="checkbox" id="availableId3">
                                        <label for="availableId3">2 Tuần <i>(80)</i></label>
                                    </span>
                                </div>
                            </div>

                        </div>

                        <!-- Close filters on mobile / update filters-->

                        <div class="toggle-filters-close btn btn-circle">
                            <i class="icon icon-cross"></i>
                        </div>

                    </div>
                    <!--/filters-->

                </div>

                <!--Right content-->

                <div class="col-12">

                    <!--Sort bar-->

                    <div class="sort-bar clearfix">

                        <div class="sort-results pull-left">

                            <!--Showing result per page-->

                            <select>
                                <option value="1">10</option>
                                <option value="2">50</option>
                                <option value="3">100</option>
                                <option value="4">All</option>
                            </select>

                            <!--Items counter-->

                            <span>Showing all <strong>50</strong> of <strong>348</strong> items</span>

                        </div>

                        <!--Sort options-->

                        <div class="sort-options pull-right">

                            <span class="d-none d-sm-inline-block">Sort by</span>

                            <select>
                                <option value="1">Name</option>
                                <option value="2">Popular items</option>
                                <option value="3">Price: lowest</option>
                                <option value="4">Price: highest</option>
                            </select>

                            <!--Grid-list view-->

                            <span class="grid-list">
                                <a href="#"><i class="fa fa-th-large"></i></a>
                                <a href="#"><i class="fa fa-align-justify"></i></a>
                                <a href="javascript:void(0);" class="toggle-filters-mobile">
                                    <i class="fa fa-sliders"></i>
                                    <span class="spinner-grow spinner-grow-sm text-warning" role="status"
                                        aria-hidden="true"></span>
                                </a>
                            </span>

                        </div>
                        <!--/sort-options-->

                    </div>

                    <!--Products collection-->
                    <div id="loadData">
                        @include('User.all_include')
                    </div>
                </div>
                <!--/product items-->

            </div>
            <!--/row-->

        </div>

    </section>

    <!-- ========================  Last visited  ======================== -->

    <section class="products">

        <header>
            <div class="container">
                <h2 class="title">Lần cuối ghé thăm</h2>
                <div class="text">
                    <p>Xem các bộ sưu tập mới nhất của chúng tôi</p>
                </div>
            </div>
        </header>

        <div class="container">

            <div class="scroll-wrapper">

                <div class="row scroll">

                    <!--Product item-->

                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                <span class="add-favorite">
                                    <a href="javascript:void(0);" data-title="Thêm vào mục yêu thích"
                                        data-title-added="Added to favorites list">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="btn btn-add">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                <div class="image">
                                    <a href="product.html">
                                        <img src="{{ asset('frontend/assets/images/product-10.jp') }}g" alt="" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a href="product.html">Anna</a>
                                    </h2>
                                    <sub>$ 159,-</sub>
                                    <sup>$ 139,-</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!--Product item-->

                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                <span class="add-favorite">
                                    <a href="javascript:void(0);" data-title="Thêm vào mục yêu thích"
                                        data-title-added="Added to favorites list">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="btn btn-add">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                <span class="badge badge-warning">-20%</span>
                                <div class="image">
                                    <a href="product.html">
                                        <img src="{{ asset('frontend/assets/images/product-9.jpg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a href="product.html">Lucy</a>
                                    </h2>
                                    <sub>$ 319,-</sub>
                                    <sup>$ 219,-</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!--Product item-->

                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                <span class="add-favorite">
                                    <a href="javascript:void(0);" data-title="Thêm vào mục yêu thích"
                                        data-title-added="Added to favorites list">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="btn btn-add">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                <span class="badge badge-info">New arrival</span>
                                <div class="image">
                                    <a href="product.html">
                                        <img src="{{ asset('frontend/assets/images/product-8.jpg') }}" alt="" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a href="product.html">Ella</a>
                                    </h2>
                                    <sub>$ 899,-</sub>
                                    <sup>$ 750,-</sup>
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>
                <!--/row-->
            </div>

        </div>
        <!--/container-->

    </section>

    <!-- ========================  Newsletter ======================== -->

    <section class="banner">

        <div class="container-fluid">

            <div class="banner-image"
                style="background-image:url({{ asset('frontend/assets/images/gallery-1.jpg') }})">
                <!--Header-->

                <header>
                    <div class="container">

                        <h2 class="h2 title">Giữ liên lạc!</h2>
                        <div class="text">
                            <p>Hãy là người đầu tiên biết về tất cả các tính năng đồ gia dụng mới!</p>
                        </div>

                    </div>
                </header>

                <!--Content-->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <input type="email" class="form-control" name="name" value=""
                                placeholder="Enter your e-mail">
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-clean">Theo dõi ngay</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/container-fluid-->

    </section>


    <!-- ========================  Featured categories ======================== -->

    <section class="blog blog-block">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Danh mục sản phẩm</h2>
                <div class="text">
                    <p>Chúng tôi chỉ giữ mọi thứ ở mức tối thiểu</p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row text-center">

                <!--Item-->

                <div class="col-md-4">
                    <article data-3d>
                        <a href="products-grid.html">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/product-1.jpg') }}" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="label">2020 Collection</div>
                                <div class="title">
                                    <h2 class="h4">Nhà bếp</h2>
                                </div>
                                <div class="description d-none d-sm-block">
                                    <p>
                                       Bốn lựa chọn hàng đầu mà bạn mong muốn
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Cửa hàng ngay</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!--Item-->

                <div class="col-6 col-md-4">
                    <article data-3d>
                        <a href="#">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/product-2.jpg') }}" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="label">Modern design</div>
                                <div class="title">
                                    <h2 class="h4">Kitchens</h2>
                                </div>
                                <div class="description d-none d-sm-block">
                                    <p>
                                        Explore popular devices
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Mua sắm ngay bây giờ</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!--Item-->

                <div class="col-6 col-md-4">
                    <article data-3d>
                        <a href="#">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/product-3.jpg') }}" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="label">New discounts</div>
                                <div class="title">
                                    <h2 class="h4">Phòng tắm</h2>
                                </div>
                                <div class="description d-none d-sm-block">
                                    <p>
                                        Có sẵn để vận chuyển nhanh chóng
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-clean">Mua sắm ngay bây giờ</span>
                            </div>
                        </a>
                    </article>
                </div>

            </div>
            <!--/row-->

        </div>
        <!--/container-->

    </section>

        <!--/product-->
        <input type="hidden" id="hiden_action" value="{{ $action }}">
        <input type="hidden" id="hiden_get" value="{{ isset($_GET['txtsearch']) ? $_GET['txtsearch'] : '' }}">
@endsection
@section('js')
    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('.filters-fixed').addClass('active');
            }, 2000)
            setTimeout(function() {
                $('.filters-fixed').removeClass('active');
            }, 5500)
        });

        function fetch_data(page) {
            $.ajax({
                url: "{{ url('product/create?page=') }}" +page,
                data: {
                    action:$('#hiden_action').val(),
                    search:$('#hiden_get').val(),
                },
                success: function(data) {
                    $('#loadData').html(data);
                }
            });
        }
        $(document).ready(function(){
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
        });
    </script>
@endsection
