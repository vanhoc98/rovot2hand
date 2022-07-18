@extends('Layout_User')
@section('content')
    <!-- ========================  Contact ======================== -->

    <section class="contact">

        <!-- === Goolge map === -->

       <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.908852709458!2d105.85953071476264!3d20.99629048601596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac0d865ceda3%3A0x681bbf476fe6fa69!2zUC4gTWluaCBLaGFpLCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1658076729196!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>

        <div class="container">

            <div class="row">

                <div class="col-md-10 offset-md-1">

                    <div class="contact-block">

                        <div class="contact-info">
                            <div class="row">
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-map-marker"></span>
                                        <figcaption>
                                            <strong>Chúng tôi ở đâu?</strong>
                                            <span>Hoàng Mai - Hà Nội, Việt Nam <br /> Bình Dương, Việt Nam</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-phone"></span>
                                        <figcaption>
                                            <strong>Gọi cho chúng tôi</strong>
                                            <span>
                                                <strong>T</strong> +84 339 578 858 <br />
                                                <strong>F</strong> +84 838 613 023
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-4">
                                    <figure class="text-center">
                                        <span class="icon icon-clock"></span>
                                        <figcaption>
                                            <strong>Giờ làm việc</strong>
                                            <span>
                                                <strong> Thứ 2 </strong> - Thứ 7: 10 giờ sáng - 6 giờ chiều <br />
                                                <strong> Chủ nhật </strong> 12 giờ trưa - 2 giờ chiều
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info">
                            <h2 class="title">Gửi email</h2>
                            <p>
                                Cảm ơn bạn đã quan tâm đến các chủ đề của chúng tôi. Chúng tôi tin tưởng vào sự sáng tạo là một trong những động lực chính
                                của sự tiến bộ. Vui lòng sử dụng biểu mẫu này nếu bạn có bất kỳ câu hỏi nào về sản phẩm của chúng tôi và cũng nhận được
                                trở lại với bạn rất sớm.
                            </p>

                            <div class="contact-form-wrapper">

                                <div class="contact-form clearfix">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" value="" class="form-control"
                                                        placeholder="Tên ( Biệt danh)" required="required">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" value="" class="form-control"
                                                        placeholder="Email" required="required">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Nội dung"
                                                        rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn btn-primary" value="Gửi tin nhắn" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/contact-block-->
                </div>
                <!--col-sm-8-->
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </section>

    <!-- ========================  Newsletter ======================== -->

    <section class="banner">

        <div class="container-fluid">

            <div class="banner-image" style="background-image:url({{ asset('frontend/assets/images/gallery-1.jpg') }})">
                <!--Header-->

                <header>
                    <div class="container">

                        <h2 class="h2 title">Giữ liên lạc!</h2>
                        <div class="text">
                            <p>Hãy là người đầu tiên biết về tất cả các tính năng đồ gia dụng mới!</p>
                        </div>

                    </div>
                </header>

                <!--Content-->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <input type="email" class="form-control" name="name" value="" placeholder="Enter your e-mail">
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-clean">Theo dõi ngay</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/container-fluid-->

    </section>

    <!-- ========================  Benefits ======================== -->

    <section class="benefits">

        <!--Header-->

        <header class="d-none">
            <div class="container">
                <h2 class="h2 title">Lợi ích</h2>
            </div>
        </header>

        <!--Header-->

        <div class="container">

            <div class="row">

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-gift"></i></div>
                        <figcaption>
                            <span>
                                <strong>Nhận được món quà của bạn</strong> <br />
                                <small>Bạn là khách hàng mới phải không?</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-rocket"></i></div>
                        <figcaption>
                            <span>
                                <strong>Chuyển phát nhanh</strong> <br />
                                <small>Chúng tôi đang vận chuyển khắp nơi trên thế giới</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-history"></i></div>
                        <figcaption>
                            <span>
                                <strong>Đảm bảo hoàn lại tiền</strong> <br />
                                <small>Hoàn tiền trong 30 ngày</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>

                <!--Icon-->

                <div class="col-6 col-lg-3" data-tilt>
                    <figure>
                        <div class="icon"><i class="icon icon-diamond"></i></div>
                        <figcaption>
                            <span>
                                <strong>Giảm giá VIP</strong> <br />
                                <small>Trở thành thành viên VIP</small>
                            </span>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/container-->

    </section>
@endsection
