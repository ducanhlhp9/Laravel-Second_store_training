@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Chi tiết sản phẩm</h2>
                    <div class="page_link">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a href="{{route('shop')}}">Danh mục sản phẩm</a>
                        <a>Chi tiết sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <style>
        .list_start i:hover {
            cursor: pointer;
        }

        .list_text {
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #c5322d;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }

        .list_start .rating_active {
            color: yellow;
        }

        .active1 {
            color: #c5322d !important;
        }
    </style>
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    <img src="{{pare_url_file($productDetail->pro_avatar)}}" alt=""
                                         style="width: 60px;height: 60px">
                                </li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                    <img src="{{pare_url_file($productDetail->pro_avatar)}}" alt=""
                                         style="width: 60px;height: 60px">
                                </li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2">
                                    <img src="{{pare_url_file($productDetail->pro_avatar)}}" alt=""
                                         style="width: 60px;height: 60px">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{pare_url_file($productDetail->pro_avatar)}}"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{pare_url_file($productDetail->pro_avatar)}}"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{pare_url_file($productDetail->pro_avatar)}}"
                                         alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <?php
                        $avg = 0;
                        if ($productDetail->pro_total_rating) {
                            $avg = round($productDetail->pro_total_number / $productDetail->pro_total_rating, 2);
                        }
                        ?>
                        <h1>{{$productDetail->pro_name}}</h1>
                        <h2>
                            {{number_format($productDetail->pro_price)}}
                        </h2>
                        <h2 class="active1">
                            @for($i=1;$i<=5;$i++)
                                <i class="fa fa-star {{$i <= $avg ?'active1':''}}" style="color: #dedede "></i>
                            @endfor
                        </h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Category</span>
                                    : {{isset($productDetail->category->c_name) ? $productDetail->category->c_name:'[N\A]'}}
                                </a></li>
                            <li><a href="#"><span>Sales</span> : {{$productDetail->pro_sale}}</a></li>
                            <li><a href="#"><span>Description</span> : {!!$productDetail->pro_description !!}
                                </a></li>

                        </ul>
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                   class="input-text qty">
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                            <button
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                        </div>
                        <div class="card_area">
                            <a class="main_btn" href="{{route('add.shopping.cart',$productDetail->id)}}">Add to Cart</a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                       aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{!! $productDetail->pro_content !!}</p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate" style="border-radius: 5px; border:1px solid #dedede">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>{{$avg}} <i class="fa fa-star"></i></h4>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        @foreach($arrayratings as $key => $array)
                                            <?php
                                            $itemAvg = 0;
                                            $itemAvg = ($array['total'] / $productDetail->pro_total_rating) * 100;
                                            ?>
                                            <ul class="list" style="display: flex; align-items: center">
                                                <div style="width: 40px">
                                                    {{$key}} <i class="fa fa-star" style="color: yellow"></i>
                                                </div>
                                                <div style="width: 160px;margin: 0px 15px">
                                                    <span
                                                        style="width: 80%; height: 5px; display: block;border: 1px solid #dedede;background-color: #dedede;border-radius: 6px"><b
                                                            style="width: {{$itemAvg}}%; background-color: #ff253a;display: block;border-radius: 5px; height: 100%"></b></span>
                                                </div>
                                                <div style="width: 150px" href=""> {{$array['total']}} Đánh giá</div>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="review_list"
                                 style="margin-top:30px;border-radius: 5px; border:1px solid #dedede">
                                @if(isset($ratings))
                                    @foreach($ratings as $rating)

                                        <div class="review_item">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img style="margin-left: 40px"
                                                         src="{{asset('/img/product/single-product/review-1.png')}}"
                                                         alt="">
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{$rating->user->name}}</h4>
                                                    @for($i=1; $i<=5;$i++)
                                                        <i class="fa fa-star {{$i<$rating->ra_number ?'active1':''}}"
                                                           style="color: #dedede"></i>
                                                    @endfor
                                                    <p>{{$rating->ra_content}}</p>
                                                    <i class="-clock-o">{{$rating->created_at}}</i>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box ">
                                <?php
                                $listRatingText = [
                                    1 => 'dislike',
                                    2 => 'medium',
                                    3 => 'normal',
                                    4 => 'good',
                                    5 => 'great',
                                ];
                                ?>
                                <h3 style="margin-left: 20px"> Your Rating: </h3>
                                <ul class="list">
                                    <span class="list_start ">
                                        @for($i=1; $i<=5; $i++)
                                            <i class="fa fa-star" data-key="{{$i}}" style="color: #dedede"></i>
                                        @endfor
                                    </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </ul>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <textarea class="form-control" name="ra_content" id="ra_content" rows="3"
                                                      placeholder="Review"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <a href="{{route('post.rating.product',$productDetail)}}" class="js_rating_product">
                                        <button type ="submit" value="submit" class="btn submit_btn ">send review Now
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!--================San pham cung loai =================-->
    <section class="most_product_area">
        <div class="main_box">
            <div class="container">
                <div class="main_title">
                    <h2>Sản phẩm cùng loại</h2>
                </div>
                <div class="latest_product_inner row">
                    @if(isset($productSame))
                        @foreach($productSame as $same)
                            <h4></h4>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="f_p_item">
                                    <div class="f_p_img">
                                        <a href="{{route('get.detail.product',[$same->pro_slug,$same->id])}}">
                                            <img class="img-fluid" src="{{pare_url_file($same->pro_avatar)}}" alt=""
                                                 style="width: 200px;height: 200px">
                                        </a>
                                        <div class="p_icon">
                                            <a href="#"><i class="lnr lnr-heart"></i></a>
                                            <a href="{{route('add.shopping.cart',$same->id)}}"><i
                                                    class="lnr lnr-cart"></i></a>
                                        </div>
                                    </div>
                                    <a href="{{route('get.detail.product',[$same->pro_slug,$same->id])}}">
                                        <h4>{{$same->pro_name}}</h4></a>
                                    <h5>{{number_format($same->pro_price)}}</h5>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            let listStart = $(".list_start .fa");
            listRatingText = {
                1: 'dislike',
                2: 'medium',
                3: 'normal',
                4: 'good',
                5: 'great'
            }
            listStart.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');
                $(".number_rating").val(number);
                $.each(listStart, function (key, value) {
                    if (key + 1 <= number) {
                        $(this).addClass('rating_active')
                    }
                });
                $(".list_text").text('').text(listRatingText[number]).show()
            });
            //Bắt sự kiện click vào nút submit
            $(".js_rating_product").click(function (event) {
                event.preventDefault();
                let content = $("#ra_content").val();
                let number = $(".number_rating").val();
                let url = $(this).attr('href');
                // Dùng ajax
                if (content && number) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            number: number,
                            r_content: content
                        },
                    }).done(function (result) {
                        if (result.redirect !== undefined) {
                            window.location.replace(result.redirect);
                        } else if (result.code == 1) {
                            alert("Đánh giá thành công !!");
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
@stop
