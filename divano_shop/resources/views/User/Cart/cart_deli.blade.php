@extends('Layout_User')
@section('content')
    <!-- ========================  Thủ tục thanh toán ======================== -->

    <section class="thủ tục thanh toán">

        <!--Header-->

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
                        <li class="col-3">
                            <span data-text="Thanh toán"></span>
                        </li>
                        <li class="col-3">
                            <span data-text="Biên nhận"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- === left content === -->

        <div class="container">


            <!-- ========================  Delivery ======================== -->
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <div class="cart-wrapper">

                    <div class="note-block">
                        <div class="row">

                            <!-- === left content === -->

                            <div class="col-md-6">

                                <div class="login-wrapper">

                                    <div class="login-block login-block-signup">

                                        <div class="h4">Thông tin vận chuyển</div>

                                        <hr />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" id="name_cart" name="name_cart" class="form-control" required
                                                        placeholder="Full name: *" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="tel" id="phone_cart" name="phone_cart" pattern="[0-9]{10}" value="" class="form-control" required
                                                        placeholder="Phone: *">
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <input type="email" id="email_cart" name="email_cart" class="form-control" required
                                                        placeholder="Email: *" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="address_cart" name="address_cart" required placeholder="Address: *" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="note_cart" name="note_cart" placeholder="Note: " rows="3"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!--/login-wrapper-->
                            </div>
                            <!--/col-md-6-->
                            <!-- === right content === -->

                            <div class="col-md-6">


                                <div class="h4">Chọn giao hàng</div>

                                <hr />
                                <div class="checkbox">
                                    <input type="radio" checked id="deliveryId3" name="deliveryOption">
                                    <label for="deliveryId3">Nhận tại cửa hàng - <strong>Miễn phí</strong></label>
                                </div>

                                <hr />

                                <div class="clearfix">
                                    <p>Một tùy chọn thực hiện mạnh mẽ thường bị bỏ qua là cung cấp dịch vụ nhận hàng tại địa phương. Nếu bạn có một địa điểm thực tế và có thể cho phép khách hàng của bạn hoàn toàn không phải trả chi phí vận chuyển, bạn nên làm như vậy!</p>
                                    <p><strong>Lợi ích:</strong></p>
                                    <ul>
                                        <li>Tránh cả chi phí vận chuyển và đóng gói</li>
                                        <li>Phát triển mối quan hệ trực tiếp với khách hàng của bạn</li>
                                        <li>Tiềm năng mua hàng bổ sung khi khách hàng đang ở cửa hàng của bạn</li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <hr />

                <!-- ========================  Cart wrapper ======================== -->
                @include('User.Cart.cart_include')

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-6">
                            <a href="javscript:void(0)" onclick="window.history.go(-1); return false;"
                                class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span>Mua sắm nhiều hơn</a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-clean-dark clickinfo"><span class="icon icon-cart"></span> Tiến hành thanh toán</button>

                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!--/container-->

    </section>
@endsection

