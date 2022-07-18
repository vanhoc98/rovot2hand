@extends('Layout_User')
@section('content')
    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <h2 class="d-none">Slider element</h2>

        <div class="container-fluid">

            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">

                <!--Slide item-->
                @foreach ($sliders as $slider)
                    <div class="item d-flex align-items-center"
                        style="background-image:url({{ asset('uploads/slider/' . $slider->slider_image) }})">
                        <div class="container">
                            @if ($slider->slider_bodytext == 1)
                                <div class="caption">
                                    <div class="animated" data-start="fadeInUp">
                                        <div class="promo pt-3">
                                            <div class="title title-sm p-0">{{ $slider->slider_title }}</div>
                                        </div>
                                    </div>
                                    <div class="animated" data-start="fadeInUp">
                                        {!! $slider->slider_content !!}
                                    </div>
                                    <div class="animated" data-start="fadeInUp">
                                        <div class="pt-3">
                                            <a href="{{ $slider->slider_url != '' ? $slider->slider_url : '#' }}"
                                                target="_blank" class="btn btn-outline-warning"><b>Mua Ngay</b></a>
                                            <a href="#" target="_blank" class="btn btn-outline-light"> <b>Nhận ngay ưu đãi liền tay</b></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="caption">
                                    <div class="promo text-center">
                                        <div class="animated" data-start="fadeInUp">
                                            <div class="title title-sm p-0">{{ $slider->slider_title }}</div>
                                        </div>
                                        <div class="animated" data-start="fadeInUp">
                                            {!! $slider->slider_content !!}
                                        </div>
                                        <div class="animated" data-start="fadeInUp">
                                            <a href="{{ $slider->slider_url != '' ? $slider->slider_url : '#' }}"
                                                target="_blank" class="btn btn-light"><b>Mua Ngay</b></a>
                                            <a href="#" target="_blank" class="btn btn-outline-light"> <b>Nhận ngay ưu đãi khi thanh toán lần đầu</b></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
            <!--/owl-slider-->
        </div>
    </section>

    <!-- ========================  Featured categories ======================== -->

    <section class="blog blog-block">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Danh mục sản phẩm</h2>
                <div class="text">
                    <p>Chúng tôi chỉ giữ mọi thứ ở mức tối thiểu. <a href="{{ route('categories.index') }}" class="btn btn-main">Xem thêm</a></p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="scroll-wrapper">

                <div class="row scroll text-center">
                    @php
                        // mảng
                        $ArrayX = ['' . now()->format('Y') . ' Collection', 'Modern design', 'New discounts'];

                        $randIndex = Array_rand($ArrayX);

                    @endphp

                    <!--Item-->
                    @foreach ($category as $cate)
                        <div class="col-md-4">
                            <article data-3d>
                                <a href="{{ route('categories.show', $cate->category_slug) }}">
                                    <div class="image">
                                        <img src="{{ asset('uploads/category/' . $cate->category_image) }}" alt="" />
                                    </div>
                                    <div class="entry entry-block">
                                        <div class="label">{{ $ArrayX[$randIndex] }}</div>
                                        <div class="title">
                                            <h2 class="h4">{{ $cate->category_name }}</h2>
                                        </div>
                                        <div class="description d-none d-sm-block">
                                            <p>
                                                Top picks four your desire
                                            </p>
                                        </div>
                                    </div>
                                    <div class="show-more">
                                        <a href="{{ route('categories.show', $cate->category_slug) }}"><span
                                                class="btn btn-clean">Mua sắm ngay bây giờ</span></a>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
                <!--/row-->
            </div>

        </div>
        <!--/container-->

    </section>

    <!-- ========================  Popular products  ======================== -->

    <section class="products">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Sản phẩm phổ biến</h2>
                <div class="text">
                    <p>
                        Tìm người kết hợp hoàn hảo của bạn <a href="{{ route('product.index') }}" class="btn btn-main">Xem tất cả</a>
                    </p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->
                @foreach ($products as $product)
                    <div class="col-6 col-lg-4">
                        <article>
                            <div class="info">
                                <span class="add-favorite" data-pro_wishid="{{ $product->product_id }}">
                                    <a href="javascript:void(0);" data-title="Thêm vào mục yêu thích"
                                        data-title-added="Added to favorites list">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                </span>
                                <span>
                                    <a href="#productid1" data-proid="{{ $product->product_id }}" class="mfp-open click"
                                        data-title="Quick wiew">
                                        <i class="icon icon-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="qty{{ $product->product_id }}" value="1">
                            <div class="btn btn-add addcart" data-cart_id="{{ $product->product_id }}">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                @if ($product->product_old_price != 0)
                                    <span
                                        class="badge badge-warning">-{{ number_format(100 - ($product->product_price / $product->product_old_price) * 100) }}%</span>
                                @elseif (Carbon\Carbon::parse($product->created_at)->toDateString() >= Carbon\Carbon::yesterday()->toDateString() && Carbon\Carbon::parse($product->created_at)->toDateString() <= Carbon\Carbon::tomorrow()->toDateString())
                                    <span class="badge badge-info">New arrival</span>
                                @elseif ($product->product_old_price != 0 && Carbon\Carbon::parse($product->created_at)->toDateString() >= Carbon\Carbon::yesterday()->toDateString() && Carbon\Carbon::parse($product->created_at)->toDateString() <= Carbon\Carbon::tomorrow()->toDateString())
                                    <span
                                        class="badge badge-warning">-{{ number_format(100 - ($product->product_price / $product->product_old_price) * 100) }}%</span>
                                @endif
                                <div class="image">
                                    <a href="{{ route('product.show', $product->product_slug) }}">
                                        <img src="{{ asset('uploads/product/' . $product->product_image) }}" alt="" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4">
                                        <a
                                            href="{{ route('product.show', $product->product_slug) }}">{{ $product->product_name }}</a>
                                    </h2>
                                    @if ($product->product_old_price != 0)
                                        <sub>{{ number_format($product->product_old_price) }} vnđ</sub>
                                        <sup>{{ number_format($product->product_price) }} vnđ</sup>
                                    @else
                                        <sup>{{ number_format($product->product_price) }} vnđ</sup>
                                    @endif
                                    <span class="description clearfix">
                                        Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                        lorem ea duo labore diam sit et consetetur nulla
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

                {{-- <div class="col-6 col-lg-4">
                    <article>
                        <div class="info">
                            <span class="add-favorite added">
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
                                    <img src="{{ asset('frontend/assets/images/product-7.jpg') }}" alt="" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4">
                                    <a href="product.html">Grace</a>
                                </h2>
                                <sub>$ 699,-</sub>
                                <sup>$ 499,-</sup>
                                <span class="description clearfix">
                                    Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam
                                    lorem ea duo labore diam sit et consetetur nulla
                                </span>
                            </div>
                        </div>
                    </article>
                </div> --}}


            </div>
            <!--/row-->

        </div>

    </section>





    <!-- ========================  Blog ======================== -->

    <section class="blog blog-widget blog-animated">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="h2 title">Sản phẩm bán chạy</h2>
                <div class="text">
                    <p>
                        Khám phá và mở ra những suy nghĩ <a href="{{ route('blog.index') }}" class="btn btn-main">View
                            all</a>
                    </p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Blog item-->
                @foreach ($blogs as $blog)
                    <div class="col-md-12 col-lg-4">
                        <article>
                            <a href="{{ route('blog.show', [Str::slug($blog->blog_title), 'blog' => $blog->blog_id]) }}"
                                class="blog-link">
                                <div class="image"
                                    style="background-image:url({{ asset('uploads/blog/' . $blog->blog_image) }})">
                                    <img src="{{ asset('uploads/blog/' . $blog->blog_image) }}" alt="" />
                                </div>
                                <div class="entry entry-table">
                                    <div class="date-wrapper">
                                        @php
                                            $month = Carbon\Carbon::parse($blog->created_at)->format('M');
                                            $day = Carbon\Carbon::parse($blog->created_at)->format('d');
                                            $year = Carbon\Carbon::parse($blog->created_at)->format('Y');
                                        @endphp
                                        <div class="date">
                                            <span>{{ $month }}</span>
                                            <strong>{{ $day }}</strong>
                                            <span>{{ $year }}</span>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h2 class="h5">{{ $blog->blog_title }}</h2>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                @endforeach


            </div>
            <!--/row-->

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
                            <input type="email" class="form-control" name="name" value="" placeholder="Enter your e-mail">
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

    <!-- ========================  Instagram ======================== -->

    <section class="instagram">

        <!--Header-->

        <header>
            <h2 class="h6 title">
                <i class="fa fa-instagram fa-3x"></i> <br> #DivanoShop
            </h2>
        </header>

        <!--Gallery-->

        <div class="container">

            <div class="gallery clearfix">
                @foreach ($products as $product)
                    <a class="item" href="{{ route('product.show', $product->product_slug) }}">
                        <img src="{{ asset('uploads/product/' . $product->product_image) }}" alt="Alternate Text">
                    </a>
                @endforeach
            </div>
            <!--/gallery-->

        </div>

    </section>

    <!-- ========================  Benefits ======================== -->

    <section class="benefits">

        <!--Header-->

        <header class="d-none">
            <div class="container">
                <h2 class="h2 title">Lợi ích</h2>
            </div>
        </header>

        <!--Header-->

        <div class="container">

            <div class="row">

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-gift"></i></div>
                        <figcaption>
                            <span>
                                <strong>Món quà của bạn</strong> <br />
                                <small>Bạn là khách hàng mới phải không?</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-rocket"></i></div>
                        <figcaption>
                            <span>
                                <strong>Chuyển phát nhanh</strong> <br />
                                <small>Chúng tôi vận chuyển trên toàn thế giới</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-history"></i></div>
                        <figcaption>
                            <span>
                                <strong>Hoàn tiền</strong> <br />
                                <small>Hoàn tiền trong 30 ngày</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-diamond"></i></div>
                        <figcaption>
                            <span>
                                <strong>Giảm giá VIP</strong> <br />
                                <small>Trở thành thành viên VIP</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/container-->

    </section>
@endsection
