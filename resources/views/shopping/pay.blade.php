@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Thanh toán</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a href="{{route('get.form.pay')}}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================checkout  Area =================-->
    <section class="login_box_area p_120">
        <div class="container">
            <div class="col-lg-8">
                <div class="cupon_text">
                    <a class="main_btn" href="">Thông tin đơn hàng</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_form_inner reg_form">
                        <form class="row login_form" action="" method="post">
                            @csrf
                            <div class="col-md-12 form-group">
                                <h4>Tên Khách hàng</h4>
                                <input type="text" class="form-control"   value="{{get_data_user('web','name')}}">
                            </div>
                            <div class="col-md-12 form-group">
                                <h4>email khách hàng</h4>
                                <input type="email" class="form-control"  value="{{get_data_user('web','email')}}" >
                            </div>
                            <div class="col-md-12 form-group">
                                <h4>Số điện thoại</h4>
                                <input type="number" class="form-control" value="{{get_data_user('web','phone')}}" name ="phone" >
                            </div>
                            <div class="col-md-12 form-group" >
                                <h4>Địa chỉ</h4>
                                <input type="text" class="form-control"  value="{{get_data_user('web','address')}}" name = "address">
                            </div>
                            <div class="col-md-12 form-group" >
                                <h4>Địa chỉ</h4>
                                <input type="text" class="form-control"  value="" name ="note">
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn submit_btn">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner reg_form">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="{{pare_url_file($product->attributes->avatar)}}"
                                                     style="width: 80px;height: 80px">
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    <p>{{$product->name}}</p>
                                                    <ul>
                                                        <li>Số lượng: {{$product->quantity}}</li>
                                                    </ul>
                                                </h5>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{number_format($product->quantity*($product->price))}}</h5>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tr class="bottom_button">
                                <td></td>
                                <td>
                                    <div class="cupon_text">
                                        <a class="btn btn-info" href="#">Tổng số tiền:
                                            <h5>{{number_format(\Cart::getSubTotal()-\Cart::getSubTotal()*0.1)}}</h5>
                                        </a>
                                    </div>
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--================End checkout Area =================-->

@stop
