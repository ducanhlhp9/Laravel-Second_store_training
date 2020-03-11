@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="home_banner_area blog_banner">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                 data-background=""></div>
            <div class="container">
                <div class="blog_b_text text-center">
                    <h2>Xin chào</h2>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @if(isset($articles))
                            @foreach($articles as $article)
                                <article class="row blog_item">
                                    <div class="col-md-3">
                                        <div class="blog_info text-right">
                                            <ul class="blog_meta list">
                                                <li><a>Ducanh<i class="lnr lnr-user"></i></a></li>
                                                <li><a>{{$article->created_at}}<i class="lnr lnr-calendar-full"></i></a>
                                                </li>
                                                <li><a>{{$article->a_view}}<i class="lnr lnr-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="blog_post">
                                            <img href="{{route('get.detail.news',[$article->a_slug,$article->id])}}"
                                                 src="{{pare_url_file($article->a_avatar)}}"
                                                 style="width: 80px;height: 80px">
                                            <div class="blog_details">
                                                <a href="{{route('get.detail.news',[$article->a_slug,$article->id])}}">
                                                    <h2>{{$article->a_name}}</h2></a>
                                                <p>{{$article->a_description_seo}}</p>
                                                <a href="{{route('get.detail.news',[$article->a_slug,$article->id])}}"
                                                   class="white_bg_btn">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {!! $articles->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết nổi bật</h3>
                            @if(isset($articleHot))
                                @foreach($articleHot as $hot)
                                    <div class="media post_item">
                                        <img href="{{route('get.detail.news',[$hot->a_slug,$hot->id])}}" src="{{pare_url_file($hot->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                        <div class="media-body">
                                            <a href="{{route('get.detail.news',[$hot->a_slug,$hot->id])}}"><h3>{{$hot->a_name}}</h3></a>
                                            <p><i class="lnr lnr-calendar-full"></i>  :{{$hot->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết mới</h3>
                            @if(isset($articleNew))
                                @foreach($articleNew as $New)
                                    <div class="media post_item">
                                        <img href="{{route('get.detail.news',[$New->a_slug,$New->id])}}" src="{{pare_url_file($New->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                        <div class="media-body">
                                            <a href="{{route('get.detail.news',[$New->a_slug,$New->id])}}"><h3>{{$New->a_name}}</h3></a>
                                            <p><i class="lnr lnr-calendar-full"></i>  :{{$New->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Gửi phản hồi</h4>
                            <p>
                                Gửi cho chúng tôi phản hồi của bạn
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                           placeholder="Enter email" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom"></p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@stop
