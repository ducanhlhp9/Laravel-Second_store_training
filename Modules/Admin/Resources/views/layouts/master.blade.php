<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Custom fonts for this template-->
    <link href="{{asset('theme_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('theme_admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('theme_admin/css/sb-admin.css')}}" rel="stylesheet">
    <script src="{{asset('https://code.highcharts.com/highcharts.js')}}"></script>
    <script src="{{asset('https://code.highcharts.com/modules/exporting.js')}}"></script>
    <script src="{{asset('https://code.highcharts.com/modules/export-data.js')}}"></script>


</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Hello Duc Anh</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
{{--        @if(auth::check())--}}
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="{{route('get.logout.admin')}}" id="userDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>Logout
                </a>
            </li>
{{--        @endif--}}
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('Admin')}}">
                <i class="fas fa-fw fa-home"></i>
                <span>Trang chủ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.category')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>Danh Mục</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.Product')}}">
                <i class="fas fa-fw fa-laptop"></i>
                <span>Sản Phẩm</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.rating')}}">
                <i class="fas fa-fw fa-star"></i>
                <span>Đánh giá</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.article')}}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Tin Tức</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.transaction')}}">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Đơn Hàng</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.get.list.user')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Thành viên</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">
            @if(\Session::has('success'))
                <div class="alert alert-success" role="alert">
                    Thêm Mới thành công !!
                </div>
            @endif

            @yield('content')
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('theme_admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('theme_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
{{--<script src="{{asset('theme_admin/vendor/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('theme_admin/vendor/datatables/jquery.dataTables.js')}}"></script>--}}
{{--<script src="{{asset('theme_admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>--}}

<!-- Custom scripts for all pages-->
<script src="{{asset('theme_admin/js/sb-admin.min.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/highcharts.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/modules/data.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/modules/drilldown.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/modules/exporting.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/modules/export-data.js')}}"></script>
<script src="{{asset('https://code.highcharts.com/modules/accessibility.js')}}"></script>


<!-- Demo scripts for this page-->
{{--<script src="{{asset('theme_admin/js/demo/datatables-demo.js')}}"></script>--}}
{{--<script src="{{asset('theme_admin/js/demo/chart-area-demo.js')}}"></script>--}}
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#output_img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#input_img").change(function () {
        readURL(this);
    });
</script>

@yield('script')
@yield('script1')
</body>

</html>
