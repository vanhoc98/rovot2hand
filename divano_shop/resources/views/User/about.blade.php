@extends('Layout_User')
@section('content')
    <!-- ========================  About ======================== -->

    <section class="about pt-4 pt-lg-5">

        <!--Header-->

        <header>
            <div class="container">
                <h2 class="title">Giới thiệu</h2>
                <div class="text">
                    <p>Các sản phẩm tại Gia Dụng Sài Gòn luôn được cam kết là hàng chính hãng, có nguồn gốc xuất xứ rõ ràng và luôn được kiểm tra kỹ càng trước khi bày bán tại cửa hàng.</p>

                <p>Với chính sách bảo hành, chính sách vận chuyển và chính sách tích điểm hấp dẫn, chúng tôi luôn hy vọng đem lại những trải nghiệm tốt nhất cho khách hàng.
                Ngoài hệ thống cửa hàng tại TP Hồ Chí Minh chúng tôi còn phát triển hệ thống bán hàng trực tuyến tại địa chỉ <strong>Divano</strong> giúp khách hàng dễ dàng tra cứu thông tin và mua sắm mỗi ngày.
                Chúng tôi rất mong được phục vụ ngày càng nhiều hơn nữa những khách hàng mua hàng online đến từ các tỉnh thành trên toàn quốc.</p>

                <p>Gia Dụng Sài Gòn luôn nhiệt tình đón nhận những ý kiến đóng góp từ phía Khách hàng thông qua số điện thoại 0339578858 - 0838613023 để ngày càng cải tiến và nâng cao hơn nữa chất lượng phục vụ.</p>

                Gia Dụng Sài Gòn rất hân hạnh được phục vụ Quý khách và hy vọng Quý khách sẽ có những trải nghiệm vui vẻ tại chuỗi cửa hàng của chúng tôi.</p>
                </div>
            </div>
        </header>

        <!--Main image-->

        <div class="container-fluid">
            <div class="image">
                <img src="{{ asset('frontend/assets/images/gallery-2.jpg') }}" alt="Alternate Text" />
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <h4>Cửa hàng Divano</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam accumsan efficitur dui in
                        porttitor. Donec mollis volutpat consectetur. Vestibulum pulvinar iaculis dolor, molestie semper
                        ulvinar iaculis purus lacinia quis.
                    </p>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Thành công của chúng tôi</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam accumsan efficitur dui in
                        porttitor. Donec mollis volutpat consectetur. Vestibulum pulvinar iaculis dolor, molestie semper
                        ulvinar iaculis purus lacinia quis.
                    </p>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Những gì chúng tôi tin tưởng vào</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam accumsan efficitur dui in
                        porttitor. Donec mollis volutpat consectetur. Vestibulum pulvinar iaculis dolor, molestie semper
                        ulvinar iaculis purus lacinia quis.
                    </p>
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                </div>
            </div>

        </div>

    </section>

    <!-- ========================  Team ======================== -->

    <section class="team">

        <!--Header-->

        <header>
            <div class="container">
                <h1 class="h2 title">Đội ngũ chúng tôi</h1>
                <div class="text">
                    <p>Đội ngũ chúng tôi giám sát liên tục và cẩn thận về các sản phẩm, họ chấp nhận và
                        phát triển những thay đổi, nghiên cứu các thứ mới mẻ và mang đến tay người dùng.</p>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!--Team member-->

                <div class="col-md-3" data-3d>
                    <article>
                        <div class="details details-text">
                            <div class="inner">
                                <h5 class="title">Hà Văn Học</h5>
                                <h6 class="title">Nhà phát triển</h6>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('frontend/assets/images/person-1.jpg') }}" alt="" />
                        </div>
                        <div class="details details-social">
                            <div class="inner">
                                <a href="https://www.facebook.com/HocDolce9X"target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.google.com"target="_blank"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Team member-->

                <div class="col-md-3" data-3d>
                    <article>
                        <div class="details details-text">
                            <div class="inner">
                                <h5 class="title">Hà Văn Học</h5>
                                <h6 class="title">Nhà phát triển</h6>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('frontend/assets/images/person-1.jpg') }}" alt="" />
                        </div>
                        <div class="details details-social">
                            <div class="inner">
                                <a href="tel://0339578858"target="_blank"><i class="fa fa-phone"></i></a>
                                <a href="#"><i class="fa fa-envelope"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Team member-->

                <div class="col-md-3" data-3d>
                    <article>
                        <div class="details details-text">
                            <div class="inner">
                                <h5 class="title">Jim Douglas</h5>
                                <h6 class="title">Architect</h6>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('frontend/assets/images/person-2.jpg') }}" alt="" />
                        </div>
                        <div class="details details-social">
                            <div class="inner">
                                <a href="https://www.facebook.com/HocDolce9X"target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

                <!--Team member-->

                <div class="col-md-3" data-3d>
                    <article>
                        <div class="details details-text">
                            <div class="inner">
                                <h5 class="title">Mathew Coock</h5>
                                <h6 class="title">Quality director</h6>
                            </div>
                        </div>
                        <div class="image">
                            <img src="{{ asset('frontend/assets/images/person-3.jpg') }}" alt="" />
                        </div>
                        <div class="details details-social">
                            <div class="inner">
                                <a href="https://www.facebook.com/HocDolce9X"target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
            <!--/row-->

        </div>

    </section>

    <!-- ========================  Numbers ======================== -->

    <section class="numbers">

        <!--Header-->

        <header>
            <div class="container">
                <h1 class="h2 title">Thành công của bạn là thành công của chúng tôi</h1>
                <div class="text">
                    <p>Các nhà phát triển của chúng tôi giám sát liên tục và cẩn thận về hệt hống, họ chấp nhận và
phát triển các thay đổi, nghiên cứu thời đời sống, cũng như xã hội học, thay đổi và biến chúng thành thiết kế độc đáo.</p>
                </div>
            </div>
        </header>

        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <div class="item">
                        <span class="chart" data-percent="100">
                            <span class="percent"></span>
                        </span>
                        <div class="title">Vận chuyển</div>
                        <div class="text">Chúng tôi hành động khéo léo</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <span class="chart" data-percent="40">
                            <span class="percent"></span>
                        </span>
                        <div class="title">Giảm giá</div>
                        <div class="text">Chúng tôi phản hồi nhanh chóng </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <span class="chart" data-percent="85">
                            <span class="percent"></span>
                        </span>
                        <div class="title">Quảng cáo</div>
                        <div class="text">Chúng tôi tập trung vào thị trường</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <span class="chart" data-percent="100">
                            <span class="percent"></span>
                        </span>
                        <div class="title">Khách hàng hạnh phúc</div>
                        <div class="text">Chúng tôi làm việc với khách hàng của chúng tôi </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
