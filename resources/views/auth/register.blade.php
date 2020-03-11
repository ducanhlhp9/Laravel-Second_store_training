@extends('layouts.app')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Đăng kí</h2>
                <div class="page_link">
                    <a href="{{route('home')}}">Trang chủ</a>
                    <a>Đăng kí</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Login Box Area =================-->
<section class="login_box_area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="login_form_inner reg_form">
                    <h3>Tạo tài khoản</h3>
                    <form class="row login_form" action="" method="post" >
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone number">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control"  name="address" placeholder="Nam dinh">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="re_password" name="re_password" placeholder="re_Password">
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="btn submit_btn">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

@stop
