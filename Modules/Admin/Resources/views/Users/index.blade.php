@extends('admin::layouts.master')

@section('content')
    <title>Quản lý thành viên</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a>Danh sách thành viên</a></li>

    </ol>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>Danh sách sản phẩm</h3>
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
                                    <th>Địa chỉ</th>
                                    <th>Địa chỉ email</th>
                                    <th>Số điện thoại</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))
                                    <?php $i = 1 ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{($i)}}</td>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->address}}
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.user',['delete', $user->id])}}"><i
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

