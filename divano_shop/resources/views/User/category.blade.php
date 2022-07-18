@extends('Layout_User')
@section('content')
    <!-- ========================  Category ======================== -->

    <section class="products pt-0">

        <!--Header-->

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh mục sản phẩm</li>
                </ol>
                <h2 class="title">Thể loại</h2>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Product item-->
                @foreach ($category as $cate)
                <div class="col-6 col-lg-4">
                    <article>
                        <div class="figure-block">
                            <div class="image">
                                <a href="{{ route('categories.show', $cate->category_slug) }}" class="clickCate">
                                    <img src="{{ asset('uploads/category/'.$cate->category_image) }}" alt="" width="360" />
                                </a>
                            </div>
                            <div class="text">
                                <h2 class="title h4"><a href="{{ route('categories.show', $cate->category_slug) }}" class="clickCate">{{ ucfirst($cate->category_name) }}</a></h2>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            <!--/row-->

        </div>
        <!--/container-->

    </section>
@endsection
