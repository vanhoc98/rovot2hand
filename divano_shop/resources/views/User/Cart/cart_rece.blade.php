@extends('Layout_User')
@section('content')
    <!-- ========================  Thủ tục thanh toán ======================== -->

    <section class="thủ tục thanh toán">

        <!-- === header === -->

        <header>
            <div class="container">
                <h2 class="title">Thanh toán đơn hàng</h2>
                <div class="text">
                    <p>Xác nhận chi tiết đơn đặt hàng của bạn</p>
                </div>
            </div>
        </header>

        <!-- === step wrapper === -->

        <div class="step-wrapper">

            <div class="container">

                <div class="stepper">
                    <ul class="row">
                        <li class="col-3 active">
                            <span data-text="Các mặt hàng trong giỏ hàng"></span>
                        </li>
                        <li class="col-3 active">
                            <span data-text="Vận chuyển"></span>
                        </li>
                        <li class="col-3 active">
                            <span data-text="Thanh toán"></span>
                        </li>
                        <li class="col-3 active">
                            <span data-text="Biên nhận"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- === left content === -->

        <div class="container">


            <!-- ========================  Biên nhận ======================== -->

            <div class="cart-wrapper">

                <div class="note-block">

                    <div class="row">
                        <!-- === left content === -->

                        <div class="col-md-6">


                            <div class="h4">Thông tin vận chuyển</div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Tên</strong> <br />
                                        <span>{{ ucfirst(Session::get('customer_cart')['name_cart']) }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email</strong><br />
                                        <span>{{ Session::get('customer_cart')['email_cart'] }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Số điện thoại</strong><br />
                                        <span>{{ Session::get('customer_cart')['phone_cart'] }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Địa chỉ</strong><br />
                                        <span>{{ Session::get('customer_cart')['address_cart'] }}</span>
                                    </div>
                                </div>
                                @if (Session::get('customer_cart')['note_cart'])
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Ghi chú</strong><br />
                                        <span>{{ Session::get('customer_cart')['note_cart'] }}</span>
                                    </div>
                                </div>
                                @endif



                            </div>



                        </div>
                        <!--/col-md-6-->
                        <!-- === right content === -->

                        <div class="col-md-6">

                            <div class="h4">Chi tiết đơn hàng</div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Mã đơn hàng</strong> <br />
                                        <span>{{ mt_rand() }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Mã  giao dịch</strong> <br />
                                        @php
                                            $code = mt_rand(0,9999999999);
                                        @endphp
                                        <span>{{ $code }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Ngày đặt hàng</strong> <br />
                                        <span>{{ now()->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Ngày dự kiến giao hàng tới</strong> <br />
                                        <span>{{ Carbon\Carbon::now()->addDays(6)->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="h4">Chi tiết thanh toán</div>

                            <hr />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Thời gian giao dịch</strong> <br />
                                        <span>{{ now()->format('d/m/Y') }} at {{ now()->format('H:i') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Thành tiền</strong><br />
                                        <span>{{ number_format(Session::get('cart_order')['total']) }} vnđ</span>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Chi tiết giỏ hàng</strong><br />
                                        <span>******{{ substr($code,6) }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Các mặt hàng trong giỏ hàng</strong><br />
                                        <span>{{ Session::get('cart_order')['count'] }}</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <hr />

            <!-- ========================  Cart wrapper ======================== -->

            {{--  @include('User.Cart.cart_include')  --}}

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-6 offset-6 text-right">
                        <a href="{{ route('home.index') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Về Home</a>
                    </div>
                </div>
            </div>

        </div>
        <!--/container-->

    </section>
@endsection
