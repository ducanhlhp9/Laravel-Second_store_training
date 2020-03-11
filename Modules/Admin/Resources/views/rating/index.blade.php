@extends('admin::layouts.master')

@section('content')
    <title>Quản lý Đánh giá</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a>Danh sách Đánh giá</a></li>

    </ol>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>Danh sách Đánh giá</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên Sản phẩm</th>
                                    <th>nội dung</th>
                                    <th>rating</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($rating))
                                    <?php $i = 1 ?>
                                    @foreach($rating as $rate)
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
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.user',['delete', $rate->id])}}"><i
                                                        class="fa fa-times"></i>Xóa</a>
                                            </td>
                                        </tr>
                                        <?php $i++?>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--                    //Phân trang--}}
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

