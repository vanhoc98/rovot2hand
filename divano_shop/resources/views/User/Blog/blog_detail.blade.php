@extends('Layout_User')
@section('content')
<!-- ========================  Blog article ======================== -->

<section class="blog pt-0">

    <!--Header-->

    <header>
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $detail->blog_title }}</li>
            </ol>
            <h2 class="title">In Virtual Reality, How Much <br />Body Do You Need?</h2>
        </div>
    </header>

    <!--Blog navigation-->

    <div class="blog-navigation">

        <!--Nav prev-->
        @if($detail->blog_id != 1)
        <a class="nav-link prev" href="{{ route('blog.show',[Str::slug($prev->blog_title),'blog'=>$prev->blog_id]) }}">
            <figure>
                <div class="image">
                    <img src="{{ asset('uploads/blog/'.$prev->blog_image) }}" alt="Alternate Text">
                </div>
                <figcaption>
                    <div class="blog-title h6">{!! $prev->blog_title !!}</div>
                </figcaption>
            </figure>
        </a>
        @endif

        <!--Nav next-->
        @if($next)
        <a class="nav-link next" href="{{ route('blog.show',[Str::slug($next->blog_title),'blog'=>$next->blog_id]) }}">
            <figure>
                <div class="image">
                    <img src="{{ asset('uploads/blog/'.$next->blog_image) }}" alt="Alternate Text">
                </div>
                <figcaption>
                    <div class="blog-title h6">{!! $next->blog_title !!}</div>
                </figcaption>
            </figure>
        </a>
        @endif
    </div>

    <!--Blog content-->

    <div class="container">

        <div class="row">

            <div class="col-lg-9">

                <!--Blog post-->

                <div class="blog-post">


                    <!--Blog content-->

                    <div class="blog-post-content pt-0">

                        <!--Title-->

                        <div class="blog-post-title">

                            <!--<h1 class="h1 blog-title">
                                In Virtual Reality, How Much <br />Body Do You Need?
                            </h1>-->

                            <h2 class="blog-subtitle h5">
                                {!! $detail->blog_content !!}
                            </h2>

                            <hr />

                            <!--Info-->

                            <div class="blog-info">
                                <div class="entry">
                                    <i class="fa fa-user"></i>
                                    <span>Admin</span>
                                </div>
                                <div class="entry">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{ Carbon\Carbon::parse($detail->created_at)->format('d.m.Y') }}</span>
                                </div>
                                <div class="entry">
                                    <i class="fa fa-comments"></i>
                                    <span>4 comments</span>
                                </div>
                            </div>

                            <hr />

                        </div>

                        <!--Main image-->

                        <div class="blog-image-main">
                            <img src="{{ asset('uploads/blog/'.$detail->blog_image) }}" alt="" />
                        </div>


                        <!--Blog text-->

                        <div class="blog-post-text">
                            {!! $detail->blog_desc !!}
                        </div>

                        <!--Blog footer info-->

                        <div class="blog-info blog-info-bottom">

                            <ul>
                                <li class="divider"></li>
                                <li>
                                    <i class="fa fa-tag"></i>
                                    <span>
                                        <a href="#">Culture</a>,
                                        <a href="#">Tech</a>,
                                        <a href="#">Sci-fi</a>,
                                        <a href="#">Modern living</a>
                                    </span>
                                </li>
                            </ul>

                        </div>
                        <!--/blog-info-->

                    </div>
                    <!--/blog-post-content-->

                </div>
                <!--blog-post-->

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
                                    <img src="{{ asset('frontend/assets/images/user.jpg') }}" alt="Alternate Text" width="70" />
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
                                    In vestibulum tellus ut nunc accumsan eleifend. Donec mattis cursus ligula, id iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus tempor justo et mollis
                                    facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
                                </p>
                            </div>

                            <!--Comment reply-->

                            <div class="comment-block">
                                <div class="comment-user">
                                    <div>
                                        <img src="{{ asset('frontend/assets/images/user.jpg') }}" alt="Alternate Text" width="70" />
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
                                        Curabitur sit amet elit quis tellus tincidunt efficitur. Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien nisl egestas diam, nec blandit diam
                                        ipsum eget dolor. Maecenas ultricies tempus nibh, sit amet facilisis mauris vulputate in.
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
                                    <img src="{{ asset('frontend/assets/images/user.jpg') }}" alt="Alternate Text" width="70" />
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
                                    Cras lobortis id elit eu vehicula. Sed porttitor nulla vitae nisl varius luctus. Quisque a enim nisl. Maecenas facilisis, felis sed blandit scelerisque, sapien nisl egestas diam, nec blandit diam ipsum eget dolor. In vestibulum tellus ut nunc accumsan
                                    eleifend. Donec mattis cursus ligula, id iaculis dui feugiat nec. Etiam ut ante sed neque lacinia volutpat. Maecenas ultricies tempus nibh, sit amet facilisis mauris vulputate in. Phasellus tempor justo et mollis
                                    facilisis. Donec placerat at nulla sed suscipit. Praesent accumsan, sem sit amet euismod ullamcorper, justo sapien cursus nisl, nec gravida
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
                            <p>Your email address will not be published.</p>
                        </div>

                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="" placeholder="Tên ( Biệt danh)" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="" placeholder="Email" />
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
            <!--col-sm-8-->
            <!--Blog menu-->
            @include('User.Blog.blog_include')
            <!--/col-lg-3-->

        </div>
        <!--/row-->

    </div>
    <!--/container-->

</section>
@endsection
