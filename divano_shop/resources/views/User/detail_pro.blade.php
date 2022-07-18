@extends('Layout_User')
@section('content')
    <!-- ======================== Products ======================== -->

    <section class="product pt-0">

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $detail->product_name }}</li>
                </ol>
                <h2 class="title" style="text-transform: capitalize;">{{ $detail->product_name }}</h2>
                <div class="text">
                    <p>Mua sắm làm cho không gian nhà bạn trở nên hoàn hảo</p>
                </div>
            </div>
        </header>

        <div class="main">
            <div class="container">
                <div class="row product-flex">

                    <div class="col-lg-4 product-flex-info">
                        <div class="clearfix">

                            <div class="clearfix">

                                <!--price wrapper-->

                                <div class="price">
                                    <span class="h3">
                                        {{ number_format($detail->product_price) }} vnđ
                                        @if ($detail->product_old_price != 0)
                                            <small>{{ number_format($detail->product_old_price) }} vnđ</small>
                                        @endif
                                    </span>
                                </div>

                                <hr />

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Maifacturer</strong></span>
                                    <span>{{ $detail->pro_cate->category_name }}</span>
                                </div>

                                <!--info-box-->

                                <div class="info-box">
                                    <span><strong>Materials</strong></span>
                                    <span>Wood, Leather, Acrylic</span>
                                </div>


                                <hr />

                                <div class="info-box">
                                    <span>
                                        Quantity
                                    </span>
                                    <span>
                                        <span class="row">
                                            <span class="col-6">
                                                <input type="number" id="qty{{ $detail->product_id }}" value="1" class="form-control">
                                            </span>
                                            <span class="col-6">
                                                <a href="#" class="btn btn-danger addcart" data-cart_id="{{ $detail->product_id }}"><b>Mua Ngay</b></a>
                                            </span>
                                        </span>
                                    </span>
                                </div>

                                <hr />

                                <div class="info-box">
                                <span>
                                        <small>*** We progress your order for shipping as soon as possible. Please note that
                                            after your order has been received, we can not change the delivery address.
                                            Control your address details in any case before placing your order!</small>
                                    </span>
                                </div> 
                                </div>

                                <hr />

                                <span class="info-box info-box-addto addwish" data-pro_wishid="{{ $detail->product_id }}">
                                    <span>
                                        <i class="add"><i class="fa fa-heart-o"></i> Thêm vào mục yêu thích</i>
                                        <i class="added"><i class="fa fa-heart"></i> Loại bỏ khỏi mục ưa thích</i>
                                    </span>
                                </span>
                                <hr/>
                            <div class="te">Hotline: <b>0339578858 - 0838613023</b>
                        </div>
                        <hr/>

                                <div class="info-box info-box-addto">
                                    <ul class="dc">
                                        <li>Tổng kho: KĐT Nam An Khánh, Hoài Đức, Hà Nội</li>
                                        <li>Chi nhánh: Minh Khai,Hoàng Mai, Hà Nội</li>
                                    </ul>
                                </div>

                            </div>
                            <!--/clearfix-->
                        </div>
                        <!--/product-info-wrapper-->
                    </div>
                    <!--/col-lg-4-->
                    <!--product item gallery-->

                    <div class="col-lg-8 product-flex-gallery">

                        <!--product gallery-->

                        <div class="owl-product-gallery owl-carousel owl-theme open-popup-gallery">
                            <a href="{{ asset('uploads/product/' . $detail->product_image) }}">
                                <img src="{{ asset('uploads/product/' . $detail->product_image) }}" alt="" />
                            </a>
                            @if (count($gallery) > 0)
                                @foreach ($gallery as $gall)
                                    <a href="{{ asset('uploads/gallery/' . $gall->gallery_image) }}">
                                        <img src="{{ asset('uploads/gallery/' . $gall->gallery_image) }}" alt="" />
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!--=========================== Comments & rating ============================-->

    <section class="product-details">

        <div class="container">

            <!--Tab links-->

            <ul class="nav nav-pills nav-pills-flat justify-content-center" id="pills-tab" role="tablist">
                {{-- <li class="nav-item">
                    <a class="nav-link active" id="tab-review-tab" data-toggle="tab" href="#tab-review" role="tab">
                        Reviews
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link active" id="tab-desc-tab" data-toggle="tab" href="#tab-desc" role="tab">
                        Description
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-info-tab" data-toggle="tab" href="#tab-shipping" role="tab">
                        Shipping
                    </a>
                </li>
            </ul>

            <!--Tab content-->

            <div class="tab-content" id="pills-tabContent">

                <!--Tab description-->

                {{-- <div class="tab-pane fade show active" id="tab-review">

                    <div class="col-md-8 offset-md-2">

                        <!--Rating-->

                        <div class="rating">

                            <!--Rating overall====-->

                            <div class="rating-overall">

                                <div class="rating-header">

                                    <div class="row align-items-center">

                                        <div class="col-2">
                                            <div class="h1 m-0">4.8</div>
                                        </div>

                                        <div class="col-10">
                                            <div class="h3 m-0">User rating overall</div>
                                            <span>4.8 average based on 625 reviews</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row align-items-center">

                                    <div class="col-2">
                                        <p>5 <i class="fa fa-star"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p>4 <i class="fa fa-star"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="85"></div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p>3 <i class="fa fa-star"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p>2 <i class="fa fa-star"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 20%"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="20"></div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p>1 <i class="fa fa-star"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 15%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--Comments-->

                        <div class="comments">

                            <div class="comment-header">
                                <div class="h3 m-0">Recent comments</div>
                                <span>14 reviews for Bedroom product</span>
                            </div>

                            <div class="comment-wrapper">

                                <!--Comment-->

                                <div class="comment-block">

                                    <!--Comment user-->

                                    <div class="comment-user">
                                        <div>
                                            <img src="{{ asset('frontend/assets/images/user.jpg') }}"
                                                alt="Alternate Text" width="70" />
                                        </div>
                                        <div>
                                            <h5>
                                                <span>John Doe</span>
                                                <span class="pull-right">
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <small>03.05.2017</small>
                                            </h5>
                                        </div>
                                    </div>

                                    <!--Comment description-->

                                    <div class="comment-desc">
                                        <p>
                                            In vestibulum tellus ut nunc accumsan eleifend. Donec mattis cursus ligula, id
                                            iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas
                                            ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus tempor
                                            justo et mollis
                                            facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit amet
                                            euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                        </p>
                                    </div>

                                    <!--Comment reply-->

                                    <div class="comment-block">
                                        <div class="comment-user">
                                            <div>
                                                <img src="{{ asset('frontend/assets/images/user.jpg') }}"
                                                    alt="Alternate Text" width="70" />
                                            </div>
                                            <div>
                                                <h5>
                                                    Administrator
                                                    <small>08.05.2017</small>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="comment-desc">
                                            <p>
                                                Curabitur sit amet elit quis tellus tincidunt efficitur. Cras lobortis id
                                                elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque a
                                                enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien nisl
                                                egestas diam, nec blandit diam
                                                ipsum eget dolor. Maecenas ultricies tempus nibh, sit amet facilisis mauris
                                                vulputate in.
                                            </p>
                                        </div>
                                    </div>
                                    <!--/reply-->
                                </div>

                                <!--Comment-->

                                <div class="comment-block">

                                    <!--Comment user-->

                                    <div class="comment-user">
                                        <div>
                                            <img src="{{ asset('frontend/assets/images/user.jpg') }}"
                                                alt="Alternate Text" width="70" />
                                        </div>
                                        <div>
                                            <h5>
                                                <span>John Doe</span>
                                                <span class="pull-right">
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star active"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                                <small>03.05.2017</small>
                                            </h5>
                                        </div>
                                    </div>

                                    <!--Comment description-->

                                    <div class="comment-desc">
                                        <p>
                                            Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus.
                                            Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien
                                            nisl egestas diam, nec blandit diam ipsum eget dolor. In vestibulum tellus ut
                                            nunc accumsan
                                            eleifend. Donec mattis cursus ligula, id iaculis dui feugiat nec. Etiam ut ante
                                            sed neque lacinia volutpat. Maecenas ultricies tempus nibh, sit amet facilisis
                                            mauris vulputate in. Phasellus tempor justo
                                            et mollis facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan,
                                            sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <!--/comment-wrapper-->

                            <div class="comment-header text-center">
                                <a href="#" class="btn btn-main">12 comments</a>
                            </div>

                            <!--Add new comment-->

                            <div class="comment-add">

                                <div class="comment-reply-message">
                                    <div class="h3 title">Leave a Reply </div>
                                    <p>Email address will not be published.</p>
                                </div>

                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value=""
                                            placeholder="Tên ( Biệt danh)" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value=""
                                            placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="10" class="form-control" placeholder="Your comment"></textarea>
                                    </div>
                                    <div class="clearfix text-center">
                                        <a href="#" class="btn btn-main">Add comment</a>
                                    </div>
                                </form>

                            </div>
                            <!--/comment-add-->

                        </div>
                        <!--/comments-->

                    </div>
                    <!--/col-md-8-->

                </div> --}}
                <!--/tab-pane -->
                <!--Tab specification-->

                <div class="tab-pane fade show active" id="tab-desc">

                    <div class="col-md-8 offset-md-2">

                        <div>
                            <div class="h3 m-0">Thông số kỹ thuật</div>
                            <span>{!! $detail->product_desc !!}</span>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/specs.png') }}"
                                    alt="Alternate Text" width="350" />

                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="{{ asset('frontend/assets/images/specs.png') }}"
                                    alt="Alternate Text" width="350" />

                            </div>
                        </div>
                        <!--/row-->

                    </div>
                    <!--/col-md-8-->

                </div>
                <!--/tab-pane -->
                <!--Tab review-->

                <div class="tab-pane fade" id="tab-shipping">

                    <div class="col-md-8 offset-md-2">

                        <div>
                            <div class="h3 m-0">Thông tin vận chuyển</div>
                            <span>Thông tin thêm</span>
                        </div>

                        <hr />

                        <h5>Đảm bảo hoàn lại tiền</h5>
                        <p>
                            Our Money Back Guarantee applies to virtually everything on our site, and theres no extra fee
                            for coverage. It’s automatic and covers your purchase price plus original shipping on eligible
                            purchases*. Follow these steps to get your refund.
                        </p>

                        <h5>Need to Return an Item?</h5>

                        <p>
                            Whatever you’re looking for, millions of items on our store are returnable. Before you buy an
                            item, check the seller’s return policy, then follow these easy steps to make a return. If the
                            item you received doesnt the description in the original
                            listing, or if it arrived faulty or damaged,
                        </p>

                        <h5>Check an open return request</h5>

                        <p>
                            You can keep an eye on the progress of your return request by selecting Check your return status
                            below, or in your Purchase history.
                        </p>

                        <h5>Send the item back</h5>

                        <p>
                            You'll need to send it back within 5 business days. Who covers the shipping costs depends on why
                            you're returning it. Find more information about return shipping. When you send your item back
                            we recommend using tracked shipping. Adding tracking details
                            to your return helps protect against delays or issues in the refund process.
                        </p>
                    </div>
                    <!--/col-md-8-->


                </div>
                <!--/tab-pane -->

            </div>
            <!--/tab-content -->
        </div>

    </section>

    <!-- ========================  Popular products  ======================== -->

    <section class="products">

        <header>
            <div class="container">
                <h2 class="title">Sản phẩm phổ biến</h2>
                <div class="text">
                    <p>Check out our latest collections. <br /> Make your dream come true!</p>
                </div>
            </div>
        </header>

        <div class="container">

            <div class="row">

                <!--Product item-->
                @foreach ($products as $product)
                    <div class="col-6 col-lg-3">
                        <article>
                            <div class="info">
                                <span class="add-favorite" data-pro_wishid="{{ $product->product_id }}">
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

            </div>
            <!--/row-->

            <div class="wrapper-more">
                <a href="{{ route('product.index') }}" class="btn btn-main btn-sm">Xem tất cả sản phẩm</a>
            </div>

        </div>
        <!--/container-->

    </section>

    <!-- ========================  Product popup ======================== -->

    <div class="popup-main mfp-hide" id="productid1">

        <!--Product popup-->

        <div class="product">

            <!--Popup-title -->

            <div class="popup-title">
                <div class="h3 title">
                    Modern sofa
                    <small>product category</small>
                </div>
            </div>

            <!--Product gallery-->

            <div class="owl-product-gallery owl-theme owl-carousel">
                <img src="{{ asset('frontend/assets/images/item-1.jpg') }}" alt="" width="640" />
                <img src="{{ asset('frontend/assets/images/item-2.jpg') }}" alt="" width="640" />
            </div>

            <!--Popup info-->

            <div class="popup-content">
                <div class="product-info-wrapper">
                    <div class="row">

                        <!--Left side-->

                        <div class="col-sm-6">
                            <div class="info-box">
                                <strong>Maifacturer</strong>
                                <span>{{ $detail->pro_cate->category_name }}</span>
                            </div>
                            <div class="info-box">
                                <strong>Materials</strong>
                                <span>Wood, Leather, Acrylic</span>
                            </div>
                            <div class="info-box">
                                <strong>Availability</strong>
                                <span><i class="fa fa-check-square-o"></i> in stock</span>
                            </div>
                        </div>

                        <!--Right side-->

                        <div class="col-sm-6">
                            <div class="info-box">
                                <strong>Available Colors</strong>
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
                        <span class="h3">$ 1999,00 <small>$ 2999,00</small></span>
                    </div>
                </div>
                <div class="popup-cell">
                    <div class="popup-buttons">
                        <a href="product.html"><span class="icon icon-eye"></span> <span class="hidden-xs">View
                                more</span></a>
                        <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span
                                class="hidden-xs">Buy</span></a>
                    </div>
                </div>
            </div>

        </div>
        <!--/product-->
    </div>
@endsection
