@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Giỏ hàng</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a>Giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 1?>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>
                                    <h5>{{($i)}}</h5>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{pare_url_file($product->attributes->avatar)}}"
                                                 style="width: 80px;height: 80px">
                                        </div>
                                        <div class="media-body">
                                            <h5><p>{{$product->name}}</p></h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{number_format($product->price)}}</h5>
                                </td>
                                <td><h5>{{$product->quantity}}</h5></td>
                                <td>
                                    <h5>{{number_format($product->quantity*($product->price))}}</h5>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-danger" href="{{route('delete.shopping.cart',$key)}}"><i class="fa fa-times"></i>Xóa</a>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <!-- <a class="gray_btn" href="#">Update Cart</a> -->
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text">
                                    <a class="main_btn" href="#">Thông tin đơn hàng</a>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <td>
                            </td>
                            <td>
                                <h5>Tổng Tiền</h5>
                            </td>
                            <td>
                                <h5>{{number_format(\Cart::getSubTotal())}}</h5>
                            </td>
                        </tr>
                        <tr>

                            <td>

                            </td>
                            <td>
                                <h5>Thuế VAT</h5>
                            </td>
                            <td>
                                <h5>10%</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <h5>Tổng tiền thanh toán</h5>
                            </td>
                            <td>
                                <h5>{{number_format(\Cart::getSubTotal()+\Cart::getSubTotal()*0.1)}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner">
                                    <a class="gray_btn" href="{{route('home')}}">tiếp tục mua hàng</a>
                                    <a class="main_btn" href="{{route('get.form.pay')}}">Thanh toán</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@stop
