@extends('admin::layouts.master')

@section('content')
    <title>Quản lý Tin tức</title>
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
            <h3>Danh sách sản phẩm</h3><a class="btn btn-info" href="{{route('admin.get.create.article')}}">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <form class="form-inline" action="">
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Tên bài viết" name="a_name"
                                       value="{{\Request::get('a_name')}}">
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
                                    <th>Tên bài viết</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($articles))
                                    <?php $i = 1?>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{($i)}}</td>
                                            <td>
                                                {{$article->a_name}}
                                            </td>
                                            <td>{{$article->a_description}}</td>
                                            <td>
                                                <img src="{{pare_url_file($article->a_avatar)}}"  style="width: 80px;height: 80px">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.action.article',['active',$article->id])}}"
                                                   class="btn {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['a_name']}}</a>
                                            </td>
                                            <td>
                                                {{$article->created_at}}
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-info"
                                                   href="{{route('admin.get.edit.article',$article->id)}}"><i
                                                        class="fa fa-edit"></i>Sửa</a>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.article',['delete', $article->id])}}"><i
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
                                {!! $articles->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

