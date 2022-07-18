<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divano</title>

    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/icons/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    @yield('css')
</head>

@php
$url = Request::url();
@endphp

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header" style="color: #efb700;">
                    <i class="fab fa-drupal" style="font-size: 62px"></i> Admin
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>


                        <li class="sidebar-item {{ $url == route('dashboard.index') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Bảng điều khiển</span>
                            </a>

                        </li>


                        <li class='sidebar-title'>Quản lý</li>
                        <li class="sidebar-item {{ $url == route('account.index') ? 'active' : '' }}">
                            <a href="{{ route('account.index') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Tài khoản</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $url == route('category.index') ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}" class='sidebar-link'>
                                <i data-feather="command" width="20"></i>
                                <span>Thể loại</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item {{ $url == route('products.index') ? 'active' : '' }}
                        @if (Session::get('gallery_session')) {{ $url == route('gallery.show', Session::get('gallery_session')) ? 'has-sub' : '' }} @endif">
                            <a href="{{ route('products.index') }}" class='sidebar-link'>
                                <i data-feather="framer" width="20"></i>
                                <span>Sản phẩm</span>
                            </a>
                            @if (Session::get('gallery_session'))
                                <ul
                                    class="submenu {{ $url == route('gallery.show', Session::get('gallery_session')) ? 'active' : '' }}">
                                    <li>
                                        <a href="{{ route('products.index') }}">Danh sách sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gallery.show', Session::get('gallery_session')) }}">Thư viện
                                            <b>[ {{ $name_product->product_name }} ]</b></a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                        <li class="sidebar-item {{ $url == route('blogs.index') ? 'active' : '' }}">
                            <a href="{{ route('blogs.index') }}" class='sidebar-link'>
                                <i class="fas fa-blog"></i>
                                <span>Blog</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $url == route('order.index') ? 'active' : '' }}">
                            <a href="{{ route('order.index') }}" class='sidebar-link'>
                                <i data-feather="shopping-bag" width="20"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $url == route('slider.index') ? 'active' : '' }}">
                            <a href="{{ route('slider.index') }}" class='sidebar-link'>
                                <i data-feather="sliders" width="20"></i>
                                <span>Baner nổi bật</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ $url == route('coupon.index') ? 'active' : '' }}">
                            <a href="{{ route('coupon.index') }}" class='sidebar-link'>
                                <i data-feather="gift" width="20"></i>
                                <span>Phiếu mua hàng</span>
                            </a>
                        </li>




                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Thông báo</h6>
                                <ul class="list-group rounded-none">
                                    @php
                                        $orderNew = App\Order::join('customer', 'order.cus_id', 'customer.customer_id')
                                            ->join('orderdetail', 'order.order_code', 'orderdetail.order_code')
                                            ->where('order_status', 1)
                                            ->orderby('order_id', 'desc')
                                            ->get();
                                    @endphp
                                    @foreach ($orderNew as $new)
                                        <li class="list-group-item border-0 align-items-start">
                                            <div class="avatar bg-success me-3">
                                                <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                            </div>

                                            <div>
                                                <h6 class='text-bold'>Đơn hàng mới</h6>
                                                <p class='text-xs'>
                                                    Một đơn đặt hàng được thực hiện bởi <b>{{ $new->customer_name }}</b> cho sản phẩm
                                                    <b>{{ App\Product::find($new->pro_id)->product_name }}</b>
                                                </p>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Tài khoản</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Tin nhắn</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Cài dặt</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Đăng xuất</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('about.create') }}" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{ asset('frontend/assets/images/user.jpg') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Tài khoản</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Tin nhắn</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Cài đặt</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href=""><i data-feather="log-out"></i> Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>{{ now()->format('Y') }} &copy; All Rights Reserved</p>
                    </div>
                    <div class="float-end">
                        <p>This website is completed by <span class='text-danger'><i data-feather="heart"></i></span> by
                            <a target="_blank"
                                href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#scheduled?compose=DmwnWrRpdtpCpRDsRWTWsDtPxWgNRtPLjXmZwxBSQfthBlHQxdqxwSbcnsMKQCpsXCvXJfQmnpbB">
                                Văn Học</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <input type="hidden" name="csrf-token" value="{{ csrf_token() }}">
    <style>
        .btn-outline-waring:hover,
        .btn-outline-info:hover,
        .btn-outline-success:hover,
        .btn-outline-danger:hover,
        .btn-outline-primary:hover {
            color: #fff !important;
        }

        .display {
            display: none;
        }

    </style>
    @php
        Session::forget('gallery_session');
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('backend/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="csrf-token"]').val()
                },
            });
        });
    </script>

    @yield('js')
</body>

</html>
