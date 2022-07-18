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
            @if (Session::get('coupon'))
            <div>
                <span class="checkbox">
                    <span class="alert alert-info">Đã bao gồm mã khuyến mại!</span>
                </span>
            </div>
            @endif
            <div style="float: right;text-align: right;">
                <div class="h2 title" id="total_price">0 vnđ</div>
            </div>
        </div>
    </div>

</div>
@section('js')
    <script>
        Loaddata();

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
