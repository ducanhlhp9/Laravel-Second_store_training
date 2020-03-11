<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('theme_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{asset('theme_admin/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="text-align: center">Đăng nhập</div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" required id="inputEmail" class="form-control" placeholder="@gmail.com"
                               name="email">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password"  id ="inputPassword" class="form-control" placeholder="********" name="password">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit" value="submit">
                   Login
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('theme_admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('theme_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
