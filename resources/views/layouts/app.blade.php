<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('home/img/icon.png')}}" type="image/png">
    <title>SmartThings</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('home/vendors/jquery-ui/jquery-ui.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
</head>
<body>
@include('components.header')
@yield('content')
@if(\Session::has('warning'))
    <div class="alert alert-warning" role="alert">
        Sản phẩm đã hết hàng !!
    </div>
@endif
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e4e01cda89cda5a1886f746/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
@include('components.footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('home/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('home/js/popper.js')}}"></script>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/stellar.js')}}"></script>
<script src="{{asset('home/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('home/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('home/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('home/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('home/endors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('home/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('home/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('home/vendors/flipclock/timer.js')}}"></script>
<script src="{{asset('home/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('home/js/mail-script.js')}}"></script>
<script src="{{asset('home/js/theme.js')}}"></script>
@yield('script')
</body>
</html>
