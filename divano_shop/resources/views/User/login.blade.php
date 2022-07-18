@extends('Layout_User')
@section('content')
    <!-- ========================  Login & register ======================== -->

    <section class="login">

        <!--Header-->

        <header class="d-none">
            <div class="container">
                <h2 class="title">Login & registration</h2>
                <div class="text">
                    <p>Suspendisse scelerisque odio eu felis eleifend, vitae gravida magna iaculis. Vestibulum volutpat,
                        purus in consectetur porta, velit felis suscipit metus, et pharetra enim augue suscipit est. Aenean
                        non ante tortor. Nam egestas
                        tincidunt turpis, quis accumsan est vestibulum non</p>
                    <hr />
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </div>
            </div>
        </header>

        <!--Content-->

        <div class="container">

            <div class="row">

                <!-- === left content === -->

                <div class="col-md-6 offset-md-3">

                    <div class="login-wrapper">

                        <!--signin-->
                        <div class="login-block login-block-signup">

                            <div class="h4">Sign in <a href="javascript:void(0);"
                                    class="btn btn-main btn-sm btn-login pull-right">Tạo tài khoản mới</a></div>

                            <hr />
                            <form method="post" id="submit_signin">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="email" required name="email_in" id="email_in" class="form-control"
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="password" required name="pass_in" id="pass_in" class="form-control"
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId3">
                                            <label for="checkBoxId3">Remember me &nbsp;<a href="#">Forgot
                                                    password?</a></label>
                                        </span>
                                    </div>

                                    <div class="col-12">
                                        <hr />
                                        <input type="hidden" name="action" id="action" value="SignIn">
                                        <input type="submit" class="btn btn-primary" value="Sign in">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/signin-->

                        <!--signup-->
                        <div class="login-block login-block-signin">

                            <div class="h4">Register now <a href="javascript:void(0);"
                                    class="btn btn-main btn-sm btn-register pull-right">Already member?</a></div>

                            <hr />
                            <form method="post" id="submit_signup">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="name_up" value="" class="form-control" required placeholder="Full name: *">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <input type="email" id="email_up" value="" class="form-control" required placeholder="Email: *">
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <input type="password" id="pass_up" value="" class="form-control" required placeholder="Password: *">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <hr />
                                        <span class="checkbox">
                                            <input type="checkbox" id="checkBoxId1">
                                            <label for="checkBoxId1">I have read and accepted the <a href="#">terms</a>, as
                                                well
                                                as read and understood our terms of <a href="#">business
                                                    contidions</a></label>
                                        </span>
                                        <hr />
                                    </div>

                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-outline-dark" value="Create account">
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!--/signup-->

                    </div>
                    <!--/login-wrapper-->

                </div>
                <!--/col-md-6-->

            </div>

        </div>
    </section>
    <style>
        .display{
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).on('submit', '#submit_signin,#submit_signup', function(e) {
            e.preventDefault();

            if($('#action').val() == 'SignIn'){
                var email = $('#email_in').val();
                var pass = $('#pass_in').val();

                var data = {
                    email: email,
                    pass: pass,
                    action:$('#action').val()
                };
            }else{
                var email = $('#email_up').val();
                var name = $('#name_up').val();
                var pass = $('#pass_up').val();

                var data = {
                    email: email,
                    name: name,
                    pass: pass,
                    action:$('#action').val()
                };
            }

            $.ajax({
                type: 'post',
                url: '{{ route('login.store') }}',
                data: data,
                success: function(res) {
                    if (res.status == 200) {
                        if (res.level == 1) {
                            location.replace(res.url);
                        } else {
                            window.history.go(-1);
                            return false;
                        }

                    } else {
                        alert(res.message);
                    }
                }
            })
        })
    </script>
@endsection
