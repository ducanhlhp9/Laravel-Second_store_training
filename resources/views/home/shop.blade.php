@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Danh mục Sản phẩm</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a href="{{route('shop')}}">Danh mục Sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area p_120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <form  id="form_order" method="get">
                            <div class="left_dorp">
                                <select class="sorting" name="orderBy">
                                    <option value="default" selected="selected">Mặc định</option>
                                    <option value="latest">Sản phẩm mới nhất</option>
                                    <option value="old">Sản phẩm cũ</option>
                                    <option value="price">Giá từ nhỏ đến lớn</option>
                                </select>
                            </div>
                        </form>

                        <div class="right_page ml-auto">
                            <nav class="cat_page" aria-label="Page navigation example">
                                <ul class="pagination">
                                    {!! $productHot->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="latest_product_inner row">
                        @if(isset($products))
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                                <img class="img-fluid" src="{{pare_url_file($product->pro_avatar)}}"
                                                     alt="" style="width: 262px;height: 279px">
                                            </a>
                                            <div class="p_icon">
                                                <a href="#"><i class="lnr lnr-heart"></i></a>
                                                <a href="{{route('add.shopping.cart',$product->id)}}"><i
                                                        class="lnr lnr-cart"></i></a>
                                            </div>
                                        </div>
                                        <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                            <h4>{{$product->pro_name}}</h4></a>
                                        <h5>{{number_format($product->pro_price)}} VNĐ</h5>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <li>
                                                <a style="margin-left: 40px" href="{{route('get.list.product',[$category->c_slug,$category->id])}}">{{$category->c_name}}
                                                    <i
                                                        class="fa {{$category->c_icon}}"></i></a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </aside>
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Sản phẩm</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @if(isset($productHot))
                                        @foreach($productHot as $hot)
                                            <a style="margin-left: 40px" href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}">
                                                <img src="{{pare_url_file($hot->pro_avatar)}}"
                                                     style="width: 80px;height: 80px">
                                            </a>
                                            <h4>{{$hot->pro_name}}</h4>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </aside>
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Lọc sản phẩm</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li><a href="?price=1">Dưới 1,000,000 VNĐ</a></li>
                                    <li><a href="?price=2">1,000,000 đến 5,000.000 VNĐ</a></li>
                                    <li><a href="?price=3">5,000,000 đến 10,000,000 VNĐ</a></li>
                                    <li><a href="?price=4">Trên 10,000,000 VNĐ</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!--================Most Product Area =================-->
    <section class="most_product_area">
        <div class="main_box">
            <div class="container">
                <div class="main_title">
                    <h2>Sản Phẩm mới nhất</h2>
                </div>
                <div class="latest_product_inner row">
                    @if(isset($productNew))
                        @foreach($productNew as $New)
                            <h4></h4>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="f_p_item">
                                    <div class="f_p_img">
                                        <a href="{{route('get.detail.product',[$New->pro_slug,$New->id])}}">
                                            <img class="img-fluid" src="{{pare_url_file($New->pro_avatar)}}" alt=""
                                                 style="width: 200px;height: 200px">
                                        </a>
                                        <div class="p_icon">
                                            <a href="#"><i class="lnr lnr-heart"></i></a>
                                            <a href="{{route('add.shopping.cart',$New->id)}}"><i
                                                    class="lnr lnr-cart"></i></a>
                                        </div>
                                    </div>
                                    <a href="{{route('get.detail.product',[$New->pro_slug,$New->id])}}">
                                        <h4>{{$New->pro_name}}</h4></a>
                                    <h5>{{number_format($New->pro_price)}} VNĐ</h5>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--================End Most Product Area =================-->
@stop
@section('script')
    <script>
        $(function () {
            $('.sorting').change(function () {
                $("#form_order").submit();

            });
        });
    </script>
@stop
