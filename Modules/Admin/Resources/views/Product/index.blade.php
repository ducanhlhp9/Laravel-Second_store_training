@extends('admin::layouts.master')

@section('content')
    <style>
        .active{
            color:red !important;
        }
    </style>
    <title>Quản lý Sản phẩm</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a>Danh sách Sản phẩm</a></li>

    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>Danh sách sản phẩm</h3><a class="btn btn-info" href="{{route('admin.get.create.Product')}}">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Tên Sản Phẩm" name="name"
                                       value="{{\Request::get('name')}}">
                            </div>
                            <div class="form-group">
                                <select name="cate" id="" class="form-control">
                                    <option vlaue="">Danh mục</option>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}}" {{\Request::get('cate') == $category->id ? "selected = 'selected'":'' }}>{{$category->c_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Thông tin sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Nổi bật</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($products))
                                    <?php $i = 1?>
                                    @foreach($products as $product)
                                        <?php
                                            $avg= 0;
                                            if($product->pro_total_rating){
                                                $avg = round($product->pro_total_number/$product->pro_total_rating,2);
                                            }
                                        ?>
                                        <tr>
                                            <td>{{($i)}}</td>
                                            <td>
                                                {{$product->pro_name}}
                                                <ul>
                                                    <li><span>Giá: {{$product->pro_price}} VNĐ</span></li>
                                                    <li><span>Sale: {{$product->pro_sale}} %</span></li>
                                                    <li>
                                                        <span class="rating">
                                                            Đánh giá:
                                                            @for($i=1; $i<=5;$i++)
                                                                <i class="fa fa-star {{$i <= $avg ? 'active':''}}" style="color: #dedede"></i>
                                                            @endfor
                                                            {{$avg}}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>{{isset($product->category->c_name) ? $product->category->c_name:'[N\A]'}}</td>
                                            <td>
                                                <img src="{{pare_url_file($product->pro_avatar)}}"
                                                     style="width: 80px;height: 80px">
                                            </td>

                                            <td>
                                                <a href="{{route('admin.get.action.Product',['active',$product->id])}}"
                                                   class="btn {{$product->getStatus($product->pro_active)['class']}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.Product',['hot',$product->id])}}"
                                                   class="btn {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-info"
                                                   href="{{route('admin.get.edit.Product',$product->id)}}"><i
                                                        class="fa fa-edit"></i>Sửa</a>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.Product',['delete', $product->id])}}"><i
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
                        <div class="col-sm-12 col-md-3">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                {!! $products->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

