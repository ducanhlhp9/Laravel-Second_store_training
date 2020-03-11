@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Chi tiết bài viết</h2>
                    <div class="page_link">
                        <a href="{{route('news')}}">Trang chủ bài viết</a>
                        <a href="">Chi tiết bài viết</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{pare_url_file($NewsDetail->a_avatar)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a href="#">Hoàng Đức Anh<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">{{$NewsDetail->created_at}}<i class="lnr lnr-calendar-full"></i></a>
                                    </li>
                                    <li><a href="#">{{$NewsDetail->a_view}}<i class="lnr lnr-eye"></i></a></li>
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{$NewsDetail->a_name}}</h2>
                            <p class="excert">
                                {{$NewsDetail->a_content}}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            @foreach($articlePrev as $Prev)
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <img href="{{route('get.detail.news',[$Prev->a_slug,$Prev->id])}}"
                                             src="{{pare_url_file($Prev->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                    </div>
                                    <div class="arrow">
                                        <a href="{{route('get.detail.news',[$Prev->a_slug,$Prev->id])}}"><span
                                                class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <a href="{{route('get.detail.news',[$Prev->a_slug,$Prev->id])}}"></a>
                                        <p>Prev Post</p>
                                        <a href="#"><h4>{{$Prev->a_name}}</h4></a>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($articleNext as $next)
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <img href="{{route('get.detail.news',[$next->a_slug,$next->id])}}"
                                             src="{{pare_url_file($next->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                    </div>
                                    <div class="arrow">
                                        <a href="{{route('get.detail.news',[$next->a_slug,$next->id])}}"><span
                                                class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="detials">
                                        <a href="{{route('get.detail.news',[$next->a_slug,$next->id])}}"></a>
                                        <p>Next Post</p>
                                        <a href="#"><h4>{{$next->a_name}}</h4></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="comments-area">
                        <div class="comment-list">
                            @if(isset($comments))
                                @foreach($comments as $comment)
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{asset('img/blog/author.png')}}" alt="" style="width: 60px;height: 60px">
                                            </div>
                                            <div class="desc">
                                                <h5>{{$comment->user->name}}</h5>
                                                <p class="date">{{$comment->created_at}}</p>
                                                <p class="comment">
                                                    {{$comment->co_content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Bình luận</h4>

                        <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="co_content" placeholder="Messege"
                                          id="co_content"></textarea>
                        </div>
                        <a href="{{route('post.comment.article',$NewsDetail)}}" class="js_comment_article">
                            <button type="submit" value="submit" class="btn submit_btn ">Bình luận
                            </button>
                        </a>
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
                                        <img href="{{route('get.detail.news',[$hot->a_slug,$hot->id])}}"
                                             src="{{pare_url_file($hot->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                        <div class="media-body">
                                            <a href="{{route('get.detail.news',[$hot->a_slug,$hot->id])}}">
                                                <h3>{{$hot->a_name}}</h3></a>
                                            <p><i class="lnr lnr-calendar-full"></i> :{{$hot->created_at}}</p>
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
                                        <img href="{{route('get.detail.news',[$New->a_slug,$New->id])}}"
                                             src="{{pare_url_file($New->a_avatar)}}"
                                             style="width: 80px;height: 80px">
                                        <div class="media-body">
                                            <a href="{{route('get.detail.news',[$New->a_slug,$New->id])}}">
                                                <h3>{{$New->a_name}}</h3></a>
                                            <p><i class="lnr lnr-calendar-full"></i> :{{$New->created_at}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">phản hồi</h4>
                            <p>
                                Gửi phản hồi cho chúng tôi
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
                                <a href="" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {

            //Bắt sự kiện click vào nút submit
            $(".js_comment_article").click(function (event) {
                event.preventDefault();
                let content = $("#co_content").val();
                let url = $(this).attr('href');
                // Dùng ajax
                if (content) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            r_content: content
                        },
                    }).done(function (result) {
                        console.log(result);
                        if (result.redirect !== undefined) {
                            window.location.replace(result.redirect);
                        } else if (result.code == 1) {
                            alert("Bình luận thành công !!");
                            location.reload();
                        }
                    })
                }
            });
        });
    </script>
@stop

