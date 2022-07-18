@extends('Layout_User')
@section('content')
    <!-- ========================  Thủ tục thanh toán ======================== -->

    <section class="thủ tục thanh toán">

        <!-- === header === -->

        <header>
            <div class="container">
                <h2 class="title">Giỏ hàng</h2>
                <div class="text">
                    <p>Tiếp tục chi tiết đơn đặt hàng của bạn</p>
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
                        <li class="col-3">
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

            <!-- ========================  Cart wrapper ======================== -->

            <div class="cart-wrapper">

                <!-- cart header -->

                <div class="cart-block cart-block-header clearfix">
                    <div><span>Sản phẩm</span></div>
                    <div><span>&nbsp;</span></div>
                    <div><span>Số lượng</span></div>
                    <div class="text-right"><span>Giá</span></div>
                </div>

                <!-- các mặt hàng trong giỏ hàng -->

                <div class="clearfix" id="loaddata">

                    <!-- cart item -->


                </div>

                <!--cart prices -->

                <div class="row">
                    <div class="col-md-4 offset-md-8">

                        <!-- discount -->

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Miễn giảm <span id="discount"></span></strong>
                            </div>
                            <div>
                                <span id="discount_price">0</span> vnđ
                            </div>
                        </div>

                        <!-- discount -->

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>0 vnđ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="hidden_url" value="{{ Request::url() }}">
                <!-- cart final price -->

                <div class="clearfix">
                    <div class="cart-block cart-block-footer cart-block-footer-price clearfix">

                        <div>
                            <form method="post" id="submitcoupon">

                                <span class="checkbox">
                                    <input type="checkbox" id="couponCodeID">
                                    <label for="couponCodeID">Mã giảm giá</label>
                                    <input type="text" id="coupon_code" name="coupon_code" class="form-control form-coupon"
                                        value="" placeholder="Enter your coupon code" />
                                </span>
                            </form>
                        </div>

                        <div style="float: right;text-align: right;">
                            <div class="h2 title" id="total_price">0 vnđ</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-6">
                        <a href="javscript:void(0)" onclick="window.history.go(-1); return false;"
                            class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span>Mua sắm nhiều hơn</a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ Auth::check() && $carts > 0 ? route('cart.create') : '#' }}"
                            class="btn btn-clean-dark"><span class="icon icon-cart"></span> Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>

        </div>
        <!--/container-->

    </section>
@endsection
@section('js')
    <script>
        Loaddata();
        $(document).on('submit','#submitcoupon',function(e){
            e.preventDefault();
            var coupon_code = $('#coupon_code').val();

            $.ajax({
                type: 'post',
                url: '{{ route('about.store') }}',
                data: { coupon_code:coupon_code },
                success:function(res){
                    if(res.message){
                        alert(res.message);
                        Loaddata();
                    }else{
                        alert(res.error);
                    }
                }
            });
        });
        function Loaddata() {
            var url = $('#hidden_url').val();
            $.ajax({
                type: 'get',
                url: '{{ route('cart.index') }}',
                data: {
                    url: url
                },
                success: function(res) {
                    $('#loaddata').html(res.data);
                    $('#discount').html(res.discount);
                    $('#discount_price').html(res.discount_price);
                    $('#total_price').html(res.total_price);
                }
            })
        }
    </script>
@endsection
