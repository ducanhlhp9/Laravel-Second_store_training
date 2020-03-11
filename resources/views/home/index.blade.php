@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-5">
                        <h3>iPhone 11 Pro MAX</h3>
                        <a class="white_bg_btn" href="{{route('shop')}}">Xem Danh mục</a>
                    </div>
                    <div class="col-lg-7">
                        <div class="halemet_img">
                            <img src="{{asset('home/img/banner/1_55_2-removebg-preview.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Feature Product Area =================-->
    <section class="feature_product_area">
        <div class="main_box">
            <div class="container">
                <div class="row hot_product_inner">
                    <div class="col-lg-6">
                        <div class="hot_p_item">
                            <img class="img-fluid" src="{{asset('img/product/hot-product/Apple-MacBook-Pro-2020.jpg')}}" alt="">
                            <div class="product_text">
                                <h5 style="color: white" class="btn btn-danger">Hot Deals</h5>
                                <a href="{{route('shop')}}" class="btn btn-info" style="color: white">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hot_p_item">
                            <img class="img-fluid" src="{{asset('img/product/hot-product/Apple-MacBook-Pro-2020.jpg')}}" alt="">
                            <div class="product_text">
                                <h5 style="color: white" class ="btn btn-danger">Hot Deals</h5>
                                <a href="{{route('shop')}}" class="btn btn-info" style="color: white">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature_product_inner">
                    <div class="main_title">
                        <h2>Sản Phẩm Nổi Bật</h2>
                    </div>
                    <div class="latest_product_inner row">
                        @if(isset($productHot))
                            @foreach($productHot as $hot)
                                <h4></h4>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}">
                                            <img class="img-fluid" src="{{pare_url_file($hot->pro_avatar)}}" alt=""
                                                 style="width: 200px;height: 200px">
                                            </a>
                                            <div class="p_icon">
                                                <a href="#"><i class="lnr lnr-heart"></i></a>
                                                <a href="{{route('add.shopping.cart',$hot->id)}}"><i
                                                        class="lnr lnr-cart"></i></a>
                                            </div>
                                        </div>
                                        <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}"><h4>{{$hot->pro_name}}</h4></a>
                                        <h5>{{number_format($hot->pro_price)}}</h5>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Feature Product Area =================-->
    <!--================Deal Timer Area =================-->
    <section class="timer_area">
        <div class="container">
            <div class="main_title">
                <h2>Thời gian khuyến mãi còn lại</h2>
                <p>Hãy nhanh tay có cho mình sản phẩm mới nhất của chúng tôi</p>
                <a class="main_btn" href="{{route('shop')}}">Shop Now</a>
            </div>
            <div class="timer_inner">
                <div id="timer" class="timer">
                    <div class="timer__section days">
                        <div class="timer__number"></div>
                        <div class="timer__label">days</div>
                    </div>
                    <div class="timer__section hours">
                        <div class="timer__number"></div>
                        <div class="timer__label">hours</div>
                    </div>
                    <div class="timer__section minutes">
                        <div class="timer__number"></div>
                        <div class="timer__label">Minutes</div>
                    </div>
                    <div class="timer__section seconds">
                        <div class="timer__number"></div>
                        <div class="timer__label">seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Deal Timer Area =================-->
    <!--================Latest Product Area =================-->
    <section class="feature_product_area latest_product_area">
        <div class="main_box">
            <div class="container">
                <div class="feature_product_inner">
                    <div class="main_title">
                        <h2>Bài Viết</h2>
                    </div>
                    <div class="latest_product_inner row">
                        @if(isset($productHot))
                            @foreach($articles as $article)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid" src="{{pare_url_file($article->a_avatar)}}" alt=""
                                                 style="width: 260px;height: 260px">
                                        </div>
                                        <a href="#"><h4>{{$article->a_title_seo}}</h4></a>
                                        <h5>{{$article->a_description_seo}}</h5>
                                        <a href="" class="white_bg_btn">Chi tiết</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Latest Product Area =================-->

    <!--================Clients Logo Area =================-->
    <section class="clients_logo_area">
        <div class="container">
            <div class="main_title">
            </div>
        </div>
    </section>
    <!--================End Clients Logo Area =================-->

    <!--================Most Product Area =================-->
    <section class="most_product_area">
        <div class="main_box">
            <div class="container">
                <div class="main_title">
                    <h2>Sản phẩm mới nhất</h2>
                </div>
                <div class="row most_product_inner">
                    <div class="col-lg-4 col-sm-6">
                        <div class="most_p_list">
                            @foreach($products as $product)
                                @if(($product->id)%3 == 0)
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                            <img src="{{pare_url_file($product->pro_avatar)}}"
                                                 style="width: 80px;height: 80px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><h4>{{$product->pro_name}}</h4></a>
                                            <h3>{{number_format($product->pro_price)}} VNĐ</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="most_p_list">
                            @foreach($products as $product)
                                @if(($product->id)%3 == 1)
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                                <img src="{{pare_url_file($product->pro_avatar)}}"
                                                     style="width: 80px;height: 80px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><h4>{{$product->pro_name}}</h4></a>
                                            <h3>{{number_format($product->pro_price)}} VNĐ</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="most_p_list">
                            @foreach($products as $product)
                                @if(($product->id)%3 == 2)
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                                <img src="{{pare_url_file($product->pro_avatar)}}"
                                                     style="width: 80px;height: 80px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><h4>{{$product->pro_name}}</h4></a>
                                            <h3>{{number_format($product->pro_price)}} VNĐ</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Most Product Area =================-->
@stop
