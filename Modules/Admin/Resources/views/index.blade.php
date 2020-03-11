@extends('admin::layouts.master')

@section('content')
    <!-- Breadcrumbs-->
    <title>Quản lý Admin</title>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a><h3>Xin chào Admin</h3></a>
        </li>
    </ol>


    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5"> {{$user}} Thành viên</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.get.list.user')}}">
                    <span class="float-left"> View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{{$product}} Sản phẩm</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.get.list.Product')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">{{$rating}} Đánh giá Sản phẩm</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.get.list.rating')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">{{$article}} Bài viết</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('admin.get.list.article')}}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-6">
            <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Tên Sản phẩm</th>
                    <th>nội dung</th>
                    <th>rating</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($ratings))
                    <?php $i = 1 ?>
                    @foreach($ratings as $rate)
                        <tr>
                            <td>{{($i)}}</td>
                            <td>
                                {{isset($rate->user->name) ? $rate->user->name:'[N\A]'}}
                            </td>
                            <td>
                                {{isset($rate->product->pro_name) ? $rate->product->pro_name:'[N\A]'}}
                            </td>
                            <td>{{$rate->ra_content}}</td>
                            <td>{{$rate->ra_number}}</td>
                        </tr>
                        <?php $i++?>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <div class=" col-sm-6">
            <div id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-6">
            <H2 class="sub-header">Danh sách thành viên mới nhất</H2>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Địa chỉ email</th>
                    <th>Số điện thoại</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($users))
                    <?php $i = 1 ?>
                    @foreach($users as $user1)
                        <tr>
                            <td>{{($i)}}</td>
                            <td>
                                {{$user1->name}}
                            </td>
                            <td>
                                {{$user1->address}}
                            </td>
                            <td>{{$user1->email}}</td>
                            <td>{{$user1->phone}}</td>

                        </tr>
                        <?php $i++?>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class=" col-sm-6">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>

    </div>

@stop
@section('script')
    <script>
        let data = "{{$dataMoney}}";
        dataChart = JSON.parse(data.replace(/&quot;/g, '"'));
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu theo ngày/tháng'
            },

            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Doanh thu shop'
                }

            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f} VND'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Browsers",
                    colorByPoint: true,
                    data: dataChart
                }
            ],
        });
    </script>
@stop
@section('script1')
    <script>
        let data1 = "{{$dataRating}}";
        dataChart1 = JSON.parse(data1.replace(/&quot;/g, '"'));
        // Build the chart
        Highcharts.chart('container1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Đánh giá'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                name: 'Share',
                data: dataChart1
            }]
        });
    </script>
@stop
