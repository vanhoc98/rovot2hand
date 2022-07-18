<div class="row">

    <!--Product item-->
    @if (count($products) > 0)
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
                                Gubergren amet dolor ea diam takimata consetetur facilisis blandit et
                                aliquyam
                                lorem ea duo labore diam sit et consetetur nulla
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    @else
        <div class="col-12 mt-5">
            <h3 style="text-align: center;">Data Not Found</h3>
        </div>
    @endif


</div>

<!--Pagination-->

<div class="pagination-wrapper">
    {!! $products->render('User.paginatoin') !!}
</div>
<style>
    .pagination-wrapper .pagination .page-item .page-link {
        width: 35px;
    }

</style>
