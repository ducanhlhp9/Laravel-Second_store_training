<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">
                <a>Xin chào mọi người</a>
            </div>
            <div class="float-right">
                <ul class="header_social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-phone"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}">
                    <img src="{{asset('home/img/icon.png')}}" style="width: 40px;height: 40px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Cửa hàng</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{route('shop')}}">Danh mục sản phẩm</a>
                                <li class="nav-item"><a class="nav-link" href="{{route('get.list.shopping.cart')}}">Giỏ hàng</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('news')}}">Tin tức</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Trang</a>
                            <ul class="dropdown-menu">
                                @if(auth::check())
                                    <li class="nav-item"><a class="nav-link" href="{{route('get.logout.user')}}">Đăng xuất</a>
                                @else
                                    <li class="nav-item"><a class="nav-link" href="{{route('get.login')}}">Đăng nhập</a>
                                    <li class="nav-item"><a class="nav-link" href="{{route('get.register')}}">Đăng kí</a>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('get.contact')}}">Liên hệ</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{route('get.list.shopping.cart')}}" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>
                        <li class="nav-item active">
                            <form action ="{{route('search')}}" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" >
                                <input type="text" class="form-control" placeholder="Search for..." name = "name" value="{{\Request::get('name')}}" >
                                <div class="nav-link">
                                    <button class="btn btn-primary" type="submit" >
                                        <i class="lnr lnr-magnifier"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
