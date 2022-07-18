@extends('Layout_User')
@section('content')
    <!-- ========================  Blog ======================== -->

    <section class="blog blog-category blog-animated pt-0">

        <!--Header-->

        <header>
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
                <h2 class="title">Sản phẩm bán chạy</h2>
                <div class="text">
                    <p>Xoa bóp sự ghét bỏ của con mèo</p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Blog content-->

                <div class="col-lg-9" id="loadData">

                    @include('User.Blog.blog_pa')

                </div>

                <!--Blog menu-->
                @include('User.Blog.blog_include')
                <!--/col-lg-3-->


            </div>
            <!--/row-->


        </div>
        <!--/container-->
    </section>
@endsection
@section('js')
    <script>
        function fetch_data(page) {
            $.ajax({
                url: "{{ url('blog/create?page=') }}" +page,
                dataType: 'html',
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
