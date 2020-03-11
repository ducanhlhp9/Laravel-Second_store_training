@extends('admin::layouts.master')

@section('content')
    <title>Quản lý danh mục</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a>Danh sách danh mục</a></li>

    </ol>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>Danh mục sản phẩm</h3><a class="btn btn-info" href="{{route('admin.get.create.category')}}">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Danh Mục</th>
                                    <th>Title Seo</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories))
                                    <?php $i = 1?>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{($i)}}</td>
                                            <td>{{$category->c_name}}</td>

                                            <td>{{$category->c_title_seo}}</td>
                                            <td>
                                                <a href="{{route('admin.get.action.category',['active',$category->id])}}"
                                                   class="btn {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
                                            </td>
                                            <td>

                                                <a class="btn btn-xs btn-info"
                                                   href="{{route('admin.get.edit.category',$category->id)}}"><i
                                                        class="fa fa-edit"></i>Sửa</a>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.category',['delete', $category->id])}}"><i
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
                                <ul class="pagination">
                                    {!! $categories->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

